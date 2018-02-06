<?php
/**
 * Author: druphliu
 * Description
 * Email: druphliu@gmail.com
 * Created at: 2016-04-02 22:55
 */

/**
 * @var $this yii\web\View
 * @var $model frontend\models\Article
 * @var $commentModel frontend\models\Comment
 * @var $prev frontend\models\Article
 * @var $next frontend\models\Article
 * @var $recommends array
 * @var $commentList array
 */

use common\helpers\StringHelper;
use common\models\Options;
use frontend\widgets\ScrollPicView;
use yii\helpers\Url;
use frontend\assets\ViewAsset;
use common\widgets\JsBlock;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = $model->title;

$this->registerMetaTag(['keywords' => $model->seo_keywords]);
$this->registerMetaTag(['description' => $model->seo_description]);
$this->registerMetaTag(['tags' => call_user_func(function()use($model) {
    $tags = '';
    foreach ($model->articleTags as $tag) {
        $tags .= $tag->value . ',';
    }
    return rtrim($tags, ',');
    }
)]);
$this->registerMetaTag(['property' => 'article:author', 'content' => $model->author_name]);
$categoryName = $model->category ? $model->category->name : yii::t('app', 'uncategoried');

ViewAsset::register($this);
?>
<div class="news-box-cont clearfix">
    <div class="content clearfix">
        <div class="news-left-box clearfix">
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
            <div class="news-view">
                <div class="breadcrumbs">
                    <a title="<?=yii::t('frontend', 'Return Home')?>" href="<?= yii::$app->getHomeUrl() ?>"><i class="fa fa-home"></i></a>
                    <small>&gt;</small>
                    <a href="<?= Url::to(['news/index']) ?>"><?= $categoryName ?></a>
                    <small>&gt;</small>
                    <span class="muted"><?= $model->title ?></span>
                </div>
                <header class="article-header">
                    <h1 class="article-title"><a href="<?= Url::to(['news/view', 'id' => $model->id]) ?>"><?= $model->title ?></a></h1>
                    <div class="meta">
                <span id="mute-category" class="muted"><i class="fa fa-list-alt"></i>
                    <a href="<?= Url::to([
                        'news/index',
                        'cat' => $categoryName
                    ]) ?>"> <?= $categoryName ?>
                    </a>
                </span>
                        <span class="muted"><i class="fa fa-user"></i> <a href="">admin</a></span>
                        <time class="muted"><i class="fa fa-clock-o"></i> <?= yii::$app->getFormatter()->asDate($model->created_at) ?></time>
                        <span class="muted"><i class="fa fa-eye"></i> <span id="scanCount"><?= $model->scan_count * 100 ?></span>℃</span>
                        <span class="muted"><i class="fa fa-comments-o"></i>
                    <a href="<?= Url::to([
                        'article/view',
                        'id' => $model->id
                    ]) ?>#comments">
                        <span id="commentCount"><?= $model->comment_count ?></span>
                        <?=yii::t('frontend', 'Comment')?></a>
                </span>
                    </div>
                </header>
                <article class="article-content">
                    <?= $model->articleContent->content ?>
                </article>

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
    SyntaxHighlighter.all();
    $(document).ready(function () {
        $.ajax({
            url:"<?=Url::to(['article/view-ajax'])?>",
            data:{id:<?=$model->id?>},
            success:function (data) {
                $("span.count").html(data.likeCount);
                $("span#scanCount").html(data.scanCount);
                $("span#commentCount").html(data.commentCount);
            }
        });
    })
</script>
<script>with(document)0[(getElementsByTagName("head")[0]||body).appendChild(createElement("script")).src="http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion="+~(-new Date()/36e5)];</script>
<?php JsBlock::end(); ?>
