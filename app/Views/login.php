<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>P-PDAM | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/dist/css/AdminLTE.min.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <link href="<?= base_url() ?>/assets/webcam/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/webcam/css/style.css" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?= base_url() ?>"><b>Pengaduan</b>PDAM</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Masukkan Username & Password </p>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('pesan') ?>
                </div>
            <?php endif ?>
            <form action="<?= site_url('/auth/login') ?>" method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Username" name="username">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
    <div class="container" id="QR-Code">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="navbar-form navbar-left">
                    <h4>WebCodeCamJS.js Demonstration</h4>
                </div>
                <div class="navbar-form navbar-right">
                    <select class="form-control" id="camera-select"></select>
                    <div class="form-group">
                        <input id="image-url" type="text" class="form-control" placeholder="Image url">
                        <button title="Decode Image" class="btn btn-default btn-sm" id="decode-img" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-upload"></span></button>
                        <button title="Image shoot" class="btn btn-info btn-sm disabled" id="grab-img" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-picture"></span></button>
                        <button title="Play" class="btn btn-success btn-sm" id="play" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-play"></span></button>
                        <button title="Pause" class="btn btn-warning btn-sm" id="pause" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-pause"></span></button>
                        <button title="Stop streams" class="btn btn-danger btn-sm" id="stop" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-stop"></span></button>
                    </div>
                </div>
            </div>
            <div class="panel-body text-center">
                <div class="col-md-6">
                    <div class="well" style="position: relative;display: inline-block;">
                        <canvas width="320" height="240" id="webcodecam-canvas"></canvas>
                        <div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>
                        <div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>
                        <div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>
                        <div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="thumbnail" id="result">
                        <div class="well" style="overflow: hidden;">
                            <img width="320" height="240" id="scanned-img" src="">
                        </div>
                        <div class="caption">
                            <h3>Scanned result</h3>
                            <p id="scanned-QR"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="<?= base_url() ?>/assets/webcam/js/filereader.js"></script>
        <!-- Using jquery version: -->
        <!--
            <script type="text/javascript" src="<?= base_url() ?>/assets/webcam/js/jquery.js"></script>
            <script type="text/javascript" src="<?= base_url() ?>/assets/webcam/js/qrcodelib.js"></script>
            <script type="text/javascript" src="<?= base_url() ?>/assets/webcam/js/webcodecamjquery.js"></script>
            <script type="text/javascript" src="<?= base_url() ?>/assets/webcam/js/mainjquery.js"></script>
        -->
        <script type="text/javascript" src="<?= base_url() ?>/assets/webcam/js/qrcodelib.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>/assets/webcam/js/webcodecamjs.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>/assets/webcam/js/main.js"></script>
        <!-- jQuery 3 -->
        <script src="<?= base_url() ?>/assets/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?= base_url() ?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>