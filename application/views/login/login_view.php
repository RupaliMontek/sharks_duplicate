<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Sharks Job</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>frontend/images/favicon.png">
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url();?>backend/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>backend/bootstrap/css/style.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url();?>backend/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?php echo base_url();?>backend/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url();?>backend/dist/css/style.css"> 
   <link rel="stylesheet" href="<?php echo base_url();?>backend/dist/css/comman_style.css"> 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
      <div class="login-page" >
      <div class="overlyblck-p ">
    <div class="login-box">
      <div class="login-logo">
      <img src="<?=base_url('frontend/images/brandperl_logo1.png')?>" class="" alt="logo">
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form role="form" action="<?php echo base_url();?>login/check_login" method="POST" id="login_form" name="login_form">
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo set_value('email'); ?>"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <span class="fm-error"><?php echo form_error('email');?></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo set_value('password'); ?>"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <span class="fm-error"><?php echo form_error('password');?></span>

          </div>
          <div class="row">
            <div class="col-xs-8">
              <!-- <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div> -->
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat btn_sign">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>
        <div class="social-auth-links text-center">
         <!-- <p>- OR -</p>-->
        <!--<a href="<?php echo base_url();?>User_control/forgot_pass">I forgot my password</a><br>
        <a href="<?php echo base_url();?>User_control/register" class="text-center">Register a new membership</a>-->
      </div><!-- /.login-box-body -->
      </div><!-- /.login-box -->
      </div>
    </div>
    <!-- jQuery 2.1.4 -->
   <script src="<?php echo base_url();?>backend/plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url();?>backend/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url();?>backend/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>backend/plugins/jQueryUI/jquery.validate.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>backend/baseurl.js"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url();?>backend/validation_js/login.js"></script> -->
     <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
    
 </body>
 </html>