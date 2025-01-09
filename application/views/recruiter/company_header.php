<?php if ($this->session->flashdata('success')): ?>
    <script>
        $(document).ready(function() {
            toastr.success('<?php echo $this->session->flashdata('success'); ?>', 'Success');
        });
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
    <script>
        $(document).ready(function() {
            toastr.error('<?php echo $this->session->flashdata('error'); ?>', 'Error');
        });
    </script>
<?php endif; ?>
<!DOCTYPE html>
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php
if (isset($blogs_meta) && $blogs_meta && isset($is_blog_details_page) && $is_blog_details_page): ?>
    <meta charset="UTF-8">
    <meta name="meta_desc" content="<?= $blogs_meta->meta_desc; ?>">
    <meta name="meta_keyword" content="<?= $blogs_meta->meta_keyword; ?>">
    <meta name="meta_title" content="<?= $blogs_meta->meta_title; ?>">
    <meta name="meta_canonical_href" content="<?= $blogs_meta->meta_canonical_href; ?>">
<?php endif; ?>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- jQuery UI CSS -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

    <!-- Toastr CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>frontend/css/mystyle.css">
     <link rel="stylesheet" href="<?php echo base_url(); ?>frontend/css/myresponsivestyle.css"> 
    <link rel="stylesheet" href="<?php echo base_url(); ?>frontend/css/hover.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- jQuery Validation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-HKV5DR10JQ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-HKV5DR10JQ');
    </script>

    <!-- Google Platform -->
    <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>

    <!-- Favicons -->
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
<a class="navbar-brand" href="<?php echo base_url();?>"><img width="140" height="auto" src="<?php echo base_url(); ?>frontend/images/logo.gif"/></a>
<!--<div class="headermid_foronlymobile">  
<div class="right">
       <button type="button" class="btn btn-primary"><a href="<?php echo base_url(); ?>recruitment/allready_register_account_login_here">Log In</a></button> 

      <button type="button" class="header_register btn btn-danger"><a href="<?php echo base_url(); ?>recruitment/create_account_candidate">Register</a></button>
        <button type="button" class="btn-link nav-item dropdown fremployers">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          For employers
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Post a job</a>
          <a class="dropdown-item" href="#">Buy online</a>
          <a class="dropdown-item" href="#">Employer Login</a>
        </div>
      </button>
    </div>
</div>-->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>  
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url();?>recruitment/all_jobs">Jobs <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Companies</a>
      </li>
      <!--<li class="nav-item">
        <a class="nav-link" href="#">Services</a>
      </li>-->
      <li class="nav-item">
        <a class="nav-link" href="#">Interview Preparation</a>
      </li>
    </ul>
    <div class="right onmobilehide">
      <!-- <button type="button"  class="btn btn-success"><a href="<?php echo base_url(); ?>recruitment/create_account_candidate">Log In</a></button> -->
<!-- Button trigger modal -->
<!--<button type="button" class="btn btn-primary hvr-sweep-to-right" data-toggle="modal" data-target="#exampleModal">
  Log In
</button>-->
<!-- Modal -->
<div class="modal fade homeloginbuttonmodal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Log In</h5>
        <a class="registerfree" href="<?= base_url("registration/candidate"); ?>">Register for free</a>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  <form action="<?php echo base_url(); ?>Candidate_profile_login/check_user_login_check_candidate" name="candidate_login_heder" id="candidate_login_heder" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Email ID / Username</label>
    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter your active Email ID/Username">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group forshowbtn">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="Enter your Password">
    <a  id="showButton"class="showbtn" href="#">Show</a>
    <a class="forgotPassword" href="#">Forgot Password?</a>
  </div>
  <div class="forformbottombtns">
  <button type="submit" class="btn btn-primary">Log In</button>
  </form>
  <a class="useOtp" href="#"> Login via OTP</a>
  <form action="<?php echo base_url(); ?>Candidate_profile_login/check_user_login_by_otp_candidate"  method="post">
  <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email_id" id="email_id" class="form-control" placeholder="Enter your email">
                <button type="button" class="btn btn-primary" id="send_otp">Get OTP</button>
                <!--<button type="button" class="frSendOTP" id="send_otp" class="btn btn-primary">Send OTP</button>-->
            </div>
                <div class="form-group">
                <label for="otp">Enter OTP</label>
                <input type="text" name="otp" id="otp" class="form-control" placeholder="Enter OTP">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Login</button>
            </div> 
        </form>
  <span>------------------ Or ------------------ </span>

 <button  id="g-signin2"type="button" class="btn btn-primary signingoogle"><a href="<?php echo @$login_google; ?>">Sign In with Google</a>
 </button>
 <button  id="g-signin2"type="button" class="btn btn-primary signingoogle">
 <a class="link login" href="<?php echo @$login_linkedin; ?>"> <img
                src="linkedin-icon.png" /> Login with LinkedIn
            </a>
 </button>
</div>
<form class="getotpform" action="<?php echo base_url(); ?>Candidate_profile_login/check_user_login_by_mobile_otp_candidate"  method="post">
  <div class="form-group">
    <label for="mobile">Mobile Number</label>
  <input type="phone" class="form-control" id="mobile" name="mobile" aria-describedby="mobileHelp" placeholder="Enter your 10 digit mobile no.">
    <small id="emailHelp" class="form-text text-muted">You will receive an OTP on this number.</small>
  </div>  
  <div class="forformbottombtns">
  <button type="button" class="btn btn-primary" id="send_otp_to_mobile">Get OTP</button> 
</div>
<div class="form-group">
                <label for="otp">Enter OTP</label>
                <input type="text" name="otp" id="otp" class="form-control" placeholder="Enter OTP">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Login</button>
            </div> 
</form>
      </div>    
    </div>
  </div>
</div>
<!-- <form class="formShopSearch form-inline" id="searchForm"><br>
                <input class="form-control mr-sm-2" type="search" id="searchInput" placeholder="Search" aria-label="Search" required>
            </form> -->
<!--modal end here -->
      <!--<button type="button" class="header_register btn btn-danger hvr-sweep-to-right"><a href="<?php echo base_url(); ?>registration/candidate">Register</a></button>-->
        <button type="button" class="btn-link nav-item dropdown fremployers">
        <a class="header_register btn btn-danger hvr-sweep-to-right nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Recruiters
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a href="<?php echo base_url('job_post/index/' . $this->session->userdata('user_admin_id')); ?>" class="dropdown-item">Post a job</a>
          <!--<a class="dropdown-item" href="#">Buy online</a>-->
          <a class="dropdown-item" href="<?= base_url("Job_post/view_profile"); ?>">Profile</a>
        </div>
      </button>
    </div>
    <!-- right div end here --->
  </div>
</nav>
</div>

</div>
<script>
    // Send OTP button click event
    $('#send_otp').on('click', function() {
        var email_id = $('#email_id').val();
        var company_name = $('#company_name').val();
        
        if (email_id === "" || company_name === "") {
            alert("Please fill in your company name and email.");
            return;
        }
        
        $.ajax({
            url: '<?php echo base_url("job_post/send_otp"); ?>',
            type: "POST",
            data: { company_name: company_name, email_id: email_id },
            success: function(response) {
                var res = JSON.parse(response);
                if (res.success) {
                    alert("Please check your email for OTP.");
                } else {
                    alert(res.message || "Failed to send OTP.");
                }
            },
            error: function(error) {
                console.error("OTP request failed:", error);
                alert("Something went wrong while sending OTP. Please try again.");
            }
        });
    });
    </script>
    <script>
    $(document).ready(function() {
    $('#send_otp_to_mobile').click(function() {
        var mobile = $('#mobile').val();

        if(mobile.length == 10) { // Check if the mobile number is valid
            $.ajax({
                url: '<?php echo base_url(); ?>job_post/send_otp_to_mobile',
                type: 'POST',
                data: { mobile: mobile },
                success: function(response) {
                    if(response.success) {
                        alert('OTP sent to your mobile!');
                    } else {
                        alert('OTP Sent. Please check your mobile');
                    }
                }
            });
        } else {
            alert('Please enter a valid 10-digit mobile number.');
        }
    });
});

    </script>
<script>
$(document).ready(function() {
    $('#searchInput').on('keyup', function() {
        var value = $(this).val().toLowerCase();
        $('.jobCard').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});
</script>