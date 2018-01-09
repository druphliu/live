<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%platform}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $script
 * @property integer $status
 */
class Platform extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%platform}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['name', 'script'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'script' => 'Script',
            'status' => 'Status',
        ];
    }
}
