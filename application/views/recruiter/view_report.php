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
</script>


      <div class="content-wrapper">
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
   <div class="box">
       <div class="box box-solid box-info">



<div class="row">
      
        <form class="form-horizontal" name="individual" id="individual" action="<?php echo base_url();?>weeklyreport/individual_excel_report" method="POST">
 
      <div class="col-md-6">
        <div class="box-body">
              <div class="col-md-4">   
                <label class="control-label">From</label>                                 
                <input type="text" id="fromdate" class="form-control" name="fromdate" />
              </div>
              <div class="col-md-4">   
                <label class="control-label ">To</label>                                 
                <input type="text" id="todate" class="form-control" name="todate" />
              </div>
              <div class="col-md-4">
                <input type="submit" class="btn btn-success" value="Export Excel" name="Search">
              </div>
            </div>
      </div>
</form>
</div>



    <div class="box-body">
      <?php /* if(!empty($list_dailyreport)) { ?>
      <h2>Candidate Details</h2>
      <?php } */ ?>

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
                        <th><input type="checkbox" id="checkAl"> Select All</th>
                        <th>Sr.No</th>
                        <th>view/update</th>
                        <th>Date</th>
                        <!-- <th>Company/Client</th> -->                        
                        <th>Position/Skills</th>
                        <th>RP_ID</th>
                        <th>CandidateName</th>
                        <th>ApplicantID</th>
                        <th>Role</th>
                        <th>Qualification</th>
                        <th>CompanyName</th>
                        <th>YrsOfExperience</th>
                        <th>RelevantExp</th>
                        <th>CTC</th>
                        <th>ExpCTC</th>
                        <th>NoticePeriod</th>
                        <th>Official/onpaperNoticePeriod</th>
                        <th>ContactNo</th>
                        <th>AlternateContactNumber</th>
                        <th>EmailID</th>
                        <th>AlternateEmailID</th>
                        <th>CurrentLocation</th>
                        <th>PrefferedLocation</th>
                        <th>ClientFeedback</th>
                        <th>InterviewScheduleDateTime</th>
                        <th>InterviewScheduleMode</th>
                        <th>FinalStatus</th>
                        <th>ClientRecruiter</th>
                        <th>SourcedBy</th>
                        <th>ReasonForJobChange</th>
                        <th>Rating</th>
                        <th>Resume</th>
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
                                <td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row['email_id'];?>">
                                  <input type="checkbox" hidden id="checkItem_no" name="check_no[]" value="<?php echo $row['contact_no'];?>"></td>
                                
                                <td> <?php echo $Srno; $Srno++; ?> </td>

<td>  
  <a href="<?php echo base_url();?>recruiter/recruiter/view_details/<?php echo $row['dailyreport_id'] ;?>">View</a>
  <?php echo " / "; ?>
  <a href="<?php echo base_url();?>recruiter/recruiter/edit/<?php echo $row['dailyreport_id'] ;?>">Update</a>
  <!-- <a href="javascript:void(0);" onclick="deleteConfirm(<?php /* echo $row['dailyreport_id']; */ ?>)">Delete</a> -->
</td>

 <td onclick="update_date('<?php echo $row['dailyreport_id'];?>','<?php echo $row['date'];?>')"><?php echo $da = date("d-m-Y", strtotime($row['date']));?></td>

<!-- <td onclick="update_company_client('<?php /* echo $row['dailyreport_id'];?>','<?php echo $row['company_client'];?>')">
      <?php echo $row['company_client']; */ ?></td> -->

<td onclick="update_position_skills('<?php echo $row['dailyreport_id'];?>','<?php echo $row['position_skills'];?>')">
      <?php echo $row['position_skills'];?></td>
<td onclick="update_rp_id('<?php echo $row['dailyreport_id'];?>','<?php echo $row['rp_id'];?>')">
      <?php echo $row['rp_id'];?></td>

<td style="background-color:<?php echo @$row['color'];?>" onclick="add_color('<?php echo $row['dailyreport_id'];?>','<?php echo $row['candidate_name'];?>','<?php echo $row['color'];?>')"><?php echo $row['candidate_name'];?></td>

<td onclick="update_applicant_id('<?php echo $row['dailyreport_id'];?>','<?php echo $row['applicant_id'];?>')">
      <?php echo $row['applicant_id'];?></td>

<td onclick="update_role('<?php echo $row['dailyreport_id'];?>','<?php echo $row['role'];?>')">
      <?php echo $row['role'];?></td> 
<td onclick="update_qulification('<?php echo $row['dailyreport_id'];?>','<?php echo $row['qulification'];?>')">
      <?php echo $row['qulification'];?></td>
<td onclick="update_company_name('<?php echo $row['dailyreport_id'];?>','<?php echo $row['company_name'];?>')">
      <?php echo $row['company_name'];?></td>

<td onclick="update_yrs_of_experience('<?php echo $row['dailyreport_id'];?>','<?php echo $row['yrs_of_experience'];?>','<?php echo $row['months_of_experience'];?>')"><?php if(!empty($row['months_of_experience'])){ echo $row['yrs_of_experience'].".".$row['months_of_experience']; }else{ echo $row['yrs_of_experience']; } ?></td>

<td onclick="update_relevant_exp('<?php echo $row['dailyreport_id'];?>','<?php echo $row['relevant_exp'];?>')">
      <?php echo $row['relevant_exp'];?></td>

<td onclick="update_ctc('<?php echo $row['dailyreport_id'];?>','<?php echo $row['ctc'];?>','<?php echo $row['ctc_thousand'];?>')">
      <?php if(!empty($row['ctc_thousand'])){ echo $row['ctc'].".".$row['ctc_thousand']; }else{ echo $row['ctc']; } ?></td>

<td onclick="update_exp_ctc('<?php echo $row['dailyreport_id'];?>','<?php echo $row['exp_ctc'];?>')">
      <?php echo $row['exp_ctc'];?></td>
<td onclick="update_notice_period('<?php echo $row['dailyreport_id'];?>','<?php echo $row['notice_period'];?>')">
      <?php echo $row['notice_period'];?></td>
<td onclick="update_official_onpaper_notice_period('<?php echo $row['dailyreport_id'];?>','<?php echo $row['official_onpaper_notice_period'];?>')">
      <?php echo $row['official_onpaper_notice_period'];?></td>
<td onclick="update_contact_no('<?php echo $row['dailyreport_id'];?>','<?php echo $row['contact_no'];?>','<?php echo $row['sheetid'];?>')">
      <?php echo $row['contact_no'];?></td>

<td onclick="update_alternate_contact_number('<?php echo $row['dailyreport_id'];?>','<?php echo $row['alternate_contact_number'];?>')">
      <?php echo $row['alternate_contact_number'];?></td>
<td onclick="update_email_id('<?php echo $row['dailyreport_id'];?>','<?php echo $row['email_id'];?>','<?php echo $row['sheetid'];?>')">
      <?php echo $row['email_id'];?></td>
<td onclick="update_alternate_email_id('<?php echo $row['dailyreport_id'];?>','<?php echo $row['alternate_email_id'];?>')">
      <?php echo $row['alternate_email_id'];?></td>

<td onclick="update_location('<?php echo $row['dailyreport_id'];?>','<?php echo $row['location'];?>')">
      <?php echo $row['location'];?></td>
<td onclick="update_preffered_location('<?php echo $row['dailyreport_id'];?>','<?php echo $row['preffered_location'];?>')">
      <?php echo $row['preffered_location'];?></td>
<td onclick="update_client_feedback('<?php echo $row['dailyreport_id'];?>','<?php echo $row['client_feedback'];?>')">
      <?php echo $row['client_feedback'];?></td>

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

<?php
  $user_role = $this->session->userdata('user_role'); 
    if($user_role==2 OR $user_role==5) {
?>
  <td onclick="update_sourced_by('<?php echo $row['dailyreport_id'];?>','<?php echo $row['sourced_by'];?>')">
      <?php echo $row['sourced_by'];?></td>
<?php } else { ?>
     
      <td><?php echo $row['sourced_by'];?></td>

    <?php } ?>

<td onclick="update_reason_for_job_change('<?php echo $row['dailyreport_id'];?>','<?php echo $row['reason_for_job_change'];?>')">
      <?php echo $row['reason_for_job_change'];?></td>


<td onclick="update_star_rating('<?php echo $row['dailyreport_id'];?>','<?php echo $row['star_rating'];?>')">
      <?php echo $row['star_rating'];?></td>

<td>  
   <a href="<?php echo base_url();?><?php echo $row['resume'];?>" target="_blank"><?php @$name =  explode('/', @$row['resume']); echo @$name[3]; ?></a> 

</td>

                                <!-- <td>
                                <div class="btn-group">
                              <button type="button" class="btn btn-info">Action</button>
                              <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php /* echo base_url();?>recruiter/recruiter/edit/<?php echo $row['dailyreport_id'] ;?>">Edit</a></li>
                                <li><a href="<?php echo base_url();?>recruiter/recruiter/view_details/<?php echo $row['dailyreport_id'] ;?>">View</a></li>
                                 <li><a href="javascript:void(0);" onclick="deleteConfirm(<?php echo $row['dailyreport_id']; */ ?>)">Delete</a></li> 
                              </ul>
                            </div>
                                </td> --> 
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
                     <button type="submit" class="btn btn-success" name="save" value="save">Send Mail</button>&nbsp;&nbsp;&nbsp; 
                    <!-- <button type="submit" class="btn btn-success" name="save_no" value="save_no">Send Message</button> -->
                  </p>
                  <?php } else { ?>
                  <?php } ?>
                 <?php echo form_close(); ?>        
                 


      <?php $user_role = $this->session->userdata('user_role'); if($user_role==2 OR $user_role==5) { ?>
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

      
<div class="modal fade" id="color_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Do you want to update color status for this record?</h4>
            </div>
            <div class="modal-body">
              <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruiter/recruiter/color_update_for_record', $attributes);
              ?>   
              <div class="row">
                <div class="row">
                <div class="center col-md-12 colplatlet-p">
                  <label class="control-label col-md-3">Choose Colour</label>
                  <div class="col-md-9">
                       <input type="color" name="color_id" id="dailyreport_record_color" class="inpcol-p">
                 </div>
                </div>
              </div><br><br>
              <div class="row">
                <div class="center col-md-12">
                  <label class="control-label col-md-3">Candidate Name</label>
                  <div class="col-md-9">
                       <input type="text" name="dailyreport_record_name" id="dailyreport_record_name" class="form-control" >
                 </div>
                </div>
              </div><br><br>
                <div class="center col-md-12">
                  <input type="hidden" id="dailyreport_record_id" name="dailyreport_record_id" >
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



<div class="modal fade" id="update_date_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
              <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruiter/recruiter/update_date_new', $attributes);
              ?>  
              <div class="row">
                <div class="center col-md-12">
                  <input type="hidden" id="dailyreport_idadate" name="dailyreport_idadate">
                   <input type="text" id="dateqq" name="dateqq" class="form-control" ><br><br>                  
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


<div class="modal fade" id="update_company_client_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
              <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruiter/recruiter/update_company_client', $attributes);
              ?>  
              <div class="row">
                <div class="center col-md-12">
                  <input type="hidden" id="dailyreport_idaclient_company" name="dailyreport_idaclient_company">
                   <input type="text" id="company_client_name" name="company_client_name" class="form-control" ><br><br>
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


<div class="modal fade" id="update_position_skills_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
              <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruiter/recruiter/update_position_skills', $attributes);
              ?>  
              <div class="row">
                <div class="center col-md-12">
                  <input type="hidden" id="dailyreport_ida" name="dailyreport_ida">
                   <input type="text" id="position_skills" name="position_skills" class="form-control" ><br><br>
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



<div class="modal fade" id="update_rp_id_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
              <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruiter/recruiter/update_rp_id', $attributes);
              ?>  
              <div class="row">
                <div class="center col-md-12">
                  <input type="hidden" id="dailyreport_ids" name="dailyreport_ids">
                   <input type="text" id="rp_id" name="rp_id" class="form-control" ><br><br>
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



<div class="modal fade" id="update_candidate_name_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
              <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruiter/recruiter/update_candidate_name', $attributes);
              ?>  
              <div class="row">
                <div class="center col-md-12">
                  <input type="hidden" id="dailyreport_idd" name="dailyreport_idd">
                   <input type="text" id="candidate_name" name="candidate_name" class="form-control" ><br><br>
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



<div class="modal fade" id="update_applicant_id_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
              <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruiter/recruiter/update_applicant_id', $attributes);
              ?>  
              <div class="row">
                <div class="center col-md-12">
                  <input type="hidden" id="dailyreport_idf" name="dailyreport_idf">
                   <input type="text" id="applicant_id" name="applicant_id" class="form-control" ><br><br>
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



<div class="modal fade" id="update_qulification_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
              <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruiter/recruiter/update_qulification', $attributes);
              ?>  
              <div class="row">
                <div class="center col-md-12">
                  <input type="hidden" id="dailyreport_idg" name="dailyreport_idg">
                   <input type="text" id="qulification" name="qulification" class="form-control" ><br><br>
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



<div class="modal fade" id="update_company_name_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
              <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruiter/recruiter/update_company_name', $attributes);
              ?>  
              <div class="row">
                <div class="center col-md-12">
                  <input type="hidden" id="dailyreport_idh" name="dailyreport_idh">
                   <input type="text" id="company_name" name="company_name" class="form-control" ><br><br>
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

   

<div class="modal fade" id="update_role_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
              <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruiter/recruiter/update_role', $attributes);
              ?>  
              <div class="row">
                <div class="center col-md-12">
                  <input type="hidden" id="dailyreport_id" name="dailyreport_id">
                   <input type="text" id="role" name="role" class="form-control" ><br><br>
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




























<div class="modal fade" id="update_yrs_of_experience_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
              <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruiter/recruiter/yrs_of_experience', $attributes);
              ?>  
              <div class="row">
                <div class="center col-md-12">
                  <input type="hidden" id="dailyreport_id_yrs_of_experience" name="dailyreport_id_yrs_of_experience">
                   <div class="row">
                   <div class="col-md-6">
                    <select class="form-control" name="yrs_of_experience" id="yrs_of_experience">
                     <option value="0">0</option>
                           <option value="1">1</option>
                           <option value="2">2</option>
                           <option value="3">3</option>
                           <option value="4">4</option>
                           <option value="5">5</option>
                           <option value="6">6</option>
                           <option value="7">7</option>
                           <option value="8">8</option>
                           <option value="9">9</option>
                           <option value="10">10</option>
                           <option value="11">11</option>
                           <option value="12">12</option>
                           <option value="13">13</option>
                           <option value="14">14</option>
                           <option value="15">15</option>
                           <option value="16">16</option>
                           <option value="17">17</option>
                           <option value="18">18</option>
                           <option value="19">19</option>
                           <option value="20">20</option>
                           <option value="21">21</option>
                           <option value="22">22</option>
                           <option value="23">23</option>
                           <option value="24">24</option>
                           <option value="25">25</option>
                           <option value="26">26</option>
                           <option value="27">27</option>
                           <option value="28">28</option>
                           <option value="29">29</option>
                           <option value="30">30</option>
                   </select> 
                   </div>
                   <div class="row col-md-6">
                    <select class="form-control" name="months_of_experience" id="months_of_experience">
                     <option value="0">0</option>
                           <option value="1">1</option>
                           <option value="2">2</option>
                           <option value="3">3</option>
                           <option value="4">4</option>
                           <option value="5">5</option>
                           <option value="6">6</option>
                           <option value="7">7</option>
                           <option value="8">8</option>
                           <option value="9">9</option>
                           <option value="10">10</option>
                           <option value="11">11</option>
                           <option value="12">12</option>
                   </select> 
                   </div>
                 </div>
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




<div class="modal fade" id="update_relevant_exp_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
              <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruiter/recruiter/relevant_exp', $attributes);
              ?>  
              <div class="row">
                <div class="center col-md-12">
                  <input type="hidden" id="dailyreport_id_relevant_exp" name="dailyreport_id_relevant_exp">
                   <input type="text" id="relevant_exp" name="relevant_exp" class="form-control" ><br><br>
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


<div class="modal fade" id="update_ctc_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
              <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruiter/recruiter/ctc', $attributes);
              ?>  
              <div class="row">
                <div class="center col-md-12">
                  <input type="hidden" id="dailyreport_id_ctc" name="dailyreport_id_ctc">
                   <div class="row">
                   <div class="col-md-6">
                    <select class="form-control" name="ctc" id="ctc">
                     <option value="0">0</option>
                           <option value="1">1</option>
                           <option value="2">2</option>
                           <option value="3">3</option>
                           <option value="4">4</option>
                           <option value="5">5</option>
                           <option value="6">6</option>
                           <option value="7">7</option>
                           <option value="8">8</option>
                           <option value="9">9</option>
                           <option value="10">10</option>
                           <option value="11">11</option>
                           <option value="12">12</option>
                           <option value="13">13</option>
                           <option value="14">14</option>
                           <option value="15">15</option>
                           <option value="16">16</option>
                           <option value="17">17</option>
                           <option value="18">18</option>
                           <option value="19">19</option>
                           <option value="20">20</option>
                           <option value="21">21</option>
                           <option value="22">22</option>
                           <option value="23">23</option>
                           <option value="24">24</option>
                           <option value="25">25</option>
                           <option value="26">26</option>
                           <option value="27">27</option>
                           <option value="28">28</option>
                           <option value="29">29</option>
                           <option value="30">30</option>
                           <option value="31">31</option>
                           <option value="32">32</option>
                           <option value="33">33</option>
                           <option value="34">34</option>
                           <option value="35">35</option>
                           <option value="36">36</option>
                           <option value="37">37</option>
                           <option value="38">38</option>
                           <option value="39">39</option>
                           <option value="40">40</option>
                           <option value="41">41</option>
                           <option value="42">42</option>
                           <option value="43">43</option>
                           <option value="44">44</option>
                           <option value="45">45</option>
                           <option value="46">46</option>
                           <option value="47">47</option>
                           <option value="48">48</option>
                           <option value="49">49</option>
                           <option value="50">50</option>
                           <option value="51">51</option>
                           <option value="52">52</option>
                           <option value="53">53</option>
                           <option value="54">54</option>
                           <option value="55">55</option>
                           <option value="56">56</option>
                           <option value="57">57</option>
                           <option value="58">58</option>
                           <option value="59">59</option>
                           <option value="60">60</option>
                           <option value="61">61</option>
                           <option value="62">62</option>
                           <option value="63">63</option>
                           <option value="64">64</option>
                           <option value="65">65</option>
                           <option value="66">66</option>
                           <option value="67">67</option>
                           <option value="68">68</option>
                           <option value="69">69</option>
                           <option value="70">70</option>
                           <option value="71">71</option>
                           <option value="72">72</option>
                           <option value="73">73</option>
                           <option value="74">74</option>
                           <option value="75">75</option>
                           <option value="76">76</option>
                           <option value="77">77</option>
                           <option value="78">78</option>
                           <option value="79">79</option>
                           <option value="80">80</option>
                           <option value="81">81</option>
                           <option value="82">82</option>
                           <option value="83">83</option>
                           <option value="84">84</option>
                           <option value="85">85</option>
                           <option value="86">86</option>
                           <option value="87">87</option>
                           <option value="88">88</option>
                           <option value="89">89</option>
                           <option value="90">90</option>
                           <option value="91">91</option>
                           <option value="92">92</option>
                           <option value="93">93</option>
                           <option value="94">94</option>
                           <option value="95">95</option>
                           <option value="96">96</option>
                           <option value="97">97</option>
                           <option value="98">98</option>
                           <option value="99">99</option>
                   </select> 
                   </div>
                   <div class="row col-md-6">
                    <select class="form-control" name="ctc_thousand" id="ctc_thousand">
                          <option value="0">0</option>
                          <option value="5">5000</option>
                           <option value="10">10000</option>
                           <option value="15">15000</option>
                           <option value="20">20000</option>
                           <option value="25">25000</option>
                           <option value="30">30000</option>
                           <option value="35">35000</option>
                           <option value="40">40000</option>
                           <option value="45">45000</option>
                           <option value="50">50000</option>
                           <option value="55">55000</option>
                           <option value="60">60000</option>
                           <option value="65">65000</option>
                           <option value="70">70000</option>
                           <option value="75">75000</option>
                           <option value="80">80000</option>
                           <option value="85">85000</option>
                           <option value="90">90000</option>
                           <option value="95">95000</option>
                   </select> 
                   </div>
                 </div>

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


<div class="modal fade" id="update_exp_ctc_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
              <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruiter/recruiter/exp_ctc', $attributes);
              ?>  
              <div class="row">
                <div class="center col-md-12">
                  <input type="hidden" id="dailyreport_id_exp_ctc" name="dailyreport_id_exp_ctc">
                   <input type="text" id="exp_ctc" name="exp_ctc" class="form-control" ><br><br>
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


<div class="modal fade" id="update_notice_period_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
              <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruiter/recruiter/notice_period', $attributes);
              ?>  
              <div class="row">
                <div class="center col-md-12">
                  <input type="hidden" id="dailyreport_id_notice_period" name="dailyreport_id_notice_period">
                   <input type="text" id="notice_period" name="notice_period" class="form-control" ><br><br>
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
                

<div class="modal fade" id="update_official_onpaper_notice_period_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
              <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruiter/recruiter/official_onpaper_notice_period', $attributes);
              ?>  
              <div class="row">
                <div class="center col-md-12">
                  <input type="hidden" id="dailyreport_id_official_onpaper_notice_period" name="dailyreport_id_official_onpaper_notice_period">
                   <input type="text" id="official_onpaper_notice_period" name="official_onpaper_notice_period" class="form-control" ><br><br>
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
                

<div class="modal fade" id="update_contact_no_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
              <?php 
              /*$attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruiter/recruiter/contact_no', $attributes);*/
              ?>  

    <form method="post" name="update_contact_no_validation" id="update_contact_no_validation" action="<?php echo base_url('recruiter/recruiter/contact_no');?>" onsubmit="return validateFP();"> 


              <div class="row">
                <div class="center col-md-12">
                  <input type="hidden" id="dailyreport_id_contact_no" name="dailyreport_id_contact_no">
                  <input type="hidden" name="does_email_exists" id="does_email_exists" value="1">
                  <input type="hidden" name="bydefault_contact_no" id="bydefault_contact_no">                  
                   <input type="text" id="contact_no" name="contact_no" minlength="10" maxlength="10" class="form-control" onblur="checkIDAvailability();" ><br><br>
                    <span id="email_msg"></span>
                   <input type="hidden" id="sheetid" name="sheetid" class="form-control" ><br><br>
                  <div class="left col-md-3">
                    <!-- <button type="submit" class="btn btn-block btn-primary" >Update</button> -->
                    <input type="submit" name="send_email" id="send_email" value="Update" class="btn btn-block btn-primary"/>
                  </div>  
                  <div class="right col-md-3">
                    <button class="btn btn-block btn-primary" data-dismiss="modal" aria-label="Close">Close</button>
                  </div>  
                </div>
              </div><!--/row-->
              <?php //echo form_close(); ?> 
            </form>
            </div>          
          </div>
        </div>
      </div>
                


<div class="modal fade" id="update_email_id_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
              <?php 
              /*$attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruiter/recruiter/email_id', $attributes);*/
              ?>  
    <form method="post" name="update_email_id_validation" id="update_email_id_validation" action="<?php echo base_url('recruiter/recruiter/email_id');?>" onsubmit="return validateFP_email_id();"> 

              <div class="row">
                <div class="center col-md-12">

                    <input type="hidden" id="sheetid_email_id" name="sheetid_email_id" >
                   <input type="hidden" id="dailyreport_id_email_id" name="dailyreport_id_email_id">
                  <input type="hidden" name="does_email_exists_email_id" id="does_email_exists_email_id" value="1">
                  <input type="hidden" name="bydefault_email_id" id="bydefault_email_id">                  
                   <input type="text" id="email_id" name="email_id" class="form-control" onblur="checkIDAvailabilityEmail();" ><br><br>
                    <span id="email_msg_email_id"></span>
                   


                  <div class="left col-md-3">
                     <input type="submit" name="send_email_check" id="send_email_check" value="Update" class="btn btn-block btn-primary"/>
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



<div class="modal fade" id="update_alternate_contact_number_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
              <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruiter/recruiter/alternate_contact_number', $attributes);
              ?>  
              <div class="row">
                <div class="center col-md-12">
                  <input type="hidden" id="dailyreport_id_alternate_contact_number" name="dailyreport_id_alternate_contact_number">
                   <input type="text" id="alternate_contact_number" name="alternate_contact_number" class="form-control" ><br><br>
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
                

                


<div class="modal fade" id="update_alternate_email_id_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
              <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruiter/recruiter/alternate_email_id', $attributes);
              ?>  
              <div class="row">
                <div class="center col-md-12">
                  <input type="hidden" id="dailyreport_id_alternate_email_id" name="dailyreport_id_alternate_email_id">
                   <input type="text" id="alternate_email_id" name="alternate_email_id" class="form-control" ><br><br>
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
            



<div class="modal fade" id="update_location_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
              <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruiter/recruiter/location', $attributes);
              ?>  
              <div class="row">
                <div class="center col-md-12">
                  <input type="hidden" id="dailyreport_id_location" name="dailyreport_id_location">
                   <input type="text" id="location" name="location" class="form-control" ><br><br>
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
            

<div class="modal fade" id="update_preffered_location_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
              <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruiter/recruiter/preffered_location', $attributes);
              ?>  
              <div class="row">
                <div class="center col-md-12">
                  <input type="hidden" id="dailyreport_id_preffered_location" name="dailyreport_id_preffered_location">
                   <input type="text" id="preffered_location" name="preffered_location" class="form-control" ><br><br>
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
      

  
<div class="modal fade" id="update_client_feedback_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
              <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruiter/recruiter/client_feedback', $attributes);
              ?>  
              <div class="row">
                <div class="center col-md-12">
                  <input type="hidden" id="dailyreport_id_client_feedback" name="dailyreport_id_client_feedback">
                   <!-- <select class="form-control" name="client_feedback" id="client_feedback">
                     <option value="">Select Feedback</option>
                     <option value="L1 Select">L1 Select</option>
                     <option value="L2 Select">L2 Select</option>
                     <option value="L1 Reject">L1 Reject</option>
                     <option value="L2 Reject">L2 Reject</option>
                     <option value="Shortlisted">Shortlisted</option>
                     <option value="Screen Reject">Screen Reject</option>
                     <option value="Duplicate">Duplicate</option>
                     <option value="Hold">Hold</option>
                   </select> -->

                   <select class="form-control" name="client_feedback" id="client_feedback" onchange="client_feedback_final_selection_interview_div(this)">
                     <option value="">Select Feedback</option>
                     <option value="Shortlisted">Shortlisted</option>
                     <option value="Not Shortlisted">Not Shortlisted</option>
                     <option value="Duplicate">Duplicate</option>
                     <option value="Feedback Awaited">Feedback Awaited</option>
                     <option value="Hold">Hold</option>
                   </select><br><br>

                    <div id="hold_reason_div" style="display:none">
                   <div class="row">
                     <label class="col-md-12">Reson comment</label>
                  </div>

                  <div class="row">
                      <div class="col-md-12">
                        <input type="text" name="hold_reason" id="hold_reason" class="form-control">
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
   


<div class="modal fade" id="update_interview_schedule_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
              <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruiter/recruiter/interview_schedule', $attributes);
              ?>  
              <div class="row">
                <div class="center col-md-12">
                  <input type="hidden" id="dailyreport_id_interview_schedule" name="dailyreport_id_interview_schedule">
                   <!-- <input type="text" id="interview_schedule" name="interview_schedule" class="form-control" > -->
                   <input id="interview_schedule" name="interview_schedule" title="interview_schedule" class="form-control"/>
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



<div class="modal fade" id="update_interview_schedule_mode_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
              <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruiter/recruiter/interview_schedule_mode', $attributes);
              ?>  
              <div class="row">
                <div class="center col-md-12">
                  <input type="hidden" id="dailyreport_id_interview_schedule_mode" name="dailyreport_id_interview_schedule_mode">
                   <input type="text" id="interview_schedule_mode" name="interview_schedule_mode" class="form-control" ><br><br>
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
 








   
<div class="modal fade" id="update_star_rating_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Update Rating</h4>
            </div>
            <div class="modal-body">
              <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruiter/recruiter/star_rating', $attributes);
              ?>  
              <div class="row">
                <div class="center col-md-12">
                  <input type="hidden" id="dailyreport_id_star_rating" name="dailyreport_id_star_rating">
                   
                   <select class="form-control" name="star_rating" id="star_rating">
                     <option value="">Select Rating</option>
                     <option value="1">1</option>
                     <option value="2">2</option>
                     <option value="3">3</option>
                     <option value="4">4</option>
                     <option value="5">5</option>
                   </select>
                   <br>
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
 


   
<div class="modal fade" id="update_client_recruiter_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
              <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruiter/recruiter/client_recruiter', $attributes);
              ?>  
              <div class="row">
                <div class="center col-md-12">
                  <input type="hidden" id="dailyreport_id_client_recruiter" name="dailyreport_id_client_recruiter">
                   <input type="text" id="client_recruiter" name="client_recruiter" class="form-control" ><br><br>
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
                                 

   
<div class="modal fade" id="update_sourced_by_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Transfer Candidate To Recruiter</h4>
            </div>
            <div class="modal-body">
              <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruiter/recruiter/sourced_by', $attributes);
              ?>  
              <div class="row">
                <div class="center col-md-12">
                  <input type="hidden" id="dailyreport_id_sourced_by" name="dailyreport_id_sourced_by">
                   <input type="hidden" id="sourced_by" name="sourced_by" class="form-control" >

                   <?php
                    $query=$this->db->query("SELECT user_admin_id, name, l_name FROM  user_admin where role=2 || role=5 || role=9");
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
     
  


<div class="modal fade" id="update_reason_for_job_change_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
              <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('recruiter/recruiter/reason_for_job_change', $attributes);
              ?>  
              <div class="row">
                <div class="center col-md-12">
                  <input type="hidden" id="dailyreport_id_reason_for_job_change" name="dailyreport_id_reason_for_job_change">
                   <input type="text" id="reason_for_job_change" name="reason_for_job_change" class="form-control" ><br><br>
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
<script type="text/javascript" src="<?php echo base_url();?>frontend/kendo.all.min.js"></script>



  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script> 

<!-- accept:'xls|xlsx' -->
<script type="text/javascript">




$('#dateqq').datepicker({

    format: 'yyyy/mm/dd'

});

$("#interview_schedule").kendoDateTimePicker({                        
                    });

  $(document).ready( function() 
    {

        jQuery.validator.addMethod("notEqual", function(value, element) { 
    return this.optional(element) || value != "0000000000";
  }, "Invalid mobile number.");

          jQuery.validator.addMethod("validemailtest", function(value, element) {
    return this.optional(element) || /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$/i.test(value);
  }, "Please enter a valid Email ID");

        $("#update_contact_no_validation").validate(
        {
            errorElement: "span", 
            rules: 
            {                
                contact_no: 
                {
                    required:true,
                    notEqual:true,
                    digits:true
                }
            },
            messages: 
            { 
                contact_no: 
                {
                    required:"Required"
                }
            },
        });


        $("#update_email_id_validation").validate(
        {
            errorElement: "span", 
            rules: 
            {                
               email_id: 
                {
                    required:true,
                    validemailtest:true
                }
            },
            messages: 
            { 
                email_id: 
                {
                    required:"Required"
                }
            },
        });

        $("#add_file_type").validate(
        {
            errorElement: "span", 

            rules: 
            {
                userfile: 
                {
                    required:true,
                    accept:'xls|xlsx'
                }
            },

            messages: 
            { 
                userfile: 
                {
                    required:"Required",
                    accept:"Please select only xls and xlsx file"
                }
            },
        });
    });


</script>

    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        $('#example1').DataTable({
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

<script>
$("#checkAl").click(function () {
$('input:checkbox').not(this).prop('checked', this.checked);
});
</script>

<script type="text/javascript">

      
    function update_role(dailyreport_id,role)
    {
      $("#dailyreport_id").val(dailyreport_id);
      $("#role").val(role);
      $("#update_role_popup").modal();
    }

    
    function update_date(dailyreport_id,date)
    {
      $("#dailyreport_idadate").val(dailyreport_id);
      $("#dateqq").val(date);
      $("#update_date_popup").modal();
    }

    function update_position_skills(dailyreport_id,position_skills)
    {
      $("#dailyreport_ida").val(dailyreport_id);
      $("#position_skills").val(position_skills);
      $("#update_position_skills_popup").modal();
    }

    function update_company_client(dailyreport_id,company_client)
    {
      $("#dailyreport_idaclient_company").val(dailyreport_id);
      $("#company_client_name").val(company_client);
      $("#update_company_client_popup").modal();
    }

    

    function update_rp_id(dailyreport_id,rp_id)
    {
      $("#dailyreport_ids").val(dailyreport_id);
      $("#rp_id").val(rp_id);
      $("#update_rp_id_popup").modal();
    }

    function update_candidate_name(dailyreport_id,candidate_name)
    {
      $("#dailyreport_idd").val(dailyreport_id);
      $("#candidate_name").val(candidate_name);
      $("#update_candidate_name_popup").modal();
    }

    function update_applicant_id(dailyreport_id,applicant_id)
    {
      $("#dailyreport_idf").val(dailyreport_id);
      $("#applicant_id").val(applicant_id);
      $("#update_applicant_id_popup").modal();
    }

    function update_qulification(dailyreport_id,qulification)
    {
      $("#dailyreport_idg").val(dailyreport_id);
      $("#qulification").val(qulification);
      $("#update_qulification_popup").modal();
    }

    function update_company_name(dailyreport_id,company_name)
    {
      $("#dailyreport_idh").val(dailyreport_id);
      $("#company_name").val(company_name);
      $("#update_company_name_popup").modal();
    }
    
  function add_color(id,name,color)
  {
    $("#dailyreport_record_id").val(id);
    $("#dailyreport_record_name").val(name);
    $("#dailyreport_record_color").val(color);

    $("#color_popup").modal();
  }

    function update_yrs_of_experience(dailyreport_id,yrs_of_experience,months_of_experience)
    {
      $("#dailyreport_id_yrs_of_experience").val(dailyreport_id);
      $("#yrs_of_experience").val(yrs_of_experience);
      $("#months_of_experience").val(months_of_experience);
      $("#update_yrs_of_experience_popup").modal();
    }
    function update_relevant_exp(dailyreport_id,relevant_exp)
    {
      $("#dailyreport_id_relevant_exp").val(dailyreport_id);
      $("#relevant_exp").val(relevant_exp);
      $("#update_relevant_exp_popup").modal();
    }    
    function update_ctc(dailyreport_id,ctc,ctc_thousand)
    {
      $("#dailyreport_id_ctc").val(dailyreport_id);
      $("#ctc").val(ctc);
      $("#ctc_thousand").val(ctc_thousand);
      $("#update_ctc_popup").modal();
    }
    function update_exp_ctc(dailyreport_id,exp_ctc)
    {
      $("#dailyreport_id_exp_ctc").val(dailyreport_id);
      $("#exp_ctc").val(exp_ctc);
      $("#update_exp_ctc_popup").modal();
    }    
    function update_notice_period(dailyreport_id,notice_period)
    {
      $("#dailyreport_id_notice_period").val(dailyreport_id);
      $("#notice_period").val(notice_period);
      $("#update_notice_period_popup").modal();
    }
    function update_official_onpaper_notice_period(dailyreport_id,official_onpaper_notice_period)
    {
      $("#dailyreport_id_official_onpaper_notice_period").val(dailyreport_id);
      $("#official_onpaper_notice_period").val(official_onpaper_notice_period);
      $("#update_official_onpaper_notice_period_popup").modal();
    }    
    function update_contact_no(dailyreport_id,contact_no,sheetid)
    {
      $("#dailyreport_id_contact_no").val(dailyreport_id);
      $("#contact_no").val(contact_no);
      $("#bydefault_contact_no").val(contact_no);
      $("#sheetid").val(sheetid);
      $("#update_contact_no_popup").modal();
    }
    function update_alternate_contact_number(dailyreport_id,alternate_contact_number)
    {
      $("#dailyreport_id_alternate_contact_number").val(dailyreport_id);
      $("#alternate_contact_number").val(alternate_contact_number);
      $("#update_alternate_contact_number_popup").modal();
    }    
    function update_email_id(dailyreport_id,email_id,sheetid)
    {
      $("#dailyreport_id_email_id").val(dailyreport_id);
      $("#email_id").val(email_id);
      $("#bydefault_email_id").val(email_id);
      $("#sheetid_email_id").val(sheetid);
      $("#update_email_id_popup").modal();
    }
    function update_location(dailyreport_id,location)
    {
      $("#dailyreport_id_location").val(dailyreport_id);
      $("#location").val(location);
      $("#update_location_popup").modal();
    } 
    function update_alternate_email_id(dailyreport_id,alternate_email_id)
    {
      $("#dailyreport_id_alternate_email_id").val(dailyreport_id);
      $("#alternate_email_id").val(alternate_email_id);
      $("#update_alternate_email_id_popup").modal();
    }    


    function update_preffered_location(dailyreport_id,preffered_location)
    {
      $("#dailyreport_id_preffered_location").val(dailyreport_id);
      $("#preffered_location").val(preffered_location);
      $("#update_preffered_location_popup").modal();
    }
    function update_client_feedback(dailyreport_id,client_feedback)
    {
      $("#dailyreport_id_client_feedback").val(dailyreport_id);
      $("#client_feedback").val(client_feedback);
      $("#update_client_feedback_popup").modal();
    }    
    function update_interview_schedule(dailyreport_id,interview_schedule)
    {
      var elem = interview_schedule.split(' ');
      
      var stSplita = elem[0].split("-");
      var mon = stSplita[1];
      var day = stSplita[2];
      var year = stSplita[0];

      var stSplit = elem[1].split(":");
      var stHour = stSplit[0];
      var stMin = stSplit[1];
      
     var amPM = (stHour > 11) ? "PM" : "AM";
      if(stHour > 12) {
        stHour -= 12;
      } else if(stHour == 0) {
        stHour = "12";
      }
      if(stMin < 10) {
        stMin = "" + stMin;
      }

     var new_deadline = mon+'/'+day+'/'+year+' '+stHour+':'+stMin+' '+amPM;
      $("#dailyreport_id_interview_schedule").val(dailyreport_id);
      $("#interview_schedule").val(new_deadline);
      $("#update_interview_schedule_popup").modal();
    }   
    function update_interview_schedule_mode(dailyreport_id,interview_schedule_mode)
    {
      $("#dailyreport_id_interview_schedule_mode").val(dailyreport_id);
      $("#interview_schedule_mode").val(interview_schedule_mode);
      $("#update_interview_schedule_mode_popup").modal();
    }
    function update_final_status(dailyreport_id,final_status)
    {
      $("#dailyreport_id_final_status").val(dailyreport_id);
      $("#final_status").val(final_status);
      $("#update_final_status_popup").modal();
    }  
    function update_star_rating(dailyreport_id,star_rating)
    {
      $("#dailyreport_id_star_rating").val(dailyreport_id);
      $("#star_rating").val(star_rating);
      $("#update_star_rating_popup").modal();
    }    
    function update_client_recruiter(dailyreport_id,client_recruiter)
    {
      $("#dailyreport_id_client_recruiter").val(dailyreport_id);
      $("#client_recruiter").val(client_recruiter);
      $("#update_client_recruiter_popup").modal();
    }
    function update_sourced_by(dailyreport_id,sourced_by)
    {
      $("#dailyreport_id_sourced_by").val(dailyreport_id);
      $("#sourced_by").val(sourced_by);
      $("#update_sourced_by_popup").modal();
    } 
    function update_reason_for_job_change(dailyreport_id,reason_for_job_change)
    {
      $("#dailyreport_id_reason_for_job_change").val(dailyreport_id);
      $("#reason_for_job_change").val(reason_for_job_change);
      $("#update_reason_for_job_change_popup").modal();
    }


   function checkIDAvailability()
    {
      var base_url = "<?php echo base_url(); ?>"
       var postURL = base_url+"recruiter/recruiter/forgot_password_email_exits";

       var contact_no = $('#contact_no').val();
       var sheetid = $('#sheetid').val();
       var bydefault_contact_no = $('#bydefault_contact_no').val();
       
           $.ajax({
                            cache:false,
                            async:false,
                            type: "POST",
                            data: { contact_no:contact_no,client_id:sheetid,bydefault_contact_no:bydefault_contact_no},
                            url: postURL,
                            success: function(msg) 
                            {
                               if(msg!='TRUE')
                               {
                                 $('#does_email_exists').val(0);
                                 $('#email_msg').html('<font color="red">Contact No allready exists</font>');
                               }else{
                                   $('#does_email_exists').val(1);
                                   $('#email_msg').html('');
                               }
                            }
                    });
           
        }

        $(document).keypress(
    function(event){
     if (event.which == '13') {
        //event.preventDefault();
         checkIDAvailability();
         checkIDAvailabilityEmail();
      }


});

  function validateFP(){
        if($('#does_email_exists').val()==0){
           // $('#email_msg').html('<font color="red">Email does not exists</font>');
           alert('Contact No allready exists');
            return false;
        }
   }



   function checkIDAvailabilityEmail()
    {
      var base_url = "<?php echo base_url(); ?>"
       var postURL = base_url+"recruiter/recruiter/forgot_password_email_exits_email_id";

       var email_id = $('#email_id').val();
       var sheetid_email_id = $('#sheetid_email_id').val();
       var bydefault_email_id = $('#bydefault_email_id').val();
       
           $.ajax({
                            cache:false,
                            async:false,
                            type: "POST",
                            data: { email_id:email_id,client_id:sheetid_email_id,bydefault_email_id:bydefault_email_id},
                            url: postURL,
                            success: function(msg) 
                            {
                               if(msg!='TRUE')
                               {
                                 $('#does_email_exists_email_id').val(0);
                                 $('#email_msg_email_id').html('<font color="red">Email ID allready exists</font>');
                               }else{
                                   $('#does_email_exists_email_id').val(1);
                                   $('#email_msg_email_id').html('');
                               }
                            }
                    });
           
        }



  function validateFP_email_id(){
        if($('#does_email_exists_email_id').val()==0){
           // $('#email_msg').html('<font color="red">Email does not exists</font>');
           alert('Email ID allready exists');
            return false;
        }
   }

  function final_selection_interview_div(elem)
  {
    if(elem.value == "Offered")
    {
      $('#selected_joining_date').val('');   
      $('#selected_offered_amount').val('');    
      $('#date_of_offer_released').val('');   
      $('#grade').val('');   
      $("#div_post_year").show();   
    }
    else
    {  
      $('#selected_joining_date').val('');
      $('#selected_offered_amount').val('');  
      $('#date_of_offer_released').val('');   
      $('#grade').val('');   
      $("#div_post_year").hide();   
    }

    if(elem.value == "HR Reject" || elem.value == "HR Hold")
    { 
      $('#hr_reason').val('');
      $("#div_post_year_hr_reason").show();   
    }
    else
    {  
      $('#hr_reason').val('');  
      $("#div_post_year_hr_reason").hide();   
    }
    
  }



  function client_feedback_final_selection_interview_div(elem)
  {
    if(elem.value == "Hold")
    { 
      $('#hold_reason').val('');
      $("#hold_reason_div").show();   
    }
    else
    {  
      $('#hold_reason').val('');  
      $("#hold_reason_div").hide();   
    }
    
  }
  

$('#selected_joining_date').datepicker({
    format: 'yyyy/mm/dd'
});

$('#date_of_offer_released').datepicker({
    format: 'yyyy/mm/dd'
});

 

  function from_to_date_report_aaa(elem)
  {
          var client_id = document.getElementById("client_id_searchz").value;
          var base_url = "<?php echo base_url();?>";
        $.ajax({
          type:"POST",
          data: {client_id:client_id},
          url:base_url+"recruiter/recruiter/get_client_name_by_userid_aaa",
          success:function(data){
            if(data!='')
            {            
              $("#skillwise_report_div").show();  

              $("#skillwise_report").html(data);  


              $('#skillwise_report').multiselect({
                nonSelectedText: 'Select Skills',
                enableFiltering: true,
                enableCaseInsensitiveFiltering: true,
                buttonWidth:'200px'
               });


              $("#skillwise_report").multiselect('rebuild');
              
            }else{
              $("#skillwise_report").html('<option value="">Select Skill</option>');
            }
          }
        });
  }


  function from_to_date_report_aaa_bbb(elem)
  {
          var client_id = document.getElementById("client_id_searcha").value;
          var base_url = "<?php echo base_url();?>";
        $.ajax({
          type:"POST",
          data: {client_id:client_id},
          url:base_url+"recruiter/recruiter/get_client_name_by_userid_aaa",
          success:function(data){
            if(data!='')
            {          
              $("#skillwise_report_www").html(data);  


              /*$('#skillwise_report_www').multiselect({
                nonSelectedText: 'Select Skills',
                enableFiltering: true,
                enableCaseInsensitiveFiltering: true,
                buttonWidth:'200px'
               });*/


              $("#skillwise_report_www").multiselect('rebuild');
              
            }else{
              $("#skillwise_report_www").html('<option value="">Select Skill</option>');
            }
          }
        });
  }

  $(document).ready(function(){
    $('#skillwise_report_www').multiselect({
                nonSelectedText: 'Select Skills',
                enableFiltering: true,
                enableCaseInsensitiveFiltering: true,
                buttonWidth:'200px'
               });

     

    
})

    $('#fromdate').datepicker({
      format: 'yyyy-mm-dd'
    });

    $('#todate').datepicker({
      format: 'yyyy-mm-dd'
    });
</script>

<script>
$(document).ready(function(){
/* $('#skillwise_report').multiselect({
  nonSelectedText: 'Select Skills',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  buttonWidth:'200px'
 });*/ 
});
</script>