
   function validateFP(){
        if($('#does_email_exists').val()==0){
            $('#email_msg').html('<font color="red">Please Enter Proper Email Format & Exist Email</font>');
            alert('Email does not exist.');
            return false;
        }
   }

   function checkIDAvailability()
    {
       var postURL = CI.base_url+"login/forgot_password_email_exits";
        user_email =  $('#user_email').val();
           if(user_email)
           {
           $.ajax({
                            cache:false,
                            async:false,
                            type: "POST",
                            data: { emailqq: $('#user_email').val()},
                            url: postURL,
                            success: function(msg) 
                            {
                               if(msg!='TRUE')
                               {
                                 $('#does_email_exists').val(0);
                                 $('#email_msg').html('<font color="red">Please Enter Valid Email with Proper Format</font>');
                               }else{
                                   $('#does_email_exists').val(1);
                                   $('#email_msg').html('');
                               }
                            }
                    });
           }
        }

   function check_db_validateFP(){
        if($('#check_db_does_email_exists').val()==0){
            $('#check_db_email_msg').html('<font color="red">Please Enter Valid Email with Proper Format</font>');
            return false;
        }
        if($('#password_check_db_does_email_exists').val()==0){
            $('#password_check_db_email_msg').html('<font color="red">Please Enter Correct Password</font>');
            return false;
        }
   }

   function check_db_checkIDAvailability()
    {
       var postURL = CI.base_url+"login/check_db_forgot_password_email_exits";
            email =  $('#email').val();
           if(email)
           {
                $.ajax({
                            cache:false,
                            async:false,
                            type: "POST",
                            data: { email: $('#email').val()},
                            url: postURL,
                            success: function(msg) 
                            {
                               if(msg!='TRUE')
                               {
                                 $('#check_db_does_email_exists').val(0);
                                 $('#check_db_email_msg').html('<font color="red">Please Enter Proper Email Format & Exist Email</font>');
                               }else{
                                   $('#check_db_does_email_exists').val(1);
                                   $('#check_db_email_msg').html('');
                               }
                            }
                    }); 
            }          
        }



   function password_check_db_checkIDAvailability()
    {
       var postURL = CI.base_url+"login/password_check_db_forgot_password_email_exits";
            email =  $('#email').val();
            password =  $('#password').val();
           if(password)
           {
                $.ajax({
                            cache:false,
                            async:false,
                            type: "POST",
                            data: { email: $('#email').val(), password: $('#password').val()},
                            url: postURL,
                            success: function(msg) 
                            {
                               if(msg!='TRUE')
                               {
                                 $('#password_check_db_does_email_exists').val(0);
                                 $('#password_check_db_email_msg').html('<font color="red">Please Enter Correct Password</font>');
                               }else{
                                   $('#password_check_db_does_email_exists').val(1);
                                   $('#password_check_db_email_msg').html('');
                               }
                            }
                    }); 
            }          
        }


                $(document).keypress(
    function(event){
     if (event.which == '13') {
        //event.preventDefault();
         checkIDAvailability();
         check_db_checkIDAvailability();
         password_check_db_checkIDAvailability();
      }


});


$(document).ready( function() 
{

  jQuery.validator.addMethod("emailtest", function(value, element) {
    return this.optional(element) || /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$/i.test(value);
  }, "Please enter a valid Email ID");    

  
    $("#login_form").validate(
    {
        errorElement: "span", 

        rules: 
        {
            email: 
            {
                required:true
            },
            password: 
            {
                required:true
            }
        },

        messages: 
        { 
            email: 
            {
                required:"Required"
            },
            password: 
            {  
                required:"Required"
            }
        },

        errorPlacement: function(error, element) 
        {               
            error.appendTo(element.parent());     
        } 

    } );

        $("#forgot_pass_check_register_email").validate(
    {
        errorElement: "span", 

        rules: 
        {
            user_email: 
            {
                required:true
            }


        },

        messages: 
        { 
            user_email: 
            {
                required:"Required"            }
        },

        errorPlacement: function(error, element) 
        {               
            error.appendTo(element.parent());     
        } 

    } );

} );