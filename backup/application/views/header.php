<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>STUDIWIDIE - Administrator</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo site_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo site_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>assets/lineicons/style.css">
    
    <!-- Custom styles for this template -->
    <link href="<?php echo site_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo site_url(); ?>assets/css/style-responsive.css" rel="stylesheet">

    <script src="<?php echo site_url(); ?>assets/js/chart-master/Chart.js"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="<?php echo site_url(); ?>" class="logo"><b>ADMINISTRATOR</b></a>
            <!--logo end-->
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="<?php echo site_url("admin/logout"); ?>">Logout</a></li>
                </ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                    
                  <li class="mt">
                      <a href="<?php echo site_url("admin"); ?>">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Mata Pelajaran</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo site_url("admin/mapel"); ?>">Lihat Data</a></li>
                          <li><a  href="<?php echo site_url("admin/mapel/add"); ?>">Tambah</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Learning</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo site_url("admin/learning"); ?>">Lihat Data</a></li>
                          <li><a  href="<?php echo site_url("admin/learning/add"); ?>">Tambah</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Soal</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo site_url("admin/soal"); ?>">Lihat Data</a></li>
                          <li><a  href="<?php echo site_url("admin/soal/add"); ?>">Tambah</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-user"></i>
                          <span>Users</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo site_url("admin/user"); ?>">Lihat Data</a></li>
                      </ul>
                  </li>
                  
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-user"></i>
                          <span>Administrators</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo site_url("admin/administrator"); ?>">Lihat Data</a></li>
                          <li><a  href="<?php echo site_url("admin/administrator/add"); ?>">Tambah</a></li>
                      </ul>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->