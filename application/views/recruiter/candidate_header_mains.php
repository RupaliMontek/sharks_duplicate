<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/ubold/layouts/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 21 Sep 2022 07:17:45 GMT -->
<head>

    <meta charset="utf-8" />
    <title>SHARKS JOB Dashboard</title>
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.ico">

    <!-- Plugins css -->
    <link href="<?php echo base_url();?>assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style"/>
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url();?>assets/js/head.js"></script>
    
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>frontend/images/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>frontend/images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>frontend/images/favicon-16x16.png">
<link rel="manifest" href="<?php echo base_url(); ?>frontend/images/site.webmanifest">
</head>




<!--<link rel="stylesheet" href="<?php echo base_url();?>backend/bootstrap/css/bootstrap.min.css">-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>

<link rel="stylesheet" href="<?php echo base_url();?>backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--<script src="<?php echo base_url();?>backend/plugins/jQuery/jQuery-2.1.4.min.js"></script>-->

 <!--<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.js"></script>-->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
 <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>


<!--...................shweta by Google analytics........-->

<!-- Google tag (gtag.js) --> 
<script async src="https://www.googletagmanager.com/gtag/js?id=G-HKV5DR10JQ"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-HKV5DR10JQ'); </script>


<!-- body start -->
<body data-layout-mode="default" data-theme="light" data-layout-width="fluid" data-topbar-color="dark" data-menu-position="fixed" data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='false'>
 <?php if($this->session->flashdata('success') != '') {?>
	<script>
		toastr.success('<?php echo $this->session->flashdata('success'); ?>', 'Success Alert', {timeOut: 8000})
	</script>
<?php } ?>
<?php if($this->session->flashdata('error') != '') {?>
	<script>
		toastr.error('<?php echo $this->session->flashdata('error'); ?>', {timeOut: 8000})
	</script>
<?php } ?> 
    <div class="navbar-custom">
        <div class="container-fluid">
            <ul class="list-unstyled topnav-menu float-end mb-0">

                <li class="d-none d-lg-block">
                    <form class="app-search">
                        <div class="app-search-box dropdown">
                            <div class="input-group">
                                <input type="search" class="form-control" placeholder= "Search job here..." id="top-search">
                                <button class="btn input-group-text" type="submit">
                                    <i class="fe-search"></i>
                                </button>
                            </div>
                            <div class="dropdown-menu dropdown-lg" id="search-dropdown">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h5 class="text-overflow mb-2">Found 22 results</h5>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-home me-1"></i>
                                    <span>Analytics Report</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-aperture me-1"></i>
                                    <span>How can I help you?</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-settings me-1"></i>
                                    <span>User profile settings</span>
                                </a>

                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                                </div>

                                <div class="notification-list">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="d-flex align-items-start">
                                            <img class="d-flex me-2 rounded-circle" src="<?php echo base_url();?>assets/images/users/user-2.jpg" alt="Generic placeholder image" height="32">
                                            <div class="w-100">
                                                <h5 class="m-0 font-14">Erwin E. Brown</h5>
                                                <span class="font-12 mb-0">UI Designer</span>
                                            </div>
                                        </div>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="d-flex align-items-start">
                                            <img class="d-flex me-2 rounded-circle" src="<?php echo base_url();?>assets/images/users/user-5.jpg" alt="Generic placeholder image" height="32">
                                            <div class="w-100">
                                                <h5 class="m-0 font-14">Jacob Deo</h5>
                                                <span class="font-12 mb-0">Developer</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>  
                        </div>
                    </form>
                </li>

                <li class="dropdown d-inline-block d-lg-none">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fe-search noti-icon"></i>
                    </a>
                    <div class="dropdown-menu dropdown-lg dropdown-menu-end p-0">
                        <form class="p-3">
                            <input type="text" class="form-control" placeholder="Search job here ..." aria-label="Recipient's username">
                        </form>
                    </div>
                </li>

                <li class="dropdown d-none d-lg-inline-block">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen" href="#">
                        <i class="fe-maximize noti-icon"></i>
                    </a>
                </li>

                <li class="dropdown d-none d-lg-inline-block topbar-dropdown">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fe-grid noti-icon"></i>
                    </a>
                    <div class="dropdown-menu dropdown-lg dropdown-menu-end">

                        <div class="p-lg-1">
                            <div class="row g-0">
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#">
                                        <img src="<?php echo base_url();?>assets/images/brands/slack.png" alt="slack">
                                        <span>Slack</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#">
                                        <img src="<?php echo base_url();?>assets/images/brands/github.png" alt="Github">
                                        <span>GitHub</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#">
                                        <img src="<?php echo base_url();?>assets/images/brands/dribbble.png" alt="dribbble">
                                        <span>Dribbble</span>
                                    </a>
                                </div>
                            </div>

                            <div class="row g-0">
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#">
                                        <img src="<?php echo base_url();?>assets/images/brands/bitbucket.png" alt="bitbucket">
                                        <span>Bitbucket</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#">
                                        <img src="<?php echo base_url();?>assets/images/brands/dropbox.png" alt="dropbox">
                                        <span>Dropbox</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#">
                                        <img src="<?php echo base_url();?>assets/images/brands/g-suite.png" alt="G Suite">
                                        <span>G Suite</span>
                                    </a>
                                </div>

                            </div>
                        </div>

                    </div>
                </li>



                <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fa fa-bell" aria-hidden="true"></i>
                        <span class="badge bg-danger rounded-circle noti-icon-badge">9</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-lg">

                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="m-0">
                                <span class="float-end">
                                    <a href="#" class="text-dark">
                                        <small>Clear All</small>
                                    </a>
                                </span>Notification
                            </h5>
                        </div>

                        <div class="noti-scroll" data-simplebar>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                <div class="notify-icon">
                                    <img src="<?php echo base_url();?>assets/image/users/user-1.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                    <p class="notify-details">Cristina Pride</p>
                                    <p class="text-muted mb-0 user-msg">
                                        <small>Hi, How are you? What about our next meeting</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-primary">
                                        <i class="mdi mdi-comment-account-outline"></i>
                                    </div>
                                    <p class="notify-details">Caleb Flakelar commented on Admin
                                        <small class="text-muted">1 min ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon">
                                        <img src="<?php echo base_url();?>assets/images/users/user-4.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                        <p class="notify-details">Karen Robinson</p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small>Wow ! this admin looks good and awesome design</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-warning">
                                            <i class="mdi mdi-account-plus"></i>
                                        </div>
                                        <p class="notify-details">New user registered.
                                            <small class="text-muted">5 hours ago</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-info">
                                            <i class="mdi mdi-comment-account-outline"></i>
                                        </div>
                                        <p class="notify-details">Caleb Flakelar commented on Admin
                                            <small class="text-muted">4 days ago</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-secondary">
                                            <i class="mdi mdi-heart"></i>
                                        </div>
                                        <p class="notify-details">Carlos Crouch liked
                                            <b>Admin</b>
                                            <small class="text-muted">13 days ago</small>
                                        </p>
                                    </a>
                                </div>

                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                    View all
                                    <i class="fe-arrow-right"></i>
                                </a>

                            </div>
                        </li>

                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="<?php echo base_url();?><?php echo $user_details[0]->image; ?>"  class="rounded-circle">
                                <span class="pro-user-name ms-1">
                                    <?php echo($user_details[0]->candidate_name); ?> <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="<?php echo base_url();?>candidate_profile/view_profile" class="dropdown-item notify-item">
                                    <i class="fe-user"></i>
                                    <span>My Account</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-settings"></i>
                                    <span>View</span>
                                </a>

                                <!-- item-->
                                <a href="<?php echo base_url();?>candidate_profile/edit_profile" class="dropdown-item notify-item">
                                    <i class="fe-lock"></i>
                                    <span>Update Profile</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <!-- item-->
                                <a href="<?php echo base_url();?>Candidate_profile_login/logout " class="dropdown-item notify-item">
                                    <i class="fe-log-out"></i>
                                    <span>Logout</span>
                                </a>

                        </li>
<!-- 
<li class="dropdown notification-list">
<a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
<i class="fa fa-bell" aria-hidden="true"></i>
</a>
</li> -->

</ul>

<!-- LOGO -->
<div class="logo-box">
    <a href="index.html" class="logo logo-dark text-center">
        <span class="logo-sm">
            <img src="<?php echo base_url();?>assets/images/logo-sm.png" alt="" height="22">
            <!-- <span class="logo-lg-text-light">UBold</span> -->
        </span>
        <span class="logo-lg">
            <img src="<?php echo base_url();?>assets/images/logo-dark.png" alt="" height="20">
            <!-- <span class="logo-lg-text-light">U</span> -->
        </span>
    </a>

    <a href="index.html" class="logo logo-light text-center">
        <span class="logo-sm">
            <h1>SHARKS JOB</h1>
        </span>
<a href="<?php echo base_url();?>candidate_profile">
<span class="logo-lg">
 <h1>SHARKS JOB</h1>
</span>
</a>
</div>

<ul class="list-unstyled topnav-menu topnav-menu-left m-0">
<!--  <li>
<button class="button-menu-mobile waves-effect waves-light">
<i class="fe-menu"></i>
</button>
</li> -->

<li>
    <!-- Mobile menu toggle (Horizontal Layout)-->
    <a class="navbar-toggle nav-link" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
        <div class="lines">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </a>
    <!-- End mobile menu toggle-->
</li>   

<li class="dropdown d-none d-xl-block">
    <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
        Job
        <i class="fa fa-angle-down" aria-hidden="true"></i>
    </a>
    <div class="dropdown-menu">
        <!-- item-->
        <a href="javascript:void(0);" class="dropdown-item">
            <i class="fe-briefcase me-1"></i>
            <span>New Projects</span>
        </a>

        <!-- item-->
        <a href="javascript:void(0);" class="dropdown-item">
            <i class="fe-user me-1"></i>
            <span>Create Users</span>
        </a>

        <!-- item-->
        <a href="javascript:void(0);" class="dropdown-item">
            <i class="fe-bar-chart-line- me-1"></i>
            <span>Revenue Report</span>
        </a>

        <!-- item-->
        <a href="javascript:void(0);" class="dropdown-item">
            <i class="fe-settings me-1"></i>
            <span>Settings</span>
        </a>

        <div class="dropdown-divider"></div>

        <!-- item-->
        <a href="javascript:void(0);" class="dropdown-item">
            <i class="fe-headphones me-1"></i>
            <span>Help & Support</span>
        </a>

    </div>
</li>

<li class="dropdown dropdown-mega d-none d-xl-block">
    <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
        Companies
        <i class="fa fa-angle-down" aria-hidden="true"></i>
    </a>
    <div class="dropdown-menu dropdown-megamenu">
        <div class="row">
            <div class="col-sm-8">

                <div class="row">
                    <div class="col-md-4">
                        <h5 class="text-dark mt-0">UI Components</h5>
                        <ul class="list-unstyled megamenu-list">
                            <li>
                                <a href="javascript:void(0);">Widgets</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Nestable List</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Range Sliders</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Masonry Items</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Sweet Alerts</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Treeview Page</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Tour Page</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-4">
                        <h5 class="text-dark mt-0">Applications</h5>
                        <ul class="list-unstyled megamenu-list">
                            <li>
                                <a href="javascript:void(0);">eCommerce Pages</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">CRM Pages</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Email</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Calendar</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Team Contacts</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Task Board</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Email Templates</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-4">
                        <h5 class="text-dark mt-0">Extra Pages</h5>
                        <ul class="list-unstyled megamenu-list">
                            <li>
                                <a href="javascript:void(0);">Left Sidebar with User</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Menu Collapsed</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Small Left Sidebar</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">New Header Style</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Search Result</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Gallery Pages</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Maintenance & Coming Soon</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="text-center mt-3">
                    <h3 class="text-dark">Special Discount Sale!</h3>
                    <h4>Save up to 70% off.</h4>
                    <button class="btn btn-primary rounded-pill mt-3">Download Now</button>
                </div>
            </div>
        </div>

    </div>
</li>
<li class="dropdown d-none d-xl-block">
    <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
        Services
        <i class="fa fa-angle-down" aria-hidden="true"></i>
    </a>
    <div class="dropdown-menu">
        <!-- item-->
        <a href="javascript:void(0);" class="dropdown-item">
            <i class="fe-briefcase me-1"></i>
            <span>New Projects</span>
        </a>

        <!-- item-->
        <a href="javascript:void(0);" class="dropdown-item">
            <i class="fe-user me-1"></i>
            <span>Create Users</span>
        </a>

        <!-- item-->
        <a href="javascript:void(0);" class="dropdown-item">
            <i class="fe-bar-chart-line- me-1"></i>
            <span>Revenue Report</span>
        </a>

        <!-- item-->
        <a href="javascript:void(0);" class="dropdown-item">
            <i class="fe-settings me-1"></i>
            <span>Settings</span>
        </a>

        <div class="dropdown-divider"></div>

        <!-- item-->
        <a href="javascript:void(0);" class="dropdown-item">
            <i class="fe-headphones me-1"></i>
            <span>Help & Support</span>
        </a>

    </div>
</li>
</ul>
<div class="clearfix"></div>
</div>
</div>
