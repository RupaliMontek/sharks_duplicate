<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Candidate_profile extends CI_Controller
{
	public function __construct()
	{
		if( ! ini_get('date.timezone') )
		{
		   date_default_timezone_set('GMT');
		} 
		parent::__construct();
	    $this->check_user_login_check_candidate();
		$this->load->model('recruiter/m_recruiter');
		$this->load->model('dailyreport/m_dailyreport');
		$this->load->model('user/m_admin_user');
		$this->load->model('modelbasic');
		$this->load->model('commen_model');
		$this->load->model('M_Candidate_profile');		
		$this->load->helper(array('form', 'url'));
		$this->load->helper('download');
		$this->load->model('permission/M_permission');
	
	}
    public function check_user_login_check_candidate()
	{
		
		if( ($this->session->userdata('candidate_id')=='') || ($this->session->userdata('candidate_user_name')=='') || ($this->session->userdata('candidate_user_email')==''))
		{			
			//print_r($this->session->userdata('candidate_user_name'));exit;
			redirect('recruitment/allready_register_account_login_here');
		}		
	}
    
    public function save_jobs()
    {
        $candidate_id = $this->session->userdata["candidate_id"];
        $data["save_job_list"];
        $this->load->view('recruiter/msute_candidate_login_header',@$data);
	    $this->load->view('recruiter/candidate_job_save',@$data);
	    $this->load->view('recruiter/candidate_footer');
    }

	public function update_resume()
    {
    	
        $candidate_id = $this->session->userdata["candidate_id"];
        $resume_candidate = $this->input->post("resume_candidate");
        $config["upload_path"] = "./assets/candidate_resume";
        $config["allowed_types"] = "pdf|doc|docx";
        $config["max_size"] = "0";
        $config["max_width"] = "0";
        $config["max_height"] = "0";
        $this->upload->initialize($config);
        $path = explode(".", $_FILES["resumes_upload"]["name"]);
        $newfilename = round(microtime(true)) . "." . end($path);
        $url = move_uploaded_file(
            $_FILES["resumes_upload"]["tmp_name"],
            "assets/candidate_resume/" . $newfilename
        );
        if (!empty($url)) {
            $urls = "/assets/candidate_resume/" . $newfilename;
            $resume = $urls;
        } else {
            $resume = $resume_candidate;
        }

        $data = [
            "candidate_resume" => $resume,
        ];
        $result = $this->M_Candidate_profile->update_candidate_details(
            $candidate_id,
            $data
        );

        if ($result) {
            $this->session->set_flashdata(
                "success",
                "update Sucessfully Resume"
            );
        } else {
            $this->session->set_flashdata("error", "Record Update Resume!");
        }
        redirect("candidate_profile/fill_candidate_profile");
    }
    
    
    public function update_profile_picture()
    {
    	
        $candidate_id = $this->session->userdata["candidate_id"];
        $candidate_profile_pics = $this->input->post("candidate_profile_pics");
        $config["upload_path"] = "./uploads/candidate_documents/$candidate_id";
        $config["allowed_types"] = "jpg|jpeg|png";
        $config["max_width"] = "0";
        $config["max_height"] = "0";
        $config['max_size'] = 2048; // 2MB limit
        $this->upload->initialize($config);
        if (!is_dir($config['upload_path'])) 
        {
           mkdir($config['upload_path'], 0777, true);
        }
    
        $path = explode(".", $_FILES["candidate_profile_pic"]["name"]);
        $newfilename = round(microtime(true)) . "." . end($path);
        $url = move_uploaded_file(
            $_FILES["candidate_profile_pic"]["tmp_name"],
            "uploads/candidate_documents/$candidate_id/".$newfilename
        );
        if (!empty($url)) {
            $urls = "/uploads/candidate_documents/$candidate_id/".$newfilename;
            $candidate_profile_pic = $urls;
        } else {
            $candidate_profile_pic = $candidate_profile_pics;
        }

        $data = [
            "image" => $candidate_profile_pic,
        ];
        $result = $this->M_Candidate_profile->update_candidate_details(
            $candidate_id,
            $data
        );

        if ($result) {
            $this->session->set_flashdata(
                "success",
                "Update Sucessfully Profile Picture"
            );
        } else {
            $this->session->set_flashdata("error", "Not Update Profile Picture");
        }
        redirect("candidate_profile/fill_candidate_profile");
    }

	
 public function index(){

 	$candidate_id =$_SESSION['candidate_id'];
    $candidate_id =$_SESSION['candidate_id'];
    // print_r($candidate_id); die();  
    $data["companies"]=$this->M_Candidate_profile->get_all_companies();
    $data["cities"]=$this->M_Candidate_profile->all_cities(); 
    $data["departments"]=$this->M_Candidate_profile->get_all_department();
    $data["educations"]=$this->M_Candidate_profile->get_all_education();
    $data["candidate_white_paper_journal_entry"]=$this->M_Candidate_profile->get_candidate_white_paper_journal_entry($candidate_id);
    //print_r($data["educations"]); die();
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
    $data["remainingMonths"]=$remainingMonths = $totalMonths % 12;
    }
    $data['user_details']=$this->M_Candidate_profile->get_candidate_details($candidate_id);
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
    //print_r($data['career_profile']); die();
    $data['citiesandstates'] = $this->M_Candidate_profile->get_all_cities_states();
    $data['employement_details']= $this->M_Candidate_profile->get_employment_details($candidate_id);
    //print_r($this->db->last_query()); die();
    $data['course']=$this->M_Candidate_profile->get_all_course_list();
    $data["main_courses"]=$this->M_Candidate_profile->get_all_main_course_list();
    $data['education_details']=$this->M_Candidate_profile->get_all_education_details($candidate_id);
    $data["candidate_project"] = $this->M_Candidate_profile->get_candidate_project_details($candidate_id);
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
    $data["client_list"] = $this->M_Candidate_profile->client_list_job();
	$this->load->view('recruiter/msute_candidate_login_header',@$data);
	$this->load->view('recruiter/msuite_user_login_home_page',@$data);
	$this->load->view('recruiter/candidate_footer');
 }  


 public function get_job_post_company($company_id)
    {
        $data["job_latest"] = $this->M_Candidate_profile->get_job_post_company($company_id);        
         $data["companies"]=$this->M_Candidate_profile->get_all_companies();
         $data["cities"]=$this->M_Candidate_profile->all_cities(); 
         $data["departments"]=$this->M_Candidate_profile->get_all_department();
         $data["educations"]=$this->M_Candidate_profile->get_all_education();
        $this->load->view("recruiter/candidate_inner_pages_header");
        $this->load->view("recruiter/candidate_job_search_filter", $data);
        $this->load->view("recruiter/candidate_footer");

    }

 public function fill_candidate_profile()
    {
    	$candidate_id =$_SESSION['candidate_id'];
        $data["companies"]=$this->M_Candidate_profile->get_all_companies();
        $data["cities"]=$this->M_Candidate_profile->all_cities(); 
        $data["departments"]=$this->M_Candidate_profile->get_all_department();
        $data["educations"]=$this->M_Candidate_profile->get_all_education();
        $data["candidate_white_paper_journal_entry"]=$this->M_Candidate_profile->get_candidate_white_paper_journal_entry($candidate_id);
         //print_r($data["educations"]); die();
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
        $data["remainingMonths"]=$remainingMonths = $totalMonths % 12;
	    }
        $data['user_details']=$this->M_Candidate_profile->get_candidate_details($candidate_id);
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
	    //print_r($data['career_profile']); die();
	    $data['citiesandstates'] = $this->M_Candidate_profile->get_all_cities_states();
	    $data['employement_details']= $this->M_Candidate_profile->get_employment_details($candidate_id);
	    //print_r($this->db->last_query()); die();
	    $data['course']=$this->M_Candidate_profile->get_all_course_list();
	    $data["main_courses"]=$this->M_Candidate_profile->get_all_main_course_list();
	    $data['education_details']=$this->M_Candidate_profile->get_all_education_details($candidate_id);
	    $data["candidate_project"] = $this->M_Candidate_profile->get_candidate_project_details($candidate_id);
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
	    $data['resume_headline'] = $this->M_Candidate_profile->get_candidate_resume_headline_details($candidate_id);
	    $data['last_employment'] = $this->M_Candidate_profile->get_letest_employment_by_candidate_id($candidate_id);
        $this->load->view("recruiter/msute_candidate_login_header",@$data);
        $this->load->view("recruiter/msuite_candidate_profile",@$data);
        $this->load->view("recruiter/candidate_footer");
    }
   public function search_job()
    {
        $post = $this->input->post();       
        $location_id  =   @$post['joblocationid'];
        $search       =   @$post["job-title"];
        $experience   =   @$post["experience"];
        $location     =   @$post["job-location"];
        $pin_code     =   @$post["pin_code"];
        $data["job_latest"] = $this->M_Candidate_profile->search_job($search,$experience,$location_id,$pin_code);
        $data["companies"]=$this->M_Candidate_profile->get_all_companies();
        $data["cities"]=$this->M_Candidate_profile->all_cities(); 
        $data["departments"]=$this->M_Candidate_profile->get_all_department();
        $data["educations"]=$this->M_Candidate_profile->get_all_education();
        $this->load->view("recruiter/msute_candidate_login_header");
        $this->load->view("recruiter/candidate_job_search_filter", $data);
        $this->load->view("recruiter/candidate_footer");
        /*$this->load->view('recruiter/candidate_dashboard_header');
	    $this->load->view('recruiter/candidate_dashboard_home',@$data);
	    $this->load->view('recruiter/candidate_dashboard_footer',@$data);
        */
    }
 
 public function candidate_registration()
 {
	    $candidate_id =@$this->session->userdata('candidate_id');
	    if(empty($candidate_id)){
	    	$candidate_id=0;
	    }
	    $data['employment_details'] = $this->M_Candidate_profile->check_employment_fill($candidate_id);	   
	    $data['education_de'] = $this->M_Candidate_profile->check_education_fill($candidate_id);
	    $data['candidate_skil'] = $this->M_Candidate_profile->check_candidate_skills_fill($candidate_id);
	    $data['career_pro'] = $this->M_Candidate_profile->check_candidate_career_profile_fill($candidate_id);
	    $data['personal_det'] = $this->M_Candidate_profile->check_candidate_personal_candidate_fill($candidate_id);	
	    $data['candidate_ids']=$candidate_id;
	    $data['career_profile']= $this->M_Candidate_profile->get_record_by_carrer($candidate_id);
	    //print_r($data['career_profile']); die();
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
	    $this->load->view('recruiter/candidate_header_main',@$data);
	    $this->load->view('recruiter/candidate_search',$data);
	    $this->load->view('recruiter/candidate_footer_main',@$data);
	}
	
public function get_specialization_by_course(){
    $post= $this->input->post();
    $course_id = $post['course_id'];
    
    $data['list']='';
                
	    $sql = 'SELECT a.specialization_course_id,a.specialization_name,a.course_id as course_ids FROM specialization_course a INNER JOIN candidate_course b ON a.course_id=b.course_id where b.course_id ='.$course_id.'';
        $query = $this->db->query( $sql);
        /* print_r($this->db->last_query()); die();*/
        $importers=$query->result_array();
        $data['list_emp']=$importers;
        echo json_encode($data['list_emp']);
    
}	

public function get_specialization_by__main_course(){
    $post= $this->input->post();
    $course_id = $post['main_course_id'];
    $data['list']='';
	    $sql = 'SELECT a.candidate_education_ids,a.course_name,a.course_id,a.course_id as candidate_course FROM candidate_course a INNER JOIN tbl_candidate_education b ON a.candidate_education_ids=b.candidate_education_id where a.candidate_education_ids ='.$course_id.'';
        $query = $this->db->query( $sql);
        /* print_r($this->db->last_query()); die();*/
        $importers=$query->result_array();
        $data['list_emp']=$importers;
        echo json_encode($data['list_emp']);
    
}
	 	
public function check_login()
	{
		if( ($this->session->userdata('admin_id')=='') || ($this->session->userdata('user_id')=='') || ($this->session->userdata('user_name')=='') || 
			($this->session->userdata('user_email')=='') || ($this->session->userdata('user_role')=='') )
		{
			redirect('login');
		}
	}
	public function getStateByCountry()
	{
		$country = $this->input->post('country',TRUE);
		$data['state'] = $this->m_recruiter->getStateByCountry($country);
		$this->load->view('recruiter/load_state',$data);	
	}
	
	
	public function view_profile(){		
	 //$candidate_id =$_SESSION['candidate_id'];
	$candidate_id =$_SESSION['candidate_id'];
    $data['user_details']=$this->M_Candidate_profile->get_candidate_details($candidate_id);   
	$this->load->view('recruiter/candidate_header_main',@$data);
	$this->load->view('recruiter/candidate_profile_view.php',@$data);
	$this->load->view('recruiter/candidate_footer_main',@$data);
	}
	
	public function edit_profile(){
	$candidate_id =$_SESSION['candidate_id'];
    $data['user_details']=$this->M_Candidate_profile->get_candidate_details($candidate_id);   
	$this->load->view('recruiter/candidate_header_main',@$data);
	$this->load->view('recruiter/candidate_profile_edit',@$data);
	$this->load->view('recruiter/candidate_footer_main',@$data);
	}
	
	public function update_profile(){
	 $candidate_id =$_SESSION['candidate_id'];
	 $post=$this->input->post();
	 @$folder_name= $post['profile_image'];
	 $config1['upload_path'] ='./uploads/candidate_profile_images/'.$folder_name;
      
    if (!is_dir('./uploads/candidate_profile_images/'.$folder_name)) {
    	mkdir('./uploads/candidate_profile_images/' . $folder_name, 0777, TRUE);	
		    
    }

	$config1['allowed_types'] = '*';
	$config1['max_size'] = '0';
	$config1['max_width']  = '0';
	$config1['max_height']  = '0';
    $this->upload->initialize($config1);
	$do_upload2 = $this->upload->do_upload('profile_image');
	if(!empty($do_upload2)){
		    
	$path1 = $_FILES['profile_image']['name'];
	$url1 = 'uploads/candidate_profile_images/'.$folder_name.'/'.$path1;
	$profile_image =	$url1;

	}

	else{
			$profile_image=    $post['profile_old'];
	}
	
	if($post['candidate_password']!=true){
	    $candidate_password =$post['candidate_old_password'];
	}
	
	else{
	    $candidate_password =md5($post['candidate_password']);
	}
		 
	  $insert_data = array(
	       'candidate_name'=>$post['candidate_name'],
	       'candidate_email'=>$post['candidate_email'],
	       'candidate_password'=>$candidate_password,
	       'candidate_phone'=>$post['candidate_phone'],
	       'image'=>$profile_image,
	       
	       );	 
	  $result= $this->M_Candidate_profile->update_candidate_details($candidate_id,$insert_data);  
	       
			if($result)

			{	
			    $this->session->set_flashdata('success','Record update Successfully!');
			}
			else

			{
				$this->session->set_flashdata('error','Record not updated!');
			}

	   redirect('Candidate_profile');
	
	}



	public function getCitiesByState()
	{
		$state = $this->input->post('state',TRUE);
		$data['city'] = $this->m_recruiter->getCitiesByState($state);
		$this->load->view('recruiter/load_city',$data);
	}

   
	  public function Candidate_login()
	{
	    /*$data['list_city'] = @$this->modelbasic->get_entity_data();*/
	    $this->load->view('recruiter/candidate_login',@$data);
	}
	
		  public function Candidate_home()
	{
	    /*$data['list_city'] = @$this->modelbasic->get_entity_data();*/
	    $this->load->view('recruiter/candidate_home',@$data);
	}
	

	  public function Candidate_register()
	{
	   
	    /*$data['list_city'] = @$this->modelbasic->get_entity_data();*/
	    $this->load->view('recruiter/candidate_registration',@$data);
	}
	  public function Save_Candidate_register()
	{
	   $post= $this->input->post();
	   $folder_name= $this->input->post('candidate_resume',TRUE);
		$config1['upload_path'] ='./uploads/candidate_resume/'.$folder_name;


		if (!is_dir('./uploads/candidate_resume/'.$folder_name)) 
		{
    		mkdir('./uploads/candidate_resume/' . $folder_name, 0777, TRUE);
		}

		$config1['allowed_types'] = '*';
		$config1['max_size'] = '0';
		$config1['max_width']  = '0';
		$config1['max_height']  = '0';
    	$this->upload->initialize($config1);
		$do_upload2 = $this->upload->do_upload('candidate_resume');
		if(!empty($do_upload2))

		{
			$path1 = $_FILES['candidate_resume']['name'];
			$url1 = 'uploads/candidate_resume/'.$folder_name.'/'.$path1; 
			$pdf_file =	$url1;
		
		}

		else

		{

			$pdf_file=$this->input->post('pdf_file');

		}
		
	   $insert_data = array(
	       'candidate_name'=>$post['candidate_name'],
	       'candidate_email'=>$post['candidate_email'],
	       'candidate_password'=>md5($post['password']),
	       'candidate_phone'=>$post['phone'],
	       'candidate_work_status'=>$post['work_status'],
	       'candidate_resume'=>$pdf_file
	       );
	       
	        $result=$this->M_Candidate_profile->insert_candidate_registration($insert_data);
	        
	        if($result)

		{
			$this->session->set_flashdata('success','Record added Successfully!');
		}
		else

		{
			$this->session->set_flashdata('error','Record not added!');
		}

		redirect('Candidate_profile');

	    
	}
	
	public function search_city()
    {
    	$post=$this->input->post();
    
    	$city_data= $this->m_recruiter->get_city_like($post['query']);
    
    	$data;
    	foreach ($city_data as $city) 
    	{
    		$data[]=$city;
    	}
    	echo json_encode($data);
    }
    
    public function save_candidate()
    {
        /*	Pdf Upload	-----------------------------------------------------------------*/
		
		$folder_name= $this->input->post('candidate_resume',TRUE);
		$config1['upload_path'] ='./uploads/candidate_resume/'.$folder_name;


		if (!is_dir('./uploads/candidate_resume/'.$folder_name)) 
		{
    		mkdir('./uploads/candidate_resume/' . $folder_name, 0777, TRUE);
    	}

		$config1['allowed_types'] = '*';
		$config1['max_size'] = '0';
		$config1['max_width']  = '0';
		$config1['max_height']  = '0';
    	$this->upload->initialize($config1);
		$do_upload2 = $this->upload->do_upload('candidate_resume');
		if(!empty($do_upload2))

		{
		    
			$path1 = $_FILES['candidate_resume']['name'];
			$url1 = 'uploads/candidate_resume/'.$folder_name.'/'.$path1; 
			$pdf_file =	$url1;
		}

		else

		{
			$pdf_file=$this->input->post('pdf_file');
		}
		
        $post=$this->input->post();
        
            $insert_data=array(
            'candidate_name'=>$post['candidate_name'] ,
            'candidate_email'=>$post['candidate_email'] ,
            'candidate_password'=>$post['candidate_password'] ,
            'candidate_mobile_no'=>$post['candidate_mobile'] ,
            'candidate_current_city'=>$post['candidate_current_city'] ,
            'candidate_out_side_india'=>$post['candidate_out_side_india'],
            'candidate_resume_path'=>$pdf_file,
            'candidate_key_skills'=>$post['candidate_key_skill'] ,
            'candidate_designation'=>$post['candidate_designation'],
            'candidate_organization'=>$post['candidate_orgnization'] ,
            'candidate_is_current_company'=>$post['candidate_is_current_company'],
            'candidate_started_working_from_yr'=>$post['candidate_working_from_yr'] ,
            'candidate_started_working_from_month'=>$post['candidate_working_from_month'],
            'candidate_worked_till'=>$post['candidate_worked_till'] ,
            'candidate_current_salry_in'=>$post['candidate_salary_currency'] ,
            'candidate_currrent_salary_lac'=>$post['candidate_salary_in_lac'] ,
            'candidate_currrent_salary_thousand'=>$post['candidate_salary_in_thousand'] ,
            'candidate_top_five_skills'=>$post['candidate_skills'] , 
            'candidate_job_profile'=>$post['candidate_job_profile'],
            'candidate_notice_period'=>$post['candidate_notice_period'],
            'candidate_education'=>$post['candidate_education'], 
            'candidate_course'=>$post['candidate_course'] , 
            'candidate_specialization'=>$post['candidate_specialization'],
            'candidate_university_institute'=>$post['candidate_university'] ,
            'candidate_course_type'=>$post['candidate_course_type'] , 
            'candidate_passing_yr'=>$post['candidate_paassing_year'],
            'candidate_industry'=>$post['candidate_industry'] ,
            'candidate_functional_area'=>$post['candidate_functional_area'] ,
            'candidate_role'=>$post['candidate_role'] ,
            'candidate_desired_job_type'=>$post['candidate_job_type'],
            'candidate_desired_employment_type'=>$post['candidate_employment_type'] ,
            'candidate_preferred_shift'=>$post['candidate_prefered_shift'] ,
            'candidate_expected_salary_type'=>$post['candidate_exp_salary_currency'] ,
             'candidate_expected_salary_lac'=>$post['candidate_salary_in_lac'] ,
            'candidate_expected_salary_thousand'=>$post['candidate_salary_in_thousand'],
            'candidate_date_of_birth_day'=>$post['candidate_dob_day'],
            'candidate_date_of_birth_month'=>$post['candidate_dob_month'], 
            'candidate_date_of_birth_year'=>$post['candidate_dob_year'],
            'candidate_gender'=>$post['candidate_gender'], 
            'candidate_permanent_address'=>$post['candidate_permanent_address'],
            'candidate_hometown'=>$post['candidate_hometown'],
            'candidate_pincode'=>$post['candidate_pincode'],
            'candidate_marital_status'=>$post['candidate_marital_status'],
            'candidate_category'=>$post['candidate_catagory'] ,
            'candidate_differently_abled'=>$post['candidate_differently_abled'],
            'candidate_differently_abled_category'=>$post['candidate_differently_abled_category'],
            'candidate_language'=>$post['candidate_differently_language'],
            'candidate_proficency'=>$post['candidate_differently_proficiency'],
            'candidate_differently_proficiency_type'=>$post['candidate_differently_proficiency_type'],
            'created_at' =>   date('Y-m-d h:i:s')
            );
        
            
            $result= $this->m_recruiter->insert_candidate($insert_data);
            
            if($_FILES['candidate_resume']){
               $config['upload_path'] ='uploads/candidate_resume/'.$result.'/';
    
    			if (!is_dir('uploads/candidate_resume/'.$result)) 
    			{
    	    		mkdir('uploads/candidate_resume/' . $result, 0777, TRUE);
    			}
    			
    			
    			$config['upload_path']          = $config['upload_path'];
                $config['allowed_types']        = 'pdf|doc|docx';
                $config['max_size']             = 10000000;
                $config['overwrite']            = TRUE;
    
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ( ! $this->upload->do_upload('candidate_resume'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                        $resume = "";
                }
                else
                {
                    $fileData = $this->upload->data();
    				$uploadData = $config['upload_path'].$fileData['file_name'];
    				$resume = $uploadData;
    			}
            }else{
                $resume = "";
            }

			$data = array('candidate_resume_path' => $resume);
   		    $this->db->where('candidate_id', $result);
   		    $this->db->update('candidate_data', $data);
	    $this->session->set_userdata('success', "Thank You ".$post['candidate_name']."For Updating Your Resume");
        redirect();
    }
    
    public function edit_resume($id)
    {
        $data['candidate']=$this->m_recruiter->get_candidate_resume_data($id);
        $data['siderbar_menus'] = $this->M_permission->list_labels('internal user');
		$this->load->view('template/header');
		$this->load->view('template/sidebar',$data);
		$this->load->view('recruiter/candidate_search',$data);
    }
    
    public function update_candidate()
    {
        $post=$this->input->post();
        
        $update_data=array(
            'candidate_id'=> $post['candidate_name'] ,
            'candidate_name'=>$post['candidate_name'] ,
            'candidate_email'=>$post['candidate_email'] ,
            'candidate_password'=>$post['candidate_password'] ,
            'candidate_mobile_no'=>$post['candidate_mobile'] ,
            'candidate_current_city'=>$post['candidate_current_city'] ,
            'candidate_out_side_india'=>$post['candidate_out_side_india'],
            'candidate_resume_path'=>$post['candidate_resume'],
            'candidate_key_skills'=>$post['candidate_key_skill'] ,
            'candidate_designation'=>$post['candidate_designation'],
            'candidate_organization'=>$post['candidate_orgnization'] ,
            'candidate_is_current_company'=>$post['candidate_is_current_company'],
            'candidate_started_working_from_yr'=>$post['candidate_working_from_yr'] ,
           'candidate_started_working_from_month'=>$post['candidate_working_from_month'],
            'candidate_worked_till'=>$post['candidate_worked_till'] ,
            'candidate_current_salry_in'=>$post['candidate_salary_currency'] ,
            'candidate_currrent_salary_lac'=>$post['candidate_salary_in_lac'] ,
            'candidate_currrent_salary_thousand'=>$post['candidate_salary_in_thousand'] ,
            'candidate_top_five_skills'=>$post['candidate_skills'] , 
            'candidate_job_profile'=>$post['candidate_job_profile'],
            'candidate_notice_period'=>$post['candidate_notice_period'],
            'candidate_education'=>$post['candidate_education'], 
            'candidate_course'=>$post['candidate_course'] , 
            'candidate_specialization'=>$post['candidate_specialization'],
            'candidate_university_institute'=>$post['candidate_university'] ,
            'candidate_course_type'=>$post['candidate_course_type'] , 
            'candidate_passing_yr'=>$post['candidate_paassing_year'],
            'candidate_industry'=>$post['candidate_industry'] ,
            'candidate_functional_area'=>$post['candidate_functional_area'] ,
            'candidate_role'=>$post['candidate_role'] ,
            'candidate_desired_job_type'=>$post['candidate_job_type'],
            'candidate_desired_employment_type'=>$post['candidate_employment_type'] ,
            'candidate_preferred_shift'=>$post['candidate_prefered_shift'] ,
            'candidate_expected_salary_type'=>$post['candidate_exp_salary_currency'] ,
            'candidate_expected_salary_lac'=>$post['candidate_exp_salary_in_lac'] , 
            'candidate_expected_salary_thousand'=>$post['candidate_exp_salary_in_thousand'],
            'candidate_date_of_birth_day'=>$post['candidate_dob_day'],
            'candidate_date_of_birth_month'=>$post['candidate_dob_month'], 
            'candidate_date_of_birth_year'=>$post['candidate_dob_year'],
            'candidate_gender'=>$post['candidate_gender'], 
            'candidate_permanent_address'=>$post['candidate_permanent_address'],
            'candidate_hometown'=>$post['candidate_hometown'],
            'candidate_pincode'=>$post['candidate_pincode'],
            'candidate_marital_status'=>$post['candidate_marital_status'],
            'candidate_category'=>$post['candidate_catagory'] ,
            'candidate_differently_abled'=>$post['candidate_differently_abled'],
            'candidate_differently_abled_category'=>$post['candidate_differently_abled_category'],
            'candidate_language'=>$post['candidate_differently_language'],
            'candidate_proficency'=>$post['candidate_differently_proficiency'],
            'candidate_differently_proficiency_type'=>$post['candidate_differently_proficiency_type'],
            );
            
            $result= $this->m_recruiter->update_candidate($post['candidate_id'],$update_data);
            
            $config['upload_path'] ='uploads/candidate_resume/'.$post['candidate_id'].'/';

						if (!is_dir('uploads/candidate_resume/'.$post['candidate_id'])) 
						{
				    		mkdir('uploads/candidate_resume/' . $post['candidate_id'], 0777, TRUE);
						}
						
						
						$config['upload_path']          = $config['upload_path'];
                        $config['allowed_types']        = 'pdf|doc|docx';
                        $config['max_size']             = 10000000;
                        $config['overwrite']            = TRUE;
        
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        if ( ! $this->upload->do_upload('candidate_resume'))
                        {
                                $error = array('error' => $this->upload->display_errors());
        
                                print_r($error);
                        }
                        else
                        {
        
                            $fileData = $this->upload->data();
							$uploadData = $config['upload_path'].$fileData['file_name'];
						}

						if(!empty($uploadData)) { $resume = $uploadData; }
						else { $resume = ""; }

						$data = array('candidate_resume_path' => $resume,);
			   		    $this->db->where('candidate_id', $post['candidate_id']);
			   		    $this->db->update('candidate_data', $data);
            
            $this->session->set_userdata('success', "Thank You ".$post['candidate_name']."For Updating Your Resume");
        redirect();
    }
    
    public function send_mail_candidate()
    {
        
        $data['candidate_email']=implode(",",$this->input->post('candidate_emails'));
        
        $data['siderbar_menus'] = $this->M_permission->list_labels('internal user');
		
		$data['email_template'] =$this->m_recruiter->get_all_email_template();
		
		$this->load->view('template/header');
		$this->load->view('template/sidebar',$data);
		$this->load->view('recruiter/send_mail_candidate',$data);

    }
    
    public function send_mail_to_candidates()
    {
        $to_email=$this->input->post('email_id', TRUE);
    	
        $email=	explode(",",$to_email);
        
        $subject_data = $this->input->post('subject', TRUE); 
        
        $content =  $this->input->post('compose-textarea',TRUE); 
        
        
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        $headers .= 'From: No reply' . "\r\n";
        
        
        $EmailTemplate = $this->input->post('EmailTemplate', TRUE);
		if($EmailTemplate == 'Diwali')
		{
		    $data       =	array( 'content' => $description);
		    $message 	.= $this->load->view('mail/email_template/u_sales_mail_to_client',$data,true);
		}
		else
		{
		    $template=$this->m_recruiter->get_all_email_template_by_id($EmailTemplate);
		    $template   = base_url().'uploads/sales/templets/'.$template->template_path; 
		    $content .= '<br><br><img style="width:600px;" src="'.$template.'">';
		    $data       =	array( 'content' => $content);
		    $message 	= $this->load->view('mail/email_template/u_sales_mail_to_client',$data,true);
		}
		
        foreach($email as $to)
        {
            $flag=mail($to,$subject_data ,$message,$headers);
        }
     
		if($flag)
		{
			$this->session->set_flashdata('success','Email sending Successfully!'); 
			redirect('candidate_profile/advance_search');
		}
		else
		{
		    $this->session->set_flashdata('error','Email sending failed!');
		}

        
    }
    
    // Develop By:- Mr. Pratik G. Dhamande For Current Openings.
    function current_openings()
    {   
        $this->load->model('m_recruiter');
        $data['job_list'] = $this->m_recruiter->job_list();
        $data['clients_list'] = $this->m_recruiter->client_list_all();
        $data['location_list'] = $this->commen_model->getgroupbydata(array(), 'tbl_jobs', 'locations');
        $data['salary_list'] = $this->commen_model->getgroupbydata(array(), 'tbl_jobs', 'salery');
        $data['skill_list'] = $this->commen_model->getgroupbydata(array(), 'tbl_dailyreport_recruiter', 'position_skills');
        // print_r($data['location_list']); exit;
        // $this->load->view('recruiter/openings', $data);
        $this->load->view('recruiter/openings_new', $data);
    }
    
    public function get_searched_jobs(){
        $post = $this->input->post();
        $skills = @$post['skill'];
        $locations = $post['location'];
        $data['job_list'] = $this->m_recruiter->get_searched_jobs($skills, $locations);
        // echo $this->db->last_query();
        $this->load->view('recruiter/load_searched_job_openings', $data);
    }

    
}
?>