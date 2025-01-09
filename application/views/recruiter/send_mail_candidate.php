
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
             


<?php if($this->session->flashdata('success') != '') {?>

<div class="alert alert-success" id="successMessage2"><i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('success'); ?>

  <button type="button" class="close" id="btn-alert-success" onclick="closeSuccess2()" >&times;</button>

</div>

<?php } ?>



<?php if($this->session->flashdata('error') != '') {?>

<div class="alert alert-danger" id="errorMessage2"><i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('error'); ?>

  <button type="button" class="close" id="btn-alert-success" onclick="closeError2()" >&times;</button>

</div>

<?php } ?>
             
                <div class="box-body">
                  <div class="box box-warning">
                <div class="box-body">
                  <!-- <form role="form"> -->
                  <?php $attributes = array('role' => 'form', 'id' => 'addAcademicYear');
                  echo form_open_multipart('recruiter/recruiter/send_mail_to_candidates', $attributes);
                  ?>  
                  
                <!--  <div class="row">-->
                <!--    <div class="col-md-2">-->
                <!--    <label for="first_name">Select Template</label>-->
                <!--    </div>-->
                <!--      <div class="col-md-6">-->
                          
                        
                <!--  </div>-->
                <!--</div><br> -->

                  <div class="row">
                    <div class="col-md-2">
                    <label for="first_name">To</label>
                    </div>
                      <div class="col-md-6">
                     <textarea class="form-control" name="email_id" cols="2" rows="2" ><?=$candidate_email?></textarea>
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


                <?php if($this->session->userdata('user_id')!=134) { ?>
                   <div class="row">
                    <div class="col-md-2">
                    <label for="first_name">Message Contents</label>
                    </div>
                      <div class="col-md-6">
                         <textarea id="compose-textarea" name="compose-textarea" class="form-control" style="height: 300px"></textarea>              
                  </div>
                </div> 
               <?php } ?>



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