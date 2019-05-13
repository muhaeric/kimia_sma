
   <?php include_once('header.php') ?>
     <div id="single-post"> 
        <div id="single-post-inner" class="container">
             <div class="col-md-9 list-into-single"> 
            <div>
                <p class="list-page-single"><a href="<?= base_url(); ?>">Home</a></p>>><p class="list-page-single"><a href="#"><?= $hlm->judul_hlm ?></a></p>
            </div>
        </div>
             <div class="col-md-9 single-post-posts" style="padding-bottom: 20px;padding-left: 25px;padding-right:25px">
                
                <div id="title-post" style="margin-bottom:20px">
                    <h2><?= $hlm->judul_hlm ?></h2>
                    <div class="underscore" style="margin-left:0px;margin-left:0px;margin-bottom:15px;"></div>
                </div>
                
                  <?= $hlm->isi_hlm ?> 
            </div>
            <div id="wrap-sidebar-single" class="col-md-3">
                <?php include("sidebar.php") ?>
            </div>
        </div>
      </div>
    <?php include_once('footer.php') ?>

