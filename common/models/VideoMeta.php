<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%video_meta}}".
 *
 * @property integer $id
 * @property integer $vid
 * @property string $key
 * @property string $value
 * @property string $ip
 * @property integer $created_at
 */
class VideoMeta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%video_meta}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vid', 'created_at'], 'required'],
            [['vid', 'created_at'], 'integer'],
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
            'vid' => 'Vid',
            'key' => 'Key',
            'value' => 'Value',
            'ip' => 'Ip',
            'created_at' => 'Created At',
        ];
    }
}
