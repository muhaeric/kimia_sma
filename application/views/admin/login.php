<!DOCTYPE html>
<html>
<head>
	<title>Admin | Login</title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/login.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/style.css'; ?>">
  
 <!--<link rel="icon" type="image/png" sizes="16x16" href="http://puspidep.org//Assets/images/favicon.ico">
!-->

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="login-page" >
  <div class="form" style="padding-bottom: 10px;">
  	<div class="col-md-12" style="margin:0px;"><img src="<?php echo base_url().'assets/img/logo.png'; ?>" width="40px"></div>
  	<div class="col-md-12" style="margin-top: 10px; "><b>PKIM</b></div>

  	<div class="col-md-12" style="margin-top: 10px"><p style="">Selamat Datang, Silakan Login</p></div>
<?php echo form_open('Login/aksi_login_admin'); ?>
    <form class="login-form" action="#" method="post">
      <input type="text" name="username" placeholder="username" required autofocus>
      <input type="password" name="password" placeholder="password" required autofocus>
      <button type="submit" value="Login">login</button>
   
   <?php @$id = $_GET['login']; 

      echo "<p style='color:#e74c3c; font-size:15px'><b>".$id."</b></p>";  ?>
      <p class="message" style="padding-top: 20px;">
      	 © 2018 <strong>Bagian Pengembang Pkim UIN sunan kalijaga.

      </p>
    </form>
  </div>

</div>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="<?php echo base_url().'assets/js/login.js'; ?>"></script>

</body>
</html>