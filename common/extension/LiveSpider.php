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
    abstract function spiderList();

    /**
     * 抓取直播间数据
     * @return mixed
     */
    abstract function spiderRoom();
}