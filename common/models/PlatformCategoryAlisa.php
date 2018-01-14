<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%platform_category_alisa}}".
 *
 * @property integer $id
 * @property integer $platform_id
 * @property integer $l_category_id
 * @property string $alisa
 */
class PlatformCategoryAlisa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%platform_category_alisa}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['platform_id', 'l_category_id'], 'integer'],
            [['alisa'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'platform_id' => 'Platform ID',
            'l_category_id' => 'L Category ID',
            'alisa' => 'Alisa',
        ];
    }

    public function getCategory()
    {
        /**
         * 第一个参数为要关联的字表模型类名称，
         *第二个参数指定 通过子表的 customer_id 去关联主表的 id 字段
         */
        return $this->hasOne(LCategory::className(), ['id' => 'l_category_id']);
    }

    public function getPlatform()
    {
        /**
         * 第一个参数为要关联的字表模型类名称，
         *第二个参数指定 通过子表的 customer_id 去关联主表的 id 字段
         */
        return $this->hasOne(Platform::className(), ['id' => 'platform_id']);
    }
}
