<?php

use kartik\export\ExportMenu;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Courses';

$gridColumns = [
//    ['class' => 'yii\grid\SerialColumn'],
//            'ID',
            'nama_course',
            'detail_course',
            'tanggal_pelaksanaan',
            'tanggal_berakhir',
            'tanggal_tutup',
            'jumlah_peserta',
            'jumlah_max',
            'berkas',
            'proposal',
            'tim_anggota',
            'bayar',
            'harga',
            'status',
            
//    ['class' => 'yii\grid\ActionColumn'],
];

?>
<div class="course-index">

    <h1><?= Html::encode($this->title) ?><hr style="margin-top:0px;"></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <span class="pull-right">
    <?=
    ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $gridColumns,
            ]).'<br><br>'    
        ?></span>
    <p>
        <?= Html::a('Create Course', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
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

            //'ID',
            [
                'attribute' => 'nama_course',
                'contentOptions' => ['style' => 'width:20%;  white-space: normal;'],
            ],
//            'nama_course',
            //'detail_course:ntext',
            [
                'attribute'=>'tanggal_pelaksanaan',
                'value'=>'tanggal_pelaksanaan',
                'format'=>'raw',
                'filter'=>DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'tanggal_pelaksanaan',
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd'
                            ]
                    ])        
            ],
            [
                'attribute'=>'tanggal_berakhir',
                'value'=>'tanggal_berakhir',
                'format'=>'raw',
//                'filter'=>DatePicker::widget([
//                        'model' => $searchModel,
//                        'attribute' => 'tanggal_pelaksanaan',
//                            'clientOptions' => [
//                                'autoclose' => true,
//                                'format' => 'yyyy-mm-dd'
//                            ]
//                    ])
            ],
//            'harga',
            //'kontak1',
            // 'kontak2',
            // 'kontak3',
            [
                'attribute'=>'tanggal_tutup',
                'value'=>'tanggal_tutup',
                'format'=>'raw',
                'filter'=>DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'tanggal_tutup',
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd'
                            ]
                    ])        
            ],
             'jumlah_peserta',
             'jumlah_max',
//             'status',
            [
                'attribute' => 'berkas',
                'filter'=>['Y'=>'Yes','N'=>'No'],
            ],
            [
                'attribute' => 'bayar',
                'filter'=>['Y'=>'Yes','N'=>'No'],
            ],
            [
                'attribute' => 'proposal',
                'filter'=>['Y'=>'Yes','N'=>'No'],
            ],
            [
                'attribute' => 'tim_anggota',
                'filter'=>['Y'=>'Yes','N'=>'No'],
            ],
            [
              'attribute'=>'status',
              'filter'=>['aktif'=>'Aktif','nonaktif'=>'Nonaktif'],
            ],
            // 'image',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
