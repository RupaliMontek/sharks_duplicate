<?php  ?>
<script type="text/javascript">

//function for delete 
function deleteConfirm(id)
{
    $("#deleteID").val(id);
    $("#confirmDelete-popup").modal();
}

function disapproveConfirm(id,deadline_miss)
{
    if(deadline_miss==1)
    {

        $("#deadline_miss_option").hide();

    }
    $("#disapprove_id").val(id);
    $("#confirmDisapprove-popup").modal();
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
            Question Management

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="javascript:void(0);">Question Management</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <a href="<?php echo base_url();?>recruiter/recruiter/questions"><button type="button" class="btn btn-warning btn-lg"><i class="fa fa-arrow-left"></i> BACK</button></a><br>

                <div class="box">
                    <div class="box box-solid box-primary">

                        <div class="box-header with-border">

                            <h3 class="box-title">Question List</h3>
                        </div>




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




        <div class="box-body ">
            <?php 
            if(@$recruiter_question)
            {
                $attributes = array('data-toggle' => 'validator', 'role' => "form");
                echo form_open("recruiter/recruiter/update_question",$attributes); 
            }
            else
            {
                $attributes = array('data-toggle' => 'validator', 'role' => "form");
                echo form_open("recruiter/recruiter/save_question",$attributes); 
            }
            ?>   
            <div class="form-group">
                <label for="exampleInputEmail1">Question No</label>
                <input type="hidden" name="question_id" value="<?=@$recruiter_question->question_id?>">
                <input type="text" name="question_no" class="form-control" id="exampleInputEmail1" placeholder="Question Sequence No" value="<?=@$recruiter_question->question_no?>" required>
                <div class="help-block with-errors"></div>
            </div>  
            <div class="form-group">
                <label for="exampleInputEmail1">Question Title</label>
                <input type="text" name="question_title" class="form-control" id="exampleInputEmail1" placeholder="Enter title" value="<?=@$recruiter_question->question_title?>" required>
                <div class="help-block with-errors"></div>
            </div>                        
            <div class="form-group">
                <label for="exampleInputEmail1">Question Form Type</label>
                <select name="question_form_type" class="form-control" required>
                    <option value="">Select Type</option> 
                    <option <?php if(@$recruiter_question->question_form_type=="0"){echo "selected";}?> value="0">Screening</option> 
                    <option <?php if(@$recruiter_question->question_form_type=="1"){echo "selected";}?> value="1">Genuinity</option>                                
                </select>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Question Type</label>
                <select name="question_type" onchange="get_options_by_question_type(this.value);" class="form-control" required>
                    <option value="">Select Type</option> 
                    <option <?php if(@$recruiter_question->question_type=="0"){echo "selected";}?> value="0">Objective</option> 
                    <option <?php if(@$recruiter_question->question_type=="1"){echo "selected";}?> value="1">Subjective</option>                                
                </select>
                <div class="help-block with-errors"></div>
            </div>

            <div id="options_structure"></div>

            <div class="form-group">
                <label for="exampleInputEmail1">Question Marks</label>
                <select name="question_marks" class="form-control" required>
                    <option value="">Select Marks</option>
                    <option <?php if(@$recruiter_question->question_marks=="0"){echo "selected";}?> value="0">0</option> 
                    <option <?php if(@$recruiter_question->question_marks=="1"){echo "selected";}?> value="1">1</option>
                    <option <?php if(@$recruiter_question->question_marks=="2"){echo "selected";}?> value="2">2</option>
                </select>
                <div class="help-block with-errors"></div>
            </div>                  
            <input type="submit" class="btn btn-info" name="submit" value="Save"/>                         
        </form>
    </div><!-- /.box-body -->
</div><!-- /.box -->
</div><!-- /.box -->
</div><!-- /.col -->
</div><!-- /.row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php $this->load->view('template/footer'); ?>