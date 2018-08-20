<?php

namespace common\models;

use Yii;
use yii\helpers\StringHelper;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "course".
 *
 * @property integer $ID
 * @property string $nama_course
 * @property string $detail_course
 * @property string $tanggal_pelaksanaan
 * @property string $tanggal_berakhir
 * @property integer $harga
 * @property string $tanggal_tutup
 * @property integer $jumlah_peserta
 * @property integer $jumlah_max
 * @property string $status
 * @property string $image
 * @property string $berkas
 * @property string $bayar
 * @property string $proposal
 * @property string $tim_anggota
 *
 * @property Cp[] $cps
 * @property Peserta[] $pesertas
 */
class Course extends \yii\db\ActiveRecord
{
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
            [['nama_course', 'detail_course', 'tanggal_pelaksanaan', 'tanggal_tutup'], 'required'],
            [['detail_course', 'status', 'berkas', 'bayar', 'proposal', 'tim_anggota'], 'string'],
            [['tanggal_pelaksanaan', 'tanggal_berakhir', 'tanggal_tutup'], 'safe'],
            [['harga', 'jumlah_peserta', 'jumlah_max'], 'integer'],
            [['nama_course'], 'string', 'max' => 200],
            [['image'], 'file', 'extensions' => 'png,jpeg,jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'nama_course' => 'Nama Pelatihan',
            'detail_course' => 'Detail Pelatihan',
            'tanggal_pelaksanaan' => 'Tanggal Pelaksanaan Pelatihan',
            'tanggal_berakhir' => 'Tanggal Berakhir Pelatihan',
            'harga' => 'Harga',
            'tanggal_tutup' => 'Tanggal Tutup Pendaftaran',
            'jumlah_peserta' => 'Jumlah Peserta',
            'jumlah_max' => 'Kuota Maksimal',
            'status' => 'Status',
            'image' => 'Image',
            'berkas' => 'Pengumpulan Berkas',
            'bayar' => 'Pembayaran',
            'proposal' => 'Pengumpulan Proposal',
            'tim_anggota' => 'Berbentuk Tim',
        ];
    }


    public function getPrev(){
      $wording = 50;
      if(StringHelper::countWords($this->detail_course) > $wording){
        return StringHelper::truncateWords($this->detail_course, $wording);
      }
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCpCourse()
    {
        return $this->hasMany(Cp::className(), ['id_course' => 'ID']);
    }



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPesertaCourse()
    {
        return $this->hasMany(Peserta::className(), ['id_course' => 'ID']);
    }
}
