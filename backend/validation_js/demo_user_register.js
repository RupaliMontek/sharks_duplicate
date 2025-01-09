  function check_registeration_for_demouser_exists_form(){
        if($('#check_db_does_email_exists').val()==0){
            $('#check_db_email_msg').html('<font color="red">Email ID Allready Exists</font>');
            return false;
        }
   }

   function check_registeration_for_demouser_exists()
    {
       var postURL = CI.base_url+"register/check_registeration_for_demouser_exists";
            email =  $('#email_id').val();
           if(email)
           {
                $.ajax({
                            cache:false,
                            async:false,
                            type: "POST",
                            data: { email: $('#email_id').val()},
                            url: postURL,
                            success: function(msg) 
                            {
                               if(msg!='TRUE')
                               {
                                 $('#check_db_does_email_exists').val(0);
                                 $('#check_db_email_msg').html('<font color="red">Email ID Allready Exists</font>');
                               }else{
                                   $('#check_db_does_email_exists').val(1);
                                   $('#check_db_email_msg').html('');
                               }
                            }
                    }); 
            }          
        }

  $(document).keypress(
    function(event){
     if (event.which == '13') {
         check_registeration_for_demouser_exists();
      }


});


$(document).ready( function() 
{

  jQuery.validator.addMethod("emailtest", function(value, element) {
    return this.optional(element) || /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$/i.test(value);
  }, "Please enter a valid Email ID");    

   jQuery.validator.addMethod("myPasswordMethod",function(value, element) {
return /^(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[A-Z])[a-zA-Z0-9!@#$%^&*]{6,16}$/.test(value);
},

"Please include combination of uppercase,lowercase,special characters and number!!"

);

    $("#demo_user_register").validate(
    {
        errorElement: "span", 

        rules: 
        {
            first_name: 
            {
                required:true
            },
            last_name: 
            {
                required:true
            },
            email_id: 
            {
                required:true,
                emailtest:true
            },
            contact_number: 
            {
                required:true
            },
            login_password: 
            {
                required:true,
                myPasswordMethod:true,
            }
        },

        messages: 
        { 
            first_name: 
            {
                required:"Required"
            },
            last_name: 
            {  
                required:"Required"
            },
            email_id: 
            {  
                required:"Required"
            },
            contact_number: 
            {  
                required:"Required"
            },
            login_password: 
            {  
                required:"Required"
            }
        },

        errorPlacement: function(error, element) 
        {               
            error.appendTo(element.parent());     
        } 

    } );

} );






