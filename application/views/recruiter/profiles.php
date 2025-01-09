
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Profiles

    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="javascript:void(0);">Profiles</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">


        <div class="box">
          <div class="box box-solid box-primary">

            <div class="box-header with-border">

              <h3 class="box-title">Profile List</h3>
            
            </div>


            <?php $user_role=$this->session->userdata('user_role');
            
                if($user_role==1 || $user_role==2)
                {
            ?>
            
            <div class="box-body">
                <?php $attributes = array('role' => 'form', 'id' => 'addUser');
                echo form_open_multipart('task/task/searchrecord_bydate', $attributes);?>
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Position Skill</label><br>
                        <input type="text" id="position_skill" class="form-control" name="position_skill" placeholder="Enter position skill">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group" id="emp_by_dept">
                      <label>Select Location</label><br>
                      <select name="location" id="location" class="form-control">
                        <option value="">Select Location</option>
                        <?php  foreach ($locations as $val) { ?>
                        <option value="<?php echo $val->location;?>"><?php echo $val->location; ?></option>
                        <?php }  ?>
                      </select> 

                      </div>
                    </div>

                    
                     <div class="col-md-2">
                      <div class="form-group">
                        <label>Experience</label>
                        <input type="number" id="experience" class="form-control" name="experience" min="0">
                      </div>
                    </div>
               
                  </div>
                </div>



                <?php echo form_close(); ?>
                 <div class="form-group">                   
                 </div> 


             </div> 

             <?php } ?>



            <div class="box-body ">
               <div id="showtable">
              <table id="example1" class="table table-bordered table-striped ">
                <thead>
                  <tr>
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
                  </tr>
                </thead>

                
              </table>

              </div>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->


<?php $this->load->view('template/footer'); ?>
<!-- page script -->
<script type="text/javascript">

$(document).ready(function() {
    var table = $('#example1').DataTable({
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        //'searching': false, // Remove default Search Control
        'ajax': {
            'url':'<?php echo base_url(); ?>profiles/profileList',
            'data': function(data){
                data.position_skill = $('#position_skill').val();
                data.loc = $('#location').val();
                data.experience = $('#experience').val();
            }
        },
        'columns': [
            { data: 'dailyreport_id' },
            { data: 'candidate_name' },
            { data: 'sourced_by' },
            { data: 'company_client' },
            { data: 'date' },
            { data: 'position_skills' },
            { data: 'qulification' },
            { data: 'yrs_of_experience' },
            { data: 'ctc' },
            { data: 'exp_ctc' },
            { data: 'notice_period' },
            { data: 'official_onpaper_notice_period' },
            { data: 'contact_no' },
            { data: 'email_id' },
            { data: 'location' },
            { data: 'preffered_location' },
            { data: 'client_feedback' },
            { data: 'interview_schedule' },
            { data: 'interview_schedule_mode' },
            { data: 'final_status' },
            { data: 'client_recruiter' },
            { data: 'resume' },
        ],
        scrollY:        "300px",
        scrollX:        true,
        scrollCollapse: true,
        paging:         true,
        fixedColumns:   {
            leftColumns: 2,
            //rightColumns: 1
        }
    });
    
    $('#location').change(function(){
   		table.draw();
   	});
   	$('#position_skill,#experience').keyup(function(){
   		table.draw();
   	});
});

</script>

