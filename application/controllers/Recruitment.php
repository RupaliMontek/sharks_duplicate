<?php
defined("BASEPATH") or exit("No direct script access allowed");
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
class Recruitment extends CI_Controller
{
    public $m_admin_user;
    public $m_blog;
    public $M_blog;
    public $m_recruiter;
    public $M_Candidate_profile;
    public $M_Candidate_profile_login;
    public $m_dailyreport;
    public $modelbasic;
    public $commen_model;
    public $M_permission;
     
    // public $m_admin_user;
    public function __construct()
    {
        if (!ini_get("date.timezone")) {
            date_default_timezone_set("GMT");
        }
        @parent::__construct();
        $this->load->library('email');
        $this->load->database();
       // require_once APPPATH.'third_party/src/Google_Client.php';
    //	require_once APPPATH.'third_party/src/contrib/Google_Oauth2Service.php';
    //    require_once APPPATH . 'third_party/google-api-php-client/vendor/autoload.php';
      include_once APPPATH . "libraries/oauth/http.php";
      include_once APPPATH . "libraries/oauth/oauth_client.php";
    
    
      /*include_once APPPATH . "libraries/google-api-php-client-master/src/Google/autoload.php";
		include_once APPPATH . "libraries/google-api-php-client-master/src/Google/Client.php";
		include_once APPPATH . "libraries/google-api-php-client-master/src/Google/Service/Oauth2.php";*/
		
        $this->load->model('user/m_admin_user');
        $this->load->model("blog/m_blog");
        $this->load->model('model/blog/M_blog', 'M_blog');

        $this->load->model("recruiter/m_recruiter");
        $this->load->model("M_Candidate_profile");
        $this->load->model("M_Candidate_profile_login");
		$this->load->model('dailyreport/m_dailyreport');
		$this->load->model('modelbasic');
		$this->load->model('commen_model');
		$this->load->helper(array('form', 'url'));
		$this->load->helper('download');
		$this->load->model('permission/M_permission');
		$this->load->library('upload');
    }
    
    public function loginlinkedin(){
        
        //$this->load->view("recruiter/candidate_header", @$data);
    $this->load->view("recruiter/loginlinkedin", @$data);
   // $this->load->view("recruiter/candidate_footer");
    }
    public function edit_candidate_basic_details()
    {
        $candidate_id = $_SESSION["candidate_id"];
        $data['candidate_ids']=$candidate_id;
        $data["companies"]=$this->M_Candidate_profile->get_all_companies();
        $data["cities"]=$this->M_Candidate_profile->all_cities(); 
        $data["departments"]=$this->M_Candidate_profile->get_all_department();
        $data["educations"]=$this->M_Candidate_profile->get_all_education();
        $data["candidate_white_paper_journal_entry"]=$this->M_Candidate_profile->get_candidate_white_paper_journal_entry($candidate_id);         $data['user_details']=$this->M_Candidate_profile->get_candidate_details($candidate_id);
	    $data['current_employment_details'] = $this->M_Candidate_profile->check_current_employment_fill($candidate_id);	
	    if(!empty( $data['current_employment_details']))
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
        $data["remainingMonths"]=$remainingMonths = $totalMonths % 12;
        }
	    $data['education_de'] = $this->M_Candidate_profile->check_education_fill($candidate_id);
	    $data['education_employemnt'] = $this->M_Candidate_profile->get_employment_candidate($candidate_id);
	    $data['candidate_skil'] = $this->M_Candidate_profile->check_candidate_skills_fill($candidate_id);
	    $data['candidate_skils'] = $this->M_Candidate_profile->candidate_skills_fill($candidate_id);
	    $data['career_pro'] = $this->M_Candidate_profile->check_candidate_career_profile_fill($candidate_id);
	    $data['personal_det'] = $this->M_Candidate_profile->check_candidate_personal_candidate_fill($candidate_id);
	    $data["candidate_educations"]= $this->M_Candidate_profile->get_candidate_education_by_candidate($candidate_id);	
	    $data['career_profile']= $this->M_Candidate_profile->get_record_by_carrer($candidate_id);
	    $data['citiesandstates'] = $this->M_Candidate_profile->get_all_cities_states();
	    $data['employement_details']= $this->M_Candidate_profile->get_employment_details($candidate_id);
	    $data['course']=$this->M_Candidate_profile->get_all_course_list();
	    $data["main_courses"]=$this->M_Candidate_profile->get_all_main_course_list();
	    $data['education_details']=$this->M_Candidate_profile->get_all_education_details($candidate_id);
        $data['user_details']=$this->M_Candidate_profile->get_candidate_details($candidate_id);
	    $data['list_city'] = @$this->modelbasic->get_entity_data();
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
        $this->load->view("recruiter/edit_candidate_basic_details",@$data);
    }
    

    
    public function save_candidate_basic_details()
    {
        $post = $this->input->post();
        $candidate_id = $_SESSION["candidate_id"];
        if(!empty($post["candidate_name"] && $post["candidate_work_status"] && $post["mobile_no"] && $post["exp_year"] && $post["exp_month"] && $post["total_annual_salary"]))
        {
            $data= array
            (
                "name"                    => $post["candidate_name"],
                "candidate_work_status"   => $post["candidate_work_status"],
                "contact"                 => $post["mobile_no"],
                "exp_year"                => $post["exp_year"],
                "exp_month"               => $post["exp_month"],
                "emp_current_salary"      => $post["total_annual_salary"]
            );
            $result = $this->M_Candidate_profile->update_candidate_details($candidate_id,$data);    
        }
        
        if(!empty(@$post["current_employment_id"] &&$post["total_annual_salary"]))
        {
            $data= array
            (
                "total_exp_year"      => $post["exp_year"],
                "total_exp_month"     => $post["exp_month"],
                "emp_notice_period"   => $post["emp_notice_period"],
                "emp_current_salary"  => $post["total_annual_salary"]
            );
            $result = $this->M_Candidate_profile->update_employment_details($post["current_employment_id"] ,$data);  
        }
        
        if (@$result) 
        {
            $this->session->set_flashdata("success","Candidate Update Basic Details Sucessfully");
        } 
        else 
        {
            $this->session->set_flashdata("error", "Something went wrong.!");
        }
        redirect("candidate_profile/fill_candidate_profile");
        
    }
    public function blog()
{
    $db_name1 = "sharksjob_backend";
    $this->db->query("use " .$db_name1. "");
        
    $data['blog'] = $this->M_blog->list_all_blog();
    $data['recent_blogs'] = $this->M_blog->list_recent_blogs(4);
    $data['recent_2_blogs'] = $this->M_blog->list_recent_2_blogs(2);
    $this->load->view("recruiter/candidate_header");
    $this->load->view("recruiter/blog", $data);
    $this->load->view("recruiter/candidate_footer");
}
    
    // public function blog()
    // {
    //     $data['blog'] =  $this->M_blog->list_all_blog($data);
    //     // $data['blog'] = $this->M_blog->list_all_blog();
    //     $this->load->view("recruiter/candidate_header");
    //     $this->load->view("recruiter/blog"); 
    //     $this->load->view("recruiter/candidate_footer");
    // }
    
    public function blog_details($blog_url)
{
    $db_name1 = "sharksjob_backend";$this->db->query("use " . $db_name1 . "");
    $currentUrl = current_url();
    $c=explode("/",$currentUrl);
    $data['blogs_meta']=$this->M_blog->get_blog_by_title_url($c[6]);  
    
    $data['blog'] = $this->M_blog->get_blog_by_url($blog_url);
    $data['recent_blogs'] = $this->M_blog->list_recent_blogs(4);
    $data['is_blog_details_page'] = true; 
    $data['blogs'] = $this->M_blog->list_blog();
    $this->load->view("recruiter/candidate_header", $data);
    $this->load->view("recruiter/blog_details", $data); 
    $this->load->view("recruiter/candidate_footer"); 
}

    
    public function privacy_policy()
    {
        $db_name1 = "sharksjob_backend";
        $this->db->query("use " .$db_name1. "");
	    $data['recent_blogs'] = $this->M_blog->list_recent_blogs(4);
        $this->load->view("recruiter/candidate_header");
        $this->load->view("recruiter/privacy_policy"); 
        $this->load->view("recruiter/candidate_footer", @$data);
    }
    
    public function resume_builder()
    {
        $db_name1 = "sharksjob_backend";
        $this->db->query("use " .$db_name1. "");
	    $data['recent_blogs'] = $this->M_blog->list_recent_blogs(4);
        $this->load->view("recruiter/candidate_header");
        $this->load->view("recruiter/resume_builder"); 
        $this->load->view("recruiter/candidate_footer", @$data);
    }
     
     public function beware_of_fraud()
    {
        $db_name1 = "sharksjob_backend";
        $this->db->query("use " .$db_name1. "");
	    $data['recent_blogs'] = $this->M_blog->list_recent_blogs(4);
        $this->load->view("recruiter/candidate_header");
        $this->load->view("recruiter/beware_of_fraud"); 
        $this->load->view("recruiter/candidate_footer", @$data);
    }
    
    public function terms_and_conditions()
    {
        $db_name1 = "sharksjob_backend";
        $this->db->query("use " .$db_name1. "");
        $data['recent_blogs'] = $this->M_blog->list_recent_blogs(4);
        
        $this->load->view("recruiter/candidate_header");
        $this->load->view("recruiter/terms_and_conditions");
        $this->load->view("recruiter/candidate_footer", @$data);
    }
    
    public function resume_test()
    {
        $db_name1 = "sharksjob_backend";
        $this->db->query("use " .$db_name1. "");
	    $data['recent_blogs'] = $this->M_blog->list_recent_blogs(4);
        $this->load->view("recruiter/candidate_header");
        $this->load->view("recruiter/resume_test");
        $this->load->view("recruiter/candidate_footer", @$data);
    }
    
    public function employer_dashboard()
    {
        $db_name1 = "sharksjob_backend";
        $this->db->query("use " .$db_name1. "");
	    $data['recent_blogs'] = $this->M_blog->list_recent_blogs(4);
        $this->load->view("recruiter/employer_header"); 
        $this->load->view("recruiter/employer_dashboard");
        $this->load->view("recruiter/employer_footer", @$data);
    }
    
    public function employer_candidate()
    {
        $db_name1 = "sharksjob_backend";
        $this->db->query("use " .$db_name1. "");
	    $data['recent_blogs'] = $this->M_blog->list_recent_blogs(4);
        $this->load->view("recruiter/employer_header"); 
        $this->load->view("recruiter/employer_candidate");
        $this->load->view("recruiter/employer_footer", @$data);
    }
    
    public function employer_company()
    {
        $db_name1 = "sharksjob_backend";
        $this->db->query("use " .$db_name1. "");
	    $data['recent_blogs'] = $this->M_blog->list_recent_blogs(4);
        $this->load->view("recruiter/employer_header"); 
        $this->load->view("recruiter/employer_company");
        $this->load->view("recruiter/employer_footer", @$data);
    }
    
    public function employer_candidate_profile()
    {
        $db_name1 = "sharksjob_backend";
        $this->db->query("use " .$db_name1. "");
	    $data['recent_blogs'] = $this->M_blog->list_recent_blogs(4);
        $this->load->view("recruiter/employer_header"); 
        $this->load->view("recruiter/employer_candidate_profile");
        $this->load->view("recruiter/employer_footer", @$data);
    }
    
    public function error_404()
    {
        $db_name1 = "sharksjob_backend";
        $this->db->query("use " .$db_name1. "");
	    $data['recent_blogs'] = $this->M_blog->list_recent_blogs(4);
        $this->load->view("recruiter/employer_header"); 
        $this->load->view("recruiter/error_404");
        $this->load->view("recruiter/employer_footer", @$data);
    }
    
    public function page_404()
    {
        $db_name1 = "sharksjob_backend";
        $this->db->query("use " .$db_name1. "");
	    $data['recent_blogs'] = $this->M_blog->list_recent_blogs(4);
        $this->load->view("recruiter/candidate_header", @$data);
        $this->load->view("recruiter/page_404");
        $this->load->view("recruiter/candidate_footer", @$data);
    }
    
     public function contact_us()
    { 
        $db_name1 = "sharksjob_backend";
        $this->db->query("use " .$db_name1. "");
	    $data['recent_blogs'] = $this->M_blog->list_recent_blogs(4);
        $this->load->view("recruiter/candidate_header", @$data);
        $this->load->view("recruiter/contact_us");
        $this->load->view("recruiter/candidate_footer", @$data);
    }
    
    public function save_candidate_project_details()
    {
        $post = $this->input->post();
        $candidate_id = $_SESSION["candidate_id"];
        $data= array
        (
           "candidate_id"           =>      $candidate_id,
           "project_title"          =>      @$post["project_title"],
           "employment_education"   =>      @$post["education_employemnt"],
           "client"                 =>      @$post["client_name"],
           "project_status"         =>      @$post["project_status"],
           "worked_from_year"       =>      @$post["worked_from_year"],
           "worked_from_month"      =>      @$post["worked_from_month"],
           "worked_till_year"       =>      @$post["worked_till_year"],
           "worked_till_month"      =>      @$post["worked_till_month"],
           "details_project"        =>      @$post["project_details"],
           "project_location"       =>      @$post["project_location"],
           "project_site"           =>      @$post["project_site"],
           "nature_employment"      =>      @$post["nature_employment"],
           "team_size"              =>      @$post["team_size"],
           "role"                   =>      @$post["role"],
           "role_description"       =>      @$post["role_description"],
           "skill_used"             =>      @$post["skill_used"],
           "created_at"             =>      date("Y-m-d")
        );
        $result = $this->M_Candidate_profile->save_candidate_project_details($data);
        $data= array
        (
         "last_update_profile_date" => date("d-m-Y h:i:s"),   
        );
        $last_update_profile_update_date =  $this->M_Candidate_profile->update_candidate_details($candidate_id,$data);
        if ($result) {
            $this->session->set_flashdata("success","Candidate Project Details Added Sucessfully");
        } else {
            $this->session->set_flashdata("error", "Something went wrong.!");
        }
        redirect("candidate_profile/fill_candidate_profile");
        
    }
    
  public function update_candidate_project_details()
    {
        $post = $this->input->post();
        $candidate_id = $_SESSION["candidate_id"];
        $candidate_project_id  =$post["candidate_project_id"];
        $data= array
        (
           "candidate_id"           =>      $candidate_id,
           "project_title"          =>      @$post["project_title"],
           "employment_education"   =>      @$post["education_employemnt"],
           "client"                 =>      @$post["client_name"],
           "project_status"         =>      @$post["project_status"],
           "worked_from_year"       =>      @$post["worked_from_year"],
           "worked_from_month"      =>      @$post["worked_from_month"],
           "worked_till_year"       =>      @$post["worked_till_year"],
           "worked_till_month"      =>      @$post["worked_till_month"],
           "details_project"        =>      @$post["project_details"],
           "project_location"       =>      @$post["project_location"],
           "project_site"           =>      @$post["project_site"],
           "nature_employment"      =>      @$post["nature_employment"],
           "team_size"              =>      @$post["team_size"],
           "role"                   =>      @$post["role"],
           "role_description"       =>      @$post["role_description"],
           "skill_used"             =>      @$post["skill_used"],
           "created_at"             =>      date("Y-m-d")
        );
        $result = $this->M_Candidate_profile->update_candidate_project_details($candidate_project_id,$data);
        $data= array
        (
         "last_update_profile_date" => date("d-m-Y h:i:s"),   
        );
        $last_update_profile_update_date =  $this->M_Candidate_profile->update_candidate_details($candidate_id,$data);
        if ($result) {
            $this->session->set_flashdata("success","Candidate Project Details Update Sucessfully");
        } else {
            $this->session->set_flashdata("error", "Something went wrong.!");
        }
        redirect("candidate_profile/fill_candidate_profile");
        
    }
    
    public function edit_project_candidate_details()
    {
        $post = $this->input->post();
        $candidate_id = $_SESSION["candidate_id"];
        $data["candidate_project_id"] = $candidate_project_id = $post["candidate_project_id"];
        $data['employement_details']= $this->M_Candidate_profile->get_employment_details($candidate_id);
        $data['education_details']=$this->M_Candidate_profile->get_all_education_details($candidate_id);
        $data['education_employemnt'] = $this->M_Candidate_profile->get_employment_candidate($candidate_id);
        
        $data["project_details"] = $this->M_Candidate_profile->get_project_details_by_candidate_project_id($candidate_project_id);
        $this->load->view("recruiter/edit_candidate_project",$data);
    }

public function candidate_job_apply()
{
    $post = $this->input->post();
    
    // Retrieve job_id from the post request
    $job_id = $post["job_id"];
    
    // Check if candidate_id is available in the session
    $candidate_id = isset($_SESSION["candidate_id"]) ? $_SESSION["candidate_id"] : null;
    
    if (!empty($candidate_id)) 
    {
        // Check if the candidate has already applied for the job
        $check_result = $this->M_Candidate_profile->check_user_job_apply_or_not($job_id, $candidate_id);
        
        if (empty($check_result)) 
        {
            // Prepare data for inserting a new job application
            $data = [
                "candidate_id" => $candidate_id,
                "job_id" => $job_id,
                "created_at" => date("Y-m-d H:i:s"),
            ];
            
            // Insert the new application into the database
            $result = $this->M_Candidate_profile->insert_job_candidate($data);
            
            // Retrieve the recruiter's email using the job_id
            $user_email = $this->M_Candidate_profile->getEmailByJobId($job_id);
            
            // Only send the email if a valid email is found
            if ($user_email) 
            {
                $link = base_url("Job_post/recruiter_registration");
                $subject = 'Check Applications';
                $message = " <div style='font-family: Arial, sans-serif; padding: 20px; background-color: #f9f9f9;'>
                <div style='max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border: 1px solid #dddddd; border-radius: 8px;'>
                    <h2 style='color: #333333; text-align: center;'>Check Applications</h2>
                    <p style='color: #555555; line-height: 1.6;'>
                        We are excited to inform you that a new candidate has applied for the job position listed on your dashboard.
                        To review the application details and manage the candidate's status, please click the following link:
                    </p>
                    <div style='text-align: center; margin: 20px 0;'>
                        <a href='$link' style='background-color: #007bff; color: #ffffff; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block; font-size: 16px;'>Check Applications</a>
                    </div>
                    <p style='color: #555555; line-height: 1.6;'>
                        If you have any questions, feel free to contact our support team.
                    </p>
                    <hr style='border: none; border-top: 1px solid #eeeeee; margin: 20px 0;'>
                    <p style='font-size: 12px; color: #999999; text-align: center;'>
                        This is an automated message, please do not reply to this email.
                    </p>
                </div>
            </div>";
                
                // Send email notification
                $this->send_password_mail($message, $user_email, $subject);
            }
            
            // Return the status of the job application insertion
            if ($result) 
            {
                echo json_encode(["status" => "true"]);
            } 
            else 
            {
                echo json_encode(["status" => "false"]);
            }
        } 
        else 
        {
            echo json_encode(["status" => "already-applied"]);
        }
    } 
    else 
    {
        echo json_encode(["status" => "not-login"]);
    }
}

public function send_password_mail($message, $email_id, $subject)
{
    $this->load->database();
    
    $query = $this->db->get_where('smtp_user_password', ['id' => 3]);
    $smtp_credentials = $query->row();
// print_r($smtp_credentials); die();
    if (!$smtp_credentials) {
        throw new Exception("SMTP credentials not found in the database for ID: 1");
    }
    $this->load->library("email");
    
    // Email configuration
    $config["smtp_host"] = "mail.sharksjob.com";  // Corrected the SMTP host to match the provided details
    $config["smtp_port"] = 465;  // Correct port for SSL is 465
    $config["smtp_user"] = $smtp_credentials->smtp_user;  // Using username from DB
    $config["smtp_pass"] = $smtp_credentials->smtp_pass;  // Using password from DB
    $config["smtp_crypto"] = "ssl";  // Changed to SSL as you provided port 465, which is typically for SSL
    $config["mailtype"] = "html";
    $config["protocol"] = "smtp";
    $config["send_multipart"] = false;
    $config["smtp_timeout"] = 60;
    $config["charset"] = "utf-8"; 
    $config["newline"] = "\r\n"; 
    $config["crlf"] = "\r\n";

    $from = "Sharks Job";
    $this->email->initialize($config);

    // Set email details
    $this->email->from("$smtp_credentials->smtp_user", $from);
    $this->email->to($email_id);
    $this->email->subject($subject);
    $this->email->message($message);

    // Send email and return result
    $result = $this->email->send();
    $this->email->clear();

    return $result;
}
    
public function save_resume_headline()
{
        $candidate_id = $_SESSION["candidate_id"];
        $data= array
        ( 
            "candidate_id"     => $candidate_id,
            "resume_headline"  => $this->input->post("resume_headline"),
            "created_at"       => date("Y-m-d h:i:s")
        );
        $result = $this->M_Candidate_profile->insert_candidate_resume_headline($data);
        $data= array
        (
         "last_update_profile_date" => date("d-m-Y h:i:s"),   
        );
        $last_update_profile_update_date =  $this->M_Candidate_profile->update_candidate_details($candidate_id,$data);
        if ($result) {
            $this->session->set_flashdata("success","Resume Headline Added Sucessfully");
        } else {
            $this->session->set_flashdata("error", "Something went wrong.!");
        }
        redirect("candidate_profile/fill_candidate_profile");
        
}
    public function save_candidate_key_skills()
    {
        $post = $this->input->post();
        $candidate_skills = $post['candidate_skills'];
        $candidate_id = $this->session->userdata["candidate_id"];
        $user_details= $this->M_Candidate_profile->get_user_details_by_id_admin($candidate_id);
        $email = $user_details->email;
        $data = array
        (
          "skills"         => $candidate_skills,
          "candidate_id"   => $candidate_id,
          "created_at"     => date("Y-m-d h:i:s"), 
        );
        $para = array
        (
            "position_skills" => $candidate_skills
         );
        $profile_update = $this->M_Candidate_profile->update_profile($email,$para);
        $result = $this->M_Candidate_profile->save_candidate_skills($data);
          $data= array
        (
         "last_update_profile_date" => date("d-m-Y h:i:s"),   
        );
        $last_update_profile_update_date =  $this->M_Candidate_profile->update_candidate_details($candidate_id,$data);
        if ($result) {
            $this->session->set_flashdata("success","Skills Added Sucessfully");
        } else {
            $this->session->set_flashdata("error", "Something went wrong.!");
        }
        redirect("candidate_profile/fill_candidate_profile");
    }
    
    
public function update_candidate_key_skills()
    {
        $post = $this->input->post();
        $candidate_id = $this->session->userdata["candidate_id"];
        $user_details= $this->M_Candidate_profile->get_user_details_by_id_admin($candidate_id);
        $email = $user_details->email;
        //$candidate_id = $post["candidate_id"];
        $skills = $post["skill"];
        $skillss = implode(",",$post["skill"]);
        $from_date = $post["from_date"];
        $to_date   = $post["to_date"];
        $skill_count = count($skills);
        $delete_candidate_skill_entrys = $this->M_Candidate_profile->delete_candidate_key_skills($candidate_id);
        if($skill_count>0)
        {
            for($i=0;$i<$skill_count;$i++)
            {
                $data = array
                (
                  "skills"         => $skills[$i],
                  "candidate_id"   => $candidate_id,
                  "from_date"      => $from_date[$i],
                  "to_date"        => $to_date[$i],
                  "created_at"     => date("Y-m-d h:i:s"), 
                );
                $result = $this->M_Candidate_profile->save_candidate_skills($data);
            }
        }
        $para = array
        (
            "position_skills" => $skillss
        );
        $profile_update = $this->M_Candidate_profile->update_profile($email,$para);
        $data= array
        (
         "last_update_profile_date" => date("d-m-Y h:i:s"),   
        );
        $last_update_profile_update_date =  $this->M_Candidate_profile->update_candidate_details($candidate_id,$data);
        if ($result) {
            $this->session->set_flashdata("success","Skills Update Sucessfully");
        } else {
            $this->session->set_flashdata("error", "Something went wrong.!");
        }
        redirect("candidate_profile/fill_candidate_profile");
    }
    
    public function edit_candidate_key_skills()
    {
        $candidate_id = $this->session->userdata["candidate_id"];
        $post = $this->input->post();
        $data["candidate_id"]=$candidate_id = $post["candidate_id"];
        $data["canidate_skill"] = $this->M_Candidate_profile->get_candidate_skills($candidate_id);
        $this->load->view("recruiter/edit_skills",$data);
    }
// old code
    // public function update_resume()
    // {
    //     $candidate_id = $this->session->userdata["candidate_id"];
    //     $user_details= $this->M_Candidate_profile->get_user_details_by_id_admin($candidate_id);
        
    //     $email = $user_details->email;
    //     $resume = $this->input->post("resume_candidate");
    //     print_r($resume); exit;
    //     if(!empty($_FILES["resumes_upload"]["name"]))
    //     {
    //     $config["upload_path"] = "./uploads/resume/";
    //     $config["allowed_types"] = "pdf|doc|docx";
    //     $config["max_size"] = "0";
    //     $config["max_width"] = "0";
    //     $config["max_height"] = "0";
    //     $this->upload->initialize($config);
    //     $new_resume_path = '/home/msuite/public_html/uploads/resume/';
    //     $file_name = "resumes_upload";
    //     $resume = $this->transfer_resume($_FILES["resumes_upload"],$config,$new_resume_path,$file_name);
    //     }
    //     $data = 
    //     [
    //         "resume" => $resume,
    //         "updated_at" => date("d-m-Y")
    //     ];
    //      $result = $this->M_Candidate_profile->update_candidate_details(
    //         $candidate_id,
    //         $data
    //     );
        
    //     $para = array
    //     (
    //         "resume"  => $resume
    //     );
    //     $data= array
    //     (
    //      "last_update_profile_date" => date("d-m-Y h:i:s"),   
    //     );
    //     $last_update_profile_update_date =  $this->M_Candidate_profile->update_candidate_details($candidate_id,$data);
    //     $update_job_profile = $this->M_Candidate_profile->update_profile($email,$para);
    //     if ($result) 
    //     {
    //         $this->session->set_flashdata(
    //             "success",
    //             "update Sucessfully Resume"
    //         );
    //     } else {
    //         $this->session->set_flashdata("error", "Record Update Resume!");
    //     }
    //     redirect("candidate_profile/fill_candidate_profile");
    // }
    public function update_resume()
    {
        $candidate_id = $this->session->userdata["candidate_id"];
        $user_details = $this->M_Candidate_profile->get_user_details_by_id_admin($candidate_id);
        $email = $user_details->email;
    
        if (!empty($_FILES["resumes_upload"]["name"])) {
            $config["upload_path"] = "./uploads/resume/";
            $config["allowed_types"] = "pdf|doc|docx";
            $config["max_size"] = "0";
            $this->upload->initialize($config);
    
            if (!$this->upload->do_upload("resumes_upload")) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata("error", "Resume upload failed: $error");
                redirect("candidate_profile/fill_candidate_profile");
            } else {
                $resume_data = $this->upload->data();
                $resume = $resume_data["file_name"];
            }
        }
    
        $data = [
            "resume" => $resume,
            "updated_at" => date("Y-m-d H:i:s"),
        ];
        $result = $this->M_Candidate_profile->update_candidate_details($candidate_id, $data);
    
        if ($result) {
            $this->session->set_flashdata("success", "Resume updated successfully!");
        } else {
            $this->session->set_flashdata("error", "Failed to update resume!");
        }
        redirect("candidate_profile/fill_candidate_profile");
    }
    

public function index(){
    $client = new oauth_client_class();
    
    // $client->debug = false;
    // $client->debug_http = true;
    // $client->redirect_uri = 'https://sharksjob.com/candidate_profile';
    // $client->server = "LinkedIn";
    // $client->client_id = '77cz8its40qbx6';
    // $client->client_secret = 'NkWpRZuSTkR3mgqT';
   // $client->scope = SCOPE;
    
    if (($success = $client->Initialize())) {
        if (($success = $client->Process())) {
            if (strlen($client->authorization_error)) {
                $client->error = $client->authorization_error;
                $success = false;
            } elseif (strlen($client->access_token)) {
                $success = $client->CallAPI('http://api.linkedin.com/v1/people/~:(id,email-address,first-name,last-name,picture-url,public-profile-url,formatted-name)', 'GET', array(
                    'format' => 'json'
                ), array(
                    'FailOnAccessError' => true
                ), $user);
            }
        }
        $success = $client->Finalize($success);
        $_SESSION["member_id"] = @$user->id;
    }
    if ($client->exit) {
        exit();
    }
    if ($success) {
        // Do your code with the Linkedin Data
    } else {
        $error = $client->error;
    }
    
// $clientId = '414668068375-3e5l5lbsgnmd2ihb6goofttrg18vm22r.apps.googleusercontent.com'; //Google client ID
// 		$clientSecret = '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'; //Google client secret
// 		$redirectURL = 'https://sharksjob.com/candidate_profile';
		
// 		$client_id = $clientId;
// 		$client_secret = $clientSecret;
// 		$redirect_uri =$redirectURL;
// 		$simple_api_key = 'AIzaSyBdUkTw5HhCDHMTJNzUI0o14NDeSBajldQ';

		
		/*$client = new Google_Client();
		$client->setApplicationName("PHP Google OAuth Login Example");
		$client->setClientId($client_id);
		$client->setClientSecret($client_secret);
		$client->setRedirectUri($redirect_uri);
		$client->setDeveloperKey($simple_api_key);
		$client->addScope("https://www.googleapis.com/auth/userinfo.email");

	
		$objOAuthService = new Google_Service_Oauth2($client);

		
		if (isset($_GET['code'])) 
		{
			$client->authenticate($_GET['code']);
			$_SESSION['access_token'] = $client->getAccessToken();
			header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
		}

		
		if (isset($_SESSION['access_token']) && $_SESSION['access_token']) 
		{
			$client->setAccessToken($_SESSION['access_token']);
		}

		
		if ($client->getAccessToken()) 
		{
			$userData = $objOAuthService->userinfo->get();
			$data['userData'] = $userData;
			$_SESSION['access_token'] = $client->getAccessToken();
		} 
		else 
		{
			$authUrl = $client->createAuthUrl();
			$data['authUrl'] = $authUrl;
		}*/
		$data['list_event'] =$this->m_admin_user->getall_holiday();
		$data["client_list"] = $this->M_Candidate_profile->client_list_job();
	    $db_name1 = "sharksjob_backend";
        $this->db->query("use " .$db_name1. "");
	    $data['recent_blogs'] = $this->M_blog->list_recent_blogs(4);	
	 	
     //   $data['google_login_url']=$this->google->get_login_url();
        $this->load->view("recruiter/candidate_header", @$data);
        $this->load->view("recruiter/candidate_dashboard_home", @$data);
        $this->load->view("recruiter/candidate_footer", @$data);
        
        }
//     public function index_old()
//     {
        
//          // Redirect to profile page if the user already logged in 
//         if($this->session->userdata('candidate_id') == true){ 
//             redirect('Candidate_profile'); 
//         } 
        
//             	$gClient = new Google_Client();
        
//        //$client = new Google\Client();
//         //api key ="AIzaSyBdUkTw5HhCDHMTJNzUI0o14NDeSBajldQ";
//         // Set client credentials
// //$client->setClientId('414668068375-3e5l5lbsgnmd2ihb6goofttrg18vm22r.apps.googleusercontent.com');
// //$client->setClientSecret('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');
// //$client->setRedirectUri('https://sharksjob.com/candidate_profile');
//        $clientId = '414668068375-3e5l5lbsgnmd2ihb6goofttrg18vm22r.apps.googleusercontent.com'; //Google client ID
// 		$clientSecret = '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'; //Google client secret
// 		$redirectURL = 'https://sharksjob.com/candidate_profile';
		
// 		//https://curl.haxx.se/docs/caextract.html

// 		//Call Google API
// 		$gClient = new Google_Client();
// 		$gClient->setApplicationName('Login');
// 		$gClient->setClientId($clientId);
// 		$gClient->setClientSecret($clientSecret);
// 		$gClient->setRedirectUri($redirectURL);
// 		$google_oauthV2 = new Google_Oauth2Service($gClient);
// if(isset($_GET['code']))
// 		{
// 			$gClient->authenticate($_GET['code']);
// 			$_SESSION['token'] = $gClient->getAccessToken();
// 			header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
// 		}

// 		if (isset($_SESSION['token'])) 
// 		{
// 			$gClient->setAccessToken($_SESSION['token']);
// 		}
		
// 		if ($gClient->getAccessToken()) {
//             $userProfile = $google_oauthV2->userinfo->get();
// 			echo "<pre>";
// 			print_r($userProfile);
// 			die;
//         } 
// 		else 
// 		{
//             $url = $gClient->createAuthUrl();
// 		    header("Location: $url");
//             exit;
//         }
//         /*$code= $this->session->set_userdata('access_token', $client->getAccessToken());

//         if (@$this->session->set_userdata('access_token')) {
//             //$token = $client->fetchAccessTokenWithAuthCode($_GET["code"]);
//             $token = $client->getAccessToken();
//             //$client->setAccessToken($token["access_token"]);
//                 $client->setAccessToken($token);

//             $google_oauth = new Google_Service_Oauth2($client);
//             $google_account_info = $google_oauth->userinfo->get();
//             $email = $google_account_info->email;
//             $name = $google_account_info->name;
//             $verified_status = $google_account_info->verifiedEmail;
//             $this->check_user_login_check_candidate($email,$name,$verified_status);
//         } else {
//             $data["login_google"] = $client->createAuthUrl();
//         }
        
//         $data['list_event'] =$this->m_admin_user->getall_holiday();	
//         $data['google_login_url']=$this->google->get_login_url();
//         $data["client_list"] = $this->M_Candidate_profile->client_list_job();
//         $this->load->view("recruiter/candidate_header", @$data);
//         $this->load->view("recruiter/candidate_dashboard_home", @$data);
//         $this->load->view("recruiter/candidate_footer", @$data);*/
//     }

//     public function all_jobs()
//     {
//         $data['recent_blogs'] = $this->M_blog->list_recent_blogs(4);
//         $data["job_latest"] = $this->M_Candidate_profile->all_jobs();
//         // print_r($data["job_latest"]);exit;
//         $data["departments"]=$this->M_Candidate_profile->get_all_department();
//         $data["educations"]=$this->M_Candidate_profile->get_all_education();
//         $data["companies"]=$this->M_Candidate_profile->get_all_companies();
//         $data["cities"]=$this->M_Candidate_profile->all_cities();
//         $data["jobs_by_location"] = $this->M_Candidate_profile->get_jobs_count_by_location();
//         $data["get_Profiles_Count"] = $this->M_Candidate_profile->getAllProfilesWithCount();
//         $data["get_location_Count"] = $this->M_Candidate_profile->getAllLocationWithCount();
//         $data["get_education_Count"] = $this->M_Candidate_profile->getAllEducationWithCount();
//         $data["get_department_Count"] = $this->M_Candidate_profile->getAllDepartmentWithCount();
//         $data["get_work_mode_Count"] = $this->M_Candidate_profile->getAllWorkModeWithCount();
//         $data["get_salary_Count"] = $this->M_Candidate_profile->getAllSalaryWithCount();
//         $work_mode = $this->input->get('work_mode');
//         $skills = $this->input->get('skills');
//         $post = $this->input->post();       
        
//         $location_id  =   @$post['joblocationid'];
//         $search       =   @$post["job-title"];
//         $experience   =   @$post["experience"];
//         $location     =   @$post["job-location"];
//         $pin_code     =   @$post["pin_code"];
//         // $skills       =   @$post["skills"];

//         $data["job_latest"] = $this->M_Candidate_profile->search_job($search, $experience, $location_id, $pin_code, $skills, $work_mode);
//         // print_r($data["job_latest"]); die();
//         // $data["companies"]=$this->M_Candidate_profile->get_all_companies();
//         // $data["cities"]=$this->M_Candidate_profile->all_cities(); 
//         // $data["departments"]=$this->M_Candidate_profile->get_all_department();
//         // $data["educations"]=$this->M_Candidate_profile->get_all_education();
//         $data["internship"]=$this->M_Candidate_profile->get_all_internship();
//         $data["jobs_by_location"] = $this->M_Candidate_profile->get_jobs_count_by_location();
//         $location_ids = [2763, 2707, 48315, 3659];
    
//         $data["jobs_by_location"] = $this->M_Candidate_profile->get_jobs_count_by_job_location_ids($location_ids);
// // print_r($data["jobs_by_location"]); die();   
//         $data["location_names"] = [
//             2763 => "Pune",
//             2707 => "Mumbai",
//             48315 => "Bangalore",
//             3659 => "Chennai"
//         ];

//         $db_name1 = "sharksjob_backend";
//         $this->db->query("use " .$db_name1. "");
// 	    $data['recent_blogs'] = $this->M_blog->list_recent_blogs(4);
//         $this->load->view("recruiter/candidate_inner_pages_header");
//         $this->load->view("recruiter/candidate_job_search_filter", $data);
//         $this->load->view("recruiter/candidate_footer", $data);
//     }

    public function get_job_post_company($company_id)
    {
        $data["job_latest"] = $this->M_Candidate_profile->get_job_post_company($company_id);        
         $data["companies"]=$this->M_Candidate_profile->get_all_companies();
         $data["cities"]=$this->M_Candidate_profile->all_cities(); 
         $data["departments"]=$this->M_Candidate_profile->get_all_department();
         $data["educations"]=$this->M_Candidate_profile->get_all_education();
         $db_name1 = "sharksjob_backend";
        $this->db->query("use " .$db_name1. "");
	    $data['recent_blogs'] = $this->M_blog->list_recent_blogs(4);
        $this->load->view("recruiter/candidate_inner_pages_header");
        $this->load->view("recruiter/candidate_job_search_filter", $data);
        $this->load->view("recruiter/candidate_footer", $data);

    }

    public function get_hs_codes_by_like()
    {
        $post = $this->input->post();

        $hscode = $this->input->post("cth");
        $url =
            "http://api.indiatrademanagement.com/Hscode_list_by_suggestion/" .
            $post["hscode"];
        $ch = curl_init($url);
        $headers = [];
        $headers[] = "X-CSRF-Token: 'XO6AHeRRTzhTn5K9pTx77MjNuOgLpi1YKJOxrRUz'";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $output = curl_exec($ch);
        if (!empty($output)) {
            if ($output != "Please enter valid hscode") {
                $info = array_column(json_decode($output), "HSCode");
                echo json_encode(["status" => "success", "details" => $info]);
            } else {
                echo json_encode(["status" => "error"]);
            }
        }
    }

    public function job_filter_checkboxes()
    {
        $post = $this->input->post();
        print_r($post);
        die();
    }

   public function search_job()
{
    if ($this->input->post()) {
        $post        =   $this->input->post();       
        $location_id =   @$post['joblocationid'];
        $search      =   @$post["job-title"];
        $experience  =   @$post["experience"];
        $location    =   @$post["job-location"];
        $pincode     =   @$post["pin_code"];
        $data["job_latest"] = $this->M_Candidate_profile->search_job($search,$experience,$location_id,$pincode);
        $data["companies"]=$this->M_Candidate_profile->get_all_companies();
        $data["cities"]=$this->M_Candidate_profile->all_cities(); 
        $data["departments"]=$this->M_Candidate_profile->get_all_department();
        $data["educations"]=$this->M_Candidate_profile->get_all_education();
        // Redirect after processing POST data
        redirect('recruitment/search_job', 'refresh');
    } else {
        // If it's not a POST request, load the view
        $data["companies"]=$this->M_Candidate_profile->get_all_companies();
        $data["cities"]=$this->M_Candidate_profile->all_cities(); 
        $data["departments"]=$this->M_Candidate_profile->get_all_department();
        $data["educations"]=$this->M_Candidate_profile->get_all_education();
        $db_name1 = "sharksjob_backend";
        $this->db->query("use " .$db_name1. "");
	    $data['recent_blogs'] = $this->M_blog->list_recent_blogs(4);
        $this->load->view("recruiter/candidate_inner_pages_header");
        $this->load->view("recruiter/candidate_job_search_filter", $data);
        $this->load->view("recruiter/candidate_footer", $data);
    }
}

    public function locations_filter(){
        $post=$this->input->post();
        $location=implode(",",$post['location']);
        //print_r($location);die();
        $data["job_latest"]=$this->M_Candidate_profile->get_location_filter($location);
        $data["cities"]=$this->M_Candidate_profile->all_cities(); 
        $data["educations"]=$this->M_Candidate_profile->get_all_education();
        $data["companies"]=$this->M_Candidate_profile->get_all_companies();
        $db_name1 = "sharksjob_backend";
        $this->db->query("use " .$db_name1. "");
	    $data['recent_blogs'] = $this->M_blog->list_recent_blogs(4);
        $this->load->view("recruiter/candidate_inner_pages_header");
        $this->load->view("recruiter/candidate_job_search_filter", $data);
        $this->load->view("recruiter/candidate_footer", $data);
        
    }
    public function  ajax_job_filter()
    {
      $post = $this->input->post();
     //  print_r($post); exit;
      $data["job_latest"]=$this->M_Candidate_profile->filter_all();
     //  print_r($data["job_latest"]); exit;
      $this->load->view('recruiter/candidate_job_filter',$data);
    } 
    
public function filter_company()
{
        $post=$this->input->post();
        if(!empty($post['location'])){
        $location=implode(",",$post['location']);
        //print_r($location);die();
        $data["job_latest"]=$this->M_Candidate_profile->get_location_filter($location);
       }
       $companies=implode(",",$post['companies']);
       $data["job_latest"]=$this->M_Candidate_profile->search_company_records($companies);

        $data["cities"]=$this->M_Candidate_profile->all_cities(); 
        $data["educations"]=$this->M_Candidate_profile->get_all_education();
        $data["companies"]=$this->M_Candidate_profile->get_all_companies();
        $db_name1 = "sharksjob_backend";
        $this->db->query("use " .$db_name1. "");
	    $data['recent_blogs'] = $this->M_blog->list_recent_blogs(4);
        $this->load->view("recruiter/candidate_inner_pages_header");
        $this->load->view("recruiter/candidate_job_search_filter", $data);
        $this->load->view("recruiter/candidate_footer", $data);

    }

    public function search_company_records(){
        $this->db->select("*");
        $this->db->from("client");
return  $this->db->get()->result();
    }

    public function locations_education(){
        $post=$this->input->post();

        if(!empty($post['education_filter'])){
        $education=implode(",",$post['education_filter']);
        $data["job_latest"]=$this->M_Candidate_profile->filter_education($education);
          }
        //      print_r($this->db->last_query()); die(); 

        $data["educations"]=$this->M_Candidate_profile->get_all_education();
        $data["companies"]=$this->M_Candidate_profile->get_all_companies();
        $data["departments"]=$this->M_Candidate_profile->get_all_department();
        $data["cities"]=$this->M_Candidate_profile->all_cities(); 
        $db_name1 = "sharksjob_backend";
        $this->db->query("use " .$db_name1. "");
	    $data['recent_blogs'] = $this->M_blog->list_recent_blogs(4);
        $this->load->view("recruiter/candidate_inner_pages_header");
        $this->load->view("recruiter/candidate_job_search_filter", $data);
        $this->load->view("recruiter/candidate_footer", $data);
        
    }

    public function job_description($id)
    {
        @$candidate_id = $_SESSION["candidate_id"];
        if ($candidate_id) {
            $this->M_Candidate_profile->update_visit_count($candidate_id,$id);
        }
        $data["row"] = $this->M_Candidate_profile->get_job_description($id);
        // print_r($data['visit_count']); die();
        $data["job_apply_status"] = $this->M_Candidate_profile->check_job_apply_status($id,$candidate_id);
        
        $get_details_jobprofile = $this->M_Candidate_profile->get_details_job_selected($id);
        $similiar_profile = $get_details_jobprofile->profile;
        $data["candidate_count"] = $this->M_Candidate_profile->get_candidate_count_by_job_id($id);
        //   print_r($data["candidate_count"]); die();
        $data['visit_count'] = $this->M_Candidate_profile->get_visit_count($id);
        // print_r($data["visit_count"]); die();
        $db_name1 = "sharksjob_backend";
        $this->db->query("use " .$db_name1. "");
	    $data['recent_blogs'] = $this->M_blog->list_recent_blogs(4);
        $data["similar_job"] = $this->M_Candidate_profile->check_similar_job($similiar_profile,$id);
        $this->load->view("recruiter/candidate_inner_pages_header");
        $this->load->view("recruiter/candidate_job_profile", $data);
        $this->load->view("recruiter/candidate_footer", $data);
        /*$this->load->view('recruiter/candidate_dashboard_header');
	    $this->load->view('recruiter/candidate_job_description',@$data);
	    $this->load->view('recruiter/candidate_dashboard_footer',@$data);*/
    }

    public function search_job_filter()
    {
        $post = $this->input->post();
        $data[
            "search_job"
        ] = $this->M_Candidate_profile->search_job_candidate();
       
    }

    public function get_city_states()
    {
        $postData = $this->input->post();
        $records = $this->M_Candidate_profile->check_stats_and_city();

        echo json_encode($records);
    }

    /*
	public function get_city_states(){
		$post = $this->input->post();
		$cityandstate = $this->input->post('statesandcities');
		$records=  $this->M_Candidate_profile->check_stats_and_city();

		print_r($records);
		$count=count($records);
		$data=array();
        foreach ($records as $epcg) 
        {
            $data=$epcg->name;
        }
       
		
	}	
*/
    public function create_account_candidate()
    {
        // $clientID ="414668068375-3e5l5lbsgnmd2ihb6goofttrg18vm22r.apps.googleusercontent.com";
        // $clientSecret = "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";
        // $redirectUri ="https://sharksjob.com/candidate_profile";
        // create Client Request to access Google API
        /*$client = new Google_Client();
        $client->setClientId($clientID);
        $client->setClientSecret($clientSecret);
        $client->setRedirectUri(urlencode($redirectUri));
        $client->addScope("email");
        $client->addScope("profile");
        if (@$_GET["code"]) 
        {
            $token = $client->fetchAccessTokenWithAuthCode($_GET["code"]);
            $client->setAccessToken($token["access_token"]);
            $google_oauth = new Google_Service_Oauth2($client);
            $google_account_info = $google_oauth->userinfo->get();
            $email = $google_account_info->email;
            $name = $google_account_info->name;
            $verified_status = $google_account_info->verifiedEmail;
            $this->check_user_login_check_candidate($email,$nam,$verified_status);
        } 
        else 
        {
            $data["login_google"] = $client->createAuthUrl();
            echo $data["login_google"];
        }*/
        $data["departments"] = $this->M_Candidate_profile_login->get_candidate_departments_candidate_registration();
        $db_name1 = "sharksjob_backend";
        $this->db->query("use " .$db_name1. "");
	    $data['recent_blogs'] = $this->M_blog->list_recent_blogs(4);
        $this->load->view("recruiter/candidate_header");
        $this->load->view("recruiter/create_account_candidate",$data);
        // $this->load->view("recruiter/candidate_register",$data);
        $this->load->view("recruiter/candidate_footer", $data);
    }
    
    public function view_account_candidate($email_id,$phone)
    {
        $email_id= urldecode($email_id);
        $data["candidate_details"] = $this->M_Candidate_profile_login->view_candidate_profile_by_email_and_phone($email_id,$phone);
        $db_name1 = "sharksjob_backend";
        $this->db->query("use " .$db_name1. "");
	    $data['recent_blogs'] = $this->M_blog->list_recent_blogs(4);
        $this->load->view("recruiter/candidate_header");
        $this->load->view("recruiter/view_account_candidate",@$data);
        $this->load->view("recruiter/candidate_footer", $data);
    }



    public function allready_register_account_login_here()
{

    //	$gClient = new Google_Client();
        //api key ="AIzaSyBdUkTw5HhCDHMTJNzUI0o14NDeSBajldQ";
        // Set client credentials
//$client->setClientId('414668068375-3e5l5lbsgnmd2ihb6goofttrg18vm22r.apps.googleusercontent.com');
//$client->setClientSecret('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');
//$client->setRedirectUri('https://sharksjob.com/candidate_profile');
/*
$redirectURL = base_url() . 'candidate_profile';

         $clientID = "154182362767-r9cu44aa811ijnl47rnqts63o2ktl59e.apps.googleusercontent.com";
         $clientSecret = "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";*/
        
   /* $client->setClientId($clientID);
    $client->setClientSecret($clientSecret);
    //$client->setRedirectUri($redirectUri);
    $client->setRedirectUri($redirectUri);

    $client->addScope("email");
    $client->addScope("profile");*/
    
    
// $clientId = '154182362767-r9cu44aa811ijnl47rnqts63o2ktl59e.apps.googleusercontent.com'; //Google client ID
// 		$clientSecret = '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'; //Google client secret
// 		$redirectURL = 'https://sharksjob.com/candidate_profile';
		
// 		$client_id = $clientId;
// 		$client_secret = $clientSecret;
// 		$redirect_uri =$redirectURL;
// 		$simple_api_key = 'AIzaSyBdUkTw5HhCDHMTJNzUI0o14NDeSBajldQ';

		// Create Client Request to access Google API
		/*$client = new Google_Client();
		$client->setApplicationName("PHP Google OAuth Login Example");
		$client->setClientId($client_id);
		$client->setClientSecret($client_secret);
		$client->setRedirectUri($redirect_uri);
		$client->setDeveloperKey($simple_api_key);
		$client->addScope("https://www.googleapis.com/auth/userinfo.email");
		$objOAuthService = new Google_Service_Oauth2($client);
		if (isset($_GET['code'])) 
		{
			$client->authenticate($_GET['code']);
			$_SESSION['access_token'] = $client->getAccessToken();
			header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
		}
		
		if (isset($_SESSION['access_token']) && $_SESSION['access_token']) 
		{
			$client->setAccessToken($_SESSION['access_token']);
		}
		
		if ($client->getAccessToken()) 
		{
			$userData = $objOAuthService->userinfo->get();
			$data['userData'] = $userData;
			$_SESSION['access_token'] = $client->getAccessToken();
		} 
		else 
		{
			 $authUrl = $client->createAuthUrl();
			$data['login_google'] = $authUrl;
		}*/
/*$token = $client->fetchAccessTokenWithAuthCode($_GET["code"]);
print_r($token);exit;
    if ($code=='1') { echo "hiii";
        $token = $client->fetchAccessTokenWithAuthCode($this->input->get("code"));
        $client->setAccessToken($token["access_token"]);
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
        echo$email = $google_account_info->email;
        echo $name = $google_account_info->name;
        $verified_status = $google_account_info->verifiedEmail;
        $this->check_user_login_check_candidate($email, $name, $verified_status);
        
        exit;
    } else {
        // If "code" parameter is not present, generate the Google OAuth URL
       $data["login_google"] = $client->createAuthUrl();
//echo $data["login_google"];exit;
    }
*/
    $db_name1 = "sharksjob_backend";
    $this->db->query("use " .$db_name1. "");
    $data['recent_blogs'] = $this->M_blog->list_recent_blogs(4);
    $this->load->view("recruiter/candidate_header", @$data);
    $this->load->view("recruiter/allready_register_account_login_here", @$data);
    $this->load->view("recruiter/candidate_footer");
}


    public function candidate_job_search_filter()
    {
        $db_name1 = "sharksjob_backend";
        $this->db->query("use " .$db_name1. "");
	    $data['recent_blogs'] = $this->M_blog->list_recent_blogs(4);
        $this->load->view("recruiter/candidate_inner_pages_header");
        $this->load->view("recruiter/candidate_job_search_filter");
        $this->load->view("recruiter/candidate_footer", $data);
    }

    /*
	public function job_description(){
		
		$this->load->view('recruiter/candidate_inner_pages_header');
	    $this->load->view('recruiter/candidate_job_profile');
	    $this->load->view('recruiter/candidate_footer');
	}*/

    public function candidate_registration()
    {
        $this->load->view("recruiter/candidate_registration", @$data);
    }

    public function check_user_login_check_candidate(
        $email,
        $name,
        $verified_status
    ) {
        $datas = $this->M_Candidate_profile_login->login_check_candidate_google(
            $email
        );
        //print_r($datas[0]['candidate_name']); die();
        if (!empty($datas)) {
            $name = $datas[0]["candidate_name"];
            $this->session->set_userdata(
                "candidate_id",
                $datas[0]["candidate_registration_id"]
            );
            $this->session->set_userdata("candidate_user_name", $name);
            $this->session->set_userdata("candidate_user_email", $email);
            $this->session->set_flashdata(
                "success",
                "You Have Successfully Logged in Msuite"
            );

            redirect("Candidate_profile");
        } elseif (empty($datas)) {
            $data = [
                "candidate_name" => $name,
                "candidate_email" => $email,
                "subject" => "Welcome to Msuite ",
                "status" => 1,
                "created_at" => date("Y-m-d h:i:s"),
            ];
            $result = $this->M_Candidate_profile->insert_candidate_registration(
                $data
            );
            $data = $this->M_Candidate_profile->candidte_exist_msuite($result);

            $name = $datas[0]["candidate_name"];
            $this->session->set_userdata(
                "candidate_id",
                $datas[0]["candidate_registration_id"]
            );
            $this->session->set_userdata("candidate_user_name", $name);
            $this->session->set_userdata("candidate_user_email", $mailid);

            if ($result) {
                $this->session->set_flashdata(
                    "success",
                    "Thank You For Registration Msuite!"
                );
            } else {
                $this->session->set_flashdata("error", "Record not added!");
            }
            redirect("recruitment/create_account_candidate");
        }

        //print_r($result);
        if ($result) {
            //   echo '1';
            echo json_encode([
                "status" => "true",
                "email" => $post["candidate_email"],
            ]);
            // $this->session->set_flashdata('success','Thank You For Registration Msuite!');
        } else {
            echo "0";
            // $this->session->set_flashdata('error','Record not added!');
        }
    }
    
    public function get_role_select_department()
    {
        $post = $this->input->post();
        $dept_id = $post["dept_id"];
        $role = $this->M_Candidate_profile->get_select_dept_role_dep_id($dept_id);
        echo json_encode([ "role_id" => $role,]);
    }
    
    
    /*public function transfer_resume() 
    {
        
        $this->load->library('upload');
        $config['upload_path']   = '/home/sharksjob/public_html/uploads/candidate_resume/';
        $config['allowed_types'] = 'pdf|doc|docx';
        $this->upload->initialize($config);
        if ($this->upload->do_upload('candidate_resume')) 
        {
            $data = $this->upload->data();
        } 
        else 
        {
            $error = $this->upload->display_errors();
        }
        $url = '/home/sharksjob/public_html/uploads/candidate_resume/'.trim($data['file_name']);
        file_put_contents('/home/msuite/public_html/uploads/candidate_resume/'.trim($data['file_name']), file_get_contents($url));
        unlink($url); 
    }*/
    
    
public function transfer_resume($file_array, $file_upload_config, $new_resume_path, $file_name)
{
    $this->load->library('upload');
    $timestamp = date('YmdHis');
    $file_ext = pathinfo($_FILES[$file_name]['name'], PATHINFO_EXTENSION);
    $new_file_name = $timestamp . '_' . $file_name . '.' . $file_ext;
    
    $config['upload_path'] = $file_upload_config["upload_path"];
    $config['allowed_types'] = $file_upload_config["allowed_types"];
    $config['file_name'] = $new_file_name;

    $this->upload->initialize($config);
    if ($this->upload->do_upload($file_name)) 
    {
        $data = $this->upload->data();
        $uploaded_resume_path = $config['upload_path'] . $data['file_name'];
        $new_resume_path = $new_resume_path . $data['file_name'];
        
        // Ensure the new directory is writable
        if (is_writable($new_resume_path) || @mkdir(dirname($new_resume_path), 0777, true)) {
            file_put_contents($new_resume_path, file_get_contents($uploaded_resume_path));
            unlink($uploaded_resume_path);
            $relative_path = explode('public_html/', $new_resume_path)[1];
            return $relative_path;
        } else {
            return "Error: Unable to write to the directory.";
        }
    } 
    else 
    {
        $error = $this->upload->display_errors();
        return $error; 
    }
}


    
  public function upload_file_another_cpanel()
    {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
           
           $uploadFolder = '/home/msuite/public_html/uploads/candidate_resume/';
           if (!file_exists($uploadFolder)) 
           {
               mkdir($uploadFolder, 0777, true);
           }
           $uploadedFile = $uploadFolder . basename($_FILES['candidate_resume']['name']);
           $response = $this->sendFileToDestination($uploadedFile, $_FILES['candidate_resume']['name'], $uploadFolder);
           if ($response !== false) 
           {
              http_response_code(200);
           } 
           else
           {
              http_response_code(500);
           }
        }
        else
        {
           http_response_code(405);
        }
        $db_name1 = "sharksjob_backend";
        $this->db->query("use " .$db_name1. "");
	    $data['recent_blogs'] = $this->M_blog->list_recent_blogs(4);
        $this->load->view("recruiter/candidate_inner_pages_header");
        $this->load->view("upload_form");
        $this->load->view("recruiter/candidate_footer", $data); 
    }

    public function Save_Candidate_register_old()
    {
        $post = $this->input->post();

        if (file_exists($post["previous_recording"]))
        {
            unlink($post["previous_recording"]);
        }
        $this->form_validation->set_rules('candidate_name', 'Candidate Name', 'required');
        $this->form_validation->set_rules('candidate_email', 'Candidate Email', 'required|valid_email');
        $this->form_validation->set_rules('passwords', 'Passwords', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('work_status', 'Work Status', 'required');
        if ($this->form_validation->run() == 1) {
        $email_allready_exist_check =  $this->M_Candidate_profile->check_if_email_exists($post["candidate_email"]); 
        if(empty($email_allready_exist_check)){
        
        if(!empty($_FILES['candidate_resume']['name']))
        {
           $config["upload_path"] = "./uploads/resume/";
           $config["allowed_types"] = "pdf|doc|docx|rtf";
           $config["max_size"] = "2048";
           $config["max_width"] = "0";
           $config["max_height"] = "0";
           $this->upload->initialize($config);
           $new_resume_path = './uploads/resume/';
           $file_name = "candidate_resume";
           $resume = $this->transfer_resume($_FILES["candidate_resume"],$config,$new_resume_path,$file_name);
        // print_r($resume); die();
        }
        
        if(!empty($_FILES['profile_picture']['name'])){
        if($_FILES['profile_picture']['name'])
        {
        $config["upload_path"] = "./uploads/candidate_profile_pic/";
        $config['upload_path'] = '/home/sharksjob/public_html/uploads/candidate_profile_pic/';
        $config["allowed_types"] = "jpg|jpeg|png|gif";
        $config["max_size"] = "0";
        $config["max_width"] = "0";
        $config["max_height"] = "0";
        $this->upload->initialize($config);
        $new_resume_path = '/home/msuite/public_html/uploads/candidate_profile_pic/';
        $file_name = "profile_picture";
        
        $candidate_profile_pic = $this->transfer_resume($_FILES["profile_picture"],$config,$new_resume_path,$file_name);
        }
        }
        if(!empty($_FILES['portfolio_upload']['name']))
        {
        if($_FILES['portfolio_upload']['name'])
        {
        $config["upload_path"] = "./uploads/portfolio/";
        $config["allowed_types"] = "pdf|doc|docx";
        $config["max_size"] = "0";
        $config["max_width"] = "0";
        $config["max_height"] = "0";
        $this->upload->initialize($config);
        $file_name = "portfolio_upload";
        $new_resume_path = '/home/msuite/public_html/uploads/portfolio/';
        $portfolio_upload = $this->transfer_resume($_FILES["portfolio_upload"],$config,$new_resume_path,$file_name);
        }
        }
        
        if(!empty($_FILES['experiment_doc']['name'])){
        if($_FILES['experiment_doc']['name'])
        {
        $config["upload_path"] = "./uploads/experiment_doc/";
        $config["allowed_types"] = "pdf|doc|docx";
        $config["max_size"] = "0";
        $config["max_width"] = "0";
        $config["max_height"] = "0";
        $this->upload->initialize($config);
        $new_resume_path = '/home/msuite/public_html/uploads/experiment_doc/';
        $file_name = "experiment_doc";
        $experiment_doc = $this->transfer_resume($_FILES["experiment_doc"],$config,$new_resume_path,$file_name);
        }
        }
        if(!empty($_FILES['video_introducation']['name']))
        {
        if($_FILES['video_introducation']['name'])
        {
        $config["upload_path"] = "./uploads/video_introducation/";
        $config["allowed_types"] = "mp4";
        $config["max_size"] = "0";
        $config["max_width"] = "0";
        $config["max_height"] = "0";
        $this->upload->initialize($config);
        $new_resume_path = '/home/msuite/public_html/uploads/video_introducation/';
        $file_name = "video_introducation";
        $video_introducation = $this->transfer_resume($_FILES["video_introducation"],$config,$new_resume_path,$file_name);
        }
        }
        
       
        $code = mt_rand("5000", "200000");
        $data = [
            "emp_off_id"             => $code,
            "name"                   => $post["candidate_name"],
            "email"                  => $post["candidate_email"],
            "password"               => md5($post["passwords"]),
            "contact"                => $post["phone"],
            "departments"                   => $post["departments"],
            // "subject"                => "Welcome to Msuite ",
            "camera_recording"       => $post["recordedVideo"],
            "candidate_work_status"  => $post["work_status"],
            "resume"                 => $resume,
            "image"                  => @$candidate_profile_pic,
            "status"                 => 0,
            "video_introducation"    => @$video_introducation,
            "experiment_doc"         => @$experiment_doc,
            "portfolio"              => @$portfolio_upload,
            "created_at"             => date("Y-m-d h:i:s"),
        ];
        // print_r($data);exit;
        $result = $this->M_Candidate_profile->insert_candidate_registration(
            $data
        );
        $para= array
        (
            "sheetid"               =>   "89",
            "sheetname"             =>   "Montek Internal",
            "company_client"        =>   "Montek Internal",
            "candidate_name"        =>   $post["candidate_name"],
            "contact_no"            =>   $post["phone"],
            "email_id"              =>   $post["candidate_email"],
            "resume"                =>   $resume,
            "date"                  =>   date("Y/m/d"),
            "record_added_datetime" =>   date("Y-md h:i:s"),
            
        );
        $reuslts = $this->M_Candidate_profile->insert_candidate_tbl_recruiter($para);
        if ($result) {
            //   echo '1';
            echo json_encode([
                "status" => "true",
                "email" => $post["candidate_email"],
            ]);
            // $this->session->set_flashdata('success','Thank You For Registration Msuite!');
        } else {
            echo "0";
            // $this->session->set_flashdata('error','Record not added!');
        }
        
        }
    }

}
public function Save_Candidate_register()
{
    $post = $this->input->post();
    //print_r($post);exit;
    // Check if the email already exists
    $email_allready_exist_check = $this->M_Candidate_profile->check_if_email_exists($post["candidate_email"]);
    if (!empty($email_allready_exist_check)) {
        echo json_encode(["status" => "false", "message" => "Email already exists."]);
        return;
    }

    // Validate form data
    $this->form_validation->set_rules('candidate_name', 'Candidate Name', 'required');
    $this->form_validation->set_rules('candidate_email', 'Candidate Email', 'required|valid_email');
    $this->form_validation->set_rules('passwords', 'Password', 'required');
    $this->form_validation->set_rules('phone', 'Phone', 'required');
    $this->form_validation->set_rules('work_status', 'Work Status', 'required');

    if ($this->form_validation->run() == FALSE) {
        echo json_encode(["status" => "false", "message" => validation_errors()]);
        return;
    }
if (!empty($_FILES['video']['name'])) {
            $video_path = $this->upload_video('video'); // Pass the input name
            print_r($video_path); die();
            if ($video_path) {
                $candidate_data['video_path'] = $video_path; // Save video path to the candidate data
            } else {
                $this->session->set_flashdata('error', 'Video upload failed.');
                redirect('path_to_redirect'); // Redirect with error
                return;
            }
        }

    // Prepare file upload configuration
    $upload_config = [
        'allowed_types' => 'pdf|doc|docx|jpg|jpeg|png|gif|mp4|webm',  // Include video types like mp4 and webm
        'max_size' => 2048, // 2MB
        'max_width' => 0,
        'max_height' => 0
    ];

    // Handle file uploads (generic function for multiple files)
    $uploads = [];
    $upload_fields = [
        'candidate_resume' => './uploads/resume/',
        'profile_picture' => './uploads/candidate_profile_pic/',
        'portfolio_upload' => './uploads/portfolio/',
        'experiment_doc' => './uploads/experiment_doc/',
        'video_introducation' => './uploads/video_introducation/'
    ];
    
    foreach ($upload_fields as $field_name => $upload_path) {
        if (!empty($_FILES[$field_name]['name'])) {
            $upload_config['upload_path'] = $upload_path;
            $this->upload->initialize($upload_config);

            if ($this->upload->do_upload($field_name)) {
                $upload_data = $this->upload->data();
                $uploads[$field_name] = $upload_data['file_name']; // Store file name
            } else {
                echo json_encode(["status" => "false", "message" => $this->upload->display_errors()]);
                return;
            }
        }
    }

    // Prepare candidate data
    $data = [
        "emp_off_id" => mt_rand(5000, 200000),
        "name" => $post["candidate_name"],
        "email" => $post["candidate_email"],
        "password" => md5($post["passwords"]),
        "contact" => $post["phone"],
        "dept" => $post["departments"],
        "role" => $post["role_id"],
        "camera_recording" => $post["recordedVideo"],
        "candidate_work_status" => $post["work_status"],
        "resume" => isset($uploads['candidate_resume']) ? $uploads['candidate_resume'] : null,
        "image" => isset($uploads['profile_picture']) ? $uploads['profile_picture'] : null,
        "status" => 1,  // Active status
        "video_introducation" => isset($uploads['video_introducation']) ? $uploads['video_introducation'] : null,  // Save the video
        "experiment_doc" => isset($uploads['experiment_doc']) ? $uploads['experiment_doc'] : null,
        "portfolio" => isset($uploads['portfolio_upload']) ? $uploads['portfolio_upload'] : null,
        'camera_recording'=>$post["save_record_path"],
        "created_at" => date("Y-m-d H:i:s")
    ];
    // Insert candidate data into the database
    $result = $this->M_Candidate_profile->insert_candidate_registration($data);
    $para_videos = [
        "user_id" => $result,
        
    ];
    $this->load->model('Video_model');
    $this->Video_model->update_video($para_videos,$post["save_record_id"]);
    //$this->M_Candidate_profile->insert_candidate_tbl_recruiter($para);
    // Log the data into recruiter table (if necessary)
    $para = [
        "sheetid" => mt_rand(5000, 200000),
        "sheetname" => "Shraks Job",
        "company_client" => "Sharks Job",
        "candidate_name" => $post["candidate_name"],
        "contact_no" => $post["phone"],
        "email_id" => $post["candidate_email"],
        "resume" => isset($uploads['candidate_resume']) ? $uploads['candidate_resume'] : null,
        "date" => date("Y/m/d"),
        "record_added_datetime" => date("Y-m-d H:i:s")
    ];
    $this->M_Candidate_profile->insert_candidate_tbl_recruiter($para);

    // Return success or failure response
    if ($result) {
        echo json_encode([
            "status" => "true",
            "email" => $post["candidate_email"]
        ]);
    } else {
        echo json_encode([
            "status" => "false",
            "message" => "Registration failed. Please try again."
        ]);
    }
}


public function upload() {
    $upload_dir = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . 'videos' . DIRECTORY_SEPARATOR;

    // Create the directory if it doesn't exist
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true); // Create with permissions
    }
    
    // Configure the upload settings
    $config['upload_path'] = $upload_dir;
    // $config['allowed_types'] = 'webm|mp4|avi';
    // $config['allowed_types'] = 'webm|mp4|avi|x-matroska';
    $config['allowed_types'] = '*'; 
    $config['max_size'] = 102400;  // Max size in KB (100MB)

    // Get the file extension of the uploaded file
    $file_extension = pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION);
    
    // Generate a unique file name with the original extension
    $config['file_name'] = uniqid('video_', true) . '.' . $file_extension;
    
    // Load the upload library with the new configuration
    $this->load->library('upload', $config);
    $this->upload->initialize($config);

    // Check if the file upload is successful
    // if ($this->upload->do_upload('video')) {
        $file_data = $this->upload->data();

        // Create the file path
        $file_path = base_url('uploads/videos/' . $file_data['file_name']);
        
        $video_data = [
            'file_name' => $file_data['file_name'],
            'file_path' => $file_path,
            'file_size' => $file_data['file_size'],
            'file_type' => $file_data['file_type'],
            'upload_time' => date('Y-m-d H:i:s'),
        ];
        
        // Load the model to insert the video data into the database
        $this->load->model('Video_model');
        $video_id=$this->Video_model->insert_video($video_data);
        // echo "Last Executed Query: " . $this->db->last_query();
        // exit;
        if($video_id) {
            // Send a success response
            $response = [
                'status' => 'success',
                'file_path' => $file_path,
                'message' => 'File uploaded and saved successfully.',
                'video_id' => $video_id
            ];
        } else {
            // Send an error response if saving to the database fails
            $response = [
                'status' => 'error1',
                'file_path' => '',
                'message' => 'File uploaded, but failed to save in the database.',
                'video_id' => '0'
            ];
        }
    // } 
    // else {
    //     // Send an error response if file upload fails
    //     $response = [
    //         'status' => 'error2',
    //         'file_path' => '',
    //         'message' => $this->upload->display_errors('', ''),
    //         'video_id' => '0'
    //     ];
    // }

    // Return the response as JSON
    echo json_encode($response);
}

public function get_video($id) {
    // Get the video path from the database based on the video ID
    $video_path = $this->Video_model->get_video_path($id);

    // Check if the path exists
    if ($video_path) {
        // Return the file path as JSON
        $response = [
            'status' => 'success',
            'file_path' => base_url($video_path)
        ];
        echo json_encode($response);
    } else {
        // Return an error if the video doesn't exist
        $response = [
            'status' => 'error',
            'message' => 'Video not found.'
        ];
        echo json_encode($response);
    }
}
    /*		function send_mail($message,$email,$subject_data)
	{
		$config = Array(
			'mailtype' => 'html',
			'priority' => '3',
			'charset'  => 'utf8',
			'validate'  => TRUE ,
			'newline'   => "\r\n",
			'wordwrap' => TRUE
		);
		$to = 'jaywant@montekservices.in';
		$from = 'Msuite';
		$subject = $subject_data;
		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		/*$this->email->from($email,$from);
		$this->email->to($to);
		$this->email->from("sayali@montekservices.in");
		$this->email->to("jaywant@montekservices.in");
		$this->email->subject($subject);
		$this->email->message($message);
		$result=$this->email->send();
		$this->email->clear();
		return  $result;
	}*/

    public function resend_verification_email()
    {
        $email = $this->input->post("email");
        $login_id = $this->M_Candidate_profile->get_loginid_email($email);
        $lid = $login_id[0]['user_admin_id'];
        $candidate_name = $login_id[0]["name"];
        $code = mt_rand("5000", "200000");
        $data = ["forgot_password_reset" => $code, "email_verified" => 0];
        $this->db->where("user_admin_id ", $lid);
        $this->db->update("user_admin", @$data);
        $url_activate = base_url() . "recruitment/checkemailcandidate/";
        $url =
            '<a target="_blank" href="' .
            $url_activate .
            $code .
            '">Verify Email</a>';
        $body =
            "\n Please click the following link to verify your email: \n\n" .
            $url .
            "\n\n";

        $data = [
            "email_text" => $body,
            "first_name" => $candidate_name,
            "mail_for" => "account_verification",
        ];
        $message = $this->load->view("mail/common_email", $data, true);
        $flag = $this->send_confirmation_mail(
            $message,
            $this->input->post("email"),
            "Verification email"
        );
        

        if ($flag) {
            $this->session->set_flashdata(
                "success",
                "Please check your Email to verify your email!"
            );

            redirect("recruitment/create_account_candidate");
        } else {
            $this->session->set_flashdata("error", "Email id is not verify!");
            redirect("recruitment/create_account_candidate");
        }
    }

    public function send_confirmation_mail($message, $email_id, $subject_data)
    {
        $this->load->database();
    
        $query = $this->db->get_where('smtp_user_password', ['id' => 3]);
        $smtp_credentials = $query->row();
    // print_r($smtp_credentials); die();
        if (!$smtp_credentials) {
            throw new Exception("SMTP credentials not found in the database for ID: 1");
        }
        $this->load->library("email");

            $config["smtp_host"] = "mail.sharksjob.com";  // Corrected the SMTP host to match the provided details
            $config["smtp_port"] = 465;  // Correct port for SSL is 465
            $config["smtp_user"] = $smtp_credentials->smtp_user;  // Using username from DB
            $config["smtp_pass"] = $smtp_credentials->smtp_pass;  // Using password from DB
            $config["smtp_crypto"] = "ssl";  // Changed to SSL as you provided port 465, which is typically for SSL
            $config["mailtype"] = "html";
            $config["protocol"] = "smtp";
            $config["send_multipart"] = false;
            $config["smtp_timeout"] = 60;
            $config["charset"] = "utf-8"; 
            $config["newline"] = "\r\n"; 
            $config["crlf"] = "\r\n";

        $from = "Sharks Job";
        $this->email->initialize($config);

        $this->email->from("$smtp_credentials->smtp_user", $from);
        $this->email->to($email_id);
        $this->email->subject($subject_data);
        $this->email->message($message);
        /*$this->email->send();
         echo $this->email->print_debugger(); die();*/
        $result = $this->email->send();
        $this->email->clear();
        return $result;
    }
public function progressCallback($ch, $download_size = 0, $downloaded = 0, $upload_size = 0, $uploaded = 0)
{
    static $lastCheckTime = 0;

    if ((time() - $lastCheckTime) > 4)
        if (shouldAbortDownload()) {
            return 1;
        }

        $lastCheckTime = time();
    }
   
public function sendFileToDestination($file_path, $file_name, $destination_url) {
    ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
  //  echo $file_path.'/'.$file_name.'/'.$destination_url;
    $destination_url = 'https://msuite.work/controller/save_uploaded_file';

   $curl = curl_init($destination_url);

curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_HEADER, true);

/*curl_setopt($curl, CURLOPT_POSTFIELDS, [
    'file' => new CURLFile($file_path.$file_name)
]);*/
$data= array('file_path' =>$file_path,'file_name'=>$file_name);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($curl, CURLOPT_POSTFIELDS, [
    'file' => new CURLFile($file_path.$file_name)
]);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); // Follow redirects
curl_setopt($curl, CURLOPT_HTTPHEADER, [
    'Content-Type: multipart/form-data'
]);
curl_setopt($curl, CURLOPT_PROGRESSFUNCTION, 'progressCallback');

//curl_setopt($curl, CURLOPT_TIMEOUT, 60); // Set timeout to 60 seconds

// Remove progress callback if not needed
// curl_setopt($curl, CURLOPT_PROGRESSFUNCTION, null);

$response = curl_exec($curl);
if (curl_errno($curl) === CURLE_ABORTED_BY_CALLBACK) {
    // Callback aborted
}
 $rerror = curl_error($curl);
if ($response === false) {
    echo 'cURL Error: ' . curl_error($curl);
}

curl_close($curl);
print'<pre>Curl (rec): '."\n";print_r($rerror);print'</pre>';
return $response;


   /* echo $file_path.'/'.$file_name.'/'.$destination_url;
    $curl = curl_init($destination_url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, [
        'file' => new CURLFile($file_path, '', $file_name)
    ]);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); // Follow redirects

    $response = curl_exec($curl);
    curl_close($curl);

    return $response;*/
}


    public function checkemailcandidate($code)
    {
        $result = $this->M_Candidate_profile->check_code_for_reset_password(
            $code
        );

        $data["record1"] = $this->M_Candidate_profile->getemail($code);

        if ($result == true) {
            redirect("recruitment/new_activate_acc/$code");
            //  	$data['code'] = $code;
            //  $subject_data   = "You have registered successfully in Antlogic!!!";
            // 	$message  = $this->load->view('mail/user_registration_mail',$data['record1'],true);
            // 	$flag   = $this->send_mail_to_user($message, $data['record1']->email,$subject_data);

            // 			$this->load->view('mail/new_password', $data);
        } else {
            redirect("login/invaliduser");
        }
    }

    public function new_activate_acc($code)
    {
        $data["record1"] = $this->M_Candidate_profile->getemail($code);
        $data["code"] = $code;
        // $this->db->where('email', $email);
        $this->db->where("forgot_password_reset", $data["code"]);
        $this->db->where("password!=", "");
        $this->db->set("status", "1");
        $this->db->set("email_verified", "1");
        $result1 = $this->db->update("user_admin");
        /*	print_r($this->db->last_query()); die();*/
        if ($result1) {
            $this->session->set_flashdata(
                "success",
                "Email verified successfully!"
            );
        } else {
            $this->session->set_flashdata(
                "error",
                "Something went wrong!Please try again"
            );
        }
        redirect("recruitment");
        // $this->frontview_without_sidebar('home/new_pass1',$data);
    }

    public function send_mail_to_user_contactus(
        $message,
        $email_id,
        $subject_data
    ) {
        $query = $this->db->get_where('smtp_user_password', ['id' => 3]);
        $smtp_credentials = $query->row();
        $this->load->library("email");
        $config["smtp_host"] = "smtp.gmail.com";
        $config["smtp_port"] = "587";
        // $config["smtp_user"] = "vinita@montekservices.com";
        // $config["smtp_pass"] = "VINITA_HR@18";
        $config["smtp_crypto"] = "tls"; //FIXED
        $config["protocol"] = "smtp"; //FIXED
        $config["mailtype"] = "html"; //FIXED
        $config["send_multipart"] = false;
        $from = "Sharks Job";
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from("$smtp_credentials->smtp_user", $from);
        $this->email->to($email_id);
        $this->email->subject($subject_data);
        $this->email->message($message);
        $result = $this->email->send();

        $this->email->clear();
        return $result;
    }

    function send_responce_mail($message_two, $email_id, $subject_two)
    {
        $config = [
            "mailtype" => "html",
            "priority" => "3",
            "charset" => "iso-8859-1",
            "validate" => true,
            "newline" => "\r\n",
            "wordwrap" => true,
        ];

        $to = $email_id;

        $from = "Msuite";

        $subject = $subject_two;
        $this->load->library("email");
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from("", $from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message_two);
        return $this->email->send();
    }

    public function save_candidate_employment_details()
    {
        $post = $this->input->post();
        $candidate_id = @$post["candidate_id"];
        $user_details= $this->M_Candidate_profile->get_user_details_by_id_admin($candidate_id);
        $email = $user_details->email;
        $data = [
            "candidate_id" => @$post["candidate_id"],
            "emp_employment" => @$post["candidate_employment"],
            "emp_employment_type" => @$post["candidate_enrollment"],
            "emp_perv_company_name" => @$post["candidate_pre_company"],
            "emp_perv_designation" => @$post["candidate_pre_designation"],
            "emp_current_company_name" => @$post["candidate_current_company"],
            "emp_current_desigantion" => @$post["candidate_current_designation"],
            "emp_location" => $post["candidate_intern_location"],
            "intern_candidate_department" =>
                @$post["candidate_intern_department"],
            "intern_roles_category" => $post["intern_roles_category"],
            "intern_roles" => @$post["intern_role"],
            "emp_joining_year" => @$post["candidate_join_year"],
            "emp_joining_month" => @$post["candidate_join_month"],
            "emp_work_till_year" => @$post["candidate_working_till_year"],
            "emp_work_till_month" => @$post["candidate_working_till_month"],
            "emp_current_salary_currency" =>
                @$post["candidate_Currrent_currency"],
            "emp_current_salary" => @$post["candidate_salarys"],
            "intern_candidate_currency" => @$post["candidate_stipend_currency"],
            "intern_candidate_stipend" => $post["candidate_stipend"],
            "emp_skill_used" => @$post["candidate_skill"],
            "emp_job_profile" => @$post["candidate_job_profile"],
            "intern_project_description" =>
                @$post["candidate_intern_project_discription"],
            "intern_project_link" => @$post["candidate_intern_project_link"],
            "emp_notice_period" => @$post["candidate_notice_periods"],
            "created_at" => date("Y-m-d h:i:s"),
        ];
       
       if($post["candidate_employment"]=="Yes") 
       {
           
           if(!empty($post["candidate_join_month"]) && !empty($post["candidate_join_year"]) && !empty($post["candidate_working_till_month"]) && !empty($post["candidate_working_till_year"] )){
           $experience = $this->calculateExperience(@$post["candidate_join_month"],@$post["candidate_join_year"],@$post["candidate_working_till_month"],@$post["candidate_working_till_year"]);
           $experience= number_format($experience, 2);
           }
           $para = array
           (
             "company_name"                   => @$post["candidate_current_company"],
             "yrs_of_experience"              => @$experience." Year's",
             "location"                       => @$post["candidate_intern_location"],
             "notice_period"                  => @$post["candidate_notice_periods"],
             "official_onpaper_notice_period" => @$post["candidate_notice_periods"],
             "ctc"                            => @$post["candidate_salarys"],
           );
          $profile_update = $this->M_Candidate_profile->update_profile($email,$para);
       }
        $result = $this->M_Candidate_profile->insert_employement_record($data);
          $data= array
        (
         "last_update_profile_date" => date("d-m-Y h:i:s"),   
        );
        $last_update_profile_update_date =  $this->M_Candidate_profile->update_candidate_details($candidate_id,$data);
        
        if ($result) {
            $this->session->set_flashdata(
                "success",
                "Successfully Add Employement Details"
            );
        } else {
            $this->session->set_flashdata(
                "error",
                "Something went wrong!Please try again"
            );
        }
        redirect("candidate_profile/fill_candidate_profile");
    }
    
    function calculateExperience($fromMonth, $fromYear, $toMonth, $toYear) {
    // Convert the input month and year to DateTime objects
    $startDate = new DateTime($fromYear . '-' . $fromMonth . '-01');
    $endDate = new DateTime($toYear . '-' . $toMonth . '-01');

    // Calculate the difference in years
    $interval = $startDate->diff($endDate);
    $years = $interval->y;

    // Calculate the remaining months
    $months = $interval->m;

    // Optionally, you can include the remaining months in the experience calculation
    // For example, if the difference is 2 years and 6 months, you might want to consider it as 2.5 years

    // Calculate total experience in years with decimal places for months
    $totalExperience = $years + ($months / 12);

    return $totalExperience;
}

        public function save_white_paper_research_publication()
    {
        $post = $this->input->post();
        $data = [
            "candidate_id" => @$post["candidate_id"],
            "white_paper_research_publication_title" => @$post["candidate_employment"],
            "white_paper_research_publication_url" => @$post["candidate_enrollment"],
            "white_paper_research_publication_publish_year" => @$post["candidate_pre_company"],
            "white_paper_research_publication_publish_month" => @$post["candidate_pre_designation"],
            "white_paper_research_publication_publish_dec" => @$post["candidate_current_company"],
            "created_at" => date("Y-m-d h:i:s"),
        ];

        /* print_r($data); die();*/
        $result = $this->M_Candidate_profile->insert_white_paper_research_publication($data);

        if ($result) {
            $this->session->set_flashdata(
                "success",
                "Successfully Add White Paper Research Publication Details"
            );
        } else {
            $this->session->set_flashdata(
                "error",
                "Something went wrong!Please try again"
            );
        }
        redirect("candidate_profile/fill_candidate_profile");
    }


public function save_candidate_patent_details(){
    $post =$this->input->post();
    //print_r($post); die();
    $candidate_id = $_SESSION['candidate_id'];
       $data1= [
                "candidate_id"             =>      $candidate_id,
                "patent_title"             =>      $post["patent_title"],
                "patent_url"               =>      $post["patent_url"],
                "patent_office"            =>      $post["patent_office"],
                "patent_status"            =>      $post["patent_status"],
                "application_no"           =>      $post["patent_application_no"],
                "patent_issue_date_year"   =>      $post["patent_issue_year"],
                "patent_issue_month"       =>      $post["patent_issue_month"],
                "patent_description"       =>      $post["patent_description"],
                "created_at "              =>      date("Y-m-d H:i:s"),
                  ];

        $result = $this->M_Candidate_profile->insert_candidate_patent_record($data1);
        $data= array
        (
         "last_update_profile_date" => date("d-m-Y h:i:s"),   
        );
        $last_update_profile_update_date =  $this->M_Candidate_profile->update_candidate_details($candidate_id,$data);
        if ($result) {
            $this->session->set_flashdata(
                "success",
                "Successfully Add patent Details"
            );
        } else {
            $this->session->set_flashdata(
                "error",
                "Something went wrong!Please try again"
            );
        }
        redirect("candidate_profile/fill_candidate_profile");                 
    
}

public function update_white_paper_research_publication_journal_entry()
{
    $post=$this->input->post();
    $candidate_id = $_SESSION['candidate_id'];
    $white_paper_research_publication_id  = $post["white_paper_research_publication_id"];
    $data = array
    (
       "candidate_id"=> $candidate_id,
       "white_paper_research_publication_title"          => $post["white_paper_title"],
       "white_paper_research_publication_url"            => $post["white_paper_url"],
       "white_paper_research_publication_publish_year"   => $post["white_paper_publish_year"],
       "white_paper_research_publication_publish_month"  => $post["white_paper_publish_month"],
       "white_paper_research_publication_publish_dec"    => $post["white_paper_dec"],
       "created_at"                                      => date("Y-m-d h:i:s"),
    );
    $result = $this->M_Candidate_profile->update_white_paper_research_publication_journal_candidate_entry($white_paper_research_publication_id,$data);
    $data= array
    (
       "last_update_profile_date" => date("d-m-Y h:i:s"),   
    );
    $last_update_profile_update_date =  $this->M_Candidate_profile->update_candidate_details($candidate_id,$data);
    if ($result) 
    {
        $this->session->set_flashdata("success","Successfully White Paper Research Publication Journal Entry");
    } 
    else 
    {
        $this->session->set_flashdata("error","Something went wrong!Please try again");
    }
  redirect("candidate_profile/fill_candidate_profile");                 
    
}

public function save_white_paper_research_publication_journal_entry()
{
    $post=$this->input->post();
    $candidate_id = $_SESSION['candidate_id'];
    $data = array
    (
       "candidate_id"=> $candidate_id,
       "white_paper_research_publication_title"          => $post["white_paper_title"],
       "white_paper_research_publication_url"            => $post["white_paper_url"],
       "white_paper_research_publication_publish_year"   => $post["white_paper_publish_year"],
       "white_paper_research_publication_publish_month"  => $post["white_paper_publish_month"],
       "white_paper_research_publication_publish_dec"    => $post["white_paper_dec"],
       "created_at"                                      => date("Y-m-d h:i:s"),
    );
    $result = $this->M_Candidate_profile->insert_white_paper_research_publication_journal_candidate_entry($data);
    $data= array
    (
        "last_update_profile_date" => date("d-m-Y h:i:s"),   
    );
    $last_update_profile_update_date =  $this->M_Candidate_profile->update_candidate_details($candidate_id,$data);
    if ($result) {
            $this->session->set_flashdata(
                "success",
                "Successfully White Paper Research Publication Joural Entry"
            );
        } else {
            $this->session->set_flashdata(
                "error",
                "Something went wrong!Please try again"
            );
        }
        redirect("candidate_profile/fill_candidate_profile");                 
    
}
    public function save_candidate_certificates(){
        $post=$this->input->post();
        $candidate_id = $_SESSION['candidate_id'];
        $data= [
                "candidate_id"=> $candidate_id,
                "certificate_name"=> $post["certificate_name"],
                "certification_url" => $post["certificate_url"],
                "certification_provider"=> $post["certification_provider"],
                "cerificate_validity_start_month" => $post["certificate_validity_start_month"],
                "cerificate_validity_start_year"=> $post["certificate_validity_start_year"],
                "cerificate_validity_end_month" => $post["certificate_validity_end_month"],
                "cerificate_validity_end_year"=> $post["cerificate_validity_end_year"],
                "cerificate_never_expired " =>$post["doesnot_expired"]
                  ];
                  
        $result = $this->M_Candidate_profile->insert_certification_record($data);
        $data= array
        (
         "last_update_profile_date" => date("d-m-Y h:i:s"),   
        );
        $last_update_profile_update_date =  $this->M_Candidate_profile->update_candidate_details($candidate_id,$data);
        if ($result) {
            $this->session->set_flashdata(
                "success",
                "Successfully Add Employement Details"
            );
        } else {
            $this->session->set_flashdata(
                "error",
                "Something went wrong!Please try again"
            );
        }
        redirect("candidate_profile/fill_candidate_profile");
    }
    
    
    public function update_candidate_certificates(){
        $post=$this->input->post();
        $certificate_id = $post["certificate_id"];
        $candidate_id = $_SESSION['candidate_id'];
        $data= [
                "candidate_id"=> $candidate_id,
                "certificate_name"=> $post["certificate_name"],
                "certification_url" => $post["certificate_url"],
                "certification_provider"=> $post["certification_provider"],
                "cerificate_validity_start_month" => $post["certificate_validity_start_month"],
                "cerificate_validity_start_year"=> $post["certificate_validity_start_year"],
                "cerificate_validity_end_month" => $post["certificate_validity_end_month"],
                "cerificate_validity_end_year"=> $post["cerificate_validity_end_year"],
                "cerificate_never_expired " =>$post["doesnot_expired"]
                  ];
                  
        $result = $this->M_Candidate_profile->update_certification_record($certificate_id,$data);
        $data= array
        (
           "last_update_profile_date" => date("d-m-Y h:i:s"),   
        );
        $last_update_profile_update_date =  $this->M_Candidate_profile->update_candidate_details($candidate_id,$data);
        if ($result) {
            $this->session->set_flashdata(
                "success",
                "Successfully Add Employement Details"
            );
        } else {
            $this->session->set_flashdata(
                "error",
                "Something went wrong!Please try again"
            );
        }
        redirect("candidate_profile/fill_candidate_profile");
    }
public function save_candidate_work_samples(){
    $post=$this->input->post();
    $candidate_id = $_SESSION['candidate_id'];
    //print_r($post); die(); 
    $data= [
                "candidate_id "=> $candidate_id,
                "work_title "=> $post["work_title"],
                "work_url" => $post["work_url"],
                "currently_working " => $post["currently_working"],
                "start_duration_year"=> $post["start_duration_year"],
                "start_duration_month" => $post["start_duration_month"],
                "end_duration_year"=> $post["end_duration_year"],
                "end_duration_month" => $post["end_duration_month"],
                "descriptios_work_sample" => $post["descriptios_work_sample"],
        ];
         $result = $this->M_Candidate_profile->insert_work_samples_data_candidate($data);
        $data= array
        (
         "last_update_profile_date" => date("d-m-Y h:i:s"),   
        );
        $last_update_profile_update_date =  $this->M_Candidate_profile->update_candidate_details($candidate_id,$data);
        if ($result) {
            $this->session->set_flashdata(
                "success",
                "Successfully Add Social Platforms Details"
            );
        } else {
            $this->session->set_flashdata(
                "error",
                "Something went wrong!Please try again"
            );
        }
      redirect("candidate_profile/fill_candidate_profile");
}

public function update_candidate_work_samples($work_id){
    $post=$this->input->post();
    $candidate_id = $_SESSION['candidate_id'];
    //print_r($post); die(); 
    $data= [
                "candidate_id "=> $candidate_id,
                "work_title "=> $post["work_title"],
                "work_url" => $post["work_url"],
                "currently_working " => $post["currently_working"],
                "start_duration_year"=> $post["start_duration_year"],
                "start_duration_month" => $post["start_duration_month"],
                "end_duration_year"=> $post["end_duration_year"],
                "end_duration_month" => $post["end_duration_month"],
                "descriptios_work_sample" => $post["descriptios_work_sample"],
        ];

        $result = $this->M_Candidate_profile->update_candidate_work_samples_details($work_id,$data);
        $data= array
        (
          "last_update_profile_date" => date("d-m-Y h:i:s"),   
        );
        $last_update_profile_update_date =  $this->M_Candidate_profile->update_candidate_details($candidate_id,$data);
         //print_r($this->db->last_query()); die();
        if ($result) {
            $this->session->set_flashdata(
                "success",
                "Successfully Update Social Platforms Details"
            );
        } else {
            $this->session->set_flashdata(
                "error",
                "Something went wrong!Please try again"
            );
        }
      redirect("candidate_profile/fill_candidate_profile");
}




    public function save_social_paltforms_candidate(){
        $post=$this->input->post();
        $candidate_id = $_SESSION['candidate_id'];
        
        $data= [
                "candidate_id "=> $candidate_id,
                "social_profile "=> $post["social_platform"],
                "social_platform_url" => $post["profile_url"],
                "social_profile_description" => $post["social_platform_description"],
        ];

        $result = $this->M_Candidate_profile->insert_social_platform_data_candidate($data);
        $data= array
        (
         "last_update_profile_date" => date("d-m-Y h:i:s"),   
        );
        $last_update_profile_update_date =  $this->M_Candidate_profile->update_candidate_details($candidate_id,$data);
        if ($result) {
            $this->session->set_flashdata(
                "success",
                "Successfully Add Social Platforms Details"
            );
        } else {
            $this->session->set_flashdata(
                "error",
                "Something went wrong!Please try again"
            );
        }
redirect("candidate_profile/fill_candidate_profile");
        
    }


      public function update_social_paltforms_candidate($social_id){
        $post=$this->input->post();
        $candidate_id = $_SESSION['candidate_id'];        
        $data= [
                "candidate_id "=> $candidate_id,
                "social_profile "=> $post["social_platform"],
                "social_platform_url" => $post["profile_url"],
                "social_profile_description" => $post["social_platform_description"],
        ];

        $result = $this->M_Candidate_profile->update_social_platform_data_candidate($social_id,$data);
        $data= array
        (
          "last_update_profile_date" => date("d-m-Y h:i:s"),   
        );
        $last_update_profile_update_date =  $this->M_Candidate_profile->update_candidate_details($candidate_id,$data);
        if ($result) {
            $this->session->set_flashdata(
                "success",
                "Successfully Update Social Platforms Details"
            );
        } else {
            $this->session->set_flashdata(
                "error",
                "Something went wrong!Please try again"
            );
        }
redirect("candidate_profile/fill_candidate_profile");
        
    }

    public function save_personal_details_candidate()
    {
        $post = $this->input->post();
        $candidate_id = $post["candidate_id"];
        $gender = $post["gender"];
        $married_status = $post["married_status"];
        $birth_date = $post["birth_date"];
        $birth_month = $post["birth_month"];
        $birth_year = $post["birth_year"];
        $differently_abled = $post["differently_abled"];
        $career_break = $post["career_break"];
        $permanant_addresss = $post["permanant_addresss"];
        $hometown = $post["hometown"];
        $candidate_pincode = $post["candidate_pincode"];
        $cat_candidate = $post["cast_cat"];
        $data = [
            "candidate_id" => $candidate_id,
            "gender" => $gender,
            "married_status" => $married_status,
            "birth_date" => $birth_date,
            "birth_month" => $birth_month,
            "birth_year" => $birth_year,
            "cat_candidate" => $cat_candidate,
            "differently_abled" => $differently_abled,
            "career_break" => $career_break,
            "permanent_add" => $permanant_addresss,
            "hometown" => $hometown,
            "pincode" => $candidate_pincode,
            "created_at" => date("Y-m-d H:i:s"),
        ];

        $result = $this->M_Candidate_profile->insert_tbl_personal_candidate($data);

        $languages =  @$post["language_add"];
        $lang_read =  @$post["lang_read"];
        $lang_write = @$post["lang_write"];
        $lang_speak = @$post["lang_speak"];
        $lan_proficiant = $post["lan_proficiant"];
        
        for ($i = 0; $i < count($languages); $i++) {
            $para5 = [
                "candidate_id" => $candidate_id,
                "perosnal_details_id" => @$result,
                "language" => $languages[$i],
                "read_l" => @$lang_read[$i],
                "write_l" => @$lang_write[$i],
                "speak_l" => @$lang_speak[$i],
                "proficiency" => $lan_proficiant[$i],
                "created_at" => date("Y-m-d H:i:s"),
            ];
            $result5 = $this->M_Candidate_profile->insert_personal_details_candidate_language(
                $para5
            );
        }
        $data= array
        (
         "last_update_profile_date" => date("d-m-Y h:i:s"),   
        );
        $last_update_profile_update_date =  $this->M_Candidate_profile->update_candidate_details($candidate_id,$data);
        if (@$result) {
            $this->session->set_flashdata(
                "success",
                "Successfully Add Personal Details Details"
            );
        } else {
            $this->session->set_flashdata(
                "error",
                "Something went wrong!Please try again"
            );
        }
        redirect("candidate_profile/fill_candidate_profile");
    }

    public function save_carrer_profile_candidate()
    {
        $post = $this->input->post();
        $career_desired_job_type = implode(
            ",",
            $post["career_desired_job_type"]
        );
        $candidate_id = $post["candidate_id"];
        $user_details= $this->M_Candidate_profile->get_user_details_by_id_admin($candidate_id);
        $email = $user_details->email;
        $career_employment_type = implode(",", $post["career_employment_type"]);
        $multiple_location_id = implode(",", $post["preferred_work_location"]);
        $data = [
            "employee_id" => $post["candidate_id"],
            "career_current_industry" => $post["career_current_industry"],
            "career_profile_department" => $post["career_profile_department"],
            "career_category" => $post["career_category"],
            "career_job_role" => $post["career_job_role"],
            "career_desired_job_type" => $career_desired_job_type,
            "career_employment_type" => $career_employment_type,
            "career_preferred_shift" => $post["career_preferred_shift"],
            "preferred_work_location" => $multiple_location_id,
            "expected_salary" => $post["expected_salary"],
            "created_at" => date("Y-m-d H:i:s"),
        ];
        if(!empty($multiple_location_id))
        {
            $candidate_selected_cities = $this->M_Candidate_profile->get_candidate_selected_cities($post["preferred_work_location"]);
            $preferred_locations = array();
            foreach($candidate_selected_cities as $row)
            {
                $preferred_locations[] = $row->city_name;
            }
            $preferred_location = implode(",", $preferred_locations);
            $para = array
             (
                 "preffered_location " => $preferred_location
             );
            $profile_update = $this->M_Candidate_profile->update_profile($email,$para);
        }
        
        $result = $this->M_Candidate_profile->insert_carrer_profiles($data);
        $data= array
        (
         "last_update_profile_date" => date("d-m-Y h:i:s"),   
        );
        $last_update_profile_update_date =  $this->M_Candidate_profile->update_candidate_details($candidate_id,$data);
        if ($result) {
            $this->session->set_flashdata(
                "success",
                "Successfully Add Career Profile Details"
            );
        } else {
            $this->session->set_flashdata(
                "error",
                "Something went wrong!Please try again"
            );
        }
        redirect("candidate_profile/fill_candidate_profile");
    }

    public function save_it_skills_candidate()
    {
        $post = $this->input->post();
        $candidate_id = $_SESSION['candidate_id'];       
        $data = [
            "candidate_id" => $candidate_id,
            "software_name" => $post["software_name"],
            "software_version" => $post["software_versions"],
            "last_used" => date($post["software_last_used"]),
            "exp_year" => $post["exp_year"],
            "exp_month" => $post["exp_month"],
            "cr_date" => date("Y-m-d H:i:s"),
        ];

        $result = $this->M_Candidate_profile->insert_it_skill_candidate_details(
            $data
        );
         $data= array
        (
         "last_update_profile_date" => date("d-m-Y h:i:s"),   
        );
        $last_update_profile_update_date =  $this->M_Candidate_profile->update_candidate_details($candidate_id,$data);
        if ($result) {
            $this->session->set_flashdata(
                "success",
                "Successfully Add IT Skill Details"
            );
        } else {
            $this->session->set_flashdata(
                "error",
                "Something went wrong!Please try again"
            );
        }
        redirect ('candidate_profile/fill_candidate_profile');
    }

    /* $post['candidate_id']*/

     public function delete_it_skill_details($skill_id)
    {
        // echo $skill_id;die();
        //print_r($insert_it_skill_candidate_details); die();
        $employment_id = $this->input->post("employements_id");
        $result = $this->M_Candidate_profile->delete_employment_details(
            $employment_id
        );

        if ($result == true) {
            $this->session->set_flashdata(
                "success_delete",
                "Successfully delete Employement Details"
            );
        } else {
            $this->session->set_flashdata(
                "error_delete",
                "Something went wrong!Please try again"
            );
        }
        redirect("candidate_profile/fill_candidate_profile");
    }

    public function delete_employement_details()
    {
        $employment_id = $this->input->post("employements_id");
        $result = $this->M_Candidate_profile->delete_employment_details(
            $employment_id
        );

        if ($result == true) {
            $this->session->set_flashdata(
                "success_delete",
                "Successfully delete Employement Details"
            );
        } else {
            $this->session->set_flashdata(
                "error_delete",
                "Something went wrong!Please try again"
            );
        }
        redirect("candidate_profile/fill_candidate_profile");
    }

    public function check_record_progress_bar()
    {
        $candidate_ids = $this->session->userdata["candidate_id"];
        $employment_details = $this->M_Candidate_profile->check_employment_fill(
            $candidate_ids
        );
    }

    public function delete_personal_details_candidate()
    {
        $perosnal_candidate_id = $this->input->post("deleteID");
        $candidate_id = $this->session->userdata["candidate_id"];
        $result = $this->M_Candidate_profile->delete_prsonal_details_lang($candidate_id);
        $result = $this->M_Candidate_profile->delete_prsonal_details_candidate($perosnal_candidate_id,$candidate_id);
        if ($result == true) {
            $this->session->set_flashdata(
                "success_delete",
                "Successfully delete Personal Details"
            );
        } else {
            $this->session->set_flashdata(
                "error_delete",
                "Something went wrong!Please try again"
            );
        }
        redirect("candidate_profile/fill_candidate_profile");
    }

    public function delete_employment_details()
    {
        $post = $this->input->post();
        $employment_id = $post["deleteID"];
        $result = $this->M_Candidate_profile->delete_employment_details(
            $employment_id
        );
        if ($result == true) {
            $this->session->set_flashdata(
                "success",
                "Successfully delete Employement Details"
            );
        } else {
            $this->session->set_flashdata(
                "error",
                "Something went wrong!Please try again"
            );
        }
        redirect("candidate_profile/fill_candidate_profile");
    }
    
    
    public function delete_education_details()
    {
        $post = $this->input->post();
        $deleteID = $post["deleteID"];
        $result = $this->M_Candidate_profile->delete_education_details(
            $deleteID
        );
        if ($result == true) {
            $this->session->set_flashdata(
                "success",
                "Successfully delete Education Details"
            );
        } else {
            $this->session->set_flashdata(
                "error",
                "Something went wrong!Please try again"
            );
        }
        redirect("candidate_profile/fill_candidate_profile");
    }


  public function update_resume_headline_details($resume_headline_id)
    {
        $post = $this->input->post();
        $candidate_id = $_SESSION["candidate_id"];

       $data = [
            "candidate_id" => $candidate_id,
            "resume_headline" => $post["resume_headline"],            
            "created_at" => date("Y-m-d H:i:s"),
        ];

        $result = $this->M_Candidate_profile->update_candidate_resume_headline_details(
            $resume_headline_id,
            $data
        );

         $data= array
        (
         "last_update_profile_date" => date("d-m-Y h:i:s"),   
        );
        $last_update_profile_update_date =  $this->M_Candidate_profile->update_candidate_details($candidate_id,$data);
        
        if ($result) {
            $this->session->set_flashdata(
                "success",
                "Successfully Update Resume Headline Details"
            );
        } else {
            $this->session->set_flashdata(
                "error",
                "Something went wrong!Please try again"
            );
        }
        redirect("candidate_profile/fill_candidate_profile");
    }


    public function save_candidate_resume_headline(){
        $post = $this->input->post();
        $candidate_id = $_SESSION["candidate_id"];
        
       $data = [
            "candidate_id" => $candidate_id,
            "resume_headline" => $post["resume_headline"],            
            "created_at" => date("Y-m-d H:i:s"),
        ];
        $result = $this->M_Candidate_profile->insert_candidate_resume_headline(
            $data
        );
        if ($result) {
            $this->session->set_flashdata(
                "success",
                "Successfully Add Resume Headline Details Details"
            );
        } else {
            $this->session->set_flashdata(
                "error",
                "Something went wrong!Please try again"
            );
        }
        redirect ('candidate_profile/fill_candidate_profile');
    }

    public function edit_employement_details()
    {
        $data["candidate_ids"] = $this->session->userdata["candidate_id"];
        $employment_id = $this->input->post("employements_id");
        $data[
            "result_emplpoyemnt"
        ] = $this->M_Candidate_profile->edit_employment_details($employment_id);
        $this->load->view("recruiter/employments_edit", $data);
    }
    
    public function edit_white_paper_research_publication_journal_entry()
    {
        $candidate_id = $this->session->userdata["candidate_id"];
        $data["white_paper_research_publication_id"]=$white_paper_journal_entry_id = $this->input->post("white_paper_journal_entry_id");
        $data["result_white_paper_journal"] = $this->M_Candidate_profile->edit_white_paper_research_publication_journal_entry($white_paper_journal_entry_id);
        $this->load->view("recruiter/edit_white_paper_research_publication_journal_entry", $data);
    }

        public function edit_resume_headilne_candidate_details()
    {
        $post=$this->input->post();
        $resume_hedline_id = $post["resume_hedline_id"];
        $candidate_id = $_SESSION['candidate_id'];
        $employment_id = $this->input->post("employements_id");
        $data["resume_headline"] = $this->M_Candidate_profile->edit_resume_headline_details($resume_hedline_id);
        $this->load->view("recruiter/candidate_resume_headline_edit", $data);
    }

    public function edit_education_details()
    {
        $post = $this->input->post();
        $education_id = $post["education_id"];
        $data["course"] = $this->M_Candidate_profile->get_all_course_list();
        $data["main_courses"]=$this->M_Candidate_profile->get_all_main_course_list();
        $data[
            "result_emplpoyemnt"
        ] = $this->M_Candidate_profile->edit_educations_details($education_id);

        //print_r($data['result_emplpoyemnt']); die();
        $this->load->view("recruiter/candidate_educations", $data);
    }
    
   public function delete_candidate_resume()
    {
         
        $candidate_id = $this->session->userdata["candidate_id"];
        $user_details= $this->M_Candidate_profile->get_user_details_by_id_admin($candidate_id);
        $email = $user_details->email;
        if(!empty($user_details->resume))
        {
            $file_path = "/home/msuite/public_html/".$user_details->resume;
            unlink($file_path);
        }
        $resume ="";
       
        $data = [
            "resume" => $resume,
        ];
        $result = $this->M_Candidate_profile->update_candidate_details(
            $candidate_id,
            $data
        );
        $para = array
        (
            "resume"  => $resume
        );
        $update_job_profile = $this->M_Candidate_profile->update_profile($email,$para);
        if ($result) {
            $this->session->set_flashdata(
                "success",
                "Resume Sucessfully Deleted.!!"
            );
        } else {
            $this->session->set_flashdata("error", "Something Went Wrong");
        }
        redirect("candidate_profile/fill_candidate_profile");
         
    }


public function it_skiils_delete_record(){

     $post = $this->input->post();
        $education_id = $post["skill_id"];
        $data[
            "result_it_skills"
        ] = $this->M_Candidate_profile->edit_skills_details($education_id);
        $this->load->view("recruiter/it_skills_edit", $data);
}
    public function edit_skills_details()
    {
        $post = $this->input->post();
        $education_id = $post["skill_id"];
        $data[
            "result_it_skills"
        ] = $this->M_Candidate_profile->edit_skills_details($education_id);
        $this->load->view("recruiter/it_skills_edit", $data);
    }
    
    public function delete_candidate_certificates()
    {
        $post = $this->input->post();
        $cerification_id = $post["deleteID"];
        $candidate_id = $this->session->userdata["candidate_id"];
        $result = $this->M_Candidate_profile->delete_candidate_certifications($cerification_id,$candidate_id); 
        if ($result) {
            $this->session->set_flashdata("success","Successfully Delete Certifications");
        } 
        else 
        {
            $this->session->set_flashdata("error","Something went wrong!Please try again");
        }
        redirect("candidate_profile/fill_candidate_profile");
    }
    
    
      public function delete_candidate_select_project()
    {
        $post = $this->input->post();
        $candidate_project_id = $post["deleteID"];
        $candidate_id = $this->session->userdata["candidate_id"];
        $result = $this->M_Candidate_profile->delete_candidate_select_project($candidate_project_id,$candidate_id); 
        if ($result) {
            $this->session->set_flashdata("success","Successfully Delete Project Details");
        } 
        else 
        {
            $this->session->set_flashdata("error","Something went wrong!Please try again");
        }
        redirect("candidate_profile/fill_candidate_profile");
    }
    
    
    public function delete_candidate_patent()
    {
        $post = $this->input->post();
        $patent_id = $post["deleteID"];
        $candidate_id = $this->session->userdata["candidate_id"];
        $result = $this->M_Candidate_profile->delete_candidate_patent($patent_id,$candidate_id); 
        if ($result) {
            $this->session->set_flashdata("success","Successfully Delete Patent");
        } 
        else 
        {
            $this->session->set_flashdata("error","Something went wrong!Please try again");
        }
        redirect("candidate_profile/fill_candidate_profile");
    }
    
    public function delete_confirm_work_samples_entry()
    {
        $post = $this->input->post();
        $work_id = $post["deleteID"];
        $candidate_id = $this->session->userdata["candidate_id"];
        $result = $this->M_Candidate_profile->delete_confirm_work_samples_entry($work_id,$candidate_id); 
        if ($result) 
        {
            $this->session->set_flashdata("success","Successfully Delete Work Sampple Entry");
        } 
        else 
        {
            $this->session->set_flashdata("error","Something went wrong!Please try again");
        }
        redirect("candidate_profile/fill_candidate_profile"); 
    }
    
    public function delete_social_media_candidate()
    {
        $post = $this->input->post();
        $social_platform_candidate_id = $post["deleteID"];
        $candidate_id = $this->session->userdata["candidate_id"];
        $result = $this->M_Candidate_profile->delete_social_media_candidate($social_platform_candidate_id,$candidate_id); 
        if ($result) 
        {
            $this->session->set_flashdata("success","Successfully Delete Social Media Entry");
        } 
        else 
        {
            $this->session->set_flashdata("error","Something went wrong!Please try again");
        }
        redirect("candidate_profile/fill_candidate_profile"); 
    }
    
    public function delete_white_paper_research_publication_journal_entry()
    {
        $post = $this->input->post();
        $white_paper_research_publication_id = $post["deleteID"];
        $candidate_id = $this->session->userdata["candidate_id"];
        $result = $this->M_Candidate_profile->delete_white_paper_research_publication_journal_entry($white_paper_research_publication_id,$candidate_id); 
        if ($result) 
        {
            $this->session->set_flashdata("success","Successfully Delete White Paper Research Publication Journal Entry");
        } 
        else 
        {
            $this->session->set_flashdata("error","Something went wrong!Please try again");
        }
        redirect("candidate_profile/fill_candidate_profile"); 
    }
    public function delete_candidate_presentation_details()
    {
        $post = $this->input->post();
        $presentation_id = $post["deleteID"];
        $candidate_id = $this->session->userdata["candidate_id"];
        $result = $this->M_Candidate_profile->delete_candidate_presentation_details($presentation_id,$candidate_id); 
        if ($result) {
            $this->session->set_flashdata("success","Successfully Delete Presentation");
        } 
        else 
        {
            $this->session->set_flashdata("error","Something went wrong!Please try again");
        }
        redirect("candidate_profile/fill_candidate_profile"); 
    }
    public function delete_career_details_candidate()
    {
        $post = $this->input->post();
        $carrer_profile_id = $post["deleteID"];
        $candidate_id = $this->session->userdata["candidate_id"];
        $result = $this->M_Candidate_profile->delete_carrer_profile_details($carrer_profile_id,$candidate_id); 
        if ($result) {
            $this->session->set_flashdata("success","Successfully Delete Carrer Profile Details");
        } 
        else 
        {
            $this->session->set_flashdata("error","Something went wrong!Please try again");
        }
        redirect("candidate_profile/fill_candidate_profile");
    }


    public function edit_work_candidate_details()
    {
        $post = $this->input->post();
        $work_id = $post["work_id"];
        $data[
            "work_details_candidate"
        ] = $this->M_Candidate_profile->edit_work_details($work_id);
       
        $this->load->view("recruiter/candidate_work_samples_edit", $data);
    }


    public function edit_candidate_profile_summary_details()
    {
        $post = $this->input->post();

        $profile_summary_id = $post["profile_summary_id"];
        $data[
            "profile_summary"
        ] = $this->M_Candidate_profile->get_profile_summary_candidate($profile_summary_id);

        $this->load->view("recruiter/Profile_Summery_Edit", $data);
    }

    public function edit_career_profile_details()
    {
        $post = $this->input->post();
        $data["candidate_id"] = $this->session->userdata["candidate_id"];
        $data["citiesandstates"] = $this->M_Candidate_profile->get_all_cities_states();
        $career_profile_id = $post["career_profile_id"];
        $data["career_profile"] = $this->M_Candidate_profile->edit_carrer_profile_details($career_profile_id);
        $this->load->view("recruiter/carrer_profile_edit", @$data);
    }


public function edit_online_profile_details(){

    $post = $this->input->post();
        $social_media_id = $post["social_media_id"];        
        $data[
            "social_media"
        ] = $this->M_Candidate_profile->get_online_profile_details(
            $social_media_id
        );
        $this->load->view("recruiter/social_media_candidate_edit", @$data);
    
}


    public function edit_presentation_candidate_details()
    { 
        $post = $this->input->post();
        $presentation_id = $post["presentation_id"];        
        $data[
            "career_profile"
        ] = $this->M_Candidate_profile->edit_presentation_candidate(
            $presentation_id
        );
        $this->load->view("recruiter/presentation_candidate_edit", @$data);
    }





    public function edit_patent_candidate_details()
    { 
        $post = $this->input->post();
        $patent_id = $post["patent_id"];        
        $data[
            "patent"
        ] = $this->M_Candidate_profile->edit_patent_candidate_details(
            $patent_id
        );

        $this->load->view("recruiter/candidate_patent_edit",@$data);
    }

     public function edit_certificate_candidate_details()
    { 
        $post = $this->input->post();
        $certificate_id = $post["certificate_id"];        
        $data[
            "certificates"
        ] = $this->M_Candidate_profile->edit_certificate_candidate(
            $certificate_id
        );

        
        $this->load->view("recruiter/candidate_certificate_edit", @$data);
    }

    public function edit_candidate_peronal_details_details()
    {
        $post = $this->input->post();
        $career_profile_id = $post["personal_candidate_id"];
        $candidate_id = $this->session->userdata["candidate_id"];
        $data["candidate_id"] = $candidate_id;
        $data[
            "know_language"
        ] = $this->M_Candidate_profile->getCandidate_know_languages_details(
            $candidate_id
        );
        $data[
            "personal_details"
        ] = $this->M_Candidate_profile->edit_candidate_pesonal_details(
            $career_profile_id
        );
        $this->load->view("recruiter/personal_details_edit", @$data);
    }
    
    public function compareAndStore() {
      $languages = array("Hindi", "English", "Marathi");
      $lang_reads = array(2 => "Read",1 => "Read");

// Initialize $para5 as an empty array
$para5 = array();

// Iterate through the languages array
for ($i = 0; $i < count($languages); $i++) {
    // Get the language and proficiency information
    $language = @$languages[$i];
    $read_l = @$lang_reads[$i];

    // Create keys like "read_l", "write_l", and "speak_l"
    $para5["read_l"] = $read_l; // You can modify this line for other keys

    // Add other relevant keys to $para5
    $para5["write_l"] = @$lang_writes[$i];
    $para5["speak_l"] = @$lang_speaks[$i];

    // Add other keys to $para5 as needed
    $para5["candidate_id"] = $candidate_id;
    $para5["perosnal_details_id"] = @$result;
    $para5["proficiency"] = @$lan_proficiant[$i];
    $para5["created_at"] = date("Y-m-d H:i:s");
    var_dump($para5);
}

    }

    public function update_personal_details_candidate()
    {
        $post = $this->input->post();
        $candidate_id = $this->session->userdata("candidate_id");
        $Perosnal_candidate_id = $post["Perosnal_candidate_id"];
        $gender = $post["gender"];
        $married_status = $post["married_status"];
        $birth_date = $post["birth_date"];
        $birth_month = $post["birth_month"];
        $birth_year = $post["birth_year"];
        $differently_abled = $post["differently_abled"];
        $career_break = $post["career_break"];
        $permanant_addresss = $post["permanant_addresss"];
        $hometown = $post["hometown"];
        $candidate_pincode = $post["candidate_pincode"];
        $cat_candidate = $post["cast_cat"];
        $data = [
            "candidate_id" => $candidate_id,
            "gender" => $gender,
            "married_status" => $married_status,
            "birth_date" => $birth_date,
            "birth_month" => $birth_month,
            "birth_year" => $birth_year,
            "cat_candidate" => $cat_candidate,
            "differently_abled" => $differently_abled,
            "career_break" => $career_break,
            "permanent_add" => $permanant_addresss,
            "hometown" => $hometown,
            "pincode" => $candidate_pincode,
            "created_at" => date("Y-m-d H:i:s"),
        ];

        $result = $this->M_Candidate_profile->update_personal_details_candidate(
            $Perosnal_candidate_id,
            $data
        );
    $this->M_Candidate_profile->delete_prsonal_details_lang($candidate_id);
    $languages = @$post["language_add"];
    $lang_reads = $post["lang_read"];
    $lang_write = @$post["lang_write"];
    $lang_speak = @$post["lang_speak"];
    $lan_proficiant = $post["lan_proficiant"];
    for ($i = 0; $i < count($languages); $i++) {
    // Get the language and proficiency information
    $language = @$languages[$i];
    $read_l   = @$lang_reads[$i];
    $write_l  = @$lang_write[$i];
    $speak_l  = @$lang_speak[$i];
    $para5 = 
    array(
            "candidate_id" => $candidate_id,
            "perosnal_details_id" => @$result,
            "language" => @$languages[$i],
            "read_l" => @$read_l,
            "write_l" => @$write_l,
            "speak_l" => @$speak_l,
            "proficiency" => @$lan_proficiant[$i],
            "created_at" => date("Y-m-d H:i:s"),
        );
    $result5 = $this->M_Candidate_profile->insert_personal_details_candidate_language($para5);
}
    $data= array
    (
        "last_update_profile_date" => date("d-m-Y h:i:s"),   
    );
        $last_update_profile_update_date =  $this->M_Candidate_profile->update_candidate_details($candidate_id,$data);
    if (@$result) {
            $this->session->set_flashdata(
                "success",
                "Successfully Update Carrer Profile Details"
            );
        } else {
            $this->session->set_flashdata(
                "error",
                "Something went wrong!Please try again"
            );
        }
        redirect("candidate_profile/fill_candidate_profile");

        /*$result=  $this->M_Candidate_profile->insert_tbl_personal_candidate($data);

    $languages = $post["language_add"];
    $lang_read = $post["lang_read"];
    $lang_write= $post["lang_write"];
    $lang_speak= $post["lang_speak"];
    $lan_proficiant= $post["lan_proficiant"];    

	for($i=0;$i<count($languages);$i++)
    	{	  
        	$para5 = array(
        			'candidate_id'         =>$candidate_id,  
        			'perosnal_details_id'  =>$result,   				        				
        			'language'             => $languages[$i],    
        			'read_l'               => $lang_read[$i], 
        			'write_l'              => $lang_write[$i], 	
        			'speak_l'              => $lang_speak[$i], 
        			'proficiency'          => $lan_proficiant[$i], 			
        			'created_at'           => 	date("Y-m-d H:i:s")
        		);        		
            $result5 =$this->M_Candidate_profile->insert_personal_details_candidate_language($para5);  */
    }




    public function update_carrer_profile_details()
    {
        $post = $this->input->post();
        $career_desired_job_type = implode(
            ",",
            $post["career_desired_job_type"]
        );
        $career_employment_type = implode(",", $post["career_employment_type"]);
        $multiple_location_id = implode(",", $post["preferred_work_location"]);
        $candidate_id = $this->session->userdata("candidate_id");
        $career_id = $post["career_id"];
        $data = [
            "career_current_industry" => $post["career_current_industry"],
            "career_profile_department" => $post["career_profile_department"],
            "career_category" => $post["career_category"],
            "career_job_role" => $post["career_job_role"],
            "career_desired_job_type" => $career_desired_job_type,
            "career_employment_type" => $career_employment_type,
            "career_preferred_shift" => $post["career_preferred_shift"],
            "preferred_work_location" => $multiple_location_id,
            "expected_salary" => $post["expected_salary"],
            "created_at" => date("Y-m-d H:i:s"),
        ];

        $result = $this->M_Candidate_profile->update_carrer_profile_details(
            $career_id,
            $data
        );
        
        $data= array
        (
         "last_update_profile_date" => date("d-m-Y h:i:s"),   
        );
        $last_update_profile_update_date =  $this->M_Candidate_profile->update_candidate_details($candidate_id,$data);

        if ($result) {
            $this->session->set_flashdata(
                "success",
                "Successfully Update Carrer Profile Details"
            );
        } else {
            $this->session->set_flashdata(
                "error",
                "Something went wrong!Please try again"
            );
        }
        redirect("candidate_profile/fill_candidate_profile");
    }

    public function update_it_skills_details()
    {
        $post = $this->input->post();
        $candidate_id = $this->session->userdata("candidate_id");
        $education_id = $post["skill_id"];
        $data = [
            "candidate_id" => $candidate_id,
            "software_name" => $post["software_name"],
            "software_version" => $post["software_versions"],
            "last_used" => $post["software_last_used"],
            "exp_year" => $post["exp_year"],
            "exp_month" => $post["exp_month"],
        ];

        $result = $this->M_Candidate_profile->update_it_skills_details(
            $education_id,
            $data
        );
        $data= array
        (
         "last_update_profile_date" => date("d-m-Y h:i:s"),   
        );
        $last_update_profile_update_date =  $this->M_Candidate_profile->update_candidate_details($candidate_id,$data);
        if ($result) {
            $this->session->set_flashdata(
                "success",
                "Successfully Update IT Skill Details"
            );
        } else {
            $this->session->set_flashdata(
                "error",
                "Something went wrong!Please try again"
            );
        }
        redirect("candidate_profile/fill_candidate_profile");
    }

    public function update_education_details()
    {
        $post = $this->input->post();
        $candidate_id=$_SESSION['candidate_id'];       
        $education_id = $post["education_id"];

        $data = [
            "candidate_id" => @$candidate_id,
            "education" => @$post["education"],
            "board" => $post["candidate_board"],
            "university_name" => @$post["candidate_univercity"],
            "passout_year" => @$post["passingout_year"],
            "school_medium" => @$post["candidate_school_medium"],
            "total_marks" => @$post["candidate_total_mark"],
            "english_marks" => @$post["candidate_english_mark"],
            "maths_marks" => @$post["candidate_maths_mark"],
            "university_name" => @$post["candidate_univercity"],
            "course_type" => @$post["candidate_course_type"],
            "course" => @$post["candidate_course"],
            "specialization_course" => @$post["course_specialization"],
            "specialization_course_other" => @$post['course_specialization1'],
            "course_start_year" => @$post["course_start_year"],
            "course_end_year" => @$post["course_end_year"],
            "grading_system" => @$post["grade"],
            "created_at" => date("Y-m-d h:i:s"),
        ];      
        $result = $this->M_Candidate_profile->update_education_details(
            $education_id,
            $data
        );
          $data= array
        (
         "last_update_profile_date" => date("d-m-Y h:i:s"),   
        );
        $last_update_profile_update_date =  $this->M_Candidate_profile->update_candidate_details($candidate_id,$data);
        if ($result) {
            $this->session->set_flashdata(
                "success",
                "Successfully Update Education Details"
            );
        } else {
            $this->session->set_flashdata(
                "error",
                "Something went wrong!Please try again"
            );
        }
        redirect("candidate_profile/fill_candidate_profile");
    }


      public function save_candidate_profile_summary()
    {
        $candidate_id = $_SESSION['candidate_id'];
        $post = $this->input->post();       
        $data = [
            "candidate_id" => $candidate_id,
            "profile_summary" => $post["candidate_profile_summary"],            
            "created_at" => date("Y-m-d h:i:s"),
        ];
        $result = $this->M_Candidate_profile->candidate_insert_profile_summary($data);

        if ($result) {
            $this->session->set_flashdata(
                "success",
                "Successfully Add Profile Summary Details"
            );
        } else {
            $this->session->set_flashdata(
                "error",
                "Something went wrong!Please try again"
            );
        }
        redirect("candidate_profile/fill_candidate_profile");
    }


public function save_candidate_presentations()
{
        $candidate_id = $_SESSION['candidate_id'];
        $post = $this->input->post(); 
        $data = [
            "candidate_id" => $candidate_id,
            "presentation_title" => $post["presentation_title"],    
            "url" => $post["presentation_url"],     
            "description" => $post["presentation_description"],            
            "created_at" => date("Y-m-d h:i:s"),
        ];
        $result = $this->M_Candidate_profile->insert_candidate_presentation_details($data);
        $data= array
        (
         "last_update_profile_date" => date("d-m-Y h:i:s"),   
        );
        $last_update_profile_update_date =  $this->M_Candidate_profile->update_candidate_details($candidate_id,$data);
         if ($result) {
            $this->session->set_flashdata(
                "success",
                "Successfully Add Presentation Summary Details"
            );
        } else {
            $this->session->set_flashdata(
                "error",
                "Something went wrong!Please try again"
            );
        }
        redirect("candidate_profile/fill_candidate_profile");
}

public function update_candidate_presentations($presentation_id)
{
        $candidate_id = $_SESSION['candidate_id'];
        $post = $this->input->post(); 
        $data = [
            "candidate_id" => $candidate_id,
            "presentation_title" => $post["presentation_title"],    
            "url" => $post["presentation_url"],     
            "description" => $post["presentation_description"], 
        ];
        
        $result = $this->M_Candidate_profile->update_candidate_presentation_details($presentation_id,$data);
        $data= array
        (
         "last_update_profile_date" => date("d-m-Y h:i:s"),   
        );
        $last_update_profile_update_date =  $this->M_Candidate_profile->update_candidate_details($candidate_id,$data);
         if ($result) {
            $this->session->set_flashdata(
                "success",
                "Successfully Update Presentation Summary Details"
            );
        } else {
            $this->session->set_flashdata(
                "error",
                "Something went wrong!Please try again"
            );
        }
        redirect("candidate_profile/fill_candidate_profile");
}


    public function update_candidate_profile_summary($profile_summary_id)
    {
        $candidate_id = $_SESSION['candidate_id'];
        $post = $this->input->post();       
        $data = [
            "candidate_id" => $candidate_id,
            "profile_summary" => $post["candidate_profile_summary"],            
            "created_at" => date("Y-m-d h:i:s"),
        ];
        $result = $this->M_Candidate_profile->update_profile_summary_details($profile_summary_id,$data);
        $data= array
        (
         "last_update_profile_date" => date("d-m-Y h:i:s"),   
        );
        $last_update_profile_update_date =  $this->M_Candidate_profile->update_candidate_details($candidate_id,$data);
        if ($result) {
            $this->session->set_flashdata(
                "success",
                "Successfully Add Profile Summary Details"
            );
        } else {
            $this->session->set_flashdata(
                "error",
                "Something went wrong!Please try again"
            );
        }
        redirect("candidate_profile/fill_candidate_profile");
    }

    public function save_candidate_education_data()
    {
        $candidate_id = $_SESSION['candidate_id'];
        $user_details= $this->M_Candidate_profile->get_user_details_by_id_admin($candidate_id);
        $email = $user_details->email;
        $post = $this->input->post();
        if (!empty($post["course_specialization1"])) {
            $candidate_specialization_other = $post["course_specialization1"];
        } else {
            $candidate_specialization_other = "";
        }
        $data = [
            "candidate_id" => $candidate_id,
            "education" => @$post["education"],
            "board" => @$post["candidate_board"],
            "university_name" => @$post["candidate_univercity"],
            "passout_year" => @$post["passingout_year"],
            "school_medium" => @$post["candidate_school_medium"],
            "total_marks" => @$post["candidate_total_mark"],
            "english_marks" => @$post["candidate_english_mark"],
            "maths_marks" => @$post["candidate_maths_mark"],
            "university_name" => @$post["candidate_univercity"],
            "course_type" => @$post["candidate_course_type"],
            "course" => @$post["candidate_course"],
            "specialization_course" => @$post["course_specialization"],
            "specialization_course_other" => @$candidate_specialization_other,
            "course_start_year" => @$post["course_start_year"],
            "course_end_year" => @$post["course_end_year"],
            "grading_system" => @$post["grade"],
            "created_at" => date("Y-m-d h:i:s"),
        ];
        $get_high_qualification = $this->M_Candidate_profile->get_high_qualification_candidate($candidate_id);
        if(!empty($get_high_qualification))
        {   
           $courses = array();    
           foreach($get_high_qualification as $row)
           {
               $courses [] = $row->course_name;
           } 
        $courses= implode(",",$courses);
        $para = array
        (
            "qulification" => $courses
         );
        $profile_update = $this->M_Candidate_profile->update_profile($email,$para);
        }
        $result = $this->M_Candidate_profile->insert_candidate_education($data);
          $data= array
        (
         "last_update_profile_date" => date("d-m-Y h:i:s"),   
        );
        $last_update_profile_update_date =  $this->M_Candidate_profile->update_candidate_details($candidate_id,$data);
        if ($result) {
            $this->session->set_flashdata(
                "success",
                "Successfully Add Education Details"
            );
        } else {
            $this->session->set_flashdata(
                "error",
                "Something went wrong!Please try again"
            );
        }
        redirect("candidate_profile/fill_candidate_profile");
    }
    
    public function delete_it_skills_records()
    {
        $post = $this->input->post();
        $deleted_id = $post["deleteID"];
        $result = $this->M_Candidate_profile->delete_it_skill_candidate_selected($deleted_id);
          if ($result) {
            $this->session->set_flashdata(
                "success",
                "Successfully Delete IT Skill Record Candidate"
            );
        } else {
            $this->session->set_flashdata(
                "error",
                "Something went wrong!Please try again"
            );
        }
        redirect("candidate_profile/fill_candidate_profile");
    }
    
    public function save_candidate_project()
    {
        $post = $this->input->post();
        $candidate_id = $_SESSION['candidate_id'];
        
    }

    public function update_employement_details()
    {
        $post = $this->input->post();
        $emloyment_id = $post["emloyment_id"];
        $candidate_id = $_SESSION['candidate_id'];
        $data = [
            "candidate_id" => @$candidate_id,
            "emp_employment" => @$post["candidate_employment"],
            "emp_employment_type" => @$post["candidate_enrollment"],
            "emp_perv_company_name" => @$post["candidate_pre_company"],
            "emp_perv_designation" => @$post["candidate_pre_designation"],
            "emp_current_company_name" => @$post["candidate_current_company"],
            "emp_current_desigantion" => @$post["candidate_current_designation"],
            "emp_location" => @$post["candidate_intern_location"],
            "intern_candidate_department" =>
                @$post["candidate_intern_department"],
            "intern_roles_category" => @$post["intern_roles_category"],
            "intern_roles" => @$post["intern_role"],
            "emp_joining_year" => @$post["candidate_join_year"],
            "emp_joining_month" => @$post["candidate_join_month"],
            "emp_work_till_year" => @$post["candidate_working_till_year"],
            "emp_work_till_month" => @$post["candidate_working_till_month"],
            "emp_current_salary_currency" =>
                @$post["candidate_Currrent_currency"],
            "emp_current_salary" => @$post["candidate_salarys"],
            "intern_candidate_currency" => @$post["candidate_stipend_currency"],
            "intern_candidate_stipend" => @$post["candidate_stipend"],
            "emp_skill_used" => @$post["candidate_skill"],
            "emp_job_profile" => @$post["candidate_job_profile"],
            "intern_project_description" =>
                @$post["candidate_intern_project_discription"],
            "intern_project_link" => @$post["candidate_intern_project_link"],
            "emp_notice_period" => @$post["candidate_notice_periods"],
            "created_at" => date("Y-m-d h:i:s"),
        ];
        $result = $this->M_Candidate_profile->update_employment_details(
            $emloyment_id,
            $data
        );
        $data= array
        (
         "last_update_profile_date" => date("d-m-Y h:i:s"),   
        );
        $last_update_profile_update_date =  $this->M_Candidate_profile->update_candidate_details($candidate_id,$data);
        if ($result) {
            $this->session->set_flashdata(
                "success",
                "Successfully Add Employement Details"
            );
        } else {
            $this->session->set_flashdata(
                "error",
                "Something went wrong!Please try again"
            );
        }
        redirect("candidate_profile/fill_candidate_profile");
    }

    public function email1()
    {
        $this->load->view(
            "email_candidate_templates/v_user_email_enquiry",
            @$data
        );
    }

    public function forgot_password()
    {
        $this->load->view("recruiter/forgot_password.php", @$data);
    }
}
