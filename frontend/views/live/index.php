<?php
/**
 * Created by PhpStorm.
 * User: druphliu
 * Date: 2018/2/17
 * Time: 0:26
 */

use common\widgets\JsBlock;
use frontend\assets\NewsAsset;

NewsAsset::register($this);
$this->title = yii::$app->feehi->website_title;

$this->registerMetaTag(['keywords' => yii::$app->feehi->seo_keywords]);
$this->registerMetaTag(['description' => yii::$app->feehi->seo_description]);
?>
<div class="content">
<div class="activity-imgBox clearfix">
    <div class="actimg-top-left">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="/static/images/img2.png">
                    <p>直播平台战队赛季精彩直播直播平台战队赛季精</p>
                </div>
                <div class="swiper-slide">
                    <img src="/static/images/img2.png">
                    <p>直播平台战队赛季精彩直播直播平台战队赛季精</p>
                </div>
                <div class="swiper-slide">
                    <img src="/static/images/img2.png">
                    <p>直播平台战队赛季精彩直播直播平台战队赛季精</p>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <div class="actimg-top-right clearfix">
        <ul class="activity-rig-list">
            <li><a href="#"><img src="/static/images/img2.png"></a></li>
            <li><a href="#"><img src="/static/images/img2.png"></a></li>
            <li><a href="#"><img src="/static/images/img2.png"></a></li>
            <li><a href="#"><img src="/static/images/img2.png"></a></li>
        </ul>
    </div>
</div>
</div>
<div class="video-type-box">
    <div class="content clearfix">
        <div class="video-type-left">
            <div class="title clearfix">
                <span class="font">游戏视频</span>
                <label class="js_nav-list act">英雄联盟</label>
                <label class="js_nav-list">绝地求生</label>
                <label class="js_nav-list">王者荣耀</label>
                <label class="js_nav-list">魔兽世界</label>
                <label class="js_nav-list">炉石传说</label>
                <label class="js_nav-list">王者荣耀</label>
                <a href="#" class="more">更多>></a>
            </div>
            <div class="video-type-list js_news-deta">
                <div class="game-live-list">
                    <ul class="clearfix">
                        <li>
                            <b>虎牙</b>
                            <a href="#">
                                <div class="play-ico">
                                    <img src="/static/images/img2.png">
                                    <i class="play-icon"></i>
                                </div>
                                <div class="game-live-txt clearfix">
                                    <p class="game-title">就是主播命名标题就是主播命名标题</p>
                                    <p class="game-hot"><img src="/static/images/hot.png">2222</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <b>虎牙</b>
                            <a href="#">
                                <div class="play-ico">
                                    <img src="/static/images/img2.png">
                                    <i class="play-icon"></i>
                                </div>
                                <div class="game-live-txt clearfix">
                                    <p class="game-title">就是主播命名标题就是主播命名标题</p>
                                    <p class="game-hot"><img src="/static/images/hot.png">2222</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <b>虎牙</b>
                            <a href="#">
                                <div class="play-ico">
                                    <img src="/static/images/img2.png">
                                    <i class="play-icon"></i>
                                </div>
                                <div class="game-live-txt clearfix">
                                    <p class="game-title">就是主播命名标题就是主播命名标题</p>
                                    <p class="game-hot"><img src="/static/images/hot.png">2222</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <b>虎牙</b>
                            <a href="#">
                                <div class="play-ico">
                                    <img src="/static/images/img2.png">
                                    <i class="play-icon"></i>
                                </div>
                                <div class="game-live-txt clearfix">
                                    <p class="game-title">就是主播命名标题就是主播命名标题</p>
                                    <p class="game-hot"><img src="/static/images/hot.png">2222</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <b>虎牙</b>
                            <a href="#">
                                <div class="play-ico">
                                    <img src="/static/images/img2.png">
                                    <i class="play-icon"></i>
                                </div>
                                <div class="game-live-txt clearfix">
                                    <p class="game-title">就是主播命名标题就是主播命名标题</p>
                                    <p class="game-hot"><img src="/static/images/hot.png">2222</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <b>虎牙</b>
                            <a href="#">
                                <div class="play-ico">
                                    <img src="/static/images/img2.png">
                                    <i class="play-icon"></i>
                                </div>
                                <div class="game-live-txt clearfix">
                                    <p class="game-title">就是主播命名标题就是主播命名标题</p>
                                    <p class="game-hot"><img src="/static/images/hot.png">2222</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="video-type-list js_news-deta">
                <div class="game-live-list">
                    <ul class="clearfix">
                        <li>
                            <b>虎牙</b>
                            <a href="#">
                                <div class="play-ico">
                                    <img src="/static/images/img2.png">
                                    <i class="play-icon"></i>
                                </div>
                                <div class="game-live-txt clearfix">
                                    <p class="game-title">就是主播命名标题就是主播命名标题</p>
                                    <p class="game-hot"><img src="/static/images/hot.png">2222</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="video-type-list js_news-deta">
                <div class="game-live-list">
                    <ul class="clearfix">
                        <li>
                            <b>虎牙</b>
                            <a href="#">
                                <div class="play-ico">
                                    <img src="/static/images/img2.png">
                                    <i class="play-icon"></i>
                                </div>
                                <div class="game-live-txt clearfix">
                                    <p class="game-title">就是主播命名标题就是主播命名标题</p>
                                    <p class="game-hot"><img src="/static/images/hot.png">2222</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <b>虎牙</b>
                            <a href="#">
                                <div class="play-ico">
                                    <img src="/static/images/img2.png">
                                    <i class="play-icon"></i>
                                </div>
                                <div class="game-live-txt clearfix">
                                    <p class="game-title">就是主播命名标题就是主播命名标题</p>
                                    <p class="game-hot"><img src="/static/images/hot.png">2222</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="video-type-list js_news-deta">
                <div class="game-live-list">
                    <ul class="clearfix">
                        <li>
                            <b>虎牙</b>
                            <a href="#">
                                <div class="play-ico">
                                    <img src="/static/images/img2.png">
                                    <i class="play-icon"></i>
                                </div>
                                <div class="game-live-txt clearfix">
                                    <p class="game-title">就是主播命名标题就是主播命名标题</p>
                                    <p class="game-hot"><img src="/static/images/hot.png">2222</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="video-type-list js_news-deta">
                <div class="game-live-list">
                    <ul class="clearfix">
                        <li>
                            <b>虎牙</b>
                            <a href="#">
                                <div class="play-ico">
                                    <img src="/static/images/img2.png">
                                    <i class="play-icon"></i>
                                </div>
                                <div class="game-live-txt clearfix">
                                    <p class="game-title">就是主播命名标题就是主播命名标题</p>
                                    <p class="game-hot"><img src="/static/images/hot.png">2222</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <b>虎牙</b>
                            <a href="#">
                                <div class="play-ico">
                                    <img src="/static/images/img2.png">
                                    <i class="play-icon"></i>
                                </div>
                                <div class="game-live-txt clearfix">
                                    <p class="game-title">就是主播命名标题就是主播命名标题</p>
                                    <p class="game-hot"><img src="/static/images/hot.png">2222</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="video-type-list js_news-deta">
                <div class="game-live-list">
                    <ul class="clearfix">
                        <li>
                            <b>虎牙</b>
                            <a href="#">
                                <div class="play-ico">
                                    <img src="/static/images/img2.png">
                                    <i class="play-icon"></i>
                                </div>
                                <div class="game-live-txt clearfix">
                                    <p class="game-title">就是主播命名标题就是主播命名标题</p>
                                    <p class="game-hot"><img src="/static/images/hot.png">2222</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="video-type-right">
            <div class="title clearfix">
                <span class="font"><img src="/static/images/video.png">热门视频</span>
                <a href="#" class="more">更多></a>
            </div>
            <div class="game-live-list">
                <ul class="clearfix">
                    <li>
                        <a href="#">
                            <div class="play-ico">
                                <img src="/static/images/img2.png">
                                <i class="play-icon"></i>
                            </div>
                            <div class="game-live-txt clearfix">
                                <p class="game-title">就是主播命名标题就是主播命名标题</p>
                                <p class="game-hot"><img src="/static/images/hot.png">2222</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="play-ico">
                                <img src="/static/images/img2.png">
                                <i class="play-icon"></i>
                            </div>
                            <div class="game-live-txt clearfix">
                                <p class="game-title">就是主播命名标题就是主播命名标题</p>
                                <p class="game-hot"><img src="/static/images/hot.png">2222</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="play-ico">
                                <img src="/static/images/img2.png">
                                <i class="play-icon"></i>
                            </div>
                            <div class="game-live-txt clearfix">
                                <p class="game-title">就是主播命名标题就是主播命名标题</p>
                                <p class="game-hot"><img src="/static/images/hot.png">2222</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="play-ico">
                                <img src="/static/images/img2.png">
                                <i class="play-icon"></i>
                            </div>
                            <div class="game-live-txt clearfix">
                                <p class="game-title">就是主播命名标题就是主播命名标题</p>
                                <p class="game-hot"><img src="/static/images/hot.png">2222</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="play-ico">
                                <img src="/static/images/img2.png">
                                <i class="play-icon"></i>
                            </div>
                            <div class="game-live-txt clearfix">
                                <p class="game-title">就是主播命名标题就是主播命名标题</p>
                                <p class="game-hot"><img src="/static/images/hot.png">2222</p>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="video-type-left">
            <div class="title clearfix">
                <span class="font">娱乐视频</span>
                <label class="act">英雄联盟</label>
                <label>英雄联盟</label>
                <label>绝地求生</label>
                <label>王者荣耀</label>
                <label>魔兽世界</label>
                <label>炉石传说</label>
                <label>王者荣耀</label>
                <a href="#" class="more">更多>></a>
            </div>
            <div class="video-type-list">
                <div class="game-live-list">
                    <ul class="clearfix">
                        <li>
                            <b>虎牙</b>
                            <a href="#">
                                <div class="play-ico">
                                    <img src="/static/images/img2.png">
                                    <i class="play-icon"></i>
                                </div>
                                <div class="game-live-txt clearfix">
                                    <p class="game-title">就是主播命名标题就是主播命名标题</p>
                                    <p class="game-hot"><img src="/static/images/hot.png">2222</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <b>虎牙</b>
                            <a href="#">
                                <div class="play-ico">
                                    <img src="/static/images/img2.png">
                                    <i class="play-icon"></i>
                                </div>
                                <div class="game-live-txt clearfix">
                                    <p class="game-title">就是主播命名标题就是主播命名标题</p>
                                    <p class="game-hot"><img src="/static/images/hot.png">2222</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <b>虎牙</b>
                            <a href="#">
                                <div class="play-ico">
                                    <img src="/static/images/img2.png">
                                    <i class="play-icon"></i>
                                </div>
                                <div class="game-live-txt clearfix">
                                    <p class="game-title">就是主播命名标题就是主播命名标题</p>
                                    <p class="game-hot"><img src="/static/images/hot.png">2222</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <b>虎牙</b>
                            <a href="#">
                                <div class="play-ico">
                                    <img src="/static/images/img2.png">
                                    <i class="play-icon"></i>
                                </div>
                                <div class="game-live-txt clearfix">
                                    <p class="game-title">就是主播命名标题就是主播命名标题</p>
                                    <p class="game-hot"><img src="/static/images/hot.png">2222</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <b>虎牙</b>
                            <a href="#">
                                <div class="play-ico">
                                    <img src="/static/images/img2.png">
                                    <i class="play-icon"></i>
                                </div>
                                <div class="game-live-txt clearfix">
                                    <p class="game-title">就是主播命名标题就是主播命名标题</p>
                                    <p class="game-hot"><img src="/static/images/hot.png">2222</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <b>虎牙</b>
                            <a href="#">
                                <div class="play-ico">
                                    <img src="/static/images/img2.png">
                                    <i class="play-icon"></i>
                                </div>
                                <div class="game-live-txt clearfix">
                                    <p class="game-title">就是主播命名标题就是主播命名标题</p>
                                    <p class="game-hot"><img src="/static/images/hot.png">2222</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="video-type-left">
            <div class="title clearfix">
                <span class="font">特别推荐</span>
                <label class="act">英雄联盟</label>
                <label>英雄联盟</label>
                <label>绝地求生</label>
                <label>王者荣耀</label>
                <label>魔兽世界</label>
                <label>炉石传说</label>
                <label>王者荣耀</label>
                <a href="#" class="more">更多>></a>
            </div>
            <div class="video-type-list">
                <div class="game-live-list">
                    <ul class="clearfix">
                        <li>
                            <b>虎牙</b>
                            <a href="#">
                                <div class="play-ico">
                                    <img src="/static/images/img2.png">
                                    <i class="play-icon"></i>
                                </div>
                                <div class="game-live-txt clearfix">
                                    <p class="game-title">就是主播命名标题就是主播命名标题</p>
                                    <p class="game-hot"><img src="/static/images/hot.png">2222</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <b>虎牙</b>
                            <a href="#">
                                <div class="play-ico">
                                    <img src="/static/images/img2.png">
                                    <i class="play-icon"></i>
                                </div>
                                <div class="game-live-txt clearfix">
                                    <p class="game-title">就是主播命名标题就是主播命名标题</p>
                                    <p class="game-hot"><img src="/static/images/hot.png">2222</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <b>虎牙</b>
                            <a href="#">
                                <div class="play-ico">
                                    <img src="/static/images/img2.png">
                                    <i class="play-icon"></i>
                                </div>
                                <div class="game-live-txt clearfix">
                                    <p class="game-title">就是主播命名标题就是主播命名标题</p>
                                    <p class="game-hot"><img src="/static/images/hot.png">2222</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <b>虎牙</b>
                            <a href="#">
                                <div class="play-ico">
                                    <img src="/static/images/img2.png">
                                    <i class="play-icon"></i>
                                </div>
                                <div class="game-live-txt clearfix">
                                    <p class="game-title">就是主播命名标题就是主播命名标题</p>
                                    <p class="game-hot"><img src="/static/images/hot.png">2222</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <b>虎牙</b>
                            <a href="#">
                                <div class="play-ico">
                                    <img src="/static/images/img2.png">
                                    <i class="play-icon"></i>
                                </div>
                                <div class="game-live-txt clearfix">
                                    <p class="game-title">就是主播命名标题就是主播命名标题</p>
                                    <p class="game-hot"><img src="/static/images/hot.png">2222</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <b>虎牙</b>
                            <a href="#">
                                <div class="play-ico">
                                    <img src="/static/images/img2.png">
                                    <i class="play-icon"></i>
                                </div>
                                <div class="game-live-txt clearfix">
                                    <p class="game-title">就是主播命名标题就是主播命名标题</p>
                                    <p class="game-hot"><img src="/static/images/hot.png">2222</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="activity-type-box">
    <div class="content">
        <ul class="page">
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">6</a></li>
            <li><a href="#">7</a></li>
            <li><a href="#">8</a></li>
            <li><a href="#">9</a></li>
            <li><a href="#">10</a></li>
            <li class="next-page"><a href="#">下一页</a></li>
            <li class="go-page">到第<input type="text">页</li>
            <li class="sure"><a href="#">确定</a></li>
        </ul>
    </div>
</div>
<?php JsBlock::begin(); ?>
<script type="text/javascript">
    var mySwiper = new Swiper('.swiper-container', {
        autoplay: 5000,
        paginationClickable :true,
        pagination : '.swiper-pagination',
        autoplayDisableOnInteraction:false
    })
</script>
<?php JsBlock::end(); ?>