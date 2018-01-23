<?php
/**
 * Author: druphliu
 * Description
 * Email: druphliu@gmail.com
 * Created at: 2017-03-15 21:16
 */

namespace backend\controllers;

use common\models\SCategory;
use yii\data\ArrayDataProvider;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\IndexAction;
use backend\actions\DeleteAction;
use backend\actions\SortAction;

class ScategoryController extends \yii\web\Controller
{

    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function(){
                    $data = SCategory::getCategories();
                    $dataProvider = new ArrayDataProvider([
                        'allModels' => $data,
                        'pagination' => [
                            'pageSize' => -1
                        ]
                    ]);
                    return [
                        'dataProvider' => $dataProvider,
                    ];
                }
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => SCategory::className(),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => SCategory::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => SCategory::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => SCategory::className(),
            ],
        ];
    }

}