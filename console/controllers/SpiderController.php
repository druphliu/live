<?php
/**
 * Author: druphliu
 * Description
 * Email: druphliu@gmail.com
 * Created at: 2017-03-14 21:07
 */

namespace console\controllers;

use common\models\LCategory;
use common\models\Platform;
use yii;
use backend\models\ArticleContent;
use common\models\FriendlyLink;
use common\models\Article;
use yii\helpers\Console;
use yii\helpers\FileHelper;

set_time_limit(0);

/**
 * File attach management
 */
class SpiderController extends \yii\console\Controller
{


    /**
     * 抓取脚本启动
     */
    public function actionIndex()
    {
        echo "beign spider\n";
        $model = Platform::find()->where(['status'=>1])->all();
        foreach ($model as $m){
            echo 'begin spader platform:'.$m->name."\n";
            $spiderFile = __DIR__.'/../../common/extension/live/'.$m->script;
            if(file_exists($spiderFile)){
                $className  = 'common\extension\live\\'.substr($m->script,0,strpos($m->script,'.php'));
                 $spider = new $className() ;
                 $category = $spider->spiderCategory();
                 foreach ($category as $c){

                     $model = new LCategory();
                     $model->name = $c['name'];
                     $model->alias = $c['alias'];
                     $model->icon = $c['icon'];
                     $model->save();
                 }
            }else{
                echo "spider script:".$spiderFile." not found\n";
            }
        }
        echo "end spider\n";
    }


}