<script type="text/javascript">
  //function for delete 
  function deleteConfirm(id)
  {
    $("#deleteID").val(id);
    $("#confirmDelete-popup").modal();
  }
  //function for hide success message
  function closeError2()
  { 
    $("#errorMessage2").hide(); 
  }
  //function for hide success message
  function closeSuccess2()
  { 
    $("#successMessage2").hide(); 
  }
</script>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
        Not Responding List
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="">Not Responding List</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"> List</h3>
                  <!--<a href="<?php echo base_url();?>blog/blog/add"><button type="button" class="btn btn-primary btn-md pull-right" >Add  </button></a>-->
                </div><!-- /.box-header -->

                <!-- Successfully updation message -->

          <?php if($this->session->flashdata('success') != '') {?>
          <div class="alert alert-success" id="successMessage2"><i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('success'); ?>
            <button type="button" class="close" id="btn-alert-success" onclick="closeSuccess2()" >&times;</button>
          </div>
          <?php } ?>
          
          <?php 
          $success='';
          $error='';
          if($success != '') {?>
          <div class="alert alert-success" id="successMessage2"><i class="fa fa-check-circle"></i> <?php echo $success; ?>
            <button type="button" class="close" id="btn-alert-success" onclick="closeSuccess2()" >&times;</button>
          </div>
          <?php } ?>

          <?php if($this->session->flashdata('error') != '') {?>
          <div class="alert alert-danger" id="errorMessage2"><i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('error'); ?>
            <button type="button" class="close" id="btn-alert-success" onclick="closeError2()" >&times;</button>
          </div>
          <?php } ?>
          
          <?php if($error != '') {?>
          <div class="alert alert-danger" id="errorMessage2"><i class="fa fa-check-circle"></i> <?php echo $error; ?>
            <button type="button" class="close" id="btn-alert-success" onclick="closeError2()" >&times;</button>
          </div>
          <?php } ?>


                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                     <tr>
                  <th>SR.NO</th>
                  <th>Date</th>
                  <th>Company/Client</th>
                  <th>Interview Status</th>
                  <th>Position/Skills</th>
                  <th>CandidateName</th>
                  <th>ContactNo</th>
                  <th>ClientFeedback</th>
                  <th>InterviewScheduleDateTime</th>
                  <th>InterviewScheduleMode</th>
                  <th>FinalStatus</th>
                  <th>ClientRecruiter</th>
                  <th>SourcedBy</th>
                </tr>
                    </thead>
                     <tbody>
                <?php
                if(!empty($user_data))
                {
                  $sr_no=1;
                  foreach($user_data as $row)
                  {
                    if($row['follow_up_status'] == 1){
                    ?>
                    <tr style="background-color:gold">

                      <?php }elseif($row['follow_up_status'] == '0'){?>
                      <tr style="background-color:silver">
                        <?php }elseif(empty($row['follow_up_status'] == ' ')){?>

                        <?php if($row['final_status']=='Confirm'){?>
                        <tr style="background-color:#3399FF">
                          <?php }elseif($row['final_status']=='Joined' || $row['final_status']=='Select' || $row['final_status']=='L2 Select'){?>
                          <tr style="background-color:#009933">
                            <?php }elseif($row['final_status']=='L1 Reject' || $row['final_status']=='L2 Reject'){?>
                            <tr style="background-color:#FF0033">
                              <?php }elseif($row['final_status']=='L1 Select' ){?>
                              <tr style="background-color:#FFA500">
                                <?php }elseif($row['final_status']=='HR Hold' ){?>
                                <tr style="background-color:#ffe600">
                                  <?php }?>

                                  <?php 
                                }?>
                                <td><?php echo $sr_no;$sr_no++; ?></td>
                                <td onclick="update_date('<?php echo $row['dailyreport_id'];?>','<?php echo $row['date'];?>')"><?php echo $da = date("d-m-Y", strtotime($row['date']));?></td>



                                <td onclick="update_company_client('<?php echo $row['dailyreport_id'];?>','<?php echo $row['company_client'];?>')">
                                  <?php echo $row['company_client'];?></td>
                                  <td>
                                    <label class="switch">
                                      <input type="checkbox" class="status" data_id="<?php echo $row['dailyreport_id']; ?>" status="<?php echo $row['follow_up_status']; ?>" <?php if($row['follow_up_status'] == 1){ echo 'checked'; } ?>>
                                      <span class="slider round"></span>
                                    </td>
                                    <td onclick="update_position_skills('<?php echo $row['dailyreport_id'];?>','<?php echo $row['position_skills'];?>')">
                                      <?php echo $row['position_skills'];?></td>

                                      <td ><?php echo $row['candidate_name'];?></td>


                                      <td onclick="update_contact_no('<?php echo $row['dailyreport_id'];?>','<?php echo $row['contact_no'];?>','<?php echo $row['sheetid'];?>')">
                                        <?php echo $row['contact_no'];?></td>

                                        <td onclick="update_client_feedback('<?php echo $row['dailyreport_id'];?>','<?php echo $row['client_feedback'];?>')">
                                          <?php 
                                          echo $row['client_feedback'];

                                          if($row['client_feedback']=="Hold")
                                          {
                                            echo " ( ".@$row['hold_reason']." )";
                                          }

                                          ?>


                                        </td>

                                        <td onclick="update_interview_schedule('<?php echo $row['dailyreport_id'];?>','<?php echo $row['interview_schedule'];?>')">
                                          <?php if($row['interview_schedule']=="0000-00-00 00:00:00") { echo ""; } else { echo $row['interview_schedule']; } ?></td>

                                          <td onclick="update_interview_schedule_mode('<?php echo $row['dailyreport_id'];?>','<?php echo $row['interview_schedule_mode'];?>')">
                                            <?php echo $row['interview_schedule_mode'];?></td>

                                            <td onclick="update_final_status('<?php echo $row['dailyreport_id'];?>','<?php echo $row['final_status'];?>')">
                                              <?php 
                                              echo $row['final_status'];

                                              if($row['final_status']=="HR Reject" || $row['final_status']=="HR Hold")
                                              {
                                                echo " ( ".@$row['hr_reason']." )";
                                              }

                                              ?>


                                            </td>
                                            <td onclick="update_client_recruiter('<?php echo $row['dailyreport_id'];?>','<?php echo $row['client_recruiter'];?>')">
                                              <?php echo $row['client_recruiter'];?></td>
                                              <td><?php echo $row['sourced_by'];?></td>

                                            </tr>
                                            <?php
                                          }
                                        }
                                        ?>
                                      </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

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
              echo form_open('blog/blog/delete_blog', $attributes);
              ?>   
              <div class="row">
                <div class="center col-md-12">
                  <input type="hidden" id="deleteID" name="deleteID" >
                  <div class="left col-md-3">
                    <button type="submit" class="btn btn-block btn-warning" >Yes</button>
                  </div>  
                  <div class="right col-md-3">
                    <button class="btn btn-block btn-warning" data-dismiss="modal" aria-label="Close">No</button>
                  </div>  
                </div>
              </div><!--/row-->
              <?php echo form_close(); ?> 
            </div>          
          </div>
        </div>
      </div>

 <div class="modal fade" id="update_final_status_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 1600;">
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
                                                <input type="hidden" name="dashboard" value="dash101" >
                                                <!-- <input type="text" id="final_status" name="final_status" class="form-control"> -->
                                                <select class="form-control" name="final_status" id="final_status"  onchange="final_selection_interview_div(this)">
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
                                                  <option value="Client Round Pending">Client Round Pending</option>
                                                  <option value="Screening Feedback Pending">Screening Feedback Pending</option>
                                                  <option value="Interview Feedback Pending">Interview Feedback Pending</option>
                                                </select><br><br>


                                                <div id="div_post_year" style="display:none">
                                                  <div class="row">
                                                    <label class="col-md-6 col-sm-6 col-xs-6">Joining Date</label>
                                                    <label class="col-md-6 col-sm-6 col-xs-6">Offered Amount</label>
                                                  </div>

                                                  <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                                      <input type="text" name="selected_joining_date" id="selected_joining_date" class="form-control">
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                                      <input type="text" name="selected_offered_amount" id="selected_offered_amount" class="form-control">
                                                    </div>
                                                  </div><br><br>

                                                  <div class="row">
                                                    <label class="col-md-6 col-sm-6 col-xs-6">Date of offer released</label>
                                                    <label class="col-md-6 col-sm-6 col-xs-6">Grade</label>
                                                  </div>

                                                  <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                                      <input type="text" name="date_of_offer_released" id="date_of_offer_released" class="form-control">
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                                      <input type="text" name="grade" id="grade" class="form-control">
                                                    </div>
                                                  </div>


                                                </div><br>




                                                <div id="div_post_year_hr_reason" style="display:none">
                                                  <div class="row">
                                                    <label class="col-md-12 col-sm-12 col-xs-12">Reson comment</label>
                                                  </div>

                                                  <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                      <input type="text" name="hr_reason" id="hr_reason" class="form-control">
                                                    </div>
                                                  </div>                  
                                                </div><br><br>


                                                <div class="left col-md-3 col-sm-3 col-xs-3">
                                                  <button type="submit" class="btn btn-block btn-primary " >Update</button>
                                                </div>  
                                                <div class="right col-md-3 col-sm-3 col-xs-3">
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
<script>
    function update_final_status(dailyreport_id,final_status)
    {
      $("#dailyreport_id_final_status").val(dailyreport_id);
      $("#final_status").val(final_status);
      $("#update_final_status_popup").modal();
    }    
  </script>
    <!-- page script -->
    <script type="text/javascript">
      $(function () {       
        $('#example1').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true,
           "scrollX": true
        });
      });
      /*$('.dropdown-toggle').on('click',function(){
        if($('.btn-group').hasClass('open')){

        }else{
          $('.btn-group').addClass('open');
          $("button").attr("aria-expanded","true");
        }
        
      });*/
    </script>