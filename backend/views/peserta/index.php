<?php

use kartik\export\ExportMenu;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\PesertaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Participants';
//$this->params['breadcrumbs'][] = $this->title;

$gridColumns = [
//    ['class' => 'yii\grid\SerialColumn'],
//            'ID',
            'coursePeserta.nama_course',
            'userPeserta.username',
            'atas_nama',
            'email',
            'hp',
            'jenis_id',
            'no_id',
            'alamat_id',
            'alamat_tt',
            'pekerjaan',
            'alamat_kerja',
            'pendidikan',
            'anggota1',
            'anggota2',
            'anggota3',
            'anggota4',
            'status',

//    ['class' => 'yii\grid\ActionColumn'],
];

?>
<div class="peserta-index">

    <h1><?= Html::encode($this->title) ?><hr style="margin-top:0px;"></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <br>
    <span class="pull-right">
    <?=
    ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $gridColumns,
            ]).'<br><br>'
        ?></span>

     <p>
        <?= Html::a('Create Participant', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model){
            if($model->status == 'verivikasi'){
                return ['class'=>'warning'];
            }else if($model->status == 'lunas'){
                return ['class'=>'success'];
            }else if($model->status == 'ditolak'){
                return ['class'=>'danger'];
            }else{

            }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'ID',
            //'id_course',
             [
               'header' => 'Course Name',
               'value' => 'coursePeserta.nama_course',
               'filter' => Html::activeDropDownList($searchModel, 'id_course',$course,['class'=>'form-control','prompt'=>'']),
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
            '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.
            Html::a('', ['peserta/vid', 'id' => $data->ID],['class' => 'glyphicon glyphicon-paperclip ','title'=>'View file', 'data-toggle'=>'tooltip','style'=>'text-decoration: none; cursor:pointer;']);

            }else{
            return
            '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.
                Html::tag('span', '', [
                'title'=>'File empty',
                'data-toggle'=>'tooltip',
                'class'=>'glyphicon glyphicon-alert',
                'style'=>'text-decoration: none; cursor:pointer;'
            ]);
            }
            }
            ],
            [
                'attribute'=>'bukti_bayar',
                'format'=>'raw',
                'value' => function($data){
            if(!empty($data->bukti_bayar)){
            return '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.
            Html::a('', ['peserta/display', 'id' => $data->ID],['class' => 'glyphicon glyphicon-eye-open','title'=>'View file', 'data-toggle'=>'tooltip','style'=>'text-decoration: none; cursor:pointer;'])
                .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.
            Html::a('', ['peserta/download', 'id' => $data->ID],['class' => 'glyphicon glyphicon-download-alt','title'=>'Download file', 'data-toggle'=>'tooltip','style'=>'text-decoration: none; cursor:pointer;']);
            }else{
            return
            '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.
                Html::tag('span', '', [
                'title'=>'File empty',
                'data-toggle'=>'tooltip',
                'class'=>'glyphicon glyphicon-alert',
                'style'=>'text-decoration: none; cursor:pointer;'
            ]);

            }
            }
            ],
            [
                'attribute'=>'f_proposal',
                'format'=>'raw',
                'value' => function($data){
            if(!empty($data->f_proposal)){
            return '&nbsp;&nbsp;&nbsp;'.
            Html::a('', ['peserta/vproposal', 'id' => $data->ID],['class' => 'glyphicon glyphicon-eye-open','title'=>'View file', 'data-toggle'=>'tooltip','style'=>'text-decoration: none; cursor:pointer;'])
                .'&nbsp;&nbsp;'.
            Html::a('', ['peserta/dproposal', 'id' => $data->ID],['class' => 'glyphicon glyphicon-download-alt','title'=>'Download file', 'data-toggle'=>'tooltip','style'=>'text-decoration: none; cursor:pointer;']);
            }else{
            return
            '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.
                Html::tag('span', '', [
                'title'=>'File empty',
                'data-toggle'=>'tooltip',
                'class'=>'glyphicon glyphicon-alert',
                'style'=>'text-decoration: none; cursor:pointer;'
            ]);
            }
            }
            ],
            [
                'attribute'=>'f_berkas',
                'format'=>'raw',
                'value' => function($data){
            if(!empty($data->f_berkas)){
            return '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.
            Html::a('', ['peserta/vberkas', 'id' => $data->ID],['class' => 'glyphicon glyphicon-eye-open','title'=>'View file', 'data-toggle'=>'tooltip','style'=>'text-decoration: none; cursor:pointer;'])
                .'&nbsp;&nbsp;&nbsp;&nbsp;'.
            Html::a('', ['peserta/dberkas', 'id' => $data->ID],['class' => 'glyphicon glyphicon-download-alt','title'=>'Download file', 'data-toggle'=>'tooltip','style'=>'text-decoration: none; cursor:pointer;']);
            }else{
            return
            '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.
                Html::tag('span', '', [
                'title'=>'File empty',
                'data-toggle'=>'tooltip',
                'class'=>'glyphicon glyphicon-alert',
                'style'=>'text-decoration: none; cursor:pointer;'
            ]);
            }
            }
            ],
//            'status',
            [
                'attribute'=>'status',
                'filter'=>[ 'menunggu' => 'Menunggu', 'verifikasi' => 'Verifikasi', 'lunas'=>'Lunas', 'ditolak'=>'Ditolak' ],
            ],

            ['class' => 'yii\grid\ActionColumn','header'=>'Action'],

            [
                'header'=>'Verifikasi',
                'format'=>'raw',
                'value' => function($data){
            if($data->status == "menunggu" || $data->status == "verifikasi"){
            return '&nbsp;&nbsp;'.
            Html::a('', ['peserta/tolak', 'id' => $data->ID],['class' => 'glyphicon glyphicon-remove ','title'=>'Tolak data pendaftaran', 'data-toggle'=>'tooltip','style'=>'text-decoration: none; cursor:pointer;'])
                .'&nbsp;&nbsp;&nbsp;&nbsp;'.
            Html::a('', ['peserta/lunas', 'id' => $data->ID],['class' => 'glyphicon glyphicon-ok','title'=>'Terima data pendaftaran', 'data-toggle'=>'tooltip','style'=>'text-decoration: none; cursor:pointer;']);
            }else{
            return
                    '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.
                Html::a('', ['peserta/reset', 'id' => $data->ID], ['class' => ' glyphicon glyphicon-repeat','title'=>'Atur ulang verifikasi', 'data-toggle'=>'tooltip','style'=>'text-decoration: none; cursor:pointer;','data' => [
                'confirm' => 'Apakah anda ingin melakukan verifikasi ulang pada data ini?',
                'method' => 'post',
            ],]);
            }
            }
            ],
        ],
    ]); ?>
</div>
