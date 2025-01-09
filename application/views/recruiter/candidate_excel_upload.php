<style type="text/css">
  .margn{
    margin: 5px;
  }
  .col-md-2 label {
    display: inline-block;
    margin: 6px;
    font-weight: 600;
  }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Bulk Candidate Upload

    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="javascript:void(0);">Bulk Candidate Upload</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content-header">
      <div class="mainblock YTD_info">
        <div class="toast-header">
      </div>
      <div class="row">
        <?php
        $attributes = array('role' => 'form', 'id' => 'importSaleDetails', 'enctype'=>'multipart/form-data');
        echo form_open_multipart("recruiter/recruiter/upload_candidate_excel", $attributes);
        ?>
        <div class="col-md-3 form-group">
          <input type="text" class="form-control" placeholder="Sheet Name" name="sheetname" required  >
        </div>
        <div class="col-md-3 form-group">
          <input type="file" name="userFile" class="form-control"  required>
        </div>
        <div class="col-md-3 form-group">
          <button type="submit" class="btn btn-md btn-info">Import</button>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </section>
</div><!-- /.box -->
</div><!-- /.col -->
</div><!-- /.row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php $this->load->view('template/footer'); ?>
<!-- page script -->

<link rel="stylesheet" href="<?php echo base_url(); ?>backend\js\sales\css\datatable-buttons.css">
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>backend\js\sales\datatable-buttons.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>backend\js\sales\datatable-jszip.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>backend\js\sales\datatable-flash.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>backend\js\sales\datatable-html5.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>backend\js\sales\datatable-print.js"></script>
