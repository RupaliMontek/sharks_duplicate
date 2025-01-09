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

    $("#editAdmin").validate(
    {
        errorElement: "span", 

        rules: 
        {
            name: 
            {
                required:true,
                lettersonly:true
            },
            number: 
            {
                required:true
            },
            // pass:
            // {
            //     required: true,
            //     minlength:6,
            //     maxlength:15
            // },
            // repass:
            // {
            //     required: true,
            //     minlength: 6,
            //     maxlength: 15,
            //     equalTo:'#pass'
            // }
        },

        messages: 
        { 
            name: 
            {
                required:"required"
            },
            number: 
            {
                required:"required"
            },
            // pass:
            // {
            //     required:"required"
            // },
            // repass:
            // {
            //     required:"required",
            //     equalTo: "Please enter the same password as above."
            // }
        },

        errorPlacement: function(error, element) 
        {               
            error.appendTo(element.parent());     
        } 

    } );

} );