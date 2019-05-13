

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-color:#fff;overflow:auto">
  <!-- Content Header (Page header) -->
  <div class="box box-info" style="border-top-color: #e9ef00;box-shadow:none;margin-top:0px;padding-bottom:20px">
   <div class="col-sm-12" style="margin-top:15px;">
    <p  style="display:inline-block;"><a href="#">Home</a></p><span style="margin-left:5px;margin-right:5px;">>></span><p style="display:inline-block"><a href="#">Tambah Post</a></p>
  </div>
  <div class="col-md-12">
    <div class="box-header">
      <h3>TAMBAH LIST POST</h3>
        <?php echo form_open_multipart('admin/edit_pos');?>
  <form method="post" action="<?php echo base_url(); ?>admin/edit_pos" name="kirimanlur" enctype="multipart/form-data"> 
      <?php foreach ($edit_post as $tampil) {
        ?>
      <div class="underscore" style="margin-left:0px;margin-left:0px;margin-bottom:15px;"></div>
      <div class="form-group">
        <label for="judulPost">Judul Post<sup style="color:red">*</sup></label>
        <input type="text" class="form-control" id="jdlPost" name="judul" value="<?php echo $tampil->judul ?>"  placeholder="Judul Post">
      </div>
      <div class="box-body pad" style="padding:0px">
        <label for="judulPost">Isi Post<sup style="color:red">*</sup></label>
          <textarea id="editor1" name="content"  rows="10" cols="80">
            <?php echo $tampil->content; ?>
          </textarea>
      
      </div>
    </div>
  </div>
</div>

<div class="col-sm-12" style="margin-top:15px;">
 <div class="col-sm-3">
  <label for="imgPost" style="display:block">Gambar Post<sup style="color:red">*</sup></label>
  <img src="<?php echo base_url() ?>assets/img/thumb/<?php echo $tampil->gambar; ?>" width="200px">
  <input type="file" name="gambar"><br>
  <input type="hidden" name="id" value="<?php echo $tampil->id; ?>">
  <input type="hidden" name="gambar_lama" value="<?php echo $tampil->gambar ?>">
  <input type="hidden" name="penulis" value="<?php echo $this->session->userdata("admin"); ?>">
</div>
<div class="col-sm-3">
  <label for="judulPost">Kategoti Post<sup style="color:red">*</sup></label> 
  <div class="form-group">
   <select name="kategori" class="form-control" id="sel1" required>
                            <?php foreach ($kategori as $data) {  
                            ?>
                            <?php if($data->level == 1){

                        }else { ?>
                            <option value="<?php echo $data->id ?>"><?php echo $data->nama; ?></option>
                            
                            <?php } 
                          }
                            ?>
                          </select>
  </div> 
</div>
</div>
<div class="col-sm-12" style="margin-bottom:15px;padding-left:15px;">
  <button style="margin-top:20px" type="submit" name="status_blog" value="1" class="btn btn-success">Kirim</button>
  <button style="margin-top:20px" type="submit" name="status_blog" value="0" class="btn btn-warning">Simpan Draf</button>
</div>
<!-- /.content -->
</form>
<?php } ?>
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

