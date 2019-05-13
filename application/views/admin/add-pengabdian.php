

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-color:#fff;overflow:auto">
  <!-- Content Header (Page header) -->
  <div class="box box-info" style="border-top-color: #e9ef00;box-shadow:none;margin-top:0px;padding-bottom:20px">
   <div class="col-sm-12" style="margin-top:15px;">
    <p  style="display:inline-block;"><a href="#">Home</a></p><span style="margin-left:5px;margin-right:5px;">>></span><p style="display:inline-block"><a href="#">Tambah Post</a></p>
  </div>
  <div class="col-md-12">
    <div class="box-header">
      <h3>TAMBAH PENGABDIAN</h3>

       <form action="<?php echo base_url() ?>Admin/input_penelitian" method="POST">
      <input type="hidden" name="kategori" value="2">
      <div class="col-sm-12">
        <label>Nama : </label>
      </div>
      <div class="col-sm-12">
        <input type="text" name="nama">
      </div>
      <div class="col-sm-12" style="margin-top:30px">
        <label>Judul : </label>
      </div>
      <div class="col-sm-12">
        <input type="text" name="judul">
      </div>
      <div class="col-sm-12" style="margin-top:30px">
        <label>Jenis Penelitian : </label>
      </div>
      <div class="col-sm-12">
        <input type="text" name="jenis">
      </div>
      <div class="col-sm-12" style="margin-top:30px">
        <label>Sumber Dana : </label>
      </div>
      <div class="col-sm-12">
        <input type="text" name="sumber_dana">
      </div>
      <div class="col-sm-12" style="margin-top:30px">
        <label>Alamat Journal : </label>
      </div>
      <div class="col-sm-12">
        <input type="text" name="alamat_journal">
      </div>
    </div>
  </div>


</div>
<div class="col-sm-12" style="margin-bottom:15px;padding-left:15px;">
  <button style="margin-top:20px" type="submit" name="status_blog" value="1" class="btn btn-success">Kirim</button>
  <button style="margin-top:20px" type="submit" name="status_blog" value="0" class="btn btn-warning">Simpan Draf</button>
</div>
<!-- /.content -->
</form>
</div>
