<link rel="stylesheet" href="<?php echo base_url();?>frontend/kendo.common-material.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>frontend/kendo.material.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>frontend/kendo.material.mobile.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>frontend/font-awesome.min.css">

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
.print-btn-pr
{
  margin-bottom:20px; 
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
</script>


      <div class="content-wrapper">
        <!-- <section class="content-header">
          <h1>
           Daily Report
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="javascript:void(0);">Daily Report</a></li>
          </ol>
        </section> -->

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <!-- <div class="box">     
                 <div class="box box-solid box-info">              
          <?php /* if($this->session->flashdata('success') != '') { ?>
          <div class="alert alert-success" id="successMessage2"><i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('success'); ?>
            <button type="button" class="close" id="btn-alert-success" onclick="closeSuccess2()" >&times;</button>
          </div>
          <?php } ?>

          <?php if($this->session->flashdata('error') != '') {?>
          <div class="alert alert-danger" id="errorMessage2"><i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('error'); ?>
            <button type="button" class="close" id="btn-alert-success" onclick="closeError2()" >&times;</button>
          </div>
          <?php } ?>
         
                <div class="box-body ">
                  <?php $attributes = array('role' => 'form', 'id' => 'add_file_type', 'enctype'=>'multipart/form-data');
                  echo form_open_multipart('recruiter/recruiter/exceldataadd', $attributes);?>
                  
                 <div class="row">
                    <div class="col-md-2">
                  <label>Import File</label> 
                  </div>
                  <div class="col-md-4">                       
                  <input type="file" name="userfile" id="userfile" class="form-control" >
                  </div>
                  <div class="col-md-2">
                  <input type="submit" class="btn btn-success" value="Submit" name="upload" />                          
                  </div>
                </div> 
                <br>
                <?php echo form_close(); */ ?>
           </div>
        </div>
      </div> -->
   <div class="box">
       <div class="box box-solid box-info">
        <?php  $user_role = $this->session->userdata('user_role');  if($user_role==2 OR $user_role==9) {  ?>
          <div class="box-header with-border">
            <h3 class="box-title btn btn-warning btn-md pull-center"><a  href="<?php echo base_url();?>demo_file/recruiter_format.xls">Download Daily Report Demo File</a></h3>         
            <a href="<?php echo base_url();?>recruiter/recruiter/add"><button type="button" class="btn btn-warning btn-md pull-right"  >Add Individual Report</button></a>
          </div>
        <?php } ?>

  <div class="row ppformcssp-p">
      <div class="col-md-4">
      <form class="form-horizontal" name="search_room" id="search_room" action="<?php echo base_url();?>recruiter/recruiter/search_details" method="POST">
      <div class="box-body">
            <label class="control-label col-md-12">Clientwise Search Result</label> 
              <div class="col-md-8">                       
                <select name="client_id_search" id="client_id_search" class="form-control" required>
                  <option value="">Select</option>
                  <?php foreach($client_list as $row) { ?>
                    <option value="<?php echo $row['client_id']; ?>" <?php if($row['client_id']==@$client_id_search) { ?> selected <?php } ?> ><?php echo $row['client_name']; ?></option>
                    <?php } ?>
                </select>
              </div>
              <div class="col-md-4">
                <input type="submit" class="btn btn-success" value="Search" name="Search" /> 
              </div>
      </div>
      </form>
      </div>

      <?php $user_role = $this->session->userdata('user_role'); if($user_role==2 OR $user_role==9) { ?>
      <div class="col-md-4">
      <form class="form-horizontal" name="search_room" id="search_room" action="<?php echo base_url();?>recruiter/recruiter/excel" method="POST">
        <div class="box-body">
            <label class="control-label col-md-12">Download Individual Report</label> 
              <div class="col-md-8">                       
                <select name="client_id_search" id="client_id_search" class="form-control" required>
                  <option value="">Select</option>
                  <?php foreach($client_list as $row) { ?>
                    <option value="<?php echo $row['client_id']; ?>" <?php if($row['client_id']==@$client_id_search) { ?> selected <?php } ?> ><?php echo $row['client_name']; ?></option>
                    <?php } ?>
                </select>
              </div>
              <div class="col-md-4">
                <input type="submit" class="btn btn-success" value="Export Excel" name="Search" /> 
              </div>

            </div>
      </form>
      </div>
    <?php } ?>

      <?php 
          $user_role = $this->session->userdata('user_role'); 
          if($user_role==2 OR $user_role==5) {
      ?>
      <div class="col-md-4">
      <form class="form-horizontal" name="search_room" id="search_room" action="<?php echo base_url();?>recruiter/recruiter/mastersheet_excel" method="POST">
        <div class="box-body">
            <label class="control-label col-md-12">Download Mastersheet Report</label> 
              <div class="col-md-8">                       
                <select name="client_id_search" id="client_id_search" class="form-control" required>
                  <option value="">Select</option>
                  <?php foreach($client_list as $row) { ?>
                    <option value="<?php echo $row['client_id']; ?>" <?php if($row['client_id']==@$client_id_search) { ?> selected <?php } ?> ><?php echo $row['client_name']; ?></option>
                    <?php } ?>
                </select>
              </div>
              <div class="col-md-4">
                <input type="submit" class="btn btn-success" value="Export Excel" name="Search" /> 
              </div>

            </div>
      </form>
      </div>
      <?php } ?>

</div>








<div class="row ppformcssp-p">
      
        <form class="form-horizontal" name="individual_report_form_date" id="individual_report_form_date" action="<?php echo base_url();?>recruiter/recruiter/individual_excel_report" method="POST">

          <!-- <form class="form-horizontal" name="individual_report_form_date_search" id="individual_report_form_date_search" action="<?php echo base_url();?>recruiter/recruiter/individual_report_form_date_search_details" method="POST"> -->

    <?php $user_role = $this->session->userdata('user_role'); if($user_role==5) { ?>
      <div class="col-md-3">
        <div class="box-body">
            <label class="control-label col-md-12">Download Recruiter Individual Report</label> 
              <div class="col-md-8">                       
                <select name="individual_report_id" id="individual_report_id" class="form-control" onchange="from_to_date_report(this)" required>
                  <option value="">Select Employee</option>
                  <?php foreach($recruiter_tl_list as $row) { ?>
<option value="<?php echo $row['user_admin_id']; ?>" <?php if($row['user_admin_id']==@$emp_id) { ?> selected <?php } ?> ><?php echo $row['name']." ".$row['l_name']; ?></option>
                    <?php } ?>
                </select>
              </div>
            </div>
      </div>
    <?php } ?>
 
 <div id="datewise_rec_report">

     <div class="col-md-3" id="abcd">
        <div class="box-body">
            <label class="control-label col-md-12">Client List</label> 
              <div class="col-md-8"> 
                <?php if(!empty($select_client)) { ?>
                  <select name="client_id_by_userid" id="client_id_by_userid" class="form-control" required>
                    <option value="">Select Client</option>  
                    <?php foreach($select_client as $row) { ?>                                            
                      <option value="<?php echo $row['sheetid']; ?>" <?php if($row['sheetid']==@$client_id_by_useridq) { ?> selected <?php } ?> ><?php echo $row['sheetname']; ?></option>
                    <?php } ?>
                  </select>
                <?php } else { ?>
                  <select name="client_id_by_userid" id="client_id_by_useridcc" class="form-control" required>
                    <option value="">Select Client</option>                  
                  </select>
                <?php } ?>
              </div>
            </div>
      </div>



      <div class="col-md-2">
        <div class="box-body">
            <label class="control-label col-md-12">From</label> 
              <div class="col-md-12">                       
                <input type="text" id="fromdate" class="form-control" value="<?php echo @$aaafromdate; ?>" name="fromdate" />
              </div>
            </div>
      </div>

      <div class="col-md-4">    
        <div class="box-body">
            <label class="control-label col-md-12">To</label> 
              <div class="col-md-6">  
                <input type="text" id="todate" class="form-control" value="<?php echo @$aaatodate; ?>" name="todate" />
              </div>
              <div class="col-md-6">
                <input type="submit" class="btn btn-success" value="View" name="Search">
                <input type="submit" class="btn btn-success" value="Export Excel" name="Search">
              </div>
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

            <?php if($this->session->flashdata('errorss') != '') {?>
            <div class="alert alert-success" id="successMessage2"><i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('errorss'); ?>
              <button type="button" class="close" id="btn-alert-success" onclick="closeSuccess2()" >&times;</button>
            </div>
            <?php } ?>
            <?php if($this->session->flashdata('erroraa') != '') {?>
          <div class="alert alert-danger" id="errorMessage2"><i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('erroraa'); ?>
            <button type="button" class="close" id="btn-alert-success" onclick="closeError2()" >&times;</button>
          </div>
          <?php } ?>

               <?php $attributes = array('role' => 'form', 'id' => 'addAcademicYear');
                  echo form_open_multipart('recruiter/recruiter/send_email', $attributes);
                  ?>
                  <?php if(!empty($list_dailyreport)) { ?>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Sr.No</th>
                        <th>Date</th>
                        <th>Company/Client</th>                       
                        <th>Position/Skills</th>
                        <th>CandidateName</th>
                        <th>ContactNo</th>
                        <th>EmailID</th>
                      </tr>
                    </thead>

                     <tbody>
                          <?php
                          
                          if(!empty($list_dailyreport))
                          {
                             $Srno=1;
                            foreach($list_dailyreport as $row)
                            {
                              ?>
                              <tr>
                                <td> <?php echo $Srno; $Srno++; ?> </td>
                                <td><?php echo $da = date("d-m-Y", strtotime($row['date']));?></td>
                                <td><?php echo $row['sheetname']; ?></td>
                                <td><?php echo $row['position_skills'];?></td>
                                <td><?php echo $row['candidate_name'];?></td>
                                <td><?php echo $row['contact_no'];?></td>
                                <td><?php echo $row['email_id'];?></td>
                              </tr>
                            <?php
                           }
                          }
                          ?>
                        </tbody>
                  </table>
                  <?php } ?>
                <?php if(!empty($list_dailyreport)){ ?>
                  <p>
                  <?php 
                    $url = base_url();
                     $emp_id =  @$emp_id;
                     $client_id_by_useridq =  @$client_id_by_useridq;
                     $aaafromdate =  @$aaafromdate;
                     $aaatodate =  @$aaatodate;
                  ?>

             <button type="button" onclick="location.href='<?php echo @$url;?>recruiter/recruiter/generate_selected_individual_pdf_report/<?php echo @$emp_id."_".@$client_id_by_useridq."_".@$aaafromdate."_".@$aaatodate;?>'" class="btn btn-info print-btn-pr" >Print</button>

                  </p>
                  <?php } else { ?>
                  <?php } ?>
                 <?php echo form_close(); ?>        
                  
                 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
 
      










     

<?php $this->load->view('template/footer'); ?>
<script type="text/javascript" src="<?php echo base_url();?>frontend/kendo.all.min.js"></script>

<!-- accept:'xls|xlsx' -->
<script type="text/javascript">

$('#dateqq').datepicker({

    format: 'yyyy/mm/dd'

});

$("#interview_schedule").kendoDateTimePicker({                        
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
  
    $('#fromdate').datepicker({
      format: 'yyyy-mm-dd'
    });

    $('#todate').datepicker({
      format: 'yyyy-mm-dd'
    });

  function from_to_date_report(elem)
  {
          var individual_report_id = document.getElementById("individual_report_id").value;
          var base_url = "<?php echo base_url();?>";
        $.ajax({
          type:"POST",
          data: {individual_report_id:individual_report_id},
          url:base_url+"recruiter/recruiter/get_client_name_by_userid",
          success:function(data){
            if(data!='')
            {
              $("#client_id_by_userid").html(data);

            }else{
              $("#client_id_by_userid").html('<option value="">Select Client</option>');
            }


          }
        });

    $("#datewise_rec_report").show();   
  }
 
 
</script>

