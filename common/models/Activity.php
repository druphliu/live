<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%activity}}".
 *
 * @property integer $id
 * @property integer $type
 * @property string $title
 * @property integer $status
 * @property string $third_url
 * @property integer $sort
 * @property integer $started_at
 * @property integer $ended_at
 * @property integer $created_at
 * @property integer $updated_at
 */
class Activity extends \yii\db\ActiveRecord
{
    const ACTIVITY_PUBLISHED=1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%activity}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'status', 'sort', 'started_at', 'ended_at', 'created_at', 'updated_at'], 'integer'],
            [['ended_at', 'created_at'], 'required'],
            [['title', 'third_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'title' => 'Title',
            'status' => 'Status',
            'third_url' => 'Third Url',
            'sort' => 'Sort',
            'started_at' => 'Started At',
            'ended_at' => 'Ended At',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
