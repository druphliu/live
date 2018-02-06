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
        <span class="activity-type-nav act"><a href="<?=Url::to(['recruit/index'])?>" >平台主播招募</a></span>
        <span class="activity-type-nav"><a href="<?=Url::to(['recruit/index','type'=>1])?>" >活动主播招募</a></span>

        <?= \frontend\widgets\ActivityListView::widget([
            'dataProvider' => $dataProvider,
        ]);
     ?>
    </div>
</div>

<?php JsBlock::begin(); ?>
<script type="text/javascript">


</script>
<?php JsBlock::end(); ?>
