<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Pipeline Data
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Pipeline Data</a></li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        
        <div class="box">
           
            <div class="box-body">
              <form role="form" name="export_data" id="export_data" method="POST" action="<?php echo base_url();?>pipeline/mastersheet_excel">                  
                        <input type="submit" class="btn btn-success" value="Export Excel" name="Searchd" style="margin: 15px;"/>                    

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                 <tr>
                        <th>Sr.No</th>
                        <th>Client</th>
                        <th>Position Skills</th>
                        <th>Candidate Name</th>
                        <th>DOJ</th>
                        <th>Offered CTC</th>
                        <th>Status</th>
                        <th>Date of offer released</th>
                        <th>Recruiter Name</th>
                        <th>Grade</th>
                        <th>Client Recruiter</th>
                      </tr>
                </thead>
                <tbody>
                          <?php
                          if(!empty($recordaaa))
                          {

                            $Srno=1;
                            foreach($recordaaa as $row)
                            {
                              ?>
                              <tr id="tr">
                                <td><?php echo $Srno; $Srno++; ?> </td>
                                <td><?php echo @$row['sheetname'];?></td>
                                <td><?php echo @$row['position_skills'];?></td>
                                
                                <td style="background-color:<?php echo @$row['color'];?>"><?php echo $row['candidate_name'];?></td>


                                <td><?php if($row['selected_joining_date']=="0000-00-00") { $selected_joining_date = ""; } 
                                else { $selected_joining_date = $row['selected_joining_date']; } echo @$selected_joining_date; ?></td>
                                <td><?php echo @$row['selected_offered_amount'];?></td>
                                <td><?php echo @$row['final_status'];?></td>

                                <td><?php if($row['date_of_offer_released']=="0000-00-00") { $date_of_offer_released = ""; } 
                                else { $date_of_offer_released = $row['date_of_offer_released']; } echo @$date_of_offer_released; ?></td>


                                <td><?php echo @$row['sourced_by'];?></td>
                                <td><?php echo @$row['grade'];?></td>
                                <td><?php echo @$row['client_recruiter'];?></td>

                              </tr>
                            <?php
                            }
                          }
                          ?>
                        </tbody>
              </table>
             
            </form>
              </div><!-- /.box-body -->
              </div><!-- /.box -->
              </div><!-- /.col -->
              </div><!-- /.row -->
              </section><!-- /.content -->
              </div><!-- /.content-wrapper -->
         

<?php $this->load->view('template/footer'); ?>
<!-- page script -->


 <script type="text/javascript">
     $(document).ready(function() {
var table = $('#example1').DataTable( {
stateSave: true,
scrollY: "300px",
scrollX: true,
scrollCollapse: true,
paging: true,
responsive: true,
} );
} );
    </script>