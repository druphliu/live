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
        <div class="shop-box-top js_news-deta">
            <?php $ad = Options::getAdByName('shop_index_1')?>
            <a href="<?=$ad->link?>" target="<?=$ad->target?>" title="<?=$ad->desc?>">
                <img src="<?=$ad->ad?>" alt="<?=$ad->desc?>">
            </a>
        </div>
        <div class="shop-class-box">
            <?php $cate = Scategory::find()->where(['parent_id'=>0])->asArray()->all();$ll=['A','B','C','D','E','F','G','H','I','J','K','L']?>
            <?php  foreach ($cate as $i=>$c){?>
            <div class="shop-floor">
                <div class="title clearfix">
                    <span class="font"><i><?=$ll[$i]?>.</i><?=$c['name']?></span>
                    <a href="<?=Url::to(['shop/index','cat'=>$c['alias']])?>" class="more">更多>></a>
                </div>
                <?php $cates = \yii\helpers\ArrayHelper::getColumn(Scategory::find()->where(['parent_id'=>$c['id']])->asArray()->all(),'id');
                $cates= array_merge($cates,[$c['id']]);
                $list = \frontend\models\Goods::find()->where(['in', 's_cid',$cates])->asArray()->all();?>
                <ul class="clearfix shop-floor-list">
                    <?php foreach ($list as $l){?>
                    <li>
                        <div class="shop-floor-img"><img src="<?= $l['thumb']?>"></div>
                        <div class="clearfix">
                            <div class="shop-desc">
                                <p><?= $l['name']?></p>
                                <p><?= $l['money']?><span>剩余<?= $l['stock']?></span></p>
                            </div>
                            <div class="shop-btn">
                                <a href="<?=Url::to(['shop/view','id'=>$l['id']])?>">立即兑换</a>
                            </div>
                        </div>
                    </li>
                    <?php }?>
                </ul>
            </div>
            <?php }?>
        </div>
    </div>
</div>
<?php JsBlock::begin(); ?>
<script type="text/javascript">


</script>
<?php JsBlock::end(); ?>
