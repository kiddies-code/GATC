<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Course;

/**
 * CourseSearch represents the model behind the search form about `common\models\Course`.
 */
class CourseSearch extends Course
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'jumlah_peserta', 'jumlah_max', 'harga'], 'integer'],
            [['nama_course', 'detail_course', 'tanggal_pelaksanaan', 'kontak1', 'kontak2', 'kontak3', 'tanggal_tutup',
//            'tanggal_berakhir',
            'status','bayar','berkas','proposal','tim_anggota'], 'safe'],
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
        $query = Course::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'ID' => $this->ID,
//            'between', $this->tanggal_pelaksanaan, 'tanggal_pelaksanaan', 'tanggal_berakhir',
            // 'tanggal_pelaksanaan' => $this->tanggal_pelaksanaan,
//            'tanggal_berakhir' => $this->tanggal_berakhir,
//            'tanggal_buka' => $this->tanggal_buka,
            'tanggal_tutup' => $this->tanggal_tutup,
        ]);

        $query->andFilterWhere(['like', 'nama_course', $this->nama_course])
            ->andFilterWhere(['like', 'detail_course', $this->detail_course])
//            ->andFilterWhere(['like', 'kontak1', $this->kontak1])
//            ->andFilterWhere(['like', 'kontak2', $this->kontak2])
//            ->andFilterWhere(['like', 'kontak3', $this->kontak3])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'tanggal_pelaksanaan', $this->tanggal_pelaksanaan])
            ->andFilterWhere(['like', 'harga', $this->harga])
            ->andFilterWhere(['like', 'bayar', $this->bayar])
            ->andFilterWhere(['like', 'berkas', $this->berkas])
            ->andFilterWhere(['like', 'proposal', $this->proposal])
            ->andFilterWhere(['like', 'tim_anggota', $this->tim_anggota])
            ->andFilterWhere(['like', 'jumlah_peserta', $this->jumlah_peserta])
            ->andFilterWhere(['like', 'jumlah_max', $this->jumlah_max]);

        return $dataProvider;
    }
}
