
    
        <div id="wrap-admin-mhs-inner" class="container">
            <h2 id="selamat-mhs">Semua Post</h2>
            <div class="underscore" style="margin-left:0px;margin-right:0px"></div>
            <div class="col-sm-3">
                 <?php include_once('sidebar.php') ?>
            </div>
            <div class="col-sm-9">
                <div class="box" style="padding-bottom:10px;border:none;box-shadow:none;margin-top:0px">
                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="margin-bottom:15px;">
                          <a href="<?php echo base_url() ?>Pagemhs/addpostmhs">
                          <button type="button" class="btn btn-default" style="color:blue !important"><i class="glyphicon glyphicon-plus" style="margin-right:5px"></i>Tambah Post</button></a>
                        </div>
                    </div>  
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                      <table class="table table-striped table-bordered data">
                        <thead>
                        <tr style="background-color: #407DC2; color:white">
                          <th >No</th>
                          <th>Judul</th>
                          <th>Tanggal</th>
                          <th>Kategori</th>
                          <th>Like</th>
                          <th>Comment</th>
                          <th>Status</th>
                          <th style="width: 70px">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                           
                        <?php 
                         $no = 1;
                        foreach ($tampil_post_session as $data) {
                        ?>
                        <?php if($data->level == 1){

                        }else { ?>
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td><a href="<?php echo base_url() ?>single/<?php echo $data->slug ?>"><?php echo mb_substr($data->judul, 0, 100)."..." ?></a></td>
                          <td><?php echo $data->updated_at; ?></td>
                          <td><?php echo $data->nama ?></td>
                          <td><?php echo $data->suka ?> Like</td>
                          <td><?php echo $data->komentar ?> Comment</td>
                          <td><?php  
                          if(($data->status_blog) == '1'){
                            echo "Sudah Terposting";
                          }else{
                            echo "Masih Didraft";
                          } ?></td>
                          
                          <td>
                            <a href="<?php echo base_url() ?>Pagemhs/editpostmhs/<?php echo $data->idblog ?>">
                            <button type="button" class="btn btn-primary btn-edit"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></button>
                          </a>
                            <a href="#" data-toggle="modal" data-target="#modal<?php echo $data->idblog ?>">
                            <button type="button" class="btn btn-danger btn-hapus"><i class="glyphicon glyphicon-trash" aria-hidden="true"></i></button>
                          </a>
                          </td>
                        </tr>

                        <div class="modal fade" id="modal<?php echo $data->idblog ?>" tabindex="-1" role="dialog" 
                         aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <button type="button" class="close" 
                                       data-dismiss="modal">
                                           <span aria-hidden="true">&times;</span>
                                           <span class="sr-only">Close</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">
                                       Perhatian !!
                                    </h4>
                                </div>
                                <!-- Modal Body -->
                                <div class="modal-body">
                          <h3 class="panel-title"><h2>Yakin ingin dihapus coba pikirkan kembali</h2>      
                  <br/>     </div>
                                <!-- Modal Footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default"
                                            data-dismiss="modal">
                                              Batal
                                    </button>
                                    <a href="<?php echo base_url() ?>Pagemhs/delete/<?php echo $data->idblog ?>">
                                    <button type="button submit" class="btn btn-success">
                                        hapus
                                    </button>
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>

                  <?php } ?>
                      <?php } ?>
                      </tbody>
                        
                      </table>
                     
                    </div>
                    <!-- /.box-body -->
                  </div>
            </div>
        </div>
      

