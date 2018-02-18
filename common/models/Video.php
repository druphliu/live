<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%video}}".
 *
 * @property integer $id
 * @property integer $v_cid
 * @property string $v_cname
 * @property string $title
 * @property integer $flag_headline
 * @property integer $flag_special_recommend
 * @property string $url
 * @property string $thumb
 * @property integer $status
 * @property integer $hn
 * @property integer $sort
 * @property integer $started_at
 * @property integer $created_at
 * @property integer $updated_at
 */
class Video extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%video}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['v_cid', 'flag_headline', 'flag_special_recommend', 'status', 'hn', 'sort', 'started_at', 'created_at', 'updated_at'], 'integer'],
            [['created_at'], 'required'],
            [['v_cname'], 'string', 'max' => 150],
            [['title', 'url', 'thumb'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'v_cid' => 'L Cid',
            'v_cname' => 'L Cname',
            'title' => 'Title',
            'flag_headline' => 'Flag Headline',
            'flag_special_recommend' => 'Flag Special Recommend',
            'url' => 'Url',
            'thumb' => 'thumb',
            'status' => 'Status',
            'hn' => 'Hn',
            'sort' => 'Sort',
            'started_at' => 'Started At',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
