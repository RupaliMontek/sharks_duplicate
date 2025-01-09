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

      

  



    $("#addUser").validate(

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

            contact:

            {

              required:true,

              notEqual:true,

              maxlength : "10",

              minlength : "10"

            },

            password:

            {

              required:true,

              maxlength : "20",

              minlength : "6"

            },

            role:

            {

                required:true

            }

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

            contact:

            {

              required:"Required"

            },

            password:

            {

              required:"Required"

            },

            role:

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