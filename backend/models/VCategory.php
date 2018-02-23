<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%v_category}}".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property string $alias
 * @property integer $sort
 * @property integer $is_hot
 * @property string $icon
 * @property string $remark
 * @property integer $created_at
 * @property integer $updated_at
 */
class VCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%v_category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'sort', 'is_hot', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'required'],
            [['name', 'alias', 'icon', 'remark'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'name' => 'Name',
            'alias' => 'Alias',
            'sort' => 'Sort',
            'is_hot' => 'Is Hot',
            'icon' => 'Icon',
            'remark' => 'Remark',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
