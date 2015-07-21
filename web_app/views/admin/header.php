<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Studiwidie | Administrator</title>

    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

    <?php if ($use_table == true) { ?>
    <!-- Data Tables -->
    <link href="<?php echo base_url(); ?>assets/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">    
    <?php } 
    if ($use_editor == true) { ?>
    <link href="<?php echo base_url(); ?>assets/css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
    <?php } ?>
    
</head>

<body>

    <div id="wrapper">

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                                    <span class="block m-t-xs"> <strong class="font-bold"><?php echo $this->session->userdata('nama'); ?></strong>
                                    </span>
                                    <span class="text-muted text-xs block">Administrator <b class="caret"></b>
                                    </span>
                                </span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="<?php echo site_url('home/logout'); ?>">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            SW
                        </div>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin'); ?>"><i class="fa fa-th-large"></i> <span class="nav-label">Home</span></a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/mapel'); ?>"><i class="fa fa-university"></i> <span class="nav-label">Mata Pelajaran</span></a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/soal'); ?>"><i class="fa fa-pencil"></i> <span class="nav-label">Soal</span></a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/learning'); ?>"><i class="fa fa-graduation-cap"></i> <span class="nav-label">Learning</span></a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/tryouts'); ?>"><i class="fa fa-desktop"></i> <span class="nav-label">Tryouts History</span></a>
                    </li>
                    <li>
                        <a href="mailbox.html"><i class="fa fa-users"></i> <span class="nav-label">Users </span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo site_url('admin/administrator'); ?>">Administrator</a></li>
                            <li><a href="<?php echo site_url('admin/siswa'); ?>">Siswa</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary" href="#"><i class="fa fa-bars"></i> </a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <a href="<?php echo site_url('home/logout'); ?>">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>

