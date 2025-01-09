
<div class="modal fade" id="myModal33">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                   <div class="modal-header">
                    <h4 class="modal-title">Edit Employment</h4>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                  </div>
      
                  <div class="model_2_popup" id="model_2_popup"></div>
                  <!-- Modal body -->
                  <div class="modal-body">
                    <div class="col-md-12">
                    <button type="button" style="position: absolute;right: 0;width: 120px;transform: translateY(-50%);"class="btn btn-primary" data-toggle="modal"  name="delete_employementss" id="delete_employementss">Delete</button>
                    <form id="add_employment1"  method="post" action="<?php echo base_url();?>recruitment/update_employement_details"> 
                      <div class="row">
                        <div class="form-group col-md-6">
                          <input type="hidden" id="emplpoyemnt_id" name="emplpoyemnt_id"  class="form-control" value="<?php echo $result_emplpoyemnt->id; ?>"> 
                          <label>Is this your current employment?</label></br>
                          <label class="radio-inline">
                            <input type="radio"<?php if(@$result_emplpoyemnt->emp_employment=="Yes"){echo "checked";}?> name="candidate_employment" id="candidate_employment" onclick="show();" value="Yes">Yes
                          </label>
                          <label class=" radio-inline">
                            <input type="radio" <?php if(@$result_emplpoyemnt->emp_employment=="No"){echo "checked";}?>name="candidate_employment" id="candidate_employment"value="No" onclick="show();">No
                          </label>
                        </div>
                   
                        <div class="form-group col-md-6">
                          <label>Employment Type</label></br>
                          <label class="radio-inline">
                            <input type="radio" <?php if(@$result_emplpoyemnt->emp_employment_type=="Full Time"){echo "checked";}?> name="candidate_enrollment" onclick="show();" value="Full Time" <?php if(@$result_emplpoyemnt->candidate_course_type=="Full Time"){echo "checked";}?>> Fulltime
                          </label>
                          <label class=" radio-inline">
                            <input type="radio" <?php if(@$result_emplpoyemnt->emp_employment_type=="Internship"){echo "checked";}?> name="candidate_enrollment" onclick="show();"  value="Internship" <?php if(@$result_emplpoyemnt->candidate_course_type=="Internship"){echo "checked";}?>> Internship
                          </label>
                        </div>
                     
                        <div class="form-group col-md-6" id="prev_company_name">
                          <label>Previous  Company Name</label>
                          <input type="text" class="form-control " autocomplete="off" placeholder="Type Your Organization" name="candidate_pre_company" id="candidate_pre_company" value="<?=@$result_emplpoyemnt->emp_perv_company_name?>">
                        </div>
                        <div class="form-group col-md-6" id="prev_company_designation">
                          <label>Previous  Designation</label>
                          <input type="text" class="form-control " autocomplete="off" placeholder="Type Your Designation" name="candidate_pre_designation" id="candidate_pre_designation" value="<?=@$result_emplpoyemnt->emp_perv_designation?>">
                        </div>
                    
                    
                        <div class="form-group col-md-6" id="current_company_name">
                          <label>Current Company Name</label>
                          
                          <input type="hidden" name="emloyment_id" value="<?php echo $result_emplpoyemnt->id ?>">
                          <input type="hidden" name="candidate_id" value="<?= $candidate_ids;?>">
                          <input type="text" class="form-control " autocomplete="off" placeholder="Type Your Organization" name="candidate_current_company" id="candidate_current_company" value="<?=@$result_emplpoyemnt->emp_current_company_name?>">
                        </div>
                        <div  id="current_company_designation"  class="form-group col-md-6">
                          <label>Current Designation</label>
                          <input type="text" class="form-control " autocomplete="off" placeholder="Type Your Designation" name="candidate_current_designation" id="candidate_current_designation" value="<?=@$result_emplpoyemnt->emp_current_desigantion?>">
                        </div>
                      
                        <div id="candidate_location" class="form-group col-md-6">
                          <label>Current Location</label>
                          <input type="text" class="form-control " autocomplete="off" placeholder="Type Intenship Location" name="candidate_intern_location" id="candidate_intern_location" value="<?=@$result_emplpoyemnt->emp_location?>">
                        </div>
                        
                        <div id="candidate_department" class="form-group col-md-6">
                          <label>Department</label>
                          <input type="text" class="form-control " autocomplete="off" placeholder="Type Intenship Department" name="candidate_intern_department" id="candidate_intern_department" value="<?=@$result_emplpoyemnt->intern_candidate_department?>">
                        </div>
                        
                        
                         <div id="intern_roles_categorys" class="form-group col-md-6">
                          <label>Role Category</label>
                          <input type="text" class="form-control " autocomplete="off" placeholder="Type Intenship Role" name="intern_roles_category" id="intern_roles_category" value="<?= @$$result_emplpoyemnt->intern_roles_category ?>">
                        </div>
                          
                         <div id="intern_roles" class="form-group col-md-6">
                          <label>Role</label>
                          <input type="text" class="form-control " autocomplete="off" placeholder="Type Intenship Role" name="intern_role" id="intern_role" value="<?= @$$result_emplpoyemnt->intern_roles ?>">
                        </div>
                     
                        <div id="candidate_join_years" class="form-group col-md-6">
                          <label>Joining Year</label>
                          <select class="form-select" id="candidate_join_year" name="candidate_join_year">       
                            <option value="">Select Year</option>
                            <?php for($startYear=1997; $startYear<=3000; $startYear++){ ?>
                            <option <?php if(@$result_emplpoyemnt->emp_joining_year==$startYear){echo "selected";}?> value="<?php echo $startYear; ?>"> <?php echo $startYear; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        
                         <div id="candidate_join_months" class="form-group col-md-6">
                          <label>Joining Month</label>
                          <select class="form-select" id="candidate_join_month" name="candidate_join_month">       
                            <option  value="">Select Month</option>
                            <option <?php if($result_emplpoyemnt->emp_joining_month=="Jan"){echo "selected";}?>value="Jan">Jan</option>
                            <option <?php if($result_emplpoyemnt->emp_joining_month=="Feb"){echo "selected";}?>value="Feb">Feb</option>
                            <option <?php if($result_emplpoyemnt->emp_joining_month=="Mar"){echo "selected";}?>value="Mar">Mar</option>
                            <option <?php if($result_emplpoyemnt->emp_joining_month=="Apr"){echo "selected";}?>value="Apr">Apr</option>
                            <option <?php if($result_emplpoyemnt->emp_joining_month=="May"){echo "selected";}?>value="May">May</option>
                            <option <?php if($result_emplpoyemnt->emp_joining_month=="Jun"){echo "selected";}?>value="Jun">Jun</option>
                            <option <?php if($result_emplpoyemnt->emp_joining_month=="Jul"){echo "selected";}?>value="Jul">Jul</option>
                            <option <?php if($result_emplpoyemnt->emp_joining_month=="Aug"){echo "selected";}?>value="Aug">Aug</option>
                            <option <?php if($result_emplpoyemnt->emp_joining_month=="Sep"){echo "selected";}?>value="Sep">Sep</option>
                            <option <?php if($result_emplpoyemnt->emp_joining_month=="Oct"){echo "selected";}?>value="Oct">Oct</option>
                            <option <?php if($result_emplpoyemnt->emp_joining_month=="Nov"){echo "selected";}?>value="Nov">Nov</option>
                            <option <?php if($result_emplpoyemnt->emp_joining_month=="Dec"){echo "selected";}?>value="Dec">Dec</option>
                          </select>
                        </div> 
                       
                        
                        
                        <div id="candidate_working_till_year" class="form-group col-md-6">
                          <label>Working Till Year</label>
                          <select class="form-select" id="candidate_working_till_year" name="candidate_working_till_year">       
                            <option value="">Select Year</option>
                            <?php for($startYear=1997; $startYear<=3000; $startYear++){ ?>
                            <option <?php if(@$result_emplpoyemnt->emp_work_till_year==$startYear){echo "selected";}?> value="<?php echo $startYear; ?>"> <?php echo $startYear; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        
                         <div id="candidate_working_till_month" class="form-group col-md-6">
                          <label>Working Till Month</label>
                          <select class="form-select" id="candidate_working_till_month" name="candidate_working_till_month">       
                            <option <?php if($result_emplpoyemnt->emp_work_till_month=="Jan"){echo "selected";}?> value="">Select Month</option>
                            <option <?php if($result_emplpoyemnt->emp_work_till_month=="Jan"){echo "selected";}?> value="Jan">Jan</option>
                            <option <?php if($result_emplpoyemnt->emp_work_till_month=="Jan"){echo "selected";}?> value="Feb">Feb</option>
                            <option <?php if($result_emplpoyemnt->emp_work_till_month=="Jan"){echo "selected";}?> value="Mar">Mar</option>
                            <option <?php if($result_emplpoyemnt->emp_work_till_month=="Jan"){echo "selected";}?> value="Apr">Apr</option>
                            <option <?php if($result_emplpoyemnt->emp_work_till_month=="Jan"){echo "selected";}?> value="May">May</option>
                            <option <?php if($result_emplpoyemnt->emp_work_till_month=="Jan"){echo "selected";}?> value="Jun">Jun</option>
                            <option <?php if($result_emplpoyemnt->emp_work_till_month=="Jan"){echo "selected";}?> value="Jul">Jul</option>
                            <option <?php if($result_emplpoyemnt->emp_work_till_month=="Jan"){echo "selected";}?> value="Aug">Aug</option>
                            <option <?php if($result_emplpoyemnt->emp_work_till_month=="Jan"){echo "selected";}?> value="Sep">Sep</option>
                            <option <?php if($result_emplpoyemnt->emp_work_till_month=="Jan"){echo "selected";}?> value="Oct">Oct</option>
                            <option <?php if($result_emplpoyemnt->emp_work_till_month=="Jan"){echo "selected";}?> value="Nov">Nov</option>
                            <option <?php if($result_emplpoyemnt->emp_work_till_month=="Jan"){echo "selected";}?> value="Dec">Dec</option>
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
                          <input type="text" class="form-control " autocomplete="off"  value="<?php echo $result_emplpoyemnt->emp_current_salary ?>" placeholder="₹ 2000000" name="candidate_salarys" id="candidate_salarys">
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
                           <input type="text" class="form-control " autocomplete="off" value="<?php echo $result_emplpoyemnt->intern_candidate_stipend ?>" placeholder="₹ 2000000" name="candidate_stipend" id="candidate_stipend" value="<?=@$result_emplpoyemnt->candidate_name?>">
                        </div>
                     
                     
                      
                        <div class="form-group col-md-6" id="candidate_skill_used">
                         <label>Skills used</label>
                        <textarea  class="form-control" id="candidate_skill"  name="candidate_skill"  rows="5" cols="33"><?php echo $result_emplpoyemnt->emp_skill_used ?> </textarea>
                        </div>
                       
                        <div class="form-group col-md-6" id="candidate_job_profiles">
                          <label>Job Profile</label>
                          <textarea  class="form-control" id="candidate_job_profile"  name="candidate_job_profile"  rows="5" cols="33"><?php echo $result_emplpoyemnt->emp_job_profile ?> </textarea>
                          </div>
                  
                      
                    
                         <div id="cadidate_poject_descrption" class="form-group col-md-6">
                          <label>Project Discription</label>
                          <textarea class="form-control" placeholder="Enter Project Discription" id="candidate_intern_project_discription" name="candidate_intern_project_discription"><?php echo $result_emplpoyemnt->intern_project_description ?></textarea>
                        </div>
                        
                        <div id="candidate_project_link" class="form-group col-md-6">
                          <label>Project Link</label>
                          <textarea class="form-control" placeholder="Enter Project Link" id="candidate_intern_project_link" name="candidate_intern_project_link"><?php echo $result_emplpoyemnt->intern_project_link ?></textarea>
                        </div>  
                 
                    
                   
                     <div class="form-group col-md-6" id="candidate_notice_period">
                          <label>Notice Period</label>
                          <select class="form-select" id="candidate_notice_periods" name="candidate_notice_periods">
                                  <option <?php if($result_emplpoyemnt->emp_notice_period=="1 months"){echo "selected";} ?>>1 months</option>
                                  <option <?php if($result_emplpoyemnt->emp_notice_period=="2 months"){echo "selected";} ?>>2 months</option>
                          </select>
                        </div>
                    
                      
                      <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-primary"  form="add_employment1" value="Submit">Submit</button>
                      
                    </div>
                    </form>
                    </div>
                    <!-- Modal footer -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          
          <script>
$(document ).ready(function(){
$("#delete_employementss").click(function () {
if (confirm("Are you sure delete this record.?")) {  
  var emplpoyemnt_id=$("#emplpoyemnt_id").val();
  alert(emplpoyemnt_id);
  var candidate_id=$("#candidate_id").val();
  var base_url = "<?php echo base_url();?>";
  $.ajax({
      url: base_url+'recruitment/delete_employement_details',      
      type: 'POST',
      data: {emplpoyemnt_id:emplpoyemnt_id,candidate_id:candidate_id},
      success:function(data)
      {
        window.location.href="<?= base_url('candidate_profile/candidate_registration')?>";      
        }
      });   
 alert("Confirmed! Item deleted");
} else alert("Delete Action Canceled!");
}); 
});

 </script> 