            <div class="modal fade" id="myModal39">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Edit IT Skills</h4>
                    <button type="button" class="close" data-dismiss="modal_it_skills">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                    <div class="col-md-12">  
                    <form id="add_it_skills" method="POST" action="<?php echo base_url();?>recruitment/update_it_skills_details"> 
                      <div class="row">
                        <div id="skill_software_names" class="form-group col-md-12">
                          <label>Skill / Software Name</label>
                          <input type="hidden" class="form-control " autocomplete="off"  name="skill_id" id="skill_id" value="<?=@$result_it_skills->skill_id?>">
                           <input type="text" id="software_name" name="software_name" value="<?php echo $result_it_skills->software_name ?>" placeholder="Skill / Software Name" class="form-control ">
                        </div>
                        
                        <div id="software_versions" class="form-group col-md-6">
                          <label>Software Version</label>
                          <input type="text" class="form-control " autocomplete="off" value="<?php echo $result_it_skills->software_version ?>" placeholder="Enter Board" name="software_versions" id="software_versions" value="<?=@$candidate->candidate_name?>">
                        </div>
                        
                        <div id="last_useds" class="form-group col-md-6">
                          <label>Last Used</label>
                          <select class="form-select" id="software_last_used" name="software_last_used">       
                            <option value="">Select Year</option>
                            <?php for($startYear=1997; $startYear<=3000; $startYear++){ ?>
                            <option <?php if(@$result_it_skills->last_used==$startYear){echo "selected";}?> value="<?php echo $startYear; ?>"> <?php echo $startYear; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                       
                         <div id="exp_years" class="form-group col-md-6">
                          <label>Experienced</label>
                          <select class="form-select" id="exp_year" name="exp_year">       
                            <option value="">Select Year</option>
                            <?php for($startexp=1; $startexp<=30; $startexp++){ ?>
                            <option <?php if($result_it_skills->exp_year==$startexp){echo "selected";}?> value="<?php echo $startexp?>"><?php echo $startexp." "."Years"; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        
                         <div id="exp_months" class="form-group col-md-6">
                          <label>Last Used</label>
                          <select class="form-select" id="exp_month" name="exp_month">       
                            <option value="">Select Month</option>
                            <?php for($startmonth=1; $startmonth<=12; $startmonth++){ ?>
                            <option <?php if(@$result_it_skills->exp_month==$startmonth){echo "selected";}?> value="<?php echo $startmonth?>"><?php echo $startmonth." "."Months"; ?></option>
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