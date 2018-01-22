<?php
/**
 * Author: druphliu
 * Description
 * Email: druphliu@gmail.com
 * Created at: 2017-03-15 21:16
 */

namespace common\models\meta;

use yii;

class AnchorMetaLike extends \common\models\ArticleMeta
{

    public $keyName = "like";


    /**
     * @param $aid
     * @return bool
     */
    public function setLike($aid)
    {
        $this->aid = $aid;
        $this->key = $this->keyName;
        $this->value = yii::$app->getRequest()->getUserIP();
        return $this->save(false);
    }

    /**
     * @param $aid
     * @return int|string
     */
    public function getLikeCount($aid)
    {
        return $this->find()->where(['aid' => $aid, 'key' => $this->keyName])->count("aid");
    }

}
