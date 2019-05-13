  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="box-title" style="display:block;font-weight:bold;font-size:2.3em" >TATA LETAK</h1>
      <div class="underscore" style="margin-left:0px;margin-left:0px;margin-bottom:15px;"></div>
    </section>

    <!-- Main content -->
    <section class="content" style="overflow: auto;">
      <h3>Parent Untuk Dropdown</h3>
      <label>Nama Parent</label>
      <?= form_open('Admin/tambah_parent'); ?>
      <input type="text" class="form-control" placeholder="Input Nama Parent" name="nama" style="width: 200px"><br>
      <button class="btn btn-success">Tambah</button>
      <?= form_close(); ?>
      <hr style="border-color: #555">
      <div class="col-sm-12">
       <h3>Parent</h3>
       <?php foreach ($parent as $p) { 
        if($p->id != 1){

          ?>
          <div class="col-sm-3">
            <div class="panel panel-success">
              <div class="panel-heading">Parent</div>
              <div class="panel-body">
                <h4><?= $p->nama_parent ?></h4>

                <br>
                <?php echo form_open('Admin/simpan_tata_p/'.$p->id); ?>
                <input type="hidden" name="nama" value="<?= $p->nama_parent ?>">
                <input type="hidden" name="ket" value="parent">
                <div class="form-group">
                  <label for="sel1">Pilih Nomor Urut:</label>
                  <select class="form-control" id="sel1" name="urut">
                    <option>-- Tidak Tampil --</option>
                    <?php for($i=1;$i<=50;$i++) {
                      ?>
                      <option value="<?= $i ?>"><?= $i ?></option>
                    <?php }  ?>
                  </select>
                </div> 
                <br>
                <button class="btn btn-success">Simpan</button>
              </div>
              <?php echo form_close(); ?>
              <?php echo form_open('Admin/hapus_tata_p/'.$p->id); ?>
              <div class="form-group">
                <button class="btn btn-danger" style="margin-left:15px">Hapus</button>
              </div>
              <?php echo form_close(); ?>
            </div>
          </div>
        <?php }
      }
      ?>
    </div>
    <div class="col-sm-12">
      <h3>Menu</h3>
      <div class="row">
        <?php $k = 0;foreach ($hlm as $h) {
        # code...
          echo form_open('Admin/simpan_tata/'.$h->id_halaman."/".$h->ket);
          ?>
          <div class="col-sm-3">
            <div class="panel panel-success">
              <div class="panel-heading">Halaman</div>
              <div class="panel-body">
                <h4><?= $h->judul_hlm ?></h4>
                <input type="hidden" name="nama" value="<?= $h->judul_hlm ?>">
                <br>
                <input type="hidden" name="ket" value="<?= $h->ket ?>">
                <br>
                <div class="form-group">
                  <label for="sel1">Pilih Nomor Urut:</label>
                  <select class="form-control uruth" id="sel1" name="urut">
                    <option>-- Tidak Tampil --</option>
                    <?php for($i=1;$i<=50;$i++) {
                      ?>
                      <option><?= $i ?></option>
                    <?php }  ?>
                  </select>
                </div> 
                <div class="form-group">
                  <label for="sel1">Pilih Parent:</label>
                  <select class="form-control" name="parent" class="parent-h" onchange="ganti(<?= $k ?>)">
                    <option onclick="tid(<?= $k ?>)">-- Tidak Ada Parent --</option>
                    <?php foreach ($parent as $p) {
                      if($p->id != 1){
                        ?>
                        <option><?= $p->nama_parent ?></option>
                      <?php } } ?>
                    </select>
                  </div> 
                  <br>
                  <button class="btn btn-success">Simpan</button>
                </div>
              </div>
            </div>
            <?php echo form_close(); $k++;} ?>
          </div>
          <div class="row">
            <?php $j=0;foreach ($kategori as $k) {
        # code...
              echo form_open('Admin/simpan_tata/'.$k->id."/".$k->keterangan);
              ?>

              <div class="col-sm-3" style="float:left">
                <div class="panel panel-success">
                  <div class="panel-heading">Kategori</div>
                  <div class="panel-body">
                    <h4><?= $k->nama ?></h4>
                    <input type="hidden" name="nama" value="<?= $k->nama ?>">
                    <br>
                    <input type="hidden" name="ket" value="<?= $k->keterangan ?>">
                    <br>
                    <div class="form-group" id="urut">
                      <label for="sel1">Pilih Nomor Urut:</label>
                      <select class="form-control urut" id="sel1" name="urut">
                        <option>-- Tidak Tampil --</option>
                        <?php for($i=1;$i<=50;$i++) {
                          ?>
                          <option><?= $i ?></option>
                        <?php }  ?>
                      </select>
                    </div> 
                    <div class="form-group">
                      <label for="sel1">Pilih Parent:</label>
                      <select class="form-control" id="sel1" name="parent" class="parent-k" onchange="ubah(<?= $j ?>)">
                        <option class="tdk" onclick="tdk(<?= $j ?>)">-- Tidak Ada Parent --</option>
                        <?php foreach ($parent as $p) {
                          if($p->id != 1){
                            ?>
                            <option><?= $p->nama_parent ?></option>
                          <?php } } ?>
                        </select>
                      </div> 
                      <br>
                      <button class="btn btn-success">Simpan</button>
                    </div>
                  </div>
                </div>
                <?php echo form_close(); $j++;} ?>
              </div>
              <h3>Navbar</h3>
              <div class="col-sm-12">
                <?php $a=0;foreach ($navbar as $n) {
                  ?>
                  <div class="row">

                    <?php if($n->status_parent==2 && $n->urut != 0){ ?>
                      <div class="col-sm-12" style="float:left">
                        <div class="panel panel-success">
                          <div class="panel-heading">Navbar</div>
                          <div class="panel-body">
                            <h4><?= $n->nama_menu ?></h4>
                            <div class="form-group" id="urut">
                              <label for="sel1">Nomor Urut: <b><?= $n->urut ?></b></label>
                            </div> 
                            <?php if($n->keterangan!="parent"){ 
                              echo form_open('admin/tambah_link/'.$n->id_tata_letak) ?>
                                  <input type="text" class="form-control" placeholder="Jika ingin input link, isikan disini" value="<?= $n->link ?>" name="link"><br><button class="btn btn-success" style="margin-bottom: 20px"><?php if($n->link == null){ ?> Tambah <?php }else{ ?> Edit <?php } ?> Link</button>
                                  <?php echo form_close(); } ?>
                            <h4>Sub Menu :</h4>
                            <?php foreach($dropdown as $d) {
                              if($d->status_parent==1 && $d->nama_parent==$n->nama_parent){
                                ?>
                                <div class="col-sm-12" style="margin-bottom:15px;border-bottom: 1px solid #555"> <a href="#" data-toggle="modal" data-target="#myModal<?= $d->id_tata_letak ?>"><span class='label label-success' style="float: left;"><?= $d->nama_menu ?></span></a><a href="<?= base_url('admin/hps_submenu/'.$d->id_tata_letak) ?>"><label style="float: left;color:red;margin-left:5px">Hapus</label></a><br>
                                  <?= form_open('admin/tambah_link/'.$d->id_tata_letak) ?>
                                  <input type="text" class="form-control" placeholder="Jika ingin input link, isikan disini (contoh : http://pkimuin-suka.ac.id/ )" value="<?= $d->link ?>" name="link"><br><button class="btn btn-success" style="margin-bottom: 20px"><?php if($d->link == null){ ?> Tambah <?php }else{ ?> Edit <?php } ?> Link</button>
                                  <?php echo form_close(); ?>
                                </div>

                                <?php foreach($sub2 as $s) {
                                  if($s->status_parent==3 && $s->parent2==$d->id_tata_letak){
                                    ?>
                                    <div class="col-sm-12" style="margin-bottom:15px;padding-left:35px;border-bottom: 1px solid #b79d9d;"> <a href="#" data-toggle="modal" data-target="#myModal3<?= $s->id_tata_letak ?>"><span class='label label-info' style="float: left;"><?= $s->nama_menu ?></span></a><a href="<?= base_url('admin/hps_submenu/'.$s->id_tata_letak) ?>" style="cursor: pointer"><label style="float: left;color:red;margin-left:5px">Hapus</label></a>
                                      <?= form_open('admin/tambah_link/'.$s->id_tata_letak) ?>
                                      <br><input type="text" class="form-control" placeholder="Jika ingin input link, isikan disini (contoh : http://pkimuin-suka.ac.id/ )" value="<?= $s->link ?>" name="link"><br><button class="btn btn-success" style="margin-bottom: 20px;"><?php if($d->link == null){ ?> Tambah <?php }else{ ?> Edit <?php } ?> Link</button>
                                      <?php echo form_close(); ?>
                                    </div>
                                    <?php foreach($sub3 as $s3) {
                                  if($s3->status_parent==4 && $s3->parent3==$s->id_tata_letak){
                                    ?>
                                    <div class="col-sm-12" style="margin-bottom:15px;padding-left:55px;border-bottom: 1px solid #bed0e3;"> <a href="#"><span class='label label-primary' style="float: left;"><?= $s3->nama_menu ?></span></a><a href="<?= base_url('admin/hps_submenu/'.$s3->id_tata_letak) ?>"><label style="float: left;color:red;margin-left:5px">Hapus</label></a><br>
                                      <?= form_open('admin/tambah_link/'.$s3->id_tata_letak) ?>
                                      <input type="text" class="form-control" placeholder="Jika ingin input link, isikan disini (contoh : http://pkimuin-suka.ac.id/ )" value="<?= $s3->link ?>" name="link"><br><button class="btn btn-success" style="margin-bottom: 20px"><?php if($d->link == null){ ?> Tambah <?php }else{ ?> Edit <?php } ?> Link</button>
                                      <?php echo form_close(); ?>
                                    </div>
                                    <?php
                                  } 
                                } 
                                  } 
                                } 
                              } } ?>
                            </div>
                          </div>
                        </div>
                      <?php }else if($n->status_parent!=1 && $n->urut != 0){ ?>
                       <div class="col-sm-12" style="float:left">
                        <div class="panel panel-success">
                          <div class="panel-heading">Navbar</div>
                          <div class="panel-body">
                            <h4><?= $n->nama_menu ?></h4>
                            <div class="form-group">
                              <label for="sel1">Nomor Urut: <b><?= $n->urut ?></b></label>
                            </div> 
                             <?php if($n->keterangan!="parent"){ echo form_open('admin/tambah_link/'.$n->id_tata_letak) ?>
                                  <input type="text" class="form-control" placeholder="Jika ingin input link, isikan disini (contoh : http://pkimuin-suka.ac.id/ )" value="<?= $n->link ?>" name="link"><br><button class="btn btn-success" style="margin-bottom: 20px"><?php if($n->link == null){ ?> Tambah <?php }else{ ?> Edit <?php } ?> Link</button>
                                  <?php echo form_close(); } ?>
                            <br>
                          </div>
                        </div>
                      </div>
                    <?php } $a++; ?></div><?php 
                  }?>
                </div>
              </div>

            </div>

          </section>
        </div>
        <?php foreach ($navbar as $n) {
          if($n->status_parent==2 && $n->urut != 0){ 
            foreach($dropdown as $d) {
             if($d->status_parent==1 && $d->nama_parent==$n->nama_parent){
              ?>
              <div id="myModal<?= $d->id_tata_letak ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Sub Menu 2</h4>
                    </div>
                    <div class="modal-body">


                      <h3 style="font-weight: bold">Halaman =</h3>
                      <ul>
                        <?php foreach ($hlm as $h) {
                         echo form_open('admin/tambah_sub2/'.$h->id_halaman."/".$h->ket); ?>
                         <input type="hidden" name="id" value="<?= $d->id_tata_letak ?>">
                         <input type="hidden" name="nama" value="<?= $h->judul_hlm ?>">
                         <input type="hidden" name="id_menu" value="<?= $h->id_halaman ?>"><h3 style="display:inline-block;"><li><?= $h->judul_hlm ?></li></h3><button class="btn btn-success" style="margin-left:15px">Tambah</button><hr><br>
                         <?php echo form_close(); } ?>
                       </ul>
                       <h3 style="font-weight: bold">Kategori =</h3>
                       <ul>
                         <?php foreach ($kategori as $k) {
                           echo form_open('admin/tambah_sub2/'.$k->id."/".$k->keterangan); ?>
                           <input type="hidden" name="id" value="<?= $d->id_tata_letak ?>">
                           <input type="hidden" name="nama" value="<?= $k->nama ?>">
                           <input type="hidden" name="id_menu" value="<?= $k->id ?>"><h3 style="display:inline-block;"><li><?= $k->nama ?></li></h3><button class="btn btn-success" style="margin-left:15px">Tambah</button><hr><br>
                           <?php echo form_close(); } ?>
                         </ul>

                       </div>

                       <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>

                  </div>
                </div>
              <?php } 
            } 
          } 
        } ?>
        <?php 
            foreach($dropdown as $d) {
             if($d->status_parent==3){
              ?>
              <div id="myModal3<?= $d->id_tata_letak ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Sub Menu 3</h4>
                    </div>
                    <div class="modal-body">
                      
                      
                      <h3 style="font-weight: bold">Halaman =</h3>
                      <ul>
                        <?php foreach ($hlm as $h) {
                         echo form_open('admin/tambah_sub3/'.$h->id_halaman."/".$h->ket); ?>
                         <input type="hidden" name="id" value="<?= $d->id_tata_letak ?>">
                         <input type="hidden" name="nama" value="<?= $h->judul_hlm ?>">
                         <input type="hidden" name="id_menu" value="<?= $h->id_halaman ?>"><h3 style="display:inline-block;"><li><?= $h->judul_hlm ?></li></h3><button class="btn btn-success" style="margin-left:15px">Tambah</button><hr><br>
                         <?php echo form_close(); } ?>
                       </ul>
                       <h3 style="font-weight: bold">Kategori =</h3>
                       <ul>
                         <?php foreach ($kategori as $k) {
                           echo form_open('admin/tambah_sub3/'.$k->id."/".$k->keterangan); ?>
                           <input type="hidden" name="id" value="<?= $d->id_tata_letak ?>">
                           <input type="hidden" name="nama" value="<?= $k->nama ?>">
                           <input type="hidden" name="id_menu" value="<?= $k->id ?>"><h3 style="display:inline-block;"><li><?= $k->nama ?></li></h3><button class="btn btn-success" style="margin-left:15px">Tambah</button><hr><br>
                           <?php echo form_close(); } ?>
                         </ul>
                         
                       </div>

                       <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>

                  </div>
                </div>
              <?php } 
            
        } ?>
        <script type="text/javascript">
          function ubah(id){
            var h = document.getElementsByClassName("parent-k");
            var u = document.getElementsByClassName("urut");
            var i =0;
            for (i = id; i <= id; i++) {
              u[i].style.display = "none";
            }
          }
          function tdk(id){
            var t = document.getElementById("tdk");
            var u = document.getElementsByClassName("urut");
            for (i = id; i <= id; i++) {
              u[i].style.display = "block";
            }
          }
          function ganti(id){
            var h = document.getElementsByClassName("parent-h");
            var a = document.getElementsByClassName("uruth");
            var i =0;
            for (i = id; i <= id; i++) {
              a[i].style.display = "none";
            }
          }
          function tid(id){
            var t = document.getElementById("tdk");
            var u = document.getElementsByClassName("uruth");
            for (i = id; i <= id; i++) {
              u[i].style.display = "block";
            }
          }

        </script>
