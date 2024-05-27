<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIPARTAN</title>

    <!-- Favicons -->
    <link href="<?= base_url() ?>assets/frontend/assets/img/icon-web.png" rel="icon">
    <link href="<?= base_url() ?>assets/frontend/assets/img/icon-web.png" rel="apple-touch-icon">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/template/'); ?>plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/template/'); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/template/'); ?>dist/css/adminlte.min.css">


    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/sweetalert2/sweetalert2.min.css">
    <script src="<?= base_url('assets/template/plugins/sweetalert2/'); ?>sweetalert2.min.js"></script>
</head>
<div class="flashData" id="flashData" data-message="<?= $this->session->flashdata('message'); ?>" data-tittle="<?= $this->session->flashdata('tittle'); ?>" data-icon="<?= $this->session->flashdata('icon'); ?>"></div>


<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary" style="border-top: 3px solid #49548E;">
            <div class="card-header row">
                <div class="col-4">
                    <a href="<?= base_url() ?>" class="logo"><img src="<?= base_url() ?>assets/img/logo3.png" alt="" class="img-fluid"></a>
                </div>
                <div class="col-8">
                    <a href="<?= base_url('frontend'); ?>" class="h4"><b>Perumda Air Minum Tirto Panguripan Kendal</b></a>
                </div>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group mb-3">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo set_value('email'); ?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <?php echo form_error('email', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
                    </div>
                    <div class="form-group mb-3">
                        <div class="input-group">
                            <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo set_value('password'); ?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <?php echo form_error('password', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col">
                            <button type="submit" class="btn btn-block text-white" style="background-color: #49548E;">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- /.social-auth-links -->

                <p class="mb-0 mt-3">
                    <a href="<?= base_url('frontend/register'); ?>" class="text-center">Register a new membership</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url('assets/template/'); ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/template/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/template/'); ?>dist/js/adminlte.min.js"></script>

    <!-- MyScriptJS -->
    <script src="<?= base_url() ?>assets/myscript/script.js"></script>
</body>

</html>