<h3 class="title"><i class="glyphicon glyphicon-edit"></i> Manajemen Soal</h3>
<hr/>
<div class="alert alert-info">
    <ul>
        <li>Klik tombol edit pada kolom Bank Soal untuk mengatur soal!</li>
        <li>Klik nama kelas pada kolom Kelas Ujian untuk melihat nilai pada kelas tersebut!</li>
    </ul>
</div>
<hr/>
<div class="table-responsive">
   <table class="table table-striped" width="100%">
   <thead>
    <tr>
	    <th style="width: 10px">No</th>
        <th>Nama Mapel</th>
        <th>Tanggal</th>
        <th>Jumlah Soal</th>
        <th>Bank Soal</th>
        <th>Kelas Ujian</th>
    </tr>
   </thead>
   <tbody>
        <?php if(!empty($data)):
            $no = 1;
            foreach($data as $dt): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $dt['mapel'] ?></td>
                <td><?= $dt['tanggal'] ?></td>
                <td><?= $dt['jumlah_soal'] ?></td>
                <td>
                    <a class="btn btn-primary btn-sm" href="<?= BASEURL ?>/ujian/edit/?id=<?= $dt['id'] ?>">
                        <i class="glyphicon glyphicon-edit"></i> Edit &nbsp;&nbsp;<span class="label label-warning"><?= $dt['jml_soal'] ?></span>
                    </a>
                </td>
                <td>
                    <a class="btn btn-xs btn-info" style="margin-bottom: 5px" href="#">Kelas Dasar &nbsp;&nbsp; <span class="label label-warning">0</span></a>
                </td>
            </tr>
        <?php endforeach;
        endif; ?>
   </tbody>
   </table>
</div>
<br/>