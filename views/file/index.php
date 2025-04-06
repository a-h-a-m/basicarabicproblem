<h3 class="title"><i class="glyphicon glyphicon-download"></i> Download File</h3>
<hr/>
<?php
  $data = [
    'Cuplikan teks bahasa arab kemenag_Versi Tulisan BESAR' => ['docx', 'pdf'],
    
    'Cuplikan teks bahasa arab kemenag_Versi Tulisan Kecil' => ['docx', 'pdf'],
    
    'E-Book Bahasa Arab Balaghah.pdf' => [],
    'E-Book Bahasa Arab Kemenag MA 10 k.2013.pdf' => [],
    'E-Book Bahasa Arab Kemenag MA 11 k.2013.pdf' => [],
    'E-Book Bahasa Arab MA 10 terbaru.pdf' => [],
    'E-Book Bahasa Arab MA 11 terbaru.pdf' => [],
    'E-Book Bahasa Arab MA 12 terbaru.pdf' => [],
    'KISI KISI MAPEL AGAMA KESETARAAN 06 02 2025 OK_BAHASA ARAB' => ['pdf', 'xlsx'],
    
    'SOAL LATIHAN USP BAHASA ARAB 2025.pdf' => [],
    'USP_BAHASA ARAB PG_HASPI ULYA_23.docx (1)' => ['pdf', 'rtf'],
    
   ];
?>
<div class="table-responsive">
   <table class="table table-striped" width="100%">
   
   <tbody>
        <?php if(!empty($data)):
            $no = 1;
            foreach($data as $dt => $ext): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $dt ?></td>
                <td>
                  <?php if(empty($ext)): ?>
                    <a class="btn btn-success btn-sm" target="_blank" href="/files/<?= $dt; ?>">
                        <i class="glyphicon glyphicon-download"></i> Download
                    </a>
                  <?php else: ?>
                  <?php foreach($ext as $e): ?>
                    <a class="btn btn-success btn-sm" target="_blank" href="/files/<?= $dt; ?>.<?= $e; ?>">
                        <i class="glyphicon glyphicon-download"></i> Download <?= $e; ?>
                    </a>
                  <?php endforeach; ?>
                  <?php endif; ?>
                </td>
            </tr>
        <?php endforeach;
        endif; ?>
   </tbody>
   </table>
</div>
<br/>