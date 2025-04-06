<h3 class="title"><i class="glyphicon glyphicon-edit"></i> Manajemen Soal</h3>
<a class="btn btn-success btn-add btn-top pull-right" data-toggle="modal" data-target="#modal_soal">
    <i class="glyphicon glyphicon-plus-sign"></i> Tambah
</a>
<hr/>
<div class="alert alert-info">
    <table width="100% no-ajax">
        <tr>
            <td>Tanggal</td><td>:<b> <?= $ujian['tanggal'] ?></b></td>
        </tr>
        <tr>
            <td>Nama Mapel</td><td>:<b> <?= $ujian['mapel'] ?></b></td>
            <td width="15%"></td>
            <td>Jumlah Soal</td><td>:<b> <?= $ujian['jumlah_soal'] ?></b></td>
        </tr>
    </table>
    <input type="hidden" id="id_ujian" value="<?= $_GET['id'] ?>">
</div>
<hr/>
<div class="table-responsive">
   <table class="table table-striped" width="100%">
   <thead>
    <tr>
	    <th style="width: 10px">No</th>
        <th>Soal</th>
        <th>Action</th>
    </tr>
   </thead>
   <tbody>
        <?php if(!empty($data)):
            $no = 1;
            foreach($data as $dt):
                $kunci = $dt['kunci']; ?>
                <tr>
                <td><?= $no++ ?></td>
                <td>
                    <?= $dt['soal'] ?>
                    <ol type="A">
                        <li class="<?= $kunci==0 ? 'text-primary' : '' ?>" style="<?= $kunci==0 ? 'font-weight: bold' : '' ?>">
                            <?= $dt['a'] ?>
                        </li>
                        <li class="<?= $kunci==1 ? 'text-primary' : '' ?>" style="<?= $kunci==1 ? 'font-weight: bold' : '' ?>">
                            <?= $dt['b'] ?>
                        </li>
                        <li class="<?= $kunci==2 ? 'text-primary' : '' ?>" style="<?= $kunci==2 ? 'font-weight: bold' : '' ?>">
                            <?= $dt['c'] ?>
                        </li>
                        <li class="<?= $kunci==3 ? 'text-primary' : '' ?>" style="<?= $kunci==3 ? 'font-weight: bold' : '' ?>">
                            <?= $dt['d'] ?>
                        </li>
                    </ol>
                </td>
                <td>
                    <a class="btn btn-primary btn-edit" href="#">
                        <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                    <a class="btn btn-danger btn-delete" href="#">
                        <i class="glyphicon glyphicon-trash"></i>
                    </a>
                </td>
                </tr>
        <?php endforeach;
        endif; ?>
   </tbody>
   </table>
</div>
<br/>
<?php include 'modal_soal.php' ?>