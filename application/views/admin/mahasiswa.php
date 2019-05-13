<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-color:#fff;overflow:auto;">
  <!-- Content Header (Page header) -->
  <div class="box box-info" style="border-top-color: #e9ef00;box-shadow:none;margin-top:0px;padding-bottom:20px;padding-top: 50px">
    <div class="col-sm-12">
      <div class="box" style="padding-bottom:10px;border:none;box-shadow:none">
        <div class="box-header" style="padding-left:0px">
          <h1 class="box-title" style="display:block;font-weight:bold;font-size:2.3em">SEMUA MAHASISWA</h1>
          <div class="underscore" style="margin-left:0px;margin-left:0px;margin-bottom:15px;"></div>
          
          <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
             
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modaltambah"><i class="glyphicon glyphicon-plus" style="margin-right:5px;"></i>Tambah Mahasiswa</button>
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-bordered table-striped">
            <tr>
              <th>No</th>
              <th>NIM</th>
              <th>Nama</th>
              <th>Action</th>
            </tr>
            <?php
              $no=1;
             foreach ($mahasiswa as $mhs) {
              
            ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $mhs->nim; ?></td>
              <td><?php echo $mhs->nama; ?></td>
              <td>
                <a href="<?= base_url().'admin/ambil_edit_mhs/'.$mhs->nim; ?>"><button type="button" class="btn btn-primary btn-edit"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                <a href="<?= base_url().'admin/hapus_mhs/'.$mhs->nim; ?>"><button type="button" class="btn btn-danger btn-hapus" data-toggle="modal" data-target="#myModal<?php echo $mhs->nim ?>"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
              </td>
            </tr>

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

<div id="modaltambah" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Mahasiswa</h4>
      </div>
      <div class="modal-body">
        
        <form action="<?php echo base_url() ?>Admin/tambah_mahasiswa" method="post">
          <label>NIM Mahasiswa : </label><br>
        <input type="text" name="nim" style="width: 100%" placeholder="NIM Mahasiswa" required>
        <br>
        <br>
        <label>Nama Mahasiswa : </label><br>
        <input type="text" name="nama" style="width: 100%" placeholder="Nama Mahasiswa" required>
        <br>
        <br>
        <label>Password : </label><br>
        <input type="password" name="password" style="width: 100%" placeholder="Password Mahasiswa" required>
        <br>
                        <br>
        <button class="btn btn-success" type="submit"><i class="glyphicon glyphicon-pencil" style="margin-right: 5px"></i>Simpan</button>
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>