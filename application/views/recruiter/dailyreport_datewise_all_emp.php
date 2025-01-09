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


  <div class="content-wrapper">
    <section class="content-header">
      <h1> Consolidated Report</h1>
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
                echo form_open_multipart('Recruiter_Reports/download_all_employee_daily_resume_upload_by_date', $attributes);?>
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Date</label>
                        <input type="text" id="todays_date" class="form-control" name="todays_date" required />
                      </div>
                    </div>
                    
                    <div class="col-md-3">
                      <div class="form-group ppdlyrept-p">
                        <label></label>
                        <!-- <input type="submit" class="btn btn-primary" value="search" name="Search" /> -->
                        <input type="submit" class="btn btn-primary pull-right" value="search" name="search" />
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


    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->


<?php $this->load->view('template/footer'); ?>
<!-- page script -->
<script type="text/javascript">
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
    $('#todays_date').datepicker({
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
        allowClear: true

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

  