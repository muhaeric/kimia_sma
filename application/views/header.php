<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Kimia SMA PKIM</title>

  <!-- Bootstrap -->
  <link href="<?= base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/css/aos.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700|Montserrat:400,700|Open+Sans:400,400i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web" type="text/css" />
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>assets/js/aos.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
  <script src="<?= base_url() ?>assets/js/post-slider.js"></script>
  <script src="<?= base_url() ?>assets/js/topscroll.js"></script>
  <script src="<?= base_url() ?>assets/js/search.js"></script>
  <!-- <script type="text/javascript" src="<?php echo base_url() ?>assets/DataTables/datatables.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/DataTables/datatables.css"> -->
  <script src="<?php echo base_url() ?>assets/datatables/js/jquery.dataTables.min.js"></script>
  <link href="<?php echo base_url('assets/datatables/css/jquery.dataTables.min.css') ?>" rel="stylesheet">  
  <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php $this->load->model('Blogs_md'); ?>
    <script>
      AOS.init({
        offset: 200,
        duration: 600,
        easing: 'ease-in-sine',
        delay: 100,
      });
    </script>
    <nav id="navbar-outer-up" class="navbar navbar-inverse">
     <div class="container">
      <div id="nav-header-up" class="navbar-header">
        <div id="navbar-title" class="navbar-brand" href="#">
          <i class="glyphicon glyphicon-book icon-navbar-up"></i><b>KIMIA SMA MAHASISWA PKIM UIN SUNAN KALIJAGA</b>
        </div>

      </div>
    </div>
  </nav>
  <nav id="navbar-outer-bottom" class="navbar navbar-inverse">
    <div class="container">
      <div class="navbar-header" style="width: 100%;padding-top:29px;">
        <div id="navbar-kiri" class="navbar-brand col-sm-7">
          <div class="col-sm-2 col-xs-4 gambar" style="text-align: center;">
            <img src="<?= base_url() ?>assets/img/logo-uin.png" style="float: left;" class="img-responsive">
          </div>
          <div class="col-sm-10 col-xs-8 isi-logo" style="text-align: left;">
            <h2 style="color: #fff; font-family: myf;float: left;margin-bottom: 0px;margin-top: 0px">PENDIDIKAN KIMIA</h2>
            <h3 style="color: #fff; font-family: myf2;float: left;margin-top:5px">UIN SUNAN KALIJAGA</h3>
          </div>
        </div>
        <div id="navbar-kanan" class="navbar-brand col-sm-5 ">
          <!-- <div class="col-sm-6">
            <div class="col-sm-3" style="text-align: right;">
              <h2 class="glyphicon glyphicon-earphone" style="margin-right:5px"></h2>
            </div>
            <div class="col-sm-9" style="text-align: left;">
              <h5 class="text-contact"><b>+62-274-512474</b></h5>
              <h6 class="text-contact">pkim@uin-suka.ac.id</h6>
            </div>
          </div> -->
          <div class="col-sm-12" style="text-align: right;padding:0px">
           <!-- <p class="text-contact"><i class="glyphicon glyphicon-home" style="margin-right:5px"></i>Jl. Marsda Adisucipto Yogyakarta</p> -->
           <form action="<?php echo base_url() ?>hasil_search" method="GET">
             <input id="cari" type="text" name="cari" placeholder="<?php @$id = $_GET['cari'];
             
             if (!empty($id)) {
               echo $id;
               }else {
                echo "Cari disini";
              }
              ?>"  style="position: relative;z-index: 999">

            </form>
          </div>
        </div>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
       <div class="collapse navbar-collapse dropdown" id="myNavbar">
          <div class="col-sm-12" id="wrap-putih">
            <ul class="nav navbar-nav navbar-left menu-nav-bottom">
              <li><a href="http://pkim.uin-suka.ac.id"><i class="glyphicon glyphicon-home" style="margin-right:5px"></i>Home</a> </li>
              <?php $a=0;foreach ($navbar as $n) {
                ?>


                <?php if($n->status_parent==2 && $n->urut != 0){ ?>
                  <li>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?= $n->nama_menu ?>
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu listss<?= $a ?>">
                      <?php foreach($dropdown as $d) {
                        if($d->status_parent==1 && $d->nama_parent==$n->nama_parent){
                          $e = 0;
                          foreach($sub2 as $s) {
                           if($s->parent2 == $d->id_tata_letak){
                             
                            ?>
                            <li class="dropdown-submenu">
                             <?php if($d->link != null){
                                              ?>
                                            <a href="<?= $d->link ?>">
                                              <?php
                                            }else{ if($d->keterangan == "halaman"){
                              ?>
                              <a href="<?= base_url('welcome/halaman/'.$d->id_menu) ?>" >
                              <?php }else if($d->keterangan == "kategori"){ ?>
                                <a href="<?= base_url().'welcome/list_post/'.$d->id_menu ?>">
                                  <?php } } echo $d->nama_menu ?></a>
                                
                                  <ul class="dropdown-menu">
                                    <?php foreach($sub2isi as $si) { 
                                      if($si->status_parent==3 && $si->parent2==$d->id_tata_letak){
                                        $f=0;
                                        foreach($sub3 as $s3) {
                                          if($s3->parent3 == $si->id_tata_letak){
                                             
                           
                                            ?>
                                            <li class="dropdown-submenu">
                                              <?php if($si->link != null){
                                              ?>
                                              <a href="<?= $si->link ?>">
                                              <?php
                                            }else{ if($si->keterangan == "halaman"){
                                                ?>
                                                <a href="<?= base_url('welcome/halaman/'.$si->id_menu) ?>" >
                                                <?php }else if($si->keterangan == "kategori"){ ?>
                                                  <a href="<?= base_url().'welcome/list_post/'.$si->id_menu ?>">
                                                    <?php }} echo $si->nama_menu ?></a>
                                                   
                                                    <ul class="dropdown-menu">
                                                      <?php foreach($sub3isi as $si3) { 
                                                        if($si3->status_parent==4&& $si3->parent3==$si->id_tata_letak){ 
                                                           
                                                          ?>
                                                          <li><?php if($si3->link != null){
                                              ?>
                                              <a href="<?= $si3->link ?>">
                                              <?php
                                            }else{
                                              if($si3->keterangan == "halaman"){
                                                            ?><a href="<?= base_url('welcome/halaman/'.$si3->id_menu) ?>">
                                                            <?php }else if($si3->keterangan == "kategori"){ ?>
                                                              <a href="<?= base_url().'welcome/list_post/'.$si3->id_menu ?>">
                                                                <?php } } echo $si3->nama_menu ?></a></li>
                                                              <?php  }} ?>
                                                            </ul>
                                                          </li>
                                                          <?php 
                                                          $f=1;
                                                          break;
                                                        }
                                                      }if($f==0){ 
                                                         if($si->link != null){
                                              ?>
                                              <li><a href="<?= $si->link ?>"><?= $si->nama_menu ?></a></li>
                                              <?php
                                            }else{
                                                        if($si->keterangan == "halaman"){?>
                                                          <li><a href="<?= base_url('welcome/halaman/'.$si->id_menu) ?>"><?= $si->nama_menu ?></a></li>
                                                        <?php }else if($si->keterangan == "kategori"){ ?>
                                                          <li><a href="<?= base_url().'welcome/list_post/'.$si->id_menu ?>"><?= $si->nama_menu ?></a></li>
                                                          <?php
                                                        }
                                                        }
                                                      }
                                                    }
                                                  } ?>
                                                </ul>
                                              </li>
                                              <?php
                                              $e=1;
                                              break;
                                            }
                                          }
                                          if($e==0){
                                            if($d->link != null){
                                              ?>
                                              <li><a href="<?= $d->link ?>"><?= $d->nama_menu ?></a></li>
                                              <?php
                                            }else{
                                              if($d->keterangan == "halaman"){
                                                ?>
                                                <li><a href="<?= base_url('welcome/halaman/'.$d->id_menu) ?>"><?= $d->nama_menu ?></a></li>
                                              <?php }else if($d->keterangan == "kategori"){ ?>
                                                <li><a href="<?= base_url().'welcome/list_post/'.$d->id_menu ?>"><?= $d->nama_menu ?></a></li>
                                              <?php }
                                            }
                                          } 
                                        }
                                      } ?>
                                    </ul>
                                  </li>
                                <?php }else if($n->status_parent!=1 && $n->urut != 0){ 
                                 if($n->link != null){
                                  ?>
                                  <li><a href="<?= $n->link ?>"><?= $n->nama_menu ?></a></li>
                                  <?php
                                }else{
                                  if($n->keterangan == "halaman"){
                                    ?>
                                    <li><a href="<?= base_url('welcome/halaman/'.$n->id_menu) ?>"><?= $n->nama_menu ?></a></li>
                                  <?php }else if($n->keterangan == "kategori"){ ?>
                                    <li><a href="<?= base_url().'welcome/list_post/'.$n->id_menu ?>"><?= $n->nama_menu ?></a></li>
                                  <?php }
                                }
                              } $a++;
                            }?>

                          </ul>
                          <ul class="nav navbar-nav navbar-right menu-nav-bottom nav-log-search">
                            <?php if (!empty($this->session->userdata("nama")))
                            {
                              ?>
                              <li><a href="<?php echo base_url() ?>Pagemhs" id="login-navbar" ><span class="glyphicon glyphicon-dashboard" style="margin-right:5px"></span> Dashboard</a></li>

                              <?php  
                            }
                            else {
                              ?>
                              <li><a href="#" id="login-navbar" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in" style="margin-right:5px"></span> Login</a></li>


                              <?php
                            } ?>


                          </ul>
                        </div>
                      </div>

        </div>

      </div>
    </nav>
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 style="color:rgb(172, 176, 10);font-family: myf;text-align:center;">Login Mahasiswa</h4>
          </div>
          <div class="modal-body">
            <div class="col-sm-12" style="text-align: center;margin-bottom:50px">
              <img src="<?= base_url() ?>assets/img/wew.png" style="width: 100px">
            </div>
            <?php echo form_open('Login/aksi_login'); ?>
            <form action="<?php echo base_url() ?>Pagemhs/aksi_login" method="post">
              <div class="col-sm-4" style="text-align: right;">
                <label style="margin-left:40px;position: relative;top:3px;font-family: myf2 ">NIM : </label>
              </div>
              <div class="col-sm-8">
                <input type="text" name="nim" placeholder="Input Your NIM" style="width: 100%" required >
              </div>

              <div class="col-sm-4" style="text-align: right;margin-top: 30px">
                <label style="margin-left:40px;position: relative;top:3px;font-family: myf2 ">Password : </label>
              </div>
              <div class="col-sm-8" style="margin-top: 30px">
                <input type="Password" name="password" placeholder="Input Your Password" style="width: 100%" required >
              </div>




              <center>
                <button  type="submit" style="margin-top: 50px" class="btn btn-warning"><i class="glyphicon glyphicon-send" style="margin-right:5px"></i>Login Mahasiswa</button>
              </center>
            </form>
          </div>
          <div class="modal-footer">
          </div>
        </div> 

      </div>
    </div>
<!--   <script type="text/javascript">
    function navbars(id, no){
      $.ajax({
        type: "GET",
        url: "<?php echo base_url('Admin/dropdown/')?>/"+id,
        dataType: "JSON",
        success:function(data){
          var subcat = "";
          for(var i=0;i<data.length;i++){
            if(data[i].keterangan == "halaman"){
              subcat += '<li><a href="<?= base_url('welcome/halaman/')?>'+data[i].id_menu+'">'+data[i].nama_menu+'</a></li>';
            }else if(data[i].keterangan == "kategori"){
              subcat += '<li><a href="<?= base_url('welcome/list_post/')?>'+data[i].id_menu+'">'+data[i].nama_menu+'</a></li>';
            }
          }
          $('.listss'+no).html(subcat);
        },
        error:function(){
          alert("error");
        }
      });
    }
  </script> -->