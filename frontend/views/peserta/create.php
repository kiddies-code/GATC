<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Peserta */

$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peserta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'id_kursus'=> $_GET['id_kursus']
    ]) ?>

</div>
