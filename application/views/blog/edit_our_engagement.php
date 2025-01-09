

<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Our Engagement
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"> Our Engagement</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><label for="">Update</label></h3>
                  <a href="<?php echo base_url();?>offshore_development/offshore_development/our_engagement"><button type="button" class="btn btn-primary btn-md pull-right">BACK</button></a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="box box-warning">
                <div class="box-body">
               <?php 
            $attributes = array('role' => 'form', 'id' => 'addProduct','data-toggle'=>'validator');
            echo form_open_multipart('offshore_development/offshore_development/update_our_engagement', $attributes);
            ?>
          <div class="row">
              <div class="col-sm-2">
                   <label Font-Bold="true">Title
                   </label>
              </div>

              <div class="col-sm-4 form-group">
                <input type="hidden" name="product_id" value="<?php echo $our_engagement->id;?>" class="form-control ">  


             <input type="text" name="title" value="<?php echo $our_engagement->title;?>" class="form-control ">  
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
                               <textarea class="form-control ckeditor" name="descriptions" id="descriptions" rows="2" cols="20" required><?php echo $our_engagement->descriptions;?></textarea>

              <div class="with-errors help-block"></div>
            </div>
       
            </div>
            <br>
           

           <div class="row">          
           
           

            <div class="col-sm-2">
              <label>Image</label>
              </div>
              <div class="col-sm-10 form-group">
              <img style="width:100px;height:100px;" src="<?php echo base_url().$our_engagement->image;?>">  
              <input type="hidden" class="form-control" name="image1" value="<?php echo $our_engagement->image;?>" />

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
                               <textarea class="form-control ckeditor" name="pricing_model" id="pricing_model" rows="2" cols="20" required><?php echo $our_engagement->pricing_model;?></textarea>

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
 

