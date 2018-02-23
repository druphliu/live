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
use frontend\models\Scategory;
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
        <div class="shop-class-box shop-class-view">
            <div class="goods-info-ctnr">
                <div class="goods-preview p-relative dp-ib v-top">
                    <div class="preview-top">
                        <div class="preview-b-img"><img src="<?=$model->thumb?>"> </div>
                    </div>
                </div><!--v-component-->
                <div class="goods-ctrl-panel border-box dp-ib v-top"><!--fragment-start--><!--v-start-->
                    <div class="goods-info" _v-add77ee0=""><h2 class="goods-name" _v-add77ee0=""><?=$model->name?></h2>
                        <div class="price" _v-add77ee0="">
                            <span class="dp-ib v-b" _v-add77ee0="">价格：</span>
                            <span class="dp-ib v-m price-num" _v-add77ee0=""><?=$model->money?>积分</span>
                            <span class="vip-tag v-b p-r" _v-add77ee0=""><span class="triangle" _v-add77ee0=""></span></span>
                        </div>
                    </div><!--v-if--><!--v-end--><!--v-component-->
                    <hr>
                    <div class="gift-ctrl-ctnr">
                        <div style="margin-bottom: 52px" class="spec-ctnr p-relative f-clear"><span
                                    class="label f-left">数量</span>
                            <div class="tag-list f-left">
                                <div class="num-select dp-ib v-middle" _v-6146ea94="">
                                    <button class="decrease-btn dp-ib pointer v-top disabled" _v-6146ea94="">-</button>
                                    <div class="num-input-ctnr dp-ib v-top" _v-6146ea94=""><input class="num-input t-c"
                                                                                                  _v-6146ea94="">
                                        <!--v-if--></div>
                                    <button class="increase-btn dp-ib pointer v-top" _v-6146ea94="">+</button>
                                </div><!--v-component--><span class="stock">库存 <?=$model->stock?> 件</span></div>
                        </div>
                        <div class="btn-ctrl p-relative"><a class="btn-default dp-ib border-box t-center buynow colored"
                                                            href="javascript: void(0)"
                                                            style="width: 170px; height: 50px; line-height: 50px;">立即购买</a>
                            <!--v-component--><a class="btn-default dp-ib border-box t-center addcart"
                                                 href="javascript: void(0)"
                                                 style="width: 170px; height: 50px; line-height: 50px;">加入购物车</a>
                            <!--v-component--><span style="color: rgb(228, 12, 12); display: none;"
                                                    class="support-t warn"><i class="iconfont v-m"></i><span
                                        class="v-m">还有东西忘记选呢！</span></span><span
                                    style="color: rgb(228, 12, 12); display: none;" class="support-t warn"><i
                                        class="iconfont v-m"></i><span class="v-m">加入购物车失败, 请稍后再试……</span></span>
                            <div class="cart-panel p-absolute" style="display: none;"><h4 class="panel-title">
                                    成功加入购物车</h4>
                                <div class="panel-info f-clear">
                                    <div class="cart-icon f-left bg-center"></div>
                                    <div class="goods-info f-left"><p>目前选购商品共 <span class="dark-text">0</span> 种</p>
                                        <p><span>总价：</span><span style="margin-left: 32px"
                                                                 class="dark-text">￥0.00</span></p></div>
                                    <a style="margin-top: 8px" class="go-to-cart f-right" href="#!/cart/check">去购物车结算
                                        &gt;</a></div>
                                <div class="ctrl-btns t-center"><a role="button" class="ctrl-btn">关闭</a><a role="button"
                                                                                                           class="ctrl-btn v-link-active"
                                                                                                           href="#!/">去首页逛逛 </a>
                                </div>
                            </div><!--v-component--></div>
                    </div><!--fragment-end--><!--vue-validator--></div><!--v-component--></div>
            <div class="goods-desc-ctnr">
                <h4 class="section-title">商品详情</h4>
                <hr class="divider">
                <div class="goods-desc">
                   <?= $model->desc?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php JsBlock::begin(); ?>
<script type="text/javascript">


</script>
<?php JsBlock::end(); ?>
