<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMi8Q8dM6m+6S1rnXY+z84tvj3enSHkfKj5p5t1" crossorigin="anonymous">

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
        <form id="registration_form" action="<?php echo base_url("job_post/save_short_registration"); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="company_name">Company Name<span style="color: red;">*</span></label>
                <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Enter your Company Name" required>
            </div>
            <div class="form-group">
                <label for="email">Email<span style="color: red;">*</span></label>
                <input type="email" name="email_id" id="email_id" class="form-control" placeholder="Enter your email" required>
                <button type="button" class="frSendOTP" id="send_otp" name="send_otp" class="btn btn-secondary">Send OTP</button>
            </div>
            <!--for offcial mail id-->
            <!--<div class="form-group">-->
            <!--    <label for="email">Email<span style="color: red;">*</span></label>-->
            <!--    <input type="email" name="email_id" id="email_id" class="form-control" -->
            <!--           placeholder="Enter your email" required -->
            <!--           pattern="^[a-zA-Z0-9._%+-]+@yourcompany\.com$" -->
            <!--           title="Please enter your official email address (e.g., name@yourcompany.com)">-->
            <!--    <button type="button" class="frSendOTP btn btn-secondary" id="send_otp">Send OTP</button>-->
            <!--</div>-->

            
            <!--<script>-->
            <!--    document.getElementById('email_id').addEventListener('input', function () {-->
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
                <label for="otp">Enter OTP<span style="color: red;">*</span></label>
                <input type="text" name="otp" id="otp" class="form-control" placeholder="Enter OTP" required>
            </div>  
            <div class="form-group">
                <label for="passwords">Enter Password <span style="color: red;">*</span></label>
                <div style="display: flex; align-items: center; position: relative;">
                    <input type="password" name="passwords" id="passwords" class="form-control" placeholder="Enter password" autocomplete="off" required>
                    <i class="fa fa-eye" id="togglePasswordIcon1" onclick="togglePasswordVisibility('passwords', 'togglePasswordIcon1')" style="position: absolute; right: 10px; cursor: pointer;"></i>
                </div>
            </div>
            
            <div class="form-group">
                <label for="repassword">Re-Enter Password <span style="color: red;">*</span></label>
                <div style="display: flex; align-items: center; position: relative;">
                    <input type="password" name="repassword" id="repassword" class="form-control" placeholder="Re-Enter password" required>
                    <i class="fa fa-eye" id="togglePasswordIcon2" onclick="togglePasswordVisibility('repassword', 'togglePasswordIcon2')" style="position: absolute; right: 10px; cursor: pointer;"></i>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary" id="register_btn">Register</button>
            </div> 
        </form>
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
    // Send OTP button click event
    $('#send_otp').on('click', function() {
        var email_id = $('#email_id').val();
        var company_name = $('#company_name').val();
        console.log("Email ID: " + email_id);  // Log email ID
        console.log("Company Name: " + company_name);  // Log company name
        if (email_id === "" || company_name === "") {
            alert("Please fill in your company name and email.");
            return;
        }
        
        $.ajax({
            url: '<?php echo base_url("job_post/send_otp"); ?>',
            type: "POST",
            data: { company_name: company_name, email_id: email_id },
            success: function(response) {
                console.log("Server Response: ", response);
                var res = JSON.parse(response);
                if (res.success) {
                    alert("Please check your email for OTP.");
                } else {
                    alert(res.message || "Failed to send OTP.");
                }
            },
            error: function(error) {
                console.error("OTP request failed:", error);
                alert("Something went wrong while sending OTP. Please try again.");
            }
        });
    });

$('#register_btn').on('click', function(event) {
    var otp = $('#otp').val().trim();
    var password = $('#passwords').val().trim();
    var repassword = $('#repassword').val().trim();

    console.log("OTP:", otp);
    console.log("Password:", password);
    console.log("Re-entered Password:", repassword);

    if (otp === "") {
        event.preventDefault();
        alert("Please enter the OTP to complete registration.");
        return;
    }

    if (password !== repassword) {
        event.preventDefault();
        alert("Passwords do not match. Please re-enter the same password.");
        return;
    }
});

</script>
