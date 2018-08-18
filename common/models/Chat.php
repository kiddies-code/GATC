<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "chat".
 *
 * @property integer $ID
 * @property integer $user
 * @property string $pesan
 * @property string $waktu
 * @property integer $sender
 *
 * @property User $user0
 * @property User $sender0
 */
class Chat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['pesan'], 'required'],
            [['user', 'sender'], 'integer'],
            [['pesan'], 'string'],
            [['waktu'], 'safe'],
            [['user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user' => 'id']],
            [['sender'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['sender' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'user' => 'User',
            'pesan' => 'Pesan',
            'waktu' => 'Waktu',
            'sender' => 'Sender',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChatUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChatSender()
    {
        return $this->hasOne(User::className(), ['id' => 'sender']);
    }
}
