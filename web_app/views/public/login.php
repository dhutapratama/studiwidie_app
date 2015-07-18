<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Studiwidie | Login</title>

    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">Studiwidie Apps Tryout Online</h2>

                <p>
                    Studiwidie merupakan aplikasi tryout online yang dapat digunakan untuk mensimulasikan Ujian Nasional Online.
                </p>

                <p>
                    Anda harus login sebelum menggunakan aplikasi web Studiwidie.
                </p>

                <p>
                    Anda dapat mengunduh aplikasi Studiwidie disini <a href="#">UNDUH APLIKASI</a>
                </p>

                <p>
                    <small>Studiwidie merupakan aplikasi opensource, anda juga dapat berkontribusi dengan kami dengan mengirimkan email ke admin@studiwidie.com.</small>
                </p>

            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    <?php if ($this->session->flashdata('message') != '') { ?>
                    <div class="alert alert-<?php echo $this->session->flashdata('message_type'); ?>">
                        <?php echo $this->session->flashdata('message'); ?>
                    </div>
                    <?php } ?>
                    <form class="m-t" role="form" action="<?php echo site_url('home/login'); ?>" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Username" required="" name="username">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" required="" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                        <a href="#">
                            <small>Lupa password?</small>
                        </a>

                        <p class="text-muted text-center">
                            <small>Belum memiliki akun?</small>
                        </p>
                        <a class="btn btn-sm btn-white btn-block" href="register.html">Registrasi akun</a>
                    </form>
                    <p class="m-t">
                        <small>Studiwidie we app framework base on Cordova &copy; 2015</small>
                    </p>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Copyright Studiwidie Apps.
            </div>
            <div class="col-md-6 text-right">
               <small>© 2015</small>
            </div>
        </div>
    </div>

</body>

</html>
