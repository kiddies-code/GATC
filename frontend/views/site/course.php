<?php $this->title = 'Gontor Agrotech Training Center'; ?>
<div class="container" style="padding-top:65px;">
  <?=
    \yii\widgets\ListView::widget([
      'dataProvider' => $course,
      'itemView' => '_course',
      'layout' => '<br><div class="row">{items}</div><div class="text-center">{pager}</div>',
    ]);
   ?>
</div>
<br>
