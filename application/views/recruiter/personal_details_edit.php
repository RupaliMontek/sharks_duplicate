 <div class="modal fade" id="myModal49">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                            <h4 class="modal-title deletouterr" id="exampleModalLabel">Edit Personal Details
                            <button class="btn frnewdeletbtnnnn"  type="button" data-toggle="modal" onclick="delete_personal_details_candidate(<?php echo $personal_details->personal_id ?>)" >Delete</a> 
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    

                        
                  <div class="modal-body">
                    <div class="col-md-">  
                    <form id="add_personal_deatils" method="POST" action="<?php echo base_url();?>recruitment/update_personal_details_candidate"> 
                      <div class="row">
                        <div class="form-group col-md-12">
                           <label for="gender"><b>Gender </b></label>   
                          <!--  <input name="Perosnal_candidate_id" id="Perosnal_candidate_id" type="text" value="<?php  echo $personal_details->id ?>" /> -->
                          <input type="hidden" id="Perosnal_candidate_id" name="Perosnal_candidate_id"  class="form-control" value="<?php echo $personal_details->personal_id ?>">
                          <input type="hidden" id="candidate_id" name="candidate_id"  class="form-control" value="<?php echo $candidate_id; ?>">
                          <input name="gender" id="gender" type="radio" value="Male" <?php if ($personal_details->gender == "Male") { echo "checked='checked'"; } ?>  />
                            Male
                           <input name="gender" id="gender" type="radio" value="Female" <?php if ($personal_details->gender == "Female") { echo "checked='checked'"; } ?>  />
                           Female
                           <input name="gender" id="gender" type="radio" value="Transgender" <?php if ($personal_details->gender == "Transgender") { echo "checked='checked'"; } ?> />
                           Transgender
                        
                        </div>
                        
                         <div class="form-group col-md-12">                           
                           <label><b>Married Status </b></label>                           
                           <input name="married_status" id="married_status" type="radio" value="Single/unmarried" <?php if ($personal_details->married_status == "Single/unmarried") { echo "checked='checked'"; } ?> />
                           Single/unmarried
                           <input name="married_status" id="married_status" type="radio" value="Married" <?php if ($personal_details->married_status == "Married") { echo "checked='checked'"; } ?> />
                           Married
                           <input name="married_status" id="married_status"type="radio" value="Widowed" <?php if ($personal_details->married_status == "Widowed") { echo "checked='checked'"; } ?> />
                           Widowed
                           <input name="married_status" id="married_status" type="radio" value="Divorced" <?php if ($personal_details->married_status == "Divorced") { echo "checked='checked'"; } ?> />
                           Divorced
                           <input name="married_status" id="married_status" type="radio" value="Separated"  <?php if ($personal_details->married_status == "Separated") { echo "checked='checked'"; } ?> />
                           Separated
                           <input name="married_status" id="married_status" type="radio" value="Other" <?php if ($personal_details->married_status == "Other") { echo "checked='checked'"; } ?> />
                           Other                   
                        </div>
                       
                        
                        <div class="col-md-12">
                            <label>Birth Date</label>
                            </div>
                            <div class="frBirthhh form-group col-md-12">
                           <div class="col-md-4"><select class="form-select" id="birth_date" name="birth_date">       
                            <option value="">Select Date</option>
                            <?php for($startYear=1; $startYear<=31; $startYear++){ ?>
                            <option  <?php if($personal_details->birth_date==$startYear){echo "selected";}?> value="<?php echo $startYear?>"><?php echo $startYear; ?></option>
                            <?php } ?>
                          </select>
                          </div>
                          <div class="col-md-4">
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
                          <div class="col-md-4">
                          <select class="form-select" id="birth_year" name="birth_year">       
                            <option value="">Select Date</option>
                            <?php for($startYear=1930; $startYear<=2005; $startYear++){ ?>
                            <option <?php if(@$personal_details->birth_year==$startYear){echo "selected";}?> value="<?php echo $startYear?>"><?php echo $startYear; ?></option>
                            <?php } ?>
                          </select>
                          </div>
                        </div>
                         <div  class="form-group col-md-12">                           
                           <label ><b>Category :</b></label>                           
                           <input name="cast_cat" id="cast_cat" type="radio" value="General" <?php if ($personal_details->cat_candidate == "General") { echo "checked='checked'"; } ?> />
                           General
                           <input name="cast_cat" id="cast_cat" type="radio" value="Scheduled Caste (SC)" <?php if ($personal_details->cat_candidate == "Scheduled Caste (SC)") { echo "checked='checked'"; } ?> />
                           Scheduled Caste (SC)
                           <input name="cast_cat" id="cast_cat"type="radio" value="Scheduled Tribe (ST)" <?php if ($personal_details->cat_candidate == "Scheduled Tribe (ST)") { echo "checked='checked'"; } ?> />
                           Scheduled Tribe (ST)
                           <input name="cast_cat" id="cast_cat" type="radio" value="OBC - Creamy" <?php if ($personal_details->cat_candidate == "OBC - Creamy") { echo "checked='checked'"; } ?> />
                           OBC - Creamy<br>
                           <input name="cast_cat" id="cast_cat" type="radio" value="OBC - Non creamy" <?php if ($personal_details->cat_candidate == "OBC - Non creamy") { echo "checked='checked'"; } ?> />
                          OBC - Non creamy
                           <input name="cast_cat" id="cast_cat" type="radio" value="Other" <?php if ($personal_details->cat_candidate == "Other") { echo "checked='checked'"; } ?> />
                           Other                   
                        </div>

                         <div class="form-group col-md-12" >                           
                           <label ><b>Are you Differently Abled?</b></label>                           
                           <input name="differently_abled" id="differently_abled" type="radio" value="yes" <?php if ($personal_details->differently_abled == "yes") { echo "checked='checked'"; } ?>/>
                           Yes
                           <input name="differently_abled" id="differently_abled" type="radio"value="no" <?php if ($personal_details->differently_abled == "no") { echo "checked='checked'"; } ?> />
                           No                                        
                        </div>

                           <div class="form-group col-md-12" >                           
                           <label ><b>Have you taken a Career Break?</b></label>                           
                           <input name="career_break" id="career_break" type="radio" value="yes" <?php if ($personal_details->career_break == "yes") { echo "checked='checked'"; } ?> />
                           Yes
                           <input name="career_break" id="career_break" type="radio"value="no"  <?php if ($personal_details->career_break == "no") { echo "checked='checked'"; } ?>/>
                           No                                        
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


                        <div class="form-group col-md-12">
                          <label>Permanent Address</label>
                          <textarea id="permanant_addresss" value="<?php echo $personal_details->permanent_add ?>" name="permanant_addresss" ><?php echo $personal_details->permanent_add ?></textarea>                        
                        </div>

                        <div  class="form-group col-md-12">
                          <label>Hometown</label>
                        <input type="text" id="hometown" name="hometown" placeholder="Enter Hometown" class="form-control" value="<?php echo $personal_details->hometown ?>">
                        </div>

                        <div id="last_useds" class="form-group col-md-12">
                          <label>Pincode</label>
                        <input type="text" id="candidate_pincode" name="candidate_pincode"  class="form-control" value="<?php echo $personal_details->pincode ?>">
                        </div>
                        <div class="form-group col-md-12">
                        <label>Language</label>
              <div class="box-body">
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
                                        <tbody>
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
                                                  <td> <?php echo $Srno; ?> </td>
                                                  <td><input  rows="4" cols="50" type="text" class="form-control exp_class form-group" name="language_add[]" id="language_add" value="<?php echo $row->language ?>" placeholder="Enter Language">

                                                  <input type="checkbox" id="lang_read" name="lang_read[<?php echo $cur_count ?>]" value="Read" <?php if($row->read_l=="Read"){ echo "checked='checked'"; } ?>>&nbsp;
                                                  <label>Read</label>
                                                  <input type="checkbox" id="lang_write" name="lang_write[<?php echo $cur_count ?>]" value="Write"  <?php if ($row->write_l == "Write") { echo "checked='checked'"; } ?>>&nbsp;
                                                  <label>Write</label>
                                                  <input type="checkbox" id="lang_speak" name="lang_speak[<?php echo $cur_count ?>]" value="Speak" <?php if ($row->speak_l == "Speak") { echo "checked='checked'"; } ?>>&nbsp;
                                                  <label>Speak</label>

                                                  </td>
                                                <td> <select class="form-select" id="lan_proficiant" name="lan_proficiant[]">
                                                     <option  <?php if($row->proficiency=="Beginner"){echo "selected";}?>  value="Beginner">Beginner</option>
                                                     <option  <?php if($row->proficiency=="Proficient"){echo "selected";}?> value="Proficient">Proficient</option>
                                                     <option  <?php if($row->proficiency=="Expert"){echo "selected";}?> value="Expert">Expert</option>
                                                     </select>
                                                </td>                                            
                                                  <td><button  type="button" id="add_more_rowt_eng_1"  class="btn btn-info btn-sm" onClick="edit_update_more_task_eng(<?php echo $cur_count ?>)">Add</button></td>
                                                </tr>
                                                <?php $Srno++; $cur_count++; } } ?>
                                         </div>
                                                   
                                        </tbody>
                                  </table>
                                  </table>
                              </div>
                          </div>                        
                    </div>   
                     
                      
                 <div class="modal-footer">
                    <button type="button"  class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button id="career_sumbit" type="submit" class="btn btn-primary" >Save</button>
                </div>   
                 </form>
                </div>
                </div>
              <!-- Modal footer -->                 
              </div>
              
              </div>
            </div>
            
            
    
         <div class="modal fade popupoverpopup" id="ITskillsDeletePopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  
                    <div class="modal-content">
                        <div class="modal-header"><h4 class="modal-title" id="myModalLabel">Are you sure you want to delete Perosonal Details.</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                        
                        <div class="modal-body">
                            <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruitment/delete_personal_details_candidate', $attributes);
              ?>   
                        <input type="hidden" id="deleteID" name="deleteID" >
                           
                           <div class="center col-md-12 frdeleteancelee">
                               <div class="col-md-3">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                            <div class="col-md-3">
                            <button type="submit" class="btn btn-primary">Delete</button>
                            </div>
                        </div>
                                   </form>
                        </div>
                        
                    </div>
                    
          
                </div>
             </div>            

<script>

function delete_personal_details_candidate(social_platform_candidate_id)
{
   $("#deleteID").val(social_platform_candidate_id);
    $("#ITskillsDeletePopup").modal();   
}
$(document ).ready(function(){
    
$("#add_personal_deatils").validate(
    {
      errorElement: "span", 
      rules: 
      {
            gender: 
            {
                required:true,               
            },
            married_status: 
            {
                required:true,               
            },
            birth_date: 
            {
                required:true,               
            },
            birth_month:
            {
                required:true,               
            },
            birth_year:
            {
                required:true,               
            },
            cast_cat:
            {
                required:true,               
            },
            differently_abled:
            {
                required:true,               
            },
            career_break:
            {
                required:true,               
            },
            permanant_addresss:
            {
                required:true,               
            },
            hometown:
            {
                required:true,               
            },
            candidate_pincode:
            {
                required:true,               
            },
            'lan_proficiant': 
            {
                required:true,               
            },
            
      },
      messages: 
      { 
            gender: 
            {
                required:"Required Gender..!!",
            },
            married_status: 
            {
                required:"Required Married Status..!!",
            },
            birth_date: 
            {
                required:"Required Date of Birth..!!",
            },
            birth_month: 
            {
                required:"Required Date of Birth Month..!!",
            },
            birth_year:
            {
                required:"Required Birth Year..!!",              
            },
            cast_cat:
            {
                required:"Required Category..!!",              
            },
            differently_abled: 
            {
                required:"Require Differently Abled..!!",
            },
            career_break: 
            {
                required:"Required Career Break..!!",
            },
            permanant_addresss: 
            {
                required:"Require Permanent Address..!!",
            },
            hometown: 
            {
                required:"Require Hometown..!!",
            },
            candidate_pincode: 
            {
                required:"Require Pincode..!!",
            },
            'lan_proficiant[]': 
            {
                required:"Require Language Proficiant..!!",
            },
            
      },
    });
    
/*$("#delete_pesonal").click(function () {
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
});*/ 
});

 </script> 