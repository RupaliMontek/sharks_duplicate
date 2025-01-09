<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Resume_builder extends CI_Controller
{
    public function __construct()
    {
        if (!ini_get("date.timezone")) {
            date_default_timezone_set("GMT");
        }
        parent::__construct();
        include_once APPPATH . "libraries/oauth/http.php";
        include_once APPPATH . "libraries/oauth/oauth_client.php";
        $this->load->library('Mpdf_library');
        $this->load->model('M_Candidate_profile');
        $this->load->model('user/m_admin_user');
    }
    
    public function template1()
    {
        $candidate_id =$_SESSION['candidate_id'];
    $candidate_id =$_SESSION['candidate_id'];
    // print_r($candidate_id); die();  
    $data["companies"]=$this->M_Candidate_profile->get_all_companies();
    $data["cities"]=$this->M_Candidate_profile->all_cities(); 
    $data["departments"]=$this->M_Candidate_profile->get_all_department();
    $data["educations"]=$this->M_Candidate_profile->get_all_education();
    $data["candidate_white_paper_journal_entry"]=$this->M_Candidate_profile->get_candidate_white_paper_journal_entry($candidate_id);
    $data['current_employment_details'] = $this->M_Candidate_profile->check_current_employment_fill($candidate_id); 
    if(!empty($data['current_employment_details']))
    {
        $month = $data['current_employment_details']->emp_joining_month;
        $currentYear = date('Y');
        $currentMonth = date('n');
        $startYear = $data['current_employment_details']->emp_joining_year;
        if($month=="Jan")
        {
                $startMonth  =1;
        }
        elseif($month=="Feb")
        {
            $startMonth =2;
        }
        elseif($month=="Mar")
        {
            $startMonth =3;
        }
        elseif($month=="Apr")
        {
            $startMonth =4;
        }
        elseif($month=="May")
        {
                $startMonth =5;
        }
        elseif($month=="Jun")
        {
            $startMonth =6;
        }
        elseif($month=="Jul")
        {
            $startMonth =7;
        }
        elseif($month=="Aug")
        {
              $startMonth =8;
        }
        elseif($month=="Sep")
        {
            $startMonth =9;
        }
        elseif($month=="Oct")
        {
            $startMonth =10;
        }
        elseif($month=="Nov")
        {
            $startMonth =11;
        }
        elseif($month=="Dec")
        {
            $startMonth =12;
        }
        $totalMonths = (($currentYear - $startYear) * 12) + ($currentMonth - $startMonth);
        $data["totalYears"]=$totalYears = floor($totalMonths / 12);
        $data["remainingMonths"]=$remainingMonths = $totalMonths % 12;    }
        $data['user_details']=$this->M_Candidate_profile->get_candidate_details($candidate_id);
        $data['employment_details'] = $this->M_Candidate_profile->check_employment_fill($candidate_id);
        $data['employment_details'] = $this->M_Candidate_profile->check_employment_fill($candidate_id);	
        $data['education_de'] = $this->M_Candidate_profile->check_education_fill($candidate_id);
        $data['education_employemnt'] = $this->M_Candidate_profile->get_employment_candidate($candidate_id);
        $data['candidate_skil'] = $this->M_Candidate_profile->check_candidate_skills_fill($candidate_id);
        $data['career_pro'] = $this->M_Candidate_profile->check_candidate_career_profile_fill($candidate_id);
        $data['personal_det'] = $this->M_Candidate_profile->check_candidate_personal_candidate_fill($candidate_id);
        $data["candidate_educations"]= $this->M_Candidate_profile->get_candidate_education_by_candidate($candidate_id); 
        $data['candidate_ids']=$candidate_id;
        $data['candidate_skils'] = $this->M_Candidate_profile->candidate_skills_fill($candidate_id);
        $data['career_profile']= $this->M_Candidate_profile->get_record_by_carrer($candidate_id);
        $data['citiesandstates'] = $this->M_Candidate_profile->get_all_cities_states();
        $data['employement_details']= $this->M_Candidate_profile->get_employment_details($candidate_id);
        $data['course']=$this->M_Candidate_profile->get_all_course_list();
        $data["main_courses"]=$this->M_Candidate_profile->get_all_main_course_list();
        $data['education_details']=$this->M_Candidate_profile->get_all_education_details($candidate_id);
        $data["candidate_project"] = $this->M_Candidate_profile->get_candidate_project_details($candidate_id);
        $data['user_details']=$this->M_Candidate_profile->get_candidate_details($candidate_id);
        $data['it_skills'] = $this->M_Candidate_profile->getCandidate_it_skills_details($candidate_id);
        $data['know_language'] = $this->M_Candidate_profile->getCandidate_know_languages_details($candidate_id);
        $data['personal_details'] = $this->M_Candidate_profile->getCandidate_personal_details($candidate_id);
        $data['social_platform'] = $this->M_Candidate_profile->get_social_platform($candidate_id);
        $data['work_samples'] = $this->M_Candidate_profile->get_work_samples($candidate_id);
        $data['certifications'] = $this->M_Candidate_profile->get_certifications($candidate_id);
        $data['profile_summary'] = $this->M_Candidate_profile->get_candidate_profile_summary($candidate_id);
        $data['candidate_presentation'] = $this->M_Candidate_profile->get_candidate_presentation($candidate_id);
        $data['patent_details'] = $this->M_Candidate_profile->get_candidate_patent_details($candidate_id);      
        $data['resume_headline'] = $this->M_Candidate_profile->get_candidate_resume_headline_details($candidate_id);
        $data['last_employment'] = $this->M_Candidate_profile->get_letest_employment_by_candidate_id($candidate_id);
        $data["client_list"] = $this->M_Candidate_profile->client_list_job();
        $data['profile_summary'] = $this->M_Candidate_profile->get_candidate_profile_summary($candidate_id);
        $this->load->view("resume_template/reusme_template/template1/index",$data);
    }
    
    public function template1_convert_pdf()
    {
        $candidate_id =$_SESSION['candidate_id'];
        $data['user_details']=$this->M_Candidate_profile->get_candidate_details($candidate_id);
        $data['education_details']=$this->M_Candidate_profile->get_all_education_details($candidate_id);
        $data['personal_details'] = $this->M_Candidate_profile->getCandidate_personal_details($candidate_id);
        $data['employement_details']= $this->M_Candidate_profile->get_employment_details($candidate_id);
        $data['profile_summary'] = $this->M_Candidate_profile->get_candidate_profile_summary($candidate_id);
        $data['candidate_skils'] = $this->M_Candidate_profile->candidate_skills_fill($candidate_id);
        $html = $this->load->view('resume_template/reusme_template/template1/pdf_template', $data, TRUE);
        $css_file_path = FCPATH . 'frontend/css/resume_builder/template2/style.css'; 
        $this->mpdf_library->createPdf($html, 'resume.pdf',$css_file_path);
    }
    
    public function template2()
    {
        $candidate_id =$_SESSION['candidate_id'];
    $candidate_id =$_SESSION['candidate_id'];
    // print_r($candidate_id); die();  
    $data["companies"]=$this->M_Candidate_profile->get_all_companies();
    $data["cities"]=$this->M_Candidate_profile->all_cities(); 
    $data["departments"]=$this->M_Candidate_profile->get_all_department();
    $data["educations"]=$this->M_Candidate_profile->get_all_education();
    $data["candidate_white_paper_journal_entry"]=$this->M_Candidate_profile->get_candidate_white_paper_journal_entry($candidate_id);
    $data['current_employment_details'] = $this->M_Candidate_profile->check_current_employment_fill($candidate_id); 
    if(!empty($data['current_employment_details']))
    {
        $month = $data['current_employment_details']->emp_joining_month;
        $currentYear = date('Y');
        $currentMonth = date('n');
        $startYear = $data['current_employment_details']->emp_joining_year;
        if($month=="Jan")
        {
                $startMonth  =1;
        }
        elseif($month=="Feb")
        {
            $startMonth =2;
        }
        elseif($month=="Mar")
        {
            $startMonth =3;
        }
        elseif($month=="Apr")
        {
            $startMonth =4;
        }
        elseif($month=="May")
        {
                $startMonth =5;
        }
        elseif($month=="Jun")
        {
            $startMonth =6;
        }
        elseif($month=="Jul")
        {
            $startMonth =7;
        }
        elseif($month=="Aug")
        {
              $startMonth =8;
        }
        elseif($month=="Sep")
        {
            $startMonth =9;
        }
        elseif($month=="Oct")
        {
            $startMonth =10;
        }
        elseif($month=="Nov")
        {
            $startMonth =11;
        }
        elseif($month=="Dec")
        {
            $startMonth =12;
        }
        $totalMonths = (($currentYear - $startYear) * 12) + ($currentMonth - $startMonth);
        $data["totalYears"]=$totalYears = floor($totalMonths / 12);
        $data["remainingMonths"]=$remainingMonths = $totalMonths % 12;    }
        $data['user_details']=$this->M_Candidate_profile->get_candidate_details($candidate_id);
        $data['employment_details'] = $this->M_Candidate_profile->check_employment_fill($candidate_id);
        $data['employment_details'] = $this->M_Candidate_profile->check_employment_fill($candidate_id);	
        $data['education_de'] = $this->M_Candidate_profile->check_education_fill($candidate_id);
        $data['education_employemnt'] = $this->M_Candidate_profile->get_employment_candidate($candidate_id);
        $data['candidate_skil'] = $this->M_Candidate_profile->check_candidate_skills_fill($candidate_id);
        $data['candidate_skils'] = $this->M_Candidate_profile->candidate_skills_fill($candidate_id);
        $data['career_pro'] = $this->M_Candidate_profile->check_candidate_career_profile_fill($candidate_id);
        $data['personal_det'] = $this->M_Candidate_profile->check_candidate_personal_candidate_fill($candidate_id);
        $data["candidate_educations"]= $this->M_Candidate_profile->get_candidate_education_by_candidate($candidate_id); 
        $data['candidate_ids']=$candidate_id;
        $data['career_profile']= $this->M_Candidate_profile->get_record_by_carrer($candidate_id);
        $data['citiesandstates'] = $this->M_Candidate_profile->get_all_cities_states();
        $data['employement_details']= $this->M_Candidate_profile->get_employment_details($candidate_id);
        $data['course']=$this->M_Candidate_profile->get_all_course_list();
        $data["main_courses"]=$this->M_Candidate_profile->get_all_main_course_list();
        $data['education_details']=$this->M_Candidate_profile->get_all_education_details($candidate_id);
        $data["candidate_project"] = $this->M_Candidate_profile->get_candidate_project_details($candidate_id);
        $data['user_details']=$this->M_Candidate_profile->get_candidate_details($candidate_id);
        $data['it_skills'] = $this->M_Candidate_profile->getCandidate_it_skills_details($candidate_id);
        $data['know_language'] = $this->M_Candidate_profile->getCandidate_know_languages_details($candidate_id);
        $data['personal_details'] = $this->M_Candidate_profile->getCandidate_personal_details($candidate_id);
        $data['social_platform'] = $this->M_Candidate_profile->get_social_platform($candidate_id);
        $data['work_samples'] = $this->M_Candidate_profile->get_work_samples($candidate_id);
        $data['certifications'] = $this->M_Candidate_profile->get_certifications($candidate_id);
        $data['profile_summary'] = $this->M_Candidate_profile->get_candidate_profile_summary($candidate_id);
        $data['candidate_presentation'] = $this->M_Candidate_profile->get_candidate_presentation($candidate_id);
        $data['patent_details'] = $this->M_Candidate_profile->get_candidate_patent_details($candidate_id);      
        $data['resume_headline'] = $this->M_Candidate_profile->get_candidate_resume_headline_details($candidate_id);
        $data['last_employment'] = $this->M_Candidate_profile->get_letest_employment_by_candidate_id($candidate_id);
        $data["client_list"] = $this->M_Candidate_profile->client_list_job();
        $data['profile_summary'] = $this->M_Candidate_profile->get_candidate_profile_summary($candidate_id);
        $this->load->view("resume_template/reusme_template/template2/index",$data);
    }
    
      public function template2_convert_pdf()
    {
        $candidate_id =$_SESSION['candidate_id'];
        $data['user_details']=$this->M_Candidate_profile->get_candidate_details($candidate_id);
        $data['education_details']=$this->M_Candidate_profile->get_all_education_details($candidate_id);
        $data['personal_details'] = $this->M_Candidate_profile->getCandidate_personal_details($candidate_id);
        $data['employement_details']= $this->M_Candidate_profile->get_employment_details($candidate_id);
        $data['profile_summary'] = $this->M_Candidate_profile->get_candidate_profile_summary($candidate_id);
        $data['candidate_skils'] = $this->M_Candidate_profile->candidate_skills_fill($candidate_id);
        $html = $this->load->view('resume_template/reusme_template/template2/pdf_template', $data, TRUE);
        $css_file_path = FCPATH . 'frontend/css/resume_builder/template2/style.css'; 
        $this->mpdf_library->createPdf($html, 'resume.pdf',$css_file_path);
    }
    
    public function template3()
    {
        $candidate_id =$_SESSION['candidate_id'];
    $candidate_id =$_SESSION['candidate_id'];
    // print_r($candidate_id); die();  
    $data["companies"]=$this->M_Candidate_profile->get_all_companies();
    $data["cities"]=$this->M_Candidate_profile->all_cities(); 
    $data["departments"]=$this->M_Candidate_profile->get_all_department();
    $data["educations"]=$this->M_Candidate_profile->get_all_education();
    $data["candidate_white_paper_journal_entry"]=$this->M_Candidate_profile->get_candidate_white_paper_journal_entry($candidate_id);
    $data['current_employment_details'] = $this->M_Candidate_profile->check_current_employment_fill($candidate_id); 
    if(!empty($data['current_employment_details']))
    {
        $month = $data['current_employment_details']->emp_joining_month;
        $currentYear = date('Y');
        $currentMonth = date('n');
        $startYear = $data['current_employment_details']->emp_joining_year;
        if($month=="Jan")
        {
                $startMonth  =1;
        }
        elseif($month=="Feb")
        {
            $startMonth =2;
        }
        elseif($month=="Mar")
        {
            $startMonth =3;
        }
        elseif($month=="Apr")
        {
            $startMonth =4;
        }
        elseif($month=="May")
        {
                $startMonth =5;
        }
        elseif($month=="Jun")
        {
            $startMonth =6;
        }
        elseif($month=="Jul")
        {
            $startMonth =7;
        }
        elseif($month=="Aug")
        {
              $startMonth =8;
        }
        elseif($month=="Sep")
        {
            $startMonth =9;
        }
        elseif($month=="Oct")
        {
            $startMonth =10;
        }
        elseif($month=="Nov")
        {
            $startMonth =11;
        }
        elseif($month=="Dec")
        {
            $startMonth =12;
        }
        $totalMonths = (($currentYear - $startYear) * 12) + ($currentMonth - $startMonth);
        $data["totalYears"]=$totalYears = floor($totalMonths / 12);
        $data["remainingMonths"]=$remainingMonths = $totalMonths % 12;    }
        $data['user_details']=$this->M_Candidate_profile->get_candidate_details($candidate_id);
        $data['employment_details'] = $this->M_Candidate_profile->check_employment_fill($candidate_id);
        $data['employment_details'] = $this->M_Candidate_profile->check_employment_fill($candidate_id);	
        $data['education_de'] = $this->M_Candidate_profile->check_education_fill($candidate_id);
        $data['education_employemnt'] = $this->M_Candidate_profile->get_employment_candidate($candidate_id);
        $data['candidate_skil'] = $this->M_Candidate_profile->check_candidate_skills_fill($candidate_id);
        $data['candidate_skils'] = $this->M_Candidate_profile->candidate_skills_fill($candidate_id);
        $data['career_pro'] = $this->M_Candidate_profile->check_candidate_career_profile_fill($candidate_id);
        $data['personal_det'] = $this->M_Candidate_profile->check_candidate_personal_candidate_fill($candidate_id);
        $data["candidate_educations"]= $this->M_Candidate_profile->get_candidate_education_by_candidate($candidate_id); 
        $data['candidate_ids']=$candidate_id;
        $data['career_profile']= $this->M_Candidate_profile->get_record_by_carrer($candidate_id);
        $data['citiesandstates'] = $this->M_Candidate_profile->get_all_cities_states();
        $data['employement_details']= $this->M_Candidate_profile->get_employment_details($candidate_id);
        $data['course']=$this->M_Candidate_profile->get_all_course_list();
        $data["main_courses"]=$this->M_Candidate_profile->get_all_main_course_list();
        $data['education_details']=$this->M_Candidate_profile->get_all_education_details($candidate_id);
        $data["candidate_project"] = $this->M_Candidate_profile->get_candidate_project_details($candidate_id);
        $data['user_details']=$this->M_Candidate_profile->get_candidate_details($candidate_id);
        $data['it_skills'] = $this->M_Candidate_profile->getCandidate_it_skills_details($candidate_id);
        $data['know_language'] = $this->M_Candidate_profile->getCandidate_know_languages_details($candidate_id);
        $data['personal_details'] = $this->M_Candidate_profile->getCandidate_personal_details($candidate_id);
        $data['social_platform'] = $this->M_Candidate_profile->get_social_platform($candidate_id);
        $data['work_samples'] = $this->M_Candidate_profile->get_work_samples($candidate_id);
        $data['certifications'] = $this->M_Candidate_profile->get_certifications($candidate_id);
        $data['profile_summary'] = $this->M_Candidate_profile->get_candidate_profile_summary($candidate_id);
        $data['candidate_presentation'] = $this->M_Candidate_profile->get_candidate_presentation($candidate_id);
        $data['patent_details'] = $this->M_Candidate_profile->get_candidate_patent_details($candidate_id);      
        $data['resume_headline'] = $this->M_Candidate_profile->get_candidate_resume_headline_details($candidate_id);
        $data['last_employment'] = $this->M_Candidate_profile->get_letest_employment_by_candidate_id($candidate_id);
        $data["client_list"] = $this->M_Candidate_profile->client_list_job();
        $data['profile_summary'] = $this->M_Candidate_profile->get_candidate_profile_summary($candidate_id);
        $this->load->view("resume_template/reusme_template/template3/index",$data);
    }
    
     public function template4()
    {
        $candidate_id =$_SESSION['candidate_id'];
    $candidate_id =$_SESSION['candidate_id'];
    // print_r($candidate_id); die();  
    $data["companies"]=$this->M_Candidate_profile->get_all_companies();
    $data["cities"]=$this->M_Candidate_profile->all_cities(); 
    $data["departments"]=$this->M_Candidate_profile->get_all_department();
    $data["educations"]=$this->M_Candidate_profile->get_all_education();
    $data["candidate_white_paper_journal_entry"]=$this->M_Candidate_profile->get_candidate_white_paper_journal_entry($candidate_id);
    $data['current_employment_details'] = $this->M_Candidate_profile->check_current_employment_fill($candidate_id); 
    if(!empty($data['current_employment_details']))
    {
        $month = $data['current_employment_details']->emp_joining_month;
        $currentYear = date('Y');
        $currentMonth = date('n');
        $startYear = $data['current_employment_details']->emp_joining_year;
        if($month=="Jan")
        {
                $startMonth  =1;
        }
        elseif($month=="Feb")
        {
            $startMonth =2;
        }
        elseif($month=="Mar")
        {
            $startMonth =3;
        }
        elseif($month=="Apr")
        {
            $startMonth =4;
        }
        elseif($month=="May")
        {
                $startMonth =5;
        }
        elseif($month=="Jun")
        {
            $startMonth =6;
        }
        elseif($month=="Jul")
        {
            $startMonth =7;
        }
        elseif($month=="Aug")
        {
              $startMonth =8;
        }
        elseif($month=="Sep")
        {
            $startMonth =9;
        }
        elseif($month=="Oct")
        {
            $startMonth =10;
        }
        elseif($month=="Nov")
        {
            $startMonth =11;
        }
        elseif($month=="Dec")
        {
            $startMonth =12;
        }
        $totalMonths = (($currentYear - $startYear) * 12) + ($currentMonth - $startMonth);
        $data["totalYears"]=$totalYears = floor($totalMonths / 12);
        $data["remainingMonths"]=$remainingMonths = $totalMonths % 12;    }
        $data['user_details']=$this->M_Candidate_profile->get_candidate_details($candidate_id);
        $data['employment_details'] = $this->M_Candidate_profile->check_employment_fill($candidate_id);
        $data['employment_details'] = $this->M_Candidate_profile->check_employment_fill($candidate_id);	
        $data['education_de'] = $this->M_Candidate_profile->check_education_fill($candidate_id);
        $data['education_employemnt'] = $this->M_Candidate_profile->get_employment_candidate($candidate_id);
        $data['candidate_skil'] = $this->M_Candidate_profile->check_candidate_skills_fill($candidate_id);
        $data['candidate_skils'] = $this->M_Candidate_profile->candidate_skills_fill($candidate_id);
        $data['career_pro'] = $this->M_Candidate_profile->check_candidate_career_profile_fill($candidate_id);
        $data['personal_det'] = $this->M_Candidate_profile->check_candidate_personal_candidate_fill($candidate_id);
        $data["candidate_educations"]= $this->M_Candidate_profile->get_candidate_education_by_candidate($candidate_id); 
        $data['candidate_ids']=$candidate_id;
        $data['career_profile']= $this->M_Candidate_profile->get_record_by_carrer($candidate_id);
        $data['citiesandstates'] = $this->M_Candidate_profile->get_all_cities_states();
        $data['employement_details']= $this->M_Candidate_profile->get_employment_details($candidate_id);
        $data['course']=$this->M_Candidate_profile->get_all_course_list();
        $data["main_courses"]=$this->M_Candidate_profile->get_all_main_course_list();
        $data['education_details']=$this->M_Candidate_profile->get_all_education_details($candidate_id);
        $data["candidate_project"] = $this->M_Candidate_profile->get_candidate_project_details($candidate_id);
        $data['user_details']=$this->M_Candidate_profile->get_candidate_details($candidate_id);
        $data['it_skills'] = $this->M_Candidate_profile->getCandidate_it_skills_details($candidate_id);
        $data['know_language'] = $this->M_Candidate_profile->getCandidate_know_languages_details($candidate_id);
        $data['personal_details'] = $this->M_Candidate_profile->getCandidate_personal_details($candidate_id);
        $data['social_platform'] = $this->M_Candidate_profile->get_social_platform($candidate_id);
        $data['work_samples'] = $this->M_Candidate_profile->get_work_samples($candidate_id);
        $data['certifications'] = $this->M_Candidate_profile->get_certifications($candidate_id);
        $data['profile_summary'] = $this->M_Candidate_profile->get_candidate_profile_summary($candidate_id);
        $data['candidate_presentation'] = $this->M_Candidate_profile->get_candidate_presentation($candidate_id);
        $data['patent_details'] = $this->M_Candidate_profile->get_candidate_patent_details($candidate_id);      
        $data['resume_headline'] = $this->M_Candidate_profile->get_candidate_resume_headline_details($candidate_id);
        $data['last_employment'] = $this->M_Candidate_profile->get_letest_employment_by_candidate_id($candidate_id);
        $data["client_list"] = $this->M_Candidate_profile->client_list_job();
        $data['profile_summary'] = $this->M_Candidate_profile->get_candidate_profile_summary($candidate_id);
        $this->load->view("resume_template/reusme_template/template4/index",$data);
    }
    
    
    public function template5()
    {
        $candidate_id =$_SESSION['candidate_id'];
    $candidate_id =$_SESSION['candidate_id'];
    // print_r($candidate_id); die();  
    $data["companies"]=$this->M_Candidate_profile->get_all_companies();
    $data["cities"]=$this->M_Candidate_profile->all_cities(); 
    $data["departments"]=$this->M_Candidate_profile->get_all_department();
    $data["educations"]=$this->M_Candidate_profile->get_all_education();
    $data["candidate_white_paper_journal_entry"]=$this->M_Candidate_profile->get_candidate_white_paper_journal_entry($candidate_id);
    $data['current_employment_details'] = $this->M_Candidate_profile->check_current_employment_fill($candidate_id); 
    if(!empty($data['current_employment_details']))
    {
        $month = $data['current_employment_details']->emp_joining_month;
        $currentYear = date('Y');
        $currentMonth = date('n');
        $startYear = $data['current_employment_details']->emp_joining_year;
        if($month=="Jan")
        {
                $startMonth  =1;
        }
        elseif($month=="Feb")
        {
            $startMonth =2;
        }
        elseif($month=="Mar")
        {
            $startMonth =3;
        }
        elseif($month=="Apr")
        {
            $startMonth =4;
        }
        elseif($month=="May")
        {
                $startMonth =5;
        }
        elseif($month=="Jun")
        {
            $startMonth =6;
        }
        elseif($month=="Jul")
        {
            $startMonth =7;
        }
        elseif($month=="Aug")
        {
              $startMonth =8;
        }
        elseif($month=="Sep")
        {
            $startMonth =9;
        }
        elseif($month=="Oct")
        {
            $startMonth =10;
        }
        elseif($month=="Nov")
        {
            $startMonth =11;
        }
        elseif($month=="Dec")
        {
            $startMonth =12;
        }
        $totalMonths = (($currentYear - $startYear) * 12) + ($currentMonth - $startMonth);
        $data["totalYears"]=$totalYears = floor($totalMonths / 12);
        $data["remainingMonths"]=$remainingMonths = $totalMonths % 12;    }
        $data['user_details']=$this->M_Candidate_profile->get_candidate_details($candidate_id);
        $data['employment_details'] = $this->M_Candidate_profile->check_employment_fill($candidate_id);
        $data['employment_details'] = $this->M_Candidate_profile->check_employment_fill($candidate_id);	
        $data['education_de'] = $this->M_Candidate_profile->check_education_fill($candidate_id);
        $data['education_employemnt'] = $this->M_Candidate_profile->get_employment_candidate($candidate_id);
        $data['candidate_skil'] = $this->M_Candidate_profile->check_candidate_skills_fill($candidate_id);
        $data['candidate_skils'] = $this->M_Candidate_profile->candidate_skills_fill($candidate_id);
        $data['career_pro'] = $this->M_Candidate_profile->check_candidate_career_profile_fill($candidate_id);
        $data['personal_det'] = $this->M_Candidate_profile->check_candidate_personal_candidate_fill($candidate_id);
        $data["candidate_educations"]= $this->M_Candidate_profile->get_candidate_education_by_candidate($candidate_id); 
        $data['candidate_ids']=$candidate_id;
        $data['career_profile']= $this->M_Candidate_profile->get_record_by_carrer($candidate_id);
        $data['citiesandstates'] = $this->M_Candidate_profile->get_all_cities_states();
        $data['employement_details']= $this->M_Candidate_profile->get_employment_details($candidate_id);
        $data['course']=$this->M_Candidate_profile->get_all_course_list();
        $data["main_courses"]=$this->M_Candidate_profile->get_all_main_course_list();
        $data['education_details']=$this->M_Candidate_profile->get_all_education_details($candidate_id);
        $data["candidate_project"] = $this->M_Candidate_profile->get_candidate_project_details($candidate_id);
        $data['user_details']=$this->M_Candidate_profile->get_candidate_details($candidate_id);
        $data['it_skills'] = $this->M_Candidate_profile->getCandidate_it_skills_details($candidate_id);
        $data['know_language'] = $this->M_Candidate_profile->getCandidate_know_languages_details($candidate_id);
        $data['personal_details'] = $this->M_Candidate_profile->getCandidate_personal_details($candidate_id);
        $data['social_platform'] = $this->M_Candidate_profile->get_social_platform($candidate_id);
        $data['work_samples'] = $this->M_Candidate_profile->get_work_samples($candidate_id);
        $data['certifications'] = $this->M_Candidate_profile->get_certifications($candidate_id);
        $data['profile_summary'] = $this->M_Candidate_profile->get_candidate_profile_summary($candidate_id);
        $data['candidate_presentation'] = $this->M_Candidate_profile->get_candidate_presentation($candidate_id);
        $data['patent_details'] = $this->M_Candidate_profile->get_candidate_patent_details($candidate_id);      
        $data['resume_headline'] = $this->M_Candidate_profile->get_candidate_resume_headline_details($candidate_id);
        $data['last_employment'] = $this->M_Candidate_profile->get_letest_employment_by_candidate_id($candidate_id);
        $data["client_list"] = $this->M_Candidate_profile->client_list_job();
        $data['profile_summary'] = $this->M_Candidate_profile->get_candidate_profile_summary($candidate_id);
        $this->load->view("resume_template/reusme_template/template5/index",$data);
    }
    
    public function template6()
    {
        $candidate_id =$_SESSION['candidate_id'];
    $candidate_id =$_SESSION['candidate_id'];
    // print_r($candidate_id); die();  
    $data["companies"]=$this->M_Candidate_profile->get_all_companies();
    $data["cities"]=$this->M_Candidate_profile->all_cities(); 
    $data["departments"]=$this->M_Candidate_profile->get_all_department();
    $data["educations"]=$this->M_Candidate_profile->get_all_education();
    $data["candidate_white_paper_journal_entry"]=$this->M_Candidate_profile->get_candidate_white_paper_journal_entry($candidate_id);
    $data['current_employment_details'] = $this->M_Candidate_profile->check_current_employment_fill($candidate_id); 
    if(!empty($data['current_employment_details']))
    {
        $month = $data['current_employment_details']->emp_joining_month;
        $currentYear = date('Y');
        $currentMonth = date('n');
        $startYear = $data['current_employment_details']->emp_joining_year;
        if($month=="Jan")
        {
                $startMonth  =1;
        }
        elseif($month=="Feb")
        {
            $startMonth =2;
        }
        elseif($month=="Mar")
        {
            $startMonth =3;
        }
        elseif($month=="Apr")
        {
            $startMonth =4;
        }
        elseif($month=="May")
        {
                $startMonth =5;
        }
        elseif($month=="Jun")
        {
            $startMonth =6;
        }
        elseif($month=="Jul")
        {
            $startMonth =7;
        }
        elseif($month=="Aug")
        {
              $startMonth =8;
        }
        elseif($month=="Sep")
        {
            $startMonth =9;
        }
        elseif($month=="Oct")
        {
            $startMonth =10;
        }
        elseif($month=="Nov")
        {
            $startMonth =11;
        }
        elseif($month=="Dec")
        {
            $startMonth =12;
        }
        $totalMonths = (($currentYear - $startYear) * 12) + ($currentMonth - $startMonth);
        $data["totalYears"]=$totalYears = floor($totalMonths / 12);
        $data["remainingMonths"]=$remainingMonths = $totalMonths % 12;    }
        $data['user_details']=$this->M_Candidate_profile->get_candidate_details($candidate_id);
        $data['employment_details'] = $this->M_Candidate_profile->check_employment_fill($candidate_id);
        $data['employment_details'] = $this->M_Candidate_profile->check_employment_fill($candidate_id);	
        $data['education_de'] = $this->M_Candidate_profile->check_education_fill($candidate_id);
        $data['education_employemnt'] = $this->M_Candidate_profile->get_employment_candidate($candidate_id);
        $data['candidate_skil'] = $this->M_Candidate_profile->check_candidate_skills_fill($candidate_id);
        $data['candidate_skils'] = $this->M_Candidate_profile->candidate_skills_fill($candidate_id);
        $data['career_pro'] = $this->M_Candidate_profile->check_candidate_career_profile_fill($candidate_id);
        $data['personal_det'] = $this->M_Candidate_profile->check_candidate_personal_candidate_fill($candidate_id);
        $data["candidate_educations"]= $this->M_Candidate_profile->get_candidate_education_by_candidate($candidate_id); 
        $data['candidate_ids']=$candidate_id;
        $data['career_profile']= $this->M_Candidate_profile->get_record_by_carrer($candidate_id);
        $data['citiesandstates'] = $this->M_Candidate_profile->get_all_cities_states();
        $data['employement_details']= $this->M_Candidate_profile->get_employment_details($candidate_id);
        $data['course']=$this->M_Candidate_profile->get_all_course_list();
        $data["main_courses"]=$this->M_Candidate_profile->get_all_main_course_list();
        $data['education_details']=$this->M_Candidate_profile->get_all_education_details($candidate_id);
        $data["candidate_project"] = $this->M_Candidate_profile->get_candidate_project_details($candidate_id);
        $data['user_details']=$this->M_Candidate_profile->get_candidate_details($candidate_id);
        $data['it_skills'] = $this->M_Candidate_profile->getCandidate_it_skills_details($candidate_id);
        $data['know_language'] = $this->M_Candidate_profile->getCandidate_know_languages_details($candidate_id);
        $data['personal_details'] = $this->M_Candidate_profile->getCandidate_personal_details($candidate_id);
        $data['social_platform'] = $this->M_Candidate_profile->get_social_platform($candidate_id);
        $data['work_samples'] = $this->M_Candidate_profile->get_work_samples($candidate_id);
        $data['certifications'] = $this->M_Candidate_profile->get_certifications($candidate_id);
        $data['profile_summary'] = $this->M_Candidate_profile->get_candidate_profile_summary($candidate_id);
        $data['candidate_presentation'] = $this->M_Candidate_profile->get_candidate_presentation($candidate_id);
        $data['patent_details'] = $this->M_Candidate_profile->get_candidate_patent_details($candidate_id);      
        $data['resume_headline'] = $this->M_Candidate_profile->get_candidate_resume_headline_details($candidate_id);
        $data['last_employment'] = $this->M_Candidate_profile->get_letest_employment_by_candidate_id($candidate_id);
        $data["client_list"] = $this->M_Candidate_profile->client_list_job();
        $data['profile_summary'] = $this->M_Candidate_profile->get_candidate_profile_summary($candidate_id);
        $this->load->view("resume_template/reusme_template/template6/index",$data);
    }
    
    
    
    public function createPdf($html, $filename = 'document.pdf')
    {
        $this->mpdf->WriteHTML($html);
        $this->mpdf->Output($filename, 'D'); // 'D' for download, 'I' for inline display
    }
    

    
  
    
}
?>