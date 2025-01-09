$(document).ready( function() 
{

    $("#editTab").validate(
    {
        errorElement: "span", 

        rules: 
        {
            main_tab: 
            {
                required:true
            }
        },

        messages: 
        { 
            main_tab: 
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