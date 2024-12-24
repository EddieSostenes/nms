<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Student | Training Management System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  
  <!-- Bootstrap Datepicker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  
  <!-- Theme Style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  
  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
  
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <!-- jQuery 3 -->
  <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- Mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>TMS</b></span>
      <!-- Logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Training Mgt System</b></span>
    </a>

    <!-- Navbar -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">0</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 0 notifications</li>
            </ul>
          </li>

          <!-- User Account -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url(); ?>assets/dist/img/mnh.png" class="user-image" alt="User Image">
              <span class="hidden-xs">Student</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url(); ?>assets/dist/img/mnh.png" class="img-square" alt="User Image">
                <p><b>Student:</b> <?php echo $this->session->userdata('full_name'); ?></p> <!-- Student name here -->
                </li>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
              <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url(); ?>logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- Left side column contains the logo and sidebar -->
  <aside class="main-sidebar">
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>assets/dist/img/mnh.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
        <p><?php echo $this->session->userdata('full_name'); ?></p> <!-- Student name here -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li class="active">
          <a href="<?php echo base_url(); ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <!-- Training Programs -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Supervisor</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i>Allocated Supervisor</a></li>
            </ul>
        </li>

        <!-- Training Programs -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-graduation-cap"></i> <span>Training Programs</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Browse Programs</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Enrolled Programs</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> View Progress</a></li>
          </ul>
        </li>

        <!-- Reports & Certificates -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-file-text"></i> <span>Reports & Certificates</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> View Reports</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Download Certificates</a></li>
          </ul>
        </li>

        <!-- Payment Information -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-credit-card"></i> <span>Payments</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> View Payment Status</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Download Receipts</a></li>
          </ul>
        </li>

        <!-- Activity Logs -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-tasks"></i> <span>Activity Logs</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> View Activity Logs</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Add Daily Activity</a></li>
          </ul>
        </li>

       

        <!-- Help Desk -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-life-ring"></i> <span>Help Desk</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li><a href="helpdesk/request"><i class="fa fa-circle-o"></i> Request For Help</a></li>
            <li><a href="helpdesk/status"><i class="fa fa-circle-o"></i> Current Request Status</a></li>
          </ul>
        </li>

        <!-- Logout -->
        <li>
          <a href="<?php echo base_url(); ?>logout">
            <i class="fa fa-sign-out"></i> <span>Logout</span>
          </a>
        </li>
      </ul>
    </section>
  </aside>
  
  <?php
    if ($this->session->userdata('usertype') != 3) { // Assuming usertype 3 is for student
      redirect('login');
    }
  ?>
