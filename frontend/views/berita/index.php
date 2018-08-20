<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Beritas';

?>
<div class="berita-index container" style="padding-top:65px;">
  <?=
    \yii\widgets\ListView::widget([
      'dataProvider' => $dataProvider,
      'itemView' => '_news',
      'layout' => '<br><div class="row">{items}</div><div class="text-center">{pager}</div>',
    ]);
  ?>
</div>
<br>
