$( document ).ready(function() {

$("#resume_headline_candidate").validate(
    {
      errorElement: "span", 
      rules: 
      {
        resume_headline: 
            {
                required:true,               
            },
      },
      

      messages: 
      { 
        resume_headline: 
            {
                required:"Required Candidate Resume Headline..!!",
            },
      },
    });
    
    
    $("#add_candidate_skills").validate(
    {
      errorElement: "span", 
      rules: 
      {
        candidate_skills: 
            {
                required:true,               
            },
      },
      

      messages: 
      { 
        candidate_skills: 
            {
                required:"Required Candidate Skills..!!",
            },
      },
    });
    
    
    $("#Profile_Summery").validate(
    {
      errorElement: "span", 
      rules: 
      {
        candidate_profile_summary: 
            {
                required:true,               
            },
      },
      

      messages: 
      { 
        candidate_profile_summary: 
            {
                required:"Required Candidate Profile Summary..!!",
            },
      },
    });
    
    $("#add_it_skills").validate(
    {
      errorElement: "span", 
      rules: 
      {
        software_name: 
            {
                required:true,               
            },
            software_versions: 
            {
                required:true,               
            },
            software_last_used: 
            {
                required:true,               
            },
            exp_year:
            {
                required:true,               
            },
            exp_month:
            {
                required:true,               
            },
      },
      

      messages: 
      { 
        software_name: 
            {
                required:"Required Software Name..!!",
            },
            software_versions: 
            {
                required:"Required Software Version..!!",
            },
            software_last_used: 
            {
                required:"Required Software Last Version Used..!!",
            },
            exp_year: 
            {
                required:"Required Software Experience..!!",
            },
            exp_month:
            {
                required:"Required Software Experience In Month..!!",              
            },
      },
    });
   
   $("#add_career_profile").validate(
    {
      errorElement: "span", 
      rules: 
      {
            career_current_industry: 
            {
                required:true,               
            },
            career_profile_department: 
            {
                required:true,               
            },
            career_category: 
            {
                required:true,               
            },
            career_job_role:
            {
                required:true,               
            },
            'career_desired_job_type[]':
            {
                required:true,               
            },
            'career_employment_type[]':
            {
                required:true,               
            },
            career_preferred_shift:
            {
                required:true,               
            },
            'preferred_work_location[]':
            {
                required:true,               
            },
            expected_salary:
            {
                required:true,               
            },
      },
      

      messages: 
      { 
            career_current_industry: 
            {
                required:"Required Current Industry..!!",
            },
            career_profile_department: 
            {
                required:"Required Department..!!",
            },
            career_category: 
            {
                required:"Required Role Category..!!",
            },
            career_job_role: 
            {
                required:"Required Job Role..!!",
            },
            'career_desired_job_type[]':
            {
                required:"Required Desired Job Type..!!",              
            },
            'career_employment_type[]':
            {
                required:"Required Desired Employment Type..!!",              
            },
            career_preferred_shift: 
            {
                required:"Require Preferred Shift..!!",
            },
            'preferred_work_location[]': 
            {
                required:"Required Preferred Work Location..!!",
            },
            expected_salary: 
            {
                required:"Require Expected Salary..!!",
            },
            
      },
    });
     
     
     
$("#add_personal_deatils").validate({
    errorElement: "span", 
    rules: {
        gender: {
            required: true,               
        },
        married_status: {
            required: true,               
        },
        birth_date: {
            required: true,               
        },
        birth_month: {
            required: true,               
        },
        birth_year: {
            required: true,               
        },
        cast_cat: {
            required: true,               
        },
        differently_abled: {
            required: true,               
        },
        career_break: {
            required: true,               
        },
        permanant_addresss: {
            required: true,               
        },
        hometown: {
            required: true,               
        },
        candidate_pincode: {
            required: true,               
        },
        'lan_proficiant[]': {
            required: true,               
        }
    },
    messages: { 
        gender: {
            required: "Required Gender..!!",
        },
        married_status: {
            required: "Required Married Status..!!",
        },
        birth_date: {
            required: "Required Date of Birth..!!",
        },
        birth_month: {
            required: "Required Date of Birth Month..!!",
        },
        birth_year: {
            required: "Required Birth Year..!!",              
        },
        cast_cat: {
            required: "Required Category..!!",              
        },
        differently_abled: {
            required: "Require Differently Abled..!!",
        },
        career_break: {
            required: "Required Career Break..!!",
        },
        permanant_addresss: {
            required: "Require Permanent Address..!!",
        },
        hometown: {
            required: "Require Hometown..!!",
        },
        candidate_pincode: {
            required: "Require Pincode..!!",
        },
        'lan_proficiant[]': {
            required: "Require Language Proficiant..!!",
        }
    }
});

    
        
    $("#add_certifications").validate(
    {
      errorElement: "span", 
      rules: 
      {
        certificate_name: 
        {
            required:true,               
        },
        certification_provider: 
        {
            required:true,               
        },
        certification_completion_id: 
        {
            required:true,               
        },
        certificate_url: 
        {
            required:true,               
        },
        certificate_validity_start_month: 
        {
            required:true,               
        },
        certificate_validity_start_year: 
        {
            required:true,               
        },
        certificate_validity_end_month: 
        {
            required:true,               
        },
        cerificate_validity_end_year: 
        {
            required:true,               
        },
        doesnot_expired: 
        {
            required:true,               
        },
      },
      

      messages: 
      { 
        certificate_name: 
        {
            required:"Required Certification Name..!!",
        },
        certification_provider: 
        {
            required:"Required Certification Provider..!!",
        },
        certification_completion_id: 
        {
            required:"Required Certification Completion ID..!!",
        },
        certificate_url: 
        {
            required:"Required Certification URL..!!",
        },
        certificate_validity_start_month: 
        {
            required:"Required Certification Validity Start Month..!!",
        },
        certificate_validity_start_year: 
        { 
            required:"Required Certification Validity Start Year..!!",
        },
        certificate_validity_end_month: 
        {
            required:"Required Certification Validity End Month..!!",
        },
        cerificate_validity_end_year: 
        {
            required:"Required Certification Validity End Year..!!",
        },
        doesnot_expired: 
        {
            required:"Required Does Not Expired..!!",
        },
        
      },
    });
    
    
    $("#add_patent").validate(
    {
      errorElement: "span", 
      rules: 
      {
        patent_title: 
        {
            required:true,               
        },
        patent_url: 
        {
            required:true,               
        },   
        patent_office: 
        {
            required:true,               
        }, 
        patent_status: 
        {
            required:true,               
        }, 
        patent_application_no: 
        {
            required:true,               
        }, 
        patent_issue_year: 
        {
            required:true,               
        },
        patent_issue_month: 
        {
            required:true,               
        },
        patent_description: 
        {
            required:true,               
        },
      },
      

      messages: 
      { 
        patent_title: 
        {
            required:"Required Patent Title..!!",
        },
        patent_url: 
        {
            required:"Required URL..!!",
        },
        patent_office: 
        {
            required:"Required Patent Office..!!",
        },
        patent_status: 
        {
            required:"Required Status..!!",
        },
        patent_application_no: 
        {
            required:"Required Application Number..!!",
        },
        patent_issue_year: 
        {
            required:"Required Issued Year..!!",
        },
        patent_issue_month: 
        {
            required:"Required Issued Month..!!",
        },
        patent_description: 
        {
            required:"Required Description..!!",
        },
      },
    });
    
    $("#add_presentation").validate(
    {
      errorElement: "span", 
      rules: 
      {
        presentation_title: 
        {
            required:true,               
        },
        presentation_url: 
        {
            required:true,               
        },
        presentation_description: 
        {
            required:true,               
        },
      },

      messages: 
      { 
        presentation_title: 
        {
            required:"Required Presentation Title.!!",
        },
        presentation_url: 
        {
            required:"Required URL.!!",
        },
        presentation_description: 
        {
            required:"Required URL.!!",
        },
      },
    });
    
    $("#add_white_paper_research_publication_journal_entry").validate(
    {
      errorElement: "span", 
      rules: 
      {
        white_paper_title: 
        {
            required:true,               
        },
        white_paper_url: 
        {
            required:true,               
        },
        white_paper_publish_year: 
        {
            required:true,               
        },
        white_paper_publish_month: 
        {
            required:true,               
        },
        white_paper_dec: 
        {
            required:true,               
        },
      },

      messages: 
      { 
        white_paper_title: 
        {
            required:"Required Title.!!",
        },
        white_paper_url: 
        {
            required:"Required URL.!!",
        },
        white_paper_publish_year: 
        {
            required:"Required Published On Year.!!",
        },
        white_paper_publish_month: 
        {
            required:"Required Published On Month.!!",
        },
        white_paper_dec: 
        {
            required:"Required Description.!!",
        },
        
      },
    });
     
$("#add_work_samples").validate(
    {
      errorElement: "span", 
      rules: 
      {
        work_title: 
        {
            required:true,               
        },
        work_url: 
        {
            required:true,               
        },
        currently_working: 
        {
            required:true,               
        },
        start_duration_year: 
        {
            required:true,               
        },
        start_duration_month: 
        {
            required:true,               
        },
        end_duration_year: 
        {
           required:true,               
        },
        end_duration_month: 
        {
           required:true,               
        },
        descriptios_work_sample: 
        {
           required:true,               
        },
      },

      messages: 
      { 
        work_title: 
        {
            required:"Required Title.!!",
        },
        work_url: 
        {
            required:"Required URL.!!",
        },
        currently_working: 
        {
            required:"Required Currently Working.!!",
        },
        start_duration_year: 
        {
            required:"Required Duration from Year.!!",
        },
        start_duration_month: 
        {
            required:"Required Duration from Month.!!",
        },
        end_duration_year: 
        {
            required:"Required Duration End Year.!!",
        },
        end_duration_month: 
        {
            required:"Required Duration End Month.!!",
        },
        descriptios_work_sample: 
        {
            required:"Required Description.!!",
        },
        
      },
}); 
    
 $("#add_social_paltforms").validate(
    {
      errorElement: "span", 
      rules: 
      {
        social_platform: 
        {
            required:true,               
        },
        profile_url: 
        {
            required:true,               
        },
        social_platform_description: 
        {
            required:true,               
        },
      },

      messages: 
      { 
        social_platform: 
        {
            required:"Required Social Profile.!!",
        },
        profile_url: 
        {
            required:"Required URL.!!",
        },
        social_platform_description: 
        {
            required:"Required Description.!!",
        },
        
      },
});    
  
  
$("#add_employment").validate(
 {
      errorElement: "span", 
      rules: 
      {
        candidate_employment: 
        {
            required:true,               
        },
        candidate_enrollment: 
        {
            required:true,               
        },
        candidate_pre_company: 
        {
            required:true,               
        },
        candidate_pre_designation: 
        {
            required:true,               
        },
        candidate_current_company: 
        {
            required:true,               
        },
        candidate_current_designation: 
        {
            required:true,               
        },
        candidate_intern_location: 
        {
            required:true,               
        },
        candidate_intern_department: 
        {
            required:true,               
        },
        intern_roles_category: 
        {
            required:true,               
        },
        intern_role: 
        {
            required:true,               
        },
        candidate_join_year: 
        {
            required:true,               
        },
        candidate_join_month: 
        {
            required:true,               
        },
        candidate_working_till_year: 
        {
            required:true,               
        },
        candidate_Currrent_currency: 
        {
            required:true,               
        },
        candidate_salarys: 
        {
            required:true,               
        },
        candidate_stipend_currency: 
        {
            required:true,               
        },
        candidate_stipend: 
        {
            required:true,               
        },
        candidate_skill: 
        {
            required:true,               
        },
        candidate_job_profile: 
        {
            required:true,               
        },
        candidate_intern_project_discription: 
        {
            required:true,               
        },
        candidate_intern_project_link:
        {
            required:true,               
        },
        candidate_notice_periods:
        {
            required:true,               
        },
      },
      

      messages: 
      { 
        candidate_employment: 
        {
            required:"Required Current Employement!!",
        },
        candidate_enrollment: 
        {
            required:"Required Employment Type!!",
        },
        candidate_pre_company: 
        {
            required:"Required Previous Company Name!!",
        },
        candidate_pre_designation: 
        {
            required:"Required Previous Designation!!",
        },
        candidate_current_company:
        {
            required:"Required Current Company Name!!",
        },
        candidate_current_designation:
        {
            required:"Required Current Company Name!!",
        },
        candidate_intern_location:
        {
            required:"Required Current Location!!",
        },
        candidate_intern_department:
        {
            required:"Required Department!!",
        },
        intern_roles_category:
        {
            required:"Required Role Category!!",
        },
        intern_role:
        {
            required:"Required Role!!",
        },
        candidate_join_year:
        {
            required:"Required Joining Year!!",
        },
        candidate_join_month:
        {
            required:"Required Joining Month!!",
        },
        candidate_working_till_year:
        {
            required:"Required Working Till Year!!",
        },
        candidate_working_till_month:
        {
            required:"Required Working Till Month!!",
        },
        candidate_Currrent_currency:
        {
            required:"Required Currrent Currency salary!!",
        },
        candidate_salarys:
        {
            required:"Required Currrent salary!!",
        },
        candidate_stipend_currency:
        {
            required:"Required Monthly Stipend Currency!!",
        },
        candidate_stipend:
        {
            required:"Required Monthly Stipend Salary!!",
        },
        candidate_skill:
        {
            required:"Required Skills used!!",
        },
        candidate_job_profile:
        {
            required:"Required Job Profile!!",
        },
        candidate_intern_project_discription:
        {
            required:"Required Project Discription!!",
        },
        candidate_intern_project_link:
        {
            required:"Required Project Link!!",
        },
        candidate_notice_periods:
        {
            required:"Required Notice Period!!",
        },
        
      },
});   
     
 $("#add_presentations").validate(
    {
      errorElement: "span", 
      rules: 
      {
        presentation_title: 
        {
            required:true,               
        },
        profile_url: 
        {
            required:true,               
        },
        social_platform_description: 
        {
            required:true,               
        },
      },

      messages: 
      { 
        presentation_title: 
        {
            required:"Required Presentation Title.!!",
        },
        profile_url: 
        {
            required:"Required URL.!!",
        },
        social_platform_description: 
        {
            required:"Required Description.!!",
        },
        
      },
});




 $("#edit_candidate_basics_details").validate(
    {
      errorElement: "span", 
      rules: 
      {
        candidate_name: 
        {
            required:true,               
        },
        candidate_work_status: 
        {
            required:true,               
        },
        exp_year: 
        {
            required:true,               
        },
        exp_month: 
        {
            required:true,               
        },
      },

      messages: 
      { 
        candidate_name: 
        {
            required:"Required Candidate Name.!!",
        },
        candidate_work_status: 
        {
            required:"Required Work Status.!!",
        },
        exp_year: 
        {
            required:"Required Year Of Experienced.!!",
        },
        exp_month: 
        {
            required:"Required Month Of Experienced.!!",
        },
        
      },
});

});