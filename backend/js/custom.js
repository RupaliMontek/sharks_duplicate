
var base_url="https://msuite.work/";

     function get_emp_by_dept_id(id)
     {
          var category={
          dept_id:id
        }
        $.ajax({
          type:"POST",
          data:category,
          url:base_url+"task/task/get_emp_by_dept",
          success:function(data)
          {    
                $('#emp_by_dept').html(data);
          }
        });
  }


    $("#datetimepicker1").datetimepicker({
        format: "dd-mm-yyyy - hh:ii",
        autoclose: true,
        todayBtn: true,
        pickerPosition: "bottom-left"
    });


  /* recruter dashboard js */

 

$('#dateqq').datepicker({

    format: 'yyyy/mm/dd'

});

$("#interview_schedule").kendoDateTimePicker({                        
                    });

  $(document).ready( function() 
    {

        jQuery.validator.addMethod("notEqual", function(value, element) { 
    return this.optional(element) || value != "0000000000";
  }, "Invalid mobile number.");

          jQuery.validator.addMethod("validemailtest", function(value, element) {
    return this.optional(element) || /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$/i.test(value);
  }, "Please enter a valid Email ID");

        $("#update_contact_no_validation").validate(
        {
            errorElement: "span", 
            rules: 
            {                
                contact_no: 
                {
                    required:true,
                    notEqual:true,
                    digits:true
                }
            },
            messages: 
            { 
                contact_no: 
                {
                    required:"Required"
                }
            },
        });


        $("#update_email_id_validation").validate(
        {
            errorElement: "span", 
            rules: 
            {                
               email_id: 
                {
                    required:true,
                    validemailtest:true
                }
            },
            messages: 
            { 
                email_id: 
                {
                    required:"Required"
                }
            },
        });

        $("#add_file_type").validate(
        {
            errorElement: "span", 

            rules: 
            {
                userfile: 
                {
                    required:true,
                    accept:'xls|xlsx'
                }
            },

            messages: 
            { 
                userfile: 
                {
                    required:"Required",
                    accept:"Please select only xls and xlsx file"
                }
            },
        });
    });




 
      $(function ()
       {
        $('#example1').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
           "pageLength": 50,
          "ordering": true,
          "info": true,
           "scrollX": true,
          "autoWidth": true
        });
      }); 
      
       $(function () {
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
           "pageLength": 50,
          "ordering": true,
          "info": true,
           "scrollX": true,
          "autoWidth": true
        });
      });
   


$("#checkAl").click(function () {
$('input:checkbox').not(this).prop('checked', this.checked);
});




      
    function update_role(dailyreport_id,role)
    {
      $("#dailyreport_id").val(dailyreport_id);
      $("#role").val(role);
      $("#update_role_popup").modal();
    }

    
    function update_date(dailyreport_id,date)
    {
      $("#dailyreport_idadate").val(dailyreport_id);
      $("#dateqq").val(date);
      $("#update_date_popup").modal();
    }

    function update_position_skills(dailyreport_id,position_skills)
    {
      $("#dailyreport_ida").val(dailyreport_id);
      $("#position_skills").val(position_skills);
      $("#update_position_skills_popup").modal();
    }

    function update_company_client(dailyreport_id,company_client)
    {
      $("#dailyreport_idaclient_company").val(dailyreport_id);
      $("#company_client_name").val(company_client);
      $("#update_company_client_popup").modal();
    }

    

    function update_rp_id(dailyreport_id,rp_id)
    {
      $("#dailyreport_ids").val(dailyreport_id);
      $("#rp_id").val(rp_id);
      $("#update_rp_id_popup").modal();
    }

    function update_candidate_name(dailyreport_id,candidate_name)
    {
      $("#dailyreport_idd").val(dailyreport_id);
      $("#candidate_name").val(candidate_name);
      $("#update_candidate_name_popup").modal();
    }

    function update_applicant_id(dailyreport_id,applicant_id)
    {
      $("#dailyreport_idf").val(dailyreport_id);
      $("#applicant_id").val(applicant_id);
      $("#update_applicant_id_popup").modal();
    }

    function update_qulification(dailyreport_id,qulification)
    {
      $("#dailyreport_idg").val(dailyreport_id);
      $("#qulification").val(qulification);
      $("#update_qulification_popup").modal();
    }

    function update_company_name(dailyreport_id,company_name)
    {
      $("#dailyreport_idh").val(dailyreport_id);
      $("#company_name").val(company_name);
      $("#update_company_name_popup").modal();
    }
    
  function add_color(id,name,color)
  {
    $("#dailyreport_record_id").val(id);
    $("#dailyreport_record_name").val(name);
    $("#dailyreport_record_color").val(color);

    $("#color_popup").modal();
  }

    function update_yrs_of_experience(dailyreport_id,yrs_of_experience)
    {
      $("#dailyreport_id_yrs_of_experience").val(dailyreport_id);
      $("#yrs_of_experience").val(yrs_of_experience);
      $("#update_yrs_of_experience_popup").modal();
    }
    function update_relevant_exp(dailyreport_id,relevant_exp)
    {
      $("#dailyreport_id_relevant_exp").val(dailyreport_id);
      $("#relevant_exp").val(relevant_exp);
      $("#update_relevant_exp_popup").modal();
    }    
    function update_ctc(dailyreport_id,ctc)
    {
      $("#dailyreport_id_ctc").val(dailyreport_id);
      $("#ctc").val(ctc);
      $("#update_ctc_popup").modal();
    }
    function update_exp_ctc(dailyreport_id,exp_ctc)
    {
      $("#dailyreport_id_exp_ctc").val(dailyreport_id);
      $("#exp_ctc").val(exp_ctc);
      $("#update_exp_ctc_popup").modal();
    }    
    function update_notice_period(dailyreport_id,notice_period)
    {
      $("#dailyreport_id_notice_period").val(dailyreport_id);
      $("#notice_period").val(notice_period);
      $("#update_notice_period_popup").modal();
    }
    function update_official_onpaper_notice_period(dailyreport_id,official_onpaper_notice_period)
    {
      $("#dailyreport_id_official_onpaper_notice_period").val(dailyreport_id);
      $("#official_onpaper_notice_period").val(official_onpaper_notice_period);
      $("#update_official_onpaper_notice_period_popup").modal();
    }    
    function update_contact_no(dailyreport_id,contact_no,sheetid)
    {
      $("#dailyreport_id_contact_no").val(dailyreport_id);
      $("#contact_no").val(contact_no);
      $("#bydefault_contact_no").val(contact_no);
      $("#sheetid").val(sheetid);
      $("#update_contact_no_popup").modal();
    }
    function update_alternate_contact_number(dailyreport_id,alternate_contact_number)
    {
      $("#dailyreport_id_alternate_contact_number").val(dailyreport_id);
      $("#alternate_contact_number").val(alternate_contact_number);
      $("#update_alternate_contact_number_popup").modal();
    }    
    function update_email_id(dailyreport_id,email_id,sheetid)
    {
      $("#dailyreport_id_email_id").val(dailyreport_id);
      $("#email_id").val(email_id);
      $("#bydefault_email_id").val(email_id);
      $("#sheetid_email_id").val(sheetid);
      $("#update_email_id_popup").modal();
    }
    function update_location(dailyreport_id,location)
    {
      $("#dailyreport_id_location").val(dailyreport_id);
      $("#location").val(location);
      $("#update_location_popup").modal();
    } 
    function update_alternate_email_id(dailyreport_id,alternate_email_id)
    {
      $("#dailyreport_id_alternate_email_id").val(dailyreport_id);
      $("#alternate_email_id").val(alternate_email_id);
      $("#update_alternate_email_id_popup").modal();
    }    


    function update_preffered_location(dailyreport_id,preffered_location)
    {
      $("#dailyreport_id_preffered_location").val(dailyreport_id);
      $("#preffered_location").val(preffered_location);
      $("#update_preffered_location_popup").modal();
    }
    function update_client_feedback(dailyreport_id,client_feedback)
    {
      $("#dailyreport_id_client_feedback").val(dailyreport_id);
      $("#client_feedback").val(client_feedback);
      $("#update_client_feedback_popup").modal();
    }    
    function update_interview_schedule(dailyreport_id,interview_schedule)
    {
      var elem = interview_schedule.split(' ');
      
      var stSplita = elem[0].split("-");
      var mon = stSplita[1];
      var day = stSplita[2];
      var year = stSplita[0];

      var stSplit = elem[1].split(":");
      var stHour = stSplit[0];
      var stMin = stSplit[1];
      
     var amPM = (stHour > 11) ? "PM" : "AM";
      if(stHour > 12) {
        stHour -= 12;
      } else if(stHour == 0) {
        stHour = "12";
      }
      if(stMin < 10) {
        stMin = "" + stMin;
      }

     var new_deadline = mon+'/'+day+'/'+year+' '+stHour+':'+stMin+' '+amPM;
      $("#dailyreport_id_interview_schedule").val(dailyreport_id);
      $("#interview_schedule").val(new_deadline);
      $("#update_interview_schedule_popup").modal();
    }   
    function update_interview_schedule_mode(dailyreport_id,interview_schedule_mode)
    {
      $("#dailyreport_id_interview_schedule_mode").val(dailyreport_id);
      $("#interview_schedule_mode").val(interview_schedule_mode);
      $("#update_interview_schedule_mode_popup").modal();
    }
    function update_final_status(dailyreport_id,final_status)
    {
      $("#dailyreport_id_final_status").val(dailyreport_id);
      $("#final_status").val(final_status);
      $("#update_final_status_popup").modal();
    }    
    function update_client_recruiter(dailyreport_id,client_recruiter)
    {
      $("#dailyreport_id_client_recruiter").val(dailyreport_id);
      $("#client_recruiter").val(client_recruiter);
      $("#update_client_recruiter_popup").modal();
    }
    function update_sourced_by(dailyreport_id,sourced_by)
    {
      $("#dailyreport_id_sourced_by").val(dailyreport_id);
      $("#sourced_by").val(sourced_by);
      $("#update_sourced_by_popup").modal();
    } 
    function update_reason_for_job_change(dailyreport_id,reason_for_job_change)
    {
      $("#dailyreport_id_reason_for_job_change").val(dailyreport_id);
      $("#reason_for_job_change").val(reason_for_job_change);
      $("#update_reason_for_job_change_popup").modal();
    }


   function checkIDAvailability()
    {
      var base_url = "<?php echo base_url(); ?>"
       var postURL = base_url+"recruiter/recruiter/forgot_password_email_exits";

       var contact_no = $('#contact_no').val();
       var sheetid = $('#sheetid').val();
       var bydefault_contact_no = $('#bydefault_contact_no').val();
       
           $.ajax({
                            cache:false,
                            async:false,
                            type: "POST",
                            data: { contact_no:contact_no,client_id:sheetid,bydefault_contact_no:bydefault_contact_no},
                            url: postURL,
                            success: function(msg) 
                            {
                               if(msg!='TRUE')
                               {


                                var words = msg.split('_'); 
                                var name = words[1];   
                                var date = words[2];   
                                var contact_no = words[3];    
                                var sheetid = words[4]; 

                                var aaaaa = "Contact No allready added by ";
                                var bbbbb = " on dated ";
                                var joined = aaaaa + name + bbbbb + date;

                                 $('#does_email_exists').val(0);
                                 $('#email_msg').html('<font color="red">'+joined+'</font>');
                               }else{
                                   $('#does_email_exists').val(1);
                                   $('#email_msg').html('');
                               }
                            }
                    });
           
        }

        $(document).keypress(
    function(event){
     if (event.which == '13') {
        //event.preventDefault();
         checkIDAvailability();
         checkIDAvailabilityEmail();
      }


});

  function validateFP(){
        if($('#does_email_exists').val()==0){
           // $('#email_msg').html('<font color="red">Email does not exists</font>');
           alert('Contact No allready exists');
            return false;
        }
   }



   function checkIDAvailabilityEmail()
    {
      var base_url = "<?php echo base_url(); ?>"
       var postURL = base_url+"recruiter/recruiter/forgot_password_email_exits_email_id";

       var email_id = $('#email_id').val();
       var sheetid_email_id = $('#sheetid_email_id').val();
       var bydefault_email_id = $('#bydefault_email_id').val();
       
           $.ajax({
                            cache:false,
                            async:false,
                            type: "POST",
                            data: { email_id:email_id,client_id:sheetid_email_id,bydefault_email_id:bydefault_email_id},
                            url: postURL,
                            success: function(msg) 
                            {
                               if(msg!='TRUE')
                               {
                                 $('#does_email_exists_email_id').val(0);
                                 $('#email_msg_email_id').html('<font color="red">Email ID allready exists</font>');
                               }else{
                                   $('#does_email_exists_email_id').val(1);
                                   $('#email_msg_email_id').html('');
                               }
                            }
                    });
           
        }



  function validateFP_email_id(){
        if($('#does_email_exists_email_id').val()==0){
           // $('#email_msg').html('<font color="red">Email does not exists</font>');
           alert('Email ID allready exists');
            return false;
        }
   }


  function final_selection_interview_div(elem)
  {
    if(elem.value == "Offered")
    {
      $('#selected_joining_date').val('');   
      $('#selected_offered_amount').val('');   
      $('#date_of_offer_released').val('');   
      $('#grade').val('');   
      $("#div_post_year").show();   
    }
    else
    {  
      $('#selected_joining_date').val('');
      $('#selected_offered_amount').val('');    
      $('#date_of_offer_released').val('');   
      $('#grade').val('');
      $("#div_post_year").hide();   
    } 



    if(elem.value == "HR Reject" || elem.value == "HR Hold")
    { 
      $('#hr_reason').val('');
      $("#div_post_year_hr_reason").show();   
    }
    else
    {  
      $('#hr_reason').val('');  
      $("#div_post_year_hr_reason").hide();   
    }

  }


  function client_feedback_final_selection_interview_div(elem)
  {
    if(elem.value == "Hold")
    { 
      $('#hold_reason').val('');
      $("#hold_reason_div").show();   
    }
    else
    {  
      $('#hold_reason').val('');  
      $("#hold_reason_div").hide();   
    }
    
  }
  


$('#selected_joining_date').datepicker({
    format: 'yyyy/mm/dd'
});

$('#date_of_offer_released').datepicker({
    format: 'yyyy/mm/dd'
});

/* recruter dashboard code end */


/* footer code start */
    $(document).ready(function () {
    $(".checkall").click(function () {
        $(".selectAll").prop('checked', $(this).prop('checked'));
    });
});
var unloadHandler = function(e){
        
        $.ajax({
        url: base_url+'login/logout',
        type: "POST",
        data: {},
        success: function(data) 
        {
           
        } 
    });
  };
window.unload = unloadHandler;

   
 $('.toggle-side').click(function(){
    $(".side-menu").addClass("show");
});

$('.close-side').click(function(){
    $(".side-menu").removeClass("show");
});

function fetch_chat_details(chat_id)
{
    $(".side-menu").removeClass("show");
    $('#msg_card_body').html('');
    var base_url = "<?php echo base_url(); ?>";
    
    $.ajax({
        url: base_url+'chat/chat/get_header_chat_messages',
        type: "POST",
        data: {chat_id:chat_id},
        success: function(data) 
        {
            var myArr = $.parseJSON(data);
            $('#header_img_cont').html(myArr.img_cont);
            $('#header_user_info').html(myArr.header_user_info);
            $('#header_chat_id').val(myArr.header_chat_id);
            $('#header_is_group').val(myArr.header_is_group);
            $('#header_sender').val(myArr.header_sender);
            $('#header_receiver').val(myArr.header_receiver);
            $('#header_message_count').attr('value',myArr.header_message_count);
            $('#msg_card_body').html(myArr.header_chat_messages);
            $('#msg_card_body').scrollTop($('#msg_card_body')[0].scrollHeight);
        }
    });
    $(".side-menu1").addClass("show");
}

$('.close-side1').click(function(){
  $(".side-menu1").removeClass("show");
});

function header_click_event()
{
    $('#header_attachment').click();
}

$("document").ready(function(){
    $("#header_attachment").change(function()
    {
        if($(this)[0].files.length > 0)
        {
            if(confirm('Send selected files?'))
            {
                header_getText();
            } else {
                $('#header_attachment').val(null);
            }
        }
    });
});

$("#header_message").on("keydown", function (e){
    if (e.keyCode === 13)
    {
        e.preventDefault();
        header_getText();
    }
});

function header_getText()
{
    var base_url = "<?php echo base_url(); ?>";
    var chat_id = $('#header_chat_id').val();
    var sender = $('#header_sender').val();
    var receiver = $('#header_receiver').val();
    var message = $('#header_message').val();
    var message_count = $('#header_message_count').val();
    var file_data = $('#header_attachment').prop('files');
    var is_group = $('#header_is_group').val();
    if(message != '')
    {
        $.ajax({
            url: base_url+'chat/chat/header_getText',
            type: "POST",
            data: {chat_id:chat_id,is_group:is_group,sender:sender,receiver:receiver,message:message},
            success: function(data)
            {
                $('#header_attachment').val(null);
                var myArr = $.parseJSON(data);
                if(parseInt(message_count) < parseInt(myArr.header_message_count))
                {
                    $('#msg_card_body').html(myArr.header_chat_messages);
                    /*$('#message_count').val(myArr.message_count);*/
                    $('#msg_card_body').scrollTop($('#msg_card_body')[0].scrollHeight);
                }
                $('#header_message_count').val(myArr.header_message_count);
            }
        });
    }
    
    if($("#header_attachment")[0].files.length != 0)
    {
        var fileLength = $("#header_attachment")[0].files.length;
        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('chat_id', chat_id);
        form_data.append('is_group', is_group);
        form_data.append('sender', sender);
        form_data.append('receiver', receiver);
       
        for (var x = 0; x < fileLength; x++) {
            form_data.append("fileToUpload[]", document.getElementById('header_attachment').files[x]);
        }
        $.ajax({
            url: base_url+'chat/chat/header_getAttachment',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(data)
            {
                $('#header_attachment').val(null);
                var myArr = $.parseJSON(data);
                if(parseInt(message_count) < parseInt(myArr.header_message_count))
                {
                    $('#msg_card_body').html(myArr.header_chat_messages);
                    $('#msg_card_body').scrollTop($('#msg_card_body')[0].scrollHeight);
                }
                $('#header_message_count').val(myArr.header_message_count);
            }
        });
    }
    $('#header_message').val('');
    $('#header_file_name').html('');
}

function header_setText()
{
    var base_url = "<?php echo base_url(); ?>";
    var chat_id = $('#header_chat_id').val();
    var message_count = $('#header_message_count').val();
    $.ajax({
        url: base_url+'chat/chat/header_setText',
        type: "POST",
        data: {chat_id:chat_id},
        success: function(data) 
        {
            var myArr = $.parseJSON(data);
            if(parseInt(message_count) < parseInt(myArr.header_message_count))
            { 
                $('#msg_card_body').html(myArr.header_chat_messages);
                $('#msg_card_body').scrollTop($('#msg_card_body')[0].scrollHeight);
            }
            $('#header_message_count').val(myArr.header_message_count);
        } 
    });
}
setInterval(function(){
    if($(".side-menu1").hasClass("show"))
    {
        header_setText();
    }
},2000);

function header_remove_message(message_id)
{
    var delete_confirm = confirm("Are you sure you want to delete?");
    if (delete_confirm == true)
    {
        var base_url = "<?php echo base_url(); ?>";
        var chat_id = $('#header_chat_id').val();
        var message_count = $('#message_count').val();
        $.ajax({
            url: base_url+'chat/chat/header_remove_message',
            type: "POST",
            data: {chat_id:chat_id,message_id:message_id},
            success: function(data) 
            {
                var myArr = $.parseJSON(data);
                $('#msg_card_body').html(myArr.header_chat_messages);
                $('#msg_card_body').scrollTop($('#msg_card_body')[0].scrollHeight);
                $('#message_count').val(myArr.header_message_count);
            } 
        });
    }
    else
    {
        return false;
    }
}

function header_forward_message(message_id)
{
    $('#header_forward_model').modal('show');
    var chat_id = $('#header_chat_id').val();
    $('#header_message_id').val(message_id);
    $('#header_current_chat_id').val(chat_id);
}


$('#header_forward_action').click(function(){
    $('#header_forward_model').modal('hide');
    
    var base_url = "<?php echo base_url(); ?>";
    var message_count = $('#header_message_count').val();
    $.ajax({
        url: base_url+'chat/chat/header_forward_message',
        type: "POST",
        data: $('#header_frm_forward_message').serialize(),
        success: function(data) 
        {
            var myArr = $.parseJSON(data);
            if(parseInt(message_count) < parseInt(myArr.header_message_count))
            {
                $('#msg_card_body').html(myArr.header_chat_messages);
                $('#msg_card_body').scrollTop($('#msg_card_body')[0].scrollHeight);
            }
            $('#header_message_count').val(myArr.header_message_count);
        } 
    });
    
});

function header_search_chat_list(search){
    var base_url = "<?php echo base_url(); ?>";
    $.ajax({
        url: base_url+'chat/chat/header_search_chat_list',
        type: "POST",
        data: {search:search},
        success: function(data) 
        {
            $('.chat_persons').html(data);
        } 
    });
}


/* footer js end */



