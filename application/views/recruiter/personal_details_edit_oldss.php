    <div class="modal fade" id="confirmDelete-popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Do you want to delete this record?</h4>
            </div>
            <div class="modal-body">
              <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('Service/delete_agile_program_managment_main', $attributes);
              ?>   
              <div class="row">
                <div class="center col-md-12">
                  <input type="hidden" id="service_id" name="service_id" >
                  <div class="left col-md-3">
                    <button type="submit" class="btn btn-block btn-warning" >Yes</button>
                  </div>  
                  <div class="right col-md-3">
                    <button class="btn btn-block btn-warning" data-dismiss="modal" aria-label="Close">No</button>
                  </div>  
                </div>
              </div><!--/row-->
              <?php echo form_close(); ?> 
            </div>          
          </div>
        </div>
      </div>



            <div class="modal fade" id="myModal49">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Edit Personal Details</h4>
                    <button type="button" class="close" data-dismiss="myModal10">&times;</button>
                  </div>
                  <div class="modal-body">
                    <div class="col-md-">  
                    <form id="add_personal_deatils" method="POST" action="<?php echo base_url();?>recruitment/update_personal_details_candidate"> 
                      <div class="row">
                        <button  type="button" id="delete_pesonal"  class="btn btn-info btn-sm">Add</button>
                        <div  class="form-group col-md-12">
                           
                           <label for="gender"><b>Gender :</b></label>   
                          <!--  <input name="Perosnal_candidate_id" id="Perosnal_candidate_id" type="text" value="<?php  echo $personal_details->id ?>" /> -->
                          <input type="hidden" id="Perosnal_candidate_id" name="Perosnal_candidate_id"  class="form-control" value="<?php echo $personal_details->personal_id ?>">
                          <input type="hidden" id="candidate_id" name="candidate_id"  class="form-control" value="<?php echo $candidate_id; ?>">
                          <input name="gender" id="gender" type="radio" value="Male" <?php if ($personal_details->gender == "Male") { echo "checked='checked'"; } ?>  />
                            <label >Male</label>
                           <input name="gender" id="gender" type="radio" value="Female" <?php if ($personal_details->gender == "Female") { echo "checked='checked'"; } ?>  />
                           <label >Female</label>
                           <input name="gender" id="gender" type="radio" value="Transgender" <?php if ($personal_details->gender == "Transgender") { echo "checked='checked'"; } ?> />
                           <label for="gender">Transgender</label>
                        
                        </div>
                        
                         <div  class="form-group col-md-12">                           
                           <label ><b>Married Status :</b></label>                           
                           <input name="married_status" id="married_status" type="radio" value="Single/unmarried" <?php if ($personal_details->married_status == "Single/unmarried") { echo "checked='checked'"; } ?> />
                           <label>Single/unmarried</label>
                           <input name="married_status" id="married_status" type="radio" value="Married" <?php if ($personal_details->married_status == "Married") { echo "checked='checked'"; } ?> />
                           <label >Married</label>
                           <input name="married_status" id="married_status"type="radio" value="Widowed" <?php if ($personal_details->married_status == "Widowed") { echo "checked='checked'"; } ?> />
                           <label >Widowed</label>
                           <input name="married_status" id="married_status" type="radio" value="Divorced" <?php if ($personal_details->married_status == "Divorced") { echo "checked='checked'"; } ?> />
                           <label >Divorced</label>
                           <input name="married_status" id="married_status" type="radio" value="Separated"  <?php if ($personal_details->married_status == "Separated") { echo "checked='checked'"; } ?> />
                           <label >Separated</label>
                           <input name="married_status" id="married_status" type="radio" value="Other" <?php if ($personal_details->married_status == "Other") { echo "checked='checked'"; } ?> />
                           <label >Other</label>                    
                        </div>
                       
                        
                        <div  class="form-group col-md-4">
                           <select class="form-select" id="birth_date" name="birth_date">       
                            <option value="">Select Date</option>
                            <?php for($startYear=1; $startYear<=31; $startYear++){ ?>
                            <option  <?php if($personal_details->birth_date==$startYear){echo "selected";}?> value="<?php echo $startYear?>"><?php echo $startYear; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div  class="form-group col-md-4">
                           <select class="form-select" id="birth_month" name="birth_month">       
                            <option value="">Select Month</option>                            
                            <option <?php if($personal_details->birth_date==1){echo "selected";}?> value="1"><?php echo "Jan"; ?></option>
                            <option <?php if($personal_details->birth_date==2){echo "selected";}?> value="2"><?php echo "Feb"; ?></option>
                            <option <?php if($personal_details->birth_date==3){echo "selected";}?> value="3"><?php echo "Mar"; ?></option>
                            <option <?php if($personal_details->birth_date==4){echo "selected";}?> value="4"><?php echo "Apr"; ?></option>
                            <option <?php if($personal_details->birth_date==5){echo "selected";}?> value="5"><?php echo "May"; ?></option>
                            <option <?php if($personal_details->birth_date==6){echo "selected";}?> value="6"><?php echo "Jun"; ?></option>
                            <option <?php if($personal_details->birth_date==7){echo "selected";}?> value="7"><?php echo "Jul"; ?></option>
                            <option <?php if($personal_details->birth_date==8){echo "selected";}?> value="8"><?php echo "Aug"; ?></option>
                            <option <?php if($personal_details->birth_date==9){echo "selected";}?> value="9"><?php echo "Sep"; ?></option>
                            <option <?php if($personal_details->birth_date==10){echo "selected";}?> value="10"><?php echo "Oct"; ?></option>
                            <option <?php if($personal_details->birth_date==11){echo "selected";}?> value="11"><?php echo "Nov"; ?></option>
                            <option <?php if($personal_details->birth_date==12){echo "selected";}?> value="12"><?php echo "Dec"; ?></option>
                        
                          </select>
                        </div>
                        
                         <div  class="form-group col-md-4">
                           <select class="form-select" id="birth_year" name="birth_year">       
                            <option value="">Select Date</option>
                            <?php for($startYear=1930; $startYear<=2005; $startYear++){ ?>
                            <option <?php if(@$personal_details->birth_year==$startYear){echo "selected";}?> value="<?php echo $startYear?>"><?php echo $startYear; ?></option>
                            <?php } ?>
                          </select>
                        </div>                       
                        

                         <div  class="form-group col-md-12">                           
                           <label ><b>Category :</b></label>                           
                           <input name="cast_cat" id="cast_cat" type="radio" value="General" <?php if ($personal_details->cat_candidate == "General") { echo "checked='checked'"; } ?> />
                           <label >General</label>
                           <input name="cast_cat" id="cast_cat" type="radio" value="Scheduled Caste (SC)" <?php if ($personal_details->cat_candidate == "Scheduled Caste (SC)") { echo "checked='checked'"; } ?> />
                           <label >Scheduled Caste (SC)</label>
                           <input name="cast_cat" id="cast_cat"type="radio" value="Scheduled Tribe (ST)" <?php if ($personal_details->cat_candidate == "Scheduled Tribe (ST)") { echo "checked='checked'"; } ?> />
                           <label >Scheduled Tribe (ST)</label>
                           <input name="cast_cat" id="cast_cat" type="radio" value="OBC - Creamy" <?php if ($personal_details->cat_candidate == "OBC - Creamy") { echo "checked='checked'"; } ?> />
                           <label >OBC - Creamy</label>
                           <input name="cast_cat" id="cast_cat" type="radio" value="OBC - Non creamy" <?php if ($personal_details->cat_candidate == "OBC - Non creamy") { echo "checked='checked'"; } ?> />
                           <label >OBC - Non creamy</label>
                           <input name="cast_cat" id="cast_cat" type="radio" value="Other" <?php if ($personal_details->cat_candidate == "Other") { echo "checked='checked'"; } ?> />
                           <label >Other</label>                    
                        </div>

                         <div  lass="form-group col-md-12" >                           
                           <label ><b>Are you Differently Abled?</b></label></br>                           
                           <input name="differently_abled" id="differently_abled" type="radio" value="yes" <?php if ($personal_details->differently_abled == "yes") { echo "checked='checked'"; } ?>/>
                           <label >Yes</label>
                           <input name="differently_abled" id="differently_abled" type="radio"value="no" <?php if ($personal_details->differently_abled == "no") { echo "checked='checked'"; } ?> />
                           <label >No</label>                                         
                        </div>

                           <div  lass="form-group col-md-12" >                           
                           <label ><b>Have you taken a Career Break?</b></label></br>                           
                           <input name="career_break" id="career_break" type="radio" value="yes" <?php if ($personal_details->career_break == "yes") { echo "checked='checked'"; } ?> />
                           <label >Yes</label>
                           <input name="career_break" id="career_break" type="radio"value="no"  <?php if ($personal_details->career_break == "no") { echo "checked='checked'"; } ?>/>
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
                          <textarea id="permanant_addresss" value="<?php echo $personal_details->permanent_add ?>" name="permanant_addresss" ><?php echo $personal_details->permanent_add ?></textarea>                        
                        </div>

                        <div  class="form-group col-md-12">
                          <label>Hometown</label></br>
                        <input type="text" id="hometown" name="hometown" placeholder="Enter Hometown" class="form-control" value="<?php echo $personal_details->hometown ?>">
                        </div>

                        <div id="last_useds" class="form-group col-md-12">
                          <label>Pincode</label></br>
                        <input type="text" id="candidate_pincode" name="candidate_pincode"  class="form-control" value="<?php echo $personal_details->pincode ?>">
                        </div>
                        <h5>Language</h5>
              <div class="box-body ">
                <div id="showtable">
                       <table id="example8" class="table table-bordered table-striped" >
                                        <thead>
                                          <tr>                                           
                                            <th>ID</th>
                                            <th>Language</th>
                                            <th>proficiency</th>
                                            <th>Action</th>
                                          </tr>
                                        </thead>
                                        <tbody style="height: 100px">
                                          <div id="tasskkdf_1">
                                            <?php if (
                                                !empty(
                                                    $know_language
                                                )
                                            ) {
                                                $cur_count = "0";
                                                $Srno = 1;

                                                foreach (
                                                    $know_language
                                                    as $row
                                                ) { ?>
                                                <tr id="add_more_1" style="position:sticky; top: 0;">
                                                  <td> <?php echo "1"; ?> </td>
                                                  <td><input  rows="4" cols="50" type="text" class="form-control exp_class" name="language_add[]" id="language_add" value="<?php echo $row->language ?>" placeholder="Enter Language"></br>

                                                  <input type="checkbox" id="lang_read" name="lang_read[]" value="Read" <?php if($row->read_l=="Read"){ echo "checked='checked'"; } ?>>&nbsp;
                                                  <label>Read</label>
                                                  <input type="checkbox" id="lang_write_" name="lang_write[]" value="Write"  <?php if ($row->write_l == "Write") { echo "checked='checked'"; } ?>>&nbsp;
                                                  <label>Write</label>
                                                  <input type="checkbox" id="lang_speak_" name="lang_speak[]" value="Speak" <?php if ($row->speak_l == "Speak") { echo "checked='checked'"; } ?>>&nbsp;
                                                  <label>Speak</label>

                                                  </td>
                                                <td> <select class="form-select" id="lan_proficiant" name="lan_proficiant[]">
                                                     <option  <?php if($row->proficiency=="Beginner"){echo "selected";}?>  value="Beginner">Beginner</option>
                                                     <option  <?php if($row->proficiency=="Proficient"){echo "selected";}?> value="Proficient">Proficient</option>
                                                     <option  <?php if($row->proficiency=="Expert"){echo "selected";}?> value="Expert">Expert</option>
                                                     </select>
                                                </td>                                            
                                                  <td><button  type="button" id="add_more_rowt_eng_1"  class="btn btn-info btn-sm" onClick="add_more_task_eng(1)">Add</button></td>
                                                </tr>
                                                <?php } } ?>
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

<script>
$(document ).ready(function(){
$("#delete_pesonal").click(function () {
if (confirm("Are you sure delete this record.?")) {  
  var Perosnal_candidate_id=$("#Perosnal_candidate_id").val();   
  var candidate_id=$("#candidate_id").val();
  var base_url = "<?php echo base_url();?>";
  $.ajax({
      url: base_url+'recruitment/delete_personal_details_candidate',      
      type: 'POST',
      data: {Perosnal_candidate_id:Perosnal_candidate_id,candidate_id:candidate_id},
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