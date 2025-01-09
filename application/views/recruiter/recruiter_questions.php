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
				<a href="<?php echo base_url();?>recruiter/recruiter/questions"><button type="button" class="btn btn-warning btn-md pull-right">Back</button></a>

				<div class="box">
					<div class="box box-solid box-primary">

						<div class="box-header with-border">

							<h3 class="box-title">Question List</h3>


							<a href="<?php echo base_url();?>recruiter/recruiter/question_add"><button type="button" class="btn btn-warning btn-md pull-right">Add New </button></a>
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
			<div id="showtable">
				<table id="example1" class="table table-bordered table-striped ">
					<thead>
						<tr>
							<th>Sr.No</th>
							<th>Question</th>
							<th>Question Type</th>                  
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
						<?php
						if(!empty($recruiter_questions))
						{
							$Srno=1;
							foreach($recruiter_questions as $row)
							{
								?>
								<tr>
									<td> <?php echo $Srno; $Srno++; ?> </td>
									<td> <?php echo $row->question_title;?> </td>
									<td> <?php if($row->question_type==0){echo "Objective";}elseif ($row->question_type==1){echo "Subjective";}?> </td>
									<td>
										<div class="btn-group">
											<button type="button" class="btn btn-info btn-sm">Action</button>
											<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
												<span class="caret"></span>
												<span class="sr-only">Toggle Dropdown</span>
											</button>
											<ul class="dropdown-menu" role="menu">
												<li><a href="<?php echo base_url();?>recruiter/recruiter/question_edit/<?php echo $row->question_id ;?>">Edit</a></li>
												<li><a href="javascript:void(0);" onclick="deleteConfirm(<?php echo $row->question_id ;?>)">Delete</a></li>
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

			</div>
		</div><!-- /.box-body -->
	</div><!-- /.box -->
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
				echo form_open('recruiter/recruiter/question_delete', $attributes);
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

	$(document).ready(function() {
		var table = $('#example1').DataTable( {
			scrollCollapse: true,
			paging:         true,
			fixedColumns:   {
				leftColumns: 2,
           // rightColumns: 1
       }
   } );
	} );
</script>