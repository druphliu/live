<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%anchor_meta}}".
 *
 * @property integer $id
 * @property integer $aid
 * @property string $key
 * @property string $value
 * @property string $ip
 * @property integer $created_at
 */
class AnchorMeta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%anchor_meta}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['aid', 'created_at'], 'required'],
            [['aid', 'created_at'], 'integer'],
            [['value'], 'string'],
            [['key'], 'string', 'max' => 255],
            [['ip'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'aid' => 'Aid',
            'key' => 'Key',
            'value' => 'Value',
            'ip' => 'Ip',
            'created_at' => 'Created At',
        ];
    }
}
