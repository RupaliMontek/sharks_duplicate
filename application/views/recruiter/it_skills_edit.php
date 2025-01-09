


            <div class="modal fade" id="myModal39">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
               <div class="modal-header">
                            <h4 class="modal-title deletouterr" id="exampleModalLabel">Edit IT skills <button id="delete_skiis_record" type="button" class="btn frnewdeletbtnnnn" data-toggle="modal" onclick="deleteConfirm(<?php echo $result_it_skills->skill_id ;?>)" >Delete</button>
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
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
                          <select class="custom-select" id="software_last_used" name="software_last_used">       
                            <option value="">Select Year</option>
                            <?php for($startYear=1997; $startYear<=3000; $startYear++){ ?>
                            <option <?php if(@$result_it_skills->last_used==$startYear){echo "selected";}?> value="<?php echo $startYear; ?>"> <?php echo $startYear; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                       
                         <div id="exp_years" class="form-group col-md-6">
                          <label>Experienced</label>
                          <select class="custom-select" id="exp_year" name="exp_year">       
                            <option value="">Select Year</option>
                            <?php for($startexp=1; $startexp<=30; $startexp++){ ?>
                            <option <?php if($result_it_skills->exp_year==$startexp){echo "selected";}?> value="<?php echo $startexp?>"><?php echo $startexp." "."Years"; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        
                         <div id="exp_months" class="form-group col-md-6">
                          <label>Last Used</label>
                          <select class="custom-select" id="exp_month" name="exp_month">       
                            <option value="">Select Month</option>
                            <?php for($startmonth=1; $startmonth<=12; $startmonth++){ ?>
                            <option <?php if(@$result_it_skills->exp_month==$startmonth){echo "selected";}?> value="<?php echo $startmonth?>"><?php echo $startmonth." "."Months"; ?></option>
                            <?php } ?>
                          </select>
                        </div>                        
                      </div>
                 <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button id="it_skill_sumbit" type="submit" class="btn btn-primary" >Save</button>
                </div>   
                 </form>
                </div>
                </div>
              <!-- Modal footer -->                 
              </div>
              
              </div>
            </div>



              <div class="modal fade" id="ITskillsDeletePopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  
                    <div class="modal-content">
                        <div class="modal-header">
              
              <h4 class="modal-title" id="myModalLabel">Are you sure you want to delete this work sample.</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
                        <div class="modal-body">
                            <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruitment/delete_it_skills_records', $attributes);
              ?>   
                        <input type="hidden" id="deleteID" name="deleteID" >
                           <div class="modal-footer frdeleteancelee">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit"   class="btn btn-primary">Delete</button>
                        </div>
                                   </form>
                        </div>
                        
                    </div>
                    
          
                </div>
             </div>
<script>
  


function deleteConfirm(id)
{
    $("#deleteID").val(id);
    $("#ITskillsDeletePopup").modal();
 }
$( document ).ready(function() {
$("#add_it_skills").validate(
    {
      errorElement: "span", 
      rules: 
      {
        software_name: 
            {
                required:true,               
            },
            software_versions: 
            {
                required:true,               
            },
            software_last_used: 
            {
                required:true,               
            },
            exp_year:
            {
                required:true,               
            },
            exp_month:
            {
                required:true,               
            },
      },
      

      messages: 
      { 
        software_name: 
            {
                required:"Required Software Name..!!",
            },
            software_versions: 
            {
                required:"Required Software Version..!!",
            },
            software_last_used: 
            {
                required:"Required Software Last Version Used..!!",
            },
            exp_year: 
            {
                required:"Required Software Experience..!!",
            },
            exp_month:
            {
                required:"Required Software Experience In Month..!!",              
            },
      },
    });
});
</script>