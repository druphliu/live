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
use frontend\widgets\AnchorListView;
use yii\helpers\Url;
use common\widgets\JsBlock;
use frontend\assets\IndexAsset;
use yii\helpers\StringHelper;

NewsAsset::register($this);
$this->title = yii::$app->feehi->website_title;

$this->registerMetaTag(['keywords' => yii::$app->feehi->seo_keywords]);
$this->registerMetaTag(['description' => yii::$app->feehi->seo_description]);
?>
<div class="activity-type-box clearfix">
    <div class="content">
        <div class="shop-box-top js_news-deta">
            <?php $ad = Options::getAdByName('shop_index_1')?>
            <a href="<?=$ad->link?>" target="<?=$ad->target?>" title="<?=$ad->desc?>">
                <img src="<?=$ad->ad?>" alt="<?=$ad->desc?>">
            </a>
        </div>
        <div class="shop-class-box">
            <div class="shop-floor">
                <div class="title clearfix">
                    <span class="font"><i>A.</i>精彩推荐</span>
                    <a href="#" class="more">更多>></a>
                </div>
                <ul class="clearfix shop-floor-list">
                    <li>
                        <div class="shop-floor-img"><img src="/static/images/img2.png"></div>
                        <div class="clearfix">
                            <div class="shop-desc">
                                <p>产品名字</p>
                                <p>280.00<span>剩余22</span></p>
                            </div>
                            <div class="shop-btn">
                                <a href="#">立即兑换</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div><img src="/static/images/img2.png"></div>
                        <div class="clearfix">
                            <div class="shop-desc">
                                <p>产品名字</p>
                                <p>280.00<span>剩余22</span></p>
                            </div>
                            <div class="shop-btn">
                                <a href="#">立即兑换</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div><img src="/static/images/img2.png"></div>
                        <div class="clearfix">
                            <div class="shop-desc">
                                <p>产品名字</p>
                                <p>280.00<span>剩余22</span></p>
                            </div>
                            <div class="shop-btn">
                                <a href="#">立即兑换</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div><img src="/static/images/img2.png"></div>
                        <div class="clearfix">
                            <div class="shop-desc">
                                <p>产品名字</p>
                                <p>280.00<span>剩余22</span></p>
                            </div>
                            <div class="shop-btn">
                                <a href="#">立即兑换</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div><img src="/static/images/img2.png"></div>
                        <div class="clearfix">
                            <div class="shop-desc">
                                <p>产品名字</p>
                                <p>280.00<span>剩余22</span></p>
                            </div>
                            <div class="shop-btn">
                                <a href="#">立即兑换</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="shop-floor">
                <div class="title clearfix">
                    <span class="font"><i>B.</i>精彩推荐</span>
                    <a href="#" class="more">更多>></a>
                </div>
                <ul class="clearfix shop-floor-list">
                    <li>
                        <div class="shop-floor-img"><img src="/static/images/img2.png"></div>
                        <div class="clearfix">
                            <div class="shop-desc">
                                <p>产品名字</p>
                                <p>280.00<span>剩余22</span></p>
                            </div>
                            <div class="shop-btn">
                                <a href="#">立即兑换</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div><img src="/static/images/img2.png"></div>
                        <div class="clearfix">
                            <div class="shop-desc">
                                <p>产品名字</p>
                                <p>280.00<span>剩余22</span></p>
                            </div>
                            <div class="shop-btn">
                                <a href="#">立即兑换</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
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


</script>
<?php JsBlock::end(); ?>
