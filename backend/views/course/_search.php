<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CourseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'nama_course') ?>

    <?= $form->field($model, 'detail_course') ?>

    <?= $form->field($model, 'tanggal_pelaksanaan') ?>
    
    <?= $form->field($model, 'tanggal_berakhir') ?>

    <?= $form->field($model, 'kontak1') ?>

    <?= $form->field($model, 'harga') ?>

    <?php // echo $form->field($model, 'kontak2') ?>

    <?php // echo $form->field($model, 'kontak3') ?>

    <?php // echo $form->field($model, 'tanggal_buka') ?>

    <?php // echo $form->field($model, 'tanggal_tutup') ?>

    <?php // echo $form->field($model, 'jumlah_peserta') ?>

    <?php // echo $form->field($model, 'jumlah_max') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
