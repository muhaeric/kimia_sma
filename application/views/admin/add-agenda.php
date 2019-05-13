

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-color:#fff;overflow:auto">
  <!-- Content Header (Page header) -->
  <div class="box box-info" style="border-top-color: #e9ef00;box-shadow:none;margin-top:0px;padding-bottom:20px">
   <div class="col-sm-12" style="margin-top:15px;">
    <p  style="display:inline-block;"><a href="#">Home</a></p><span style="margin-left:5px;margin-right:5px;">>></span><p style="display:inline-block"><a href="#">Tambah Agenda</a></p>
  </div>
  <div class="col-md-12">
    <div class="box-header">
      <h3>TAMBAH AGENDA</h3>
      <div class="underscore" style="margin-left:0px;margin-left:0px;margin-bottom:15px;"></div>
      <div class="form-group">
       <form action="<?php echo base_url() ?>Admin/kirim_agenda" method="post">
        <label for="judulPost">Judul Agenda<sup style="color:red">*</sup></label>
        <input type="text" class="form-control" id="jdlPost" name="judul" placeholder="Judul Agenda">
      </div>
      <div class="box-body pad" style="padding:0px">
        <label for="judulPost">Isi Agenda<sup style="color:red">*</sup></label>
        
          <textarea id="editor1" name="isi" rows="10" cols="80">

          </textarea>
        
      </div>
    </div>
  </div>
  <div class="col-sm-12" style="margin-top:15px;">
   <div class="col-sm-3">
    <label style="display:block">Tanggal Agenda<sup style="color:red">*</sup></label>
    <input type="date" name="tgl_agenda"><br>
  </div>
</div>
</div>


<div class="col-sm-12" style="margin-bottom:15px;padding-left:15px;">
  <button style="margin-top:20px" class="btn btn-success" name="status_blog" value="1">Kirim</button>
  <button style="margin-top:20px" class="btn btn-danger" name="status_blog" value="0">Simpan Di draft</button>
</div>
</form>
<!-- /.content -->
</div>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>

