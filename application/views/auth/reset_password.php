<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Reset Password | TRAINING MANAGEMENT SYSTEM</title>
  <!-- Responsive meta tag -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Training Management System</b></a>
  </div>

  <div class="login-box-body">
    <p class="login-box-msg">Reset your password</p>

    <!-- Display success/error messages -->
    <?php if ($this->session->flashdata('message')): ?>
      <div class="alert alert-info"><?php echo $this->session->flashdata('message'); ?></div>
    <?php endif; ?>

    <?php echo form_open('auth/reset_password/' . $token); ?>
      <div class="form-group has-feedback">
        <input type="password" name="new_password" class="form-control" placeholder="New Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="row">
        <div class="col-xs-4 pull-right">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Reset Password</button>
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
