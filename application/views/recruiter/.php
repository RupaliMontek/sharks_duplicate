   <div class="modal fade" id="WhitePaper_journal_entry_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit White Paper / Research Publication / Journal Entry</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="add_white_paper_research_publication_journal_entry" method="post" action="<?php echo base_url(); ?>recruitment/update_white_paper_research_publication_journal_entry">
                            <p>Add links to your prosssjects (e.g. Github links, etc.).</p>
                            
                                <div class="form-group">
                                    <label for="" class="col-form-label">Title <span class="requiredstar">*</span></label>
                                    <input name="white_paper_title" type="text" class="form-control" id="white_paper_title" placeholder="Enter title">
                                    <input name="white_paper_research_publication_id" type="text" class="form-control" id="white_paper_research_publication_id" value="<?php echo $white_paper_research_publication_id; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-form-label">URL <span class="requiredstar">*</span></label>
                                    <input name="white_paper_url" type="text" class="form-control" id="white_paper_url" placeholder="Enter URL">
                                </div>

                                <div class="form-group forselectionnn">
                                    <?php $years = array_combine( range(date("Y"), 1947),range(date("Y"), 1947)); ?>
                                    <label class="" for="inlineFormCustomSelect">Published On</label>
                                    <select class="custom-select" name="white_paper_publish_year" id="white_paper_publish_year">
                                        <option value="">Year</option>
                                        <?php foreach ($years as $row) { ?>
                                        <option value="<?php echo $row; ?>"><?php echo $row; ?></option>
                                        <?php } ?>
                                        
                                    </select>

                                    <select name="white_paper_publish_month" class="custom-select" id="white_paper_publish_month">
                                        <option>Months</option>
                                        <option value="1">Jan</option>
                                        <option value="2">Feb</option>
                                        <option value="3">Mar</option>
                                        <option value="4">Apr</option>
                                        <option value="5">May</option>
                                        <option value="6">Jun</option>
                                        <option value="7">Jul</option>
                                        <option value="8">Aug</option>
                                        <option value="9">Sep</option>
                                        <option value="10">Oct</option>
                                        <option value="11">Nov</option>
                                        <option value="12">Dec</option>
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" placeholder="Type Here" name="white_paper_dec" id="white_paper_dec" rows="3"></textarea>
                                    <span>500 Character(s) Left</span>
                                </div>
                           
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                         </form>
                    </div>
                </div>
            </div>
        </div>
        
<script>
$( document ).ready(function() 
{
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