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

class ShowController extends Controller
{

    public function actionIndex($cat = '')
    {
        if(!$cat){
            $cat='show';
        }
        $platform = Yii::$app->request->get('platform');
        $where = ['status' => Anchor::ANCHOR_PUBLISHED];
        if ($cat != '') {
            if ($cat == yii::t('app', 'uncategoried')) {
                $where['l_cid'] = 0;
            } else {
                if (!$category = Lcategory::findOne(['alias' => $cat])) {
                    throw new NotFoundHttpException(yii::t('frontend', 'None category named {name}', ['name' => $cat]));
                }
                $catname = $category['name'];
                $descendants = Lcategory::getDescendants($category['id']);
                if (empty($descendants)) {
                    $where['l_cid'] = $category['id'];
                } else {
                    $cids = ArrayHelper::getColumn($descendants, 'id');
                    $cids[] = $category['id'];
                    $where['l_cid'] = $cids;
                }
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
        return $this->render('index', ['dataProvider' => $dataProvider, 'type' => (!empty($cat) ? $catname : yii::t('frontend', 'Latest Anchor'))]);
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