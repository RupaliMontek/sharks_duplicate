            <div class="modal fade" id="wok_samples_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                     <form id="add_work_samples" method="POST" action="<?php echo base_url(); ?>recruitment/update_candidate_work_samples/<?php echo $work_details_candidate->work_id ?>">
                        <div class="modal-header">
                            <h4 class="modal-title modal-title deletouterr" id="exampleModalLabel">Edit Work Samples
                            <button class="btn frnewdeletbtnnnn" type="button" class="" data-toggle="modal" onclick="delete_confirm_work_samples_entry(<?php echo $work_details_candidate->work_id ?>)" >Delete</button>
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                         
                        <div class="modal-body">
                            <p>Add links to your projects (e.g. Github links, etc.).</p>
                            
                                <div class="form-group">
                                    <label for="" class="col-form-label">Work Title <span class="requiredstar">*</span></label>
                                    <input type="text" value="<?php echo $work_details_candidate->work_title ?>" name="work_title" class="form-control" id="" placeholder="Type your work title">
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-form-label">URL <span class="requiredstar">*</span></label>
                                    <input type="text" name="work_url"  value="<?php echo $work_details_candidate->work_url ?>" class="form-control" id="" placeholder="Enter your social profile URL">
                                </div>

                                <div class="form-check">
                                    <input  <?php if ($work_details_candidate->currently_working == "yes") { echo "checked='checked'"; } ?> type="checkbox" value="yes"   name="currently_working" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">I am currently working on this</label>
                                </div>

                                <div class="form-group forselectionnn">

                                    <label class="" for="inlineFormCustomSelect">Duration from <span class="requiredstar">*</span></label>
                                    <select name="start_duration_year" class="custom-select" id="inlineFormCustomSelect">
                                        <option value="">Year</option>
                                        <?php for ($startYear = 1997; $startYear <= 3000; $startYear++) { ?>
                                    <option <?php if (
                                            @$work_details_candidate->start_duration_year == $startYear
                                            ) {
                 echo "selected";
             } ?> value="<?php echo $startYear; ?>"> <?php echo $startYear; ?></option>
                                                    <?php } ?>
                                                                            </select>

                                    <select name="start_duration_month" class="custom-select" id="inlineFormCustomSelect">
                                        <option>Months</option>
                                        <option <?php if (
                                            @$work_details_candidate->start_duration_month == 1
                                            ) {echo "selected"; } ?> value="1">Jan</option>
                                        <option <?php if (
                                            @$work_details_candidate->start_duration_month == 2
                                            ) {echo "selected"; } ?> value="2">Feb</option>
                                        <option <?php if (
                                            @$work_details_candidate->start_duration_month == 3 
                                            ) {echo "selected"; } ?> value="3">Mar</option>
                                        <option <?php if (
                                            @$work_details_candidate->start_duration_month == 4
                                            ) {echo "selected"; } ?> value="4">Apr</option>
                                        <option <?php if (
                                            @$work_details_candidate->start_duration_month == 5
                                            ) {echo "selected"; } ?> value="5">May</option>
                                        <option <?php if (
                                            @$work_details_candidate->start_duration_month == 6
                                            ) {echo "selected"; } ?> value="6">Jun</option>
                                        <option <?php if (
                                            @$work_details_candidate->start_duration_month == 7
                                            ) {echo "selected"; } ?> value="7">Jul</option>
                                        <option <?php if (
                                            @$work_details_candidate->start_duration_month == 8
                                            ) {echo "selected"; } ?> value="8">Aug</option>
                                        <option <?php if (
                                            @$work_details_candidate->start_duration_month == 9
                                            ) {echo "selected"; } ?> value="9">Sep</option>
                                        <option <?php if (
                                            @$work_details_candidate->start_duration_month == 10
                                            ) {echo "selected"; } ?> value="10">Oct</option>
                                        <option <?php if (
                                            @$work_details_candidate->start_duration_month == 11
                                            ) {echo "selected"; } ?> value="11">Nov</option>
                                        <option <?php if (
                                            @$work_details_candidate->start_duration_month == 12
                                            ) {echo "selected"; } ?> value="12">Dec</option>
                                    </select>

                                </div>

                                <div class="form-group forselectionnn">

                                    <label class="" for="inlineFormCustomSelect">Duration To <span class="requiredstar">*</span></label>
                                    <select name="end_duration_year" class="custom-select" id="inlineFormCustomSelect">
                                        <option value="">Year</option>
                                    <?php for ($startYear = 1997; $startYear <= 3000; $startYear++) { ?>
                                                    <option <?php if (
                 @$work_details_candidate->end_duration_year == $startYear
             ) {
                 echo "selected";
             } ?> value="<?php echo $startYear; ?>"> <?php echo $startYear; ?></option>
                                                    <?php } ?>    
                                    </select>

                                    <select name="end_duration_month" class="custom-select" id="inlineFormCustomSelect">
                                        <option>Months</option>
                                        <option <?php if (
                                            @$work_details_candidate->end_duration_month == 1
                                            ) {echo "selected"; } ?> value="1">Jan</option>
                                        <option <?php if (
                                            @$work_details_candidate->end_duration_month == 2
                                            ) {echo "selected"; } ?> value="2">Feb</option>
                                        <option <?php if (
                                            @$work_details_candidate->end_duration_month == 3 
                                            ) {echo "selected"; } ?> value="3">Mar</option>
                                        <option <?php if (
                                            @$work_details_candidate->end_duration_month == 4
                                            ) {echo "selected"; } ?> value="4">Apr</option>
                                        <option <?php if (
                                            @$work_details_candidate->end_duration_month == 5
                                            ) {echo "selected"; } ?> value="5">May</option>
                                        <option <?php if (
                                            @$work_details_candidate->end_duration_month == 6
                                            ) {echo "selected"; } ?> value="6">Jun</option>
                                        <option <?php if (
                                            @$work_details_candidate->end_duration_month == 7
                                            ) {echo "selected"; } ?> value="7">Jul</option>
                                        <option <?php if (
                                            @$work_details_candidate->end_duration_month == 8
                                            ) {echo "selected"; } ?> value="8">Aug</option>
                                        <option <?php if (
                                            @$work_details_candidate->end_duration_month == 9
                                            ) {echo "selected"; } ?> value="9">Sep</option>
                                        <option <?php if (
                                            @$work_details_candidate->end_duration_month == 10
                                            ) {echo "selected"; } ?> value="10">Oct</option>
                                        <option <?php if (
                                            @$work_details_candidate->end_duration_month == 11
                                            ) {echo "selected"; } ?> value="11">Nov</option>
                                        <option <?php if (
                                            @$work_details_candidate->end_duration_month == 12
                                            ) {echo "selected"; } ?> value="12">Dec</option>
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea  name="descriptios_work_sample" class="form-control" placeholder="Type Here" id="exampleFormControlTextarea1" rows="3"><?php echo $work_details_candidate->descriptios_work_sample ?></textarea>
                                    <span>500 Character(s) Left</span>
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
            
            
            
                    <div class="modal fade popupoverpopup" id="worksampleDeletePopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  
                    <div class="modal-content">
                        <div class="modal-header"><h4 class="modal-title" id="myModalLabel">Are you sure you want to delete this Work Samples Entry.</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                        
                        <div class="modal-body">
                            <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruitment/delete_confirm_work_samples_entry', $attributes);
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
 function delete_confirm_work_samples_entry(work_id)
 {
    $("#deleteID").val(work_id);
    $("#worksampleDeletePopup").modal();  
 }

$( document ).ready(function() {
$("#add_work_samples").validate(
    {
      errorElement: "span", 
      rules: 
      {
        work_title: 
        {
            required:true,               
        },
        work_url: 
        {
            required:true,               
        },
        currently_working: 
        {
            required:true,               
        },
        start_duration_year: 
        {
            required:true,               
        },
        start_duration_month: 
        {
            required:true,               
        },
        end_duration_year: 
        {
           required:true,               
        },
        end_duration_month: 
        {
           required:true,               
        },
        descriptios_work_sample: 
        {
           required:true,               
        },
      },

      messages: 
      { 
        work_title: 
        {
            required:"Required Title.!!",
        },
        work_url: 
        {
            required:"Required URL.!!",
        },
        currently_working: 
        {
            required:"Required Currently Working.!!",
        },
        start_duration_year: 
        {
            required:"Required Duration from Year.!!",
        },
        start_duration_month: 
        {
            required:"Required Duration from Month.!!",
        },
        end_duration_year: 
        {
            required:"Required Duration End Year.!!",
        },
        end_duration_month: 
        {
            required:"Required Duration End Month.!!",
        },
        descriptios_work_sample: 
        {
            required:"Required Description.!!",
        },
        
      },
    }); 
});
</script>