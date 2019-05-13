
<div id="wrap-admin-mhs-outer">
    <div id="wrap-admin-mhs-inner" class="container">
        <h2 id="selamat-mhs">SELAMAT DATANG, 
          <?php 
foreach ($nama_mhs as $data) {
  echo $data->nama;
}
 ?>

   
        </h2>
        <div class="underscore" style="margin-left:0px;margin-right:0px"></div>
        <div class="col-sm-3">
            <?php include_once('sidebar.php') ?>
        </div>
        <div class="col-sm-9" style="text-align:center">
            <div class="col-sm-12" style="margin-bottom: 80px">
                <img src="<?= base_url() ?>assets/img/e.png"/>
            </div>

            <div class="col-sm-4">
                <div class="panel-group">
                    <div class="panel panel-info">
                      <div class="panel-heading">Total Post</div>
                      <div class="panel-body"><b><?php echo $h;
                       ?> Posts</b></div>
                  </div>
              </div>
          </div>
          <div class="col-sm-4">
                <div class="panel-group">
                    <div class="panel panel-success">
                      <div class="panel-heading">Total Like Post</div>
                      <div class="panel-body"><b><?php echo $l; ?></b></div>
                  </div>
              </div>
          </div>
          <div class="col-sm-4">
                <div class="panel-group">
                    <div class="panel panel-warning">
                      <div class="panel-heading">Total Comment Post</div>
                      <div class="panel-body"><b><?php echo $k; ?> Comments</b></div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
