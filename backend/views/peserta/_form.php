<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use common\models\Course;
use common\models\User;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;


/* @var $this yii\web\View */
/* @var $model common\models\Peserta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="peserta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_course')->dropDownList(
    ArrayHelper::map(Course::find()->all(),'ID','nama_course'),
    ['prompt'=>'Select Course']
    ) ?>

    <?= $form->field($model, 'atas_nama')->textInput(['placeholder' =>'Nama Peserta','maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->dropDownList(
    ArrayHelper::map(User::find()->all(),'username','username'),
    ['prompt'=>'Select Username']
    ) ?>

    <?= $form->field($model, 'hp')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'bukti_bayar')->fileInput() ?>
    
    <?= $form->field($model, 'status')->dropDownList([ 'menunggu' => 'Menunggu', 'verifikasi' => 'Verifikasi', 'lunas'=>'Lunas' ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
