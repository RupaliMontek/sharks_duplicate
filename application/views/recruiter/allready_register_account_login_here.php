<div class="container-fluid"> 
<div class="container"> 
<div class="row outerForAllreadyRegLogin">
<div class="col-lg-6 col-sm-12">
<div class="newtoMsuit">
<h3>New to SHARKS JOB?</h3>
<ul>
  <li><i class="fa fa-angle-double-right"></i> checkOne click apply using sharks job profile.</li>
<li><i class="fa fa-angle-double-right"></i> checkGet relevant job recommendations.</li>
<li><i class="fa fa-angle-double-right"></i> checkShowcase profile to top companies and consultants.</li>
<li><i class="fa fa-angle-double-right"></i> checkKnow application status on applied jobs.</li>
</ul>
<button type="button" class="btn btn-primary signingoogle hvr-sweep-to-right"><a href="<?php echo base_url(); ?>recruitment/create_account_candidate">Registration For Free <i class="fa fa-chevron-circle-right hvr-icon"></i></a></button>
</div>
</div>
<div class="col-lg-6 col-sm-12">
  <div class="allreadyRegisterLogin">
  <h3>Log in</h3>
    <form action="<?php echo base_url(); ?>Candidate_profile_login/check_user_login_check_candidate" name="user_login" id="candidate_login" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Email ID / Username</label>
    <input type="email" name="email" class="form-control" id="email"  placeholder="Enter your active Email ID/Username">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group forshowbtn">
    <label for="exampleInputPassword1">Password</label>
    <input name="password" type="password" class="form-control" id="password1" placeholder="Enter your Password">
    <span id="showButton1" class="showbtn">Show</span>
    <a  onclick="func()" class="forgotPassword" href="#">Forgot Password?</a>
  </div>
  <button type="submit" class="btn btn-primary hvr-sweep-to-right">Log In</button>
  </form>
  <div>
  <a class="useOtp" href="#">Login via OTP</a>
  <span>------------------ Or ------------------ </span>
  <div id="g-signin2"></div>
  <button type="button" class="btn btn-primary signingoogle hvr-sweep-to-right"><a href="<?php echo @$login_google; ?>">Sign In with Google</a></button>
 </div>
</div>
</div>
</div>
</div>
</div>


 <div class="modal" id="myModalss">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Forgot Passwords</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
          <form method="post" action="<?php echo base_url();?>Candidate_profile_login/send_forgor_password_email" enctype="multipart/form-data" id="user_forgot_pass_forms" name="user_forgot_pass_forms" accept-charset="utf-8" onsubmit="return check_email_contact_no()">
          <!-- Modal body -->
              <div class="modal-body">
          
                      <div class="row">
                          <div class="col-md-12">
                              <p>Please enter your registered email address and/or registered contact number. we will send you an email/otp to reset your password.</p>    
                          </div>
                      <div class="col-md-12">
                              <!--<input type="email" value="" required name="email" id="email1" class="form-control" placeholder="Email" onchange="check_email_exist1()">-->
                              <input type="text"  name="email1" id="email1" class="form-control" placeholder="Emacccil" > </br>                    
                      </div>
                      <div class="col-md-12">
                          <input type="text" name="contact" id="contact" class="form-control" placeholder="Contact No" >
                      </div>
                      <div class="col-md-12">
                          <div class="forgetPassword">
                              
                             <!--  <a href="#" class="" data-dismiss="modal">Submit</a> -->
                          </div>
                      </div>
                    </div>
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                  <button type="submit" name="submit" class="btn btn-default btn-color ">Submit</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
          </form>

      </div>
    </div>
  </div>
  <script>
   document.addEventListener('DOMContentLoaded', function() {
        const passwordInput = document.getElementById('password1');
        const showButton = document.getElementById('showButton1');

        showButton.addEventListener('click', function() {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                showButton.textContent = 'Hide';
            } else {
                passwordInput.type = 'password';
                showButton.textContent = 'Show';
            }
        });
    });
    
    </script>