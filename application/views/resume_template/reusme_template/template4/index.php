<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Free Dental Medical Hospital Website Template | Smarteyeapps.com</title>
    <link rel="stylesheet" href="<?php echo base_url("frontend/css/resume_builder/template4/bootstrap.min.css");?>"> 
   <link rel="stylesheet" href="<?php echo base_url("frontend/css/font-awesome.min.css");?>">
    
    <link rel="stylesheet" href="<?php echo base_url("frontend/css/resume_builder/template4/style.css");?>"> 
</head>

<body>
    <div class="container-fluid overcover">
        <div class="container profile-box">
            <div class="row">
                <div class="col-md-4 left-co">
                    <div class="left-side">
                        <div class="profile-info">
                            <img class="shape" src="<?php if(!empty($user_details[0]->image)): echo base_url($user_details[0]->image); else: echo base_url("frontend/images/resume_builder/template4/profile.jpg"); endif;?>" alt="">
                            <h3><?php if(!empty($user_details)){ echo ucfirst(@$user_details[0]->name); } else{ ?>Jonney Anderson<?php } ?></h3>
                            <span id="resumeTitleJ">  
                            <?php  if(!empty($employement_details)):
					              foreach ($employement_details as $row):  
					              if($row->emp_employment=="Yes"): echo ucfirst(@$last_employment->emp_current_desigantion);
					              endif;
					              endforeach;
					              else:
					                  echo "Web Designer";
					              endif;
					        ?>               </span>
                        </div>
                        <h4 class="ltitle">Contact</h4>
                        <div class="contact-box pb0">
                            <div class="icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div id="contactNoJ" class="detail">
                                <?php  if(!empty($user_details)){ echo @$user_details[0]->contact; } else{ ?> +122 2345 3763 <?php } ?><br>
                            </div>
                        </div>
                        <div class="contact-box pb0">
                            <div class="icon">
                                <i class="fa fa-globe"></i>
                            </div>
                            <div id="emailidJ" class="detail">
                                <?php if(!empty($user_details)){ echo @$user_details[0]->email; }  else{ ?> info@smarteyeapps.com <?php } ?><br>
                            </div>
                        </div>
                        <div class="contact-box">
                            <div class="icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div id="addressJ" class="detail">
                                <?php 
                                if(!empty(@$personal_details[0]->permanent_add && $personal_details[0]->hometown && $personal_details[0]->pincode  ))
                                { 
                                  echo @$personal_details[0]->permanent_add ."," .@$personal_details[0]->hometown ."," .@$personal_details[0]->pincode; 
                                } 
                                else
                                { 
                                   echo "First Floor,Vincent Plaza, Toranto, Canada"; 
                                } ?>
                            </div>
                        </div>
                        <h4 class="ltitle">Contact</h4>
                        <ul class="row social-link no-margin">
                        <?php  if(!empty($social_platform)):
			                   foreach($social_platform as $row):
			            if ($row->social_profile == "facebook"):
			            ?>
			            <li id="facebookJ"> <a href="<?= $row->social_platform_url; ?>"> <i class="fa fa-facebook"></i></a></li>
			            <?php 
			             endif;
			             if ($row->social_profile == "twitter"):
			             ?>
                        <li id="twitterJ"> <a href="<?= $row->social_platform_url; ?>"> <i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                         <?php 
			             endif;
			             if ($row->social_profile == "linkedin"):
			             ?>
			             
                         <li id="linkedinJ"> <a href="<?= $row->social_platform_url; ?>"> <i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                         <?php 
			             endif;
			             if ($row->social_profile == "instagram"):
			             ?>
                        <li id="instagramJ"> <a href="<?= $row->social_platform_url; ?>"> <i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                         <?php 
			             endif;
			             if ($row->social_profile == "youtube"):
			             ?>
                        <li id="youtubeJ"> <a href="<?= $row->social_platform_url; ?>"> <i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                         <?php 
			             endif;
			             if ($row->social_profile == "pinterest"):
			             ?>
                        <li id="pinterestJ"> <a href="<?= $row->social_platform_url; ?>"> <i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                         <?php 
			             endif;
			             if ($row->social_profile == "whatsapp"):
			             ?>
                        <li id="whatsappJ"> <a href="<?= $row->social_platform_url; ?>"> <i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                         <?php 
			             endif;
			             if ($row->social_profile == "reddit"):
			             ?>
                        <li id="redditJ"> <a href="<?= $row->social_platform_url; ?>"> <i class="fa fa-reddit" aria-hidden="true"></i></a></li>
                         <?php 
			             endif;
			             if ($row->social_profile == "git"):
			             ?>
                        <li id="gitJ"> <a href="<?= $row->social_platform_url; ?>"> <i class="fa fa-git" aria-hidden="true"></i></a></li>
                         <?php 
			             endif;
			             if ($row->social_profile == "skype"):
			             ?>
                        <li id="skypeJ"> <a href="<?= $row->social_platform_url; ?>"> <i class="fa fa-skype" aria-hidden="true"></i></a></li>
                         <?php 
			             endif;
			             ?>
			            
			            <?php endforeach; else: ?>
                            <li id="facebookJ"><i class="fa fa-facebook"></i></li>
                            <li id="twitterJ"><i class="fa fa-twitter"></i></li>
                            <li id="googlePlusJ"><i class="fa fa-google-plus"></i></li>
                            <li id="linkedinJ"><i class="fa fa-linkedin"></i></li>
                            <li id="githubJ"><i class="fa fa-github"></i></li>
                            <li id="skypeJ"><i class="fa fa-skype"></i></li>
                        <?php endif; ?>
                        </ul>
                        <h4 class="ltitle">Personal Details</h4>
<div id="PersonalDetailsJ" class="refer-cov">
              <p><b>Gender</b><br><?php if(!empty($personal_details[0]->gender)): echo $personal_details[0]->gender; else: echo "Male";  endif;?></p>
<p><b>Maritial Status</b><br><?php if(!empty($personal_details[0]->married_status)): echo $personal_details[0]->married_status; else: echo "Single";  endif;?></p>
<p><b>Date Of Birth</b><br><?php if(!empty($personal_details[0]->birth_date && $personal_details[0]->birth_month && $personal_details[0]->birth_year)): $dateObj = DateTime::createFromFormat('!m', $personal_details[0]->birth_month); $monthName = $dateObj->format('F');  echo sprintf('%02d',$personal_details[0]->birth_date)."-".$monthName."-".$personal_details[0]->birth_year; else: echo "19-April-1995"; endif;  ?></p>
<p><b>languages Known</b><br><?php 
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
                    echo "English, Hindi, Marathi";
                    endif; ?></p>
            </div>
                       
                        <!--<h4 class="ltitle">Hobbies</h4>
                        <ul class="hoby row no-margin">
                            <li><i class="fa fa-pencil"></i> <br> Writing</li>
                            <li><i class="fa fa-bicycle"></i> <br> Cycling</li>
                            <li><i class="fa fa-futbol-o"></i> <br> Football</li>
                            <li><i class="fa fa-film"></i><br> Movies</li>
                            <li><i class="fa fa-plane"></i> <br>Travel</li>
                            <li><i class="fa fa-gamepad"></i> <br> Games</li>
                        </ul>-->
                    </div>
                </div>
                <div class="col-md-8 rt-div">
                    <div class="rit-cover">
                        <div class="hotkey">
                            <h1 class=""><?php if(!empty($user_details)){ echo ucfirst(@$user_details[0]->name); } else{ ?>Jonney Anderson<?php } ?></h1>
                            <small id="resumeTitleJ">
                            <?php  if(!empty($employement_details)):
					              foreach ($employement_details as $row):  
					              if($row->emp_employment=="Yes"): echo ucfirst(@$last_employment->emp_current_desigantion);
					              endif;
					              endforeach;
					              else:
					                  echo "Web Designer";
					              endif;
					        ?>
					        </small>
                        </div>
                        <h2 class="rit-titl"><i class="fa fa-user"></i> Profile</h2>
                        
                        <div id="ProfileJ" class="about">
                            <p><?php if(!empty($profile_summary)){ echo @$profile_summary->profile_summary; }
                           else{ ?> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis accumsan purus enim, a vestibulum est tristique sit amet. Suspendisse nibh nisl, imperdiet sit amet mi vitae, elementum elementum nibh. Vivamus vitae eros malesuada, convallis dolor malesuada, lobortis ex. Sed cursus augue risus, ac semper est consectetur vitae. Praesent consequat metus sit amet rhoncus luctus.<?php } ?></p>
                        </div>
                        <h2 class="rit-titl"><i class="fa fa-briefcase"></i> Work Experiance</h2>
                        <?php 
                              if(!empty($employement_details)):
				              foreach ($employement_details as $row):
			             ?>
			             
			              <div id="workExperience2J" class="work-exp">
                            <h6><b><?php   
                            if (!empty($row->emp_current_desigantion))
                            {
                                echo $row->emp_current_desigantion;
                            } 
                            elseif (!empty($row->emp_perv_designation))   
                            {
                                 echo $row->emp_perv_designation;
                            }  ?>
                            </b> <span><?php   if(!empty($row->emp_joining_month && $row->emp_joining_year)): echo $row->emp_joining_month." ".$row->emp_joining_year; else: endif;  if($row->emp_employment=="Yes"): echo "- Present"; else: endif;?></span></h6>
                            <i><?php if(!empty($row->emp_current_company_name)){ echo $row->emp_current_company_name; } else{ echo $row->emp_perv_company_name;  } ?></i>
                         </div>
			            <?php endforeach; else: ?> 
			             
                         
                        <div id="workExperience2J" class="work-exp">
                            <h6><b>Junior Software Developer</b> <span>2008-2011</span></h6>
                            <i>Microsoft / United States</i>
                            <ul>
                                <li><i class="fa fa-hand-o-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit. </li>
                                
                                <li><i class="fa fa-hand-o-right"></i> Sed cursus augue risus, ac semper est consectetur vitae </li>
                            </ul>
                        </div>
                        <div id="workExperience3J" class="work-exp">
                            <h6><b>Junior Software Developer</b> <span>2008-2011</span></h6>
                            <i>Microsoft / United States</i>
                            <ul>
                                <li><i class="fa fa-hand-o-right"></i> Praesent consequat metus sit amet rhoncus luctus.

                                </li>
                                <li><i class="fa fa-hand-o-right"></i> Lorem ipsum dolor sit amet, consectetur. </li>
                                
                            </ul>
                        </div>
                    <?php endif; ?> 
                        <h2 class="rit-titl"><i class="fa fa-graduation-cap"></i> Education</h2>
                        <div class="education">
                            <ul class="row no-margin">
                                <?php if (!empty($education_details)):
                                foreach ($education_details as $row): 
                                $data = $this->M_Candidate_profile->get_all_education_details_specialization(@$row->specialization_course);
                                if ($row->education == 5) {$data = $this->M_Candidate_profile->get_candidate_education($row->education); $course_name = $data[0]->main_course_name; $year = $row->passout_year;}
                                if ($row->education == 4) {$data = $this->M_Candidate_profile->get_candidate_education($row->education); $course_name = $data[0]->main_course_name;  $univercity_name = $row->board; $year = $row->passout_year;}
                                if ($row->education == 3) {$data = $this->M_Candidate_profile->get_all_education_details_specialization(@$row->specialization_course); $query = $this->db->query("select * from candidate_course where course_id = $row->course"); $course_details = $query->row(); $year = $row->course_start_year ."-" .$row->course_end_year; $course_name = @$course_details->course_name." ".$data->specialization_name; }
                                if ($row->education == 2) {$query = $this->db->query("select * from candidate_course where course_id = $row->course"); $course_details = $query->row(); $univercity_name = $row->university_name; $year = $row->course_start_year ."-" .$row->course_end_year; $course_name = @$course_details->course_name ." " .@$data->specialization_name; }
                                if ($row->education == 1) {$data = $this->M_Candidate_profile->get_all_education_details_specialization(@$row->specialization_course);  $data1 = $this->M_Candidate_profile->get_candidate_course(@$row->course); $course_name = $data1->course_name." ".@$data->specialization_name; $univercity_name = $row->university_name; $year = $row->course_start_year ."-" .$row->course_end_year;  }
                                 ?>
                                 
                                <li id="educationJ1" class="col-md-6"><span><?= $year; ?></span> <br>
                                <?= $course_name; ?> - <?= $univercity_name; ?></li>
                                <?php endforeach; else: ?>
                 
                                <li id="educationJ1" class="col-md-6"><span>2013-2015</span> <br>
                                    Master Degree - Cambridg University</li>
                                <li id="educationJ2" class="col-md-6"><span>2013-2015</span> <br>
                                    Master Degree - Cambridg University</li>
                                <li id="educationJ3" class="col-md-6"><span>2013-2015</span> <br>
                                    Master Degree - Cambridg University</li>
                                <li id="educationJ4" class="col-md-6"><span>2013-2015</span> <br>
                                    Master Degree - Cambridg University</li>
                                <?php endif; ?>    
                            </ul>
                        </div>

                        <h2 class="rit-titl"><i class="fa fa-users"></i> Skills</h2>
                        <div class="profess-cover row no-margin">
                        <?php if (!empty($candidate_skils)):
                              foreach($candidate_skils as $skill):
                        ?>
                        
                        <div class="col-md-6">
                            <div id="skillsJ1" class=" prog-row row">
                                <div class="col-sm-6">
                                    <?php echo htmlspecialchars($skill->skills); ?>
                                </div>
                                <div class="col-sm-6">
                                    <div class="progress">
                                        <div class="yearsOfExperience">
                           <span class="alignright">
                                <?php 
                                 $fromDate = new DateTime($skill->from_date);
                                 $toDate = new DateTime($skill->to_date);
                                 $interval = $fromDate->diff($toDate);
                                 $years = $interval->y;
                                 $months = $interval->m; echo $years." and ".$months." months"; ?>
                            </span>
                           <span class="alignleft">years</span>
                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <?php   endforeach; 
                        else:?>          
                            
                            <div class="col-md-6">
                                <div id="skillsJ1" class=" prog-row row">
                                    <div class="col-sm-6">
                                        Photoshop
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="skillsJ2" class="row prog-row">
                                    <div class="col-sm-6">
                                        PHP
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
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
                            </div>
                            <div class="col-md-6">
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
                            </div>
                        <?php  endif; ?>    
</div>
<h2 class="rit-titl"><i class="fa fa-file"></i> Projects</h2>
<div class="education">
                            <ul class="row no-margin">
                                <?php if(!empty($candidate_project)):
				                      foreach($candidate_project as $project):
			                    ?>   
			                    <li id="project1J" class="col-md-6">
                                <h5><?php echo $project->project_title ?></h5>
                                <span>
                                <?php 
                                    $dateObj = DateTime::createFromFormat('!m', $project->worked_from_month);
                                    $from_month = $dateObj->format('F');
                                    $dateObj1 = DateTime::createFromFormat('!m', $project->worked_till_month);
                                    $till_month = $dateObj1->format('F');
                                    echo $from_month." ".$project->worked_from_year." - ". $till_month." ".$project->worked_till_year." - " 
                                ?>
                                </span>
                                    <br><p><b>Project Details :- </b><?php echo $project->details_project;?></p>
                                </li>
                                
			                    <?php endforeach; else: ?> 
                                <li id="project1J" class="col-md-6">
                                    <h5>Project 1</h5>
                                    <span>2013-2015</span>
                                    <br><p>Quisque rutrum mollis ornare. In pharetra diam libero, non interdum dui imperdiet quis. Quisque aliquam sapien in libero finibus sodales. Mauris id commodo metus. In in laoreet dolor.</p>
                                </li>
                                <li id="project1J" class="col-md-6"> 
                                <h5>Project 2</h5>
                                <span>2013-2015</span><br><p>Quisque rutrum mollis ornare. In pharetra diam libero, non interdum dui imperdiet quis. Quisque aliquam sapien in libero finibus sodales. Mauris id commodo metus. In in laoreet dolor.</p>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<link rel="stylesheet" href="<?php echo base_url("frontend/js/resume_builder/template4/jquery-3.2.1.min.js");?>"> 
<link rel="stylesheet" href="<?php echo base_url("frontend/js/resume_builder/template4/popper.min.js");?>"> 
<link rel="stylesheet" href="<?php echo base_url("frontend/js/resume_builder/template4/bootstrap.min.js");?>"> 
<link rel="stylesheet" href="<?php echo base_url("frontend/js/resume_builder/template4/script.js");?>"> 
</html>