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
use frontend\models\Article;
use yii\data\ArrayDataProvider;
use yii\helpers\Url;
use frontend\widgets\ArticleListView;
use frontend\widgets\ScrollPicView;
use common\widgets\JsBlock;
use frontend\assets\IndexAsset;
use yii\helpers\StringHelper;

NewsAsset::register($this);
$this->title = yii::$app->feehi->website_title;

$this->registerMetaTag(['keywords' => yii::$app->feehi->seo_keywords]);
$this->registerMetaTag(['description' => yii::$app->feehi->seo_description]);
?>
<div class="news-box-cont clearfix">
    <div class="content clearfix">
        <div class="news-left-box ">
            <div class="clearfix">
            <div class="actimg-top-left news-banner-rig">
                <?= ScrollPicView::widget([
                    'banners' => Options::getBannersByType('index'),
                ]) ?>
            </div>
            <div class="news-list-img">
                <?php foreach ($top as $t){?>
                <a title='<?=$t['title']?>' target='_blank' href='<?=Url::to(['news/view','id'=>$t['id']])?>'>
                    <img src='<?=$t['thumb']?>' style='display: inline;' alt='<?=$t['title']?>'>
                </a>
                <?php }?>
            </div>
            </div>
            <div class="label">
                <span>热门标签</span>
                <?php
                $tags = frontend\controllers\components\Article::getHotestTags(9);
                foreach ($tags as $k => $v) {
                    echo "<label><a title='' href='" . Url::to([
                            '/tag/' . $k,
                        ]) . "' data-original-title='{$v}" . yii::t('frontend', ' Topics') . "'>{$k}</a></label>";
                }
                ?>
            </div>
            <div class="news-latest">
                <div class="title clearfix">
                    <span class="font" style="text-align:center"><?=$type?></span>
                </div>
                <div class="news-latest-box ">
                    <?= ArticleListView::widget([
                        'dataProvider' => $dataProvider,
                    ]) ?>
                </div>

            </div>
            <div style="height: 120px;"></div>
        </div>
        <div class="news-right-box">
            <div class="news-right-top">
                <div class="title clearfix">
                    <span class="font" style="text-align:center">热门资讯</span>
                </div>
                <?php
                foreach ($roll as $i=>$article) {
                    $i+=1;
                    $url = Url::to(['news/view', 'id' => $article->id]);
                    $article->created_at = yii::$app->formatter->asDate($article->created_at,'M-d');
                    echo "
                <div class=\"news-li clearfix\">
                    <span class=\"news-num news-cur\">".$i."</span>
                    <div class=\"news-tit-txt\">
                        <a href='{$url}' target='_blank'> <p>".StringHelper::truncate($article->title,10)."
                        </p></a>
                        <span>".StringHelper::truncate($article->summary,15)."</span>
                    </div>
                    <label>{$article->created_at}</label>
                </div>";
                }
                ?>
            </div>
            <div class="news-right-img">
                <?php $ad = Options::getAdByName('news_index_right')?>
                <a href="<?=$ad->link?>" target="<?=$ad->target?>" title="<?=$ad->desc?>">
                    <img src="<?=$ad->ad?>" alt="<?=$ad->desc?>" >
                </a>
            </div>
            <div class="contact-us">
                <span><i></i>联系我们</span>
                <p>游戏直播是国内互动直播平台，每个月超过4000万的观众通过游戏直播观看游戏直播。我们希望通过游戏链接来自各地的游戏玩家，他们可以直播游戏、观看游戏一起聊天。希望通过游戏直播拉近你我，带来一丝快乐</p>
                <!--<ul class="clearfix">
                    <li>
                        <img src="/static/images/c01.png">
                        <p>客服</p>
                    </li>
                    <li>
                        <img src="/static/images/c02.png">
                        <p>帮助</p>
                    </li>
                    <li>
                        <img src="/static/images/c03.png">
                        <p>新浪微博</p>
                    </li>
                </ul>-->
                <div class="erweima clearfix">
                    <img src="/static/images/erweiam.png">
                    <div class="erweima-txt">
                        <p>微信公众号：<span>WEIXINBO</span></p>
                        <span>手机扫描二维码或输入微信直播微信账号来添加关注。</span>
                    </div>
                </div>
            </div>
        </div>

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
