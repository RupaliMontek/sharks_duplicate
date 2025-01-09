

    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
       Our Engagement
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href=""> Our Engagement</a></li>
          </ol>
        </section>


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


        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Add Our Engagement</h3>
                  <a href="<?php echo base_url();?>homepage/homepage">
					<button type="button" class="btn btn-primary btn-md pull-right" >BACK</button>
				  </a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="box box-warning">
                <div class="box-body">
                  <!-- <form role="form"> -->
            <?php 
            $attributes = array('role' => 'form', 'id' => 'addProduct','data-toggle'=>'validator');
						echo form_open_multipart('offshore_development/offshore_development/save_our_engagement', $attributes);
				    ?>
          <div class="row">
              <div class="col-sm-2">
                   <label Font-Bold="true">Title
                   </label>
              </div>

              <div class="col-sm-4 form-group">
             <input type="text" name="title" value="" class="form-control ">  
              <div class="with-errors help-block"></div>        
              </div>
              <div id="spc_list"></div>
          </div>
          <div class="row" style="margin-top: 10px;"></div>
          <div id="non_special">   
          <div class="row">
              <div class="col-sm-2">
                                   <label   Font-Bold="true">Description
                                    </label>
                                </div>

            <div class="col-sm-10 form-group">
                               <textarea class="form-control ckeditor" name="descriptions" id="descriptions" rows="2" cols="20" required></textarea>

              <div class="with-errors help-block"></div>
            </div>
       
            </div>
            <br>
           

           <div class="row">					
           
           

            <div class="col-sm-2">
              <label>Image</label>
              </div>
              <div class="col-sm-10 form-group">
              <input type="file" class="form-control" name="image_path_1" />                     

              <div class="with-errors help-block"></div>
            </div>

            </div><br>

             <div class="row">
              <div class="col-sm-2">
                                   <label   Font-Bold="true">Pricing Model
                                    </label>
                                </div>

            <div class="col-sm-10 form-group">
                               <textarea class="form-control ckeditor" name="pricing_model" id="pricing_model" rows="2" cols="20" required></textarea>

              <div class="with-errors help-block"></div>
            </div>
       
            </div>
            <br>


          


  
          
         
          <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
					</div>
                    
                  <!-- </form> -->
				<?php echo form_close(); ?>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <?php $this->load->view('template/footer'); ?>
 
