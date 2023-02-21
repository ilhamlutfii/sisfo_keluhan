<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tugas Besar | Working Report</title>
  <link rel="stylesheet" href="<?=base_url('assets');?>/vendor/css/style.css">
  <link href='<?=base_url("assets/uploads/images/avatar.png"); ?>' rel='shortcut icon' type='image/x-icon' />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('assets');?>/vendor/AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet"
    href="<?=base_url('assets');?>/vendor/AdminLTE-3.0.5/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('assets');?>/vendor/AdminLTE-3.0.5/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../assets/vendor/css/style.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b></b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <?php
            if($this->session->flashdata('failed')){
        ?>
          <div class="alert alert-warning">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                  &times;
              </button>
              <i class="fa fa-times"></i>&nbsp;<?= $this->session->flashdata('failed'); ?>
          </div>
        <?php
            }
        ?>
        <p class="login-box-msg">Sign in to account</p>

        <form action="<?=base_url('login/aksi_login');?>" method="post">
          <div class="input-group mb-3">
            <input name="username" type="text" class="form-control" placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input name="password" type="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
            </div>
            <!-- /.col -->
            <div class="col-5">
              <button type="submit" class="button">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <!-- /.social-auth-links -->

        <!-- <p class="mb-1">
          <a href="forgot-password.html">I forgot my password</a>
        </p>
        <p class="mb-0">
          <a href="register.html" class="text-center">Register a new membership</a>
        </p> -->
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?=base_url('assets');?>/vendor/AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?=base_url('assets');?>/vendor/AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?=base_url('assets');?>/vendor/AdminLTE-3.0.5/dist/js/adminlte.min.js"></script>

</body>

</html>
