<?php
/**
 * Author: druphliu
 * Description
 * Email: druphliu@gmail.com
 * Created at: 2016-03-23 15:13
 */

namespace backend\controllers;

use backend\models\Activity;
use backend\models\search\ActivitySearch;
use yii;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\IndexAction;
use backend\actions\ViewAction;
use backend\actions\DeleteAction;
use backend\actions\SortAction;

class ActivityController extends \yii\web\Controller
{

    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function(){
                    $searchModel = new ActivitySearch(['scenario' => 'anchor']);
                    $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ];
                }
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => Activity::className(),
                'scenario' => 'article',
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => Activity::className(),
                'scenario' => 'article',
            ],
            'view-layer' => [
                'class' => ViewAction::className(),
                'modelClass' => Activity::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Activity::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => Activity::className(),
            ],
        ];
    }

}