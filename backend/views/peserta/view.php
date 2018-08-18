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

    <?php 
    
    if($model->coursePeserta->tim_anggota == 'N'){
        echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'coursePeserta.nama_course',
            'atas_nama',
            'email:email',
            'userPeserta.username',
            'hp',
            'jenis_id',
            'no_id',
            'alamat_id',
            'alamat_tt',
            'pekerjaan',
            'alamat_kerja',
            'pendidikan',
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
            
            'status',
        ],
    ]);
    }else{
        
     echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'coursePeserta.nama_course',
            'atas_nama',
            'email:email',
            'userPeserta.username',
            'hp',
            'jenis_id',
            'no_id',
            'alamat_id',
            'alamat_tt',
            'pekerjaan',
            'alamat_kerja',
            'pendidikan',
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
            'anggota1',
            'anggota2',
            'anggota3',
            'anggota4',
            
            'status',
        ],
    ]);    
        
    }
    ?>
    <p>
    <?php
        
       if($model->status == "menunggu" || $model->status == "verifikasi"){
            echo
            Html::a('Tolak', ['peserta/tolak', 'id' => $model->ID],['class' => 'btn btn-danger pull-right','style'=>'margin-left:8px;']).'&nbsp;&nbsp;'.
            Html::a('Lunas', ['peserta/lunas', 'id' => $model->ID],['class' => 'btn btn-success pull-right']);
            }else{
            echo Html::a('Reset Verifikasi', ['peserta/reset', 'id' => $model->ID], ['class' => 'btn btn-default pull-right','data' => [
                'confirm' => 'Apakah anda ingin melakukan verifikasi ulang pada data ini?',
                'method' => 'post',
            ],]);
            } 
        
        ?>
    </p>

</div>
