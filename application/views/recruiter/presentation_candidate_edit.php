       <div class="modal fade" id="edit_presentation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                     <form id="add_presentations" method="post" action="<?php echo base_url();?>recruitment/update_candidate_presentations/<?php echo $career_profile->presentation_id ?>"> 
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit     Presentation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div  class="fordeleteButtonn"><a class="btn btn-primary"   type="button" class="" data-toggle="modal" onclick="delete_candidate_presentation_confirm(<?php echo $career_profile->presentation_id ?>)" >Delete</a></div> 
                        <div class="modal-body">
                            <p>Add links to your online presentations (e.g. Slideshare presentation links etc.).</p>                           
                                <div class="form-group">
                                    <label for="" class="col-form-label">Presentation Title <span class="requiredstar">*</span></label>
                                    <input value="<?php echo $career_profile->presentation_title; ?>" type="text" name="presentation_title" class="form-control" id="presentation_title" placeholder="Type your presentation name">
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-form-label">URL <span class="requiredstar">*</span></label>
                                    <input value="<?php echo $career_profile->url; ?>" name="presentation_url" type="text" class="form-control" id="presentation_url" placeholder="Enter URL">
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="presentation_description" class="form-control" placeholder="Type Here" id="presentation_description" rows="3"><?php echo $career_profile->description; ?></textarea>
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
            
            
            
             
              <div class="modal fade deletePopupppp" id="ITskillsDeletePopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  
                    <div class="modal-content">
                        <div class="modal-body">
                            <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruitment/delete_candidate_presentation_details', $attributes);
              ?>   
                        <input type="hidden" id="deleteID" name="deleteID" >
                           Are you sure you want to delete this Presentation.
                           <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit"   class="btn btn-primary">Delete</button>
                        </div>
                                   </form>
                        </div>
                        
                    </div>
                    
          
                </div>
             </div>
            
<script>


function delete_candidate_presentation_confirm(cerificate_id)
{
    $("#deleteID").val(cerificate_id);
    $("#ITskillsDeletePopup").modal();
}

$( document ).ready(function() {
    $("#add_presentation").validate(
    {
      errorElement: "span", 
      rules: 
      {
        presentation_title: 
        {
            required:true,               
        },
        presentation_url: 
        {
            required:true,               
        },
        presentation_description: 
        {
            required:true,               
        },
      },

      messages: 
      { 
        presentation_title: 
        {
            required:"Required Presentation Title.!!",
        },
        presentation_url: 
        {
            required:"Required URL.!!",
        },
        presentation_description: 
        {
            required:"Required URL.!!",
        },
      },
    });
});
</script>            
            