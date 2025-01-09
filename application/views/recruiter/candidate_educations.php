    <div class="modal fade" id="myModal34"> 
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
           
                    <h4 class="modal-title deletouterr">Edit Education <button type="button" class="btn frnewdeletbtnnnn" data-toggle="modal" onclick="deleteConfirm_educations(<?php echo $result_emplpoyemnt->id ?>)" name="delete_button" id="delete_button">Delete</button></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                     
                    <div class="col-md-12">  
                    <form id="add_education" method="POST" action="<?php echo base_url();?>recruitment/update_education_details/<?php echo $result_emplpoyemnt->id?>"> 
                      <div class="row">
                        <div id="educations" class="form-group col-md-6">
                        <input type="hidden" class="form-control " autocomplete="off" placeholder="Enter Board" name="education_id" id="education_id" value="<?=@$result_emplpoyemnt->id?>">
                          <label>Education</label>
                          <select id="education" name="education" class="custom-select">
                              <option>Select Educations</option>
                            <?php foreach($main_courses as $row){ ?>
                              <option <?php if(@$result_emplpoyemnt->education==$row->candidate_education_id){echo "selected";}?> value="<?php echo $row->candidate_education_id; ?>"><?php echo $row->main_course_name ?></option>
                            <?php } ?>                            
                          </select>
                        </div>
                        
                        <div id="candidate_boards" class="form-group col-md-6">
                          <label>Board</label>
                          <input type="text" class="form-control" value="<?php echo @$result_emplpoyemnt->board ?>" autocomplete="off" placeholder="Enter Board" name="candidate_board" id="candidate_board" value="<?=@$candidate->candidate_name?>">
                        </div>
                        <?php if(!empty($result_emplpoyemnt->passout_year)){ ?>
                        <div id="passingout_years" class="form-group col-md-6">
                          <label>Passing Out Year</label>
                          <select class="custom-select" id="passingout_year" name="passingout_year">       
                            <option value="">Select Year</option>
                            <?php for($startYear=1997; $startYear<=3000; $startYear++){ ?>
                            <option <?php if(@$result_emplpoyemnt->passout_year==$startYear){echo "selected";} ?> value="<?php echo $startYear; ?>"> <?php echo $startYear; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <?php } ?>
                        <?php if(!empty($result_emplpoyemnt->school_medium)){ ?>
                        <div  id="candidate_school_mediums" class="form-group col-md-6">
                          <label>School Medium</label>
                          <input type="text" class="form-control " autocomplete="off" placeholder="Enter School Medium" name="candidate_school_medium" id="candidate_school_medium" value="<?=@$result_emplpoyemnt->school_medium?>">
                        </div>
                        <?php } ?>
                        <?php if(!empty($result_emplpoyemnt->total_marks)){ ?>
                         <div  id="candidate_total_marks" class="form-group col-md-6" >
                          <label>Total Marks</label>
                          <input type="text" class="form-control " autocomplete="off" placeholder="Enter School Medium" name="candidate_total_mark" id="candidate_total_mark" value="<?=@$result_emplpoyemnt->total_marks?>">
                        </div>
                        <?php } ?>
                         <?php if(!empty($result_emplpoyemnt->english_marks)){ ?>
                        <div  id="candidate_english_marks" class="form-group col-md-6" >
                          <label>English Marks</label>
                          <input type="text" class="form-control " autocomplete="off" placeholder="Enter School Medium" name="candidate_english_mark" id="candidate_english_mark" value="<?=@$result_emplpoyemnt->english_marks?>">
                        </div>
                         <?php } ?>
                        <?php if(!empty($result_emplpoyemnt->maths_marks)){ ?>                        
                        <div  id="candidate_maths_marks" class="form-group col-md-6">
                          <label>Maths Marks</label>
                          <input type="text" class="form-control " autocomplete="off" placeholder="Enter School Medium" name="candidate_maths_mark" id="candidate_maths_mark" value="<?=@$result_emplpoyemnt->maths_marks?>">
                        </div>
                        <?php } ?>
                        <?php if(!empty($result_emplpoyemnt->university_name)){ ?>      
                        <div id="candidate_univercitys" class="form-group col-md-6">
                          <label>University/Institute</label>
                          <input type="text" class="form-control " autocomplete="off" placeholder="Select university/institute" name="candidate_univercity" id="candidate_univercity" value="<?=@$result_emplpoyemnt->university_name?>">
                        </div>
                        <?php } ?>
                      </div>
                      <div class="row">
                        <?php if(!empty($result_emplpoyemnt->course)){ ?>      
                        <div id="candidate_courses" class="form-group col-md-6">
                          <label>Course</label>
                          <select name="candidate_course" id="candidate_course" class="custom-select" onchange="myFunction(this.value)">
                        <option  value="">Select Candidate Course</option>
                            <?php foreach($course as $row){ ?>
                        <option <?php if(@$result_emplpoyemnt->course == $row->course_id){echo "selected";} ?> value="<?php echo $row->course_id; ?>"><?php echo $row->course_name; ?></option>
                            <?php } ?>
                         </select>
                        </div>
                        <?php } ?>  

                    <?php if(!empty($result_emplpoyemnt->specialization_course)){ ?>      
                        <div  id="course_specializations"class="form-group col-md-6">
                          <label>Specialization</label>
                          <?php $data=$this->M_Candidate_profile->get_specialization_by_course_id($result_emplpoyemnt->course);?>
                          <select name="course_specialization"  id="course_specialization" class="custom-select">
                            <?php foreach($data as $row) { ?>
                            <option <?php if(@$result_emplpoyemnt->specialization_course == $row->specialization_course_id){echo "selected";} ?>    value="<?php echo $row->specialization_course_id ?>"><?php echo $row->specialization_name; ?></option>
                          <?php } ?>
                          </select>
                        </div>
                    <?php } ?>  

                    <?php if(!empty($result_emplpoyemnt->specialization_course_other)){ ?>    
                      <div id="specialization_co" style="display: none;">
                       <div  id="marrige">
                         <input type="text" name="course_specialization1" class="form-control" id="course_specialization1" value="<?php echo $result_emplpoyemnt->specialization_course_other; ?>" placeholder="Enter specialization Course">
                      </div>
                      </div>
                    <?php } ?>                        
                        
                      </div>
                      <?php if(!empty($result_emplpoyemnt->course_type)){ ?>
                      <div class="row">
                        <div id="candidate_course_types" class="form-group col-md-12">                          
                          <label>Course Type</label>                          
                            <input <?php if(@$result_emplpoyemnt->course_type=="Full Time"){echo "checked";}?> type="radio" name="candidate_course_type" value="Full Time"> Full time &nbsp;
                          
                            <input <?php if(@$result_emplpoyemnt->course_type=="Part Time"){echo "checked";}?> type="radio" name="candidate_course_type" value="Part Time"> Part time &nbsp;                         
                            <input <?php if(@$result_emplpoyemnt->course_type=="Correspondence/Distance learning"){echo "checked";}?> type="radio" name="candidate_course_type" value="Correspondence/Distance learning"> Correspondence/Distance learning
                        </div>
                      </div>
                    <?php } ?>
                      <div class="row">
                        <?php if(!empty($result_emplpoyemnt->course_start_year)){ ?>  
                            <div class="col-md-6 form-group" id="course_start_years">
                              <label>Course duration</label>
                              <select name="course_start_year" id="course_start_year" class="custom-select">
                                <option value="" >starting year</option>
                                <?php for($startYear=1997; $startYear<=3000; $startYear++){ ?>
                                <option <?php if(@$result_emplpoyemnt->course_start_year==$startYear){echo "selected";} ?> value="<?php echo $startYear; ?>"><?php echo $startYear; ?></option>
                                <?php } ?>
                              </select> 
                            </div>
                      <?php } ?>      
                      <?php if(!empty($result_emplpoyemnt->course_end_year)){ ?> 
                            <div id="course_end_years" class="col-md-6 form-group" id="">
                            <label></label><br>
                              <select name="course_end_year" id="course_end_year" class="custom-select">
                                <option value="">Ending year</option>
                               <?php for($startYear=1997; $startYear<=3000; $startYear++){ ?>
                                <option <?php if(@$result_emplpoyemnt->course_end_year==$startYear){echo "selected";} ?> value="<?php echo $startYear; ?>"><?php echo $startYear; ?></option>
                                <?php } ?>
                              </select> 
                            </div>
                      <?php } ?>   
                       <?php if(!empty($result_emplpoyemnt->grading_system)){ ?> 
                        <div id="grades" class="form-group col-md-6">
                          <label>Grading System</label>
                          <select name="grade" id="grade" class="custom-select">
                            <option value="">Select grading system</option>
                            <option <?php if(@$result_emplpoyemnt->grading_system == "Scale 10 Grading System"){echo "selected";} ?> value="Scale 10 Grading System">Scale 10 Grading System</option>
                            <option <?php if(@$result_emplpoyemnt->grading_system == "Scale 4 Grading System"){echo "selected";} ?> value="Scale 4 Grading System">Scale 4 Grading System</option>
                            <option <?php if(@$result_emplpoyemnt->grading_system == "marks"){echo "selected";} ?> value="marks">marks</option>
                          </select>
                        </div>
                         <?php } ?>   

                      </div>
                      
                 <div class="modal-footer">
                    <button type="button"  class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button  type="submit"  class="btn btn-primary" >Save</button>
                </div>   
                 </form>
                </div>
                </div>
              <!-- Modal footer -->                 
              </div>
             </div>
            </div>
            </div>
            
<div class="modal fade" id="confirmDelete-popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title" id="myModalLabel">Are you sure you want to delete the Education?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruitment/delete_education_details', $attributes);
              ?>   
              <div class="row">
                <div class="center col-md-12 frdeleteancelee">
                  <input type="hidden" id="deleteID" name="deleteID" >
                  <div class="left col-md-3">
                    <button type="submit" class="btn btn-block btn-secondory " >Delete</button>
                  </div>  
                  <div class="right col-md-3">
                    <button class="btn btn-block btn-primary" data-dismiss="modal" aria-label="Close">Cancel</button>
                  </div>  
                </div>
              </div><!--/row-->
              <?php echo form_close(); ?> 
            </div>          
          </div>
    </div>
</div>

          
            
<script>
function deleteConfirm_educations(id)
  {
    $("#deleteID").val(id);
    $("#confirmDelete-popup").modal();
  }
</script>           
