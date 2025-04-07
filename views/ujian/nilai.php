<h3 class="page-header">Daftar Nilai</h3>
<table class="table table-striped">
   <thead>
   <tr>
      <th>No</th>
      <th>Materi</th>
      <th>Nilai</th>
   </tr>
   </thead>
   <tbody>
   <tr>
         <td>1</td>
         <td><?= $data['mapel'] ?></td>
         <td><?= $nilai[0]['nilai'] ?></td>
    </tr>
    </tbody>
</table>
<?php if(isset($success)): ?>
<div class="alert alert-secondary text-center" role="alert">
                KUNCI JAWABAN
            </div>
<?php
 $jawab = $nilai;
 $arrayJwb = explode(',', $jawab[0]['jawaban']); ?>
<div class="row">
  <div class="col-md-12"><div class="konten-ujian">

<div class="blok-soal soal-1">
<div>
<?php
$no = 1;
  
$id = $_GET['id'];
foreach($soal as $i => $s):
$check = $arrayJwb[$i];
$k = $s['kunci'];
$k2 = [
     $s['a'],
     $s['b'],
     $s['c'],
     $s['d'],
     $s['e']
     
  ][(int)$k];
        
if(file_exists(__DIR__ . "/../../assets/audio/audio{$id}.{$no}.mp3")):
?>
    <div class="row">
        <div class="col-xs-12 text-right">
            <audio controls>
                <source src="<?= BASEURL ?>/assets/audio/audio<?= $no ?>.mp3" type="audio/mpeg">
            </audio>
        </div>
    </div>
    <br>
<?php endif; ?>
<?php if(file_exists(__DIR__ . "/../../assets/img/img{$id}." . $no . "a.png")):
?>
    <div class="row">
        <div class="col-xs-12 text-right">
            
                <img src="<?= BASEURL ?>/assets/img/img<?= $id ?>.<?= $no ?>a.png">
            
        </div>
    </div>
    <br>
<?php endif; ?>
<div class="row">
   <div class="col-xs-1" style="float: right"><div class="nomor"><?= $no++ ?></div></div>
   <div class="col-xs-11" style="float: right"><div class="text-right"><?= $s['soal'] ?></div> </div>
</div>
                  
<?php if(file_exists(__DIR__ . "/../../assets/img/img{$id}." . ($no-1) . ".png")):
?>
    <div class="row">
        <div class="col-xs-12 text-right">
            
                <img src="<?= BASEURL ?>/assets/img/img<?= $id ?>.<?= ($no - 1) ?>.png">
            
        </div>
    </div>
    <br>
<?php endif; ?>
<br>
<div class="row pilihan">
    <div class="col-xs-1" style="float: right">
        <input disabled type="radio" name="j-<?= $i ?>" id="huruf-<?= $i ?>-0" <?= $check == 0 ? 'checked' : '' ?>>
        <label for="huruf-<?= $i ?>-0" class="huruf" onclick="kirim_jawaban(<?= $i ?>, 0)"> A </label>
    </div>

    <div class="col-xs-11" style="float: right">
        <div class="text-right teks" <?php if($k==0): ?>style="background-color: #90EE90"<?php endif; ?> <?php if($check==0 && $k!=0): ?>style="background-color: red"<?php endif; ?>>
            <?= $s['a'] ?>
        </div>
    </div>
</div>
<div class="row pilihan">
<!-- </div>
<div class="row pilihan"> -->
    <div class="col-xs-1" style="float: right">
        <input disabled type="radio" name="j-<?= $i ?>" id="huruf-<?= $i ?>-1" <?= $check == 1 ? 'checked' : '' ?>>
        <label for="huruf-<?= $i ?>-1" class="huruf" onclick="kirim_jawaban(<?= $i ?>, 1)"> B </label>
    </div>

    <div class="col-xs-11" style="float: right">
        <div class="text-right teks" <?php if($k==1): ?>style="background-color: #90EE90"<?php endif; ?> <?php if($check==1 && $k!=1): ?>style="background-color: red"<?php endif; ?>>
            <?= $s['b'] ?>
        </div>
    </div>
</div>
<div class="row pilihan">
<!-- </div>
<div class="row pilihan"> -->
    <div class="col-xs-1" style="float: right">
        <input disabled type="radio" name="j-<?= $i ?>" id="huruf-<?= $i ?>-2" <?= $check == 2 ? 'checked' : '' ?>>
        <label for="huruf-<?= $i ?>-2" class="huruf" onclick="kirim_jawaban(<?= $i ?>, 2)"> C </label>
    </div>

    <div class="col-xs-11" style="float: right">
        <div class="text-right teks" <?php if($k==2): ?>style="background-color: #90EE90"<?php endif; ?> <?php if($check==2 && $k!=2): ?>style="background-color: red"<?php endif; ?>>
            <?= $s['c'] ?>
        </div>
    </div>
</div>
<div class="row pilihan">
<!-- </div>
<div class="row pilihan"> -->
    <div class="col-xs-1" style="float: right">
        <input disabled type="radio" name="j-<?= $i ?>" id="huruf-<?= $i ?>-3" <?= $check == 3 ? 'checked' : '' ?>>
        <label for="huruf-<?= $i ?>-3" class="huruf" onclick="kirim_jawaban(<?= $i ?>, 3)"> D </label>
    </div>

    <div class="col-xs-11" style="float: right">
        <div class="text-right teks" <?php if($k==3): ?>style="background-color: #90EE90"<?php endif; ?> <?php if($check==3 && $k!=3): ?>style="background-color: red"<?php endif; ?>>
            <?= $s['d'] ?>
        </div>
    </div>
</div>
<div class="row pilihan">
  <div class="col-xs-1" style="float: right">
        <input disabled type="radio" name="j-<?= $i ?>" id="huruf-<?= $i ?>-4" <?= $check == 4 ? 'checked' : '' ?>>
        <label for="huruf-<?= $i ?>-4" class="huruf" onclick="kirim_jawaban(<?= $i ?>, 4)"> E </label>
    </div>

    <div class="col-xs-11" style="float: right">
        <div class="text-right teks" <?php if($k==4): ?>style="background-color: #90EE90"<?php endif; ?> <?php if($check==4 && $k!=4): ?>style="background-color: red"<?php endif; ?>>
            <?= $s['e'] ?>
        </div>
    </div>
</div>
<br>
<div class="alert alert-info" role="alert">
                <?= $check==$k ? 'Jawaban Nomor ' . ($no-1) . ' Benar' : 'Jawaban Nomor ' . ($no-1) . ' Salah. Jawaban yang benar adalah<br>' . $k2 ?>
            </div>
<?php endforeach; ?>
                  
</div><br/>
                
<div class="blok-soal soal-1">
<div>
<?php
$no = 1;
  
$id = $_GET['id'];
for($i=0;$i<1;$i++):
$check = -1;
if(file_exists(__DIR__ . "/../../assets/audio/audio{$id}.{$no}.mp3")):
?>
    <div class="row">
        <div class="col-xs-12 text-right">
            <audio controls>
                <source src="<?= BASEURL ?>/assets/audio/audio<?= $no ?>.mp3" type="audio/mpeg">
            </audio>
        </div>
    </div>
    <br>
<?php endif; ?>
<?php if(file_exists(__DIR__ . "/../../assets/img/img{$id}." . $no . "a.png")):
?>
    <div class="row">
        <div class="col-xs-12 text-right">
            
                <img src="<?= BASEURL ?>/assets/img/img<?= $id ?>.<?= $no ?>a.png">
            
        </div>
    </div>
    <br>
<?php endif; ?>
<div class="row">
   
   <div class="col-xs-11" style="float: right"><div class="text-right"><?= '' ?></div> </div>
</div>
                  
<?php if(file_exists(__DIR__ . "/../../assets/img/img{$id}..png")):
?>
    <div class="row">
        <div class="col-xs-12 text-right">
            
                <img src="<?= BASEURL ?>/assets/img/img<?= $id ?>.<?= ($no - 1) ?>.png">
            
        </div>
    </div>
    <br>
<?php endif; ?>
<br>
<div class="row pilihan">
    <div class="col-xs-1" style="float: right">
        <input type="radio" name="j-0" id="huruf-0-0" <?= $check == 0 ? 'checked' : '' ?>>
        
    </div>

    <div class="col-xs-11" style="float: right">
        <div class="text-right teks">
            <?= '' ?>
        </div>
    </div>
</div>
<div class="row pilihan">
    <div class="col-xs-1" style="float: right">
        <input type="radio" name="j-0" id="huruf-0-0" <?= $check == 0 ? 'checked' : '' ?>>
        
    </div>

    <div class="col-xs-11" style="float: right">
        <div class="text-right teks">
            <?= '' ?>
        </div>
    </div>
</div>
                  <div class="row pilihan">
    <div class="col-xs-1" style="float: right">
        <input type="radio" name="j-0" id="huruf-0-0" <?= $check == 0 ? 'checked' : '' ?>>
        
    </div>

    <div class="col-xs-11" style="float: right">
        <div class="text-right teks">
            <?= '' ?>
        </div>
    </div>
</div>
                  <div class="row pilihan">
    <div class="col-xs-1" style="float: right">
        <input type="radio" name="j-0" id="huruf-0-0" <?= $check == 0 ? 'checked' : '' ?>>
        
    </div>

    <div class="col-xs-11" style="float: right">
        <div class="text-right teks">
            <?= '' ?>
        </div>
    </div>
</div>
                  <div class="row pilihan">
    <div class="col-xs-1" style="float: right">
        <input type="radio" name="j-0" id="huruf-0-0" <?= $check == 0 ? 'checked' : '' ?>>
        
    </div>

    <div class="col-xs-11" style="float: right">
        <div class="text-right teks">
            <?= '' ?>
        </div>
    </div>
</div>
<br>
<?php endfor; ?>
</div><br/>
<div class="row"><div class="col-md-3">
   
   

</div></div></div>
                  
                  </div></div></div></div>


<?php endif; ?>