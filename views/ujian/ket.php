<?php $_SESSION['soal'] = 'petunjuk'; ?>
<h3 class="page-header"><i class="glyphicon glyphicon-user"></i> Data Santri dan Ujian</h3>
<!--
<div class="row">
   <div class="col-md-3">Nomor Whatsapp</div>
   <div class="col-md-9">: <b><?= $_SESSION['wa'] ?> </b> </div>
</div><br/>
-->

<div class="row">
   <div class="col-md-3">Nama Lengkap</div>
   <div class="col-md-9">: <b><?= $_SESSION['nama'] ?> </b></div>
</div><br/>
<div class="row">
   <div class="col-md-3">Kelas</div>
   <div class="col-md-9">: <b>XII Salafiyah Ulya</b></div>
</div><br/>
<div class="row">
   <div class="col-md-3">Materi</div>
   <div class="col-md-9">: <b><?= $data['mapel'] ?></b></div>
</div><br/>
<div class="row">
   <div class="col-md-3">Jumlah Soal</div>
   <div class="col-md-9">: <b><?= $_GET['c'] ?></b></div>
</div><br/>
<div class="row">
   <div class="col-md-3">Waktu Mengerjakan</div>
   <div class="col-md-9">: <b><?= $data['waktu'] ?> menit</b></div>
</div><br/>

<div class="row">
   <div class="col-md-12">
<!-- <a class="btn btn-danger disabled"> Sudah mengerjakan </a> -->
<a class="btn btn-primary" href="<?= BASEURL ?>/ujian/soal?id=<?= $_GET['id'] ?>">
<i class="glyphicon glyphicon-log-in"></i> Masuk Ujian</a>
  
   </div>
</div><br/>
