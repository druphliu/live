<?php
/**
 * Author: druphliu
 * Description
 * Email: druphliu@gmail.com
 * Created at: 2017-03-15 21:16
 */

/**
 * @var $this yii\web\View
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $type string
 */

use common\models\Options;
use frontend\assets\NewsAsset;
use yii\helpers\Url;
use frontend\widgets\ArticleListView;
use frontend\controllers\components\Article;
use frontend\widgets\ScrollPicView;
use common\widgets\JsBlock;
use frontend\assets\IndexAsset;
use yii\helpers\StringHelper;

NewsAsset::register($this);
$this->title = yii::$app->feehi->website_title;

$this->registerMetaTag(['keywords' => yii::$app->feehi->seo_keywords]);
$this->registerMetaTag(['description' => yii::$app->feehi->seo_description]);
?>
<div class="news-box-cont clearfix">
    <div class="content clearfix">
        <div class="news-left-box clearfix">
            <div class="actimg-top-left news-banner-rig">
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
            <div class="news-list-img">
                <a href="#"><img src="/static/images/img2.png"></a>
                <a href="#"><img src="/static/images/img2.png"></a>
            </div>
            <div class="label">
                <span>热门标签</span>
                <label>英雄联盟</label>
                <label>守望先锋</label>
                <label>绝地求生</label>
                <label>穿越火线</label>
                <label>DOTA</label>
                <label>全部</label>
            </div>
            <div class="news-latest">
                <div class="title clearfix">
                    <span class="font" style="text-align:center">最新资讯</span>
                    <a href="#" class="more">更多>></a>
                </div>
                <div class="news-latest-box ">
                    <div class="news-latest-list clearfix">
                        <div class="news-latest-img">
                            <img src="/static/images/img2.png">
                        </div>
                        <div class="news-latest-txt">
                            <p><span>[公告]</span>直播平台战队精彩直播精彩队精彩精彩精彩精彩</p>
                            <span class="time"><img src="/static/images/time.png">2018-01-02</span>
                            <div class="txt01">
                                直播平台战队赛季精彩纷呈竞争激烈高手对决不容错队赛季精彩队赛季精彩纷呈队赛季精彩纷呈竞争激竞争激纷过这是一首简单的小情歌战队赛季精彩纷呈竞争亚...
                            </div>
                            <label>英雄联盟</label>
                            <label>守望先锋</label>
                        </div>
                    </div>
                    <div class="news-latest-list clearfix">
                        <div class="news-latest-img">
                            <img src="/static/images/img2.png">
                        </div>
                        <div class="news-latest-txt">
                            <p><span>[公告]</span>直播平台战队精彩直播精彩队精彩精彩精彩精彩</p>
                            <span class="time"><img src="/static/images/time.png">2018-01-02</span>
                            <div class="txt01">
                                直播平台战队赛季精彩纷呈竞争激烈高手对决不容错队赛季精彩队赛季精彩纷呈队赛季精彩纷呈竞争激竞争激纷过这是一首简单的小情歌战队赛季精彩纷呈竞争亚...
                            </div>
                            <label>英雄联盟</label>
                            <label>守望先锋</label>
                        </div>
                    </div>
                    <div class="news-latest-list clearfix">
                        <div class="news-latest-img">
                            <img src="/static/images/img2.png">
                        </div>
                        <div class="news-latest-txt">
                            <p><span>[公告]</span>直播平台战队精彩直播精彩队精彩精彩精彩精彩</p>
                            <span class="time"><img src="/static/images/time.png">2018-01-02</span>
                            <div class="txt01">
                                直播平台战队赛季精彩纷呈竞争激烈高手对决不容错队赛季精彩队赛季精彩纷呈队赛季精彩纷呈竞争激竞争激纷过这是一首简单的小情歌战队赛季精彩纷呈竞争亚...
                            </div>
                            <label>英雄联盟</label>
                            <label>守望先锋</label>
                        </div>
                    </div>
                </div>
            </div>
            <div style="height: 120px;"></div>
        </div>
        <div class="news-right-box">
            <div class="news-right-top">
                <div class="title clearfix">
                    <span class="font" style="text-align:center">热门资讯</span>
                    <a href="#" class="more">更多>></a>
                </div>
                <div class="news-li clearfix">
                    <span class="news-num news-cur">1</span>
                    <div class="news-tit-txt">
                        <p>直播文章报道据说1号</p>
                        <span>直播平台战队赛季精彩纷呈...</span>
                    </div>
                    <label>01-02</label>
                </div>
                <div class="news-li clearfix">
                    <span class="news-num news-cur">2</span>
                    <div class="news-tit-txt">
                        <p>直播文章报道据说1号</p>
                        <span>直播平台战队赛季精彩纷呈...</span>
                    </div>
                    <label>01-02</label>
                </div>
                <div class="news-li clearfix">
                    <span class="news-num news-cur">3</span>
                    <div class="news-tit-txt">
                        <p>直播文章报道据说1号</p>
                        <span>直播平台战队赛季精彩纷呈...</span>
                    </div>
                    <label>01-02</label>
                </div>
                <div class="news-li clearfix">
                    <span class="news-num">4</span>
                    <div class="news-tit-txt">
                        <p>直播文章报道据说1号</p>
                        <span>直播平台战队赛季精彩纷呈...</span>
                    </div>
                    <label>01-02</label>
                </div>
            </div>
            <div class="news-right-img">
                <?php $ad = Options::getAdByName('news_index_right')?>
                <a href="<?=$ad->link?>" target="<?=$ad->target?>" title="<?=$ad->desc?>">
                    <img src="<?=$ad->ad?>" alt="<?=$ad->desc?>" >
                </a>
            </div>
            <div class="contact-us">
                <span><i></i>联系我们</span>
                <p>游戏直播是国内互动直播平台，每个月超过4000万的观众通过游戏直播观看游戏直播。我们希望通过游戏链接来自各地的游戏玩家，他们可以直播游戏、观看游戏一起聊天。希望通过游戏直播拉近你我，带来一丝快乐</p>
                <!--<ul class="clearfix">
                    <li>
                        <img src="/static/images/c01.png">
                        <p>客服</p>
                    </li>
                    <li>
                        <img src="/static/images/c02.png">
                        <p>帮助</p>
                    </li>
                    <li>
                        <img src="/static/images/c03.png">
                        <p>新浪微博</p>
                    </li>
                </ul>-->
                <div class="erweima clearfix">
                    <img src="/static/images/erweiam.png">
                    <div class="erweima-txt">
                        <p>微信公众号：<span>WEIXINBO</span></p>
                        <span>手机扫描二维码或输入微信直播微信账号来添加关注。</span>
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
