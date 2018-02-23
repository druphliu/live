<?php
/**
 * Author: druphliu
 * Description
 * Email: druphliu@gmail.com
 * Created at: 2017-03-15 21:16
 */

/* @var $this \yii\web\View */

/* @var $content string */

use common\helpers\StringHelper;
use common\models\Options;
use frontend\models\Lcategory;
use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\helpers\Url;
use frontend\widgets\MenuView;

\frontend\assets\IndexAsset::register($this);

?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <meta charset="<?= yii::$app->charset ?>">
        <?= Html::csrfMetaTags() ?>
        <meta http-equiv="X-UA-Compatible" content="IE=10,IE=9,IE=8">
        <meta name="viewport"
              content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    </head>
    <?php $this->beginBody() ?>
    <body>
    <div class="margin-top">
     <div class="section01 index" >
         <?php $ad = Options::getAdByName('index_back')?>
         <a href="<?=$ad->link?>" target="<?=$ad->target?>" title="<?=$ad->desc?>">
             <img src="<?=$ad->ad?>" alt="<?=$ad->desc?>"  class="banner">
         </a>
         <div class="page-container content-width">
             <div class="nav clearfix">
                 <img src="/static/images/logo.png" class="logo">
                 <?= MenuView::widget() ?>
                 <div class="login-register">
                     <?php
                     if (yii::$app->user->isGuest) {
                         ?>
                         <a href="<?= Url::to(['site/login']) ?>"
                            class="signin-loader"><?= yii::t('frontend', 'Hi, Log in') ?></a><i></i>
                         <a href="<?= Url::to(['site/signup']) ?>"
                            class="signup-loader"><?= yii::t('frontend', 'Sign up') ?></a>
                     <?php } else { ?>
                         <a href="<?= Url::to(['user/index']) ?>"><?= Html::encode(yii::$app->user->identity->username) ?></a>
                         <i></i>
                         <a href="<?= Url::to(['site/logout']) ?>"
                            class="signup-loader"><?= yii::t('frontend', 'Log out') ?></a>
                     <?php } ?>
                 </div>
             </div>
         </div>
        <div class="content">

            <div class="recommend clearfix">
                <div class="recommend-lef">
                    <div class="rec-title">
                        <div class="title clearfix">
                            <span class="font"><img src="/static/images/icon1.png">LG资讯</span>
                            <a href="<?= Url::to(['news/index'])?>" target="_blank" class="more">更多>></a>
                        </div>
                    </div>
                    <div class="list-box">

                        <ul>
                            <?php foreach ($news as $i=>$new){?>
                            <?php if($i==0){?>
                                    <a href="<?= Url::to(['news/view','id'=>$new['id']])?>" target="_blank"><p class="font list-box-tit"><?= StringHelper::truncate($new['title'],15)?></p></a>
                            <?php }else{?>
                            <li>
                                <p class="news-tit">
                                    <span>[<?= $new['category']['name']?>]</span>
                                    <a href="<?= Url::to(['news/view','id'=>$new['id']])?>" target="_blank"><?= $new['title']?></a>
                                </p>
                                <img src="/static/images/rig.png" class="rig">
                                <div class="desc"><img src="/static/images/hot.png" class="hot">
                                    <div class="txt"><?= $new['summary']?></div></div>
                            </li>
                            <?php }?>
                            <?php }?>
                        </ul>
                    </div>
                </div>
                <div class="recommend-rig">
                    <div class="star-title">
                        <div class="title clearfix">
                            <span class="font"><img src="/static/images/icon1.png">明星大神</span>
                            <a href="<?= Url::to(['game/index'])?>" target="_blank" class="more">更多>></a>
                        </div>
                    </div>
                    <div class="">
                        <div class="star_box">
                            <div class="star-bd-tabox">
                                <div class="star-bd">
                                    <div class="star-content">
                                        <div class="star-wrap">
                                            <ul class="star-list clear_fix">
                                                <?php foreach ($live as $i=>$l){?>
                                                <li class="star-item <?php if($i==0){?>active<?php }?>">
                                                    <div class="pic">
                                                        <a href="<?= Url::to(['live/view','id'=>$l['id']])?>">
                                                            <img src="<?=$l['avatar']?>">
                                                        </a>
                                                    </div>
                                                    <i class="live-flag"><span class="live-icon"></span>直播中</i>
                                                </li>
                                                <?php if($i==5){break;}}?>
                                            </ul>
                                        </div>
                                        <div class="star-wrap">
                                            <ul class="star-list clear_fix">
                                                <?php foreach ($live as $i=>$l){if($i>5){?>
                                                    <li class="star-item <?php if($i==6){?>active<?php }?>">
                                                        <div class="pic">
                                                            <a href="<?= Url::to(['live/view','id'=>$l['id']])?>">
                                                                <img src="<?=$l['avatar']?>">
                                                            </a>
                                                        </div>
                                                        <i class="live-flag"><span class="live-icon"></span>直播中</i>
                                                    </li>
                                                    <?php }}?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section02">
        <div class="content">
            <?php $ad = Options::getAdByName('index_main_1')?>
            <a href="<?=$ad->link?>" target="<?=$ad->target?>" title="<?=$ad->desc?>">
                <img src="<?=$ad->ad?>" alt="<?=$ad->desc?>" class="banner1">
            </a>
        </div>
    </div>
    <div class="section03">
        <div class="content clearfix">
            <div class="game-live-box">
                <div class="game-live-title">
                    <div class="title clearfix">
                        <span class="font js_nav-list"><img src="/static/images/game.png">热门游戏</span>
                        <span class="font js_nav-list index_sub_tab"><img src="/static/images/game_gray.png">星秀专场</span>
                    </div>
                    <div class="game-live-list js_news-deta">
                        <ul class="clearfix">
                            <?php foreach ($hot_live as $h){?>
                            <li>
                                <a href="<?= Url::to(['live/view','id'=>$h['id']])?>">
                                    <div class="play-ico">
                                        <img src="<?= $h['snapshot']?>">
                                        <i class="play-icon"></i>
                                    </div>
                                    <div class="game-live-txt clearfix">
                                        <p class="game-title"><?= $h['title']?></p>
                                        <p class="game-type"><?= $h['l_cname']?></p>
                                        <p class="game-name"><?= $h['anchor_name']?></p>
                                        <p class="game-hot"><img src="/static/images/hot.png"><?= $h['hn']?></p>
                                    </div>
                                </a>
                            </li>
                            <?php }?>
                        </ul>
                    </div>
                    <div class="game-live-list js_news-deta">
                        <?php foreach ($hot_show_live as $h){?>
                            <li>
                                <a href="<?= Url::to(['live/view','id'=>$h['id']])?>">
                                    <div class="play-ico">
                                        <img src="<?= $h['snapshot']?>">
                                        <i class="play-icon"></i>
                                    </div>
                                    <div class="game-live-txt clearfix">
                                        <p class="game-title"><?= $h['title']?></p>
                                        <p class="game-type"><?= $h['l_cname']?></p>
                                        <p class="game-name"><?= $h['anchor_name']?></p>
                                        <p class="game-hot"><img src="/static/images/hot.png"><?= $h['hn']?></p>
                                    </div>
                                </a>
                            </li>
                        <?php }?></div>
                </div>
            </div>
            <div class="level-box">
                <div class="level-box-title">
                    <div class="title clearfix">
                        <span class="font"><img src="/static/images/level.png">排行榜</span>
                        <a href="<?=Url::to(['top/index'])?>" class="more">更多>></a>
                    </div>
                </div>
                <div class="level-list">
                    <ul>
                    <?php foreach ($top as $i=>$model){$i++;?>
                        <li>
                            <span class="<?php if($i==1){?>one<?php }?>"><?= $i ?></span>
                            <a href="<?= Url::to(['live/view','id'=>$model->id])?>">
                                <div class="level-list-li clearfix">
                                    <div class="min-live-list">
                                        <i><img src="<?= $model->avatar?>"> </i>
                                    </div>
                                    <div class="min-live-txt">
                                        <p><?= $model->anchor_name?></p>
                                        <span><?= $model->platfrom_name?></span>
                                    </div>
                                </div>
                            </a>
                            <a href="<?= Url::to(['live/view','id'=>$model->id])?>"><img src="/static/images/rig.png" class="rig"></a>
                        </li>
                    <?php }?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="section04">
        <div class="content clearfix">
            <div class="welfare-video clearfix">
                <div class="banner2">
                        <?php $ad = Options::getAdByName('index_main_2')?>
                        <a href="<?=$ad->link?>" target="<?=$ad->target?>" title="<?=$ad->desc?>">
                            <img src="<?=$ad->ad?>" alt="<?=$ad->desc?>">
                        </a>
                    </div>
                <div class="index-video-box">
                    <div class="min-cont">
                        <div class="title clearfix">
                            <span class="font"><img src="/static/images/video.png">精彩视频</span>
                            <a href="<?=Url::to(['live/index','cat'=>'jdqs'])?>"> <span class="font sub_tab" num="1" style="line-height:26px;width: 90px">绝地求生</span></a>
                            <a href="<?=Url::to(['live/index','cat'=>'dnf'])?>"> <span class="font sub_tab" num="1" style="line-height:26px;width: 90px">DNF</span></a>
                            <a href="<?=Url::to(['live/index','cat'=>'wzry'])?>"> <span class="font sub_tab" num="1" style="line-height:26px;width: 90px">王者荣耀</span></a>
                            <a href="<?=Url::to(['live/index'])?>" class="more">更多>></a>
                        </div>
                        <div class="game-live-list">
                            <ul class="clearfix">
                                <?php foreach ($top_video as $t){?>
                                <li>
                                    <a href="<?=Url::to(['live/view','id'=>$t['id']])?>">
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
                </div>
                <div class="welfare-box">
                    <div class="min-cont">
                        <div class="title clearfix">
                            <span class="font"><img src="/static/images/welfare.png">新上福利</span>
                            <a href="<?=Url::to(['shop/index'])?>" class="more">更多>></a>
                        </div>
                        <div class="welfare-img"><a href="#"><img src="/static/images/img5.png"></a></div>
                        <div class="welfare-img"><a href="#"><img src="/static/images/img5.png"></a></div>
                        <div class="welfare-img"><a href="#"><img src="/static/images/img5.png"></a></div>
                        <div class="welfare-img"><a href="#"><img src="/static/images/img5.png"></a></div>
                    </div>
                </div>
            </div>
            <div class="banner3">
                <?php $ad = Options::getAdByName('index_right_1')?>
                <a href="<?=$ad->link?>" target="<?=$ad->target?>" title="<?=$ad->desc?>">
                    <img src="<?=$ad->ad?>" alt="<?=$ad->desc?>" >
                </a>
            </div>
            <div class="banner3">
                <?php $ad = Options::getAdByName('index_right_1')?>
                <a href="<?=$ad->link?>" target="<?=$ad->target?>" title="<?=$ad->desc?>">
                    <img src="<?=$ad->ad?>" alt="<?=$ad->desc?>" >
                </a>
            </div>
        </div>
    </div>
    <div class="section05 clearfix">
        <div class="content">
            <div class="class-box clearfix">
                <div class="class-box-cont">
                    <div class="title clearfix">
                        <span class="font"><img src="/static/images/welfare.png">热门分类</span>
                        <a href="<?=Url::to(['game/index'])?>" class="more">更多>></a>
                    </div>
                    <ul class="class-box-list clearfix">
                        <?php foreach ($category as $c){?>
                        <li>
                            <a href="<?=Url::to(['game/index','cat'=>$c['alias']])?>">
                            <img src="<?=$c['icon']?>">
                            <p><?=$c['name']?></p>
                            </a>
                        </li>
                        <?php }?>
                    </ul>
                </div>
            </div>
            <div class="activity-box">
                <div class="activity-box-min">
                    <div class="title clearfix">
                        <span class="font"><img src="/static/images/activity.png">精彩活动</span>
                        <a href="<?=Url::to(['activity/index'])?>" class="more" target="_blank">更多>></a>
                    </div>
                    <ul class="activity-list clearfix">
                        <?php foreach ($activity as $ac){?>
                        <li><a href="<?=Url::to(['activity/view','id'=>$ac['id']])?>" target="_blank"> <img src="<?= $ac['banner']?>"></a></li>
                        <?php }?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
     <div class="video-type-box index-video-type-box">
         <div class="content clearfix">
             <div class="index-game-list-img">
                 <?php $ad = Options::getAdByName('index_main_3')?>
                 <a href="<?=$ad->link?>" target="<?=$ad->target?>" title="<?=$ad->desc?>">
                     <img src="<?=$ad->ad?>" alt="<?=$ad->desc?>" class="banner1">
                 </a>
                 <?php $ad = Options::getAdByName('index_main_4')?>
                 <a href="<?=$ad->link?>" target="<?=$ad->target?>" title="<?=$ad->desc?>">
                     <img src="<?=$ad->ad?>" alt="<?=$ad->desc?>" class="banner1">
                 </a>

             </div>
             <?php foreach ($hot_cate as $hc){?>
                 <?php $cates = Lcategory::find()->where(['parent_id'=>$hc['id'],'is_hot'=>1])->asArray()->all()?>
             <div class="index-live-box">
                 <div class="index-live-box-cont">
                 <div class="title clearfix">
                     <span class="font"><?=$hc['name']?></span>
                     <?php foreach ($cates as $c){?>
                     <a href="<?=Url::to(['live/index','cat'=>$c['alias']])?>"> <span class="font sub_tab" num="1"><?=$c['name']?></span></a>
                    <?php }?>
                     <a href="<?=Url::to(['game/index','cat'=>$hc['alias']])?>" class="more">更多>></a>
                 </div>
                 <div class="video-type-list show-type-list">
                     <?php $list=\frontend\models\Anchor::find()->where(['l_cid'=>$hc['id']])->andWhere('snapshot is not null')->orderBy('hn desc')->asArray()->limit(15)->all();?>
                     <div class="game-live-list">
                         <ul class="clearfix">
                             <?php foreach ($list as $l){?>
                             <li>
                                 <b><?=$l['platfrom_name']?></b>
                                 <a href="<?= Url::to(['game/view','id'=>$l['id']])?>">
                                     <div class="play-ico">
                                         <img src="<?=$l['snapshot']?>">
                                         <i class="play-icon"></i>
                                     </div>
                                     <div class="game-live-txt clearfix">
                                         <p class="game-title"><?=$l['title']?></p>
                                         <p class="game-type"><?=$l['l_cname']?></p>
                                         <p class="game-name"><?=$l['anchor_name']?></p>
                                         <p class="game-hot"><img src="/static/images/hot.png"><?=$l['hn']?></p>
                                     </div>
                                 </a>
                             </li>
                        <?php }?>
                         </ul>
                     </div>
                 </div>
                 </div>
             </div>
                <?php }?>
         </div>
     </div>
    <div class="section05">
            <?php echo $this->renderFile('@app/views/layouts/footer.php');?>
        </div>
    </div>
    </body>
    <?php $this->endBody() ?>
    <?php
    if (yii::$app->feehi->website_statics_script) {
        echo yii::$app->feehi->website_statics_script;
    }
    ?>
    </html>
<?php $this->endPage() ?>