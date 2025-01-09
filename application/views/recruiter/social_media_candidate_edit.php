    <div class="modal fade" id="edit_social_media" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="<?php echo base_url(); ?>recruitment/update_social_paltforms_candidate/<?php echo $social_media->social_platform_candidate_id?>" method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title deletouterr" id="exampleModalLabel">Edit Online Profiles 
                            <button type="button" class="btn frnewdeletbtnnnn" data-toggle="modal" onclick="delete_social_media_candidate(<?php echo $social_media->social_platform_candidate_id ?>)" name="delete_button" id="delete_button">Delete</button>
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                            <p>Add links to your social profiles (e.g. Linkedin profile, Facebook profile, etc.).</p>
                            <div class="form-group">
                                    <label for="" class="col-form-label">Social Profile <span class="requiredstar">*</span></label>
                                    <label for="" class="col-form-label">URL <span class="requiredstar">*</span></label>
                                    <select class="form-control" name="social_platform" id="social_platform">
                                            <option value="">Select Social Media Platform</option>
                                            <option <?php if($social_media->social_profile == "facebook" ){ echo "selected"; } ?> value="facebook">Facebook</option>
                                            <option <?php if($social_media->social_profile == "twitter"){ echo "selected"; } ?> value="twitter">Twitter</option>
                                            <option <?php if($social_media->social_profile == "linkedin"){ echo "selected"; } ?> value="linkedin">LinkedIn</option> 
                                            <option <?php if($social_media->social_profile == "instagram"){ echo "selected"; } ?> value="instagram">Instagram</option>
                                            <option <?php if($social_media->social_profile == "youtube"){ echo "selected"; } ?> value="youtube">YouTube</option>
                                            <option <?php if($social_media->social_profile == "pinterest"){ echo "selected"; } ?> value="pinterest">Pinterest</option>
                                            <option <?php if($social_media->social_profile == "whatsapp"){ echo "selected"; } ?> value="whatsapp">WhatsApp</option>
                                            <option <?php if($social_media->social_profile == "reddit"){ echo "selected"; } ?> value="reddit">Reddit</option>
                                            <option <?php if($social_media->social_profile == "git"){ echo "selected"; } ?> value="git">Git</option>
                                            <option <?php if($social_media->social_profile == "skype"){ echo "selected"; } ?> value="skype">Skype</option>
                                        </select>
                                </div>

                                <div class="form-group">
                                    
                                    <input value="<?php echo $social_media->social_platform_url; ?>" type="text" name="profile_url" class="form-control" id="" placeholder="Enter your social profile URL">
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="social_platform_description" class="form-control" placeholder="Type Here" id="exampleFormControlTextarea1" rows="3"><?php echo $social_media->social_profile_description;?> </textarea>
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
            
            
             
            
                    <div class="modal fade popupoverpopup" id="socailMediaDeletePopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                  <div class="modal-header"><h4 class="modal-title" id="myModalLabel">Are you sure you want to delete this Social Media Entry.</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                    
                        <div class="modal-body">
                            <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruitment/delete_social_media_candidate', $attributes);
              ?>   
                        <div class="center col-md-12 frdeleteancelee">
                            <input type="hidden" id="deleteID" name="deleteID" >
                           <div class="col-md-3">
                            <button type="button" class="btn btn-block btn-secondory" data-dismiss="modal">Cancel</button>
                            </div>
                            <div class="col-md-3">
                            <button type="submit" class="btn btn-block btn-primary">Delete</button>
                            </div>
                        </div>
                                   </form>
                        </div>
                        
                    </div>
                    
          
                </div>
             </div>          
<script>
function delete_social_media_candidate(social_platform_candidate_id)
{
   $("#deleteID").val(social_platform_candidate_id);
    $("#socailMediaDeletePopup").modal();   
}

 $( document ).ready(function() {   
    $("#add_social_paltforms").validate(
    {
      errorElement: "span", 
      rules: 
      {
        social_platform: 
        {
            required:true,               
        },
        profile_url: 
        {
            required:true,               
        },
        social_platform_description: 
        {
            required:true,               
        },
      },

      messages: 
      { 
        social_platform: 
        {
            required:"Required Social Profile.!!",
        },
        profile_url: 
        {
            required:"Required URL.!!",
        },
        social_platform_description: 
        {
            required:"Required Description.!!",
        },
        
      },
});    
});   
</script>            
            