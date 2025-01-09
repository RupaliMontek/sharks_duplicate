<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Sharks Job | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="<?php echo base_url();?>backend/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>backend/bootstrap/css/style.css">
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
      <link rel="stylesheet" href="<?php echo base_url();?>backend/plugins/datatables/dataTables.bootstrap.css">
    <!-- <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" /> -->
    <link rel="stylesheet" href="<?php echo base_url();?>backend/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <!-- <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" /> -->
    <link rel="stylesheet" href="<?php echo base_url();?>backend/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
<!--     <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" /> -->
    <link rel="stylesheet" href="<?php echo base_url();?>backend/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <!-- <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" /> -->
    <link rel="stylesheet" href="<?php echo base_url();?>backend/plugins/morris/morris.css">
    <!-- jvectormap -->
<!--     <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />-->
    <link rel="stylesheet" href="<?php echo base_url();?>backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <!-- <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" /> -->
    <link rel="stylesheet" href="<?php echo base_url();?>backend/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <!-- <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" /> -->
    <link rel="stylesheet" href="<?php echo base_url();?>backend/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <!-- <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" /> -->
    <link rel="stylesheet" href="<?php echo base_url();?>backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>backend/dist/css/style.css"> 
   <link rel="stylesheet" href="<?php echo base_url();?>backend/dist/css/comman_style.css"> 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

   <link href="<?php echo base_url();?>frontend/css/select2/select2.min.css" rel="stylesheet" />
<link href="<?php echo base_url();?>frontend/css/select2/select2-bootstrap.css" rel="stylesheet" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
<script type="text/javascript" src="<?php echo base_url();?>frontend/js/select2/select2.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--...................shweta by Google analytics........-->

<!-- Google tag (gtag.js) --> 
<script async src="https://www.googletagmanager.com/gtag/js?id=G-HKV5DR10JQ"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-HKV5DR10JQ'); </script>



  </head>
  <body class="skin-blue sidebar-mini">
    <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>">
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <!-- <a href="index2.html" class="logo"> -->
        <a href="<?php echo base_url(); ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><img src="<?=base_url('frontend/images/brandperl_logo1.png')?>" class="" alt="logo"></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><img src="<?=base_url('frontend/images/brandperl_logo1.png')?>" class="" alt="logo"></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <!-- Notifications: style can be found in dropdown.less -->
              <!-- Tasks: style can be found in dropdown.less -->
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image" /> -->
                      <img src="<?php echo base_url();?>backend/dist/img/user2-160x160.jpg" class="user-image" alt="User Image" />
                  <span class="hidden-xs"><?php 
                  if($this->session->userdata('user_name')!=''){
                    echo ucfirst($this->session->userdata('user_name'));
                  }
                  ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url();?>backend/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                    <p>
                      <?php 
                  if($this->session->userdata('user_name')!='' ){

                    echo ucfirst($this->session->userdata('user_name')).' - ';
                    if($this->session->userdata('user_role')!=''){
                      if($this->session->userdata('user_role')==1){
                        echo 'Super Admin';
                      }if($this->session->userdata('user_role')==2){
                        echo 'Admin';
                      }if($this->session->userdata('user_role')==3){
                        echo 'Content Reviewer';
                      }if($this->session->userdata('user_role')==4){
                        echo 'Review Writer';
                      }if($this->session->userdata('user_role')==5){
                        echo 'Review Reader';
                      }if($this->session->userdata('user_role')==6){
                        echo 'Intern';
                      }
                    }
                  }
                  ?>
                      <!-- <small>Member since Nov. 2012</small> -->
                    </p>
                  </li>
                  <!-- Menu Body -->
                 <!--  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li> -->
                  <!-- Menu Footer-->
                  <?php
                      $login_id = $this->session->userdata('user_id');
                  ?>
                  <li class="user-footer">

                      <?php
                        if($this->session->userdata('user_role')==6)
                        {
                          ?>
                            <div class="pull-left" style="display: none;">
                      <a href="<?php echo base_url(); ?>login/profile/<?php echo $login_id ;?>" class="btn btn-default btn-flat">Profile</a>
                    </div>
                          <?php
                        }
                        else
                        {
                          ?>
                            <div class="pull-left">
                      <a href="<?php echo base_url(); ?>login/profile/<?php echo $login_id ;?>" class="btn btn-default btn-flat">Profile</a>
                    </div>
                          <?php
                        }
                      ?>
                    
                    <div class="pull-right">
                      <a href="<?php echo base_url();?>login/logout" class="btn btn-default btn-flat">Sign Out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
            </ul>
          </div>
        </nav>
      </header>