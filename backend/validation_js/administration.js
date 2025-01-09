var CI = {
    'base_url': 'https://msuite.work/'    
     };

   function check_db_checkIDAvailability_add()
    {
       var postURL = CI.base_url+"user/admin_user/check_demo_user_email_exists_add";
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
                                 $('#check_db_email_msg').html('<font color="red">Email ID Allready Exists</font>');
                               }else{
                                   $('#check_db_does_email_exists').val(1);
                                   $('#check_db_email_msg').html('');
                               }
                            }
                    }); 
            }          
        }

$(document).ready( function() 
{

  jQuery.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[a-zA-Z,\s]*$/.test(value);
  }, "Only letters with space.");


  jQuery.validator.addMethod("notEqual", function(value, element) { 
    return this.optional(element) || value != "0000000000";
  }, "Invalid mobile number.");

  jQuery.validator.addMethod("emailtest", function(value, element) {
    return this.optional(element) || /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$/i.test(value);
  }, "Please enter a valid Email ID");    


  jQuery.validator.addMethod("assign_employee", function(value) { 
      var postURL = CI.base_url+"hr/salary_component_emp/check_assign_employee";
      $.ajax({
                  cache:false,
                  async:false,
                  type: "POST",
                  data: { employee_id: $('#employee_id').val()},
                  url: postURL,
                  success: function(msg) {
                  result = (msg=='TRUE') ? true : false;
              }
          });
       return result;
   }, '');

    jQuery.validator.addMethod("asigned_bank_details", function(value) { 
      var postURLaaa = CI.base_url+"user/admin_user/check_bank_details_assign_employee";

      $.ajax({
                  cache:false,
                  async:false,
                  type: "POST",
                  data: { emp: $('#emp').val()},
                  url: postURLaaa,
                  success: function(msg) {
                  result = (msg=='TRUE') ? true : false;
              }
          });
       return result;
   }, '');

    $("#AddEditDepartment").validate(
    {
        errorElement: "span", 
        rules: 
        {
            dept_name:
            {
              required:true
            }
        },
        messages: 
        { 
            dept_name:
            {
              required:"Required"
            }
        },
        errorPlacement: function(error, element) 
        {               
            error.appendTo(element.parent());     
        } 
    } );

    $("#AddEditRole").validate(
    {
        errorElement: "span", 
        rules: 
        {
            dept_id:
            {
              required:true
            },
            role_name:
            {
              required:true,
              lettersonly:true
            }
        },
        messages: 
        { 
            dept_id:
            {
              required:"Required"
            },
            role_name:
            {
              required:"Required"
            }
        },
        errorPlacement: function(error, element) 
        {               
            error.appendTo(element.parent());     
        } 
    } );

    $("#AddEditEmployeeDetails").validate(
    {
        errorElement: "span", 
        rules: 
        {
            dept:
            {
              required:true
            },
            role:
            {
              required:true
            },
            position_for:
            {
              required:true
            },
            // offer_date:
            // {
            //   required:true
            // },
            // joining_date:
            // {
            //   required:true
            // },
            dob:
            {
              required:true
            },
            name:
            {
              required:true
            },
            emp_off_id:
            {
              required:true,
              digits:true
            },
            l_name:
            {
              required:true
            },
            personal_email:
            {
              required:true
            },
            email:
            {
              required:true,
              emailtest:true
            },
            password:
            {
              required:true,
              minlength:"6",
              maxlength:"20"
            },
            contact:
            {
              required:true,
              notEqual:true,
              minlength:"10",
              maxlength:"10",
              digits:true
            },
            gender:
            {
              required:true
            }
        },
        messages: 
        { 
            dept:
            {
              required:"Required"
            },
            role:
            {
              required:"Required"
            },
            position_for:
            {
              required:"Required"
            },
            // offer_date:
            // {
            //   required:"Required"
            // },
            // joining_date:
            // {
            //   required:"Required"
            // },
            dob:
            {
              required:"Required"
            },
            name:
            {
              required:"Required"
            },
            emp_off_id:
            {
              required:"Required"
            },
            l_name:
            {
              required:"Required"
            },
            personal_email:
            {
              required:"Required"
            },
            email:
            {
              required:"Required"
            },
            password:
            {
              required:"Required"
            },
            contact:
            {
              required:"Required"
            },
            gender:
            {
              required:"Required"
            }
        },
        errorPlacement: function(error, element) 
        {               
            error.appendTo(element.parent());     
        } 
    } );

    $("#AddEditTask").validate(
    {
        ignore: ":hidden",
        errorElement: "span", 
        rules: 
        {
            dept:
            {
              required:true
            },
            'emp1[]':
            {
              required:true
            },
            'thinks_to_do':
            {
              required:true
            },
            'description':
            {
              required:true
            },
            'deadline':
            {
              required:true
            }
        },
        messages: 
        { 
            dept:
            {
              required:"Required"
            },
            'emp1[]':
            {
              required:"Required"
            },
            'thinks_to_do':
            {
              required:"Required"
            },
            'description':
            {
              required:"Required"
            },
            'deadline':
            {
              required:"Required"
            }
        },
        errorPlacement: function(error, element) 
        {               
            error.appendTo(element.parent());     
        } 
    } );


    $("#AddEditDailyReport").validate(
    {
        errorElement: "span", 
        rules: 
        {
            date:
            {
              required:true
            },
            assignment:
            {
              required:true
            },
            projectwork:
            {
              required:true
            },
            duedate:
            {
              required:true
            },
            fromtime:
            {
              required:true
            },
            totime:
            {
              required:true
            }
        },
        messages: 
        { 
            date:
            {
              required:"Required"
            },
            assignment:
            {
              required:"Required"
            },
            projectwork:
            {
              required:"Required"
            },
            duedate:
            {
              required:"Required"
            },
            fromtime:
            {
              required:"Required"
            },
            totime:
            {
              required:"Required"
            }
        },
        errorPlacement: function(error, element) 
        {               
            error.appendTo(element.parent());     
        } 
    } );


    $("#AddEditLeave").validate(
    {
        errorElement: "span", 
        rules: 
        {
            reasons:
            {
              required:true
            },
            emergency_contact:
            {
              required:true,
              notEqual:true,
              minlength:"10",
              maxlength:"12",
              digits:true
            }
        },
        messages: 
        { 
            reasons:
            {
              required:"Required"
            },
            emergency_contact:
            {
              required:"Required"
              
            }
        },
        errorPlacement: function(error, element) 
        {               
            error.appendTo(element.parent());     
        } 
    } );


    $("#AddEditBankDetails").validate(
    {
        errorElement: "span", 
        rules: 
        {
            dept:
            {
              required:true
            },
            emp:
            {
              required:true,
              asigned_bank_details:true
            },
            bank_name:
            {
              required:true
            },
            bank_address:
            {
              required:true
            },
            account_no:
            {
              required:true
            },
            ifsc_code:
            {
              required:true
            }
        },
        messages: 
        { 
            dept:
            {
              required:"Required"
            },
            emp:
            {
              required:"Required",
              asigned_bank_details:"Allready asign bank details"
            },
            bank_name:
            {
              required:"Required"
            },
            bank_address:
            {
              required:"Required"
            },
            account_no:
            {
              required:"Required"
            },
            ifsc_code:
            {
              required:"Required"
            }
        },
        errorPlacement: function(error, element) 
        {               
            error.appendTo(element.parent());     
        } 
    } );


    $("#AddSalaryComp").validate(
    {
        errorElement: "span", 
        rules: 
        {
            employee_id:
            {
              required:true,
              assign_employee:true
            },
            monthly_salary:
            {
              required:true,
              notEqual:true,
              minlength:"4",
              maxlength:"5",
              digits:true
            }
        },
        messages: 
        { 
            employee_id:
            {
              required:"Required",
              assign_employee:"Employee Components allready exists"
            },
            monthly_salary:
            {
              required:"Required"
            }
        },
        errorPlacement: function(error, element) 
        {               
            error.appendTo(element.parent());     
        } 
    } );


    $("#AddEditEvent").validate(
    {
        errorElement: "span", 
        rules: 
        {
            event_title:
            {
              required:true
            },
            event_descriptions:
            {
              required:true
            }
        },
        messages: 
        { 
            event_title:
            {
              required:"Required"
            },
            event_descriptions:
            {
              required:"Required"
            }
        },
        errorPlacement: function(error, element) 
        {               
            error.appendTo(element.parent());     
        } 
    } );
    
    
    $("#add_sales_client_lists").validate(
    {
        errorElement: "span", 
        rules: 
        {
            name:
            {
              required:true
            },
            email:
            {
              required:true,
              emailtest:true
            },
            mobile_number:
            {
              required:true,
              digits:true
            },
            file1:
            {
              required:true
            },
            adhar_card_no:
            {
              required:true
            },
            date_of_signing:
            {
              required:true
            },
            start_date:
            {
              required:true
            },
            client:
            {
              required:true
            },
            
            
        },
        messages: 
        { 
            name:
            {
              required:"Required"
            },
            email:
            {
              required:"Required"
            },
            mobile_number:
            {
              required:"Required"
            },
            file1:
            {
              required:"Required"
            },
            adhar_card_no:
            {
              required:"Required"
            },
            date_of_signing:
            {
              required:"Required"
            },
            start_date:
            {
              required:"Required"
            },
            client:
            {
              required:"Required"
            }
            
        },
        
    } );
    
    
     
} );