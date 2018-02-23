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
<div class="video-type-box margin-top">
    <div class="content clearfix video-content">
        <div class="video-type-left show-type-box">
            <div class="title clearfix">
                <span class="font">人气推荐</span>
            </div>
            <div class="video-type-list show-type-list" style="height: 265px;overflow: hidden">
                <div class="game-live-list">
                    <ul class="clearfix">
                        <?php foreach ($hot as $h){?>
                            <li>
                                <b><?=$h['platfrom_name']?></b>
                                <a href="<?=Url::to(['game/view', 'id' => $h['id']])?>" target='_blank'>
                                    <div class="play-ico">
                                        <img src="<?=$h['snapshot']?>">
                                        <i class="play-icon"></i>
                                    </div>
                                    <div class="game-live-txt clearfix">
                                        <p class="game-title"><?=$h['title']?></p>
                                        <p class="game-type"><?=$h['l_cname']?></p>
                                        <p class="game-name"><?=$h['platfrom_name']?></p>
                                        <p class="game-hot"><img src="/static/images/hot.png"><?=$h['hn']?></p>
                                    </div>
                                </a>
                            </li>
                        <?php }?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="video-type-left show-type-box">
            <div class="title clearfix">
                <span class="font"><img src="/static/images/game.png"><?=$type?></span>
                <?php if(!$category||($category && $category['parent_id']==0)){
                    $parent_id = $category ? $category['id'] : 0;
                    $cates = \frontend\models\Lcategory::find()->where(['parent_id'=>$parent_id])->andWhere(['is_hot'=>1])->asArray()->all();
                }else{
                    $cates = \frontend\models\Lcategory::find()->where(['parent_id'=>$category['parent_id']])->andWhere('id<>'.$category['id'])->asArray()->all();
                }?>
                <?php foreach ($cates as $ce){?>
                    <a href="<?=Url::to(['game/index','cat'=>$ce['alias']])?>"> <span class="font sub_tab" num="1"><?=$ce['name']?></span></a>
                <?php }?>
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
                <ul class="left-menu-list">
                    <li><img src="/static/images/icon01.png"><span>全部直播</span></li>
                    <li><img src="/static/images/icon02.png"><span>全部分类</span></li>
                    <li><img src="/static/images/icon03.png"><span>排行榜</span></li>
                    <li><img src="/static/images/icon03.png"><span>主播招聘</span></li>
                    <li><img src="/static/images/icon03.png"><span>商城</span></li>
                </ul>
                <?php $cate = \frontend\models\Lcategory::find()->where(['id'=>4])->asArray()->all()?>
                <?php foreach ($cate as $c){?>
                    <div class="left-menu-class">
                        <h3><?= $c['name']?></h3>
                        <div class="span">
                            <?php $lcat=\frontend\models\Lcategory::find()->where(['parent_id'=>$c['id']])->asArray()->all();?>
                            <?php foreach ($lcat as $lc){?>
                                <span><a href="<?= Url::to(['show/index','cat'=>$lc['alias']])?>"> <?= $lc['name']?></a></span>
                            <?php }?>
                           <!-- <span><a href="<?/*= Url::to(['show/index','cat'=>$c['alias']])*/?>">全部</a></span>-->
                        </div>
                    </div>
                <?php }?>
                <div class="left-menu-class">
                    <h3>直播平台</h3>
                    <div class="span">
                        <?php $plat =\frontend\models\Platform::find()->where(['status'=>1])->asArray()->all();?>
                        <?php foreach ($plat as $pl){?>
                            <span><a href="<?= Url::to(['show/index','platform'=>$pl['id']])?>"> <?= $pl['name']?></a></span>
                        <?php }?>
                        <span><a href="<?= Url::to(['show/index'])?>">全部</a></span>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="left-menu-bottom">
                    <a href="#">登录</a>
                    <a href="#">注册</a>
                </div>
            </div>
            <b class="shrink"><img src="/static/images/shrink.png"></b>
        </div>
        <div class="left-menu-min">
            <ul class="left-menu-list">
                <li><img src="/static/images/icon01.png"><span>直播</span></li>
                <li><img src="/static/images/icon02.png"><span>分类</span></li>
                <li><img src="/static/images/icon03.png"><span>排行榜</span></li>
                <li><img src="/static/images/icon03.png"><span>商城</span></li>
                <b class="shrink01"><img src="/static/images/shrink01.png"></b>
            </ul>
        </div>
    </div>
</div>
<?php JsBlock::begin(); ?>
<script type="text/javascript">


</script>
<?php JsBlock::end(); ?>
