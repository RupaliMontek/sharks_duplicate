
 <div class="modal fade" id="candidate_edit_key_skills" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="add_candidate_skills" method="POST" action="<?php echo base_url(); ?>recruitment/update_candidate_key_skills" >
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Key skills</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Tell recruiters what you know or what you are known for e.g. Direct Marketing, Oracle, Java etc. We will send you job recommendations based on these skills. Each skill is separated by a comma.</p>
                            
                            <!--<textarea type="hidden" class="form-control" name="candidate_skills" id="candidate_skills"><?php echo @$canidate_skill->skills; ?></textarea>-->
                            </br>
                            <input type="hidden" name="candidate_id" id="candidate_id" class="form-control" value="<?= $candidate_id ?>">
                                <div id="skills-container">
                                   <?php 
                       $counter = 0; // Initialize a counter
                       if (!empty($canidate_skill)) {
                          foreach ($canidate_skill as $row) {
                                $counter++;
                        ?>
                            <div class="skill-input col-md-8" id="skill-input-<?php echo $counter; ?>">
                                <input class="form-control" type="text" name="skill[]" placeholder="Enter skill" value="<?php echo $row->skills; ?>" required></br>
                                <input class="form-control" type="date" name="from_date[]" placeholder="Select From Date" value="<?php echo $row->from_date; ?>" required></br>
                                <input class="form-control" type="date" name="to_date[]" placeholder="Select To Date" value="<?php echo $row->to_date; ?>" required>
                                <span><i class="fa fa-times icon-remove remove-btnsss" data-id="<?php echo $counter; ?>" style="color: red"></i></span>
                            </div>
                        <?php 
                            }
                        }
                        ?>
                                </div>   
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                             <button type="button" class="btn btn-success" id="add-skill">Add More Skills</button>
                            <button type="submit" class="btn btn-primary">Update changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
<script>
$(document).ready(function() 
{    
$("#add_candidate_skills").validate(
 {
      errorElement: "span", 
      rules: 
      {
        candidate_skills: 
        {
            required:true,               
        },
      },
      

      messages: 
      { 
        candidate_skills: 
        {
            required:"Required Candidate Skills..!!",
        },
      },
 });
});
</script>        

<script>
document.getElementById('add-skill').addEventListener('click', function() {
    // Create a new skill input field
    var container = document.getElementById('skills-container');
    var newDiv = document.createElement('div');
    var currentCount = container.getElementsByClassName('skill-input').length;
    var newId = currentCount + 1; // New ID for the new skill entry
    
    newDiv.classList.add('skill-input', 'col-md-8');
    newDiv.id = 'skill-input-' + newId;
    newDiv.innerHTML = `
        <input class="form-control" type="text" name="skill[]" placeholder="Enter skill"></br>
        <input type="date" class="form-control mb-2 date-range-picker" name="from_date[]" placeholder="Select From Date" required>
        <input type="date" class="form-control mb-2 date-range-picker" name="to_date[]" placeholder="Select To Date" required>
        <span><i style="color: red" class="fa fa-times icon-remove remove-btnsss" data-id="${newId}"></i></span>`;
    
    container.appendChild(newDiv);
});

document.getElementById('skills-container').addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-btnsss')) {
        // Remove the skill input field based on its unique ID
        var skillId = e.target.getAttribute('data-id');
        var elementToRemove = document.getElementById('skill-input-' + skillId);
        if (elementToRemove) {
            elementToRemove.remove();
        }
    }
});
</script>