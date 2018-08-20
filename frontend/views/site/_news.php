
<?php
// use yii\helpers\Html;
use yii\bootstrap\Html;

$formatter = \Yii::$app->formatter;
?>

<div class="col-md-3" >
  <div class="panel " style="border-radius:0px">
    <div class="panel-body" >
      <img src="<?= Yii::$app->urlManagerBackend->baseUrl ?><?= '/'.$model->sampul ?>" alt="test" width="100%" height='120px' >
      <h4 align='center' ><?= Html::a($model->judul,['','id' => $model->ID]) ?></h4><hr style="margin-bottom:0px;">
      <p><?= $model->preview ?></p>
      <hr style="margin-top:0px; margin-bottom:10px;">
      <div class="text-right">
        <span class="badge"><span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;<?= $formatter->asDate($model->publish_at, 'long') ?></span>
        <!-- <time class="timeago badge" datetime="<?= $model->update_at ?>"></time> -->
      </div>
    </div>
  </div>
</div>
</div>
