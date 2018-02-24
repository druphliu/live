<?php
/**
 * Author: druphliu
 * Description
 * Email: druphliu@gmail.com
 * Created at: 2017-03-15 21:16
 */

namespace backend\controllers;

use backend\models\Daohang;
use backend\models\search\DaohangSearch;
use Yii;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\IndexAction;
use backend\actions\DeleteAction;
use backend\actions\SortAction;

/**
 * FriendLink controller
 */
class DaohangController extends \yii\web\Controller
{

    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function(){
                    $searchModel = new DaohangSearch();
                    $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ];
                }
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => Daohang::className(),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => Daohang::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Daohang::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => Daohang::className(),
            ],
        ];
    }

}
