<?php
/**
 * Created by PhpStorm.
 * User: druphliu
 * Date: 2018/1/7
 * Time: 23:21
 */

namespace common\extension\live;

use common\extension\LiveSpider;
use yii\helpers\Json;

class Douyu extends LiveSpider
{
    const CATEGORY_URL ='http://open.douyucdn.cn/api/RoomApi/game';
    const LIST_URL = 'http://open.douyucdn.cn/api/RoomApi/live/%s?limit=%d&offset=%d';
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
                    'icon'=>$d['game_src'],
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
    function spiderList()
    {
        // TODO: Implement spiderList() method.
    }
    
    /**
     * 抓取直播间数据
     * @return mixed
     */
    function spiderRoom()
    {
        // TODO: Implement spiderRoom() method.
    }


}