<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Montek | Candidate profile</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url();?>backend/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>frontend/css/comman_style.css">


  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
 
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
  
  nav{
    width: fit-content;
    border: 1px solid #666;
    border-radius: 4px;
    overflow: hidden;
    display: flex;
    flex-direction: row;
    flex-wrap: no-wrap;
}
nav input{ display: none; }
nav label{
    font-family: sans-serif;
    padding: 0px 2px;
    border-right: 1px solid #ccc;
    cursor: pointer;
    transition: all 0.3s;
    font-size:13px;
}
nav label:last-of-type{ border-right: 0; }
nav label:hover{
    background: #eee;
}
nav input:checked + label{
    background: #becbff;
}
  
    .popup{
      font-size: 16px;
      font-weight: bold;
    }
    .popup1 {
      font-size: 16px;
      font-weight: bold;
      text-align: right;
    }
    .heading{
      font-size: 15px;
      color: #00a1ff;
      font-family: cursive;
    }
    .press-box {
      margin-top: 60px;
      padding: 12px;
      box-shadow: 0 0 15px rgb(0 0 0 / 10%);
      margin-bottom: 30px;
    }
    .padd_top{
      padding-top: 36px;
    }
    .content-wrapper{
      margin-left: 100px;
      margin-right: 100px;
    }
    .news_sec {
      padding: 50px 0;
    }
  </style>




<div class="container news_sec">
<div class="container"></br>
  <h2>Candidate Form Complete</h2>
  <div class="progress"> 
  <?php $progress_bar=0;  ?>
    <?php if(!empty($employment_details)){

     $progress_bar=0; 

     ?>
    <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="50" style="width:<?php echo ($progress_bar)+20  ?>%" >
      <span class="sr-only"><?php echo $progress_bar?>% Complete</span>
    </div>
     <?php } if(!empty($education_de)){  ?>
    <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="50" style="width:<?php echo ($progress_bar)+20;?>%" >
      <span class="sr-only"><?php echo $progress_bar?>% Complete</span>
    </div>
    <?php } if(!empty($candidate_skil)){ ?>
    <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="50" style="width:<?php echo ($progress_bar)+20;?>%" >
      <span class="sr-only"><?php echo $progress_bar?>% Complete</span>
    </div>
     <?php }if(!empty($career_pro)){ ?>
        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="50" style="width:<?php echo ($progress_bar)+20;?>%" >
      <span class="sr-only"><?php echo $progress_bar?>% Complete</span>
    </div>
      <?php } if(!empty($personal_det)){ ?>
      <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="50" style="width:<?php echo ($progress_bar)+20;?>%" >
        <span class="sr-only"><?php echo $progress_bar?>% Complete</span>
    </div>
       <?php }?>
  </div>
</div>

<div class="press-box">
<div class="col-md-12">
  <div class="row">
      <div class="col-md-6">
         <h2 class="popup">Resume</h2>
         <a target="_blank" href="<?php echo base_url();?><?php echo $user_details[0]->candidate_resume ?>">Download Resume!</a>
         <form action="<?php echo base_url()?>recruitment/update_resume" method="post" enctype="multipart/form-data">
          <input type="file" name="resumes_upload" id="resumes_upload"  placeholder="upload resume"></br></br>
          <input type="hidden" placeholder="Enter Name" name="resume_candidate" id="resume_candidate" value="<?php echo $user_details[0]->candidate_resume ?>"> 
          <button class="btn btn-primary" type="submit">Update Resume</button>
         </form>
      </div>
  </div>
</div>
</div>

    <div class="press-box">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-6">
            <h2 class="popup">Employment</h2>
            <?php foreach($employement_details as $row){?>
            <?php if($row->emp_employment=="Yes" && $row->emp_employment_type=="Full Time"){ ?>
            <h3 class="heading"><?php echo  $row->emp_job_profile ?>&nbsp;<i  onclick="edit_employment_details(<?php echo $row->id ?>)" style="color:blue" class="fa fa-pencil" aria-hidden="true"></i></h3>
            <p><?php echo $row->emp_current_company_name ?></p>
            <p><?php echo $row->emp_employment_type." ". $row->emp_joining_month." ".$row->emp_joining_year." "."To"." ".$row->emp_work_till_month ;?></p>
            <p><?php echo $row->emp_job_profile; ?></p>
            <p><span><b>Top 5 Key Skills:</b></span><?php echo $row->emp_skill_used ?></p>
            <hr>
            <?php } ?>
            
            <?php if($row->emp_employment=="No" && $row->emp_employment_type=="Full Time"){?>
            <h3 class="heading"><?php echo  $row->emp_perv_designation ?>&nbsp;<i onclick="edit_employment_details(<?php echo $row->id ?>)" style="color:blue" class="fa fa-pencil" aria-hidden="true"></i></h3>
            <p><?php echo $row->emp_perv_company_name ?></p>
            <p><?php echo $row->emp_employment_type." ". $row->emp_joining_month." ".$row->emp_joining_year." "."To"." ".$row->emp_work_till_month." ".$row->emp_work_till_year ;?></p>
            <p><?php echo $row->emp_job_profile; ?></p>
            <hr>
            <?php } ?>
            
             <?php if($row->emp_employment=="Yes" && $row->emp_employment_type=="Internship"){?>
            <h3 class="heading"><?php echo  $row->intern_roles ?>&nbsp;<i onclick="edit_employment_details(<?php echo $row->id ?>)" style="color:blue" class="fa fa-pencil" aria-hidden="true"></i></h3>
            <p><?php echo $row->emp_current_company_name ?></p>
            <p><?php echo $row->emp_employment_type." ". $row->emp_joining_month." ".$row->emp_joining_year." "."To"." ".$row->emp_work_till_month." ".$row->emp_work_till_year ;?></p>
            <p><?php echo $row->emp_job_profile; ?></p>
            <hr>
            <?php } ?>
            
             <?php if($row->emp_employment=="No" && $row->emp_employment_type=="Internship"){?>
            <h3 class="heading"><?php echo  $row->emp_perv_designation ?>&nbsp;<i onclick="edit_employment_details(<?php echo $row->id ?>)" style="color:blue" class="fa fa-pencil" aria-hidden="true"></i></h3>
            <p><?php echo $row->emp_perv_company_name ?></p>
            <p><?php echo $row->emp_employment_type." ". $row->emp_joining_month." ".$row->emp_joining_year." "."To"." ".$row->emp_work_till_month." ".$row->emp_work_till_year ;?></p>
            <p><?php echo $row->emp_job_profile; ?></p>
            <hr>
            <?php } ?>
            <?php }?>
            
          </div>
          <div class="col-md-6">
            <h2 class="popup1" data-toggle="modal" data-target="#myModal" style="cursor:pointer">Add Employment</h2>
            <div class="employment_edit" id="employment_edit"></div>
            <div class="modal fade" id="myModal">
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
                    <form id="add_employment"  method="post" action="<?php echo base_url();?>recruitment/save_candidate_employment_details"> 
                      <div class="row">
                        <div class="form-group col-md-6">
                          <label>Is this your current employment?</label></br>
                          <label class="radio-inline">
                            <input type="radio" name="candidate_employment" id="candidate_employment" onclick="show();" value="Yes">Yes
                          </label>
                          <label class=" radio-inline">
                            <input type="radio" name="candidate_employment" id="candidate_employment"value="No" onclick="show();">No
                          </label>
                        </div>
                   
                        <div class="form-group col-md-6">
                          <label>Employment Type</label></br>
                          <label class="radio-inline">
                            <input type="radio" name="candidate_enrollment" onclick="show();" value="Full Time" <?php if(@$candidate->candidate_course_type=="Full Time"){echo "checked";}?>> Fulltime
                          </label>
                          <label class=" radio-inline">
                            <input type="radio" name="candidate_enrollment" onclick="show();"  value="Internship" <?php if(@$candidate->candidate_course_type=="Internship"){echo "checked";}?>> Internship
                          </label>
                        </div>
                     
                        <div class="form-group col-md-6" id="prev_company_name">
                          <label>Previous  Company Name</label>
                          <input type="text" class="form-control " autocomplete="off" placeholder="Type Your Organization" name="candidate_pre_company" id="candidate_pre_company" value="<?=@$candidate->candidate_name?>">
                        </div>
                        <div class="form-group col-md-6" id="prev_company_designation">
                          <label>Previous  Designation</label>
                          <input type="text" class="form-control " autocomplete="off" placeholder="Type Your Designation" name="candidate_pre_designation" id="candidate_pre_designation" value="<?=@$candidate->candidate_name?>">
                        </div>
                    
                    
                        <div class="form-group col-md-6" id="current_company_name">
                          <label>Current Company Name</label>
                          <input type="hidden" name="candidate_id" value="<?=$candidate_ids;?>">
                          <input type="text" class="form-control " autocomplete="off" placeholder="Type Your Organization" name="candidate_current_company" id="candidate_current_company" value="<?=@$candidate->candidate_name?>">
                        </div>
                        <div  id="current_company_designation"  class="form-group col-md-6">
                          <label>Current Designation</label>
                          <input type="text" class="form-control " autocomplete="off" placeholder="Type Your Designation" name="candidate_current_designation" id="candidate_current_designation" value="<?=@$candidate->candidate_name?>">
                        </div>
                      
                        <div id="candidate_location" class="form-group col-md-6">
                          <label>Current Location</label>
                          <input type="text" class="form-control " autocomplete="off" placeholder="Type Intenship Location" name="candidate_intern_location" id="candidate_intern_location" value="<?=@$candidate->candidate_name?>">
                        </div>
                        
                        <div id="candidate_department" class="form-group col-md-6">
                          <label>Department</label>
                          <input type="text" class="form-control " autocomplete="off" placeholder="Type Intenship Department" name="candidate_intern_department" id="candidate_intern_department" value="<?=@$candidate->candidate_name?>">
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
                          <select class="form-select" id="candidate_join_year" name="candidate_join_year">       
                            <option value="">Select Year</option>
                            <?php for($startYear=1997; $startYear<=3000; $startYear++){ ?>
                            <option <?php if(@$candidate->candidate_started_working_from_yr==$startYear){echo "selected";}?> value="<?php echo $startYear; ?>"> <?php echo $startYear; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        
                         <div id="candidate_join_months" class="form-group col-md-6">
                          <label>Joining Month</label>
                          <select class="form-select" id="candidate_join_month" name="candidate_join_month">       
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
                          <select class="form-select" id="candidate_working_till_year" name="candidate_working_till_year">       
                            <option value="">Select Year</option>
                            <?php for($startYear=1997; $startYear<=3000; $startYear++){ ?>
                            <option <?php if(@$candidate->candidate_started_working_from_yr==$startYear){echo "selected";}?> value="<?php echo $startYear; ?>"> <?php echo $startYear; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        
                         <div id="candidate_working_till_month" class="form-group col-md-6">
                          <label>Working Till Month</label>
                          <select class="form-select" id="candidate_working_till_month" name="candidate_working_till_month">       
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
                          <select class="form-select" id="candidate_Currrent_currency" name="candidate_Currrent_currency">       
                            <option value="">Select Currency</option>currency
                            <option value="₹">₹</option>
                            <option value="$">$</option>
                          </select>
                        </div>
                        
                        <div id="candidate_current_salary" class="form-group col-md-6">
                           <label></label>
                          <input type="text" class="form-control " autocomplete="off" placeholder="₹ 2000000" name="candidate_salarys" id="candidate_salarys">
                        </div>
                        
                        
                        
                        
                        <div id="candidate_currency_stipend" class="form-group col-md-6">
                        <label>Monthly Stipend Currency</label>
                          <select class="form-select" id="candidate_stipend_currency" name="candidate_stipend_currency">       
                            <option value="">Select Currency</option>
                            <option value="₹">₹</option>
                            <option value="$">$</option>
                            
                          </select>
                        </div>
                        
                        <div class="form-group col-md-6" id="candidate_monthly_stipend">
                           <label>Monthly Stipend Salary</label>
                           <input type="text" class="form-control " autocomplete="off" placeholder="₹ 2000000" name="candidate_stipend" id="candidate_stipend" value="<?=@$candidate->candidate_name?>">
                        </div>
                     
                     
                      
                        <div class="form-group col-md-6" id="candidate_skill_used">
                         <label>Skills used</label>
                        <textarea  class="form-control" id="candidate_skill"  name="candidate_skill"  rows="5" cols="33"> </textarea>
                        </div>
                       
                        <div class="form-group col-md-6" id="candidate_job_profiles">
                          <label>Job Profile</label>
                          <textarea  class="form-control" id="candidate_job_profile"  name="candidate_job_profile"  rows="5" cols="33"> </textarea>
                          </div>
                  
                      
                    
                         <div id="cadidate_poject_descrption" class="form-group col-md-6">
                          <label>Project Discription</label>
                          <textarea class="form-control" placeholder="Enter Project Discription" id="candidate_intern_project_discription" name="candidate_intern_project_discription" ></textarea>
                        </div>
                        
                        <div id="candidate_project_link" class="form-group col-md-6">
                          <label>Project Link</label>
                          <textarea class="form-control" placeholder="Enter Project Link" id="candidate_intern_project_link" name="candidate_intern_project_link" ></textarea>
                        </div>  
                 
                    
                   
                     <div class="form-group col-md-6" id="candidate_notice_period">
                          <label>Notice Period</label>
                          <select class="form-select" id="candidate_notice_periods" name="candidate_notice_periods">
                                  <option value="1 months">1 months</option>
                                  <option value="2 months">2 months</option>
                                  <option value="15 months">15 months</option>
                                  <option value="2 months">2 months</option>
                          </select>
                        </div>
                    
                      
                      <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-primary"  form="add_employment" value="Submit">Submit</button>
                      
                    </div>
                    </form>
                    </div>
                    <!-- Modal footer -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    
     
 
<div class="press-box">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-6">
            <h2 class="popup">Education</h2>
         <?php foreach($education_details as $row){?>
             <?php if($row->education==5){ ?>
            <h6 class="heading"><?php echo $row->education?>&nbsp;<i  onclick="edit_education_details(<?php echo $row->id ?>)" style="color:blue" class="fa fa-pencil" aria-hidden="true"></i></h6>
            <p><?php echo $row->board ?></p>
            <p><?php echo $row->passout_year; ?></p>
            <hr>
            <?php } ?>
            
        <?php if($row->education==4){ ?>
            <h6 class="heading"><?php echo $row->education?>&nbsp;<i  onclick="edit_education_details(<?php echo $row->id ?>)" style="color:blue" class="fa fa-pencil" aria-hidden="true"></i></h6>
            <p><?php echo $row->board ?></p>
            <p><?php echo $row->passout_year; ?></p>
            <hr>
            <?php } ?>
            
        <?php if($row->education==3){ ?>
        <?php $data = $this->M_Candidate_profile->get_all_education_details_specialization(@$row->specialization_course);?>
            <h6 class="heading"><?php echo $row->course_name." ".$data->specialization_name?>&nbsp;<i  onclick="edit_education_details(<?php echo $row->id ?>)" style="color:blue" class="fa fa-pencil" aria-hidden="true"></i></h6>
            <p><?php echo $row->university_name ?></p>
            <p><?php echo $row->course_start_year."-".$row->course_end_year." .".$row->course_type; ?></p>
            <hr>
            <?php } ?>  
            
        <?php if($row->education==2){ ?>
        <?php $data = $this->M_Candidate_profile->get_all_education_details_specialization(@$row->specialization_course);?>
            <h6 class="heading"><?php echo $row->course_name." ".@$data->specialization_name?>&nbsp;<i  onclick="edit_education_details(<?php echo $row->id ?>)" style="color:blue" class="fa fa-pencil" aria-hidden="true"></i></h6>
            <p><?php echo $row->university_name ?></p>
            <p><?php echo $row->course_start_year."-".$row->course_end_year." .".$row->course_type; ?></p>
            <hr>
            <?php } ?> 

          <?php if($row->education==1){ ?>
        <?php $data = $this->M_Candidate_profile->get_all_education_details_specialization(@$row->specialization_course);?>
            <h6 class="heading"><?php echo $row->course_name." ".@$data->specialization_name?>&nbsp;<i  onclick="edit_education_details(<?php echo $row->id ?>)" style="color:blue" class="fa fa-pencil" aria-hidden="true"></i></h6>
            <p><?php echo $row->university_name ?></p>
            <p><?php echo $row->course_start_year."-".$row->course_end_year." .".$row->course_type; ?></p>
            <hr>
            <?php } ?>          
            
            <?php   }?>
              
          </div>
          <div class="col-md-6">
            <h2 class="popup1" data-toggle="modal" data-target="#myModal1" style="cursor:pointer">Add Education</h2>
             <div class="education_edit" id="education_edit"></div>
            <div class="modal fade" id="myModal1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Add Education</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal_it_skill-body">
                    <div class="col-md-12">  
                    <form id="add_education" method="POST" action="<?php echo base_url();?>recruitment/save_candidate_education_data"> 
                      <div class="row">
                        <div id="educations" class="form-group col-md-6">
                          <label>Education</label>
                          <input type="hidden" name="candidate_id" value="<?=$candidate_ids;?>">
                          <select id="education" name="education" class="form-select" onchange="myFunction1(this.value)" >
                            <option>select education</option>
                            <?php foreach($main_courses as $row) {?>
                            <option  value="<?php echo $row->candidate_education_id; ?>"><?php echo $row->main_course_name; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        
                        <div id="candidate_boards" class="form-group col-md-6" style="display: none;">
                          <label>Board</label>
                          <input type="text" class="form-control " autocomplete="off" placeholder="Enter Board" name="candidate_board" id="candidate_board" value="<?=@$candidate->candidate_name?>">
                        </div>
                        
                        <div id="passingout_years" class="form-group col-md-6" style="display: none;">
                          <label>Passing Out Year</label>
                          <select class="form-select" id="passingout_year" name="passingout_year">       
                            <option value="">Select Year</option>
                            <?php for($startYear=1997; $startYear<=3000; $startYear++){ ?>
                            <option <?php if(@$candidate->candidate_started_working_from_yr==$startYear){echo "selected";}?> value="<?php echo $startYear; ?>"> <?php echo $startYear; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        
                        <div  id="candidate_school_mediums" class="form-group col-md-6" style="display: none;">
                          <label>School Medium</label>
                          <input type="text" class="form-control " autocomplete="off" placeholder="Enter School Medium" name="candidate_school_medium" id="candidate_school_medium" value="<?=@$candidate->candidate_name?>">
                        </div>
                        
                         <div  id="candidate_total_marks" class="form-group col-md-6" style="display: none;">
                          <label>Total Marks</label>
                          <input type="text" class="form-control " autocomplete="off" placeholder="Enter School Medium" name="candidate_total_mark" id="candidate_total_mark" value="<?=@$candidate->candidate_name?>">
                        </div>
                        
                        <div  id="candidate_english_marks" class="form-group col-md-6" style="display: none;">
                          <label>English Marks</label>
                          <input type="text" class="form-control " autocomplete="off" placeholder="Enter School Medium" name="candidate_english_mark" id="candidate_english_mark" value="<?=@$candidate->candidate_name?>">
                        </div>
                        
                        <div  id="candidate_maths_marks" class="form-group col-md-6" style="display: none;">
                          <label>Maths Marks</label>
                          <input type="text" class="form-control " autocomplete="off" placeholder="Enter School Medium" name="candidate_maths_mark" id="candidate_maths_mark" value="<?=@$candidate->candidate_name?>">
                        </div>
                        
                        <div id="candidate_univercitys" class="form-group col-md-6">
                          <label>University/Institute</label>
                          <input type="text" class="form-control " autocomplete="off" placeholder="Select university/institute" name="candidate_univercity" id="candidate_univercity" value="<?=@$candidate->candidate_name?>">
                        </div>
                      </div>
                      <div class="row">
                        <div id="candidate_courses" class="form-group col-md-6">
                          <label>Course</label>
                          <select name="candidate_course" id="candidate_course" class="form-select" onchange="myFunction(this.value)">
                           <option>Select Course</option>
                          <option></option>
                          </select>
                        </div>
                        
                        <div  id="course_specializations"class="form-group col-md-6">
                          <label>Specialization</label>
                          <select name="course_specialization"  id="course_specialization" class="form-select">
                            <option>Select Specialization</option>
                            <option></option>
                          </select>
                        </div>
                        
                      <div id="specialization_co" style="display: none;">
                       <div  id="marrige">
                        <input type="text" name="course_specialization1" class="form-control" id="course_specialization1" placeholder="Enter specialization Course">
                      </div>
                      </div>
                      </div>
                      <div class="row">
                        <div  id="candidate_course_types" class="form-group col-md-10">
                          <label>Course Type</label>
                          <label class="radio-inline">
                            <input type="radio" name="candidate_course_type" value="Full Time"> Full time
                          </label>&nbsp;
                          <label class=" radio-inline">
                            <input type="radio" name="candidate_course_type" value="Part Time"> Part time
                          </label>&nbsp;
                          <label class=" radio-inline">
                            <input type="radio" name="candidate_course_type" value="Correspondence/Distance learning"> Correspondence/Distance learning
                          </label>&nbsp;
                        </div>
                      </div>
                      <div class="row">
                          
                            <div class="col-md-6" id="course_start_years">
                              <label>Course duration</label>
                              <select name="course_start_year" id="course_start_year" class="form-select">
                                <option>starting year</option>
                                <?php for($startYear=1997; $startYear<=3000; $startYear++){ ?>
                            <option <?php if(@$candidate->candidate_started_working_from_yr==$startYear){echo "selected";}?> value="<?php echo $startYear; ?>"> <?php echo $startYear; ?></option>
                            <?php } ?>
                              </select> 
                            </div>
                            <div id="course_end_years" class="col-md-6" id="">
                            <label></label>
                              <select name="course_end_year" id="course_end_year" class="form-select">
                                <option>Ending year</option>
                                 <?php for($startYear=1997; $startYear<=3000; $startYear++){ ?>
                                <option <?php if(@$candidate->candidate_started_working_from_yr==$startYear){echo "selected";}?> value="<?php echo $startYear; ?>"> <?php echo $startYear; ?></option>
                                <?php } ?>
                              </select> 
                            </div>
                            
                        <div id="grades" class="form-group col-md-6">
                          <label>Grading System</label>
                          <select name="grade" id="grade" class="form-select">
                            <option>Select grading system</option>
                            <option> Scale 10 Grading System </option>
                            <option> Scale 4 Grading System </option>
                            <option>marks</option>
                          </select>
                        </div>
                      </div>
                      
                 <div class="modal-footer">
                    <button type="button"  class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button form="add_education"  type="submit" class="btn btn-secondary">Save</button>
                </div>   
                 </form>
                </div>
                </div>
              <!-- Modal footer -->                 
              </div>
              
              </div>
            </div>
            
          </div>
        </div>
      </div>
      </div>
     
      
   <div class="press-box">   
    <div class="col-md-12">
        <div class="row">
          <div class="col-md-6">
            <h2 class="popup">IT Skill</h2>
            <table id="table_search" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Skills</th>
                            <th>Version</th>
                            <th>Last Used</th>
                            <th>Experience</th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($it_skills as $row){ ?>
                    <tbody>     
                    <td><?php echo $row->software_name;?></td>
                    <td><?php echo $row->software_version; ?></td>
                    <td><?php echo $row->last_used; ?></td>
                    <td><?php echo $row->exp_year." "."Year"." ".$row->exp_month." "."Month"; ?></td>
                    <td><i onclick="edit_it_skill_details(<?php echo $row->skill_id ?>)" style="color:blue" class="fa fa-pencil" aria-hidden="true"></i></td>
                    </tbody>
                    <?php } ?>  
                </table>
          </div>
          <div class="col-md-6">
            <h2 class="popup1" data-toggle="modal" data-target="#myModal3" style="cursor:pointer">Add IT Skill Details</h2>
             <div class="it_skill_edit" id="it_skill_edit"></div>
            <div class="modal fade" id="myModal3">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Add IT Skills</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                    <div class="col-md-12">  
                    <form id="add_it_skills" method="POST" action="<?php echo base_url();?>recruitment/save_it_skills_candidate"> 
                      <div class="row">
                        <div id="skill_software_names" class="form-group col-md-12">
                          <label>Skill / Software Name</label>
                           <input type="hidden" name="candidate_id" value="<?=$candidate_ids;?>">
                           <input type="text" id="software_name" name="software_name" placeholder="Skill / Software Name" class="form-control ">
                        </div>
                        
                        <div id="software_versions" class="form-group col-md-6">
                          <label>Software Version</label>
                          <input type="text" class="form-control " autocomplete="off" placeholder="Enter Board" name="software_versions" id="software_versions" value="<?=@$candidate->candidate_name?>">
                        </div>
                        
                        <div id="last_useds" class="form-group col-md-6">
                          <label>Last Used</label>
                          <select class="form-select" id="software_last_used" name="software_last_used">       
                            <option value="">Select Year</option>
                            <?php for($startYear=1997; $startYear<=3000; $startYear++){ ?>
                            <option <?php if(@$candidate->candidate_started_working_from_yr==$startYear){echo "selected";}?> value="<?php echo $startYear; ?>"> <?php echo $startYear; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                       
                         <div id="exp_years" class="form-group col-md-6">
                          <label>Last Used</label>
                          <select class="form-select" id="exp_year" name="exp_year">       
                            <option value="">Select Year</option>
                            <?php for($startYear=1; $startYear<=30; $startYear++){ ?>
                            <option <?php if(@$candidate->candidate_started_working_from_yr==$startYear){echo "selected";}?> value="<?php echo $startYear?>"><?php echo $startYear." "."Years"; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        
                         <div id="exp_months" class="form-group col-md-6">
                          <label>Last Used</label>
                          <select class="form-select" id="exp_month" name="exp_month">       
                            <option value="">Select Month</option>
                            <?php for($startYear=1; $startYear<=12; $startYear++){ ?>
                            <option <?php if(@$candidate->candidate_started_working_from_yr==$startYear){echo "selected";}?> value="<?php echo $startYear?>"><?php echo $startYear." "."Months"; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                 <div class="modal-footer">
                    <button type="button"  class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button id="it_skill_sumbit" type="submit" class="btn btn-secondary" >Save</button>
                </div>   
                 </form>
                </div>
                </div>
              <!-- Modal footer -->                 
              </div>
              
              </div>
            </div>
          </div>
          
          
        </div>
      </div>
      </div>
      
    <div class="press-box">  
        <div class="col-md-12">
        <div class="row">
          <div class="col-md-6">
            <?php if(!empty($career_profile)){?>
            <h2 class="popup">Career Profile &nbsp;<i onclick="edit_carrer_profile_details(<?php echo @$career_profile->career_profile_Id ?>)" style="color:blue" class="fa fa-pencil" aria-hidden="true"></i></h2>
            <div class="row">
                <div  class="form-group col-md-6">
                          <small>Current Industry</small>
                           <p><?php echo  @$career_profile->career_current_industry; ?></p>
                </div>
                 <div  class="form-group col-md-6">
                          <small>Department</small>
                           <p><?php echo  @$career_profile->career_profile_department; ?></p>
                </div>
            </div>
            
            <div class="row">
                <div  class="form-group col-md-6">
                          <small>Role Category</small>
                           <p><?php echo  @$career_profile->career_job_role; ?></p>
                </div>
                 <div  class="form-group col-md-6">
                          <small>Job Role</small>
                           <p><?php echo  @$career_profile->career_job_role; ?></p>
                </div>
            </div>
              <div class="row">
                <div  class="form-group col-md-6">
                          <small>Desired Job Type</small>
                           <p><?php echo  @$career_profile->career_desired_job_type; ?></p>
                </div>
                 <div  class="form-group col-md-6">
                          <small>Desired Employment Type</small>
                           <p><?php echo  @$career_profile->career_employment_type; ?></p>
                </div>
            </div>
            
              <div class="row">
                <div  class="form-group col-md-6">
                          <small>Preferred Shift</small>
                           <p><?php echo  @$career_profile->career_preferred_shift; ?></p>
                </div>
                 <div  class="form-group col-md-6">
                                   <?php    
                              $r="";
                              @$cities=@$career_profile->preferred_work_location;
		                      @$sql = 'SELECT * FROM `tbl_cities`  WHERE `city_code` IN ('.$cities.')';
                              @$query = $this->db->query($sql);
                              @$cities_array=$query->result_array();?>
                          <small>Preferred Work Location</small>
                           <p><?php foreach($cities_array as $size_option)
                                            { echo @$size_option['city_name'].',';$r.=@$size_option['city_name'].',';}?>;</p>
                </div>
            </div>
            
            <div class="row">
                <div  class="form-group col-md-6">
                          <small>Expected Salary</small>
                           <p><?php echo  @$career_profile->expected_salary; ?></p>
                </div> 
            </div>
            
          </div>


        <?php } ?>
          <div class="col-md-6">
              <?php if($career_pro<1){  ?>
             <h2 class="popup1" data-toggle="modal" data-target="#myModal9" style="cursor:pointer">Add Career Profile</h2>
               <?php }?>
            <div class="carrer_profile_edit" id="carrer_profile_edit"></div>
             <div class="career_profile_edit" id="career_profile_edit"></div>
            <div class="modal fade" id="myModal9">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Add Career Profile</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                    <div class="col-md-">  
                    <form id="add_career_profile" method="POST" action="<?php echo base_url();?>recruitment/save_carrer_profile_candidate"> 
                      <div class="row">
                        <div  class="form-group col-md-12">
                          <label>Current Industry</label>
                           <input type="hidden" name="candidate_id" value="<?=$candidate_ids;?>">
                           <input type="text" id="career_current_industry" name="career_current_industry" placeholder="Type Current Industry" class="form-control ">
                        </div>
                        
                        <div  class="form-group col-md-6">
                          <label>Department</label>
                          <input type="text" class="form-control " autocomplete="off" placeholder="Enter Department" name="career_profile_department" id="career_profile_department" value="">
                        </div>
                        
                        <div  class="form-group col-md-6">
                          <label>Role Category</label>
                          <input type="text" class="form-control " autocomplete="off" placeholder="Enter Category" name="career_category" id="career_category" value="">
                        </div>
                        
                        <div  class="form-group col-md-6">
                          <label>Job Role</label>
                          <input type="text" class="form-control " autocomplete="off" placeholder="Enter Job Role" name="career_job_role" id="career_job_role" value="">
                        </div>
                        
                        <div  class="form-group col-md-6">
                          <label>Desired Job Type</label></br>
                        <input type="checkbox" id="career_desired_job_type" name="career_desired_job_type[]" value="Permanent">&nbsp;<label>Permanent</label>&nbsp;&nbsp;&nbsp; <input type="checkbox" id="career_desired_job_type[]" name="career_desired_job_type[]" value="Contractual">&nbsp;<label>Contractual</label>
                        </div>
                        
                         <div  class="form-group col-md-6">
                          <label>Desired Employment Type</label></br>
                          <input type="checkbox" id="career_employment_type" name="career_employment_type[]" value="Full Time">&nbsp;<label>Full Time</label>&nbsp;&nbsp;&nbsp; <input type="checkbox" id="career_employment_type" name="career_employment_type[]" value="Part Time">&nbsp;<label>Part Time</label>
                        </div>
                        
                       
                         <div  class="form-group col-md-6">
                          <label>Preferred Shift</label></br>
                          <input type="radio" id="career_preferred_shift" name="career_preferred_shift" value="Day">&nbsp;<label>Day</label>&nbsp;&nbsp;&nbsp;<input type="radio" id="career_preferred_shift" name="career_preferred_shift" value="Night">&nbsp;<label>Night</label>&nbsp;&nbsp;&nbsp;<input type="radio" id="career_preferred_shift" name="career_preferred_shift" value="Flexible">&nbsp;<label>Flexible</label>
                        </div>
                        
                         <div  class="form-group col-md-6">
                          <label>Preferred Work Location (Max 10)</label>
                          <select multiple class="form-control"  id="preferred_work_location[]" name="preferred_work_location[]">       
                            <option value="">Select Location</option>
                            <?php foreach($citiesandstates as $row){ ?>
                            <option  value="<?php echo $row->city_code; ?>"><?php echo strtoupper($row->city_name)." / "."<b>".$row->state."</b>"; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        
                         <div  class="form-group col-md-6">
                          <label>Expected Salary</label>
                          <input type="text" class="form-control " autocomplete="off" placeholder="Expected Salary" name="expected_salary" id="expected_salary" value="">
                        </div>
                        
                      </div>
                      
                 <div class="modal-footer">
                    <button type="button"  class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button id="career_sumbit" type="submit" class="btn btn-secondary" >Save</button>
                </div>   
                 </form>
                </div>
                </div>
              <!-- Modal footer -->                 
              </div>
              
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
      
      
      
      
      
<div class="press-box">    
    <div class="col-md-12">
        <div class="row">
          <?php if(!empty($personal_details)) {?>
          <div class="col-md-6">
            <h2 class="popup">Personal Detailsuuuu&nbsp;<i onclick="edit_personal_details(<?php echo @$personal_details[0]->personal_id ?>)" style="color:blue" class="fa fa-pencil" aria-hidden="true"></i></h2>
            <div class="row">
                <div  class="form-group col-md-6">
                          <small>Gender</small>                          
                           <p><?php echo  @$personal_details[0]->gender; ?></p>
                </div>
                 <div  class="form-group col-md-6">
                          <small>Marital Status</small>
                           <p><?php echo @$personal_details[0]->married_status; ?></p>
                </div>
            </div>
            
            <div class="row">
                <div  class="form-group col-md-6">
                          <small>Date Of Birth</small>
                           <p><?php echo  @$personal_details[0]->birth_date."/".@$personal_details[0]->birth_month."/".@$personal_details[0]->birth_year; ?></p>
                </div>
                 <div  class="form-group col-md-6">
                          <small>Category</small>
                           <p><?php echo  @$personal_details[0]->cat_candidate; ?></p>
                </div>
            </div>
              <div class="row">
                <div  class="form-group col-md-6">
                          <small>Are you Differently Abled?</small>
                           <p><?php echo  @$personal_details[0]->differently_abled; ?></p>
                </div>
                 <div  class="form-group col-md-6">
                          <small>Have you taken a Career Break?</small>
                           <p><?php echo  @$personal_details[0]->career_break; ?></p>
                </div>
            </div>
            
              <div class="row">
                <div  class="form-group col-md-12">
                          <small>Address</small>
                           <p><?php echo  @$personal_details[0]->permanent_add."/".@$personal_details[0]->hometown."/".@$personal_details[0]->pincode; ?></p>
                </div>                 
            </div>
            <hr>
            <div class="row">
            <div  class="form-group col-md-12">
            <table id="table_search" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Languages</th>
                            <th>Proficiency</th>
                            <th>Read</th>
                            <th>Write</th>
                            <th>Speak</th>
                        </tr>
                    </thead>
                    <?php foreach($know_language as $row){ ?>
                    <tbody>     
                    <td><?php echo $row->language;?></td>
                    <td><?php echo $row->proficiency; ?></td>
                    <td><?php if($row->read_l=="Read") {?>
                    <i class="fa fa-check" aria-hidden="true"></i>
                      <?php }  else {?><i class="fa fa-times" aria-hidden="true"></i>
                     <?php } ?></td>
                    <td><?php if($row->write_l=="Write") {?>
                    <i class="fa fa-check" aria-hidden="true"></i>
                      <?php }  else {?><i class="fa fa-times" aria-hidden="true"></i>
                     <?php } ?>
                    </td>
                    <td><?php if($row->speak_l=="Speak") {?>
                    <i class="fa fa-check" aria-hidden="true"></i>
                      <?php }  else {?><i class="fa fa-times" aria-hidden="true"></i>
                     <?php } ?>
                    </tbody>
                    <?php } ?>  
                </table>
              </div>
            </div>
            
          </div>

        <?php } ?>
          <div class="col-md-6">
             
            <h2 class="popup1" data-toggle="modal" data-target="#myModal10" style="cursor:pointer">Add Personal Details</h2>
  
            <div  id="personal_details_edit"></div>          
            <div class="modal fade" id="myModal10">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Personal Details</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <div class="col-md-">  
                    <form id="add_personal_deatils" method="POST" action="<?php echo base_url();?>recruitment/save_personal_details_candidate"> 
                      <div class="row">
                        <div  class="form-group col-md-12">
                           <input type="hidden" name="candidate_id" value="<?=$candidate_ids;?>"></br>
                           <label for="gender"><b>Gender :</b></label>                           
                           <input name="gender" id="gender" type="radio" value="Male"  />
                           <label for="gender">Male</label>
                           <input name="gender" id="gender" type="radio" value="Female" />
                           <label for="gender2">Female</label>
                           <input name="gender" id="gender" type="radio" value="Transgender" />
                           <label for="gender3">Transgender</label>
                        
                        </div>
                        
                         <div  class="form-group col-md-12">                           
                           <label ><b>Married Status :</b></label>                           
                           <input name="married_status" id="married_status" type="radio" value="Single/unmarried" />
                           <label>Single/unmarried</label>
                           <input name="married_status" id="married_status" type="radio" value="Married" />
                           <label >Married</label>
                           <input name="married_status" id="married_status"type="radio" value="Widowed" />
                           <label >Widowed</label>
                           <input name="married_status" id="married_status" type="radio" value="Divorced" />
                           <label >Divorced</label>
                           <input name="married_status" id="married_status" type="radio" value="Separated" />
                           <label >Separated</label>
                           <input name="married_status" id="married_status" type="radio" value="Other" />
                           <label >Other</label>                    
                        </div>
                       
                        <label>Date of Birth</label>
                        <div  class="form-group col-md-4">
                           <select class="form-select" id="birth_date" name="birth_date">       
                            <option value="">Select Date</option>
                            <?php for($startYear=1; $startYear<=31; $startYear++){ ?>
                            <option <?php if(@$candidate->candidate_started_working_from_yr==$startYear){echo "selected";}?> value="<?php echo $startYear?>"><?php echo $startYear; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div  class="form-group col-md-4">
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
                        
                         <div  class="form-group col-md-4">
                           <select class="form-select" id="birth_year" name="birth_year">       
                            <option value="">Select Date</option>
                            <?php for($startYear=1930; $startYear<=2005; $startYear++){ ?>
                            <option <?php if(@$candidate->candidate_started_working_from_yr==$startYear){echo "selected";}?> value="<?php echo $startYear?>"><?php echo $startYear; ?></option>
                            <?php } ?>
                          </select>
                        </div>                       
                        

                         <div  class="form-group col-md-12">                           
                           <label ><b>Category :</b></label>                           
                           <input name="cast_cat" id="cast_cat" type="radio" value="General" />
                           <label >General</label>
                           <input name="cast_cat" id="cast_cat" type="radio" value="Scheduled Caste (SC)" />
                           <label >Scheduled Caste (SC)</label>
                           <input name="cast_cat" id="cast_cat"type="radio" value="Scheduled Tribe (ST)" />
                           <label >Scheduled Tribe (ST)</label>
                           <input name="cast_cat" id="cast_cat" type="radio" value="OBC - Creamy" />
                           <label >OBC - Creamy</label>
                           <input name="cast_cat" id="cast_cat" type="radio" value="OBC - Non creamy" />
                           <label >OBC - Non creamy</label>
                           <input name="cast_cat" id="cast_cat" type="radio" value="Other" />
                           <label >Other</label>                    
                        </div>

                         <div  lass="form-group col-md-12" >                           
                           <label ><b>Are you Differently Abled?</b></label></br>                           
                           <input name="differently_abled" id="differently_abled" type="radio" value="yes"/>
                           <label >Yes</label>
                           <input name="differently_abled" id="differently_abled" type="radio"value="no" />
                           <label >No</label>                                         
                        </div>

                           <div  lass="form-group col-md-12" >                           
                           <label ><b>Have you taken a Career Break?</b></label></br>                           
                           <input name="career_break" id="career_break" type="radio" value="yes"/>
                           <label >Yes</label>
                           <input name="career_break" id="career_break" type="radio"value="no" />
                           <label >No</label>                                         
                        </div>

                      <!--   <div  class="form-group col-md-12">
                           <select class="form-select" id="work_permit" name="work_permit">       
                            <option value="">Select Work Permit</option>
                            <option value="Have US H1 Visa">Have US H1 Visa</option>
                            <option value="Need US H1 Visa">Need US H1 Visa</option>
                            <option value="US TN Permit Holder">US TN Permit Holder</option>
                            <option value="US Green Card Holder">US Green Card Holder</option>
                            <option value="US Citizen">US Citizen</option>
                            <option value="Authorized to work in US">Authorized to work in US</option>
                          </select>
                        </div>  -->      


                        <div  class="form-group col-md-12">
                          <label>Permanent Address</label></br>
                        <input type="text" id="permanant_addresss" name="permanant_addresss"  placeholder="Enter Address" class="form-control">
                        </div>

                        <div  class="form-group col-md-12">
                          <label>Hometown</label></br>
                        <input type="text" id="hometown" name="hometown" placeholder="Enter Hometown" class="form-control">
                        </div>

                        <div id="last_useds" class="form-group col-md-12">
                          <label>Pincode</label></br>
                        <input type="text" id="candidate_pincode" name="candidate_pincode"  class="form-control">
                        </div>
                        <h5>Language</h5>
              <div class="box-body ">
                <div id="showtable">
                       <table id="example8" class="table table-bordered table-striped" >
                                        <thead>
                                          <tr>                                           
                                            <th>ID</th>
                                            <th>Language</th>
                                            <th>Services Subservice Title</th>
                                            <th>Seo Work Description</th>
                                          </tr>
                                        </thead>
                                        <tbody style="height: 100px">
                                          <div id="tasskkdf_1">
                                                <tr id="add_more_1" style="position:sticky; top: 0;">
                                                  <td> <?php echo "1"; ?> </td>.
                                                  <td><input  rows="4" cols="50" type="text" class="form-control exp_class" name="language_add[]" id="language_add" placeholder="Enter Language"></br>
                                                  <input type="checkbox" id="lang_read_" name="lang_read_1[]" value="Read">&nbsp;
                                                  <label>Read</label>
                                                  <input type="checkbox" id="lang_write_" name="lang_write_1[]" value="Write">&nbsp;
                                                  <label>Write</label>
                                                  <input type="checkbox" id="lang_speak_" name="lang_speak_1[]" value="Speak">&nbsp;
                                                  <label>Speak</label>

                                                  </td>
                                                <td> <select class="form-select" id="lan_proficiant" name="lan_proficiant[]">
                                                     <option value="Beginner">Beginner</option>
                                                     <option value="Proficient">Proficient</option>
                                                     <option value="Expert">Expert</option>
                                                     </select>
                                                </td>                                            
                                                  <td><button  type="button" id="add_more_rowt_eng_1"  class="btn btn-info btn-sm" onClick="add_more_task_eng(1)">Add</button></td>
                                                </tr>
                                         </div>
                                                   
                                        </tbody>
                                  </table>
                              </div>
                          </div>                        
                       
                     
                      
                 <div class="modal-footer">
                    <button type="button"  class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button id="career_sumbit" type="submit" class="btn btn-secondary" >Save</button>
                </div>   
                 </form>
                </div>
                </div>
              <!-- Modal footer -->                 
              </div>
              
              </div>
            </div>
          </div>
          </div>
          
        </div>
        
      </div>
  </div>
  
  
<script type="text/javascript">

  var counter_eng = 1;
  var counter = 1;
 function add_more_task_eng(count){
     counter_eng++;  
     counter++;
     var  new_row_eng='<tr><td>'+counter_eng+'</td>';    
     new_row_eng+='<td><input  rows="4" cols="50" type="text" class="form-control exp_class" name="language_add[]" id="language_add'+counter_eng+'" placeholder="Enter Language"></br><input  type="checkbox" value="Read" name="lang_read_'+counter+'[]" id="lang_read'+counter_eng+'">&nbsp<label>Read</label>&nbsp;<input  type="checkbox" value="Write" name="lang_write_'+counter+'[]" id="lang_write'+counter_eng+'">&nbsp<label>Read</label>&nbsp;<input  type="checkbox" value="Speak" name="lang_speak_'+counter+'[]" id="lang_speak'+counter_eng+'">&nbsp<label>Read</label>&nbsp;</td>';
     new_row_eng+='<td><select class="form-select" id="lan_proficiant" name="lan_proficiant[]"><option value="Beginner">Beginner</option><option value="Proficient">Proficient</option><option value="Expert">Expert</option></select></td>';
      
   new_row_eng+='<td><button type="button" id="del_more_row_eng_'+counter_eng+'"  class="btn btn-info btn-sm" onClick="delete_more_row_eng('+counter_eng+')">Delete</button></td>';
    new_row_eng+='</tr>';
    $('#example8').append(new_row_eng);
 }
 function delete_more_row_eng(delcounter4)
 {
     $('#del_more_row_eng_'+delcounter4).closest('tr').remove();
     
 }
  
  function ajaxformsubmit(){
     var base_url = '<?php echo base_url(); ?>'; 
     var candidate_ids ='<?php echo  $this->session->userdata('candidate_id') ?>';
     var education=$("#education").val();
     var candidate_board=$("#candidate_board").val();
     var passingout_year=$("#passingout_year").val();
     var candidate_school_medium=$("#candidate_school_medium").val();
     var candidate_total_mark=$("#candidate_total_mark").val();
     var candidate_english_mark=$("#candidate_english_mark").val();
     var candidate_maths_mark=$("#candidate_maths_mark").val();
     var candidate_univercity=$("#candidate_univercity").val();
     var candidate_course=$("#candidate_course").val();
     var course_specialization=$("#course_specialization").val();
     var course_specialization1=$("#course_specialization1").val();
     var candidate_course_type=$("#candidate_course_type").val();
     var course_start_year=$("#course_start_year").val();
     var course_end_year=$("#course_end_year").val();
     var grade=$("#grade").val();
     
     $.ajax({
      url: base_url+'recruitment/save_candidate_education_data',
      type: 'POST',
      dataType:'json',
      data:{
        education:education,candidate_board:candidate_board,passingout_year:passingout_year,candidate_school_medium:candidate_school_medium,candidate_total_mark:candidate_total_mark,candidate_english_mark:candidate_english_mark,candidate_maths_mark:candidate_maths_mark,candidate_univercity:candidate_univercity,candidate_course:candidate_course,course_specialization:course_specialization,course_specialization1,course_specialization1,candidate_course_type:candidate_course_type,course_start_year:course_start_year,course_end_year:course_end_year,grade:grade,candidate_ids:candidate_ids
        },
                  
      success:function(data)
        {
          $('#myModal1').modal('hide');
        }
});
}


     $("#add_it_skills").on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: "<?=base_url('recruitment/save_it_skills_candidate')?>",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $('#myModal3').val('');
                    window.location.href="<?= base_url('candidate_profile/candidate_registration')?>";
                    load_data();
                    
                }

            });

        });
        
             $("#add_career_profile").on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: "<?=base_url('recruitment/save_carrer_profile_candidate')?>",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $('#myModal3').val('');
                    window.location.href="<?= base_url('candidate_profile/candidate_registration')?>";
                    load_data();
                    
                }

            });

        });
        
        
/*  function ajaxitskillformsubmit(event){
     event.preventDefault();
     var base_url = '<?php echo base_url(); ?>'; 
     alert(base_url);
     $.ajax({
      url: base_url+'recruitment/save_it_skills_candidate',
      method: 'POST',
     data: new FormData(this),
      success:function(data)
        {
          $('#myModal3').modal('hide');
        }
});
}*/



  function ajaxformupdate(){
     var base_url = '<?php echo base_url(); ?>'; 
     var candidate_ids ='<?php echo  $this->session->userdata('candidate_id') ?>';
     var education_id=$("#education_id").val();  
     var education=$("#education").val();
     var candidate_board=$("#candidate_board").val();
     var passingout_year=$("#passingout_year").val();
     var candidate_school_medium=$("#candidate_school_medium").val();
     var candidate_total_mark=$("#candidate_total_mark").val();
     var candidate_english_mark=$("#candidate_english_mark").val();
     var candidate_maths_mark=$("#candidate_maths_mark").val();
     var candidate_univercity=$("#candidate_univercity").val();
     var candidate_course=$("#candidate_course").val();
     var course_specialization=$("#course_specialization").val();
     var course_specialization1=$("#course_specialization1").val();
     var candidate_course_type=$("#candidate_course_type").val();
     var course_start_year=$("#course_start_year").val();
     var course_end_year=$("#course_end_year").val();
     var grade=$("#grade").val();
     
     $.ajax({
      url: base_url+'recruitment/update_education_details',
      type: 'POST',
      dataType:'json',
      data:{
        education:education,candidate_board:candidate_board,passingout_year:passingout_year,candidate_school_medium:candidate_school_medium,candidate_total_mark:candidate_total_mark,candidate_english_mark:candidate_english_mark,candidate_maths_mark:candidate_maths_mark,candidate_univercity:candidate_univercity,candidate_course:candidate_course,course_specialization:course_specialization,course_specialization1,course_specialization1,candidate_course_type:candidate_course_type,course_start_year:course_start_year,course_end_year:course_end_year,grade:grade,candidate_ids:candidate_ids,education_id:education_id
        },
                  
      success:function(data)
        {
          $('#myModal1').modal('hide');
        }
});
}
 function show(){
  
  
  var candidate_employment = $("input[name='candidate_employment']:checked").val();
  var radioValue = $("input[name='candidate_enrollment']:checked").val();
  show_internship_details1(candidate_employment,radioValue);

 
}
  
  function show2(candidate_employment){
 
  document.getElementById('current_company_designation').style.display = 'none';
  document.getElementById('candidate_skill_used').style.display = 'none';
  /*document.getElementById('candidate_job_profiles').style.display = 'none';*/
  document.getElementById('cadidate_poject_descrption').style.display = 'none';
  document.getElementById('current_company_name').style.display = 'none';
  show_internship_details(candidate_employment) 
   
  
}

 function show_internship_details1(candidate_employment,radioValue){

   if(candidate_employment=="Yes" && radioValue=="Full Time" ){
      
      document.getElementById('prev_company_name').style.display = 'none';
      document.getElementById('candidate_working_till_year').style.display = 'none';
      document.getElementById('candidate_working_till_month').style.display = 'none';
      document.getElementById('prev_company_designation').style.display = 'none';   
      document.getElementById('candidate_location').style.display = 'none';
      document.getElementById('candidate_department').style.display = 'none';
      document.getElementById('candidate_currency_stipend').style.display = 'none';
      document.getElementById('candidate_monthly_stipend').style.display = 'none';
      document.getElementById('candidate_project_link').style.display = 'none';
      document.getElementById('cadidate_poject_descrption').style.display = 'none';
      document.getElementById('intern_roles_categorys').style.display = 'none';
      document.getElementById('intern_roles').style.display = 'none';
  }
  if(candidate_employment=="No" && radioValue=="Full Time"){
  document.getElementById('candidate_location').style.display = 'none';
  document.getElementById('candidate_department').style.display = 'none';
  document.getElementById('candidate_currency_stipend').style.display = 'none';
  document.getElementById('current_company_name').style.display = 'none';
  document.getElementById('current_company_designation').style.display = 'none';
  document.getElementById('salaryCurrency').style.display = 'none';
  document.getElementById('candidate_current_salary').style.display = 'none';
  document.getElementById('candidate_project_link').style.display = 'none';
  document.getElementById('cadidate_poject_descrption').style.display = 'none';
  document.getElementById('candidate_monthly_stipend').style.display = 'none';
  document.getElementById('candidate_skill_used').style.display = 'none';
  document.getElementById('candidate_notice_period').style.display = 'none';
  document.getElementById('intern_roles_category').style.display = 'none';
  document.getElementById('intern_roles').style.display = 'none';
  
  
 }
 
   if(candidate_employment=="Yes" && radioValue=="Internship"){
    
  document.getElementById('current_company_designation').style.display = 'none';
  document.getElementById('prev_company_name').style.display = 'none';
  document.getElementById('prev_company_designation').style.display = 'none';
  document.getElementById('candidate_working_till_year').style.display = 'none';
  document.getElementById('candidate_working_till_month').style.display = 'none';
  document.getElementById('candidate_job_profiles').style.display = 'none';
  document.getElementById('salaryCurrency').style.display = 'none';
  document.getElementById('candidate_current_salary').style.display = 'none';
  document.getElementById('candidate_skill_used').style.display = 'none';
  document.getElementById('candidate_notice_period').style.display = 'none';
 }
 
if(candidate_employment=="No" && radioValue=="Internship"){
    
  document.getElementById('current_company_designation').style.display = 'none';
  document.getElementById('current_company_name').style.display = 'none';
  document.getElementById('prev_company_designation').style.display = 'none';
  document.getElementById('candidate_job_profiles').style.display = 'none';
  document.getElementById('salaryCurrency').style.display = 'none';
  document.getElementById('candidate_current_salary').style.display = 'none';
  document.getElementById('candidate_skill_used').style.display = 'none';
  document.getElementById('candidate_notice_period').style.display = 'none';
 }
  
}

 function show_internship_details(candidate_enrollment,radioValue){
  document.getElementById('candidate_join_years').style.display = 'none';
  document.getElementById('candidate_join_months').style.display = 'none';    
  document.getElementById('current_company_designation').style.display = 'none';
  document.getElementById('candidate_skill_used').style.display = 'none';
  document.getElementById('salaryCurrency').style.display = 'none';
  document.getElementById('candidate_current_salary').style.display = 'none';
  document.getElementById('candidate_job_profiles').style.display = 'none';
  document.getElementById('candidate_notice_period').style.display = 'none';
}


    function edit_employment_details(employement_id)
{
      var base_url = '<?php echo base_url(); ?>';
      var employements_id=employement_id;
    $.ajax({
      url: base_url+'recruitment/edit_employement_details',      
      type: 'POST',
      data: {employements_id:employements_id},
      success:function(data)
      {
        $('#employment_edit').html(data);
        $('#myModal33').modal('show');            
        }
      });
}

    function edit_education_details(education_id)
{
    var base_url = '<?php echo base_url(); ?>';
    var education_id=education_id;
    $.ajax({
      url: base_url+'recruitment/edit_education_details',      
      type: 'POST',
      data: {education_id:education_id},
      success:function(data)
      {
        $('#education_edit').html(data);
        $('#myModal34').modal('show');            
        }
      });
}


    function edit_it_skill_details(skill_id)
{
    var base_url = '<?php echo base_url(); ?>';
    var skill_id=skill_id;
    $.ajax({
      url: base_url+'recruitment/edit_skills_details',      
      type: 'POST',
      data: {skill_id:skill_id},
      success:function(data)
      { $('#it_skill_edit').html(data);
        $('#myModal39').modal('show');            
        }
      });
}

    function edit_carrer_profile_details(career_profile_id)
{
    var base_url = '<?php echo base_url(); ?>';
    var career_profile_id=career_profile_id;
    $.ajax({
      url: base_url+'recruitment/edit_career_profile_details',      
      type: 'POST',
      data: {career_profile_id:career_profile_id},
      success:function(data)
      { 
        $('#career_profile_edit').html(data);
        $('#myModal44').modal('show');            
        }
      });
}

    function edit_personal_details(personal_candidate_id)
{
    var base_url = '<?php echo base_url(); ?>';
    var personal_candidate_id=personal_candidate_id;
    $.ajax({
      url: base_url+'recruitment/edit_candidate_peronal_details_details',      
      type: 'POST',
      data: {personal_candidate_id:personal_candidate_id},
      success:function(data)
      { 
        $('#career_profile_edit').html(data);
        $('#myModal49').modal('show');            
        }
      });
}





/*   function delete_education_details(education_id)
{   
    var base_url = '<?php echo base_url(); ?>';
    var education_id=education_id;
    $.ajax({
      url: base_url+'recruitment/delete_employement_details',      
      type: 'POST',
      data: {education_id:education_id},
      success:function(data)
      {
             
        }
      });
}*/

<?php if($this->session->flashdata('success_delete')){ ?>
var isi =  <?php echo json_encode($this->session->flashdata('success')) ?>

Swal.fire({
  title: 'Delete Record ',
  text: 'isi',
  icon: 'success',
  
})
<?php } ?>

<?php if($this->session->flashdata('error_delete')){ ?>
var isi =  <?php echo json_encode($this->session->flashdata('error')) ?>

Swal.fire({
  title: 'Delete Record ',
  text: 'isi',
  icon: 'success',
  
})
<?php } ?>
function myFunction(course_id){
   
    var base_url = "<?php echo base_url();?>";
    $.ajax({
    type:"POST",
    data:{course_id},
    dataType: 'json',
    url:base_url+"candidate_profile/get_specialization_by_course",
    success:function(response) {
    $('#course_specialization option').remove();
    for(var i = 0; i<response.length; i++){
    var id = response[i]; 
    $("#course_specialization").append("</br><option  value="+response[i]['specialization_course_id']+">"+response[i]['specialization_name'] +"</option></br>");
   
    }
    }
  });
}

function myFunction1(main_course_id){
    var base_url = "<?php echo base_url();?>";
    $.ajax({
    type:"POST",
    data:{main_course_id},
    dataType: 'json',
    url:base_url+"candidate_profile/get_specialization_by__main_course",
    success:function(response) {
    $('#candidate_course option').remove();
    for(var i = 0; i<response.length; i++){
    var id = response[i]; 
    $("#candidate_course").append("</br><option value="+response[i]['course_id']+">"+response[i]['course_name'] +"</option></br>");
   
    }
    }
  });
}

function myFunctions(course_specialization_id){
    var base_url = "<?php echo base_url();?>";
    $.ajax({
    type:"POST",
    data:{course_id},
    dataType: 'json',
    url:base_url+"candidate_profile/get_specialization_by_course",
    success:function(response) {
    $('#course_specialization option').remove();
    for(var i = 0; i<response.length; i++){
    var id = response[i]; 
    $("#course_specialization").append("</br><option value="+response[i]['specialization_course_id']+">"+response[i]['specialization_name'] +"</option></br>");
   
    }
    }
  });
}

function edit_itskills_details(){
    
}


 $("#course_specialization").on('change', function(){

        /*application_for = document.getElementsByClassName("application_for")*/;
        var value = $("#course_specialization :selected").val();
        //alert(value);
        if( value == '22'||value == '20' || value == '24' || value == '26' ||value == '28' || value == '30' || value == '32' || value == '34' || value == '36' || value == '59' || value == '86' || value == '88' ||value == '90' || value == '108' || value == '110' || value == '112' || value == '114' || value == '116' || value == '118' || value == '120' ||value == '129' || value == '135' || value == '137' || value == '138'){
            
            $("#specialization_co").css({'display': '',});
            //$('#div_marrige').removeClass("hidden");
            // $('#fresher_div_doc').show();
            
            // $('#name_of_org').html('Name of the person *');
        }else{
            $("#specialization_co").css({'display': 'none',});
            // $('#fresher_div_doc').hide();
            // $('#name_of_org').html('Name of the Organisation/ Business *');
        }
 });
 
 
  $("#education").on('change', function(){
 
    var value = $("#education :selected").val();
    if( value == '4'){
            $("#candidate_boards").css({'display': '',});
            $("#passingout_years").css({'display': '',});
            $("#candidate_school_mediums").css({'display': '',});
            $("#candidate_total_marks").css({'display': '',});
            $("#candidate_english_marks").css({'display': '',});
            $("#candidate_maths_marks").css({'display': '',});
            $("#candidate_univercitys").css({'display': 'none',});
            $("#candidate_courses").css({'display': 'none',});
            $("#course_specializations").css({'display': 'none',});
            $("#candidate_course_types").css({'display': 'none',});
            $("#course_start_years").css({'display': 'none',}); 
            $("#course_end_years").css({'display': 'none',});
             $("#grades").css({'display': 'none',});
            //$('#div_marrige').removeClass("hidden");
            // $('#fresher_div_doc').show();
            
            // $('#name_of_org').html('Name of the person *');
        }else{
            $("#candidate_boards").css({'display': 'none',});
            $("#passingout_years").css({'display': 'none',});
            $("#candidate_school_mediums").css({'display': 'none',});
            $("#candidate_total_marks").css({'display': 'none',});
            $("#candidate_english_marks").css({'display': 'none',});
            $("#candidate_maths_marks").css({'display': 'none',});
            // $('#fresher_div_doc').hide();
            // $('#name_of_org').html('Name of the Organisation/ Business *');
        }
     if( value == '5'){  
        $("#candidate_boards").css({'display': '',});
        $("#passingout_years").css({'display': '',});
        $("#candidate_school_mediums").css({'display': '',});
        $("#candidate_total_marks").css({'display': '',});
        $("#candidate_univercitys").css({'display': 'none',});
        $("#candidate_courses").css({'display': 'none',});
        $("#course_specializations").css({'display': 'none',});
        $("#candidate_course_types").css({'display': 'none',});
        $("#course_start_years").css({'display': 'none',}); 
        $("#course_end_years").css({'display': 'none',});
        $("#grades").css({'display': 'none',});
     }  
     else{
         $("#candidate_boards").css({'display': 'none',});
        $("#passingout_years").css({'display': 'none',});
        $("#candidate_school_mediums").css({'display': 'none',});
        $("#candidate_total_marks").css({'display': 'none',});
        $("#candidate_univercitys").css({'display': '',});
        $("#candidate_courses").css({'display': '',});
        $("#course_specializations").css({'display': '',});
        $("#candidate_course_types").css({'display': '',});
        $("#course_start_years").css({'display': '',}); 
        $("#course_end_years").css({'display': '',});
        $("#grades").css({'display': '',});
         
     }
        
 });
 $( document ).ready(function() {

 $("#close").modal("hide"); 
 $('#framework').multiselect({
  nonSelectedText: 'Select Framework',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  buttonWidth:'400px'
 });


});
 
$("#education_sumbit").click(function(event){
     var base_url = '<?php echo base_url(); ?>';  
     
     var education=$("#education").val();
    
     var candidate_board=$("#candidate_board").val();
     var passingout_year=$("#passingout_year").val();
     var candidate_school_medium=$("#candidate_school_medium").val();
     var candidate_total_mark=$("#candidate_total_mark").val();
     var candidate_english_mark=$("#candidate_english_mark").val();
     var candidate_maths_mark=$("#candidate_maths_mark").val();
     var candidate_univercity=$("#candidate_univercity").val();
     var candidate_course=$("#candidate_course").val();
     var course_specialization=$("#course_specialization").val();
     var course_specialization1=$("#course_specialization1").val();
     var candidate_course_type=$("#candidate_course_type").val();
     var course_start_year=$("#course_start_year").val();
     var course_end_year=$("#course_end_year").val();
     var grade=$("#grade").val();
     
$.ajax({
      url: base_url+'recruitment/save_candidate_employment_details',
      type: 'POST',
      dataType:'json',
      data:{
        education:education,candidate_board:candidate_board,passingout_year:passingout_year,candidate_school_medium:candidate_school_medium,candidate_total_mark:candidate_total_mark,candidate_english_mark:candidate_english_mark,candidate_maths_mark:candidate_maths_mark,candidate_univercity:candidate_univercity,candidate_course:candidate_course,course_specialization:course_specialization,course_specialization1,course_specialization1,candidate_course_type:candidate_course_type,course_start_year:course_start_year,course_end_year:course_end_year,grade:grade
        },
                  
      success:function(data)
        {
          location.reload();
        }
});

});
</script>
