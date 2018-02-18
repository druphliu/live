<?php
/**
 * Created by PhpStorm.
 * User: druphliu
 * Date: 2018/2/17
 * Time: 0:26
 */

use common\models\Options;
use common\widgets\JsBlock;
use frontend\assets\NewsAsset;
use frontend\widgets\ScrollPicView;
use yii\helpers\Url;

NewsAsset::register($this);
$this->title = yii::$app->feehi->website_title;

$this->registerMetaTag(['keywords' => yii::$app->feehi->seo_keywords]);
$this->registerMetaTag(['description' => yii::$app->feehi->seo_description]);
?>
<div class="content">
<div class="activity-imgBox clearfix">
    <div class="actimg-top-left">
        <?= ScrollPicView::widget([
            'banners' => Options::getBannersByType('live'),
        ]) ?>
    </div>
    <div class="actimg-top-right clearfix">
        <ul class="activity-rig-list">
            <?php foreach ($top as $t){?>
            <li> <a title='<?=$t['title']?>' target='_blank' href='<?=Url::to(['live/view','id'=>$t['id']])?>'>
                    <img src='<?=$t['thumb']?>' style='display: inline;' alt='<?=$t['title']?>'>
                </a></li>
            <?php }?>
        </ul>
    </div>
</div>
</div>
<div class="video-type-box">
    <div class="content clearfix">
        <div class="video-type-right">
            <div class="title clearfix">
                <span class="font"><img src="/static/images/video.png">热门视频</span>
            </div>
            <div class="game-live-list">
                <ul class="clearfix">
                    <?php foreach ($hot as $t){?>
                        <li>
                            <a title='<?=$t['title']?>' target='_blank' href='<?=Url::to(['live/view','id'=>$t['id']])?>'>
                                <div class="play-ico">
                                    <img src='<?=$t['thumb']?>' style='display: inline;' alt='<?=$t['title']?>'>
                                    <i class="play-icon"></i>
                                </div>
                                <div class="game-live-txt clearfix">
                                    <p class="game-title"><?=$t['title']?></p>
                                    <p class="game-hot"><img src="/static/images/hot.png"><?=$t['hn']?></p>
                                </div>
                            </a>
                        </li>
                    <?php }?>
                </ul>
            </div>
        </div>
        <?php $pcat = \frontend\models\VCategory::find()->where(['parent_id'=>0])->asArray()->all();?>
        <?php foreach ($pcat as $hc){?>
            <?php $cate = \frontend\models\VCategory::find()->where(['parent_id'=>$hc['id']])->limit(5)->asArray()->all();?>
            <div class="video-type-left">
                <div class="title clearfix">
                    <span class="font"><?=$hc['name']?></span>
                    <?php foreach ($cate as $i=>$c){?>
                    <label class="js_nav-list <?php if($i==0){?>act<?php }?>"><?=$c['name']?></label>
                    <?php }?>
                </div>
                <?php foreach ($cate as $i=>$c){?>
                <?php echo $c['id'];$list = \frontend\models\Video::find()->where(['v_cid'=>$c['id']])->andWhere('thumb<>""')->asArray()->limit(20)->all()?>
                    <div class="video-type-list js_news-deta">
                        <div class="game-live-list">
                            <ul class="clearfix">
                                <?php foreach ($list as $i=>$l){?>
                                    <li>
                                        <a title='<?=$l['title']?>' target='_blank' href='<?=Url::to(['live/view','id'=>$l['id']])?>'>
                                            <div class="play-ico">
                                                <img src="<?=$l['thumb']?>">
                                                <i class="play-icon"></i>
                                            </div>
                                            <div class="game-live-txt clearfix">
                                                <p class="game-title"><?=$l['title']?></p>
                                                <p class="game-hot"><img src="/static/images/hot.png"><?=$l['hn']?></p>
                                            </div>
                                        </a>
                                    </li>
                                <?php }?>
                            </ul>
                        </div>
                    </div>
                <?php }?>
            </div>
        <?php }?>
    </div>
</div>
<?php JsBlock::begin(); ?>
<script type="text/javascript">
    var mySwiper = new Swiper('.swiper-container', {
        autoplay: 5000,
        paginationClickable :true,
        pagination : '.swiper-pagination',
        autoplayDisableOnInteraction:false
    })
</script>
<?php JsBlock::end(); ?>