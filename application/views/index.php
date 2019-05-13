
<?php include_once('header.php') ?>
<div class="container">
<div class="col-sm-12"style="padding-bottom: 40px">
  <div class="container"> 
    <div class="col-sm-8">
      <h2 class="title-section" style="text-align: left;">POST TERBARU</h2>
      <div class="underscore" style="margin-left:0px"></div>
      <?php foreach ($new as $data) {
        ?>
      <div class="col-sm-12" style="padding:0px;border-bottom: 1px solid #bcccec;padding-bottom: 20px;margin-bottom: 30px">
        <div class="custom-entry">
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
        <a href="<?= base_url().'single/'.$data['slug'] ?>">
          <h3 class="title-post-popular" style="margin-top:0px"><?= $data['judul'] ?></h3>
        </a>
        <h6 style="color:#555;font-family: myf">Penulis : <b><?= $data['penulis'] ?></b></h6>

        <p class="content-popular-post">
          <?= substr(strip_tags($data['content']), 0, 200) ?>
        </p>
      </div>
    <?php } ?>
    </div>
    <div class="col-sm-4">
      <h3 class="title-section" style="text-align: left;">POST POPULER</h3>
      <div class="underscore" style="margin-left:0px"></div>
      <div id="post-populer-sidebar">
        <ul id="post-populer-sidebar-list">
          <?php foreach ($populer as $pop): ?>
            <li><a href="<?= base_url().'single/'.$pop['slug'] ?>"><span class="glyphicon glyphicon-file" style="margin-right:5px"></span><?= $pop['judul'] ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
</div>
</div>

<?php include_once('footer.php') ?>
