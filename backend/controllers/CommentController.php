<?php
/**
 * Author: druphliu
 * Description
 * Email: druphliu@gmail.com
 * Created at: 2017-10-03 22:03
 */

namespace backend\controllers;

use yii;
use backend\actions\UpdateAction;
use backend\models\Comment;
use backend\models\search\CommentSearch;
use backend\actions\IndexAction;
use backend\actions\DeleteAction;

class CommentController extends \yii\web\Controller
{

    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function(){
                    $searchModel = new CommentSearch();
                    $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ];
                }
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => Comment::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Comment::className(),
            ],
        ];
    }

}