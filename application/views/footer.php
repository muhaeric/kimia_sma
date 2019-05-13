  <div id="footer">
        <div class="container-fluid">
            <div class="col-sm-4 logo-footer-wrap">
                <img src="<?= base_url() ?>assets/img/logo-white.png" class="img-responsive"/>
            </div>
             <div  id="contact-us-wrap" class="col-sm-4">
                <h2 class="footer-text">
                    Kontak Kami
                </h2>
                 <p class="text-contact"><i class="glyphicon glyphicon-screenshot" style="margin-right:5px"></i>Jl. Marsda Adisucipto Yogyakarta</p>
                 <p class="text-contact"><i class="glyphicon glyphicon-earphone" style="margin-right:5px"></i><b>Phone:</b> +62-274-512474, +62-274-589621</p>
                 <p class="text-contact"><i class="glyphicon glyphicon-envelope" style="margin-right:5px"></i><b>Email:</b> pkim@uin-suka.ac.id</p>
            </div>
            <div class="col-sm-4">
                <h2 class="footer-text">
                    Maps
                </h2>
                <iframe style="border:1px solid white;border-radius:2px" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=Fakultas%20Sains%20dan%20Teknologi%20UIN%20Sunan%20Kalijaga+(My%20Business%20Name)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" width="100%" height="280" frameborder="0" style="border:0" allowfullscreen></iframe>
                <!-- <iframe width="100%" height="600" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=Fakultas%20Sains%20dan%20Teknologi%20UIN%20Sunan%20Kalijaga+(My%20Business%20Name)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/create-google-map/">Embed Google Map</a></iframe> -->
            </div>
        </div>
    </div>
    <div id="copyright">
        <div class="container-fluid">
            <p style="text-align:center;color:#6f4e4e;margin:0px"><a href="#" style="color:#6f4e4e;text-decoration:none">JustFriend Developer</a><b style="margin:0px 3px;">&copy;</b><?php print date('Y')?> - PKIM UIN SUNAN KALIJAGA YOGYAKARTA</p>
        </div>
    </div>
    <div class='scrolltop'>
        <div class='scroll icon'><i class="glyphicon glyphicon-eject"></i></div>
    </div>

<script type="text/javascript">
function savelike(id_blogs)
{
        $.ajax({
                type: "POST",
                url: "<?php echo site_url('Welcome/simpan_like');?>",
                data: "id_blogs="+id_blogs,
                success: function (response) {
                 $("#like").html(response+" Suka");
                  
                }
            });
}
</script>
  
     <script type="text/javascript">
  $(document).ready(function(){
    $('.data').DataTable({
      paging: true,
        searching: false,
          pageLength: 5,
        bLengthChange: false,
    });
  });
</script>
      </script>
      </body>
</html>
