<?php
/**
 * Author: druphliu
 * Description
 * Email: druphliu@gmail.com
 * Created at: 2016-04-02 22:48
 */

namespace frontend\controllers;

use frontend\models\Activity;
use frontend\models\Anchor;
use frontend\models\Lcategory;
use yii;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use frontend\models\Article;
use yii\web\NotFoundHttpException;

class ActivityController extends Controller
{

    public function actionIndex($type = 0)
    {
        $where = ['status' => Activity::ACTIVITY_PUBLISHED];
        $query = Activity::find()->where($where);
        if($type){
            $query->andWhere(['type'=>$type]);
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'started_at'=>SORT_DESC
                ]
            ],
            'pagination' => [
                'pageSize' => 21,
            ],
        ]);
        $top = Activity::find()->limit(1)->where(['flag_headline'=>1])->limit(5)->orderBy("sort asc")->asArray()->all();

        return $this->render('index', ['dataProvider' => $dataProvider,'top'=>$top,'type'=>$type]);
    }

    /**
     * 详情页面
     *
     * @param string $name
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionView($id)
    {
        $model = Activity::findOne(['id' => $id]);
        if (empty($model)) {
            throw new NotFoundHttpException('None page named ');
        }
        return $this->render('index', ['model' => $model]);
    }

}