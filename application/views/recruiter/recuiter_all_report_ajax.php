<div  id="showtable">
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
                                      <td><label><?php if(!empty($row["resume"])){ ?><a href="<?php echo base_url().$row["resume"] ?>">Link</a> <?php } else { "Resume Not Available"; } ?></label></td>
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
            </div>
            