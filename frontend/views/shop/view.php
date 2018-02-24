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
                        <div class="preview-b-img"><img src="<?= $model->thumb ?>"></div>
                    </div>
                </div>
                <div class="goods-ctrl-panel border-box dp-ib v-top">
                    <div class="goods-info" _v-add77ee0="">
                        <h2 class="goods-name"><?= $model->name ?></h2>
                        <div class="price">
                            <span class="dp-ib v-b" >价格：</span>
                            <span class="dp-ib v-m price-num" ><?= $model->money ?>积分</span>
                            <span class="vip-tag v-b p-r"><span class="triangle"></span></span>
                        </div>
                    </div>
                    <hr>
                    <div class="gift-ctrl-ctnr">
                        <div style="margin-bottom: 52px" class="spec-ctnr p-relative f-clear">
                            <span class="label f-left">数量</span>
                            <div class="tag-list f-left">
                                <div class="num-select dp-ib v-middle">
                                    <button class="decrease-btn dp-ib pointer v-top disabled">-</button>
                                    <div class="num-input-ctnr dp-ib v-top" >
                                        <input class="num-input t-c" value="1">
                                    </div>
                                    <button class="increase-btn dp-ib pointer v-top">+</button>
                                </div>
                                <span class="stock">库存 <?= $model->stock ?> 件</span>
                            </div>
                        </div>
                        <div class="btn-ctrl p-relative">
                            <a class="btn-default dp-ib border-box t-center buynow colored" href="javascript: void(0)"   style="width: 170px; height: 50px; line-height: 50px;">立即兑换</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="goods-desc-ctnr">
            <h4 class="section-title">商品详情</h4>
            <hr class="divider">
            <div class="goods-desc">
                <?= $model->desc ?>
            </div>
        </div>
    </div>
</div>
</div>
<?php JsBlock::begin(); ?>
<script type="text/javascript">
$('.buynow').click(function () {

})

</script>
<?php JsBlock::end(); ?>
