<!DOCTYPE html>
<html lang="en"> 
<head>
	<title>Resume Template 1</title>
	
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
	
	<!-- FontAwesome JS-->
	<script defer src="<?php echo base_url("frontend/css/resume_builder/template1/fontawesome/js/all.min.js");?>"></script>
	<link id="theme-style" href="<?php echo base_url("frontend/css/resume_builder/template1/devresume.css");?>" rel="stylesheet">
</head> 

<body>
	
	<div class="main-wrapper">
		<div class="container px-3 px-lg-5">
			<article class="resume-wrapper mx-auto theme-bg-light p-5 mb-5 my-5 shadow-lg">
				
				<div class="resume-header">
					<div class="row align-items-center">
						<div class="resume-title col-12 col-md-6 col-lg-8 col-xl-9">
							<h2 class="resume-name mb-0 text-uppercase"><?php if(!empty($user_details)){ echo @$user_details[0]->name; } else{ ?>Simon Doe<?php } ?></h2>
							<div id="resumeTitleJ" class="resume-tagline mb-3 mb-md-0"><?php if(!empty($employement_details)){ echo $employement_details[0]->emp_current_desigantion; } else{?>Senior Software Engineer<?php }?></div>
						</div><!--//resume-title-->
						<div class="resume-contact col-12 col-md-6 col-lg-4 col-xl-3">
							<ul class="list-unstyled mb-0">
								<li class="mb-2"><i class="fas fa-phone-square fa-fw fa-lg me-2 "></i><a id="contactNoJ" class="resume-link" href="tel:#"><?php  if(!empty($user_details)){ echo @$user_details[0]->contact; } else{ ?> 0123 4567 890 <?php } ?></a></li>
								<li class="mb-2"><i class="fas fa-envelope-square fa-fw fa-lg me-2"></i><a id="emailidJ" class="resume-link" href="mailto:#"><?php if(!empty($user_details)){ echo @$user_details[0]->email; }  else{ ?> simon@yourwebsite.com <?php } ?></a></li>
								<li class="mb-0"><i class="fas fa-map-marker-alt fa-fw fa-lg me-2"></i><a id="addressJ"><?php if(!empty(@$personal_details[0]
                                ->permanent_add && $personal_details[0]->hometown && $personal_details[0]->pincode  )){ echo @$personal_details[0]
                                ->permanent_add .
                                "/" .
                                @$personal_details[0]->hometown .
                                "/" .
                                @$personal_details[0]->pincode; } else{ ?> New York <?php } ?></a></li>
							</ul>
						</div><!--//resume-contact-->
					</div><!--//row-->
					
				</div><!--//resume-header-->
				<hr>
				<div class="resume-intro py-3">
					<div class="row align-items-center">
						<div class="col-12 col-md-3 col-xl-2 text-center">
						    <img class="resume-profile-image mb-3 mb-md-0 me-md-5  ms-md-0 rounded mx-auto" src="<?php if(!empty($user_details)){ echo base_url($user_details[0]->image);} else { echo base_url("frontend/images/resume_builder/template1/resume-profile.png"); }?>" alt="image">
						    
						</div>
						
						<div class="col text-start">
							<p id="ProfileJ" class="mb-0"><?php if(!empty($profile_summary)){ echo @$profile_summary->profile_summary; } else{ ?> Summarise your career here. You can make a PDF version of your resume using our free Sketch template here. Donec quam felis, ultricies nec, pellentesque eu. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.  Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh.<?php }?> </p>
						</div><!--//col-->
					</div>
				</div><!--//resume-intro-->
				<hr>
				<div class="resume-body">
					<div class="row">
						<div class="resume-main col-12 col-lg-8 col-xl-9   pe-0   pe-lg-5">
							<section class="work-section py-3">
								<h3 class="text-uppercase resume-section-heading mb-4">Work Experiences</h3>
								
						<?php 
						    if(!empty($employement_details)):
						    foreach ($employement_details as $row):
						    ?>
								<div id="workExperience1J" class="item mb-3">
									<div class="item-heading row align-items-center mb-2">
										<h4 class="item-title col-12 col-md-6 col-lg-8 mb-2 mb-md-0"><?php if(!empty($row->emp_current_desigantion)){ echo $row->emp_current_desigantion; } else{?>Senior Software Engineer<?php }?></h4>
										<div class="item-meta col-12 col-md-6 col-lg-4 text-muted text-start text-md-end"><?php if(!empty($row->emp_current_company_name)){ echo $row->emp_current_company_name; } else{ echo $row->emp_perv_company_name;  } ?></div>
										
									</div>
								</div><!--//item-->
								<?php endforeach; else : ?>
								<div id="workExperience1J" class="item mb-3">
									<div class="item-heading row align-items-center mb-2">
										<h4 class="item-title col-12 col-md-6 col-lg-8 mb-2 mb-md-0">Senior Software Engineer</h4>
										<div class="item-meta col-12 col-md-6 col-lg-4 text-muted text-start text-md-end">Google | 2023 - Present</div>
										
									</div>
									<div class="item-content">
										<p>Role description goes here ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Donec pede justo, fringilla vel. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis.</p>
										<ul class="resume-list">
											<li>Lorem ipsum dolor sit amet, consectetuer.</li>
											<li>Aenean commodo ligula eget dolor.</li>
											<li>Etiam ultricies nisi vel augue.</li>
										</ul>
									</div>
								</div><!--//item-->
								
								
								
								<div id="workExperience2J" class="item mb-3">
									<div class="item-heading row align-items-center mb-2">
										<h4 class="item-title col-12 col-md-6 col-lg-8 mb-2 mb-md-0">Lead Software Developer</h4>
										<div class="item-meta col-12 col-md-6 col-lg-4 text-muted text-start text-md-end">Apple | 2022 - 2023</div>
										
									</div>
									<div class="item-content">
										<p>Role description goes here ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Donec pede justo, fringilla vel.</p>
										<ul class="resume-list">
											<li>Lorem ipsum dolor sit amet, consectetuer.</li>
											<li>Aenean commodo ligula eget dolor.</li>
										</ul>
									</div>
								</div><!--//item-->
								<div id="workExperience3J" class="item mb-3">
									<div class="item-heading row align-items-center mb-2">
										<h4 class="item-title col-12 col-md-6 col-lg-8 mb-2 mb-md-0">Senior Software Developer</h4>
										<div class="item-meta col-12 col-md-6 col-lg-4 text-muted text-start text-md-end">Dropbox | 2020 - 2022</div>
										
									</div>
									<div class="item-content">
										<p>Role description goes here ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
									</div>
								</div><!--//item-->
								<div id="workExperience4J" class="item">
									<div class="item-heading row align-items-center mb-2">
										<h4 class="item-title col-12 col-md-6 col-lg-8 mb-2 mb-md-0">Senior Developer</h4>
										<div class="item-meta col-12 col-md-6 col-lg-4 text-muted text-start text-md-end">Uber | 2019 - 2020</div>
										
									</div>
									<div class="item-content">
										<p>Role description goes here ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus. </p>
									</div>
								</div><!--//item-->
								<?php endif;  ?>
							</section><!--//work-section-->

							
							<section class="project-section py-3">
								<h3 class="text-uppercase resume-section-heading mb-4">Projects</h3>
								<?php 
								if(!empty($candidate_project)):
								foreach($candidate_project as $project):
								?>
								
								<div id="project1J" class="item mb-3">
									<div class="item-heading row align-items-center mb-2">
										<h4 class="item-title col-12 col-md-6 col-lg-8 mb-2 mb-md-0"><?php echo $project->project_title ?></h4>
										<div class="item-meta col-12 col-md-6 col-lg-4 text-muted text-start text-md-end"><?php echo $project->employment_education ?></div>
										
									</div>
									<div class="item-content">
										<p><b>Project Details :- </b><?php echo $project->details_project; ?></p>
									</div>
								</div><!--//item-->
								
								<?php endforeach; else:  ?>
								<div id="project1J" class="item mb-3">
									<div class="item-heading row align-items-center mb-2">
										<h4 class="item-title col-12 col-md-6 col-lg-8 mb-2 mb-md-0">Project Lorem Ipsum</h4>
										<div class="item-meta col-12 col-md-6 col-lg-4 text-muted text-start text-md-end">Open Source</div>
										
									</div>
									<div class="item-content">
										<p>You can use this section for your side projects. You can <a href="#" class="theme-link">provide a project link here</a> as well. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
										
										
									</div>
								</div><!--//item-->
								
								
								<div id="project3J" class="item">
									<div class="item-heading row align-items-center mb-2">
										<h4 class="item-title col-12 col-md-6 col-lg-8 mb-2 mb-md-0">Project Praesent </h4>
										<div class="item-meta col-12 col-md-6 col-lg-4 text-muted text-start text-md-end">Open Source</div>
										
									</div>
									<div class="item-content">
										<p>You can use this section for your side projects. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
										
									</div>
								</div><!--//item-->
								<?php endif; ?>
							</section><!--//project-section-->	
						</div><!--//resume-main-->
						<aside class="resume-aside col-12 col-lg-4 col-xl-3 px-lg-4 pb-lg-4">
							<section class="skills-section py-3">
								<h3 class="text-uppercase resume-section-heading mb-4">Skills</h3>
								<div class="item">
									<ul class="list-unstyled resume-skills-list">
                                        <?php 
                                        if (!empty($candidate_skils)):
                                            foreach($candidate_skils as $skill): ?>
                                                <li id="skillsJ1" class="mb-2"><?php echo htmlspecialchars($skill->skills); ?></li>
                                            <?php endforeach; 
                                        endif; ?>
                                    </ul>
									</div><!--//item-->
									</section><!--//skills-section-->
									<section class="education-section py-3">
										<h3 class="text-uppercase resume-section-heading mb-4">Education</h3>
										<ul class="list-unstyled resume-education-list">
										     <?php if (!empty($education_details)):
                                              foreach ($education_details as $row): 
                                              $data = $this->M_Candidate_profile->get_all_education_details_specialization(@$row->specialization_course);
                                              if ($row->education == 5) {$data = $this->M_Candidate_profile->get_candidate_education($row->education); $course_name = $data[0]->main_course_name; $year = $row->passout_year;}
                                              if ($row->education == 4) {$data = $this->M_Candidate_profile->get_candidate_education($row->education); $course_name = $data[0]->main_course_name;  $univercity_name = $row->board; $year = $row->passout_year;}
                                              if ($row->education == 3) {$data = $this->M_Candidate_profile->get_all_education_details_specialization(@$row->specialization_course); $query = $this->db->query("select * from candidate_course where course_id = $row->course"); $course_details = $query->row(); $year = $row->course_start_year ."-" .$row->course_end_year; $course_name = @$course_details->course_name." ".$data->specialization_name; }
                                              if ($row->education == 2) {$query = $this->db->query("select * from candidate_course where course_id = $row->course"); $course_details = $query->row(); $univercity_name = $row->university_name; $year = $row->course_start_year ."-" .$row->course_end_year; $course_name = @$course_details->course_name ." " .@$data->specialization_name; }
                                              if ($row->education == 1) {$data = $this->M_Candidate_profile->get_all_education_details_specialization(@$row->specialization_course);  $data1 = $this->M_Candidate_profile->get_candidate_course(@$row->course); $course_name = $data1->course_name." ".@$data->specialization_name; $univercity_name = $row->university_name; $year = $row->course_start_year ."-" .$row->course_end_year;  }
                                               ?>
											<li id="educationJ1" class="mb-3">
												<div class="resume-degree font-weight-bold"><?= $course_name; ?></div>
												<div class="resume-degree-org text-muted"><?= $univercity_name; ?></div>
												<div class="resume-degree-time text-muted"><?= $year; ?></div>
											</li>
											<?php endforeach; endif; ?>
										</ul>
									</section><!--//education-section-->
									<section class="education-section py-3">
										<h3 class="text-uppercase resume-section-heading mb-4">Personal Details</h3>
										<ul class="list-unstyled resume-awards-list">
										    <li class="mb-3">
												<div class="font-weight-bold">Gender : </div>
												<div class="text-muted"><?php if(!empty($personal_details[0]->gender)): echo $personal_details[0]->gender; else: echo "Male";  endif;?></div>
											</li>
											<li class="mb-3">
												<div class="font-weight-bold"> Maritial Status : </div>
												<div class="text-muted"><?php if(!empty($personal_details[0]->married_status)): echo $personal_details[0]->married_status; else: echo "Single";  endif;?></div>
											</li>
											<li class="mb-3">
												<div class="font-weight-bold">Date Of Birth : </div>
												<div class="text-muted"><?php if(!empty($personal_details[0]->birth_date && $personal_details[0]->birth_month && $personal_details[0]->birth_year)): $dateObj = DateTime::createFromFormat('!m', $personal_details[0]->birth_month); $monthName = $dateObj->format('F');  echo sprintf('%02d',$personal_details[0]->birth_date)."-".$monthName."-".$personal_details[0]->birth_year; else: echo "19-April-1995"; endif;  ?></div>
											</li>
											<li class="mb-3">
												<div class="font-weight-bold">languages Known : </div>
												<div class="text-muted">
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
                                                    endif; ?>
                                                 </div>
											</li>
										</ul>
									</section><!--//education-section-->
								</aside><!--//resume-aside-->
							</div><!--//row-->
						</div><!--//resume-body-->
						<hr>
						<div class="resume-footer text-center">
	<ul class="resume-social-list list-inline mx-auto mb-0 d-inline-block text-muted">
	<?php 

		if(!empty($social_platform)):
			foreach($social_platform as $row): echo "ggggg"; ?>
			
			<?php if($row->social_profile=="facebook"): ?>
	            <li class="list-inline-item mb-lg-0 me-3">
                    <a class="resume-link" href="<?= $row->social_platform_url ?>">
                        <i class="fab fa-facebook-f fa-2x me-2"></i>
                    </a>
                </li>
            <?php elseif($row->social_profile=="twitter"): ?>    
                <li class="list-inline-item mb-lg-0 me-3">
                    <a class="resume-link" href="<?= $row->social_platform_url ?>">
                        <i class="fab fa-twitter fa-2x me-2"></i>
                    </a>
                </li>
            <?php elseif($row->social_profile=="linkedin"): ?>   
                <li class="list-inline-item mb-lg-0 me-3">
                    <a class="resume-link" href="<?= $row->social_platform_url ?>">
                        <i class="fab fa-linkedin-in fa-2x me-2"></i>
                    </a>
                </li>
            <?php elseif($row->social_profile=="instagram"): ?>       
                <li class="list-inline-item mb-lg-0 me-3">
                    <a class="resume-link" href="<?= $row->social_platform_url ?>">
                        <i class="fab fa-instagram fa-2x me-2"></i>
                    </a>
                </li>
            <?php elseif($row->social_profile=="youtube"): ?>     
                <li class="list-inline-item mb-lg-0 me-3">
                    <a class="resume-link" href="<?= $row->social_platform_url ?>">
                        <i class="fab fa-youtube fa-2x me-2"></i>
                    </a>
                </li>
            <?php elseif($row->social_profile=="pinterest"): ?>     
                <li class="list-inline-item mb-lg-0 me-3">
                    <a class="resume-link" href="<?= $row->social_platform_url ?>">
                        <i class="fab fa-pinterest-p fa-2x me-2"></i>
                    </a>
                </li>
            <?php elseif($row->social_profile=="whatsapp"): ?>     
                <li class="list-inline-item mb-lg-0 me-3">
                    <a class="resume-link" href="<?= $row->social_platform_url ?>">
                        <i class="fab fa-whatsapp fa-2x me-2"></i>
                    </a>
                </li>
            <?php elseif($row->social_profile=="reddit"): ?>     
                <li class="list-inline-item mb-lg-0 me-3">
                    <a class="resume-link" href="<?= $row->social_platform_url ?>">
                        <i class="fab fa-reddit fa-2x me-2"></i>                       
                    </a>
                </li>
            <?php elseif($row->social_profile=="git"): ?>         
                <li class="list-inline-item mb-lg-0 me-3">
                    <a class="resume-link" href="<?= $row->social_platform_url ?>">
                        <i class="fab fa-git fa-2x me-2"></i>
                    </a>
                </li>
            <?php elseif($row->social_profile=="skype"): ?>       
                <li class="list-inline-item mb-lg-0 me-3">
                    <a class="resume-link" href="<?= $row->social_platform_url ?>">
                        <i class="fab fa-skype fa-2x me-2" data-fa-transform="down-4"></i>
                    </a>
                </li>
            <?php endif; ?>          
		<?php endforeach; else:?>
	            <li class="list-inline-item mb-lg-0 me-3">
                    <a class="resume-link" href="#">
                        <i class="fab fa-facebook-f fa-2x me-2"></i>
                    </a>
                </li>
                <li class="list-inline-item mb-lg-0 me-3">
                    <a class="resume-link" href="#">
                        <i class="fab fa-twitter fa-2x me-2"></i>
                    </a>
                </li>
                <li class="list-inline-item mb-lg-0 me-3">
                    <a class="resume-link" href="#">
                        <i class="fab fa-linkedin-in fa-2x me-2"></i>
                    </a>
                </li>
                <li class="list-inline-item mb-lg-0 me-3">
                    <a class="resume-link" href="#">
                        <i class="fab fa-instagram fa-2x me-2"></i>
                    </a>
                </li>
                <li class="list-inline-item mb-lg-0 me-3">
                    <a class="resume-link" href="#">
                        <i class="fab fa-youtube fa-2x me-2"></i>
                    </a>
                </li>
                <li class="list-inline-item mb-lg-0 me-3">
                    <a class="resume-link" href="#">
                        <i class="fab fa-pinterest-p fa-2x me-2"></i>
                    </a>
                </li>
                <li class="list-inline-item mb-lg-0 me-3">
                    <a class="resume-link" href="#">
                        <i class="fab fa-whatsapp fa-2x me-2"></i>
                        <span class="d-none d-lg-inline-block text-muted">WhatsApp</span>
                    </a>
                </li>
                <li class="list-inline-item mb-lg-0 me-3">
                    <a class="resume-link" href="#">
                        <i class="fab fa-reddit fa-2x me-2"></i>
                    </a>
                </li>
                <li class="list-inline-item mb-lg-0 me-3">
                    <a class="resume-link" href="#">
                        <i class="fab fa-git fa-2x me-2"></i>
                    </a>
                </li>
                <li class="list-inline-item mb-lg-0 me-3">
                    <a class="resume-link" href="#">
                        <i class="fab fa-skype fa-2x me-2" data-fa-transform="down-4"></i>
                    </a>
                </li>
	   		<?php endif; ?>
	</ul>
</div><!--//resume-footer-->
</article>
</div><!--//container-->
</div><!--//main-wrapper-->
</body>
</html> 