<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "foto".
 *
 * @property integer $ID
 * @property integer $id_berita
 * @property string $xfile
 *
 * @property Berita $idBerita
 */
class Foto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'foto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_berita'], 'required'],
            [['id_berita'], 'integer'],
            [['xfile'], 'file', 'extensions' => 'png,jpg,jpeg'],
            [['id_berita'], 'exist', 'skipOnError' => true, 'targetClass' => Berita::className(), 'targetAttribute' => ['id_berita' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'id_berita' => 'Id Berita',
            'xfile' => 'Foto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBeritaFoto()
    {
        return $this->hasOne(Berita::className(), ['ID' => 'id_berita']);
    }
}
