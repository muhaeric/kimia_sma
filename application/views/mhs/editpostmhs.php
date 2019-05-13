
      <div id="wrap-admin-mhs-outer">
        <div id="wrap-admin-mhs-inner" class="container">
            <h2 id="selamat-mhs">Edit Post</h2>
            <div class="underscore" style="margin-left:0px;margin-right:0px"></div>
            <div class="col-sm-3">
               <?php include_once('sidebar.php') ?>
            </div>
            <div class="col-sm-9">
                <div class="box box-info" style="border-top-color: #e9ef00;box-shadow:none;margin-top:0px;padding-bottom:20px">
                  <?php foreach ($edit_post as $data) {
                  
                   ?>
                     <?php echo form_open_multipart('Pagemhs/edit_file');?>
                <form method="post" action="<?php echo base_url(); ?>Pagemhs/edit_file" name="kirimanlur" enctype="multipart/form-data">  
                        <div class="col-md-12">
                                <h3>EDIT POST</h3>
                                <input type="hidden" name="id" value="<?php echo $data->id_blog ?>">
                                <div class="underscore" style="margin-left:0px;margin-left:0px;margin-bottom:15px;"></div>
                                <div class="form-group">
                                        <label for="judulPost">Judul Post<sup style="color:red">*</sup></label>
                                        <input type="text" name="judul" class="form-control" id="jdlPost" placeholder="Judul Post" value="<?php echo $data->judul ?>">
                                </div>
                                <div class="box-body pad" style="padding:0px">
                                    <label for="judulPost">Isi Post<sup style="color:red">*</sup></label>
                                     
                                                <textarea id="editor5" name="content" rows="10" style="width: 100%">
<?php echo $data->content; ?>
                                                </textarea>
                                       
                                </div>
                        </div>
                  
                  
                  
                  </div>
                  <div class="col-sm-12" style="margin-top:15px;">
                     <div class="col-sm-3" style="padding-left:0px">

                        <label for="imgPost" style="display:block">Lampiran (Pdf)</label>
                        <?php echo $data->gambar; ?>
                        <input type="file" name="berkas"><br>
                        <input type="hidden" name="gambar_lama" value="<?php echo $data->gambar ?>">
                     </div>
                     <div class="col-sm-3">
                        <label for="judulPost">Kategoti Post<sup style="color:red">*</sup></label> 
                        <div class="form-group">
                         <select name="kategori" class="form-control" id="sel1" required>
                            <option value="<?php echo $data->kategori ?>"><?php echo $data->nama; ?></option>
                            <?php foreach ($kategori as $datas) {  ?>
                            <?php if($datas->level == 1){
                            } else {
                            if($datas->id != $data->kategori){
                            ?>
                            <option value="<?php echo $datas->id ?>"><?php echo $datas->nama; ?></option>
                            <?php } 
                            }
                            } ?>
                          </select>
                        </div> 
                     </div>
                  </div>
                  <div class="col-sm-12" style="margin-bottom:15px;">
                    <button style="margin-top:20px" type="Submit" name="status_blog"  value="1" class="btn btn-success">Submit</button>
                     <button style="margin-top:20px" name="status_blog" value="0" type="Submit" class="btn btn-warning">Simpan di Draft</button>
                  </div>
            </div>
        </div>
      </div>
      
</form>
      <?php }

      ?>

    <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
    <script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor5');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>
