<?php
/**
 * Created by PhpStorm.
 * User: druphliu
 * Date: 2018/1/7
 * Time: 23:21
 */

namespace common\extension;


abstract class LiveSpider
{
    protected $snoopy;

    public function __construct()
    {
        $this->snoopy = new Snoopy();
        $this->snoopy->headers=[
            'Host'=>'www.quanmin.tv',
            'User-Agent'=>'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.108 Safari/537.36'
        ];
    }

    /**
     * 抓取分类
     * @return mixed
     */
    abstract function spiderCategory();

    /**
     * 抓取列表
     * @return mixed
     */
    abstract function spiderList($cid);

    /**
     * 抓取直播间数据
     * @return mixed
     */
    abstract function spiderRoom($roomid);
}