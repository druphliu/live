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
    <div class="activity-imgBox clearfix">
        <?php $first = current($top)?>
        <div class="actimg-top-left"><a href="<?=Url::to(['activity/view','id'=>$first['id']])?>"> <img src="<?=$first['banner']?>"></a></div>
        <div class="actimg-top-right clearfix">
            <ul class="activity-rig-list">
                <?php foreach ($top as $i=>$t){
                    if($i==0)
                        continue;
                        ?>
                    <li><a href="<?=Url::to(['activity/view','id'=>$t['id']])?>"> <img src="<?=$t['banner']?>"></a></li>
                <?php }?>
            </ul>
        </div>
    </div>
</div>
<div class="activity-type-box">
    <div class="content">
        <div class="recruit_main">
            <div class="recruit_logo clearfix">
                <div class="recruit_logo_left fl">
                    <div class="recruit_logo_left_main fl">
                        <h3><?= $model->title?></h3>
                        <p><span class="first">招募时间：<strong><?= date('Y-m-d',$model->started_at)?> 至 <?= date('Y-m-d',$model->ended_at)?></strong></span>
                            <span>招募人数：<strong><?= $model->s_num?>/<?= $model->num?> 人</strong></span></p>
                        <p>
                            <?php if($model->type==0){?>
                            <span class="first">活动地址：<strong><?=$model->addr?></strong></span>
                            <?php }else{?>
                                <span class="first">招募平台：<strong><?=$model->addr?></strong></span>
                            <?php }?>
                        </p>
                        <p>
                            <span class="first">招募奖励：<strong><?=$model->prize?></strong></span>
                        </p>

                    </div>
                </div>
                <div class="recruit_logo_right fl">
                    <a href="#" class="zhubo_apply " data-need-check="1">
                        <i class="zhubo_apply_icon_l"></i>
                        主播申请                                    <b class="zhubo_apply_icon_r"></b>
                    </a>
                </div>
            </div>
            <div class="recruit_area">
                <?= $model->desc?>
            </div>
        </div>
    </div>
</div>

<?php JsBlock::begin(); ?>
<script type="text/javascript">


</script>
<?php JsBlock::end(); ?>
