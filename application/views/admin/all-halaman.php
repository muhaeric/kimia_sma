

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-color:#fff;overflow:auto;">
  <!-- Content Header (Page header) -->
  <div class="box box-info" style="border-top-color: #e9ef00;box-shadow:none;margin-top:0px;padding-bottom:20px;padding-top: 50px">
    <div class="col-sm-12">
      <div class="box" style="padding-bottom:10px;border:none;box-shadow:none">
        <div class="box-header" style="padding-left:0px">
          <h1 class="box-title" style="display:block;font-weight:bold;font-size:2.3em">SEMUA HALAMAN</h1>
          <div class="underscore" style="margin-left:0px;margin-left:0px;margin-bottom:15px;"></div>
          
          <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <a href="<?= base_url('index.php/admin/addhalaman') ?>">
              <button type="button" class="btn btn-default"><i class="glyphicon glyphicon-plus" style="margin-right:5px;"></i>Tambah Halaman</button></a>
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table id="halaman" class="table table-bordered table-striped">
            <tr>
              <th>No</th>
              <th>Judul</th>
              <th>Tanggal</th>
              <th>Action</th>
            </tr>
            <?php $i=1; foreach ($halaman as $h) {
              # code...
             ?>
            <tr>
              <td><?= $i ?></td>
              <td><a href=#"><?= $h->judul_hlm ?></a></td>
              <td><?= $h->waktu_tambah ?></td>
              <td>
                <a href="<?= base_url('Admin/edit_halaman/'.$h->id_halaman) ?>" >
                <button type="button" class="btn btn-primary btn-edit"><i class="fa fa-pencil" aria-hidden="true"></i></button>
              </a>
              <a href="<?= base_url('Admin/hapus_halaman/'.$h->id_halaman) ?>" >
                <button type="button" class="btn btn-danger btn-hapus"><i class="fa fa-trash" aria-hidden="true"></i></button>
              </td>
            </a>
            </tr>
          <?php $i++; } ?>
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
<script type="text/javascript">
      $(document).ready(function() {
        $('#halaman').DataTable({});
      } );
    </script>