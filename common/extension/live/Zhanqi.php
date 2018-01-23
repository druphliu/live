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
    const CATEGORY_URL ='http://apis.zhanqi.tv/static/v2.2/game/lists/4/app.json';
    const LIST_URL = 'http://apis.zhanqi.tv/static/v2.1/game/live/%s/100/1.json';
    const ROOM_URL = 'http://www.zhanqi.tv/api/static/v2.1/room/domain/%s.json';
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
        if($result && $result['code']==0){
            $result=$result['data']['games'];
            foreach ($result as $d){
                $data[]=[
                    'name'=>$d['name'],
                    'icon'=>$d['tvIcon'],
                    'alias'=>$d['id']
                ];
            }
        }
        return $data;
    }

    /**
     * 抓取列表
     * @return mixed
     */
    function spiderList($alisa)
    {
        // TODO: Implement spiderList() method.
        $list = [];

        $url = sprintf(self::LIST_URL, $alisa);
        echo $url . "\n";
        $this->snoopy->fetch($url);
        $result = $this->snoopy->results;
        if ($result) {
            $result = Json::decode($result);
            if($result && $result['code']==0) {
                $result = $result['data']['rooms'];
                foreach ($result as $r) {
                    $list[] = [
                        'room_id' => $r['code'],
                        'url' => 'https://www.zhanqi.tv/' . $r['code'],
                        'nickname' => $r['nickname'],
                        'room_name' => $r['title'],
                        'hn'=>0
                    ];
                }
            }

        }
        return $list;
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
                $data['is_online'] = $result['chatStatus']==1?1:0;
                $data['started_at'] = $result['liveTime'];
                $data['third_hn'] = $result['firepower'];
                $data['snapshot']=$result['bpic'];
            }
        }
        return $data;
    }


}