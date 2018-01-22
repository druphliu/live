<?php
/**
 * Author: druphliu
 * Description
 * Email: druphliu@gmail.com
 * Created at: 2016-03-23 17:51
 */

/**
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $searchModel backend\models\search\ArticleSearch
 */

use backend\grid\DateColumn;
use backend\grid\GridView;
use backend\grid\SortColumn;
use common\widgets\JsBlock;
use yii\helpers\Url;
use common\models\Category;
use common\libs\Constants;
use yii\helpers\Html;
use backend\widgets\Bar;
use yii\widgets\Pjax;
use backend\grid\CheckboxColumn;
use backend\grid\ActionColumn;
use backend\grid\StatusColumn;

$this->title = 'Articles';
$this->params['breadcrumbs'][] = yii::t('app', 'Articles');

?>
<style>
    select.form-control {
        padding: 0px
    }
</style>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <?= Bar::widget() ?>
                <?php Pjax::begin(['id' => 'pjax']); ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        [
                            'class' => CheckboxColumn::className(),
                        ],
                        [
                            'attribute' => 'id',
                        ],
                        [
                            'attribute' => 'cid',
                            'label' => yii::t('app', 'Category'),
                            'value' => function ($model) {
                                return $model->category ? $model->category->name : yii::t('app', 'uncategoried');
                            },
                            'filter' => Category::getCategoriesName(),
                        ],
                        [
                            'class' => SortColumn::className(),
                        ],
                        [
                            'attribute' => 'title',
                            'width' => '170',
                        ],

                        [
                            'attribute' => 'status',
                            'format' => 'raw',
                            'value' => function ($model, $key, $index, $column) {
                                /* @var $model backend\models\Article */
                                return $model['status'] == Constants::YesNo_Yes ? '在线' : '离线';

                            },
                            'filter' => Constants::getArticleStatus(),
                        ],
                        [
                            'class' => DateColumn::className(),
                            'attribute' => 'created_at',
                            'filter' => Html::activeInput('text', $searchModel, 'create_start_at', [
                                    'class' => 'form-control layer-date',
                                    'placeholder' => '',
                                    'onclick' => "laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'});"
                                ]) . Html::activeInput('text', $searchModel, 'create_end_at', [
                                    'class' => 'form-control layer-date',
                                    'placeholder' => '',
                                    'onclick' => "laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})"
                                ]),
                        ],
                        [
                            'class' => DateColumn::className(),
                            'attribute' => 'updated_at',
                            'filter' => Html::activeInput('text', $searchModel, 'update_start_at', [
                                    'class' => 'form-control layer-date',
                                    'placeholder' => '',
                                    'onclick' => "laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})"
                                ]) . Html::activeInput('text', $searchModel, 'update_end_at', [
                                    'class' => 'form-control layer-date',
                                    'placeholder' => '',
                                    'onclick' => "laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})"
                                ]),
                        ],
                        [
                            'class' => ActionColumn::className(),
                            'buttons' => [
                                'view_button' => function ($url, $model, $key) {
                                    return Html::a('<i class="fa  fa-eye" aria-hidden="true"></i> ' . Yii::t('app', 'View'), $model->room_url, [
                                        'title' => Yii::t('app', 'View'),
                                        'data-pjax' => '0',
                                        'class' => 'btn btn-white btn-sm openContab',
                                        'target'=>'_blank'
                                    ]);
                                }
                            ],
                            'template' => '{view_button} {delete}',
                        ],
                    ]
                ]); ?>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>
<?php JsBlock::begin()?>
<script>
    function showImg() {
        t = setTimeout(function () {
        }, 200);
        var url = $(this).attr('img');
        if (url.length == 0) {
            layer.tips('<?=yii::t('app', 'No picture')?>', $(this));
        } else {
            layer.tips('<img src=' + url + '>', $(this));
        }
    }
    $(document).ready(function(){
        var t;
        $('table tr td a.thumbImg').hover(showImg,function(){
            clearTimeout(t);
        });
    });
    var container = $('#pjax');
    container.on('pjax:send',function(args){
        layer.load(2);
    });
    container.on('pjax:complete',function(args){
        layer.closeAll('loading');
        $('table tr td a.thumbImg').bind('mouseover mouseout', showImg);
    });
</script>
<?php JsBlock::end()?>