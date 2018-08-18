<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "berita".
 *
 * @property integer $ID
 * @property string $judul
 * @property string $isi
 * @property string $update_at
 * @property string $publish_at
 * @property integer $oleh
 *
 * @property User $oleh0
 * @property Foto[] $fotos
 */
class Berita extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'berita';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['judul', 'isi'], 'required'],
            [['isi'], 'string'],
            [['update_at', 'publish_at'], 'safe'],
            [['oleh'], 'integer'],
            [['judul'], 'string', 'max' => 250],
            [['oleh'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['oleh' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'judul' => 'Judul Berita',
            'isi' => 'Konten',
            'update_at' => 'Update At',
            'publish_at' => 'Publish At',
            'oleh' => 'Oleh',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserBerita()
    {
        return $this->hasOne(User::className(), ['id' => 'oleh']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFotoBerita()
    {
        return $this->hasMany(Foto::className(), ['id_berita' => 'ID']);
    }
}
