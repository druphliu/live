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

class Longzhu extends LiveSpider
{
    const CATEGORY_URL = 'http://stark.longzhu.com/api/v2/home/games';
    const LIST_URL = 'http://stark.longzhu.com/api/v2/stream/search?type=7&target=%s&start-index=0&max-results=30&parentId=10066';
    const ROOM_URL = 'http://userapi.longzhu.com/user/getappusercardinfo?roomId=0&userId=%s&withFamilyInfo=1&version=4.6.2&device=4&packageId=1&utm_sr=chanel_3';

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
        if ($result && isset($result['data']['slideIcons'])) {
            $result = $result['data']['slideIcons'];
            foreach ($result as $d) {
                    $data[] = [
                        'name' => $d['title'],
                        'icon' => $d['image'],
                        'alias' => $d['target']
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
            if ($result && $result['data']) {
                $result = $result['data']['streamFlows'][0]['streams'];
                foreach ($result as $r) {
                    $list[] = [
                        'room_id' => $r['room']['id'],
                        'url' => 'http://star.longzhu.com/' . $r['room']['id'],
                        'nickname' => $r['user']['name'],
                        'room_name' => $r['room']['title'],
                        'hn' => $r['room']['viewers']
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
        $data = [];
        // TODO: Implement spiderRoom() method.
        $url = sprintf(self::ROOM_URL, $roomid);
        $this->snoopy->fetch($url);
        $result = $this->snoopy->results;
        if ($result) {
            $result = Json::decode($result);
            if (isset($result['code']) && $result['code'] == 0) {
                $result = $result['data'];
                $data['avatar'] = $result['user']['avatar'];
                $data['is_online'] = $result['isLive']? 1 : 0;
                $data['started_at'] = $result['roominfo']['start_time'];
                $data['third_hn'] = 0;
            }
        }
        return $data;
    }


}