<?php

use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\datepicker\DatePicker;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BeritaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News';

$gridColumns = [
//    ['class' => 'yii\grid\SerialColumn'],
            'ID',
            'judul',
            'update_at',
            'publish_at',
            'oleh0.username',
//    ['class' => 'yii\grid\ActionColumn'],
];
?>
<div class="berita-index">

    <h1><?= Html::encode($this->title) ?><hr style="margin-top:0px;"></h1>
<br>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <span class="pull-right">
    <?=
    ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $gridColumns,
            ]).'<br>'
    ?></span>
    <p>
        <?= Html::a('Create News', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'ID',
            [
                'attribute' => 'judul',
                'contentOptions' => ['style' => 'width:40%;  white-space: normal;'],
            ],
            // 'sampul',
            // 'isi:ntext',
            // 'slug',
            [
                'attribute'=>'update_at',
                'value'=>'update_at',
                'format'=>'raw',
                'filter'=>DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'update_at',
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd'

                            ]
                    ])
            ],
            [
                'attribute'=>'publish_at',
                'value'=>'publish_at',
                'format'=>'raw',
                'filter'=>DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'publish_at',
                            'clientOptions' => [
                              'minViewMode'=>'months',
                                'autoclose' => true,
                                'format' => 'yyyy-mm'
                            ]
                    ])
            ],
            ['attribute'=>'oleh',
             'value'=>'oleh0.username'
           ],

            ['class' => 'yii\grid\ActionColumn',
            'header'=>'Action'],
        ],
    ]); ?>
</div>
