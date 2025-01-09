            <div class="modal fade" id="myModal44">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Edit Career Profile</h4>
                    <button type="button" class="close" data-dismiss="modal_it_skills">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                    <div class="col-md-"> 
                     <button type="button" style="margin-left:700px " class="btn btn-primary" data-dismiss="modal" onclick="deleteConfirm()">Delete</button>
                    <form id="add_career_profile" method="POST" action="<?php echo base_url();?>recruitment/update_carrer_profile_details"> 
                      <div class="row">
         
                        <div id="skill_software_names" class="form-group col-md-12">
                             <label>Current Industry</label>
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
                        <label>Desired Job Type</label></br>
                        <input type="checkbox" id="career_desired_job_type" name="career_desired_job_type[]" value="Permanent">&nbsp;<label>Permanent</label>&nbsp;&nbsp;&nbsp; <input type="checkbox" id="career_desired_job_type[]" name="career_desired_job_type[]" value="Contractual">&nbsp;<label>Contractual</label>
                        </div>
                        
                         <div id="last_useds" class="form-group col-md-6">
                          <label>Desired Employment Type</label></br>
                          <input type="checkbox" <?php if($career_profile->career_employment_type=="Full Time"){echo "selected";}?> id="career_employment_type" name="career_employment_type[]" value="Full Time">&nbsp;<label>Full Time</label>&nbsp;&nbsp;&nbsp; <input type="checkbox" id="career_employment_type" name="career_employment_type[]" value="Part Time">&nbsp;<label>Part Time</label>
                        </div>
                        
                       
                         <div id="exp_years" class="form-group col-md-6">
                          <label>Preferred Shift</label></br>
                          <input type="radio" id="career_preferred_shift" name="career_preferred_shift" value="Day" <?php if ($career_profile->career_preferred_shift == "Day") { echo "checked='checked'"; } ?>>&nbsp;<label>Day</label>&nbsp;&nbsp;&nbsp;<input type="radio" id="career_preferred_shift" name="career_preferred_shift" value="Night" <?php if ($career_profile->career_preferred_shift == "Night") { echo "checked='checked'"; } ?>>&nbsp;<label>Night</label>&nbsp;&nbsp;&nbsp;<input type="radio" id="career_preferred_shift" name="career_preferred_shift" value="Flexible" <?php if ($career_profile->career_preferred_shift == "Flexible") { echo "checked='checked'"; } ?>>&nbsp;<label>Flexible</label>
                        </div>
                        
                         <div id="exp_months" class="form-group col-md-6">
                          <label>Preferred Work Location (Max 10)</label>
                          <select multiple class="form-control"  id="preferred_work_location[]" name="preferred_work_location[]">       
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
            
            
            
            
 <div id="confirmDelete-popup" class="modal">
	<div class="modal-content">
		<h4>Do you want to delete this record?</h4>
	</div>
	<div class="modal-body">
		<?php 
		$attributes = array('class' => 'form-horizontal', 'id' => 'login');
		echo form_open('product/product/delete_product', $attributes);
		?>   
		<div class="row">
			<div class="col s12">
				<input type="hidden" id="deleteID" name="deleteID" >
				<div class="col s3">
					<button type="btn" class="btn btn-block btn-primary " >Yes</button>
				</div>  
				<div class="col s3">
					<a  class="btn btn-block btn-primary modal-close waves-effect waves-green btn-flat">No</a>
				</div>  
			</div>
		</div>
		<?php echo form_close(); ?> 
	</div>
	<div class="modal-footer">
		<a  class="modal-close waves-effect waves-green btn-flat">Close</a>
	</div>
</div> 
<script>
    function deleteConfirm(id)
{
    $("#deleteID").val(id);
    $("#confirmDelete-popup").modal('open');
}
</script>