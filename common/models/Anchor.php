<?php

namespace common\models;

use common\models\meta\AnchorMetaLike;
use common\models\meta\AnchorMetaTag;
use Yii;

/**
 * This is the model class for table "{{%anchor}}".
 *
 * @property integer $id
 * @property integer $l_cid
 * @property string $l_cname
 * @property integer $platform_id
 * @property string $platfrom_name
 * @property integer $p_c_a_id
 * @property string $room_url
 * @property string $anchor_name
 * @property string $title
 * @property string $avatar
 * @property integer $is_online
 * @property integer $status
 * @property integer $third_hn
 * @property integer $hn
 * @property integer $room_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $started_at
 * @property string $snapshot
 */
class Anchor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%anchor}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['l_cid', 'platform_id', 'p_c_a_id', 'is_online', 'status', 'third_hn', 'hn', 'created_at', 'updated_at','room_id','started_at'], 'integer'],
            [['created_at'], 'required'],
            [['l_cname'], 'string', 'max' => 150],
            [['platfrom_name', 'room_url', 'anchor_name','title','avatar','snapshot'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'l_cid' => 'L Cid',
            'l_cname' => 'L Cname',
            'platform_id' => 'Platform ID',
            'platfrom_name' => 'Platfrom Name',
            'p_c_a_id' => 'P C A ID',
            'room_url' => 'Room Url',
            'anchor_name' => 'Anchor Name',
            'is_online' => 'Is Online',
            'status' => 'Status',
            'third_hn' => 'Dy Num',
            'hn' => 'View Num',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'title'=>'标题'
        ];
    }
    public function getCategory()
    {
        /**
         * 第一个参数为要关联的字表模型类名称，
         *第二个参数指定 通过子表的 customer_id 去关联主表的 id 字段
         */
        return $this->hasOne(LCategory::className(), ['id' => 'l_cid']);
    }

    public function getAnchorTags()
    {
        $tempModel = new AnchorMetaTag();
        return $this->hasMany(AnchorMetaLike::className(), ['aid' => 'id'])->where(['key'=>$tempModel->keyName]);
    }

}
