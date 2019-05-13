
<?php include_once('header.php') ?>
<div id="single-post"> 
  <div id="single-post-inner" class="container">
   <div class="col-md-9 list-into-single"> 
    <div>
      <p class="list-page-single"><a href="<?= base_url(); ?>">Home</a></p>>><p class="list-page-single"><a href="#">Penelitian</a></p>
    </div>
  </div>
  <div class="col-md-9 single-post-posts" style="padding-bottom: 20px;padding-left: 25px;padding-right:25px">
    <h2 class="title-section">PENELITIAN</h2>
    <div class="underscore"></div>
    <table id="penelitian" class="table table-responsive table-striped table-bordered">
      <thead>
        <tr>
          <th style="text-align: center;">No</th>
          <th style="text-align: center;">Nama</th>
          <th style="text-align: center;">Judul</th>
          <th style="text-align: center;">Jenis Penelitian</th>
          <th style="text-align: center;">Sumber Dana</th>
          <th style="text-align: center;">Alamat Journal</th>
        </tr>
      </thead>
      <tbody>
           <?php 
        $no=1;
        foreach ($ambil_penelitian as $tampil) {
        
         ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $tampil['nama']; ?></td>
          <td><?php echo $tampil['judul']; ?></td>
          <td><?php echo $tampil['jenis']; ?></td>
          <td><?php echo $tampil['sumber_dana']; ?></td>
          <td><?php echo $tampil['alamat_journal']; ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <div id="wrap-sidebar-single" class="col-md-3">
    <?php include("sidebar.php") ?>
  </div>
</div>
</div>
<?php include_once('footer.php') ?>

<script type="text/javascript">
      $(document).ready(function() {
        $('#penelitian').DataTable({});
      } );
    </script>