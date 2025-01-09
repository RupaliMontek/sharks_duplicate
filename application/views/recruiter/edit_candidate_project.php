  <div class="modal fade" id="candidate_project_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                         <form id="add_project" method="POST" action="<?php echo base_url(); ?>recruitment/update_candidate_project_details">
                        <div class="modal-header">
                            <h4 class="modal-title deletouterr" id="exampleModalLabel">Edit Projects 
                            
                            <button class="btn frnewdeletbtnnnn" type="button" data-toggle="modal" onclick="delete_candidate_project_confirm(<?php echo $candidate_project_id ?>)" >Delete</button></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">                           
                                <div class="form-group"> <label for="" class="col-form-label">Project Title <span class="requiredstar">*</span></label>
                                    <input type="text" name="project_title" class="form-control" id="" placeholder="Enter Project Title" value="<?= $project_details->project_title ?>">
                                    <input type="hidden" name="candidate_project_id" class="form-control" id="candidate_project_id" placeholder="" value="<?= $candidate_project_id ?>">

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
                                        <option <?php if($project_details->employment_education==$designation .
                                            "-" .
                                            $row->emp_current_company_name){echo "selected"; } ?>  value="<?php echo $designation .
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
                                     <option 
                                     
                        <?php 
                        
                        if($row->education == 5)
                        { $data = $this->M_Candidate_profile->get_candidate_education($row->education); 
                        
                         if($project_details->employment_education==$data[0]
                        ->main_course_name){echo "selected";   }
                        ?>
                        value="<?=  $data[0]->main_course_name;?>" 
                        <?php  }
                        
                        
                        elseif($row->education == 4)
                        { 
                            $data = $this->M_Candidate_profile->get_candidate_education($row->education);
                            if($project_details->employment_education==$data[0]
                           ->main_course_name){echo "selected";   }
                        
                        ?>  value="<?=  $data[0]
                        ->main_course_name;?>" <?php   }
                        
                        
                        elseif($row->education == 3)
                        {
                            $query = $this->db->query("select * from candidate_course where course_id = $row->course");
                            $course_details1 = $query->row(); 
                            if($project_details->employment_education==@$course_details1->course_name." ".@$data->specialization_name)
                            {
                                echo "selected";   
                            } 
                            
                            ?>   value="<?=  @$course_details1->course_name." ".@$data->specialization_name ?>"
                            
                            
                        <?php }
                            
                        elseif($row->education == 2)
                        { 
                            $query = $this->db->query("select * from candidate_course where course_id = $row->course");
                            $course_details = $query->row();  
                            if($project_details->employment_education==@$course_details->course_name." ".@$data->specialization_name)
                            {
                                echo "selected";   
                            }   ?>  value="<?=  @$course_details->course_name." ".@$data->specialization_name ?>" 
                            <?php 
                        }
                            
                        elseif($row->education == 1)
                        { $query = $this->db->query("select * from candidate_course where course_id = $row->course");
                            $course_details = $query->row(); 
                            
                        if($project_details->employment_education==@$course_details->course_name." ".@$data->specialization_name){echo "selected";   } ?>  value="<?=  @$course_details->course_name." ".@$data->specialization_name ?>"
                            
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
                            $course_details1 = $query->row(); ?> <?=  @$course_details1->course_name." ".@$data->specialization_name ?> <?php } 
                            elseif($row->education == 2){ 
                            $query = $this->db->query("select * from candidate_course where course_id = $row->course");
                            $course_details3 = $query->row();?> <?=  @$course_details3->course_name." ".@$data->specialization_name ?> 
                            <?php } 
                            elseif($row->education == 1){ $query = $this->db->query("select * from candidate_course where course_id = $row->course");
                            $course_details4 = $query->row(); ?> <?=  @$course_details4->course_name." ".@$data->specialization_name ?>> 
                                     <?php } ?> 
                                     
                                     </option> <?php } }?> 
                                    </select>
                                </div>
                                
                                <div class="form-group"> <label for="" class="col-form-label">Client <span class="requiredstar">*</span></label>
                                    <input type="text" name="client_name" class="form-control" id="client_name" placeholder="Enter Client Name" value="<?= @$project_details->client ?>">
                                </div>

                                <div class="form-group">
                                    <label>Project Status</label>
                                    <div class="form-check form-check-inline form-group">
                                        <input type="radio" name="project_status" id="project_status"  <?php if(@$project_details->project_status=="In Progress"){echo "checked";}?> value="In Progress">
                                        <label   class="form-check-label" for="inlineRadio1">In Progress</label>
                                    </div>
                                    <div class="form-check form-check-inline form-group">
                                        <input name="project_status" id="project_status" type="radio"   <?php if(@$project_details->project_status=="Finished"){echo "checked";}?> value="Finished">
                                        <label  class="form-check-label" for="inlineRadio2">Finished</label>
                                    </div>
                                </div>

                             

                                <div class="form-group forselectionnn">

                                    <label class="" for="inlineFormCustomSelect">Worked From<span class="requiredstar">*</span></label>
                                    <select name="worked_from_year" class="custom-select" id="worked_from_year">
                                    <option selected=""  value="">Years</option>
                                    <?php for($startYear=1997; $startYear<=3000; $startYear++){ ?>
                                   <option <?php if(@$project_details->worked_from_year==$startYear){echo "selected";}?> value="<?php echo $startYear; ?>"> <?php echo $startYear; ?></option>
                                     <?php } ?>
                                    </select>

                                    <select class="custom-select" id="worked_from_month" name="worked_from_month">
                                        <option selected value="">Select Work From Month</option>
                                        <option <?php if(@$project_details->worked_from_month=="1"){echo "selected";}?> value="1">Jan</option>
                                        <option <?php if(@$project_details->worked_from_month=="2"){echo "selected";}?> value="2">Feb</option>
                                        <option <?php if(@$project_details->worked_from_month=="3"){echo "selected";}?> value="3">Mar</option>
                                        <option <?php if(@$project_details->worked_from_month=="4"){echo "selected";}?> value="4">Apr</option>
                                        <option <?php if(@$project_details->worked_from_month=="5"){echo "selected";}?> value="5">May</option>
                                        <option <?php if(@$project_details->worked_from_month=="6"){echo "selected";}?> value="6">Jun</option>
                                        <option <?php if(@$project_details->worked_from_month=="7"){echo "selected";}?> value="7">Jul</option>
                                        <option <?php if(@$project_details->worked_from_month=="8"){echo "selected";}?> value="8">Aug</option>
                                        <option <?php if(@$project_details->worked_from_month=="9"){echo "selected";}?> value="9">Sep</option>
                                        <option <?php if(@$project_details->worked_from_month=="10"){echo "selected";}?> value="10">Oct</option>
                                        <option <?php if(@$project_details->worked_from_month=="11"){echo "selected";}?> value="11">Nov</option>
                                        <option <?php if(@$project_details->worked_from_month=="12"){echo "selected";}?> value="12">Dec</option>
                                    </select>

                                </div>


                                <div id="display_by_status" class="form-group forselectionnn">

                                    <label class="" for="inlineFormCustomSelect">Worked till <span class="requiredstar">*</span></label>
                                    <select class="custom-select" name="worked_till_year" id="worked_till_year">
                                    <option selected="" value="">Years</option>
                                     <?php for($startYear=1997; $startYear<=3000; $startYear++){ ?>
                                   <option <?php if(@$project_details->worked_till_year==$startYear){echo "selected";}?> value="<?php echo $startYear; ?>"> <?php echo $startYear; ?></option>
                                     <?php } ?>   
                                    </select>

                                    <select class="custom-select" name="worked_till_month" id="worked_till_month">
                                        <option selected value="">Select Work Till Month</option>
                                        <option <?php if(@$project_details->worked_till_month=="1"){echo "selected";}?> value="1">Jan</option>
                                        <option <?php if(@$project_details->worked_till_month=="2"){echo "selected";}?> value="2">Feb</option>
                                        <option <?php if(@$project_details->worked_till_month=="3"){echo "selected";}?> value="3">Mar</option>
                                        <option <?php if(@$project_details->worked_till_month=="4"){echo "selected";}?> value="4">Apr</option>
                                        <option <?php if(@$project_details->worked_till_month=="5"){echo "selected";}?> value="5">May</option>
                                        <option <?php if(@$project_details->worked_till_month=="6"){echo "selected";}?> value="6">Jun</option>
                                        <option <?php if(@$project_details->worked_till_month=="7"){echo "selected";}?> value="7">Jul</option>
                                        <option <?php if(@$project_details->worked_till_month=="8"){echo "selected";}?> value="8">Aug</option>
                                        <option <?php if(@$project_details->worked_till_month=="9"){echo "selected";}?> value="9">Sep</option>
                                        <option <?php if(@$project_details->worked_till_month=="10"){echo "selected";}?> value="10">Oct</option>
                                        <option <?php if(@$project_details->worked_till_month=="11"){echo "selected";}?> value="11">Nov</option>
                                        <option <?php if(@$project_details->worked_till_month=="12"){echo "selected";}?> value="12">Dec</option>
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Details of project</label>
                                    <textarea  name="project_details" class="form-control" id="project_details" rows="3" placeholder="Enter Details Of Project"><?= @$project_details->details_project; ?></textarea>
                                </div> 
                            <div id="details_show_more"class="col s12"><a onclick="display_project_more_details()" class="txt-col-p1 typ-16Bold">Add more details</a></div>
                            <div id="show_more_details" style="display:none;">  
                             <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Project location</label>
                                    <textarea  name="project_location" class="form-control" id="project_location" rows="3" placeholder="Enter Project Location"><?= @$project_details->project_location; ?></textarea>
                              </div> 
                              
                              <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Project Site</label>
                                    <textarea  name="project_site" class="form-control" id="project_site" rows="3" placeholder="Enter Project Site"><?= @$project_details->project_site; ?></textarea>
                              </div> 
                              
                              <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Nature of employment</label>
                                    <textarea  name="nature_of_employment" class="form-control" id="nature_of_employment" rows="3" placeholder="Enter Project Nature of employment"><?= @$project_details->nature_employment; ?></textarea>
                              </div> 
                              
                    <div class="form-group">
                            <label for="exampleFormControlTextarea1">Team Size</label>
                            <select class="form-control" name="team_size" id="team_size">
                                    <option value="" selected>Select Team</option>
                                <?php for ($startYear = 1;$startYear <= 30;$startYear++) 
                                    { ?>
                                    <option <?php if(@$project_details->team_size==$startYear){echo "selected";}?> value="<?php echo $startYear; ?>"><?php echo $startYear; ?></option>
                              <?php } ?>
                            </select>
                                    
                    </div> 
                    
                    <div class="form-group">
                            <label for="exampleFormControlTextarea1">Role</label>
                            <input tupe="text"  name="role" class="form-control" id="role" placeholder="Enter Role" value="<?= @$project_details->role; ?>">
                    </div> 
                    
                    <div class="form-group">
                            <label for="exampleFormControlTextarea1">Role description</label>
                            <textarea  name="role_description" class="form-control" id="role_description" rows="3" placeholder="Enter Role description"><?= @$project_details->role_description; ?></textarea>
                    </div>   
                    <div class="form-group">
                            <label for="exampleFormControlTextarea1">Skills used</label>
                            <input tupe="text"  name="skill_used" class="form-control" id="skill_used" placeholder="Enter Skill Used" value="<?= @$project_details->skill_used; ?>">
                    </div> 
                    
                              
                    </div>      
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update changes</button>
                        </div>
                         </form>
                    </div>
                </div>
            </div>
            
            
    <div class="modal fade popupoverpopup" id="delete_candidate_project" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"><h4 class="modal-title" id="myModalLabel">Are you sure you want to delete this Project.</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                        <div class="modal-body">
                            <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruitment/delete_candidate_select_project', $attributes);
              ?>   
              <div class="row">
                  <div class="center col-md-12 frdeleteancelee">
                      <input type="hidden" id="deleteID" name="deleteID">
                           <div class="col-md-3 right">
                            <button type="submit" class="btn btn-block btn-primary">Delete</button></div>
                            <div class="col-md-3 left">
                            <button type="button" class="btn btn-block btn-secondory" data-dismiss="modal">Cancel</button>
                        </div>
                      
                  </div></div>
                        
                                   </form>
                        </div>
                        
                    </div>
                    
          
                </div>
             </div>        
<script>
    function delete_candidate_project_confirm(candidate_project_id)
    {
    $("#deleteID").val(candidate_project_id);
    $("#delete_candidate_project").modal();
    }
</script>            