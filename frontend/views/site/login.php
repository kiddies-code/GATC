<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
?>

<div class="container" style="padding-top:70px;">
<div class="col-md-2" style="height:10px;"></div>
<div class="col-md-8 panel panel-default">
<div class="text-center" style="margin:50px 0px 50px 0px;">
  <img src='<?= Yii::$app->urlManager->baseUrl ?>/images/GATC.png' align='center' width="20%">
</div>
<ul class="nav nav-pills nav-justified " >
    <li class="active"><a data-toggle="tab" href="#home"><b>Login</b></a></li>
    <li><a data-toggle="tab" href="#menu1"><b>Signup</b></a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <div class="col-md-2" style="height:10px;">
      </div>
      <div class="col-md-8" style="padding:20px 20px 20px 20px;">
      <br>
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true,'placeholder'=>'Username or Email']) ?>

            <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Password']) ?>

            <?= $form->field($model, 'rememberMe')->checkbox() ?>

            <div style="color:#999;margin:1em 0">
                If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
            </div>

            <div class="form-group">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>

        <?php ActiveForm::end(); ?>
      </div>
      <div class="col-md-2" style="height:10px;">
      </div>
    </div>
    <div id="menu1" class="tab-pane fade">
      <div class="col-md-2" style="height:10px;">
      </div>
      <div class="col-md-8" style="padding:20px 20px 20px 20px;">
      <br>
      <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

          <?= $form->field($mode, 'username')->textInput(['autofocus' => true]) ?>

          <?= $form->field($mode, 'email') ?>

          <?= $form->field($mode, 'password')->passwordInput() ?>

<!--          $form->field($model, 'status_admin')->dropDownList(['user'=>'User','admin'=>'Admin'])-->

          <div class="form-group">
              <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
          </div>

      <?php ActiveForm::end(); ?>
      </div>
      <div class="col-md-2" style="height:10px;">
      </div>
    </div>
  </div>
</div>
</div>
<div class="col-md-2" style="height:10px;"></div>
</div>
