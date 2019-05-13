

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-color:#fff;overflow:auto;">
  <!-- Content Header (Page header) -->
  <div class="box box-info" style="border-top-color: #e9ef00;box-shadow:none;margin-top:0px;padding-bottom:20px;padding-top: 50px">
    <div class="col-sm-12">
      <div class="box" style="padding-bottom:10px;border:none;box-shadow:none">
        <div class="box-header" style="padding-left:0px">
          <h1 class="box-title" style="display:block;font-weight:bold;font-size:2.3em">SEMUA PENELITIAN</h1>
          <div class="underscore" style="margin-left:0px;margin-left:0px;margin-bottom:15px;"></div>
          
          <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <a href="<?= base_url('admin/addpenelitian') ?>">
                <button type="button" class="btn btn-default" ><i class="glyphicon glyphicon-plus" style="margin-right:5px;"></i>Tambah Penelitian</button></a>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table id="data" class="table table-responsive table-striped table-bordered">
              <thead>
                <tr>
                  <th style="text-align: center;">No</th>
                  <th style="text-align: center;">Nama</th>
                  <th style="text-align: center;">Judul</th>
                  <th style="text-align: center;">Jenis Penelitian</th>
                  <th style="text-align: center;">Sumber Dana</th>
                  <th style="text-align: center;">Alamat Journal</th>
                  <th style="text-align: center;">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php

                 foreach ($penelitian as $tampil) {
                  
                ?>
                <tr>
                  <td>1</td>
                  <td><?php echo $tampil->nama; ?></td>
                  <td><?php echo $tampil->judul; ?></td>
                  <td><?php echo $tampil->jenis; ?></td>
                  <td><?php echo $tampil->sumber_dana; ?></td>
                  <td><?php echo $tampil->alamat_journal; ?></td>
                  <td>
                    <button type="button" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#modaledit<?php echo $tampil->id_penelitian ?>"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                    <button type="button" class="btn btn-danger btn-hapus" data-toggle="modal" data-target="#myModal<?php echo $tampil->id_penelitian; ?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
                  </td>
                </tr>
  <div id="modaledit<?php echo $tampil->id_penelitian ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Penelitian</h4>
      </div>
      <div class="modal-body">
        <label>Nama  : </label>
        <form action="<?php echo base_url() ?>Admin/edit_penelitian" method="post">
          <input type="hidden" name="id_penelitian" value="<?php echo $tampil->id_penelitian ?>">
        <input type="text" name="nama" style="width: 100%" value="<?php echo $tampil->nama ?>">
        <br>
        <br>
        <label>Judul : </label>
         <input type="text" name="judul" style="width: 100%" value="<?php echo $tampil->judul ?>">
                        <br>
        <label>Jenis : </label>
         <input type="text" name="jenis" style="width: 100%" value="<?php echo $tampil->jenis ?>">
                        <br>
        <label>Sumber Dana : </label>
         <input type="text" name="sumber_dana" style="width: 100%" value="<?php echo $tampil->sumber_dana ?>">
                        <br>
        <label>Alamat Journal  : </label>
         <input type="text" name="alamat_journal" style="width: 100%" value="<?php echo $tampil->alamat_journal ?>">
                        <br>

        <button class="btn btn-success" type="submit"><i class="glyphicon glyphicon-pencil" style="margin-right: 5px"></i>Simpan</button>
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>



                <div id="myModal<?php echo $tampil->id_penelitian; ?>" class="modal fade" role="dialog">
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
          <a href="<?php echo base_url() ?>Admin/delete_penelitian/<?php echo $tampil->id_penelitian ?>">
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
              </tbody>
            </table>
            <br>
            <br>
            <div class="box-header" style="padding-left:0px">
              <h1 class="box-title" style="display:block;font-weight:bold;font-size:2.3em">SEMUA PENGABDIAN</h1>
              <div class="underscore" style="margin-left:0px;margin-left:0px;margin-bottom:15px;"></div>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <a href="<?= base_url('admin/addpengabdian') ?>">
                    <button type="button" class="btn btn-default"><i class="glyphicon glyphicon-plus" style="margin-right:5px;"></i>Tambah Pengabdian</button></a>
                  </div>
                </div>
              </div>
              
            <table id="data2" class="table table-responsive table-striped table-bordered"> <thead>
                  <tr>
                    <th style="text-align: center;">No</th>
                    <th style="text-align: center;">Nama</th>
                    <th style="text-align: center;">Judul</th>
                    <th style="text-align: center;">Jenis Pengabdian</th>
                    <th style="text-align: center;">Sumber Dana</th>
                    <th style="text-align: center;">Alamat Journal</th>
                    <th style="text-align: center;">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                   $no=1;
                   foreach ($pengabdian as $tampil) {
                    ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $tampil->nama; ?></td>
                    <td><?php echo $tampil->judul; ?></td>
                    <td><?php echo $tampil->jenis; ?></td>
                    <td><?php echo $tampil->sumber_dana; ?></td>
                    <td><?php echo $tampil->alamat_journal; ?></td>
                    <td>
                      <button type="button" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#modaledit<?php echo $tampil->id_penelitian ?>"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                      <button type="button" class="btn btn-danger btn-hapus" data-toggle="modal" data-target="#myModal<?php echo $tampil->id_penelitian ?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </td>
                  </tr>
<div id="modaledit<?php echo $tampil->id_penelitian ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Penelitian</h4>
      </div>
      <div class="modal-body">
        <label>Nama  : </label>
        <form action="<?php echo base_url() ?>Admin/edit_penelitian" method="post">
          <input type="hidden" name="id_penelitian" value="<?php echo $tampil->id_penelitian ?>">
        <input type="text" name="nama" style="width: 100%" value="<?php echo $tampil->nama ?>">
        <br>
        <br>
        <label>Judul : </label>
         <input type="text" name="judul" style="width: 100%" value="<?php echo $tampil->judul ?>">
                        <br>
        <label>Jenis : </label>
         <input type="text" name="jenis" style="width: 100%" value="<?php echo $tampil->jenis ?>">
                        <br>
        <label>Sumber Dana : </label>
         <input type="text" name="sumber_dana" style="width: 100%" value="<?php echo $tampil->sumber_dana ?>">
                        <br>
        <label>Alamat Journal  : </label>
         <input type="text" name="alamat_journal" style="width: 100%" value="<?php echo $tampil->alamat_journal ?>">
                        <br>

        <button class="btn btn-success" type="submit"><i class="glyphicon glyphicon-pencil" style="margin-right: 5px"></i>Simpan</button>
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>





<div id="myModal<?php echo $tampil->id_penelitian; ?>" class="modal fade" role="dialog">
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
          <a href="<?php echo base_url() ?>Admin/delete_penelitian/<?php echo $tampil->id_penelitian ?>">
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
                 
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        <div class="col-sm-12 pagination-wrap">

        </div>

      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
