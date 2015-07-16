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

    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <h3>Welcome to Studiwidie</h3>
            <p>Studiwidie merupakan aplikasi tryout online yang dapat digunakan untuk mensimulasikan Ujian Nasional Online.
            </p>
            <p>Halaman ini merupakan portal, anda harus login sebelum menggunakan aplikasi kami.</p>
            <form class="m-t" role="form" action="index.html">
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                <a href="#"><small>Lupa password?</small></a>
                <p class="text-muted text-center"><small>Download Aplikasi</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.html">Mendaftarkan diri</a>
            </form>
            <p class="m-t"> <small>Studiwidie we app framework base on Cordova &copy; 2015</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

</body>

</html>
