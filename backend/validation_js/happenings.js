$(document).ready( function() 
{
  
    $("#addHappenings").validate(
    {
        errorElement: "span", 

        rules: 
        {
            title: 
            {
                required:true
            },
            image_path_1: 
            {
                required:true,
                accept: "jpg|jpeg|png"
            }
        },

        messages: 
        { 
            title: 
            {
                required:"Required"
            },
            image_path_1: 
            {
                required:"Required",
                accept: "Please select valid Image(jpg|jpeg|png)"
            }
        },

        errorPlacement: function(error, element) 
        {               
            error.appendTo(element.parent());     
        } 

    } );

} );