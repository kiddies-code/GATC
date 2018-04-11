<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\web\UploadedFile;

/* @var $this yii\web\View */
/* @var $model common\models\Course */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'nama_course')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detail_course')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tanggal_pelaksanaan')->widget(
    DatePicker::className(), [
        // inline too, not bad
         'inline' => false, 
         // modify template for custom rendering
         //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
]);?>
    
    <?= $form->field($model, 'tanggal_berakhir')->widget(
    DatePicker::className(), [
        // inline too, not bad
         'inline' => false, 
         // modify template for custom rendering
         //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
]);?>

    <?= $form->field($model, 'harga')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'kontak1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kontak2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kontak3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_buka')->widget(
    DatePicker::className(), [
        // inline too, not bad
         'inline' => false, 
         // modify template for custom rendering
         //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
]);?>

    <?= $form->field($model, 'tanggal_tutup')->widget(
    DatePicker::className(), [
        // inline too, not bad
         'inline' => false, 
         // modify template for custom rendering
         //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
]);?>

    <?= $form->field($model, 'jumlah_max')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'aktif' => 'Aktif', 'nonaktif' => 'Nonaktif', ]) ?>

    <?= $form->field($model, 'image')->fileInput() ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
