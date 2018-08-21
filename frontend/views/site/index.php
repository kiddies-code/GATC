<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Gontor Agrotech Training Center';
?>
<div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-top:50px;">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="<?= Yii::$app->urlManager->baseUrl ?>/images/1.png" alt="" width="100%" height="100">
        <div class="carousel-caption">
          <h4>Pelatihan Terbaik</h4>
          <p></p>
        </div>
      </div>

      <div class="item">
        <img src="<?= Yii::$app->urlManager->baseUrl ?>/images/2.png" alt="" width="100%" height="100">
        <div class="carousel-caption">
          <h4>Pendampingan Menyeluruh</h4>
          <p></p>
        </div>
      </div>

      <div class="item">
        <img src="<?= Yii::$app->urlManager->baseUrl ?>/images/3.png" alt="" width="100%" height="100">
        <div class="carousel-caption">
          <h4>Keterampilan dan Kreatifitas</h4>
          <p></p>
        </div>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
<!-- ------------------------------------------- -->

<div class="site-index container" >
    <div class="body-content">
        <div class="row">
            <div class="col-lg-12">

                <div class="jumbotron">
        <br>
        <img src='<?= Yii::$app->urlManager->baseUrl ?>/images/GATC.png' align='center' width="50%">

    </div>


                <h3 align='center'>GONTOR AGROTECH TRAINING CENTRE <br>(GONTOR ATC)</h3><br>

                <p align='justify'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Gontor Agrotech Training Centre (Gontor ATC)</b> merupakan pusat pelatihan dalam bidang agroteknologi yang bertempat di Universitas Darussalam Gontor. Kegiatan Gontor ATC bertujuan membuka wawasan, memberi bekal ketrampilan dan pendampingan bidang Agroteknologi kepada siswa, mahasiswa dan masyarakat umum. Gontor ATC merancang dua jenis kegiatan utama yakni pelatihan dan pendampingan. Kegiatan pelatihan bertujuan untuk memberikan bekal ketrampilan, kualitas kepemimpinan, kreatifitas, responsif terhadap perubahan dan kerjasama. Kegiatan pendampingan bertujuan sebagai fasilitator antar professional. </p>
                <br><br><br>

            </div>

        </div>

    </div>
  </div>

  <div style='background-image: url("<?= Yii::$app->urlManager->baseUrl ?>/images/back-site.png");background-size: 1500px 100%;background-repeat: no-repeat; padding:35px;'>

    <div class="container">
        <span class="text-center" ><h1 style="color:white; margin-bottom:10px;margin-top:0px;font-size:50px;"><b>News</b></h1></span>
    <?=
      \yii\widgets\ListView::widget([
        'dataProvider' => $berita,
        'itemView' => '_news',
        'layout' => '<br><div class="row">{items}</div>',
      ]);
    ?>
  </div>
  </div>

  <div class="container" style="padding: 30px 15px 0px 15px;" >
    <span class="text-center" ><h1 style="margin-bottom:0px;margin-top:0px;font-size:50px;"><b>Course</b></h1></span>
    <?=
      \yii\widgets\ListView::widget([
        'dataProvider' => $course,
        'itemView' => '_course',
        'layout' => '<br><div class="row">{items}</div>',
      ]);
     ?>
  </div>
<br>
