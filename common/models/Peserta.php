<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "peserta".
 *
 * @property integer $ID
 * @property integer $id_course
 * @property integer $user
 * @property string $atas_nama
 * @property string $email
 * @property string $hp
 * @property string $status
 * @property string $bukti_bayar
 * @property string $jenis_id
 * @property string $no_id
 * @property string $alamat_id
 * @property string $alamat_tt
 * @property string $pekerjaan
 * @property string $alamat_kerja
 * @property string $pendidikan
 * @property string $anggota1
 * @property string $anggota2
 * @property string $anggota3
 * @property string $anggota4
 * @property string $f_id
 * @property string $f_proposal
 * @property string $f_berkas
 *
 * @property Course $idCourse
 * @property User $user0
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
            [['user', 'atas_nama', 'email', 'hp', 'jenis_id', 'no_id', 'alamat_id', 'alamat_tt', 'pekerjaan', 'alamat_kerja', 'pendidikan'], 'required'],
            [['id_course', 'user'], 'integer'],
            [['status', 'jenis_id', 'alamat_id', 'alamat_tt', 'alamat_kerja', 'pendidikan'], 'string'],
            [['atas_nama'], 'string', 'max' => 50],
            [['email', 'no_id'], 'string', 'max' => 100],
            ['email','email'],
            [['hp'], 'string', 'max' => 15],
            [['anggota1', 'anggota2', 'anggota3', 'anggota4'], 'string', 'max' => 200],
            [['pekerjaan'], 'string', 'max' => 150],
            [['bukti_bayar', 'f_id', 'f_proposal', 'f_berkas'], 'file','maxSize' => 1024 * 1024 * 5],
            [['id_course'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['id_course' => 'ID']],
            [['user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'id_course' => 'Pelatihan',
            'user' => 'User',
            'atas_nama' => 'Atas Nama',
            'email' => 'Email',
            'hp' => 'No.Hp',
            'status' => 'Status',
            'bukti_bayar' => 'Bukti Pembayaran',
            'jenis_id' => 'Identitas Berdasarkan',
            'no_id' => 'No Identitas',
            'alamat_id' => 'Alamat (Identitas)',
            'alamat_tt' => 'Alamat (Tempat Tinggal)',
            'pekerjaan' => 'Pekerjaan',
            'alamat_kerja' => 'Alamat Kerja',
            'pendidikan' => 'Pendidikan Akhir',
            'anggota1' => 'Anggota 1',
            'anggota2' => 'Anggota 2',
            'anggota3' => 'Anggota 3',
            'anggota4' => 'Anggota 4',
            'f_id' => 'Bukti Identitas',
            'f_proposal' => 'File Proposal',
            'f_berkas' => 'Berkas Persyaratan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoursePeserta()
    {
        return $this->hasOne(Course::className(), ['ID' => 'id_course']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserPeserta()
    {
        return $this->hasOne(User::className(), ['id' => 'user']);
    }
}
