
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     Candidate Details
   </h1>
   <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Candidate Details</a></li>

  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">


     <!-- Main content -->
     <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Candidate Details</h3>
              <button type="button" class="btn btn-primary btn-lg" id="backb" >BACK</button>
              <!--<a href="<?php echo base_url();?>recruiter/recruiter/"><button type="button" class="btn btn-primary btn-lg" >BACK</button></a>-->
            </div><!-- /.box-header -->
            <div class="box-body">
              <div class="box box-warning">
                <div class="box-body">
                  <!-- <form role="form"> -->
                  <?php $attributes = array('role' => 'form', 'id' => 'editCustomer');
                  echo form_open_multipart('tabs/tabs/update_customer', $attributes);
                  ?>

                  <?php 
                  if(!empty($record)){
                    ?>

                    <div class="row"> 
                        <div class="col-sm-2">
                          <label>Sheet Name</label>
                        </div>
                        <div class="col-sm-2">
                          <input type="text" readonly class="form-control" value="<?php echo $record->sheetname; ?>" />
                        </div>
                    </div><br>

                    <div class="row"> 
                        <div class="col-sm-2">
                          <label>Client Name</label>
                        </div>
                        <div class="col-sm-2">
                          <input type="text" readonly class="form-control" value="<?php echo $record->company_client; ?>" />
                        </div>

                        <div class="col-sm-2">
                          <label>Added by</label>
                        </div>
                        <div class="col-sm-2">
                          <input type="text" readonly class="form-control" value="<?php echo $record->name." ".$record->l_name; ?>" />
                        </div>

                        <div class="col-sm-2">
                        <label>Date</label>
                        </div>
                        <div class="col-sm-2">
                          <input type="text" readonly class="form-control" value="<?php echo $record->date; ?>" />
                        </div>
                    </div><br>

                    <div class="row"> 
                        <div class="col-sm-2">
                          <label>Company / Client</label>
                        </div>
                        <div class="col-sm-2">
                          <input type="text" readonly class="form-control" value="<?php echo $record->company_client; ?>" />
                        </div>

                        <div class="col-sm-2">
                          <label>Position / Skills</label>
                        </div>
                        <div class="col-sm-2">
                          <input type="text" readonly class="form-control" value="<?php echo $record->position_skills; ?>" />
                        </div>

                        <div class="col-sm-2">
                        <label>RP ID</label>
                        </div>
                        <div class="col-sm-2">
                          <input type="text" readonly class="form-control" value="<?php echo $record->rp_id; ?>" />
                        </div>
                    </div><br>

                    <div class="row"> 
                        <div class="col-sm-2">
                          <label>Candidate Name</label>
                        </div>
                        <div class="col-sm-2">
                          <input type="text" readonly class="form-control" value="<?php echo $record->candidate_name; ?>" />
                        </div>

                        <div class="col-sm-2">
                          <label>Applicant ID</label>
                        </div>
                        <div class="col-sm-2">
                          <input type="text" readonly class="form-control" value="<?php echo $record->applicant_id; ?>" />
                        </div>

                        <div class="col-sm-2">
                        <label>Role</label>
                        </div>
                        <div class="col-sm-2">
                          <input type="text" readonly class="form-control" value="<?php echo $record->role; ?>" />
                        </div>
                    </div><br>

                    <div class="row"> 
                        <div class="col-sm-2">
                          <label>Qulification</label>
                        </div>
                        <div class="col-sm-2">
                          <input type="text" readonly class="form-control" value="<?php echo $record->qulification; ?>" />
                        </div>

                        <div class="col-sm-2">
                          <label>Company Name</label>
                        </div>
                        <div class="col-sm-2">
                          <input type="text" readonly class="form-control" value="<?php echo $record->company_name; ?>" />
                        </div>

                        <div class="col-sm-2">
                        <label>Experience Yrs.</label>
                        </div>
                        <div class="col-sm-2">
                          <input type="text" readonly class="form-control" value="<?php echo $record->yrs_of_experience; ?>" />
                        </div>
                    </div><br>

                    <div class="row"> 
                        <div class="col-sm-2">
                          <label>Relevant Exp.</label>
                        </div>
                        <div class="col-sm-2">
                          <input type="text" readonly class="form-control" value="<?php echo $record->relevant_exp; ?>" />
                        </div>

                        <div class="col-sm-2">
                          <label>CTC</label>
                        </div>
                        <div class="col-sm-2">
                          <input type="text" readonly class="form-control" value="<?php echo $record->ctc; ?>" />
                        </div>

                        <div class="col-sm-2">
                        <label>Exp. CTC</label>
                        </div>
                        <div class="col-sm-2">
                          <input type="text" readonly class="form-control" value="<?php echo $record->exp_ctc; ?>" />
                        </div>
                    </div><br>

                    <div class="row"> 
                        <div class="col-sm-2">
                          <label>Notice Period</label>
                        </div>
                        <div class="col-sm-2">
                          <input type="text" readonly class="form-control" value="<?php echo $record->notice_period; ?>" />
                        </div>

                        <div class="col-sm-2">
                          <label>Onpaper Notice Period</label>
                        </div>
                        <div class="col-sm-2">
                          <input type="text" readonly class="form-control" value="<?php echo $record->official_onpaper_notice_period; ?>" />
                        </div>

                        <div class="col-sm-2">
                        <label>Contact No</label>
                        </div>
                        <div class="col-sm-2">
                          <input type="text" readonly class="form-control" value="<?php echo $record->contact_no; ?>" />
                        </div>
                    </div><br>

                    <div class="row"> 
                        <div class="col-sm-2">
                          <label>Alternate Number</label>
                        </div>
                        <div class="col-sm-2">
                          <input type="text" readonly class="form-control" value="<?php echo $record->alternate_contact_number; ?>" />
                        </div>

                        <div class="col-sm-2">
                          <label>Email ID</label>
                        </div>
                        <div class="col-sm-2">
                          <input type="text" readonly class="form-control" value="<?php echo $record->email_id; ?>" />
                        </div>

                        <div class="col-sm-2">
                        <label>Current Location</label>
                        </div>
                        <div class="col-sm-2">
                          <input type="text" readonly class="form-control" value="<?php echo $record->location; ?>" />
                        </div>
                    </div><br>

                    <div class="row"> 
                        <div class="col-sm-2">
                          <label>Preffered Location</label>
                        </div>
                        <div class="col-sm-2">
                          <input type="text" readonly class="form-control" value="<?php echo $record->preffered_location; ?>" />
                        </div>

                        <div class="col-sm-2">
                          <label>Client Deedback</label>
                        </div>
                        <div class="col-sm-2">
                          <input type="text" readonly class="form-control" value="<?php echo $record->client_feedback; ?>" />
                        </div>

                        <div class="col-sm-2">
                        <label>Interview Schedule</label>
                        </div>
                        <div class="col-sm-2">
                          <input type="text" readonly class="form-control" value="<?php echo $record->interview_schedule; ?>" />
                        </div>
                    </div><br>

                    <div class="row"> 
                        <div class="col-sm-2">
                          <label>Final Status</label>
                        </div>
                        <div class="col-sm-2">
                          <input type="text" readonly class="form-control" value="<?php echo $record->final_status; ?>" />
                        </div>

                        <div class="col-sm-2">
                          <label>Client Recruiter</label>
                        </div>
                        <div class="col-sm-2">
                          <input type="text" readonly class="form-control" value="<?php echo $record->client_recruiter; ?>" />
                        </div>

                        <div class="col-sm-2">
                        <label>Sourced by</label>
                        </div>
                        <div class="col-sm-2">
                          <input type="text" readonly class="form-control" value="<?php echo $record->sourced_by; ?>" />
                        </div>
                    </div><br>

                    <div class="row"> 
                        <div class="col-sm-2">
                          <label>Reason for job change/Remark</label>
                        </div>
                        <div class="col-sm-2">
                          <input type="text" readonly class="form-control" value="<?php echo $record->reason_for_job_change; ?>" />
                        </div> 
                        <div class="col-sm-2">
                          <label>Transfer Candidate Comment</label>
                        </div>
                        <div class="col-sm-2">
                          <input type="text" readonly class="form-control" value="<?php echo $record->sr_no; ?>" />
                        </div>
                    </div><br>


                    <!-- </form> -->
                    <?php } ?>

                    <?php echo form_close( ); ?>


                  </div><!-- /.box-body -->
                </div><!-- /.box -->

              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </section><!-- /.content -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->


<?php $this->load->view('template/footer'); ?>
<script type="text/javascript">
	
		$("#backb").on('click',function(){
			window.location = "<?php echo base_url();?>admin#recruitment_interview";
		});
	
</script>
