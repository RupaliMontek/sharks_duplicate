<!DOCTYPE html>
<html>
<head>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow&family=Julius+Sans+One&family=Open+Sans&family=Source+Sans+Pro&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url("frontend/css/resume_builder/template3/style.css");?>"> 
</head>
<body>
  <page size="A4">
    <div class="container">
      <div class="leftPanel">
        <img src="<?php if(!empty($user_details)){ echo base_url($user_details[0]->image);} else { echo base_url("frontend/images/resume_builder/template3/avatar.png"); }?>"/>
        <div class="details">
          <div class="item bottomLineSeparator">
            <h2>
              CONTACT
            </h2>
            <div class="smallText">
              <p id="contactNoJ">
                <i class="fa fa-phone contactIcon" aria-hidden="true"></i>
                <?php  if(!empty($user_details)){ echo @$user_details[0]->contact; } else{ ?> (+33) 777 777 77 <?php } ?>
                
              </p>
              <p id="emailidJ">
                <i class="fa fa-envelope contactIcon" aria-hidden="true"></i>
                <a href="mailto:<?php if(!empty($user_details)){ echo @$user_details[0]->email; }  else{ ?> lorem@ipsum.com <?php } ?>">
                  <?php if(!empty($user_details)){ echo @$user_details[0]->email; }  else{ ?> lorem@ipsum.com <?php } ?>
                </a>
              </p>
              <p id="addressJ">
                <i class="fa fa-map-marker contactIcon" aria-hidden="true"></i>
                <?php if(!empty(@$personal_details[0]
                                ->permanent_add && $personal_details[0]->hometown && $personal_details[0]->pincode  )){ echo @$personal_details[0]
                                ->permanent_add .
                                "," .
                                @$personal_details[0]->hometown .
                                "," .
                                @$personal_details[0]->pincode; } else{ ?> New York, USA <?php } ?>
                    </p>
            <?php  if(!empty($social_platform)):
			   foreach($social_platform as $row): ?>
			   
			   <?php if ($row->social_profile == "facebook"): ?>       
			   <p class="lastParagrafNoMarginBottom">
			    <a id="facebookj" href="<?= $row->social_platform_url ?>">
                <i class="fa fa-facebook" aria-hidden="true"></i>
                </a></p>
                <?php endif; ?>
                <?php if ($row->social_profile == "twitter"): ?>      
                <p class="lastParagrafNoMarginBottom">
                <a id="twitterj" href="<?= $row->social_platform_url ?>">
                <i class="fa fa-twitter" aria-hidden="true"></i>
                </a></p>
                <?php endif; ?>
                <?php if ($row->social_profile == "linkedin"): ?>  
                 <p class="lastParagrafNoMarginBottom">
                <a id="linkedinj" href="<?= $row->social_platform_url ?>">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
                </p>
                <?php endif; ?>
                <?php if ($row->social_profile == "instagram"): ?>      
                 <p class="lastParagrafNoMarginBottom">
                <a id="instagramj" href="<?= $row->social_platform_url ?>">
                <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
                </p>
                <?php endif; ?>
                <?php if ($row->social_profile == "youtube"): ?>   
                 <p class="lastParagrafNoMarginBottom">
                <a id="youtubej" href="<?= $row->social_platform_url ?>">
                <i class="fa fa-youtube" aria-hidden="true"></i>
                </a>
                </p>
                <?php endif; ?>
                <?php if ($row->social_profile == "pinterest"): ?>   
                <p class="lastParagrafNoMarginBottom">
                <a id="pinterestj" href="<?= $row->social_platform_url ?>">
                <i class="fa fa-pinterest" aria-hidden="true"></i>
                </a>
                <?php endif; ?>
                <?php if ($row->social_profile == "whatsapp"): ?>  
                <p class="lastParagrafNoMarginBottom">
                <a id="whatsappj" href="<?= $row->social_platform_url ?>">
                <i class="fa fa-whatsapp" aria-hidden="true"></i>
                </a>
                <?php endif; ?>
                <?php if ($row->social_profile == "reddit"): ?>     
                <p class="lastParagrafNoMarginBottom">
                <a id="redditj" href="<?= $row->social_platform_url ?>">
                <i class="fa fa-reddit" aria-hidden="true"></i>
                </a>
                <?php endif; ?>
                <?php if ($row->social_profile == "git"): ?>       
                 <p class="lastParagrafNoMarginBottom">
                <a id="getj" href="<?= $row->social_platform_url ?>">
                <i class="fa fa-git" aria-hidden="true"></i>
                </a>
                <?php endif; ?>
                <?php if ($row->social_profile == "skype"): ?>         
                 <p class="lastParagrafNoMarginBottom">
                <a id="skypej" href="<?= $row->social_platform_url ?>">
                <i class="fa fa-skype" aria-hidden="true"></i>
                </a>
                <?php endif; ?>
              
			   <?php endforeach; else: ?>
              <p id="linkedinJ">
                <i class="fa fa-linkedin-square contactIcon" aria-hidden="true"></i>
                <a href="#">
                  in/loremipsum
                </a>
              </p>
              
              <p class="lastParagrafNoMarginBottom">
                <i class="fa fa-skype contactIcon" aria-hidden="true"></i>
                <a id="skypeJ" href="#">
                  loremipsum
                </a></p>
                
                <p class="lastParagrafNoMarginBottom">
                <i class="fa fa-facebook-f"></i>
                <a id="facebookJ" href="#">
                  loremipsum</a></p>
                  
                  
                  <p class="lastParagrafNoMarginBottom">
                <i class="fa fa-twitter"></i>
                <a id="twitterJ" href="#">
                  loremipsum</a></p>
                  
                  <p class="lastParagrafNoMarginBottom">
                <i class="fa fa-google-plus"></i>
                <a id="googlePlusJ" href="#">
                  loremipsum</a></p>
                  
                  <p class="lastParagrafNoMarginBottom">
                 <i class="fa fa-linkedin"></i>
                 <a id="linkedinJ" href="#">
                  loremipsum</a></p>
                  
                  <p class="lastParagrafNoMarginBottom">
                 <i class="fa fa-github"></i>
                 <a id="githubJ" href="#">
                  loremipsum</a>
              </p>
            <?php endif; ?>  
            </div>
          </div>
          <div class="item bottomLineSeparator">
            <h2>
              SKILLS
            </h2>
            <div class="smallText">
              <?php if (!empty($candidate_skils)):
                    foreach($candidate_skils as $skill): ?>
                    <div id="skillsJ1" class="skill">
                          <span><?php echo htmlspecialchars($skill->skills); ?></span>
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
        <?php   endforeach; 
                else:?>                        
                                            
              <div id="skillsJ1" class="skill">
                <div>
                  <span>Accounting</span>
                </div>
                <div class="yearsOfExperience">
                  <span class="alignright">14</span>
                  <span class="alignleft">years</span>
                </div>
              </div>

              <div id="skillsJ2" class="skill">
                <div>
                  <span>Word</span>
                </div>
                <div class="yearsOfExperience">
                  <span class="alignright">3</span>
                  <span class="alignleft">years</span>
                </div>
              </div>

              <div id="skillsJ3" class="skill">
                <div>
                  <span>Powerpoint</span>
                </div>
                <div class="yearsOfExperience">
                  <span class="alignright">3</span>
                  <span class="alignleft">years</span>
                </div>
              </div>

              <div id="skillsJ4" class="skill">
                <div>
                  <span>Accounting</span>
                </div>
                <div class="yearsOfExperience">
                  <span class="alignright">2</span>
                  <span class="alignleft">years</span>
                </div>
              </div>

              <div id="skillsJ5" class="skill">
                <div>
                  <span>Marketing</span>
                </div>
                <div class="yearsOfExperience">
                  <span class="alignright">2</span>
                  <span class="alignleft">years</span>
                </div>
              </div>

              <div id="skillsJ6" class="skill">
                <div>
                  <span>Photoshop</span>
                </div>
                <div class="yearsOfExperience">
                  <span class="alignright">2</span>
                  <span class="alignleft">years</span>
                </div>
              </div>

              <div id="skillsJ7" class="skill">
                <div>
                  <span>French</span>
                </div>
                <div class="yearsOfExperience">
                  <span class="alignright">2</span>
                  <span class="alignleft">years</span>
                </div>
              </div>

              <div id="skillsJ8" class="skill">
                <div>
                  <span>English</span>
                </div>
                <div class="yearsOfExperience">
                    <span class="alignright">1</span>
                    <span class="alignleft">year</span>
                </div>
              </div>

              <div id="skillsJ9" class="skill">
                <div>
                  <span>Management</span>
                </div>
                <div class="yearsOfExperience">
                  <span>1 year</span>
                </div>
              </div>
            <?php  endif; ?>
            </div>
          </div>
          <div class="item bottomLineSeparator">
            <h2>
              EDUCATION
            </h2>
            <?php if (!empty($education_details)):
                foreach ($education_details as $row): 
                $data = $this->M_Candidate_profile->get_all_education_details_specialization(@$row->specialization_course);
                if ($row->education == 5) {$data = $this->M_Candidate_profile->get_candidate_education($row->education); $course_name = $data[0]->main_course_name; $year = $row->passout_year;}
                if ($row->education == 4) {$data = $this->M_Candidate_profile->get_candidate_education($row->education); $course_name = $data[0]->main_course_name;  $univercity_name = $row->board; $year = $row->passout_year;}
                if ($row->education == 3) {$data = $this->M_Candidate_profile->get_all_education_details_specialization(@$row->specialization_course); $query = $this->db->query("select * from candidate_course where course_id = $row->course"); $course_details = $query->row(); $year = $row->course_start_year ."-" .$row->course_end_year; $course_name = @$course_details->course_name." ".$data->specialization_name; }
                if ($row->education == 2) {$query = $this->db->query("select * from candidate_course where course_id = $row->course"); $course_details = $query->row(); $univercity_name = $row->university_name; $year = $row->course_start_year ."-" .$row->course_end_year; $course_name = @$course_details->course_name ." " .@$data->specialization_name; }
                if ($row->education == 1) {$data = $this->M_Candidate_profile->get_all_education_details_specialization(@$row->specialization_course);  $data1 = $this->M_Candidate_profile->get_candidate_course(@$row->course); $course_name = $data1->course_name." ".@$data->specialization_name; $univercity_name = $row->university_name; $year = $row->course_start_year ."-" .$row->course_end_year;  }
                 ?>
            <div id="educationJ1" class="smallText">
              <p class="bolded white">
                <?= $course_name; ?>
              </p>
              <p>
                <?= $univercity_name; ?>
              </p>
              <p>
                <?= $year; ?>
              </p>
            </div>
        <?php echo""; endforeach; endif; ?>    
        </div>
          
          <div class="item">
            <h2>
              Personal Details
            </h2>
            <div id="PersonalDetailsJ" class="smallText">
              <p><b>Gender</b><br><?php if(!empty($personal_details[0]->gender)): echo $personal_details[0]->gender; else: echo "Male";  endif;?></p>
              <p><b>Maritial Status</b><br><?php if(!empty($personal_details[0]->married_status)): echo $personal_details[0]->married_status; else: echo "Single";  endif;?></p>
              <p><b>Date Of Birth</b><br><?php if(!empty($personal_details[0]->birth_date && $personal_details[0]->birth_month && $personal_details[0]->birth_year)): $dateObj = DateTime::createFromFormat('!m', $personal_details[0]->birth_month); $monthName = $dateObj->format('F');  echo sprintf('%02d',$personal_details[0]->birth_date)."-".$monthName."-".$personal_details[0]->birth_year; else: echo "19-April-1995"; endif;  ?></p>
              <p><b>languages Known</b><br>	<?php 
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
                </p>
            </div>
          </div>
        </div>
        
      </div>
      <div class="rightPanel">
        <div>
          <h1>
           <?php if(!empty($user_details)){ echo ucfirst(@$user_details[0]->name); } else{ ?>Jhon Doe<?php } ?>
          </h1>
          <div class="smallText">
            <h3 id ="resumeTitleJ">
            <?php  
                if(!empty($employement_details)):
					foreach ($employement_details as $row):  
					if($row->emp_employment=="Yes"): echo ucfirst(@$last_employment->emp_current_desigantion);
					endif;
					endforeach;
					else:
					    echo "Accountant";
				endif;
			?>
             
            </h3>
          </div>
        </div>
        <div>
          <h2>
           My Profile
          </h2>
          <div class="smallText">
            <p id="ProfileJ">
            <?php if(!empty($profile_summary)){ echo @$profile_summary->profile_summary; }
            else{ ?>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris venenatis, justo sed feugiat pulvinar., quam ipsum tincidunt enim, ac gravida est metus sit amet neque. Curabitur ut arcu ut nunc finibus accumsan id id elit. <?php } ?>
            </p>
            
          </div>
        </div>
        <div class="workExperience">
          <h2>
            Work experience
          </h2>
          <ul>
            <?php if(!empty($employement_details)){
				  foreach ($employement_details as $row)
				  {
			?>
			 <li id="workExperience1J">
              <div class="jobPosition">
                <span class="bolded">
                    
            <?php
                if (!empty($row->emp_current_desigantion))
                {
                   echo $row->emp_current_desigantion;
                } 
                elseif (!empty($row->emp_perv_designation))   
                {
                    echo $row->emp_perv_designation;
                } 
                else 
                {
                  echo 'Accountant';
                }
	
?>

                </span>
                <span>
                    
                    
                    <?php   if(!empty($row->emp_joining_month && $row->emp_joining_year)): echo $row->emp_joining_month." ".$row->emp_joining_year; else: endif;
                    
                    if($row->emp_employment=="Yes"): echo "- Present"; ?>
                    
                    <?php else: echo "Jun 2014 - Sept 2015"; endif;  ?>
                  
                </span>
              </div>
              <div class="projectName bolded">
                <span>
                  <?php if(!empty($row->emp_current_company_name)){ echo $row->emp_current_company_name; } else{ echo $row->emp_perv_company_name;  } ?>
                </span>
              </div>
            </li>
			<?php }}else { ?>
            <li id="workExperience1J">
              <div class="jobPosition">
                <span class="bolded">
                  Accountant
                </span>
                <span>
                  Jun 2014 - Sept 2015
                </span>
              </div>
              <div class="projectName bolded">
                <span>
                  Accounting project name | Company name
                </span>
              </div>
              <div class="smallText">
                <p>
                  Quisque rutrum mollis ornare. In pharetra diam libero, non interdum dui imperdiet quis. Quisque aliquam sapien in libero finibus sodales. Mauris id commodo metus. In in laoreet dolor.
                </p>
                <ul>
                  <li>
                    Integer commodo ullamcorper mauris, id condimentum lorem elementum sed. Etiam rutrum eu elit ut hendrerit. Vestibulum congue sem ac auctor semper. Aenean quis imperdiet magna. Sed eget ullamcorper enim. Vestibulum consequat turpis eu neque efficitur blandit sed sit amet neque. Curabitur congue semper erat nec blandit.
                  </li>
                </ul>
                <!--<p>
                  <span class="bolded">Skills: </span>Accounting, Word, Powerpoint
                </p>-->
              </div>
            </li>


            <li id="workExperience2J">
              <div class="jobPosition">
                <span class="bolded">
                  Digital Marketing Expert
                </span>
                <span>
                  Nov 2020 - Sept 2021
                </span>
              </div>
              <div class="projectName bolded">
                <span>
                  Project name | Company name
                </span>
              </div>
              <div class="smallText">
                <p>
                  Morbi rhoncus, tortor vel luctus tincidunt, sapien lacus vehicula augue, vitae ultrices eros diam eget mauris. Aliquam dictum nulla vel augue tristique bibendum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                </p>
                <ul>
                  <li>
                    <p>
                      Phasellus ac accumsan ligula. Morbi quam massa, pellentesque nec nunc nec, consectetur gravida dolor. Mauris vulputate sagittis pellentesque. Donec luctus lorem luctus purus condimentum, id ultrices lacus aliquam.
                    </p>
                  </li>
                  <li>
                    <p>
                      Quisque et lorem sagittis lacus lobortis euismod non id mi. Nulla sed tincidunt libero, placerat imperdiet magna. Quisque lectus quam, viverra eu congue ut, congue vitae metus. Sed in varius sapien. Cras et elementum tellus.
                    </p>
                  </li>
                </ul>
               <!-- <p>
                  <span class="bolded">Skills: </span> Writing, Photoshop
                </p>-->
              </div>
            </li>

            <li id="workExperience3J">
              <div class="jobPosition">
                <span class="bolded">
                  Accountant
                </span>
                <span>
                  Jun 2017 - May 2020
                </span>
              </div>
              <div class="projectName bolded">
                <span>
                  Project name | Company name
                </span>
              </div>
              <div class="smallText">
                <p>
                  Maecenas eget semper sapien. Sed convallis nunc egestas dui convallis dictum id nec metus. Donec vestibulum justo mauris, ac congue lacus tincidunt id. Vivamus rhoncus risus ac ex varius gravida. Donec eget ullamcorper ipsum.
                </p>
  
                <ul>
                  <li>
                    <p>
                      Maecenas auctor euismod felis vel semper. Nulla facilisi. Quisque quis odio dui. Morbi venenatis magna quis libero mollis facilisis. Ut semper, eros eu dictum efficitur, ligula felis aliquet ante, sed commodo odio nisi a augue. 
                    </p>
                  </li>
                  <li>
                    <p>
                      Curabitur at interdum nunc, nec sodales nulla. Nulla facilisi. Nam egestas risus sed maximus feugiat. Sed semper arcu ac dui consectetur consectetur. Nulla dignissim nec turpis id rhoncus. In hac habitasse platea dictumst. 
                    </p>
                  </li>
                  <li>
                    <p>
                      Nunc iaculis mauris nec viverra placerat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aliquam erat volutpat. Vivamus sed ex et magna volutpat sodales et sed odio. 
                    </p>
                  </li>
                </ul>
                <!--<p>
                  <span class="bolded">Skills: </span>Management, French
                </p>-->
              </div>
            </li>
            <?php } ?>
          </ul>
        </div>
        
        <div class="workExperience">
          <h2>
            Projects
          </h2>
          <ul>
           <?php if(!empty($candidate_project)):
				 foreach($candidate_project as $project):
			?>   
              <li id="project1J">
              <div class="jobPosition">
                <span class="bolded">
                  <?php echo $project->project_title ?>
                </span>
                <span>
                    <?php 
                            $dateObj = DateTime::createFromFormat('!m', $project->worked_from_month);
                            $from_month = $dateObj->format('F');
                            
                            $dateObj1 = DateTime::createFromFormat('!m', $project->worked_till_month);
                            $till_month = $dateObj1->format('F');
                            echo $from_month." ".$project->worked_from_year." - ". $till_month." ".$project->worked_till_year." - " 
                    ?>
                </span>
              </div>
              <div class="projectName bolded">
                <span>
                  <?php echo $project->employment_education ?>
                </span>
              </div>
              <div class="smallText">
                <p>
                    <b>Project Details :- </b><?php echo $project->details_project; ?>
                </p>
              </div>
            </li>
            
            <?php endforeach; else: ?>  
            <li id="project1J">
              <div class="jobPosition">
                <span class="bolded">
                  Project 1
                </span>
                <span>
                  Jun 2014 - Sept 2015
                </span>
              </div>
              <div class="projectName bolded">
                <span>
                  Accounting project name | Company name
                </span>
              </div>
              <div class="smallText">
                <p>
                  Quisque rutrum mollis ornare. In pharetra diam libero, non interdum dui imperdiet quis. Quisque aliquam sapien in libero finibus sodales. Mauris id commodo metus. In in laoreet dolor.
                </p>
              </div>
            </li>
            <li id="project2J">
              <div class="jobPosition">
                <span class="bolded">
                  Project 2
                </span>
                <span>
                  Nov 2020 - Sept 2021
                </span>
              </div>
              <div class="projectName bolded">
                <span>
                  Project name | Company name
                </span>
              </div>
              <div class="smallText">
                <p>
                  Morbi rhoncus, tortor vel luctus tincidunt, sapien lacus vehicula augue, vitae ultrices eros diam eget mauris. Aliquam dictum nulla vel augue tristique bibendum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                </p>
              </div>
            </li>
             <?php endif; ?>
          </ul>
        </div>
      </div>
    </div>
  </page>
</body>
</html>