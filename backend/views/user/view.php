<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'username',
            'status_admin',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email:email',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>
    <br>
    <h3><b>History</b></h3>

    <?=GridView::widget([
        'dataProvider' => new yii\data\ActiveDataProvider(['query'=>$model->getPesertaUser()]),
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'ID',
            //'id_course',
             [
               'header' => 'Course Name',
               'value' => 'coursePeserta.nama_course',
               'contentOptions' => ['style' => 'width:20%;  white-space: normal;'],
             ],
            'atas_nama',
//            'email:email',
//            [
//              'attribute'=>'user',
//                'value' => 'userPeserta.username',
//            ],
            'hp',
//            'bukti_bayar',
            [
                'attribute'=>'f_id',
                'format'=>'raw',
                'value' => function($data){
            if(!empty($data->f_id)){
            return
            Html::a('View', ['peserta/vid', 'id' => $data->ID],['class' => 'btn btn-info']);
            }else{
            return
            "<p class='btn btn-danger' align='center'>No File</p>";
            }
            }
            ],
            [
                'attribute'=>'bukti_bayar',
                'format'=>'raw',
                'value' => function($data){
            if(!empty($data->bukti_bayar)){
            return
            Html::a('View', ['peserta/display', 'id' => $data->ID],['class' => 'btn btn-warning']).'&nbsp;&nbsp;'.
            Html::a('Download', ['peserta/download', 'id' => $data->ID],['class' => 'btn btn-primary']);
            }else{
            return
            "<p class='btn btn-danger' align='center'>No File</p>";
            }
            }
            ],
            [
                'attribute'=>'f_proposal',
                'format'=>'raw',
                'value' => function($data){
            if(!empty($data->f_proposal)){
            return
            Html::a('View', ['peserta/vproposal', 'id' => $data->ID],['class' => 'btn btn-warning']).'&nbsp;&nbsp;'.
            Html::a('Download', ['peserta/dproposal', 'id' => $data->ID],['class' => 'btn btn-primary']);
            }else{
            return
            "<p class='btn btn-danger' align='center'>No File</p>";
            }
            }
            ],
            [
                'attribute'=>'f_berkas',
                'format'=>'raw',
                'value' => function($data){
            if(!empty($data->f_berkas)){
            return
            Html::a('View', ['peserta/vberkas', 'id' => $data->ID],['class' => 'btn btn-warning']).'&nbsp;&nbsp;'.
            Html::a('Download', ['peserta/dberkas', 'id' => $data->ID],['class' => 'btn btn-primary']);
            }else{
            return
            "<p class='btn btn-danger' align='center'>No File</p>";
            }
            }
            ],
//            'status',
            [
                'attribute'=>'status',
                'filter'=>[ 'menunggu' => 'Menunggu', 'verifikasi' => 'Verifikasi', 'lunas'=>'Lunas', 'ditolak'=>'Ditolak' ],
            ],

            ['class' => 'yii\grid\ActionColumn','header'=>'Action',
            'urlCreator' => function ($action, $model, $key, $index) {
                    return Url::to(['peserta/'.$action, 'id' => $model->ID]);
                }
            ],

            [
                'header'=>'Verifikasi',
                'format'=>'raw',
                'value' => function($data){
            if($data->status == "menunggu" || $data->status == "verifikasi"){
            return
            Html::a('Tolak', ['peserta/tolak', 'id' => $data->ID],['class' => 'btn btn-danger']).'&nbsp;&nbsp;'.
            Html::a('Lunas', ['peserta/lunas', 'id' => $data->ID],['class' => 'btn btn-success']);
            }else{
            return Html::a('Reset Verifikasi', ['peserta/reset', 'id' => $data->ID], ['class' => 'btn btn-default','data' => [
                'confirm' => 'Apakah anda ingin melakukan verifikasi ulang pada data ini?',
                'method' => 'post',
            ],]);
            }
            }
            ],
        ],
    ]);

    ?>

</div>
