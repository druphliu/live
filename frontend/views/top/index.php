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
<div class="content">
<div class="grade-box">
    <div class="title clearfix">
        <span class="font"><img src="/static/images/level.png">排行榜</span>
    </div>
    <div class="clearfix">
        <p class="grade-star">明星值</p>
        <div class="grade-time">
            <span class="js_nav-list act">日</span>
            <span class="js_nav-list">周</span>
            <span class="js_nav-list">月</span>
        </div>
    </div>
    <div class="js_news-deta">
        <table class="table">
            <tr class="table-nav">
                <td colspan="3" style="padding-left: 180px !important;">主播</td>
                <td>平台</td>
                <td>分类</td>
                <td>热度</td>
            </tr>
            <?php foreach ($list as $i=>$model){?>
            <tr>
                <td class="tab-num tab-one">
                    <?php if($i<=3){?><h<?=$i+1?>><?=$i+1?></h<?=$i+1?>><?php }else{?>
                            <?= $i+1?>
                    <?php }?>
                </td>
                <td class="tab-video">
                    <div class="tab-live-list">
                        <img src="<?= $model->avatar?>">
                        <label class="tips"><i></i>直播中</label>
                        <i></i>
                    </div>
                </td>
                <td class="tab-anchor"><?=$model->anchor_name?></td>
                <td class="tab-name"><?=$model->platfrom_name?></td>
                <td class="tab-gameName"><?=$model->l_cname?></td>
                <td class="tab-score"><?=$model->hn?></td>
            </tr>
            <?php }?>
        </table>
    </div>
    <div class="js_news-deta">2</div>
    <div class="js_news-deta">3</div>
</div>
</div>
<?php JsBlock::begin(); ?>
<script type="text/javascript">


</script>
<?php JsBlock::end(); ?>
