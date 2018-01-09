<?php
/**
 * Author: druphliu
 * Description
 * Email: druphliu@gmail.com
 * Created at: 2017-03-15 21:16
 */

namespace backend\controllers;

use common\models\LCategory;
use yii\data\ArrayDataProvider;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\IndexAction;
use backend\actions\DeleteAction;
use backend\actions\SortAction;

class LcategoryController extends \yii\web\Controller
{

    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function(){
                    $data = LCategory::getCategories();
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
                'modelClass' => LCategory::className(),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => LCategory::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => LCategory::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => LCategory::className(),
            ],
        ];
    }

}