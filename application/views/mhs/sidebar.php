 <h4 class="menu-mhs-admin-text"><a href="<?php echo base_url() ?>Pagemhs/Pemberitahuanmhs"><i class="glyphicon glyphicon-bullhorn" style="margin-right:5px"></i>Pemberitahuan

<?php $hasil=$mantap;
if(!$hasil == 0){
	?>
<span class="badge" style="background-color:rgb(57, 206, 185);margin-left:5px;"><?php echo $mantap; ?></span>
<?php
}else{
	echo "";
} ?>
</a></h4>
 <h4 class="menu-mhs-admin-text"><a href="<?php echo base_url() ?>Pagemhs/allpostmhs"><i class="glyphicon glyphicon-file" style="margin-right:5px"></i>Post</a></h4>
 <h4 class="menu-mhs-admin-text"><a data-toggle="modal" data-target="#modaltok" href="#"><i class="glyphicon glyphicon-log-out" style="margin-right:5px"></i>Logout</a></h4>
   <div class="modal fade" id="modaltok" tabindex="-1" role="dialog" 
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
                          <h3 class="panel-title"><center><h2>Yakin ingin Keluar</h2></center>      
                  <br/>     </div>
                                <!-- Modal Footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default"
                                            data-dismiss="modal">
                                              Batal
                                    </button>
                                    <a href="<?php echo base_url() ?>Login/logout">
                                    <button type="button submit" class="btn btn-success">
                                        Keluar
                                    </button>
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
