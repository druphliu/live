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

<div class="video-type-box">
    <div class="content clearfix">
        <div class="game-list-img">
            <?php $ad = Options::getAdByName('game_index_1')?>
            <a href="<?=$ad->link?>" target="<?=$ad->target?>" title="<?=$ad->desc?>">
                <img src="<?=$ad->ad?>" alt="<?=$ad->desc?>" >
            </a>
            <?php $ad = Options::getAdByName('game_index_2')?>
            <a href="<?=$ad->link?>" target="<?=$ad->target?>" title="<?=$ad->desc?>">
                <img src="<?=$ad->ad?>" alt="<?=$ad->desc?>" >
            </a>
        </div>
        <div class="video-type-left show-type-box">
            <div class="title clearfix">
                <span class="font"><?=$type?></span>
            </div>
            <div class="video-type-list show-type-list">
                <?= AnchorListView::widget([
                    'dataProvider' => $dataProvider,
                ]) ?>
            </div>
        </div>
        <!-- 左侧菜单 -->
        <div class="left-menu clearfix">
            <div class="left-menu-cont">
                <?php $cate = \frontend\models\Lcategory::find()->where(['parent_id'=>0])->asArray()->all()?>
                <?php foreach ($cate as $c){?>
                <div class="left-menu-class">
                    <h3><?= $c['name']?></h3>
                    <div class="span">
                        <?php $lcat=\frontend\models\Lcategory::find()->where(['parent_id'=>$c['id']])->asArray()->all();?>
                        <?php foreach ($lcat as $lc){?>
                        <span><a href="<?= Url::to(['game/index','cat'=>$lc['alias']])?>"> <?= $lc['name']?></a></span>
                        <?php }?>
                        <span><a href="<?= Url::to(['game/index','cat'=>$c['alias']])?>">全部</a></span>
                    </div>
                </div>
                <?php }?>
                <div class="left-menu-class">
                    <h3>直播平台</h3>
                    <div class="span">
                        <span>虎牙</span>
                        <span>斗鱼</span>
                        <span>全民</span>
                        <span>战旗</span>
                        <span>熊猫</span>
                        <span>全部</span>
                    </div>
                </div>
            </div>
            <b class="shrink"><img src="/static/images/shrink.png"></b>
        </div>
    </div>
</div>
<?php JsBlock::begin(); ?>
<script type="text/javascript">


</script>
<?php JsBlock::end(); ?>
