<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Forgot Password | TRAINING MANAGEMENT SYSTEM</title>
  <!-- Responsive meta tag -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="<?php echo base_url(); ?>assets/images/mnh.png" alt="MN Hospital Logo"><br>
    <a href="#"><b>Training Management System</b></a>
  </div>

  <div class="login-box-body">
    <p class="login-box-msg">Enter your email to reset your password</p>

    <!-- Display success/error messages -->
    <?php if ($this->session->flashdata('message')): ?>
      <div class="alert alert-info"><?php echo $this->session->flashdata('message'); ?></div>
    <?php endif; ?>

    <?php echo form_open('auth/forgot_password'); ?>
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-6 pull-right">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Send Reset Link</button>
        </div>
        <div class="row">
      <div class="col-xs-6">
      <a href="<?php echo base_url('auth/login'); ?>" class="text-center">Login Page</a>

      </div>
      
    </div>
      </div>
    </form>
  </div>
</div>

<!-- jQuery and Bootstrap JS -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>
