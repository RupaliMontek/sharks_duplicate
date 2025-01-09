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
                <?php //$attributes = array('role' => 'form', 'id' => 'addUser');
             //   echo form_open_multipart('recruiter/recruiter/full_excel', $attributes);?>
                             <form class="form-horizontal" name="search_room" id="search_room" action="<?php echo base_url();?>recruiter/recruiter/full_excel_datewise" method="POST">
   
                <!--form class="form-horizontal" name="search_room" id="search_room" action="<?php echo base_url();?>recruiter/recruiter/full_excel" method="POST">
<label class="control-label col-md-12">D/W Full Individual Report</label--> 
<input type="hidden" name="user_idq" id="user_idq" value="<?php echo $this->session->userdata('user_id'); ?>">

<!--/form-->
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
                        if($user_role==1 OR $user_id==127 OR $user_role==10)
                        {
                          ?>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>Choose Employee</label><br>
                                <select name="employee" id="employee" class="form-control" required>
                                  <option value="">Select Employee</option>
                                  <?php foreach($employee as $val) { ?>                        
                                    <option value="<?php echo  $val['user_admin_id']?>"><?php echo $val['name']." ".$val['l_name'];?></option>
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

                    


                    <div class="col-md-3">
                      <div class="form-group ppdlyrept-p">
                        <label></label>
                        
                        <!-- <input type="submit" class="btn btn-primary" value="search" name="Search" /> -->
                        <input type="button" class="btn btn-primary pull-right" value="search" name="search" onclick="searchdata()" />
                      </div>
                    </div>
                  </div>
                </div>
                
                
                <?php // echo form_close(); ?>
                <!-- <div class="form-group"> -->   
                


<input type="hidden" name="user_idq" id="user_idq" value="<?php echo $this->session->userdata('user_id'); ?>">
<div class="col-md-5 mar_top_0">
<input type="submit" class="btn btn-success" value="Export Excel" name="Search" /> 
</div>
</form>


                </div>
                <form class="form-horizontal" name="search_room" id="search_room" action="<?php echo base_url();?>recruiter/recruiter/full_excel" method="POST">
<div class="row">
<div class="col-md-3">
<label class="control-label col-md-12">D/W Full Individual Report</label> 
<input type="hidden" name="user_idq" id="user_idq" value="<?php echo $this->session->userdata('user_id'); ?>">
</div>
<div class="col-md-5">
<input type="submit" class="btn btn-success" value="Click me for D/W full report" name="Search" /> 
</div>
</div>
</form>
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

  <script type="text/javascript">
    function searchdata()
    {
      var fromdate=$("#fromdate").val();
      var todate=$("#todate").val();
      var employee=$("#employee").val();
      var base_url = "<?php echo base_url();?>";

     $.ajax({
      url: base_url+'recruiter/recruiter/searchrecord_bydate',
      type: 'POST',
      data: {fromdate:fromdate,todate:todate,employee:employee},
      success:function(data)
      {
        $("#showtable").html(data);            
      }
    });
   }
 </script>