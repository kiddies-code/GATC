<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p><br>
<!--         Html::a('Create User', ['create'], ['class' => 'btn btn-success']) -->
    </p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'username',
            //'auth_key',
            //'password_hash',
            // 'password_reset_token',
            'email:email',
            'status_admin',
//            'status',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn',
             'template'=>'{delete}'
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
