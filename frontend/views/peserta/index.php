<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PesertaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Registered';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peserta-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'ID',
             [
               'header' => 'Course Name',
               'value' => 'coursePeserta.nama_course',
               'filter' => Html::activeDropDownList($searchModel, 'id_course',$course,['class'=>'form-control','prompt'=>''])
            ],
            'atas_nama',
            'email:email',
            'hp',
            // 'status',
            'bukti_bayar',

            ['class' => 'yii\grid\ActionColumn',
             'template'=>'{update}&nbsp;&nbsp;&nbsp;{delete}'
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
