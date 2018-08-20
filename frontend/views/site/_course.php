
<?php
// use yii\helpers\Html;
use yii\bootstrap\Html;

$formatter = \Yii::$app->formatter;
?>

<div class="col-md-12" >
  <div class="panel panel-default">
    <div class="panel-body" >
      <h4 align='left' ><?= Html::a($model->nama_course,['site/viewcourse','ID' => $model->ID]) ?></h4><hr style="margin-bottom:10px;">
      <div>
      <div class="col-md-3">
        <img src="<?= Yii::$app->urlManagerBackend->baseUrl ?><?= '/'.$model->image ?>" alt="test" width="100%" height='50%' >
      </div>
      <div class="col-md-9"><p style="padding-top:5px;"><?= $model->prev; ?></p><br></div>
    </div>
      <div class="text-right">

        <span class="label label-default"><span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;<?= $formatter->asDate($model->tanggal_pelaksanaan, 'long') ?></span>
      </div>
    </div>
  </div>
</div>
