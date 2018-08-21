<?php

namespace common\models;

use Yii;

use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\SluggableBehavior;
use yii\helpers\StringHelper;

/**
 * This is the model class for table "berita".
 *
 * @property integer $ID
 * @property string $judul
 * @property string $sampul
 * @property string $isi
 * @property string $slug
 * @property string $update_at
 * @property string $publish_at
 * @property integer $oleh
 *
 * @property User $oleh0
 */
class Berita extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

     public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['publish_at', 'update_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['update_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
            [
            'class' => SluggableBehavior::className(),
            'attribute' => 'judul',
            // 'slugAttribute' => 'slug',
        ],
        ];
    }

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
            [['sampul'],'file',],
            [['judul', 'slug'], 'string', 'max' => 250],
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
            'judul' => 'Judul',
            'sampul' => 'Sampul',
            'isi' => 'Isi',
            'slug' => 'Slug',
            'update_at' => 'Update At',
            'publish_at' => 'Publish At',
            'oleh' => 'Oleh',
        ];
    }

    public function getPreview(){
      $words = 90;
      if(StringHelper::countWords($this->isi) > $words){
        return StringHelper::truncateWords($this->isi, $words);
      }
    }

    public function getFly(){
      $wor = 50;
      if(StringHelper::countWords($this->isi) > $wor){
        return StringHelper::truncateWords($this->isi, $wor);
      }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOleh0()
    {
        return $this->hasOne(User::className(), ['id' => 'oleh']);
    }
}
