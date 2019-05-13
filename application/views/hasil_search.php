
<?php include_once('header.php') ?>
<div id="list-post-wrap">
  <div class="container">
    <div class="col-md-9 list-into-single"> 
        <div>
            <p class="list-page-single"><a href="<?= base_url() ?>">Beranda</a></p>>><p class="list-page"><a href="#" style="color:#407DC2">Search</a></p>
        </div>
    </div>
    <div class="col-md-9 single-post-posts">

        <div id="title-list-posts-wrap">
            <h2 class="title-section" style="text-align:left">Hasil Pencarian : " <?php @$id = $_GET['cari'];

            if (!empty($id)) {
             echo $id;
         }else {
          echo "Cari disini";
      }
      ?> "</h2>
      <div class="underscore" style="margin-left:0px;margin-right:0px;"></div>
  </div>
  <?php 

  if(count($cari)>0){
    foreach ($cari as $data) {
        ?>
        <div class="panel-post-wrap">
            <div class="custom-entry" style="margin-right:25px">
                <div class="entry-month">
                  <?= date('M', strtotime($data['created_at'])) ?>
              </div>
              <div class="entry-date">
                  <?= date('d', strtotime($data['created_at'])) ?>
              </div>
              <div class="entry-month">
                  <?= date('Y', strtotime($data['created_at'])) ?>
              </div>
          </div>
          <h3 class="title-isi-list-posts"><a href="<?php echo base_url() ?>single/<?php echo $data['slug'] ?>"><?php echo $data['judul']; ?></a></h3>
          <div class="detail-post detail-post-list-posts">
            <p class="created-post">
                <span class="glyphicon glyphicon-user"  style="margin-right:5px;color:rgb(129, 73, 10)"></span><b>Ditulis oleh : </b>
                <span class="text-created-post"><?= $data['penulis'] ?></span>
            </p>
            
            <div class="isi-lists-posts">
                <p>
                    <?php echo mb_substr($data['content'], 0, 200)."..." ?>
                </p>
            </div>
            <a href="<?php echo base_url() ?>single/<?php echo $data['slug'] ?>">
                <button type="button" class="btn btn-success">Read More</button>
            </a>
        </div>
    </div>
<?php }}else {
    echo "Data tidak Ditemukan";
}

?>

<div class="col-sm-12 pagination-wrap">

</div>
</div>
<div id="wrap-sidebar-single" class="col-md-3">
    <?php include("sidebar.php") ?>
</div>
</div>
</div>
<?php include_once('footer.php') ?>
