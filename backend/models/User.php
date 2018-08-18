<?php

namespace backend\models;
use yii\behaviors\TimestampBehavior;
use common\models\Peserta;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $status_admin
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Berita[] $beritas
 * @property Chat[] $chats
 * @property Chat[] $chats0
 * @property Peserta[] $pesertas
 */
class User extends \yii\db\ActiveRecord
{
    public $password;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }
    
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password', 'password_hash',], 'required'],
            [['status_admin'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['status'], 'string', 'max' => 10],
            [['username'], 'unique'],
            [['email'], 'unique'],
            ['email', 'email'],
            [['password_reset_token'], 'unique'],
            ['password', 'string', 'min' => 8],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'status_admin' => 'Status Admin',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'password' => 'Password',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBeritaUser()
    {
        return $this->hasMany(Berita::className(), ['oleh' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChatUser()
    {
        return $this->hasMany(Chat::className(), ['user' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSendUser()
    {
        return $this->hasMany(Chat::className(), ['sender' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPesertaUser()
    {
        return $this->hasMany(Peserta::className(), ['user' => 'id']);
    }
}
