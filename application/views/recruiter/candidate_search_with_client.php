<style type="text/css">
.colplatlet-p input{
  height: 40px;
  width: 112px;
}
.ppformcssp-p .form-horizontal label.control-label{
  text-align: left;
  margin-bottom: 10px;
}
.error{
  color: red;
}
table.ppheighttab-p{
  height:160px;
  overflow-y: scroll;
}

.dropdown-menu {
  max-height: 500px;
  overflow-y: auto;
  overflow-x: hidden;
}
.mar_top_0 .btn-success{
  margin-top: 0;
}
.padd_top{
  padding-top: 36px;
}

</style>
<script type="text/javascript">

  function deleteConfirm(id)
  {
    $("#deleteID").val(id);
    $("#confirmDelete-popup").modal();
  }

  function closeError2()
  { 
    $("#errorMessage2").hide(); 
  }

  function closeSuccess2()
  { 
    $("#successMessage2").hide(); 
  } 


    function update_sourced_by(dailyreport_id,sourced_by)
    {
      $("#dailyreport_id_sourced_by").val(dailyreport_id);
      $("#sourced_by").val(sourced_by);
      $("#update_sourced_by_popup").modal();
    } 

</script>

<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <?php $global_user_id =  $this->session->userdata('user_id'); ?>
        <div class="box">
          <div class="box box-solid box-info">
            <div class="row ppformcssp-p">     
              <form class="form-horizontal" name="search_details" id="search_details" action="<?php echo base_url();?>search/search_details" method="POST">
                <div class="col-md-4">
                  <div class="box-body">
                    <label class="control-label col-md-12">Search by Name / Email / Mobile Number</label> 
                    <div class="col-md-8">   
                      <input type="text" name="clientwise_candidate" id="clientwise_candidate" class="form-control" value="<?php if(!empty(@$clientwise_candidate_search)) { echo @$clientwise_candidate_search; } ?>">
                    </div>
                    <div class="col-md-4 mar_top_0">
                      <input type="submit" class="btn btn-success" value="Search" name="Search" /> 
                    </div>
                  </div>
                </div>
              </form>
            </div>

            <div class="box-body">


              <?php if($this->session->flashdata('success') != '') { ?>
                <div class="alert alert-success" id="successMessage2"><i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('success'); ?>
                <button type="button" class="close" id="btn-alert-success" onclick="closeSuccess2()" >&times;</button>
              </div>
            <?php } ?>

            <?php if($this->session->flashdata('error') != '') {?>
              <div class="alert alert-danger" id="errorMessage2"><i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('error'); ?>
              <button type="button" class="close" id="btn-alert-success" onclick="closeError2()" >&times;</button>
            </div>
          <?php } ?>

          <?php $attributes = array('role' => 'form', 'id' => 'addAcademicYear');
          echo form_open_multipart('recruiter/recruiter/send_email', $attributes);
          ?>
          <?php if(!empty($list_dailyreport)) { ?>
            <table id="example1" class="table table-bordered table-striped ppheighttab-p">
              <thead>
                <tr>
                  <!-- <th><input type="checkbox" id="checkAl"> Select All</th> -->
                  <th>Sr.No</th>
                  <th>CandidateName</th> 
                  <th>SourcedBy</th>
                  <th>Client</th>                      
                  <th>Date</th>
                  <th>Position/Skills</th>
                  <th>Qualification</th>
                  <th>YrsOfExperience</th>
                  <th>CTC</th>
                  <th>ExpCTC</th>
                  <th>NoticePeriod</th>
                  <th>Official/onpaperNoticePeriod</th>
                  <th>ContactNo</th>
                  <th>EmailID</th>
                  <th>CurrentLocation</th>
                  <th>PrefferedLocation</th>
                  <th>ClientFeedback</th>
                  <th>InterviewScheduleDateTime</th>
                  <th>InterviewScheduleMode</th>
                  <th>FinalStatus</th>
                  <th>ClientRecruiter</th>
                  <th>Resume</th>
                  <th>Action</th>
                  <!-- <th>Action/update</th> -->
                </tr>
              </thead>

              <tbody>
                <?php

                if(!empty($list_dailyreport))
                {
                  $Srno=1;
                  foreach($list_dailyreport as $row)
                  {
                    if(!empty($row['company_client'])){
                      ?>
                      <tr>
                        <!-- <td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row['email_id'];?>">
                          <input type="checkbox" hidden id="checkItem_no" name="check_no[]" value="<?php echo $row['contact_no'];?>"></td> -->

                          <td> <?php echo $Srno; $Srno++; ?> </td>


                          <td style="background-color:<?php echo @$row['color'];?>"><?php echo $row['candidate_name'];?></td>

                          <?php
                          $user_role = $this->session->userdata('user_role'); 
                          if($user_role==2 OR $user_role==5) {
                            ?>

<td onclick="update_sourced_by('<?php echo $row['dailyreport_id'];?>','<?php echo $row['sourced_by'];?>')">
      <?php echo $row['sourced_by'];?></td>


                            <?php } else { ?>

                             <td onclick="update_sourced_by('<?php echo $row['dailyreport_id'];?>','<?php echo $row['sourced_by'];?>')">
      <?php echo $row['sourced_by'];?></td>

                            <?php } ?>

                            <td>
                              <?php echo $row['company_client']; ?></td>
                              <td><?php echo $da = date("d-m-Y", strtotime($row['date']));?></td>

                              <td>
                                <?php echo $row['position_skills'];?></td>

                                <td>
                                  <?php echo $row['qulification'];?></td>


                                  <td><?php if(!empty($row['months_of_experience'])){ echo $row['yrs_of_experience'].".".$row['months_of_experience']; }else{ echo $row['yrs_of_experience']; } ?></td>


                                  <td>
                                    <?php if(!empty($row['ctc_thousand'])){ echo $row['ctc'].".".$row['ctc_thousand']; }else{ echo $row['ctc']; } ?></td>

                                    <td>
                                      <?php echo $row['exp_ctc'];?></td>
                                      <td>
                                        <?php echo $row['notice_period'];?></td>
                                        <td>
                                          <?php echo $row['official_onpaper_notice_period'];?></td>
                                          <td>
                                            <?php echo $row['contact_no'];?></td>
                                            <td>
                                              <?php echo $row['email_id'];?></td>

                                              <td>
                                                <?php echo $row['location'];?></td>
                                                <td>
                                                  <?php echo $row['preffered_location'];?></td>
                                                  <td>
                                                    <?php echo $row['client_feedback'];?></td>

                                                    <td>
                                                      <?php if($row['interview_schedule']=="0000-00-00 00:00:00") { echo ""; } else { echo $row['interview_schedule']; } ?></td>

                                                      <td>
                                                        <?php echo $row['interview_schedule_mode'];?></td>

                                                        <td>
                                                          <?php 
                                                          echo $row['final_status'];

                                                          if($row['final_status']=="HR Reject" || $row['final_status']=="HR Hold")
                                                          {
                                                            echo " ( ".@$row['hr_reason']." )";
                                                          }

                                                          ?>


                                                        </td>
                                                        <td>
                                                          <?php echo $row['client_recruiter'];?></td>



                                                          <td>  
                                                            <a href="<?php echo base_url();?><?php echo $row['resume'];?>" target="_blank"><?php @$name =  explode('/', @$row['resume']); echo @$name[3]; ?></a> 

                                                          </td><td>  
                            <a href="<?php echo base_url();?>recruiter/recruiter/view_details/<?php echo $row['dailyreport_id'] ;?>">View</a>
                            <?php echo " / "; ?>
                            <a href="<?php echo base_url();?>recruiter/recruiter/edit/<?php echo $row['dailyreport_id'] ;?>">Update</a>
                            <!-- <a href="javascript:void(0);" onclick="deleteConfirm(<?php /* echo $row['dailyreport_id']; */ ?>)">Delete</a> -->
                          </td>
</tr>
<?php
} }
}
?>
</tbody>
</table>
<?php } ?>
<?php if(!empty($list_dailyreport)){ ?>
  <p>
    <!-- <button type="submit" class="btn btn-success" name="save" value="save">Send Mail</button>&nbsp;&nbsp;&nbsp;  -->
    <!-- <button type="submit" class="btn btn-success" name="save_no" value="save_no">Send Message</button> -->
  </p>
<?php } else { ?>
<?php } ?>
<?php echo form_close(); ?>        



<?php $user_role = $this->session->userdata('user_role'); if($user_role==2 OR $user_role==5 OR $global_user_id==1) { ?>
  <form class="form-horizontal" name="search_room" id="search_room" action="<?php echo base_url();?>recruiter/recruiter/mastersheet_excel" method="POST">   
    <?php if(!empty($export_skillwise_report)) { ?>
      <?php $list = Array();
      foreach ($export_skillwise_report as $key => $value) {
        $list[] = $value;
      }
      $lists = implode(',',$list); ?>
      <input type="hidden" name="client_id_search" id="client_id_searchz" value="<?php echo @$export_client_id; ?>">
      <input type="hidden" id="skillwise_report" name="skillwise_report" value="<?php echo @$lists; ?>">;
      <input type="submit" class="btn btn-success" value="Export Excel" name="Search" /> 
    <?php }elseif(!empty($export_client_id)){ ?>
      <input type="hidden" name="client_id_search" id="client_id_searchz" value="<?php echo @$export_client_id; ?>">
      <input type="hidden" id="skillwise_report" name="skillwise_report" value="<?php echo @$lists; ?>">;
      <input type="submit" class="btn btn-success" value="Export Excel" name="Search" /> 
    <?php } ?>
  </form>
<?php } ?>


</div><!-- /.box-body -->
</div><!-- /.box -->

</div><!-- /.col -->
</div><!-- /.row -->
</div>
</section><!-- /.content -->
</div><!-- /.content-wrapper -->




























   
<div class="modal fade" id="update_sourced_by_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Transfer Candidate To Recruiter vishal</h4>
            </div>
            <div class="modal-body">
              <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('search/sourced_by', $attributes);
              ?>  
              <div class="row">
                <div class="center col-md-12">
                  <input type="hidden" id="dailyreport_id_sourced_by" name="dailyreport_id_sourced_by">
                   <input type="hidden" id="sourced_by" name="sourced_by" class="form-control" >

                   <?php
                    $query=$this->db->query("SELECT user_admin_id, name, l_name FROM  user_admin where (role=2 || role=5 || role=9) AND status=1 ");
                    $selectvalue =  $query->result_array();
                   ?>
                    <select name="sourced_by_new" id="sourced_by_new" class="form-control" required="">
                      <option value="">Choose one</option>
                      <?php
                        foreach($selectvalue as $item){
                      ?>
                        <option value="<?php echo $item['user_admin_id']."/".$item['name']."-".$item['l_name']; ?>"><?php echo $item['name']." ".$item['l_name']; ?></option>
                      <?php
                        }
                      ?>
                    </select>
                   <br><br>
                   <label>Reason*</label>
                   <input type="text" id="sourced_by_new_reason" name="sourced_by_new_reason" class="form-control" required="" >
                   <br><br>
                  <div class="left col-md-3">
                    <button type="submit" class="btn btn-block btn-primary " >Update</button>
                  </div>  
                  <div class="right col-md-3">
                    <button class="btn btn-block btn-primary" data-dismiss="modal" aria-label="Close">Close</button>
                  </div>  
                </div>
              </div><!--/row-->
              <?php echo form_close(); ?> 
            </div>          
          </div>
        </div>
      </div>
     








<div class="modal fade" id="confirmDelete-popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Do you want to delete this record?</h4>
      </div>
      <div class="modal-body">
        <?php 
        $attributes = array('class' => 'form-horizontal', 'id' => 'login');
        echo form_open('recruiter/recruiter/delete', $attributes);
        ?>   
        <div class="row">
          <div class="center col-md-12">
            <input type="hidden" id="deleteID" name="deleteID" >
            <div class="left col-md-3">
              <button type="submit" class="btn btn-block btn-primary " >Yes</button>
            </div>  
            <div class="right col-md-3">
              <button class="btn btn-block btn-primary" data-dismiss="modal" aria-label="Close">No</button>
            </div>  
          </div>
        </div><!--/row-->
        <?php echo form_close(); ?> 
      </div>          
    </div>
  </div>
</div>



<div class="modal fade" id="update_final_status_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Update Final Status</h4>
      </div>
      <div class="modal-body">
        <?php 
        $attributes = array('class' => 'form-horizontal', 'id' => 'login');
        echo form_open('recruiter/recruiter/final_status', $attributes);
        ?>  
        <div class="row">
          <div class="center col-md-12">
            <input type="hidden" id="dailyreport_id_final_status" name="dailyreport_id_final_status">

            <select class="form-control" name="final_status" id="final_status" onchange="final_selection_interview_div(this)">
              <option value="">Select Status</option>
              <option value="L1 Select">L1 Select</option>
              <option value="L2 Select">L2 Select</option>
              <option value="L1 Reject">L1 Reject</option>
              <option value="L2 Reject">L2 Reject</option>
              <option value="L1 Pending">L1 Pending</option>
              <option value="L2 Pending">L2 Pending</option>
              <option value="Test Submit">Test Submit</option>
              <option value="Test Select">Test Select</option>
              <option value="Test Reject">Test Reject</option>
              <option value="HR Reject">HR Reject</option><!-- onclick open comment box -->
              <option value="HR Hold">HR Hold</option><!-- onclick open comment box -->
              <option value="Select">Select</option>
              <option value="Offered">Offered</option>
              <option value="Offer Decline">Offer Decline</option>
              <option value="Joined">Joined</option>
              <option value="Abscond">Abscond</option>
              <option value="Rescheduled">Rescheduled</option>
              <option value="Not Responding">Not Responding</option>
              <option value="Not Rechable">Not Rechable</option>
              <option value="Switch Off">Switch Off</option>
              <option value="Confirm">Confirm</option>
              <option value="Left within 3 months">Left within 3 months</option>
              <option value="Not Schedule">Not Schedule</option>
              <option value="No Show">No Show</option>
              <option value="Not shared to client">Not shared to client</option>
              <option value="Not Interested">Not Interested</option>
            </select>
            <br><br>


            <div id="div_post_year" style="display:none">
              <div class="row">
                <label class="col-md-6">Joining Date</label>
                <label class="col-md-6">Offered Amount</label>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <input type="text" name="selected_joining_date" id="selected_joining_date" class="form-control">
                </div>
                <div class="col-md-6">
                  <input type="text" name="selected_offered_amount" id="selected_offered_amount" class="form-control">
                </div>
              </div><br><br>

              <div class="row">
                <label class="col-md-6">Date of offer released</label>
                <label class="col-md-6">Grade</label>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <input type="text" name="date_of_offer_released" id="date_of_offer_released" class="form-control">
                </div>
                <div class="col-md-6">
                  <input type="text" name="grade" id="grade" class="form-control">
                </div>
              </div>

            </div><br>




            <div id="div_post_year_hr_reason" style="display:none">
              <div class="row">
                <label class="col-md-12">Reson comment</label>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <input type="text" name="hr_reason" id="hr_reason" class="form-control">
                </div>
              </div>                  
            </div><br><br>



            <div class="left col-md-3">
              <button type="submit" class="btn btn-block btn-primary " >Update</button>
            </div>  
            <div class="right col-md-3">
              <button class="btn btn-block btn-primary" data-dismiss="modal" aria-label="Close">Close</button>
            </div>  
          </div>
        </div><!--/row-->
        <?php echo form_close(); ?> 
      </div>          
    </div>
  </div>
</div>



<?php $this->load->view('template/footer'); ?>
<script type="text/javascript">
$(document).ready(function(){
  var table = $('#example1').DataTable({
    scrollY:        "500px",
    scrollX:        true,
    scrollCollapse: true,
    paging:         true,
    fixedColumns:   {
      leftColumns: 4,
    }
  });
});
</script>