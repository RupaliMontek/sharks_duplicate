<!--<link rel="stylesheet" href="<?php echo base_url();?>backend/bootstrap/css/bootstrap.min.css">-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>

<link rel="stylesheet" href="<?php echo base_url();?>backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--<script src="<?php echo base_url();?>backend/plugins/jQuery/jQuery-2.1.4.min.js"></script>-->

 <!--<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.js"></script>-->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>




       
 <style>
 
  
  color: #000000b2;   .flex-r,
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



.login-textt {
  background-color: white;
    box-shadow: 0 0 15px rgb(0 0 0 / 30%);
    /* max-width: 500px; */
    /* min-height: 380px; */
    border-radius: 10px;
    padding: 10px 20px;
    /* margin-top: 60px; */
    /* width: 466px; */
    margin: 40px;
}



.login-textt  h1 {
  font-size: 25px;
}
.login-textt  p {
  font-size: 15px;
}


.login-textt  .input-box {
  margin: 10px 0px;
  width: 100%;
}
.login-textt  .label {
  font-size: 15px;
  color: black;
  margin-bottom: 3px;
}
.login-textt  .input {
  background-color: #f6f6f6;
  padding: 0px 5px;
  border: 2px solid rgba(216, 216, 216, 1);
  border-radius: 10px;
  overflow: hidden;
  justify-content: flex-start;
}

.login-textt  input {
  border: none;
  outline: none;
  padding: 10px 5px;
  background-color: #f6f6f6;
  flex: 1;
}
.login-textt  .input i {
  color: rgba(0, 0, 0, 0.4);
}

.login-textt  .check span {
  color: #000000b2;
  font-size: 15px;
  font-weight: bold;
  margin-left: 5px;
}

.login-textt  .btn {
  color: #ffffff;
  border-radius: 30px;
   padding: 6px 39px;
  background: linear-gradient(122.33deg, #68bed1 30.62%, #1e94e9 100%);
  margin-top: 15px;
  margin-bottom: 10px;
  font-size: 20px;
  transition: all 0.3s linear;
}

.login-textt  .btn:hover {
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
        <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
      <div class="login-textt">
        <!--<div class="logo">-->
        <!--  <span><i class="fab fa-speakap"></i></span>-->
        <!--  <span>Coders</span>-->
        <!--</div>-->
        <h1>Find a job & grow your career</h1>
        <!--<p>It's not long before you embark on this journey! </p>-->

        <?php 
            $attributes = array('role' => 'form', 'id' => 'candidate_registrationd','autocomplete' => 'false','data-toggle'=>'validator');
            echo form_open_multipart('', $attributes); ?>
            
            <div class="input-box">
            <span class="label">Full Name</span>
            <div class=" flex-r input">
              <input name="candidate_name" id="candidate_name" type="text" placeholder="what is your full name?">
              <i class="fa-sharp fa-solid fa-input-text"></i>
            </div>
          </div>
          <div class="input-box">
            <span class="label">E-mail</span>
            <div class=" flex-r input">
              <input name="candidate_email" id="candidate_email"  type="text" placeholder="Enter Candidate Email">
              <i class="fas fa-at"></i>
            </div>
          </div>

          <div class="input-box">
            <span class="label">Password</span>
            <div class="flex-r input">
              <input name="password" id="password"  type="password" placeholder="8+ (a, A, 1, #)">
              <i class="fas fa-lock"></i>
            </div>
          </div>
           <div class="input-box">
            <span class="label">Phone Number</span>
            <div class="flex-r input">
              <input type="text" name="phone" id="phone" placeholder="+91 phone number">
              <i class="fas fa-lock"></i>
            </div>
          </div>
          
         <div class="input-box">
            <span class="label">Work Status</span>
            <div class="flex-r input">
             <i class="fa fa-lock" aria-hidden="true"></i> <input type="text" name="work_status" id="work_status" placeholder="I am experenced">
              <i class="fas fa-lock"></i>
            </div><br>
             <div class="flex-r input">
             <i class="fa fa-lock" aria-hidden="true"></i> <input type="text" name="work_status1" id="name" placeholder="I am fresher">
              <i class="fas fa-lock"></i>
            </div>
          </div>
           <div class="input-box">
            <span class="label">Resume</span>
            <div class="flex-r input">
              <input type="file" name="candidate_resume" id="candidate_resume" placeholder="upload resume">
              <i class="fas fa-lock"></i>
            </div>
          </div>
          <div class="check">
            <input type="checkbox" name="" id="">
            <span>send me important updates on whats up <i class='fab fa-whatsapp-square'></i></span>
          </div>

          <button onClick="form_submission()" class="btn" type="button" value="Register Now" data-toggle="modal">Register Now</button><br>
          <span class="extra-line">
            <span>Already have an account?</span>
            <a href="<?php echo base_url()?>candidate_profile_login">Login here</a>
          </span>
         <?php echo form_close(); ?>
      </div>
      </div>
      <div class="col-md-3"></div>
      </div>
    </div>
  </div>
  
   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        
        
          <div class="modal-content">
        <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h2 class="main_title heading"><span>Verify Your Email ID</span></h2> 
        </div>
         <div id="verify_email_popup" class="white-popup-block mfp-hide popup-position">
            <div class="popup-title">
                 
            </div>            
                  <div class="popup-detail">
                    <?php 
                    $user_details = $this->M_Candidate_profile->get_user_details_by_id_admin(2);
                    $attributes = array('id' => 'resend_verification_email');
                    echo form_open_multipart('recruitment/resend_verification_email', $attributes);
                        ?> 
                    <div class="main-search">
                        <div class="header_search_toggle desktop-view">
                            <div class="search-box">
                       &nbsp;&nbsp;&nbsp;&nbsp;<span> Email Id: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       <input class="input-text" type="email" name="email" id="emails" placeholder="Email ID" value=""></span>  
                                </div>
                            </div>
                            </br>
                             
                      &nbsp;&nbsp;&nbsp;&nbsp;<span>Not Received Mail? <button type="submit" class="">Resend Verification Link</button></span>  
                        </div>
                        <?php echo form_close(); ?>
  </div>
  
                </div>
         
      </div>
      </div>
      </div>
     
   
                
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<?php if($this->session->flashdata('success') != '') {?>
	<script>
		toastr.success('<?php echo $this->session->flashdata('success'); ?>', 'Success Alert', {timeOut: 8000})
	</script>
<?php } ?>
<?php if($this->session->flashdata('error') != '') {?>
	<script>
		toastr.error('<?php echo $this->session->flashdata('error'); ?>', {timeOut: 8000})
	</script>
<?php } ?>               

<script>
function form_submission(){
     var base_url = '<?php echo base_url(); ?>';  
     var candidate_name=$("#candidate_name").val();
     var candidate_email=$("#candidate_email").val();
     var password=$("#password").val();
     var phone=$("#phone").val();
     var work_status=$("#work_status").val();
      var candidate_resume = document.getElementById("candidate_resume").files[0].name;
      
$.ajax({
      url: 'https://msuite.work/recruitment/Save_Candidate_register',
      type: 'POST',
      dataType:'json',
      data:{
          
        candidate_name:candidate_name,candidate_email:candidate_email,password:password,phone:phone,work_status:work_status,candidate_resume:candidate_resume
        },
                  
      success:function(msg)
        {
         alert(msg); 
         if(msg['status']=="true")
         {
             
             $("#myModal").modal("toggle");
              $('#emails').val(msg['email']);
         }
          else
          {
            //   alert();
              alert('not insert');
          }
          }
});
 
}
</script>
<!-- js for validation--> 
<!--  <script>$(document).ready( function() 
{
function phoneValidate(){
var mobile= jQuery("#phone").val();
alert(mobile);
var pattern = /^\d{10}$/;

if (pattern.test(mobile)) {
jQuery(".error").html('');
return true;
} else{
jQuery(".error").html('');
jQuery(".container-fun").append("<span class='error'>Please put 10 digit valid mobile number</span>");
jQuery(".error").css('color','red');
return false;
}
}

  jQuery.validator.addMethod("emailtest", function(value, element) {
    return this.optional(element) || /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$/i.test(value);
  }, "Please enter a valid Email ID"); 
  
  jQuery.validator.addMethod("alpha", function(value, element) {
    return this.optional(element) || value == value.match(/^[a-zA-Z ]+$/);
},"Only Character Letter Allowed");

  
    $("#candidate_registration").validate(
    {
        errorElement: "span", 
    
        rules: 
        {
            candidate_name: 
            {
                required:true,
                alpha:true
            },
            candidate_email: 
            {
                required:true,
                emailtest:true
            },
            password: 
            {
                required:true,
            },
            phone: 
            {
                required:true,
                digits:true,
                mininum:10,
                maximum:10,
            },
            work_status: 
            {
                required:true,
                alpha:true
            },
             candidate_resume: 
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
            phone: 
            {  
                required:"Required Phone No"
            },
            work_status: 
            {  
                required:"Required Work Status"
            },
            
            candidate_resume: 
            {  
                required:"Required"
            },
        },

        errorPlacement: function(error, element) 
        {               
            error.appendTo(element.parent());     
        } 

    } );

} );





</script>-->


  <script type="text/javascript">
  $(document).ready( function() 
  {
      var base_url = "<?php echo base_url();?>";
  
      jQuery.validator.addMethod("emailtest", function(value, element) {
        return this.optional(element) || /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$/i.test(value);
    }, "Please enter a valid Email ID");

    $("#candidate_registrationd").validate(
    {
      errorElement: "span", 

      rules: 
      {
           candidate_name: 
            {
                required:true,
               
            },
            
        candidate_email: 
        {
          required:true,
          emailtest:true,
          remote: {
                url: base_url+"candidate_profile_login/check_email_exists_registration",
                type: "post",
                data: {
                    email: function() {
                        return $("#email").val();
                    },
                }
            }
        },
        password: 
            {
                required:true,
            },
            phone: 
            {
                required:true,
                digits:true,
                mininum:10,
                maximum:10,
            },
            work_status: 
            {
                required:true,
                alpha:true
            },
             candidate_resume: 
            {
                required:true,
                
            },
      },
      

      messages: 
      { 
        candidate_name: 
            {
                required:"Required Candidate Name",
            },
            
        candidate_email: 
        {
          required:"Required",
          remote:"This mail id Allready Use Please Use Anothe Email",
        },
         password: 
            {  
                required:"Required Password"
            },
            phone: 
            {  
                required:"Required Phone No"
            },
            work_status: 
            {  
                required:"Required Work Status"
            },
            
            candidate_resume: 
            {  
                required:"Required"
            },
      },
    });
  });

</script>