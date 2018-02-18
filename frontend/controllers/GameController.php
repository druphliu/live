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

class GameController extends Controller
{

    public function actionIndex($cat = '')
    {
        $where = ['status' => Anchor::ANCHOR_PUBLISHED];
        $platform = Yii::$app->request->get('platform');
        if ($cat != '' && $cat != 'news' && $cat != 'news.html') {
            if ($cat == yii::t('app', 'uncategoried')) {
                $where['cid'] = 0;
            } else {
                if (!$category = Lcategory::findOne(['alias' => $cat])) {
                    throw new NotFoundHttpException(yii::t('frontend', 'None category named {name}', ['name' => $cat]));
                }
                $descendants = Lcategory::getDescendants($category['id']);
                if (empty($descendants)) {
                    $where['l_cid'] = $category['id'];
                } else {
                    $cids = ArrayHelper::getColumn($descendants, 'id');
                    $cids[] = $category['id'];
                    $where['l_cid'] = $cids;
                }
                $catname =$category['name'];
            }
        }
        if($platform){
            $where['platform_id']=$platform;
        }
        $query = Anchor::find()->where($where);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'hn'=>SORT_DESC
                ]
            ],
            'pagination' => [
                'pageSize' => 21,
            ],
        ]);
        return $this->render('index', ['dataProvider' => $dataProvider, 'type' => (!empty($cat) ? yii::t('frontend', '{catname}', ['catname' => $catname]) : yii::t('frontend', 'Latest Anchor'))]);
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