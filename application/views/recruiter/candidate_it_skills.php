            <div class="modal fade" id="myModal3">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Edit IT Skills</h4>
                    <button type="button" class="close" data-dismiss="modal_it_skills">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                    <div class="col-md-12">  
                    <form id="add_it_skills" method="POST" action="<?php echo base_url();?>recruitment/save_it_skills_candidate"> 
                      <div class="row">
                        <div id="skill_software_names" class="form-group col-md-12">
                          <label>Skill / Software Name</label>
                           <input type="text" name="candidate_id" value="<?=$candidate_ids;?>">
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