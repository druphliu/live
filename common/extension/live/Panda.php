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

class Panda extends LiveSpider
{
    const CATEGORY_URL = 'http://api.m.panda.tv/index.php?method=category.gamelist';
    const LIST_URL = 'http://api.m.panda.tv/ajax_get_live_list_by_cate?cate=%s&pageno=1&pagenum=20';
    const ROOM_URL = 'http://api.m.panda.tv/ajax_get_liveroom_baseinfo?slaveflag=1&type=json&roomid=%s&inroom=1';

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
        if ($result && $result['errno'] == 0) {
            $result = $result['data'];
            foreach ($result as $category) {
                $cdata = $category['child_data'];
                foreach ($cdata as $d) {
                    $data[] = [
                        'name' => $d['cname'],
                        'icon' => $d['img'],
                        'alias' => $d['ename']
                    ];
                }

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
            if ($result && $result['errno'] == 0) {
                $result = $result['data']['items'];
                foreach ($result as $r) {
                    $list[] = [
                        'room_id' => $r['id'],
                        'url' => 'https://www.panda.tv/' . $r['id'],
                        'nickname' => $r['userinfo']['nickName'],
                        'room_name' => $r['name'],
                        'hn' => $r['person_num']
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
            if (isset($result['error']) && $result['error'] == 0) {
                $result = $result['data']['info'];
                $data['avatar'] = $result['hostinfo']['avatar'];
                $data['is_online'] = $result['roominfo']['status'] == 2 ? 1 : 0;
                $data['started_at'] = $result['roominfo']['start_time'];
                $data['third_hn'] = 0;
            }
        }
        return $data;
    }


}