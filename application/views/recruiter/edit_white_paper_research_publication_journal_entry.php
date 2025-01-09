   <div class="modal fade" id="WhitePaper_journal_entry_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title deletouterr" id="exampleModalLabel">Edit White Paper / Research Publication / Journal Entry
                            <button class="btn frnewdeletbtnnnn" type="button"  data-toggle="modal" onclick="delete_white_paper_research_publication_journal_entry(<?php echo $result_white_paper_journal->white_paper_research_publication_id ?>)" >Delete</button>
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="add_white_paper_research_publication_journal_entry" method="post" action="<?php echo base_url(); ?>recruitment/update_white_paper_research_publication_journal_entry">
                            <p>Add links to your prosssjects (e.g. Github links, etc.).</p>
                            
                                <div class="form-group">
                                    <label for="" class="col-form-label">Title <span class="requiredstar">*</span></label>
                                    <input name="white_paper_title" type="text" class="form-control" id="white_paper_title" placeholder="Enter title" value="<?= $result_white_paper_journal->white_paper_research_publication_title ?>">
                                    <input name="white_paper_research_publication_id" type="hidden" class="form-control" id="white_paper_research_publication_id" value="<?php echo $white_paper_research_publication_id; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-form-label">URL <span class="requiredstar">*</span></label>
                                    <input name="white_paper_url" type="text" class="form-control" id="white_paper_url" placeholder="Enter URL" value="<?= $result_white_paper_journal->white_paper_research_publication_url ?>">
                                </div>

                                <div class="form-group forselectionnn">
                                    <?php $years = array_combine( range(date("Y"), 1947),range(date("Y"), 1947)); ?>
                                    <label class="" for="inlineFormCustomSelect">Published On</label>
                                    <select class="custom-select" name="white_paper_publish_year" id="white_paper_publish_year">
                                        <option value="">Year</option>
                                        <?php foreach ($years as $row) { ?>
                                        <option <?php if($result_white_paper_journal->white_paper_research_publication_publish_year==$row){echo "selected";} ?>   value="<?php echo $row; ?>"><?php echo $row; ?></option>
                                        <?php } ?>
                                        
                                    </select>

                                    <select name="white_paper_publish_month" class="custom-select" id="white_paper_publish_month">
                                        <option>Months</option>
                                        <option <?php if($result_white_paper_journal->white_paper_research_publication_publish_month=="1"){echo "selected";} ?>   value="1">Jan</option>
                                        <option <?php if($result_white_paper_journal->white_paper_research_publication_publish_month=="2"){echo "selected";} ?>   value="2">Feb</option>
                                        <option <?php if($result_white_paper_journal->white_paper_research_publication_publish_month=="3"){echo "selected";} ?>   value="3">Mar</option>
                                        <option <?php if($result_white_paper_journal->white_paper_research_publication_publish_month=="4"){echo "selected";} ?>   value="4">Apr</option>
                                        <option <?php if($result_white_paper_journal->white_paper_research_publication_publish_month=="5"){echo "selected";} ?>   value="5">May</option>
                                        <option <?php if($result_white_paper_journal->white_paper_research_publication_publish_month=="6"){echo "selected";} ?>   value="6">Jun</option>
                                        <option <?php if($result_white_paper_journal->white_paper_research_publication_publish_month=="7"){echo "selected";} ?>   value="7">Jul</option>
                                        <option <?php if($result_white_paper_journal->white_paper_research_publication_publish_month=="8"){echo "selected";} ?>   value="8">Aug</option>
                                        <option <?php if($result_white_paper_journal->white_paper_research_publication_publish_month=="9"){echo "selected";} ?>   value="9">Sep</option>
                                        <option <?php if($result_white_paper_journal->white_paper_research_publication_publish_month=="10"){echo "selected";} ?>  value="10">Oct</option>
                                        <option <?php if($result_white_paper_journal->white_paper_research_publication_publish_month=="11"){echo "selected";} ?>  value="11">Nov</option>
                                        <option <?php if($result_white_paper_journal->white_paper_research_publication_publish_month=="12"){echo "selected";} ?>  value="12">Dec</option>
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" placeholder="Type Here" name="white_paper_dec" id="white_paper_dec" rows="3"><?php echo $result_white_paper_journal->white_paper_research_publication_publish_dec; ?></textarea>
                                    <span>500 Character(s) Left</span>
                                </div>
                           
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update changes</button>
                        </div>
                         </form>
                    </div>
                </div>
            </div>
        </div>
        
          <div class="modal fade popupoverpopup" id="whitePaperReserchDeletePopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  
                    <div class="modal-content">
                        <div class="modal-header"><h4 class="modal-title" id="myModalLabel">Are you sure you want to delete this White Paper / Research Publication / Journal Entry.</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                        <div class="modal-body">
                            <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruitment/delete_white_paper_research_publication_journal_entry', $attributes);
              ?>   
                        <input type="hidden" id="deleteID" name="deleteID" >
                          
                           <div class="center col-md-12 frdeleteancelee">
                               <div class="left col-md-3">
                            <button type="button" class="btn btn-block btn-secondory" data-dismiss="modal">Cancel</button></div>
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
function delete_white_paper_research_publication_journal_entry(white_paper_research_publication_journal_id)
{
   $("#deleteID").val(white_paper_research_publication_journal_id);
    $("#whitePaperReserchDeletePopup").modal(); 
}
$( document ).ready(function() {
$("#add_white_paper_research_publication_journal_entry").validate(
    {
      errorElement: "span", 
      rules: 
      {
        white_paper_title: 
        {
            required:true,               
        },
        white_paper_url: 
        {
            required:true,               
        },
        white_paper_publish_year: 
        {
            required:true,               
        },
        white_paper_publish_month: 
        {
            required:true,               
        },
        white_paper_dec: 
        {
            required:true,               
        },
      },

      messages: 
      { 
        white_paper_title: 
        {
            required:"Required Title.!!",
        },
        white_paper_url: 
        {
            required:"Required URL.!!",
        },
        white_paper_publish_year: 
        {
            required:"Required Published On Year.!!",
        },
        white_paper_publish_month: 
        {
            required:"Required Published On Month.!!",
        },
        white_paper_dec: 
        {
            required:"Required Description.!!",
        },
        
      },
    });
});    
</script>