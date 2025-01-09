
    <style>
        .profile-badge{
            border:1px solid #c1c1c1;
            padding:5px;
            position: relative;
        }

        .user-detail{
            background-color: #fff;
            position: relative;
            padding:150px 0px 10px 0px;
            color:#8B8B89;
        }
        .user-detail h3{
            margin: 0px;
            margin:0px 0px 5px 0px;
            color: #000;
        }
        .user-detail p{
            font-size:14px;
        }
        .user-detail .btn{
            margin-bottom:10px;
            background-color: #fff;
            border:1px solid #DEDEDE;
            border-radius: 10px;
            color:black;
            margin-left:15px;
        }
        .user-detail .btn i{
            color:#D35B4D;
            padding-right:18px;
        }
        .profile-pic{
            position: absolute;
            height:120px;
            width:120px;
            left: 50%;
            transform: translateX(-50%);
            top: 0px;
            z-index: 1001;
            padding: 10px;
        }
        .profile-pic img{
         
            border-radius: 50%;
            box-shadow: 0px 0px 5px 0px #c1c1c1;
            cursor: pointer;
            width: 100px;
            height: 100px;
        } 
        .profile{
            padding:80px;
        }

    </style>
    <section class="profile">
        
        <div class="container">
            <form method="post" class="advance_form" id="candidate_form" action="<?=base_url('candidate_profile/update_profile')?>" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 col-md-offset-4 col-sm-6 col-xs-12 profile-badge">
                    <!-- <img src="https://dummyimage.com/600x400/000/"> -->
                    <div class="profile-pic">
                        <img alt="User Pic" src="<?php echo base_url();?><?php echo $user_details[0]->image ?> " id="profile-image1" height="200">
                        <input id="profile-image-upload" name="profile_image" class="hidden" type="file" onchange="previewFile()" >
                        <input id="profile-image-upload" type="hidden" name="profile_old" value="<?php echo $user_details[0]->image ?>" class="hidden" type="file" onchange="previewFile()" >
                        <div style="color:#999;" ></div>
                    </div>
                    <div class="user-detail ">
                      <div class="col-md-6 form-group">  
                        <label for="Fname">Full Name</label>
                        <input type="text" class="form-control" id="fname"value="<?php echo $user_details[0]->candidate_name ?>" name="candidate_name"  placeholder="Enter First Name" name="name">
                    </div>
                    <div class="col-md-6 form-group">   
                        <label for="email">Email ID</label>
                        <input type="varchar" class="form-control" value="<?php echo $user_details[0]->candidate_email ?>" name="candidate_email" id="email" placeholder="Enter Mail " name="mail">
                    </div>
                    <div class="col-md-6 form-group">  
                        <label for="mobile">Mobile Number</label>
                        <input type="text" class="form-control" value="<?php echo $user_details[0]->candidate_phone ?>"  id="mobile"name="candidate_phone" placeholder="Enter Mobile Number" name="Mobile">
                    </div>
                    <div class="col-md-6 form-group">  
                        <label for="mobile">Password</label>
                        <input type="password" class="form-control" value="" onkeyup='check();' id="candidate_password"name="candidate_password" placeholder="Enter Password" >
                        <input type="hidden" class="form-control" value="<?php echo $user_details[0]->candidate_password ?>"  id="candidate_old_password"name="candidate_old_password" placeholder="Enter Password" name="Mobile">
                    </div>
                    <div class="col-md-6 form-group">  
                        <label for="mobile">Confirm Password</label>
                        <input type="password" class="form-control" value="" onkeyup='check();' id="candidate_confirm_password"name="candidate_confirm_password" placeholder="Enter Confirm Password" >
                         <span id='message'></span>
                    </div>
                    <input type="submit" class="btn btn-info" value="Update Profile">                                                               
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </form>
        </div>
     
    </section>
    
    
    <script>
     <script type="text/javascript">
  $(document).ready( function() 
  {
      var base_url = "<?php echo base_url();?>";
      jQuery.validator.addMethod("emailtest", function(value, element) {
        return this.optional(element) || /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$/i.test(value);
    }, "Please enter a valid Email ID");

    $("#candidate_form").validate(
    {
      errorElement: "span", 

      rules: 
      {
        candidate_email: 
        {
          required:true,
          emailtest:true,
          remote: {
                url: base_url+"candidate_profile_login/check_email_exists_registration",
                type: "post",
                data: {
                    candidate_email: function() {
                        return $("#candidate_email").val();
                    },
                }
            }
        },
         candidate_name: 
        {
          required:true,
        },
         candidate_phone: 
        {
          required:true,
        },
          candidate_password: 
        {
          required:true,
        },
           candidate_confirm_password: 
        {
          required:true,
        },
      },

      messages: 
      { 
        candidate_email: 
        {
          required:"Required",
          remote:"Invalid Email.Please Enter Valid Email",
        },
        candidate_password: 
        {
          required:"Required",
          remote:"Invalid Password.Please Enter Valid Password",
        },
         candidate_name: 
        {
          required:"Required",
          remote:"Invalid Password.Please Enter Valid Password",
        },
         candidate_confirm_password: 
        {
          required:"Required",
          remote:"Invalid Password.Please Enter Valid Password",
        },
         candidate_phone: 
        {
          required:"Required",
          remote:"Invalid Password.Please Enter Valid Password",
        },
      },
    });
  });


 
function previewFile() {
          var preview = document.querySelector('img');
          var file    = document.querySelector('input[type=file]').files[0];
          var reader  = new FileReader();

          reader.addEventListener("load", function () {
            preview.src = reader.result;
        }, false);

          if (file) {
            reader.readAsDataURL(file);
        }
    }
    $(function() {
        $('#profile-image1').on('click', function() {
            $('#profile-image-upload').click();
        });
    });
    
</script>