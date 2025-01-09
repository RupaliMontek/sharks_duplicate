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
        Blog
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="">Blog</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Blog List</h3>
                  <a href="<?php echo base_url();?>blog/blog/add"><button type="button" class="btn btn-primary btn-md pull-right" >Add  </button></a>
                </div><!-- /.box-header -->

                <!-- Successfully updation message -->

          <?php if($this->session->flashdata('success') != '') {?>
          <div class="alert alert-success" id="successMessage2"><i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('success'); ?>
            <button type="button" class="close" id="btn-alert-success" onclick="closeSuccess2()" >&times;</button>
          </div>
          <?php } ?>
          
          <?php 
          $success='';
          $error='';
          if($success != '') {?>
          <div class="alert alert-success" id="successMessage2"><i class="fa fa-check-circle"></i> <?php echo $success; ?>
            <button type="button" class="close" id="btn-alert-success" onclick="closeSuccess2()" >&times;</button>
          </div>
          <?php } ?>

          <?php if($this->session->flashdata('error') != '') {?>
          <div class="alert alert-danger" id="errorMessage2"><i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('error'); ?>
            <button type="button" class="close" id="btn-alert-success" onclick="closeError2()" >&times;</button>
          </div>
          <?php } ?>
          
          <?php if($error != '') {?>
          <div class="alert alert-danger" id="errorMessage2"><i class="fa fa-check-circle"></i> <?php echo $error; ?>
            <button type="button" class="close" id="btn-alert-success" onclick="closeError2()" >&times;</button>
          </div>
          <?php } ?>


                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Sr.No</th>
                        <th>Title</th>
						 <th>Descriptions</th>
                        <th>Image1</th>
                   
                      
                        <th>Action</th>
                      </tr>
                    </thead>
                     <tbody>
                          <?php
                          
                          if(!empty($offshore_development))
                          {
                            $Srno=1;
                            foreach($offshore_development as $row)
                            {
                              ?>
                              <tr>
                                <td> <?php echo $Srno; $Srno++; ?> </td>
                                <td> <?php echo $row->title;?></td>
                                <td> <?php if(strlen($row->descriptions) > 500){ echo substr($row->descriptions,0,500).'...'; }else{ echo $row->descriptions; } ?></td>
								                <td> <img style="width:100px; height:100px;" src="<?php echo base_url() .'/'. $row->image;?>">   </td>
                                
                                <td>
                                  <div class="btn-group">
                                   <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Action
                                       <span class="caret" style="margin-left: 10px;"></span>
                                       <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                      
                                      <li><a href="<?php echo base_url();?>blog/blog/edit_blog/<?php echo $row->blog_id ;?>">Edit</a></li>
                                      <li><a href="javascript:void(0);" onclick="deleteConfirm('<?php echo $row->blog_id;?>')">Delete</a></li>
                                     
                                    </ul>
                                  </div>
                                </td>
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
              echo form_open('blog/blog/delete_blog', $attributes);
              ?>   
              <div class="row">
                <div class="center col-md-12">
                  <input type="hidden" id="deleteID" name="deleteID" >
                  <div class="left col-md-3">
                    <button type="submit" class="btn btn-block btn-warning" >Yes</button>
                  </div>  
                  <div class="right col-md-3">
                    <button class="btn btn-block btn-warning" data-dismiss="modal" aria-label="Close">No</button>
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
        $('#example1').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true,
           "scrollX": true
        });
      });
      /*$('.dropdown-toggle').on('click',function(){
        if($('.btn-group').hasClass('open')){

        }else{
          $('.btn-group').addClass('open');
          $("button").attr("aria-expanded","true");
        }
        
      });*/
    </script>