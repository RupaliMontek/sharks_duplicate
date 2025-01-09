<!DOCTYPE html>
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo base_url(); ?>frontend/css/mystyle.css">
<!--<link rel="stylesheet" href="<?php echo base_url(); ?>frontend/css/font-awesome.min.css">-->
<link rel="stylesheet" href="<?php echo base_url(); ?>frontend/css/myresponsivestyle.css">

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="https://msuite.work/frontend/css/hover.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>frontend/images/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>frontend/images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>frontend/images/favicon-16x16.png">
<link rel="manifest" href="<?php echo base_url(); ?>frontend/images/site.webmanifest">
	 <title>SHARKS JOB Recruitment</title>
</head>
<body class="">
	<div class="container-fluid forheaderr">
<div class="container mnuserhomepageNav">
      <nav class="navbar navbar-expand-lg navbar-light">
 
  <a class="navbar-brand" href="<?php echo base_url() ?>">
      <img width="140" height="auto" src="<?php echo base_url() ?>frontend/images/logo.gif"/>
      </a>
<span><?php echo @$user_details[0]->name; ?></span>
<!-- for responsive header end from here -->

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
     <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url("/employer-dashboard"); ?>">Jobs</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url("/employer-candidate"); ?>">Candidates</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url("/employer-company"); ?>">Company</a>
      </li>
     
    </ul> 
<div class="fortopsearchform">  
   <button type="button" class="hvr-wobble-bottom"> <input class="form-control mr-sm-2" type="search" placeholder="" aria-label="Search">
    <i class="fa fa-search"></i>
  </button>
</div>
<div class="right mnuserhomeright">
  <ul>
      <li><a href="#" type="button" class="hvr-wobble-bottom"> 
    <i class="fa fa-envelope"></i>
  </a></li>
    <li><a class="hvr-wobble-bottom" href="#"><i class="fa fa-bell-o"></i></a></li>
    <li><a class="hvr-wobble-bottom" type="button" class="" data-toggle="modal" data-target="#EmployementProfile" href="#"><i class="fa fa-user-circle-o"></i></a>

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade employmentt" id="EmployementProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="frprofile">
                <img src="<?php echo base_url("frontend/images/profilepic.svg"); ?>" width="70" height="auto">
                <div><h6>Name</h6>
                    <p>Company Name</p>
            </div>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></div>
      </div>
      <div class="modal-body">
<ul class="userprofilepopup">
<li><a class="hvr-wobble-bottom" href="#"><i class="fa fa-gear"></i>Settings</a></li>
<li><a class="hvr-wobble-bottom" href="#"><i class="fa fa-question-circle-o"></i>Help</a></li>
<li><a class="hvr-wobble-bottom" href="#"><i class="fa fa-question-circle-o"></i>Add Company</a></li>
<li><a class="hvr-wobble-bottom" href="#"><i class="fa fa-sign-out"></i>logout</a></li>    
</ul>   

      </div>
    
  </div>
</div>
</div>
</li>
  </ul>
</div>
  </div>
</nav>
</div>
</div>
<!-- header part closed here -->