<?php
/**
 * Author: druphliu
 * Description
 * Email: druphliu@gmail.com
 * Created at: 2016-04-11 09:53
 */

namespace backend\models;

use common\libs\Constants;
use common\models\meta\AnchorMetaTag;
use common\models\meta\ArticleMetaTag;
use yii;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

class Anchor extends \common\models\Anchor
{
    /**
     * @var string
     */
    public $tag = '';

    /**
     * @var null|string
     */
    public $content = null;

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        $upload = UploadedFile::getInstance($this, 'thumb');
        if ($upload !== null) {
            $uploadPath = yii::getAlias('@thumb/');
            if (! FileHelper::createDirectory($uploadPath)) {
                $this->addError('thumb', "Create directory failed " . $uploadPath);
                return false;
            }
            $fullName = $uploadPath . uniqid() . '_' . $upload->baseName . '.' . $upload->extension;
            if (! $upload->saveAs($fullName)) {
                $this->addError('thumb', yii::t('app', 'Upload {attribute} error: ' . $upload->error, ['attribute' => yii::t('app', 'Thumb')]) . ': ' . $fullName);
                return false;
            }
            $this->thumb = str_replace(yii::getAlias('@frontend/web'), '', $fullName);
            if( !$insert ){
                $file = yii::getAlias('@frontend/web') . $this->getOldAttribute('thumb');
                if( file_exists($file) && is_file($file) ) unlink($file);
            }
        } else {
            if( $this->thumb !== '' ){//删除
                $file = yii::getAlias('@frontend/web') . $this->getOldAttribute('thumb');
                if( file_exists($file) && is_file($file) ) unlink($file);
                $this->thumb = '';
            }else {
                $this->thumb = $this->getOldAttribute('thumb');
            }
        }

        $this->seo_keywords = str_replace('，', ',', $this->seo_keywords);
        if ($insert) {
            $this->author_id = yii::$app->getUser()->getIdentity()->id;
            $this->author_name = yii::$app->getUser()->getIdentity()->username;

        }
        if($this->visibility == Constants::ARTICLE_VISIBILITY_SECRET){//加密文章需要设置密码
            if( empty( $this->password ) ){
                $this->addError('password', yii::t('app', "Secret article must set a password"));
                return false;
            }
        }else{
            $this->password = '';
        }
        return parent::beforeSave($insert);
    }

    /**
     * @inheritdoc
     */
    public function afterSave($insert, $changedAttributes)
    {
        $articleMetaTag = new AnchorMetaTag();
        $articleMetaTag->setAnchorTags($this->id, $this->tag);
        parent::afterSave($insert, $changedAttributes);
    }

    /**
     * @inheritdoc
     */
    public function beforeDelete()
    {
        return true;
    }

    /**
     * @inheritdoc
     */
    public function afterFind()
    {
        parent::afterFind();
        $this->tag = call_user_func(function(){
            $tags = '';
            foreach ($this->anchorTags as $tag) {
                $tags .= $tag->value . ',';
            }
            return rtrim($tags, ',');
        });
    }

}