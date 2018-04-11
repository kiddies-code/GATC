<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property integer $ID
 * @property string $nama_course
 * @property string $detail_course
 * @property string $tanggal_pelaksanaan
 * @property string $kontak1
 * @property string $kontak2
 * @property string $kontak3
 * @property string $tanggal_buka
 * @property string $tanggal_tutup
 * @property integer $jumlah_peserta
 * @property integer $jumlah_max
 * @property string $status
 */
class Course extends \yii\db\ActiveRecord
{
    public $idnya;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_course', 'detail_course', 'tanggal_pelaksanaan', 'kontak1', 'tanggal_buka', 'harga','tanggal_tutup','jumlah_max'], 'required'],
            [['detail_course', 'status'], 'string'],
            [['tanggal_pelaksanaan', 'tanggal_buka', 'tanggal_tutup','tanggal_berakhir'], 'safe'],
            [['jumlah_peserta', 'jumlah_max','harga'], 'integer'],
            [['nama_course'], 'string', 'max' => 100],
            [['kontak1', 'kontak2', 'kontak3'], 'string', 'max' => 250],
            [['image'],'file','extensions'=>'png,jpg']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'nama_course' => 'Nama Kursus',
            'detail_course' => 'Detail Kursus',
            'tanggal_pelaksanaan' => 'Tanggal Mulai Kursus',
            'tanggal_berakhir' => 'Tanggal Berakhir Kursus',
            'harga'=>'Harga',
            'kontak1' => 'Kontak 1',
            'kontak2' => 'Kontak 2',
            'kontak3' => 'Kontak 3',
            'tanggal_buka' => 'Tanggal Buka Pendaftaran',
            'tanggal_tutup' => 'Tanggal Tutup Pendaftaran',
            'jumlah_peserta' => 'Jumlah Peserta',
            'jumlah_max' => 'Jumlah Maksimal Peserta',
            'status' => 'Status',
            'image'=>'Sampul Kursus' 
        ];
    }
    
     public function getPesertaCourse(){
        return $this->hasMany(Peserta::className(),['id_course'=>'ID']);
    }
    
    
    
}
