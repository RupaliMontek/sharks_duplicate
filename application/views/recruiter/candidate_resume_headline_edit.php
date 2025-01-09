      <div class="modal fade" id="edits_resume_headline" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form id="resume_headline_candidate" method="post" action="<?php echo base_url(); ?>recruitment/update_resume_headline_details/<?php echo $resume_headline->resume_headline_id; ?>">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Resume Headline</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                
                                <p>It is the first thing recruiters notice in your profile. Write concisely what makes you unique and right person for the job you are looking for.</p>                                
                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="Having experience 4+ years in html, css, wordpress" name="resume_headline" id="resume_headline" rows="3"><?php echo $resume_headline->resume_headline; ?></textarea>
                                        <span>200 Character(s) Left</span>
                                    </div>
                           
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                               <!--  <button type="submit" class="btn btn-primary">Save changes</button> -->
                               <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
<script>
$( document ).ready(function() {
$("#resume_headline_candidate").validate(
    {
      errorElement: "span", 
      rules: 
      {
        resume_headline: 
        {
            required:true,               
        },
      },
      

      messages: 
      { 
        resume_headline: 
        {
            required:"Required Candidate Resume Headline..!!",
        },
      },
    });
    
});
</script>