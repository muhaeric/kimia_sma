

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-color:#fff;overflow:auto">
  <!-- Content Header (Page header) -->
 <?php echo form_open_multipart('Admin/halaman_file');?>
                <form method="post" action="<?php echo base_url(); ?>Admin/halaman_file" name="kirimanlur" enctype="multipart/form-data">  
  <div class="box box-info" style="border-top-color: #e9ef00;box-shadow:none;margin-top:0px;padding-bottom:20px">
   <div class="col-sm-12" style="margin-top:15px;">
    <p  style="display:inline-block;"><a href="#">Home</a></p><span style="margin-left:5px;margin-right:5px;">>></span><p style="display:inline-block"><a href="#">Tambah Halaman</a></p>
  </div>
  <div class="col-md-12">
    <div class="box-header">
      <h3>TAMBAH HALAMAN</h3>
      <div class="underscore" style="margin-left:0px;margin-left:0px;margin-bottom:15px;"></div>
      <div class="form-group">
        <label for="judulPost">Judul Halaman<sup style="color:red">*</sup></label>
        <input type="text" class="form-control" id="jdlPost" placeholder="Judul Halaman" name="judul">
      </div>
      <div class="box-body pad" style="padding:0px">
        <label for="judulPost">Isi Halaman<sup style="color:red">*</sup></label>
 
          <textarea id="editor1" rows="10" cols="80" name="isi">

          </textarea>
  
      </div>
      <br>
      <br/>
      <label>Upload PDF: </label>
      <input type="file" name="berkas">
    </div>
  </div>
</div>


<div class="col-sm-12" style="margin-bottom:15px;padding-left:15px;">
  <button style="margin-top:20px" name="kirim" class="btn btn-success">Submit</button>
</div>
<!-- /.content -->
<?= form_close(); ?>
</div>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5({
      
    });
  });
</script>

