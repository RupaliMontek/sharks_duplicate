<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
        Job List
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Job List</a></li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        
        <div class="box">
           
            <div class="box-body">
                <a href = "<?php echo base_url('recruiter/recruiter/add_jobs');?>"><button class="btn btn-success text-right">Add</button></a>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                 <tr>
                        <th>Sr.No</th>
                        <th>Job Title</th>
                        <th>Client Name</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                </thead>
                <tbody>
                          <?php
                          if(!empty($job_list))
                          {

                            $Srno=1;
                            foreach($job_list as $row)
                            {
                              ?>
                              <tr id="tr">
                                <td><?php echo $Srno; $Srno++; ?> </td>
                                <td><?php echo @$row['title'];?></td>
                                <td><?php echo @$row['client_name'];?></td>
                 
                                <td><?php if($row['status'] == 1){echo "Active";} else{ echo "Deactive";}?></td>
                                <th><a href = "<?php echo base_url('recruiter/recruiter/edit_job/' . $row['id']);?>">Edit</a> | <a href = "<?php echo base_url('recruiter/recruiter/delete_job/' . $row['id']);?>">Delete</a></th>

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
         

<?php $this->load->view('template/footer'); ?>
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