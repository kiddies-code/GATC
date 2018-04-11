<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Gontor Agrotech Training Center';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-8">
                
                <div class="jumbotron">
        <h1>Welcome....</h1>

        <p class="lead">Selamat Datang di Website Gontor Agrotech Training Centre</p>

    </div>

                
                <h3 align='center'>GONTOR AGROTECH TRAINING CENTRE <br>(GONTOR ATC)</h3><br>

                <p align='justify'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Gontor Agrotech Training Centre (Gontor ATC)</b> merupakan pusat pelatihan dalam bidang agroteknologi yang bertempat di Universitas Darussalam Gontor. Kegiatan Gontor ATC bertujuan membuka wawasan, memberi bekal ketrampilan dan pendampingan bidang Agroteknologi kepada siswa, mahasiswa dan masyarakat umum. Gontor ATC merancang dua jenis kegiatan utama yakni pelatihan dan pendampingan. Kegiatan pelatihan bertujuan untuk memberikan bekal ketrampilan, kualitas kepemimpinan, kreatifitas, responsif terhadap perubahan dan kerjasama. Kegiatan pendampingan bertujuan sebagai fasilitator antar professional. </p>
                <br><br><br>
            
            </div>
            <div class="col-lg-3 pull-right kursus">
                <h3>Course</h3>
<hr>
                <?php
                    foreach($model as $C){ 
                if($C->status =='aktif'){
                ?>
                
                <div>
                <?= Html::a('<h5><b>'.$C->nama_course.'</b></h5>',['site/viewcourse','ID'=>$C->ID]);
                    echo "<p align='justify'>".substr($C->detail_course,0,60)."...</p><hr>";
                    ?>
                </div>
                <?php
                }
                     }  ?>
                
            </div>
        </div>

    </div>
</div>
