<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PesertaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="peserta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'id_course') ?>

    <?= $form->field($model, 'atas_nama') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'id_user') ?>

    <?php // echo $form->field($model, 'hp') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
