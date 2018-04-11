<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Courses';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-index">
<h1>Courses</h1>
<div class="body-content">
<?php
foreach($model as $C){ 
if($C->status =='aktif'){

?>
<div class="row kursus col-lg-12">
    <div class=" col-lg-4 pull-left" style='padding-left:22px; margin-right:10px;'>
    <img src="../../backend/web/<?= $C->image; ?>" class="fotokursus img-rounded"><br>
    </div>
    <div class=" detkurs">
        <?= Html::a('<b style="font-size:22px">'.$C->nama_course.'</b>',['site/viewcourse','ID'=>$C->ID])."<hr>"; ?>
    <p align='justify'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= substr($C->detail_course,0,275)."..."; ?> </p>
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