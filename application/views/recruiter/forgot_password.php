        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url();?>backend/plugins/datatables/dataTables.bootstrap.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/3.2.6/css/fixedColumns.dataTables.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css" />
        <!--<link rel="stylesheet" href="<?php echo base_url();?>backend/dist/css/AdminLTE.min.css">-->
        <!--<link rel="stylesheet" href="<?php echo base_url();?>backend/dist/css/skins/_all-skins.min.css">-->
        <!--<link rel="stylesheet" href="<?php echo base_url();?>backend/plugins/iCheck/flat/blue.css">-->
        <!--<link rel="stylesheet" href="<?php echo base_url();?>backend/plugins/morris/morris.css">-->
        <link rel="stylesheet" href="<?php echo base_url();?>backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <link rel="stylesheet" href="<?php echo base_url();?>backend/plugins/datepicker/datepicker3.css">
        <link rel="stylesheet" href="<?php echo base_url();?>backend/plugins/daterangepicker/daterangepicker-bs3.css">
        <link href="<?php echo base_url();?>backend/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>frontend/css/comman_style.css">
        <link rel="stylesheet" href="<?php echo base_url();?>backend/dist/css/style.css">
        <!--<link rel="stylesheet" href="<?php echo base_url();?>backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>-->
        <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">-->
        <!--<script src="<?php echo base_url();?>backend/ckeditor/ckeditor.js"></script>-->
        <!--<script src="<?php echo base_url();?>backend/webcamjs/webcam.min.js"></script>-->
        <!--<link href="<?php echo base_url();?>backend/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />-->
        <!--<link href='<?php echo base_url();?>assets/css/fullcalendar.css' rel='stylesheet' />-->
        <!--<link href="<?php echo base_url();?>assets/css/bootstrapValidator.min.css" rel="stylesheet" />        -->
        <!--<link href="<?php echo base_url();?>assets/css/bootstrap-colorpicker.min.css" rel="stylesheet" />-->
        <!--<link rel="stylesheet" href="<?php echo base_url();?>frontend/css/font-awesome.css">-->
        <!--<link href="<?php echo base_url();?>frontend/select2/select2.min.css" rel="stylesheet" />-->
        <link href="<?php echo base_url();?>frontend/select2/select2-bootstrap.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
        
 <style>
     .flex-r,
.flex-c {
  justify-content: center;
  align-items: center;
  display: flex;
}
.flex-c {
  flex-direction: column;
}
.flex-r {
  flex-direction: row;
}
.login-text {
  background-color:white;
  box-shadow: 0 0 15px rgb(0 0 0 / 30%);
  max-width: 400px;
  min-height:380px;
  border-radius: 10px;
  padding: 10px 20px;
  margin:40px;
}



.login-text h1 {
  font-size: 25px;
}
.login-text p {
  font-size: 15px;
  color: #000000b2;
}


.login-text .input-box {
  margin: 10px 0px;
  width: 100%;
}
.login-text .label {
  font-size: 15px;
  color: black;
  margin-bottom: 3px;
}
.login-text .input {
  background-color: #f6f6f6;
  padding: 0px 5px;
  border: 2px solid rgba(216, 216, 216, 1);
  border-radius: 10px;
  overflow: hidden;
  justify-content: flex-start;
}

.login-text input {
  border: none;
  outline: none;
  padding: 10px 5px;
  background-color: #f6f6f6;
  flex: 1;
}
.login-text .input i {
  color: rgba(0, 0, 0, 0.4);
}

.login-text .check span {
  color: #000000b2;
  font-size: 15px;
  font-weight: bold;
  margin-left: 5px;
}

.login-text .btn {
  color: #ffffff;
  border-radius: 30px;
   padding: 6px 39px;
  background: linear-gradient(122.33deg, #68bed1 30.62%, #1e94e9 100%);
  margin-top: 15px;
  margin-bottom: 10px;
  font-size: 20px;
  transition: all 0.3s linear;
}

.login-text .btn:hover {
  transform: translateY(-2px);
}
.extra-line {
  font-size: 15px;
  font-weight: 600;
}
.extra-line a {
  color: #0095b6;
}

 </style>
 
 <div class=" flex-r container">
    <div class="flex-r login-wrapper">
      <div class="login-text">
        <!--<div class="logo">-->
        <!--  <span><i class="fab fa-speakap"></i></span>-->
        <!--  <span>Coders</span>-->
        <!--</div>-->
        <h1> change password </h1>
         <form action="<?php echo base_url();?>Candidate_profile_login/check_user_login_check_candidate" name="user_login" id="user_login" method="post">
        
          <div class="input-box">
            <span class="label">E-mail</span>
            <div class=" flex-r input">
              <input  name="email" id="email"type="text" placeholder="name@abc.com">
              <i class="fas fa-at"></i>
            </div>
          </div>

          <div class="input-box">
            <span class="label">Password</span>
            <div class="flex-r input">
              <input  name="password" id="password" type="password" placeholder="8+ (a, A, 1, #)">
              <i class="fas fa-lock"></i>
            </div>
          </div>

          <div class="check">
            <input type="checkbox" name="" id="">
            <span>I've read and agree with T&C</span>
          </div>

          <input class="btn" type="submit" value="Login"><br>
          <span class="extra-line">
            <span>if not registered then
            <a href="<?php echo base_url()?>/Candidate_registration">register here</a>
          </span>
          <br>
           <span>
            <a href="<?php echo base_url()?>/Candidate_registration">Forgot your password?</a>
          </span>
        </form>

      </div>
    </div>
  </div>
  <script type="text/javascript" src="<?php echo base_url();?>frontend/select2/select2.min.js"></script>
<!-- js for validation-->
<script src="<?php echo base_url();?>backend/plugins/jQueryUI/jquery.validate.js"></script>

 <script>$(document).ready( function() 
{

  jQuery.validator.addMethod("emailtest", function(value, element) {
    return this.optional(element) || /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$/i.test(value);
  }, "Please enter a valid Email ID");    

  
    $("#user_login").validate(
    {
        errorElement: "span", 
    
        rules: 
        {
            email: 
            {
                required:true,
                emailtest:true
            },
            password: 
            {
                required:true,
                
            },
           
        },

        messages: 
        { 
            email: 
            {
                required:"Required Email"
            },
            password: 
            {  
                required:"Required Password"
            },
            
        },

        errorPlacement: function(error, element) 
        {               
            error.appendTo(element.parent());     
        } 

    } );

} );
</script>
