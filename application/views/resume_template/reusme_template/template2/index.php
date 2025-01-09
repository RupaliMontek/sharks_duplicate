<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" href="assets/images/fav.jpg">
    <link rel="stylesheet" href="<?php echo base_url("frontend/css/resume_builder/template4/bootstrap.min.css");?>"> 
   <link rel="stylesheet" href="<?php echo base_url("frontend/css/font-awesome.min.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("frontend/css/resume_builder/template2/style.css");?>"> 

    <title>Resume Template 2</title>
</head>



<body>

    <div id="home" class="container-fluid resume-container">

        <!--  ************************* Container Starts Here ************************** -->
          
          <div class="container">
              <div class="row">
                  <div class="col-xl-10 col-lg-12 resume-box">
                      <div class="row">
                          <div class="col-lg-4 col-md-12 basic-profile">
                            
                            <div class="row no-margin">
                                 <div class="col-lg-12 col-md-3 col-sm-3 col-12 no-padding">
                                     <img src="<?php if(!empty($user_details)){ echo base_url($user_details[0]->image);} else { echo base_url("frontend/images/resume_builder/template2/profile_image.jpg"); }?>" alt="">
                                 </div>
                                 <div class="col-lg-12 col-md-9 col-sm-9 ccol-12 baci-cc no-padding">
                                     <div class="basic-detail no-padding">
                                           <h2><?php if(!empty($user_details)){ echo ucfirst(@$user_details[0]->name); } else{ echo "John Smith"; } ?></h2>
                                           <p id="resumeTitleJ"><?php if(!empty($employement_details)){ echo $employement_details[0]->emp_current_desigantion; } else{?>Web Designer / Web Develper<?php }?></p>
                                           <span >
                                           <?php  if(!empty($employement_details)):
						                   foreach ($employement_details as $row):  
						                   if($row->emp_employment=="Yes"): echo ucfirst(@$last_employment->emp_current_company_name);
						                   endif;
						                   endforeach;
						                   endif;
						                   ?></span>
                                           </div></div>
                                           <div style="margin-top:15px;" class="col-lg-12 col-md-9 col-sm-9 ccol-12 baci-cc no-padding">
                                     <div class="basic-detail no-padding">
                                      
<h4>Email</h4>
<p id="emailidJ"><?php if(!empty($user_details)){ echo @$user_details[0]->email; }  else{ ?> info@yourdomain.com <?php } ?></p>
<h4>Phone</h4>
<p id="contactNoJ"><?php  if(!empty($user_details)){ echo @$user_details[0]->contact; } else{ ?> +9878676587 <?php } ?></p>
<h4>Address</h4><p id="addressJ"><?php if(!empty(@$personal_details[0]
                                ->permanent_add && $personal_details[0]->hometown && $personal_details[0]->pincode  )){ echo @$personal_details[0]
                                ->permanent_add .
                                "," .
                                @$personal_details[0]->hometown .
                                "," .
                                @$personal_details[0]->pincode; } else{ echo "First Floor,Vincent Plaza, Toranto, Canada";} ?> </p>
                                          
                                         </div>
                                     
                                      </div>
<div style="margin-top:15px;" class="col-lg-12 col-md-9 col-sm-9 ccol-12 baci-cc no-padding">
     <div class="basic-detail no-padding">
    <h4>Social Media Links</h4>
                                     <div class="basic-detail no-padding">
                                      <ul class="social-link">
                                          	   <?php if (!empty($social_platform)): ?>
                                                <?php foreach ($social_platform as $row): ?>
                                                    <?php if ($row->social_profile == "facebook"): ?>       
                                                        <li id="facebookJ"><a href="<?= $row->social_platform_url ?>"><i class="fa fa-facebook"></i></a></li>
                                                    <?php endif; ?>
                                                    <?php if ($row->social_profile == "twitter"): ?>      
                                                        <li id="twitterJ"><a href="<?= $row->social_platform_url ?>"><i class="fa fa-twitter"></i></a></li>
                                                    <?php endif; ?>
                                                    <?php if ($row->social_profile == "linkedin"): ?>     
                                                        <li id="linkedin"><a href="<?= $row->social_platform_url ?>"><i class="fa fa-linkedin"></i></a></li>
                                                    <?php endif; ?>
                                                    <?php if ($row->social_profile == "instagram"): ?>          
                                                        <li id="instagram"><a href="<?= $row->social_platform_url ?>"><i class="fa fa-instagram"></i></a></li>
                                                    <?php endif; ?>
                                                    <?php if ($row->social_profile == "youtube"): ?>    
                                                        <li id="youtube"><a href="<?= $row->social_platform_url ?>"><i class="fa fa-youtube"></i></a></li>
                                                    <?php endif; ?>
                                                    <?php if ($row->social_profile == "pinterest"): ?>   
                                                        <li id="pinterest"><a href="<?= $row->social_platform_url ?>"><i class="fa fa-pinterest"></i></a></li>   
                                                    <?php endif; ?>
                                                    <?php if ($row->social_profile == "whatsapp"): ?>      
                                                        <li id="whatsapp"><a href="<?= $row->social_platform_url ?>"><i class="fa fa-whatsapp"></i></a></li>   
                                                    <?php endif; ?>
                                                    <?php if ($row->social_profile == "reddit"): ?>         
                                                        <li id="reddit"><a href="<?= $row->social_platform_url ?>"><i class="fa fa-reddit"></i></a></li>   
                                                    <?php endif; ?>
                                                    <?php if ($row->social_profile == "git"): ?>            
                                                        <li id="git"><a href="<?= $row->social_platform_url ?>"><i class="fa fa-git"></i></a></li>
                                                    <?php endif; ?>
                                                    <?php if ($row->social_profile == "skype"): ?>              
                                                        <li id="skype"><a href="<?= $row->social_platform_url ?>"><i class="fa fa-skype"></i></a></li>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php else:?>
                                                       <li id="facebookJ"><a href=""><i class="fa fa-facebook"></i></a></li>
                                                       <li id="twitterJ"><a href=""><i class="fa fa-twitter"></i></a></li>
                                                       <li id="linkedin"><a href=""><i class="fa fa-linkedin"></i></a></li>
                                                       <li id="instagram"><a href=""><i class="fa fa-instagram"></i></a></li>
                                                       <li id="youtube"><a href=""><i class="fa fa-youtube"></i></a></li>
                                                       <li id="pinterest"><a href=""><i class="fa fa-pinterest"></i></a></li>     
                                                       <li id="whatsapp"><a href=""><i class="fa fa-whatsapp"></i></a></li>   
                                                       <li id="reddit"><a href=""><i class="fa fa-reddit"></i></a></li>   
                                                       <li id="git"><a href=""><i class="fa fa-git"></i></a></li>
                                                       <li id="skype"><a href=""><i class="fa fa-skype"></i></a></li>
                                                    <?php endif; ?>                                                                              
                                                  </ul>
                                                  </div>
                                                  </div>
                                  </div>
<div style="margin-top:15px;" class="col-lg-12 col-md-9 col-sm-9 ccol-12 baci-cc no-padding">
     <div class="basic-detail no-padding">
    <h4>Personal Details</h4>
                                     <div class="basic-detail no-padding">
                                      <ul id="PersonalDetailsJ" class="social-link">
<li id=""> <b>Gender :</b> <?php if(!empty($personal_details[0]->gender)): echo $personal_details[0]->gender; else: echo "Male";  endif;?></li>
<li id=""> <b>Maritial Status : </b><?php if(!empty($personal_details[0]->married_status)): echo $personal_details[0]->married_status; else: echo "Single";  endif;?></li>
<li id=""> <b>Date Of Birth : </b><?php if(!empty($personal_details[0]->birth_date && $personal_details[0]->birth_month && $personal_details[0]->birth_year)): $dateObj = DateTime::createFromFormat('!m', $personal_details[0]->birth_month); $monthName = $dateObj->format('F');  echo sprintf('%02d',$personal_details[0]->birth_date)."-".$monthName."-".$personal_details[0]->birth_year; else: echo "19-April-1995"; endif;  ?></li>
<li id=""> <b>languages Known :</b> 	<?php 
                                                    if (!empty($know_language)):
                                                        $totalLanguages = count($know_language);
                                                        $i = 0;
                                                        foreach ($know_language as $row):
                                                            echo $row->language;
                                                            if ($i < $totalLanguages - 1) {
                                                                echo " ,";
                                                            }
                                                            $i++;
                                                        endforeach; 
                                                        else:
                                                    ?> English, Hindi, Marathi <?php endif; ?></li>
                                                  </ul>
                                                  </div></div>
                                  </div>
<div style="margin-top:15px;" class="col-lg-12 col-md-9 col-sm-9 ccol-12 baci-cc no-padding">
     <div class="basic-detail no-padding">
    <h4>Skills</h4>
<div class="basic-detail no-padding">
<?php 
if (!empty($candidate_skils)):
foreach($candidate_skils as $skill): ?>    

<div id="skillsJ1" class="row prog-row">
<div class="col-sm-6"><?php echo htmlspecialchars($skill->skills); ?></div>
<div class="col-sm-6"><div class="progress">
<div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
</div>
</div>
<?php endforeach; 
else: ?>

<div id="skillsJ1" class="row prog-row">
<div class="col-sm-6">Photoshop</div>
<div class="col-sm-6"><div class="progress">
<div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
</div>
</div>

<div id="skillsJ2" class="row prog-row">
<div class="col-sm-6">Photoshop</div>
<div class="col-sm-6"><div class="progress">
<div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
</div>
</div>

<div id="skillsJ3" class="row prog-row">
<div class="col-sm-6">
Web Design
</div>
<div class="col-sm-6">
<div class="progress">
<div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
</div>
</div>

<div id="skillsJ4" class="row prog-row">
<div class="col-sm-6">
Web Development
</div>
<div class="col-sm-6">
<div class="progress">
<div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
</div>
</div>
<?php endif; ?>
</div>
</div>
 </div>
                                  
                                  
                           </div></div>
                          <div class="col-lg-8 col-md-12 detail-profile no-padding">
                             
                                <div class="tab-content" id="myTabContent">
                                 
                                  <!--  ************************* Home Tab Starts Here ************************** -->
                                  <div class="tab-pane fade show active" id="home-1" role="tabpanel" aria-labelledby="home-tab">
                                      
                                      <div class="detal-jumbo">
                                          <h3 id="resumeTitleJ ">Hellow I'm  
                                           <span >
                                           <?php  if(!empty($employement_details)):
						                   foreach ($employement_details as $row):  
						                   if($row->emp_employment=="Yes"): echo ucfirst(@$last_employment->emp_current_desigantion);
						                   endif;
						                   endforeach;
						                   else:
						                       echo "Web Designer / Web Develper";
						                   endif;
						                   ?></h3>
                                          <p id="ProfileJ"><?php if(!empty($profile_summary)){ echo @$profile_summary->profile_summary; } else{ ?>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,<?php } ?></p>
                                      </div>
                                      
                                <div class="tab-pane fade active show" id="resume" role="tabpanel" aria-labelledby="contact-tab">
                                      <div class="sec-title">
                                          <h2>Work Experience</h2>
                                      </div>
                                      <?php if(!empty($employement_details)):
						               foreach ($employement_details as $row):
						              ?>
						               <div id="workExperience1J" class="service no-margin row">
                                          <div class="col-sm-3 resume-dat serv-logo">
                                              <h6><?php  if($row->emp_joining_year){ echo $row->emp_joining_year. " - "; } if($row->emp_employment=="Yes"){ echo "Present"; } else{ echo $row->emp_work_till_year; } ?></h6>
                                            <p><?php if(!empty($row->emp_current_desigantion)): echo $row->emp_current_desigantion; elseif(!empty($row->emp_perv_designation)): echo $row->emp_perv_designation; else:?>Junior Software Developer <?php endif; ?></p>
                                          </div>
                                          <div class="col-sm-9">
                                              <h5><?php if($row->emp_employment=="Yes"): echo @$last_employment->emp_current_company_name,"  | " ; endif; if($row->emp_joining_year){ echo $row->emp_joining_year. " - "; } ?></h5>
                                          </div>
                                      </div>
						              
						              <?php endforeach; else: ?>
                                      <div id="workExperience1J" class="service no-margin row">
                                          <div class="col-sm-3 resume-dat serv-logo">
                                              <h6>2013-2015</h6>
                                            <p>Junior Software Developer</p>
                                          </div>
                                          <div class="col-sm-9">
                                              <h5>Microsoft / United States</h5>
                                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                          </div>
                                      </div>
                                      
                                      <div id="workExperience2J" class="service no-margin row">
                                          <div class="col-sm-3 resume-dat serv-logo">
                                               <h6>2013-2015</h6>
                                            <p>Junior Software Developer</p>
                                          </div>
                                          <div class="col-sm-9">
                                              <h5>Microsoft / United States</h5>
                                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                          </div>
                                      </div>
                                      <div id="workExperience3J" class="service no-margin row">
                                          <div class="col-sm-3 resume-dat serv-logo">
                                              <h6>2013-2015</h6>
                                            <p>Junior Software Developer</p>
                                          </div>
                                          <div class="col-sm-9">
                                              <h5>Microsoft / United States</h5>
                                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                          </div>
                                      </div>
                                      <?php endif; ?>
                                  </div>

<div class="tab-pane fade active show" id="resume" role="tabpanel" aria-labelledby="contact-tab">
                                      <div class="sec-title">
                                          <h2>Education Details</h2>
                                      </div>
                                      
                                       <?php if (!empty($education_details)):
                                              foreach ($education_details as $row): 
                                              $data = $this->M_Candidate_profile->get_all_education_details_specialization(@$row->specialization_course);
                                              if ($row->education == 5) {$data = $this->M_Candidate_profile->get_candidate_education($row->education); $course_name = $data[0]->main_course_name; $year = $row->passout_year;}
                                              if ($row->education == 4) {$data = $this->M_Candidate_profile->get_candidate_education($row->education); $course_name = $data[0]->main_course_name;  $univercity_name = $row->board; $year = $row->passout_year;}
                                              if ($row->education == 3) {$data = $this->M_Candidate_profile->get_all_education_details_specialization(@$row->specialization_course); $query = $this->db->query("select * from candidate_course where course_id = $row->course"); $course_details = $query->row(); $year = $row->course_start_year ."-" .$row->course_end_year; $course_name = @$course_details->course_name." ".$data->specialization_name; }
                                              if ($row->education == 2) {$query = $this->db->query("select * from candidate_course where course_id = $row->course"); $course_details = $query->row(); $univercity_name = $row->university_name; $year = $row->course_start_year ."-" .$row->course_end_year; $course_name = @$course_details->course_name ." " .@$data->specialization_name; }
                                              if ($row->education == 1) {$data = $this->M_Candidate_profile->get_all_education_details_specialization(@$row->specialization_course);  $data1 = $this->M_Candidate_profile->get_candidate_course(@$row->course); $course_name = $data1->course_name." ".@$data->specialization_name; $univercity_name = $row->university_name; $year = $row->course_start_year ."-" .$row->course_end_year;  }
                                               ?>
									            <div id="educationJ1" class="service no-margin row">
                                                      <div class="col-sm-3 resume-dat serv-logo">
                                                          <h6><?= $year; ?></h6>
                                                        <p><?= $course_name; ?></p>
                                                      </div>
                                                      <div class="col-sm-9">
                                                          <h5><?= $univercity_name; ?></h5>
                                                      </div>
                                                </div>
                                      
									<?php endforeach; else: ?>   
                                               
                                      <div id="educationJ1" class="service no-margin row">
                                          <div class="col-sm-3 resume-dat serv-logo">
                                              <h6>2013-2015</h6>
                                            <p>Master Degree</p>
                                          </div>
                                          <div class="col-sm-9">
                                              <h5>Cambridg University</h5>
                                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                          </div>
                                      </div>
                                      <div id="educationJ2" class="service no-margin row">
                                          <div class="col-sm-3 resume-dat serv-logo">
                                              <h6>2013-2015</h6>
                                            <p>Bacholers Degree</p>
                                          </div>
                                          <div class="col-sm-9">
                                              <h5>Anna University</h5>
                                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                          </div>
                                      </div>
                                      <div id="educationJ3" class="service no-margin row">
                                          <div class="col-sm-3 resume-dat serv-logo">
                                              <h6>2013-2015</h6>
                                            <p>High School</p>
                                          </div>
                                          <div class="col-sm-9">
                                              <h5>A.M.H.S.S</h5>
                                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                          </div>
                                      </div>
                                    <?php endif; ?>                                
                                  </div>
                                  
<div class="tab-pane fade active show" id="resume" role="tabpanel" aria-labelledby="contact-tab">
                                      <div class="sec-title">
                                          <h2>Projects</h2>
                                      </div>
                                      <?php 
								      if(!empty($candidate_project)):
								      foreach($candidate_project as $project):
								       ?>
								       <div id="project1J" class="service no-margin row">
                                          <div class="col-sm-3 resume-dat serv-logo">
                                            <p>Year <?php echo $project->worked_from_year; if(!empty($project->worked_till_year)){ echo "- ".$project->worked_till_year; }?> </p>
                                          </div>
                                          <div class="col-sm-9">
                                              <h5><?php echo $project->project_title ?></h5>
                                              <p><?php echo $project->employment_education ?></p>
                                              <p><b>Project Details :- </b><?php echo $project->details_project; ?></p>
                                          </div>
                                      </div>
                                      
								      <?php endforeach; else:  ?>
                                      <div id="project1J" class="service no-margin row">
                                          <div class="col-sm-3 resume-dat serv-logo">
                                              <h6>Project 1</h6>
                                            <p>Year 2020 -2 021</p>
                                          </div>
                                          <div class="col-sm-9">
                                              <h5>Project Name</h5>
                                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                          </div>
                                      </div>
                                      <div id="project2J" class="service no-margin row">
                                          <div class="col-sm-3 resume-dat serv-logo">
                                               <h6>Project 1</h6>
                                            <p>Year 2020 -2 021</p>
                                          </div>
                                          <div class="col-sm-9">
                                              <h5>Project Name</h5>
                                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                          </div>
                                      </div>
                                      <?php endif; ?>
                                  </div>
                                      
                                      
                                      
                                      
                                  </div>
                                   
                                </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>                                                                                                                                                                                                 
                                                                                                                                              
        <!-- ######## Container End ####### -->  
        </div>
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
       <link rel="stylesheet" href="<?php echo base_url("frontend/js/resume_builder/template4/jquery-3.2.1.min.js");?>"> 
<link rel="stylesheet" href="<?php echo base_url("frontend/js/resume_builder/template4/popper.min.js");?>"> 
<link rel="stylesheet" href="<?php echo base_url("frontend/js/resume_builder/template4/bootstrap.min.js");?>"> 
<link rel="stylesheet" href="<?php echo base_url("frontend/js/resume_builder/template4/script.js");?>"> 
</body>

</html>