<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\PesertaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Participants';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peserta-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

     <p>
        <?= Html::a('Create Participant', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'ID',
            //'id_course',
             [
               'header' => 'Course Name',
               'value' => 'coursePeserta.nama_course',
               'filter' => Html::activeDropDownList($searchModel, 'id_course',$course,['class'=>'form-control','prompt'=>''])
            ],
            'atas_nama',
            'email:email',
            'username',
            'hp',
//            'bukti_bayar',
            [
                'attribute'=>'bukti_bayar',
                'format'=>'raw',
                'value' => function($data){
            return
            Html::a('View', ['peserta/display', 'id' => $data->ID],['class' => 'btn btn-warning']).'&nbsp;&nbsp;'.
            Html::a('Download', ['peserta/download', 'id' => $data->ID],['class' => 'btn btn-primary']);
            }
            ],
//            'status',
            [
                'attribute'=>'status',
                'filter'=>[ 'menunggu' => 'Menunggu', 'verifikasi' => 'Verifikasi', 'lunas'=>'Lunas' ],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
