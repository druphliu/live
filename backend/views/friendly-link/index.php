<?php
/**
 * Author: druphliu
 * Description
 * Email: druphliu@gmail.com
 * Created at: 2016-03-21 14:14
 */

/**
 * @var $this yii\web\View
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $searchModel backend\models\search\FriendlyLinkSearch
 */

use backend\grid\DateColumn;
use backend\grid\GridView;
use backend\grid\SortColumn;
use backend\grid\StatusColumn;
use backend\widgets\Bar;
use yii\helpers\Html;
use backend\grid\CheckboxColumn;
use backend\grid\ActionColumn;
use common\libs\Constants;

$this->title = "Friendly Links";
$this->params['breadcrumbs'][] = yii::t('app', 'Friendly Links');
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <?= Bar::widget() ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        [
                            'class' => CheckboxColumn::className(),
                        ],
                        [
                            'attribute' => 'name'
                        ],
                        [
                            'attribute' => 'url',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Html::a($model->url, $model->url, ['target' => '_blank']);
                            }
                        ],
                        [
                            'class' => SortColumn::className()
                        ],
                        [
                            'class' => StatusColumn::className(),
                            'filter' => Constants::getYesNoItems(),
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
                        ]
                    ]
                ]) ?>
            </div>
        </div>
    </div>
</div>