<?php
$arrayJwb = explode(',', $jawab[0]['jawaban']);
$t = $jawab[0]['waktu'];
$menit = floor($t / 60);
$detik = $t % 60;
?>
<h3 class="page-header"><b>Mapel: <?= $data['mapel'] ?> 
<span class="pull-right"> Sisa Waktu: <span id="menit" class="menit"><?= $menit ?></span> : <span id="detik" class="detik"> <?= $detik ?> </span> detik</span>
</b></h3>
<script>waktu()</script>
<input type="hidden" id="ujian" value="<?= $_GET['id']; ?>">
<!-- <input type="hidden" id="sisa_waktu"> -->
  
<div class="row">
  <div class="col-md-12"><div class="konten-ujian">

<div class="blok-soal soal-1">
<div>
<?php
$no = 1;
  
$id = $_GET['id'];
foreach($soal as $i => $s):
$check = $arrayJwb[$i];
if(file_exists(__DIR__ . "/../../assets/audio/audio{$id}.{$no}.mp3")):
?>
    <div class="row">
        <div class="col-xs-12 text-right">
            <audio controls>
                <source src="/assets/audio/audio<?= $no ?>.mp3" type="audio/mpeg">
            </audio>
        </div>
    </div>
    <br>
<?php endif; ?>
<?php if(file_exists(__DIR__ . "/../../assets/img/img{$id}." . $no . "a.png")):
?>
    <div class="row">
        <div class="col-xs-12 text-right">
            
                <img src="/assets/img/img<?= $id ?>.<?= $no ?>a.png">
            
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
            
                <img src="/assets/img/img<?= $id ?>.<?= ($no - 1) ?>.png">
            
        </div>
    </div>
    <br>
<?php endif; ?>
<br>
<div class="row pilihan">
    <div class="col-xs-1" style="float: right">
        <input type="radio" name="j-<?= $i ?>" id="huruf-<?= $i ?>-0" <?= $check == 0 ? 'checked' : '' ?> onclick="kirim_jawaban(<?= $i ?>, 0)">
        <label for="huruf-<?= $i ?>-0" class="huruf"> A </label>
    </div>
<label for="huruf-<?= $i ?>-0" style="display: block; font-weight: normal">
    <div class="col-xs-11" style="float: right">
        <div id="s-<?= $i ?>-0" class="text-right teks">
            <?= $s['a'] ?> 
        </div> 
    </div>
</label>
</div>
<div class="row pilihan">
<!-- </div>
<div class="row pilihan"> -->
    <div class="col-xs-1" style="float: right">
        <input type="radio" name="j-<?= $i ?>" id="huruf-<?= $i ?>-1" <?= $check == 1 ? 'checked' : '' ?> onclick="kirim_jawaban(<?= $i ?>, 1)">
        <label for="huruf-<?= $i ?>-1" class="huruf"> B </label>
    </div>
<label for="huruf-<?= $i ?>-1" style="display: block; font-weight: normal">
    <div class="col-xs-11" style="float: right">
        <div id="s-<?= $i ?>-1" class="text-right teks">
            <?= $s['b'] ?> 
        </div> 
    </div>
</label>
</div>
<div class="row pilihan">
<!-- </div>
<div class="row pilihan"> -->
    <div class="col-xs-1" style="float: right">
        <input type="radio" name="j-<?= $i ?>" id="huruf-<?= $i ?>-2" <?= $check == 2 ? 'checked' : '' ?> onclick="kirim_jawaban(<?= $i ?>, 2)">
        <label for="huruf-<?= $i ?>-2" class="huruf"> C </label>
    </div>
<label for="huruf-<?= $i ?>-2" style="display: block; font-weight: normal">
    <div class="col-xs-11" style="float: right">
        <div id="s-<?= $i ?>-2" class="text-right teks">
            <?= $s['c'] ?> 
        </div> 
    </div>
</label>
</div>
<div class="row pilihan">
<!-- </div>
<div class="row pilihan"> -->
    <div class="col-xs-1" style="float: right">
        <input type="radio" name="j-<?= $i ?>" id="huruf-<?= $i ?>-3" <?= $check == 3 ? 'checked' : '' ?> onclick="kirim_jawaban(<?= $i ?>, 3)">
        <label for="huruf-<?= $i ?>-3" class="huruf"> D </label>
    </div>
<label for="huruf-<?= $i ?>-3" style="display: block; font-weight: normal">
    <div class="col-xs-11" style="float: right">
        <div id="s-<?= $i ?>-3" class="text-right teks">
            <?= $s['d'] ?> 
        </div> 
    </div>
</label>
</div>
<div class="row pilihan">
  <div class="col-xs-1" style="float: right">
        <input type="radio" name="j-<?= $i ?>" id="huruf-<?= $i ?>-4" <?= $check == 4 ? 'checked' : '' ?> onclick="kirim_jawaban(<?= $i ?>, 4)">
        <label for="huruf-<?= $i ?>-4" class="huruf"> E </label>
    </div>
<label for="huruf-<?= $i ?>-4" style="display: block; font-weight: normal">
    <div class="col-xs-11" style="float: right">
        <div id="s-<?= $i ?>-4" class="text-right teks">
            <?= $s['e'] ?>
        </div>
    </div>
</label>
</div>
<br>
<?php endforeach; ?>
</div><br/>
<div class="row"><div class="col-md-3">
   
   <a class="btn btn-danger btn-block" data-toggle="modal" data-target="#modal_selesai"> Selesai </a>

</div></div>
              
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
                <source src="/assets/audio/audio<?= $no ?>.mp3" type="audio/mpeg">
            </audio>
        </div>
    </div>
    <br>
<?php endif; ?>
<?php if(file_exists(__DIR__ . "/../../assets/img/img{$id}." . $no . "a.png")):
?>
    <div class="row">
        <div class="col-xs-12 text-right">
            
                <img src="/assets/img/img<?= $id ?>.<?= $no ?>a.png">
            
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
            
                <img src="/assets/img/img<?= $id ?>.<?= ($no - 1) ?>.png">
            
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
                  
              </div>


</div></div>
  <!-- <div class="col-md-4"></div> -->
</div>
<?php include 'modal_selesai.php'; ?>