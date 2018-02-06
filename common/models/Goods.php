<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%goods}}".
 *
 * @property integer $id
 * @property integer $s_cid
 * @property string $s_cname
 * @property string $name
 * @property string $desc
 * @property integer $sort
 * @property integer $created_at
 * @property integer $updated_at
 */
class Goods extends \yii\db\ActiveRecord
{
    const GOODS_PUBLISHED=1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%goods}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['s_cid', 'sort', 'created_at', 'updated_at'], 'integer'],
            [['desc'], 'string'],
            [['created_at'], 'required'],
            [['s_cname'], 'string', 'max' => 150],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            's_cid' => 'S Cid',
            's_cname' => 'S Cname',
            'name' => 'Name',
            'desc' => 'Desc',
            'sort' => 'Sort',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
