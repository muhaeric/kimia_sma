

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-color:#fff;overflow:auto">
  <!-- Content Header (Page header) -->
<?= form_open('admin/proses_edit_mahasiswa/'.$mhs->nim); ?>
  <div class="box box-info" style="border-top-color: #e9ef00;box-shadow:none;margin-top:0px;padding-bottom:20px">
   <div class="col-sm-12" style="margin-top:15px;">
    <p  style="display:inline-block;"><a href="#">Home</a></p><span style="margin-left:5px;margin-right:5px;">>></span><p style="display:inline-block"><a href="#">Tambah Halaman</a></p>
  </div>
  <div class="col-md-12">
    <div class="box-header">
      <h3>EDIT HALAMAN</h3>
      <div class="underscore" style="margin-left:0px;margin-left:0px;margin-bottom:15px;"></div>
      <div class="form-group">
        <label for="judulPost">NIM Mahasiswa<sup style="color:red">*</sup></label>
        <input type="text" class="form-control" id="nim" placeholder="NIM Mahasiswa" name="nim" value="<?= $mhs->nim ?>" readonly>
      </div>
      <div class="form-group">
        <label for="judulPost">NAMA Mahasiswa<sup style="color:red">*</sup></label>
        <input type="text" class="form-control" id="nama" placeholder="Nama Mahasiswa" name="nama" value="<?= $mhs->nama ?>">
      </div>
      <div class="form-group">
        <label for="judulPost">Password Mahasiswa ( Jika Tidak Ingin Mengganti Password, Dikosongi saja )</label>
        <input type="password" class="form-control" id="pass" placeholder="Password Mahasiswa" name="password">
      </div>
    </div>
  </div>
</div>


<div class="col-sm-12" style="margin-bottom:15px;padding-left:15px;">
  <button style="margin-top:20px" name="kirim" class="btn btn-success">Submit</button>
</div>
<!-- /.content -->
<?= form_close(); ?>
</div>

