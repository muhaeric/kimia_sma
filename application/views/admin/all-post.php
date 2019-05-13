

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-color:#fff;overflow:auto;">
  <!-- Content Header (Page header) -->
  <div class="box box-info" style="border-top-color: #e9ef00;box-shadow:none;margin-top:0px;padding-bottom:20px;padding-top: 50px">
    <div class="col-sm-12">
      <div class="box" style="padding-bottom:10px;border:none;box-shadow:none">
        <div class="box-header" style="padding-left:0px">
          <h1 class="box-title" style="display:block;font-weight:bold;font-size:2.3em">SEMUA LIST POST</h1>
          <div class="underscore" style="margin-left:0px;margin-left:0px;margin-bottom:15px;"></div>
          
          <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <a href="<?= base_url('index.php/admin/addpost') ?>">
              <button type="button" class="btn btn-default"><i class="glyphicon glyphicon-plus" style="margin-right:5px;"></i>Tambah Post</button></a>
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-bordered table-striped">
            <tr>
              <th>Judul</th>
              <th>Tanggal</th>
              <th>status</th>
              <th>Penulis</th>
              <th>Action</th>
            </tr>
            <?php 
            foreach ($tampil_all as $tampil) {
              
            ?>
            <tr>
              <td><a href=#"><?php echo $tampil->judul; ?></a></td>
              <td><?php echo $tampil->updated_at; ?></td>
              <td><?php if($tampil->status_blog == 0){
                echo "<span class='label label-warning'>Masih Di draft</span>";
              }else {
                echo "<span class='label label-success'>Sudah Terposting</span>";
              } ?></td>
              <td>
              <?php 
              if($tampil->penulis == $this->session->userdata("admin"))
              {
                echo "

              <a href='".base_url()."penulis/".$tampil->penulis."'>
                <span class='label label-info'>Admin</span>
                </a>
                ";
              }else {
              echo "
              <a href='".base_url()."penulis/".$tampil->penulis."'>
              <span class='label label-info'>".$tampil->penulis."</span>
              </a>"
              ;  
              }
               ?></td>
              <td>
                <?php if($tampil->penulis == 1) { ?>
                <a href="<?php echo base_url() ?>Admin/edit_post/<?php echo $tampil->id; ?>">
                <button type="button" class="btn btn-primary btn-edit"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                </a>  
                <button type="button" data-toggle="modal" data-target="#hapus<?php echo $tampil->id ?>" class="btn btn-danger btn-hapus"><i class="fa fa-trash" aria-hidden="true"></i></button>
                <?php } else { ?>
                  <button type="button" data-toggle="modal" data-target="#hapus<?php echo $tampil->id ?>" class="btn btn-danger btn-hapus"><i class="fa fa-trash" aria-hidden="true"></i></button>
                
                <?php } ?>
              </td>
            </tr>

<div id="hapus<?php echo $tampil->id ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Menghapus Post</h4>
      </div>
      <div class="modal-body">
        <center><h2>Yakin ingin Mengahapus !!</h2></center>
        <center>
  
                <a href="<?php echo base_url() ?>Admin/delete_post/<?php echo $tampil->id ?>">
        <button class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
      </a>
        </center>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>




          <?php } ?>
         <!--
            <tr>
              <td>2</td>
              <td><a href=#">Koordinasi Kegiatan PKL dan magang I</a></td>
              <td>11-7-2014</td>
              <td>Hadrah</td>
              <td>Admin</td>
              <td>
                <button type="button" class="btn btn-primary btn-edit"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                <button type="button" class="btn btn-danger btn-hapus"><i class="fa fa-trash" aria-hidden="true"></i></button>
              </td>
            </tr>
          !-->
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    
    <div class="col-sm-12 pagination-wrap">
                 <?php
echo $this->pagination->create_links();
?>
    </div>
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
