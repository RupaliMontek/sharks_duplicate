<!DOCTYPE html>
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo base_url(); ?>frontend/css/mystyle.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>frontend/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>frontend/css/myresponsivestyle.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>frontend/css/hover.css">
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--<script src="<?php echo base_url(); ?>backend/plugins/jQuery/jQuery-2.1.4.min.js"></script>-->

<!--<link href = "<?php echo base_url(); ?>assets/css/jquery-ui.css" rel = "stylesheet"-->

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

<script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script> -->
<script src="<?php echo base_url(); ?>frontend/js/google-auth-script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>  

<!--...................shweta by Google analytics........-->

<!-- Google tag (gtag.js) --> 
<script async src="https://www.googletagmanager.com/gtag/js?id=G-HKV5DR10JQ"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-HKV5DR10JQ'); </script>



<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>frontend/images/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>frontend/images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>frontend/images/favicon-16x16.png">
<link rel="manifest" href="<?php echo base_url(); ?>frontend/images/site.webmanifest">

<title>SHARKS JOB Recruitment</title>
</head>
<body class="home page-template page-template-page-home page-template-page-home-php page page-id-1402 theme-nokri woocommerce-no-js wpb-js-composer js-comp-ver-6.8.0 vc_responsive">
<div class="container-fluid forheaderr">  
<div data-aos="zoom-in" class="container forheaderInn aos-init aos-animate">
<nav class="navbar navbar-expand-lg navbar-light">  
<a class="navbar-brand" href="<?php echo base_url(); ?>recruitment">
    <img width="140" height="auto" src="<?php echo base_url(); ?>frontend/images/logo.gif"/></a>

  <button style="display:none;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button> 
    
    <div class="right onmobilehide forFreeJobPostHeaderRight">
      <!-- <button type="button"  class="btn btn-success"><a href="<?php echo base_url(); ?>recruitment/create_account_candidate">Log In</a></button> -->
<!-- Button trigger modal -->
<!--<button type="button" class="btn btn-primary hvr-sweep-to-right" data-toggle="modal" data-target="#freejobpostlogin">
  Candidate Login
</button>-->
<!-- Modal -->
<div class="modal fade homeloginbuttonmodal" id="freejobpostlogin" tabindex="-1" role="dialog" aria-labelledby="freejobpostloginLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="freejobpostloginLabel">Log In</h5>
        <a class="registerfree" href="#">Register for free</a>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  <form action="" name="" id="" method="post">
  <div class="form-group">
    <label for="">Email ID / Username</label>
    <input type="email" class="form-control" name="" id="" aria-describedby="emailHelp" placeholder="Enter your active Email ID/Username">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group forshowbtn">
    <label for="">Password</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="Enter your Password">
    <a class="showbtn" href="#">Show</a>
    <a class="forgotPassword" href="#">Forgot Password?</a>
  </div>
  <div class="forformbottombtns">
  <button type="submit" class="btn btn-primary">Log In</button>
  </form>
  <a class="useOtp" href="#">Use OTP to Login</a>
  <span>------------------ Or ------------------ </span>

 <button id=""type="button" class="btn btn-primary signingoogle"><a href="">Sign In with Google</a></button>
</div>
<form class="getotpform">
  <div class="form-group">
    <label for="">Mobile Number</label>
  <input type="phone" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter your 10 digit mobile no.">
    <small id="emailHelp" class="form-text text-muted">You will receive an OTP on this number.</small>
  </div>  
  <div class="forformbottombtns">
  <button type="submit" class="btn btn-primary">Get OTP</button> 
</div>
</form>
      </div>    
    </div>
  </div>
</div>
<!--modal end here -->
     <!--<button type="button" class="header_register btn btn-danger hvr-sweep-to-right"><a href="<?php echo base_url(); ?>registration/candidate">Register</a></button>-->
      <button type="button" class="btn-link nav-item dropdown fremployers">
        <a class="btn btn-primary hvr-sweep-to-right nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Candidates
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" data-toggle="modal" data-target="#freejobpostlogin">Log In</a>
          <a class="dropdown-item" href="#">Resume Builder</a>
          <a class="dropdown-item" href="#">AI Interview Preparation</a>
          <a class="dropdown-item" href="#">Career Mentorship</a>
          <a class="dropdown-item" href="#">Apply A Job</a>
        </div>
      </button>
        <button type="button" class="btn-link nav-item dropdown fremployers">
        <a class="header_register btn btn-danger hvr-sweep-to-right nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Recruiters
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a href="<?php echo base_url("Job_post/recruiter_registration"); ?>" class="dropdown-item">Post a job</a>
          <!--<a class="dropdown-item" href="#">Buy online</a>-->
          <a class="dropdown-item" href="<?= base_url("Job_post/recruiter_login"); ?>">Recruiters Login</a>
        </div>
      </button>
    </div>
        
    
    <!-- right div end here --->
  </div>
</nav>
</div>
</div>
