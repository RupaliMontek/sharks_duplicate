
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     View Screenshots
   </h1>
   <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">View Screenshots</a></li>

  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">


     <!-- Main content -->
     <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Screenshots List</h3>
              <a href="<?php echo base_url();?>search/"><button type="button" class="btn btn-primary btn-lg" >BACK</button></a>
            </div><!-- /.box-header -->
            <div class="box-body">
              <div class="box box-warning">
                <div class="box-body">
                <div class="box-body">
            <table id="example1_a" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Sr.No</th>
                 <th>Action</th>
                </tr>
              </thead>
              <tbody>
                 <?php if($record)
                {
                   $i=1;
                  foreach ($record as $row) 
                  {
                 ?>

                <tr>
                  <td><?= $i;?></td>
                  <td>
                       <a class="btn btn-primary" href="<?php echo base_url();?>/uploads/recuiter_company_images/<?php echo $row->added_by;?>/<?php echo $row->uploaded_file;?>"
            view="Document" target="_blank">View Document</a>
            <a class="btn btn-primary" href="<?php echo base_url();?>/uploads/recuiter_company_images/<?php echo $row->added_by;?>/<?php echo $row->uploaded_file;?>"
            download="Document">Download Document</a>
                  </td>
                  
                  
                </tr>
                 <?php $i++;
                 }  } ?>
              </tbody>
            </table>
          </div>


                  </div><!-- /.box-body -->
                </div><!-- /.box -->

              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </section><!-- /.content -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->


<?php $this->load->view('template/footer'); ?>