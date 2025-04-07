<div class="jumbotron">
    <div class="container text-center">
        <h2>أهلا و سهلا <br> <b> <?= $_SESSION['nama']; ?> </b></h2>
    </div>
</div>
<?php if($_SESSION['login']!=1): ?>
<div class="container-fluid" style="margin-top: 10px;">   
    <div class="row">
        <div class="col-md-12 text-center">
                <div class="alert alert-success" role="alert">
                  Silakan mengerjakan latihan soal yang tersedia. Klik tombol "Kerjakan"!
                </div>
        </div>
    </div>
    
<table class="table table-striped">
   <thead>
   <tr>
      <th>No</th>
      <th>Soal</th>
      
   </tr>
   </thead>
   <tbody>
   <tr>
         <td>1</td>
         <td>USP Bahasa Arab 2024&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?= BASEURL ?>/ujian/soal?id=11" class="btn btn-primary">Kerjakan</a></td>
    </tr>
    <tr>
         <td>2</td>
         <td>Latihan USP Bahasa Arab 2025&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?= BASEURL ?>/ujian/soal?id=8" class="btn btn-primary">Kerjakan</a></td>
    </tr>
    </tbody>
</table>
</div>
<?php endif; ?>