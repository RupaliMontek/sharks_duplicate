<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title> Nisarg Nirmiti | Dashboard</title>
    meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo base_url();?>backend/bootstrap/css/bootstrap.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url();?>backend/plugins/datatables/dataTables.bootstrap.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/3.2.6/css/fixedColumns.dataTables.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>backend/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>backend/dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>backend/plugins/iCheck/flat/blue.css">
        <link rel="stylesheet" href="<?php echo base_url();?>backend/plugins/morris/morris.css">
        <link rel="stylesheet" href="<?php echo base_url();?>backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <link rel="stylesheet" href="<?php echo base_url();?>backend/plugins/datepicker/datepicker3.css">
        <link rel="stylesheet" href="<?php echo base_url();?>backend/plugins/daterangepicker/daterangepicker-bs3.css">
        <link href="<?php echo base_url();?>backend/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>frontend/css/comman_style.css">
        <link rel="stylesheet" href="<?php echo base_url();?>backend/dist/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url();?>backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
        <script src="<?php echo base_url();?>backend/ckeditor/ckeditor.js"></script>
        <script src="<?php echo base_url();?>backend/webcamjs/webcam.min.js"></script>
        <link href="<?php echo base_url();?>backend/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
        <link href='<?php echo base_url();?>assets/css/fullcalendar.css' rel='stylesheet' />
        <link href="<?php echo base_url();?>assets/css/bootstrapValidator.min.css" rel="stylesheet" />        
        <link href="<?php echo base_url();?>assets/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo base_url();?>frontend/css/font-awesome.css">
        
        
        <link href="<?php echo base_url();?>frontend/select2/select2.min.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>frontend/select2/select2-bootstrap.css" rel="stylesheet" />


    <!-- list page -->
    <script src="<?php echo base_url();?>backend/admin/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>backend/admin/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>

    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

    <script src="<?php echo base_url();?>backend/admin/plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url();?>backend/admin/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="<?php echo base_url();?>backend/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>backend/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url();?>backend/admin/plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>

<!--...................shweta by Google analytics........-->

<!-- Google tag (gtag.js) --> 
<script async src="https://www.googletagmanager.com/gtag/js?id=G-HKV5DR10JQ"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-HKV5DR10JQ'); </script>



    <script src="<?php echo base_url();?>backend/admin/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url();?>backend/admin/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo base_url();?>backend/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="<?php echo base_url();?>backend/admin/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url();?>backend/admin/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>backend/admin/dist/js/app.min.js" type="text/javascript"></script>
    <!-- <script src="<?php echo base_url();?>backend/admin/dist/js/pages/dashboard.js" type="text/javascript"></script> -->
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url();?>backend/admin/dist/js/demo.js" type="text/javascript"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js"></script>
<script src="<?php echo base_url();?>backend/ckeditor/ckeditor.js"></script>

    <!-- js for validation--> 
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
    <script src="<?php echo base_url();?>backend/admin/custom_js/user.js"></script>
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url();?>admin" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Nisarg Nirmiti</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Nisarg Nirmiti</b></span>
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
             zz
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- <img src="<?php echo base_url().$image; ?>" class="user-image" alt="User Image" /> -->
                  <span class="hidden-xs"><?php 
                  if($this->session->userdata('user_name')!=''){
                    echo ucfirst($this->session->userdata('user_name'));
                  }
                  ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url().'frontend/images/'.$image; ?>"  alt="User Image" />
                    <p>
                      <?php 
                      if($this->session->userdata('user_name')!=''){
                        echo ucfirst($this->session->userdata('user_name'))." - Admin";
                      }
                      ?>
                      <!-- <small>Member since June. 2019</small> -->
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!-- <li class="user-body">
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
                    
                    <div class="">
                     <center><a href="<?php echo base_url();?>Candidate_profile_login/logout" class="btn btn-default btn-flat">Sign out</a></center> 
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <!-- <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li> -->
            </ul>
          </div>
        </nav>
      </header>