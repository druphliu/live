<?php
/**
 * Author: druphliu
 * Description
 * Email: druphliu@gmail.com
 * Created at: 2016-04-02 22:48
 */

namespace frontend\controllers;

use frontend\models\Anchor;
use frontend\models\Lcategory;
use yii;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use frontend\models\Article;
use yii\web\NotFoundHttpException;

class TopController extends Controller
{

    public function actionIndex()
    {
        $where = ['status' => Anchor::ANCHOR_PUBLISHED];
        $list = Anchor::find()->where($where)->limit(300)->all();
        return $this->render('index', ['list' => $list]);
    }

    /**
     * 直播详情页面
     *
     * @param string $name
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionView($id)
    {
        $model = Anchor::findOne(['id' => $id]);
        if (empty($model)) {
            throw new NotFoundHttpException('None page named ');
        }
        $model->hn += 1;
        $model->save();
        $this->redirect($model->room_url);
    }

}