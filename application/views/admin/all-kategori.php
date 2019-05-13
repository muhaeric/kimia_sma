

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-color:#fff;overflow:auto;">
  <!-- Content Header (Page header) -->
  <div class="box box-info" style="border-top-color: #e9ef00;box-shadow:none;margin-top:0px;padding-bottom:20px;padding-top: 50px">
    <div class="col-sm-12">
      <div class="box" style="padding-bottom:10px;border:none;box-shadow:none">
        <div class="box-header" style="padding-left:0px">
          <h1 class="box-title" style="display:block;font-weight:bold;font-size:2.3em">SEMUA KATEGORI POST</h1>
          <div class="underscore" style="margin-left:0px;margin-left:0px;margin-bottom:15px;"></div>
          
          <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
             
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modaltambah"><i class="glyphicon glyphicon-plus" style="margin-right:5px;"></i>Tambah Kategori</button>
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-bordered table-striped">
            <tr>
              <th>No</th>
              <th>Judul</th>
              <th>Level</th>
              <th>Action</th>
            </tr>
            <?php
              $no=1;
             foreach ($kategori as $tampil) {
              
            ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $tampil->nama; ?></td>
              <td><?php if($tampil->level == 1){
                echo "<span class='label label-warning'>Admin</span>";
              } else {
                echo "<span class='label label-info'>Semua</span>";
              } ?></td>
              <td>
                <button type="button" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#modaledit<?php echo $tampil->id ?>"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                <button type="button" class="btn btn-danger btn-hapus" data-toggle="modal" data-target="#myModal<?php echo $tampil->id ?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
              </td>
            </tr>

<div id="modaledit<?php echo $tampil->id ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Kategori</h4>
      </div>
      <div class="modal-body">
        <label>Nama Kategori : </label>
        <form action="<?php echo base_url() ?>Admin/edit_kategori" method="post">
          <input type="hidden" name="id_kategori" value="<?php echo $tampil->id ?>">
        <input type="text" name="nama" style="width: 100%" value="<?php echo $tampil->nama ?>">
        <br>
        <br>
        <label>Level Kategori : </label>
        <select name="level" class="form-control" id="sel1" required>
                            <option value="0">Semua</option>
                            <option value="1">Khusus Admin</option>
                       
                          </select>
                        <br>
        <button class="btn btn-success" type="submit"><i class="glyphicon glyphicon-pencil" style="margin-right: 5px"></i>Simpan</button>
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>




<div id="myModal<?php echo $tampil->id ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Menghapus Kategori</h4>
      </div>
      <div class="modal-body">
        <center><h2>Yakin ingin Mengahapus !!</h2></center>
        <center>
          <a href="<?php echo base_url() ?>Admin/hapus_kategori/<?php echo $tampil->id ?>">
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
           
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
 
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<div id="modaltambah" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Kategori</h4>
      </div>
      <div class="modal-body">
        <label>Nama Kategori : </label>
        <form action="<?php echo base_url() ?>Admin/tambah_kategori" method="post">
        
        <input type="text" name="nama" style="width: 100%" placeholder="Nama Kategori">
        <br>
        <br>
        <label>Level Kategori : </label>
        <select name="level" class="form-control" id="sel1" required>
                            <option value="0">Semua</option>
                            <option value="1">Khusus Admin</option>
                       
                          </select>
                        <br>
        <button class="btn btn-success" type="submit"><i class="glyphicon glyphicon-pencil" style="margin-right: 5px"></i>Simpan</button>
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<!-- Tambah Kategori -->

<!-- Edit Kategori -->
