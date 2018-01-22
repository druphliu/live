<?php
/**
 * Author: druphliu
 * Description
 * Email: druphliu@gmail.com
 * Created at: 2017-03-15 21:16
 */

namespace backend\models\search;

use common\models\Anchor as CommonAnchor;
use backend\models\Anchor;
use common\models\Category;
use yii\data\ActiveDataProvider;

class AnchorSearch extends Anchor
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
            [['title', 'l_cid'], 'string'],
            [['created_at', 'updated_at'], 'string'],
            [['create_start_at', 'create_end_at', 'update_start_at', 'update_end_at'], 'string'],
            [
                [
                    'id',
                    'status',
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
        $query = CommonAnchor::find()->select([])->with('category');
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
        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['id' => $this->id])
            ->andFilterWhere(['status' => $this->status]);
        if ($this->avatar == 1) {
            $query->andWhere(['<>', 'avatar', '']);
        } else {
            if ($this->avatar === '0') {
                $query->andWhere(['avatar' => '']);
            }
        }
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
        if ($this->l_cid === '0') {
            $query->andWhere(['l_cid' => 0]);
        } else {
            if (! empty($this->l_cid)) {
                $cids = array_column(Category::getDescendants($this->l_cid), 'id');
                if (count($cids) <= 1) {
                    $query->andFilterWhere(['l_cid' => $this->l_cid]);
                } else {
                    $array = [];
                    foreach ($cids as $v) {
                        $array[] = $v['id'];
                    }
                    $query->andFilterWhere(['l_cid' => $array]);
                }
            }
        }
        return $dataProvider;
    }

}