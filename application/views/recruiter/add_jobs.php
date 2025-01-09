<div class="content-wrapper">
    <section class="content-header">
        <h1>Add Job</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>/admin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="javascript:void(0);">Add Job</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="box box-warning">
                            <div class="box-body">
                                <?php $attributes = array('role' => 'form', 'id' => 'addUser'); echo form_open_multipart('recruiter/recruiter/save_job', $attributes);?>
                                    <div class="form-group col-md-6">
                                        <label>Job Title</label>
                                        <input type="text" class="form-control" placeholder="Job Title" name="job_title">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Clients</label>
                                        <select class="form-control" name = "client_name">
                                            <option hidden>Select Client</option>
                                            <?php if(!empty($clients_list)){?>
                                                <?php foreach($clients_list as $list){?>
                                                    <option value = "<?php echo $list['client_id'];?>"><?php echo $list['client_name'];?></option>
                                            <?php }}?>
                                        </select>
                                    </div>
                
                                    <div class="form-group col-md-6">
                                        <label>Experience Range</label>
                                        <input type="text" class="form-control" name="exp" placeholder="Experience range 01 - 02 Years" />
                                    </div>
                
                                    <div class="form-group col-md-6">
                                        <label>Salery Range</label>
                                        <input type="text" class="form-control" placeholder="Salery Range 02L - 2.50L" name="salery">
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label>Locations <small> (example:- Pune, Mumbai, ..., ...)</small></label>
                                        <input type="text" class="form-control" placeholder="Enter Name" name="locations">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Number Of Openings</label>
                                        <input type="text" class="form-control" name="number_of_opp" placeholder="Enter Number Of Openings 1 - 5">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Key Skils <small> (Example :- PHP, Web Development, ..., )</small></label>
                                        <input type="text" class="form-control" name="skills" placeholder="Enter Contact Number" />
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Job Disc</label>
                                        <textarea class="form-control" name="desc" placeholder="Enter Job Details"></textarea>
                                    </div>
                
                                    
                    
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
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
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script>
        CKEDITOR.replace( 'desc' );
</script>