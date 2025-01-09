<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Free Dental Medical Hospital Website Template | Smarteyeapps.com</title>

    <link rel="shortcut icon" href="assets/images/fav.jpg">
    <link rel="stylesheet" href="<?php echo base_url("frontend/css/resume_builder/template5/bootstrap.min.css");?>"> 
   <link rel="stylesheet" href="<?php echo base_url("frontend/css/font-awesome.min.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("frontend/css/resume_builder/template5/style.css");?>"> 
</head>
<body>
    <div class="container-fluid overcover">
        <div class="container profile-box">
            <div class="row top-prof">
                <div class="col-md-4 scov">
                     
                    <ul>
                        <li>
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
                                   echo "First Floor,Vincent Plaza, Toranto, Canada "; 
                                } ?>
                               </div>
                          </li>    
                               
                        <li>
                           <div class="icon">
                                    <i class="fa fa-mobile"></i> 
                               </div>
                               <div id="contactNoJ" class="detail">
                                    <?php  if(!empty($user_details)){ echo @$user_details[0]->contact; } else{ ?> +122 2345 3763 <?php } ?>
                               </div>
                           </li>
                        <li>
                         <div class="icon">
                                   <i class="fa fa-envelope"></i>
                               </div>
                               <div id="emailidJ" class="detail">
                                    <?php if(!empty($user_details)){ echo @$user_details[0]->email; }  else{ ?> suppoet@smarteyeapps.com <?php } ?>
                               </div>
                         </li>
                    </ul>
                      <div class="styl-bb"></div>
                </div>
                <div class="col-md-8">
                    <div class="row profile-go">
                        <div class="col-md-4">
                            <img src="<?php if(!empty($user_details[0]->image)): echo base_url($user_details[0]->image); else: echo base_url("frontend/images/resume_builder/template5/profile.jpg"); endif;?>" alt="">
                        </div>
                        <div class="col-md-8 datadiv">
                            <h2 id="resumeTitleJ"><?php if(!empty($user_details)){ echo ucfirst(@$user_details[0]->name); } else{ ?>Angelina Smith / Web Designer<?php } ?></h2>
                            <h5>Profile</h5>
                            <p id="ProfileJ"><?php if(!empty($profile_summary)): echo @$profile_summary->profile_summary; else: echo "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries"; endif; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row more-detail">
                <div class="col-md-5">
                    <div class="education">
                        <h3><i class="fa fa-user"></i> Education Details</h3>
                        <ul>
                            <?php if (!empty($education_details)):
                                foreach ($education_details as $row): 
                                $data = $this->M_Candidate_profile->get_all_education_details_specialization(@$row->specialization_course);
                                if ($row->education == 5) {$data = $this->M_Candidate_profile->get_candidate_education($row->education); $course_name = $data[0]->main_course_name; $year = $row->passout_year;}
                                if ($row->education == 4) {$data = $this->M_Candidate_profile->get_candidate_education($row->education); $course_name = $data[0]->main_course_name;  $univercity_name = $row->board; $year = $row->passout_year;}
                                if ($row->education == 3) {$data = $this->M_Candidate_profile->get_all_education_details_specialization(@$row->specialization_course); $query = $this->db->query("select * from candidate_course where course_id = $row->course"); $course_details = $query->row(); $year = $row->course_start_year ."-" .$row->course_end_year; $course_name = @$course_details->course_name." ".$data->specialization_name; }
                                if ($row->education == 2) {$query = $this->db->query("select * from candidate_course where course_id = $row->course"); $course_details = $query->row(); $univercity_name = $row->university_name; $year = $row->course_start_year ."-" .$row->course_end_year; $course_name = @$course_details->course_name ." " .@$data->specialization_name; }
                                if ($row->education == 1) {$data = $this->M_Candidate_profile->get_all_education_details_specialization(@$row->specialization_course);  $data1 = $this->M_Candidate_profile->get_candidate_course(@$row->course); $course_name = $data1->course_name." ".@$data->specialization_name; $univercity_name = $row->university_name; $year = $row->course_start_year ."-" .$row->course_end_year;  }
                            ?>
                            <li id="educationJ1"><b><?= $course_name; ?></b>
                            <p><?= $univercity_name; ?></p>
                            <span><?= $year; ?></span>
                            </li>
                            <?php endforeach; else: ?>
                            <li id="educationJ1"><b>Graphic Design</b>
                            <p>University of California</p>
                            <span>2014 - 2015</span>
                            </li>
                            <li id="educationJ2"><b>Multimedia Design</b>
                            <p>University of California</p>
                            <span>2013 - 2015</span>
                            </li>
                            <li id="educationJ3"><b>Master Digree</b>
                            <p>CSI Institute of Technology</p>
                            <span>2012 - 2012</span>
                            </li>
                            <li id="educationJ4"><b>Bachlore Digree</b>
                            <p>Cambrigd University</p>
                            <span>2010 - 2011</span>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="education">
                        <h3><i class="fa fa-briefcase"></i> Working Experiance</h3>
                        <ul>
                        <?php 
                              if(!empty($employement_details)):
				              foreach ($employement_details as $row):
			             ?>
			                    
			                <li id="workExperience1J"><?php if(!empty($row->emp_current_company_name)){ echo $row->emp_current_company_name; } else{ echo $row->emp_perv_company_name;  } ?>
			                <b>
			                <?php   
                            if (!empty($row->emp_current_desigantion))
                            {
                                echo $row->emp_current_desigantion;
                            } 
                            elseif (!empty($row->emp_perv_designation))   
                            {
                                 echo $row->emp_perv_designation;
                            }  
                            ?>
                            </b>
                            <span><?php   if(!empty($row->emp_joining_month && $row->emp_joining_year)): echo $row->emp_joining_month." ".$row->emp_joining_year; else: endif;  if($row->emp_employment=="Yes"): echo "- Present"; else: echo $row->emp_joining_month." ".$row->emp_work_till_year; endif;?></span>
                            </li>
			                    
			             <?php endforeach; else: ?>
                            <li id="workExperience1J"><b>Diamond Internationals</b>
                            <p>Lorem Ipsum is simply dummy text</p>
                            <span>2016 - 2016</span>
                            </li>
                            <li id="workExperience2J"><b>Fransis Enterpraises</b>
                            <p>make a type specimen book. </p>
                            <span>2016 - 2017</span>
                            </li>
                            <li id="workExperience3J"><b>Smateye Technologies</b>
                            <p>It has survived not only five</p>
                            <span>2018 - 2019</span>
                            </li>
                            <li id="workExperience4J"><b>Freelancer Designer</b>
                            <p>ever since the 1500s, when an unknown</p>
                            <span>2018 - 2019</span>
                            </li>
                        <?php endif; ?>    
                        </ul>
                    </div>
                </div>
                <div class="col-md-7">
                     <div class="education">
                        <h3><i class="fa fa-object-ungroup"></i> Profesional Skills</h3>
                        <div class="profess-cover">
                            
                            <?php if (!empty($candidate_skils)):
                                   foreach($candidate_skils as $skill):
                            ?>
                            <div id="skillsJ1" class="row prog-row">
                                <div class="col-sm-6">
                                    <?php echo htmlspecialchars($skill->skills); ?>
                                </div>
                                <div class="col-sm-6">
                                <div class="progress">
                                    <span class="alignright">
                                        <?php 
                                            $fromDate = new DateTime($skill->from_date);
                                            $toDate = new DateTime($skill->to_date);
                                            $interval = $fromDate->diff($toDate);
                                            $years = $interval->y;
                                            $months = $interval->m; echo $years." and ".$months." months"; 
                                        ?>
                                    </span>
                                </div>
                                </div>
                            </div>
                            
                            <?php endforeach; else: ?>
                            
                            
                                <div id="skillsJ1" class="row prog-row">
                                    <div class="col-sm-6">
                                        Photoshop
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="progress">
                                       <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    </div>
                                </div>
                                            
                                            
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
                    <div class="education">
                        <h3><i class="fa fa-file"></i> Projects</h3>
                        <ul>
                        <?php if(!empty($candidate_project)):
				              foreach($candidate_project as $project):
			            ?> 
			                <li style="width:100%;" id="project1J"><b><?php echo $project->project_title ?></b><br>
                            <span>
                                <?php 
                                    $dateObj = DateTime::createFromFormat('!m', $project->worked_from_month);
                                    $from_month = $dateObj->format('F');
                                    $dateObj1 = DateTime::createFromFormat('!m', $project->worked_till_month);
                                    $till_month = $dateObj1->format('F');
                                    echo $from_month." ".$project->worked_from_year." - ". $till_month." ".$project->worked_till_year." - " 
                                ?>
                            </span>
                            <p><b>Project Details :- </b><?php echo $project->details_project;?></p>
                            </li>
			            
			            <?php endforeach; else: ?>
                            <li style="width:100%;" id="project1J"><b>Project 1</b><br>
                            <span>2014 - 2015</span>
                            <p>Lorem ipsem is simply dummy text. Lorem ipsem is simply dummy text</p>
                            </li>
                            <li style="width:100%;" id="project2J"><b>Project 2</b><br>
                            <span>2014 - 2015</span>
                            <p>Lorem ipsem is simply dummy text. Lorem ipsem is simply dummy text</p>
                            </li>
                            <li style="width:100%;" id="project3J"><b>Project 3</b><br>
                            <span>2014 - 2015</span>
                            <p>Lorem ipsem is simply dummy text. Lorem ipsem is simply dummy text</p>
                            </li>
                        <?php endif; ?>   
                        </ul>
                    </div>
                    <div class="education">
                        <div class="education personal">
                        <h3><i class="fa fa-user"></i> Personal Detail</h3>
                        <div class="row bd-ro">
                            <div class="col-sm-6">
                                Gender
                                <span>:</span>
                            </div>
                            <div class="col-sm-6">
                                <?php if(!empty($personal_details[0]->gender)): echo $personal_details[0]->gender; else: echo "Male";  endif;?>
                            </div>
                        </div>
                        <div class="row bd-ro">
                            <div class="col-sm-6">
                              Maritial Status
                                <span>:</span>
                            </div>
                            <div class="col-sm-6">
                               <?php if(!empty($personal_details[0]->married_status)): echo $personal_details[0]->married_status; else: echo "Single";  endif;?>
                            </div>
                        </div>
                        <div class="row bd-ro">
                            <div class="col-sm-6">
                             Date Of Birth
                                <span>:</span>
                            </div>
                            <div class="col-sm-6">
                                <?php if(!empty($personal_details[0]->birth_date && $personal_details[0]->birth_month && $personal_details[0]->birth_year)): $dateObj = DateTime::createFromFormat('!m', $personal_details[0]->birth_month); $monthName = $dateObj->format('F');  echo sprintf('%02d',$personal_details[0]->birth_date)."-".$monthName."-".$personal_details[0]->birth_year; else: echo "19-April-1995"; endif;  ?>
                            </div>
                        </div>
                        <div class="row bd-ro">
                            <div class="col-sm-6">
                                languages Known
                                <span>:</span>
                            </div>
                            <div class="col-sm-6">
            <?php 
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
            endif; ?>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="education row no-margin activity">
                        <h3><i class="fa fa-object-ungroup"></i> Social</h3>
                        <ul class="frsocilalinksss" style="width: 100%; display: flex;">
                        <?php  
                        if(!empty($social_platform)):
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