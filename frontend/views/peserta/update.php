<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Peserta */

$this->title = 'Update ';
$this->params['breadcrumbs'][] = ['label' => 'Registered', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="peserta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
