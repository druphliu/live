<?php
/**
 * Author: druphliu
 * Description
 * Email: druphliu@gmail.com
 * Created at: 2016-04-02 22:48
 */

namespace frontend\controllers;

use common\models\Anchor;
use frontend\models\Video;
use yii;
use yii\web\Controller;
use frontend\models\Article;
use yii\web\NotFoundHttpException;

class LiveController extends Controller
{

    public function actionIndex(){
        $top = Video::find()->where(['flag_headline'=>1])->andWhere('thumb<>""')->limit(4)->orderBy("sort asc")->asArray()->all();
        $hot = Video::find()->where('thumb<>""')->limit(5)->orderBy("hn desc")->asArray()->all();
        return $this->render('index',['top'=>$top,'hot'=>$hot]);
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
        $model = Video::findOne(['id'=>$id]);
        if (empty($model)) {
            throw new NotFoundHttpException('None page named ');
        }
        $model->hn+=1;
        $model->save();
        $this->redirect($model->url);
    }

}