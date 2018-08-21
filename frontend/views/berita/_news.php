
<?php
use yii\helpers\Html;

$formatter = \Yii::$app->formatter;
?>

<div class="col-md-4" >
  <div class="panel panel-default">
    <div class="panel-body" style="padding:0px 0px 11px 0px;">
      <img src="<?= Yii::$app->urlManagerBackend->baseUrl ?><?= '/'.$model->sampul ?>" alt="test" width="100%" height='200px' >
      <div style="padding:0px 15px 0px 15px;">
      <h4 align='center' ><?= Html::a($model->judul,['berita/view','slug'=>$model->slug,'id' => $model->ID]) ?></h4><hr style="margin-bottom:0px;">
      <p><?= $model->preview ?> </p>
      <hr style="margin-top:0px; margin-bottom:10px;">
      <div class="text-right">
        <span class="badge"><span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;<?= $formatter->asDate($model->publish_at, 'long') ?></span>
      </div>
      </div>
    </div>
  </div>
</div>
</div>
