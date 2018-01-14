<?php
/**
 * Created by PhpStorm.
 * User: druphliu
 * Date: 2018/1/7
 * Time: 23:21
 */

namespace common\extension\live;

use common\extension\LiveSpider;
use common\models\Anchor;
use common\models\LCategory;
use common\models\PlatformCategoryAlisa;
use yii\helpers\Json;

class Zhanqi extends LiveSpider
{
    const CATEGORY_URL ='http://open.douyucdn.cn/api/RoomApi/game';
    const LIST_URL = 'http://open.douyucdn.cn/api/RoomApi/live/%s?limit=100&offset=%d';
    const ROOM_URL = 'https://www.zhanqi.tv/api/static/v2.1/room/domain/%s.json';
    /**
     * 抓取分类
     * @return mixed
     */
    function spiderCategory()
    {
        $data=[];
        // TODO: Implement spiderCategory() method.
        $this->snoopy->fetch(self::CATEGORY_URL);
        $result =Json::decode($this->snoopy->results,true);
        if($result && $result['error']==0){
            $result=$result['data'];
            foreach ($result as $d){
                $data[]=[
                    'name'=>$d['game_name'],
                    'icon'=>$d['game_icon'],
                    'alias'=>$d['short_name']
                ];
            }
        }
        return $data;
    }

    /**
     * 抓取列表
     * @return mixed
     */
    function spiderList($cid)
    {
        // TODO: Implement spiderList() method.
            $categoryAlisa = PlatformCategoryAlisa::find()->with('category')->with('platform')->where(['alisa'=>$cid,'platform_id'=>1])->one();
            for ($i=0;$i<=1000000;$i+=100){
                $url = sprintf(self::LIST_URL,$cid,$i);echo $url."\n";
                $this->snoopy->fetch($url);
                $result = $this->snoopy->results;
                if($result){
                    $result = Json::decode($result);
                    if(isset($result['error']) && $result['error']==0){
                        foreach ($result['data'] as $data){
                            $model = Anchor::find()->where(['room_id'=>$data['room_id'],'platform_id'=>1])->one();
                            if(!$model)
                                $model = new Anchor();
                            $model->room_id = $data['room_id'];
                            $model->room_url = $data['url'];
                            $model->platform_id = 1;
                            $model->p_c_a_id  = $categoryAlisa->id;
                            $model->platfrom_name = $categoryAlisa->platform->name;
                            $model->l_cid = $categoryAlisa->category->id;
                            $model->l_cname = $categoryAlisa->category->name;
                            $model->anchor_name = $data['nickname'];
                            $model->title = $data['room_name'];
                            $model->created_at = time();
                            $model->save();
                        }
                    }else{
                        var_dump($result);
                        break;
                    }
                }else{
                    var_dump($result);
                }
            }
    }
    
    /**
     * 抓取直播间数据
     * @return mixed
     */
    function spiderRoom($roomid)
    {
        $data=[];
        // TODO: Implement spiderRoom() method.
        $url = sprintf(self::ROOM_URL,$roomid);
        $this->snoopy->fetch($url);
        $result = $this->snoopy->results;
        if($result){
            $result = Json::decode($result);
            if(isset($result['error']) && $result['error']==0){
                $result = $result['data'];
                $data['avatar'] = $result['avatar'];
                $data['is_online'] = $result['room_status']==1?1:0;
                $data['started_at'] = strtotime($result['start_time']);
                $data['third_hn'] = $result['hn'];
            }
        }
        return $data;
    }


}