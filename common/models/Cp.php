<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cp".
 *
 * @property integer $ID
 * @property string $nama
 * @property string $kontak
 * @property string $email
 * @property integer $id_course
 *
 * @property Course $idCourse
 */
class Cp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'kontak', 'email'], 'required'],
            [['id_course'], 'integer'],
            [['email'], 'email'],
            [['nama', 'kontak'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 150],
            [['id_course'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['id_course' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'nama' => 'Nama',
            'kontak' => 'No. Hp',
            'email' => 'Email',
            'id_course' => 'Id Course',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourseCp()
    {
        return $this->hasOne(Course::className(), ['ID' => 'id_course']);
    }
}
