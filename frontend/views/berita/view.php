<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Berita */
$formatter = \Yii::$app->formatter;
$this->title = $model->judul;
?>
<div class="berita-view container " style="padding-top:65px;">
  <div class="col-md-1" height='10px;'></div>
<div class="col-md-10" style="margin-bottom:30px;">
<img src="<?= Yii::$app->urlManagerBackend->baseUrl ?><?= '/'.$model->sampul ?>" alt="test" width="100%" height='100%' >
<br>
<div class="text-center">
<h2 style="text-center"><?= $model->judul ?></h2><hr style="margin-top:5px;">
</div>
<div class="">
  <div class="col-md-8">
    <div class=" col-md-12" style="background-color:#e9e9e9; border-radius:5px;padding:5px 20px 5px 20px; margin-bottom:15px;">
      <div class="text-right">
        <span class="">Published : <?= $formatter->asDate($model->publish_at, 'long') ?></span>
      </div>
    </div>
    <?= $model->isi ?>
  </div>
  <div class="col-md-4 panel panel-default">
    <h4 style="margin-bottom:0px;"><b>Recent News :</b></h4>
    <?=
      \yii\widgets\ListView::widget([
        'dataProvider' => $berita,
        'itemView' => '_flying',
        'layout' => '<br><div class="row">{items}</div>',
      ]);
     ?>
  </div>
</div>
</div>
<div class="col-md-1" height='10px;'></div>
</div>
