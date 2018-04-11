<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Course */

$this->title = $model->nama_course;
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-view">

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
            'nama_course',
            'detail_course:ntext',
            'harga',
            'tanggal_pelaksanaan',
            'tanggal_berakhir',
            'kontak1',
            'kontak2',
            'kontak3',
            'tanggal_buka',
            'tanggal_tutup',
            'jumlah_peserta',
            'jumlah_max',
            'status',
        ],
    ]) ?> 
    <br>
    
    <h1>Peserta</h1>
    
    <?= GridView::widget([
        'dataProvider' => new yii\data\ActiveDataProvider(['query'=>$model->getPesertaCourse()]),
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'ID',
            //'id_course',
            'atas_nama',
            'email:email',
            //'id_user',
            [
                'attribute'=>'id_user',
                'value'=>'userPeserta.username',
            ],
            'hp',
            'bukti_bayar',
//            [
//                  'attribute'=>'Download',
//                  'format'=>'raw',
//                  'value' => function($data)
//                    {
//                return Html::a('Download file', ['course/download', 'id' => $data->ID],['class' => 'btn btn-primary']);
//
//                    }
//                    ],
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
</div>
