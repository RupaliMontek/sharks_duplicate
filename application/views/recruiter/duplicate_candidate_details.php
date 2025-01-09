<div class="modal-dialog modal-lg" id="product_sub2category"> 
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
           <p class="popup-deadline">Candidate Details </p>
        </div>
        <div class="modal-body">  
               <table id="popup_table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Company/Client</th>
                        <th>Position/Skills</th>
                        <th>CandidateName</th>
                        <th>ContactNo</th>
                        <th>EmailID</th>
                        <th>ClientFeedback</th>
                        <th>InterviewScheduleDateTime</th>
                        <th>InterviewScheduleMode</th>
                        <th>FinalStatus</th>
                        <th>ClientRecruiter</th>
                        <th>SourcedBy</th>
                      </tr>
                </thead>
                <tbody>
                  <?php foreach($candidate_details as $row) { ?>
                      <tr>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['company_client']; ?></td>
                        <td><?php echo $row['position_skills']; ?></td>
                        <td><?php echo $row['candidate_name']; ?></td>
                        <td><?php echo $row['contact_no']; ?></td>
                        <td><?php echo $row['email_id']; ?></td>
                        <td><?php echo $row['client_feedback']; ?></td>
                        <td><?php echo $row['interview_schedule']; ?></td>
                        <td><?php echo $row['interview_schedule_mode']; ?></td>
                        <td><?php echo $row['final_status']; ?></td>
                        <td><?php echo $row['client_recruiter']; ?></td>
                        <td><?php echo $row['sourced_by']; ?></td>
                     </tr>  
                     <?php } ?>                    
                </tbody>
              </table>             
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
          <form method="post" name="addCandidateDuplicate" id="addCandidateDuplicate" action="<?php echo base_url('recruiter/recruiter/update_duplicate_candate_entry');?>">   
               <input type="hidden" name="duplicate_entry_user_id" value="<?php echo $this->session->userdata('user_id'); ?>">
               <input type="hidden" name="dailyreport_id" value="<?php echo $row['dailyreport_id']; ?>">
            <div class="row">
              <label class="col-md-6 pull-left">Duplicate Candidate Entry Reason</label>
            </div>            
  
            <div class="row">
              <div class="col-md-6">
               <input type="text" name="duplicate_candidate_entry_reason" id="duplicate_candidate_entry_reason" required class="form-control">               
             </div>                   
            </div><br>

            <div class="form-group">                        
                <input type="submit" class="btn btn-primary btn-sm pull-left" value="Update Reason" name="submit"/>
              </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div> 
    </div>

     <script type="text/javascript">
      $(function () {
        $('#popup_table').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
           "pageLength": 50,
          "ordering": true,
          "info": true,
          "scrollX": true,
          "autoWidth": true
        });
      });  
    </script> 