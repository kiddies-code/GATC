<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Courses';
?>
<div class="site-index container" style="padding:75px 10px 0px 10px;">
<!-- <h1 style='margin-bottom:0px;margin-top:0px;'>Courses</h1> -->
    <!-- <hr style='margin-top:0px;margin-right:25px;'> -->
<div class="body-content">
<?php
foreach($model as $C){
if($C->status =='aktif'){

?>
<div class="row kursuss col-lg-12">
    <div class=" col-lg-4 pull-left" style='padding-left:22px; margin-right:10px;'>
    <img src="<?= Yii::$app->urlManagerBackend->baseUrl ?>/<?= $C->image; ?>" class="fotokursus img-rounded"><br><br>
    </div>
    <div class=" detkurs">
        <?= Html::a('<b style="font-size:22px;color:#336033">'.$C->nama_course.'</b>',['site/viewcourse','ID'=>$C->ID])."<hr style='margin-top:0px;border-color:#c6c2c2;'>"; ?>
    <p align='justify' style='margin-right:15px'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= substr($C->detail_course,0,350)."..."; ?> </p>
    <br>
        <span class="pull-left "><b style="font-size:16px">Kuota Peserta:


            <?php
                if($C->jumlah_max==99999){
                  echo 'Unlimited </b>';
                }else{
                    echo $C->jumlah_max.' orang </b>';
                }
            ?>
<!--            orang</b>-->

            <br>
        <b style="font-size:18px"><?= 'Batas akhir pendaftaran: '.$C->tanggal_tutup; ?></b><br>
        <b style="font-size:18px">
            <?php
                if($C->harga==0){
                    echo "Biaya: Free";
                }else{
                    echo "Biaya: Rp.".$C->harga;
                }
            ?></b>
        </span>
        <span class="pull-right"><br><br>
            <!--
                if(!Yii::$app->user->isGuest){
                echo Html::a('Daftar Sekarang &raquo;',['peserta/create','id_kursus'=>$C->ID],['class'=>'btn btn-default']);
                }else{
                echo Html::a('Daftar Sekarang &raquo;',['login'],['class'=>'btn btn-default']);
                }
            -->
        </span>
    </div>
</div>
<?php
                     }
                     }
?>
    </div></div>
