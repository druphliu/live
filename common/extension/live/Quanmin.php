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

class Quanmin extends LiveSpider
{
    const CATEGORY_URL = 'http://www.quanmin.tv/json/app/index/category/info-android.json';
    const LIST_URL = 'http://www.quanmin.tv/json/categories/%s/list.json';
    const ROOM_URL = 'http://m.quanmin.tv/json/rooms/%s/noinfo6.json';

    /**
     * 抓取分类
     * @return mixed
     */
    function spiderCategory()
    {
        $data = [];
        // TODO: Implement spiderCategory() method.
        $this->snoopy->fetch(self::CATEGORY_URL);
        $result = Json::decode($this->snoopy->results, true);
        if ($result) {
            foreach ($result as $d) {
                $data[] = [
                    'name' => $d['name'],
                    'icon' => $d['icon_image'],
                    'alias' => $d['slug']
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
            foreach ($result['data'] as $r) {
                $list[] = [
                    'room_id' => $r['no'],
                    'url' => 'https://www.quanmin.tv/' . $r['no'],
                    'nickname' => $r['nick'],
                    'room_name' => $r['title'],
                    'hn' => isset($r['hot']) ? $r['hot'] : 0
                ];
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
        $data = [];
        // TODO: Implement spiderRoom() method.
        $url = sprintf(self::ROOM_URL, $roomid);
        $this->snoopy->fetch($url);
        $result = $this->snoopy->results;
        if ($result) {
            $result = Json::decode($result);
            $data['avatar'] = $result['avatar'];
            $data['is_online'] = $result['status'] == 2 ? 1 : 0;
            $data['started_at'] = strtotime($result['play_at']);
            $data['third_hn'] = $result['weight'];
        }
        return $data;
    }


}