            <div class="modal fade" id="myModal44">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title deletouterr">Edit career profile Details
                    <button type="button" class="btn frnewdeletbtnnnn" onclick="delete_confirm_carrer_profile(<?php echo $career_profile->career_profile_Id ;?>)" >Delete</button>
                    </h4>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                  </div>
                  
                  <!-- Modal body -->
                  <div class="modal-body">
                    <div class="col-md-"> 
                    <form id="add_career_profile" method="POST" action="<?php echo base_url();?>recruitment/update_carrer_profile_details"> 
                      <div class="row">
         
                        <div id="skill_software_names" class="form-group col-md-12">
                             <label>Current Industry</label>
                             <input type="hidden" id="candidate_id" name="candidate_id"  class="form-control" value="<?php echo $candidate_id; ?>">
                             <input type="hidden" id="career_id" name="career_id" class="form-control" value="<?php echo $career_profile->career_profile_Id ?>">
                             <input type="text" id="career_current_industry" name="career_current_industry" placeholder="Type Current Industry" class="form-control" value="<?php echo $career_profile->career_current_industry ?>">
                        </div>
                        
                        <div id="software_versions" class="form-group col-md-6">
                          <label>Department</label>
                          <input type="text" class="form-control " autocomplete="off" placeholder="Enter Department" name="career_profile_department" id="career_profile_department" value="<?php echo $career_profile->career_profile_department;?>">
                        </div>
                        
                        <div id="software_versions" class="form-group col-md-6">
                          <label>Role Category</label>
                          <input type="text" class="form-control " autocomplete="off" placeholder="Enter Category" name="career_category" id="career_category" value="<?php echo $career_profile->career_category;?>">
                        </div>
                        
                        <div id="software_versions" class="form-group col-md-6">
                          <label>Job Role</label>
                          <input type="text" class="form-control " autocomplete="off" placeholder="Enter Job Role" name="career_job_role" id="career_job_role" value="<?php echo $career_profile->career_job_role;?>">
                        </div>
                        
                        <div id="last_useds" class="form-group col-md-6">
                        <label>Desired Job Type</label>
                        <div class="desiredJobbbb"><input type="checkbox" id="career_desired_job_type" name="career_desired_job_type[]" value="Permanent">&nbsp;<label>Permanent</label>&nbsp;&nbsp;&nbsp; <input type="checkbox" id="career_desired_job_type[]" name="career_desired_job_type[]" value="Contractual">&nbsp;<label>Contractual</label></div>
                        </div>
                        
                         <div id="last_useds" class="form-group col-md-6">
                          <label>Desired Employment Type</label>
                          <div class="desiredJobType">
                          <input type="checkbox" <?php if($career_profile->career_employment_type=="Full Time"){echo "selected";}?> id="career_employment_type" name="career_employment_type[]" value="Full Time">&nbsp;<label>Full Time</label>&nbsp;&nbsp;&nbsp; <input type="checkbox" id="career_employment_type" name="career_employment_type[]" value="Part Time">&nbsp;<label>Part Time</label>
                          </div>
                        </div>
                        
                       
                         <div id="exp_years" class="form-group col-md-6">
                          <label>Preferred Shift</label>
                          <div class="preferShifttt">
                          <input type="radio" id="career_preferred_shift" name="career_preferred_shift" value="Day" <?php if ($career_profile->career_preferred_shift == "Day") { echo "checked='checked'"; } ?>>&nbsp;<label>Day</label>&nbsp;&nbsp;&nbsp;<input type="radio" id="career_preferred_shift" name="career_preferred_shift" value="Night" <?php if ($career_profile->career_preferred_shift == "Night") { echo "checked='checked'"; } ?>>&nbsp;<label>Night</label>&nbsp;&nbsp;&nbsp;<input type="radio" id="career_preferred_shift" name="career_preferred_shift" value="Flexible" <?php if ($career_profile->career_preferred_shift == "Flexible") { echo "checked='checked'"; } ?>>&nbsp;<label>Flexible</label>
                          </div>
                        </div>
                        
                         <div id="exp_months" class="form-group col-md-6">
                          <label>Preferred Work Location (Max 10)</label>

                          
                          <select multiple class="form-control" id="preferred_work_location[]" name="preferred_work_location[]">       
                            <option value="">Select Location</option>
                            <?php foreach($citiesandstates as $row){ ?>
                            <option <?php if(strpos($career_profile->preferred_work_location, $row->city_code) !== false){echo "selected";}?> value="<?php echo $row->city_code; ?>"><?php echo strtoupper($row->city_name)." / "."<b>".$row->state."</b>"; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        
                         <div id="software_versions" class="form-group col-md-6">
                          <label>Expected Salary</label>
                          <input type="text" class="form-control " autocomplete="off" placeholder="Expected Salary" name="expected_salary" id="expected_salary" value="<?php echo $career_profile->expected_salary?>">
                        </div>
                        
                      </div>
                      
                 <div class="modal-footer">
                    <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button id="career_sumbit" type="submit" class="btn btn-primary" >Save</button>
                </div>   
                 </form>
                </div>
                </div>
              <!-- Modal footer -->                 
              </div>
              
              </div>
            </div>
            <div class="modal fade popupoverpopup" id="CareerProfileDeletePopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  
                    <div class="modal-content">
                        <div class="modal-header">
              
              <h4 class="modal-title" id="myModalLabel">Are you sure you want to delete this Carrer Profile Details.</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
                        <div class="modal-body">
                            <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruitment/delete_career_details_candidate', $attributes);
              ?>   
                        <input type="hidden" id="deleteID" name="deleteID" >
                           
                           <div class="center col-md-12 frdeleteancelee">
                            <div class="left col-md-3">
                                <button type="submit" class="btn btn-block btn-primary">Delete</button>
                                </div>
                                <div class="right col-md-3">
                            <button type="button" class="btn btn-blcok btn-secondory" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                                   </form>
                        </div>
                        
                    </div>
                    
          
                </div>
             </div>
<script>
function delete_confirm_carrer_profile(id)
{
    $("#deleteID").val(id);
    $("#CareerProfileDeletePopup").modal();
}
$(document ).ready(function(){
/*$("#delete_carrier").click(function () {
if (confirm("Are you sure delete this record.?")) {  
  var career_id=$("#career_id").val();
  alert(career_id);
  var candidate_id=$("#candidate_id").val();
  var base_url = "<?php echo base_url();?>";
  $.ajax({
      url: base_url+'recruitment/delete_career_details_candidate',      
      type: 'POST',
      data: {career_id:career_id,candidate_id:candidate_id},
      success:function(data)
      {
        window.location.href="<?= base_url('candidate_profile/candidate_registration')?>";      
        }
      });   
 alert("Confirmed! Item deleted");
} else alert("Delete Action Canceled!");
}); */


  
   $("#add_career_profile").validate(
    {
      errorElement: "span", 
      rules: 
      {
            career_current_industry: 
            {
                required:true,               
            },
            career_profile_department: 
            {
                required:true,               
            },
            career_category: 
            {
                required:true,               
            },
            career_job_role:
            {
                required:true,               
            },
            'career_desired_job_type[]':
            {
                required:true,               
            },
            'career_employment_type[]':
            {
                required:true,               
            },
            career_preferred_shift:
            {
                required:true,               
            },
            'preferred_work_location[]':
            {
                required:true,               
            },
            expected_salary:
            {
                required:true,               
            },
      },
      

      messages: 
      { 
            career_current_industry: 
            {
                required:"Required Current Industry..!!",
            },
            career_profile_department: 
            {
                required:"Required Department..!!",
            },
            career_category: 
            {
                required:"Required Role Category..!!",
            },
            career_job_role: 
            {
                required:"Required Job Role..!!",
            },
            'career_desired_job_type[]':
            {
                required:"Required Desired Job Type..!!",              
            },
            'career_employment_type[]':
            {
                required:"Required Desired Employment Type..!!",              
            },
            career_preferred_shift: 
            {
                required:"Require Preferred Shift..!!",
            },
            'preferred_work_location[]': 
            {
                required:"Required Preferred Work Location..!!",
            },
            expected_salary: 
            {
                required:"Require Expected Salary..!!",
            },
            
      },
    });
});




 </script> 