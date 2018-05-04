<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Courses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Course', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'ID',
            'nama_course',
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
                'filter'=>DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'tanggal_berakhir',
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd'
                            ]
                    ])        
            ],
            'harga',
            //'kontak1',
            // 'kontak2',
            // 'kontak3',
            [
                'attribute'=>'tanggal_buka',
                'value'=>'tanggal_buka',
                'format'=>'raw',
                'filter'=>DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'tanggal_buka',
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd'
                            ]
                    ])        
            ],
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
              'attribute'=>'status',
              'filter'=>['aktif'=>'Aktif','nonaktif'=>'Nonaktif'],
            ],
            // 'image',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
