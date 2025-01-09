

 <div class="modal fade" id="edit_Certifications" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="add_certifications" method="POST" action="<?php echo base_url(); ?>recruitment/update_candidate_certificates">
                        <div class="modal-header">
                            <h4 class="modal-title deletouterr" id="exampleModalLabel">Edit Certifications
                            <button class="btn frnewdeletbtnnnn"  type="button" data-toggle="modal" onclick="delete_candidate_certificates_confirm(<?php echo $certificates->certificate_id ?>)" >Delete</button>
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                         
                        <div class="modal-body">
                            
                                <p>Edit details of Certifications you have achieved/completed</p>
                                <div class="form-group"> <label for="" class="col-form-label">Certification Name <span class="requiredstar">*</span></label>
                                    <input value="<?php echo $certificates->certificate_name ?>" name="certificate_name" type="text" class="form-control form-group" id="" placeholder="Enter your Certification Name">
                                    <input type="text" name="certificate_id" id="certificate_id" value="<?php echo $certificates->certificate_id ?>" class="form-control">
                                </div>

                                  <div class="form-group"> <label for="" class="col-form-label">Certification Provider <span class="requiredstar">*</span></label>
                                    <input value="<?php echo $certificates->certification_provider ?>" name="certification_provider" type="text" class="form-control" id="" placeholder="Enter your Certification Name">
                                </div>

                                <div class="form-group"> <label for="" class="col-form-label">Certification Completion ID <span class="requiredstar">*</span></label>
                                    <input value="<?php echo $certificates->certification_provider ?>" name="certification_completion_id" type="text" class="form-control" id="" placeholder="Enter your Certification Completion ID">
                                </div>

                                <div class="form-group"> <label for="" class="col-form-label">Certification URL </label>
                                    <input value="<?php echo $certificates->certification_url ?>" name="certificate_url" type="text" class="form-control" id="" placeholder="Enter URL">
                                </div>


                                <div class="form-group forcertification">

                                    <label class="" for="inlineFormCustomSelect">Certification Validity<span class="requiredstar">*</span></label>
                                    <div class="forcertificationInn">
                                        <select name="certificate_validity_start_month" class="custom-select" id="inlineFormCustomSelect">
                                            <option selected="">MM</option>


                                            <option <?php if (
                                            @$certificates->cerificate_validity_start_month == 1
                                            ) {echo "selected"; } ?> value="1">Jan</option>
                                        <option <?php if (
                                            @$certificates->cerificate_validity_start_month == 2
                                            ) {echo "selected"; } ?> value="2">Feb</option>
                                        <option <?php if (
                                            @$certificates->cerificate_validity_start_month == 3 
                                            ) {echo "selected"; } ?> value="3">Mar</option>
                                        <option <?php if (
                                            @$certificates->cerificate_validity_start_month == 4
                                            ) {echo "selected"; } ?> value="4">Apr</option>
                                        <option <?php if (
                                            @$certificates->cerificate_validity_start_month == 5
                                            ) {echo "selected"; } ?> value="5">May</option>
                                        <option <?php if (
                                            @$certificates->cerificate_validity_start_month == 6
                                            ) {echo "selected"; } ?> value="6">Jun</option>
                                        <option <?php if (
                                            @$certificates->cerificate_validity_start_month == 7
                                            ) {echo "selected"; } ?> value="7">Jul</option>
                                        <option <?php if (
                                            @$certificates->cerificate_validity_start_month == 8
                                            ) {echo "selected"; } ?> value="8">Aug</option>
                                        <option <?php if (
                                            @$certificates->cerificate_validity_start_month == 9
                                            ) {echo "selected"; } ?> value="9">Sep</option>
                                        <option <?php if (
                                            @$certificates->cerificate_validity_start_month == 10
                                            ) {echo "selected"; } ?> value="10">Oct</option>
                                        <option <?php if (
                                            @$certificates->cerificate_validity_start_month == 11
                                            ) {echo "selected"; } ?> value="11">Nov</option>
                                        <option <?php if (
                                            @$certificates->cerificate_validity_start_month == 12
                                            ) {echo "selected"; } ?> value="12">Dec</option>          
                                           </select>

                                         <select name="certificate_validity_start_year" class="custom-select" id='date-dropdown1'>
                                                <option value="">YYYY</option>
                                                <?php for (
                                                    $startYear = 1930;
                                                    $startYear <= 2050;
                                                    $startYear++
                                                ) { ?>
                                                <option <?php if (@$certificates->cerificate_validity_start_year ==$startYear) { echo "selected";} ?> value="<?php echo $startYear; ?>"><?php echo $startYear; ?></option>
                                                <?php } ?>
                                         </select> 

                                        <select name=" certificate_validity_end_month" class="custom-select" id="inlineFormCustomSelect">
                                            
                                            <option <?php if (
                                            @$certificates->cerificate_validity_end_month == 1
                                            ) {echo "selected"; } ?> value="1">Jan</option>
                                        <option <?php if (
                                            @$certificates->cerificate_validity_end_month == 2
                                            ) {echo "selected"; } ?> value="2">Feb</option>
                                        <option <?php if (
                                            @$certificates->cerificate_validity_end_month == 3 
                                            ) {echo "selected"; } ?> value="3">Mar</option>
                                        <option <?php if (
                                            @$certificates->cerificate_validity_end_month == 4
                                            ) {echo "selected"; } ?> value="4">Apr</option>
                                        <option <?php if (
                                            @$certificates->cerificate_validity_end_month == 5
                                            ) {echo "selected"; } ?> value="5">May</option>
                                        <option <?php if (
                                            @$certificates->cerificate_validity_end_month == 6
                                            ) {echo "selected"; } ?> value="6">Jun</option>
                                        <option <?php if (
                                            @$certificates->cerificate_validity_end_month == 7
                                            ) {echo "selected"; } ?> value="7">Jul</option>
                                        <option <?php if (
                                            @$certificates->cerificate_validity_end_month == 8
                                            ) {echo "selected"; } ?> value="8">Aug</option>
                                        <option <?php if (
                                            @$certificates->cerificate_validity_end_month == 9
                                            ) {echo "selected"; } ?> value="9">Sep</option>
                                        <option <?php if (
                                            @$certificates->cerificate_validity_end_month == 10
                                            ) {echo "selected"; } ?> value="10">Oct</option>
                                        <option <?php if (
                                            @$certificates->cerificate_validity_end_month == 11
                                            ) {echo "selected"; } ?> value="11">Nov</option>
                                        <option <?php if (
                                            @$certificates->cerificate_validity_end_month == 12
                                            ) {echo "selected"; } ?> value="12">Dec</option>  
                                        </select>
                                        <select name="cerificate_validity_end_year" class="custom-select" id='date-dropdown1'>
                                            <option value="">YYYY</option>
                                            <?php for (
                                                    $startYear = 1930;
                                                    $startYear <= 2050;
                                                    $startYear++
                                                ) { ?>
                                                <option <?php if (@$certificates->cerificate_validity_end_year ==$startYear) { echo "selected";} ?> value="<?php echo $startYear; ?>"><?php echo $startYear; ?></option>
                                                <?php } ?>
                                        </select>                    
                                       
                                    </div>

                                </div>

                                <div class="form-group">
                                    <input type="checkbox" value="1"  name="doesnot_expired">
                                    This certification does not expire
                                    
                                </div>                            
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            
            
                  
              <div class="modal fade popupoverpopup" id="candidateCertificateDeletePopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  
                    <div class="modal-content">
                        <div class="modal-header"><h4 class="modal-title" id="myModalLabel">Are you sure you want to delete this Certifications.</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                        
                        <div class="modal-body">
                            <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruitment/delete_candidate_certificates', $attributes);
              ?>   
                        <input type="hidden" id="deleteID" name="deleteID" >
                           
                           <div class="center col-md-12 frdeleteancelee">
                               <div class="left col-md-3">
                            <button type="button" class="btn btn-block btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                            <div class="right col-md-3">
                            <button type="submit" class="btn btn-block btn-primary">Delete</button>
                            </div>
                        </div>
                                   </form>
                        </div>
                        
                    </div>
                    
          
                </div>
             </div>
<script>
function delete_candidate_certificates_confirm(cerificate_id)
{
    $("#deleteID").val(cerificate_id);
    $("#candidateCertificateDeletePopup").modal();
}
$( document ).ready(function() {   
    $("#add_certifications").validate(
    {
      errorElement: "span", 
      rules: 
      {
        certificate_name: 
        {
            required:true,               
        },
        certification_provider: 
        {
            required:true,               
        },
        certification_completion_id: 
        {
            required:true,               
        },
        certificate_url: 
        {
            required:true,               
        },
        certificate_validity_start_month: 
        {
            required:true,               
        },
        certificate_validity_start_year: 
        {
            required:true,               
        },
        certificate_validity_end_month: 
        {
            required:true,               
        },
        cerificate_validity_end_year: 
        {
            required:true,               
        },
        doesnot_expired: 
        {
            required:true,               
        },
      },
      

      messages: 
      { 
        certificate_name: 
        {
            required:"Required Certification Name..!!",
        },
        certification_provider: 
        {
            required:"Required Certification Provider..!!",
        },
        certification_completion_id: 
        {
            required:"Required Certification Completion ID..!!",
        },
        certificate_url: 
        {
            required:"Required Certification URL..!!",
        },
        certificate_validity_start_month: 
        {
            required:"Required Certification Validity Start Month..!!",
        },
        certificate_validity_start_year: 
        { 
            required:"Required Certification Validity Start Year..!!",
        },
        certificate_validity_end_month: 
        {
            required:"Required Certification Validity End Month..!!",
        },
        cerificate_validity_end_year: 
        {
            required:"Required Certification Validity End Year..!!",
        },
        doesnot_expired: 
        {
            required:"Required Does Not Expired..!!",
        },
        
      },
    });
});   
</script>               