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
use frontend\models\Recruit;
use yii;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use frontend\models\Article;
use yii\web\NotFoundHttpException;

class RecruitController extends Controller
{

    public function actionIndex($type = 0)
    {
        $where = ['status' => Recruit::RECRUIT_PUBLISHED];
        $query = Recruit::find()->where($where);
            $query->andWhere(['type'=>$type]);
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
        $top = Recruit::find()->limit(1)->where(['flag_headline'=>1])->limit(5)->orderBy("sort asc")->asArray()->all();

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
        $model = Recruit::findOne(['id' => $id]);
        if (empty($model)) {
            throw new NotFoundHttpException('None page named ');
        }
        $top = Recruit::find()->limit(1)->where(['flag_headline'=>1])->limit(5)->orderBy("sort asc")->asArray()->all();
        return $this->render('view', ['model' => $model,'top'=>$top]);
    }

}