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
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--<script src="<?php echo base_url(); ?>backend/plugins/jQuery/jQuery-2.1.4.min.js"></script>-->
<link href = "<?php echo base_url(); ?>assets/css/jquery-ui.css" rel = "stylesheet">
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="https://msuite.work/frontend/css/hover.css">
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
<body class="innerpagesheadertemplate home page-template page-template-page-home page-template-page-home-php page page-id-1402 theme-nokri woocommerce-no-js wpb-js-composer js-comp-ver-6.8.0 vc_responsive">

	<div class="container-fluid forheaderr">
<div class="container mnuserhomepageNav">
      <nav class="navbar navbar-expand-lg navbar-light">
 
  <a class="navbar-brand" href="<?php echo base_url() ?>">
      <img width="140" height="auto" src="<?php echo base_url() ?>frontend/images/logo.gif"/>
      </a>
<span><?php echo @$user_details[0]->name; ?></span>
<!-- for responsive header start from here -->

  

<!-- for responsive header end from here -->

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
     <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Jobs <span class="sr-only">(current)</span></a>
        <div class="dropdown-menu formydropdown" aria-labelledby="navbarDropdown">
          <div class="dropdownsectionsOuter">
          <div class="dropdownsections"><h6>Popular categories</h6>
<a class="dropdown-item" href="#" title="IT jobs">IT jobs</a>
<a class="dropdown-item" href="#" title="Sales jobs">Sales jobs</a>
<a class="dropdown-item" href="#" title="Marketing jobs">Marketing jobs</a>
<a class="dropdown-item" href="#" title="Data Science jobs">Data Science jobs</a>
<a class="dropdown-item" href="#" title="HR jobs">HR jobs</a>
<a class="dropdown-item" href="#" title="Engineering jobs">Engineering jobs</a>
        </div>
        <div class="dropdownsections"><h6>Jobs In Demand</h6>
<a class="dropdown-item" href="#" title="Fresher jobs">Fresher jobs</a>
<a class="dropdown-item" href="#" title="Remote jobs">Remote jobs</a>
<a class="dropdown-item" href="#" title="Work from jobs">Work from jobs</a>
<a class="dropdown-item" href="#" title="Walk-in jobs">Walk-in jobs</a>
<a class="dropdown-item" href="#" title="Part-time jobs">Part-time jobs</a>
        </div>
        <div class="dropdownsections"><h6>Jobs By Location</h6>
<a class="dropdown-item" href="#" title="Jobs in Delhi"> Jobs in Delhi</a>
<a class="dropdown-item" href="#" title="Jobs in Mumbai">Jobs in Mumbai</a>
<a class="dropdown-item" href="#" title="Jobs in Bangalore">Jobs in Bangalore
</a>
<a class="dropdown-item" href="#" title="Jobs in Hyderabad">Jobs in Hyderabad</a>
<a class="dropdown-item" href="#" title="Jobs in Chennai">Jobs in Chennai</a>
<a class="dropdown-item" href="#" title="Jobs in Pune">Jobs in Pune</a>
        </div>
         <div class="dropdownsections"><h6>Explore More Jobs</h6>

<a class="dropdown-item" href="#" title="Jobs by category">Jobs by category</a>
<a class="dropdown-item" href="#" title="Jobs by skill">Jobs by skill</a>
<a class="dropdown-item" href="#" title="Jobs by location">Jobs by location</a>
<a class="dropdown-item" href="#" title="Jobs by designation">Jobs by designation</a>
<a class="dropdown-item" href="#" title="Create free job alert">Create free job alert</a>
        </div>
      </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Companies <span class="sr-only">(current)</span></a>
        <div class="dropdown-menu formydropdown_comp" aria-labelledby="navbarDropdown">
          <div class="dropdownsectionsOuter">
          <div class="dropdownsections"><h6>Explore categories</h6>
<a class="dropdown-item" href="#" title="Unicorn">Unicorn</a>
<a class="dropdown-item" href="#" title="MNC">MNC</a>
<a class="dropdown-item" href="#" title="Startup">Startup</a>
<a class="dropdown-item" href="#" title="Product based">Product based</a>
<a class="dropdown-item" href="#" title="Internet">Internet</a>
        </div>
        <div class="dropdownsections"><h6>Explore collections</h6>
<a class="dropdown-item" href="#" title="Top companies">Top companies</a>
<a class="dropdown-item" href="#" title="IT companies">IT companies</a>
<a class="dropdown-item" href="#" title="Fintech companies">Fintech companies</a>
<a class="dropdown-item" href="#" title="Sponsored companies">Sponsored companies</a>
<a class="dropdown-item" href="#" title="Featured companies">Featured companies</a>
        </div>
        <div class="dropdownsections"><h6>Research companies</h6>
<a class="dropdown-item" href="#" title="Interview questions">Interview questions</a>
<a class="dropdown-item" href="#" title="Company salaries">Company salaries</a>
<a class="dropdown-item" href="#" title="Company reviews">Company reviews</a>
<a class="dropdown-item" href="#" title="Salary Calculator">Salary Calculator</a>
        </div>
      </div>
      </li>
      <li class="nav-item">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services <span class="sr-only">(current)</span></a>
        <div class="dropdown-menu formydropdown_services" aria-labelledby="navbarDropdown">
          <div class="dropdownsectionsOuter">
          <div class="dropdownsections"><h6>Resume writing</h6>
<a class="dropdown-item" href="#" title="Text resume">Text resume</a>
<a class="dropdown-item" href="#" title="Resume critique">Resume critique</a>
<h6 class="forbottomMargin">Find Jobs</h6>
<a class="dropdown-item" href="#" title="Jobs4u">Jobs4u</a>
<a class="dropdown-item" href="#" title="Priority applicant">Priority applicant</a>
<a class="dropdown-item" href="#" title="Contact Us">Contact Us</a>
        </div>
        <div class="dropdownsections"><h6>Get recruiter's attention</h6>
<a class="dropdown-item" href="#" title="Resume display">Resume display</a>
<a class="dropdown-item" href="#" title="Job search booster">Job search booster</a>
<h6 class="forbottomMargin">Monthly subscriptions</h6>
<a class="dropdown-item" href="#" title="Basic & premium plans">Basic & premium plans</a>
        </div>
      </div>
      </li>
      </li> 
    </ul>
<?php if(!empty($user_details[0])) {?>
<div class="right mnuserhomeright">
  <ul>
    <li><a href="#"><i class="fa fa-bell-o"></i></a></li>
    <li><a type="button" class="" data-toggle="modal" data-target="#userProfile" href="#"><i class="fa fa-user-circle-o"></i></a>

<!-- Button trigger modal -->

<!-- Modal -->

<div class="modal fade" id="userProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="frprofile">
                <img src="<?php echo base_url("frontend/images/profilepic.svg"); ?>" width="70" height="auto">
                <div><h6><?php echo @$user_details[0]->name; ?></h6>
                <p><?php echo  @$last_employment->emp_current_desigantion ?> @ <?php echo @$last_employment->emp_current_company_name; ?></p>
                <a class="button btn-primary hvr-wobble-bottom" href="#">View & Update Profile</a></div>
            </div>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<h6>Profile performance<span>last updated date</span></h6>
<div class="profilePerformance">
<div class="performanceInn">
<div>
<a class="perfn" href="#">172<sup><i class="fa fa-circle"></i></sup></a>
<p>Search appearances</p>
<a class="hvr-wobble-bottom" href="#">View all</a>
</div>
<div>
  <a class="perfn" href="#">13<sup><i class="fa fa-circle"></i></sup></a>
  <p>Recruiter actions</p>
  <a class="hvr-wobble-bottom" href="#">View all</a>
</div>
</div>
</div>
<div class="line"></div>  
<ul class="userprofilepopup">
<li><a class="hvr-wobble-bottom" href="#"><i class="fa fa-list-ul"></i>SHARKS JOB Blog</a></li>
<li><a class="hvr-wobble-bottom" href="#"><i class="fa fa-gear"></i>Settings</a></li>
<li><a class="hvr-wobble-bottom" href="#"><i class="fa fa-question-circle-o"></i>FAQ's</a></li>
<li><a class="hvr-wobble-bottom" href="<?php echo base_url();?>Candidate_profile_login/logout"><i class="fa fa-sign-out"></i>logout</a></li>    
</ul>   

      </div>
    </div>
  </div>
</div>

</li>
  </ul>
</div>

<?php } ?>
<div class="fortopsearchform">  
   <button type="button" class="hvr-wobble-bottom" data-toggle="modal" data-target="#exampleModal"> <input class="form-control mr-sm-2" type="search" placeholder="" aria-label="Search">
    <a href="<?php echo base_url()?>recruitment/candidate_job_search_filter" class="searchIconn"><i class="fa fa-search"></i></a>

    <!-- Button trigger modal -->
</button>

<!-- Modal -->
<div class="modal fade homeloginbuttonmodal topsearchformpopup" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><a class="navbar-brand" href="#"><img width="140" height="auto" src="<?php echo base_url(); ?>frontend/images/logo.gif"/></a></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form action="<?php echo base_url(); ?>candidate_profile/search_job " method="post" enctype="multipart/form-data">

  <div class="form-group topsearchform">
<input class="form-control frskills" type="text" name="job-title" id="job-title" placeholder="Enter skills / designations / companies">
     <select class="form-control" id="experience" name="experience">
    <option value="">Select Experience</option>
  <?php
  $year = 30;
  for ($i = 0; $i <= $year; $i++) { ?>
      <option value="<?php echo $i; ?>">   <?php
if ($i == 0) {
    $text = "Fresher (less than 1 year)";
} elseif ($i == 1) {
    $text = $i . " year";
} else {
    $text = $i . " years";
}
echo $text;
?></option>
    <?php }
  ?>      
    </select>

<input class="form-control frlocation" type="text" id="job-location"   name="job-location" placeholder="Enter Location">
<button class="btn btn-primary my-2 my-sm-0 topsearchbtn hvr-wobble-bottom" type="submit">Submit</button>
</div>
</form>

      </div>
    
    </div>
  </div>
</div>
<!--modal end here -->


</div>

  </div>
</nav>
</div>
</div>
