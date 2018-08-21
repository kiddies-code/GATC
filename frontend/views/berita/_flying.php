
<?php
use yii\helpers\Html;

$formatter = \Yii::$app->formatter;
?>

  <div class="">
    <div class="panel-body" style="padding:0px 10px 5px 10px;">
      <div style="padding:0px 15px 0px 15px;">
      <hr style="margin-top:0px; margin-bottom:10px;margin-top:0px;">
      <h5 align='left' style="margin-bottom:0px;"><?= Html::a($model->judul,['berita/view','slug'=>$model->slug,'id' => $model->ID]) ?></h5>
      <p><?= $model->fly ?> </p>
      </div>
    </div>
  </div>
</div>
