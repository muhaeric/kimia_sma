
<?php include_once('header.php') ?>
<div id="single-post">
  <div id="single-post-inner" class="container">
    <div class="col-md-9 list-into-single">
      <div>
        <p class="list-page-single"><a href="<?= base_url() ?>">Home</a></p>>><p class="list-page-single"><a href="<?= base_url().'kategori/'.$post[0]['kategori'] ?>"><?= $post[0]['kategori'] ?></a></p>
      </div>
    </div>
    <div class="col-md-9 single-post-posts" style="padding-bottom: 20px">

      <div id="title-post">
        <h2><?= $post[0]['judul'] ?></h2>
      </div>
      <div class="detail-post">
        <p class="date-post">
          <span class="glyphicon glyphicon-dashboard" style="margin-right:5px;color:rgb(129, 10, 65)"></span><b>Tanggal :</b>
          <span class="text-date-post"><?= date('d M Y', strtotime($post[0]['tanggal'])) ?></span>
        </p>
        <p class="created-post" style="margin-right:10px">
          <span class="glyphicon glyphicon-user"  style="margin-right:5px;color:rgb(129, 10, 65)"></span><b>Ditulis oleh : </b>
          <span class="text-created-post"><?= $post[0]['penulis'] ?></span>
        </p>
      </div>
      <?php 
      if($post[0]['gambar'] == 'kosong'){

      }else {


      ?>
      <a href="<?php echo base_url() ?>assets/berkas/<?php echo $post[0]['gambar'] ?>">
      <button class="btn btn-primary">Lihat Lampiran</button>
      </a>
      <?php 
    }
    ?>
      <p id="isi-post">
        <?= $post[0]['content'] ?>
        
        <br>
        <br>
        <br>
        <?php if (empty($this->session->userdata("nama"))) { 
          echo "";
        } else {
          ?>
          <?php
          if(isset($get_data) && is_array($get_data) && count($get_data)): $i=1;
          foreach ($get_data as $key => $data) { 
            ?>
            <a onclick="javascript:savelike(<?php echo $data['id'];?>);">
             <button class="btn" style="background-color: #f3b6c1;font-family: myf; margin-top: 40px">
               <i class="glyphicon glyphicon-star<?php
               $iki=$this->session->userdata("nama");
               if (empty($donelike[0]['nim'])): ?>-empty<?php endif; ?>" style="margin-right:5px"></i>
               <span id="like">
                 
                 <?php if($data['suka']>0){echo $data['suka'].' Suka';}else{echo 'suka';} ?>
               </span>
             </button>
           </a>

         <?php } endif; ?>
       <?php } ?>

     </p>
     <?php if (empty($this->session->userdata("nama"))) { 
      echo "";
    } else {
      ?>
      <div id="post-bottom-wrap" style="margin-top:40px">
        <div data-aos="zoom-up">
          <div id="terkait-post" class="col-sm-12">
            <h3>KOMENTAR</h3>
            <div class="underscore" style="margin-left:0px;margin-left:0px;margin-bottom:15px;"></div>
            <?php foreach ($komentar as $data) {
             ?>
             
             <div class="col-sm-10" style="border-bottom: 1px solid #29CC6D">
              <h2 style="color:#1A7F44;font-family: myf"><?php echo $data->nim; ?><span style="font-size: 0.5em; margin-left: 7px"><?php echo $data->nama; ?></span></h2>
              <h5 style="color:#848586; font-family: myf2"><b>Tanggal : </b> <?php echo $data->created_at; ?></h5>
              <p style="color:#333;font-family: myf2; font-size: 1.4em">
                <?php echo $data->komentar; ?>
              </p>
            </div>
            <?php 
            $iki=$post[0]['nime'];
            if($data->nim == $this->session->userdata("nama")) { ?>
              <div class="col-md-2">
                <a href="<?php echo base_url() ?>Pagemhs/hapus_komentar?id_komentar=<?php echo $data->id_komentar ?>&slugk=<?php echo $this->uri->segment(2); ?>&token=<?php echo $data->token ?>">
                  <button class="btn btn-danger">x</button>
                </a>
              </div>
            <?php } else if($this->session->userdata("nama") == $iki) { ?>
              <div class="col-md-2">
                <a href="<?php echo base_url() ?>Pagemhs/hapus_komentar?id_komentar=<?php echo $data->id_komentar ?>&slugk=<?php echo $this->uri->segment(2); ?>">
                  <button class="btn btn-danger">x</button>
                </a>
              </div>
            <?php } ?>
          <?php } ?>


        </div>
        <div class="col-sm-12" style="margin-top: 40px">
          <div style="padding:10px">
            <div style="background-color: #d3f0cc; border-radius: 3px; padding:30px 15px; overflow: auto;width: 100%">

              <div class="col-sm-3" style="text-align: right;margin-top: 40px">
                <label style="margin-left:40px;position: relative;top:3px;font-family: myf2 ">Isi Komentar : </label>
              </div>
              <form action="<?php echo base_url() ?>Pagemhs/kirim_komentar" method="post">
                <div class="col-sm-9" style="margin-top: 40px">
                  <textarea name="isi-komentar" rows="10" style="width: 100%" required ></textarea>
                </div>
                <input type="hidden" name="clug" value="<?php echo $this->uri->segment(2); ?>">
                <input type="hidden" name="id_blogs" value="<?= $post[0]['id'] ?>">
                <input type="hidden" name="penulis" value="<?= $post[0]['nime'] ?>">
                              <!--
                              <div class="col-sm-3" style="text-align: right;margin-top: 40px">
                                    <label style="margin-left:40px;position: relative;top:3px;font-family: myf2 ">Isi Captha : </label>
                                </div>
                                <div class="col-sm-9" style="margin-top: 40px">
                                  <input type="text" name="judul-komentar" placeholder="Input Captha" style="width: 100%" required >
                              </div>
                              !-->
                              <center>
                                <button type="submit" class="btn btn-success" style="margin-top:30px"><i class="glyphicon glyphicon-send" style="margin-right:5px"></i>Kirim</button>
                              </center>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php } ?>

              </div>
              <div id="wrap-sidebar-single" class="col-md-3">
                <?php include("sidebar.php") ?>
              </div>
            </div>
          </div>
          <script type="text/javascript">
            function savelike(blog) {
              $.ajax({
                type: "POST",
                url: "<?php echo site_url('Welcome/savelikes');?>",
                data: "id_blog="+blog,
                success: function (response) {
                 $("#butlike").html(response+" Likes");

               }
             });
            }
            $(document).ready(function(){
             $('.refreshCaptcha').on('click', function(){
              $.get('<?php echo base_url().'captcha/refresh'; ?>', function(data){
               $('#captImg').html(data);
             });
            });
           });
         </script>
         <?php include_once('footer.php') ?>
