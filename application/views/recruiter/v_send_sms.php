<script type="text/javascript">

  //function for delete 
  function deleteConfirm(id)
  {
    $("#deleteID").val(id);
    $("#confirmDelete-popup").modal();
  }

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
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          Compose SMS
           </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="javascript:void(0);">Compose SMS</a></li>
          </ol>
        </section>


    <!-- add academic year-->

      <section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                 
                   <h3 class="box-title">Compose SMS</h3>
                   
              

               </div><!-- /.box-header -->
             
                <div class="box-body">
                  <div class="box box-warning">
                <div class="box-body">
                  <!-- <form role="form"> -->

                   <?php $attributes = array('role' => 'form', 'id' => 'addAcademicYear');
                  echo form_open_multipart('recruiter/recruiter/send_message', $attributes);
                  ?>   
 

                  <div class="row">
                    <div class="col-md-2">
                    <label for="first_name">To</label>
                    </div>
                      <div class="col-md-6">
                          <textarea class="form-control" name="mobile_no" cols="2" ro ws="2" readonly><?php echo $user_id; ?></textarea>


               
                  </div>
                </div><br>
                   <div class="row">
                    <div class="col-md-2">
                    <label for="first_name">Message Contents</label>
                    </div>
                      <div class="col-md-6">

                       <!-- <textarea class="form-control" name="message" reqiured cols="2" ro ws="2"></textarea> -->
                       <textarea id="compose-textarea" name="compose-textarea" class="form-control" style="height: 300px"></textarea> 

                   
                  </div>
                </div>
                



            
              

                    <div class="box-footer">
                  
                    <button type="submit" class="btn btn-primary">Send</button>
                  
                  </div>

               
                    
                  <!-- </form> -->


        <?php echo form_close( ); ?>


                </div><!-- /.box-body -->
              </div><!-- /.box -->

                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

      





      </div><!-- /.content-wrapper -->
 
      
<div class="modal fade" id="confirmDelete-popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Do you want to delete this record?</h4>
            </div>
            <div class="modal-body">
              <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'login');
              echo form_open('academic_year/delete_academic', $attributes);
              ?>   
              <div class="row">
                <div class="center col-md-12">
                  <input type="hidden" id="deleteID" name="deleteID" >
                  <div class="left col-md-3">
                    <button type="submit" class="btn btn-block btn-primary " >Yes</button>
                  </div>  
                  <div class="right col-md-3">
                    <button class="btn btn-block btn-primary" data-dismiss="modal" aria-label="Close">No</button>
                  </div>  
                </div>
              </div><!--/row-->
              <?php echo form_close(); ?> 
            </div>          
          </div>
        </div>
      </div>

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
      function changeStatus(user_admin_id,status){
        var base_url = "<?php echo base_url();?>";
        $.ajax({
          url: base_url+'admin/user/changeStatus',
          type: 'POST',
          data: {id:user_admin_id,status:status},
          success:function(data)
          {
            location.reload();
          }
        });
      }       
    </script>

    <script>

$('#dob').datepicker({
    format: 'yyyy/mm/dd'
});


$('#date_of_enrol').datepicker({
    format: 'yyyy/mm/dd'
});
</script>
 <script>
      $(function () {
        //Add text editor
        $("#compose-textarea").wysihtml5();
      });
    </script>