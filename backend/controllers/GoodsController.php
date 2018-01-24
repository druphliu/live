<?php
/**
 * Author: druphliu
 * Description
 * Email: druphliu@gmail.com
 * Created at: 2016-03-23 15:13
 */

namespace backend\controllers;

use backend\models\Goods;
use backend\models\search\GoodsSearch;
use yii;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\IndexAction;
use backend\actions\ViewAction;
use backend\actions\DeleteAction;
use backend\actions\SortAction;

class GoodsController extends \yii\web\Controller
{

    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function(){
                    $searchModel = new GoodsSearch(['scenario' => 'anchor']);
                    $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ];
                }
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => Goods::className(),
                'scenario' => 'article',
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => Goods::className(),
                'scenario' => 'article',
            ],
            'view-layer' => [
                'class' => ViewAction::className(),
                'modelClass' => Goods::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Goods::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => Goods::className(),
            ],
        ];
    }

}