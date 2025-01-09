
<link href="<?php echo base_url();?>frontend/select2/select2.min.css" rel="stylesheet" />
<link href="<?php echo base_url();?>frontend/select2/select2-bootstrap.css" rel="stylesheet" />

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
           Candidate Email


            
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="javascript:void(0);">Compose New Message</a></li>
          </ol>
        </section>


    <!-- add academic year-->

      <section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                 
                   <h3 class="box-title">Compose New Message</h3>
                   
              

               </div><!-- /.box-header -->
             
                <div class="box-body">
                  <div class="box box-warning">
                <div class="box-body">
                  <!-- <form role="form"> -->
                  <?php $attributes = array('role' => 'form', 'id' => 'addAcademicYear');
                  echo form_open_multipart('recruiter/recruiter/send_mail_to_canditate', $attributes);
                  ?>   

                  <div class="row">
                    <div class="col-md-2">
                    <label for="first_name">From</label>
                    </div>
                      <div class="col-md-6">
                        <input type="text" readonly name="email_from" id="email_from" class="form-control" value="<?php echo $user_email = $this->session->userdata('user_email'); ?>" >
                  </div>
                </div><br>

                  <div class="row">
                    <div class="col-md-2">
                    <label for="first_name">To</label>
                    </div>
                      <div class="col-md-6">
                     <textarea class="form-control" name="email_id" cols="2" rows="2" ><?php echo $user_id; ?></textarea>
                  </div>
                </div><br> 

                 <div class="row">
                    <div class="col-md-2">
                    <label for="first_name">CC</label>
                    </div>
                      <div class="col-md-6">
                         <select id="prescritiopn" name="contest_type[]" class="form-control js-example-tokenizer" multiple="multiple">       
                            <?php 
                              if(!empty($mail_ids))
                              {
                                foreach($mail_ids as $row)
                                {
                                  ?>
                                  <option value="<?php  echo $row['email']; ?>"><?php  echo $row['email']; ?></option>
                                  <?php
                                }
                              }
                            ?>
                          </select>
                  </div>
                </div><br>




 



                  <div class="row">
                    <div class="col-md-2">
                    <label for="first_name">Subject</label>
                    </div>
                      <div class="col-md-6">
                        <input type="text" name="subject" class="form-control" placeholder="Subject:" required >
                  </div>
                </div><br>



                   <div class="row">
                    <div class="col-md-2">
                    <label for="first_name">Message Contents</label>
                    </div>
                      <div class="col-md-6">
                        <!-- <textarea class="form-control" required placeholder="Message" name="message" required placeholder="message" cols="2" rows="2"></textarea> -->    

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




<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
<script type="text/javascript" src="<?php echo base_url();?>frontend/select2/select2.min.js"></script>

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
<script type="text/javascript">
$(".js-example-tokenizer").select2({
  tags: true,
  tokenSeparators: [',', ' ']
})

</script>