<div class="modal fade" id="Profile_Summery_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Profile Summary</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form id="Profile_Summery" method="POST" action="<?php echo base_url(); ?>recruitment/update_candidate_profile_summary/<?php echo $profile_summary->profile_summary_id ?>   ">
            <div class="modal-body">
               <p>Your Profile Summary should mention the highlights of your career and education, what your professional interests are, and what kind of a career you are looking for. Write a meaningful summary of more than 50 characters.</p>
               <div class="form-group">
                  <textarea id="candidate_profile_summary" name="candidate_profile_summary" class="form-control" placeholder="Type Here"  onkeyup="textCounter(this,'candidate_profile_summary',10);"  rows="3"><?php echo $profile_summary->profile_summary ?></textarea>
                  <span>200 Character(s) Left</span>
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

<script>
$( document ).ready(function() {
$("#Profile_Summery").validate(
    {
      errorElement: "span", 
      rules: 
      {
        candidate_profile_summary: 
        {
            required:true,               
        },
      },
      

      messages: 
      { 
        candidate_profile_summary: 
        {
            required:"Required Candidate Profile Summary..!!",
        },
      },
    });
    
});
</script>
