
      <div id="wrap-admin-mhs-outer">
        <div id="wrap-admin-mhs-inner" class="container">
            <h2 id="selamat-mhs">Pemberitahuan</h2>
            <div class="underscore" style="margin-left:0px;margin-right:0px"></div>
            <div class="col-sm-3">
                 <?php include_once('sidebar.php') ?>
            </div>
            <div class="col-sm-9 table-responsive">
                 <table class="table table-striped table-bordered data" style="margin-top:25px;">
                    <thead>
                      <tr style="background-color: #407DC2; color:white">
                        <th>No</th>
                        <th style="width: 100px">Tanggal</th>
                        <th>Pemberitahuan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                       foreach ($ambil_pemberitahuan as $data) {
                        
                     ?>
                      <tr class="<?php
                      if($data->kategori_pemberitahuan == 1){
                        echo "info";
                      }else if($data->kategori_pemberitahuan == 2){
                        echo "success";
                      }else {
                        echo "warning";
                      }
                       ?>">
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data->tgl_pemberitahuan ?></td>
                        <td>
                          <?php
                      if($data->kategori_pemberitahuan == 1){
                        echo "Selamat Anda Berhasil Melakukan Posting. Dengan Judul Post '".$data->judul."'. <a href=".base_url()."single/".$data->slug_pemberitahuan." target='_blank'> Lihat Post -></a>";
                      }else if($data->kategori_pemberitahuan == 2){
                        echo "Postingan Anda yang berjudul '".$data->judul."' Mendapatkan Like. <a href=".base_url()."single/".$data->slug_pemberitahuan." target='_blank'> Lihat Post -></a>";
                      }else {
                        echo "Postingan Anda yang berjudul '".$data->judul."' Mendapatkan Komentar. <a href=".base_url()."single/".$data->slug_pemberitahuan." target='_blank'> Lihat Post -></a>";
                      }
                       ?>
                        </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                  <div class="col-sm-12 pagination-wrap">
                   
                  </div>
            </div>
        </div>
      </div>
