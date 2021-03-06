<?php
/**
 * Author: druphliu
 * Description
 * Email: druphliu@gmail.com
 * Created at: 2016-06-19 00:21
 */

namespace frontend\widgets;

use yii;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\LinkPager;
use yii\helpers\StringHelper;

class ActivityListView extends \yii\widgets\ListView
{

    public $layout = "<div class=\"activity-list-box js_news-deta\">{items}</div><div class=\"pagination\">{pager}</div>";

    public $pagerOptions = [
        'firstPageLabel' => '首页',
        'lastPageLabel' => '尾页',
        'prevPageLabel' => '上一页',
        'nextPageLabel' => '下一页',
        'options' => [
            'class' => '',
        ],
    ];

    public $template = "<div class=\"activity-list-type clearfix\">
                <div class=\"activity-list-img \"><img src=\"{img_url}\"></div>
                <div class=\"activity-list-text\">
                    <p>【活动标题】{title}</p>
                    <p>【活动时间】{start} 至 {end}</p>
                    <p>【活动地址】{addr}</p>
                    <div>
                        {summary}...
                    </div>
                </div>
                <div class=\"act-more\"><a href=\"{article_url}\"><img src=\"/static/images/act_more.png\"></a></div>
            </div>";

    /**
     * @inheritdoc
     */
    public function init()
    {

        parent::init(); // TODO: Change the autogenerated stub
        $this->itemView = function ($model, $key, $index) {

            //$pubTime = yii::$app->getFormatter()->asDate($model->created_at);
            if (! empty($model->thumb)) {
                $imgUrl = Url::to(['/timthumb.php', 'src'=>$model->thumb, 'h'=>150, 'w'=>220, 'zc'=>0]);
            } else {
                $imgUrl = '/static/images/' . rand(1, 10) . '.jpg';
            }
            $tag='';
            $articleUrl = Url::to(['activity/view', 'id' => $model->id]);
            $summary = StringHelper::truncate($model->summary, 45);
            $title = StringHelper::truncate($model->title, 28);
            $addr = $model->addr;
            return str_replace([
                '{article_url}',
                '{img_url}',
                '{title}',
                '{summary}',
                '{start}',
                '{end}',
                '{addr}'
            ], [
                $articleUrl,
                $imgUrl,
                $title,
                $summary,
                date('Y年-m月-d日', $model->started_at),
                date('Y年-m月-d日', $model->ended_at),
                $addr
            ], $this->template);
        };
    }

    /**
     * @inheritdoc
     */
    public function renderPager()
    {
        $pagination = $this->dataProvider->getPagination();
        if ($pagination === false || $this->dataProvider->getCount() <= 0) {
            return '';
        }
        /* @var $class LinkPager */
        $pager = $this->pager;
        $class = ArrayHelper::remove($pager, 'class', LinkPager::className());
        $pager['pagination'] = $pagination;
        $pager['view'] = $this->getView();
        $pager = array_merge($pager, $this->pagerOptions);
        return $class::widget($pager);
    }

}
