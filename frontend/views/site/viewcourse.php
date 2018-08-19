<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Course */

$this->title = $model->nama_course;
$this->params['breadcrumbs'][] = ['label' => 'Course', 'url' => ['course']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-view ">

    <div class="kursus col-lg-12">
<p align='center'>
        <img src="<?= Yii::$app->urlManagerBackend->baseUrl ?>/<?= $model->image; ?>" class="fotodetail img-rounded" >
</p>
        <h2 align="center"><b><?= $model->nama_course; ?></b></h2><br>
            <p align="justify" class=".text-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php echo $model->detail_course; ?>
            <!-- echo Yii::$app->formatter->asNtext($model->detail_course) -->
            </p>
            <h4>
             <?php
                if($model->harga==0){
                    echo "Biaya: Free";
                }else{
                    echo "Biaya: Rp.".$model->harga.'/orang';
                }
            ?>
            </h4>
            <h4>Tanggal Pelaksanaan :
            <?php
                if(!empty($model->tanggal_berakhir)){
                echo $model->tanggal_pelaksanaan.' sampai '.$model->tanggal_berakhir;
                }else{ echo $model->tanggal_pelaksanaan; }
            ?>
            </h4>
            <h4>Pendaftaran ditutup pada <?= $model->tanggal_tutup; ?></h4>

            <?php
                if($model->jumlah_max==99999){
                    echo '<h4>Kuota tidak terbatas</h4>';
                }else{
                    echo '<h4>Peserta terbatas untuk '.$model->jumlah_max.' orang</h4>';
                }
            ?>
            <br>
        <?php
    if(!Yii::$app->user->isGuest){
    echo Html::a('&nbsp;&nbsp; Daftar &nbsp;&nbsp;', ['peserta/create','id_kursus'=>$model->ID], ['class' => 'btn btn-success pull-left']);
    }else{
    echo Html::a('&nbsp;&nbsp; Daftar &nbsp;&nbsp;', ['login'], ['class' => 'btn btn-success pull-left']);
    }
            ?>
</div>

</div>
