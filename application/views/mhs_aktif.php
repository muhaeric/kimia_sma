
    <?php include_once('header.php') ?>
      <div id="list-post-wrap">
          <div class="container">
            <div class="col-md-9 list-into-single">
            <div>
                <p class="list-page-single"><a href="#">Beranda</a></p>>><p class="list-page"><a href="#">Mahasiswa</a></p>
            </div>
        </div>
            <div class="col-md-9 single-post-posts">

           <?php foreach ($pilih_penulis as $tampil) {
               
           ?>

                <div class="panel-post-wrap">
                    <div class="col-sm-4 img-list-posts-wrap">
                        <img src="<?= base_url() ?>assets/img/thumb/<?php echo $tampil->gambar ?>" class="img-responsive img-list-posts"/>
                    </div>
                    <div class="col-sm-8">
                        <h3 class="title-isi-list-posts"> <a href="<?php echo base_url() ?>single/<?php echo $tampil->slug ?>"><?php echo $tampil->judul ?></a></h3>
                        <div class="detail-post detail-post-list-posts">
                            <p class="date-post">
                                <span class="glyphicon glyphicon-dashboard" style="margin-right:5px;color:#29CC6D"></span><b>Tanggal :</b>
                                <span class="text-date-post"><?php echo $tampil->created_at; ?></span>
                            </p>
                            <p class="created-post">
                                <span class="glyphicon glyphicon-user"  style="margin-right:5px;color:#29CC6D"></span><b>Ditulis oleh : </b>
                                <span class="text-created-post"><?php echo $tampil->penulis ?></span>
                            </p>
                        </div>
                        <div class="isi-lists-posts">
                            <p>
                            <?= substr(strip_tags($tampil->content), 0, 200) ?>...
                            </p>
                        </div>
                        <a href="<?php echo base_url() ?>single/<?php echo $tampil->slug ?>">
                        <button type="button" class="btn btn-success">Read More</button>
                        </a>   
                 </div>
                </div>
               
               <?php } ?>
                <div class="col-sm-12 pagination-wrap">
                                  <?php
echo $this->pagination->create_links();
?>
                </div>
            </div>
            <div id="wrap-sidebar-single" class="col-md-3">
        <?php include("sidebar.php") ?>
    </div>
          </div>
      </div>
      <?php include_once('footer.php') ?>
