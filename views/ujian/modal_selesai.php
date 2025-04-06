<div class="modal fade" id="modal_selesai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog modal-lg">
   <div class="modal-content">
   <form id="end" method="post">
      <input type="hidden" name="count" value="<?= $_GET['c']; ?>">
      <input type="hidden" id="habis" name="habis" value=0>
<div class="modal-header">
  <h3 class="modal-title">Selesai Ujian</h3>
</div>
    
<div class="modal-body">
   <p>Pastikan semua soal telah dikerjakan sebelum mengklik selesai. Setelah klik selesai Anda tidak dapat mengerjakan ujian lagi. Yakin akan menyelesaikan ujian? </p>
   <div class="chekbox-selesai"><input type="checkbox" required> Saya yakin akan menyelesaikan ujian.</div>
</div>
    
<div class="modal-footer">
   <button type="submit" class="btn btn-danger"> Selesai </button> 
   <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal </button>
</div>
</form></div></div></div>