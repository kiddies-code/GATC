<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use dosamigos\datepicker\DateRangePicker;
use yii\web\UploadedFile;
use marqu3s\summernote\Summernote;

/* @var $this yii\web\View */
/* @var $model common\models\Course */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'nama_course')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detail_course')->widget(Summernote::className(), [
    'clientOptions' => [

    ]
]) ?>

    <?= $form->field($model, 'tanggal_pelaksanaan')->widget(DateRangePicker::className(), [
//    'inline'=>false,
    'attributeTo' => 'tanggal_berakhir',
    'form' => $form, // best for correct client validation
//    'language' => '',
    'size' => 'md',
    'clientOptions' => [
        'autoclose' => true,
        'format' => 'yyyy-mm-dd'
    ],
    'optionsTo'=>[
      'placeholder'=>'Kosongkan jika acara hanya dilaksanakan dalam sehari'
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
            'format' => 'yyyy-mm-dd',
        ],

]);?>

    <?= $form->field($model, 'jumlah_max')->textInput(['placeholder'=>'Jika tidak terbatas masukkan 99999']) ?>

    <?= $form->field($model, 'tim_anggota')->checkbox(['uncheck' => 'N', 'value' => 'Y']); ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <h4><b>Persyaratan</b></h4>
    <div class="col-md-12">
    <div class="col-md-3">
    <?= $form->field($model, 'bayar')->checkbox(['uncheck' => 'N', 'value' => 'Y']); ?>
        </div>
    <div class="col-md-3">
    <?= $form->field($model, 'berkas')->checkbox(['uncheck' => 'N', 'value' => 'Y']); ?>
        </div>
    <div class="col-md-3">
    <?= $form->field($model, 'proposal')->checkbox(['uncheck' => 'N', 'value' => 'Y']); ?>
        </div>
        <br>
    </div>

    <?= $form->field($model, 'harga')->textInput(['maxlength' => true,'placeholder'=>'Jika gratis masukkan 0']) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'aktif' => 'Aktif', 'nonaktif' => 'Nonaktif', ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
