<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
<style>
    .stat_btn a{
        display:inline;
    }
</style>
<script type="text/javascript">

  //function for delete 
  function deleteConfirm(id)
  {
    $("#deleteID").val(id);
    $("#confirmDelete-popup").modal();
  }


   function updateConfirm(id,status)
  {
    $("#updateID").val(id);
    $("#updateStatus").val(status);

    if(status==0)
    {
      $('#change_title').html('Do you want to active this record?');
      $('#lwd_div').css('display', 'block');
    }
    else
    {
      $('#change_title').html('Do you want to deactive this record?');
      $('#lwd_div').css('display', 'none');
    }

    

    $("#confirmUpdate-popup").modal();
  }

  //function for hide success message
  function closeError2()
  { 
    $("#errorMessage2").hide(); 
  }

  //function for hide success message
  function closeSuccess2()
  { 
    $("#successMessage2").hide(); 
  }
      
</script>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>SOURCEFUSE TECHNOLOGIES INDIA PRIVATE LIMITED	</h1>
          <h6>Vendor Registration Form - V.3.0	</h6>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="javascript:void(0);">Vendor Form</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
         
              <div class="box">
<div class="panel-info">
<div class="box-body">
    
       <div class="row">
                <div class="col-md-8">
                    <label>(Please Select Yes if you wants to follow joining process-sending joining form OR if you wants to manually add Vendor then select No) </label>
                    </div>
                    </div>
                    <br>
                     <div class="row">
            <div class="col-md-4">
              <label>Follow Joining Process?</label>
              <select class="form-control" name="follow_joining_process" id="follow_joining_process" required>
                <option  value="">Select Vendor</option>
                <option <?php if($vendor_details->vendor_joining_process=="Yes"){echo "selected"; } ?> value="Yes">Yes</option>
                <option <?php if($vendor_details->vendor_joining_process=="No"){echo "selected"; } ?> value="No">No</option>
              </select>
            </div>
            </div>

            
<div id="follow_process_no" <?php if($vendor_details->vendor_joining_process=="No"){?>style="display:block" <?php } else{?>style="display:none" <?php } ?>>
<!-- vendor form code start here -->
<form class="frvendorformm" method="post" enctype="multipart/form-data"  name="joining_process_add" id="myForm" action="<?php echo base_url("user/admin_user/update_vendor_form"); ?>">
    <h4>Company Details</h4>
    <div class="row vendorformroww">
  <div class="frformv">
    <div class="col-md-3"><label>Entity Name</label> (ss per Reg certificate)<span class="error">*</span></div>
    
     <div class="frEntityname">
     <div class="col-md-9">
     <input type="text" class="form-control" name="ms_name" id="ms_name" value="<?php echo $vendor_details->ms_name; ?>" placeholder="M/S First name">
     <input type="hidden" class="form-control" name="vendor_user_id" id="vendor_user_id" value="<?php echo $vendor_details->vendor_user_id; ?>">
     <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $vendor_details->id; ?>">
     </div>
     </div>
  </div>
  </div>
  
   <div class="row vendorformroww">
  <div class="frformv">
    <div class="col-md-3"><label>Type of Entity</label><span class="error">*</span></div>
    <div class="col-md-3"><input type="text" name="type_of_entity" id="type_of_entity" class="form-control" value="<?php echo $vendor_details->type_entity; ?>"></div>
    </div>
    
     <div class="frformv">
    <div class="col-md-3"><label>CIN/LLP No (For Pvt and Public ltd/LLP)<span class="error">*</span></label></div>
    <div class="col-md-3"><input type="text" name="cin_llp_no" id="cin_llp_no" class="form-control"><input type="hidden" name="follow_joining_proce" id="follow_joining_proce1" class="form-control" value="<?php echo $vendor_details->vendor_joining_process; ?>"></div>
    </div>
    </div>
    
     <div class="row vendorformroww">
      <div class="frformv">
    <div class="col-md-3"><label>State Of Registration</label><span class="error">*</span></div>
    <div class="col-md-3"><input type="text" name="state_of_registration" id="state_of_registration" class="form-control" value="<?php echo $vendor_details->state_of_registration; ?>"></div>
    </div>
   
    <div class="frformv">
    <div class="col-md-3"><label>Registered / Corporate office Address<span class="error">*</span></label>(as per document, if applicable)</div>
    <div class="col-md-3"><textarea name="register_corporate_office_add" id="register_corporate_office_add" class="form-control"><?php echo $vendor_details->registration_corporate_addess;?></textarea></div>
    </div>
    </div>
    
    <div class="row vendorformroww">
    <div class="frformv">
    <div class="col-md-3"><label>Billing Address</label><span class="error">*</span>(as per document, if applicable)</div>
    <div class="col-md-3"><textarea name="billing_address" id="billing_address" class="form-control"><?php echo $vendor_details->billing_address; ?></textarea></div>
    </div>
    
    
    
    <div class="row vendorformroww">
    <div class="frformv">
    <div class="col-md-3"><label>State</label><span class="error">*</span></div>
    <div class="col-md-3"><input type="text" name="state" id="state" class="form-control" value="<?php echo $vendor_details->state; ?>"></div>
    </div>
    
    <div class="frformv">
    <div class="col-md-3"><label>City</label><span class="error">*</span></div>
    <div class="col-md-3"><input type="text" name="city" id="city" class="form-control" value="<?php echo $vendor_details->city; ?>"></div>
    </div>
    </div>
    
    <div class="frformv">
    <div class="col-md-3"><label>Contact Number</label><span class="error">*</span></div>
    <div class="col-md-3"><input type="text" name="company_contact_no" id="company_contact_no" class="form-control" value="<?php echo $vendor_details->company_contact_no; ?>"></div>
    </div>
    </div>
    
    <!--<div class="row vendorformroww">
    <div class="frformv">
    <div class="col-md-3"><label>Contact Number</label><span class="error">*</span></div>
    <div class="col-md-3"><input type="text" class="form-control"></div>
    </div>
    </div>-->
    
    <h4>Contact Person Details</h4>
    
    <div class="row vendorformroww">
    <div class="frformv">
    <div class="col-md-3"><label>E-Mail/User Id</label><span class="error">*</span></div>
    <div class="col-md-3"><input type="email" name="contact_email" id="contact_email" class="form-control" value="<?php echo $vendor_details->contact_email; ?>"></div>
    </div>
    
    <div class="frformv">
    <div class="col-md-3"><label>First Name</label><span class="error">*</span></div>
    <div class="col-md-3"><input type="text" name="contact_first_name" id="contact_first_name" class="form-control" value="<?php echo $vendor_details->vendor_name; ?>"></div>
    </div>
    </div>

    <div class="row vendorformroww">
    <div class="frformv">
    <div class="col-md-3"><label>Last Name</label></div>
    <div class="col-md-3"><input type="text" name="contact_last_name" id="contact_last_name" class="form-control" value="<?php echo $vendor_details->vendor_l_name; ?>"></div>
    </div>
   
    <div class="frformv">
    <div class="col-md-3"><label>Contact Number</label><span class="error">*</span></div>
    <div class="col-md-3"><input type="" name="contact_person_contact_no" id="contact_person_contact_no" class="form-control" value="<?php echo $vendor_details->contact_person_contact_no; ?>"></div>
    </div>
    </div>

<div class="row vendorformroww">
    <div class="frformv">
    <div class="col-md-3"><label>Cell Number</label></div>
    <div class="col-md-3"><input type="text" name="contact_person_cell_no" id="contact_person_cell_no" class="form-control" value="<?php echo $vendor_details->contact_person_cell_no; ?>"></div>
    </div>
    </div>
    
<h4>Statutary Details</h4>

  <div class="row vendorformroww">
    <div class="frformv">
    <div class="col-md-3"><label>PAN No</label><span class="error">*</span></div>
    <div class="col-md-3"><input type="text" name="statutary_pan_no" id="statutary_pan_no" class="form-control" value="<?php echo $vendor_details->pan_no; ?>"></div>
    </div>
    
    <div class="frformv">
    <div class="col-md-3"><label>GST No(based on the billing requirement)<span class="error">*</span></label>
</div>
    <div class="col-md-3"><input type="text" name="statutary_gst_no" id="statutary_gst_no" class="form-control" value="<?php echo $vendor_details->gstin_no; ?>"></div>
    </div>
    </div>
    
    <div class="row vendorformroww">
    <div class="frformv">
    <div class="col-md-3"><label>TAN No</label><span class="error">*</span></div>
    <div class="col-md-3"><input type="text" name="statutary_tan_no"id="statutary_tan_no" class="form-control" value="<?php echo $vendor_details->statutary_tan_no; ?>"></div>
    </div>
  
    <div class="frformv">
    <div class="col-md-3"><label>MSME No</label></div>
    <div class="col-md-3"><input type="text" name="statutary_msme_no" id="statutary_msme_no" class="form-control" value="<?php echo $vendor_details->msme_no; ?>"></div>
    </div>
    </div>
  
    
    <h4>Bank Details<span class="error">*</span></h4>
    
    <div class="row vendorformroww">
    <div class="frformv">
    <div class="col-md-3"><label>Name as per Bank</label><span class="error">*</span></div>
    <div class="col-md-3"><input type="text" name="name_as_per_bank" id="name_as_per_bank" class="form-control" value="<?php echo $vendor_details->name_as_per_bank; ?>"></div>
    </div>
    
    <div class="frformv">
    <div class="col-md-3"><label>Bank Name</label><span class="error">*</span></div>
    <div class="col-md-3"><input type="text" name="bank_name" id="bank_name" class="form-control" value="<?php echo $vendor_details->bank_name; ?>"></div>
    </div>
    </div>
    
    <div class="row vendorformroww">
    <div class="frformv">
    <div class="col-md-3"><label>Branch Name</label><span class="error">*</span></div>
    <div class="col-md-3"><input type="text" name="branch_name" id="branch_name" class="form-control" value="<?php echo $vendor_details->branch_name; ?>"></div>
    </div>
   
    <div class="frformv">
    <div class="col-md-3"><label>Branch Address</label><span class="error">*</span></div>
    <div class="col-md-3"><input type="text" name="branch_add" id="branch_add" class="form-control" value="<?php echo $vendor_details->branch_address; ?>"></div>
    </div>
    </div>
    
     <div class="row vendorformroww">
    <div class="frformv">
    <div class="col-md-3"><label>Account No</label><span class="error">*</span></div>
    <div class="col-md-3"><input type="text" name="account_no" id="account_no" class="form-control" value="<?php echo $vendor_details->account_number; ?>"></div>
    </div>
    
    <div class="frformv">
    <div class="col-md-3"><label>IFSC Code</label><span class="error">*</span></div>
    <div class="col-md-3"><input type="text" name="ifsc_code" id="ifsc_code" class="form-control" value="<?php echo $vendor_details->ifsc_code; ?>"></div>
    </div>
    </div>
    
    <div class="row vendorformroww">
    <div class="frformv">
    <div class="col-md-3"><label>Swift Code</label></div>
    <div class="col-md-3"><input type="text" name="swift_code"  id="swift_code" class="form-control" value="<?php echo $vendor_details->swift_code; ?>"></div>
    </div>
   
    <div class="frformv">
    <div class="col-md-3"><label>City</label><span class="error">*</span></div>
    <div class="col-md-3"><input type="text" name="bank_city" id="bank_city" class="form-control" value="<?php echo $vendor_details->bank_city; ?>"></div>
    </div>
    </div>
    
    <h4>Docs Required for Vendor Registration</h4>
   
    <div class="row vendorformroww">
    <div class="frformv">
    <div class="col-md-3"><label>Pan Card of Company</label></div>
    <div class="col-md-3"><input type="file" class="form-control-file" id="pan_card_of_company" name="pan_card_of_company"><input type="hidden" class="form-control-file" id="pan_card_of_company_new" name="pan_card_of_company_new" value="<?php echo $vendor_details->pan_card_doc; ?>"></div>
    </div>
   
    <div class="frformv">
    <div class="col-md-3"><label>Gst Certificate of Company</label></div>
    <div class="col-md-3"><input type="file" name="gst_certificate" id="gst_certificate" class="form-control-file"> <input type="hidden" name="gst_certificate_new" id="gst_certificate_new" class="form-control-file" value="<?php echo $vendor_details->gst_cret_doc; ?>" ></div>
    </div>
    </div>
    
     <div class="row vendorformroww">
    <div class="frformv">
    <div class="col-md-3"><label>Cancelled Cheque</label></div>
    <div class="col-md-3"><input type="file" class="form-control-file" name="cancelled_cheque" id="cancelled_cheque">  <input type="hidden" class="form-control-file" name="cancelled_cheque_new" id="cancelled_cheque_new" value="<?php echo $vendor_details->cancel_cheque_doc; ?>"></div>
    </div>
    
    <div class="frformv">
    <div class="col-md-3"><label>Certificate of incorporation</label></div>
    <div class="col-md-3"><input type="file" class="form-control-file" id="certificate_of_incorporation" name="certificate_of_incorporation">  <input type="hidden" class="form-control-file" id="certificate_of_incorporation_new" name="certificate_of_incorporation_new" value="<?php echo $vendor_details->cert_incorporation; ?>"></div>
    </div>
    </div>
    
    <div class="row vendorformroww">
    <div class="frformv">
    <div class="col-md-3"><label>MSME Certificate</label></div>
    <div class="col-md-3"><input type="file" class="form-control-file" name="msme_certificate" id="msme_certificate"> <input type="hidden" class="form-control-file" name="msme_certificate_new" id="msme_certificate_new" value="<?php echo $vendor_details->msme_cert; ?>"></div>
    </div>
    </div>
    
    
    <div class="row vendorformroww forlineseppp">
    <div class="frformv">
    <div class="col-md-12"><p class="VFcompname">For Montek Tech Services Private Limited</p></div>
    </div>
    </div>
    
    <div class="row vendorformroww">
    <div class="frformv">
    <div class="col-md-12"><p class="VFsignnn">Signature & Stamp</p></div>
    </div>
    </div>
    
    <div class="row vendorformroww">
    <div class="frformv">
    <div class="col-md-3"><label>Name</label></div>
    <div class="col-md-3"><input class="form-control" type="text" name="sign_name" id="sign_name" value="<?php echo $vendor_details->name_montek; ?>"></div>
    </div>
    
    <div class="frformv">
    <div class="col-md-3"><label>Designation</label></div>
    <div class="col-md-3"><input class="form-control" type="text"name="sign_designation" id="sign_designation" value="<?php echo $vendor_details->name_designation; ?>"></div>
    </div>
    </div>
    
    <div class="row vendorformroww">
    <div class="frformv">
    <div class="col-md-3"><label>Date</label></div>
    <div class="col-md-3"><input class="form-control" type="text" name="sign_date" id="sign_date" value="<?php echo $vendor_details->date_montek; ?>"></div>
    </div>
    
    <div class="frformv">
    <div class="col-md-3"><label>Place</label></div>
    <div class="col-md-3"><input class="form-control" type="text" name="sign_place" id="sign_place" value="<?php echo $vendor_details->place_montek; ?>"></div>
    </div>
    </div>
    
    <div class="row vendorformroww">
    <div class="frformv">
    </div>
    </div>
    <div class="col-md-3"> 
<button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
<!-- vendor form code end here -->
</div>
 <div id="follow_process_yes" <?php if($vendor_details->vendor_joining_process=="Yes"){?>style="display:block" <?php } else{?>style="display:none" <?php } ?>>
           
            <form method="post" enctype="multipart/form-data"  name="joining_process_add" id="joining_process_add"
            action="<?php echo base_url();?>user/admin_user/update_vendor_basic_details" onSubmit="return confirm('Are you sure you wish to Save?');">
            <?php  $iid = $this->session->userdata('user_id'); 
            $admin_id=$this->session->userdata('admin_id'); 
            ?>
            <input type="hidden" class="form-control" name="added_by_user_admin_id" id="added_by_user_admin_id" value="<?php echo $admin_id;?>" />
            <div class="box-header">
            <h3 class="box-title">Personal  Details</h3>
            </div><!-- /.box-header -->
            <div class="row vendorformroww">
            <div class="frformv">
            <div class="col-md-3"><label>E-Mail/User Id</label><span class="error">*</span></div>
            <div class="col-md-3">
            <input type="email" name="contact_email" id="contact_email" class="form-control" value="<?php echo $vendor_details->contact_email; ?>">
            <input type="hidden" class="form-control" name="vendor_user_id" id="vendor_user_id" value="<?php echo $vendor_details->vendor_user_id; ?>">
            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $vendor_details->id; ?>">
            <input type="hidden" name="follow_joining_proce" id="follow_joining_proce2" class="form-control" value="<?php echo $vendor_details->vendor_joining_process; ?>">
            </div>
            </div>
            
            <div class="frformv">
            <div class="col-md-3"><label>First Name</label><span class="error">*</span></div>
            <div class="col-md-3"><input type="text" name="contact_first_name" id="contact_first_name" class="form-control" value="<?php echo $vendor_details->vendor_name; ?>"></div>
            </div>
            </div>

            <div class="row vendorformroww">
            <div class="frformv">
            <div class="col-md-3"><label>Last Name</label></div>
            <div class="col-md-3"><input type="text" name="contact_last_name" id="contact_last_name" class="form-control" value="<?php echo $vendor_details->vendor_l_name; ?>"></div>
            </div>
   
            <div class="frformv">
            <div class="col-md-3"><label>Contact Number</label><span class="error">*</span></div>
            <div class="col-md-3"><input type="" name="contact_person_contact_no" id="contact_person_contact_no" class="form-control" value="<?php echo $vendor_details->contact_person_contact_no; ?>"></div>
            </div>
            </div>

            <div class="row vendorformroww">
            <div class="frformv">
            <div class="col-md-3"><label>Cell Number</label></div>
            <div class="col-md-3"><input type="text" name="contact_person_cell_no" id="contact_person_cell_no" class="form-control" value="<?php echo $vendor_details->contact_person_cell_no; ?>"></div>
            </div>
            </div><br>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Save</button>
              <input type="reset" value="Cancel" class="btn btn-primary" />
            </div>
          </form>
            </div>




</div> 
</div>
              </div><!-- /box -->
         
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
 
<!-- Button trigger modal -->


<!-- Modal after clicking submit -->
<div class="modal fade" id="createpassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="row frcreatepww">
        <div class="col-md-5 createpwleft"><img width="100%" height="auto" class="img-fluid" src="https://msuite.work/frontend/images/createpw.png"></div>
      <div class="col-md-7 frmobCreatPwmodal">
          <div class="modal-header">
        <h3 id="">Create Password</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form id="validatedForm" method="post" enctype="multipart/form-data"  action ="<?php echo base_url("user/admin_user/create_password_vendor_user"); ?>">
  <div class="form-group">
    <label for="exampleInputEmail1">Type Password</label>
    <input type="password" class="form-control" id="password" name="password" aria-describedby="">
    <input type="hidden" class="form-control" id="user_admin_id" name="user_admin_id" aria-describedby="">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" class="form-control" id="password_confirm" name="password_confirm">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
      </div>
     
      </div>
      </div>
    </div>
  </div>
</div>  

<script>
$(document).ready(function(){
    $('#follow_joining_process').on('change', function() {
      var follow_joining_process = $('#follow_joining_process').val(); 
      document.getElementById('follow_joining_proce1').value = follow_joining_process;
      document.getElementById('follow_joining_proce2').value = follow_joining_process;  
      if (this.value == 'Yes' || this.value == ' ')
      //.....................^.......
      {
        $("#follow_process_yes").show();
        $("#follow_process_no").hide();
      }
      else
      {
        var follow_joining_process = $('#follow_joining_process').val(); 
         document.getElementById('follow_joining_proce1').value = follow_joining_process;
        $("#follow_process_no").show();
        $("#follow_process_yes").hide();
      }
    });
});
</script>

<script>
    $(document).ready( function() 
{
    
   $('#sign_date').datetimepicker
   ({
        format: 'Y-m-d H:i', // Define the format as per your requirement
        step: 15, // Define the time step (optional)
    });    
  jQuery.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[a-zA-Z,\s]*$/.test(value);
  }, "Only letters with space.");


  jQuery.validator.addMethod("notEqual", function(value, element) { 
    return this.optional(element) || value != "0000000000";
  }, "Invalid mobile number.");

  jQuery.validator.addMethod("emailtest", function(value, element) {
    return this.optional(element) || /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$/i.test(value);
  }, "Please enter a valid Email ID");    
} );

function validateAndSubmitForm() {
        // Perform client-side validation
        var ms_name = $('#ms_name').val().trim();
        var certificate_of_incorporation = $('#certificate_of_incorporation').val().trim();
        var type_of_entity = $('#type_of_entity').val().trim();
        // Check if the required fields are not empty
        if (ms_name == "" ) {
            alert('Please fill ms name');
            return;
        }
        if (certificate_of_incorporation == "" ) {
            alert('Please Select Certificate Of Incorporation Document');
            return;
        }
        if (type_of_entity == "" ) {
            alert('Please Select Certificate Of Incorporation Document');
            return;
        }
        if(ms_name !== "" && certificate_of_incorporation !== "" ){
          submit_vendor_Form();
        }
    }
function submit_vendor_Form() 
{
      var base_url = "<?php echo base_url();?>";
      var formData = new FormData(document.getElementById("myForm"));
        $.ajax({
        type: "POST",
        url: base_url+"user/admin_user/save_vendor_form",
        data: formData,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function(response) {
            $('#myForm :input').val('');
            document.getElementById('user_admin_id').value = response.vendor_id;
            $("#createpassword").modal("show");
        },
        error: function(xhr, status, error) {
          // Handle errors here
          console.error(xhr.responseText);
        }
      });
    
}
   
jQuery('#validatedForm').validate({
    rules: {
        password: {
            minlength: 5,
        },
        password_confirm: {
            minlength: 5,
            equalTo: "#password"
        }
    }
});
</script>
<?php $this->load->view('template/footer'); ?>
