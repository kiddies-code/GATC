<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        
        <img src='<?= Yii::$app->urlManagerFrontend->baseUrl ?>/images/GATC.png' align='center' width="50%">
        <br>
        <br>
        <h1>SELAMAT DATANG</h1>
        <p class="lead">Gontor Agrotech Training Centre</p>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <p><a class="btn btn-default" href="?r=course">Gontor ATC Courses &raquo;</a></p>
            </div>
            
            <div class="col-lg-4">
                <p><a class="btn btn-default" href="?r=peserta"> Gontor ATC Participants&raquo;</a></p>
            </div>
            
            <div class="col-lg-4">
                <p><a class="btn btn-default" href="?r=user">Gontor ATC Users &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
