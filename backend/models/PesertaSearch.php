<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Peserta;

/**
 * PesertaSearch represents the model behind the search form about `common\models\Peserta`.
 */
class PesertaSearch extends Peserta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID'], 'integer'],
            [['atas_nama', 'email', 'hp','status', 'id_course', 'username'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Peserta::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('coursePeserta');
        $query->joinWith('userPeserta');
        // grid filtering conditions
        $query->andFilterWhere([
            'ID' => $this->ID,
            'course.ID' => $this->id_course,
        ]);

        $query->andFilterWhere(['like', 'atas_nama', $this->atas_nama])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'hp', $this->hp])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'user.username', $this->username]);
//            ->andFilterWhere(['like', 'course.nama_course', $this->id_course]);  

        return $dataProvider;
    }
}
