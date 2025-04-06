<script>
    function jwbn() {
        let x = document.getElementById('abcd').value;
        x = x.split('\n');
        document.getElementById('a').value = x[0] ? x[0] : '';
        document.getElementById('b').value = x[1] ? x[1] : '';
        document.getElementById('c').value = x[2] ? x[2] : '';
        document.getElementById('d').value = x[3] ? x[3] : '';
        document.getElementById('e').value = x[4] ? x[4] : '';
    }
    </script>
<div class="modal fade" id="modal_soal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">    
        <form class="form-horizontal" method="post" enctype="multipart/form-data">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> &times; </span> </button>
            <h3 class="modal-title"></h3>
        </div>                       
        <div class="modal-body">
            <input type="hidden" name="no" value="<?= is_array($data) ? count($data) + 1 : '' ?>">
            <div class="form-group">
                <label for="audio" class="col-sm-2 control-label"> Audio</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="audio" name="audio">
                </div>
            </div>
            <div class="form-group">
                <label for="soal" class="col-sm-2 control-label"> Soal</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="soal" rows="5" name="soal" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="abcd" class="col-sm-2 control-label"> Semua Pilihan</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="abcd" rows="5" oninput="jwbn();"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="a" class="col-sm-2 control-label"> Pilihan A</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="a" rows="2" name="a" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="b" class="col-sm-2 control-label"> Pilihan B</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="b" rows="2" name="b" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="c" class="col-sm-2 control-label"> Pilihan C</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="c" rows="2" name="c" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="d" class="col-sm-2 control-label"> Pilihan D</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="d" rows="2" name="d" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="e" class="col-sm-2 control-label"> Pilihan E</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="e" rows="2" name="e" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="kunci" class="col-sm-2 control-label"> Kunci Jawaban</label>
                <div class="col-sm-4">
                    <select class="form-control" name="kunci" id="kunci" required>
                        <option value="">- Pilih -</option>
                        <option value='0'>A</option>
                        <option value='1'>B</option>
                        <option value='2'>C</option>
                        <option value='3'>D</option>
                        <option value='4'>E</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-save">
                <i class="glyphicon glyphicon-floppy-disk"></i> Tambah 
            </button>
            <button type="button" class="btn btn-warning" data-dismiss="modal">
                <i class="glyphicon glyphicon-remove-sign"></i> Batal
            </button>
        </div>            
        </form>
      </div>
   </div>
</div>