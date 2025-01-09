<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<div class="container-fluid frfooterDesignnnn">
<section id="copyright" class="n-footer-5">
<div class="container-fluid ForFooter">
<div class="container">
    <div class="row frfooterlinkss">
<!--<div class="whatsapp">
      <a title="Whatsapp" href="https://wa.me/919975048884" target="_blank">
        <i class="fa fa-whatsapp" aria-hidden="true"></i></a>
</div>-->

<div class="col-lg-2 col-md-2 col-sm-12">
    <ul>
        <h3>QUICK LINKS</h3>
        <li><a href="#">AI Resume</a></li>
        <li><a href="#">Ai Interview</a></li>
         <li><a href="#">Job Posting</a></li>
    </ul>
</div>
<div class="col-lg-4 col-md-4 col-sm-12">
    <ul>
        <h3><a href="<?php echo base_url();?>blog">BLOGS</a></h3>
        <ul>
    <?php foreach ($recent_blogs as $row): ?>
        <?php
            $title = $row['title'];
            $titleLimited = (strlen($title) > 50) ? substr($title, 0, 50) . '...' : $title;
        ?>
        <li><a href="<?= base_url('recruitment/blog_details/' . $row['title_url']); ?>"><?= $titleLimited; ?></a></li>
    <?php endforeach; ?> 
</ul>
    </ul>
</div>
<div class="col-lg-3 col-md-3 col-sm-12">
    <ul>
        <h3>FREE COURSES</h3>
        <li><a href="#">Software</a></li>
        <li><a href="#">Digital Marketin</a></li>
        <li><a href="#">Engineering</a></li>
    </ul>
</div>
<div class="col-lg-3 col-md-3 col-sm-12">
    <ul>
        <h3>LEGAL</h3>
        <li><a href="<?= base_url("terms-and-conditions")?>">terms and conditions</a></li>
        <li><a href="<?= base_url("privacy-policy")?>">Privacy policy</a></li>
        <li><a href="<?= base_url("beware-of-fraud")?>">Beware of Fraud</a></li>
    </ul>
</div>
</div>
</div>
</div>
<div class="copyrighttt">© SHARKS JOB 2024 All rights reserved.</div>
</section>

</div>
 </div>	
 <!--- below script for scroll animation -->
<!-- for page animation on scroll start here -->


   <div class="modal fade" id="myModal_email_verification" role="dialog">
    <div class="modal-dialog">        
        
        <div class="modal-content">
        <div class="modal-header">         
         <h2 class="main_title heading"><span>verify your email address</span></h2> 
         <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
         <div id="verify_email_popup" class="white-popup-block mfp-hide popup-position">
            <div class="popup-title">
                 
            </div>            
                  <div class="popup-detail">
                    <?php
                    $user_details = $this->M_Candidate_profile->get_user_details_by_id_admin(
                        2
                    );
                    $attributes = ["id" => "resend_verification_email"];
                    echo form_open_multipart(
                        "recruitment/resend_verification_email",
                        $attributes
                    );
                    ?> 
                    <div class="main-search">
                        <div class="header_search_toggle desktop-view">
                            <div class="search-box">
                       &nbsp;&nbsp;&nbsp;&nbsp;<label for="work_status"> Email Id:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       <input class="form-control" type="email" name="email" id="emails" placeholder="Email ID" value="jaywantfybcom123@gmail.com">
                                </div>
                            </div>
                            </br>
                             
                      &nbsp;&nbsp;&nbsp;&nbsp;<span>Not Received Mail? <button id="verify_email" type="submit" class="btn-primary">Resend Verification Link</button></span>  
                        </div>
                       <?php echo form_close(); ?>
    </div>  
    </div>         
      </div>
      </div>
      </div>
</body>					
</html>
<script src="<?php echo base_url("backend/validation_js/msuite_candidate_profile.js"); ?>"></script>
<script>



function display_project_more_details()
{
    var details_show_more = $("#details_show_more");
    var show_more_details = $("#show_more_details");
    show_more_details.css("display", "block");
    details_show_more.css("display", "none");
}

 function edit_ket_skills_candidate(candidate_id)
 {
    var base_url = '<?php echo base_url(); ?>';  
    $.ajax({
    url: base_url+'recruitment/edit_candidate_key_skills',
    type: 'POST',
    data:{candidate_id:candidate_id},
    success:function(data)
    {
       $('#edit_key_skill').html(data);edit_key_skill
       $('#candidate_edit_key_skills').modal('show');   
    }
}); 
}

 function edit_project_candidate_details(candidate_project_id)
 {
    var base_url = '<?php echo base_url(); ?>';  
    $.ajax({
    url: base_url+'recruitment/edit_project_candidate_details',
    type: 'POST',
    data:{candidate_project_id:candidate_project_id},
    success:function(data)
    {
       $('#edit_candidate_project').html(data);
       $('#candidate_project_edit').modal('show');   
    }
}); 
}


 function edit_candidate_basic_details()
 {
    var base_url = '<?php echo base_url(); ?>';  
    $.ajax({
    url: base_url+'recruitment/edit_candidate_basic_details',
    type: 'POST',
    data:{},
    success:function(data)
    {
       $('#candidate_basic_details_edit').html(data);
       $('#edit_candidate_basic_details').modal('show');   
    }
}); 
}
function edit_white_paper_research_publication_journal_entry(white_paper_journal_entry_id)
{
    var base_url = '<?php echo base_url(); ?>';
    $.ajax({
    url: base_url+'recruitment/edit_white_paper_research_publication_journal_entry',      
    type: 'POST',
    data: {white_paper_journal_entry_id:white_paper_journal_entry_id},
    success:function(data)
    {
       $('#edit_white_paper_research_publication_journal_entry').html(data);
       $('#WhitePaper_journal_entry_edit').modal('show');            
    }
  });
}

$('input[name="project_status"]').change(function() 
{
    
    var project_status = $('input[name="project_status"]').val();
    if(project_status=="In Progress")
    {
        
        $("#display_by_status").css("display", "none");
    }
     if(project_status=="Finished")
    {
        alert("Finished");
       $("#display_by_status").css("display", "block"); 
    }            
                
});



$(document).ready(function() 
{
   
$( "#job-location" ).autocomplete({
        source: function( request, response ) 
        {
             $.ajax({
                url: "<?php echo base_url(); ?>Recruitment/get_city_states",
                type: 'post',
                dataType: "json",
                data: {
                  search: request.term
                },
                success: function( data ) 
                {
                   // alert(data);
                  // console.log(data);
                   console.log(data)


              response( data );
                }
             });
        },
        select: function (values, ui) {
            console.log(ui.item.label);
             $('#job-location').text(ui.item.label);
             $('#joblocationid').val(ui.item.id);
             return false;
        }
     });



function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}   var base_url = "<?php echo base_url();?>";
     jQuery.validator.addMethod("emailtest", function(value, element) {
        return this.optional(element) || /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$/i.test(value);
    }, "Please enter a valid Email ID");

      $("#candidate_registration").validate({
        rules: {
            candidate_name: 
            {
                required:true,               
            },
            video_introducation: 
            {
                required: true,
                accept: "video/*"
            },
            departments: 
            {
                required:true,               
            },
            profile_picture: 
            {
                required:true,               
            },
            work_status: 
            {
                required:true,
                //alpha:true
            },
             candidate_resume: 
            {
                required:true,
                
            },
            portfolio_upload:
            {
                 required:true,
            },
          candidate_email: {
            required: true,
            remote: {
              url: base_url+"candidate_profile_login/check_email_exists_registration",
              type: "post",
              data: {
                // additional data if needed
              }
            }
          },
          phone: {
            required: true,
            remote: {
              url: base_url+"candidate_profile_login/check_phone_no_exists_registration",
              type: "post",
              data: {
                // additional data if needed
              }
            }
          }
        },
        messages: {
        candidate_name: 
            {
                required:"Required Candidate Name",
            }, 
            video_introducation: 
            {
                required: "Please select a video file",
                accept: "Please select a valid video file"
            },
            departments: 
            {
                required:"Required Department",
            },
             profile_picture: 
            {
                required:"Required Profile Picture",
            },
            work_status: 
            {  
                required:"Required Work Status"
            },
            candidate_resume: 
            {  
                required:"Required Candidate Resume"
            },
             portfolio_upload:
            {
                 required:"Required Portfolio Document"
            },
          candidate_email: {
            required:"Please Enter Email Id",   
            remote: "this email address no allready register."
          },
          phone: {
            required:"Required Mobile Number", 
            remote: "this phone no allready register."
          }
        },
        submitHandler: function(form) {
                    var file = $('#video_introducation')[0].files[0];
                    var video = document.createElement('video');
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        video.src = event.target.result;
                        video.addEventListener('loadedmetadata', function() {
                            var duration = video.duration;
                            if (duration > 40) {
                                alert('Video duration must be at most 40 seconds.');
                            } else {
                                // Proceed with file upload
                                // You can add your Ajax upload code here
                                // This is just an example
                                $('#uploadProgress').text('Uploading...');
                            }
                        });
                    };
                    reader.readAsDataURL(file);
                },
        invalidHandler: function (event, validator) {
          // This function will be called if any of the fields fail validation
          var emailError = validator.errorMap.candidate_email;
          var phoneError = validator.errorMap.phone;
          
          if (emailError && phoneError) {
            var candidate_email = $("#candidate_email").val();
            var phone = $("#phone").val();
            
            if(candidate_email!=='' && phoneError !=='')
            {
               $("#custom-error-message").show();
               var encodedEmail = encodeURIComponent(candidate_email);
               var dynamicCanonicalUrl = base_url+"recruitment/view_account_candidate/"+encodedEmail+"/"+phone;
               $("#canonicalLink").attr("href", dynamicCanonicalUrl);
            }
             
          } else {
            // Hide the custom error message if only one field fails validation
            $("#custom-error-message").hide();
          }
        }
      });    
    


$("#candidate_login").validate(
    {
      errorElement: "span", 

      rules: 
      {
        email: 
            {
                required:true,               
            },
        password: 
        {
          required:true,         
        },
        
      },
      

      messages: 
      { 
        email: 
            {
                required:"Required Candidate Email",
            },
            
        password: 
        {
          required:"Required Candidate Password",          
        },
        
      },
    });


$("#candidate_login_heder").validate(
    {
      errorElement: "span", 

      rules: 
      {
        email: 
            {
                required:true,               
            },
        password: 
        {
          required:true,         
        },
        
      },
      

      messages: 
      { 
        email: 
            {
                required:"Required Candidate Email",
            },
            
        password: 
        {
          required:"Required Candidate Password",          
        },
        
      },
    });




/*function myFunction() {
  var x = document.getElementById("password");
  alert(x);
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}*/



});
</script>



<script>





/*function get_city_states(statesandcities){

 if(statesandcities != ''){ 

            $.ajax({
                url : '<?php echo base_url('Recruitment/get_city_states'); ?>',
                type:'POST',
                data:{statesandcities:statesandcities},                
                success:function(data){
                    //alert(data);
                     var json=JSON.parse(data);
console.log(json);

                     city_and_states(json);         
                }
            })
     }
}


function city_and_states(cityandstates){
        $( "#job_location" ).autocomplete({
        source: cityandstates
        });
  }*/

function func()
     {
       $('#myModalss').modal();

     }
function get_role_select_department(dept_id)
{
      var base_url = '<?php echo base_url(); ?>';  
      $.ajax({
      url: base_url+'recruitment/get_role_select_department',
      dataType: "json",
      type: 'POST',
      data:{dept_id:dept_id},
      success:function(data)
        {
            $('#role_id').val(data.role_id);
        }
});
}
$('#candidate_registration').submit(function(e){
  
    event.preventDefault();
    var base_url = '<?php echo base_url(); ?>';  
    var candidate_name=$("#candidate_name").val();
    var candidate_email=$("#candidate_email").val();
    var password=$("#password").val();
    var phone=$("#phone").val();
    var work_status=$("#work_status").val();
    
      
$.ajax({
      url: base_url+"recruitment/Save_Candidate_register",
      method: 'POST',
      data: new FormData(this),
      dataType: "json",
      contentType: false,
      cache: false,
      processData: false,
      success:function(msg)
        { 
         console.log(msg);    
         $('#myModal_email_verification').modal({
  backdrop: false,  // Disables the backdrop
  keyboard: false    // Disables closing on pressing 'Esc'
});
          $('#candidate_resume').val('');
         if(msg['status']=="true")
         {
             $("#myModal_email_verification").modal("show");
              $('#emails').val(msg['email']);
         }
          else
          {
              alert('not insert');
          }
          }
}); 
});


function filters_all_ajax_experience(experienceRange) {

var base_url = "<?php echo base_url(); ?>";

$.ajax({
    url: base_url + 'recruitment/ajax_job_filter',
    type: 'POST',
    data: {          
        experience: experienceRange
    },
    success: function (data) {
        console.log("Experience Filter AJAX Success:", data);
        $("#job_filtersssss").html(data);
    },
    error: function (xhr, status, error) {
        console.error("Experience Filter AJAX Error:", error);
    }
});
}

function filters_all_ajax() {
    var base_url = "<?php echo base_url(); ?>";
    var experience = $("#experience").val();

    var location = [];
    var experience = [];
    var experiences = [];
    var educations = [];
    var companies = [];
    var salary = [];
    var work_mode = [];
    var department = [];
    var profile = [];

    $("input[name='location[]']:checked").each(function () {
        location.push($(this).val());
    });

    $("input[name='experience[]']:checked").each(function () {
        experiences.push($(this).val());
    });

    $("input[name='companies[]']:checked").each(function () {
        companies.push($(this).val());
    });

    $("input[name='education_filter[]']:checked").each(function () {
        educations.push($(this).val());
    });

    $("input[name='salary[]']:checked").each(function () {
        salary.push($(this).val());
    });

    $("input[name='work_mode[]']:checked").each(function () {
        work_mode.push($(this).val());
    });

    $("input[name='department[]']:checked").each(function () {
        department.push($(this).val());
    });

    $("input[name='profile[]']:checked").each(function () {
        profile.push($(this).val());
    });

    // AJAX request
    $.ajax({
        url: base_url + 'recruitment/ajax_job_filter',
        type: 'POST',
        data: {          
            location: location,
            experience: experience,
            experiences: experiences,
            companies: companies,
            educations: educations,
            salary: salary,
            work_mode: work_mode,
            department: department,
            profile: profile
        },
        success: function (data) {
            console.log("AJAX response received.");
            $('#job_filters').css('display', 'none');
            $('#vieweducation').modal('hide');
            $('#viewlocation').modal('hide');
            $('#viewexperience').modal('hide');
            $('#vietopCompanies').modal('hide');
            $("#job_filter").addClass("col-lg-6 col-sm-12 jobFilterMiddle");
            $('#jobprofileshort').addClass("hidden");
            $('#job_filtersssss').removeClass("hidden").addClass("col-lg-6 col-sm-12 jobFilterMiddle");
            $("#job_filtersssss").html(data);
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error:", error);
        }
    });
}


   function apply_job_description(job_id){
    var base_url = '<?php echo base_url(); ?>';
    var job_id=job_id;
    $.ajax({
      url: base_url+'recruitment/candidate_job_apply',
      dataType:'json',
      type: 'POST',
      data: {job_id:job_id},
      success:function(data)
      { 
        if(data["status"] == "true"){
        toastr.success('Applied Successfully!', 'Success Alert', {timeOut: 8000})
        setTimeout(function(){
        window.location.reload(true);
      }, 2000);
      }
    if (data["status"] == "not-login")
    {
        toastr.error('You Are Already Apply!', {timeOut: 8000});
        // Delay the redirect by 2 seconds (2000 milliseconds)
        setTimeout(function() {
        window.location.href = base_url + "recruitment/allready_register_account_login_here";
      }, 2000);
    }
      else
      {
         toastr.error('You Are Allready Apply!', {timeOut: 8000})
         window.location.reload(true);
      }
      }
      });
   }


   $('#price_range').slider({
        range:true,
        min:0,
        max:30,
        values:[0, 30],
       
        stop:function(event, ui){
            //$('#price_show').show();
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
          var base_url = '<?php echo base_url(); ?>';
          var min_exp=$("#hidden_minimum_price").val();
          var max_exp=$("#hidden_maximum_price").val();          

$.ajax({
      url: base_url+'recruitment/ajax_job_filter',
      type: 'POST',
      data:{min_exp:min_exp,max_exp:max_exp},
      success:function(data)
        {
         $('#job_filters').css('display','none');         
         $('#vieweducation').modal('hide');
         $('#viewlocation').modal('hide');
         $('#vietopCompanies').modal('hide');
         $("#job_filter").addClass("col-lg-6 col-sm-12 jobFilterMiddle");
         $("#job_filter").html(data);
        }
});
         
           
        }
    });


</script>


<script type="text/javascript">

  
   var counter_eng = 1;
   function edit_update_more_task_eng(counter){
    counter++;
    counter_eng++;   
    var  new_row_eng='<tr><td>'+counter_eng+'</td>';    
    new_row_eng+='<td><input type="text" class="form-control form-group" name="language_add[]" id="language_add'+counter_eng+'" placeholder="Enter Language"><input type="checkbox" id="lang_read_'+counter_eng+'" name="lang_read[' + counter +']" value="Read">&nbspRead&nbsp;<input type="checkbox" id="lang_write'+counter_eng+'" name="lang_write[' + counter +']" value="Write">&nbspWrite&nbsp;<input type="checkbox" id="lang_speak'+counter_eng+'" name="lang_speak[' + counter +']" value="Speak">&nbspSpeak</td>';
    new_row_eng+='<td><select class="form-select" id="lan_proficiant" name="lan_proficiant[]"><option value="Beginner">Beginner</option><option value="Proficient">Proficient</option><option value="Expert">Expert</option></select></td>';
    new_row_eng+='<td><button type="button" id="del_more_row_eng_'+counter_eng+'"  class="btn btn-info btn-sm" onClick="delete_more_row_eng('+counter_eng+')">Delete</button></td>';
    new_row_eng+='</tr>';
    $('#example8').append(new_row_eng);
 }
 
 var counter_eng = 1;
 var array_count = 0;
 function add_more_task_eng(){
     
    counter_eng++;   
    array_count++;
    var  new_row_eng='<tr><td>'+counter_eng+'</td>';    
    new_row_eng+='<td><input type="text" class="form-control form-group" name="language_add[]" id="language_add'+counter_eng+'" placeholder="Enter Language"><input type="checkbox" id="lang_read_'+counter_eng+'" name="lang_read['+array_count+']" value="Read">&nbspRead&nbsp;<input type="checkbox" id="lang_write'+counter_eng+'" name="lang_write['+array_count+']" value="Write">&nbspWrite&nbsp;<input type="checkbox" id="lang_speak'+counter_eng+'" name="lang_speak['+array_count+']" value="Speak">&nbspSpeak</td>';
    new_row_eng+='<td><select class="form-select" id="lan_proficiant" name="lan_proficiant[]"><option value="Beginner">Beginner</option><option value="Proficient">Proficient</option><option value="Expert">Expert</option></select></td>';
    new_row_eng+='<td><button type="button" id="del_more_row_eng_'+counter_eng+'"  class="btn btn-info btn-sm" onClick="delete_more_row_eng('+counter_eng+')">Delete</button></td>';
    new_row_eng+='</tr>';
    $('#example8').append(new_row_eng);
 }
 function delete_more_row_eng(delcounter4)
 {
     $('#del_more_row_eng_'+delcounter4).closest('tr').remove();
     
 }
/*  $(document).on('change', 'input:radio[name=candidate_employment]', function() {
   
    $('div[id^="candidate_working_till"]').toggle(); // toggle all DIVs begining with "my_radio_" 
    $('div[id^="working_yes"]').toggle(); // toggle all DIVs begining with "my_radio_"
    $('div[id^="candidate_monthly_stipend"]').toggle(); // toggle all DIVs begining with "my_radio_"  
    $('div[id^="internship_project"]').toggle(); // toggle all DIVs begining with "my_radio_"
    $('#' + $(this).attr('id') + '_text').show(); // show the current one
  });
  
   $(document).on('change', 'input:radio[name=candidate_employment]', function() {
   
    $('div[id^="candidate_project"]').toggle(); // toggle all DIVs begining with "my_radio_"
    $('#' + $(this).attr('id') + '_text').show(); // show the current one
  });*/
  
  
  function ajaxformsubmit(){
     var base_url = '<?php echo base_url(); ?>'; 
     var candidate_ids ='<?php echo  $this->session->userdata('candidate_id') ?>';
     var education=$("#education").val();
     var candidate_board=$("#candidate_board").val();
     var passingout_year=$("#passingout_year").val();
     var candidate_school_medium=$("#candidate_school_medium").val();
     var candidate_total_mark=$("#candidate_total_mark").val();
     var candidate_english_mark=$("#candidate_english_mark").val();
     var candidate_maths_mark=$("#candidate_maths_mark").val();
     var candidate_univercity=$("#candidate_univercity").val();
     var candidate_course=$("#candidate_course").val();
     var course_specialization=$("#course_specialization").val();
     var course_specialization1=$("#course_specialization1").val();
     var candidate_course_type=$("#candidate_course_type").val();
     var course_start_year=$("#course_start_year").val();
     var course_end_year=$("#course_end_year").val();
     var grade=$("#grade").val();
     
     $.ajax({
      url: base_url+'recruitment/save_candidate_education_data',
      type: 'POST',
      dataType:'json',
      data:{
        education:education,candidate_board:candidate_board,passingout_year:passingout_year,candidate_school_medium:candidate_school_medium,candidate_total_mark:candidate_total_mark,candidate_english_mark:candidate_english_mark,candidate_maths_mark:candidate_maths_mark,candidate_univercity:candidate_univercity,candidate_course:candidate_course,course_specialization:course_specialization,course_specialization1,course_specialization1,candidate_course_type:candidate_course_type,course_start_year:course_start_year,course_end_year:course_end_year,grade:grade,candidate_ids:candidate_ids
        },
                  
      success:function(data)
        {
          $('#myModal1').modal('hide');
        }
});
}


/*     $("#add_it_skills").on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: "<?=base_url('recruitment/save_it_skills_candidate')?>",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $('#myModal3').val('');
                    window.location.href="<?= base_url('candidate_profile/candidate_registration')?>";
                    load_data();
                    
                }

            });

        });*/
        
     /*        $("#add_career_profile").on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: "<?=base_url('recruitment/save_carrer_profile_candidate')?>",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $('#myModal3').val('');
                    window.location.href="<?= base_url('candidate_profile/candidate_registration')?>";
                    load_data();
                    
                }

            });

        });*/
        
        
/*  function ajaxitskillformsubmit(event){
     event.preventDefault();
     var base_url = '<?php echo base_url(); ?>'; 
     alert(base_url);
     $.ajax({
      url: base_url+'recruitment/save_it_skills_candidate',
      method: 'POST',
     data: new FormData(this),
      success:function(data)
        {
          $('#myModal3').modal('hide');
        }
});
}*/



  function ajaxformupdate(){
     var base_url = '<?php echo base_url(); ?>'; 
     var candidate_ids ='<?php echo  $this->session->userdata('candidate_id') ?>';
     var education_id=$("#education_id").val();  
     var education=$("#education").val();
     var candidate_board=$("#candidate_board").val();
     var passingout_year=$("#passingout_year").val();
     var candidate_school_medium=$("#candidate_school_medium").val();
     var candidate_total_mark=$("#candidate_total_mark").val();
     var candidate_english_mark=$("#candidate_english_mark").val();
     var candidate_maths_mark=$("#candidate_maths_mark").val();
     var candidate_univercity=$("#candidate_univercity").val();
     var candidate_course=$("#candidate_course").val();
     var course_specialization=$("#course_specialization").val();
     var course_specialization1=$("#course_specialization1").val();
     var candidate_course_type=$("#candidate_course_type").val();
     var course_start_year=$("#course_start_year").val();
     var course_end_year=$("#course_end_year").val();
     var grade=$("#grade").val();
     
     $.ajax({
      url: base_url+'recruitment/update_education_details',
      type: 'POST',
      dataType:'json',
      data:{
        education:education,candidate_board:candidate_board,passingout_year:passingout_year,candidate_school_medium:candidate_school_medium,candidate_total_mark:candidate_total_mark,candidate_english_mark:candidate_english_mark,candidate_maths_mark:candidate_maths_mark,candidate_univercity:candidate_univercity,candidate_course:candidate_course,course_specialization:course_specialization,course_specialization1,course_specialization1,candidate_course_type:candidate_course_type,course_start_year:course_start_year,course_end_year:course_end_year,grade:grade,candidate_ids:candidate_ids,education_id:education_id
        },
                  
      success:function(data)
        {
          $('#myModal1').modal('hide');
        }
});
}
 function show(){
  
  
  var candidate_employment = $("input[name='candidate_employment']:checked").val();
  var radioValue = $("input[name='candidate_enrollment']:checked").val();
  show_internship_details1(candidate_employment,radioValue);

 
}
  
  function show2(candidate_employment){
 
  document.getElementById('current_company_designation').style.display = 'none';
  document.getElementById('candidate_skill_used').style.display = 'none';
  /*document.getElementById('candidate_job_profiles').style.display = 'none';*/
  document.getElementById('cadidate_poject_descrption').style.display = 'none';
  document.getElementById('current_company_name').style.display = 'none';
  show_internship_details(candidate_employment) 
   
  
}

 function show_internship_details1(candidate_employment,radioValue){

   if(candidate_employment=="Yes" && radioValue=="Full Time" ){
      
      document.getElementById('prev_company_name').style.display = 'none';
      document.getElementById('candidate_working_till_year').style.display = 'none';
      document.getElementById('candidate_working_till_month').style.display = 'none';
      document.getElementById('prev_company_designation').style.display = 'none';   
      document.getElementById('candidate_location').style.display = 'none';
      document.getElementById('candidate_department').style.display = 'none';
      document.getElementById('candidate_currency_stipend').style.display = 'none';
      document.getElementById('candidate_monthly_stipend').style.display = 'none';
      document.getElementById('candidate_project_link').style.display = 'none';
      document.getElementById('cadidate_poject_descrption').style.display = 'none';
      document.getElementById('intern_roles_categorys').style.display = 'none';
      document.getElementById('intern_roles').style.display = 'none';
  }
  if(candidate_employment=="No" && radioValue=="Full Time"){
  document.getElementById('candidate_location').style.display = 'none';
  document.getElementById('candidate_department').style.display = 'none';
  document.getElementById('candidate_currency_stipend').style.display = 'none';
  document.getElementById('current_company_name').style.display = 'none';
  document.getElementById('current_company_designation').style.display = 'none';
  document.getElementById('salaryCurrency').style.display = 'none';
  document.getElementById('candidate_current_salary').style.display = 'none';
  document.getElementById('candidate_project_link').style.display = 'none';
  document.getElementById('cadidate_poject_descrption').style.display = 'none';
  document.getElementById('candidate_monthly_stipend').style.display = 'none';
  document.getElementById('candidate_skill_used').style.display = 'none';
  document.getElementById('candidate_notice_period').style.display = 'none';
  document.getElementById('intern_roles_category').style.display = 'none';
  document.getElementById('intern_roles').style.display = 'none';
  
  
 }
 
 if(candidate_employment=="Yes" && radioValue=="Internship"){
  document.getElementById('current_company_designation').style.display = 'none';
  document.getElementById('prev_company_name').style.display = 'none';
  document.getElementById('prev_company_designation').style.display = 'none';
  document.getElementById('candidate_working_till_year').style.display = 'none';
  document.getElementById('candidate_working_till_month').style.display = 'none';
  document.getElementById('candidate_job_profiles').style.display = 'none';
  document.getElementById('salaryCurrency').style.display = 'none';
  document.getElementById('candidate_current_salary').style.display = 'none';
  document.getElementById('candidate_skill_used').style.display = 'none';
  document.getElementById('candidate_notice_period').style.display = 'none';
 }
 
if(candidate_employment=="No" && radioValue=="Internship"){
    
  document.getElementById('current_company_designation').style.display = 'none';
  document.getElementById('current_company_name').style.display = 'none';
  document.getElementById('prev_company_designation').style.display = 'none';
  document.getElementById('candidate_job_profiles').style.display = 'none';
  document.getElementById('salaryCurrency').style.display = 'none';
  document.getElementById('candidate_current_salary').style.display = 'none';
  document.getElementById('candidate_skill_used').style.display = 'none';
  document.getElementById('candidate_notice_period').style.display = 'none';
 }
  
}

 function show_internship_details(candidate_enrollment,radioValue){
  document.getElementById('candidate_join_years').style.display = 'none';
  document.getElementById('candidate_join_months').style.display = 'none';    
  document.getElementById('current_company_designation').style.display = 'none';
  document.getElementById('candidate_skill_used').style.display = 'none';
  document.getElementById('salaryCurrency').style.display = 'none';
  document.getElementById('candidate_current_salary').style.display = 'none';
  document.getElementById('candidate_job_profiles').style.display = 'none';
  document.getElementById('candidate_notice_period').style.display = 'none';
}


    function edit_employment_details(employement_id)
{
      var base_url = '<?php echo base_url(); ?>';
      var employements_id=employement_id;
    $.ajax({
      url: base_url+'recruitment/edit_employement_details',      
      type: 'POST',
      data: {employements_id:employements_id},
      success:function(data)
      {
        $('#employment_edit').html(data);
        $('#myModal33').modal('show');            
        }
      });
}

    function edit_education_details(education_id)
{
    var base_url = '<?php echo base_url(); ?>';
    var education_id=education_id;
    $.ajax({
      url: base_url+'recruitment/edit_education_details',      
      type: 'POST',
      data: {education_id:education_id},
      success:function(data)
      {
        $('#education_edit').html(data);
        $('#myModal34').modal('show');            
        }
      });
}


    function edit_it_skill_details(skill_id)
{
    var base_url = '<?php echo base_url(); ?>';
    var skill_id=skill_id;
    $.ajax({
      url: base_url+'recruitment/edit_skills_details',      
      type: 'POST',
      data: {skill_id:skill_id},
      success:function(data)
      { $('#it_skill_edit').html(data);
        $('#myModal39').modal('show');            
        }
      });
}

/*function delete_it_skiils_record(it_skill_id){
alert(it_skill_id);

var base_url = '<?php echo base_url(); ?>';
    var skill_id=skill_id;
    $.ajax({
      url: base_url+'recruitment/it_skiils_delete_record',      
      type: 'POST',
      data: {skill_id:skill_id},
      success:function(data)
      { $('#it_skill_delete').html(data);
        $('#ITskillsDeletePopup').modal('show');            
        }
      });
}*/



    function edit_work_candidate_details(work_id)
{
    var base_url = '<?php echo base_url(); ?>';
    var work_id=work_id;
    $.ajax({
      url: base_url+'recruitment/edit_work_candidate_details',      
      type: 'POST',
      data: {work_id:work_id},
      success:function(data)
      { $('#edit_wok_samples').html(data);
        $('#wok_samples_edit').modal('show');            
        }
      });
}

    function edit_profile_summary_details(profile_summary_id)
{

    var base_url = '<?php echo base_url(); ?>';
    var profile_summary_id=profile_summary_id;
    $.ajax({
      url: base_url+'recruitment/edit_candidate_profile_summary_details',      
      type: 'POST',
      data: {profile_summary_id:profile_summary_id},
      success:function(data)
      { $('#profile_edit').html(data);
        $('#Profile_Summery_Edit').modal('show');            
        }
      });
}

function edit_online_profile_details(social_media_id)
{
    var base_url = '<?php echo base_url(); ?>';
    var social_media_id=social_media_id;
    $.ajax({
    url: base_url+'recruitment/edit_online_profile_details',      
    type: 'POST',
    data: {social_media_id:social_media_id},
    success:function(data)
    { 
        $('#social_media_edit').html(data);
        $('#edit_social_media').modal('show');            
    }
    });
}


function edit_presentation_candidate_details(presentation_id){

    var base_url = '<?php echo base_url(); ?>';
    $.ajax({
      url: base_url+'recruitment/edit_presentation_candidate_details',      
      type: 'POST',
      data: {presentation_id:presentation_id},
      success:function(data)
      { 
        $('#presentation_edit').html(data);
        $('#edit_presentation').modal('show');            
        }
      });

}

function edit_patent_candidate_details(patent_id){

    var base_url = '<?php echo base_url(); ?>';
    var patent_id=patent_id;
    $.ajax({
      url: base_url+'recruitment/edit_patent_candidate_details',      
      type: 'POST',
      data: {patent_id:patent_id},
      success:function(data)
      { 
        $('#edit_Patent').html(data);
        $('#Patent_edit').modal('show');            
        }
      });

}


function edit_certificate_candidate_details(certificate_id){

    var base_url = '<?php echo base_url(); ?>';
    var certificate_id=certificate_id;
    $.ajax({
      url: base_url+'recruitment/edit_certificate_candidate_details',      
      type: 'POST',
      data: {certificate_id:certificate_id},
      success:function(data)
      { 
        $('#Certifications_edit').html(data);
        $('#edit_Certifications').modal('show');            
        }
      });

}


function edit_resume_headilne_candidate_details(resume_hedline_id){

    var base_url = '<?php echo base_url(); ?>';
    var resume_hedline_id=resume_hedline_id;
    $.ajax({
      url: base_url+'recruitment/edit_resume_headilne_candidate_details',      
      type: 'POST',
      data: {resume_hedline_id:resume_hedline_id},
      success:function(data)
      { 
        $('#resume_headline_edit').html(data);
        $('#edits_resume_headline').modal('show');            
        }
      });

}


    function edit_carrer_profile_details(career_profile_id)
{
    var base_url = '<?php echo base_url(); ?>';
    var career_profile_id=career_profile_id;
    $.ajax({
      url: base_url+'recruitment/edit_career_profile_details',      
      type: 'POST',
      data: {career_profile_id:career_profile_id},
      success:function(data)
      { 
        $('#career_profile_edit').html(data);
        $('#myModal44').modal('show');            
        }
      });
}

    function edit_personal_details(personal_candidate_id)
{
    var base_url = '<?php echo base_url(); ?>';
    var personal_candidate_id = personal_candidate_id;
    $.ajax({
      url: base_url+'recruitment/edit_candidate_peronal_details_details',      
      type: 'POST',
      data: {personal_candidate_id:personal_candidate_id},
      success:function(data)
      { 
        $('#career_profile_edit').html(data);
        $('#myModal49').modal('show');            
        }
      });
}

   function delete_education_details(education_id)
{   
    var base_url = '<?php echo base_url(); ?>';
    var education_id=education_id;
    $.ajax({
      url: base_url+'recruitment/delete_employement_details',      
      type: 'POST',
      data: {education_id:education_id},
      success:function(data)
      {
        /*$('#employment_edit').html(data);
        $('#myModal33').modal('show');    */        
        }
      });
}

<?php if($this->session->flashdata('success_delete')){ ?>
var isi =  <?php echo json_encode($this->session->flashdata('success')) ?>

Swal.fire({
  title: 'Delete Record ',
  text: 'isi',
  icon: 'success',
  
})
<?php } ?>

<?php if($this->session->flashdata('error_delete')){ ?>
var isi =  <?php echo json_encode($this->session->flashdata('error')) ?>

Swal.fire({
  title: 'Delete Record ',
  text: 'isi',
  icon: 'success',
  
})
<?php } ?>
function myFunction(course_id){
   
    var base_url = "<?php echo base_url();?>";
    $.ajax({
    type:"POST",
    data:{course_id},
    dataType: 'json',
    url:base_url+"candidate_profile/get_specialization_by_course",
    success:function(response) {
    $('#course_specialization option').remove();
    for(var i = 0; i<response.length; i++){
    var id = response[i]; 
    $("#course_specialization").append("</br><option value="+response[i]['specialization_course_id']+">"+response[i]['specialization_name'] +"</option></br>");
   
    }
    }
  });
}

function myFunction1(main_course_id){
    var base_url = "<?php echo base_url();?>";
    $.ajax({
    type:"POST",
    data:{main_course_id},
    dataType: 'json',
    url:base_url+"candidate_profile/get_specialization_by__main_course",
    success:function(response) {
    $('#candidate_course option').remove();
    for(var i = 0; i<response.length; i++){
    var id = response[i]; 
    $("#candidate_course").append("</br><option value="+response[i]['course_id']+">"+response[i]['course_name'] +"</option></br>");
   
    }
    }
  });
}

function myFunctions(course_specialization_id){
    var base_url = "<?php echo base_url();?>";
    $.ajax({
    type:"POST",
    data:{course_id},
    dataType: 'json',
    url:base_url+"candidate_profile/get_specialization_by_course",
    success:function(response) {
    $('#course_specialization option').remove();
    for(var i = 0; i<response.length; i++){
    var id = response[i]; 
    $("#course_specialization").append("</br><option value="+response[i]['specialization_course_id']+">"+response[i]['specialization_name'] +"</option></br>");
   
    }
    }
  });
}

function edit_itskills_details(){
    
}


 $("#course_specialization").on('change', function(){

        /*application_for = document.getElementsByClassName("application_for")*/;
        var value = $("#course_specialization :selected").val();
        //alert(value);
        if( value == '22'||value == '20' || value == '24' || value == '26' ||value == '28' || value == '30' || value == '32' || value == '34' || value == '36' || value == '59' || value == '86' || value == '88' ||value == '90' || value == '108' || value == '110' || value == '112' || value == '114' || value == '116' || value == '118' || value == '120' ||value == '129' || value == '135' || value == '137' || value == '138'){
            
            $("#specialization_co").css({'display': '',});
            //$('#div_marrige').removeClass("hidden");
            // $('#fresher_div_doc').show();
            
            // $('#name_of_org').html('Name of the person *');
        }else{
            $("#specialization_co").css({'display': 'none',});
            // $('#fresher_div_doc').hide();
            // $('#name_of_org').html('Name of the Organisation/ Business *');
        }
 });
 
 
  $("#education").on('change', function()
  {
            var value = $("#education :selected").val();
         if( value == '4'){

            $("#candidate_boards").css({'display': '',});
            $("#passingout_years").css({'display': '',});
            $("#candidate_school_mediums").css({'display': '',});
            $("#candidate_total_marks").css({'display': '',});
            $("#candidate_english_marks").css({'display': '',});
            $("#candidate_maths_marks").css({'display': '',});
            $("#candidate_univercitys").css({'display': 'none',});
            $("#candidate_courses").css({'display': 'none',});
            $("#course_specializations").css({'display': 'none',});
            $("#candidate_course_types").css({'display': 'none',});
            $("#course_start_years").css({'display': 'none',}); 
            $("#course_end_years").css({'display': 'none',});
            $("#grades").css({'display': 'none',});
            
        }else{
            /*$("#candidate_boards").css({'display': 'none',});
            $("#passingout_years").css({'display': 'none',});
            $("#candidate_school_mediums").css({'display': 'none',});
            $("#candidate_total_marks").css({'display': 'none',});
            $("#candidate_univercitys").css({'display': '',});
            $("#candidate_courses").css({'display': '',});
            $("#course_specializations").css({'display': '',});
            $("#candidate_course_types").css({'display': '',});
            $("#course_start_years").css({'display': '',}); 
            $("#course_end_years").css({'display': '',});
            $("#grades").css({'display': '',});*/
        }
     if( value == '5'){  
        $("#candidate_boards").css({'display': '',});
        $("#passingout_years").css({'display': '',});
        $("#candidate_school_mediums").css({'display': '',});
        $("#candidate_total_marks").css({'display': '',});
        $("#candidate_univercitys").css({'display': 'none',});
        $("#candidate_courses").css({'display': 'none',});
        $("#course_specializations").css({'display': 'none',});
        $("#candidate_course_types").css({'display': 'none',});
        $("#course_start_years").css({'display': 'none',}); 
        $("#course_end_years").css({'display': 'none',});
        $("#grades").css({'display': 'none',});
     }  
     /*else{
        $("#candidate_boards").css({'display': 'none',});
        $("#passingout_years").css({'display': 'none',});
        $("#candidate_school_mediums").css({'display': 'none',});
        $("#candidate_total_marks").css({'display': 'none',});
        $("#candidate_univercitys").css({'display': '',});
        $("#candidate_courses").css({'display': '',});
        $("#course_specializations").css({'display': '',});
        $("#candidate_course_types").css({'display': '',});
        $("#course_start_years").css({'display': '',}); 
        $("#course_end_years").css({'display': '',});
        $("#grades").css({'display': '',});
     }*/
        
 });
 $( document ).ready(function() {
   let dateDropdown = document.getElementById('date-dropdown');
   let dateDropdown1 = document.getElementById('date-dropdown1');
   let dateDropdown2 = document.getElementById('worked_from_year');
   let dateDropdown3 = document.getElementById('worked_till_year');


    let currentYear = new Date().getFullYear();
    let earliestYear = 1970;

    let currentYear1 = new Date().getFullYear();
    let earliestYear1 = 1970;

    let currentYear2 = new Date().getFullYear();
    let earliestYear2 = 1970;

    let currentYear3 = new Date().getFullYear();
    let earliestYear3 = 1970;

   /* while (currentYear >= earliestYear) {
      let dateOption = document.createElement('option');
      dateOption.text = currentYear;
      dateOption.value = currentYear;
      dateDropdown.add(dateOption);
      currentYear -= 1;
    }*/
    document.addEventListener("DOMContentLoaded", function() {
    let dateDropdown = document.getElementById("dateDropdown");
    let earliestYear = 1900;
    let currentYear = new Date().getFullYear();

    while (currentYear >= earliestYear) {
        let dateOption = document.createElement('option');
        dateOption.text = currentYear;
        dateOption.value = currentYear;
        dateDropdown.add(dateOption);
        currentYear -= 1;
    }
});

    /* while (currentYear1 >= earliestYear1) {
      let dateOption = document.createElement('option');
      dateOption.text = currentYear1;
      dateOption.value = currentYear1;
      dateDropdown1.add(dateOption);
      currentYear1 -= 1;
    }

    while (currentYear2 >= earliestYear2) {
      let dateOption = document.createElement('option');
      dateOption.text = currentYear2;
      dateOption.value = currentYear2;
      dateDropdown2.add(dateOption);
      currentYear2 -= 1;
    }

    while (currentYear3 >= earliestYear3) {
      let dateOption = document.createElement('option');
      dateOption.text = currentYear3;
      dateOption.value = currentYear3;
      dateDropdown3.add(dateOption);
      currentYear3 -= 1;
    }*/

/* $('#framework').multiselect({
  nonSelectedText: 'Select Framework',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  buttonWidth:'400px'
 })*/;


});
 

 
$("#education_sumbit").click(function(event){
     var base_url = '<?php echo base_url(); ?>';  
     var education=$("#education").val();
     var candidate_board=$("#candidate_board").val();
     var passingout_year=$("#passingout_year").val();
     var candidate_school_medium=$("#candidate_school_medium").val();
     var candidate_total_mark=$("#candidate_total_mark").val();
     var candidate_english_mark=$("#candidate_english_mark").val();
     var candidate_maths_mark=$("#candidate_maths_mark").val();
     var candidate_univercity=$("#candidate_univercity").val();
     var candidate_course=$("#candidate_course").val();
     var course_specialization=$("#course_specialization").val();
     var course_specialization1=$("#course_specialization1").val();
     var candidate_course_type=$("#candidate_course_type").val();
     var course_start_year=$("#course_start_year").val();
     var course_end_year=$("#course_end_year").val();
     var grade=$("#grade").val();
     
$.ajax({
      url: base_url+'recruitment/save_candidate_employment_details',
      type: 'POST',
      dataType:'json',
      data:{
        education:education,candidate_board:candidate_board,passingout_year:passingout_year,candidate_school_medium:candidate_school_medium,candidate_total_mark:candidate_total_mark,candidate_english_mark:candidate_english_mark,candidate_maths_mark:candidate_maths_mark,candidate_univercity:candidate_univercity,candidate_course:candidate_course,course_specialization:course_specialization,course_specialization1,course_specialization1,candidate_course_type:candidate_course_type,course_start_year:course_start_year,course_end_year:course_end_year,grade:grade
        },
                  
      success:function(data)
        {
          location.reload();
        }
});

});

    document.addEventListener('DOMContentLoaded', function() {
        const passwordInput = document.getElementById('password');
        const showButton = document.getElementById('showButton');

        showButton.addEventListener('click', function() {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                showButton.textContent = 'Hide';
            } else {
                passwordInput.type = 'password';
                showButton.textContent = 'Show';
            }
        });
    });

</script>
