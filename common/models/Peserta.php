<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "peserta".
 *
 * @property integer $ID
 * @property integer $id_course
 * @property string $atas_nama
 * @property string $email
 * @property string $hp
 */
class Peserta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'peserta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_course', 'atas_nama', 'email', 'username', 'hp'], 'required'],
            [['id_course'], 'integer'],
            [['atas_nama'], 'string', 'max' => 50],
            [['email','username'], 'string', 'max' => 100],
            [['hp'], 'string', 'max' => 15],
            [['status'], 'string'],
            [['bukti_bayar'],'file','maxSize' => 1024 * 1024 * 5 ] 

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'id_course' => 'Course Name',
            'atas_nama' => 'Atas Nama',
            'email' => 'Email',
            'username' => 'Username',
            'hp' => 'Hp',
            'status' => 'Status',
            'bukti_bayar' => 'Proposal',
        ];
    }
    
    public function getCoursePeserta(){
        return $this->hasOne(Course::className(),['ID'=>'id_course']);
    }
    
    public function getUserPeserta(){
            return $this->hasOne(User::className(),['username'=>'username']);
    }

    
    
}
