<script type="text/javascript">
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
<style>
        / Add your own styles here /
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            max-width: 80%;
            max-height: 80%;
            overflow: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
    </style>


  <div class="content-wrapper">
    <section class="content-header">
      <h1>Report</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="javascript:void(0);">Report</a></li>
      </ol>
    </section>
    
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="panel panel-info">
              <div class="box-body">
                <?php $attributes = array('role' => 'form', 'id' => 'addUser');
                echo form_open_multipart('Recruiter_Reports/datewisedailyreport_all_recruiters', $attributes);?>
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>From Date</label>
                        <input type="text"id="fromdate" class="form-control" name="fromdate" required />
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>To Date</label>
                        <input type="text"id="todate" class="form-control" name="todate" required/>
                      </div>
                    </div>
                    
                          <?php $user_id=$this->session->userdata('user_id'); ?>
                          <?php $user_role=$this->session->userdata('user_role'); ?>

                      <?php
                        if($user_role==1 OR $user_id==127 OR $user_role==10 OR $user_role==1024 OR $user_role==1025 OR $user_role==1026 )
                        {
                          ?>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>Choose Status</label><br>
                                <select name="status" id="status" class="form-control" required>
                                  <option value="">Select Status</option>
                                  <option value="all">All</option>
                                  <option value="Shortlisted">Shortlisted</option>
                                  <option value="Select">Select</option>
                                  <option value="Joined">Joined</option>
                                  <option value="Offered">Offered</option>
                                  <option value="Offer Decline">Offer Decline</option>
                                  <option value="Screen Reject">Screen Reject</option>
                                  <option value="Duplicate">Duplicate</option>
                                  <option value="Abscond">Abscond</option>
                                </select>
                              </div>
                            </div>
                            
                             <div class="col-md-3">
                              <div class="form-group">
                                <label>Choose Client</label><br>
                                <select name="client_name" id="client_name" class="form-control">
                                  <option value="">Select Client</option>
                                  <?php foreach($clients_list as $row){ ?>
                                  <option value="<?php echo $row->client_name; ?>"><?php echo $row->client_name; ?></option>
                                  <?php }?>
                                </select>
                              </div>
                            </div>
                          <?php
                        }
                        else
                        {
                          ?>

                          <?php
                        }
                      ?>

                    

</div><div class="row">
                    <div class="col-md-12">
                      <div class="form-group ppdlyrept-p">
                        
                        <!-- <input type="submit" class="btn btn-primary" value="search" name="Search" /> -->
                        <button style="margin-right:30px;" type="submit" class="btn btn-primary pull-right" value="search" name="search"  />Search</button>
                      </div>
                    </div>
                  </div>
                </div>
                <?php echo form_close(); ?>
                <!-- <div class="form-group"> -->                  
                </div>
            </div>
          </div><!-- /.box -->
        </div><!-- /.col -->
      </div><!-- /.row -->



<div id="showtable"></div>
<?php if(!empty($search_records)){ ?>
<?php 
                   $from_date =  @$details['fromdatea'];
                   $to_date =  @$details['todatea'];
                   $employee_id =  @$details['employeea'];
                   $url = base_url();
              ?>
              <button style="float:right; margin-right:30px;" type="button" onclick="location.href='<?php echo @$url;?>recruiter/recruiter/generate_pdf_report/<?php echo $from_date."_".$to_date."_".$employee_id;?>'" class="btn btn-info print-btn-pr" >Print</button>

              <div class="row">
<div class="col-xs-12">
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                
                  <!-- DIRECT CHAT -->
                  <div class="box box-warning direct-chat direct-chat-warning">
                      <div class="panel panel-success">
                                                     <!-- <a href=""><button type="button" class="btn btn-warning btn-md pull-right btn-pr">Btn Name</button></a> -->
                                      
                <!--<input type="hidden" class="form-control" name="added_by_user_admin_id" id="added_by_user_admin_id" value="86" />-->

                <div class="panel-heading">

                    <h3 class="panel-title">Recruiter All Data Report</h3>

                </div>   
                
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                            <div class="row">
                        <div class="col-sm-6"><div class="dataTables_length" id="example2_length"><label>Show <select name="example2_length" aria-controls="example2" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div>
                        
                        <div class="col-sm-6"><div id="example2_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example2"></label></div></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                        <form action="<?php echo base_url("Recruiter_Reports/download_recruiter_report_user_input"); ?>" method="POST" >
                           <input type="hidden" name="fromdate" value="<?php echo $details['fromdatea']; ?>">
                           <input type="hidden" name="todate" value="<?php echo $details['todatea']; ?>">
                           <input type="hidden" name="status" value="<?php echo $details['status']; ?>">
                           <input type="hidden" name="client_name" value="<?php echo @$details['client_name']; ?>">
                        <div class="col-sm-12"><button style="margin-right; float:right;" class="btn btn-success" type="submit">Download</button>    </div>
                        </form>
                        </div>
                        </div>
                        
                        
                      <div class="direct-chat-messages">
                         <div id="show_candidate_resume"></div>
                        <table id="recruiter_reports" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>Sr.No</th>
                              <th>Candidate Name</th>
                              <th>Candidate Resume</th>
                              <th>Resume Upload Date</th>
                              <th>Recruiter Name</th>
                              <th>Position</th>
                              <th>Client Name</th>
                              <th>Client HR</th>
                              <th>Client Feedback</th>
                              <th>Final Status</th>
                            </tr>
                          </thead>
                            <tbody id="tbody">
                                <?php
                                if(!empty($search_records))
                                {
                                  
                                  $Srno=1;
                                  foreach($search_records as $row)
                                  {
                                    ?>
                                    <tr id="tr">
                                      <td><?php echo $Srno; $Srno++; ?> </td>
                                      <td><?php echo $row["candidate_name"] ?></td>
                                      <td><a href="#" onclick="openResumeModal(<?php echo base_url($row["resume"]) ?>)">View Resume</a>   <label><?php if(!empty($row["resume"])){ $dailyreport_id = $row["dailyreport_id"]; ?><a onclick="view_resume_candidate(<?php echo $dailyreport_id; ?>)" >Resume</a> <?php } else { "Resume Not Available"; } ?></label></td>
                                      <td><?php echo @$row['record_added_datetime'];?></td>
                                       <td><?php $user_id = $row["user_id"]; 
                                               $query= $this->db->query("select * from user_admin where user_admin_id = $user_id  ");
                                               $recruiter_details = $query->row();
                                                echo @$recruiter_details->name." ".@$recruiter_details->l_name; ?>
                                      </td>
                                      <td><?php echo $row["position_skills"] ?></td>
                                      <td><?php echo @$row['sheetname'];?></td>
                                      <td><?php echo @$row['client_recruiter'];?></td>
                                      <td> <?php echo $row['client_feedback']; ?> </td>
                                      <td> <?php echo $row['final_status']; ?> </td>
                                    </tr>                                    
                                  <?php
                                  }
                                  ?>
                                  <?php
                                }
                                ?>
                            </tbody>
                          </table>
                      </div>
                    </div>
                    </div>
                    </div>
                  </div>
            </div>

<?php } ?>

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->

<div id="resumeModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeResumeModal()">&times;</span>
        <iframe id="resumeIframe" style="width: 100%; height: 100%;" frameborder="0"></iframe>
    </div>
</div>



<?php $this->load->view('template/footer'); ?>
<!-- page script -->
<script type="text/javascript">

function openResumeModal(resumePath) 
{
    alert(resumePath);
    var resumeIframe = document.getElementById('resumeIframe');
    resumeIframe.src = base_url + encodeURIComponent(resumePath) + '&embedded=true';
    var modal = document.getElementById('resumeModal');
    modal.style.display = 'flex';
}

function closeResumeModal() 
{
    var modal = document.getElementById('resumeModal');
    modal.style.display = 'none';
}    
    
function view_resume_candidate(dailyreport_id)
{
    alert(dailyreport_id);
    var base_url = "<?php echo base_url();?>";
     $.ajax({
      url: base_url+'Recruiter_Reports/view_resume_candidate',
      type: 'POST',
      data: {dailyreport_id:dailyreport_id},
      success:function(data)
      {
        $("#show_candidate_resume").html(data);  
        $("#resume_show_candidate").modal();
      }
    });
}
  $(function () {
       // $("#example1").DataTable();
       $('#example1').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true
      });
     });  
   </script>
   <script>
    $('#fromdate').datepicker({
      format: 'yyyy-mm-dd',
      todayHighlight: true,
    });

    $('#todate').datepicker({
      format: 'yyyy-mm-dd',
      todayHighlight: true,
    });

    $(document).ready(function() { 
      $("#employee").select2({
        placeholder: "Select Employee",
        allowClear: true,

      }); 
    });
  </script>
    <!--<script type="text/javascript">
    /*function exportdata()
    {
      var fromdate=$("#fromdate").val();
      //alert(fromdate);
      var todate=$("#todate").val();
      //alert(todate);
      var employee=$("#employee").val();
      //alert(employee);
      //var myCheckboxes = new Array();
      //alert(myCheckboxes);
        //$("input:checked").each(function() {
          //myCheckboxes.push($(this).val());
        //});
      var base_url = "<?php echo base_url();?>";
       $.ajax({
          url: base_url+'dailyreport/dailyreport/exportrecord_bydate',
          type: 'POST',
          data: {data1:fromdate,data2:todate,data3:employee},
          success:function(data)
          {
            alert(data);
            
          }
    });
    }*/
  </script>-->

  <script type="text/javascript">
    function searchdata()
    {
      var fromdate=$("#fromdate").val();
      var todate=$("#todate").val();
      var status=$("#status").val();
      var client_name=$("#client_name").val();
      var base_url = "<?php echo base_url();?>";
     $.ajax({
      url: base_url+'Recruiter_Reports/searchrecord_bydate',
      type: 'POST',
      data: {fromdate:fromdate,todate:todate,status:status,client_name:client_name},
      success:function(data)
      {
        $("#showtable").html(data);            
      }
    });
   }
 </script>
 <script type="text/javascript">
      $(function () {
        // $("#example2").DataTable();
        $('#example2').DataTable({
          
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
           
          "info": true,
          "autoWidth": true,
          pageLength: 50,
          responsive: true,
        scrollY: '425px',
          scrollCollapse: true,
           stateSave: true,
        });
      });
      function changeStatus(user_admin_id,status){
        var base_url = "<?php echo base_url();?>";
        $.ajax({
          url: base_url+'user/admin_user/changeStatus',
          type: 'POST',
          data: {id:user_admin_id,status:status},
          success:function(data)
          {
            location.reload();
          }
        });
      }      

    </script>