<?php
/**
 * Author: druphliu
 * Description
 * Email: druphliu@gmail.com
 * Created at: 2017-03-15 21:16
 */

namespace backend\models\search;

use backend\models\GoodsOrder;
use common\models\GoodsOrder as CommonGoodsOrder;
use yii\data\ActiveDataProvider;

class GoodsOrderSearch extends GoodsOrder
{

    public $create_start_at;

    public $create_end_at;

    public $update_start_at;

    public $update_end_at;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at'], 'string'],
            [['create_start_at', 'create_end_at', 'update_start_at', 'update_end_at'], 'string'],
            [
                [
                    'id',
                ],
                'integer'
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['anchor'] = array_merge($scenarios['default'], [
            'create_start_at',
            'create_end_at',
            'update_start_at',
            'update_end_at',
            'id'
        ]);
        return $scenarios;
    }

    /**
     * @param $params
     * @param int $type
     * @return \yii\data\ActiveDataProvider
     */
    public function search($params)
    {
        $query = CommonGoodsOrder::find()->select([])->with('category');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'sort' => SORT_ASC,
                    'id' => SORT_DESC,
                ]
            ]
        ]);
        $this->load($params);
        if (! $this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere(['like', 'goods_name', $this->goods_name])
            ->andFilterWhere(['id' => $this->id]);
        $create_start_at_unixtimestamp = $create_end_at_unixtimestamp = $update_start_at_unixtimestamp = $update_end_at_unixtimestamp = '';
        if ($this->create_start_at != '') {
            $create_start_at_unixtimestamp = strtotime($this->create_start_at);
        }
        if ($this->create_end_at != '') {
            $create_end_at_unixtimestamp = strtotime($this->create_end_at);
        }
        if ($this->update_start_at != '') {
            $update_start_at_unixtimestamp = strtotime($this->update_start_at);
        }
        if ($this->update_end_at != '') {
            $update_end_at_unixtimestamp = strtotime($this->update_end_at);
        }
        if ($create_start_at_unixtimestamp != '' && $create_end_at_unixtimestamp == '') {
            $query->andFilterWhere(['>', 'created_at', $create_start_at_unixtimestamp]);
        } elseif ($create_start_at_unixtimestamp == '' && $create_end_at_unixtimestamp != '') {
            $query->andFilterWhere(['<', 'created_at', $create_end_at_unixtimestamp]);
        } else {
            $query->andFilterWhere([
                'between',
                'created_at',
                $create_start_at_unixtimestamp,
                $create_end_at_unixtimestamp
            ]);
        }

        if ($update_start_at_unixtimestamp != '' && $update_end_at_unixtimestamp == '') {
            $query->andFilterWhere(['>', 'updated_at', $update_start_at_unixtimestamp]);
        } elseif ($update_start_at_unixtimestamp == '' && $update_end_at_unixtimestamp != '') {
            $query->andFilterWhere(['<', 'updated_at', $update_start_at_unixtimestamp]);
        } else {
            $query->andFilterWhere([
                'between',
                'updated_at',
                $update_start_at_unixtimestamp,
                $update_end_at_unixtimestamp
            ]);
        }

        return $dataProvider;
    }

}