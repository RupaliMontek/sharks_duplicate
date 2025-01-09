
            <div  id="showtable">
              <?php 
                   $from_date =  @$details['fromdatea'];
                   $to_date =  @$details['todatea'];
                   $employee_id =  @$details['employeea'];
                   $url = base_url();
              ?>
              <button type="button" onclick="location.href='<?php echo @$url;?>recruiter/recruiter/generate_pdf_report/<?php echo $from_date."_".$to_date."_".$employee_id;?>'" class="btn btn-info print-btn-pr" >Print</button>

              <div class="row">


                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Clients'],
          ['Work on Client',     <?php echo count(@$Client_Requirement);?>],
          ['Shortlisted',      <?php echo count(@$Shortlisted_Candidates);?>],
          ['Select',  <?php echo count(@$Select_Candidates);?>],
          ['Joined', <?php echo count(@$Joined_Candidates);?>],
          ['Offered',    <?php echo count(@andidates);?>],
          ['Offer Decline',    <?php echo count(@$Offer_Decline_Candidates);?>],
          ['Screen Reject',    <?php echo count(@$Screen_Reject_Candidates);?>],
          ['Duplicate',    <?php echo count(@$Duplicate_Candidates);?>],
          ['Abscond',    <?php echo count(@$Abscond_Candidates);?>]
        ]);

        var options = {
          title: 'My Daily Activities',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  
   
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["Work On Clients", <?php echo count($Client_Requirement);?>, "blue"],
        ["Shortlisted", <?php echo count($Shortlisted_Candidates);?>, "red"],
        ["Select", <?php echo count($Select_Candidates);?>, "yellow"],
        ["Joined", <?php echo count($Joined_Candidates);?>, ""],
        ["Offered", <?php echo count($Offered_Candidates);?>, "color: #e5e4e2"],
        ["Offer Decline", <?php echo count($Offer_Decline_Candidates);?>, "color: #e5e4e2"],
        ["Screen Reject", <?php echo count($Screen_Reject_Candidates);?>, "color: #e5e4e2"],
        ["Duplicate", <?php echo count($Duplicate_Candidates);?>, "color: green"],
        ["Abscond", <?php echo count($Abscond_Candidates);?>, "color: #e5e4e2"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "",
        width:500,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
  <section class="content">
  <div class="panel panel-info">
       <div class="box-body">
     <div class="col-md-6">
 <div id="piechart_3d" style="width:800px; height: 500px;"></div>
 </div>
 <div class="col-md-6">
    <div id="columnchart_values"></div>
    </div>
 </div>
 </div>
 </section>

                
                <div class="col-md-4">
                  <!-- DIRECT CHAT -->
                  <div class="box box-warning direct-chat direct-chat-warning">
                    <div class="box-header with-border">
                      <h3 class="box-title">Work on Client</h3>
                      <div class="box-tools pull-right">
                        <span data-toggle="tooltip" title="3 New Messages" class="badge bg-yellow"><?php echo count($Client_Requirement); ?></span>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                      <div class="direct-chat-messages">
                        <table id="dailyreport" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>Sr.No</th>
                              <th>Client Name</th>
                              <th>Resume Uploaded</th>
                            </tr>
                          </thead>
                            <tbody id="tbody">
                                <?php
                                if(!empty($Client_Requirement))
                                {
                                  /* contact_no, email_id, selected_joining_date, selected_offered_amount */
                                  $Srno=1;
                                  foreach($Client_Requirement as $row)
                                  {
                                    ?>
                                    <tr id="tr">
                                      <td><?php echo $Srno; $Srno++; ?> </td>
                                      <td><?php echo @$row['sheetname'];?></td>
                                      <td> <?php echo @$row['total_resume'];
                                                  @$total_net_amount += @$row['total_resume']; ?> </td>
                                    </tr>                                    
                                  <?php
                                  }
                                  ?>
                                    <tr>
                                      <th></th>
                                      <th>Total Resume Count</th>
                                      <th><?php echo @$total_net_amount; ?></th>
                                    </tr>
                                  <?php
                                }
                                ?>
                            </tbody>
                          </table>
                      </div>
                    </div><!-- /.box-body -->
                  </div><!--/.direct-chat -->
                </div><!-- /.col -->

                <div class="col-md-4">
                  <!-- DIRECT CHAT -->
                  <div class="box box-warning direct-chat direct-chat-warning">
                    <div class="box-header with-border">
                      <h3 class="box-title">Shortlisted</h3>
                      <div class="box-tools pull-right">
                        <span data-toggle="tooltip" title="3 New Messages" class="badge bg-yellow"><?php echo count($Shortlisted_Candidates); ?></span>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">                     
                      <div class="direct-chat-messages">
                        <table id="dailyreport" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>Sr.No</th>
                              <th>Date</th>
                              <th>Client Name</th>
                              <th>Position Skills</th>
                              <th>Candidate Name</th>
                              <th>Client Feedback</th>
                              <th>Final Status</th>
                            </tr>
                          </thead>
                            <tbody id="tbody">
                                <?php
                                if(!empty($Shortlisted_Candidates))
                                {
                                  /* contact_no, email_id, selected_joining_date, selected_offered_amount */
                                  $Srno=1;
                                  foreach($Shortlisted_Candidates as $row)
                                  {
                                    ?>
                                    <tr id="tr">
                                      <td><?php echo $Srno; $Srno++; ?> </td>
                                      <td><?php echo @$row['date'];?></td>
                                      <td><?php echo @$row['sheetname'];?></td>
                                      <td><?php echo @$row['position_skills'];?></td>
                                      <td><?php echo @$row['candidate_name'];?></td>
                                      <td><?php echo @$row['client_feedback'];?></td>
                                      <td><?php echo @$row['final_status'];?></td>
                                    </tr>
                                  <?php
                                  }
                                }
                                ?>
                            </tbody>
                          </table>
                      </div>
                    </div><!-- /.box-body -->
                  </div><!--/.direct-chat -->
                </div><!-- /.col -->

                <div class="col-md-4">
                  <!-- DIRECT CHAT -->
                  <div class="box box-warning direct-chat direct-chat-warning">
                    <div class="box-header with-border">
                      <h3 class="box-title">Select</h3>
                      <div class="box-tools pull-right">
                        <span data-toggle="tooltip" title="3 New Messages" class="badge bg-yellow"><?php echo count($Select_Candidates); ?></span>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                      <div class="direct-chat-messages">
                        <table id="dailyreport" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>Sr.No</th>
                              <th>Date</th>
                              <th>Client Name</th>
                              <th>Position Skills</th>
                              <th>Candidate Name</th>
                              <th>Client Feedback</th>
                              <th>Final Status</th>
                            </tr>
                          </thead>
                            <tbody id="tbody">
                                <?php
                                if(!empty($Select_Candidates))
                                {
                                  /* contact_no, email_id, selected_joining_date, selected_offered_amount */
                                  $Srno=1;
                                  foreach($Select_Candidates as $row)
                                  {
                                    ?>
                                    <tr id="tr">
                                      <td><?php echo $Srno; $Srno++; ?> </td>
                                      <td><?php echo @$row['date'];?></td>
                                      <td><?php echo @$row['sheetname'];?></td>
                                      <td><?php echo @$row['position_skills'];?></td>
                                      <td><?php echo @$row['candidate_name'];?></td>
                                      <td><?php echo @$row['client_feedback'];?></td>
                                      <td><?php echo @$row['final_status'];?></td>
                                    </tr>
                                  <?php
                                  }
                                }
                                ?>
                            </tbody>
                          </table>
                      </div>
                    </div><!-- /.box-body -->
                  </div><!--/.direct-chat -->
                </div><!-- /.col -->
              </div><!-- /.row -->



              <div class="row">
                <div class="col-md-4">
                  <!-- DIRECT CHAT -->
                  <div class="box box-warning direct-chat direct-chat-warning">
                    <div class="box-header with-border">
                      <h3 class="box-title">Joined</h3>
                      <div class="box-tools pull-right">
                        <span data-toggle="tooltip" title="3 New Messages" class="badge bg-yellow"><?php echo count($Joined_Candidates); ?></span>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                      <div class="direct-chat-messages">
                        <table id="dailyreport" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>Sr.No</th>
                              <th>Date</th>
                              <th>Client Name</th>
                              <th>Position Skills</th>
                              <th>Candidate Name</th>
                              <th>Client Feedback</th>
                              <th>Final Status</th>
                            </tr>
                          </thead>
                            <tbody id="tbody">
                                <?php
                                if(!empty($Joined_Candidates))
                                {
                                  /* contact_no, email_id, selected_joining_date, selected_offered_amount */
                                  $Srno=1;
                                  foreach($Joined_Candidates as $row)
                                  {
                                    ?>
                                    <tr id="tr">
                                      <td><?php echo $Srno; $Srno++; ?> </td>
                                      <td><?php echo @$row['date'];?></td>
                                      <td><?php echo @$row['sheetname'];?></td>
                                      <td><?php echo @$row['position_skills'];?></td>
                                      <td><?php echo @$row['candidate_name'];?></td>
                                      <td><?php echo @$row['client_feedback'];?></td>
                                      <td><?php echo @$row['final_status'];?></td>
                                    </tr>
                                  <?php
                                  }
                                }
                                ?>
                            </tbody>
                          </table>
                      </div>
                    </div><!-- /.box-body -->
                  </div><!--/.direct-chat -->
                </div><!-- /.col -->

                <div class="col-md-4">
                  <!-- DIRECT CHAT -->
                  <div class="box box-warning direct-chat direct-chat-warning">
                    <div class="box-header with-border">
                      <h3 class="box-title">Offered</h3>
                      <div class="box-tools pull-right">
                        <span data-toggle="tooltip" title="3 New Messages" class="badge bg-yellow"><?php echo count($Offered_Candidates); ?></span>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                      <div class="direct-chat-messages">
                        <table id="dailyreport" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>Sr.No</th>
                              <th>Date</th>
                              <th>Client Name</th>
                              <th>Position Skills</th>
                              <th>Candidate Name</th>
                              <th>Client Feedback</th>
                              <th>Final Status</th>
                            </tr>
                          </thead>
                            <tbody id="tbody">
                                <?php
                                if(!empty($Offered_Candidates))
                                {
                                  /* contact_no, email_id, selected_joining_date, selected_offered_amount */
                                  $Srno=1;
                                  foreach($Offered_Candidates as $row)
                                  {
                                    ?>
                                    <tr id="tr">
                                      <td><?php echo $Srno; $Srno++; ?> </td>
                                      <td><?php echo @$row['date'];?></td>
                                      <td><?php echo @$row['sheetname'];?></td>
                                      <td><?php echo @$row['position_skills'];?></td>
                                      <td><?php echo @$row['candidate_name'];?></td>
                                      <td><?php echo @$row['client_feedback'];?></td>
                                      <td><?php echo @$row['final_status'];?></td>
                                    </tr>
                                  <?php
                                  }
                                }
                                ?>
                            </tbody>
                          </table>
                      </div>
                    </div><!-- /.box-body -->
                  </div><!--/.direct-chat -->
                </div><!-- /.col -->


                <div class="col-md-4">
                  <!-- DIRECT CHAT -->
                  <div class="box box-warning direct-chat direct-chat-warning">
                    <div class="box-header with-border">
                      <h3 class="box-title">Offer Decline</h3>
                      <div class="box-tools pull-right">
                        <span data-toggle="tooltip" title="3 New Messages" class="badge bg-yellow"><?php echo count($Offer_Decline_Candidates); ?></span>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                      <div class="direct-chat-messages">
                        <table id="dailyreport" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>Sr.No</th>
                              <th>Date</th>
                              <th>Client Name</th>
                              <th>Position Skills</th>
                              <th>Candidate Name</th>
                              <th>Client Feedback</th>
                              <th>Final Status</th>
                            </tr>
                          </thead>
                            <tbody id="tbody">
                                <?php
                                if(!empty($Offer_Decline_Candidates))
                                {
                                  /* contact_no, email_id, selected_joining_date, selected_offered_amount */
                                  $Srno=1;
                                  foreach($Offer_Decline_Candidates as $row)
                                  {
                                    ?>
                                    <tr id="tr">
                                      <td><?php echo $Srno; $Srno++; ?> </td>
                                      <td><?php echo @$row['date'];?></td>
                                      <td><?php echo @$row['sheetname'];?></td>
                                      <td><?php echo @$row['position_skills'];?></td>
                                      <td><?php echo @$row['candidate_name'];?></td>
                                      <td><?php echo @$row['client_feedback'];?></td>
                                      <td><?php echo @$row['final_status'];?></td>
                                    </tr>
                                  <?php
                                  }
                                }
                                ?>
                            </tbody>
                          </table>
                      </div>
                    </div><!-- /.box-body -->
                  </div><!--/.direct-chat -->
                </div><!-- /.col -->
              </div><!-- /.row -->


              <div class="row">
                <div class="col-md-4">
                  <!-- DIRECT CHAT -->
                  <div class="box box-warning direct-chat direct-chat-warning">
                    <div class="box-header with-border">
                      <h3 class="box-title">Screen Reject</h3>
                      <div class="box-tools pull-right">
                        <span data-toggle="tooltip" title="3 New Messages" class="badge bg-yellow"><?php echo count($Screen_Reject_Candidates); ?></span>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                      <div class="direct-chat-messages">
                        <table id="dailyreport" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>Sr.No</th>
                              <th>Date</th>
                              <th>Client Name</th>
                              <th>Position Skills</th>
                              <th>Candidate Name</th>
                              <th>Client Feedback</th>
                              <th>Final Status</th>
                            </tr>
                          </thead>
                            <tbody id="tbody">
                                <?php
                                if(!empty($Screen_Reject_Candidates))
                                {
                                  /* contact_no, email_id, selected_joining_date, selected_offered_amount */
                                  $Srno=1;
                                  foreach($Screen_Reject_Candidates as $row)
                                  {
                                    ?>
                                    <tr id="tr">
                                      <td><?php echo $Srno; $Srno++; ?> </td>
                                      <td><?php echo @$row['date'];?></td>
                                      <td><?php echo @$row['sheetname'];?></td>
                                      <td><?php echo @$row['position_skills'];?></td>
                                      <td><?php echo @$row['candidate_name'];?></td>
                                      <td><?php echo @$row['client_feedback'];?></td>
                                      <td><?php echo @$row['final_status'];?></td>
                                    </tr>
                                  <?php
                                  }
                                }
                                ?>
                            </tbody>
                          </table>
                      </div>
                    </div><!-- /.box-body -->
                  </div><!--/.direct-chat -->
                </div><!-- /.col -->


                <div class="col-md-4">
                  <!-- DIRECT CHAT -->
                  <div class="box box-warning direct-chat direct-chat-warning">
                    <div class="box-header with-border">
                      <h3 class="box-title">Duplicate</h3>
                      <div class="box-tools pull-right">
                        <span data-toggle="tooltip" title="3 New Messages" class="badge bg-yellow"><?php echo count($Duplicate_Candidates); ?></span>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                      <div class="direct-chat-messages">
                        <table id="dailyreport" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>Sr.No</th>
                              <th>Date</th>
                              <th>Client Name</th>
                              <th>Position Skills</th>
                              <th>Candidate Name</th>
                              <th>Client Feedback</th>
                              <th>Final Status</th>
                            </tr>
                          </thead>
                            <tbody id="tbody">
                                <?php
                                if(!empty($Duplicate_Candidates))
                                {
                                  /* contact_no, email_id, selected_joining_date, selected_offered_amount */
                                  $Srno=1;
                                  foreach($Duplicate_Candidates as $row)
                                  {
                                    ?>
                                    <tr id="tr">
                                      <td><?php echo $Srno; $Srno++; ?> </td>
                                      <td><?php echo @$row['date'];?></td>
                                      <td><?php echo @$row['sheetname'];?></td>
                                      <td><?php echo @$row['position_skills'];?></td>
                                      <td><?php echo @$row['candidate_name'];?></td>
                                      <td><?php echo @$row['client_feedback'];?></td>
                                      <td><?php echo @$row['final_status'];?></td>
                                    </tr>
                                  <?php
                                  }
                                }
                                ?>
                            </tbody>
                          </table>
                      </div>
                    </div><!-- /.box-body -->
                  </div><!--/.direct-chat -->
                </div><!-- /.col -->

                <div class="col-md-4">
                  <!-- DIRECT CHAT -->
                  <div class="box box-warning direct-chat direct-chat-warning">
                    <div class="box-header with-border">
                      <h3 class="box-title">Abscond</h3>
                      <div class="box-tools pull-right">
                        <span data-toggle="tooltip" title="3 New Messages" class="badge bg-yellow"><?php echo count($Abscond_Candidates); ?></span>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                      <div class="direct-chat-messages">
                        <table id="dailyreport" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>Sr.No</th>
                              <th>Date</th>
                              <th>Client Name</th>
                              <th>Position Skills</th>
                              <th>Candidate Name</th>
                              <th>Client Feedback</th>
                              <th>Final Status</th>
                            </tr>
                          </thead>
                            <tbody id="tbody">
                                <?php
                                if(!empty($Abscond_Candidates))
                                {
                                  /* contact_no, email_id, selected_joining_date, selected_offered_amount */
                                  $Srno=1;
                                  foreach($Abscond_Candidates as $row)
                                  {
                                    ?>
                                    <tr id="tr">
                                      <td><?php echo $Srno; $Srno++; ?> </td>
                                      <td><?php echo @$row['date'];?></td>
                                      <td><?php echo @$row['sheetname'];?></td>
                                      <td><?php echo @$row['position_skills'];?></td>
                                      <td><?php echo @$row['candidate_name'];?></td>
                                      <td><?php echo @$row['client_feedback'];?></td>
                                      <td><?php echo @$row['final_status'];?></td>
                                    </tr>
                                  <?php
                                  }
                                }
                                ?>
                            </tbody>
                          </table>
                      </div>
                    </div><!-- /.box-body -->
                  </div><!--/.direct-chat -->
                </div><!-- /.col -->
                
              </div><!-- /.row -->

            </div>