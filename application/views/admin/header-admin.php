<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <!-- Ionicons -->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css">
     <link rel="stylesheet" href="<?= base_url() ?>assets/fontawesome/css/font-awesome.css">
   <!-- Morris chart -->
   <!-- bootstrap wysihtml5 - text editor -->
   <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
   
   <script src="<?= base_url() ?>assets/js/jque.js"></script>
   <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
<script src="//cdn.ckeditor.com/4.10.0/full/ckeditor.js"></script>
 
 <script src="<?php echo base_url() ?>assets/datatables/js/jquery.dataTables.min.js"></script>
  <link href="<?php echo base_url('assets/datatables/css/jquery.dataTables.min.css') ?>" rel="stylesheet">  
 
   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
.skin-blue .main-header .logo:hover {
  background-color: #3d0955
}
.skin-blue .main-header .navbar{
  background-color:#DEEF6B;
}
.skin-blue .main-header .logo{
  background-color: #A3DB35;  
}
.box.box-primary{
  border-top-color: #1A437F;  
}
.skin-blue .sidebar-menu > li.active > a{
  border-left-color:#CCCA29
}
.skin-blue .wrapper, .skin-blue .main-sidebar, .skin-blue .left-side{
  background-color: #DEEF6B;
}
.skin-blue .sidebar-menu > li:hover > a, .skin-blue .sidebar-menu > li.active > a, .skin-blue .sidebar-menu > li.menu-open > a{
  color: #fff;
  background-color: rgba(124, 190, 231, 0.9) !important;
}
.skin-blue .sidebar a{
  color: #fff;

  font-weight: bold
}
.skin-blue .sidebar-form input[type="text"], .skin-blue .sidebar-form .btn{
  background-color: #fff;
  border-color:#fff;
}
.skin-blue .sidebar-menu > li > .treeview-menu{
  background-color: #1A7F44;
}
</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>PKIM</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>PKIM</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
       
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
           
            <!-- Control Sidebar Toggle Button -->
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- search form -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree" style="margin-top:30px">
          <li class="treeview">
            <a href="<?= base_url('index.php/admin') ?>">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
          </li>
          <li class="treeview">
            <a href="<?= base_url('index.php/admin/allpost') ?>">
              <i class="fa fa-file-powerpoint-o"></i>
              <span>List Posts</span>
            </a>
          </li>
          <li class="treeview">
            <a href="<?= base_url('index.php/admin/kategoripost') ?>">
              <i class="fa fa-tags"></i>
              <span>Kategori Posts</span>
            </a>
          </li>
          <li class="treeview">
            <a href="<?= base_url('index.php/admin/allhalaman') ?>">
              <i class="fa fa-files-o" aria-hidden="true"></i>
              <span>Halaman Posts</span>
            </a>
          </li>
          <li class="treeview">
            <a href="<?= base_url('index.php/admin/tataletak') ?>">
              <i class="fa fa-sliders" aria-hidden="true"></i>
              <span>Tata Letak Posts</span>
            </a>
          </li>
           <li>
            <a href="<?= base_url('index.php/admin/mahasiswa') ?>">
              <i class="fa fa-user"></i> <span>Mahasiswa</span>
            </a>
          </li>
          <li><a href="<?php echo base_url('login/logout_admin') ?>"><i class="fa fa-sign-out" aria-hidden="true"></i><span>Logout</span></a></li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>