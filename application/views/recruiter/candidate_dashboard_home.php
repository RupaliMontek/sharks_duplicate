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
<link href="<?php echo base_url() ?>frontend/owlCarousel/css/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>frontend/owlCarousel/css/icofont.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>frontend/owlCarousel/css/forcarouselStyle.css">
<script src="<?php echo base_url() ?>frontend/owlCarousel/owl.carousel.min.js"></script>
<script src="<?php echo base_url() ?>frontend/owlCarousel/carausol_slider.js"></script> 

<div class="container-fluid fortopbanner">  
<div class="container topbannerinn">
<h1>Land your dream job with AI</h1>
<h6>25000+ jobs for you find here</h6>
</div>
<div class="belowformlinks belowformlinks container p-0">
<a href="#" class="badge badge-primary hvr-wobble-bottom">AI</a>
<a href="#" class="badge badge-warning hvr-wobble-bottom">Python</a>
<a href="#" class="badge badge-success hvr-wobble-bottom">Data Scientist</a>
<a href="#" class="badge badge-info hvr-wobble-bottom">NLP</a>
</div>
    <div class="container mobilewidh100 p-0">
<form action="<?php echo base_url();?>candidate_profile/search_job " method="post" enctype="multipart/form-data">

  <div class="form-group topsearchform">
<input class="form-control frskills" type="text" name="job-title" id="job-title" placeholder="Enter skills / designations / companies">
    <select class="form-control" id="experience" name="experience">
    <option value="">Select Experience</option>
  <?php $year=30;  for($i=0; $i<=$year; $i++) {?>
      <option value="<?php echo $i ?>">   <?php  if($i==0) { $text= "Fresher (less than 1 year)"; } else if ($i==1){ $text=$i." year"; } else{ $text = $i." years";}  echo $text ?></option>
    <?php } ?>      
    </select>

<input class="form-control frlocation" type="text" id="job-location"  name="job-location" placeholder="Enter Location">

<input class="form-control frlocation ui-autocomplete-input" type="hidden" id="joblocationid"  name="joblocationid" >

<input class="form-control frlocation" type="text" id="pin_code"  name="pin_code" placeholder="Enter Pincode">

<button class="btn btn-primary my-2 my-sm-0 topsearchbtn hvr-wobble-bottom" type="submit">Search Jobs</button>
</div>
</form>

    </div>

<div class="container bannerlastsection">
    <div class="row ">
      <div class="col-lg-12 col-sm-12 float-left">
        <h4>Let Employers Find You</h4>
<h6>Thousands of employers search for candidates on SHARKS JOB</h6>
      </div>
      
</div>
</div>
</div>

<div class="container-fluid">
    <div class="container jobscategories">
<a href="<?php echo base_url();?>recruitment/all_jobs" class="badge hvr-wobble-bottom">Remote</a>
<!-- <a href="<?php echo base_url('candidate_profile/search_job?skills=HR') ?>" class="badge hvr-wobble-bottom">MNC</a> -->
<!-- <a href="<?php echo base_url('candidate_profile/search_job?skills=HR') ?>" class="badge hvr-wobble-bottom">Fortune 500</a> -->
<a href="<?php echo base_url('candidate_profile/search_job?skills=Data Science') ?>" class="badge hvr-wobble-bottom">Data Science</a>
<!-- <a href="<?php echo base_url('candidate_profile/search_job?search=work from home') ?>" class="badge hvr-wobble-bottom">Temp WFH</a> -->
<!-- <a href="<?php echo base_url('candidate_profile/search_job?skills=Supply Chain') ?>" class="badge hvr-wobble-bottom">Supply Chain</a> -->
<a href="<?php echo base_url('candidate_profile/search_job?skills=Marketing') ?>" class="badge hvr-wobble-bottom">Marketing</a>
<a href="<?php echo base_url('candidate_profile/search_job?skills=Company Secretary') ?>" class="badge hvr-wobble-bottom">CS</a>
<a href="<?php echo base_url('candidate_profile/search_job?skills=Sales') ?>" class="badge hvr-wobble-bottom">Sales</a>
<a href="<?php echo base_url('candidate_profile/search_job?skills=HR') ?>" class="badge hvr-wobble-bottom">HR</a>
<a href="<?php echo base_url('candidate_profile/search_job?skills=Software & IT') ?>" class="badge hvr-wobble-bottom">Software & IT</a>
<a href="<?php echo base_url('candidate_profile/search_job?skills=Analytics') ?>" class="badge hvr-wobble-bottom">Analytics</a>    </div>
</div>

<!-- mobile slider start here -->
<div class="container-fluid mobilesliderr">
    <div class="container mobilesliderInn">

    <div class="row mobileslideOuter">

  <div class="mobilesliderLeftSide">
  <h3>Now India gets<br>skilled candidates</h3>
<p>Prepare for success in India's<br>
job market with the skills sought<br>
after by top employers in India.
</p>
<a class="btn btn-primary vacomp hvr-wobble-bottom" href="<?= base_url("registration/candidate"); ?>">Sign Up For Free</a>
  </div>
  <div class="mobileSlidBg">
      <div class="mobileSlidBgInn">
          <div class="frmobileCirclee">
              <div class="frmCircle"><i class="firsti fa fa-circle"></i> <i class="fa fa-circle lasti1"></i><i class="fa fa-circle lasti2"></i></div>
              </div>
              <div class="videoOuterr">
              <iframe width="332" height="535" src="https://www.youtube.com/embed/ujsDD0nVZkM" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
              </div>
        <div style="display:none;" id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
<ul>
<li><a href="#">
<img class="img-fluid" width="" height="auto" src="<?php echo base_url() ?>frontend/images/mobileslide1.jpg"/ alt=""></a></li>
</ul>
    </div>
    <div class="carousel-item">
      <ul>
    <li><a href="#">
<img class="img-fluid" width="" height="auto" src="<?php echo base_url() ?>frontend/images/mobileslide2.jpg"/ alt=""></a></li>
</ul>
    </div>
    <div class="carousel-item">
    <ul>
    <li><a href="#">
<img class="img-fluid" width="" height="auto" src="<?php echo base_url() ?>frontend/images/mobileslide3.jpg"/ alt=""></a></li>
</ul>
    </div>
  </div>
  <!--<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>-->
</div>
    </div>
  </div>
  
    </div>
    </div>
</div>
<!-- mobile slider end here -->

<!-- new section start here -->
<div class="container-fluid whychoosemsuiteee">
    <h2>What makes SHARKS JOB unique?</h2>
    <div class="container">
        
        <div class="row whychoosemsuiteeeinn">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <p><span>Explore</span></p>

<h3>Free Resume Builder With AI Assistance</h3>
<p>Craft a standout resume effortlessly with AI-powered assistance, optimizing your chances of landing your dream job.</p>
<a href="<?= base_url("registration/candidate"); ?>" class="btn btn-primary my-2 my-sm-0 hvr-wobble-bottom" type="submit">Signup Now</a>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12">

                
                <!--<img class="img-fluid" width="100%" height="auto" src="<?php echo base_url() ?>frontend/images/whymsuite1.jpg" alt="MNC's">-->
                <!-- resume slider start here -->
                <div class="marquee-container">
    <div class="marquee-content">
      <!-- Add your images as marquee items -->
      <div class="marquee-item"><img src="<?php echo base_url() ?>frontend/images/resume1.png" alt="Image 1"></div>
      <div class="marquee-item"><img src="<?php echo base_url() ?>frontend/images/resume2.png" alt="Image 2"></div>
      <div class="marquee-item"><img src="<?php echo base_url() ?>frontend/images/resume3.png" alt="Image 3"></div>
      <div class="marquee-item"><img src="<?php echo base_url() ?>frontend/images/resume1.png" alt="Image 1"></div>
      <div class="marquee-item"><img src="<?php echo base_url() ?>frontend/images/resume2.png" alt="Image 2"></div>
      <div class="marquee-item"><img src="<?php echo base_url() ?>frontend/images/resume3.png" alt="Image 3"></div>
      <div class="marquee-item"><img src="<?php echo base_url() ?>frontend/images/resume1.png" alt="Image 1"></div>
      <div class="marquee-item"><img src="<?php echo base_url() ?>frontend/images/resume2.png" alt="Image 2"></div>
      <div class="marquee-item"><img src="<?php echo base_url() ?>frontend/images/resume3.png" alt="Image 3"></div>
      <!-- Add more marquee items as needed -->
    </div>
  </div> 
                <!-- resume slider end here -->
                
            </div>
        </div>
    </div>
    
    <div class="container">
        
        <div class="row whychoosemsuiteeeinn">
             <div class="col-lg-7 col-md-7 col-sm-12 frmone"><img class="img-fluid" width="100%" height="auto" src="<?php echo base_url() ?>frontend/images/whymsuite2.jpg"></div>
            <div class="col-lg-5 col-md-5 col-sm-12 frmtwo">
                <p><span>Give AI interviews</span></p>

<h3>Interview Preparation & Practice with AI</h3>
<p>Master interview scenarios through AI-assisted practice, honing your responses and boosting your confidence for success.</p>
<a href="<?= base_url("registration/candidate"); ?>" class="btn btn-primary my-2 my-sm-0 hvr-wobble-bottom" type="submit">Signup Now</a>
            </div>
        </div>
    </div>
    
    <div class="container">
        
        <div class="row whychoosemsuiteeeinn">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <p><span>Endless opportunities</span></p>

<h3>Career Mentorship</h3>
<p>Gain personalized career guidance from seasoned mentors dedicated to helping you achieve your professional goals.</p>
<a href="<?= base_url("registration/candidate"); ?>" class="btn btn-primary my-2 my-sm-0 hvr-wobble-bottom" type="submit">Signup Now</a>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12">
                <iframe width="100%" height="380" src="https://www.youtube.com/embed/yBKdRa_yT4A" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <!--<img class="img-fluid" width="100%" height="auto" src="<?php echo base_url() ?>frontend/images/whymsuite3.jpg">-->
                </div>
        </div>
    </div>
</div>
<!-- new section end here -->

<!-- gets you hired section start here -->
<div class="container-fluid getsyouhiredd">
    <h2>Why Recruiters Love Sharks Job?</h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="exploreJobs">
                    <img class="img-fluid" width="100%" height="auto" src="<?php echo base_url() ?>frontend/images/exploreJobs.png">
                    <div class="exploreJobsBottom">
                       <h3>80% Time saving</h3>
<p>With Sharks Job, hiring is faster,<br>saving you 80% of your time.</p>
</div>
                    </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="exploreJobs">
                    <img class="img-fluid" width="100%" height="auto" src="<?php echo base_url() ?>frontend/images/aiinterviews.png">
                    <div class="exploreJobsBottom">
                        <h3>No Fake Profiles </h3>
<p>Free from fake profiles, ensuring a reliable and transparent hiring experience.</p>
</div>
                    </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="exploreJobs">
                    <img class="img-fluid" width="100%" height="auto" src="<?php echo base_url() ?>frontend/images/connectwithRecruiters.png">
                    <div class="exploreJobsBottom">
                       <h3>50% cost-effective </h3>
<p>Helping you reduce recruitment expenses by 50% while still finding top talent.</p>
</div>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- gets you hired section end here -->

<!-- company slider start here -->






<!-- company slider start here -->

<!-- featured company hired slider start here -->


<!-- featured company hired slider end here -->

<div style="display:none;" class="container-fluid DiscoverJobsOut">
    <div class="container DiscoverJobs">

    <div class="row">

  <div class="col-lg-4 col-sm-12 DiscoverLeftSide">
  <h3>Find jobs here across popular roles</h3>
<p>Select a job role and we'll show you related jobs for you.</p>
  </div>
  <div class="col-lg-8 col-sm-12">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
<ul>
    <li><a href="#">
Full Stack Developer<br>
27.3k+ Jobs</a></li>

<li><a href="#">
Technical Lead<br>
15.8k+ Jobs
</a></li>

<li><a href="#">
Business Aalyst<br>
6.8k Jobs
</a></li>

<li><a href="#">
    Front End Developer<br>
4.6+ Jobs
</a></li>

<li><a href="#">
    Technical Architect<br>
11.4k+ Jobs
</a></li>

<li><a href="#">
Functional Consultant<br>
4.6k+ Jobs
</a></li>
</ul>
    </div>
    <div class="carousel-item">
      <ul>
    <li><a href="#">
Full Stack Developer<br>
27.3k+ Jobs</a></li>

<li><a href="#">
Technical Lead<br>
15.8k+ Jobs
</a></li>

<li><a href="#">
Business Aalyst<br>
6.8k Jobs
</a></li>

<li><a href="#">
    Front End Developer<br>
4.6+ Jobs
</a></li>

<li><a href="#">
    Technical Architect<br>
11.4k+ Jobs
</a></li>

<li><a href="#">
Functional Consultant<br>
4.6k+ Jobs
</a></li>
</ul>
    </div>
    <div class="carousel-item">
    <ul>
    <li><a href="#">
Full Stack Developer<br>
27.3k+ Jobs</a></li>

<li><a href="#">
Technical Lead<br>
15.8k+ Jobs
</a></li>

<li><a href="#">
Business Aalyst<br>
6.8k Jobs
</a></li>

<li><a href="#">
    Front End Developer<br>
4.6+ Jobs
</a></li>

<li><a href="#">
    Technical Architect<br>
11.4k+ Jobs
</a></li>

<li><a href="#">
Functional Consultant<br>
4.6k+ Jobs
</a></li>
</ul>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  </div>
  
    </div>
    </div>
</div>

<!-- interview section -->
<div style="display:none;" class="container-fluid InteviewSection">
    <div class="container">

    <div class="row">

  <div class="col-lg-3 col-sm-12 interviewBox1">
    <h4>Prepare for your next interview</h4>
  </div>
  <div class="col-lg-5 col-sm-12 interviewBox2">
    <div class="questionbycomp">
        <h5>Interview questions by company</h5>
        <ul>
            <li><a href="#"><div class="IQimg" ><img width="70" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Cognizant"><div><h6>Cognizant</h6><span>1.6k+ Interviews</span></div></div></a></li>
            <li><a href="#"><div class="IQimg" ><img width="70" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Cognizant"><div><h6>Cognizant</h6><span>1.6k+ Interviews</span></div></div></a></li>
            <li><a href="#"><div class="IQimg" ><img width="70" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Cognizant"><div><h6>Cognizant</h6><span>1.6k+ Interviews</span></div></div></a></li>
            <li><a href="#"><div class="IQimg" ><img width="70" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Cognizant"><div><h6>Cognizant</h6><span>1.6k+ Interviews</span></div></div></a></li>
            <li><a href="#"><div class="IQimg" ><img width="70" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Cognizant"><div><h6>Cognizant</h6><span>1.6k+ Interviews</span></div></div></a></li>
            <li><a href="#"><div class="IQimg" ><img width="70" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Cognizant"><div><h6>Cognizant</h6><span>1.6k+ Interviews</span></div></div></a></li>
        </ul>
        <div class="frbttnn">
        <a class="btn hvr-wobble-bottom" href="#">View All Companies</a>
    </div>
    </div>
  </div>
  <div class="col-lg-4 col-sm-12">

    <div class="interviewBox3">
    <h5>Interview questions by role</h5>

    <ul>
<li><a>Software Engineer  <span>(7.2K+ questions)</span></a></li>
<li><a>Business Analyst  <span>(2.8K+ questions)</span></a></li>
<li><a>Consultant <span>(2.4K+ questions)</span></a></li>
<li><a>Financial Analyst <span>(894 questions)</span></a></li>
<li><a>Sales & Marketing <span>(991 questions)</span></a></li>
<li><a>Quality Engineer  <span>(1.3K+ questions)</span></a></li>
</ul>
<div class="frbttnn">
        <a class="btn hvr-wobble-bottom" href="#">View All Roles</a>
    </div>
    </div>
  </div>

  </div>
</div>
</div>

<!-- Accelatate job section -->

<div style="display:none;" class="container-fluid accelarateYourJob">
    <div class="container">

    <div class="row accelarateYourJobInn">

  <div class="col-lg-3 col-sm-12">
    <img alt= "Accelarate your job" class="img-fluid" src="<?php echo base_url() ?>frontend/images/accelarateYourJob.png"/>
</div>
<div class="col-lg-6 col-sm-12 Accelerateservices">
<h5>Find your dream job search with premium services</h5>

<p class="greyy">Premium Services to help you get hired, faster: from preparing your CV, getting recruiter attention, finding the right jobs, and more.</p>
<p><a href="#" class="badge viewjobsss hvr-wobble-bottom">Resume Build up</a><a href="#"  href="#"  class="badge viewjobsss hvr-wobble-bottom">Priority applicant</a> <a href="#"  class="badge viewjobsss hvr-wobble-bottom">Resume display</a></p>
</div>
    <div class="col-lg-3 col-sm-12 interviewBox1">
<a class="btn btn-primary learnmore hvr-wobble-bottom">Learn more</a>

<p class="greyy">Includes paid services</p>
    </div>
</div>
</div>
</div>

<!-- video Profile --->

<!-- Accelatate job section -->

<div style="display:none;" class="container-fluid FrVideoProfile">
    <h4>Get noticed among recruiters with a video profile</h4>
    <p>Available for both Android and iOS apps</p>
    <div class="container">
    <div class="row">
<div class="col-lg-12 col-sm-12 FrVideoProfileInn">
   <div class="videoprofileright">   
    <form class="enterMobileNoform">
   <input type="email" class="form-control forenterno" id="" placeholder="Enter Mobile Number">
   <button class="btn btn-primary topsearchbtn hvr-wobble-bottom" type="submit">Get Link</button>
</form>
<a class="hvr-wobble-bottom" href="#"><img alt="Google Play" class="img-fluid" src="<?php echo base_url() ?>frontend/images/Gplay.png"/></a>
<a class="hvr-wobble-bottom" href="#"><img alt="App Store" class="img-fluid" src="<?php echo base_url() ?>frontend/images/Appstore.png"/></a>
</div>
<div class="videoprofileLeft">
    <a class="" href="#">
        <img width="100" height="auto" class="img-fluid" src="<?php echo base_url() ?>frontend/images/scancode.jpg"/ alt="Scancode">
        <span>Scan to Download</span>
    </a>
</div>

</div>

<!--<div class="col-lg-5 col-sm-12 mobilevideoprofile">
    <img class="img-fluid" src="<?php echo base_url() ?>frontend/images/videoprofile.jpg"/>
</div>-->

</div>
</div>
</div>

<!-- trednding job search slider start here -->
<section style="display:none;" class="carousel_se_02 frPopulerItemss">
    <div class="container-fluid">
         <div class="container">
              <div class="row">
                <div class="col-sm-12 text-center wow fadeInUp">
                    <h2>Trending Job Search</h2>
                </div>
                    <div class="col-md-12 px-4 pt-0">
                          <div class="owl-carousel carousel_se_02_carousel owl-theme">
                                <!-- 01 -->
                                <div class="item">
                                 <div class="col-sm-12 p-2 wow fadeInUp delay-1">
                                     <div class="">
                                          <div class="product-image3 hover15">
                                             <img src="<?php echo base_url() ?>frontend/images/fresher.png" class="img-fluid">
                                          </div>
                                         <h5>Jobs For Fresher's</h5>
                                          
                                    </div>
                                  </div>
                                  
                               </div>

                                

                               <!-- 2 -->
                               <div class="item">
                                 <div class="col-sm-12 p-2 wow fadeInUp delay-3">
                                     <div class="">
                                          <div class="product-image3 hover15">
                                             <img src="<?php echo base_url() ?>frontend/images/women.png" class="img-fluid">
                                          </div>
                                          <h5>Jobs For Women's</h5>
                                         
                                    </div>
                                  </div>
                                  
                               </div>

                               <!-- 3 -->
                               <div class="item">
                                 <div class="col-sm-12 p-2 wow fadeInUp delay-4">
                                     <div class="">
                                          <div class="product-image3 hover15">
                                            <img src="<?php echo base_url() ?>frontend/images/contractemp.png" class="img-fluid">
                                              
                                          </div>
                                         <h5>Jobs for Contract Employee</h5>
                                         
                                    </div>
                                  </div>
                                  
                               </div>

                               

                               <!-- 4 -->
                               <div class="item">
                                 <div class="col-sm-12 p-2 wow fadeInUp delay-2">
                                     <div class="">
                                          <div class="product-image3 hover15">
                                                 <h5>Internship</h5><img src="<?php echo base_url() ?>frontend/images/internn.png" class="img-fluid">
                                              
                                          </div>
                                          <h5>Internship</h5>
                                          
                                         
                                    </div>
                                  </div>
                                  
                               </div>

                              
                               <!-- end -->

                            </div>
                      </div>

            </div>

            <!-- our clients -->
            
         </div>
    </div>
</section> 

<section class="carousel_se_03 frPopulerItemss">
    <div class="container-fluid px-0 pb-5">
         <div class="container ">
              <div class="row">
               
                <div class="col-md-12 px-0 " style="">
                    <div class="col-sm-12 text-center">
                        <h2>Trending Job Search</h2>
                       
                    </div>

                    <div class="col-md-12 px-0 p-t-30 ">
                      <div class="owl-carousel carousel_se_03_carousel owl-theme">
                               <!--1 -->
                               <div class="item">
                                 <div class="col-md-12 wow fadeInUp ">
                                    <div class="main_services text-center" style="">
                                        <a href="<?php echo base_url('candidate_profile/search_job?work_mode=Internship') ?>">
                                            
                                            <div class="frcustomslider">
                                          <!--<div class="round_icon_img">
                                              <i class="icofont-map-pins"></i>
                                          </div>-->
                                          <p class="headdd">Internships</p>
                                          <h3>Internships</h3>
                                          <img src="<?php echo base_url() ?>frontend/images/internn.png">
                                          <p class="link">View Jobs</p>
                                          </div>
                                        </a>
                                    </div>
                                  </div>
                               </div>

                               <!-- 2-->
                               <div class="item">
                                 <div class="col-md-12 wow fadeInUp delay-2">
                                    <div class="main_services text-center" >
                                      <a href="#">
                                        <div class="frcustomslider">
                                          <!--<div class="round_icon_img">
                                              <i class="icofont-map-pins"></i>
                                          </div>-->
                                          <p class="headdd">Jobs For Freshers</p>
                                          <h3>Jobs For Freshers</h3>
                                          <img src="<?php echo base_url() ?>frontend/images/fresher.png">
                                          <p class="link">View Jobs</p>
                                          </div>
                                      </a>
                                    </div>
                                  </div>
                               </div>

                              <!-- 3 -->
                              <div class="item">
                                <div class="col-md-12 wow fadeInUp delay-3">
                                    <div class="main_services text-center" >
                                      <a href="<?php echo base_url('candidate_profile/search_job?work_mode=Contractual') ?>">
                                       <div class="frcustomslider">
                                          <!--<div class="round_icon_img">
                                              <i class="icofont-map-pins"></i>
                                          </div>-->
                                          <p class="headdd">Jobs On Contract Employee</p>
                                          <h3>Jobs On Contract</h3>
                                          <img src="<?php echo base_url() ?>frontend/images/contractemp.png">
                                           <p class="link">View all</p>
                                          </div>
                                      </a>
                                    </div>
                                  </div>
                                </div>

                                <!-- 4 -->
                              <div class="item">
                                <div class="col-md-12 wow fadeInUp delay-3">
                                    <div class="main_services text-center" >
                                      <a href="<?php echo base_url('candidate_profile/search_job?work_mode=Female') ?>">
                                        <div class="frcustomslider">
                                          <!--<div class="round_icon_img">
                                              <i class="icofont-map-pins"></i>
                                          </div>-->
                                          <p class="headdd">Jobs For Womens</p>
                                          <h3>Jobs For Womens</h3>
                                          <img src="<?php echo base_url() ?>frontend/images/women.png">
                                          <p class="link">View all</p>
                                          </div>
                                      </a>
                                    </div>
                                  </div>
                                </div>
                              
                              </div>
                          </div>
                </div>

               <!-- <div class="col-md-12 px-0 p-t-30 text-center pt-4">
                      <a href="#" class="btn btn-primary">View all</a>
                </div>-->
                
                   
            </div>
         </div>
    </div>
</section> 
