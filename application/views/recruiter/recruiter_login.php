<?php if ($this->session->flashdata('success')): ?>
    <script>
        $(document).ready(function() {
            toastr.success('<?php echo $this->session->flashdata('success'); ?>', 'Success');
        });
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
    <script>
        $(document).ready(function() {
            toastr.error('<?php echo $this->session->flashdata('error'); ?>', 'Error');
        });
    </script>
<?php endif; ?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<link rel="stylesheet" href="<?php echo base_url();?>backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css">

<section>
  <div class="container-fluid h-custom">
      <div class="container">
    <div class="row forRecruiRegFormm">
      <div class="col-md-6 col-lg-6 col-sm-12 forLeftPartTextt">
       <!-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
          class="img-fluid" alt="Sample image">-->
        <h1>Find the Perfect<br>Candidates with<br><strong>FREE Job Listings!</strong></h1>  
        <p>Access a talent pool of over 10 million students and professionals ready to make an impact.</p>
          
      </div>

      <div class="col-md-6 col-lg-6 col-sm-12">
        <!-- Login Form -->
        <form class="recruReg" action="<?php echo base_url("job_post/login"); ?>" method="post">
            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="email">Email address<span style="color: red;">*</span></label>
                <input type="email" id="email" name="email" class="form-control form-control-lg"
                    placeholder="Enter a valid email address" required />
            </div>
            <!--for offcial mail id-->
        <!--    <div class="form-outline mb-4">-->
        <!--    <label class="form-label" for="email">Email address<span style="color: red;">*</span></label>-->
        <!--    <input type="email" id="email" name="email" class="form-control form-control-lg"-->
        <!--       placeholder="Enter a valid email address" required -->
        <!--       pattern="^[a-zA-Z0-9._%+-]+@company\.com$" -->
        <!--       title="Please enter your official email address (e.g., name@company.com)" />-->
        <!--    </div>-->

        <!--<script>-->
        <!--    document.getElementById('email').addEventListener('input', function () {-->
        <!--        const emailField = this;-->
                <!--const validEmailPattern = /^[a-zA-Z0-9._%+-]+@company\.com$/; // Adjust the domain as needed-->
        
        <!--        if (!validEmailPattern.test(emailField.value)) {-->
        <!--            emailField.setCustomValidity("Please enter your official email address (e.g., name@company.com)");-->
        <!--        } else {-->
                    <!--emailField.setCustomValidity(""); // Clear the error message-->
        <!--        }-->
        <!--    });-->
        <!--</script>-->

        <!--for offcial mail id-->
            <!-- Password input -->
            <!--<div class="form-outline mb-3">-->
            <!--    <label class="form-label" for="password">Password<span style="color: red;">*</span></label>-->
            <!--    <input type="password" id="password" name="password" class="form-control form-control-lg"-->
            <!--        placeholder="Enter password" required />-->
            <!--</div>-->
            <div class="form-group">
                <label for="passwords">Enter Password <span style="color: red;">*</span></label>
                <div style="display: flex; align-items: center; position: relative;">
                    <input type="password" name="passwords" id="passwords" class="form-control" placeholder="Enter password" autocomplete="off" required>
                    <i class="fa fa-eye" id="togglePasswordIcon1" onclick="togglePasswordVisibility('passwords', 'togglePasswordIcon1')" style="position: absolute; right: 10px; cursor: pointer;"></i>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <!-- Checkbox -->
                <div class="">
                    <input class="" type="checkbox" value="" id="form2Example3" />
                    <label class="form-check-label" for="form2Example3">
                        Remember me
                    </label>
                </div>
                <a href="javascript:void(0);" class="text-body" id="forgotPasswordLink">Forgot password?</a>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary btn-md"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="<?php echo base_url('job_post/company_short_registration') ?>"
                    class="link-danger">Register</a></p>
            </div>
        </form>

        <!-- Forgot Password Modal -->
        <div class="modal" id="forgotPasswordModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Forgot Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="forgotPasswordForm">
                            <div class="form-group">
                                <label for="forgotEmail">Enter your email address</label>
                                <input type="email" class="form-control" id="forgotEmail" placeholder="Enter email" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Send Reset Link</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<script>
    function togglePasswordVisibility(inputId, iconId) {
        var passwordInput = document.getElementById(inputId);
        var toggleIcon = document.getElementById(iconId);
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleIcon.classList.remove("fa-eye");
            toggleIcon.classList.add("fa-eye-slash");
        } else {
            passwordInput.type = "password";
            toggleIcon.classList.remove("fa-eye-slash");
            toggleIcon.classList.add("fa-eye");
        }
    }
</script>
        <script>
            // Show modal on "Forgot password?" link click
            document.getElementById('forgotPasswordLink').addEventListener('click', function () {
                $('#forgotPasswordModal').modal('show');
            });

            // Handle form submission to send email for password reset
            $('#forgotPasswordForm').on('submit', function (e) {
                e.preventDefault(); // prevent form submission
                var email = $('#forgotEmail').val();
                
                if (email !== '') {
                    // Send AJAX request to backend to process the reset email
                    $.ajax({
                        url: "<?php echo base_url('job_post/send_reset_link'); ?>",
                        type: "POST",
                        data: { email: email },
                        success: function (response) {
                            alert("A password reset link has been sent to your email.");
                            $('#forgotPasswordModal').modal('hide');
                        },
                        error: function () {
                            alert("Failed to send reset link. Please try again.");
                        }
                    });
                } else {
                    alert("Please enter your email.");
                }
            });
        </script>

      </div>
    </div>
    </div>
  </div>
  
  <div class="container-fluid frWhyJobPostsss">
      <div class="container">
          <h3>Why post jobs and internships for free on SharksJob.com?</h3>
      <div id="accordion">
    <div class="card">
      <div class="card-header">
        <a class="card-link" data-toggle="collapse" href="#collapseOne">
          Close Your Hiring Faster with SharksJob.com
        </a>
      </div>
      <div id="collapseOne" class="collapse show" data-parent="#accordion">
        <div class="card-body">
          Post your job vacancies and wrap up hiring efficiently and with minimal effort. Here’s how SharksJob can accelerate your recruitment process.
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
        Reach the Right Talent with Targeted Free Postings
      </a>
      </div>
      <div id="collapseTwo" class="collapse" data-parent="#accordion">
        <div class="card-body">
          By posting on SharksJob.com, you reach a community of 10 million+ students and professionals continuously building their skills. This ensures that your job openings stand out, connecting you with the candidates who are best suited for your roles—without the noise of generic job boards.
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
          End-to-End Hiring on a Single Platform
        </a>
      </div>
      <div id="collapseThree" class="collapse" data-parent="#accordion">
        <div class="card-body">
          From job listings and applications to assessments, interviews, and offers, SharksJob provides all the tools you need to streamline hiring. Our platform empowers you to connect with, evaluate, and communicate with candidates efficiently.
        </div>
      </div>
    </div>
    
    <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#collapseFour">
          Robust Assessment Options for Precise Hiring
        </a>
      </div>
      <div id="collapseFour" class="collapse" data-parent="#accordion">
        <div class="card-body">
         Select from a broad range of tech and non-tech assessments designed to help you identify top candidates. Our assessments are accurate, customizable, and easy to set up, enabling you to hire confidently.
        </div>
      </div>
    </div>
    
    <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#collapseFive">
          Strengthen Your Employer Brand
        </a>
      </div>
      <div id="collapseFive" class="collapse" data-parent="#accordion">
        <div class="card-body">
          At SharksJob.com, your organization benefits from a no-code custom microsite and a dedicated employer page. This allows candidates to learn about your company and make informed applications, enhancing your brand presence. A dedicated “Recruiter Diary” also highlights your organization’s values and culture, making you stand out from the competition."
        </div>
      </div>
    </div>
    
  </div>
      </div>
  </div>
</section>
