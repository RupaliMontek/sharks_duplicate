<div class="container-fluid onRegisteringtextOuter"> 
<div class="container"> 
    <div class="row">
        <div class="col-lg-4 col-sm-12">
    <ul class="onRegisteringtext">
      <h4>On registering, you can</h4>
    <li><i class="fa fa-angle-double-right"></i> Build your profile and let recruiters find you</li>
    <li><i class="fa fa-angle-double-right"></i> Get job postings delivered right to your email</li>
    <li><i class="fa fa-angle-double-right"></i> Find a job and grow your career</li>
  </ul>
        </div>
        <div class="col-lg-6 col-sm-12">
<?php if ($this->session->flashdata("success") != "") { ?>
  <script>
    toastr.success('<?php echo $this->session->flashdata(
        "success"
    ); ?>', 'Success Alert', {timeOut: 8000})
  </script>
<?php } ?>
<?php if ($this->session->flashdata("error") != "") { ?>
  <script>
    toastr.error('<?php echo $this->session->flashdata(
        "error"
    ); ?>', {timeOut: 8000})
  </script>
<?php } ?>  
       <!-- <form class="forcreateaccount"> -->
        
        <?php
        $attributes = ["role" => "form", "id" => "candidate_registration"];
        echo form_open_multipart("", $attributes);
        ?>
         <h1>Find a job & grow your career</h1>
  <div class="form-group viewformmmm">
    <label class="" for="exampleInputName">Name : <p><?php echo $candidate_details->name." ".$candidate_details->m_name." ".$candidate_details->l_name; ?></p></label>
     
  </div>
  <div class="form-group viewformmmm">
    <label for="exampleInputEmail1">Email ID / Username : <p><?php echo $candidate_details->email; ?> </p></label>
  </div>

  
  <div class="form-group viewformmmm">
    <label for="exampleInputEmail1">Mobile Number : <p><?php echo $candidate_details->contact; ?></p></label>
  </div>
  
   <div class="form-group viewformmmm">
    <label for="exampleInputEmail1">Department : <p><?php echo $candidate_details->dept_name; ?></p></label>
  </div>

<div class="form-group viewformmmm">
<label for="work_status">Work Status : <p><?php echo $candidate_details->candidate_work_status; ?></p></label>
</div>

<div class="form-group viewformmmm">
    <label for="exampleFormControlFile1">Upload Resume : <a href="<?php if(!empty($candidate_details->resume)){ echo $candidate_details->resume;} else{ echo "#";} ?>">Resume</a></label>
  </div>
 
<div class="form-group viewformmmm">
    <label for="exampleFormControlFile1">Profile Picture : <p><img width="150" height="auto" src="<?php if(!empty($candidate_details->image)){ echo base_url($candidate_details->resume);} else{ echo base_url("frontend/images/porfPic.jpg");} ?>"></p></label>
  </div>

  
<?php echo form_close(); ?>
        </div>
        <div class="col-lg-2 col-sm-12">
          <div class="googleSignUpdesign mobilegooglesign">
<span class="foror main-1">OR</span> <a href="<?php echo @$login_google; ?>"><div class="google-sigup-square"><span class="signupwith main-2">Continue with</span><button class="socialbtn google resman-btn-tertiary resman-btn-medium" type="button" name="google-register"><span class="icon-holder"><img src="//static.naukimg.com/s/7/104/assets/images/google-icon.9273ac87.svg" class="socialIcnImg"></span><span class="google-text">Google</span></button></div></a></div>
        </div>
    </div>
  </div>
</div>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">        
        
        <div class="modal-content">
        <div class="modal-header">         
         <h2 class="main_title heading"><span>verify your email address</span></h2> 
         <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
         <div id="verify_email_popup" class="white-popup-block mfp-hide popup-position">
            <div class="popup-title">
                 
            </div>            
                  <div class="popup-detail">
                    <?php
                    $user_details = $this->M_Candidate_profile->get_user_details_by_id_admin(
                        2
                    );
                    $attributes = ["id" => "resend_verification_email"];
                    echo form_open_multipart(
                        "recruitment/resend_verification_email",
                        $attributes
                    );
                    ?> 
                    <div class="main-search">
                        <div class="header_search_toggle desktop-view">
                            <div class="search-box">
                       &nbsp;&nbsp;&nbsp;&nbsp;<label for="work_status"> Email Id:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       <input class="form-control" type="email" name="email" id="emails" placeholder="Email ID" value="">
                                </div>
                            </div>
                            </br>
                             
                      &nbsp;&nbsp;&nbsp;&nbsp;<span>Not Received Mail? <button id="verify_email" type="submit" class="btn-primary">Resend Verification Link</button></span>  
                        </div>
                        <?php echo form_close(); ?>
  </div>  
    </div>         
      </div>
      </div>
      </div>
