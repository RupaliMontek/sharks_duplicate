

    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
     Blog
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="">Add Blog</a></li>
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
                  <h3 class="box-title">Add Blog</h3>
                  <a href="<?php echo base_url();?>blog/blog">
					<button type="button" class="btn btn-primary btn-md pull-right" >BACK</button>
				  </a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="box box-warning">
                <div class="box-body">
                  <!-- <form role="form"> -->
            <?php 
            $attributes = array('role' => 'form', 'id' => 'add_blog','data-toggle'=>'validator');
						echo form_open_multipart('blog/blog/save_blog', $attributes);
				    ?>
          <div class="row">
              <div class="col-sm-2">
               <label   Font-Bold="true">Title
                </label>
            </div>

            <div class="col-sm-10 form-group">
              <input type="text" name="title" id="title" class="form-control" >
        <!--<textarea class="form-control ckeditor" name="title" id="title" rows="2" cols="20" required></textarea> -->
            </div>
       
            </div>
            <div class="row">
              <div class="col-sm-2">
                <label   Font-Bold="true">Short Url</label>
            </div>

            <div class="col-sm-10 form-group">
              <input type="text" name="short_url" id="short_url" class="form-control" >
              Please Add Short Url Limit is 30 Characters.
              <!--<textarea class="form-control ckeditor" name="title" id="title" rows="2" cols="20" required></textarea>-->
            </div>
            </div>
            <div class="row">
              <div class="col-sm-10">
                <label   Font-Bold="true">Meta Title</label></div>
                <div class="col-sm-10 form-group">
                <input type="text" name="meta_title" id="meta_title" class="form-control" >
            </div>
            </div>
            <div class="row">
              <div class="col-sm-10">
                <label   Font-Bold="true">Meta Description</label></div>
                <div class="col-sm-10 form-group">
                <input type="text" name="meta_desc" id="meta_desc" class="form-control" >
            </div></div>
            <div class="row">
              <div class="col-sm-10">
                <label   Font-Bold="true">Meta Keyword</label></div>
                <div class="col-sm-10 form-group">
                <input type="text" name="meta_keyword" id="meta_keyword" class="form-control" >
            </div></div>
            <div class="row">
              <div class="col-sm-10">
                <label   Font-Bold="true">canonical Url</label></div>
                <div class="col-sm-10 form-group">
                <input type="text" name="meta_canonical_href" id="meta_canonical_href" class="form-control" >
            </div></div>
       
        

          <div class="row">
              <div class="col-sm-2">
                                   <label   Font-Bold="true">Description
                                    </label>
                                </div>

            <div class="col-sm-10 form-group">
                               <textarea class="form-control" name="descriptions" id="descriptions" rows="10" cols="20" ></textarea>

           
            </div>
       
            </div>
           

           <div class="row">	
            <div class="col-sm-2">
              <label>Image</label>
              </div>
              <div class="col-sm-4 form-group">
              <input type="file" class="form-control"  name="image" />                     
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
  
  $(document).ready( function() 
{

    jQuery.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[a-zA-Z]*$/.test(value);
  }, "Only letters without space.");


    $("#add_blog").validate(
    {
        errorElement: "span", 

        rules: 
        {

            title: 
            {
                required:true,
              
            },
           
            descriptions: 
            {
                required:true,
                
            },
            image: 
            {
                required:true,
                accept: "jpeg,png,jpg/*"
                
            }
           
           
        },

        messages: 
        { 
            title: 
            {
                required:"Required"
            },
          
            descriptions: 
            {
                required:"Required"
            },

            image: 
            {
                required:"Required",
                accept:"Upload jpeg/png/jpg extensions file "
            }
          
        },

    } );

} );

</script>


<script type="text/javascript">
    
$(function () {
    $("#descriptions").wysihtml5();
});
  
</script>





 

 
