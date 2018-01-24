<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%goods_order}}".
 *
 * @property integer $id
 * @property integer $goods_id
 * @property string $goods_name
 * @property integer $uid
 * @property string $username
 * @property string $pay
 * @property string $realname
 * @property string $address
 * @property string $phone
 * @property integer $created_at
 */
class GoodsOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%goods_order}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'goods_id', 'uid', 'created_at'], 'integer'],
            [['pay'], 'number'],
            [['goods_name', 'address'], 'string', 'max' => 255],
            [['username', 'realname'], 'string', 'max' => 150],
            [['phone'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'goods_id' => 'Goods ID',
            'goods_name' => 'Goods Name',
            'uid' => 'Uid',
            'username' => 'Username',
            'pay' => 'Pay',
            'realname' => 'Realname',
            'address' => 'Address',
            'phone' => 'Phone',
            'created_at' => 'Created At',
        ];
    }
}
