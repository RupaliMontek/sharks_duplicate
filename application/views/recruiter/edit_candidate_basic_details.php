<style>
        .error-message {
            color: red;
        }
    </style>
  <div class="modal fade" id="edit_candidate_basic_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="edit_candidate_basics_details" method="POST" action="<?php echo base_url(); ?>recruitment/save_candidate_basic_details">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Basic details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                <div class="form-group"> <label for="" class="col-form-label">Name <span class="requiredstar">*</span></label>
                                    <input id="candidate_name" name="candidate_name" type="text" class="form-control" id="" placeholder="Enter Your Name" pattern="[A-Za-z]+" title="Please enter only alphabetic characters" value="<?php echo @$user_details[0]->name; ?>" >
                                    <div class="error-message" id="nameError"></div>
                                </div>

                                <div class="form-group"> <label for="" class="col-form-label">
                                    
                                    <p>To edit go to Employment section.</p>
                                    <p>Please remove your current employment if you want to mark yourself as fresher</p>
                                </div>Experienced

                                <div class="form-group"> <label for="" class="col-form-label"></label>
                                <div class="row">       
                                <div class="col-md-6"> 
                                <input type="radio" <?php if(@$user_details[0]->candidate_work_status=="Experienced"){ echo "checked"; } ?>  class="with-gap" name="candidate_work_status" id="candidate_work_status" value="Experienced"><label class="radio-lbl" for="fresher-radio">Experienced</label>
                                </div>
                                
                                <div class="col-md-6"> 
                                <input type="radio"<?php if(@$user_details[0]->candidate_work_status=="Fresher"){ echo "checked"; } ?> class="with-gap" name="candidate_work_status" id="candidate_work_status" value="Fresher"><label class="radio-lbl" for="fresher-radio">Fresher</label>
                                </div>
                                </div>    
                                </div>

                        <div class="form-group">
                             <label for="" class="col-form-label">Total experience</label>
                           <div class="row">      
                          
                            <div class="col-md-6">       
                                <select class="custom-select" id="exp_year" name="exp_year">       
                            <option value="">Select Year</option>
                            <?php for (
                                $startYear = 1;
                                $startYear <= 30;
                                $startYear++
                            ) { ?>
                            <option <?php if(!empty(@$user_details[0]->exp_year)){ if(@$user_details[0]->exp_year==$startYear){ echo "selected"; } } elseif(@$totalYears==$startYear){ echo "selected";   } ?>  value="<?php echo $startYear; ?>"><?php echo $startYear ." " ."Years"; ?></option>
                            <?php } ?>
                          </select>
                </div> 
                
                <div class="col-md-6">         
                <select class="custom-select" id="exp_month" name="exp_month">
                                                    <option  value="">Select Month</option>
                                                    <?php for (
                                $startYear = 0;
                                $startYear <= 11;
                                $startYear++
                            ) { ?>
                            <option  <?php if(!empty($user_details[0]->exp_month)){ if($user_details[0]->exp_month==$startYear){ echo "selected"; } } elseif(@$remainingMonths==$startYear){ echo "selected";   } ?>  value="<?php echo $startYear; ?>"><?php echo $startYear ." " ."Month"; ?></option>
                            <?php } ?>
                </select>
                </div>
                               
                            </div>
                                <div class="form-group forcertification">

                                    <label class="" for="inlineFormCustomSelect">Total annual salary<span class="requiredstar">*</span></label>
                                    <div class="forcertificationInn">
                                        <input type="text" class="form-control" name="total_annual_salary" id="total_annual_salary" value="<?php echo @$user_details[0]->emp_current_salary ?>" >
                                    </div>

                                </div>
                               <!-- <div class="form-group">
                                    <label class="" for="inlineFormCustomSelect">Current location<span class="requiredstar">*</span></label>
                                    <div class="">
                                        <input type="radio" <?php  echo "checked";   ?>  name="location" id="location" ><label>India</label>
                                        <input type="radio"  name="location" id="location" ><label>Outside India</label>
                                    </div>
                                </div>
                                -->
                               
                                
                                <div class="form-group ">
                                    <label class="" for="inlineFormCustomSelect">Mobile number<span class="requiredstar">*</span></label>
                                    <div class="forcertificationInn">
                                        <input type="text" class="form-control" name="mobile_no" id="mobile_no" value="<?php echo $user_details[0]->contact;?>">
                                    </div>
                                </div>
                                
                                <!--<div class="form-group">
                                    <label class="" for="inlineFormCustomSelect">Telephone number</label>
                                    <div class="row">
                                     <div class="col-md-4">
                                      <input type="text" class="form-control" name="country_code" name="country_code" placeholder="Country Code">   
                                     </div> 
                                      <div class="col-md-4">
                                      <input type="text" class="form-control" name="area_code" name="area_code" placeholder="Area Code">   
                                     </div> 
                                      <div class="col-md-4">
                                      <input type="text" class="form-control" name="phone_number" name="phone_number" placeholder="Phone Number">   
                                     </div> 
                                    </div>
                                </div>
                               -->
                                 <?php if(!empty($current_employment_details))
                                 { ?>
                                <div class="form-group">
                                   <label class="" for="inlineFormCustomSelect">Notice period<span class="requiredstar">*</span></label>
                                   <input type="hidden" name="current_employment_id" id="current_employment_id"  value="<?php echo $current_employment_details->id;?>">
                                   <select class="custom-select" id="emp_notice_period" name="emp_notice_period">
                                                    <option <?php if($current_employment_details->emp_notice_period=="15 Days or less"){ echo "selected";    }  ?> value="15 Days or less">15 Days or less</option>
                                                    <option <?php if($current_employment_details->emp_notice_period=="1 months"){ echo "selected";    }  ?> value="1 months">1 months</option>
                                                    <option <?php if($current_employment_details->emp_notice_period=="2 months"){ echo "selected";    }  ?> value="2 months">2 months</option>
                                                    <option <?php if($current_employment_details->emp_notice_period=="3 months"){ echo "selected";    }  ?> value="3 months">3 months</option>
                                                    <option <?php if($current_employment_details->emp_notice_period=="More than 3 Months"){ echo "selected";    }  ?> value="More than 3 Months">More than 3 Months</option>
                                    </select>
                                    
                                </div>
                                <?php  }?>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                    </div>
                </div>
                </div>
<script>
$(document).ready(function () {
    // Add custom validation method for alphabetic characters
    $.validator.addMethod("alphabetic", function (value, element) {
        return /^[A-Za-z\s]+$/.test(value);
    }, "Please enter only alphabetic characters.");

    // Validate the form
    $("#edit_candidate_basics_details").validate({
        errorElement: "span",
        rules: {
            candidate_name: {
                required: true,
                alphabetic: true 
            },
            candidate_work_status: {
                required: true,
            },
            total_annual_salary: {
                required: true,
                number: true 
            },
            mobile_no: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 12, 
            },
            exp_year: {
                required: true,
            },
            exp_month: {
                required: true,
            },
        },
        messages: {
            candidate_name: {
                required: "Required Candidate Name.!!",
            },
            candidate_work_status: {
                required: "Required Work Status.!!",
            },
            total_annual_salary: {
                required: "Required Total Annual Salary.!!",
                number: "Please enter a number only."
            },
            mobile_no: {
                required: "Required Mobile Number.!!",
                digits: "Please enter only digits.",
                maxlength: "Mobile Number must be 10-12 digits long."
            },
            exp_year: {
                required: "Required Year Of Experienced.!!",
            },
            exp_month: {
                required: "Required Month Of Experienced.!!",
            },
        },
    });
});
</script>