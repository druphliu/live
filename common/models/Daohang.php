<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%daohang}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $type
 * @property string $image
 * @property string $url
 * @property string $target
 * @property integer $sort
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Daohang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%daohang}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'sort', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'required'],
            [['name', 'image', 'url', 'target'], 'string', 'max' => 255],
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
            'type' => 'Type',
            'image' => 'Image',
            'url' => 'Url',
            'target' => 'Target',
            'sort' => 'Sort',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
