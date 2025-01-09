<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo base_url();?>backend/bootstrap/css/bootstrap.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url();?>backend/plugins/datatables/dataTables.bootstrap.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/3.2.6/css/fixedColumns.dataTables.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>backend/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>backend/dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>backend/plugins/iCheck/flat/blue.css">
        <link rel="stylesheet" href="<?php echo base_url();?>backend/plugins/morris/morris.css">
        <link rel="stylesheet" href="<?php echo base_url();?>backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <link rel="stylesheet" href="<?php echo base_url();?>backend/plugins/datepicker/datepicker3.css">
        <link rel="stylesheet" href="<?php echo base_url();?>backend/plugins/daterangepicker/daterangepicker-bs3.css">
        <link href="<?php echo base_url();?>backend/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />
        <!--<link rel="stylesheet" href="<?php echo base_url();?>frontend/css/comman_style.css">-->
        <link rel="stylesheet" href="<?php echo base_url();?>backend/dist/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url();?>backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
        <script src="<?php echo base_url();?>backend/ckeditor/ckeditor.js"></script>
        <script src="<?php echo base_url();?>backend/webcamjs/webcam.min.js"></script>
        <link href="<?php echo base_url();?>backend/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
        <link href='<?php echo base_url();?>assets/css/fullcalendar.css' rel='stylesheet' />
        <link href="<?php echo base_url();?>assets/css/bootstrapValidator.min.css" rel="stylesheet" />        
        <link href="<?php echo base_url();?>assets/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo base_url();?>frontend/css/font-awesome.css">
        <style>
          .findjob{
              background: white;
              box-shadow: 0 0 15px rgb(0 0 0 / 10%);
             padding: 30px;
             margin: 40px;
              display: flex;
              border-radius:10px;
          }
          .job h2{
              text-align: center;
    font-family: ui-monospace;
    font-size: 41px;
    font-weight: bold;
          }
          .job{
              padding: 70px;
          }
          .findjob .form-control{
              border:none;
              font-size: 21px;
              color: gray;
          }
          .button {
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 20px;
}

.button2 {background-color: #008CBA;} /* Blue */
        </style>
        <section class="job">
            
         <h2>Find your dream job now!..</h2>
<div class="findjob">
   
    <div class="col-md-12">
    <div class="row">
        <div class="col-md-3">
          <i class="fa fa search"></i><input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter skill/Designation/Companies">  
        </div>
         <div class="col-md-3">
           <select name="cars" id="cars" class="form-control">
  <option value="volvo">Select Experience</option>
  <option value="saab">1</option>
  <option value="mercedes">2</option>
  <option value="audi">3</option>
</select> 
        </div>
         <div class="col-md-3">
           <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Location"> 
        </div>
         <div class="col-md-3">
          <button class="button button2">Search</button>
        </div>
    </div>
</div>
</div>
</section>