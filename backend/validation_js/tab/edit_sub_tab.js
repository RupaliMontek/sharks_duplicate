$(document).ready( function() 
{

    $("#editSubTab").validate(
    {
        errorElement: "span", 

        rules: 
        {
            main_tab: 
            {
                required:true
            },
            sub_tab: 
            {
                required:true
            }
        },

        messages: 
        { 
            main_tab: 
            {
                required:"Required"
            },
            sub_tab: 
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