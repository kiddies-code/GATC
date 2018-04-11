<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Peserta */

$this->title = $model->atas_nama;
$this->params['breadcrumbs'][] = ['label' => 'Participants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peserta-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'coursePeserta.nama_course',
            'atas_nama',
            'email:email',
            'username',
            'hp',
            'bukti_bayar',
            'status',
        ],
    ]) ?>

</div>
