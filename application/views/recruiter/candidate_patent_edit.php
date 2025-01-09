      <div class="modal fade" id="Patent_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title deletouterr" id="exampleModalLabel">Edit Patent
                            <button class="btn frnewdeletbtnnnn" type="button" data-toggle="modal" onclick="delete_candidate_patent_confirm(<?php echo $patent->patent_id ?>)" >Delete</button>
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                            <form>
                                <p>Add details of patents you have filed.</p>
                                <div class="form-group"> <label for="" class="col-form-label">Patent Title <span class="requiredstar">*</span></label>
                                    <input type="text" name="patent_title" value="<?php echo $patent->patent_title; ?>" class="form-control" id="patent_title" placeholder="Enter Patent Title">
                                </div>

                                <div class="form-group"> <label for="" class="col-form-label">URL <span class="requiredstar">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $patent->patent_url; ?>" name="patent_url" id="patent_url" placeholder="Enter URL">
                                </div>

                                <div class="form-group"> <label for="" class="col-form-label">Patent Office</label>
                                    <input type="text" class="form-control" value="<?php echo $patent->patent_office; ?>" id="patent_office" placeholder="Enter Patent Office">
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <div class="form-check form-check-inline form-group">
                                        <input <?php if ($patent->patent_status == 1){ ?> checked="checked"<?php }?> class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Patent Issued</label>
                                    </div>
                                    <div class="form-check form-check-inline form-group">
                                        <input  <?php if ($patent->patent_status == 0){ ?> checked="checked"<?php }?> class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="0">
                                        <label class="form-check-label" for="inlineRadio2">Patent Pending</label>
                                    </div>
                                </div>

                                <div class="form-group"> <label for="" class="col-form-label"> Application Number </label>
                                    <input type="text" class="form-control" value="<?php echo $patent->application_no; ?>" name="patent_application_no" id="patent_application_no" placeholder="Enter Application Number">
                                </div>
                            <?php if($patent->patent_status == 1) { ?>    
                                <div class="form-group forselectionnn">
                                    <?php $years = array_combine(
                                     range(date("Y"), 1947),
                                     range(date("Y"), 1947)
                                 ); ?>
                                    <label class="" for="inlineFormCustomSelect">Issued Date <span class="requiredstar">*</span></label>
                                    <select class="custom-select" id="inlineFormCustomSelect">
                                         <option selected="">Years</option>
                                        <?php foreach ($years as $row) { ?>
                                        <option <?php if (
                                            @$patent->patent_issue_date_year == $row
                                            ) {echo "selected"; } ?> value="<?php echo $row; ?>"><?php echo $row; ?></option>
                                        <?php } ?>
                                    </select>

                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option selected="">Months</option>
                                        <option <?php if (
                                            @$patent->patent_issue_month == 1
                                            ) {echo "selected"; } ?> value="1">Jan</option>
                                        <option <?php if (
                                            @$patent->patent_issue_month == 2
                                            ) {echo "selected"; } ?> value="2">Feb</option>
                                        <option <?php if (
                                            @$patent->patent_issue_month == 3
                                            ) {echo "selected"; } ?> value="3">Mar</option>
                                        <option <?php if (
                                            @$patent->patent_issue_month == 4
                                            ) {echo "selected"; } ?> value="4">Apr</option>
                                        <option <?php if (
                                            @$patent->patent_issue_month == 5
                                            ) {echo "selected"; } ?> value="5">May</option>
                                        <option <?php if (
                                            @$patent->patent_issue_month == 6
                                            ) {echo "selected"; } ?> value="6">Jun</option>
                                        <option <?php if (
                                            @$patent->patent_issue_month == 7
                                            ) {echo "selected"; } ?> value="7">Jul</option>
                                        <option <?php if (
                                            @$patent->patent_issue_month == 8
                                            ) {echo "selected"; } ?> value="8">Aug</option>
                                        <option <?php if (
                                            @$patent->patent_issue_month == 9
                                            ) {echo "selected"; } ?> value="9">Sep</option>
                                        <option <?php if (
                                            @$patent->patent_issue_month == 10
                                            ) {echo "selected"; } ?> value="10">Oct</option>
                                        <option <?php if (
                                            @$patent->patent_issue_month == 11
                                            ) {echo "selected"; } ?> value="11">Nov</option>
                                        <option <?php if (
                                            @$patent->patent_issue_month == 12
                                            ) {echo "selected"; } ?> value="12">Dec</option>
                                    </select>

                                </div>
                               <?php } ?>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Description</label>
                                    <textarea class="form-control" id="" rows="3" placeholder="Type here"><?php echo $patent->patent_description; ?></textarea>
                                </div>

                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>


             
              <div class="modal fade popupoverpopup" id="ITskillsDeletePopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  
                    <div class="modal-content">
                        <div class="modal-header"><h4 class="modal-title" id="myModalLabel">Are you sure you want to delete this Patent.</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                        <div class="modal-body">
                            <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruitment/delete_candidate_patent', $attributes);
              ?>   
                        <input type="hidden" id="deleteID" name="deleteID" >
                           
                           <div class="center col-md-12 frdeleteancelee">
                               <div class="col-md-3">
                            <button type="button" class="btn btn-blcok btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                            <div class="col-md-3">
                            <button type="submit"  class="btn btn-blcok btn-primary">Delete</button></div>
                        </div>
                                   </form>
                        </div>
                        
                    </div>
                    
          
                </div>
             </div>

<script>

function delete_candidate_patent_confirm(cerificate_id)
{
    $("#deleteID").val(cerificate_id);
    $("#ITskillsDeletePopup").modal();
}
    
 $( document ).ready(function() { 
     $("#add_patent").validate(
    {
      errorElement: "span", 
      rules: 
      {
        patent_title: 
        {
            required:true,               
        },
        patent_url: 
        {
            required:true,               
        },   
        patent_office: 
        {
            required:true,               
        }, 
        patent_status: 
        {
            required:true,               
        }, 
        patent_application_no: 
        {
            required:true,               
        }, 
        patent_issue_year: 
        {
            required:true,               
        },
        patent_issue_month: 
        {
            required:true,               
        },
        patent_description: 
        {
            required:true,               
        },
      },
      

      messages: 
      { 
        patent_title: 
        {
            required:"Required Patent Title..!!",
        },
        patent_url: 
        {
            required:"Required URL..!!",
        },
        patent_office: 
        {
            required:"Required Patent Office..!!",
        },
        patent_status: 
        {
            required:"Required Status..!!",
        },
        patent_application_no: 
        {
            required:"Required Application Number..!!",
        },
        patent_issue_year: 
        {
            required:"Required Issued Year..!!",
        },
        patent_issue_month: 
        {
            required:"Required Issued Month..!!",
        },
        patent_description: 
        {
            required:"Required Description..!!",
        },
      },
    });
 });
</script>