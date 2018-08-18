<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Gontor Agrotech Training Center';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-8">
                
                <div class="jumbotron">
        <br>
        <img src='<?= Yii::$app->urlManager->baseUrl ?>/images/GATC.png' align='center' width="90%">

    </div>

                
                <h3 align='center'>GONTOR AGROTECH TRAINING CENTRE <br>(GONTOR ATC)</h3><br>

                <p align='justify'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Gontor Agrotech Training Centre (Gontor ATC)</b> merupakan pusat pelatihan dalam bidang agroteknologi yang bertempat di Universitas Darussalam Gontor. Kegiatan Gontor ATC bertujuan membuka wawasan, memberi bekal ketrampilan dan pendampingan bidang Agroteknologi kepada siswa, mahasiswa dan masyarakat umum. Gontor ATC merancang dua jenis kegiatan utama yakni pelatihan dan pendampingan. Kegiatan pelatihan bertujuan untuk memberikan bekal ketrampilan, kualitas kepemimpinan, kreatifitas, responsif terhadap perubahan dan kerjasama. Kegiatan pendampingan bertujuan sebagai fasilitator antar professional. </p>
                <br><br><br>
            
            </div>
            <div class="col-lg-3 pull-right kursus">
                <h3 style='margin-bottom:5px;'>Course</h3>
<hr style='margin:0px;border-color:black;'>
                <?php
                $jess = 0;
                    foreach($model as $C){ 
                if($C->status =='aktif'){
                ?>
                <?= Html::a('<h5 style="color:#336033"><b>'.$C->nama_course.'</b></h5>',['site/viewcourse','ID'=>$C->ID]);
                    echo "<p align='justify' style='font-size:12px;'>".''.substr($C->detail_course,0,100)."...</p><hr style='margin:0px; margin-bottom:20px;border-color:#c6c2c2;'>";
                    ?>
                
                <?php
                $jess++; 
                }
                if ($jess == 5) break;
                     }  ?>
                
            </div>
        </div>

    </div>
</div>
