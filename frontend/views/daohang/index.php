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
<div class="activity-type-box clearfix" style="margin-top: 77px">
    <div class="content">
        <div class="shop-box-top js_news-deta">
            <?php $ad = Options::getAdByName('daohang_index_1')?>
            <a href="<?=$ad->link?>" target="<?=$ad->target?>" title="<?=$ad->desc?>">
                <img src="<?=$ad->ad?>" alt="<?=$ad->desc?>">
            </a>
        </div>
        <div class="shop-class-box">
                <div class="shop-floor">
                    <div class="title clearfix">
                        <span class="font"><i>直播平台</i></span>
                    </div>
                    <?php
                    $list = \frontend\models\Daohang::find()->where(['type'=>1])->asArray()->all(); ?>
                    <ul class="clearfix daohang-floor-list">
                        <?php foreach ($list as $l) { ?>
                            <li>
                                <a href="<?= $l['url'] ?>" target="_blank">
                                <div class="daohang-floor-img"><img src="<?= $l['image'] ?>"></div>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            <div class="shop-floor">
                <div class="title clearfix">
                    <span class="font"><i>小视频平台</i></span>
                </div>
                <?php
                $list = \frontend\models\Daohang::find()->where(['type'=>2])->asArray()->all(); ?>
                <ul class="clearfix daohang-floor-list">
                    <?php foreach ($list as $l) { ?>
                        <li>
                            <a href="<?= $l['url'] ?>" target="_blank">
                                <div class="daohang-floor-img"><img src="<?= $l['image'] ?>"></div>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="shop-floor">
                <div class="title clearfix">
                    <span class="font"><i>电视台</i></span>
                </div>
                <?php
                $list = \frontend\models\Daohang::find()->where(['type'=>3])->asArray()->all(); ?>
                <ul class="clearfix daohang-floor-list">
                    <?php foreach ($list as $l) { ?>
                        <li>
                            <a href="<?= $l['url'] ?>" target="_blank">
                                <div class="daohang-floor-img"><img src="<?= $l['image'] ?>"></div>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="shop-floor">
                <div class="title clearfix">
                    <span class="font"><i>广播电台</i></span>
                </div>
                <?php
                $list = \frontend\models\Daohang::find()->where(['type'=>4])->asArray()->all(); ?>
                <ul class="clearfix daohang-floor-list">
                    <?php foreach ($list as $l) { ?>
                        <li>
                            <a href="<?= $l['url'] ?>" target="_blank">
                                <div class="daohang-floor-img"><img src="<?= $l['image'] ?>"></div>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php JsBlock::begin(); ?>
<script type="text/javascript">


</script>
<?php JsBlock::end(); ?>
