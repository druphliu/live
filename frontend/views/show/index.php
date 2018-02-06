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
                <span class="font"><img src="/static/images/game.png"><?=$type?></span>
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
                <div class="left-menu-class">
                    <h3>网游竞技</h3>
                    <div class="span">
                        <span>英雄联盟</span>
                        <span>守望先锋</span>
                        <span>绝地求生</span>
                        <span>穿越火线</span>
                        <span>DOTA</span>
                        <span>全部</span>
                    </div>
                </div>
                <div class="left-menu-class">
                    <h3>休闲手游</h3>
                    <div class="span">
                        <span>王者荣耀</span>
                        <span>黄岛特训</span>
                        <span>阴阳师</span>
                        <span>火影忍者</span>
                        <span>我的世界</span>
                        <span>全部</span>
                    </div>
                </div>
                <div class="left-menu-class">
                    <h3>娱乐天地</h3>
                    <div class="span">
                        <span>星秀</span>
                        <span>美食</span>
                        <span>户外</span>
                        <span>颜值</span>
                        <span>二次元</span>
                        <span>全部</span>
                    </div>
                </div>
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
