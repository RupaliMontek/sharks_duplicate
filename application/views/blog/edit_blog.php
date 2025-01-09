

<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Blog
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"> Blog</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><label for="">Update</label></h3>
                  <a href="<?php echo base_url();?>blog/blog"><button type="button" class="btn btn-primary btn-md pull-right">BACK</button></a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="box box-warning">
                <div class="box-body">
                     <!-- <form role="form"> -->
            <?php 
            $attributes = array('role' => 'form', 'id' => 'edit_blog','data-toggle'=>'validator');
            echo form_open_multipart('blog/blog/update_blog', $attributes);
            ?>
          <div class="row">
              <div class="col-sm-2">
                    <label Font-Bold="true">Title</label>
                </div>
                <div class="col-sm-10 form-group">
                <input type="hidden" name="id" value="<?php echo $blog->blog_id; ?>">
                    <input type="text" name="title" id="title" class="form-control" value="<?php echo $blog->title;?>" required>
                              <!--  <textarea class="form-control ckeditor" name="title" id="title" rows="2" cols="20" required><?php echo $blog->title;?></textarea> -->
            </div>
        </div>
           
          <div class="row" style="margin-top: 10px;"></div>
          <div id="non_special">  

          <div class="row">
              <div class="col-sm-2">
                   <label   Font-Bold="true">Description
                    </label>
                </div>

                <div class="col-sm-10 form-group">
                    <textarea class="form-control" name="descriptions" id="descriptions" rows="6" cols="20" required><?php echo $blog->descriptions;?></textarea>
                </div>
       
            </div>
           

           <div class="row">  
            <div class="col-sm-2">
              <label>Image</label>
              </div>
              <div class="col-sm-4 form-group">
                <img  style="width:100px; height:100px;"src="<?php echo base_url().$blog->image;?>">
                <input type="hidden" name="image_1_1" value="<?php echo $blog->image;?>">
             <input type="file" class="form-control" name="image" />                    
           </div>

         </div>

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
      
      
<script type="text/javascript">
    
$(function () {
    $("#descriptions").wysihtml5();
});
  
</script>
