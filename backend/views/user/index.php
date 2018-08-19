<?php

use kartik\export\ExportMenu;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';

$gridColumns = [
//    ['class' => 'yii\grid\SerialColumn'],
            'id',
            'username',
            'email:email',
            'status_admin',
            'status',
//    ['class' => 'yii\grid\ActionColumn'],
];
?>
<div class="user-index">
    <h1><?= Html::encode($this->title) ?><hr style="margin-top:0px;"></h1><br>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <span class="pull-right">
    <?=
    ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $gridColumns,
            ]).'<br>'
    ?></span>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p><br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model){
            if($model->status == 'nonaktif'){
                return ['class'=>'danger'];
            }else{

            }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'username',
            'email:email',
            [
                'attribute' => 'status_admin',
                'format' => 'raw',
                'filter' => ['admin' => 'Admin', 'user' => 'User']
            ],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => 'status',
                'filter' => ['aktif' => 'Aktif', 'nonaktif' => 'Nonaktif']
            ],
//            'auth_key',
//            'password_hash',
            // 'password_reset_token',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn','header'=>'Action'],
//            [
//                'header'=>'Activation',
//                'format'=>'raw',
//                'value' => function($data){
//            if($data->status == "nonaktif"){
//            return
//            Html::a('Aktifkan', ['user/aktif', 'id' => $data->id],['class' => 'btn btn-success']);
//            }else{
//            return Html::a('Nonaktifkan', ['user/mati', 'id' => $data->id], ['class' => 'btn btn-danger','data' => [
//                'confirm' => 'Apakah anda ingin menonaktifkan user ini?',
//                'method' => 'post',
//            ],]);
//            }
//            }
//            ],

        ],
    ]); ?>
</div>
