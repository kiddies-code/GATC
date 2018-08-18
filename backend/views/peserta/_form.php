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

    <?= $form->field($model, 'user')->dropDownList(
    ArrayHelper::map(User::find()->all(),'ID','username'),
    ['prompt'=>'Select Username']
    ) ?>

    <?= $form->field($model, 'hp')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'jenis_id')->dropDownList([ 'SIM' => 'SIM', 'KTP' => 'KTP', 'KK'=>'KK', 'KTM'=>'KTM', 'KP'=>'KP' ]) ?>
    
    <?= $form->field($model, 'no_id')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'alamat_id')->textarea(['rows' => 6]) ?>
    
    <?= $form->field($model, 'alamat_tt')->textarea(['rows' => 6]) ?>
    
    <?= $form->field($model, 'pekerjaan')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'alamat_kerja')->textarea(['rows' => 6]) ?>
    
    <?= $form->field($model, 'pendidikan')->dropDownList([ 'SD' => 'SD sederajat', 'SMP' => 'SMP sederajat', 'SMA'=>'SMA sederajat', 'Diploma'=>'Diploma', 'S1'=>'S1', 'S2'=>'S2', 'S3'=>'S3' ]) ?>
    
    <div style="border-radius:10px; border:solid; border-width:3px; padding:5px 20px 5px 20px; margin:30px 0px 25px 0px;border-color:lightgrey">
    
    <h4><b>Tim</b></h4>
        
    <?= $form->field($model, 'anggota1')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'anggota2')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'anggota3')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'anggota4')->textInput(['maxlength' => true]) ?>
        
    </div>
    
    <?= $form->field($model, 'bukti_bayar')->fileInput() ?>
    
    <?= $form->field($model, 'f_id')->fileInput() ?>
    
    <?= $form->field($model, 'f_proposal')->fileInput() ?>
    
    <?= $form->field($model, 'f_berkas')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
