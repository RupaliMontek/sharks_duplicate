<div class="container-fluid innerpagecontainer">
    <div class="container profileUpper">
        <div class="row">
            <div class="col-lg-8 col-sm-12 profileUpperInn">
                <div class="profiledetails">
                    <div class="frprofile">
                    <?php $progress_bar= 0; 
                    if(!empty($career_profile->preferred_work_location))
                    {
                    if(!empty($user_details[0]->resume))
                    {
                        $resume=20;
                        $progress_bar= $resume;                       
                        // print_r($progress_bar); die();
                    }
                    else
                    {
                        $resume=0;                        
                    }                        
                    if(!empty($career_profile->preferred_work_location))
                    {
                        $preferred_work_location = 2;
                        $progress_bar= @$resume+@$preferred_work_location;
                        // print_r($progress_bar); die();
                    }
                       
                    if(!empty($employement_details))
                    {
                        foreach($employement_details as $row)
                        {
                            if(!empty($row->emp_current_company_name && $row->emp_current_desigantion))
                            {
                               $candidate_designation_current_company = 10;
                               $progress_bar= @$resume+@$preferred_work_location+@$candidate_designation_current_company;
                                //   print_r($progress_bar); die();
                            }
                            else
                            {
                                $candidate_designation_current_company = 0;
                                 
                            }
                        }
                        
                    }
                            
                    if(!empty($career_profile->career_profile_department))   
                     {
                        $career_profile_department=10;
                        $progress_bar= @$resume+@$preferred_work_location+@$candidate_designation_current_company+@$career_profile_department;
                        // print_r($progress_bar); die();
                     } 
                     else
                     {
                        $career_profile_department = 0;
                        
                     }
                      
                     
                      if(!empty($career_profile->career_current_industry)) 
                      {
                          $career_current_industry=2;
                          $progress_bar= @$resume+@$preferred_work_location+@$candidate_designation_current_company+@$career_profile_department+@$career_current_industry;
                            // print_r($progress_bar); die(); 
                      }
                      else
                      {
                          $career_current_industry = 0;
                          
                      }
                      if(!empty($user_details[0]->image))
                      {
                          $profile_photo = 5;
                          $progress_bar= @$resume+@$preferred_work_location+@$candidate_designation_current_company+@$career_profile_department+@$career_current_industry+@$profile_photo;
                        //   print_r($progress_bar); die();  
                          
                      }
                      else
                      {
                          $profile_photo = 0;
                          
                      }
                      if(!empty($resume_headline))
                       {
                          $resume_headlines = 8;
                          $progress_bar= @$resume+@$preferred_work_location+@$candidate_designation_current_company+@$career_profile_department+@$career_current_industry+@$profile_photo+@$resume_headlines;
                        //   print_r($progress_bar); die();
                        }
                       else
                       {
                          $resume_headlines = 0;
                          
                       }
                     
                       
                      if(!empty($know_language))
                      {
                          $candidate_know_language = 2;
                          $progress_bar= @$resume+@$preferred_work_location+@$candidate_designation_current_company+@$career_profile_department+@$career_current_industry+@$profile_photo+@$resume_headlines+@$candidate_know_language;
                        //   print_r($progress_bar); die();
                        }
                      else
                      {
                          $candidate_know_language = 0;
                      } 
                      
                      if(!empty($education_details))
                       {
                          $education_detail = 10;
                          $progress_bar= @$resume+@$preferred_work_location+@$candidate_designation_current_company+@$career_profile_department+@$career_current_industry+@$profile_photo+@$resume_headlines+@$candidate_know_language+@$education_detail;
                        //   print_r($progress_bar); die();
                        }
                      else
                      {
                          $education_detail = 0;
                      }
                      
                      if(!empty($personal_details))
                      {
                          $personal_detail = 7;
                          $progress_bar= @$resume+@$preferred_work_location+@$candidate_designation_current_company+@$career_profile_department+@$career_current_industry+@$profile_photo+@$resume_headlines+@$candidate_know_language+@$education_detail+@$personal_detail;
                        //   print_r($progress_bar); die();
                        }
                      else
                      {
                          $personal_detail = 0;
                      }
                      
                      if(!empty($employement_details))
                      {
                          $employement_detail = 8;
                          $progress_bar= @$resume+@$preferred_work_location+@$candidate_designation_current_company+@$career_profile_department+@$career_current_industry+@$profile_photo+@$resume_headlines+@$candidate_know_language+@$education_detail+@$personal_detail+@$employement_detail;
                        //   print_r($progress_bar); die();
                        }
                      else
                      {
                          $employement_detail = 0;
                      }                    
                      
                     if(!empty($candidate_skils))
                       {
                          $key_skiil = 8;
                          $progress_bar= @$resume+@$preferred_work_location+@$candidate_designation_current_company+@$career_profile_department+@$career_current_industry+@$profile_photo+@$resume_headlines+@$candidate_know_language+@$education_detail+@$personal_detail+@$employement_detail+@$key_skiil;
                        //   print_r($progress_bar); die();
                        }
                      else
                      {
                           $key_skiil = 0;
                      }
                      
                     if(!empty($profile_summary))
                      {
                          $profile_summarys = 8;
                          $progress_bar= @$resume+@$preferred_work_location+@$candidate_designation_current_company+@$career_profile_department+@$career_current_industry+@$profile_photo+@$resume_headlines+@$candidate_know_language+@$education_detail+@$personal_detail+@$employement_detail+@$key_skiil+@$profile_summarys;
                        //   print_r($progress_bar); die();
                        }
                      else
                      {
                          $profile_summarys = 0;
                      }                     
                         
                    }
                    else
                    {
                        $preferred_work_location = 0;
                    }
                    
                    ?>        
                    
  <?php $profile_image = base_url($user_details[0]->image); ?>          
<?php
if($progress_bar==0)
{
   $progress_percentage = 1; 
}
else
{
   $progress_percentage = $progress_bar;
}

 ?>
<div class="circular-progress" data-inner-circle-color="white" data-percentage="<?= $progress_percentage; ?>" data-progress-color="blue" data-bg-color="lightgrey">
  <div class="inner-circle"><img  class="circular-image"  width="120" height="auto" src="<?php if(!empty($profile_image)){ echo $profile_image; } else{ echo base_url("frontend/images/profilepic.svg"); }?>">
  <a class="updateimggg" type="button" data-toggle="modal" data-target="#uploadPhoto"><i class="fa fa-solid fa-plus"></i> Add Photo</a></div>
  <p class="percentage">0%</p>
</div>

<script>const circularProgress = document.querySelectorAll(".circular-progress");

Array.from(circularProgress).forEach((progressBar) => {
  const progressValue = progressBar.querySelector(".percentage");
  const innerCircle = progressBar.querySelector(".inner-circle");
  let startValue = 0,
    endValue = Number(progressBar.getAttribute("data-percentage")),
    speed = 50,
    progressColor = progressBar.getAttribute("data-progress-color");

  const progress = setInterval(() => {
    startValue++;
    progressValue.textContent = `${startValue}%`;
    progressValue.style.color = `${progressColor}`;

    innerCircle.style.backgroundColor = `${progressBar.getAttribute(
      "data-inner-circle-color"
    )}`;

    progressBar.style.background = `conic-gradient(${progressColor} ${
      startValue * 3.6
    }deg,${progressBar.getAttribute("data-bg-color")} 0deg)`;
    if (startValue === endValue) {
      clearInterval(progress);
    }
  }, speed);
});</script>
            </div>    
                    <div class="profileTextt">
                        <h5><?php echo @$user_details[0]->name; ?><?php if(empty($resume_headline)){  ?> <!--<a type="button" class="btn btn-primary" data-toggle="modal" data-target="#ResumeHeadlines">Add Resume Headline</a>--><?php } else { ?> <i onclick="edit_candidate_basic_details()" style="color:blue" class="fa fa-pencil" aria-hidden="true"></i> <?php } ?></h5> 
                         
                        <div class="shortInfoo"><p><b><?php echo @$last_employment->emp_current_desigantion ?></b> <span><?php if(!empty($last_employment)) { echo "at"; } ?> <?php echo @$last_employment->emp_current_company_name; ?></span></p>
                        <p class="lastupTextt"><span class="lastupp">Profile last updated - <b><?php $timestamp = @$user_details[0]->last_update_profile_date;
                        if ($timestamp) 
                        {
                            $date = DateTime::createFromFormat('d-m-Y H:i:s', $timestamp);
                                    if ($date) 
                                    {
                                        $converted_date = $date->format('d-m-Y');
                                        echo $converted_date; // Output: 2024-02-12
                                    } 
                        }?>
                        </b></span></p>
                        </div>
                        
                        <div class="filledpoints">
                    <ul>
                        <li><i class="fa fa-map-marker"></i><?php { echo @$personal_details[0]->hometown; ?><?php } ?></li>
                        <li><i class="fa fa-briefcase"></i> <?php if(!empty($last_employment->total_exp_year) && !empty($last_employment->total_exp_month)){  echo $last_employment->total_exp_year." Years ".$remainingMonths." Months"; } else{ if(!empty($last_employment)){ echo @$totalYears." Years And ".@$remainingMonths." Months"; } }?> </li>
                        <li><i class="fa fa-money"></i><?php 
                        if(!empty(@$user_details[0]->emp_current_salary))
                        {
                            echo @$user_details[0]->emp_current_salary;
                        } 
                        else
                        {
                            echo @$last_employment->emp_current_salary;
                        } ?>
                        </li>
                    </ul>
                    <ul>
                        <li><i class="fa fa-phone"></i><?php
                        
                        echo  @$user_details[0]->contact; ?></li>
                        <li><i class="fa fa-envelope"></i><?php echo @$user_details[0]->email; ?></li>
                        <li><i class="fa fa-calendar"></i>
                        <?php
                        if(@$user_details[0]->emp_notice_period)
                        {
                            echo @$user_details[0]->emp_notice_period." Notice Period";
                        }
                        else{
                            
                            echo @$last_employment->emp_notice_period." Notice Period";
                        }?></li>
                    </ul>
                    <ul class="varifieddd">
                        <li><i class="fa fa-check-circle-o"></i></li>
                        <li><i class="fa fa-check-circle-o"></i></li>
                    </ul>
                </div>
                    </div>
                </div>
                
            </div>
<?php 
    $final_count = 0;
    $count=0;
    if(empty($profile_image))
    {
       $final_count = $final_count_profile_img = $count+1;
    } 
   
    if(empty($profile_summary))
    {
        $final_count = $profile_summary_count = @$final_count_profile_img+$count+1;
    }
    if(empty($know_language))
    {
        $final_count = @$know_languagecount = @$profile_summary_count+@$final_count_profile_img+$count+1;
    }
   
    if(empty($user_details[0]->resume))
    {
        $final_count = @$resume = @$profile_summary_count+@$final_count_profile_img+$count+$know_languagecount+1;
    }
    if(empty($user_details[0]->email))
    {
        $final_count = @$resume = @$profile_summary_count+@$final_count_profile_img+$count+$know_languagecount+$resume+1;
    } 
    
    
?>
    
       <div class="col-lg-4 col-sm-12 pendingAction">
                <div class="pendingActionInn">
                    <h5>
                        <!-- <?= $final_count; ?>  -->
                    Pending Action(s)</h5>
                    <ul>
                        <li>
                        <?php if(empty($user_details[0]->image)){ ?>
                        <li>
                            <a>Add Profile Photo</a>
                        </li>
                   <?php } ?>
                        </li>
                        <?php if(empty($profile_summary->profile_summary)){ ?>
                        <li>
                        <a> Add Profile Summery</a>
                        </li>
                        <?php }  
                        if(empty($know_language)){ ?>
                        <li>
                            <?php if(empty($know_language[0])){ ?>
                            <a>Add Personal details</a>
                    <?php } 
                        elseif(empty($personal_details[0])){ ?>
                            <a>Add Personal details</a>
                            <?php } ?>
                        </li>
                        <?php } ?>
                        
                    <?php if(empty($user_details[0]->resume)){ ?>
                        <li>
                            <a>Add Updated Resume</a>
                        </li>
                   <?php } ?>
                   <li>
                        <?php if(empty($career_profile)){ ?>
                        <li>
                            <a>Add Career Profile</a>
                        </li>
                   <?php } ?>
                        </li>
                        <li>
                        <?php if(empty($employement_details)){ ?>
                        <li>
                            <a>Add Employement Details</a>
                        </li>
                   <?php } ?>
                        </li>
                        <li>
                        <?php if(empty($education_details)){ ?>
                        <li>
                            <a>Add Education Details</a>
                        </li>
                   <?php } ?>
                        </li>
                        <li>
                        <?php if(empty($it_skills)){ ?>
                        <li>
                            <a>Add IT Skills</a>
                        </li>
                   <?php } ?>
                        </li>
                        <li>
                        <?php if(empty($candidate_project)){ ?>
                        <li>
                            <a>Add Project Details</a>
                        </li>
                   <?php } ?>
                        </li>
                        <li>
                        <?php if(empty($career_profile)){ ?>
                        <li>
                            <a>Add Career Details</a>
                        </li>
                   <?php } ?>
                   <li>
                        <?php 
                        if (empty($social_platform)) { ?>
                            <a>Add Accomplishments - Social Platforms details</a>
                        <?php 
                        } elseif (empty($work_samples)) { ?>
                            <a>Add Accomplishments - Work Samples</a>
                        <?php 
                        } elseif (empty($candidate_white_paper_journal_entry)) { ?>
                            <a type="button">Add Accomplishments - White Paper / Research Publication / Journal Entry details</a>
                        <?php 
                        } elseif (empty($candidate_presentation)) { ?>
                            <a>Add Accomplishments - Candidate Presentation</a>
                        <?php 
                        } elseif (empty($patent_details)) { ?>
                            <a>Add Accomplishments - Patent Details</a>
                        <?php 
                        } elseif (empty($certifications)) { ?>
                            <a>Add Accomplishments - Certifications</a>
                        <?php 
                        } ?>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div id="candidate_basic_details_edit"></div>
    <div class="container forprofile2ndcolumn">
        <div class="row">
            <div class="col-lg-3 col-sm-12">
                <div class="profileQuickLinks">
                    <ul>
                        <h5>Quick Links</h5>
                        <li><a href="#resume">Resume</a><a class="rightsidelink" href="#">UPDATE</a></li>
                        <li><a href="#ResumeHeadline">Resume Headline</a></li>
                        <li><a href="#KeySkill">Key Skills</a></li>
                        <li><a href="#Employment">Employment</a><a class="rightsidelink" type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddEmployment">ADD</a></li>
                        <li><a href="#Education">Education</a><a class="rightsidelink" type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddEducation">ADD</a></li>
                        <li><a href="#ITSkills">IT Skills</a><a class="rightsidelink" type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddITskills">ADD</a></li>
                        <li><a href="#Projects">Projects</a><a class="rightsidelink" type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddProject">ADD</a></li>
                        <?php if( empty($profile_summary))
                        { ?>
                        <li><a href="#ProfileSummary">Profile Summary</a><a class="rightsidelink" type="button" class="btn btn-primary" data-toggle="modal" data-target="#ProfileSummery">ADD</a></li>
                        <?php } ?>
                        <li><a href="#Accomplishments">Accomplishments</a></li>
                        <li><a href="#CareerProfile">Career Profile</a></li>
                        <li><a href="#PersonalDetails">Personal Details</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-sm-12 forallEditPopups">
                <div id="resume" class="profileResume">
                    <h5>Resume</h5>
                    <p class="paraleftalign">
                        Your resume is most important document, without resume recruiters not noticed that candidate. So, create your resume first.
                    </p>
                    <h6><?php if(!empty($user_details[0]->resume))
                    // print_r($user_details[0]->resume); die();
                    { 
                        $cleaned_resume_path = str_replace("uploads/resume/", "", $user_details[0]->resume);
                      echo $cleaned_resume_path;  ?>
                    <br><span>Uploaded on <?php
                    @$test1 = $user_details[0]->updated_at;
                    if(!empty($test1))
                    {
                    echo date("d/M/Y", strtotime($test1));
                    }
                    ?></span><?php } ?></h6>
                    <p class="resumelinkss">
                    <?php if(!empty($user_details[0]->resume)){ ?>
                    <a class="" target="_blank" href="<?php echo base_url('uploads/resume/').$user_details[0]->resume;?>">
                        <i class="fa fa-download"></i></a> 
                        <i onclick="deleteConfirm(<?php echo $user_details[0]->user_admin_id ;?>)" style="color:red;" class="fa fa-trash" aria-hidden="true"></i>
                    <?php } ?> </p>
                    <?php if(!empty($user_details[0]->resume))
                    { ?>
                   
                    <?php } ?>
                    <div class="updateResumee">
                        <form  method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <h5>Update Resume <i class="fa fa-hand-o-down"></i></h5>
                                <input type="file" class="form-control-file" id="resumes_upload" name="resumes_upload">
                                <input type="hidden" placeholder="Enter Name" name="resume_candidate" id="resume_candidate" value="<?php echo $user_details[0]
                                    ->resume; ?>">
                                <div id="uploadProgress"></div>
                                 <!--<span>Supported Formats: doc, docx, rtf, pdf, upto 2 MB</span> 
                                <button class="btn btn-primary" type="submit">Update Resume</button>-->
                            </div>
                        </form>
                    </div>
                </div>

                <div id="ResumeHeadline" class="profileResumebox">
                    <h5>Resume Headline 
                    <?php if(empty($resume_headline)){ ?> 
                    <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#ResumeHeadlines">Add Resume Headline</a>
                    <?php } 
                    else { ?> <i onclick="edit_resume_headilne_candidate_details(<?php echo $resume_headline->resume_headline_id; ?>)" style="color:blue" class="fa fa-pencil" aria-hidden="true"></i> <?php } ?></h5>
                    <p><?php echo @$resume_headline->resume_headline; ?></p>
                </div>
                
                <div id="KeySkill" class="profileResumebox">
                    <?php 
                    if(empty($candidate_skils)){ ?>
                    <h5>Key Skills <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#KeySkills">Add Key Skiils</a></h5>
                    <?php } else{  ?>
                    
                    
                     <h5>Key Skills
                     <i onclick="edit_ket_skills_candidate(<?php echo $candidate_skils[0]->candidate_id; ?>)" style="color:blue" class="fa fa-pencil" aria-hidden="true"></i> </h5>
                    <?php }if(!empty($candidate_skils)){
                    $skills = $candidate_skils;
                    ?>
                    <ul class="keyskills">
                        <?php foreach($skills as $row){ ?>
                        <li><?php echo $row->skills; ?></li>
                        <?php } ?>
                    </ul>
                    <?php  } ?>
                </div>

                <div id="Employment" class="profileResumebox">
                    <h5>Employment <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddEmployment">Add Employment</a></h5>
                    <?php foreach ($employement_details as $row) { ?>
                    <?php if (
                        $row->emp_employment == "Yes" &&
                        $row->emp_employment_type == "Full Time"
                    ) { ?>
                    <h6><?php echo $row->emp_current_desigantion; ?><i onclick="edit_employment_details(<?php echo $row->id; ?>)" style="color:blue" class="fa fa-pencil" aria-hidden="true"></i></h6>
                    <p><?php echo $row->emp_current_company_name; ?><br>
                        <?php echo $row->emp_employment_type .
                            " . " .
                            $row->emp_joining_month .
                            " " .
                            $row->emp_joining_year .
                            " Present"; ?><br>
                        <?php echo $row->emp_notice_period; ?> Notice Period<br>
                        <?php echo $row->emp_job_profile; ?><br>
                        <span><b>Top 5 Key Skills:</b></span><?php echo $row->emp_skill_used; ?> <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddEmployment"></a></p>
                    <hr>
                    <?php } ?>
                    <?php if (
                        $row->emp_employment == "No" &&
                        $row->emp_employment_type == "Full Time"
                    ) { ?>
                    <h6 class="heading"><?php echo $row->emp_perv_designation; ?>&nbsp;<i onclick="edit_employment_details(<?php echo $row->id; ?>)" style="color:blue" class="fa fa-pencil" aria-hidden="true"></i></h6>
                    <p><?php echo $row->emp_perv_company_name; ?></p>
                    <p><?php echo $row->emp_employment_type .
                        " " .
                        $row->emp_joining_month .
                        " " .
                        $row->emp_joining_year .
                        " " .
                        "To" .
                        " " .
                        $row->emp_work_till_month .
                        " " .
                        $row->emp_work_till_year; ?></p>
                    <p><?php echo $row->emp_job_profile; ?></p>
                    <hr>
                    <?php } ?>

                    <?php if (
                        $row->emp_employment == "Yes" &&
                        $row->emp_employment_type == "Internship"
                    ) { ?>
                    <h6  class="heading"><?php echo $row->intern_roles; ?>&nbsp;<i onclick="edit_employment_details(<?php echo $row->id; ?>)" style="color:blue" class="fa fa-pencil" aria-hidden="true"></i></h6>
                    <?php echo $row->emp_current_company_name; ?><br>
                    <?php echo $row->emp_employment_type .
                        " " .
                        $row->emp_joining_month .
                        " " .
                        $row->emp_joining_year .
                        " " .
                        "To" .
                        " " .
                        $row->emp_work_till_month .
                        " " .
                        $row->emp_work_till_year; ?><br>
                    <?php echo $row->emp_job_profile; ?>
                    <hr>
                    <?php } ?>

                    <?php if (
                        $row->emp_employment == "No" &&
                        $row->emp_employment_type == "Internship"
                    ) { ?>
                    <h6 class="heading"><?php echo $row->emp_perv_designation; ?>&nbsp;<i onclick="edit_employment_details(<?php echo $row->id; ?>)" style="color:blue" class="fa fa-pencil" aria-hidden="true"></i></h6>
                    <?php echo $row->emp_perv_company_name; ?><br>
                    <?php echo $row->emp_employment_type .
                        " " .
                        $row->emp_joining_month .
                        " " .
                        $row->emp_joining_year .
                        " " .
                        "To" .
                        " " .
                        $row->emp_work_till_month .
                        " " .
                        $row->emp_work_till_year; ?><br>
                    <?php echo $row->emp_job_profile; ?>
                    <hr>
                    <?php } ?>


                    <?php } ?>
                </div>

                <div id="Education" class="profileResumebox">
                    <h5>Education <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddEducation">ADD EDUCATION</a></h5>
                    <?php if (!empty($education_details)) {
                        foreach ($education_details as $row) { ?>
                           <?php $data = $this->M_Candidate_profile->get_all_education_details_specialization(
                               @$row->specialization_course
                           ); ?>

                    <?php if ($row->education == 5) {
                        $data = $this->M_Candidate_profile->get_candidate_education(
                            $row->education
                        ); ?>
                    <h6 class="heading"><?php echo $data[0]
                        ->main_course_name; ?>&nbsp;<i onclick="edit_education_details(<?php echo $row->id; ?>)" style="color:blue" class="fa fa-pencil" aria-hidden="true"></i></h6>
                    <p><?php echo $row->board; ?></p>
                    <p><?php echo $row->passout_year; ?></p>
                    <hr>
                    <?php
                    } ?>

                    <?php if ($row->education == 4) {
                    $data = $this->M_Candidate_profile->get_candidate_education(
                            $row->education
                        ); 
                    ?>
                    <h6 class="heading"><?php echo $data[0]
                        ->main_course_name; ?>&nbsp;<i onclick="edit_education_details(<?php echo $row->id; ?>)" style="color:blue" class="fa fa-pencil" aria-hidden="true"></i></h6>
                    <p><?php echo $row->board; ?></p>
                    <p><?php echo $row->passout_year; ?></p>
                    <hr>
                    <?php } ?>

                    <?php if ($row->education == 3) { ?>
                    <?php $data = $this->M_Candidate_profile->get_all_education_details_specialization(
                        @$row->specialization_course
                    ); ?>
                    <h6 class="heading"><?php 
                            $query = $this->db->query("select * from candidate_course where course_id = $row->course");
                            $course_details = $query->row();
                            echo @$course_details->course_name." ".$data->specialization_name; ?>&nbsp;<i onclick="edit_education_details(<?php echo $row->id; ?>)" style="color:blue" class="fa fa-pencil" aria-hidden="true"></i></h6>
                    <p><?php echo $row->university_name; ?></p>
                    <p><?php echo $row->course_start_year .
                        "-" .
                        $row->course_end_year .
                        " " .
                        $row->course_type; ?></p>
                    <hr>
                    <?php } ?>

                    <?php if ($row->education == 2) { ?>
                    <h6><?php 
                    $query = $this->db->query("select * from candidate_course where course_id = $row->course");
                    $course_details = $query->row();
                    echo @$course_details->course_name ." " .@$data->specialization_name; ?> &nbsp;<i onclick="edit_education_details(<?php echo $row->id; ?>)" style="color:blue" class="fa fa-pencil" aria-hidden="true"></i></h6>
                    <?php echo $row->university_name; ?><br>
                    <?php echo $row->course_start_year .
                        "-" .
                        $row->course_end_year .
                        " " .
                        $row->course_type; ?>
                    <hr>
                    <?php } ?>

                    <?php if ($row->education == 1) { ?>
                    <?php
                    $data = $this->M_Candidate_profile->get_all_education_details_specialization(
                        @$row->specialization_course
                    );
                    $data1 = $this->M_Candidate_profile->get_candidate_course(
                        @$row->course
                    );
                    ?>
                    <h6 class="heading"><?php echo $data1->course_name .
                        " " .
                        @$data->specialization_name; ?>&nbsp;<i onclick="edit_education_details(<?php echo $row->id; ?>)" style="color:blue" class="fa fa-pencil" aria-hidden="true"></i></h6>
                    <p><?php echo $row->university_name; ?></p>
                    <p><?php echo $row->course_start_year .
                        "-" .
                        $row->course_end_year .
                        " " .
                        $row->course_type; ?></p>
                    <hr>
                    <?php } ?>

                    <?php }
                    } ?>
                </div>
                                <div id="ITSkills" class="profileResumebox">
                    <h5>IT Skills <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddITskills">ADD Details</a></h5>
                    <p>Mention here programming languages (like Java, Python, C/C++, Oracle, SQL, etc.), software (Microsoft Word, Excel, Tally, etc.), or any other software related to your knowledge.</p>
                    <div class="forItSkillsTable">
                        <table>
  <tr>
    <th>Skills</th>
    <th>Version</th>
    <th>Last Used</th>
    <th>Experience</th>
    <th>&nbsp;</th>
  </tr>
  <?php foreach ($it_skills as $row) { ?>  
  <tr> 
    <td><?php echo $row->software_name; ?></td>
    <td><?php echo $row->software_version; ?></td>
    <td><?php echo $row->last_used; ?></td>
    <td><?php echo $row->exp_year .
        " " .
        "Year" .
        " " .
        $row->exp_month .
        " " .
        "Month"; ?></td>
    <td><i onclick="edit_it_skill_details(<?php echo $row->skill_id; ?>)" style="color:blue" class="fa fa-pencil" aria-hidden="true"></i></td> 
</tr> 
  <?php } ?>   
  
</table>
                    </div>

                </div>

                <div id="Projects" class="profileResumebox">
                    <h5>Projects  <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddProject">ADD Project</a></h5>
                    <p>Add details about projects you have done in college, internship or at work.</p>
                    <?php if(!empty($candidate_project)) 
                    {
                        foreach($candidate_project as $row)
                        { 
                         
                         $worked_from_month = $row->worked_from_month ;
                         if($worked_from_month==1)
                         {
                             $worked_from_month = "Jan";
                         }
                         if($worked_from_month==2)
                         {
                             $worked_from_month = "Feb";
                         }
                         if($worked_from_month==3)
                         {
                             $worked_from_month = "Mar";
                         }
                         if($worked_from_month==4)
                         {
                             $worked_from_month = "Apr";
                         }
                         if($worked_from_month==5)
                         {
                             $worked_from_month = "May";
                         }
                         if($worked_from_month==6)
                         {
                             $worked_from_month = "Jun";
                         }
                         if($worked_from_month==7)
                         {
                             $worked_from_month = "Jul";
                         }
                         if($worked_from_month==8)
                         {
                             $worked_from_month = "Aug";
                         }
                         if($worked_from_month==9)
                         {
                             $worked_from_month = "Sep";
                         }
                         if($worked_from_month==10)
                         {
                             $worked_from_month = "Oct";
                         }
                         if($worked_from_month==11)
                         {
                             $worked_from_month = "Nov";
                         }
                         if($worked_from_month==12)
                         {
                             $worked_from_month = "Dec";
                         }
                         
                         
                        if(!empty($row->worked_till_month))
                        { 
                         $worked_till_month = $row->worked_till_month ;
                         if($worked_till_month==1)
                         {
                             $worked_till_month = "Jan";
                         }
                         if($worked_till_month==2)
                         {
                             $worked_till_month = "Feb";
                         }
                         if($worked_till_month==3)
                         {
                             $worked_till_month = "Mar";
                         }
                         if($worked_till_month==4)
                         {
                             $worked_till_month = "Apr";
                         }
                         if($worked_till_month==5)
                         {
                             $worked_till_month = "May";
                         }
                         if($worked_till_month==6)
                         {
                             $worked_till_month = "Jun";
                         }
                         if($worked_till_month==7)
                         {
                             $worked_till_month = "Jul";
                         }
                         if($worked_till_month==8)
                         {
                             $worked_till_month = "Aug";
                         }
                         if($worked_till_month==9)
                         {
                             $worked_till_month = "Sep";
                         }
                         if($worked_till_month==10)
                         {
                             $worked_till_month = "Oct";
                         }
                         if($worked_till_month==11)
                         {
                             $worked_till_month = "Nov";
                         }
                         if($worked_till_month==12)
                         {
                             $worked_till_month = "Dec";
                         }
                        }
                        ?>
                        <span><b><?php echo $row->project_title ?></b><i onclick="edit_project_candidate_details(<?php echo $row->candidate_project_id; ?>)" style="color:blue" class="fa fa-pencil" aria-hidden="true"></i></span><br>
                        <span><?php echo $row->client ?></span><br>
                        <span><?php echo $worked_from_month." ".$row->worked_from_year; if(empty($row->worked_till_year)){echo "Present"; } else{ echo " To ".$worked_till_month." ".$row->worked_till_year; } ?></span><br>
                        <span><?php echo $row->details_project ?></span><br>
                            
                      <?php } }?>
                   

                    <hr>
                </div>

                <div id="ProfileSummary" class="profileResumebox">
                    <h5>Profile Summary </h5><i onclick="edit_profile_summary_details(<?php echo @$profile_summary->profile_summary_id; ?>)" style="color:blue" class="fa fa-pencil" aria-hidden="true"></i><?php if (
    empty($profile_summary)
) { ?> <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#ProfileSummery"> ADD Profile Summery</a>
                    <?php } ?>
                    <p><?php echo @$profile_summary->profile_summary; ?></p>
                </div>

                <div id="Accomplishments" class="profileResumebox">
                    <h5>Accomplishments</h5>
                    <h6>Online Profile <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#OnlineProfile">ADD</a></h6>
                    If you have Online profiles add here (e.g. Linkedin, Facebook etc.).
                    <?php foreach ($social_platform as $row) { ?>
                        <h6><?php echo $row->social_profile; ?><i onclick="edit_online_profile_details(<?php echo $row->social_platform_candidate_id; ?>)" style="color:blue" class="fa fa-pencil" aria-hidden="true"></i></h6>
                    <a href="<?php echo $row->social_platform_url; ?>"><?php echo $row->social_platform_url; ?></a>
                    <br>
                    <?php echo $row->social_profile_description; ?><br><br>
                    <?php } ?>
                    <hr>
                    <h6>Work Sample <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#WorkSample">ADD</a></h6>
                    <p>If you've done any projects, add them here (e.g., Github links, etc.).</p>
                    <?php foreach ($work_samples as $row) {

                        if ($row->start_duration_month == 1) {
                            $start_month = "Jan";
                        } elseif ($row->start_duration_month == 2) {
                            $start_month = "Feb";
                        } elseif ($row->start_duration_month == 3) {
                            $start_month = "Mar";
                        } elseif ($row->start_duration_month == 4) {
                            $start_month = "Apr";
                        } elseif ($row->start_duration_month == 5) {
                            $start_month = "May";
                        } elseif ($row->start_duration_month == 6) {
                            $start_month = "Jun";
                        } elseif ($row->start_duration_month == 7) {
                            $start_month = "Jul";
                        } elseif ($row->start_duration_month == 8) {
                            $start_month = "Aug";
                        } elseif ($row->start_duration_month == 9) {
                            $start_month = "Sep";
                        } elseif ($row->start_duration_month == 10) {
                            $start_month = "Oct";
                        } elseif ($row->start_duration_month == 11) {
                            $start_month = "Nov";
                        } elseif ($row->start_duration_month == 12) {
                            $start_month = "Dec";
                        }

                        if ($row->end_duration_month == 1) {
                            $end_month = "Jan";
                        } elseif ($row->end_duration_month == 2) {
                            $end_month = "Feb";
                        } elseif ($row->end_duration_month == 3) {
                            $end_month = "Mar";
                        } elseif ($row->end_duration_month == 4) {
                            $end_month = "Apr";
                        } elseif ($row->end_duration_month == 5) {
                            $end_month = "May";
                        } elseif ($row->end_duration_month == 6) {
                            $end_month = "Jun";
                        } elseif ($row->end_duration_month == 7) {
                            $end_month = "Jul";
                        } elseif ($row->end_duration_month == 8) {
                            $end_month = "Aug";
                        } elseif ($row->end_duration_month == 9) {
                            $end_month = "Sep";
                        } elseif ($row->end_duration_month == 10) {
                            $end_month = "Oct";
                        } elseif ($row->end_duration_month == 11) {
                            $end_month = "Nov";
                        } elseif ($row->end_duration_month == 12) {
                            $end_month = "Dec";
                        }
                        ?>

                    <h6><?php echo $row->work_title; ?><i onclick="edit_work_candidate_details(<?php echo $row->work_id; ?>)" style="color:blue" class="fa fa-pencil" aria-hidden="true"></i></h6>
                    <a href="<?php echo $row->work_url; ?>"><?php echo $row->work_url; ?></a>
                    <br>
                    <b>Duration:</b>  <?php echo $start_month .
                        " " .
                        $row->start_duration_year .
                        "-" .
                        $end_month .
                        " " .
                        $row->end_duration_year; ?> <br>
                    <?php echo $row->descriptios_work_sample; ?>
                    <?php
                    } ?>
                    <hr>
                    <h6>White Paper / Research Publication / Journal Entry <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#WhitePaper">ADD</a></h6>
                    <p>Add links to your Online publications.</p>
                    <?php foreach ($candidate_white_paper_journal_entry as $row) { ?>

                    <span><?php echo $row->white_paper_research_publication_title; ?><i onclick="edit_white_paper_research_publication_journal_entry(<?php echo $row->white_paper_research_publication_id; ?>)" style="color:blue" class="fa fa-pencil" aria-hidden="true"></i></span><br>
                    <span><?php
                    $months = $row->white_paper_research_publication_publish_month ;
                    if($months==1)
                    {
                        $month = "Jan";
                    }
                    if($months==2)
                    {
                        $month = "Feb";
                    }
                    if($months==3)
                    {
                        $month = "Mar";
                    }
                    if($months==4)
                    {
                        $month = "Apr";
                    }
                    if($months==5)
                    {
                        $month = "May";
                    }
                    if($months==6)
                    {
                        $month = "Jun";
                    }
                    if($months==7)
                    {
                        $month = "Jul";
                    }
                    if($months==8)
                    {
                        $month = "Aug";
                    }
                    if($months==9)
                    {
                        $month = "Sep";
                    }
                    if($months==10)
                    {
                        $month = "Oct";
                    }
                    if($months==11)
                    {
                        $month = "Nov";
                    }
                    if($months==12)
                    {
                        $month = "Dec";
                    }
                    echo "Published on ".$month." ".$row->white_paper_research_publication_publish_year;
                    ?></span><br>
                    <span><a href="<?php echo $row->white_paper_research_publication_url; ?>" ><?php echo $row->white_paper_research_publication_url; ?></a></span><br>
                    <span><?php echo $row->white_paper_research_publication_publish_dec; ?></span><br><br>    
                        
                   <?php } ?>
                    <hr>
                    <h6>Presentation <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#Presentation">ADD</a></h6>
                    <p>Add links to your Online presentations (e.g. Slideshare presentation links etc.).</p>
                    <?php foreach ($candidate_presentation as $row) { ?>

                    <span><?php echo $row->presentation_title; ?><i onclick="edit_presentation_candidate_details(<?php echo $row->presentation_id; ?>)" style="color:blue" class="fa fa-pencil" aria-hidden="true"></i></span><br>
                    <span><a href="<?php echo $row->url; ?>" ><?php echo $row->url; ?></a></span><br>
                    <span><?php echo $row->description; ?></span><br><br>    
                        
                   <?php } ?>
                                   
                    <hr>
                    <h6>Patent <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#Patent">ADD</a></h6>
                    <p>Add details of Patents you have filed.</p>
                    <?php if(!empty($patent_details)){ foreach($patent_details as $row){ ?>
                    <span><b><?php echo $row->patent_title ?></b><i onclick="edit_patent_candidate_details(<?php echo $row->patent_id; ?>)" style="color:blue" class="fa fa-pencil" aria-hidden="true"></i></span><br>
                    <span><?php echo $row->patent_url ?></span><br>
                    <span><?php echo $row->patent_office ?></span><br>                    
                    <span><?php echo $row->application_no ?></span><br>
                    <span><?php echo $row->patent_description ?></span><br>
                    <?php } }?>

                    <hr>
                    <h6>Certification <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#Certifications">ADD</a></h6>
                    <p>Add details of Certifications you have achieved/completed</p>
                    <?php foreach ($certifications as $row) {

                        if ($row->cerificate_validity_start_month == 1) {
                            $start_month = "Jan";
                        } elseif ($row->cerificate_validity_start_month == 2) {
                            $start_month = "Feb";
                        } elseif ($row->cerificate_validity_start_month == 3) {
                            $start_month = "Mar";
                        } elseif ($row->cerificate_validity_start_month == 4) {
                            $start_month = "Apr";
                        } elseif ($row->cerificate_validity_start_month == 5) {
                            $start_month = "May";
                        } elseif ($row->cerificate_validity_start_month == 6) {
                            $start_month = "Jun";
                        } elseif ($row->cerificate_validity_start_month == 7) {
                            $start_month = "Jul";
                        } elseif ($row->cerificate_validity_start_month == 8) {
                            $start_month = "Aug";
                        } elseif ($row->cerificate_validity_start_month == 9) {
                            $start_month = "Sep";
                        } elseif ($row->cerificate_validity_start_month == 10) {
                            $start_month = "Oct";
                        } elseif ($row->cerificate_validity_start_month == 11) {
                            $start_month = "Nov";
                        } elseif ($row->cerificate_validity_start_month == 12) {
                            $start_month = "Dec";
                        }

                        if ($row->cerificate_validity_end_month == 1) {
                            $end_month = "Jan";
                        } elseif ($row->cerificate_validity_end_month == 2) {
                            $end_month = "Feb";
                        } elseif ($row->cerificate_validity_end_month == 3) {
                            $end_month = "Mar";
                        } elseif ($row->cerificate_validity_end_month == 4) {
                            $end_month = "Apr";
                        } elseif ($row->cerificate_validity_end_month == 5) {
                            $end_month = "May";
                        } elseif ($row->cerificate_validity_end_month == 6) {
                            $end_month = "Jun";
                        } elseif ($row->cerificate_validity_end_month == 7) {
                            $end_month = "Jul";
                        } elseif ($row->cerificate_validity_end_month == 8) {
                            $end_month = "Aug";
                        } elseif ($row->cerificate_validity_end_month == 9) {
                            $end_month = "Sep";
                        } elseif ($row->cerificate_validity_end_month == 10) {
                            $end_month = "Oct";
                        } elseif ($row->cerificate_validity_end_month == 11) {
                            $cerificate_validity_end_month = "Nov";
                        } elseif ($row->cerificate_validity_end_month == 12) {
                            $end_month = "Dec";
                        }
                        ?>
                    <span><?php echo $row->certificate_name; ?><i onclick="edit_certificate_candidate_details(<?php echo $row->certificate_id; ?>)" style="color:blue" class="fa fa-pencil" aria-hidden="true"></i></span><br>
                    <span><?php echo $row->certification_provider; ?></span><br> 
                    <span><a href="<?php echo $row->certification_url; ?>"><?php echo $row->certification_url; ?></a></span><br>  
                    <span><b>Validity:</b> <?php echo $start_month .
                        " " .
                        @$row->cerificate_validity_start_year .
                        " " .
                        "to" .
                        " " .
                        @$row->cerificate_validity_end_month .
                        " " .
                        $row->cerificate_validity_end_year; ?></span><br><br>      
                    <?php
                    } ?>
                </div>

                <div class="career_profile_edit" id="career_profile_edit"></div>
                <div id="CareerProfile" class="profileResumebox">
                    <h5>Career Profile <?php
                    if (
                        $career_pro < 1
                    ) { ?><a type="button" class="btn btn-primary" data-toggle="modal" data-target="#CareerProfiles">ADD CAREER PROFILE</a><?php }
                    if ($career_pro > 1) { ?> <?php }
                    ?> <?php if(!empty($career_profile)) { ?><a><i onclick="edit_carrer_profile_details(<?php echo @$career_profile->career_profile_Id; ?>)" class="fa fa-pencil"></i></a> <?php } ?> </h5>
                    <div class="careerProfile">
                        <ul>
                            <li><b>Current Industry</b><br><?php echo @$career_profile->career_current_industry; ?></li>
                            <li><b>Role Category</b><br><?php echo @$career_profile->career_category; ?></li>
                            <li><b>Desired Job Type</b><br><?php echo @$career_profile->career_employment_type; ?></li>
                            <li><b>Preferred Shift</b><br><?php echo @$career_profile->career_preferred_shift; ?></li>
                            <li><b>Expected Salary</b><br><?php echo @$career_profile->expected_salary; ?></li>
                        </ul>
                        <ul>
                            <li><b>Department</b><br><?php echo @$career_profile->career_profile_department; ?></li>
                            <li><b>Job Role</b><br><?php echo @$career_profile->career_job_role; ?></li>
                            <li><b>Desired Employment Type</b><br><?php echo @$career_profile->career_employment_type; ?></li>
                            <li><b>Preferred Work Location</b><br><?php
                            if(!empty($career_profile->preferred_work_location)){
                            $cities = $this->M_Candidate_profile->get_all_cities_candidate_preferred(
                                $career_profile->preferred_work_location
                            );
                            foreach ($cities as $city) {
                                echo $city->city_name . "," . " ";
                            }
                            }
                            ?>
                            </li>
                        </ul>
                    </div>
                </div>


                <div id="PersonalDetails" class="profileResumebox">
                    <h6>Personal Details<a type="button" class="btn btn-primary" data-toggle="modal"> <?php if(empty($personal_details[0])){ ?> <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#PersonalDetailssss">ADD PERSONAL DETAILS</a> <?php } else{ ?><i onclick="edit_personal_details(<?php echo @$personal_details[0]->personal_id ?>)" style="color:blue" class="fa fa-pencil" aria-hidden="true"></i> <?php } ?></a></h6>
                    <div class="careerProfile">
                        <ul>
                            <li><b>Personal</b><br><?php 
                            if(!empty(@$personal_details[0]
                                ->gender) && !empty(@$personal_details[0]->married_status)){
                            echo @$personal_details[0]
                                ->gender .
                                "," .
                                @$personal_details[0]->married_status; }?></li>
                            <li><b>Category</b><br>
                                <?php echo @$personal_details[0]
                                    ->cat_candidate; ?></li>
                            <li><b>Career Break</b><br>
                                <?php echo @$personal_details[0]
                                    ->career_break; ?>    
                            </li>
                            
                        </ul>
                        <ul>
                            <li><b>Date of Birth</b><br><?php if(!empty(@$personal_details[0]
                                ->birth_date && $personal_details[0]->birth_month && $personal_details[0]->birth_year )){ echo @$personal_details[0]
                                ->birth_date .
                                "/" .
                                @$personal_details[0]->birth_month .
                                "/" .
                                @$personal_details[0]->birth_year; } ?></li>
                            <li><b>Differently Abled</b><br><?php echo @$personal_details[0]
                                ->differently_abled; ?></li>
                            <li><b>Address</b><br><?php if(!empty(@$personal_details[0]
                                ->permanent_add && $personal_details[0]->hometown && $personal_details[0]->pincode  )){ echo @$personal_details[0]
                                ->permanent_add .
                                "/" .
                                @$personal_details[0]->hometown .
                                "/" .
                                @$personal_details[0]->pincode; } ?></li>
                           <!--  <li>Languages<br><a type="button" class="btn btn-primary" data-toggle="modal" data-target="#PersonalDetails">Add Languages</a></li> -->
                        </ul>
                    </div>
                                        <div class="forItSkillsTable">
                        <table>
  <tr>
    <th>Languages</th>
    <th>Proficiency</th>
    <th>Read</th>
    <th>Write</th>
    <th>Speak</th>
  </tr>
   <?php foreach($know_language as $row){ ?>  
  <tr> 
    <td><?php echo $row->language;?></td>
    <td><?php echo $row->proficiency; ?></td>
    <td><?php if($row->read_l=="Read") {?>
                    <i class="fa fa-check" aria-hidden="true"></i>
                      <?php }  else {?><i class="fa fa-times" aria-hidden="true"></i>
                     <?php } ?></td>
    <td><?php if($row->write_l=="Write") {?>
                    <i class="fa fa-check" aria-hidden="true"></i>
                      <?php }  else {?><i class="fa fa-times" aria-hidden="true"></i>
                     <?php } ?></td>
    <td><?php if($row->speak_l=="Speak") {?>
                    <i class="fa fa-check" aria-hidden="true"></i>
                      <?php }  else {?><i class="fa fa-times" aria-hidden="true"></i>
                     <?php } ?></td> 
</tr> 
  <?php } ?>   
  
</table>
                    </div>

                </div>


                <!-- for popups form in the pages start here -->

                <!-- Button trigger modal -->
               
                <!-- for resume headline Modal start here -->
                <div id="resume_headline_edit"></div>
                <div class="modal fade" id="ResumeHeadlines" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Resume Headline</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="resume_headline_candidate" method="post" action="<?php echo base_url(); ?>recruitment/save_resume_headline">
                                <p>Your resume is the first thing that attracts recruiters. So, create something decent and unique that makes you fit the job role that you are searching for.
                                </p>                                
                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="Having experience 4+ years in html, css, wordpress" name="resume_headline" id="resume_headline" rows="3"></textarea>
                                        <span>200 Character(s) Left</span>
                                    </div>
                           
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                <!-- for resume headline Modal end here -->

                <!-- for Add Employment Modal start here -->
                <div class="employment_edit" id="employment_edit"></div>
                <div class="modal fade" id="AddEmployment">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Add Employment</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="col-md-12">
                                    <form id="add_employment" method="post" action="<?php echo base_url(); ?>recruitment/save_candidate_employment_details">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Is this your current employment?</label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="candidate_employment" id="candidate_employment" onclick="show();" value="Yes">Yes
                                                </label>
                                                <label class=" radio-inline">
                                                    <input type="radio" name="candidate_employment" id="candidate_employment" value="No" onclick="show();">No
                                                </label>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Employment Type</label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="candidate_enrollment" onclick="show();" value="Full Time" <?php if (
                                                        @$candidate->candidate_course_type ==
                                                        "Full Time"
                                                    ) {
                                                        echo "checked";
                                                    } ?>> Fulltime
                                                </label>
                                                <label class=" radio-inline">
                                                    <input type="radio" name="candidate_enrollment" onclick="show();" value="Internship" <?php if (
                                                        @$candidate->candidate_course_type ==
                                                        "Internship"
                                                    ) {
                                                        echo "checked";
                                                    } ?>> Internship
                                                </label>
                                            </div>

                                            <div class="form-group col-md-6" id="prev_company_name">
                                                <label>Previous Company Name</label>
                                                <input type="text" class="form-control " autocomplete="off" placeholder="Type Your Organization" name="candidate_pre_company" id="candidate_pre_company" value="<?= @$candidate->name ?>">
                                            </div>
                                            <div class="form-group col-md-6" id="prev_company_designation">
                                                <label>Previous Designation</label>
                                                <input type="text" class="form-control " autocomplete="off" placeholder="Type Your Designation" name="candidate_pre_designation" id="candidate_pre_designation" value="<?= @$candidate->name ?>">
                                            </div>


                                            <div class="form-group col-md-6" id="current_company_name">
                                                <label>Current Company Name</label>
                                                <input type="hidden" name="candidate_id" value="<?= $candidate_ids ?>">
                                                <input type="text" class="form-control " autocomplete="off" placeholder="Type Your Organization" name="candidate_current_company" id="candidate_current_company" value="<?= @$candidate->name ?>">
                                            </div>
                                            <div id="current_company_designation" class="form-group col-md-6">
                                                <label>Current Designation</label>
                                                <input type="text" class="form-control " autocomplete="off" placeholder="Type Your Designation" name="candidate_current_designation" id="candidate_current_designation" value="<?= @$candidate->name ?>">
                                            </div>

                                            <div id="candidate_location" class="form-group col-md-6">
                                                <label>Current Location</label>
                                                <input type="text" class="form-control " autocomplete="off" placeholder="Type Intenship Location" name="candidate_intern_location" id="candidate_intern_location" value="<?= @$candidate->name ?>">
                                            </div>

                                            <div id="candidate_department" class="form-group col-md-6">
                                                <label>Department</label>
                                                <input type="text" class="form-control " autocomplete="off" placeholder="Type Intenship Department" name="candidate_intern_department" id="candidate_intern_department" value="<?= @$candidate->name ?>">
                                            </div>


                                            <div id="intern_roles_categorys" class="form-group col-md-6">
                                                <label>Role Category</label>
                                                <input type="text" class="form-control " autocomplete="off" placeholder="Type Intenship Role" name="intern_roles_category" id="intern_roles_category">
                                            </div>

                                            <div id="intern_roles" class="form-group col-md-6">
                                                <label>Role</label>
                                                <input type="text" class="form-control " autocomplete="off" placeholder="Type Intenship Role" name="intern_role" id="intern_role">
                                            </div>



                                            <div id="candidate_join_years" class="form-group col-md-6">
                                                <label>Joining Year</label>
                                                <select class="custom-select" id="candidate_join_year" name="candidate_join_year">
                                                    <option value="">Select Year</option>
                                                    <?php for (
                                                        $startYear = 1997;
                                                        $startYear <= 3000;
                                                        $startYear++
                                                    ) { ?>
                                                    <option <?php if (
                                                        @$candidate->candidate_started_working_from_yr ==
                                                        $startYear
                                                    ) {
                                                        echo "selected";
                                                    } ?> value="<?php echo $startYear; ?>"> <?php echo $startYear; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div id="candidate_join_months" class="form-group col-md-6">
                                                <label>Joining Month</label>
                                                <select class="custom-select" id="candidate_join_month" name="candidate_join_month">
                                                    <option value="">Select Month</option>
                                                    <option value="Jan">Jan</option>
                                                    <option value="Feb">Feb</option>
                                                    <option value="Mar">Mar</option>
                                                    <option value="Apr">Apr</option>
                                                    <option value="May">May</option>
                                                    <option value="Jun">Jun</option>
                                                    <option value="Jul">Jul</option>
                                                    <option value="Aug">Aug</option>
                                                    <option value="Sep">Sep</option>
                                                    <option value="Oct">Oct</option>
                                                    <option value="Nov">Nov</option>
                                                    <option value="Dec">Dec</option>
                                                </select>
                                            </div>



                                            <div id="candidate_working_till_year" class="form-group col-md-6">
                                                <label>Working Till Year</label>
                                                <select class="custom-select" id="candidate_working_till_year" name="candidate_working_till_year">
                                                    <option value="">Select Year</option>
                                                    <?php for (
                                                        $startYear = 1997;
                                                        $startYear <= 3000;
                                                        $startYear++
                                                    ) { ?>
                                                    <option <?php if (
                                                        @$candidate->candidate_started_working_from_yr ==
                                                        $startYear
                                                    ) {
                                                        echo "selected";
                                                    } ?> value="<?php echo $startYear; ?>"> <?php echo $startYear; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div id="candidate_working_till_month" class="form-group col-md-6">
                                                <label>Working Till Month</label>
                                                <select class="custom-select" id="candidate_working_till_month" name="candidate_working_till_month">
                                                    <option value="">Select Month</option>
                                                    <option value="Jan">Jan</option>
                                                    <option value="Feb">Feb</option>
                                                    <option value="Mar">Mar</option>
                                                    <option value="Apr">Apr</option>
                                                    <option value="May">May</option>
                                                    <option value="Jun">Jun</option>
                                                    <option value="Jul">Jul</option>
                                                    <option value="Aug">Aug</option>
                                                    <option value="Sep">Sep</option>
                                                    <option value="Oct">Oct</option>
                                                    <option value="Nov">Nov</option>
                                                    <option value="Dec">Dec</option>
                                                </select>
                                            </div>


                                            <div id="salaryCurrency" class="form-group col-md-6">
                                                <label>Currrent salary</label>
                                                <select class="custom-select" id="candidate_Currrent_currency" name="candidate_Currrent_currency">
                                                    <option value="">Select Currency</option>currency
                                                    <option value="₹">₹</option>
                                                    <option value="$">$</option>
                                                </select>
                                            </div>

                                            <div id="candidate_current_salary" class="form-group col-md-6">
                                                <label></label><br>
                                                <input type="text" class="form-control " autocomplete="off" placeholder="₹ 2000000" name="candidate_salarys" id="candidate_salarys">
                                            </div>




                                            <div id="candidate_currency_stipend" class="form-group col-md-6">
                                                <label>Monthly Stipend Currency</label>
                                                <select class="custom-select" id="candidate_stipend_currency" name="candidate_stipend_currency">
                                                    <option value="">Select Currency</option>
                                                    <option value="₹">₹</option>
                                                    <option value="$">$</option>

                                                </select>
                                            </div>

                                            <div class="form-group col-md-6" id="candidate_monthly_stipend">
                                                <label>Monthly Stipend Salary</label>
                                                <input type="text" class="form-control " autocomplete="off" placeholder="₹ 2000000" name="candidate_stipend" id="candidate_stipend" value="<?= @$candidate->name ?>">
                                            </div>



                                            <div class="form-group col-md-6" id="candidate_skill_used">
                                                <label>Skills used</label>
                                                <textarea class="form-control" id="candidate_skill" name="candidate_skill" rows="5" cols="33"> </textarea>
                                            </div>

                                            <div class="form-group col-md-6" id="candidate_job_profiles">
                                                <label>Job Profile</label>
                                                <textarea class="form-control" id="candidate_job_profile" name="candidate_job_profile" rows="5" cols="33"> </textarea>
                                            </div>



                                            <div id="cadidate_poject_descrption" class="form-group col-md-6">
                                                <label>Project Discription</label>
                                                <textarea class="form-control" placeholder="Enter Project Discription" id="candidate_intern_project_discription" name="candidate_intern_project_discription"></textarea>
                                            </div>

                                            <div id="candidate_project_link" class="form-group col-md-6">
                                                <label>Project Link</label>
                                                <textarea class="form-control" placeholder="Enter Project Link" id="candidate_intern_project_link" name="candidate_intern_project_link"></textarea>
                                            </div>



                                            <div class="form-group col-md-6" id="candidate_notice_period">
                                                <label>Notice Period</label>
                                                <select class="custom-select" id="candidate_notice_periods" name="candidate_notice_periods">
                                                    <option value="1 months">1 months</option>
                                                    <option value="2 months">2 months</option>
                                                    <option value="15 months">15 months</option>
                                                    <option value="2 months">2 months</option>
                                                </select>
                                            </div>


                                            <div class="modal-footer col-md-12">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary"  value="Submit">Submit</button>

                                            </div>
                                    </form>
                                </div>
                                <!-- Modal footer -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- for Add Employment Modal end here -->

            <!-- for key skills Modal start here -->
            <div id="edit_key_skill"></div>
             <div class="modal fade" id="KeySkills" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="add_candidate_skills" method="POST" action="<?php echo base_url(); ?>recruitment/update_candidate_key_skills" >
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Key skills</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Tell recruiters what you know or what you are known for e.g. Direct Marketing, Oracle, Java etc. We will send you job recommendations based on these skills. Each skill is separated by a comma.</p>
                            </br>
                                <div id="skills-container">
                                    <div class="skill-input col-md-8">
                                        <input class="form-control" type="text" name="skill[]" placeholder="Enter skill" required></br>
                                        <input class="form-control" type="date" name="from_date[]" placeholder="Select From Date" required></br>
                                        <input class="form-control" type="date" name="to_date[]" placeholder="Select To Date"  required>
                                        <span><i  class="fa fa-times icon-remove remove-btns" style="display:none;"></i></span>
                                    </div>
                                
                                </div>   
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                             <button type="button" class="btn btn-success" id="add-skill">Add More Skills</button>
                            <button type="submit" class="btn btn-primary">Update changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            
            
            <div class="modal fade" id="KeySkillshhhj" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="add_candidate_skills" method="POST" action="<?php echo base_url(); ?>recruitment/save_candidate_key_skills" >
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Key skills</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Write your key skills, like known software and interests, for example, Photoshop, PHP, Java, SEO, etc. While writing, skills are separated by commas.
                                </p>
                            
                               <textarea type="text" class="form-control" name="candidate_skills" id="candidate_skills"></textarea>
                             
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- for key skills Modal start here -->

            <!-- for Privious Company one Modal start here -->
            <div class="modal fade" id="PriviousCompany1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Web Designer Expert <a href="#">Delete</a></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <p><label>Is this your current employment?</label></p>
                                <div class="form-check form-check-inline form-group">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline form-group">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                </div>
                                <div>
                                    <p><label>Employment Type</label></p>
                                    <div class="form-check form-check-inline form-group">
                                        <label class="form-check-label" for="inlineRadio1">Full Time</label>
                                    </div>
                                </div>
                                <div class="form-group forselectionnn">
                                    <label class="" for="inlineFormCustomSelect">Total Experience <span class="requiredstar">*</span></label>
                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option>Years</option>
                                        <option value="">1</option>
                                        <option selected value="">2</option>
                                        <option value="">3</option>
                                        <option value="">4</option>
                                        <option value="">5</option>
                                        <option value="">6</option>
                                        <option value="">7</option>
                                        <option value="">8</option>
                                        <option value="">9</option>
                                        <option value="">10</option>
                                        <option value="">11</option>
                                        <option value="">12</option>
                                        <option value="">13</option>
                                        <option value="">14</option>
                                        <option value="">15</option>
                                        <option value="">16</option>
                                        <option value="">17</option>
                                        <option value="">18</option>
                                        <option value="">19</option>
                                        <option value="">20</option>
                                        <option value="">21</option>
                                        <option value="">22</option>
                                        <option value="">23</option>
                                        <option value="">24</option>
                                        <option value="">25</option>
                                        <option value="">26</option>
                                        <option value="">27</option>
                                        <option value="">28</option>
                                        <option value="">29</option>
                                        <option value="">30</option>
                                    </select>

                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option selected>Months</option>
                                        <option value="">1</option>
                                        <option value="">2</option>
                                        <option value="">3</option>
                                        <option value="">4</option>
                                        <option value="">5</option>
                                        <option value="">6</option>
                                        <option value="">7</option>
                                        <option value="">8</option>
                                        <option value="">9</option>
                                        <option value="">10</option>
                                        <option value="">11</option>
                                        <option value="">12</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-form-label">Current Company Name <span class="requiredstar">*</span></label>
                                    <input type="text" class="form-control" id="" placeholder="" value="Network solution">
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-form-label">Current Designation<span class="requiredstar">*</span></label>
                                    <input type="text" class="form-control" id="" placeholder="" value="UI Design Expert">
                                </div>

                                <div class="form-group forselectionnn">
                                    <label class="" for="inlineFormCustomSelect">Joining Date <span class="requiredstar">*</span></label>
                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option value="">year</option>
                                        <option value="1940">1940</option>
                                        <option value="1941">1941</option>
                                        <option value="1942">1942</option>
                                        <option value="1943">1943</option>
                                        <option value="1944">1944</option>
                                        <option value="1945">1945</option>
                                        <option value="1946">1946</option>
                                        <option value="1947">1947</option>
                                        <option value="1948">1948</option>
                                        <option value="1949">1949</option>
                                        <option value="1950">1950</option>
                                        <option value="1951">1951</option>
                                        <option value="1952">1952</option>
                                        <option value="1953">1953</option>
                                        <option value="1954">1954</option>
                                        <option value="1955">1955</option>
                                        <option value="1956">1956</option>
                                        <option value="1957">1957</option>
                                        <option value="1958">1958</option>
                                        <option value="1959">1959</option>
                                        <option value="1960">1960</option>
                                        <option value="1961">1961</option>
                                        <option value="1962">1962</option>
                                        <option value="1963">1963</option>
                                        <option value="1964">1964</option>
                                        <option value="1965">1965</option>
                                        <option value="1966">1966</option>
                                        <option value="1967">1967</option>
                                        <option value="1968">1968</option>
                                        <option value="1969">1969</option>
                                        <option value="1970">1970</option>
                                        <option value="1971">1971</option>
                                        <option value="1972">1972</option>
                                        <option value="1973">1973</option>
                                        <option value="1974">1974</option>
                                        <option value="1975">1975</option>
                                        <option value="1976">1976</option>
                                        <option value="1977">1977</option>
                                        <option value="1978">1978</option>
                                        <option value="1979">1979</option>
                                        <option value="1980">1980</option>
                                        <option value="1981">1981</option>
                                        <option value="1982">1982</option>
                                        <option value="1983">1983</option>
                                        <option value="1984">1984</option>
                                        <option value="1985">1985</option>
                                        <option value="1986">1986</option>
                                        <option value="1987">1987</option>
                                        <option value="1988">1988</option>
                                        <option value="1989">1989</option>
                                        <option value="1990">1990</option>
                                        <option value="1991">1991</option>
                                        <option value="1992">1992</option>
                                        <option value="1993">1993</option>
                                        <option value="1994">1994</option>
                                        <option value="1995">1995</option>
                                        <option value="1996">1996</option>
                                        <option value="1997">1997</option>
                                        <option value="1998">1998</option>
                                        <option value="1999">1999</option>
                                        <option value="2000">2000</option>
                                        <option value="2001">2001</option>
                                        <option value="2002">2002</option>
                                        <option value="2003">2003</option>
                                        <option value="2004">2004</option>
                                        <option value="2005">2005</option>
                                        <option value="2006">2006</option>
                                        <option value="2007">2007</option>
                                        <option value="2008">2008</option>
                                        <option value="2009">2009</option>
                                        <option value="2010">2010</option>
                                        <option value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option selected value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                    </select>

                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option selected>Months</option>
                                        <option value="">Jan</option>
                                        <option value="">Feb</option>
                                        <option value="">March</option>
                                        <option value="">April</option>
                                        <option value="">May</option>
                                        <option value="">June</option>
                                        <option value="">July</option>
                                        <option value="">August</option>
                                        <option value="">Sept</option>
                                        <option value="">Oct</option>
                                        <option value="">Nov</option>
                                        <option value="">Dec</option>
                                    </select>
                                </div>

                                <div class="form-group forselectionnn forpriceselect">
                                    <label class="" for="inlineFormCustomSelect">Current Salary<span class="requiredstar">*</span></label>
                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option value="">₹</option>
                                        <option value="">$</option>
                                    </select>
                                    <input type="text" class="form-control priceee" id="" placeholder="" value="2,50,000">
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-form-label">Skills Used <span class="requiredstar">*</span></label>
                                    <input type="text" class="form-control" id="" placeholder="Enter Your area of expertise/specialization">
                                </div>

                                <div id="ForjobProfile" class="form-group">
                                    <label for="" class="col-form-label">Job Profile <span class="requiredstar">*</span></label>
                                    <input type="textarea" class="form-control" id="" placeholder="Enter Your area of expertise/specialization">
                                </div>

                                <div class="form-group">
                                    <label class="" for="inlineFormCustomSelect">Notice Period<span class="requiredstar">*</span></label>
                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option value="">Select Notice Period</option>
                                        <option selected value="">15 days or less</option>
                                        <option value="">1 Month</option>
                                        <option value="">2 Month</option>
                                        <option value="">3 Month</option>
                                        <option value="">More than 3 Month</option>
                                        <option value="">Serving Notice Period</option>
                                    </select>
                                </div>


                            </form>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- for Privious Company one Modal end here -->


            <!-- for Privious Company two Modal start here -->
            <div class="modal fade" id="PriviousCompany2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Web Designer <a href="#">Delete</a></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <p><label>Is this your current employment?</label></p>
                                <div class="form-check form-check-inline form-group">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline form-group">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                </div>
                                <div>
                                    <p><label>Employment Type</label></p>
                                    <div class="form-check form-check-inline form-group">
                                        <label class="form-check-label" for="inlineRadio1">Full Time</label>
                                    </div>
                                </div>
                                <div class="form-group forselectionnn">
                                    <label class="" for="inlineFormCustomSelect">Joining Date <span class="requiredstar">*</span></label>
                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option value="">year</option>
                                        <option value="1940">1940</option>
                                        <option value="1941">1941</option>
                                        <option value="1942">1942</option>
                                        <option value="1943">1943</option>
                                        <option value="1944">1944</option>
                                        <option value="1945">1945</option>
                                        <option value="1946">1946</option>
                                        <option value="1947">1947</option>
                                        <option value="1948">1948</option>
                                        <option value="1949">1949</option>
                                        <option value="1950">1950</option>
                                        <option value="1951">1951</option>
                                        <option value="1952">1952</option>
                                        <option value="1953">1953</option>
                                        <option value="1954">1954</option>
                                        <option value="1955">1955</option>
                                        <option value="1956">1956</option>
                                        <option value="1957">1957</option>
                                        <option value="1958">1958</option>
                                        <option value="1959">1959</option>
                                        <option value="1960">1960</option>
                                        <option value="1961">1961</option>
                                        <option value="1962">1962</option>
                                        <option value="1963">1963</option>
                                        <option value="1964">1964</option>
                                        <option value="1965">1965</option>
                                        <option value="1966">1966</option>
                                        <option value="1967">1967</option>
                                        <option value="1968">1968</option>
                                        <option value="1969">1969</option>
                                        <option value="1970">1970</option>
                                        <option value="1971">1971</option>
                                        <option value="1972">1972</option>
                                        <option value="1973">1973</option>
                                        <option value="1974">1974</option>
                                        <option value="1975">1975</option>
                                        <option value="1976">1976</option>
                                        <option value="1977">1977</option>
                                        <option value="1978">1978</option>
                                        <option value="1979">1979</option>
                                        <option value="1980">1980</option>
                                        <option value="1981">1981</option>
                                        <option value="1982">1982</option>
                                        <option value="1983">1983</option>
                                        <option value="1984">1984</option>
                                        <option value="1985">1985</option>
                                        <option value="1986">1986</option>
                                        <option value="1987">1987</option>
                                        <option value="1988">1988</option>
                                        <option value="1989">1989</option>
                                        <option value="1990">1990</option>
                                        <option value="1991">1991</option>
                                        <option value="1992">1992</option>
                                        <option value="1993">1993</option>
                                        <option value="1994">1994</option>
                                        <option value="1995">1995</option>
                                        <option value="1996">1996</option>
                                        <option value="1997">1997</option>
                                        <option value="1998">1998</option>
                                        <option value="1999">1999</option>
                                        <option value="2000">2000</option>
                                        <option value="2001">2001</option>
                                        <option value="2002">2002</option>
                                        <option value="2003">2003</option>
                                        <option value="2004">2004</option>
                                        <option value="2005">2005</option>
                                        <option value="2006">2006</option>
                                        <option value="2007">2007</option>
                                        <option value="2008">2008</option>
                                        <option value="2009">2009</option>
                                        <option value="2010">2010</option>
                                        <option selected value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                    </select>

                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option>Months</option>
                                        <option value="">1</option>
                                        <option value="">2</option>
                                        <option selected value="">3</option>
                                        <option value="">4</option>
                                        <option value="">5</option>
                                        <option value="">6</option>
                                        <option value="">7</option>
                                        <option value="">8</option>
                                        <option value="">9</option>
                                        <option value="">10</option>
                                        <option value="">11</option>
                                        <option value="">12</option>
                                    </select>
                                </div>

                                <div class="form-group forselectionnn">
                                    <label class="" for="inlineFormCustomSelect">Worked Till <span class="requiredstar">*</span></label>
                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option value="">year</option>
                                        <option value="1940">1940</option>
                                        <option value="1941">1941</option>
                                        <option value="1942">1942</option>
                                        <option value="1943">1943</option>
                                        <option value="1944">1944</option>
                                        <option value="1945">1945</option>
                                        <option value="1946">1946</option>
                                        <option value="1947">1947</option>
                                        <option value="1948">1948</option>
                                        <option value="1949">1949</option>
                                        <option value="1950">1950</option>
                                        <option value="1951">1951</option>
                                        <option value="1952">1952</option>
                                        <option value="1953">1953</option>
                                        <option value="1954">1954</option>
                                        <option value="1955">1955</option>
                                        <option value="1956">1956</option>
                                        <option value="1957">1957</option>
                                        <option value="1958">1958</option>
                                        <option value="1959">1959</option>
                                        <option value="1960">1960</option>
                                        <option value="1961">1961</option>
                                        <option value="1962">1962</option>
                                        <option value="1963">1963</option>
                                        <option value="1964">1964</option>
                                        <option value="1965">1965</option>
                                        <option value="1966">1966</option>
                                        <option value="1967">1967</option>
                                        <option value="1968">1968</option>
                                        <option value="1969">1969</option>
                                        <option value="1970">1970</option>
                                        <option value="1971">1971</option>
                                        <option value="1972">1972</option>
                                        <option value="1973">1973</option>
                                        <option value="1974">1974</option>
                                        <option value="1975">1975</option>
                                        <option value="1976">1976</option>
                                        <option value="1977">1977</option>
                                        <option value="1978">1978</option>
                                        <option value="1979">1979</option>
                                        <option value="1980">1980</option>
                                        <option value="1981">1981</option>
                                        <option value="1982">1982</option>
                                        <option value="1983">1983</option>
                                        <option value="1984">1984</option>
                                        <option value="1985">1985</option>
                                        <option value="1986">1986</option>
                                        <option value="1987">1987</option>
                                        <option value="1988">1988</option>
                                        <option value="1989">1989</option>
                                        <option value="1990">1990</option>
                                        <option value="1991">1991</option>
                                        <option value="1992">1992</option>
                                        <option value="1993">1993</option>
                                        <option value="1994">1994</option>
                                        <option value="1995">1995</option>
                                        <option value="1996">1996</option>
                                        <option value="1997">1997</option>
                                        <option value="1998">1998</option>
                                        <option value="1999">1999</option>
                                        <option value="2000">2000</option>
                                        <option value="2001">2001</option>
                                        <option value="2002">2002</option>
                                        <option value="2003">2003</option>
                                        <option value="2004">2004</option>
                                        <option value="2005">2005</option>
                                        <option value="2006">2006</option>
                                        <option value="2007">2007</option>
                                        <option value="2008">2008</option>
                                        <option value="2009">2009</option>
                                        <option value="2010">2010</option>
                                        <option value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option selected value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                    </select>

                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option>Months</option>
                                        <option value="">1</option>
                                        <option value="">2</option>
                                        <option value="">3</option>
                                        <option value="">4</option>
                                        <option selected value="">5</option>
                                        <option value="">6</option>
                                        <option value="">7</option>
                                        <option value="">8</option>
                                        <option value="">9</option>
                                        <option value="">10</option>
                                        <option value="">11</option>
                                        <option value="">12</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-form-label">Current Company Name <span class="requiredstar">*</span></label>
                                    <input type="text" class="form-control" id="" placeholder="" value="Montek Media Solution">
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-form-label">Current Designation<span class="requiredstar">*</span></label>
                                    <input type="text" class="form-control" id="" placeholder="" value="Web Designer">
                                </div>

                                <div id="ForjobProfile" class="form-group">
                                    <label for="" class="col-form-label">Job Profile <span class="requiredstar">*</span></label>
                                    <input type="textarea" class="form-control" id="" placeholder="Enter Your area of expertise/specialization">
                                </div>

                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- for Privious Company two Modal end here -->


            <!-- for Add Education Modal start here -->
            <div class="education_edit" id="education_edit"></div>
            <div class="modal fade" id="AddEducation">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Education</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal_it_skill-body modal-body">
                            <div class="col-md-12">
                                <form id="add_education" method="POST" action="<?php echo base_url(); ?>recruitment/save_candidate_education_data">
                                    <div class="row">
                                        <div id="educations" class="form-group col-md-6">
                                            <label>Education</label>
                                            <input type="hidden" name="candidate_id" value="<?= $candidate_ids ?>">
                                            <select id="education" name="education" class="custom-select" onchange="myFunction1(this.value)">
                                                <option>select education</option>
                                                <?php foreach (
                                                    $main_courses
                                                    as $row
                                                ) { ?>
                                                <option value="<?php echo $row->candidate_education_id; ?>"><?php echo $row->main_course_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div id="candidate_boards" class="form-group col-md-6" style="display: none;">
                                            <label>Board</label>
                                            <input type="text" class="form-control " autocomplete="off" placeholder="Enter Board" name="candidate_board" id="candidate_board" value="<?= @$candidate->name ?>">
                                        </div>

                                        <div id="passingout_years" class="form-group col-md-6" style="display: none;">
                                            <label>Passing Out Year</label>
                                            <select class="custom-select" id="passingout_year" name="passingout_year">
                                                <option value="">Select Year</option>
                                                <?php for (
                                                    $startYear = 1997;
                                                    $startYear <= 3000;
                                                    $startYear++
                                                ) { ?>
                                                <option <?php if (
                                                    @$candidate->candidate_started_working_from_yr ==
                                                    $startYear
                                                ) {
                                                    echo "selected";
                                                } ?> value="<?php echo $startYear; ?>"> <?php echo $startYear; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div id="candidate_school_mediums" class="form-group col-md-6" style="display: none;">
                                            <label>School Medium</label>
                                            <input type="text" class="form-control " autocomplete="off" placeholder="Enter School Medium" name="candidate_school_medium" id="candidate_school_medium" value="<?= @$candidate->name ?>">
                                        </div>

                                        <div id="candidate_total_marks" class="form-group col-md-6" style="display: none;">
                                            <label>Total Marks</label>
                                            <input type="text" class="form-control " autocomplete="off" placeholder="Enter School Medium" name="candidate_total_mark" id="candidate_total_mark" value="<?= @$candidate->name ?>">
                                        </div>

                                        <div id="candidate_english_marks" class="form-group col-md-6" style="display: none;">
                                            <label>English Marks</label>
                                            <input type="text" class="form-control " autocomplete="off" placeholder="Enter School Medium" name="candidate_english_mark" id="candidate_english_mark" value="<?= @$candidate->name ?>">
                                        </div>

                                        <div id="candidate_maths_marks" class="form-group col-md-6" style="display: none;">
                                            <label>Maths Marks</label>
                                            <input type="text" class="form-control " autocomplete="off" placeholder="Enter School Medium" name="candidate_maths_mark" id="candidate_maths_mark" value="<?= @$candidate->name ?>">
                                        </div>

                                        <div id="candidate_univercitys" class="form-group col-md-6">
                                            <label>University/Institute</label>
                                            <input type="text" class="form-control " autocomplete="off" placeholder="Select university/institute" name="candidate_univercity" id="candidate_univercity" value="<?= @$candidate->name ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div id="candidate_courses" class="form-group col-md-6">
                                            <label>Course</label>
                                            <select name="candidate_course" id="candidate_course" class="custom-select" onchange="myFunction(this.value)">
                                                <option>Select Course</option>
                                                <option></option>
                                            </select>
                                        </div>

                                        <div id="course_specializations" class="form-group col-md-6">
                                            <label>Specialization</label>
                                            <select name="course_specialization" id="course_specialization" class="custom-select">
                                                <option>Select Specialization</option>
                                                <option></option>
                                            </select>
                                        </div>

                                        <div id="specialization_co" style="display: none;">
                                            <div id="marrige">
                                                <input type="text" name="course_specialization1" class="form-control" id="course_specialization1" placeholder="Enter specialization Course">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div id="candidate_course_types" class="form-group col-md-10">
                                            <label>Course Type</label>
                                            <input type="radio" name="candidate_course_type" value="Full Time"> Full time


                                            <input type="radio" name="candidate_course_type" value="Part Time"> Part time


                                            <input type="radio" name="candidate_course_type" value="Correspondence/Distance learning"> Correspondence/Distance learning

                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-6" id="course_start_years">
                                            <label>Course duration</label>
                                            <select style="bottom: auto; top: 100%;" name="course_start_year" id="course_start_year" class="custom-select form-group">
                                                <option value="" selected>Select starting year</option>
                                                <?php for (
                                                    $startYear = 1997;
                                                    $startYear <= 3000;
                                                    $startYear++
                                                ) { ?>
                                                <option <?php if (
                                                    @$candidate->candidate_started_working_from_yr ==
                                                    $startYear
                                                ) {
                                                    echo "selected";
                                                } ?> value="<?php echo $startYear; ?>"> <?php echo $startYear; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div id="course_end_years" class="col-md-6" id="">
                                            <label></label><br>
                                            <select name="course_end_year" id="course_end_year" class="form-group custom-select">
                                                <option value="" selected>Select Ending Year</option>
                                                <?php for (
                                                    $startYear = 1997;
                                                    $startYear <= 3000;
                                                    $startYear++
                                                ) { ?>
                                                <option <?php if (
                                                    @$candidate->candidate_started_working_from_yr ==
                                                    $startYear
                                                ) {
                                                    echo "selected";
                                                } ?> value="<?php echo $startYear; ?>"> <?php echo $startYear; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
</div>
<div class="row">
                                        <div id="grades" class="form-group col-md-6">
                                            <label>Grading System</label>
                                            <select name="grade" id="grade" class="custom-select">
                                                <option value="" selected>seletc Grading System</option>
                                                <option>Select grading system</option>
                                                <option> Scale 10 Grading System </option>
                                                <option> Scale 4 Grading System </option>
                                                <option>marks</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button form="add_education" type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Modal footer -->
                    </div>

                </div>
            </div>

            <!-- for Edit Postgraduation start here -->
            <div class="modal fade" id="EditPostGraduation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit/Masters Post-Graduation <a href="#">Delete</a></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label class="" for="inlineFormCustomSelect">Education <span class="requiredstar">*</span></label>
                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option>Select Education</option>
                                        <option>Doctorate/PHD</option>
                                        <option selected value="">Masters/Post Graduation</option>
                                        <option value="">Graduation/Diploma</option>
                                        <option value="">12th</option>
                                        <option value="">10th</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-form-label">University/Institute <span class="requiredstar">*</span></label>
                                    <input type="text" class="form-control" id="" placeholder="Select university/Institute" value="">
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-form-label">Course <span class="requiredstar">*</span></label>
                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option selected>MBA/PGDM
                                        <option>M.Tech</option>
                                        <option>MS/M.Sc(Science)</option>
                                        <option>MCA</option>
                                        <option>M.Com</option>
                                        <option>PG Diploma</option>
                                        <option>M.A</option>
                                        <option>CA</option>
                                        <option>CS</option>
                                        <option>DM</option>
                                        <option>ICWA (CMA)</option>
                                        <option>Integrated PG</option>
                                        <option>LLM</option>
                                        <option>M.Arch</option>
                                        <option>M.Ch</option>
                                        <option>M.Des.</option>
                                        <option>M.Ed</option>
                                        <option>M.Pharma</option>
                                        <option>MCM</option>
                                        <option>MDS</option>
                                        <option>Medical-MS/MD</option>
                                        <option>MFA</option>
                                        <option>MVSC</option>
                                        <option>Other Post Graduate</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="" for="inlineFormCustomSelect">Specialization <span class="requiredstar">*</span></label>
                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option>Select Specialization</option>
                                        <option>Advertising/Mass Communication</option>
                                        <option>Agriculture</option>
                                        <option>Anthropology</option>
                                        <option>Architecture </option>
                                        <option>Arts &amp; Humanities</option>
                                        <option>Astrophysics </option>
                                        <option>Automobile</option>
                                        <option>Aviation</option>
                                        <option>Bio-Chemistry/Bio-Technology</option>
                                        <option>Biomedical</option>
                                        <option>Biophysics</option>
                                        <option>Biotechnology </option>
                                        <option>Botany</option>
                                        <option>Ceramics </option>
                                        <option>Chemical</option>
                                        <option>Chemistry </option>
                                        <option>Civil</option>
                                        <option>Commerce</option>
                                        <option>Communication</option>
                                        <option>Computers</option>
                                        <option>Dairy Technology</option>
                                        <option>Dermatology</option>
                                        <option>Economics</option>
                                        <option>Education</option>
                                        <option>Electrical</option>
                                        <option>Electronics/Telecommunication</option>
                                        <option>Energy</option>
                                        <option>ENT</option>
                                        <option>Environmental</option>
                                        <option>Fashion Designing/Other Designing</option>
                                        <option>Film</option>
                                        <option>Finance</option>
                                        <option>Fine Arts</option>
                                        <option>Food Technology</option>
                                        <option>Genetics</option>
                                        <option>History</option>
                                        <option>Home Science</option>
                                        <option>Hotel Management</option>
                                        <option>HR/Industrial Relations</option>
                                        <option>Immunology</option>
                                        <option>Instrumentation</option>
                                        <option>International Business</option>
                                        <option>Journalism </option>
                                        <option>Law</option>
                                        <option>Linguistics</option>
                                        <option>Literature</option>
                                        <option>Marine</option>
                                        <option>Marketing</option>
                                        <option>Maths</option>
                                        <option>Mechanical</option>
                                        <option>Medicine</option>
                                        <option>Metallurgy</option>
                                        <option>Microbiology</option>
                                        <option>Mineral</option>
                                        <option>Mining</option>
                                        <option>Music</option>
                                        <option>Neonatal</option>
                                        <option>Nuclear</option>
                                        <option>Nursing</option>
                                        <option>Obstetrics</option>
                                        <option>Paint/Oil</option>
                                        <option>Pathology</option>
                                        <option>Pediatrics</option>
                                        <option>Petroleum</option>
                                        <option>Pharmacy</option>
                                        <option>Philosophy</option>
                                        <option>Physical Education</option>
                                        <option>Physics</option>
                                        <option>Plastics</option>
                                        <option>Political Science</option>
                                        <option>Production/Industrial</option>
                                        <option>Psychiatry</option>
                                        <option>Psychology</option>
                                        <option>Radiology</option>
                                        <option>Rheumatology</option>
                                        <option>Sanskrit</option>
                                        <option>Sociology</option>
                                        <option>Statistics</option>
                                        <option>Systems</option>
                                        <option>Textile</option>
                                        <option>Vocational Courses</option>
                                        <option>Zoology</option>
                                        <option>Other Specialization</option>
                                    </select>
                                </div>

                                <div class="form-group"> <label>Course Type</label>
                                    <div class="form-check form-check-inline form-group">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">Full Time</label>
                                    </div>
                                    <div class="form-check form-check-inline form-group">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">Part Time</label>
                                    </div>
                                    <div class="form-check form-check-inline form-group">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">Correspondence/Distance Learning</label>
                                    </div>
                                </div>

                                <div class="form-group forselectionnn">
                                    <label class="" for="inlineFormCustomSelect">Course Duration <span class="requiredstar">*</span></label>
                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option value="">Starting Year</option>
                                        <option value="1940">1940</option>
                                        <option value="1941">1941</option>
                                        <option value="1942">1942</option>
                                        <option value="1943">1943</option>
                                        <option value="1944">1944</option>
                                        <option value="1945">1945</option>
                                        <option value="1946">1946</option>
                                        <option value="1947">1947</option>
                                        <option value="1948">1948</option>
                                        <option value="1949">1949</option>
                                        <option value="1950">1950</option>
                                        <option value="1951">1951</option>
                                        <option value="1952">1952</option>
                                        <option value="1953">1953</option>
                                        <option value="1954">1954</option>
                                        <option value="1955">1955</option>
                                        <option value="1956">1956</option>
                                        <option value="1957">1957</option>
                                        <option value="1958">1958</option>
                                        <option value="1959">1959</option>
                                        <option value="1960">1960</option>
                                        <option value="1961">1961</option>
                                        <option value="1962">1962</option>
                                        <option value="1963">1963</option>
                                        <option value="1964">1964</option>
                                        <option value="1965">1965</option>
                                        <option value="1966">1966</option>
                                        <option value="1967">1967</option>
                                        <option value="1968">1968</option>
                                        <option value="1969">1969</option>
                                        <option value="1970">1970</option>
                                        <option value="1971">1971</option>
                                        <option value="1972">1972</option>
                                        <option value="1973">1973</option>
                                        <option value="1974">1974</option>
                                        <option value="1975">1975</option>
                                        <option value="1976">1976</option>
                                        <option value="1977">1977</option>
                                        <option value="1978">1978</option>
                                        <option value="1979">1979</option>
                                        <option value="1980">1980</option>
                                        <option value="1981">1981</option>
                                        <option value="1982">1982</option>
                                        <option value="1983">1983</option>
                                        <option value="1984">1984</option>
                                        <option value="1985">1985</option>
                                        <option value="1986">1986</option>
                                        <option value="1987">1987</option>
                                        <option value="1988">1988</option>
                                        <option value="1989">1989</option>
                                        <option value="1990">1990</option>
                                        <option value="1991">1991</option>
                                        <option value="1992">1992</option>
                                        <option value="1993">1993</option>
                                        <option value="1994">1994</option>
                                        <option value="1995">1995</option>
                                        <option value="1996">1996</option>
                                        <option value="1997">1997</option>
                                        <option value="1998">1998</option>
                                        <option value="1999">1999</option>
                                        <option value="2000">2000</option>
                                        <option value="2001">2001</option>
                                        <option value="2002">2002</option>
                                        <option value="2003">2003</option>
                                        <option value="2004">2004</option>
                                        <option value="2005">2005</option>
                                        <option value="2006">2006</option>
                                        <option value="2007">2007</option>
                                        <option value="2008">2008</option>
                                        <option value="2009">2009</option>
                                        <option value="2010">2010</option>
                                        <option value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option selected value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                    </select>

                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option value="">Ending Year</option>
                                        <option value="1940">1940</option>
                                        <option value="1941">1941</option>
                                        <option value="1942">1942</option>
                                        <option value="1943">1943</option>
                                        <option value="1944">1944</option>
                                        <option value="1945">1945</option>
                                        <option value="1946">1946</option>
                                        <option value="1947">1947</option>
                                        <option value="1948">1948</option>
                                        <option value="1949">1949</option>
                                        <option value="1950">1950</option>
                                        <option value="1951">1951</option>
                                        <option value="1952">1952</option>
                                        <option value="1953">1953</option>
                                        <option value="1954">1954</option>
                                        <option value="1955">1955</option>
                                        <option value="1956">1956</option>
                                        <option value="1957">1957</option>
                                        <option value="1958">1958</option>
                                        <option value="1959">1959</option>
                                        <option value="1960">1960</option>
                                        <option value="1961">1961</option>
                                        <option value="1962">1962</option>
                                        <option value="1963">1963</option>
                                        <option value="1964">1964</option>
                                        <option value="1965">1965</option>
                                        <option value="1966">1966</option>
                                        <option value="1967">1967</option>
                                        <option value="1968">1968</option>
                                        <option value="1969">1969</option>
                                        <option value="1970">1970</option>
                                        <option value="1971">1971</option>
                                        <option value="1972">1972</option>
                                        <option value="1973">1973</option>
                                        <option value="1974">1974</option>
                                        <option value="1975">1975</option>
                                        <option value="1976">1976</option>
                                        <option value="1977">1977</option>
                                        <option value="1978">1978</option>
                                        <option value="1979">1979</option>
                                        <option value="1980">1980</option>
                                        <option value="1981">1981</option>
                                        <option value="1982">1982</option>
                                        <option value="1983">1983</option>
                                        <option value="1984">1984</option>
                                        <option value="1985">1985</option>
                                        <option value="1986">1986</option>
                                        <option value="1987">1987</option>
                                        <option value="1988">1988</option>
                                        <option value="1989">1989</option>
                                        <option value="1990">1990</option>
                                        <option value="1991">1991</option>
                                        <option value="1992">1992</option>
                                        <option value="1993">1993</option>
                                        <option value="1994">1994</option>
                                        <option value="1995">1995</option>
                                        <option value="1996">1996</option>
                                        <option value="1997">1997</option>
                                        <option value="1998">1998</option>
                                        <option value="1999">1999</option>
                                        <option value="2000">2000</option>
                                        <option value="2001">2001</option>
                                        <option value="2002">2002</option>
                                        <option value="2003">2003</option>
                                        <option value="2004">2004</option>
                                        <option value="2005">2005</option>
                                        <option value="2006">2006</option>
                                        <option value="2007">2007</option>
                                        <option value="2008">2008</option>
                                        <option value="2009">2009</option>
                                        <option value="2010">2010</option>
                                        <option value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option selected value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="" for="inlineFormCustomSelect">Grading System<span class="requiredstar">*</span></label>
                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option value="">Select Grading System</option>
                                        <option value="">Scale 10 Grading System</option>
                                        <option value="">Scale 4 Grading System</option>
                                        <option value="">% marks of 100 maximum</option>
                                        <option value="">Course requires a pass</option>
                                    </select>
                                </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- for Edit Postgraduation end here -->


            <!-- for Edit Graduation start here -->
            <div class="modal fade" id="EditGraduation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Graduation/Diploma <a href="#">Delete</a></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label class="" for="inlineFormCustomSelect">Education <span class="requiredstar">*</span></label>
                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option>Graduation Diploma</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-form-label">University/Institute <span class="requiredstar">*</span></label>
                                    <input type="text" class="form-control" id="" placeholder="Select university/Institute" value="Pune University">
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-form-label">Course <span class="requiredstar">*</span></label>
                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option selected>MBA/PGDM
                                        <option>B.Tech/B.E.</option>
                                        <option>B.Com</option>
                                        <option>B.Sc</option>
                                        <option>B.A</option>
                                        <option>Diploma</option>
                                        <option>B.Arch</option>
                                        <option>B.B.A/ B.M.S</option>
                                        <option>B.Des.</option>
                                        <option>B.Ed</option>
                                        <option>B.El.Ed</option>
                                        <option>B.P.Ed</option>
                                        <option>B.Pharma</option>
                                        <option>B.U.M.S</option>
                                        <option>BAMS</option>
                                        <option>BCA</option>
                                        <option>BDS</option>
                                        <option>BFA</option>
                                        <option>BHM</option>
                                        <option>BHMCT</option>
                                        <option>BHMS</option>
                                        <option>BVSC</option>
                                        <option>LLB</option>
                                        <option>MBBS</option>
                                        <option>Other Graduate</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="" for="inlineFormCustomSelect">Specialization <span class="requiredstar">*</span></label>
                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option>Other Specialization</option>
                                        <option>Advertising/Mass Communication</option>
                                        <option>Agriculture</option>
                                        <option>Anthropology</option>
                                        <option>Architecture </option>
                                        <option>Arts &amp; Humanities</option>
                                        <option>Astrophysics </option>
                                        <option>Automobile</option>
                                        <option>Aviation</option>
                                        <option>Bio-Chemistry/Bio-Technology</option>
                                        <option>Biomedical</option>
                                        <option>Biophysics</option>
                                        <option>Biotechnology </option>
                                        <option>Botany</option>
                                        <option>Ceramics </option>
                                        <option>Chemical</option>
                                        <option>Chemistry </option>
                                        <option>Civil</option>
                                        <option>Commerce</option>
                                        <option>Communication</option>
                                        <option>Computers</option>
                                        <option>Dairy Technology</option>
                                        <option>Dermatology</option>
                                        <option>Economics</option>
                                        <option>Education</option>
                                        <option>Electrical</option>
                                        <option>Electronics/Telecommunication</option>
                                        <option>Energy</option>
                                        <option>ENT</option>
                                        <option>Environmental</option>
                                        <option>Fashion Designing/Other Designing</option>
                                        <option>Film</option>
                                        <option>Finance</option>
                                        <option>Fine Arts</option>
                                        <option>Food Technology</option>
                                        <option>Genetics</option>
                                        <option>History</option>
                                        <option>Home Science</option>
                                        <option>Hotel Management</option>
                                        <option>HR/Industrial Relations</option>
                                        <option>Immunology</option>
                                        <option>Instrumentation</option>
                                        <option>International Business</option>
                                        <option>Journalism </option>
                                        <option>Law</option>
                                        <option>Linguistics</option>
                                        <option>Literature</option>
                                        <option>Marine</option>
                                        <option>Marketing</option>
                                        <option>Maths</option>
                                        <option>Mechanical</option>
                                        <option>Medicine</option>
                                        <option>Metallurgy</option>
                                        <option>Microbiology</option>
                                        <option>Mineral</option>
                                        <option>Mining</option>
                                        <option>Music</option>
                                        <option>Neonatal</option>
                                        <option>Nuclear</option>
                                        <option>Nursing</option>
                                        <option>Obstetrics</option>
                                        <option>Paint/Oil</option>
                                        <option>Pathology</option>
                                        <option>Pediatrics</option>
                                        <option>Petroleum</option>
                                        <option>Pharmacy</option>
                                        <option>Philosophy</option>
                                        <option>Physical Education</option>
                                        <option>Physics</option>
                                        <option>Plastics</option>
                                        <option>Political Science</option>
                                        <option>Production/Industrial</option>
                                        <option>Psychiatry</option>
                                        <option>Psychology</option>
                                        <option>Radiology</option>
                                        <option>Rheumatology</option>
                                        <option>Sanskrit</option>
                                        <option>Sociology</option>
                                        <option>Statistics</option>
                                        <option>Systems</option>
                                        <option>Textile</option>
                                        <option>Vocational Courses</option>
                                        <option>Zoology</option>
                                        <option>Other Specialization</option>
                                    </select>
                                </div>

                                <div class="form-group"> <label>Course Type</label>
                                    <div class="form-check form-check-inline form-group">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">Full Time</label>
                                    </div>
                                    <div class="form-check form-check-inline form-group">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">Part Time</label>
                                    </div>
                                    <div class="form-check form-check-inline form-group">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">Correspondence/Distance Learning</label>
                                    </div>
                                </div>

                                <div class="form-group forselectionnn">
                                    <label class="" for="inlineFormCustomSelect">Course Duration <span class="requiredstar">*</span></label>
                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option value="">Starting Year</option>
                                        <option value="1940">1940</option>
                                        <option value="1941">1941</option>
                                        <option value="1942">1942</option>
                                        <option value="1943">1943</option>
                                        <option value="1944">1944</option>
                                        <option value="1945">1945</option>
                                        <option value="1946">1946</option>
                                        <option value="1947">1947</option>
                                        <option value="1948">1948</option>
                                        <option value="1949">1949</option>
                                        <option value="1950">1950</option>
                                        <option value="1951">1951</option>
                                        <option value="1952">1952</option>
                                        <option value="1953">1953</option>
                                        <option value="1954">1954</option>
                                        <option value="1955">1955</option>
                                        <option value="1956">1956</option>
                                        <option value="1957">1957</option>
                                        <option value="1958">1958</option>
                                        <option value="1959">1959</option>
                                        <option value="1960">1960</option>
                                        <option value="1961">1961</option>
                                        <option value="1962">1962</option>
                                        <option value="1963">1963</option>
                                        <option value="1964">1964</option>
                                        <option value="1965">1965</option>
                                        <option value="1966">1966</option>
                                        <option value="1967">1967</option>
                                        <option value="1968">1968</option>
                                        <option value="1969">1969</option>
                                        <option value="1970">1970</option>
                                        <option value="1971">1971</option>
                                        <option value="1972">1972</option>
                                        <option value="1973">1973</option>
                                        <option value="1974">1974</option>
                                        <option value="1975">1975</option>
                                        <option value="1976">1976</option>
                                        <option value="1977">1977</option>
                                        <option value="1978">1978</option>
                                        <option value="1979">1979</option>
                                        <option value="1980">1980</option>
                                        <option value="1981">1981</option>
                                        <option value="1982">1982</option>
                                        <option value="1983">1983</option>
                                        <option value="1984">1984</option>
                                        <option value="1985">1985</option>
                                        <option value="1986">1986</option>
                                        <option value="1987">1987</option>
                                        <option value="1988">1988</option>
                                        <option value="1989">1989</option>
                                        <option value="1990">1990</option>
                                        <option value="1991">1991</option>
                                        <option value="1992">1992</option>
                                        <option value="1993">1993</option>
                                        <option value="1994">1994</option>
                                        <option value="1995">1995</option>
                                        <option value="1996">1996</option>
                                        <option value="1997">1997</option>
                                        <option value="1998">1998</option>
                                        <option value="1999">1999</option>
                                        <option value="2000">2000</option>
                                        <option value="2001">2001</option>
                                        <option value="2002">2002</option>
                                        <option value="2003">2003</option>
                                        <option value="2004">2004</option>
                                        <option value="2005">2005</option>
                                        <option value="2006">2006</option>
                                        <option value="2007">2007</option>
                                        <option value="2008">2008</option>
                                        <option value="2009">2009</option>
                                        <option value="2010">2010</option>
                                        <option value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option selected value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                    </select>

                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option value="">Ending Year</option>
                                        <option value="1940">1940</option>
                                        <option value="1941">1941</option>
                                        <option value="1942">1942</option>
                                        <option value="1943">1943</option>
                                        <option value="1944">1944</option>
                                        <option value="1945">1945</option>
                                        <option value="1946">1946</option>
                                        <option value="1947">1947</option>
                                        <option value="1948">1948</option>
                                        <option value="1949">1949</option>
                                        <option value="1950">1950</option>
                                        <option value="1951">1951</option>
                                        <option value="1952">1952</option>
                                        <option value="1953">1953</option>
                                        <option value="1954">1954</option>
                                        <option value="1955">1955</option>
                                        <option value="1956">1956</option>
                                        <option value="1957">1957</option>
                                        <option value="1958">1958</option>
                                        <option value="1959">1959</option>
                                        <option value="1960">1960</option>
                                        <option value="1961">1961</option>
                                        <option value="1962">1962</option>
                                        <option value="1963">1963</option>
                                        <option value="1964">1964</option>
                                        <option value="1965">1965</option>
                                        <option value="1966">1966</option>
                                        <option value="1967">1967</option>
                                        <option value="1968">1968</option>
                                        <option value="1969">1969</option>
                                        <option value="1970">1970</option>
                                        <option value="1971">1971</option>
                                        <option value="1972">1972</option>
                                        <option value="1973">1973</option>
                                        <option value="1974">1974</option>
                                        <option value="1975">1975</option>
                                        <option value="1976">1976</option>
                                        <option value="1977">1977</option>
                                        <option value="1978">1978</option>
                                        <option value="1979">1979</option>
                                        <option value="1980">1980</option>
                                        <option value="1981">1981</option>
                                        <option value="1982">1982</option>
                                        <option value="1983">1983</option>
                                        <option value="1984">1984</option>
                                        <option value="1985">1985</option>
                                        <option value="1986">1986</option>
                                        <option value="1987">1987</option>
                                        <option value="1988">1988</option>
                                        <option value="1989">1989</option>
                                        <option value="1990">1990</option>
                                        <option value="1991">1991</option>
                                        <option value="1992">1992</option>
                                        <option value="1993">1993</option>
                                        <option value="1994">1994</option>
                                        <option value="1995">1995</option>
                                        <option value="1996">1996</option>
                                        <option value="1997">1997</option>
                                        <option value="1998">1998</option>
                                        <option value="1999">1999</option>
                                        <option value="2000">2000</option>
                                        <option value="2001">2001</option>
                                        <option value="2002">2002</option>
                                        <option value="2003">2003</option>
                                        <option value="2004">2004</option>
                                        <option value="2005">2005</option>
                                        <option value="2006">2006</option>
                                        <option value="2007">2007</option>
                                        <option value="2008">2008</option>
                                        <option value="2009">2009</option>
                                        <option value="2010">2010</option>
                                        <option value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option selected value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="" for="inlineFormCustomSelect">Grading System<span class="requiredstar">*</span></label>
                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option value="">Select Grading System</option>
                                        <option value="">Scale 10 Grading System</option>
                                        <option value="">Scale 4 Grading System</option>
                                        <option value="">% marks of 100 maximum</option>
                                        <option value="">Course requires a pass</option>
                                    </select>
                                </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- for Edit Graduation end here -->

            <!-- for add doctorate/phd start here -->

            <div class="modal fade" id="AddDoctorate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Doctorate/PHD</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label class="" for="inlineFormCustomSelect">Education <span class="requiredstar">*</span></label>
                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option>Doctorate/PHD</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-form-label">University/Institute <span class="requiredstar">*</span></label>
                                    <input type="text" class="form-control" id="" placeholder="Select university/Institute" value="Pune University">
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-form-label">Course <span class="requiredstar">*</span></label>
                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option selected>MBA/PGDM</option>
                                        <option>Ph.D./Doctorate</option>
                                        <option>MPHIL</option>
                                        <option>Other Doctorate</option>
                                    </select>
                                </div>

                                <div class="form-group"> <label>Course Type</label>
                                    <div class="form-check form-check-inline form-group">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">Full Time</label>
                                    </div>
                                    <div class="form-check form-check-inline form-group">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">Part Time</label>
                                    </div>
                                    <div class="form-check form-check-inline form-group">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">Correspondence/Distance Learning</label>
                                    </div>
                                </div>

                                <div class="form-group forselectionnn">
                                    <label class="" for="inlineFormCustomSelect">Course Duration <span class="requiredstar">*</span></label>
                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option value="">Starting Year</option>
                                        <option value="1940">1940</option>
                                        <option value="1941">1941</option>
                                        <option value="1942">1942</option>
                                        <option value="1943">1943</option>
                                        <option value="1944">1944</option>
                                        <option value="1945">1945</option>
                                        <option value="1946">1946</option>
                                        <option value="1947">1947</option>
                                        <option value="1948">1948</option>
                                        <option value="1949">1949</option>
                                        <option value="1950">1950</option>
                                        <option value="1951">1951</option>
                                        <option value="1952">1952</option>
                                        <option value="1953">1953</option>
                                        <option value="1954">1954</option>
                                        <option value="1955">1955</option>
                                        <option value="1956">1956</option>
                                        <option value="1957">1957</option>
                                        <option value="1958">1958</option>
                                        <option value="1959">1959</option>
                                        <option value="1960">1960</option>
                                        <option value="1961">1961</option>
                                        <option value="1962">1962</option>
                                        <option value="1963">1963</option>
                                        <option value="1964">1964</option>
                                        <option value="1965">1965</option>
                                        <option value="1966">1966</option>
                                        <option value="1967">1967</option>
                                        <option value="1968">1968</option>
                                        <option value="1969">1969</option>
                                        <option value="1970">1970</option>
                                        <option value="1971">1971</option>
                                        <option value="1972">1972</option>
                                        <option value="1973">1973</option>
                                        <option value="1974">1974</option>
                                        <option value="1975">1975</option>
                                        <option value="1976">1976</option>
                                        <option value="1977">1977</option>
                                        <option value="1978">1978</option>
                                        <option value="1979">1979</option>
                                        <option value="1980">1980</option>
                                        <option value="1981">1981</option>
                                        <option value="1982">1982</option>
                                        <option value="1983">1983</option>
                                        <option value="1984">1984</option>
                                        <option value="1985">1985</option>
                                        <option value="1986">1986</option>
                                        <option value="1987">1987</option>
                                        <option value="1988">1988</option>
                                        <option value="1989">1989</option>
                                        <option value="1990">1990</option>
                                        <option value="1991">1991</option>
                                        <option value="1992">1992</option>
                                        <option value="1993">1993</option>
                                        <option value="1994">1994</option>
                                        <option value="1995">1995</option>
                                        <option value="1996">1996</option>
                                        <option value="1997">1997</option>
                                        <option value="1998">1998</option>
                                        <option value="1999">1999</option>
                                        <option value="2000">2000</option>
                                        <option value="2001">2001</option>
                                        <option value="2002">2002</option>
                                        <option value="2003">2003</option>
                                        <option value="2004">2004</option>
                                        <option value="2005">2005</option>
                                        <option value="2006">2006</option>
                                        <option value="2007">2007</option>
                                        <option value="2008">2008</option>
                                        <option value="2009">2009</option>
                                        <option value="2010">2010</option>
                                        <option value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option selected value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                    </select>

                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option value="">Ending Year</option>
                                        <option value="1940">1940</option>
                                        <option value="1941">1941</option>
                                        <option value="1942">1942</option>
                                        <option value="1943">1943</option>
                                        <option value="1944">1944</option>
                                        <option value="1945">1945</option>
                                        <option value="1946">1946</option>
                                        <option value="1947">1947</option>
                                        <option value="1948">1948</option>
                                        <option value="1949">1949</option>
                                        <option value="1950">1950</option>
                                        <option value="1951">1951</option>
                                        <option value="1952">1952</option>
                                        <option value="1953">1953</option>
                                        <option value="1954">1954</option>
                                        <option value="1955">1955</option>
                                        <option value="1956">1956</option>
                                        <option value="1957">1957</option>
                                        <option value="1958">1958</option>
                                        <option value="1959">1959</option>
                                        <option value="1960">1960</option>
                                        <option value="1961">1961</option>
                                        <option value="1962">1962</option>
                                        <option value="1963">1963</option>
                                        <option value="1964">1964</option>
                                        <option value="1965">1965</option>
                                        <option value="1966">1966</option>
                                        <option value="1967">1967</option>
                                        <option value="1968">1968</option>
                                        <option value="1969">1969</option>
                                        <option value="1970">1970</option>
                                        <option value="1971">1971</option>
                                        <option value="1972">1972</option>
                                        <option value="1973">1973</option>
                                        <option value="1974">1974</option>
                                        <option value="1975">1975</option>
                                        <option value="1976">1976</option>
                                        <option value="1977">1977</option>
                                        <option value="1978">1978</option>
                                        <option value="1979">1979</option>
                                        <option value="1980">1980</option>
                                        <option value="1981">1981</option>
                                        <option value="1982">1982</option>
                                        <option value="1983">1983</option>
                                        <option value="1984">1984</option>
                                        <option value="1985">1985</option>
                                        <option value="1986">1986</option>
                                        <option value="1987">1987</option>
                                        <option value="1988">1988</option>
                                        <option value="1989">1989</option>
                                        <option value="1990">1990</option>
                                        <option value="1991">1991</option>
                                        <option value="1992">1992</option>
                                        <option value="1993">1993</option>
                                        <option value="1994">1994</option>
                                        <option value="1995">1995</option>
                                        <option value="1996">1996</option>
                                        <option value="1997">1997</option>
                                        <option value="1998">1998</option>
                                        <option value="1999">1999</option>
                                        <option value="2000">2000</option>
                                        <option value="2001">2001</option>
                                        <option value="2002">2002</option>
                                        <option value="2003">2003</option>
                                        <option value="2004">2004</option>
                                        <option value="2005">2005</option>
                                        <option value="2006">2006</option>
                                        <option value="2007">2007</option>
                                        <option value="2008">2008</option>
                                        <option value="2009">2009</option>
                                        <option value="2010">2010</option>
                                        <option value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option selected value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="" for="inlineFormCustomSelect">Grading System<span class="requiredstar">*</span></label>
                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option value="">Select Grading System</option>
                                        <option value="">Scale 10 Grading System</option>
                                        <option value="">Scale 4 Grading System</option>
                                        <option value="">% marks of 100 maximum</option>
                                        <option value="">Course requires a pass</option>
                                    </select>
                                </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- for add doctorate/phd end here -->

            <!-- for add class XII start here -->

            <div class="modal fade" id="AddClassXII" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Class XII</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label class="" for="inlineFormCustomSelect">Education <span class="requiredstar">*</span></label>
                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option>12th</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-form-label">Board<span class="requiredstar">*</span></label>
                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option>Select Board</option>
                                        <option>----All IndiaCBSE-----</option>
                                        <option>CISCE(ICSE/ISC)</option>
                                        <option>Diploma</option>
                                        <option>National Open School</option>
                                        <option>IB(International Baccalaureate)</option>

                                        <option>----State Boards----</option>
                                        <option>Andhra Pradesh</option>
                                        <option>Arunachal Pradesh</option>
                                        <option>Bihar</option>
                                        <option>Chhattisgarh</option>
                                        <option>Goa</option>
                                        <option>Gujarat</option>
                                        <option>Haryana</option>
                                        <option>Himachal Pradesh</option>
                                        <option>J &amp; K </option>
                                        <option>Jharkhand</option>
                                        <option>Karnataka</option>
                                        <option>Kerala</option>
                                        <option>Madhya Pradesh</option>
                                        <option>Maharashtra</option>
                                        <option>Manipur</option>
                                        <option>Meghalaya</option>
                                        <option>Mizoram</option>
                                        <option>Nagaland</option>
                                        <option>Odisha</option>
                                        <option>Punjab</option>
                                        <option>Rajasthan</option>
                                        <option>Tamil Nadu</option>
                                        <option>Telangana</option>
                                        <option>Tripura</option>
                                        <option>Uttar Pradesh</option>
                                        <option>Uttarakhand</option>
                                        <option>West Bengal</option>
                                        <option>Other</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label class="" for="inlineFormCustomSelect">Passing out year <span class="requiredstar">*</span></label>
                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option value="">Select Year</option>
                                        <option value="1940">1940</option>
                                        <option value="1941">1941</option>
                                        <option value="1942">1942</option>
                                        <option value="1943">1943</option>
                                        <option value="1944">1944</option>
                                        <option value="1945">1945</option>
                                        <option value="1946">1946</option>
                                        <option value="1947">1947</option>
                                        <option value="1948">1948</option>
                                        <option value="1949">1949</option>
                                        <option value="1950">1950</option>
                                        <option value="1951">1951</option>
                                        <option value="1952">1952</option>
                                        <option value="1953">1953</option>
                                        <option value="1954">1954</option>
                                        <option value="1955">1955</option>
                                        <option value="1956">1956</option>
                                        <option value="1957">1957</option>
                                        <option value="1958">1958</option>
                                        <option value="1959">1959</option>
                                        <option value="1960">1960</option>
                                        <option value="1961">1961</option>
                                        <option value="1962">1962</option>
                                        <option value="1963">1963</option>
                                        <option value="1964">1964</option>
                                        <option value="1965">1965</option>
                                        <option value="1966">1966</option>
                                        <option value="1967">1967</option>
                                        <option value="1968">1968</option>
                                        <option value="1969">1969</option>
                                        <option value="1970">1970</option>
                                        <option value="1971">1971</option>
                                        <option value="1972">1972</option>
                                        <option value="1973">1973</option>
                                        <option value="1974">1974</option>
                                        <option value="1975">1975</option>
                                        <option value="1976">1976</option>
                                        <option value="1977">1977</option>
                                        <option value="1978">1978</option>
                                        <option value="1979">1979</option>
                                        <option value="1980">1980</option>
                                        <option value="1981">1981</option>
                                        <option value="1982">1982</option>
                                        <option value="1983">1983</option>
                                        <option value="1984">1984</option>
                                        <option value="1985">1985</option>
                                        <option value="1986">1986</option>
                                        <option value="1987">1987</option>
                                        <option value="1988">1988</option>
                                        <option value="1989">1989</option>
                                        <option value="1990">1990</option>
                                        <option value="1991">1991</option>
                                        <option value="1992">1992</option>
                                        <option value="1993">1993</option>
                                        <option value="1994">1994</option>
                                        <option value="1995">1995</option>
                                        <option value="1996">1996</option>
                                        <option value="1997">1997</option>
                                        <option value="1998">1998</option>
                                        <option value="1999">1999</option>
                                        <option value="2000">2000</option>
                                        <option value="2001">2001</option>
                                        <option value="2002">2002</option>
                                        <option value="2003">2003</option>
                                        <option value="2004">2004</option>
                                        <option value="2005">2005</option>
                                        <option value="2006">2006</option>
                                        <option value="2007">2007</option>
                                        <option value="2008">2008</option>
                                        <option value="2009">2009</option>
                                        <option value="2010">2010</option>
                                        <option value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option selected value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="" class="col-form-label">School Medium <span class="requiredstar">*</span></label>
                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option>Select Medium</option>
                                        <option>Assamese / Asomiya</option>
                                        <option>Bengali / Bangla</option>
                                        <option>English</option>
                                        <option>Gujarati</option>
                                        <option>Hindi</option>
                                        <option>Kannada</option>
                                        <option>Kashmiri</option>
                                        <option>Konkani</option>
                                        <option>Malayalam</option>
                                        <option>Manipuri</option>
                                        <option>Marathi</option>
                                        <option>Oriya</option>
                                        <option>Punjabi</option>
                                        <option>Sanskrit</option>
                                        <option>Tamil</option>
                                        <option>Telugu</option>
                                        <option>Urdu</option>
                                        <option>Other</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="" class="col-form-label">Total Marks <span class="requiredstar">*</span></label>
                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option>Select total marks</option>
                                        <option>>40%</option>
                                        <option>45-49.9%</option>
                                        <option>50-59.9%</option>
                                        <option>60-69.9%</option>
                                        <option>70-79.9%</option>
                                        <option>80-89.9%</option>
                                        <option>90-99.9%</option>
                                        <option>100%</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-form-label">English Marks <span class="requiredstar">*</span></label>
                                    <input type="text" class="form-control" id="" placeholder="Marks (Out of 100)" value="Pune University">
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-form-label">Math Marks <span class="requiredstar">*</span></label>
                                    <input type="text" class="form-control" id="" placeholder="Marks (Out of 100)" value="Pune University">
                                </div>


                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- for add class XII end here -->

            <!-- for add doctorate/phd start here -->

            <div class="modal fade" id="AddDoctorate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Doctorate/PHD</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label class="" for="inlineFormCustomSelect">Education <span class="requiredstar">*</span></label>
                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option>Doctorate/PHD</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-form-label">University/Institute <span class="requiredstar">*</span></label>
                                    <input type="text" class="form-control" id="" placeholder="Select university/Institute" value="Pune University">
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-form-label">Course <span class="requiredstar">*</span></label>
                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option selected>MBA/PGDM</option>
                                        <option>Ph.D./Doctorate</option>
                                        <option>MPHIL</option>
                                        <option>Other Doctorate</option>
                                    </select>
                                </div>

                                <div class="form-group"> <label>Course Type</label>
                                    <div class="form-check form-check-inline form-group">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">Full Time</label>
                                    </div>
                                    <div class="form-check form-check-inline form-group">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">Part Time</label>
                                    </div>
                                    <div class="form-check form-check-inline form-group">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">Correspondence/Distance Learning</label>
                                    </div>
                                </div>

                                <div class="form-group forselectionnn">
                                    <label class="" for="inlineFormCustomSelect">Course Duration <span class="requiredstar">*</span></label>
                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option value="">Starting Year</option>
                                        <option value="1940">1940</option>
                                        <option value="1941">1941</option>
                                        <option value="1942">1942</option>
                                        <option value="1943">1943</option>
                                        <option value="1944">1944</option>
                                        <option value="1945">1945</option>
                                        <option value="1946">1946</option>
                                        <option value="1947">1947</option>
                                        <option value="1948">1948</option>
                                        <option value="1949">1949</option>
                                        <option value="1950">1950</option>
                                        <option value="1951">1951</option>
                                        <option value="1952">1952</option>
                                        <option value="1953">1953</option>
                                        <option value="1954">1954</option>
                                        <option value="1955">1955</option>
                                        <option value="1956">1956</option>
                                        <option value="1957">1957</option>
                                        <option value="1958">1958</option>
                                        <option value="1959">1959</option>
                                        <option value="1960">1960</option>
                                        <option value="1961">1961</option>
                                        <option value="1962">1962</option>
                                        <option value="1963">1963</option>
                                        <option value="1964">1964</option>
                                        <option value="1965">1965</option>
                                        <option value="1966">1966</option>
                                        <option value="1967">1967</option>
                                        <option value="1968">1968</option>
                                        <option value="1969">1969</option>
                                        <option value="1970">1970</option>
                                        <option value="1971">1971</option>
                                        <option value="1972">1972</option>
                                        <option value="1973">1973</option>
                                        <option value="1974">1974</option>
                                        <option value="1975">1975</option>
                                        <option value="1976">1976</option>
                                        <option value="1977">1977</option>
                                        <option value="1978">1978</option>
                                        <option value="1979">1979</option>
                                        <option value="1980">1980</option>
                                        <option value="1981">1981</option>
                                        <option value="1982">1982</option>
                                        <option value="1983">1983</option>
                                        <option value="1984">1984</option>
                                        <option value="1985">1985</option>
                                        <option value="1986">1986</option>
                                        <option value="1987">1987</option>
                                        <option value="1988">1988</option>
                                        <option value="1989">1989</option>
                                        <option value="1990">1990</option>
                                        <option value="1991">1991</option>
                                        <option value="1992">1992</option>
                                        <option value="1993">1993</option>
                                        <option value="1994">1994</option>
                                        <option value="1995">1995</option>
                                        <option value="1996">1996</option>
                                        <option value="1997">1997</option>
                                        <option value="1998">1998</option>
                                        <option value="1999">1999</option>
                                        <option value="2000">2000</option>
                                        <option value="2001">2001</option>
                                        <option value="2002">2002</option>
                                        <option value="2003">2003</option>
                                        <option value="2004">2004</option>
                                        <option value="2005">2005</option>
                                        <option value="2006">2006</option>
                                        <option value="2007">2007</option>
                                        <option value="2008">2008</option>
                                        <option value="2009">2009</option>
                                        <option value="2010">2010</option>
                                        <option value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option selected value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                    </select>

                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option value="">Ending Year</option>
                                        <option value="1940">1940</option>
                                        <option value="1941">1941</option>
                                        <option value="1942">1942</option>
                                        <option value="1943">1943</option>
                                        <option value="1944">1944</option>
                                        <option value="1945">1945</option>
                                        <option value="1946">1946</option>
                                        <option value="1947">1947</option>
                                        <option value="1948">1948</option>
                                        <option value="1949">1949</option>
                                        <option value="1950">1950</option>
                                        <option value="1951">1951</option>
                                        <option value="1952">1952</option>
                                        <option value="1953">1953</option>
                                        <option value="1954">1954</option>
                                        <option value="1955">1955</option>
                                        <option value="1956">1956</option>
                                        <option value="1957">1957</option>
                                        <option value="1958">1958</option>
                                        <option value="1959">1959</option>
                                        <option value="1960">1960</option>
                                        <option value="1961">1961</option>
                                        <option value="1962">1962</option>
                                        <option value="1963">1963</option>
                                        <option value="1964">1964</option>
                                        <option value="1965">1965</option>
                                        <option value="1966">1966</option>
                                        <option value="1967">1967</option>
                                        <option value="1968">1968</option>
                                        <option value="1969">1969</option>
                                        <option value="1970">1970</option>
                                        <option value="1971">1971</option>
                                        <option value="1972">1972</option>
                                        <option value="1973">1973</option>
                                        <option value="1974">1974</option>
                                        <option value="1975">1975</option>
                                        <option value="1976">1976</option>
                                        <option value="1977">1977</option>
                                        <option value="1978">1978</option>
                                        <option value="1979">1979</option>
                                        <option value="1980">1980</option>
                                        <option value="1981">1981</option>
                                        <option value="1982">1982</option>
                                        <option value="1983">1983</option>
                                        <option value="1984">1984</option>
                                        <option value="1985">1985</option>
                                        <option value="1986">1986</option>
                                        <option value="1987">1987</option>
                                        <option value="1988">1988</option>
                                        <option value="1989">1989</option>
                                        <option value="1990">1990</option>
                                        <option value="1991">1991</option>
                                        <option value="1992">1992</option>
                                        <option value="1993">1993</option>
                                        <option value="1994">1994</option>
                                        <option value="1995">1995</option>
                                        <option value="1996">1996</option>
                                        <option value="1997">1997</option>
                                        <option value="1998">1998</option>
                                        <option value="1999">1999</option>
                                        <option value="2000">2000</option>
                                        <option value="2001">2001</option>
                                        <option value="2002">2002</option>
                                        <option value="2003">2003</option>
                                        <option value="2004">2004</option>
                                        <option value="2005">2005</option>
                                        <option value="2006">2006</option>
                                        <option value="2007">2007</option>
                                        <option value="2008">2008</option>
                                        <option value="2009">2009</option>
                                        <option value="2010">2010</option>
                                        <option value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option selected value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="" for="inlineFormCustomSelect">Grading System<span class="requiredstar">*</span></label>
                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option value="">Select Grading System</option>
                                        <option value="">Scale 10 Grading System</option>
                                        <option value="">Scale 4 Grading System</option>
                                        <option value="">% marks of 100 maximum</option>
                                        <option value="">Course requires a pass</option>
                                    </select>
                                </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- for add doctorate/phd end here -->

            <!-- for add class X start here -->

            <div class="modal fade" id="AddClassX" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Class X</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label class="" for="inlineFormCustomSelect">Education <span class="requiredstar">*</span></label>
                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option>10th</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-form-label">Board<span class="requiredstar">*</span></label>
                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option>Select Board</option>
                                        <option>----All IndiaCBSE-----</option>
                                        <option>CISCE(ICSE/ISC)</option>
                                        <option>Diploma</option>
                                        <option>National Open School</option>
                                        <option>IB(International Baccalaureate)</option>

                                        <option>----State Boards----</option>
                                        <option>Andhra Pradesh</option>
                                        <option>Arunachal Pradesh</option>
                                        <option>Bihar</option>
                                        <option>Chhattisgarh</option>
                                        <option>Goa</option>
                                        <option>Gujarat</option>
                                        <option>Haryana</option>
                                        <option>Himachal Pradesh</option>
                                        <option>J &amp; K </option>
                                        <option>Jharkhand</option>
                                        <option>Karnataka</option>
                                        <option>Kerala</option>
                                        <option>Madhya Pradesh</option>
                                        <option>Maharashtra</option>
                                        <option>Manipur</option>
                                        <option>Meghalaya</option>
                                        <option>Mizoram</option>
                                        <option>Nagaland</option>
                                        <option>Odisha</option>
                                        <option>Punjab</option>
                                        <option>Rajasthan</option>
                                        <option>Tamil Nadu</option>
                                        <option>Telangana</option>
                                        <option>Tripura</option>
                                        <option>Uttar Pradesh</option>
                                        <option>Uttarakhand</option>
                                        <option>West Bengal</option>
                                        <option>Other</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label class="" for="inlineFormCustomSelect">Passing out year <span class="requiredstar">*</span></label>
                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option value="">Select Year</option>
                                        <option value="1940">1940</option>
                                        <option value="1941">1941</option>
                                        <option value="1942">1942</option>
                                        <option value="1943">1943</option>
                                        <option value="1944">1944</option>
                                        <option value="1945">1945</option>
                                        <option value="1946">1946</option>
                                        <option value="1947">1947</option>
                                        <option value="1948">1948</option>
                                        <option value="1949">1949</option>
                                        <option value="1950">1950</option>
                                        <option value="1951">1951</option>
                                        <option value="1952">1952</option>
                                        <option value="1953">1953</option>
                                        <option value="1954">1954</option>
                                        <option value="1955">1955</option>
                                        <option value="1956">1956</option>
                                        <option value="1957">1957</option>
                                        <option value="1958">1958</option>
                                        <option value="1959">1959</option>
                                        <option value="1960">1960</option>
                                        <option value="1961">1961</option>
                                        <option value="1962">1962</option>
                                        <option value="1963">1963</option>
                                        <option value="1964">1964</option>
                                        <option value="1965">1965</option>
                                        <option value="1966">1966</option>
                                        <option value="1967">1967</option>
                                        <option value="1968">1968</option>
                                        <option value="1969">1969</option>
                                        <option value="1970">1970</option>
                                        <option value="1971">1971</option>
                                        <option value="1972">1972</option>
                                        <option value="1973">1973</option>
                                        <option value="1974">1974</option>
                                        <option value="1975">1975</option>
                                        <option value="1976">1976</option>
                                        <option value="1977">1977</option>
                                        <option value="1978">1978</option>
                                        <option value="1979">1979</option>
                                        <option value="1980">1980</option>
                                        <option value="1981">1981</option>
                                        <option value="1982">1982</option>
                                        <option value="1983">1983</option>
                                        <option value="1984">1984</option>
                                        <option value="1985">1985</option>
                                        <option value="1986">1986</option>
                                        <option value="1987">1987</option>
                                        <option value="1988">1988</option>
                                        <option value="1989">1989</option>
                                        <option value="1990">1990</option>
                                        <option value="1991">1991</option>
                                        <option value="1992">1992</option>
                                        <option value="1993">1993</option>
                                        <option value="1994">1994</option>
                                        <option value="1995">1995</option>
                                        <option value="1996">1996</option>
                                        <option value="1997">1997</option>
                                        <option value="1998">1998</option>
                                        <option value="1999">1999</option>
                                        <option value="2000">2000</option>
                                        <option value="2001">2001</option>
                                        <option value="2002">2002</option>
                                        <option value="2003">2003</option>
                                        <option value="2004">2004</option>
                                        <option value="2005">2005</option>
                                        <option value="2006">2006</option>
                                        <option value="2007">2007</option>
                                        <option value="2008">2008</option>
                                        <option value="2009">2009</option>
                                        <option value="2010">2010</option>
                                        <option value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option selected value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="" class="col-form-label">School Medium <span class="requiredstar">*</span></label>
                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option>Select Medium</option>
                                        <option>Assamese / Asomiya</option>
                                        <option>Bengali / Bangla</option>
                                        <option>English</option>
                                        <option>Gujarati</option>
                                        <option>Hindi</option>
                                        <option>Kannada</option>
                                        <option>Kashmiri</option>
                                        <option>Konkani</option>
                                        <option>Malayalam</option>
                                        <option>Manipuri</option>
                                        <option>Marathi</option>
                                        <option>Oriya</option>
                                        <option>Punjabi</option>
                                        <option>Sanskrit</option>
                                        <option>Tamil</option>
                                        <option>Telugu</option>
                                        <option>Urdu</option>
                                        <option>Other</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="" class="col-form-label">Total Marks <span class="requiredstar">*</span></label>
                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option>Select total marks</option>
                                        <option>>40%</option>
                                        <option>45-49.9%</option>
                                        <option>50-59.9%</option>
                                        <option>60-69.9%</option>
                                        <option>70-79.9%</option>
                                        <option>80-89.9%</option>
                                        <option>90-99.9%</option>
                                        <option>100%</option>
                                    </select>
                                </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- for add project start here -->
            <div id="edit_candidate_project"></div>
            <div class="modal fade" id="AddProject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                         <form id="add_project" method="POST" action="<?php echo base_url(); ?>recruitment/save_candidate_project_details">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Projects</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">                           
                                <div class="form-group"> <label for="" class="col-form-label">Project Title <span class="requiredstar">*</span></label>
                                    <input type="text" name="project_title" class="form-control" id="" placeholder="Enter Project Title">
                                </div>

                                <div class="form-group">
                                    <label class="" for="inlineFormCustomSelect">Tag this project with your Employment/Education <span class="requiredstar">*</span></label>
                                    <select name="education_employemnt" id="education_employemnt" class="custom-select" id="inlineFormCustomSelect">
                                    <option value="">Select Employment/Education</option>
                                   <?php 
                                    if(!empty($education_employemnt))
                                    {
                                        foreach ($education_employemnt as $row) 
                                        {
                                            if ($row->emp_employment_type !="Internship") {
                                                if (
                                                    empty(
                                                        $row->emp_current_desigantion
                                                    )
                                                ) {
                                                    $designation =
                                                        $row->emp_perv_designation;
                                                } else {
                                                    $designation =
                                                        $row->emp_current_desigantion;
                                                } ?>
                                        <option value="<?php echo $designation .
                                            "-" .
                                            $row->emp_current_company_name; ?>"><?php echo $designation .
    "-" .
    $row->emp_current_company_name; ?></option>
                                        
                                        <?php
                                            }
                                        }  } 
                                    if(!empty($education_employemnt)) { ?>
                                    <option value="<?php echo $designation ."-" .$row->emp_current_company_name; ?>"><?php echo $designation ."-" .$row->emp_current_company_name; ?></option>
                                     <?php }
                                     if($education_details)
                                     { 
                                     foreach($education_details as  $row){ ?>
                                     <option <?php if($row->education == 5){ $data = $this->M_Candidate_profile->get_candidate_education(
                            $row->education
                        );  ?>value="<?=  $data[0]
                        ->main_course_name;?>" <?php } elseif($row->education == 4){ $data = $this->M_Candidate_profile->get_candidate_education(
                            $row->education
                        );?>value="<?=  $data[0]
                        ->main_course_name;?>" <?php } elseif($row->education == 3)
                        {
                            $query = $this->db->query("select * from candidate_course where course_id = $row->course");
                            $course_details = $query->row(); ?> value="<?=  @$course_details->course_name." ".@$data->specialization_name ?>" <?php } 
                            elseif($row->education == 2){ 
                            $query = $this->db->query("select * from candidate_course where course_id = $row->course");
                            $course_details = $query->row();?> value="<?=  @$course_details->course_name." ".@$data->specialization_name ?>" 
                            <?php } 
                            elseif($row->education == 1){ $query = $this->db->query("select * from candidate_course where course_id = $row->course");
                            $course_details = $query->row(); ?> value="<?=  @$course_details->course_name." ".@$data->specialization_name ?>"
                                     <?php } ?> > 
                                     <?php if($row->education == 5){ $data = $this->M_Candidate_profile->get_candidate_education(
                            $row->education
                        );  ?><?=  $data[0]
                        ->main_course_name;?> <?php } elseif($row->education == 4){ $data = $this->M_Candidate_profile->get_candidate_education(
                            $row->education
                        );?><?=  $data[0]
                        ->main_course_name;?> <?php } elseif($row->education == 3)
                        {
                            $query = $this->db->query("select * from candidate_course where course_id = $row->course");
                            $course_details = $query->row(); ?> <?=  @$course_details->course_name." ".@$data->specialization_name ?> <?php } 
                            elseif($row->education == 2){ 
                            $query = $this->db->query("select * from candidate_course where course_id = $row->course");
                            $course_details = $query->row();?> <?=  @$course_details->course_name." ".@$data->specialization_name ?> 
                            <?php } 
                            elseif($row->education == 1){ $query = $this->db->query("select * from candidate_course where course_id = $row->course");
                            $course_details = $query->row(); ?> <?=  @$course_details->course_name." ".@$data->specialization_name ?>> 
                                     <?php } ?> 
                                     
                                     </option> <?php } }?> 
                                    </select>
                                </div>
                                
                                <div class="form-group"> <label for="" class="col-form-label">Client <span class="requiredstar">*</span></label>
                                    <input type="text" name="client_name" class="form-control" id="client_name" placeholder="Enter Client Name">
                                </div>

                                <div class="form-group">
                                    <p><label>Project Status</label></p>
                                    <div class="form-check form-check-inline form-group">
                                        <input type="radio" name="project_status" id="project_status"  value="In Progress">
                                        <label   class="form-check-label" for="inlineRadio1">In Progress</label>
                                    </div>
                                    <div class="form-check form-check-inline form-group">
                                        <input name="project_status" id="project_status" type="radio"   value="Finished">
                                        <label  class="form-check-label" for="inlineRadio2">Finished</label>
                                    </div>
                                </div>

                                <div class="form-group"> <label for="" class="col-form-label"> Client Name <span class="requiredstar">*</span></label>
                                    <input type="text" name="client_name" class="form-control" id="" placeholder="Enter Client Name">
                                </div>

                                <div class="form-group forselectionnn">

                                    <label class="" for="inlineFormCustomSelect">Worked From<span class="requiredstar">*</span></label>
                                    <select name="worked_from_year" class="custom-select" id="worked_from_year">
                                    <option selected=""  value="">Years</option>
                                    
                                    </select>

                                    <select class="custom-select" id="worked_from_month" name="worked_from_month">
                                        <option selected="" value="">Months</option>
                                        <option value="1">Jan</option>
                                        <option value="2">Feb</option>
                                        <option value="3">Mar</option>
                                        <option value="4">Apr</option>
                                        <option value="5">May</option>
                                        <option value="6">Jun</option>
                                        <option value="7">Jul</option>
                                        <option value="8">Aug</option>
                                        <option value="9">Sep</option>
                                        <option value="10">Oct</option>
                                        <option value="11">Nov</option>
                                        <option value="12">Dec</option>
                                    </select>

                                </div>


                                <div id="display_by_status" class="form-group forselectionnn">

                                    <label class="" for="inlineFormCustomSelect">Worked till <span class="requiredstar">*</span></label>
                                    <select class="custom-select" name="worked_till_year" id="worked_till_year">
                                    <option selected="">Years</option>
                                        
                                    </select>

                                    <select class="custom-select" name="worked_till_month" id="worked_till_month">
                                        <option value="1">Jan</option>
                                        <option value="2">Feb</option>
                                        <option value="3">Mar</option>
                                        <option value="4">Apr</option>
                                        <option value="5">May</option>
                                        <option value="6">Jun</option>
                                        <option value="7">Jul</option>
                                        <option value="8">Aug</option>
                                        <option value="9">Sep</option>
                                        <option value="10">Oct</option>
                                        <option value="11">Nov</option>
                                        <option value="12">Dec</option>
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Details of project</label>
                                    <textarea  name="project_details" class="form-control" id="project_details" rows="3" placeholder="Enter Details Of Project"></textarea>
                                </div> 
                            <div id="details_show_more"class="col s12"><a onclick="display_project_more_details()" class="txt-col-p1 typ-16Bold">Add more details</a></div>
                            <div id="show_more_details" style="display:none;">  
                             <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Project location</label>
                                    <textarea  name="project_location" class="form-control" id="project_location" rows="3" placeholder="Enter Project Location"></textarea>
                              </div> 
                              
                              <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Project Site</label>
                                    <textarea  name="project_site" class="form-control" id="project_site" rows="3" placeholder="Enter Project Site"></textarea>
                              </div> 
                              
                              <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Nature of employment</label>
                                    <textarea  name="nature_of_employment" class="form-control" id="nature_of_employment" rows="3" placeholder="Enter Project Nature of employment"></textarea>
                              </div> 
                              
                    <div class="form-group">
                            <label for="exampleFormControlTextarea1">Team Size</label>
                            <select class="form-control" name="team_size" id="team_size">
                                    <option value="" selected>Select Team</option>
                                <?php for ($startYear = 1;$startYear <= 30;$startYear++) 
                                    { ?>
                                    <option value="<?php echo $startYear; ?>"><?php echo $startYear; ?></option>
                              <?php } ?>
                            </select>
                                    
                    </div> 
                    
                    <div class="form-group">
                            <label for="exampleFormControlTextarea1">Role</label>
                            <input tupe="text"  name="role" class="form-control" id="role" placeholder="Enter Role">
                    </div> 
                    
                    <div class="form-group">
                            <label for="exampleFormControlTextarea1">Role description</label>
                            <textarea  name="role_description" class="form-control" id="role_description" rows="3" placeholder="Enter Role description"></textarea>
                    </div>   
                    <div class="form-group">
                            <label for="exampleFormControlTextarea1">Skills used</label>
                            <input tupe="text"  name="skill_used" class="form-control" id="skill_used" placeholder="Enter Skill Used">
                    </div> 
                    
                              
                    </div>      
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                         </form>
                    </div>
                </div>
            </div>

            <!-- for add project end here -->

            <!-- for Add Profile Summery Modal start here -->
<div  id="profile_edit"></div>          
<div class="modal fade" id="ProfileSummery" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Profile Summary</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form id="Profile_Summery" method="POST" action="<?php echo base_url(); ?>recruitment/save_candidate_profile_summary">
            <div class="modal-body">
               <p>In your profile summary, you should add the top points about your career and education, your professional interests, and what kind of job you want. Write a noticeable job summary of more than 50 characters.
                   </p>
               <div class="form-group">
                  <textarea id="candidate_profile_summary" name="candidate_profile_summary" class="form-control" placeholder="Type Here"  rows="3"></textarea>
                  <span>200 Character(s) Left</span>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
               <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
         </form>
      </div>
   </div>
</div>

            <!-- for Add Profile Summery Modal end here -->

            <!-- for Add Online Profile Modal start here -->
            <div  id="social_media_edit"></div>
            <div class="modal fade" id="OnlineProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="add_social_paltforms" action="<?php echo base_url(); ?>recruitment/save_social_paltforms_candidate" method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Online Profiles</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Add links to your social profiles (e.g. Linkedin profile, Facebook profile, etc.).</p>
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Social Profile <span class="requiredstar">*</span></label>
                                        <select class="form-control" name="social_platform" id="social_platform">
                                            <option value="">Select Social Media Platform</option>
                                            <option value="facebook">Facebook</option>
                                            <option value="twitter">Twitter</option>
                                            <option value="linkedin">LinkedIn</option> 
                                            <option value="instagram">Instagram</option>
                                            <option value="youtube">YouTube</option>
                                            <option value="pinterest">Pinterest</option>
                                            <option value="whatsapp">WhatsApp</option>
                                            <option value="reddit">Reddit</option>
                                            <option value="git">Git</option>
                                            <option value="skype">Skype</option>
                                        </select>
                                    </div>

                                <div class="form-group">
                                    <label for="" class="col-form-label">URL <span class="requiredstar">*</span></label>
                                    <input type="text" name="profile_url" class="form-control" id="" placeholder="Enter your social profile URL">
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="social_platform_description" class="form-control" placeholder="Type Here" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    <span>500 Character(s) Left</span>
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <!-- for Add Online Profile Modal end here -->

            <!-- for Add work samples Modal start here -->
            <div id="edit_wok_samples"></div>
            <div class="modal fade" id="WorkSample" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                     <form id="add_work_samples" method="POST" action="<?php echo base_url(); ?>recruitment/save_candidate_work_samples">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Work Samples</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Add links to your projects (e.g. Github links, etc.).</p>
                            
                                <div class="form-group">
                                    <label for="" class="col-form-label">Work Title <span class="requiredstar">*</span></label>
                                    <input type="text" name="work_title" class="form-control" id="" placeholder="Type your work title">
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-form-label">URL <span class="requiredstar">*</span></label>
                                    <input type="text" name="work_url" class="form-control" id="" placeholder="Enter your social profile URL">
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" value="yes"   name="currently_working" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">I am currently working on this</label>
                                </div>

                                <div class="form-group forselectionnn">

                                    <label class="" for="inlineFormCustomSelect">Duration from <span class="requiredstar">*</span></label>
                                    <select name="start_duration_year" class="form-control" id="inlineFormCustomSelect">
                                        <option value="">Year</option>
                                        <option value="1940">1940</option>
                                        <option value="1941">1941</option>
                                        <option value="1942">1942</option>
                                        <option value="1943">1943</option>
                                        <option value="1944">1944</option>
                                        <option value="1945">1945</option>
                                        <option value="1946">1946</option>
                                        <option value="1947">1947</option>
                                        <option value="1948">1948</option>
                                        <option value="1949">1949</option>
                                        <option value="1950">1950</option>
                                        <option value="1951">1951</option>
                                        <option value="1952">1952</option>
                                        <option value="1953">1953</option>
                                        <option value="1954">1954</option>
                                        <option value="1955">1955</option>
                                        <option value="1956">1956</option>
                                        <option value="1957">1957</option>
                                        <option value="1958">1958</option>
                                        <option value="1959">1959</option>
                                        <option value="1960">1960</option>
                                        <option value="1961">1961</option>
                                        <option value="1962">1962</option>
                                        <option value="1963">1963</option>
                                        <option value="1964">1964</option>
                                        <option value="1965">1965</option>
                                        <option value="1966">1966</option>
                                        <option value="1967">1967</option>
                                        <option value="1968">1968</option>
                                        <option value="1969">1969</option>
                                        <option value="1970">1970</option>
                                        <option value="1971">1971</option>
                                        <option value="1972">1972</option>
                                        <option value="1973">1973</option>
                                        <option value="1974">1974</option>
                                        <option value="1975">1975</option>
                                        <option value="1976">1976</option>
                                        <option value="1977">1977</option>
                                        <option value="1978">1978</option>
                                        <option value="1979">1979</option>
                                        <option value="1980">1980</option>
                                        <option value="1981">1981</option>
                                        <option value="1982">1982</option>
                                        <option value="1983">1983</option>
                                        <option value="1984">1984</option>
                                        <option value="1985">1985</option>
                                        <option value="1986">1986</option>
                                        <option value="1987">1987</option>
                                        <option value="1988">1988</option>
                                        <option value="1989">1989</option>
                                        <option value="1990">1990</option>
                                        <option value="1991">1991</option>
                                        <option value="1992">1992</option>
                                        <option value="1993">1993</option>
                                        <option value="1994">1994</option>
                                        <option value="1995">1995</option>
                                        <option value="1996">1996</option>
                                        <option value="1997">1997</option>
                                        <option value="1998">1998</option>
                                        <option value="1999">1999</option>
                                        <option value="2000">2000</option>
                                        <option value="2001">2001</option>
                                        <option value="2002">2002</option>
                                        <option value="2003">2003</option>
                                        <option value="2004">2004</option>
                                        <option value="2005">2005</option>
                                        <option value="2006">2006</option>
                                        <option value="2007">2007</option>
                                        <option value="2008">2008</option>
                                        <option value="2009">2009</option>
                                        <option value="2010">2010</option>
                                        <option value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                    </select>

                                    <select name="start_duration_month" id="start_duration_month" class="form-control" id="inlineFormCustomSelect">
                                        <option value="">Select Months</option>
                                        <option value="1">Jan</option>
                                        <option value="2">Feb</option>
                                        <option value="3">Mar</option>
                                        <option value="4">Apr</option>
                                        <option value="5">May</option>
                                        <option value="6">Jun</option>
                                        <option value="7">Jul</option>
                                        <option value="8">Aug</option>
                                        <option value="9">Sep</option>
                                        <option value="10">Oct</option>
                                        <option value="11">Nov</option>
                                        <option value="12">Dec</option>
                                    </select>

                                </div>

                                <div class="form-group forselectionnn">

                                    <label class="" for="inlineFormCustomSelect">Duration To <span class="requiredstar">*</span></label>
                                    <select name="end_duration_year" class="form-control" id="inlineFormCustomSelect">
                                        <option value="">Year</option>
                                        <option value="1940">1940</option>
                                        <option value="1941">1941</option>
                                        <option value="1942">1942</option>
                                        <option value="1943">1943</option>
                                        <option value="1944">1944</option>
                                        <option value="1945">1945</option>
                                        <option value="1946">1946</option>
                                        <option value="1947">1947</option>
                                        <option value="1948">1948</option>
                                        <option value="1949">1949</option>
                                        <option value="1950">1950</option>
                                        <option value="1951">1951</option>
                                        <option value="1952">1952</option>
                                        <option value="1953">1953</option>
                                        <option value="1954">1954</option>
                                        <option value="1955">1955</option>
                                        <option value="1956">1956</option>
                                        <option value="1957">1957</option>
                                        <option value="1958">1958</option>
                                        <option value="1959">1959</option>
                                        <option value="1960">1960</option>
                                        <option value="1961">1961</option>
                                        <option value="1962">1962</option>
                                        <option value="1963">1963</option>
                                        <option value="1964">1964</option>
                                        <option value="1965">1965</option>
                                        <option value="1966">1966</option>
                                        <option value="1967">1967</option>
                                        <option value="1968">1968</option>
                                        <option value="1969">1969</option>
                                        <option value="1970">1970</option>
                                        <option value="1971">1971</option>
                                        <option value="1972">1972</option>
                                        <option value="1973">1973</option>
                                        <option value="1974">1974</option>
                                        <option value="1975">1975</option>
                                        <option value="1976">1976</option>
                                        <option value="1977">1977</option>
                                        <option value="1978">1978</option>
                                        <option value="1979">1979</option>
                                        <option value="1980">1980</option>
                                        <option value="1981">1981</option>
                                        <option value="1982">1982</option>
                                        <option value="1983">1983</option>
                                        <option value="1984">1984</option>
                                        <option value="1985">1985</option>
                                        <option value="1986">1986</option>
                                        <option value="1987">1987</option>
                                        <option value="1988">1988</option>
                                        <option value="1989">1989</option>
                                        <option value="1990">1990</option>
                                        <option value="1991">1991</option>
                                        <option value="1992">1992</option>
                                        <option value="1993">1993</option>
                                        <option value="1994">1994</option>
                                        <option value="1995">1995</option>
                                        <option value="1996">1996</option>
                                        <option value="1997">1997</option>
                                        <option value="1998">1998</option>
                                        <option value="1999">1999</option>
                                        <option value="2000">2000</option>
                                        <option value="2001">2001</option>
                                        <option value="2002">2002</option>
                                        <option value="2003">2003</option>
                                        <option value="2004">2004</option>
                                        <option value="2005">2005</option>
                                        <option value="2006">2006</option>
                                        <option value="2007">2007</option>
                                        <option value="2008">2008</option>
                                        <option value="2009">2009</option>
                                        <option value="2010">2010</option>
                                        <option value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                    </select>

                                    <select name="end_duration_month" id="end_duration_month" class="form-control" id="inlineFormCustomSelect">
                                        <option value="">Select Months</option>
                                        <option value="1">Jan</option>
                                        <option value="2">Feb</option>
                                        <option value="3">Mar</option>
                                        <option value="4">Apr</option>
                                        <option value="5">May</option>
                                        <option value="6">Jun</option>
                                        <option value="7">Jul</option>
                                        <option value="8">Aug</option>
                                        <option value="9">Sep</option>
                                        <option value="10">Oct</option>
                                        <option value="11">Nov</option>
                                        <option value="12">Dec</option>
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea  name="descriptios_work_sample" class="form-control" placeholder="Type Here" id="descriptios_work_sample" rows="3"></textarea>
                                    <span>500 Character(s) Left</span>
                                </div>                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                   </form> 
                    </div>
                </div>
            </div>
            <!-- for Add work samples Modal end here -->

            <!-- for Add White Paper Modal start here -->
            <div  id="edit_white_paper_research_publication_journal_entry"></div>
            <div  id="edit_candidate_key_skills"></div>
            <div class="modal fade" id="WhitePaper" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">White Paper / Research Publication / Journal Entry</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="add_white_paper_research_publication_journal_entry" method="post" action="<?php echo base_url(); ?>recruitment/save_white_paper_research_publication_journal_entry">
                            <p>Add links to your prosssjects (e.g. Github links, etc.).</p>
                            
                                <div class="form-group">
                                    <label for="" class="col-form-label">Title <span class="requiredstar">*</span></label>
                                    <input name="white_paper_title" type="text" class="form-control" id="white_paper_title" placeholder="Enter title">
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-form-label">URL <span class="requiredstar">*</span></label>
                                    <input name="white_paper_url" type="text" class="form-control" id="white_paper_url" placeholder="Enter URL">
                                </div>

                                <div class="form-group forselectionnn">
                                    <?php $years = array_combine( range(date("Y"), 1947),range(date("Y"), 1947)); ?>
                                    <label class="" for="inlineFormCustomSelect">Published On</label>
                                    <select class="custom-select" name="white_paper_publish_year" id="white_paper_publish_year">
                                        <option value="">Year</option>
                                        <?php foreach ($years as $row) { ?>
                                        <option value="<?php echo $row; ?>"><?php echo $row; ?></option>
                                        <?php } ?>
                                        
                                    </select>

                                    <select name="white_paper_publish_month" class="custom-select" id="white_paper_publish_month">
                                        <option>Months</option>
                                        <option value="1">Jan</option>
                                        <option value="2">Feb</option>
                                        <option value="3">Mar</option>
                                        <option value="4">Apr</option>
                                        <option value="5">May</option>
                                        <option value="6">Jun</option>
                                        <option value="7">Jul</option>
                                        <option value="8">Aug</option>
                                        <option value="9">Sep</option>
                                        <option value="10">Oct</option>
                                        <option value="11">Nov</option>
                                        <option value="12">Dec</option>
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" placeholder="Type Here" name="white_paper_dec" id="white_paper_dec" rows="3"></textarea>
                                    <span>500 Character(s) Left</span>
                                </div>
                           
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                         </form>
                    </div>
                </div>
            </div>
        </div>


            <!-- for Add White Paper Modal end here -->

            <!-- for Add Presentation Modal start here -->
            <div id="presentation_edit"></div>
            <div class="modal fade" id="Presentation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                     <form id="add_presentation" method="post" action="<?php echo base_url(); ?>recruitment/save_candidate_presentations"> 
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Presentation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Add links to your online presentations (e.g. Slideshare presentation links etc.).</p>                           
                                <div class="form-group">
                                    <label for="" class="col-form-label">Presentation Title <span class="requiredstar">*</span></label>
                                    <input type="text" name="presentation_title" class="form-control" id="presentation_title" placeholder="Type your presentation name">
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-form-label">URL <span class="requiredstar">*</span></label>
                                    <input name="presentation_url" type="text" class="form-control" id="presentation_url" placeholder="Enter URL">
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="presentation_description" class="form-control" placeholder="Type Here" id="presentation_description" rows="3"></textarea>
                                    <span>500 Character(s) Left</span>
                                </div>
                           
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                         </form>
                    </div>
                </div>
            </div>
            <!-- for Add Presentation Modal end here -->

            <!-- for add Patent start here -->
            <div id="edit_Patent"></div>
            <div class="modal fade" id="Patent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="add_patent" method="POST" action="<?php echo base_url(); ?>recruitment/save_candidate_patent_details">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Patent</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">                           
                                <p>Add details of patents you have filed.</p>
                                <div class="form-group"> <label for="" class="col-form-label">Patent Title <span class="requiredstar">*</span></label>
                                    <input type="text" name="patent_title" class="form-control" id="patent_title" placeholder="Enter Patent Title">
                                </div>

                                <div class="form-group"> <label for="" class="col-form-label">URL <span class="requiredstar">*</span></label>
                                    <input type="text" class="form-control" name="patent_url" id="patent_url" placeholder="Enter URL">
                                </div>

                                <div class="form-group"> <label for="" class="col-form-label">Patent Office</label>
                                    <input type="text" class="form-control" name="patent_office" id="patent_office" placeholder="Enter Patent Office">
                                </div>
                                <div class="form-group">
                                    <p><label>Status</label></p>
                                    <div class="form-check form-check-inline form-group">
                                        <input class="form-check-input" type="radio" name="patent_status" id="patent_status" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Patent Issued</label>
                                    </div>
                                    <div class="form-check form-check-inline form-group">
                                        <input class="form-check-input" type="radio" name="patent_status" id="patent_status" value="0">
                                        <label class="form-check-label" for="inlineRadio2">Patent Pending</label>
                                    </div>
                                </div>
                                <div class="form-group"> <label for="" class="col-form-label"> Application Number </label>
                                    <input type="text" class="form-control" name="patent_application_no" id="patent_application_no" placeholder="Enter Application Number">
                                </div>
                                <div class="form-group forselectionnn">
                                 <?php $years = array_combine(
                                     range(date("Y"), 1947),
                                     range(date("Y"), 1947)
                                 ); ?>
                                    <label class="" for="inlineFormCustomSelect">Issued Date <span class="requiredstar">*</span></label>
                                    <select class="custom-select" name="patent_issue_year" id="patent_issue_year">
                                        <option selected="">Years</option>
                                        <?php foreach ($years as $row) { ?>
                                        <option value="<?php echo $row; ?>"><?php echo $row; ?></option>
                                        <?php } ?>
                                    </select>
                                    <select class="custom-select" name="patent_issue_month" id="patent_issue_month">
                                        <option selected="">Months</option>
                                        <option value="1">Jan</option>
                                        <option value="2">Feb</option>
                                        <option value="3">Mar</option>
                                        <option value="4">Apr</option>
                                        <option value="5">May</option>
                                        <option value="6">Jun</option>
                                        <option value="7">Jul</option>
                                        <option value="8">Aug</option>
                                        <option value="9">Sep</option>
                                        <option value="10">Oct</option>
                                        <option value="11">Nov</option>
                                        <option value="12">Dec</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Description</label>
                                    <textarea class="form-control" name="patent_description" id="patent_description" rows="3" placeholder="Type here"></textarea>
                                </div>
                            
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                      </form>
                    </div>
                </div>
            </div>

            <!-- for add patent end here -->


            <!-- for add Certification start here -->
            <div id="Certifications_edit"></div>    
            <div class="modal fade" id="Certifications" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="add_certifications" method="POST" action="<?php echo base_url(); ?>recruitment/save_candidate_certificates">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Certifications</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                                <p>Add details of Certifications you have achieved/completed</p>
                                <div class="form-group"> <label for="" class="col-form-label">Certification Name <span class="requiredstar">*</span></label>
                                    <input name="certificate_name" type="text" class="form-control" id="" placeholder="Enter your Certification Name">
                                </div>

                                  <div class="form-group"> <label for="" class="col-form-label">Certification Provider <span class="requiredstar">*</span></label>
                                    <input name="certification_provider" type="text" class="form-control" id="" placeholder="Enter your Certification Name">
                                </div>

                                <div class="form-group"> <label for="" class="col-form-label">Certification Completion ID <span class="requiredstar">*</span></label>
                                    <input name="certification_completion_id" type="text" class="form-control" id="" placeholder="Enter your Certification Completion ID">
                                </div>

                                <div class="form-group"> <label for="" class="col-form-label">Certification URL </label>
                                    <input name="certificate_url" type="text" class="form-control" id="" placeholder="Enter URL">
                                </div>


                                <div class="form-group forcertification">

                                    <label class="" for="inlineFormCustomSelect">Certification Validity<span class="requiredstar">*</span></label>
                                    <div class="forcertificationInn">
                                        <select name="certificate_validity_start_month" class="custom-select" id="inlineFormCustomSelect">
                                            <option selected="">MM</option>
                                            <option value="1">Jan</option>
                                            <option value="2">Feb</option>
                                            <option value="3">Mar</option>
                                            <option value="4">Apr</option>
                                            <option value="5">May</option>
                                            <option value="6">Jun</option>
                                            <option value="7">Jul</option>
                                            <option value="8">Aug</option>
                                            <option value="9">Sep</option>
                                            <option value="10">Oct</option>
                                            <option value="11">Nov</option>
                                            <option value="12">Dec</option>          
                                           </select>

                                         <select name="certificate_validity_start_year" class="custom-select" id='date-dropdown1'>
                                                <option value="1">YYYY</option>
                                         </select> 

                                        <select name=" certificate_validity_end_month" class="custom-select" id="inlineFormCustomSelect">
                                            <option value="1">Jan</option>
                                            <option value="2">Feb</option>
                                            <option value="3">Mar</option>
                                            <option value="4">Apr</option>
                                            <option value="5">May</option>
                                            <option value="6">Jun</option>
                                            <option value="7">Jul</option>
                                            <option value="8">Aug</option>
                                            <option value="9">Sep</option>
                                            <option value="10">Oct</option>
                                            <option value="11">Nov</option>
                                            <option value="12">Dec</option> 
                                        </select>
                                        <select name="cerificate_validity_end_year" class="custom-select" id='date-dropdown'>
                                            <option value="1">YYYY</option>
                                        </select>                    
                                       
                                    </div>

                                </div>

                                <div class="form-group">
                                    <input type="checkbox" value="1"  name="doesnot_expired">
                                    This certification does not expire
                                    
                                </div>                            
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

            <!-- for add Certification end here -->

            <!-- for add CareerProfile start here -->

            <div class="modal fade" id="CareerProfiles">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Career Profile</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="col-md-">
                                <form id="add_career_profile" method="POST" action="<?php echo base_url(); ?>recruitment/save_carrer_profile_candidate">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label>Current Industry</label>
                                            <input type="hidden" name="candidate_id" value="<?= $candidate_ids ?>">
                                            <input type="text" id="career_current_industry" name="career_current_industry" placeholder="Type Current Industry" class="form-control ">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Department</label>
                                            <input type="text" class="form-control " autocomplete="off" placeholder="Enter Department" name="career_profile_department" id="career_profile_department" value="">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Role Category</label>
                                            <input type="text" class="form-control " autocomplete="off" placeholder="Enter Category" name="career_category" id="career_category" value="">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Job Role</label>
                                            <input type="text" class="form-control " autocomplete="off" placeholder="Enter Job Role" name="career_job_role" id="career_job_role" value="">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Desired Job Type</label><br>
                                            <div class="desiredJobbbb"><input type="checkbox" id="career_desired_job_type" name="career_desired_job_type[]" value="Permanent"> <label> Permanent </label> <input type="checkbox" id="career_desired_job_type[]" name="career_desired_job_type[]" value="Contractual"> <label> Contractual</label></div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Desired Employment Type</label><br>
                                            <div class="desiredJobType">
                                                <input type="checkbox" id="career_employment_type" name="career_employment_type[]" value="Full Time">&nbsp;<label>Full Time</label>&nbsp;&nbsp;&nbsp; <input type="checkbox" id="career_employment_type" name="career_employment_type[]" value="Part Time">&nbsp;<label>Part Time</label>
                                        </div>
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label>Preferred Shift</label><br>
                                            <div class="preferShifttt"><input type="radio" id="career_preferred_shift" name="career_preferred_shift" value="Day">&nbsp;<label>Day</label>&nbsp;&nbsp;&nbsp;<input type="radio" id="career_preferred_shift" name="career_preferred_shift" value="Night">&nbsp;<label>Night</label>&nbsp;&nbsp;&nbsp;<input type="radio" id="career_preferred_shift" name="career_preferred_shift" value="Flexible">&nbsp;<label>Flexible</label>
                                        </div></div>

                                        <div class="form-group col-md-6">
                                            <label>Preferred Work Location (Max 10)</label>
                                            <select multiple class="custom-select" id="preferred_work_location[]" name="preferred_work_location[]">
                                                <option value="">Select Location</option>
                                                <?php foreach (
                                                    $citiesandstates
                                                    as $row
                                                ) { ?>
                                                <option value="<?php echo $row->city_code; ?>"><?php echo strtoupper(
    $row->city_name
) .
    " / " .
    "<b>" .
    $row->state .
    "</b>"; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Expected Salary</label>
                                            <input type="text" class="form-control " autocomplete="off" placeholder="Expected Salary" name="expected_salary" id="expected_salary" value="">
                                        </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button id="career_sumbit" type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Modal footer -->
                    </div>

                </div>
            </div>
            <!-- for add CareerProfile end here -->

            <!-- for add IT SKILLS end here -->


            <!-- for add IT SKILLS end here -->

            <div class="col-md-6">            
             <div class="it_skill_edit" id="it_skill_edit"></div>
            <div class="modal fade" id="AddITskills">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Add IT Skills</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                    <div class="col-md-12">  
                    <form id="add_it_skills" method="POST" action="<?php echo base_url(); ?>recruitment/save_it_skills_candidate"> 
                      <div class="row">
                        <div id="skill_software_names" class="form-group col-md-12">
                          <label>Skill / Software Name</label>
                           <input type="hidden" name="candidate_id" value="<?= $candidate_ids ?>">
                           <input type="text" id="software_name" name="software_name" placeholder="Skill / Software Name" class="form-control ">
                        </div>
                        
                        <div id="software_versions" class="form-group col-md-6">
                          <label>Software Version</label>
                          <input type="text" class="form-control " autocomplete="off" placeholder="Enter Software Version" name="software_versions" id="software_versions" value="<?= @$candidate->name ?>">
                        </div>
                        
                        <div id="last_useds" class="form-group col-md-6">
                          <label>Last Used</label>
                          <select class="custom-select" id="software_last_used" name="software_last_used">       
                            <option value="">Select Year</option>
                            <?php for (
                                $startYear = 1997;
                                $startYear <= 3000;
                                $startYear++
                            ) { ?>
                            <option <?php if (
                                @$candidate->candidate_started_working_from_yr ==
                                $startYear
                            ) {
                                echo "selected";
                            } ?> value="<?php echo $startYear; ?>"> <?php echo $startYear; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                       
                         <div id="exp_years" class="form-group col-md-6">
                          <label>Experience</label>
                          <select class="custom-select" id="exp_year" name="exp_year">       
                            <option value="">Select Year</option>
                            <?php for (
                                $startYear = 1;
                                $startYear <= 30;
                                $startYear++
                            ) { ?>
                            <option <?php if (
                                @$candidate->candidate_started_working_from_yr ==
                                $startYear
                            ) {
                                echo "selected";
                            } ?> value="<?php echo $startYear; ?>"><?php echo $startYear .
    " " .
    "Years"; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        
                         <div id="exp_months" class="form-group col-md-6">
                          <label>Last Used</label>
                          <select class="custom-select" id="exp_month" name="exp_month">       
                            <option value="">Select Month</option>
                            <?php for (
                                $startYear = 1;
                                $startYear <= 12;
                                $startYear++
                            ) { ?>
                            <option <?php if (
                                @$candidate->candidate_started_working_from_yr ==
                                $startYear
                            ) {
                                echo "selected";
                            } ?> value="<?php echo $startYear; ?>"><?php echo $startYear .
    " " .
    "Months"; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                 <div class="modal-footer">
                    <button type="button"  class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button  type="submit" class="btn btn-primary" >Save</button>
                </div>   
                 </form>
                </div>
                </div>
              <!-- Modal footer -->                 
              </div>
              
              </div>
            </div>
          </div>

            <!-- for add Personal Details end here -->



            <div id="personal_details_edit"></div>
            <div class="modal fade" id="PersonalDetailssss">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Personal Details</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-">
                                <form id="add_personal_deatils" method="POST" action="<?php echo base_url(); ?>recruitment/save_personal_details_candidate">
                                     <input type="hidden" name="candidate_id" value="<?= $candidate_ids ?>">
 <div class="row">
    <div class="form-group col-md-12">
        <label for="gender"><b>Gender :</b></label><br>
        <div class="d-flex flex-wrap align-items-center">
                <input name="gender" id="gender_male" type="radio" value="Male" class="error" aria-describedby="gender-error">
                <label for="gender_male">Male</label>
                <input name="gender" id="gender_female" type="radio" value="Female" class="error">
                <label for="gender_female">Female</label>
                <input name="gender" id="gender_trans" type="radio" value="Transgender" class="error">
                <label for="gender_trans">Transgender</label>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-md-12">
        <span id="gender-error" class="error"></span>
    </div>
</div>



 <div class="row">
    <div class="form-group col-md-12">
        <label><b>Married Status :</b></label>
        <div class="d-flex flex-wrap align-items-center">
           
                <input name="married_status" id="single" type="radio" value="Single/unmarried" class="error" aria-describedby="married_status-error">
                <label for="single">Single/unmarried</label>
                <input name="married_status" id="married" type="radio" value="Married" class="error">
                <label for="married">Married</label>
                <input name="married_status" id="widowed" type="radio" value="Widowed" class="error">
                <label for="widowed">Widowed</label>
                <input name="married_status" id="divorced" type="radio" value="Divorced" class="error">
                <label for="divorced">Divorced</label>
                <input name="married_status" id="separated" type="radio" value="Separated" class="error">
                <label for="separated">Separated</label>
                <input name="married_status" id="other" type="radio" value="Other" class="error">
                <label for="other">Other</label>
        </div>
    </div>
    
</div>
<div class="form-group col-md-12">
    <span id="married_status-error" class="error"></span>
</div>

<div class="row">
       <div class="form-group col-md-12">
            <label>Date of Birth</label>
</div>
                                            </div>
                                            
                                            <div class="row">
                                            <div class="form-group col-md-12 frBirthhh">
                                              <div class="form-group col-md-4">
                                            <select class="form-select" id="birth_date" name="birth_date">
                                                <option value="">Select Date</option>
                                                <?php for (
                                                    $startYear = 1;
                                                    $startYear <= 31;
                                                    $startYear++
                                                ) { ?>
                                                <option <?php if (
                                                    @$candidate->candidate_started_working_from_yr ==
                                                    $startYear
                                                ) {
                                                    echo "selected";
                                                } ?> value="<?php echo $startYear; ?>"><?php echo $startYear; ?></option>
                                                <?php } ?>
                                            </select></div>
                                             <div class="form-group col-md-4">       
                                            <select class="form-select" id="birth_month" name="birth_month">
                                                <option value="">Select Month</option>
                                                <option value="1"><?php echo "Jan"; ?></option>
                                                <option value="2"><?php echo "Feb"; ?></option>
                                                <option value="3"><?php echo "Mar"; ?></option>
                                                <option value="4"><?php echo "Apr"; ?></option>
                                                <option value="5"><?php echo "May"; ?></option>
                                                <option value="6"><?php echo "Jun"; ?></option>
                                                <option value="7"><?php echo "Jul"; ?></option>
                                                <option value="8"><?php echo "Aug"; ?></option>
                                                <option value="9"><?php echo "Sep"; ?></option>
                                                <option value="10"><?php echo "Oct"; ?></option>
                                                <option value="11"><?php echo "Nov"; ?></option>
                                                <option value="12"><?php echo "Dec"; ?></option>

                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <select class="form-select" id="birth_year" name="birth_year">
                                                <option value="">Select Year</option>
                                                <?php for (
                                                    $startYear = 1930;
                                                    $startYear <= 2050;
                                                    $startYear++
                                                ) { ?>
                                                <option <?php if (
                                                    @$candidate->candidate_started_working_from_yr ==
                                                    $startYear
                                                ) {
                                                    echo "selected";
                                                } ?> value="<?php echo $startYear; ?>"><?php echo $startYear; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    </div>

<div class="row">
    <div class="form-group col-md-12">
        <label><b>Category</b></label><br>
        <div class="d-flex flex-wrap align-items-center">
                <input name="cast_cat" id="general" type="radio" value="General" class="error" aria-describedby="cast_cat-error">
                <label for="general">General</label>
                <input name="cast_cat" id="sc" type="radio" value="Scheduled Caste (SC)" class="error">
                <label for="sc">Scheduled Caste (SC)</label>
                <input name="cast_cat" id="st" type="radio" value="Scheduled Tribe (ST)" class="error">
                <label for="st">Scheduled Tribe (ST)</label>
                <input name="cast_cat" id="obc_creamy" type="radio" value="OBC - Creamy" class="error">
                <label for="obc_creamy">OBC - Creamy</label><br>
                <input name="cast_cat" id="obc_non_creamy" type="radio" value="OBC - Non creamy" class="error">
                <label for="obc_non_creamy">OBC - Non creamy</label>
                <input name="cast_cat" id="other" type="radio" value="Other" class="error">
                <label for="other">Other</label>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-md-12">
        <span id="cast_cat-error" class="error"></span>
    </div>
</div>


<div class="row">
    <div class="form-group col-md-12">
        <label><b>Are you Differently Abled?</b></label><br>
        <div class="d-flex flex-wrap align-items-center">
                <input name="differently_abled" id="differently_abled_yes" type="radio" value="yes" class="error" aria-describedby="differently_abled-error">
                <label for="differently_abled_yes">Yes</label>
                <input name="differently_abled" id="differently_abled_no" type="radio" value="no" class="error">
                <label for="differently_abled_no">No</label>
            <span id="differently_abled-error" class="error"></span>
        </div>
    </div>
</div>



<div class="row">
    <div class="form-group col-md-12">
        <label><b>Have you taken a Career Break?</b></label><br>
        <div class="d-flex flex-wrap align-items-center">
                <input name="career_break" id="career_break_yes" type="radio" value="yes" class="error" aria-describedby="career_break-error">
                <label for="career_break_yes">Yes</label>
                <input name="career_break" id="career_break_no" type="radio" value="no" class="error">
                <label for="career_break_no">No</label>
        </div>
         <span id="career_break-error" class="error"></span>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-12">
                                            <label>Permanent Address</label>
                                            <input type="text" id="permanant_addresss" name="permanant_addresss" placeholder="Enter Address" class="form-control">
                                        </div>
                                        </div>

<div class="row">
                                        <div class="form-group col-md-12">
                                            <label>Hometown</label>
                                            <input type="text" id="hometown" name="hometown" placeholder="Enter Hometown" class="form-control">
                                        </div>
                                        </div>

<div class="row">
                                        <div id="last_useds" class="form-group col-md-12">
                                            <label>Pincode</label>
                                            <input type="text" id="candidate_pincode" name="candidate_pincode" class="form-control">
                                        </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="form-group col-md-12"> 
                                        <h5>Language</h5>
                                        <div class="box-body ">
                                            <div id="showtable">
                                                <table id="example8" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Language</th>
                                                            <th>Language Proficiant</th>
                                                            <th>Add</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <div id="tasskkdf_1">
                                                  <tr id="add_more_1">
                                                                <td> <?php echo "1"; ?> </td>
                                                                    <td><input rows="4" cols="50" type="text" class="form-control form-group" name="language_add[]" id="language_add" placeholder="Enter Language">
                                                                    <input type="checkbox" id="lang_read_1" name="lang_read[0]" value="Read">&nbsp;
                                                                    Read
                                                                    <input type="checkbox" id="lang_write_1" name="lang_write[0]" value="Write">&nbsp;
                                                                    Write
                                                                    <input type="checkbox" id="lang_speak_1" name="lang_speak[0]" value="Speak">&nbsp;
                                                                    Speak

                                                                </td>
                                                                <td> <select class="form-select valid" id="lan_proficiant" name="lan_proficiant[]">
                                                                        <option value="Beginner">Beginner</option>
                                                                        <option value="Proficient">Proficient</option>
                                                                        <option value="Expert">Expert</option>
                                                                    </select>
                                                                </td>
                                                                <td><button type="button" id="add_more_rowt_eng_1" class="btn btn-info btn-sm" onClick="add_more_task_eng()">Add</button></td>
                                                            </tr>
                                                        </div>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        </div>
</div>
                                    <div class="frrightalignn">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- col-lg-9 end here-->
        </div></div></div>

    
    <div class="modal fade deletePopupppp" id="resume_delete_popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  
                    <div class="modal-content">
                        <div class="modal-body">
                            <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruitment/delete_candidate_resume', $attributes);
              ?>   
                        <input type="hidden" id="deleteID" name="deleteID" >
                           Are you sure you want to delete the resume?
                           <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit"   class="btn btn-primary">Delete</button>
                        </div>
                                   </form>
                        </div>
                        
                    </div>
                    
          
                </div>
             </div>  
             
             <!-- for add photo modal -->
             <div class="modal fade" id="uploadPhoto">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Profile photo upload</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                    <div class="col-md-12">  
                      <div class="row">
                        <div id="" class="form-group col-md-12">
                         <p>Profile with photo has 40% higher chances of getting noticed by recruiters.</p>
                    <?php echo form_open_multipart('candidate_profile/update_profile_picture'); ?>
  <div class="form-group">
    <label for="exampleFormControlFile1">Upload Photo</label>
    <input type="file" class="form-control-file" name="candidate_profile_pic" id="candidate_profile_pic">
    <input type="hidden" class="form-control-file" name="candidate_profile_pics" value="<?= $user_details[0]->image; ?>" id="candidate_profile_pics">
  </div>

<p><span>Supported file format: png, jpg, jpeg, gif - upto 2MB</span></p>
<p><span>By uploading your photograph, you certify that naukri.com has the right to display this photograph to the recruiters and that the uploaded file does not violate our <a href="">Terms of services.</a></span></p>
                        </div>
                        
                      </div>
                 <div class="modal-footer">
                    <button type="button"  class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button  type="submit" class="btn btn-primary" >Save</button>
                </div>   
                 </form>
                </div>
                </div>
              <!-- Modal footer -->                 
              </div>
              
              </div>
            </div>
             <!-- for add photo modal end here -->
             
             
             
                          
             <!-- for add resume modal -->
             <div class="modal fade" id="resume_upload">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Resume upload</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                    <div class="col-md-12">  
                      <div class="row">
                        <div id="" class="form-group col-md-12">
                    <?php echo form_open_multipart('recruitment/update_resume'); ?>
  <div class="form-group">
    <label for="exampleFormControlFile1">Upload Resume</label>
    <input type="file" class="form-control-file" name="resumes_upload" id="resumes_upload">
    <input type="hidden" class="form-control-file" name="resume_candidate" value="<?= $user_details[0] ->resume; ?>" id="resume_candidate">
  </div>
    </div>
                        
    </div>
        <div class="modal-footer">
                    <button type="button"  class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button  type="submit" class="btn btn-primary" >Update</button>
                </div>   
                 </form>
                </div>
                </div>
              <!-- Modal footer -->                 
              </div>
              
              </div>
            </div>
             <!-- for add resume modal end here -->
<script>

 $(document).ready(function(){
            $('#resumes_upload').on('change', function(){
                var file = this.files[0];
                var formData = new FormData();
                var base_url = '<?php echo base_url() ?>';
                formData.append('resumes_upload', file);
                $.ajax({
                    url: base_url+'recruitment/update_resume',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    xhr: function(){
                        var xhr = new XMLHttpRequest();
                        xhr.upload.addEventListener('progress', function(event){
                            if (event.lengthComputable) {
                                var percent = Math.round((event.loaded / event.total) * 100);
                                $('#uploadProgress').html('Uploading: ' + percent + '%');
                            }
                        }, false);
                        return xhr;
                    },
                    success: function(response)
                    {
                        $('#uploadProgress').html(response);
                        location.reload("candidate_profile/fill_candidate_profile");
                    }
                });
            });
        });
function deleteConfirm(id)
  {
    $("#deleteID").val(id);
    $("#resume_delete_popup").modal();
  }
</script>


<script>
    // Counter to keep track of the number of skill inputs
    let skillCounter = 1; 

    document.getElementById('add-skill').addEventListener('click', function() {
        // Create a new skill input field
        var container = document.getElementById('skills-container');
        var newDiv = document.createElement('div');
        newDiv.classList.add('skill-input', 'col-md-8');
        
        // Create a unique ID for the new skill input
        let newId = skillCounter++;
        
        newDiv.id = 'skill-input-' + newId;
        newDiv.innerHTML = `
            <input class="form-control" type="text" name="skill[]" placeholder="Enter skill" required></br>
            <input type="date" class="form-control mb-2 date-range-picker" name="from_date[]" placeholder="Select From Date" required>
            <input type="date" class="form-control mb-2 date-range-picker" name="to_date[]" placeholder="Select To Date" required>
            <span><i style="color: red" class="fa fa-times icon-remove remove-btns" data-id="${newId}"></i></span>`;
        
        container.appendChild(newDiv);
    });

    document.getElementById('skills-container').addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-btns')) {
            // Remove the skill input field based on its unique ID
            let skillId = e.target.getAttribute('data-id');
            let elementToRemove = document.getElementById('skill-input-' + skillId);
            if (elementToRemove) {
                elementToRemove.remove();
            }
        }
    });
</script>