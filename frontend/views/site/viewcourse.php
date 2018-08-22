<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Course */

$formatter = \Yii::$app->formatter;
$this->title = $model->nama_course;
?>
<div class="container " style="padding-top:65px;">
<div class="panel panel-default col-md-12">
<div class="">
<div class="text-center">
  <h3><b><?= $model->nama_course ?></b></h3><hr style="margin:0px;">
  <br>
</div>
<div class="col-md-4">
  <img src="<?= Yii::$app->urlManagerBackend->baseUrl ?><?= '/'.$model->image ?>" alt="test" width="100%" height='100%'style="box-shadow: 0px 0px 3px grey;" >
</div>
<div class="col-md-8" style="padding-top:20px;">

  <div class="col-md-7">
<div>
<div class="col-md-5" style="margin-bottom:5px;">
    <span class="" style="font-size:13px;border-radius:0px 15px 15px 0px;background-color:#1b5e20;color:white;padding:5px 7px 5px 5px;"><b>Akhir Pendaftaran </b></span>
</div>
<div class="col-md-7" style="margin-bottom:15px;">
    <span style="font-size:14px;"><?= $formatter->asDate($model->tanggal_tutup, 'long') ?></span>
</div>
</div>

<div>
<div class="col-md-4" style="margin-bottom:5px;">
    <span class="" style="font-size:13px;border-radius:0px 15px 15px 0px;background-color:#2e7d32;color:white;padding:5px 7px 5px 5px;"><b>Pelaksanaan </b></span>
</div>
<div class="col-md-8" style="margin-bottom:15px;">
    <span style="font-size:14px;">
      <?php
        if($model->tanggal_pelaksanaan == $model->tanggal_berakhir){
      echo $formatter->asDate($model->tanggal_pelaksanaan, 'long');
    }else{
      echo $formatter->asDate($model->tanggal_pelaksanaan, 'long').' - '.$formatter->asDate($model->tanggal_berakhir, 'long');;
    }
           ?>
    </span>
</div>
</div>

<div>
<div class="col-md-4" style="margin-bottom:5px;">
    <span class="" style="font-size:13px;border-radius:0px 15px 15px 0px;background-color:#388e3c;color:white;padding:5px 7px 5px 5px;"><b>Pembayaran</b></span>
</div>
<div class="col-md-8" style="margin-bottom:15px;">
    <span style="font-size:14px;">
      <?php
        if($model->bayar == 'Y' && $model->harga > 0){
          echo 'Rp.'.$model->harga;
        }else{
          echo 'Free';
        }
       ?>
    </span>
</div>
</div>

<div>
<div class="col-md-3" style="margin-bottom:5px;">
    <span class="" style="font-size:13px;border-radius:0px 15px 15px 0px;background-color:#43a047;color:white;padding:5px 7px 5px 5px;"><b>Kuota</b></span>
</div>
<div class="col-md-9" style="margin-bottom:15px;">
    <span style="font-size:14px;">
      <?php
        if($model->jumlah_max != '99999'){
          echo $model->jumlah_max.' Orang';
        }else{
          echo 'Unlimited';
        }
       ?>
    </span>
</div>
</div>

<div>
<div class="col-md-5" style="margin-bottom:5px;">
    <span class="" style="font-size:13px;border-radius:0px 15px 15px 0px;background-color:#4caf50;color:white;padding:5px 7px 5px 5px;"><b>Team / Individu</b></span>
</div>
<div class="col-md-7" style="margin-bottom:15px;">
    <span style="font-size:14px;">
      <?php
        if($model->tim_anggota == 'Y'){
          echo 'Team';
        }else{
          echo 'Individu';
        }
       ?>
    </span>
</div>
</div>

  </div>


  <div class="col-md-5 panel panel-default" style="height: 150px;">
    <h5><b>Persyaratan :</b></h5>
    <?php
    if(($model->bayar == 'Y' && $model->harga != 0)|| $model->berkas == 'Y' || $model->proposal == 'Y'){
      if($model->bayar == 'Y' && $model->harga != 0){
        echo '- Pembayaran<br>';
      }
      if($model->berkas == 'Y'){
        echo '- Pengumpulan berkas<br>';
      }
      if($model->proposal == 'Y'){
        echo '- Pengumpulan proposal<br>';
      }
    }else{
      echo 'Tidak ada persyaratan';
    }
    ?>
  </div>
</div>
</div>
<div class="col-md-12">
  <hr>
  <?= $model->detail_course ?>
</div>
<div class="text-center col-md-12" style="margin-bottom:50px;">
  <?php
  $tutup = Yii::$app->formatter->asDate($model->tanggal_tutup, 'yyyymmdd');

    if(!Yii::$app->user->isGuest){
      if($tutup < date('yyyymmdd')){
        echo Html::a('&nbsp;&nbsp; Course Telah Ditutup &nbsp;&nbsp;', ['site/course'], ['class' => 'btn btn-danger','style'=> 'font-size:20px;border-radius:40px;padding:10px;']);
      }else if($model->jumlah_max <= $model->jumlah_peserta){
        echo Html::a('&nbsp;&nbsp; Kuota Sudah Penuh &nbsp;&nbsp;', ['site/course'], ['class' => 'btn btn-danger','style'=> 'font-size:20px;border-radius:40px;padding:10px;']);
      }else{
    echo Html::a('&nbsp;&nbsp; Daftar Sekarang &nbsp;&nbsp;', ['peserta/create','id_kursus'=>$model->ID], ['class' => 'btn btn-success','style'=> 'font-size:20px;border-radius:40px;padding:10px;']);
    }
  }else{
    if($tutup < date('yyyymmdd')){
      echo Html::a('&nbsp;&nbsp; Course Telah Ditutup &nbsp;&nbsp;', ['site/course'], ['class' => 'btn btn-danger','style'=> 'font-size:20px;border-radius:40px;padding:10px;']);
    }else if($model->jumlah_max <= $model->jumlah_peserta){
      echo Html::a('&nbsp;&nbsp; Kuota Sudah Penuh &nbsp;&nbsp;', ['site/course'], ['class' => 'btn btn-danger','style'=> 'font-size:20px;border-radius:40px;padding:10px;']);
    }else{
    echo Html::a('&nbsp;&nbsp; Daftar Sekarang &nbsp;&nbsp;', ['login'], ['class' => 'btn btn-success','style'=> 'font-size:20px;border-radius:40px;padding:10px;']);
  }
}
            ?>
</div>
</div>
</div>
