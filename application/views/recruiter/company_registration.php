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

   <div class="container frcompanyLoginForm">
    <div class="col-md-6 col-lg-6 col-sm-12 compLoginFormInn">
 <h3>Registration</h3>
  <form action="<?php echo base_url("job_post/saveRegistration"); ?>" name="" id="" method="post" enctype="multipart/form-data">
    <textarea style="display:none;" id="job_data" name="job_data" rows="20" cols="100"><?php echo $companyData; ?></textarea><br><br>

            <!--<texarea type="text" class="form-control"><?php echo $companyData; ?></textarea>-->

      <div class="form-group">
    <label for="company_name">Company Name</label><span style="color: red;">*</span>
    <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Enter your Company Name" required>
  </div>
  <div class="form-group">
   <label for="email">Email</label><span style="color: red;">*</span>
        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
  </div>
  <!--for offcial mail id-->
            <!--<div class="form-group">-->
            <!--    <label for="email">Email<span style="color: red;">*</span></label>-->
            <!--    <input type="email" name="email" id="email" class="form-control" -->
            <!--           placeholder="Enter your email" required -->
            <!--           pattern="^[a-zA-Z0-9._%+-]+@yourcompany\.com$" -->
            <!--           title="Please enter your official email address (e.g., name@yourcompany.com)">-->
            <!--    <button type="button" class="frSendOTP btn btn-secondary" id="send_otp">Send OTP</button>-->
            <!--</div>-->

            
            <!--<script>-->
            <!--    document.getElementById('email').addEventListener('input', function () {-->
            <!--        const emailField = this;-->
                    <!--const validEmailPattern = /^[a-zA-Z0-9._%+-]+@company\.com$/; // Adjust the domain as needed-->
            
            <!--        if (!validEmailPattern.test(emailField.value)) {-->
            <!--            emailField.setCustomValidity("Please enter your company email address (e.g., name@company.com)");-->
            <!--        } else {-->
                        <!--emailField.setCustomValidity(""); // Clear the error message-->
            <!--        }-->
            <!--    });-->
            <!--</script>-->
<!--for offcial mail id-->
  
  <div class="form-group">
    <label for="phone">Contact Number</label><span style="color: red;">*</span>
    <input type="tel" name="phone" id="phone" class="form-control" placeholder="Enter your phone number" required 
           pattern="\d{10,12}" title="Phone number must be between 10 to 12 digits">
    </div>
    <p id="phone_error" style="color:red; display:none;">Please enter a valid phone number (10-12 digits)</p>

   
   <div class="form-group">
        <label for="address">Address</label><span style="color: red;">*</span>
                <input type="text" name="address" id="address" class="form-control" placeholder="Enter your address" required>
   </div>
   
   <div class="form-group">
       <label for="website">Website</label>
                <input type="text" name="website" id="website" class="form-control" placeholder="Enter your company website">
   </div>

   <div class="form-group">
        <label for="description">Company Description</label><span style="color: red;">*</span>
        <textarea name="description" id="description" class="form-control" rows="4" placeholder="Describe your company"></textarea>
   </div>
   <div class="form-group">
        <label for="logo">Company Logo</label><span style="color: red;">*</span>
        <input type="file" name="logo" id="logo" class="form-control" rows="4" placeholder="upload logo" required>
   </div>
   <div class="form-group">
        <label for="compavideo">Upload Company Introduction Video<span style="font-size: 12px; color: #777;">(Max size: 2MB)</span></label>
            <input type="file" class="form-control-file" name="compavideo" id="compavideo" accept="video/*">
        <small id="emailHelp" class="form-text text-muted">Allowed formats: mp4, avi, wmv, flv, mov, mkv. Max size: 2 MB.</small>
    </div>

   
   <div class="form-group">
                <button type="submit" class="btn btn-primary">Register</button>
   </div>
   <script>
       document.getElementById('compavideo').addEventListener('change', function() {
    const file = this.files[0];
    if (file.size > 2 * 1024 * 1024) { // 2 MB
        alert('File size exceeds 2 MB');
        this.value = ''; // Clear the input
    }
});

document.getElementById("phone").addEventListener("input", function () {
    const phoneInput = this.value;
    const phoneError = document.getElementById("phone_error");

    const phonePattern = /^\d{10,12}$/;

    if (phonePattern.test(phoneInput)) {
        phoneError.style.display = "none";
    } else {
        phoneError.style.display = "block";
    }
});

   </script>
    </div>
  </div>
  </div>

  
  
  
  
