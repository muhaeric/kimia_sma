
<?php include_once('header.php') ?>
<div id="list-post-wrap">
  <div class="container">
    <div class="col-md-9 list-into-single">
      <div>
        <p class="list-page-single"><a href="<?= base_url(); ?>">Beranda</a></p><p class="list-page-single">>> <a href="#"><?= $kat->nama ?></a></p>
      </div>
    </div>
    <div class="col-md-9 single-post-posts">

      <div id="title-list-posts-wrap">
        <h2 class="title-section" style="text-align:left"><?= $kat->nama ?></h2>
        <div class="underscore" style="margin-left:0px;margin-right:0px;"></div>
      </div>
      <?php foreach ($daftar as $list): ?>

        <div class="panel-post-wrap">

          <div class="custom-entry" style="margin-right:25px">
            <div class="entry-month">
              <?= date('M', strtotime($list['created_at'])) ?>
            </div>
            <div class="entry-date">
              <?= date('d', strtotime($list['created_at'])) ?>
            </div>
            <div class="entry-month">
              <?= date('Y', strtotime($list['created_at'])) ?>
            </div>
          </div>
          
          <h3 class="title-isi-list-posts"><a href="<?= base_url().'single/'.$list['slug'] ?>"><?= $list['judul'] ?></a></h3>
          <div class="detail-post detail-post-list-posts">
            <p class="created-post">
              <span class="glyphicon glyphicon-user"  style="margin-right:5px;color:rgb(14, 128, 115)"></span><b>Ditulis oleh : </b>
              <span class="text-created-post"><?php echo $list['penulis']."(".$list['nama'].")" ?></span>
            </p>
            <div class="isi-lists-posts">
              <p>
                <?= substr(strip_tags($list['content']), 0, 200) ?>
              </p>
            </div>
            <a href="<?= base_url().'single/'.$list['slug'] ?>">
              <button type="button" class="btn btn-success">Read More</button>
            </a>
          </div>
        </div>
      <?php endforeach; ?>

      <div class="col-sm-12 pagination-wrap">
       <?= $this->pagination->create_links(); ?>
     </div>
   </div>
   <div id="wrap-sidebar-single" class="col-md-3">
    <?php include_once("sidebar.php") ?>
  </div>
</div>
</div>
<?php include_once('footer.php') ?>
