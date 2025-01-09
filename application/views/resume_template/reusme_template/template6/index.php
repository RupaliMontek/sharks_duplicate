<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="author" content="CodeHim">
      <title> Resume/CV Design Example </title>
      <!-- Style CSS -->
      <!-- Demo CSS (No need to include it into your project) -->
      <link rel="stylesheet" href="<?php echo base_url("frontend/css/resume_builder/template6/demo.css");?>">
      <link rel="stylesheet" href="<?php echo base_url("frontend/css/resume_builder/template6/style.css");?>">
      <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
   </head>
   <body>
      <!--$%adsense%$-->
         <!-- Start DEMO HTML (Use the following code into your project)-->
         <div class="resume">
   <div class="resume_left">
     <div class="resume_profile">
       <img src="<?php if(!empty($user_details)){ echo base_url($user_details[0]->image);} else { echo base_url("frontend/images/resume_builder/template1/resume-profile.png"); }?> " alt="profile_pic">
     </div>
     <div class="resume_content">
       <div class="resume_item resume_info">
         <div class="title">
           <p class="bold"><?php if(!empty($user_details)){ echo ucfirst(@$user_details[0]->name); } else{ ?>Stephen Colbert<?php } ?></p>
           <p id="resumeTitleJ" class="regular">Designer</p>
         </div>
         <ul>
           <li>
             <div class="icon">
               <i class="fas fa-map-signs"></i>
             </div>
             <div id="addressJ" class="data">
                <?php 
                                if(!empty(@$personal_details[0]->permanent_add && $personal_details[0]->hometown && $personal_details[0]->pincode  ))
                                { 
                                  echo @$personal_details[0]->permanent_add ."," .@$personal_details[0]->hometown ."," .@$personal_details[0]->pincode; 
                                } 
                                else
                                { 
                                   echo "21 Street, Texas"; 
                                } ?>
             </div>
           </li>
           <li>
             <div class="icon">
               <i class="fas fa-mobile-alt"></i>
             </div>
             <div id="contactNoJ" class="data">
              <?php  if(!empty($user_details)){ echo @$user_details[0]->contact; } else{ ?> +122 2345 3763 <?php } ?>
             </div>
           </li>
           <li>
             <div class="icon">
               <i class="fas fa-envelope"></i>
             </div>
             <div id="emailidJ" class="data">
              <?php if(!empty($user_details)){ echo @$user_details[0]->email; }  else{ ?> suppoet@smarteyeapps.com <?php } ?>
             </div>
           </li>
           <li>
             <div class="icon">
               <i class="fab fa-weebly"></i>
             </div>
             <div class="data">
               www.stephen.com
             </div>
           </li>
         </ul>
       </div>
       <div class="resume_item resume_skills">
         <div class="title">
           <p class="bold">skill's</p>
         </div>
         <ul>
        <?php 
            if (!empty($candidate_skils)):
            foreach($candidate_skils as $skill):
        ?>
        <li id="skillsJ5">
            <div class="skill_name">
               <?php echo htmlspecialchars($skill->skills); ?>
            </div>
            <div>
               <?php 
                    $fromDate = new DateTime($skill->from_date);
                    $toDate = new DateTime($skill->to_date);
                    $interval = $fromDate->diff($toDate);
                    $years = $interval->y;
                    $months = $interval->m; echo $years." and ".$months." months"; 
                ?>
            </div>
        </li>                    
                            
        <?php endforeach; else: ?>                    
                            
           <li id="skillsJ1">
             <div class="skill_name">
               HTML
             </div>
             <div class="skill_progress">
               <span style="width: 80%;"></span>
             </div>
             <div class="skill_per">80%</div>
           </li>
          <li id="skillsJ2">
             <div class="skill_name">
               CSS
             </div>
             <div class="skill_progress">
               <span style="width: 70%;"></span>
             </div>
             <div class="skill_per">70%</div>
           </li>
           <li id="skillsJ3">
             <div class="skill_name">
               SASS
             </div>
             <div class="skill_progress">
               <span style="width: 90%;"></span>
             </div>
             <div class="skill_per">90%</div>
           </li>
           <li id="skillsJ4">
             <div class="skill_name">
               JS
             </div>
             <div class="skill_progress">
               <span style="width: 60%;"></span>
             </div>
             <div class="skill_per">60%</div>
           </li>
           <li id="skillsJ5">
             <div class="skill_name">
               JQUERY
             </div>
             <div class="skill_progress">
               <span style="width: 88%;"></span>
             </div>
             <div class="skill_per">88%</div>
           </li>
        <?php endif; ?>                       
         </ul>
       </div>
       <div class="resume_item resume_social">
         <div class="title">
           <p class="bold">Social</p>
         </div>
         <ul>
        <?php 
                if(!empty($social_platform)):
			    foreach($social_platform as $row):
		      	if ($row->social_profile == "facebook"):
		?>  
			
			 <li>
             <div class="icon">
               <a href="<?= $row->social_platform_url; ?>"><i class="fab fa-facebook-square"></i></a>
             </div>
            </li>
           <?php 
			   endif;
			   if ($row->social_profile == "twitter"):
			?>
           <li>
             <div class="icon">
               <a href="<?= $row->social_platform_url; ?>"><i class="fab fa-twitter-square"></i></a>
             </div>
           </li>
           <?php 
			  endif;
			  if ($row->social_profile == "linkedin"):
		   ?>
           <li>
             <div class="icon">
               <a href="<?= $row->social_platform_url; ?>"><i class="fab fa-linkedin-square"></i></a>
             </div>
           </li>
           <?php endif;
		    if ($row->social_profile == "instagram"):
		    ?>
           <li>
             <div class="icon">
               <a href="<?= $row->social_platform_url; ?>"><i class="fab fa-instagram-square"></i></a>
             </div>
           </li>
           <?php 
			     endif;
			     if ($row->social_profile == "youtube"):
		    ?>
           
           <li>
             <div class="icon">
               <a href="<?= $row->social_platform_url; ?>"><i class="fab fa-youtube-square"></i></a>
             </div>
           </li>
           <?php 
			endif;
			if ($row->social_profile == "pinterest"):
			?>
			<li>
             <div class="icon">
               <a href="<?= $row->social_platform_url; ?>"><i class="fab fa-pinterest-square"></i></a>
             </div>
            </li>
            <?php 
			endif;
			if ($row->social_profile == "git"):
			?>
           
           
            <li>
             <div class="icon">
               <a href="<?= $row->social_platform_url; ?>"><i class="fab fa-git-square"></i></a>
             </div>
           </li>
           <?php 
			endif;
			if ($row->social_profile == "whatsapp"):
			?>
           <li>
             <div class="icon">
               <a href="<?= $row->social_platform_url; ?>"><i class="fab fa-whatsapp-square"></i></a>
             </div>
           </li>
           <?php 
			endif;
			if ($row->social_profile == "reddit"):
			?>
            <li>
             <div class="icon">
               <a href="<?= $row->social_platform_url; ?>"><i class="fab fa-reddit-square"></i></a>
             </div>
           </li>
           
            <?php 
			endif;
			if ($row->social_profile == "skype"):
			?>
           
             <li>
             <div class="icon">
               <a href="<?= $row->social_platform_url; ?>"><i class="fab fa-skype-square"></i></a>
             </div>
           </li>
			    
            <?php endif; endforeach; else: ?>
            <li>
             <div class="icon">
               <a href="#"><i class="fab fa-facebook-square"></i></a>
             </div>
            </li>
           
           <li>
             <div class="icon">
               <a href="#"><i class="fab fa-twitter-square"></i></a>
             </div>
           </li>
           
           <li>
             <div class="icon">
               <a href="#"><i class="fab fa-linkedin-square"></i></a>
             </div>
           </li>
           
           <li>
             <div class="icon">
               <a href="#"><i class="fab fa-instagram-square"></i></a>
             </div>
           </li>
           
           <li>
             <div class="icon">
               <a href="#"><i class="fab fa-git-square"></i></a>
             </div>
           </li>
           
           <li>
             <div class="icon">
               <a href="#"><i class="fab fa-youtube-square"></i></a>
             </div>
           </li>
           
           <li>
             <div class="icon">
               <a href="#"><i class="fab fa-whatsapp-square"></i></a>
             </div>
           </li>
           
            <li>
             <div class="icon">
               <a href="#"><i class="fab fa-reddit-square"></i></a>
             </div>
           </li>
           
             <li>
             <div class="icon">
               <a href="#"><i class="fab fa-skype-square"></i></a>
             </div>
           </li>
           
            <?php endif; ?>
            
          
         </ul>
       </div>
     </div>
  </div>
  <div class="resume_right">
    <div class="resume_item resume_about">
        <div class="title">
           <p class="bold">Profile</p>
         </div>
        <p id="ProfileJ"><?php if(!empty($profile_summary)): echo @$profile_summary->profile_summary; else: echo "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perspiciatis illo fugit officiis distinctio culpa officia totam atque exercitationem inventore repudiandae?"; endif; ?>"/p>
    </div>
    <div class="resume_item resume_work">
        <div class="title">
           <p class="bold">Work Experience</p>
         </div>
        <ul>
            
            <?php 
                if(!empty($employement_details)):
				foreach ($employement_details as $row):
			?>
			
			<li id="workExperience1J">
                <div class="date"><?php   if(!empty($row->emp_joining_month && $row->emp_joining_year)): echo $row->emp_joining_month." ".$row->emp_joining_year; else: endif;  if($row->emp_employment=="Yes"): echo "- Present"; else: echo $row->emp_joining_month." ".$row->emp_work_till_year; endif;?></div> 
                <div class="info">
                    <p class="semi-bold">
                    <?php if(!empty($row->emp_current_company_name)){ echo $row->emp_current_company_name; } else{ echo $row->emp_perv_company_name;  } if($row->emp_employment=="Yes"){ echo "Present"; } ?>
                    </p> 
                <p>
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
                </p>
                </div>
            </li>
			             
			<?php endforeach; else: ?>             
            <li id="workExperience1J">
                <div class="date">2013 - 2015</div> 
                <div class="info">
                    <p class="semi-bold">
                    <?php if(!empty($profile_summary)){ echo @$profile_summary->profile_summary; } else{ ?>Lorem ipsum dolor sit amet.</p> 
                    <p>Loremff ipsum dolor sit amet consectetur adipisicing elit. Nostrum, voluptatibus! <?php }?></p>
                </div>
            </li>
            <li id="workExperience2J">
              <div class="date">2015 - 2017</div>
              <div class="info">
                     <p class="semi-bold">Lorem ipsum dolor sit amet.</p> 
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum, voluptatibus!</p>
                </div>
            </li>
            <li id="workExperience3J">
              <div class="date">2017 - Present</div>
              <div class="info">
                     <p class="semi-bold">Lorem ipsum dolor sit amet.</p> 
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum, voluptatibus!</p>
                </div>
            </li>
           <?php endif; ?>        
        </ul>
    </div>
    <div class="resume_item resume_education">
      <div class="title">
           <p class="bold">Education</p>
         </div>
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
        
        <li id="educationJ1">
            <div class="date"><?= $year; ?></div> 
            <div class="info">
                 <p class="semi-bold"><?= $course_name; ?></p> 
              <p><?= $univercity_name; ?></p>
            </div>
        </li>
        
        <?php endforeach; else: ?>
            <li id="educationJ1">
                <div class="date">2010 - 2013</div> 
                <div class="info">
                     <p class="semi-bold">Web Designing (Texas University)</p> 
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum, voluptatibus!</p>
                </div>
            </li>
            <li id="educationJ2">
              <div class="date">2000 - 2010</div>
              <div class="info">
                     <p class="semi-bold">Texas International School</p> 
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum, voluptatibus!</p>
                </div>
            </li>
        <?php endif; ?>    
        </ul>
    </div>
   <div class="resume_item resume_work">
        <div class="title">
           <p class="bold">Projects</p>
         </div>
        <ul>
        <?php 
                if(!empty($candidate_project)):
				foreach($candidate_project as $project):
		?>
		<li id="project1J">
                <div class="date">
                    <?php echo $project->project_title ?> | 
                    <?php 
                        $dateObj = DateTime::createFromFormat('!m', $project->worked_from_month);
                        $from_month = $dateObj->format('F');
                        $dateObj1 = DateTime::createFromFormat('!m', $project->worked_till_month);
                        $till_month = $dateObj1->format('F');
                        echo $from_month." ".$project->worked_from_year." - ". $till_month." ".$project->worked_till_year." - " 
                    ?>
                </div> 
                <div class="info">
                     <p class="semi-bold">Project Details :- </b><?php echo $project->details_project;?></p> 
                </div>
        </li>
		
			            
		<?php endforeach; else: ?>
            <li id="project1J">
                <div class="date">Project 1 | Year 2021</div> 
                <div class="info">
                     <p class="semi-bold">Lorem ipsum dolor sit amet.</p> 
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum, voluptatibus!</p>
                </div>
            </li>
            <li id="project2J">
              <div class="date">Project 2 | Year 2022</div>
              <div class="info">
                     <p class="semi-bold">Lorem ipsum dolor sit amet.</p> 
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum, voluptatibus!</p>
                </div>
            </li>
            <li id="project3J">
              <div class="date">Project 3 | Year  2023</div>
              <div class="info">
                     <p class="semi-bold">Lorem ipsum dolor sit amet.</p> 
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum, voluptatibus!</p>
                </div>
            </li>
        <?php endif; ?>   
        </ul>
    </div>
     <div class="resume_item resume_hobby">
      <div class="title">
           <p class="bold">Personal Details</p>
         </div>
<div class="row bd-ro">
<div class="col-sm-12">Gender<span>:</span> <?php if(!empty($personal_details[0]->gender)): echo $personal_details[0]->gender; else: echo "Male";  endif;?></div>
</div>
<div class="row bd-ro"><div class="col-sm-12">Maritial Status<span>:</span><?php if(!empty($personal_details[0]->married_status)): echo $personal_details[0]->married_status; else: echo "Single";  endif;?></div>
</div>
<div class="row bd-ro">
<div class="col-sm-12">Date Of Birth<span>:</span><?php if(!empty($personal_details[0]->birth_date && $personal_details[0]->birth_month && $personal_details[0]->birth_year)): $dateObj = DateTime::createFromFormat('!m', $personal_details[0]->birth_month); $monthName = $dateObj->format('F');  echo sprintf('%02d',$personal_details[0]->birth_date)."-".$monthName."-".$personal_details[0]->birth_year; else: echo "19-April-1995"; endif;  ?></div>
</div>
<div class="row bd-ro">
<div class="col-sm-12">languages Known<span>:</span><?php 
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
</div>
         <!-- END EDMO HTML (Happy Coding!)-->
      <!-- Script JS -->
      <link rel="stylesheet" href="<?php echo base_url("frontend/css/resume_builder/template6/demo.css");?>">
      <script src="<?php echo base_url("frontend/js/resume_builder/template6/script.js");?>"></script>
      <!--$%analytics%$-->
   </body>
</html>