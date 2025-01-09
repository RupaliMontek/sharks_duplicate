<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'controllers/BaseController.php';
// require FCPATH . 'vendor/autoload.php';
// require_once 'vendor/autoload.php';

// Mail ID: mailto:sharmakash8@gmail.com ....for facebook posting
// PAss: Montek@123**

require FCPATH . '/vendor/autoload.php';
class Recruiter extends BaseController
{
	public function __construct()
	{
		if( ! ini_get('date.timezone') )
		{
		   date_default_timezone_set('GMT');
		} 
		parent::__construct();	
	//	$this->check_login();
	    $this->load->dbforge();
		$this->load->model('m_admin');
	//	$this->load->model('task/m_task');
		$this->load->model('user/m_admin_user');
		$this->load->model('Commen_model');
		$this->load->model('permission/M_permission');
	//	$this->load->model('Notification_model');
	///	$this->load->model('project_management/project_management_model');
	//	$this->load->model('client/m_client');
		$this->load->model('recruiter/m_recruiter');
		$this->load->model('dailyreport/m_dailyreport');
		$this->load->model('user/m_admin_user');
	//	$this->load->model('Domain_model');
		$this->load->model('modelbasic');
		$this->load->model('commen_model');
	//	$this->load->library('PHPReport');
		$this->load->helper(array('form', 'url'));
		$this->load->helper('download');
	$this->load->library('HttpClient');
	}
    
	public function check_login()
	{
		if( ($this->session->userdata('admin_id')=='') || ($this->session->userdata('user_id')=='') || ($this->session->userdata('user_name')=='') || 
			($this->session->userdata('user_email')=='') || ($this->session->userdata('user_role')=='') )
		{
			redirect('login');
		}
	}
    public function list_job_post()
    {   
        $data['siderbar_menus'] = $this->M_permission->list_labels('internal user');
        $data["job_post_list"]  = $this->modelbasic->get_list_job_post();
        $this->load->view('template/header');
		$this->load->view('template/sidebar',$data);
		$this->load->view('job_posting/list_job_posting');
		$this->load->view('template/footer');
    }


public function save_job_post_candidate_recruitment()
{
    $post = $this->input->post(); // Fetch form data
    
    // Video upload config
    $config['upload_path'] = 'uploads/company_video';
    $config['allowed_types'] = 'mp4|avi|wmv|flv|mov|mkv';
    $config['max_size'] = 160000; // in kilobytes

    $this->load->library('upload', $config);

    // Initialize video file name
    $file_name = '';

    if (!$this->upload->do_upload('video')) {
        $error = array('error' => $this->upload->display_errors());
        // Log or display error message (optionally)
    } else {
        $data = array('upload_data' => $this->upload->data());
        $file_name = $data['upload_data']['file_name'];
    }

    // Post job on social media platforms
    $res = $this->PostJobOnSocialSite($post['job_descriptions'], $post['profile']);
// print_r($res); exit;
    // Prepare data for database insertion
    $data = [
        // "added_by" => $_SESSION["user_id"],
        "profile" => $post["profile"],
        "key_skills" => $post["key_skills"],
        "min_exp_candidate" => $post["min_exp_candidate"],
        "max_exp_candidate" => $post["max_exp_candidate"],
        "country_id" => $post["job_country"],
        "state_id" => $post["job_state"],
        "job_location" => $post["job_location"],
        "job_descriptions" => $post["job_descriptions"],
        "job_opening_area_pincode" => $post["job_opening_area_pincode"],
        "job_opening_address" => $post["job_opening_address"],
        "job_type" => $post["job_type"],
        "industry_type" => $post["industry_type"],
        "department" => $post["department"],
        "education" => $post["education"],
        "company_about" => $post["company_about"],
        "work_mode" => $post["work_mode"],
        "no_of_vacancies" => $post["no_of_vacancies"],
        "min_salary" => $post["min_salary"],
        "max_salary" => $post["max_salary"],
        "job_pincode" => $post["job_pincode"],
        "shift_type" => $post["shift_type"],
        "new_company_name" => $post["new_company_name"],
        "company_telephone" => $post["company_telephone"],
        "company_email" => $post["company_email"],
        "company_video" => $file_name, // Store uploaded video file name
        "created_at" => date("Y-m-d h:i:s")
    ];

    // Insert job post into database
    $result = $this->modelbasic->insert_job_post($data);

    if ($result) {
        $this->session->set_flashdata('success', 'Job Post Record Added Successfully!');
    } else {
        $this->session->set_flashdata('error', 'Record Not Added!');
    }

    // Load the job post list
    $data['siderbar_menus'] = $this->M_permission->list_labels('internal user');
    $data["job_post_list"] = $this->modelbasic->get_list_job_post();
    $this->load->view("recruiter/free_job_post_header");
    $this->load->view("recruiter/free_job_post_index.php", $data);
    $this->load->view("recruiter/free_job_post_footer", $data);
}

public function PostJobOnSocialSite($profile, $job_description)
{
    // Instantiate the Guzzle HTTP client
    $client = new GuzzleHttp\Client();
    
    // Prepare the content to be posted on social media
    $postContent = "Job Profile: " . $profile . "\n" .
                   "Job Description: " . $job_description . "\n" .
                   "Apply today!";
    
    // Define the data payload
    $data = [
        "post" => $postContent,
        "platforms" => ["facebook", "instagram", "linkedin"],  // Social media platforms
        "mediaUrls" => ["https://sharksjob.com/frontend/images/logo.gif"],  // Media to be included in the post
        'message' => 'Check out this job opportunity!',
        'link' => 'https://sharksjob.com/Job_post',  // Link to the job post
    ];

    try {
        // Make the API request to Ayrshare
        $response = $client->post('https://app.ayrshare.com/api/post', [
            'headers' => [
                'Authorization' => 'Bearer 3N42JE3-5PEMNMK-GT9ECFN-4BHZASX',
                'Content-Type' => 'application/json',
            ],
            'json' => $data,  // Send data as JSON
        ]);

        // Decode the response from Ayrshare
        $responseBody = json_decode($response->getBody(), true);

        // Check for a successful post
        if (isset($responseBody['status']) && $responseBody['status'] == 'success') {
            // Optionally log the success for debugging or audit purposes
            return $responseBody;
        } else {
            // Optionally log the failure
            return ['error' => 'Failed to post on social media.'];
        }

    } catch (Exception $e) {
        // Catch and return any errors that occur during the process
        return ['error' => 'Exception: ' . $e->getMessage()];
    }
}    
    public function delete_job_post()
    {
        $post = $this->input->post();
        $deleted_id = $post["deleteID"];
        $result = $this->modelbasic->delete_job_post($deleted_id);
        if(@$result)
        {
        		 
        $this->session->set_flashdata('success','Job Pot Record Delete Successfully!');
        }
        else
        {
        	$this->session->set_flashdata('error','Record Not Deleted!');
        }
        redirect('recruiter/recruiter/list_job_post');
    }
    
    public function add_job_post()
    {
   
        
        
        $data['siderbar_menus']     =  $this->M_permission->list_labels('internal user');
        $data["client_list"]        =  $this->m_admin->list_client();
        $data["department_list"]      = $this->m_admin->get_new_department_job_posting();
        $data["job_post_details"]   =  $this->modelbasic->get_details_job_post($job_post_id);
        $data['country_list']       =  $this->modelbasic->get_country_list();
        $data['state_list']         =  $this->modelbasic->get_states_list($data["job_post_details"]->country_id);
        $data['city_list']          =  $this->modelbasic->get_city_list_by_state_id($data["job_post_details"]->state_id);
        $data["education_list"]     =  $this->modelbasic->get_all_courses();
        $this->load->view('template/header');
		$this->load->view('template/sidebar',$data);
		$this->load->view('job_posting/add_job_post',$data);
		$this->load->view('template/footer');
    }
    public function get_state_list()
    {
    $post= $this->input->post();//print_r($post);exit;
    $country_id = $post['country_id'];
    $importers = $this->modelbasic->get_states_list($country_id);
	$data['list_emp']=$importers;
    echo json_encode($data['list_emp']);
    }
    
    public function get_city_list()
    {
    $post= $this->input->post();
    $state_id = $post['state_id'];
    $importers = $this->modelbasic->get_city_list_by_state_id($state_id);
	$data['list_emp']=$importers;
    echo json_encode($data['list_emp']);
    }
    public function edit_job_post($job_post_id)
    {
        $data['siderbar_menus']   =  $this->M_permission->list_labels('internal user');
        $data["client_list"]      =  $this->m_admin->list_client();
        $data['list_cities']      =  $this->modelbasic->get_indian_state_cities();
        $data["job_post_details"] =  $this->modelbasic->get_details_job_post($job_post_id);
        $data["education_list"]   =  $this->modelbasic->get_all_courses();
        $this->load->view('template/header');
		$this->load->view('template/sidebar',$data);
		$this->load->view('job_posting/job_posting_edit.php',$data);
		$this->load->view('template/footer');
    }
    

    
    public function update_job_post_details($job_post_id)
    {
        $user_id = $_SESSION["user_id"]; 
        $post = $this->input->post();
        $data = 
        array
        (
            "company_name"               => $post["client_name"],
            "key_skills"                => $post["key_skills"],
            "comany_min_package_offer"  => $post["comany_min_package_offer"],
            "comany_max_package_offer"  => $post["comany_max_package_offer"],
            "min_exp_candidate"         => $post["min_exp_candidate"],
            "max_exp_candidate"         => $post["max_exp_candidate"],
            "job_location"              => $post["job_location"],
            "profile"                   => $post["profile"],
            "job_descriptions"          => $post["job_descriptions"],
            "job_opening_area_pincode"  => $post["job_opening_area_pincode"],
            "job_opening_address"       => $post["job_opening_address"],
            "role"                      => $post["role"],
            "role_category"             => $post["role_category"],
            "industry_type"             => $post["industry_type"],
            "department"                => $post["department"],
            "employment_type"           => $post["employment_type"],
            "role_cat"                  => $post["role_cat"],
            "education"                 => $post["education"],
            "company_about"             => $post["company_about"],
            "work_mode"                 => $post["work_mode"],
        );
        
        $result = $this->modelbasic->update_job_post_details($job_post_id,$data);
        if(@$result)
        {
        		 
        $this->session->set_flashdata('success','Job Pot Record Update Successfully!');
        }
        else
        {
        	$this->session->set_flashdata('error','Record Not Updated!');
        }
        redirect('recruiter/recruiter/list_job_post');
    }
    
    
	public function index()
	{
		header("Cache-Control: max-age=300, must-revalidate");
		$user_id = $this->session->userdata('user_id');
		$user_role = $this->session->userdata('user_role');
     $admin_id=$this->session->userdata('user_id');
          $data['list_client_requirement'] =$this->m_client->list_client_todays_post_list($admin_id);
          $data['todays_drive'] = $this->m_admin->get_todays_drive_count($admin_id);
          $data['todays_drive_non_it'] = $this->m_admin->get_todays_drive_non_it_count($admin_id);
          $data['tomorrow_drive'] = $this->m_admin->get_tomorrow_drive_count_by_user_id($user_id,$admin_id);
          $data['list_user'] =$this->m_task->list_task_dashboard($user_id,$admin_id);
          $data['project_list']=$this->project_management_model->project_list($admin_id);
        
		if ($user_role==9 || $user_role==10 ) 
		{
			$area = $this->session->userdata('client_id_search');
			$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
			//print_r($data['client_list']);die();
			$data['client_id_search']  =  $area;
			if(!empty($area)) 
			{
				$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_user_id($area,$user_id);  

				$client_id_search = $this->session->flashdata('area');
			}  	
		}
		elseif ($user_role==2) 
		{
			$area = $this->session->userdata('client_id_search');
			$data['client_list'] =$this->m_recruiter->client_list($admin_id);
			$data['client_id_search']  =  $area;
			if(!empty($area)) 
			{
				$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area);  

				$client_id_search = $this->session->flashdata('area');
			}  	
		}
		elseif($user_role==5)
		{
			$area = $this->session->userdata('client_id_search');
			$data['client_list'] =$this->m_recruiter->client_list($admin_id);

			$data['recruiter_tl_list'] = $this->m_dailyreport->selectRecruiterTl($admin_id);
			$data['client_id_search']  =  $area;
			if(!empty($area)) 
			{
				$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area);  
				$client_id_search = $this->session->flashdata('area');
			}
			$data['skill_list'] = $this->m_recruiter->get_candidate_skill_list();
			$data['location_list'] = $this->m_recruiter->get_candidate_location_list();
			$data['notice_period_list'] = $this->m_recruiter->get_candidate_notice_period_list();
		}elseif($user_role==1)
		{
			$area = $this->session->userdata('client_id_search');
			$data['client_list'] =$this->m_recruiter->client_list($admin_id);

			$data['recruiter_tl_list'] = $this->m_dailyreport->selectRecruiterTl($admin_id);
			$data['client_id_search']  =  $area;
			if(!empty($area)) 
			{
				$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area);  
				$client_id_search = $this->session->flashdata('area');
			}
			$data['skill_list'] = $this->m_recruiter->get_candidate_skill_list();
			$data['location_list'] = $this->m_recruiter->get_candidate_location_list();
			$data['notice_period_list'] = $this->m_recruiter->get_candidate_notice_period_list();
		}
		else
		{
			$area = $this->session->userdata('client_id_search');
			//$data['client_list'] =$this->m_recruiter->client_list($admin_id);
			$data['client_list'] =$this->m_recruiter->client_list_user($user_id);
			$data['recruiter_tl_list'] = $this->m_dailyreport->selectRecruiterTl($admin_id);
			$data['client_id_search']  =  $area;
			if(!empty($area))
			{
				//$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area);  
				$data['list_dailyreport'] = $this->m_recruiter->get_client_list_as_user_selected($user_id,$area);  
				$client_id_search = $this->session->flashdata('area');
			}
		}
		$this->BaseView('recruiter/dailyreport_list',$data);
	}
	
	
		public function non_it_recruitment()
	{
		header("Cache-Control: max-age=300, must-revalidate");
		$user_id = $this->session->userdata('user_id');
		$user_role = $this->session->userdata('user_role');
    //print_r($user_role); die();
	/*	if($user_role==1)
		{
			$admin_id=$this->session->userdata('user_id');
		}else
		{*/
			$admin_id=$this->session->userdata('admin_id');	
		/*}*/
        
		if ($user_role==9 || $user_role==10 ) 
		{
			$area = $this->session->userdata('client_id_search');
			$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
			$data['client_id_search']  =  $area;
			if(!empty($area)) 
			{
				$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_user_id($area,$user_id);  

				$client_id_search = $this->session->flashdata('area');
			}  	
		}
		elseif ($user_role==2) 
		{
			$area = $this->session->userdata('client_id_search');
			$data['client_list'] =$this->m_recruiter->client_list_non_it($admin_id);
			$data['client_id_search']  =  $area;
			if(!empty($area)) 
			{
				$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area);  

				$client_id_search = $this->session->flashdata('area');
			}  	
		}
		elseif($user_role==5)
		{
			$area = $this->session->userdata('client_id_search');
			$data['client_list'] =$this->m_recruiter->client_list_non_it($admin_id);

			$data['recruiter_tl_list'] = $this->m_dailyreport->selectRecruiterTl($admin_id);
			$data['client_id_search']  =  $area;
			if(!empty($area)) 
			{
				$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area);  
				$client_id_search = $this->session->flashdata('area');
			}
			$data['skill_list'] = $this->m_recruiter->get_candidate_skill_list();
			$data['location_list'] = $this->m_recruiter->get_candidate_location_list();
			$data['notice_period_list'] = $this->m_recruiter->get_candidate_notice_period_list();
		}elseif($user_role==1)
		{
			$area = $this->session->userdata('client_id_search');
			$data['client_list'] =$this->m_recruiter->client_list_non_it($admin_id);

			$data['recruiter_tl_list'] = $this->m_dailyreport->selectRecruiterTl($admin_id);
			$data['client_id_search']  =  $area;
			if(!empty($area)) 
			{
				$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area);  
				$client_id_search = $this->session->flashdata('area');
			}
			$data['skill_list'] = $this->m_recruiter->get_candidate_skill_list();
			$data['location_list'] = $this->m_recruiter->get_candidate_location_list();
			$data['notice_period_list'] = $this->m_recruiter->get_candidate_notice_period_list();
		}
		else
		{
			$area = $this->session->userdata('client_id_search');
			//$data['client_list'] =$this->m_recruiter->client_list($admin_id);
			$data['client_list'] =$this->m_recruiter->client_list_user($user_id);
			$data['recruiter_tl_list'] = $this->m_dailyreport->selectRecruiterTl($admin_id);
			$data['client_id_search']  =  $area;
			if(!empty($area))
			{
				//$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area);  
				$data['list_dailyreport'] = $this->m_recruiter->get_client_list_as_user_selected($user_id,$area);  
				$client_id_search = $this->session->flashdata('area');
			}
		}
		$this->BaseView('recruiter/non_it_dailyreport_list',$data);
	}


	public function getStateByCountry()
	{
		$country = $this->input->post('country',TRUE);
		$data['state'] = $this->m_recruiter->getStateByCountry($country);
		$this->load->view('recruiter/load_state',$data);	
	}


	public function getCitiesByState()
	{
		$state = $this->input->post('state',TRUE);
		$data['city'] = $this->m_recruiter->getCitiesByState($state);
		$this->load->view('recruiter/load_city',$data);
	}
	public function emails()
	{
		$state = $this->input->post('state',TRUE);
		$data['city'] = $this->m_recruiter->getCitiesByState($state);
		$data['siderbar_menus'] = $this->M_permission->list_labels('internal user');
		$this->load->view('recruiter/emails',$data);
	}
	public function resume_updation()
	{
		$state = $this->input->post('state',TRUE);
		$data['city'] = $this->m_recruiter->getCitiesByState($state);
		$data['siderbar_menus'] = $this->M_permission->list_labels('internal user');
		$this->load->view('recruiter/resume_updation',$data);
	}


	public function add()
	{
		$user_id = $this->session->userdata('user_id');
		$user_role = $this->session->userdata('user_role');

		if($user_role==1)
		{
			$admin_id=$this->session->userdata('user_id');
		}else
		{
			$admin_id=$this->session->userdata('admin_id');	
		}
		$data['client_list'] =$this->m_recruiter->client_list_by_user_id_for_all($admin_id);
		$data['country']  = $this->m_recruiter->getCountry();	
		$data['state']  = $this->m_recruiter->getState();	
		$data['city']  = $this->m_recruiter->getCity();
		$data['genuinity_questions'] = $this->m_recruiter->get_genuinity_questions();
		$data['genuinity_answers'] = $this->m_recruiter->get_genuinity_answers();

		$this->Baseview('recruiter/dailyreport_add',$data);
	}
	
   public function add_candidate_entry($job_profile_id)
	{
		$user_id = $this->session->userdata('user_id');
		$user_role = $this->session->userdata('user_role');
        $job_profile_details = $this->m_admin_user->get_job_profile_by_id($job_profile_id);
        $client_ids = explode(",",$job_profile_details->client_ids);
        $data["job_profile_id"] = $job_profile_id;
       
		if($user_role==1)
		{
			$admin_id=$this->session->userdata('user_id');
		}else
		{
			$admin_id=$this->session->userdata('admin_id');	
		}
		$data['client_list'] =$this->m_recruiter->get_job_profile_selected_clients_list_vendor($client_ids);
		$data['country']  = $this->m_recruiter->getCountry();	
		$data['state']  = $this->m_recruiter->getState();	
		$data['city']  = $this->m_recruiter->getCity();
		$data['genuinity_questions'] = $this->m_recruiter->get_genuinity_questions();
		$data['genuinity_answers'] = $this->m_recruiter->get_genuinity_answers();

		$this->Baseview('recruiter/vendor_dailyreport_add',$data);
	}
	
	
  public function add_non_it()
	{
		$user_id = $this->session->userdata('user_id');
		$user_role = $this->session->userdata('user_role');

		if($user_role==1)
		{
			$admin_id=$this->session->userdata('user_id');
		}else
		{
			$admin_id=$this->session->userdata('admin_id');	
		}
		$data['client_list'] =$this->m_recruiter->client_list_by_user_id_for_all_non_recruiter($admin_id);
		$data['country']  = $this->m_recruiter->getCountry();	
		$data['state']  = $this->m_recruiter->getState();	
		$data['city']  = $this->m_recruiter->getCity();
		$data['genuinity_questions'] = $this->m_recruiter->get_genuinity_questions();
		$data['genuinity_answers'] = $this->m_recruiter->get_genuinity_answers();

		$this->Baseview('recruiter/non_it_dailyreport_add',$data);
	}

	public	function exceldataadd()	
	{ 
		$user_role = $this->session->userdata('user_role');

		if($user_role==1)
		{
			$admin_id=$this->session->userdata('user_id');
		}else
		{
			$admin_id=$this->session->userdata('admin_id');	
		}

		$configUpload['upload_path'] = FCPATH.'uploads/uploadedfiles/';
		$configUpload['allowed_types'] = 'xls|xlsx|';
//$configUpload['max_size'] = '5000';
		$configUpload['max_size'] = '0';
		$this->upload->initialize($configUpload);
		$this->upload->do_upload('userfile');
$upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
$file_name = $upload_data['file_name']; //uploded file name
$extension=$upload_data['file_ext'];    // uploded file extension
$objReader =PHPExcel_IOFactory::createReader('Excel5');     //For excel 2003 
$objReader->setReadDataOnly(false); 		  
$objPHPExcel=$objReader->load(FCPATH.'uploads/uploadedfiles/'.$file_name);

$num=$objPHPExcel->getSheetCount();
$sheetnames=$objPHPExcel->getSheetNames();
$sheetnum=$num-1;

$sheet_id=array();
$sheet_name=array();

$data['client_list'] =$this->m_recruiter->client_list($admin_id);
foreach ($data['client_list'] as $value) {
	$sheet_id[] = $value['client_id'];
	$sheet_name[] = $value['client_name'];
}

for($sl=0;$sl<=$sheetnum;$sl++) 
{			
$highestRow=$objPHPExcel->setActiveSheetIndex($sl)->getHighestRow();   //Count Numbe of rows avalable in excel 
$objWorksheet = $objPHPExcel->getActiveSheet($sl);
$sheetName = $objPHPExcel->getActiveSheet($sl)->getTitle(); 

if(in_array($sheetName, $sheet_name))
{
	$index = array_search($sheetName, $sheet_name);
	$sheetid = $sheet_id[$index];
	$sheetName = $sheet_name[$index];
}
else
{
	$query = $this->db->query("SELECT MAX(sheetid) as sheetid from tbl_dailyreport_recruiter");
	$sheetid = $query->row()->sheetid+1; 
	$sheetName = $sheetName;
}
if(empty($sheetid))
{
	$query = $this->db->query("SELECT MAX(sheetid) as sheetid from tbl_dailyreport_recruiter");
	$sheetid = $query->row()->sheetid+1; 
}
/*$query = $this->db->query("SELECT MAX(sheetid) as sheetid from tbl_dailyreport_recruiter");
$sheetid = $query->row()->sheetid+1; 
$sheetName = $sheetName;*/
for($cl=2;$cl<=$highestRow;$cl++)
{
	$sr_no= $objWorksheet->getCellByColumnAndRow(0,$cl)->getValue();
$date= $objWorksheet->getCellByColumnAndRow(1,$cl)->getValue(); //Excel Column 1
$company_client= $objWorksheet->getCellByColumnAndRow(2,$cl)->getValue(); //Excel Column 2
$position_skills= $objWorksheet->getCellByColumnAndRow(3,$cl)->getValue(); //Excel Column 2
$rp_id=$objWorksheet->getCellByColumnAndRow(4,$cl)->getValue(); //Excel Column 3
$candidate_name=$objWorksheet->getCellByColumnAndRow(5,$cl)->getValue(); //Excel Column 4

$color = $objWorksheet->getCellByColumnAndRow(5,$cl)->getStyle(5,$cl)->getFill()->getStartColor()->getRGB();
$color = "#".$color;

if($color=="#000000")
{
	$color = "#FFFFFF";
}

$applicant_id=$objWorksheet->getCellByColumnAndRow(6,$cl)->getValue(); //Excel Column 5

$role=$objWorksheet->getCellByColumnAndRow(7,$cl)->getValue(); //Excel Column 6
$qulification=$objWorksheet->getCellByColumnAndRow(8,$cl)->getValue(); //Excel Column 7
$company_name=$objWorksheet->getCellByColumnAndRow(9,$cl)->getValue(); //Excel Column 8
$yrs_of_experience=$objWorksheet->getCellByColumnAndRow(10,$cl)->getValue(); //Excel Column 8
$relevant_exp=$objWorksheet->getCellByColumnAndRow(11,$cl)->getValue(); //Excel Column 8
$ctc=$objWorksheet->getCellByColumnAndRow(12,$cl)->getValue(); //Excel Column 8
$exp_ctc=$objWorksheet->getCellByColumnAndRow(13,$cl)->getValue(); //Excel Column 8

$notice_period=$objWorksheet->getCellByColumnAndRow(14,$cl)->getValue(); //Excel Column 8
$official_onpaper_notice_period=$objWorksheet->getCellByColumnAndRow(15,$cl)->getValue(); //Excel Column 8
$contact_no=$objWorksheet->getCellByColumnAndRow(16,$cl)->getValue(); //Excel Column 8
$alternate_contact_number=$objWorksheet->getCellByColumnAndRow(17,$cl)->getValue(); //Excel Column 8
$email_id=$objWorksheet->getCellByColumnAndRow(18,$cl)->getValue(); //Excel Column 8
$alternate_email_id=$objWorksheet->getCellByColumnAndRow(19,$cl)->getValue(); //Excel Column 8
$location=$objWorksheet->getCellByColumnAndRow(20,$cl)->getValue(); //Excel Column 8
$preffered_location=$objWorksheet->getCellByColumnAndRow(21,$cl)->getValue(); //Excel Column 8

$client_feedback=$objWorksheet->getCellByColumnAndRow(22,$cl)->getValue(); //Excel Column 8
$interview_schedule=$objWorksheet->getCellByColumnAndRow(23,$cl)->getValue(); //Excel Column 8
$final_status=$objWorksheet->getCellByColumnAndRow(24,$cl)->getValue(); //Excel Column 8
$client_recruiter=$objWorksheet->getCellByColumnAndRow(25,$cl)->getValue(); //Excel Column 8
$sourced_by=$objWorksheet->getCellByColumnAndRow(26,$cl)->getValue(); //Excel Column 8
$reason_for_job_change=$objWorksheet->getCellByColumnAndRow(27,$cl)->getValue(); //Excel Column 8

// 0 means contact_no and email_id is not exists in respective sheet
if( (!empty($contact_no)) AND (!empty($email_id)) )
{
	$user_id_login = $this->session->userdata('user_id');

	@$check_contact_no_email_id    =    $this->m_recruiter->check_contact_no_email_id($contact_no,$email_id,$sheetid);

	if( ($check_contact_no_email_id==0) )
	{
		@$check_contact_no    =    $this->m_recruiter->check_contact_no($contact_no,$sheetid);
		if($check_contact_no==0)
		{
			@$check_email_id    =    $this->m_recruiter->check_contact_no_email_id($contact_no,$email_id,$sheetid);
			if($check_email_id==1)
			{
				$query=$this->db->query("SELECT dailyreport_id, user_id FROM tbl_dailyreport_recruiter WHERE email_id='$email_id'");
				@$dailyreport_id = $query->row()->dailyreport_id; 
				@$user_id_db = $query->row()->user_id;

				if($user_id_db==$user_id_login){
					$data_user=array(
						'sheetid'							=>  		$sheetid,
						'sheetname'							=>  		$sheetName,

						'user_id'							=>			$this->session->userdata('user_id'), 
						'sr_no'								=>  		$sr_no,
						'date'								=>  		$date,
						'company_client'					=>  		$company_client,
						'position_skills'					=>  		$position_skills,
						'rp_id'								=>  		$rp_id,
						'candidate_name'					=>  		$candidate_name,
						'color'								=>  		@$color,

						'applicant_id'						=>  		$applicant_id,

						'role'								=>  		$role,
						'qulification'						=>  		$qulification,
						'company_name'						=>  		$company_name,
						'yrs_of_experience'					=>  		$yrs_of_experience,
						'relevant_exp'						=>  		$relevant_exp,
						'ctc'								=>  		$ctc,
						'exp_ctc'							=>  		$exp_ctc,

						'notice_period'						=>  		$notice_period,
						'official_onpaper_notice_period'	=>  		$official_onpaper_notice_period,
						'contact_no'						=>  		$contact_no,
						'alternate_contact_number'			=>  		$alternate_contact_number,
						'email_id'							=>  		$email_id,
						'alternate_email_id'				=>  		$alternate_email_id,
						'location'							=>  		$location,
						'preffered_location'				=>  		$preffered_location,

						'client_feedback'					=>  		$client_feedback,
						'interview_schedule'				=>  		$interview_schedule,
						'final_status'						=>  		$final_status,
						'client_recruiter'					=>  		$client_recruiter,
						'sourced_by'						=>  		$sourced_by,
						'reason_for_job_change'				=>  		$reason_for_job_change
					);
					$result=$this->m_recruiter->update_uploaded_sheet($data_user,$dailyreport_id);	
				}					
			}
			else
			{
				@$check_email_id    =    $this->m_recruiter->check_email_id($email_id,$sheetid);
				if($check_email_id==1)
				{
					$query=$this->db->query("SELECT dailyreport_id,user_id FROM tbl_dailyreport_recruiter WHERE email_id='$email_id'");
					@$dailyreport_id = $query->row()->dailyreport_id; 
					@$user_id_db = $query->row()->user_id;

					if($user_id_db==$user_id_login){
						$data_user=array(
							'sheetid'							=>  		$sheetid,
							'sheetname'							=>  		$sheetName,

							'user_id'							=>			$this->session->userdata('user_id'), 
							'sr_no'								=>  		$sr_no,
							'date'								=>  		$date,
							'company_client'					=>  		$company_client,
							'position_skills'					=>  		$position_skills,
							'rp_id'								=>  		$rp_id,
							'candidate_name'					=>  		$candidate_name,
							'color'								=>  		@$color,

							'applicant_id'						=>  		$applicant_id,

							'role'								=>  		$role,
							'qulification'						=>  		$qulification,
							'company_name'						=>  		$company_name,
							'yrs_of_experience'					=>  		$yrs_of_experience,
							'relevant_exp'						=>  		$relevant_exp,
							'ctc'								=>  		$ctc,
							'exp_ctc'							=>  		$exp_ctc,

							'notice_period'						=>  		$notice_period,
							'official_onpaper_notice_period'	=>  		$official_onpaper_notice_period,
							'contact_no'						=>  		$contact_no,
							'alternate_contact_number'			=>  		$alternate_contact_number,
							'email_id'							=>  		$email_id,
							'alternate_email_id'				=>  		$alternate_email_id,
							'location'							=>  		$location,
							'preffered_location'				=>  		$preffered_location,

							'client_feedback'					=>  		$client_feedback,
							'interview_schedule'				=>  		$interview_schedule,
							'final_status'						=>  		$final_status,
							'client_recruiter'					=>  		$client_recruiter,
							'sourced_by'						=>  		$sourced_by,
							'reason_for_job_change'				=>  		$reason_for_job_change
						);
						$result=$this->m_recruiter->update_uploaded_sheet($data_user,$dailyreport_id);												
					}
				}
				else
				{
					$data_user=array(
						'sheetid'							=>  		$sheetid,
						'sheetname'							=>  		$sheetName,

						'user_id'							=>			$this->session->userdata('user_id'), 
						'sr_no'								=>  		$sr_no,
						'date'								=>  		$date,
						'company_client'					=>  		$company_client,
						'position_skills'					=>  		$position_skills,
						'rp_id'								=>  		$rp_id,
						'candidate_name'					=>  		$candidate_name,
						'color'								=>  		@$color,

						'applicant_id'						=>  		$applicant_id,

						'role'								=>  		$role,
						'qulification'						=>  		$qulification,
						'company_name'						=>  		$company_name,
						'yrs_of_experience'					=>  		$yrs_of_experience,
						'relevant_exp'						=>  		$relevant_exp,
						'ctc'								=>  		$ctc,
						'exp_ctc'							=>  		$exp_ctc,

						'notice_period'						=>  		$notice_period,
						'official_onpaper_notice_period'	=>  		$official_onpaper_notice_period,
						'contact_no'						=>  		$contact_no,
						'alternate_contact_number'			=>  		$alternate_contact_number,
						'email_id'							=>  		$email_id,
						'alternate_email_id'				=>  		$alternate_email_id,
						'location'							=>  		$location,
						'preffered_location'				=>  		$preffered_location,

						'client_feedback'					=>  		$client_feedback,
						'interview_schedule'				=>  		$interview_schedule,
						'final_status'						=>  		$final_status,
						'client_recruiter'					=>  		$client_recruiter,
						'sourced_by'						=>  		$sourced_by,
						'reason_for_job_change'				=>  		$reason_for_job_changef
					);
					$result=$this->m_recruiter->insert($data_user);						
				}

			}						
		}
		elseif($check_contact_no==1)
		{
			@$check_email_id    =    $this->m_recruiter->check_contact_no_email_id($contact_no,$email_id,$sheetid);
			if($check_email_id==1)
			{
				$query=$this->db->query("SELECT dailyreport_id,user_id FROM tbl_dailyreport_recruiter WHERE email_id='$email_id'");
				@$dailyreport_id = $query->row()->dailyreport_id; 
				@$user_id_db = $query->row()->user_id;

				if($user_id_db==$user_id_login){
					$data_user=array(
						'sheetid'							=>  		$sheetid,
						'sheetname'							=>  		$sheetName,

						'user_id'							=>			$this->session->userdata('user_id'), 
						'sr_no'								=>  		$sr_no,
						'date'								=>  		$date,
						'company_client'					=>  		$company_client,
						'position_skills'					=>  		$position_skills,
						'rp_id'								=>  		$rp_id,
						'candidate_name'					=>  		$candidate_name,
						'color'								=>  		@$color,

						'applicant_id'						=>  		$applicant_id,

						'role'								=>  		$role,
						'qulification'						=>  		$qulification,
						'company_name'						=>  		$company_name,
						'yrs_of_experience'					=>  		$yrs_of_experience,
						'relevant_exp'						=>  		$relevant_exp,
						'ctc'								=>  		$ctc,
						'exp_ctc'							=>  		$exp_ctc,

						'notice_period'						=>  		$notice_period,
						'official_onpaper_notice_period'	=>  		$official_onpaper_notice_period,
						'contact_no'						=>  		$contact_no,
						'alternate_contact_number'			=>  		$alternate_contact_number,
						'email_id'							=>  		$email_id,
						'alternate_email_id'				=>  		$alternate_email_id,
						'location'							=>  		$location,
						'preffered_location'				=>  		$preffered_location,

						'client_feedback'					=>  		$client_feedback,
						'interview_schedule'				=>  		$interview_schedule,
						'final_status'						=>  		$final_status,
						'client_recruiter'					=>  		$client_recruiter,
						'sourced_by'						=>  		$sourced_by,
						'reason_for_job_change'				=>  		$reason_for_job_change
					);
					$result=$this->m_recruiter->update_uploaded_sheet($data_user,$dailyreport_id);	
				}					
			}
			else
			{
				@$check_email_id    =    $this->m_recruiter->check_email_id($email_id,$sheetid);
				if($check_email_id==1)
				{
/*$data_user=array(
'sheetid'							=>  		$sheetid,
'sheetname'							=>  		$sheetName
);
$result=$this->m_recruiter->insert($data_user);*/											
}
else
{
	@$check_email_idzx    =    $this->m_recruiter->check_contact_no_email_id($contact_no,$email_id,$sheetid);
	if($check_email_idzx==0)
	{
		$query=$this->db->query("SELECT dailyreport_id,user_id FROM tbl_dailyreport_recruiter WHERE contact_no='$contact_no'");
		@$dailyreport_id = $query->row()->dailyreport_id; 
		@$user_id_db = $query->row()->user_id;

		if($user_id_db==$user_id_login){
			$data_user=array(
				'sheetid'							=>  		$sheetid,
				'sheetname'							=>  		$sheetName,

				'user_id'							=>			$this->session->userdata('user_id'), 
				'sr_no'								=>  		$sr_no,
				'date'								=>  		$date,
				'company_client'					=>  		$company_client,
				'position_skills'					=>  		$position_skills,
				'rp_id'								=>  		$rp_id,
				'candidate_name'					=>  		$candidate_name,
				'color'								=>  		@$color,

				'applicant_id'						=>  		$applicant_id,

				'role'								=>  		$role,
				'qulification'						=>  		$qulification,
				'company_name'						=>  		$company_name,
				'yrs_of_experience'					=>  		$yrs_of_experience,
				'relevant_exp'						=>  		$relevant_exp,
				'ctc'								=>  		$ctc,
				'exp_ctc'							=>  		$exp_ctc,

				'notice_period'						=>  		$notice_period,
				'official_onpaper_notice_period'	=>  		$official_onpaper_notice_period,
				'contact_no'						=>  		$contact_no,
				'alternate_contact_number'			=>  		$alternate_contact_number,
				'email_id'							=>  		$email_id,
				'alternate_email_id'				=>  		$alternate_email_id,
				'location'							=>  		$location,
				'preffered_location'				=>  		$preffered_location,

				'client_feedback'					=>  		$client_feedback,
				'interview_schedule'				=>  		$interview_schedule,
				'final_status'						=>  		$final_status,
				'client_recruiter'					=>  		$client_recruiter,
				'sourced_by'						=>  		$sourced_by,
				'reason_for_job_change'				=>  		$reason_for_job_change
			);
			$result=$this->m_recruiter->update_uploaded_sheet($data_user,$dailyreport_id);						
		}
	}
	else
	{
		$query=$this->db->query("SELECT dailyreport_id,user_id FROM tbl_dailyreport_recruiter WHERE email_id='$email_id'");
		@$dailyreport_id = $query->row()->dailyreport_id; 
		@$user_id_db = $query->row()->user_id;

		if($user_id_db==$user_id_login){
			$data_user=array(
				'sheetid'							=>  		$sheetid,
				'sheetname'							=>  		$sheetName,

				'user_id'							=>			$this->session->userdata('user_id'), 
				'sr_no'								=>  		$sr_no,
				'date'								=>  		$date,
				'company_client'					=>  		$company_client,
				'position_skills'					=>  		$position_skills,
				'rp_id'								=>  		$rp_id,
				'candidate_name'					=>  		$candidate_name,
				'color'								=>  		@$color,

				'applicant_id'						=>  		$applicant_id,

				'role'								=>  		$role,
				'qulification'						=>  		$qulification,
				'company_name'						=>  		$company_name,
				'yrs_of_experience'					=>  		$yrs_of_experience,
				'relevant_exp'						=>  		$relevant_exp,
				'ctc'								=>  		$ctc,
				'exp_ctc'							=>  		$exp_ctc,

				'notice_period'						=>  		$notice_period,
				'official_onpaper_notice_period'	=>  		$official_onpaper_notice_period,
				'contact_no'						=>  		$contact_no,
				'alternate_contact_number'			=>  		$alternate_contact_number,
				'email_id'							=>  		$email_id,
				'alternate_email_id'				=>  		$alternate_email_id,
				'location'							=>  		$location,
				'preffered_location'				=>  		$preffered_location,

				'client_feedback'					=>  		$client_feedback,
				'interview_schedule'				=>  		$interview_schedule,
				'final_status'						=>  		$final_status,
				'client_recruiter'					=>  		$client_recruiter,
				'sourced_by'						=>  		$sourced_by,
				'reason_for_job_change'				=>  		$reason_for_job_change
			);
			$result=$this->m_recruiter->update_uploaded_sheet($data_user,$dailyreport_id);
		}
	}											
}
}
}
}
elseif( ($check_contact_no_email_id==1) )
{
	$query=$this->db->query("SELECT dailyreport_id,user_id FROM tbl_dailyreport_recruiter WHERE contact_no='$contact_no' AND email_id='$email_id'");
	@$dailyreport_id = $query->row()->dailyreport_id; 
	@$user_id_db = $query->row()->user_id;

	if($user_id_db==$user_id_login){
		$data_user=array(
			'sheetid'							=>  		$sheetid,
			'sheetname'							=>  		$sheetName,

			'user_id'							=>			$this->session->userdata('user_id'), 
			'sr_no'								=>  		$sr_no,
			'date'								=>  		$date,
			'company_client'					=>  		$company_client,
			'position_skills'					=>  		$position_skills,
			'rp_id'								=>  		$rp_id,
			'candidate_name'					=>  		$candidate_name,
			'color'								=>  		@$color,

			'applicant_id'						=>  		$applicant_id,

			'role'								=>  		$role,
			'qulification'						=>  		$qulification,
			'company_name'						=>  		$company_name,
			'yrs_of_experience'					=>  		$yrs_of_experience,
			'relevant_exp'						=>  		$relevant_exp,
			'ctc'								=>  		$ctc,
			'exp_ctc'							=>  		$exp_ctc,

			'notice_period'						=>  		$notice_period,
			'official_onpaper_notice_period'	=>  		$official_onpaper_notice_period,
			'contact_no'						=>  		$contact_no,
			'alternate_contact_number'			=>  		$alternate_contact_number,
			'email_id'							=>  		$email_id,
			'alternate_email_id'				=>  		$alternate_email_id,
			'location'							=>  		$location,
			'preffered_location'				=>  		$preffered_location,

			'client_feedback'					=>  		$client_feedback,
			'interview_schedule'				=>  		$interview_schedule,
			'final_status'						=>  		$final_status,
			'client_recruiter'					=>  		$client_recruiter,
			'sourced_by'						=>  		$sourced_by,
			'reason_for_job_change'				=>  		$reason_for_job_change
		);
		$result=$this->m_recruiter->update_uploaded_sheet($data_user,$dailyreport_id);
	}
}
}

}
}

if(@$result)
{
unlink('uploads/uploadedfiles/'.@$file_name); //File Deleted After uploading in database .			 
$this->session->set_flashdata('success','Record added Successfully!');
}
else
{
	$this->session->set_flashdata('error','Record not added!');
}
redirect('recruiter/recruiter');
}

public function save()
{
	    $sheetid= $this->input->post('client_id');
	    /*print_r($this->input->post());exit();*/
	if(!empty($sheetid))
	{
          // 		$query = $this->db->query("SELECT sheetname from tbl_dailyreport_recruiter where sheetid = ".@$sheetid);
          // 		@$sheetname = $query->row()->sheetname; 
         $query = $this->db->query("SELECT client_name from client where client_id = ".@$sheetid);
		@$sheetname = $query->row()->client_name; 
		@$interview_schedule = $this->input->post('interview_schedule',TRUE);
		if(!empty($interview_schedule)){
			@$interview_schedule =  date('Y-m-d H:i:s', strtotime($interview_schedule));
		}else{
			@$interview_schedule =  "0000-00-00 00:00:00";
		}

		$mydata = array(

			'user_id'                             =>          @$this->session->userdata('user_id'),
			'admin_id'                            =>          @$this->session->userdata('admin_id'),
			'sheetid'                             =>          @$this->input->post('client_id',TRUE),           
			'sheetname'                           =>          @$sheetname,
			'date'                                =>          @$this->input->post('date',TRUE),
            'company_client'                      =>          @$sheetname,
			'position_skills'                     =>          @$this->input->post('position_skills',TRUE),
			'rp_id'                               =>          @$this->input->post('rp_id',TRUE),
			'candidate_name'                      =>          @$this->input->post('candidate_name',TRUE),
			'applicant_id'                        =>          @$this->input->post('applicant_id',TRUE),
			'role'                                =>          @$this->input->post('role',TRUE),
			'qulification'                        =>          @$this->input->post('qulification',TRUE),
			'company_name'                        =>          @$this->input->post('company_name',TRUE),
			'yrs_of_experience'                   =>          @$this->input->post('yrs_of_experience',TRUE),
			'months_of_experience'                =>          @$this->input->post('months_of_experience',TRUE),
			'relevant_exp'                        =>          @$this->input->post('relevant_exp',TRUE),
			'ctc'                                 =>          @$this->input->post('ctc',TRUE),
			'ctc_thousand'                        =>          @$this->input->post('ctc_thousand',TRUE),
			'exp_ctc'                             =>          @$this->input->post('exp_ctc',TRUE),
			'notice_period'                       =>          @$this->input->post('notice_period',TRUE),
			'official_onpaper_notice_period'      =>          @$this->input->post('official_onpaper_notice_period',TRUE),
			'contact_no'                          =>          @$this->input->post('contact_no',TRUE),
			'alternate_contact_number'            =>          @$this->input->post('alternate_contact_number',TRUE),
			'email_id'                            =>          @$this->input->post('email_id',TRUE),
			'alternate_email_id'                  =>          @$this->input->post('alternate_email_id',TRUE),
			'country'                             =>          @$this->input->post('country',TRUE),
			'state'                               =>          @$this->input->post('state',TRUE),
			'location'                            =>          @$this->input->post('location',TRUE),
			'preffered_location'                  =>          @$this->input->post('preffered_location',TRUE),
			'client_feedback'                     =>          @$this->input->post('client_feedback',TRUE),
			'interview_schedule'                  =>          @$interview_schedule,
			'interview_schedule_mode'             =>          @$this->input->post('interview_schedule_mode',TRUE),
			'final_status'                        =>          @$this->input->post('final_status',TRUE),
			'client_recruiter'                    =>          @$this->input->post('client_recruiter',TRUE),
			'sourced_by'                          =>          @$this->input->post('sourced_by',TRUE),
			'reason_for_job_change'               =>          @$this->input->post('reason_for_job_change',TRUE),
			'color'                               =>          @$this->input->post('color_id',TRUE),				
			'star_rating'                         =>          @$this->input->post('star_rating',TRUE),
			'record_added_datetime'               =>          date("Y-m-d H:i:s")
		);


		$result	=$this->m_recruiter->insert($mydata);
			$user=$this->session->userdata('user_id');
//  		print_r($this->input->post('files_o'));exit;
         if(!empty($_FILES['files_o']['name']))
    {
        // if($result){
        $config['upload_path'] ='uploads/recuiter_company_images/'.$user;
			if (!is_dir('uploads/recuiter_company_images/'.$user)) 
			{
	    		mkdir('uploads/recuiter_company_images/' . $user, 0777, TRUE);
			}
        // $filesCount =$this->input->post('count');
        $filesCount =count($_FILES['files_o']['name']);
        //  print_r($filesCount);exit;
        // print_r();exit;
		for($i = 0; $i < $filesCount; $i++)
		{
            $_FILES['userFile']['name'] = $_FILES['files_o']['name'][$i];
			$_FILES['userFile']['type'] = $_FILES['files_o']['type'][$i];
			$_FILES['userFile']['tmp_name'] = $_FILES['files_o']['tmp_name'][$i];
			$_FILES['userFile']['error'] = $_FILES['files_o']['error'][$i];
			$_FILES['userFile']['size'] = $_FILES['files_o']['size'][$i];
			$uploadPath = 'uploads/recuiter_company_images/'.$user;
			$config['upload_path'] = $uploadPath;
			$config['allowed_types'] = '*';
			$config['max_size'] = '0';
    		$config['max_width']  = '0';
    		$config['max_height']  = '0';
            $config['remove_spaces'] = FALSE;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if($this->upload->do_upload('userFile'))
			{
				$fileData = $this->upload->data();
				$uploadData[$i]['tbl_dailyreport_recruiter_id'] = $result;
				$uploadData[$i]['added_by'] = $this->session->userdata('user_id');
				$uploadData[$i]['admin_id'] = $this->session->userdata('admin_id');
				$uploadData[$i]['uploaded_file'] = $fileData['file_name'];
				$uploadData[$i]['created'] = date("Y-m-d H:i:s");
			
				
			}
}
      	    
if(!empty($uploadData))
	      {
	          $result1 = $this->m_recruiter->insert_company_images_by_recruiter($uploadData);
	      }
        // }
        
    }

		$totalmarks=0;
		if ($this->input->post('genuinity_check')) 
		{
			$no_of_questions = $this->m_recruiter->get_no_of_questions(1);
			$question_id = $this->input->post('gen_question_id');
			for ($i = 0; $i < $no_of_questions; $i++) {
				$marks = $this->m_recruiter->get_marks_for_question($question_id[$i]);
				$marks_for_question = $marks[0]->question_marks;
				$result1 = $this->m_recruiter->get_correct_answer($question_id[$i]);
				$selected_answer = $this->input->post("questions_answer_" . $question_id[$i]);
				if($result1->answer_id == $selected_answer){
					$marks = $marks_for_question;
					$totalmarks+=$marks;               
				} else {
					$marks = 0;
					$totalmarks+=$marks;               
				}
				$data = array('candidate_question_question_id' => $question_id[$i],
					'candidate_question_candidate_id' =>$result,
					'candidate_question_answer_id' =>$result1->answer_id,
					'candidate_question_marks' => $marks
				);
				$this->db->insert('candidate_question', $data);
			}
		}	

		$this->m_recruiter->update_total_marks($result, $totalmarks);

// 		$config['upload_path'] ='uploads/resume/'.$result.'/';

// 		if (!is_dir('uploads/resume/'.$result)) 
// 		{
// 			mkdir('uploads/resume/' . $result, 0777, TRUE);
// 		}

// 		$_FILES['userFile']['name'] = $_FILES['userFiles']['name'];
// 		$_FILES['userFile']['type'] = $_FILES['userFiles']['type'];
// 		$_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'];
// 		$_FILES['userFile']['error'] = $_FILES['userFiles']['error'];
// 		$_FILES['userFile']['size'] = $_FILES['userFiles']['size'];

// 		$uploadPath = $config['upload_path'];
// 		$config['upload_path'] = $uploadPath;
// 		$config['allowed_types'] = 'pdf|doc|docx';
// 		$config['max_size']	= '10000000';

// 		$this->load->library('upload', $config);
// 		$this->upload->initialize($config);
// 		if($this->upload->do_upload('userFile')){
// 			$fileData = $this->upload->data();
// 			$uploadData = $config['upload_path'].$fileData['file_name'];
// 		}

// 		if(!empty($uploadData)) { $resume = $uploadData; }
// 		else { $resume = ""; }
		
// 		if(!empty($resume))
// 		{
		    
// 		 $fileArray = pathinfo($resume);
//         $file_ext  = $fileArray['extension'];
//         if($file_ext == "doc" || $file_ext == "docx")
//         {
             
//             if($file_ext == "doc") 
//             {
//                 $resume_string= $this->read_doc($resume);
//             } elseif($file_ext == "docx") 
//             {

//           $resume_string= $this->read_docx($resume);
//             } 
//         } else 
//         {
//             $resume_string="";
//         } 
		    
		    
// 		}
		
// 		//print_r($resume);exit;
		
		 

// 		$data = array('resume' => $resume,
// 		              'resume_string'=>@$resume_string);
// 		$this->db->where('dailyreport_id', $result);
// 		$this->db->update('tbl_dailyreport_recruiter', $data);
// print_r('$uploadData1');
if($_FILES['userFiles1']['name']){   
    //  	print_r('$uploadData2');exit;
		$config['upload_path'] ='uploads/resume/'.$result.'/';

		if (!is_dir('uploads/resume/'.$result)) 
		{
			mkdir('uploads/resume/' . $result, 0777, TRUE);
		}

		$_FILES['userFile1']['name'] = $_FILES['userFiles1']['name'];
		$_FILES['userFile1']['type'] = $_FILES['userFiles1']['type'];
		$_FILES['userFile1']['tmp_name'] = $_FILES['userFiles1']['tmp_name'];
		$_FILES['userFile1']['error'] = $_FILES['userFiles1']['error'];
		$_FILES['userFile1']['size'] = $_FILES['userFiles1']['size'];

		$uploadPath1 = $config['upload_path'];
		$config['upload_path'] = $uploadPath1;
		$config['allowed_types'] = 'pdf|doc|docx';
		$config['max_size']	= '10000000';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if($this->upload->do_upload('userFile1')){
			$fileData = $this->upload->data();
			$uploadData1 = $config['upload_path'].$fileData['file_name'];
		}
        
		if(!empty($uploadData1)) { $resume = $uploadData1; }
		else { $resume = ""; }
		
		if(!empty($resume))
		{
		    
		 $fileArray = pathinfo($resume);
        $file_ext  = $fileArray['extension'];
        if($file_ext == "doc" || $file_ext == "docx")
        {
             
            if($file_ext == "doc") 
            {
                // $resume_string= $this->read_doc($resume);
            } elseif($file_ext == "docx") 
            {
                // $resume_string= $this->read_docx($resume);
                // $resume_string= $this->read_doc($resume);
                $resume_string = '';
            } 
        } else 
        {
            $resume_string="";
        } 
		    
	    
		}
		
		//print_r($resume);exit;
		
		 

		$data = array('resume' => $resume,
		              'resume_string'=>@$resume_string);
		$this->db->where('dailyreport_id', $result);
		$this->db->update('tbl_dailyreport_recruiter', @$data);

}

		$this->session->set_flashdata('success','Record added Successfully!');
		redirect('recruiter/recruiter');


	}
	else
	{
		redirect('recruiter/recruiter/add');
	}

}

public function save_candidate_entry_by_vendor()
{
	$sheetid= $this->input->post('client_id'); 
	$user_id = $this->session->userdata('user_id');
    $check_vendor_its_vendor =$query = $this->db->query("SELECT * from user_admin where user_admin_id = ".@$user_id);
	@$check_vendor_its_vendors = $query->row();
	
	if($check_vendor_its_vendors->role == '1009')
	{
	   $vendor_id =  $user_id;
	   $recruiter_id = "";
	}
	else
	{
	  $vendor_id =  '';  
	  $recruiter_id = $user_id;

	}

	if(!empty($sheetid))
	{
// 		$query = $this->db->query("SELECT sheetname from tbl_dailyreport_recruiter where sheetid = ".@$sheetid);
// 		@$sheetname = $query->row()->sheetname; 
        $query = $this->db->query("SELECT client_name from client where client_id = ".@$sheetid);
		@$sheetname = $query->row()->client_name; 
		#$interview_schedule = $this->input->post('interview_schedule',TRUE);
		if(!empty($interview_schedule)){
			@$interview_schedule =  date('Y-m-d H:i:s', strtotime($interview_schedule));
		}else{
			@$interview_schedule =  "0000-00-00 00:00:00";
		}

		$mydata = array(
		    
			'user_id'                            =>       @$recruiter_id,
			'admin_id'                           =>       @$this->session->userdata('admin_id'),
			'sheetid'                            =>       @$this->input->post('client_id',TRUE),           
			'sheetname'                          =>       @$sheetname,
			'date'                               =>       @$this->input->post('date',TRUE),
// 			'company_client'                     =>       @$this->input->post('company_client',TRUE),
            'company_client'                     =>       @$sheetname,
			'position_skills'                    =>       @$this->input->post('position_skills',TRUE),
			'rp_id'                              =>       @$this->input->post('rp_id',TRUE),
			'candidate_name'                     =>       @$this->input->post('candidate_name',TRUE),
			'applicant_id'                       =>       @$this->input->post('applicant_id',TRUE),
			'role'                               =>       @$this->input->post('role',TRUE),
			'qulification'                       =>       @$this->input->post('qulification',TRUE),
			'company_name'                       =>       @$this->input->post('company_name',TRUE),
			'yrs_of_experience'                  =>       @$this->input->post('yrs_of_experience',TRUE),
			'months_of_experience'               =>       @$this->input->post('months_of_experience',TRUE),
			'relevant_exp'                       =>       @$this->input->post('relevant_exp',TRUE),
			'ctc'                                =>       @$this->input->post('ctc',TRUE),
			'ctc_thousand'                       =>       @$this->input->post('ctc_thousand',TRUE),
			'exp_ctc'                            =>       @$this->input->post('exp_ctc',TRUE),
			'notice_period'                      =>       @$this->input->post('notice_period',TRUE),
			'official_onpaper_notice_period'     =>       @$this->input->post('official_onpaper_notice_period',TRUE),
			'contact_no'                         =>       @$this->input->post('contact_no',TRUE),
			'alternate_contact_number'           =>       @$this->input->post('alternate_contact_number',TRUE),
            'vendor_id'                          =>       @$vendor_id,
            'job_profile_id'                     =>       @$this->input->post('job_profile_id',TRUE),
			'email_id'                           =>       @$this->input->post('email_id',TRUE),
			'alternate_email_id'                 =>       @$this->input->post('alternate_email_id',TRUE),
			'country'                            =>       @$this->input->post('country',TRUE),
			'state'                              =>       @$this->input->post('state',TRUE),
			'location'                           =>       @$this->input->post('location',TRUE),
			'preffered_location'                 =>       @$this->input->post('preffered_location',TRUE),
			'client_feedback'                    =>       @$this->input->post('client_feedback',TRUE),
			'interview_schedule'                 =>       @$interview_schedule,
			'interview_schedule_mode'            =>       @$this->input->post('interview_schedule_mode',TRUE),
			'final_status'                       =>       @$this->input->post('final_status',TRUE),
			'client_recruiter'                   =>       @$this->input->post('client_recruiter',TRUE),
			'sourced_by'                         =>       @$this->input->post('sourced_by',TRUE),
			'reason_for_job_change'              =>       @$this->input->post('reason_for_job_change',TRUE),
			'color'                              =>       @$this->input->post('color_id',TRUE),				
			'star_rating'                        =>       @$this->input->post('star_rating',TRUE),
			'record_added_datetime'              =>       date("Y-m-d H:i:s")
		);


		$result	=$this->m_recruiter->insert($mydata);
			$user=$this->session->userdata('user_id');
//  		print_r($this->input->post('files_o'));exit;
         if(!empty($_FILES['files_o']['name']))
    {
        // if($result){
        $config['upload_path'] ='uploads/recuiter_company_images/'.$user;
			if (!is_dir('uploads/recuiter_company_images/'.$user)) 
			{
	    		mkdir('uploads/recuiter_company_images/' . $user, 0777, TRUE);
			}
        // $filesCount =$this->input->post('count');
        $filesCount =count($_FILES['files_o']['name']);
        //  print_r($filesCount);exit;
        // print_r();exit;
		for($i = 0; $i < $filesCount; $i++)
		{
            $_FILES['userFile']['name'] = $_FILES['files_o']['name'][$i];
			$_FILES['userFile']['type'] = $_FILES['files_o']['type'][$i];
			$_FILES['userFile']['tmp_name'] = $_FILES['files_o']['tmp_name'][$i];
			$_FILES['userFile']['error'] = $_FILES['files_o']['error'][$i];
			$_FILES['userFile']['size'] = $_FILES['files_o']['size'][$i];
			$uploadPath = 'uploads/recuiter_company_images/'.$user;
			$config['upload_path'] = $uploadPath;
			$config['allowed_types'] = '*';
			$config['max_size'] = '0';
    		$config['max_width']  = '0';
    		$config['max_height']  = '0';
            $config['remove_spaces'] = FALSE;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if($this->upload->do_upload('userFile'))
			{
				$fileData = $this->upload->data();
				$uploadData[$i]['tbl_dailyreport_recruiter_id'] = $result;
				$uploadData[$i]['added_by'] = $this->session->userdata('user_id');
				$uploadData[$i]['admin_id'] = $this->session->userdata('admin_id');
				$uploadData[$i]['uploaded_file'] = $fileData['file_name'];
				$uploadData[$i]['created'] = date("Y-m-d H:i:s");
			
				
			}
}
      	    
if(!empty($uploadData))
	      {
	          $result1 = $this->m_recruiter->insert_company_images_by_recruiter($uploadData);
	      }
        // }
        
    }

		$totalmarks=0;
		if ($this->input->post('genuinity_check')) 
		{
			$no_of_questions = $this->m_recruiter->get_no_of_questions(1);
			$question_id = $this->input->post('gen_question_id');
			for ($i = 0; $i < $no_of_questions; $i++) {
				$marks = $this->m_recruiter->get_marks_for_question($question_id[$i]);
				$marks_for_question = $marks[0]->question_marks;
				$result1 = $this->m_recruiter->get_correct_answer($question_id[$i]);
				$selected_answer = $this->input->post("questions_answer_" . $question_id[$i]);
				if($result1->answer_id == $selected_answer){
					$marks = $marks_for_question;
					$totalmarks+=$marks;               
				} else {
					$marks = 0;
					$totalmarks+=$marks;               
				}
				$data = array('candidate_question_question_id' => $question_id[$i],
					'candidate_question_candidate_id' =>$result,
					'candidate_question_answer_id' =>$result1->answer_id,
					'candidate_question_marks' => $marks
				);
				$this->db->insert('candidate_question', $data);
			}
		}	

		$this->m_recruiter->update_total_marks($result, $totalmarks);

// 		$config['upload_path'] ='uploads/resume/'.$result.'/';

// 		if (!is_dir('uploads/resume/'.$result)) 
// 		{
// 			mkdir('uploads/resume/' . $result, 0777, TRUE);
// 		}

// 		$_FILES['userFile']['name'] = $_FILES['userFiles']['name'];
// 		$_FILES['userFile']['type'] = $_FILES['userFiles']['type'];
// 		$_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'];
// 		$_FILES['userFile']['error'] = $_FILES['userFiles']['error'];
// 		$_FILES['userFile']['size'] = $_FILES['userFiles']['size'];

// 		$uploadPath = $config['upload_path'];
// 		$config['upload_path'] = $uploadPath;
// 		$config['allowed_types'] = 'pdf|doc|docx';
// 		$config['max_size']	= '10000000';

// 		$this->load->library('upload', $config);
// 		$this->upload->initialize($config);
// 		if($this->upload->do_upload('userFile')){
// 			$fileData = $this->upload->data();
// 			$uploadData = $config['upload_path'].$fileData['file_name'];
// 		}

// 		if(!empty($uploadData)) { $resume = $uploadData; }
// 		else { $resume = ""; }
		
// 		if(!empty($resume))
// 		{
		    
// 		 $fileArray = pathinfo($resume);
//         $file_ext  = $fileArray['extension'];
//         if($file_ext == "doc" || $file_ext == "docx")
//         {
             
//             if($file_ext == "doc") 
//             {
//                 $resume_string= $this->read_doc($resume);
//             } elseif($file_ext == "docx") 
//             {

//           $resume_string= $this->read_docx($resume);
//             } 
//         } else 
//         {
//             $resume_string="";
//         } 
		    
		    
// 		}
		
// 		//print_r($resume);exit;
		
		 

// 		$data = array('resume' => $resume,
// 		              'resume_string'=>@$resume_string);
// 		$this->db->where('dailyreport_id', $result);
// 		$this->db->update('tbl_dailyreport_recruiter', $data);
// print_r('$uploadData1');
if($_FILES['userFiles1']['name']){   
    //  	print_r('$uploadData2');exit;
		$config['upload_path'] ='uploads/resume/'.$result.'/';

		if (!is_dir('uploads/resume/'.$result)) 
		{
			mkdir('uploads/resume/' . $result, 0777, TRUE);
		}

		$_FILES['userFile1']['name'] = $_FILES['userFiles1']['name'];
		$_FILES['userFile1']['type'] = $_FILES['userFiles1']['type'];
		$_FILES['userFile1']['tmp_name'] = $_FILES['userFiles1']['tmp_name'];
		$_FILES['userFile1']['error'] = $_FILES['userFiles1']['error'];
		$_FILES['userFile1']['size'] = $_FILES['userFiles1']['size'];

		$uploadPath1 = $config['upload_path'];
		$config['upload_path'] = $uploadPath1;
		$config['allowed_types'] = 'pdf|doc|docx';
		$config['max_size']	= '10000000';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if($this->upload->do_upload('userFile1')){
			$fileData = $this->upload->data();
			$uploadData1 = $config['upload_path'].$fileData['file_name'];
		}
        
		if(!empty($uploadData1)) { $resume = $uploadData1; }
		else { $resume = ""; }
		
		if(!empty($resume))
		{
		    
		 $fileArray = pathinfo($resume);
        $file_ext  = $fileArray['extension'];
        if($file_ext == "doc" || $file_ext == "docx")
        {
             
            if($file_ext == "doc") 
            {
                // $resume_string= $this->read_doc($resume);
            } elseif($file_ext == "docx") 
            {
                // $resume_string= $this->read_docx($resume);
                // $resume_string= $this->read_doc($resume);
                $resume_string = '';
            } 
        } else 
        {
            $resume_string="";
        } 
		    
	    
		}
		
		//print_r($resume);exit;
		
		 

		$data = array('resume' => $resume,
		              'resume_string'=>@$resume_string);
		$this->db->where('dailyreport_id', $result);
		$this->db->update('tbl_dailyreport_recruiter', @$data);

   }

		$this->session->set_flashdata('success','Record added Successfully!');
		redirect('recruiter/recruiter');


	}
	else
	{
		redirect('recruiter/recruiter/add');
	}

}

public function save_non_it_recruitment()
{
	$sheetid= $this->input->post('client_id'); 
	if(!empty($sheetid))
	{
        $query = $this->db->query("SELECT client_name from client where client_id = ".@$sheetid);
		@$sheetname = $query->row()->client_name; 
		$interview_schedule = $this->input->post('interview_schedule',TRUE);
		if(!empty($interview_schedule)){
			$interview_schedule =  date('Y-m-d H:i:s', strtotime($interview_schedule));
		}else{
			$interview_schedule =  "0000-00-00 00:00:00";
		}

		$mydata = array(
			'user_id'=>$this->session->userdata('user_id'),
			'admin_id'=>$this->session->userdata('admin_id'),
			'sheetid'=>$this->input->post('client_id',TRUE),           
			'sheetname'=>@$sheetname,
			'date'=>$this->input->post('date',TRUE),
            'company_client'=>@$sheetname,
			'position_skills'=>$this->input->post('position_skills',TRUE),
			'rp_id'=>$this->input->post('rp_id',TRUE),
			'candidate_name'=>$this->input->post('candidate_name',TRUE),
			'applicant_id'=>$this->input->post('applicant_id',TRUE),
			'role'=>$this->input->post('role',TRUE),
			'qulification'=>$this->input->post('qulification',TRUE),
			'company_name'=>$this->input->post('company_name',TRUE),
			'yrs_of_experience'=>$this->input->post('yrs_of_experience',TRUE),
			'months_of_experience'=>$this->input->post('months_of_experience',TRUE),
			'relevant_exp'=>$this->input->post('relevant_exp',TRUE),
			'ctc'=>$this->input->post('ctc',TRUE),
			'ctc_thousand'=>$this->input->post('ctc_thousand',TRUE),
			'exp_ctc'=>$this->input->post('exp_ctc',TRUE),
			'notice_period'=>$this->input->post('notice_period',TRUE),
			'official_onpaper_notice_period'=>$this->input->post('official_onpaper_notice_period',TRUE),
			'contact_no'=>$this->input->post('contact_no',TRUE),
			'alternate_contact_number'=>$this->input->post('alternate_contact_number',TRUE),
			'email_id'=>$this->input->post('email_id',TRUE),
			'alternate_email_id'=>$this->input->post('alternate_email_id',TRUE),
			'country'=>$this->input->post('country',TRUE),
			'state'=>$this->input->post('state',TRUE),
			'location'=>$this->input->post('location',TRUE),
			'preffered_location'=>$this->input->post('preffered_location',TRUE),
			'client_feedback'=>$this->input->post('client_feedback',TRUE),
			'interview_schedule'=>  $interview_schedule,
			'interview_schedule_mode'=>$this->input->post('interview_schedule_mode',TRUE),
			'final_status'=>$this->input->post('final_status',TRUE),
			'client_recruiter'=>$this->input->post('client_recruiter',TRUE),
			'sourced_by'=>$this->input->post('sourced_by',TRUE),
			'reason_for_job_change'=>$this->input->post('reason_for_job_change',TRUE),
			'color'=>$this->input->post('color_id',TRUE),				
			'star_rating'=>$this->input->post('star_rating',TRUE),
			'record_added_datetime'    =>  date("Y-m-d H:i:s")
		);
		$result	=$this->m_recruiter->insert($mydata);
		$user=$this->session->userdata('user_id');
         if(!empty($_FILES['files_o']['name']))
    {
       
        $config['upload_path'] ='uploads/recuiter_company_images/'.$user;
			if (!is_dir('uploads/recuiter_company_images/'.$user)) 
			{
	    		mkdir('uploads/recuiter_company_images/' . $user, 0777, TRUE);
			}
        
        $filesCount =count($_FILES['files_o']['name']);
        
		for($i = 0; $i < $filesCount; $i++)
		{
            $_FILES['userFile']['name'] = $_FILES['files_o']['name'][$i];
			$_FILES['userFile']['type'] = $_FILES['files_o']['type'][$i];
			$_FILES['userFile']['tmp_name'] = $_FILES['files_o']['tmp_name'][$i];
			$_FILES['userFile']['error'] = $_FILES['files_o']['error'][$i];
			$_FILES['userFile']['size'] = $_FILES['files_o']['size'][$i];
			$uploadPath = 'uploads/recuiter_company_images/'.$user;
			$config['upload_path'] = $uploadPath;
			$config['allowed_types'] = '*';
			$config['max_size'] = '0';
    		$config['max_width']  = '0';
    		$config['max_height']  = '0';
            $config['remove_spaces'] = FALSE;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if($this->upload->do_upload('userFile'))
			{
				$fileData = $this->upload->data();
				$uploadData[$i]['tbl_dailyreport_recruiter_id'] = $result;
				$uploadData[$i]['added_by'] = $this->session->userdata('user_id');
				$uploadData[$i]['admin_id'] = $this->session->userdata('admin_id');
				$uploadData[$i]['uploaded_file'] = $fileData['file_name'];
				$uploadData[$i]['created'] = date("Y-m-d H:i:s");
		}
}
      	    
if(!empty($uploadData))
	      {
	          $result1 = $this->m_recruiter->insert_company_images_by_recruiter($uploadData);
	      }
    }

		$totalmarks=0;
		if ($this->input->post('genuinity_check')) 
		{
			$no_of_questions = $this->m_recruiter->get_no_of_questions(1);
			$question_id = $this->input->post('gen_question_id');
			for ($i = 0; $i < $no_of_questions; $i++) {
				$marks = $this->m_recruiter->get_marks_for_question($question_id[$i]);
				$marks_for_question = $marks[0]->question_marks;
				$result1 = $this->m_recruiter->get_correct_answer($question_id[$i]);
				$selected_answer = $this->input->post("questions_answer_" . $question_id[$i]);
				if($result1->answer_id == $selected_answer){
					$marks = $marks_for_question;
					$totalmarks+=$marks;               
				} else {
					$marks = 0;
					$totalmarks+=$marks;               
				}
				$data = array('candidate_question_question_id' => $question_id[$i],
					'candidate_question_candidate_id' =>$result,
					'candidate_question_answer_id' =>$result1->answer_id,
					'candidate_question_marks' => $marks
				);
				$this->db->insert('candidate_question', $data);
			}
		}	
		$this->m_recruiter->update_total_marks($result, $totalmarks);
        if($_FILES['userFiles1']['name']){   
		$config['upload_path'] ='uploads/resume/'.$result.'/';

		if (!is_dir('uploads/resume/'.$result)) 
		{
			mkdir('uploads/resume/' . $result, 0777, TRUE);
		}
		$_FILES['userFile1']['name'] = $_FILES['userFiles1']['name'];
		$_FILES['userFile1']['type'] = $_FILES['userFiles1']['type'];
		$_FILES['userFile1']['tmp_name'] = $_FILES['userFiles1']['tmp_name'];
		$_FILES['userFile1']['error'] = $_FILES['userFiles1']['error'];
		$_FILES['userFile1']['size'] = $_FILES['userFiles1']['size'];

		$uploadPath1 = $config['upload_path'];
		$config['upload_path'] = $uploadPath1;
		$config['allowed_types'] = 'pdf|doc|docx';
		$config['max_size']	= '10000000';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if($this->upload->do_upload('userFile1')){
			$fileData = $this->upload->data();
			$uploadData1 = $config['upload_path'].$fileData['file_name'];
		}
		if(!empty($uploadData1)) { $resume = $uploadData1; }
		else { $resume = ""; }
		if(!empty($resume))
		{
		$fileArray = pathinfo($resume);
        $file_ext  = $fileArray['extension'];
        if($file_ext == "doc" || $file_ext == "docx")
        {
            if($file_ext == "doc") 
            {
                
            } elseif($file_ext == "docx") 
            {
                $resume_string = '';
            } 
        } else 
        {
            $resume_string="";
        } 
		    
	    
		}
		$data = array(
		              'resume' => $resume,
		              'resume_string'=>@$resume_string
		              );
		$this->db->where('dailyreport_id', $result);
		$this->db->update('tbl_dailyreport_recruiter', @$data);

}

		$this->session->set_flashdata('success','Record added Successfully!');
		redirect('recruiter/recruiter/non_it_recruitment');


	}
	else
	{
		redirect('recruiter/recruiter/non_it_recruitment');
	}

}

/* code for docx or doc to string */
  public function read_doc() 
  {
         $this->filename = "uploads/resume/69425/amrut-bio-data.docx";
        $fileHandle = fopen($this->filename, "r");
        $line = @fread($fileHandle, filesize($this->filename));   
        $lines = explode(chr(0x0D),$line);
        $outtext = "";
        foreach($lines as $thisline)
          {
            $pos = strpos($thisline, chr(0x00));
            if (($pos !== FALSE)||(strlen($thisline)==0))
              {
              } else {
                $outtext .= $thisline." ";
              }
          }
         $outtext = preg_replace("/[^a-zA-Z0-9\s\,\.\-\n\r\t@\/\_\(\)]/","",$outtext);
        return $outtext;
    }

    public function read_docx($resume)
    {
        $this->filename = $resume;
        $striped_content = '';
        $content = '';

        $zip = zip_open($this->filename);

        if (!$zip || is_numeric($zip)) return false;

        while ($zip_entry = zip_read($zip)) {

            if (zip_entry_open($zip, $zip_entry) == FALSE) continue;

            if (zip_entry_name($zip_entry) != "word/document.xml") continue;

            $content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));

            zip_entry_close($zip_entry);
        }// end while

        zip_close($zip);

        $content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);
        $content = str_replace('</w:r></w:p>', "\r\n", $content);
        $striped_content = strip_tags($content);

      
        return $striped_content;
    }
    
    /* code end for docx OR doc to string */

public function edit($id)
{
	$user_id = $this->session->userdata('user_id');
	$user_role = $this->session->userdata('user_role');

	if($user_role==1)
	{
		$admin_id=$this->session->userdata('user_id');
	}
	else
	{
		$admin_id=$this->session->userdata('admin_id');	
	}
	$data['client_list'] =$this->m_recruiter->client_list_by_user_id_for_all($admin_id);

	$data['country']  = $this->m_recruiter->getCountry();	
	$data['state']  = $this->m_recruiter->getState();	
	$data['city']  = $this->m_recruiter->getCity();
	$data['result'] =$this->m_recruiter->details_dailyreport($id);
	$data['company_images'] =$this->m_recruiter->get_details_company_images_by_recruiter($id);
	$data['siderbar_menus'] = $this->M_permission->list_labels('internal user');
	$this->load->view('recruiter/dailyreport_edit',$data);
}
public function delete_basics_company_picture() 
	 {
         $id = $this->input->post('picture_id');
         $user_id = $this->input->post('user_id');
         
        $s= $this->m_recruiter->delete_company_images_by($id);       
       
    }

public function edit_dashboard($id)
{
	$user_id = $this->session->userdata('user_id');
	$user_role = $this->session->userdata('user_role');

	if($user_role==1)
	{
		$admin_id=$this->session->userdata('user_id');
	}
	else
	{
		$admin_id=$this->session->userdata('admin_id');	
	}
	$data['client_list'] =$this->m_recruiter->client_list_by_user_id_for_all($admin_id);

	$data['country']  = $this->m_recruiter->getCountry();	
	$data['state']  = $this->m_recruiter->getState();	
	$data['city']  = $this->m_recruiter->getCity();
	$data['result'] =$this->m_recruiter->details_dailyreport($id);
	$data['siderbar_menus'] = $this->M_permission->list_labels('internal user');
	$this->load->view('recruiter/dailyreport_edit_dashboard',$data);
}
public function update()
{
    error_reporting(0);
	$id=$this->input->post('id');

	@$statusf = $this->input->post('final_status');
	@$selected_joining_date = $this->input->post('selected_joining_date');
	@$selected_offered_amount = $this->input->post('selected_offered_amount');
	@$date_of_offer_released = $this->input->post('date_of_offer_released');
	@$grade = $this->input->post('grade');

	if($statusf=="Offered")
	{
		$mydata = array(
			'position_skills'=>$this->input->post('position_skills',TRUE),
			'rp_id'=>$this->input->post('rp_id',TRUE),
			'candidate_name'=>$this->input->post('candidate_name',TRUE),     
			'color'=>$this->input->post('color_id',TRUE),
			'applicant_id'=>$this->input->post('applicant_id',TRUE),     
			'role'=>$this->input->post('role',TRUE),
			'qulification'=>$this->input->post('qulification',TRUE),
			'company_name'=>$this->input->post('company_name',TRUE), 
			'yrs_of_experience'=>$this->input->post('yrs_of_experience',TRUE),
			'months_of_experience'=>$this->input->post('months_of_experience',TRUE),
			'relevant_exp'=>$this->input->post('relevant_exp',TRUE),
			'ctc'=>$this->input->post('ctc',TRUE),
			'ctc_thousand'=>$this->input->post('ctc_thousand',TRUE),
			'exp_ctc'=>$this->input->post('exp_ctc',TRUE),
			'notice_period'=>$this->input->post('notice_period',TRUE),
			'official_onpaper_notice_period'=>$this->input->post('official_onpaper_notice_period',TRUE),
			'contact_no'=>$this->input->post('contact_no',TRUE),
			'alternate_contact_number'=>$this->input->post('alternate_contact_number',TRUE),
			'email_id'=>$this->input->post('email_id',TRUE),
			'alternate_email_id'=>$this->input->post('alternate_email_id',TRUE),						
			'country'=>$this->input->post('country',TRUE),
			'state'=>$this->input->post('state',TRUE),
			'location'=>$this->input->post('location',TRUE),
			'preffered_location'=>$this->input->post('preffered_location',TRUE),
			'client_feedback'=>$this->input->post('client_feedback',TRUE),
			'interview_schedule'=>  date('Y-m-d H:i:s', strtotime($this->input->post('interview_schedule',TRUE))),
			'interview_schedule_mode'=>$this->input->post('interview_schedule_mode',TRUE),
			'final_status'=>$statusf,
			'selected_joining_date'=>$selected_joining_date,
			'selected_offered_amount'=>$selected_offered_amount,
			'date_of_offer_released'=>$date_of_offer_released,
			'grade'=>$grade,
			'date'=>$this->input->post('date',TRUE),
			'client_recruiter'=>$this->input->post('client_recruiter',TRUE),
			'sourced_by'=>$this->input->post('sourced_by',TRUE),
			'reason_for_job_change'=>$this->input->post('reason_for_job_change',TRUE),
			'star_rating'=>$this->input->post('star_rating',TRUE)
		);
	}
	else
	{
		$mydata = array(
			'position_skills'=>$this->input->post('position_skills',TRUE),
			'rp_id'=>$this->input->post('rp_id',TRUE),
			'candidate_name'=>$this->input->post('candidate_name',TRUE),     
			'color'=>$this->input->post('color_id',TRUE),
			'applicant_id'=>$this->input->post('applicant_id',TRUE),     
			'role'=>$this->input->post('role',TRUE),
			'qulification'=>$this->input->post('qulification',TRUE),
			'company_name'=>$this->input->post('company_name',TRUE), 
			'yrs_of_experience'=>$this->input->post('yrs_of_experience',TRUE),
			'months_of_experience'=>$this->input->post('months_of_experience',TRUE),
			'relevant_exp'=>$this->input->post('relevant_exp',TRUE),
			'ctc'=>$this->input->post('ctc',TRUE),
			'ctc_thousand'=>$this->input->post('ctc_thousand',TRUE),
			'exp_ctc'=>$this->input->post('exp_ctc',TRUE),
			'notice_period'=>$this->input->post('notice_period',TRUE),
			'official_onpaper_notice_period'=>$this->input->post('official_onpaper_notice_period',TRUE),
			'contact_no'=>$this->input->post('contact_no',TRUE),
			'alternate_contact_number'=>$this->input->post('alternate_contact_number',TRUE),
			'email_id'=>$this->input->post('email_id',TRUE),
			'alternate_email_id'=>$this->input->post('alternate_email_id',TRUE),						
			'country'=>$this->input->post('country',TRUE),
			'state'=>$this->input->post('state',TRUE),
			'location'=>$this->input->post('location',TRUE),
			'preffered_location'=>$this->input->post('preffered_location',TRUE),
			'client_feedback'=>$this->input->post('client_feedback',TRUE),
			'interview_schedule'=>  date('Y-m-d H:i:s', strtotime($this->input->post('interview_schedule',TRUE))),
			'interview_schedule_mode'=>$this->input->post('interview_schedule_mode',TRUE),
			'final_status'=>$this->input->post('final_status',TRUE),
			'client_recruiter'=>$this->input->post('client_recruiter',TRUE),
			'sourced_by'=>$this->input->post('sourced_by',TRUE),
			'date'=>$this->input->post('date',TRUE),
			'reason_for_job_change'=>$this->input->post('reason_for_job_change',TRUE),
			'star_rating'=>$this->input->post('star_rating',TRUE)
		);
	}

	$result	=$this->m_recruiter->update($id,$mydata);
	/*make directory*/
    if (!is_dir('uploads/resume/'.$id.'/')) {
                mkdir('./uploads/resume/'.$id.'/', 0777, TRUE);
            }
	if(!empty($_FILES['userFiles']['name']))
	{
		$_FILES['userFile']['name'] = $_FILES['userFiles']['name'];
		$_FILES['userFile']['type'] = $_FILES['userFiles']['type'];
		$_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'];
		$_FILES['userFile']['error'] = $_FILES['userFiles']['error'];
		$_FILES['userFile']['size'] = $_FILES['userFiles']['size'];

		$config['upload_path'] ='uploads/resume/'.$id.'/';

		$uploadPath = $config['upload_path'];
		$config['upload_path'] = $uploadPath;
		$config['allowed_types'] = 'pdf|doc|docx';
		$config['max_size']	= '10000000';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if($this->upload->do_upload('userFile')){
			$fileData = $this->upload->data();
			$uploadData = $config['upload_path'].$fileData['file_name'];
		}

		if(!empty($uploadData)) { $resume = $uploadData; }
		else { $resume = ""; }

		$data = array('resume' => $resume,);
		$this->db->where('dailyreport_id', $id);
		$this->db->update('tbl_dailyreport_recruiter', $data);
	}
	
	$user=$this->session->userdata('admin_id');
	if(!empty($_FILES['userFiles1']['name']))
	{
		 // if($result){
        $config['upload_path'] ='uploads/recuiter_company_images/'.$user;
			if (!is_dir('uploads/recuiter_company_images/'.$user)) 
			{
	    		mkdir('uploads/recuiter_company_images/' . $user, 0777, TRUE);
			}
        // $filesCount =$this->input->post('count');
        $filesCount =count($_FILES['userFiles1']['name']);
        //  print_r($filesCount);exit;
        // print_r();exit;
		for($i = 0; $i < $filesCount; $i++)
		{
            $_FILES['userFiles1']['name'] = $_FILES['userFiles1']['name'][$i];
			$_FILES['userFiles1']['type'] = $_FILES['userFiles1']['type'][$i];
			$_FILES['userFiles1']['tmp_name'] = $_FILES['userFiles1']['tmp_name'][$i];
			$_FILES['userFiles1']['error'] = $_FILES['userFiles1']['error'][$i];
			$_FILES['userFiles1']['size'] = $_FILES['userFiles1']['size'][$i];
			$uploadPath = 'uploads/recuiter_company_images/'.$user;
			$config['upload_path'] = $uploadPath;
			$config['allowed_types'] = '*';
			$config['max_size'] = '0';
    		$config['max_width']  = '0';
    		$config['max_height']  = '0';
            $config['remove_spaces'] = FALSE;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if($this->upload->do_upload('userFiles1'))
			{
				$fileData = $this->upload->data();
				$uploadData[$i]['tbl_dailyreport_recruiter_id'] = $id;
				$uploadData[$i]['added_by'] = $this->session->userdata('user_id');
				$uploadData[$i]['admin_id'] = $this->session->userdata('admin_id');
				$uploadData[$i]['uploaded_file'] = $fileData['file_name'];
				$uploadData[$i]['created'] = date("Y-m-d H:i:s");
			
				
			}
}
      	    
if(!empty($uploadData))
	      {
	          $result1 = $this->m_recruiter->insert_company_images_by_recruiter(@$uploadData);
	      }
	}

	if($result)
	{
		$this->session->set_flashdata('errorss','Record updated Successfully!');

	}
	else
	{
		$this->session->set_flashdata('erroraa','Record not updated!');
	}
	redirect('recruiter/recruiter');
}

public function update_dashboard()
{
	$id=$this->input->post('id');

	@$statusf = $this->input->post('final_status');
	@$selected_joining_date = $this->input->post('selected_joining_date');
	@$selected_offered_amount = $this->input->post('selected_offered_amount');
	@$date_of_offer_released = $this->input->post('date_of_offer_released');
	@$grade = $this->input->post('grade');

	if($statusf=="Offered")
	{
		$mydata = array(
			'position_skills'=>$this->input->post('position_skills',TRUE),
			'rp_id'=>$this->input->post('rp_id',TRUE),
			'candidate_name'=>$this->input->post('candidate_name',TRUE),     
			'color'=>$this->input->post('color_id',TRUE),
			'applicant_id'=>$this->input->post('applicant_id',TRUE),     
			'role'=>$this->input->post('role',TRUE),
			'qulification'=>$this->input->post('qulification',TRUE),
			'company_name'=>$this->input->post('company_name',TRUE), 
			'yrs_of_experience'=>$this->input->post('yrs_of_experience',TRUE),
			'months_of_experience'=>$this->input->post('months_of_experience',TRUE),
			'relevant_exp'=>$this->input->post('relevant_exp',TRUE),
			'ctc'=>$this->input->post('ctc',TRUE),
			'ctc_thousand'=>$this->input->post('ctc_thousand',TRUE),
			'exp_ctc'=>$this->input->post('exp_ctc',TRUE),
			'notice_period'=>$this->input->post('notice_period',TRUE),
			'official_onpaper_notice_period'=>$this->input->post('official_onpaper_notice_period',TRUE),
			'contact_no'=>$this->input->post('contact_no',TRUE),
			'alternate_contact_number'=>$this->input->post('alternate_contact_number',TRUE),
			'email_id'=>$this->input->post('email_id',TRUE),
			'alternate_email_id'=>$this->input->post('alternate_email_id',TRUE),						
			'country'=>$this->input->post('country',TRUE),
			'state'=>$this->input->post('state',TRUE),
			'location'=>$this->input->post('location',TRUE),
			'preffered_location'=>$this->input->post('preffered_location',TRUE),
			'client_feedback'=>$this->input->post('client_feedback',TRUE),
			'interview_schedule'=>  date('Y-m-d H:i:s', strtotime($this->input->post('interview_schedule',TRUE))),
			'interview_schedule_mode'=>$this->input->post('interview_schedule_mode',TRUE),
			'final_status'=>$statusf,
			'selected_joining_date'=>$selected_joining_date,
			'selected_offered_amount'=>$selected_offered_amount,
			'date_of_offer_released'=>$date_of_offer_released,
			'grade'=>$grade,
			'date'=>$this->input->post('date',TRUE),
			'client_recruiter'=>$this->input->post('client_recruiter',TRUE),
			'sourced_by'=>$this->input->post('sourced_by',TRUE),
			'reason_for_job_change'=>$this->input->post('reason_for_job_change',TRUE),
			'star_rating'=>$this->input->post('star_rating',TRUE)
		);
	}
	else
	{
		$mydata = array(
			'position_skills'=>$this->input->post('position_skills',TRUE),
			'rp_id'=>$this->input->post('rp_id',TRUE),
			'candidate_name'=>$this->input->post('candidate_name',TRUE),     
			'color'=>$this->input->post('color_id',TRUE),
			'applicant_id'=>$this->input->post('applicant_id',TRUE),     
			'role'=>$this->input->post('role',TRUE),
			'qulification'=>$this->input->post('qulification',TRUE),
			'company_name'=>$this->input->post('company_name',TRUE), 
			'yrs_of_experience'=>$this->input->post('yrs_of_experience',TRUE),
			'months_of_experience'=>$this->input->post('months_of_experience',TRUE),
			'relevant_exp'=>$this->input->post('relevant_exp',TRUE),
			'ctc'=>$this->input->post('ctc',TRUE),
			'ctc_thousand'=>$this->input->post('ctc_thousand',TRUE),
			'exp_ctc'=>$this->input->post('exp_ctc',TRUE),
			'notice_period'=>$this->input->post('notice_period',TRUE),
			'official_onpaper_notice_period'=>$this->input->post('official_onpaper_notice_period',TRUE),
			'contact_no'=>$this->input->post('contact_no',TRUE),
			'alternate_contact_number'=>$this->input->post('alternate_contact_number',TRUE),
			'email_id'=>$this->input->post('email_id',TRUE),
			'alternate_email_id'=>$this->input->post('alternate_email_id',TRUE),						
			'country'=>$this->input->post('country',TRUE),
			'state'=>$this->input->post('state',TRUE),
			'location'=>$this->input->post('location',TRUE),
			'preffered_location'=>$this->input->post('preffered_location',TRUE),
			'client_feedback'=>$this->input->post('client_feedback',TRUE),
			'interview_schedule'=>  date('Y-m-d H:i:s', strtotime($this->input->post('interview_schedule',TRUE))),
			'interview_schedule_mode'=>$this->input->post('interview_schedule_mode',TRUE),
			'final_status'=>$this->input->post('final_status',TRUE),
			'client_recruiter'=>$this->input->post('client_recruiter',TRUE),
			'sourced_by'=>$this->input->post('sourced_by',TRUE),
			'date'=>$this->input->post('date',TRUE),
			'reason_for_job_change'=>$this->input->post('reason_for_job_change',TRUE),
			'star_rating'=>$this->input->post('star_rating',TRUE)
		);
	}

	$result	=$this->m_recruiter->update($id,$mydata);

	if(!empty($_FILES['userFiles']['name']))
	{
		$_FILES['userFile']['name'] = $_FILES['userFiles']['name'];
		$_FILES['userFile']['type'] = $_FILES['userFiles']['type'];
		$_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'];
		$_FILES['userFile']['error'] = $_FILES['userFiles']['error'];
		$_FILES['userFile']['size'] = $_FILES['userFiles']['size'];

		$config['upload_path'] ='uploads/resume/'.$id.'/';

		$uploadPath = $config['upload_path'];
		$config['upload_path'] = $uploadPath;
		$config['allowed_types'] = 'pdf|doc|docx';
		$config['max_size']	= '10000000';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if($this->upload->do_upload('userFile')){
			$fileData = $this->upload->data();
			$uploadData = $config['upload_path'].$fileData['file_name'];
		}

		if(!empty($uploadData)) { $resume = $uploadData; }
		else { $resume = ""; }

		$data = array('resume' => $resume,);
		$this->db->where('dailyreport_id', $id);
		$this->db->update('tbl_dailyreport_recruiter', $data);
	}

	if($result)
	{
		$this->session->set_flashdata('errorss','Record updated Successfully!');

	}
	else
	{
		$this->session->set_flashdata('erroraa','Record not updated!');
	}
	redirect('admin');
}


public function update_duplicate_candate_entry()
{
	$id=$this->input->post('dailyreport_id');
	$mydata = array(
		'duplicate_entry_user_id'=>$this->input->post('duplicate_entry_user_id',TRUE),
		'transfer_comment'=>$this->input->post('duplicate_candidate_entry_reason',TRUE)
	);
	$result	=$this->m_recruiter->update($id,$mydata);
	if($result)
	{
		$this->session->set_flashdata('errorss','Now you can add candiadte!');
	}
	else
	{
		$this->session->set_flashdata('erroraa','Record not updated!');
	}
	redirect('recruiter/recruiter/add');
}

public function delete()
{
	$user_id = $this->session->userdata('user_id');
	$dailyreport_id=$this->input->post('deleteID');
	$result=$this->m_recruiter->delete($dailyreport_id);

	$area = $this->session->userdata('client_id_search');

	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_user_id($area,$user_id);  
	$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);

	$data['client_id_search']  =  $area;

	if(!empty($area)) 
	{
		$client_id_search = $this->session->flashdata('area');
	}

	if($result)
	{
		$this->session->set_flashdata('success','Record deleted Successfully!');
	}
	else
	{
		$this->session->set_flashdata('error','Record not deleted!');
	}
	redirect('recruiter/recruiter');
}


public function send_email()
{
	$save = $this->input->post('save');
	$save_no = $this->input->post('save_no');
	if(!empty($save))
	{
		$user_id=$this->input->post('check');
		if(!empty($user_id))
		{	
			$data['user_id'] = implode(", ",$user_id);
			$admin_id = 1;
			$data['mail_ids'] =$this->m_recruiter->get_all_recruter_mail_id_list($admin_id);
			$data['siderbar_menus'] = $this->M_permission->list_labels('internal user');
			$this->load->view('template/header');
			$this->load->view('template/sidebar',$data);
			$this->load->view('recruiter/v_send_email',$data);
		}
		else
		{
			$this->session->set_flashdata('erroraa','Please Select candidate!');
			redirect('recruiter/recruiter');
		}
	}

}

public function send_mail_to_canditate()
{
	$email_from      =$this->input->post('email_from', TRUE); 
	$email         =$this->input->post('email_id', TRUE);
	$subject_data =$this->input->post('subject', TRUE);
//$content      =$this->input->post('compose-textarea', TRUE); 

	$data	=	array(
		'content' =>  $this->input->post('compose-textarea', TRUE)
	);

	$contest_type=  $this->input->post('contest_type',TRUE); 
	$cc_mail=count($contest_type) ? implode(",",$contest_type) :'';

	$message 	= $this->load->view('mail/candidate_mail',$data,true);

	$flag 		= $this->send_confirmation_mail($message,$email,$subject_data,$email_from,$cc_mail);

	if($flag)
	{
		$this->session->set_flashdata('success','Email sending Successfully!'); 
	}
	else
	{
		$this->session->set_flashdata('error','Email sending failed!');
	}

	redirect('recruiter/recruiter');
}




function send_confirmation_mail($message,$email,$subject_data,$email_from,$cc_mail)
{
	$config = Array(
		'mailtype' => 'html',
		'priority' => '3',
		'charset'  => 'iso-8859-1',
		'validate'  => TRUE ,
		'newline'   => "\r\n",
		'wordwrap' => TRUE
	); 
	$this->load->library('email');
	$this->email->initialize($config);
	$this->email->from($email_from);
	$this->email->to($email);
	$this->email->cc($cc_mail);
	$this->email->subject($subject_data);
	$this->email->message($message);	
	return $this->email->send();
}

public function send_message()
{
	$mobile_no=$this->input->post('mobile_no');
	$message=$this->input->post('compose-textarea');



	if($results)
	{
		$this->session->set_flashdata('errorss','message sending Successfully!'); 
	}
	else
	{
		$this->session->set_flashdata('erroraa','message sending failed!');
	}
	redirect('recruiter/recruiter');
}

public function view_details($id)
{
	$data['siderbar_menus'] = $this->M_permission->list_labels('internal user');
	$this->load->view('template/header');
	$this->load->view('template/sidebar',$data);
	$data['record']	=	$this->m_recruiter->employee_by_id($id);
	$this->load->view('recruiter/view',$data);
}
public function view_screenshots($id)
{
	$data['siderbar_menus'] = $this->M_permission->list_labels('internal user');
	$this->load->view('template/header');
	$this->load->view('template/sidebar',$data);
	$data['record']	=	$this->m_recruiter->view_details_screenshots($id);
	$this->load->view('recruiter/view_screenshots',$data);
}
public function view_details_dashboard($id)
{
	$data['siderbar_menus'] = $this->M_permission->list_labels('internal user');
	$this->load->view('template/header');
	$this->load->view('template/sidebar',$data);
	$data['record']	=	$this->m_recruiter->employee_by_id($id);
	$this->load->view('recruiter/view_details_dashboard',$data);
}
public function search_details()
{
	header("Cache-Control: max-age=300, must-revalidate");

	$client_id_search  	=  	$this->input->post('client_id_search'); 
	
	@$clientwise_candidate  	=  	$this->input->post('clientwise_candidate'); 

	$area 				= 	$client_id_search;

	$data['client_id_search']  =  $client_id_search;

	$this->session->set_userdata('client_id_search', $client_id_search);
	$user_id = $this->session->userdata('user_id');
	$user_role = $this->session->userdata('user_role');
//print_r($user_role); die(); 1011
	if($user_role==1)
	{
		$admin_id=$this->session->userdata('user_id');
	}else
	{
		$admin_id=$this->session->userdata('admin_id');	
	}

	if($user_role==2 || $user_role==5)
	{
		$skillwise_report =  $this->input->post('skillwise_report',TRUE);

		if(!empty($skillwise_report))
		{
			$totalresult = array();	

			for($i=0;$i<count($skillwise_report);$i++)
			{
$position_skills_filter = $skillwise_report[$i];//get_client_id_search_result_report_filter
$totalresult[$i] = $this->m_recruiter->get_client_id_search_result_search($area,$position_skills_filter); 	
}
$k=0;
$finalarray = array();

for($j=0;$j<count($totalresult);$j++)
{
	for($q=0;$q<count($totalresult[$j]);$q++)
	{
		$finalarray[$k] = $totalresult[$j][$q]; 	
		$k++;
	}

}
$data['list_dailyreport'] = $finalarray;

$client_id = $area;
$data['client_list'] =$this->m_recruiter->client_list($admin_id);
$data['recruiter_tl_list'] = $this->m_dailyreport->selectRecruiterTl($admin_id);

$data['skillwise_reports'] = $this->m_recruiter->individual_excel_report_client_id_aaa($client_id); 
}
elseif(!empty($clientwise_candidate))
{
	$client_id = $area;
	$data['skillwise_reports'] = $this->m_recruiter->individual_excel_report_client_id_aaa($client_id); 

	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_candidate($area,$clientwise_candidate); 
	$data['clientwise_candidate_search'] = $clientwise_candidate;

	$data['client_list'] =$this->m_recruiter->client_list($admin_id);
	$data['recruiter_tl_list'] = $this->m_dailyreport->selectRecruiterTl($admin_id);
}
else
{
	$client_id = $area;

	$data['skillwise_reports'] = $this->m_recruiter->individual_excel_report_client_id_aaa($client_id); 

	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area); 
	$data['client_list'] =$this->m_recruiter->client_list($admin_id);
	$data['recruiter_tl_list'] = $this->m_dailyreport->selectRecruiterTl($admin_id);
}			
$data['export_client_id'] = $client_id;
$data['export_skillwise_report'] = $skillwise_report;
}
elseif($user_role==1)
{
	$skillwise_report =  $this->input->post('skillwise_report',TRUE);

	if(!empty($skillwise_report))
	{
		$totalresult = array();	

		for($i=0;$i<count($skillwise_report);$i++)
		{
$position_skills_filter = $skillwise_report[$i];//get_client_id_search_result_report_filter
$totalresult[$i] = $this->m_recruiter->get_client_id_search_result_search($area,$position_skills_filter); 	
}
$k=0;
$finalarray = array();

for($j=0;$j<count($totalresult);$j++)
{
	for($q=0;$q<count($totalresult[$j]);$q++)
	{
		$finalarray[$k] = $totalresult[$j][$q]; 	
		$k++;
	}

}
$data['list_dailyreport'] = $finalarray;

$client_id = $area;
$data['client_list'] =$this->m_recruiter->client_list($admin_id);
$data['recruiter_tl_list'] = $this->m_dailyreport->selectRecruiterTl($admin_id);

$data['skillwise_reports'] = $this->m_recruiter->individual_excel_report_client_id_aaa($client_id); 
}
elseif(!empty($clientwise_candidate))
{
	$client_id = $area;
	$data['skillwise_reports'] = $this->m_recruiter->individual_excel_report_client_id_aaa($client_id); 

	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_candidate($area,$clientwise_candidate); 
	$data['clientwise_candidate_search'] = $clientwise_candidate;

	$data['client_list'] =$this->m_recruiter->client_list($admin_id);
	$data['recruiter_tl_list'] = $this->m_dailyreport->selectRecruiterTl($admin_id);
}
else
{
	$client_id = $area;
	$data['skillwise_reports'] = $this->m_recruiter->individual_excel_report_client_id_aaa($client_id); 
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_admin_id($area,$admin_id); 
	$data['client_list'] =$this->m_recruiter->client_list($admin_id);
	$data['recruiter_tl_list'] = $this->m_dailyreport->selectRecruiterTl($admin_id);
}			
$data['export_client_id'] = $client_id;
$data['export_skillwise_report'] = $skillwise_report;
}
elseif($user_role==9 || $user_role==10)
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_user_id($area,$user_id); 
	$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
	$data['recruiter_tl_list'] = $this->m_dailyreport->selectRecruiterTl($admin_id);
}

else
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_user_id($area,$user_id); 
	$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
	$data['recruiter_tl_list'] = $this->m_dailyreport->selectRecruiterTl($admin_id);
}

if(!empty($client_id_search)) 
{
	$client_id_search = $this->session->flashdata('client_id_search');
}
if(empty($data['list_dailyreport']))
{
	$this->session->set_flashdata('errorss','No Record Found!');
	redirect('recruiter/recruiter/nodataflat');
}
else
{
	$data['siderbar_menus'] = $this->M_permission->list_labels('internal user');
	$this->load->view('template/header');
	$this->load->view('template/sidebar',$data);
	$this->load->view('recruiter/dailyreport_list',$data);
//$this->load->view('home/footer');
}
}



public function search_details_not_it()
{
	header("Cache-Control: max-age=300, must-revalidate");

	$client_id_search  	=  	$this->input->post('client_id_search'); 
	
	@$clientwise_candidate  	=  	$this->input->post('clientwise_candidate'); 

	$area 				= 	$client_id_search;

	$data['client_id_search']  =  $client_id_search;

	$this->session->set_userdata('client_id_search', $client_id_search);
	$user_id = $this->session->userdata('user_id');
	$user_role = $this->session->userdata('user_role');
//print_r($user_role); die(); 1011
	if($user_role==1)
	{
		$admin_id=$this->session->userdata('user_id');
	}else
	{
		$admin_id=$this->session->userdata('admin_id');	
	}

	if($user_role==2 || $user_role==5)
	{
		$skillwise_report =  $this->input->post('skillwise_report',TRUE);

		if(!empty($skillwise_report))
		{
			$totalresult = array();	

			for($i=0;$i<count($skillwise_report);$i++)
			{
$position_skills_filter = $skillwise_report[$i];//get_client_id_search_result_report_filter
$totalresult[$i] = $this->m_recruiter->get_client_id_search_result_search($area,$position_skills_filter); 	
}
$k=0;
$finalarray = array();

for($j=0;$j<count($totalresult);$j++)
{
	for($q=0;$q<count($totalresult[$j]);$q++)
	{
		$finalarray[$k] = $totalresult[$j][$q]; 	
		$k++;
	}

}
$data['list_dailyreport'] = $finalarray;

$client_id = $area;
$data['client_list'] =$this->m_recruiter->client_list_non_it($admin_id);
$data['recruiter_tl_list'] = $this->m_dailyreport->selectRecruiterTl($admin_id);

$data['skillwise_reports'] = $this->m_recruiter->individual_excel_report_client_id_aaa($client_id); 
}
elseif(!empty($clientwise_candidate))
{
	$client_id = $area;
	$data['skillwise_reports'] = $this->m_recruiter->individual_excel_report_client_id_aaa($client_id); 

	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_candidate($area,$clientwise_candidate); 
	$data['clientwise_candidate_search'] = $clientwise_candidate;

	$data['client_list'] =$this->m_recruiter->client_list_non_it($admin_id);
	$data['recruiter_tl_list'] = $this->m_dailyreport->selectRecruiterTl($admin_id);
}
else
{
	$client_id = $area;

	$data['skillwise_reports'] = $this->m_recruiter->individual_excel_report_client_id_aaa($client_id); 

	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area); 
	$data['client_list'] =$this->m_recruiter->client_list_non_it($admin_id);
	$data['recruiter_tl_list'] = $this->m_dailyreport->selectRecruiterTl($admin_id);
}			
$data['export_client_id'] = $client_id;
$data['export_skillwise_report'] = $skillwise_report;
}
elseif($user_role==1)
{
	$skillwise_report =  $this->input->post('skillwise_report',TRUE);

	if(!empty($skillwise_report))
	{
		$totalresult = array();	

		for($i=0;$i<count($skillwise_report);$i++)
		{
$position_skills_filter = $skillwise_report[$i];//get_client_id_search_result_report_filter
$totalresult[$i] = $this->m_recruiter->get_client_id_search_result_search($area,$position_skills_filter); 	
}
$k=0;
$finalarray = array();

for($j=0;$j<count($totalresult);$j++)
{
	for($q=0;$q<count($totalresult[$j]);$q++)
	{
		$finalarray[$k] = $totalresult[$j][$q]; 	
		$k++;
	}

}
$data['list_dailyreport'] = $finalarray;

$client_id = $area;
$data['client_list'] =$this->m_recruiter->client_list($admin_id);
$data['recruiter_tl_list'] = $this->m_dailyreport->selectRecruiterTl($admin_id);

$data['skillwise_reports'] = $this->m_recruiter->individual_excel_report_client_id_aaa($client_id); 
}
elseif(!empty($clientwise_candidate))
{
	$client_id = $area;
	$data['skillwise_reports'] = $this->m_recruiter->individual_excel_report_client_id_aaa($client_id); 

	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_candidate($area,$clientwise_candidate); 
	$data['clientwise_candidate_search'] = $clientwise_candidate;

	$data['client_list'] =$this->m_recruiter->client_list($admin_id);
	$data['recruiter_tl_list'] = $this->m_dailyreport->selectRecruiterTl($admin_id);
}
else
{
	$client_id = $area;
	$data['skillwise_reports'] = $this->m_recruiter->individual_excel_report_client_id_aaa($client_id); 
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_admin_id($area,$admin_id); 
	$data['client_list'] =$this->m_recruiter->client_list($admin_id);
	$data['recruiter_tl_list'] = $this->m_dailyreport->selectRecruiterTl($admin_id);
}			
$data['export_client_id'] = $client_id;
$data['export_skillwise_report'] = $skillwise_report;
}
elseif($user_role==9 || $user_role==10)
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_user_id($area,$user_id); 
	$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
	$data['recruiter_tl_list'] = $this->m_dailyreport->selectRecruiterTl($admin_id);
}

else
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_user_id($area,$user_id); 
	$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
	$data['recruiter_tl_list'] = $this->m_dailyreport->selectRecruiterTl($admin_id);
}

if(!empty($client_id_search)) 
{
	$client_id_search = $this->session->flashdata('client_id_search');
}
if(empty($data['list_dailyreport']))
{
	$this->session->set_flashdata('errorss','No Record Found!');
	redirect('recruiter/recruiter/nodataflat');
}
else
{
	$data['siderbar_menus'] = $this->M_permission->list_labels('internal user');
	$this->load->view('template/header');
	$this->load->view('template/sidebar',$data);
	$this->load->view('recruiter/non_it_dailyreport_list',$data);
//$this->load->view('home/footer');
}
}
public function nodataflat()
{

	header("Cache-Control: max-age=300, must-revalidate");
	$user_id = $this->session->userdata('user_id');
	$user_role = $this->session->userdata('user_role');

	if($user_role==1)
	{
		$admin_id=$this->session->userdata('user_id');
	}else
	{
		$admin_id=$this->session->userdata('admin_id');	
	}

	if ($user_role==9) 
	{
		$area = $this->session->userdata('client_id_search');
		$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
		$data['client_id_search']  =  $area;
		if(!empty($area)) 
		{
			$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_user_id($area,$user_id); 
			$client_id_search = $this->session->flashdata('area');
		}  	
	}
	elseif ($user_role==2) 
	{
		$area = $this->session->userdata('client_id_search');
		$data['client_list'] =$this->m_recruiter->client_list($admin_id);
		$data['client_id_search']  =  $area;
		if(!empty($area)) 
		{
			$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area);  

			$client_id_search = $this->session->flashdata('area');
		}  	
	}
	elseif ($user_role==5) 
	{
		$area = $this->session->userdata('client_id_search');
		$data['client_list'] =$this->m_recruiter->client_list($admin_id);
		$data['recruiter_tl_list'] = $this->m_dailyreport->selectRecruiterTl($admin_id);	
		$data['client_id_search']  =  $area;
		if(!empty($area)) 
		{
			$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area);  

			$client_id_search = $this->session->flashdata('area');
		}  	
	}
	$data['siderbar_menus'] = $this->M_permission->list_labels('internal user');
	$this->load->view('template/header');
	$this->load->view('template/sidebar',$data);
	$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
	$this->load->view('recruiter/non_it_dailyreport_add',$data);


}

function create_admin_notifications()
{
	$user_role=$this->session->userdata('user_role');
	if($user_role==1){$admin_id = $this->session->userdata('user_id');}
	else{$admin_id= $this->session->userdata('admin_id');}
	$this->load->model('user/M_admin_user');
	$beta = array(
		'notification_title' => 'Want To Access Employee Daily Report',
		'notification_from_id' => $this->session->userdata('user_id'),
		'notification_to_id' => $admin_id,
		'notification_for_role' => 'EMP',
		'notification_type' => 'Access',
		'admin_id'=>$admin_id,
	);
// 			print_r($beta); exit;
	$this->commen_model->create_notification($beta);
	return;
}


public function excel()
{
	$download_count = $this->commen_model->gatdatabyid(array('user_admin_id' => $this->session->userdata('user_id')), 'user_admin');
	if($download_count[0]->download_count >= 20)
	{
		$data = array('user_id' => $this->session->userdata('user_id'), 'purpose' => 'Employee Daily Report', 'created_at' => date('Y-m-d'));
		$result = $this->commen_model->insert_data('extra_download', $data);
		$this->create_admin_notifications();
		$this->session->set_flashdata('error', 'Your Download Limit Is Over, Wait For Admin Approval..!!');
		redirect('recruiter/recruiter');
	}
	else
	{
		$user_id = $this->session->userdata('user_id');
		$this->load->library('PHPExcel', NULL, 'excel');
		$this->excel->setActiveSheetIndex(0);
		$client_id_search  	=  	$this->input->post('client_id_search'); 
		$area 				= 	$client_id_search;
		$data['client_id_search']  =  $client_id_search;
		$this->session->set_userdata('client_id_search', $client_id_search);
		$user_role = $this->session->userdata('user_role');
		$rs = $this->m_recruiter->get_client_id_search_result_report_by_user_id($area,$user_id); 
		$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
		$sheetname = $this->m_recruiter->get_client_sheetname_report($area); 
		$sheetname = $sheetname[0]->sheetname;
		$sheetname=substr($sheetname, 0, 31);
		
		$this->excel->getActiveSheet()->setTitle($sheetname);
        //set cell A1 content with some text
		$this->excel->getActiveSheet()->setCellValue('A1', 'SR.NO.');
		$this->excel->getActiveSheet()->setCellValue('B1', 'DATE');
		$this->excel->getActiveSheet()->setCellValue('C1', 'COMPANY /Client');
		$this->excel->getActiveSheet()->setCellValue('D1', 'POSITION/SKILLS');
		$this->excel->getActiveSheet()->setCellValue('E1', 'RP ID');
		$this->excel->getActiveSheet()->setCellValue('F1', 'Candidate Name');
		$this->excel->getActiveSheet()->setCellValue('G1', 'Applicant ID');
		$this->excel->getActiveSheet()->setCellValue('H1', 'Role');
		$this->excel->getActiveSheet()->setCellValue('I1', 'Qulification');
		$this->excel->getActiveSheet()->setCellValue('J1', 'Company Name');
		$this->excel->getActiveSheet()->setCellValue('K1', 'Yrs of Experience');
		$this->excel->getActiveSheet()->setCellValue('L1', 'Relevant Exp');
		$this->excel->getActiveSheet()->setCellValue('M1', 'CTC');
		$this->excel->getActiveSheet()->setCellValue('N1', 'Exp CTC');
		$this->excel->getActiveSheet()->setCellValue('O1', 'Notice Period');
		$this->excel->getActiveSheet()->setCellValue('P1', 'Official/OnPaper Notice Period');
		$this->excel->getActiveSheet()->setCellValue('Q1', 'Contact No');
		$this->excel->getActiveSheet()->setCellValue('R1', 'Alternate Contact Number');
		$this->excel->getActiveSheet()->setCellValue('S1', 'Email ID');
		$this->excel->getActiveSheet()->setCellValue('T1', 'Alternate Email ID');
		$this->excel->getActiveSheet()->setCellValue('U1', 'Current Location');
		$this->excel->getActiveSheet()->setCellValue('V1', 'Preffered Location');
		$this->excel->getActiveSheet()->setCellValue('W1', 'Client Feed Back');
		$this->excel->getActiveSheet()->setCellValue('X1', 'Interview Schedule');
		$this->excel->getActiveSheet()->setCellValue('Y1', 'Final Status');
		$this->excel->getActiveSheet()->setCellValue('Z1', 'Client Recruiter');
		$this->excel->getActiveSheet()->setCellValue('AA1', 'Sourced By');
		$this->excel->getActiveSheet()->setCellValue('AB1', 'Reason for Job Change/Remark');
        $from 	= "A1"; // or any value
        $to 	= "AB1"; // or any value
        $this->excel->getActiveSheet()->getStyle("$from:$to")->applyFromArray(
	    array(
		'fill' => array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
			'color' => array(
				'rgb' => 'FFFF00'
			)
		),
		'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		)
	)
);

$this->excel->getActiveSheet()->getStyle("$from:$to")->getFont()->setBold(true);

$fromrow 	= "A"; // or any value
$torow 	    = "AB"; // or any value

$this->excel->getActiveSheet()->getStyle("$fromrow:$torow")->applyFromArray(
	array(
		'fill' => array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
		),
		'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		)
	)
);

// Auto size columns for each worksheet
$cellIterator = $this->excel->getActiveSheet()->getRowIterator()->current()->getCellIterator();
$cellIterator->setIterateOnlyExistingCells(true);
/** @var PHPExcel_Cell $cell */
foreach ($cellIterator as $cell) 
{
	$this->excel->getActiveSheet()->getColumnDimension($cell->getColumn())->setAutoSize(true);
}

$rowCount = 2;
foreach ($rs as $element) 
{
	$da = date("d-m-Y", strtotime($element['date']));

	$this->excel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['sr_no']);
	$this->excel->getActiveSheet()->SetCellValue('B' . $rowCount, $da);
	$this->excel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['company_client']);
	$this->excel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['position_skills']);
	$this->excel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['rp_id']);
	$this->excel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['candidate_name']);

	if(!empty(@$element['color']))
	{
		@$str = @$element['color'];
		$str2 = substr($str, 1);

		$this->excel->getActiveSheet()->getStyle('F' . $rowCount, $element['candidate_name'])->applyFromArray(
			array(
				'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,
					'color' => array(
						'rgb' => @$str2
					)
				)
			)
		);		            	
	}

	$this->excel->getActiveSheet()->SetCellValue('G' . $rowCount, $element['applicant_id']);
	$this->excel->getActiveSheet()->SetCellValue('H' . $rowCount, $element['role']);
	$this->excel->getActiveSheet()->SetCellValue('I' . $rowCount, $element['qulification']);
	$this->excel->getActiveSheet()->SetCellValue('J' . $rowCount, $element['company_name']);

	if( (!empty(@$element['yrs_of_experience'])) AND (!empty(@$element['months_of_experience'])) )
	{
		$exp_in_yrs = $element['yrs_of_experience'].".".$element['months_of_experience']." Yrs";
	}
	elseif( (!empty($element['yrs_of_experience'])) )
	{
		$exp_in_yrs = $element['yrs_of_experience']." Yrs";
	}
	elseif( (!empty($element['months_of_experience'])) )
	{
		$exp_in_yrs = $element['months_of_experience']." Months";
	}
	$this->excel->getActiveSheet()->SetCellValue('K' . $rowCount, @$exp_in_yrs);
	$this->excel->getActiveSheet()->SetCellValue('L' . $rowCount, $element['relevant_exp']);

	if( (!empty(@$element['ctc'])) AND (!empty(@$element['ctc_thousand'])) )
	{
		$total_ctc = $element['ctc'].".".$element['ctc_thousand']." L/A";
	}
	elseif( (!empty($element['ctc'])) )
	{
		$total_ctc = $element['ctc']." L/A";
	}
	elseif( (!empty($element['ctc_thousand'])) )
	{
		$total_ctc = $element['ctc_thousand']." Thousands";
	}
	$this->excel->getActiveSheet()->SetCellValue('M' . $rowCount, @$total_ctc);
	$this->excel->getActiveSheet()->SetCellValue('N' . $rowCount, $element['exp_ctc']);
	$this->excel->getActiveSheet()->SetCellValue('O' . $rowCount, $element['notice_period']);
	$this->excel->getActiveSheet()->SetCellValue('P' . $rowCount, $element['official_onpaper_notice_period']);
	$this->excel->getActiveSheet()->SetCellValue('Q' . $rowCount, $element['contact_no']);
	$this->excel->getActiveSheet()->SetCellValue('R' . $rowCount, $element['alternate_contact_number']);
	$this->excel->getActiveSheet()->SetCellValue('S' . $rowCount, $element['email_id']);
	$this->excel->getActiveSheet()->SetCellValue('T' . $rowCount, $element['alternate_email_id']);
	$this->excel->getActiveSheet()->SetCellValue('U' . $rowCount, $element['location']);
	$this->excel->getActiveSheet()->SetCellValue('V' . $rowCount, $element['preffered_location']);
	$this->excel->getActiveSheet()->SetCellValue('W' . $rowCount, $element['client_feedback']);
	$this->excel->getActiveSheet()->SetCellValue('X' . $rowCount, $element['interview_schedule']);
	$this->excel->getActiveSheet()->SetCellValue('Y' . $rowCount, $element['final_status']);
	$this->excel->getActiveSheet()->SetCellValue('Z' . $rowCount, $element['client_recruiter']);
	$this->excel->getActiveSheet()->SetCellValue('AA' . $rowCount, $element['sourced_by']);
	$this->excel->getActiveSheet()->SetCellValue('AB' . $rowCount, $element['reason_for_job_change']);
	$rowCount++;
}

$filename=$sheetname.'.xls'; //save our workbook as this file name
header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache

$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
//force user to download the Excel file without writing it to server's HD
$objWriter->save('php://output');

}
}


public function mastersheet_excel()
{
	$user_id = $this->session->userdata('user_id');

	$client_id_search  	=  	$this->input->post('client_id_search'); 

	$skillwise_report =  $this->input->post('skillwise_report',TRUE);

	if(!empty($skillwise_report))
	{
		$this->load->library('PHPExcel', NULL, 'excel');

// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();

		$objPHPExcel->setActiveSheetIndex(0);	

		$query=$this->db->query("SELECT sheetname FROM tbl_dailyreport_recruiter WHERE sheetid='$client_id_search'");
		@$sheetname = $query->row()->sheetname; 

// Rename sheet
		$objPHPExcel->getActiveSheet()->setTitle($sheetname);


//set cell A1 content with some text
		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'SR.NO.');
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'DATE');
		$objPHPExcel->getActiveSheet()->setCellValue('C1', 'Client');
		$objPHPExcel->getActiveSheet()->setCellValue('D1', 'POSITION/SKILLS');
		$objPHPExcel->getActiveSheet()->setCellValue('E1', 'RP ID');
		$objPHPExcel->getActiveSheet()->setCellValue('F1', 'Candidate Name');
		$objPHPExcel->getActiveSheet()->setCellValue('G1', 'Applicant ID');
		$objPHPExcel->getActiveSheet()->setCellValue('H1', 'Role');
		$objPHPExcel->getActiveSheet()->setCellValue('I1', 'Qulification');
		$objPHPExcel->getActiveSheet()->setCellValue('J1', 'Company Name');
		$objPHPExcel->getActiveSheet()->setCellValue('K1', 'Yrs of Experience');
		$objPHPExcel->getActiveSheet()->setCellValue('L1', 'Relevant Exp');
		$objPHPExcel->getActiveSheet()->setCellValue('M1', 'CTC');
		$objPHPExcel->getActiveSheet()->setCellValue('N1', 'Exp CTC');
		$objPHPExcel->getActiveSheet()->setCellValue('O1', 'Notice Period');
		$objPHPExcel->getActiveSheet()->setCellValue('P1', 'Official/OnPaper Notice Period');
		$objPHPExcel->getActiveSheet()->setCellValue('Q1', 'Contact No');
		$objPHPExcel->getActiveSheet()->setCellValue('R1', 'Alternate Contact Number');
		$objPHPExcel->getActiveSheet()->setCellValue('S1', 'Email ID');
		$objPHPExcel->getActiveSheet()->setCellValue('T1', 'Alternate Email ID');
		$objPHPExcel->getActiveSheet()->setCellValue('U1', 'Current Location');
		$objPHPExcel->getActiveSheet()->setCellValue('V1', 'Preffered Location');
		$objPHPExcel->getActiveSheet()->setCellValue('W1', 'Client Feed Back');
		$objPHPExcel->getActiveSheet()->setCellValue('X1', 'Interview Schedule');
		$objPHPExcel->getActiveSheet()->setCellValue('Y1', 'Final Status');
		$objPHPExcel->getActiveSheet()->setCellValue('Z1', 'Client Recruiter');
		$objPHPExcel->getActiveSheet()->setCellValue('AA1', 'Sourced By');
		$objPHPExcel->getActiveSheet()->setCellValue('AB1', 'Reason for Job Change/Remark');

$from 	= "A1"; // or any value
$to 	= "AB1"; // or any value

$objPHPExcel->getActiveSheet()->getStyle("$from:$to")->applyFromArray(
	array(
		'fill' => array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
			'color' => array(
				'rgb' => 'FFFF00'
			)
		),
		'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		)
	)
);

$objPHPExcel->getActiveSheet()->getStyle("$from:$to")->getFont()->setBold(true);

$fromrow 	= "A"; // or any value
$torow 	    = "AB"; // or any value

$objPHPExcel->getActiveSheet()->getStyle("$fromrow:$torow")->applyFromArray(
	array(
		'fill' => array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
		),
		'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		)
	)
);

// Auto size columns for each worksheet
$cellIterator = $objPHPExcel->getActiveSheet()->getRowIterator()->current()->getCellIterator();
$cellIterator->setIterateOnlyExistingCells(true);
// @var PHPExcel_Cell $cell 
foreach ($cellIterator as $cell) 
{
	$objPHPExcel->getActiveSheet()->getColumnDimension($cell->getColumn())->setAutoSize(true);
}

$totalresult = array();

$skillwise_report = explode(",",$skillwise_report);

for($i=0;$i<count($skillwise_report);$i++)
{
	$position_skills_filter = $skillwise_report[$i];
	$totalresult[$position_skills_filter] = $this->m_recruiter->get_client_id_search_result_report_filter($client_id_search,$position_skills_filter); 	
}


$Srno=1;
$rowCount = 2;
foreach ($totalresult as $elements) 
{
	foreach ($elements as $element) 
	{
		$da = date("d-m-Y", strtotime($element['date']));

		$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $Srno);
		$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $da);
		$objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['sheetname']);
		$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['position_skills']);
		$objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['rp_id']);
		$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['candidate_name']);

		if(!empty(@$element['color']))
		{
			@$str = @$element['color'];
			$str2 = substr($str, 1);

			$objPHPExcel->getActiveSheet()->getStyle('F' . $rowCount, $element['candidate_name'])->applyFromArray(
				array(
					'fill' => array(
						'type' => PHPExcel_Style_Fill::FILL_SOLID,
						'color' => array(
							'rgb' => @$str2
						)
					)
				)
			);		            	
		}

		$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element['applicant_id']);
		$objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element['role']);
		$objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $element['qulification']);
		$objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $element['company_name']);

		if( (!empty(@$element['yrs_of_experience'])) AND (!empty(@$element['months_of_experience'])) )
		{
			$exp_in_yrs = $element['yrs_of_experience'].".".$element['months_of_experience']." Yrs";
		}
		elseif( (!empty($element['yrs_of_experience'])) )
		{
			$exp_in_yrs = $element['yrs_of_experience']." Yrs";
		}
		elseif( (!empty($element['months_of_experience'])) )
		{
			$exp_in_yrs = $element['months_of_experience']." Months";
		}
		$objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, @$exp_in_yrs);

		$objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $element['relevant_exp']);


		if( (!empty(@$element['ctc'])) AND (!empty(@$element['ctc_thousand'])) )
		{
			$total_ctc = $element['ctc'].".".$element['ctc_thousand']." L/A";
		}
		elseif( (!empty($element['ctc'])) )
		{
			$total_ctc = $element['ctc']." L/A";
		}
		elseif( (!empty($element['ctc_thousand'])) )
		{
			$total_ctc = $element['ctc_thousand']." Thousands";
		}
		$objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, @$total_ctc);				


// 			$objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $element['ctc'].".".$element['ctc_thousand']);


		$objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $element['exp_ctc']);
		$objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, $element['notice_period']);
		$objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, $element['official_onpaper_notice_period']);
		$objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount, $element['contact_no']);
		$objPHPExcel->getActiveSheet()->SetCellValue('R' . $rowCount, $element['alternate_contact_number']);
		$objPHPExcel->getActiveSheet()->SetCellValue('S' . $rowCount, $element['email_id']);
		$objPHPExcel->getActiveSheet()->SetCellValue('T' . $rowCount, $element['alternate_email_id']);
		$objPHPExcel->getActiveSheet()->SetCellValue('U' . $rowCount, $element['location']);
		$objPHPExcel->getActiveSheet()->SetCellValue('V' . $rowCount, $element['preffered_location']);
		$objPHPExcel->getActiveSheet()->SetCellValue('W' . $rowCount, $element['client_feedback']);
		$objPHPExcel->getActiveSheet()->SetCellValue('X' . $rowCount, $element['interview_schedule']);
		$objPHPExcel->getActiveSheet()->SetCellValue('Y' . $rowCount, $element['final_status']);
		$objPHPExcel->getActiveSheet()->SetCellValue('Z' . $rowCount, $element['client_recruiter']);
		$objPHPExcel->getActiveSheet()->SetCellValue('AA' . $rowCount, $element['sourced_by']);
		$objPHPExcel->getActiveSheet()->SetCellValue('AB' . $rowCount, $element['reason_for_job_change']);
		$rowCount++;
		$Srno++;
	}

}

$query=$this->db->query("SELECT name,l_name FROM user_admin WHERE user_admin_id='$user_id'");
@$name = $query->row()->name; 
@$l_name = $query->row()->l_name; 
$fullname = $name." ".$l_name;


$filename=$fullname.'.xls'; //save our workbook as this file name
header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache

//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
//if you want to save it as .XLSX Excel 2007 format
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  
//force user to download the Excel file without writing it to server's HD
$objWriter->save('php://output');	
}


$this->load->library('PHPExcel', NULL, 'excel');
$this->excel->setActiveSheetIndex(0);
//name the worksheet


$area 				= 	$client_id_search;
$data['client_id_search']  =  $client_id_search;
$this->session->set_userdata('client_id_search', $client_id_search);

$user_role = $this->session->userdata('user_role');

if($user_role==1)
{
	$admin_id=$this->session->userdata('user_id');
}else
{
	$admin_id=$this->session->userdata('admin_id');	
}

$rs = $this->m_recruiter->get_client_id_search_result_report($area); 
$data['client_list'] =$this->m_recruiter->client_list($admin_id);

$sheetname = $this->m_recruiter->get_client_sheetname_report($area); 
$sheetname = $sheetname[0]->sheetname;			

$this->excel->getActiveSheet()->setTitle($sheetname);

//set cell A1 content with some text
$this->excel->getActiveSheet()->setCellValue('A1', 'SR.NO.');
$this->excel->getActiveSheet()->setCellValue('B1', 'DATE');
$this->excel->getActiveSheet()->setCellValue('C1', 'COMPANY /Client');
$this->excel->getActiveSheet()->setCellValue('D1', 'POSITION/SKILLS');
$this->excel->getActiveSheet()->setCellValue('E1', 'RP ID');
$this->excel->getActiveSheet()->setCellValue('F1', 'Candidate Name');
$this->excel->getActiveSheet()->setCellValue('G1', 'Applicant ID');
$this->excel->getActiveSheet()->setCellValue('H1', 'Role');
$this->excel->getActiveSheet()->setCellValue('I1', 'Qulification');
$this->excel->getActiveSheet()->setCellValue('J1', 'Company Name');
$this->excel->getActiveSheet()->setCellValue('K1', 'Yrs of Experience');
$this->excel->getActiveSheet()->setCellValue('L1', 'Relevant Exp');
$this->excel->getActiveSheet()->setCellValue('M1', 'CTC');
$this->excel->getActiveSheet()->setCellValue('N1', 'Exp CTC');
$this->excel->getActiveSheet()->setCellValue('O1', 'Notice Period');
$this->excel->getActiveSheet()->setCellValue('P1', 'Official/OnPaper Notice Period');
$this->excel->getActiveSheet()->setCellValue('Q1', 'Contact No');
$this->excel->getActiveSheet()->setCellValue('R1', 'Alternate Contact Number');
$this->excel->getActiveSheet()->setCellValue('S1', 'Email ID');
$this->excel->getActiveSheet()->setCellValue('T1', 'Alternate Email ID');
$this->excel->getActiveSheet()->setCellValue('U1', 'Current Location');
$this->excel->getActiveSheet()->setCellValue('V1', 'Preffered Location');
$this->excel->getActiveSheet()->setCellValue('W1', 'Client Feed Back');
$this->excel->getActiveSheet()->setCellValue('X1', 'Interview Schedule');
$this->excel->getActiveSheet()->setCellValue('Y1', 'Final Status');
$this->excel->getActiveSheet()->setCellValue('Z1', 'Client Recruiter');
$this->excel->getActiveSheet()->setCellValue('AA1', 'Sourced By');
$this->excel->getActiveSheet()->setCellValue('AB1', 'Reason for Job Change/Remark');

$from 	= "A1"; // or any value
$to 	= "AB1"; // or any value

$this->excel->getActiveSheet()->getStyle("$from:$to")->applyFromArray(
	array(
		'fill' => array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
			'color' => array(
				'rgb' => 'FFFF00'
			)
		),
		'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		)
	)
);

$this->excel->getActiveSheet()->getStyle("$from:$to")->getFont()->setBold(true);

$fromrow 	= "A"; // or any value
$torow 	    = "AB"; // or any value

$this->excel->getActiveSheet()->getStyle("$fromrow:$torow")->applyFromArray(
	array(
		'fill' => array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
		),
		'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		)
	)
);

// Auto size columns for each worksheet
$cellIterator = $this->excel->getActiveSheet()->getRowIterator()->current()->getCellIterator();
$cellIterator->setIterateOnlyExistingCells(true);
/** @var PHPExcel_Cell $cell */
foreach ($cellIterator as $cell) 
{
	$this->excel->getActiveSheet()->getColumnDimension($cell->getColumn())->setAutoSize(true);
}

$rowCount = 2;
foreach ($rs as $element) 
{
	$da = date("d-m-Y", strtotime($element['date']));

	$this->excel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['sr_no']);
	$this->excel->getActiveSheet()->SetCellValue('B' . $rowCount, $da);
	$this->excel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['company_client']);
	$this->excel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['position_skills']);
	$this->excel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['rp_id']);
	$this->excel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['candidate_name']);

	if(!empty(@$element['color']))
	{
		@$str = @$element['color'];
		$str2 = substr($str, 1);

		$this->excel->getActiveSheet()->getStyle('F' . $rowCount, $element['candidate_name'])->applyFromArray(
			array(
				'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,
					'color' => array(
						'rgb' => @$str2
					)
				)
			)
		);		            	
	}

	$this->excel->getActiveSheet()->SetCellValue('G' . $rowCount, $element['applicant_id']);
	$this->excel->getActiveSheet()->SetCellValue('H' . $rowCount, $element['role']);
	$this->excel->getActiveSheet()->SetCellValue('I' . $rowCount, $element['qulification']);
	$this->excel->getActiveSheet()->SetCellValue('J' . $rowCount, $element['company_name']);
	$this->excel->getActiveSheet()->SetCellValue('K' . $rowCount, $element['yrs_of_experience'].".".$element['months_of_experience']);
	$this->excel->getActiveSheet()->SetCellValue('L' . $rowCount, $element['relevant_exp']);
	$this->excel->getActiveSheet()->SetCellValue('M' . $rowCount, $element['ctc'].".".$element['ctc_thousand']);
	$this->excel->getActiveSheet()->SetCellValue('N' . $rowCount, $element['exp_ctc']);
	$this->excel->getActiveSheet()->SetCellValue('O' . $rowCount, $element['notice_period']);
	$this->excel->getActiveSheet()->SetCellValue('P' . $rowCount, $element['official_onpaper_notice_period']);
	$this->excel->getActiveSheet()->SetCellValue('Q' . $rowCount, $element['contact_no']);
	$this->excel->getActiveSheet()->SetCellValue('R' . $rowCount, $element['alternate_contact_number']);
	$this->excel->getActiveSheet()->SetCellValue('S' . $rowCount, $element['email_id']);
	$this->excel->getActiveSheet()->SetCellValue('T' . $rowCount, $element['alternate_email_id']);
	$this->excel->getActiveSheet()->SetCellValue('U' . $rowCount, $element['location']);
	$this->excel->getActiveSheet()->SetCellValue('V' . $rowCount, $element['preffered_location']);
	$this->excel->getActiveSheet()->SetCellValue('W' . $rowCount, $element['client_feedback']);
	$this->excel->getActiveSheet()->SetCellValue('X' . $rowCount, $element['interview_schedule']);
	$this->excel->getActiveSheet()->SetCellValue('Y' . $rowCount, $element['final_status']);
	$this->excel->getActiveSheet()->SetCellValue('Z' . $rowCount, $element['client_recruiter']);
	$this->excel->getActiveSheet()->SetCellValue('AA' . $rowCount, $element['sourced_by']);
	$this->excel->getActiveSheet()->SetCellValue('AB' . $rowCount, $element['reason_for_job_change']);
	$rowCount++;
}

$filename=$sheetname.'.xls'; //save our workbook as this file name
header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache

//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
//if you want to save it as .XLSX Excel 2007 format
$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
//force user to download the Excel file without writing it to server's HD
$objWriter->save('php://output');

}



public function update_role()
{
	$user_id = $this->session->userdata('user_id');
	$dailyreport_id=  $this->input->post('dailyreport_id',TRUE);
$this->db->set('role', $this->input->post('role')); //value that used to update column  
$this->db->where('dailyreport_id', $dailyreport_id); //which row want to upgrade  
$result = 	$this->db->update('tbl_dailyreport_recruiter');  //table name

$area = $this->session->userdata('client_id_search');

$user_role = $this->session->userdata('user_role');

if($user_role==1)
{
	$admin_id=$this->session->userdata('user_id');
}else
{
	$admin_id=$this->session->userdata('admin_id');	
}

if($user_role==2 || $user_role==5)
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area); 
	$data['client_list'] =$this->m_recruiter->client_list($admin_id);
}
else
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_user_id($area,$user_id); 
	$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
}

$data['client_id_search']  =  $area;
if(!empty($area)) 
{
	$client_id_search = $this->session->flashdata('area');
}

if($result)
{
	$this->session->set_flashdata('errorss','Record updated Successfully!'); 
}
else
{
	$this->session->set_flashdata('erroraa','Record not updated!');
}
$dashboard=  $this->input->post('dashboard',TRUE);
if(!empty($dashboard)) { $this->session->set_flashdata('success','Record updated Successfully!');  redirect('recruiters'); } else { redirect('recruiter/recruiter');}		
}

public function update_date_new()
{
	$user_id = $this->session->userdata('user_id');
	$dailyreport_id=  $this->input->post('dailyreport_idadate',TRUE);
$this->db->set('date', $this->input->post('dateqq')); //value that used to update column  
$this->db->where('dailyreport_id', $dailyreport_id); //which row want to upgrade  
$result = 	$this->db->update('tbl_dailyreport_recruiter');  //table name
$area = $this->session->userdata('client_id_search');
$user_role = $this->session->userdata('user_role');

if($user_role==1)
{
	$admin_id=$this->session->userdata('user_id');
}else
{
	$admin_id=$this->session->userdata('admin_id');	
}
if($user_role==2 || $user_role==5)
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area); 
	$data['client_list'] =$this->m_recruiter->client_list($admin_id);
}
else
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_user_id($area,$user_id); 
	$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
}
$data['client_id_search']  =  $area;
if(!empty($area)) 
{
	$client_id_search = $this->session->flashdata('area');
}
if($result)
{
	$this->session->set_flashdata('errorss','Record updated Successfully!'); 
}
else
{
	$this->session->set_flashdata('erroraa','Record not updated!');
}
$dashboard=  $this->input->post('dashboard',TRUE);
if(!empty($dashboard)) { $this->session->set_flashdata('success','Record updated Successfully!');  redirect('recruiters'); } else { redirect('recruiter/recruiter');}				
}





public function update_company_client()
{
	$user_id = $this->session->userdata('user_id');
	$dailyreport_id=  $this->input->post('dailyreport_idaclient_company',TRUE);
$this->db->set('company_client', $this->input->post('company_client_name')); //value that used to update column  
$this->db->where('dailyreport_id', $dailyreport_id); //which row want to upgrade  
$result = 	$this->db->update('tbl_dailyreport_recruiter');  //table name
$area = $this->session->userdata('client_id_search');
$user_role = $this->session->userdata('user_role');

if($user_role==1)
{
	$admin_id=$this->session->userdata('user_id');
}else
{
	$admin_id=$this->session->userdata('admin_id');	
}
if($user_role==2 || $user_role==5)
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area); 
	$data['client_list'] =$this->m_recruiter->client_list($admin_id);
}
else
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_user_id($area,$user_id); 
	$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
}
$data['client_id_search']  =  $area;
if(!empty($area)) 
{
	$client_id_search = $this->session->flashdata('area');
}
if($result)
{
	$this->session->set_flashdata('errorss','Record updated Successfully!'); 
}
else
{
	$this->session->set_flashdata('erroraa','Record not updated!');
}
$dashboard=  $this->input->post('dashboard',TRUE);
if(!empty($dashboard)) { $this->session->set_flashdata('success','Record updated Successfully!');  redirect('recruiters'); } else { redirect('recruiter/recruiter');}				
}

public function update_position_skills()
{
	$user_id = $this->session->userdata('user_id');
	$dailyreport_id=  $this->input->post('dailyreport_ida',TRUE);
$this->db->set('position_skills', $this->input->post('position_skills')); //value that used to update column  
$this->db->where('dailyreport_id', $dailyreport_id); //which row want to upgrade  
$result = 	$this->db->update('tbl_dailyreport_recruiter');  //table name
$area = $this->session->userdata('client_id_search');
$user_role = $this->session->userdata('user_role');

if($user_role==1)
{
	$admin_id=$this->session->userdata('user_id');
}else
{
	$admin_id=$this->session->userdata('admin_id');	
}
if($user_role==2 || $user_role==5)
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area); 
	$data['client_list'] =$this->m_recruiter->client_list($admin_id);
}
else
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_user_id($area,$user_id); 
	$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
}
$data['client_id_search']  =  $area;
if(!empty($area)) 
{
	$client_id_search = $this->session->flashdata('area');
}
if($result)
{
	$this->session->set_flashdata('errorss','Record updated Successfully!'); 
}
else
{
	$this->session->set_flashdata('erroraa','Record not updated!');
}
$dashboard=  $this->input->post('dashboard',TRUE);
if(!empty($dashboard)) { $this->session->set_flashdata('success','Record updated Successfully!');  redirect('recruiters'); } else { redirect('recruiter/recruiter');}				
}


public function update_rp_id()
{
	$user_id = $this->session->userdata('user_id');
	$dailyreport_id=  $this->input->post('dailyreport_ids',TRUE);
$this->db->set('rp_id', $this->input->post('rp_id')); //value that used to update column  
$this->db->where('dailyreport_id', $dailyreport_id); //which row want to upgrade  
$result = 	$this->db->update('tbl_dailyreport_recruiter');  //table name

$area = $this->session->userdata('client_id_search');
$user_role = $this->session->userdata('user_role');

if($user_role==1)
{
	$admin_id=$this->session->userdata('user_id');
}else
{
	$admin_id=$this->session->userdata('admin_id');	
}
if($user_role==2 || $user_role==5)
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area); 
	$data['client_list'] =$this->m_recruiter->client_list($admin_id);
}
else
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_user_id($area,$user_id); 
	$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
}

$data['client_id_search']  =  $area;

if(!empty($area)) 
{
	$client_id_search = $this->session->flashdata('area');
}

if($result)
{
	$this->session->set_flashdata('errorss','Record updated Successfully!'); 
}
else
{
	$this->session->set_flashdata('erroraa','Record not updated!');
}
$dashboard=  $this->input->post('dashboard',TRUE);
if(!empty($dashboard)) { $this->session->set_flashdata('success','Record updated Successfully!');  redirect('recruiters'); } else { redirect('recruiter/recruiter');}				
}


public function update_candidate_name()
{
	$dailyreport_id=  $this->input->post('dailyreport_idd',TRUE);
$this->db->set('candidate_name', $this->input->post('candidate_name')); //value that used to update column  
$this->db->where('dailyreport_id', $dailyreport_id); //which row want to upgrade  
$result = 	$this->db->update('tbl_dailyreport_recruiter');  //table name
$user_id = $this->session->userdata('user_id');

$area = $this->session->userdata('client_id_search');

$user_role = $this->session->userdata('user_role');

if($user_role==1)
{
	$admin_id=$this->session->userdata('user_id');
}else
{
	$admin_id=$this->session->userdata('admin_id');	
}
if($user_role==2 || $user_role==5)
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area); 
	$data['client_list'] =$this->m_recruiter->client_list($admin_id);
}
else
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_user_id($area,$user_id); 
	$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
}

$data['client_id_search']  =  $area;

if(!empty($area)) 
{
	$client_id_search = $this->session->flashdata('area');
}


if($result)
{
	$this->session->set_flashdata('errorss','Record updated Successfully!'); 
}
else
{
	$this->session->set_flashdata('erroraa','Record not updated!');
}
$dashboard=  $this->input->post('dashboard',TRUE);
if(!empty($dashboard)) { $this->session->set_flashdata('success','Record updated Successfully!');  redirect('recruiters'); } else { redirect('recruiter/recruiter');}				
}


public function update_applicant_id()
{
	$dailyreport_id=  $this->input->post('dailyreport_idf',TRUE);
$this->db->set('applicant_id', $this->input->post('applicant_id')); //value that used to update column  
$this->db->where('dailyreport_id', $dailyreport_id); //which row want to upgrade  
$result = 	$this->db->update('tbl_dailyreport_recruiter');  //table name
$area = $this->session->userdata('client_id_search');
$user_id = $this->session->userdata('user_id');

$user_role = $this->session->userdata('user_role');

if($user_role==1)
{
	$admin_id=$this->session->userdata('user_id');
}else
{
	$admin_id=$this->session->userdata('admin_id');	
}
if($user_role==2 || $user_role==5)
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area); 
	$data['client_list'] =$this->m_recruiter->client_list($admin_id);
}
else
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_user_id($area,$user_id); 
	$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
}

$data['client_id_search']  =  $area;

if(!empty($area)) 
{
	$client_id_search = $this->session->flashdata('area');
}

if($result)
{
	$this->session->set_flashdata('errorss','Record updated Successfully!'); 
}
else
{
	$this->session->set_flashdata('erroraa','Record not updated!');
}
$dashboard=  $this->input->post('dashboard',TRUE);
if(!empty($dashboard)) { $this->session->set_flashdata('success','Record updated Successfully!');  redirect('recruiters'); } else { redirect('recruiter/recruiter');}				
}


public function update_qulification()
{
	$dailyreport_id=  $this->input->post('dailyreport_idg',TRUE);
$this->db->set('qulification', $this->input->post('qulification')); //value that used to update column  
$this->db->where('dailyreport_id', $dailyreport_id); //which row want to upgrade  
$result = 	$this->db->update('tbl_dailyreport_recruiter');  //table name


$area = $this->session->userdata('client_id_search');
$user_id = $this->session->userdata('user_id');

$user_role = $this->session->userdata('user_role');

if($user_role==1)
{
	$admin_id=$this->session->userdata('user_id');
}else
{
	$admin_id=$this->session->userdata('admin_id');	
}
if($user_role==2 || $user_role==5)
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area); 
	$data['client_list'] =$this->m_recruiter->client_list($admin_id);
}
else
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_user_id($area,$user_id); 
	$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
}

$data['client_id_search']  =  $area;

if(!empty($area)) 
{
	$client_id_search = $this->session->flashdata('area');
}

if($result)
{
	$this->session->set_flashdata('errorss','Record updated Successfully!'); 
}
else
{
	$this->session->set_flashdata('erroraa','Record not updated!');
}
$dashboard=  $this->input->post('dashboard',TRUE);
if(!empty($dashboard)) { $this->session->set_flashdata('success','Record updated Successfully!');  redirect('recruiters'); } else { redirect('recruiter/recruiter');}				
}


public function update_company_name()
{
	$dailyreport_id=  $this->input->post('dailyreport_idh',TRUE);
$this->db->set('company_name', $this->input->post('company_name')); //value that used to update column  
$this->db->where('dailyreport_id', $dailyreport_id); //which row want to upgrade  
$result = 	$this->db->update('tbl_dailyreport_recruiter');  //table name

$area = $this->session->userdata('client_id_search');
$user_id = $this->session->userdata('user_id');

$user_role = $this->session->userdata('user_role');

if($user_role==1)
{
	$admin_id=$this->session->userdata('user_id');
}else
{
	$admin_id=$this->session->userdata('admin_id');	
}
if($user_role==2)
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area); 
	$data['client_list'] =$this->m_recruiter->client_list($admin_id);
}
else
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_user_id($area,$user_id); 
	$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
}

$data['client_id_search']  =  $area;

if(!empty($area)) 
{
	$client_id_search = $this->session->flashdata('area');
}

if($result)
{
	$this->session->set_flashdata('errorss','Record updated Successfully!'); 
}
else
{
	$this->session->set_flashdata('erroraa','Record not updated!');
}
$dashboard=  $this->input->post('dashboard',TRUE);
if(!empty($dashboard)) { $this->session->set_flashdata('success','Record updated Successfully!');  redirect('recruiters'); } else { redirect('recruiter/recruiter');}				
}



public function yrs_of_experience()
{
	$dailyreport_id 	=  	$this->input->post('dailyreport_id_yrs_of_experience',TRUE);
$this->db->set('yrs_of_experience', $this->input->post('yrs_of_experience')); //value that used to update column  
$this->db->set('months_of_experience', $this->input->post('months_of_experience')); //value that used to update column  
$this->db->where('dailyreport_id', $dailyreport_id); //which row want to upgrade  
$result = 	$this->db->update('tbl_dailyreport_recruiter');  //table name
$area = $this->session->userdata('client_id_search');
$user_id = $this->session->userdata('user_id');

$user_role = $this->session->userdata('user_role');

if($user_role==1)
{
	$admin_id=$this->session->userdata('user_id');
}else
{
	$admin_id=$this->session->userdata('admin_id');	
}
if($user_role==2 || $user_role==5)
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area); 
	$data['client_list'] =$this->m_recruiter->client_list($admin_id);
}
else
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_user_id($area,$user_id); 
	$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
}
$data['client_id_search']  =  $area;
if(!empty($area)) { $client_id_search = $this->session->flashdata('area'); }
if($result) { $this->session->set_flashdata('errorss','Record updated Successfully!'); }
else { $this->session->set_flashdata('erroraa','Record not updated!'); }

$dashboard=  $this->input->post('dashboard',TRUE);
if(!empty($dashboard)) { $this->session->set_flashdata('success','Record updated Successfully!');  redirect('recruiters'); } else { redirect('recruiter/recruiter');}				
}	

public function relevant_exp()
{
	$dailyreport_id 	=  	$this->input->post('dailyreport_id_relevant_exp',TRUE);
$this->db->set('relevant_exp', $this->input->post('relevant_exp')); //value that used to update column  
$this->db->where('dailyreport_id', $dailyreport_id); //which row want to upgrade  
$result = 	$this->db->update('tbl_dailyreport_recruiter');  //table name
$area = $this->session->userdata('client_id_search');
$user_id = $this->session->userdata('user_id');

$user_role = $this->session->userdata('user_role');

if($user_role==1)
{
	$admin_id=$this->session->userdata('user_id');
}else
{
	$admin_id=$this->session->userdata('admin_id');	
}
if($user_role==2 || $user_role==5)
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area); 
	$data['client_list'] =$this->m_recruiter->client_list($admin_id);
}
else
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_user_id($area,$user_id); 
	$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
}
$data['client_id_search']  =  $area;
if(!empty($area)) { $client_id_search = $this->session->flashdata('area'); }
if($result) { $this->session->set_flashdata('errorss','Record updated Successfully!'); }
else { $this->session->set_flashdata('erroraa','Record not updated!'); }

$dashboard=  $this->input->post('dashboard',TRUE);
if(!empty($dashboard)) { $this->session->set_flashdata('success','Record updated Successfully!');  redirect('recruiters'); } else { redirect('recruiter/recruiter');}				
}	

public function ctc()
{
	$dailyreport_id 	=  	$this->input->post('dailyreport_id_ctc',TRUE);
$this->db->set('ctc', $this->input->post('ctc')); //value that used to update column  
$this->db->set('ctc_thousand', $this->input->post('ctc_thousand')); //value that used to update column  
$this->db->where('dailyreport_id', $dailyreport_id); //which row want to upgrade  
$result = 	$this->db->update('tbl_dailyreport_recruiter');  //table name
$area = $this->session->userdata('client_id_search');
$user_id = $this->session->userdata('user_id');

$user_role = $this->session->userdata('user_role');

if($user_role==1)
{
	$admin_id=$this->session->userdata('user_id');
}else
{
	$admin_id=$this->session->userdata('admin_id');	
}
if($user_role==2 || $user_role==5)
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area); 
	$data['client_list'] =$this->m_recruiter->client_list($admin_id);
}
else
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_user_id($area,$user_id); 
	$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
}
$data['client_id_search']  =  $area;
if(!empty($area)) { $client_id_search = $this->session->flashdata('area'); }
if($result) { $this->session->set_flashdata('errorss','Record updated Successfully!'); }
else { $this->session->set_flashdata('erroraa','Record not updated!'); }

$dashboard=  $this->input->post('dashboard',TRUE);
if(!empty($dashboard)) { $this->session->set_flashdata('success','Record updated Successfully!');  redirect('recruiters'); } else { redirect('recruiter/recruiter');}				
}	

public function exp_ctc()
{
	$user_id = $this->session->userdata('user_id');
	$dailyreport_id 	=  	$this->input->post('dailyreport_id_exp_ctc',TRUE);
$this->db->set('exp_ctc', $this->input->post('exp_ctc')); //value that used to update column  
$this->db->where('dailyreport_id', $dailyreport_id); //which row want to upgrade  
$result = 	$this->db->update('tbl_dailyreport_recruiter');  //table name
$area = $this->session->userdata('client_id_search');

$user_role = $this->session->userdata('user_role');

if($user_role==1)
{
	$admin_id=$this->session->userdata('user_id');
}else
{
	$admin_id=$this->session->userdata('admin_id');	
}
if($user_role==2 || $user_role==5)
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area); 
	$data['client_list'] =$this->m_recruiter->client_list($admin_id);
}
else
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_user_id($area,$user_id); 
	$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
}
$data['client_id_search']  =  $area;
if(!empty($area)) { $client_id_search = $this->session->flashdata('area'); }
if($result) { $this->session->set_flashdata('errorss','Record updated Successfully!'); }
else { $this->session->set_flashdata('erroraa','Record not updated!'); }

$dashboard=  $this->input->post('dashboard',TRUE);
if(!empty($dashboard)) { $this->session->set_flashdata('success','Record updated Successfully!');  redirect('recruiters'); } else { redirect('recruiter/recruiter');}				
}	


public function notice_period()
{
	$user_id = $this->session->userdata('user_id');
	$dailyreport_id 	=  	$this->input->post('dailyreport_id_notice_period',TRUE);
$this->db->set('notice_period', $this->input->post('notice_period')); //value that used to update column  
$this->db->where('dailyreport_id', $dailyreport_id); //which row want to upgrade  
$result = 	$this->db->update('tbl_dailyreport_recruiter');  //table name
$area = $this->session->userdata('client_id_search');

$user_role = $this->session->userdata('user_role');

if($user_role==1)
{
	$admin_id=$this->session->userdata('user_id');
}else
{
	$admin_id=$this->session->userdata('admin_id');	
}
if($user_role==2 || $user_role==5)
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area); 
	$data['client_list'] =$this->m_recruiter->client_list($admin_id);
}
else
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_user_id($area,$user_id); 
	$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
}
$data['client_id_search']  =  $area;
if(!empty($area)) { $client_id_search = $this->session->flashdata('area'); }
if($result) { $this->session->set_flashdata('errorss','Record updated Successfully!'); }
else { $this->session->set_flashdata('erroraa','Record not updated!'); }

$dashboard=  $this->input->post('dashboard',TRUE);
if(!empty($dashboard)) { $this->session->set_flashdata('success','Record updated Successfully!');  redirect('recruiters'); } else { redirect('recruiter/recruiter');}				
}	

public function official_onpaper_notice_period()
{
	$user_id = $this->session->userdata('user_id');
	$dailyreport_id 	=  	$this->input->post('dailyreport_id_official_onpaper_notice_period',TRUE);
$this->db->set('official_onpaper_notice_period', $this->input->post('official_onpaper_notice_period')); //value that used to update column  
$this->db->where('dailyreport_id', $dailyreport_id); //which row want to upgrade  
$result = 	$this->db->update('tbl_dailyreport_recruiter');  //table name
$area = $this->session->userdata('client_id_search');

$user_role = $this->session->userdata('user_role');

if($user_role==1)
{
	$admin_id=$this->session->userdata('user_id');
}else
{
	$admin_id=$this->session->userdata('admin_id');	
}
if($user_role==2 || $user_role==5)
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area); 
	$data['client_list'] =$this->m_recruiter->client_list($admin_id);
}
else
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_user_id($area,$user_id); 
	$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
}
$data['client_id_search']  =  $area;
if(!empty($area)) { $client_id_search = $this->session->flashdata('area'); }
if($result) { $this->session->set_flashdata('errorss','Record updated Successfully!'); }
else { $this->session->set_flashdata('erroraa','Record not updated!'); }

$dashboard=  $this->input->post('dashboard',TRUE);
if(!empty($dashboard)) { $this->session->set_flashdata('success','Record updated Successfully!');  redirect('recruiters'); } else { redirect('recruiter/recruiter');}				
}	

public function contact_no()
{
	$user_id = $this->session->userdata('user_id');
	$dailyreport_id 	=  	$this->input->post('dailyreport_id_contact_no',TRUE);
$this->db->set('contact_no', $this->input->post('contact_no')); //value that used to update column  
$this->db->where('dailyreport_id', $dailyreport_id); //which row want to upgrade  
$result = 	$this->db->update('tbl_dailyreport_recruiter');  //table name
$area = $this->session->userdata('client_id_search');

$user_role = $this->session->userdata('user_role');

if($user_role==1)
{
	$admin_id=$this->session->userdata('user_id');
}else
{
	$admin_id=$this->session->userdata('admin_id');	
}
if($user_role==2 || $user_role==5)
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area); 
	$data['client_list'] =$this->m_recruiter->client_list($admin_id);
}
else
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_user_id($area,$user_id); 
	$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
}
$data['client_id_search']  =  $area;
if(!empty($area)) { $client_id_search = $this->session->flashdata('area'); }
if($result) { $this->session->set_flashdata('errorss','Record updated Successfully!'); }
else { $this->session->set_flashdata('erroraa','Record not updated!'); }

$dashboard=  $this->input->post('dashboard',TRUE);
if(!empty($dashboard)) { $this->session->set_flashdata('success','Record updated Successfully!');  redirect('recruiters'); } else { redirect('recruiter/recruiter');}				
}	

public function alternate_contact_number()
{
	$user_id = $this->session->userdata('user_id');
	$dailyreport_id 	=  	$this->input->post('dailyreport_id_alternate_contact_number',TRUE);
$this->db->set('alternate_contact_number', $this->input->post('alternate_contact_number')); //value that used to update column  
$this->db->where('dailyreport_id', $dailyreport_id); //which row want to upgrade  
$result = 	$this->db->update('tbl_dailyreport_recruiter');  //table name
$area = $this->session->userdata('client_id_search');

$user_role = $this->session->userdata('user_role');

if($user_role==1)
{
	$admin_id=$this->session->userdata('user_id');
}else
{
	$admin_id=$this->session->userdata('admin_id');	
}
if($user_role==2 || $user_role==5)
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area); 
	$data['client_list'] =$this->m_recruiter->client_list($admin_id);
}
else
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_user_id($area,$user_id); 
	$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
}
$data['client_id_search']  =  $area;
if(!empty($area)) { $client_id_search = $this->session->flashdata('area'); }
if($result) { $this->session->set_flashdata('errorss','Record updated Successfully!'); }
else { $this->session->set_flashdata('erroraa','Record not updated!'); }

$dashboard=  $this->input->post('dashboard',TRUE);
if(!empty($dashboard)) { $this->session->set_flashdata('success','Record updated Successfully!');  redirect('recruiters'); } else { redirect('recruiter/recruiter');}				
}	

public function email_id()
{
	$user_id = $this->session->userdata('user_id');
	$dailyreport_id 	=  	$this->input->post('dailyreport_id_email_id',TRUE);
$this->db->set('email_id', $this->input->post('email_id')); //value that used to update column  
$this->db->where('dailyreport_id', $dailyreport_id); //which row want to upgrade  
$result = 	$this->db->update('tbl_dailyreport_recruiter');  //table name
$area = $this->session->userdata('client_id_search');

$user_role = $this->session->userdata('user_role');

if($user_role==1)
{
	$admin_id=$this->session->userdata('user_id');
}else
{
	$admin_id=$this->session->userdata('admin_id');	
}
if($user_role==2 || $user_role==5)
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area); 
	$data['client_list'] =$this->m_recruiter->client_list($admin_id);
}
else
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_user_id($area,$user_id); 
	$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
}
$data['client_id_search']  =  $area;
if(!empty($area)) { $client_id_search = $this->session->flashdata('area'); }
if($result) { $this->session->set_flashdata('errorss','Record updated Successfully!'); }
else { $this->session->set_flashdata('erroraa','Record not updated!'); }

$dashboard=  $this->input->post('dashboard',TRUE);
if(!empty($dashboard)) { $this->session->set_flashdata('success','Record updated Successfully!');  redirect('recruiters'); } else { redirect('recruiter/recruiter');}				
}	

public function location()
{
	$user_id = $this->session->userdata('user_id');
	$dailyreport_id 	=  	$this->input->post('dailyreport_id_location',TRUE);
$this->db->set('location', $this->input->post('location')); //value that used to update column  
$this->db->where('dailyreport_id', $dailyreport_id); //which row want to upgrade  
$result = 	$this->db->update('tbl_dailyreport_recruiter');  //table name
$area = $this->session->userdata('client_id_search');

$user_role = $this->session->userdata('user_role');

if($user_role==1)
{
	$admin_id=$this->session->userdata('user_id');
}else
{
	$admin_id=$this->session->userdata('admin_id');	
}
if($user_role==2 || $user_role==5)
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area); 
	$data['client_list'] =$this->m_recruiter->client_list($admin_id);
}
else
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_user_id($area,$user_id); 
	$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
}
$data['client_id_search']  =  $area;
if(!empty($area)) { $client_id_search = $this->session->flashdata('area'); }
if($result) { $this->session->set_flashdata('errorss','Record updated Successfully!'); }
else { $this->session->set_flashdata('erroraa','Record not updated!'); }

$dashboard=  $this->input->post('dashboard',TRUE);
if(!empty($dashboard)) { $this->session->set_flashdata('success','Record updated Successfully!');  redirect('recruiters'); } else { redirect('recruiter/recruiter');}				
}	


public function alternate_email_id()
{
	$user_id = $this->session->userdata('user_id');
	$dailyreport_id 	=  	$this->input->post('dailyreport_id_alternate_email_id',TRUE);
$this->db->set('alternate_email_id', $this->input->post('alternate_email_id')); //value that used to update column  
$this->db->where('dailyreport_id', $dailyreport_id); //which row want to upgrade  
$result = 	$this->db->update('tbl_dailyreport_recruiter');  //table name
$area = $this->session->userdata('client_id_search');

$user_role = $this->session->userdata('user_role');

if($user_role==1)
{
	$admin_id=$this->session->userdata('user_id');
}else
{
	$admin_id=$this->session->userdata('admin_id');	
}
if($user_role==2 || $user_role==5)
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area); 
	$data['client_list'] =$this->m_recruiter->client_list($admin_id);
}
else
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_user_id($area,$user_id); 
	$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
}
$data['client_id_search']  =  $area;
if(!empty($area)) { $client_id_search = $this->session->flashdata('area'); }
if($result) { $this->session->set_flashdata('errorss','Record updated Successfully!'); }
else { $this->session->set_flashdata('erroraa','Record not updated!'); }

$dashboard=  $this->input->post('dashboard',TRUE);
if(!empty($dashboard)) { $this->session->set_flashdata('success','Record updated Successfully!');  redirect('recruiters'); } else { redirect('recruiter/recruiter');}				
}

public function preffered_location()
{
	$user_id = $this->session->userdata('user_id');
	$dailyreport_id 	=  	$this->input->post('dailyreport_id_preffered_location',TRUE);
$this->db->set('preffered_location', $this->input->post('preffered_location')); //value that used to update column  
$this->db->where('dailyreport_id', $dailyreport_id); //which row want to upgrade  
$result = 	$this->db->update('tbl_dailyreport_recruiter');  //table name
$area = $this->session->userdata('client_id_search');

$user_role = $this->session->userdata('user_role');

if($user_role==1)
{
	$admin_id=$this->session->userdata('user_id');
}else
{
	$admin_id=$this->session->userdata('admin_id');	
}
if($user_role==2 || $user_role==5)
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area); 
	$data['client_list'] =$this->m_recruiter->client_list($admin_id);
}
else
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_user_id($area,$user_id); 
	$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
}
$data['client_id_search']  =  $area;
if(!empty($area)) { $client_id_search = $this->session->flashdata('area'); }
if($result) { $this->session->set_flashdata('errorss','Record updated Successfully!'); }
else { $this->session->set_flashdata('erroraa','Record not updated!'); }

$dashboard=  $this->input->post('dashboard',TRUE);
if(!empty($dashboard)) { $this->session->set_flashdata('success','Record updated Successfully!');  redirect('recruiters'); } else { redirect('recruiter/recruiter');}				
}	

public function client_feedback()
{
	$user_id = $this->session->userdata('user_id');
	$dailyreport_id 	=  	$this->input->post('dailyreport_id_client_feedback',TRUE);

	$statusf = $this->input->post('client_feedback');
	$hold_reason = $this->input->post('hold_reason');

	if($statusf=="Hold") 
	{
$this->db->set('client_feedback', $statusf); //value that used to update column  
$this->db->set('hold_reason', $hold_reason); //value that used to update column  
$this->db->where('dailyreport_id', $dailyreport_id); //which row want to upgrade  
$result = 	$this->db->update('tbl_dailyreport_recruiter');  //table name	
}
else
{
$this->db->set('client_feedback', $statusf); //value that used to update column  
$this->db->where('dailyreport_id', $dailyreport_id); //which row want to upgrade  
$result = 	$this->db->update('tbl_dailyreport_recruiter');  //table name
}


$area = $this->session->userdata('client_id_search');

$user_role = $this->session->userdata('user_role');

if($user_role==1)
{
	$admin_id=$this->session->userdata('user_id');
}else
{
	$admin_id=$this->session->userdata('admin_id');	
}
if($user_role==2 || $user_role==5)
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area); 
	$data['client_list'] =$this->m_recruiter->client_list($admin_id);
}
else
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_user_id($area,$user_id); 
	$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
}
$data['client_id_search']  =  $area;
if(!empty($area)) { $client_id_search = $this->session->flashdata('area'); }
if($result) { $this->session->set_flashdata('errorss','Record updated Successfully!'); }
else { $this->session->set_flashdata('erroraa','Record not updated!'); }

$dashboard=  $this->input->post('dashboard',TRUE);
if(!empty($dashboard)) { $this->session->set_flashdata('success','Record updated Successfully!');  redirect('recruiters'); } else { redirect('recruiter/recruiter');}				
}	


public function interview_schedule()
{
	$user_id = $this->session->userdata('user_id');
	$dailyreport_id 	=  	$this->input->post('dailyreport_id_interview_schedule',TRUE);
	$this->db->set('interview_schedule', date('Y-m-d H:i:s', strtotime($this->input->post('interview_schedule',TRUE)))); 
$this->db->where('dailyreport_id', $dailyreport_id); //which row want to upgrade  
$result = 	$this->db->update('tbl_dailyreport_recruiter');  //table name
$area = $this->session->userdata('client_id_search');

$user_role = $this->session->userdata('user_role');

if($user_role==1)
{
	$admin_id=$this->session->userdata('user_id');
}else
{
	$admin_id=$this->session->userdata('admin_id');	
}
if($user_role==2 || $user_role==5)
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area); 
	$data['client_list'] =$this->m_recruiter->client_list($admin_id);
}
else
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_user_id($area,$user_id); 
	$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
}
$data['client_id_search']  =  $area;
if(!empty($area)) { $client_id_search = $this->session->flashdata('area'); }
if($result) { $this->session->set_flashdata('errorss','Record updated Successfully!'); }
else { $this->session->set_flashdata('erroraa','Record not updated!'); }

$dashboard=  $this->input->post('dashboard',TRUE);
if(!empty($dashboard)) { $this->session->set_flashdata('success','Record updated Successfully!');  redirect('recruiters'); } else { redirect('recruiter/recruiter');}				
}	


public function interview_schedule_mode()
{
	$user_id = $this->session->userdata('user_id');
	$dailyreport_id 	=  	$this->input->post('dailyreport_id_interview_schedule_mode',TRUE);
$this->db->set('interview_schedule_mode', $this->input->post('interview_schedule_mode')); //value that used to update column  
$this->db->where('dailyreport_id', $dailyreport_id); //which row want to upgrade  
$result = 	$this->db->update('tbl_dailyreport_recruiter');  //table name
$area = $this->session->userdata('client_id_search');

$user_role = $this->session->userdata('user_role');

if($user_role==1)
{
	$admin_id=$this->session->userdata('user_id');
}else
{
	$admin_id=$this->session->userdata('admin_id');	
}
if($user_role==2 || $user_role==5)
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area); 
	$data['client_list'] =$this->m_recruiter->client_list($admin_id);
}
else
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_user_id($area,$user_id); 
	$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
}
$data['client_id_search']  =  $area;
if(!empty($area)) { $client_id_search = $this->session->flashdata('area'); }
if($result) { $this->session->set_flashdata('errorss','Record updated Successfully!'); }
else { $this->session->set_flashdata('erroraa','Record not updated!'); }

$dashboard=  $this->input->post('dashboard',TRUE);
if(!empty($dashboard)) { $this->session->set_flashdata('success','Record updated Successfully!');  redirect('recruiters'); } else { redirect('recruiter/recruiter');}				
}	


public function final_status()
{
	$user_id = $this->session->userdata('user_id');
	$dailyreport_id 	=  	$this->input->post('dailyreport_id_final_status',TRUE);

	$statusf = $this->input->post('final_status');
	$selected_joining_date = $this->input->post('selected_joining_date');
	$selected_offered_amount = $this->input->post('selected_offered_amount');
	$date_of_offer_released = $this->input->post('date_of_offer_released');
	$grade = $this->input->post('grade');

	$hr_reason = $this->input->post('hr_reason');


	if($statusf=="Offered")
	{
$this->db->set('final_status', $statusf); //value that used to update column  
$this->db->set('selected_joining_date', $selected_joining_date); //value that used to update column  
$this->db->set('selected_offered_amount', $selected_offered_amount); //value that used to update column  
$this->db->set('date_of_offer_released', $date_of_offer_released); //value that used to update column  
$this->db->set('grade', $grade); //value that used to update column  
$this->db->where('dailyreport_id', $dailyreport_id); //which row want to upgrade  
$result = 	$this->db->update('tbl_dailyreport_recruiter');  //table name	
}
elseif($statusf=="HR Reject" || $statusf=="HR Hold") 
{
$this->db->set('final_status', $statusf); //value that used to update column  
$this->db->set('hr_reason', $hr_reason); //value that used to update column  
$this->db->where('dailyreport_id', $dailyreport_id); //which row want to upgrade  
$result = 	$this->db->update('tbl_dailyreport_recruiter');  //table name	
}
else
{
$this->db->set('final_status', $statusf); //value that used to update column  
$this->db->where('dailyreport_id', $dailyreport_id); //which row want to upgrade  
$result = 	$this->db->update('tbl_dailyreport_recruiter');  //table name	
}

$area = $this->session->userdata('client_id_search');

$user_role = $this->session->userdata('user_role');

if($user_role==1)
{
	$admin_id=$this->session->userdata('user_id');
}else
{
	$admin_id=$this->session->userdata('admin_id');	
}
if($user_role==2 || $user_role==5)
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area); 
	$data['client_list'] =$this->m_recruiter->client_list($admin_id);
}
else
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_user_id($area,$user_id); 
	$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
}
$data['client_id_search']  =  $area;
if(!empty($area)) { $client_id_search = $this->session->flashdata('area'); }
if($result) { $this->session->set_flashdata('errorss','Record updated Successfully!'); }
else { $this->session->set_flashdata('erroraa','Record not updated!'); }

$dashboard=  $this->input->post('dashboard',TRUE);
if(!empty($dashboard)) { $this->session->set_flashdata('success','Record updated Successfully!');  redirect('recruiters'); } else { redirect('recruiter/recruiter');}				
}	




public function star_rating()
{
	$user_id = $this->session->userdata('user_id');
	$dailyreport_id 	=  	$this->input->post('dailyreport_id_star_rating',TRUE);
	$star_rating = $this->input->post('star_rating');

$this->db->set('star_rating', $star_rating); //value that used to update column  
$this->db->where('dailyreport_id', $dailyreport_id); //which row want to upgrade  
$result = 	$this->db->update('tbl_dailyreport_recruiter');  //table name	

$area = $this->session->userdata('client_id_search');

$user_role = $this->session->userdata('user_role');

if($user_role==1)
{
	$admin_id=$this->session->userdata('user_id');
}else
{
	$admin_id=$this->session->userdata('admin_id');	
}
if($user_role==2 || $user_role==5)
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area); 
	$data['client_list'] =$this->m_recruiter->client_list($admin_id);
}
else
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_user_id($area,$user_id); 
	$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
}
$data['client_id_search']  =  $area;
if(!empty($area)) { $client_id_search = $this->session->flashdata('area'); }
if($result) { $this->session->set_flashdata('errorss','Record updated Successfully!'); }
else { $this->session->set_flashdata('erroraa','Record not updated!'); }

$dashboard=  $this->input->post('dashboard',TRUE);
if(!empty($dashboard)) { $this->session->set_flashdata('success','Record updated Successfully!');  redirect('recruiters'); } else { redirect('recruiter/recruiter');}				
}	



public function client_recruiter()
{
	$user_id = $this->session->userdata('user_id');
	$dailyreport_id 	=  	$this->input->post('dailyreport_id_client_recruiter',TRUE);
$this->db->set('client_recruiter', $this->input->post('client_recruiter')); //value that used to update column  
$this->db->where('dailyreport_id', $dailyreport_id); //which row want to upgrade  
$result = 	$this->db->update('tbl_dailyreport_recruiter');  //table name
$area = $this->session->userdata('client_id_search');

$user_role = $this->session->userdata('user_role');

if($user_role==1)
{
	$admin_id=$this->session->userdata('user_id');
}else
{
	$admin_id=$this->session->userdata('admin_id');	
}
if($user_role==2 || $user_role==5)
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area); 
	$data['client_list'] =$this->m_recruiter->client_list($admin_id);
}
else
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_user_id($area,$user_id); 
	$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
}
$data['client_id_search']  =  $area;
if(!empty($area)) { $client_id_search = $this->session->flashdata('area'); }
if($result) { $this->session->set_flashdata('errorss','Record updated Successfully!'); }
else { $this->session->set_flashdata('erroraa','Record not updated!'); }

$dashboard=  $this->input->post('dashboard',TRUE);
if(!empty($dashboard)) { $this->session->set_flashdata('success','Record updated Successfully!');  redirect('recruiters'); } else { redirect('recruiter/recruiter');}				
}	

public function sourced_by()
{
	$user_id = $this->session->userdata('user_id');
	$dailyreport_id 	=  	$this->input->post('dailyreport_id_sourced_by',TRUE);



	$sourced_by_new = $this->input->post('sourced_by_new');
	$sourced_by_new_reason = $this->input->post('sourced_by_new_reason');

	$pieces = explode("/", $sourced_by_new);
	$user_admin_id =  $pieces[0];
	$fullname =  $pieces[1];
	$name_pieces = explode("-", $fullname);
	$name   =  $name_pieces[0];
	$l_name =  $name_pieces[1];
	$sourced_by = $name." ".$l_name;
	$this->db->set('sourced_by', $sourced_by);
	$this->db->set('user_id', $user_admin_id);
	$this->db->set('transfer_comment', $sourced_by_new_reason);
	$this->db->where('dailyreport_id', $dailyreport_id);
	$result = 	$this->db->update('tbl_dailyreport_recruiter');

	$query = $this->db->query("SELECT * FROM `user_admin` WHERE `role` = 1 OR `role` = 5 OR `user_admin_id`='$user_admin_id'");
	$results = $query->result();
	foreach ($results as $rows) 
	{
		$beta = array(
			'notification_title' => 'Candidate Transfer To ' . $sourced_by.' by '.$this->session->userdata('user_name'),
			'notification_from_id' => $this->session->userdata('user_id'),
			'notification_to_id' => $rows->user_admin_id,
			'notification_for_role' => 'All',
			'notification_type' => 'Transfer',
			'notification_of_role' => $this->session->userdata('user_id'),
			'notification_timestamp' => date('Y-m-d H:i:s')
		);
		$this->commen_model->create_notification($beta);
	}		

	$area = $this->session->userdata('client_id_search');

	$user_role = $this->session->userdata('user_role');

	if($user_role==1)
	{
		$admin_id=$this->session->userdata('user_id');
	}else
	{
		$admin_id=$this->session->userdata('admin_id');	
	}
	if($user_role==2 || $user_role==5)
	{
		$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area); 
		$data['client_list'] =$this->m_recruiter->client_list($admin_id);
	}
	else
	{
		$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_user_id($area,$user_id); 
		$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
	}
	$data['client_id_search']  =  $area;
	if(!empty($area)) { $client_id_search = $this->session->flashdata('area'); }
	if($result) { $this->session->set_flashdata('errorss','Record updated Successfully!'); }
	else { $this->session->set_flashdata('erroraa','Record not updated!'); }

	$dashboard=  $this->input->post('dashboard',TRUE);
	if(!empty($dashboard)) { $this->session->set_flashdata('success','Record updated Successfully!');  redirect('recruiters'); } else { redirect('recruiter/recruiter');}				
}	



public function reason_for_job_change()
{
	$user_id = $this->session->userdata('user_id');
	$dailyreport_id 	=  	$this->input->post('dailyreport_id_reason_for_job_change',TRUE);
$this->db->set('reason_for_job_change', $this->input->post('reason_for_job_change')); //value that used to update column  
$this->db->where('dailyreport_id', $dailyreport_id); //which row want to upgrade  
$result = 	$this->db->update('tbl_dailyreport_recruiter');  //table name
$area = $this->session->userdata('client_id_search');

$user_role = $this->session->userdata('user_role');

if($user_role==1)
{
	$admin_id=$this->session->userdata('user_id');
}else
{
	$admin_id=$this->session->userdata('admin_id');	
}
if($user_role==2 || $user_role==5)
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area); 
	$data['client_list'] =$this->m_recruiter->client_list($admin_id);
}
else
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_user_id($area,$user_id); 
	$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
}
$data['client_id_search']  =  $area;
if(!empty($area)) { $client_id_search = $this->session->flashdata('area'); }
if($result) { $this->session->set_flashdata('errorss','Record updated Successfully!'); }
else { $this->session->set_flashdata('erroraa','Record not updated!'); }

$dashboard=  $this->input->post('dashboard',TRUE);
if(!empty($dashboard)) { $this->session->set_flashdata('success','Record updated Successfully!');  redirect('recruiters'); } else { redirect('recruiter/recruiter');}				
}	

public function color_update_for_record()
{
	$dailyreport_record_id=  $this->input->post('dailyreport_record_id',TRUE);
	$dailyreport_record_name=  $this->input->post('dailyreport_record_name',TRUE);
	$color_id=  $this->input->post('color_id',TRUE);

$this->db->set('color', $color_id); //value that used to update column  
$this->db->set('candidate_name', $dailyreport_record_name); //value that used to update column  
$this->db->where('dailyreport_id', $dailyreport_record_id); //which row want to upgrade  
$result = 	$this->db->update('tbl_dailyreport_recruiter');  //table name

$area = $this->session->userdata('client_id_search');
$user_id = $this->session->userdata('user_id');

$user_role = $this->session->userdata('user_role');

if($user_role==1)
{
	$admin_id=$this->session->userdata('user_id');
}else
{
	$admin_id=$this->session->userdata('admin_id');	
}
if($user_role==2 || $user_role==5)
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result($area); 
	$data['client_list'] =$this->m_recruiter->client_list($admin_id);
}
else
{
	$data['list_dailyreport'] = $this->m_recruiter->get_client_id_search_result_by_user_id($area,$user_id); 
	$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
}

$data['client_id_search']  =  $area;

if(!empty($area)) 
{
	$client_id_search = $this->session->flashdata('area');
}

if($result)
{
	$this->session->set_flashdata('errorss','Record updated Successfully!'); 
}
else
{
	$this->session->set_flashdata('erroraa','Record not updated!');
}

$dashboard=  $this->input->post('dashboard',TRUE);
if(!empty($dashboard)) { $this->session->set_flashdata('success','Record updated Successfully!');  redirect('recruiters'); } else { redirect('recruiter/recruiter');}				
}


public function forgot_password_email_exits()
{
	$contact_no = $this->input->post('contact_no');
	$client_id = $this->input->post('client_id');
	$bydefault_contact_no = $this->input->post('bydefault_contact_no');
	
	if($contact_no==$bydefault_contact_no)
	{
		echo "TRUE";
	}
	else
	{
		$result = $this->m_recruiter->forgot_password_check_email_exists($contact_no,$client_id);
		if($result=='0')
		{
			echo "TRUE";
		}
		else
		{	        	
			echo $result;
		}
	}

}
public function get_candidate_details(){		
	$sheetid=$this->input->post('sheetid');
	$contact_no=$this->input->post('contact_no');
	$data['candidate_details']=$this->m_recruiter->get_candidate_details($sheetid,$contact_no);	
	$this->load->view('recruiter/duplicate_candidate_details',$data);
}
public function get_candidate_details_email(){		
	$sheetid=$this->input->post('sheetid');
	$email_id=$this->input->post('email_id');
	$data['candidate_details']=$this->m_recruiter->get_candidate_details_email($sheetid,$email_id);	
	$this->load->view('recruiter/duplicate_candidate_details',$data);
}


public function get_client_name(){		
	$client_id=$this->input->post('client_id');
	$query=$this->db->query("SELECT client_name FROM client WHERE client_id='$client_id'");
	echo $client_name = $query->row()->client_name; 

}


public function check_allreay_exists_client()
{
	$name = $this->input->post('name');
	$result = $this->m_recruiter->check_allreay_exists_client($name);
	if($result=='0')
	{
		echo "TRUE";
	}
	else
	{
		echo "FALSE";
	}       

}




public function forgot_password_email_exits_email_id()
{
	$email_id = $this->input->post('email_id');
	$client_id = $this->input->post('client_id');
	$bydefault_email_id = $this->input->post('bydefault_email_id');
	if($email_id==$bydefault_email_id)
	{
		echo "TRUE";
	}
	else
	{
		$result = $this->m_recruiter->forgot_password_check_email_exists_email_id($email_id,$client_id);
		if($result=='0')
		{
			echo "TRUE";
		}
		else
		{
			echo $result;
		}
	}

}




public function datewisedailyreport()
{

	$user_role = $this->session->userdata('user_role');
	if($user_role==1)
		{$admin_id=$this->session->userdata('user_id');}
	else{$admin_id=$this->session->userdata('admin_id');}

	$data['employee']=$this->m_recruiter->active_list_user($admin_id);

	$this->Baseview('recruiter/dailyreport_datewise',$data);
}

public function searchrecord_bydate()
{
	$user_role = $this->session->userdata('user_role');
	if($user_role==1){$user_id=$this->session->userdata('user_id');}
	else{$user_id=$this->session->userdata('admin_id');}
	$data['employee'] = $this->m_dailyreport->selectemployeeRecruiter($user_id);

	$aaafromdate=$this->input->post('fromdate');
	$aaatodate=$this->input->post('todate');
	$employee=$this->input->post('employee');

	if(!empty($employee))
	{
		$employee = $employee;
	}
	else
	{
		$employee = $this->session->userdata('user_id');
	}
	$fromdate =  date('Y/m/d', strtotime($aaafromdate));
	$todate =  date('Y/m/d', strtotime($aaatodate));

	$data['details'] = array(
		'fromdatea' => $aaafromdate,
		'todatea' => $aaatodate,
		'employeea' => $employee
	);

	$data['Shortlisted_Candidates']=$this->m_dailyreport->Shortlisted_Candidates($fromdate,$todate,$employee);
	$data['Screen_Reject_Candidates']=$this->m_dailyreport->Screen_Reject_Candidates($fromdate,$todate,$employee);
	$data['Duplicate_Candidates']=$this->m_dailyreport->Duplicate_Candidates($fromdate,$todate,$employee);

	$data['Select_Candidates']=$this->m_dailyreport->Select_Candidates($fromdate,$todate,$employee);
	$data['Offered_Candidates']=$this->m_dailyreport->Offered_Candidates($fromdate,$todate,$employee);
	$data['Offer_Decline_Candidates']=$this->m_dailyreport->Offer_Decline_Candidates($fromdate,$todate,$employee);
	$data['Joined_Candidates']=$this->m_dailyreport->Joined_Candidates($fromdate,$todate,$employee);
	$data['Abscond_Candidates']=$this->m_dailyreport->Abscond_Candidates($fromdate,$todate,$employee);


	$data['Client_Requirement']=$this->m_dailyreport->Client_Requirement($fromdate,$todate,$employee);

	$this->load->view('recruiter/dailyreport_recordtable',$data);
}
public function searchrecord_bydate1()
{
	$user_role = $this->session->userdata('user_role');
	if($user_role==1){$user_id=$this->session->userdata('user_id');}
	else{$user_id=$this->session->userdata('admin_id');}
	//$data['employee'] = $this->m_dailyreport->selectemployeeRecruiter($user_id);
//print_r($this->input->post());exit;
	$aaafromdate=$this->input->post('fromdate');
	$aaatodate=$this->input->post('todate');

	$fromdate =  date('Y/m/d', strtotime($aaafromdate));
	$todate =  date('Y/m/d', strtotime($aaatodate));

	$data['details'] = array(
		'fromdatea' => $aaafromdate,
		'todatea' => $aaatodate
		
	);

	$data['Shortlisted_Candidates']=$this->m_dailyreport->Shortlisted_Candidates1($fromdate,$todate);
	$data['Screen_Reject_Candidates']=$this->m_dailyreport->Screen_Reject_Candidates1($fromdate,$todate);
	$data['Duplicate_Candidates']=$this->m_dailyreport->Duplicate_Candidates1($fromdate,$todate);

	$data['Select_Candidates']=$this->m_dailyreport->Select_Candidates1($fromdate,$todate);
	$data['Offered_Candidates']=$this->m_dailyreport->Offered_Candidates1($fromdate,$todate);
	$data['Offer_Decline_Candidates']=$this->m_dailyreport->Offer_Decline_Candidates1($fromdate,$todate);
	$data['Joined_Candidates']=$this->m_dailyreport->Joined_Candidates1($fromdate,$todate);
	$data['Abscond_Candidates']=$this->m_dailyreport->Abscond_Candidates1($fromdate,$todate);


	$data['Client_Requirement']=$this->m_dailyreport->Client_Requirement1($fromdate,$todate);

	$this->load->view('recruiter/dailyreport_recordtable',$data);
}

public function generate_pdf_report($id)
{
	$dtls = explode("_", $id);
	$fromdateqq = $dtls[0];
	$todateqq = $dtls[1];
	$fromdate =  date('Y/m/d', strtotime($fromdateqq));
	$todate =  date('Y/m/d', strtotime($todateqq));
	$employee = $dtls[2];
// print_r($employee); die();

	$qqq = explode("-", $fromdateqq);
	$zzzzzz = $qqq[0];
	$xxxxxx = $qqq[1];
	$cccccc = $qqq[2];

	$fm = $cccccc."-".$xxxxxx."-".$zzzzzz;

	$ggggggg = explode("-", $todateqq);
	$jjjjj = $ggggggg[0];
	$kkkkk = $ggggggg[1];
	$lllll = $ggggggg[2];

	$tm = $lllll."-".$kkkkk."-".$jjjjj;

	$data['details'] = array(
		'fromdatea' => $fm,
		'todatea' => $tm,
		'employeea' => $employee
	);

	$data['Shortlisted_Candidates']=$this->m_dailyreport->Shortlisted_Candidates($fromdate,$todate,$employee);
	$data['Screen_Reject_Candidates']=$this->m_dailyreport->Screen_Reject_Candidates($fromdate,$todate,$employee);
	$data['Duplicate_Candidates']=$this->m_dailyreport->Duplicate_Candidates($fromdate,$todate,$employee);

	$data['Select_Candidates']=$this->m_dailyreport->Select_Candidates($fromdate,$todate,$employee);
	$data['Offered_Candidates']=$this->m_dailyreport->Offered_Candidates($fromdate,$todate,$employee);
	$data['Offer_Decline_Candidates']=$this->m_dailyreport->Offer_Decline_Candidates($fromdate,$todate,$employee);
	$data['Joined_Candidates']=$this->m_dailyreport->Joined_Candidates($fromdate,$todate,$employee);
	$data['Abscond_Candidates']=$this->m_dailyreport->Abscond_Candidates($fromdate,$todate,$employee);

	$data['Client_Requirement']=$this->m_dailyreport->Client_Requirement($fromdate,$todate,$employee);

//$html='<img src="'.$inputPath.'"/>';
	$html=$this->load->view('recruiter/salary_design', $data, true);

	$query = $this->db->query("SELECT name,l_name from user_admin where user_admin_id = ".@$employee);
	$name = $query->row()->name;
	$l_name = $query->row()->l_name;

	$outputname = $name." ".$l_name." Report from ".$fm." To ".$tm;
//this the the PDF filename that user will get to download
	$pdfFilePath = "$outputname.pdf";

// 	$pdf = $this->m_pdf->load();
	$pdf = new \Mpdf\Mpdf();
// 	print_r($pdf); die(); 

	$stylesheet = '<style>'.file_get_contents('frontend/css/bootstrap.min.css').'</style>';
	$stylesheet.= '<style>'.file_get_contents('frontend/css/style.css').'</style>';
// apply external css
	$pdf->WriteHTML($stylesheet,1);
	$pdf->WriteHTML(utf8_encode($html),2);
//offer it to user via browser download! (The PDF won't be saved on your server HDD)

	$pdf->Output($pdfFilePath, "D");
}



public function individual_excel_report()
{
	$user_id = $this->input->post('individual_report_id'); 
	$client_id_by_userid = $this->input->post('client_id_by_userid'); 		
	$aaafromdate = $this->input->post('fromdate');
	$aaatodate = $this->input->post('todate');
	$fromdate =  date('Y/m/d', strtotime($aaafromdate));
	$todate =  date('Y/m/d', strtotime($aaatodate));

	$action = $this->input->post('Search');
	if($action=="Export Excel")
	{
		$this->load->library('PHPExcel', NULL, 'excel');

// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();

		if( (!empty($user_id)) AND (!empty($client_id_by_userid)) AND (!empty($aaafromdate)) AND (!empty($aaatodate))  )
		{
// Create a first sheet, representing sales data		

			$objPHPExcel->setActiveSheetIndex(0);	

			$sheetid =  $client_id_by_userid;

			$query=$this->db->query("SELECT sheetname FROM tbl_dailyreport_recruiter WHERE sheetid='$client_id_by_userid'");
			@$sheetname = $query->row()->sheetname; 

// Rename sheet
			$objPHPExcel->getActiveSheet()->setTitle($sheetname);

			$rs = $this->m_recruiter->individual_excel_report_date($sheetid,$user_id,$fromdate,$todate); 	
//set cell A1 content with some text
			$objPHPExcel->getActiveSheet()->setCellValue('A1', 'SR.NO.');
			$objPHPExcel->getActiveSheet()->setCellValue('B1', 'DATE');
			$objPHPExcel->getActiveSheet()->setCellValue('C1', 'Client');
			$objPHPExcel->getActiveSheet()->setCellValue('D1', 'POSITION/SKILLS');
			$objPHPExcel->getActiveSheet()->setCellValue('E1', 'RP ID');
			$objPHPExcel->getActiveSheet()->setCellValue('F1', 'Candidate Name');
			$objPHPExcel->getActiveSheet()->setCellValue('G1', 'Applicant ID');
			$objPHPExcel->getActiveSheet()->setCellValue('H1', 'Role');
			$objPHPExcel->getActiveSheet()->setCellValue('I1', 'Qulification');
			$objPHPExcel->getActiveSheet()->setCellValue('J1', 'Company Name');
			$objPHPExcel->getActiveSheet()->setCellValue('K1', 'Yrs of Experience');
			$objPHPExcel->getActiveSheet()->setCellValue('L1', 'Relevant Exp');
			$objPHPExcel->getActiveSheet()->setCellValue('M1', 'CTC');
			$objPHPExcel->getActiveSheet()->setCellValue('N1', 'Exp CTC');
			$objPHPExcel->getActiveSheet()->setCellValue('O1', 'Notice Period');
			$objPHPExcel->getActiveSheet()->setCellValue('P1', 'Official/OnPaper Notice Period');
			$objPHPExcel->getActiveSheet()->setCellValue('Q1', 'Contact No');
			$objPHPExcel->getActiveSheet()->setCellValue('R1', 'Alternate Contact Number');
			$objPHPExcel->getActiveSheet()->setCellValue('S1', 'Email ID');
			$objPHPExcel->getActiveSheet()->setCellValue('T1', 'Alternate Email ID');
			$objPHPExcel->getActiveSheet()->setCellValue('U1', 'Current Location');
			$objPHPExcel->getActiveSheet()->setCellValue('V1', 'Preffered Location');
			$objPHPExcel->getActiveSheet()->setCellValue('W1', 'Client Feed Back');
			$objPHPExcel->getActiveSheet()->setCellValue('X1', 'Interview Schedule');
			$objPHPExcel->getActiveSheet()->setCellValue('Y1', 'Final Status');
			$objPHPExcel->getActiveSheet()->setCellValue('Z1', 'Client Recruiter');
			$objPHPExcel->getActiveSheet()->setCellValue('AA1', 'Sourced By');
			$objPHPExcel->getActiveSheet()->setCellValue('AB1', 'Reason for Job Change/Remark');

$from 	= "A1"; // or any value
$to 	= "AB1"; // or any value

$objPHPExcel->getActiveSheet()->getStyle("$from:$to")->applyFromArray(
	array(
		'fill' => array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
			'color' => array(
				'rgb' => 'FFFF00'
			)
		),
		'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		)
	)
);

$objPHPExcel->getActiveSheet()->getStyle("$from:$to")->getFont()->setBold(true);

$fromrow 	= "A"; // or any value
$torow 	    = "AB"; // or any value

$objPHPExcel->getActiveSheet()->getStyle("$fromrow:$torow")->applyFromArray(
	array(
		'fill' => array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
		),
		'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		)
	)
);

// Auto size columns for each worksheet
$cellIterator = $objPHPExcel->getActiveSheet()->getRowIterator()->current()->getCellIterator();
$cellIterator->setIterateOnlyExistingCells(true);
// @var PHPExcel_Cell $cell 
foreach ($cellIterator as $cell) 
{
	$objPHPExcel->getActiveSheet()->getColumnDimension($cell->getColumn())->setAutoSize(true);
}

$Srno=1;
$rowCount = 2;
foreach ($rs as $element) 
{
	$da = date("d-m-Y", strtotime($element['date']));

	$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $Srno);
	$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $da);
	$objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['sheetname']);
	$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['position_skills']);
	$objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['rp_id']);
	$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['candidate_name']);

	if(!empty(@$element['color']))
	{
		@$str = @$element['color'];
		$str2 = substr($str, 1);

		$objPHPExcel->getActiveSheet()->getStyle('F' . $rowCount, $element['candidate_name'])->applyFromArray(
			array(
				'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,
					'color' => array(
						'rgb' => @$str2
					)
				)
			)
		);		            	
	}

	$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element['applicant_id']);
	$objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element['role']);
	$objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $element['qulification']);
	$objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $element['company_name']);
	if( (!empty(@$element['yrs_of_experience'])) AND (!empty(@$element['months_of_experience'])) )
	{
		$exp_in_yrs = $element['yrs_of_experience'].".".$element['months_of_experience']." Yrs";
	}
	elseif( (!empty($element['yrs_of_experience'])) )
	{
		$exp_in_yrs = $element['yrs_of_experience']." Yrs";
	}
	elseif( (!empty($element['months_of_experience'])) )
	{
		$exp_in_yrs = $element['months_of_experience']." Months";
	}
	$objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, @$exp_in_yrs);

//$this->excel->getActiveSheet()->SetCellValue('K' . $rowCount, $element['yrs_of_experience'].".".$element['months_of_experience']);
	$objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $element['relevant_exp']);
	if( (!empty(@$element['ctc'])) AND (!empty(@$element['ctc_thousand'])) )
	{
		$total_ctc = $element['ctc'].".".$element['ctc_thousand']." L/A";
	}
	elseif( (!empty($element['ctc'])) )
	{
		$total_ctc = $element['ctc']." L/A";
	}
	elseif( (!empty($element['ctc_thousand'])) )
	{
		$total_ctc = $element['ctc_thousand']." Thousands";
	}
	$objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, @$total_ctc);

//$this->excel->getActiveSheet()->SetCellValue('M' . $rowCount, $element['ctc'].".".$element['ctc_thousand']);
	$objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $element['exp_ctc']);
	$objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, $element['notice_period']);
	$objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, $element['official_onpaper_notice_period']);
	$objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount, $element['contact_no']);
	$objPHPExcel->getActiveSheet()->SetCellValue('R' . $rowCount, $element['alternate_contact_number']);
	$objPHPExcel->getActiveSheet()->SetCellValue('S' . $rowCount, $element['email_id']);
	$objPHPExcel->getActiveSheet()->SetCellValue('T' . $rowCount, $element['alternate_email_id']);
	$objPHPExcel->getActiveSheet()->SetCellValue('U' . $rowCount, $element['location']);
	$objPHPExcel->getActiveSheet()->SetCellValue('V' . $rowCount, $element['preffered_location']);
	$objPHPExcel->getActiveSheet()->SetCellValue('W' . $rowCount, $element['client_feedback']);
	$objPHPExcel->getActiveSheet()->SetCellValue('X' . $rowCount, $element['interview_schedule']);
	$objPHPExcel->getActiveSheet()->SetCellValue('Y' . $rowCount, $element['final_status']);
	$objPHPExcel->getActiveSheet()->SetCellValue('Z' . $rowCount, $element['client_recruiter']);
	$objPHPExcel->getActiveSheet()->SetCellValue('AA' . $rowCount, $element['sourced_by']);
	$objPHPExcel->getActiveSheet()->SetCellValue('AB' . $rowCount, $element['reason_for_job_change']);
	$rowCount++;
	$Srno++;
}		

}
elseif( (!empty($user_id)) AND (!empty($client_id_by_userid)) ) 
{
// Create a first sheet, representing sales data		

	$objPHPExcel->setActiveSheetIndex(0);	

	$sheetid =  $client_id_by_userid;

	$query=$this->db->query("SELECT sheetname FROM tbl_dailyreport_recruiter WHERE sheetid='$client_id_by_userid'");
	@$sheetname = $query->row()->sheetname; 

// Rename sheet
	$objPHPExcel->getActiveSheet()->setTitle($sheetname);

	$rs = $this->m_recruiter->individual_excel_report_by_client($sheetid,$user_id); 	
//set cell A1 content with some text
	$objPHPExcel->getActiveSheet()->setCellValue('A1', 'SR.NO.');
	$objPHPExcel->getActiveSheet()->setCellValue('B1', 'DATE');
	$objPHPExcel->getActiveSheet()->setCellValue('C1', 'Client');
	$objPHPExcel->getActiveSheet()->setCellValue('D1', 'POSITION/SKILLS');
	$objPHPExcel->getActiveSheet()->setCellValue('E1', 'RP ID');
	$objPHPExcel->getActiveSheet()->setCellValue('F1', 'Candidate Name');
	$objPHPExcel->getActiveSheet()->setCellValue('G1', 'Applicant ID');
	$objPHPExcel->getActiveSheet()->setCellValue('H1', 'Role');
	$objPHPExcel->getActiveSheet()->setCellValue('I1', 'Qulification');
	$objPHPExcel->getActiveSheet()->setCellValue('J1', 'Company Name');
	$objPHPExcel->getActiveSheet()->setCellValue('K1', 'Yrs of Experience');
	$objPHPExcel->getActiveSheet()->setCellValue('L1', 'Relevant Exp');
	$objPHPExcel->getActiveSheet()->setCellValue('M1', 'CTC');
	$objPHPExcel->getActiveSheet()->setCellValue('N1', 'Exp CTC');
	$objPHPExcel->getActiveSheet()->setCellValue('O1', 'Notice Period');
	$objPHPExcel->getActiveSheet()->setCellValue('P1', 'Official/OnPaper Notice Period');
	$objPHPExcel->getActiveSheet()->setCellValue('Q1', 'Contact No');
	$objPHPExcel->getActiveSheet()->setCellValue('R1', 'Alternate Contact Number');
	$objPHPExcel->getActiveSheet()->setCellValue('S1', 'Email ID');
	$objPHPExcel->getActiveSheet()->setCellValue('T1', 'Alternate Email ID');
	$objPHPExcel->getActiveSheet()->setCellValue('U1', 'Current Location');
	$objPHPExcel->getActiveSheet()->setCellValue('V1', 'Preffered Location');
	$objPHPExcel->getActiveSheet()->setCellValue('W1', 'Client Feed Back');
	$objPHPExcel->getActiveSheet()->setCellValue('X1', 'Interview Schedule');
	$objPHPExcel->getActiveSheet()->setCellValue('Y1', 'Final Status');
	$objPHPExcel->getActiveSheet()->setCellValue('Z1', 'Client Recruiter');
	$objPHPExcel->getActiveSheet()->setCellValue('AA1', 'Sourced By');
	$objPHPExcel->getActiveSheet()->setCellValue('AB1', 'Reason for Job Change/Remark');

$from 	= "A1"; // or any value
$to 	= "AB1"; // or any value

$objPHPExcel->getActiveSheet()->getStyle("$from:$to")->applyFromArray(
	array(
		'fill' => array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
			'color' => array(
				'rgb' => 'FFFF00'
			)
		),
		'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		)
	)
);

$objPHPExcel->getActiveSheet()->getStyle("$from:$to")->getFont()->setBold(true);

$fromrow 	= "A"; // or any value
$torow 	    = "AB"; // or any value

$objPHPExcel->getActiveSheet()->getStyle("$fromrow:$torow")->applyFromArray(
	array(
		'fill' => array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
		),
		'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		)
	)
);

// Auto size columns for each worksheet
$cellIterator = $objPHPExcel->getActiveSheet()->getRowIterator()->current()->getCellIterator();
$cellIterator->setIterateOnlyExistingCells(true);
// @var PHPExcel_Cell $cell 
foreach ($cellIterator as $cell) 
{
	$objPHPExcel->getActiveSheet()->getColumnDimension($cell->getColumn())->setAutoSize(true);
}

$Srno=1;
$rowCount = 2;
foreach ($rs as $element) 
{
	$da = date("d-m-Y", strtotime($element['date']));

	$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $Srno);
	$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $da);
	$objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['sheetname']);
	$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['position_skills']);
	$objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['rp_id']);
	$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['candidate_name']);

	if(!empty(@$element['color']))
	{
		@$str = @$element['color'];
		$str2 = substr($str, 1);

		$objPHPExcel->getActiveSheet()->getStyle('F' . $rowCount, $element['candidate_name'])->applyFromArray(
			array(
				'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,
					'color' => array(
						'rgb' => @$str2
					)
				)
			)
		);		            	
	}

	$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element['applicant_id']);
	$objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element['role']);
	$objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $element['qulification']);
	$objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $element['company_name']);

	if( (!empty(@$element['yrs_of_experience'])) AND (!empty(@$element['months_of_experience'])) )
	{
		$exp_in_yrs = $element['yrs_of_experience'].".".$element['months_of_experience']." Yrs";
	}
	elseif( (!empty($element['yrs_of_experience'])) )
	{
		$exp_in_yrs = $element['yrs_of_experience']." Yrs";
	}
	elseif( (!empty($element['months_of_experience'])) )
	{
		$exp_in_yrs = $element['months_of_experience']." Months";
	}
	$objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, @$exp_in_yrs);

//$this->excel->getActiveSheet()->SetCellValue('K' . $rowCount, $element['yrs_of_experience'].".".$element['months_of_experience']);
	$objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $element['relevant_exp']);
	if( (!empty(@$element['ctc'])) AND (!empty(@$element['ctc_thousand'])) )
	{
		$total_ctc = $element['ctc'].".".$element['ctc_thousand']." L/A";
	}
	elseif( (!empty($element['ctc'])) )
	{
		$total_ctc = $element['ctc']." L/A";
	}
	elseif( (!empty($element['ctc_thousand'])) )
	{
		$total_ctc = $element['ctc_thousand']." Thousands";
	}
	$objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, @$total_ctc);

// $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $element['yrs_of_experience'].".".$element['months_of_experience']);
// $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $element['relevant_exp']);
// $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $element['ctc'].".".$element['ctc_thousand']);
	$objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $element['exp_ctc']);
	$objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, $element['notice_period']);
	$objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, $element['official_onpaper_notice_period']);
	$objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount, $element['contact_no']);
	$objPHPExcel->getActiveSheet()->SetCellValue('R' . $rowCount, $element['alternate_contact_number']);
	$objPHPExcel->getActiveSheet()->SetCellValue('S' . $rowCount, $element['email_id']);
	$objPHPExcel->getActiveSheet()->SetCellValue('T' . $rowCount, $element['alternate_email_id']);
	$objPHPExcel->getActiveSheet()->SetCellValue('U' . $rowCount, $element['location']);
	$objPHPExcel->getActiveSheet()->SetCellValue('V' . $rowCount, $element['preffered_location']);
	$objPHPExcel->getActiveSheet()->SetCellValue('W' . $rowCount, $element['client_feedback']);
	$objPHPExcel->getActiveSheet()->SetCellValue('X' . $rowCount, $element['interview_schedule']);
	$objPHPExcel->getActiveSheet()->SetCellValue('Y' . $rowCount, $element['final_status']);
	$objPHPExcel->getActiveSheet()->SetCellValue('Z' . $rowCount, $element['client_recruiter']);
	$objPHPExcel->getActiveSheet()->SetCellValue('AA' . $rowCount, $element['sourced_by']);
	$objPHPExcel->getActiveSheet()->SetCellValue('AB' . $rowCount, $element['reason_for_job_change']);
	$rowCount++;
	$Srno++;
}				
}
elseif( (!empty($user_id)) AND (!empty($aaafromdate)) AND (!empty($aaatodate))  )
{
// Create a first sheet, representing sales data		

	$clients_lista = $this->m_recruiter->individual_excel_report_client_id_date($user_id,$fromdate,$todate); 
	for($sl=0;$sl<count($clients_lista);$sl++) 
	{
		if($sl>0)
		{
			$objPHPExcel->setActiveSheetIndex($sl);
		}
		else
		{
			$objPHPExcel->setActiveSheetIndex(0);	
		}			

		$sheetid =  $clients_lista[$sl]['sheetid'];
		$sheetname =  $clients_lista[$sl]['sheetname'];

// Rename sheet
		$objPHPExcel->getActiveSheet()->setTitle($sheetname);

		$rs = $this->m_recruiter->individual_excel_report_date($sheetid,$user_id,$fromdate,$todate); 	
//set cell A1 content with some text
		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'SR.NO.');
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'DATE');
		$objPHPExcel->getActiveSheet()->setCellValue('C1', 'Client');
		$objPHPExcel->getActiveSheet()->setCellValue('D1', 'POSITION/SKILLS');
		$objPHPExcel->getActiveSheet()->setCellValue('E1', 'RP ID');
		$objPHPExcel->getActiveSheet()->setCellValue('F1', 'Candidate Name');
		$objPHPExcel->getActiveSheet()->setCellValue('G1', 'Applicant ID');
		$objPHPExcel->getActiveSheet()->setCellValue('H1', 'Role');
		$objPHPExcel->getActiveSheet()->setCellValue('I1', 'Qulification');
		$objPHPExcel->getActiveSheet()->setCellValue('J1', 'Company Name');
		$objPHPExcel->getActiveSheet()->setCellValue('K1', 'Yrs of Experience');
		$objPHPExcel->getActiveSheet()->setCellValue('L1', 'Relevant Exp');
		$objPHPExcel->getActiveSheet()->setCellValue('M1', 'CTC');
		$objPHPExcel->getActiveSheet()->setCellValue('N1', 'Exp CTC');
		$objPHPExcel->getActiveSheet()->setCellValue('O1', 'Notice Period');
		$objPHPExcel->getActiveSheet()->setCellValue('P1', 'Official/OnPaper Notice Period');
		$objPHPExcel->getActiveSheet()->setCellValue('Q1', 'Contact No');
		$objPHPExcel->getActiveSheet()->setCellValue('R1', 'Alternate Contact Number');
		$objPHPExcel->getActiveSheet()->setCellValue('S1', 'Email ID');
		$objPHPExcel->getActiveSheet()->setCellValue('T1', 'Alternate Email ID');
		$objPHPExcel->getActiveSheet()->setCellValue('U1', 'Current Location');
		$objPHPExcel->getActiveSheet()->setCellValue('V1', 'Preffered Location');
		$objPHPExcel->getActiveSheet()->setCellValue('W1', 'Client Feed Back');
		$objPHPExcel->getActiveSheet()->setCellValue('X1', 'Interview Schedule');
		$objPHPExcel->getActiveSheet()->setCellValue('Y1', 'Final Status');
		$objPHPExcel->getActiveSheet()->setCellValue('Z1', 'Client Recruiter');
		$objPHPExcel->getActiveSheet()->setCellValue('AA1', 'Sourced By');
		$objPHPExcel->getActiveSheet()->setCellValue('AB1', 'Reason for Job Change/Remark');

$from 	= "A1"; // or any value
$to 	= "AB1"; // or any value

$objPHPExcel->getActiveSheet()->getStyle("$from:$to")->applyFromArray(
	array(
		'fill' => array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
			'color' => array(
				'rgb' => 'FFFF00'
			)
		),
		'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		)
	)
);

$objPHPExcel->getActiveSheet()->getStyle("$from:$to")->getFont()->setBold(true);

$fromrow 	= "A"; // or any value
$torow 	    = "AB"; // or any value

$objPHPExcel->getActiveSheet()->getStyle("$fromrow:$torow")->applyFromArray(
	array(
		'fill' => array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
		),
		'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		)
	)
);

// Auto size columns for each worksheet
$cellIterator = $objPHPExcel->getActiveSheet()->getRowIterator()->current()->getCellIterator();
$cellIterator->setIterateOnlyExistingCells(true);
// @var PHPExcel_Cell $cell 
foreach ($cellIterator as $cell) 
{
	$objPHPExcel->getActiveSheet()->getColumnDimension($cell->getColumn())->setAutoSize(true);
}

$Srno=1;
$rowCount = 2;
foreach ($rs as $element) 
{
	$da = date("d-m-Y", strtotime($element['date']));

	$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $Srno);
	$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $da);
	$objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['sheetname']);
	$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['position_skills']);
	$objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['rp_id']);
	$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['candidate_name']);

	if(!empty(@$element['color']))
	{
		@$str = @$element['color'];
		$str2 = substr($str, 1);

		$objPHPExcel->getActiveSheet()->getStyle('F' . $rowCount, $element['candidate_name'])->applyFromArray(
			array(
				'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,
					'color' => array(
						'rgb' => @$str2
					)
				)
			)
		);		            	
	}

	$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element['applicant_id']);
	$objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element['role']);
	$objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $element['qulification']);
	$objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $element['company_name']);

	if( (!empty(@$element['yrs_of_experience'])) AND (!empty(@$element['months_of_experience'])) )
	{
		$exp_in_yrs = $element['yrs_of_experience'].".".$element['months_of_experience']." Yrs";
	}
	elseif( (!empty($element['yrs_of_experience'])) )
	{
		$exp_in_yrs = $element['yrs_of_experience']." Yrs";
	}
	elseif( (!empty($element['months_of_experience'])) )
	{
		$exp_in_yrs = $element['months_of_experience']." Months";
	}
	$objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, @$exp_in_yrs);

//$this->excel->getActiveSheet()->SetCellValue('K' . $rowCount, $element['yrs_of_experience'].".".$element['months_of_experience']);
	$objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $element['relevant_exp']);
	if( (!empty(@$element['ctc'])) AND (!empty(@$element['ctc_thousand'])) )
	{
		$total_ctc = $element['ctc'].".".$element['ctc_thousand']." L/A";
	}
	elseif( (!empty($element['ctc'])) )
	{
		$total_ctc = $element['ctc']." L/A";
	}
	elseif( (!empty($element['ctc_thousand'])) )
	{
		$total_ctc = $element['ctc_thousand']." Thousands";
	}
	$objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, @$total_ctc);

// $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $element['yrs_of_experience'].".".$element['months_of_experience']);
// $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $element['relevant_exp']);
// $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $element['ctc'].".".$element['ctc_thousand']);
	$objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $element['exp_ctc']);
	$objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, $element['notice_period']);
	$objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, $element['official_onpaper_notice_period']);
	$objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount, $element['contact_no']);
	$objPHPExcel->getActiveSheet()->SetCellValue('R' . $rowCount, $element['alternate_contact_number']);
	$objPHPExcel->getActiveSheet()->SetCellValue('S' . $rowCount, $element['email_id']);
	$objPHPExcel->getActiveSheet()->SetCellValue('T' . $rowCount, $element['alternate_email_id']);
	$objPHPExcel->getActiveSheet()->SetCellValue('U' . $rowCount, $element['location']);
	$objPHPExcel->getActiveSheet()->SetCellValue('V' . $rowCount, $element['preffered_location']);
	$objPHPExcel->getActiveSheet()->SetCellValue('W' . $rowCount, $element['client_feedback']);
	$objPHPExcel->getActiveSheet()->SetCellValue('X' . $rowCount, $element['interview_schedule']);
	$objPHPExcel->getActiveSheet()->SetCellValue('Y' . $rowCount, $element['final_status']);
	$objPHPExcel->getActiveSheet()->SetCellValue('Z' . $rowCount, $element['client_recruiter']);
	$objPHPExcel->getActiveSheet()->SetCellValue('AA' . $rowCount, $element['sourced_by']);
	$objPHPExcel->getActiveSheet()->SetCellValue('AB' . $rowCount, $element['reason_for_job_change']);
	$rowCount++;
	$Srno++;
}				

if($sl<count($clients_lista))
{
// Create a new worksheet, after the default sheet			
	$objPHPExcel->createSheet();	
}

}				
}
else
{
// Create a first sheet, representing sales data		

	$clients_lista = $this->m_recruiter->individual_excel_report_client_id($user_id); 

	for($sl=0;$sl<count($clients_lista);$sl++) 
	{
		if($sl>0)
		{
			$objPHPExcel->setActiveSheetIndex($sl);
		}
		else
		{
			$objPHPExcel->setActiveSheetIndex(0);	
		}			

		$sheetid =  $clients_lista[$sl]['sheetid'];
		$sheetname =  $clients_lista[$sl]['sheetname'];

// Rename sheet
		$objPHPExcel->getActiveSheet()->setTitle($sheetname);

		$rs = $this->m_recruiter->individual_excel_report($sheetid,$user_id); 	

//set cell A1 content with some text
		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'SR.NO.');
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'DATE');
		$objPHPExcel->getActiveSheet()->setCellValue('C1', 'Client');
		$objPHPExcel->getActiveSheet()->setCellValue('D1', 'POSITION/SKILLS');
		$objPHPExcel->getActiveSheet()->setCellValue('E1', 'RP ID');
		$objPHPExcel->getActiveSheet()->setCellValue('F1', 'Candidate Name');
		$objPHPExcel->getActiveSheet()->setCellValue('G1', 'Applicant ID');
		$objPHPExcel->getActiveSheet()->setCellValue('H1', 'Role');
		$objPHPExcel->getActiveSheet()->setCellValue('I1', 'Qulification');
		$objPHPExcel->getActiveSheet()->setCellValue('J1', 'Company Name');
		$objPHPExcel->getActiveSheet()->setCellValue('K1', 'Yrs of Experience');
		$objPHPExcel->getActiveSheet()->setCellValue('L1', 'Relevant Exp');
		$objPHPExcel->getActiveSheet()->setCellValue('M1', 'CTC');
		$objPHPExcel->getActiveSheet()->setCellValue('N1', 'Exp CTC');
		$objPHPExcel->getActiveSheet()->setCellValue('O1', 'Notice Period');
		$objPHPExcel->getActiveSheet()->setCellValue('P1', 'Official/OnPaper Notice Period');
		$objPHPExcel->getActiveSheet()->setCellValue('Q1', 'Contact No');
		$objPHPExcel->getActiveSheet()->setCellValue('R1', 'Alternate Contact Number');
		$objPHPExcel->getActiveSheet()->setCellValue('S1', 'Email ID');
		$objPHPExcel->getActiveSheet()->setCellValue('T1', 'Alternate Email ID');
		$objPHPExcel->getActiveSheet()->setCellValue('U1', 'Current Location');
		$objPHPExcel->getActiveSheet()->setCellValue('V1', 'Preffered Location');
		$objPHPExcel->getActiveSheet()->setCellValue('W1', 'Client Feed Back');
		$objPHPExcel->getActiveSheet()->setCellValue('X1', 'Interview Schedule');
		$objPHPExcel->getActiveSheet()->setCellValue('Y1', 'Final Status');
		$objPHPExcel->getActiveSheet()->setCellValue('Z1', 'Client Recruiter');
		$objPHPExcel->getActiveSheet()->setCellValue('AA1', 'Sourced By');
		$objPHPExcel->getActiveSheet()->setCellValue('AB1', 'Reason for Job Change/Remark');

$from 	= "A1"; // or any value
$to 	= "AB1"; // or any value

$objPHPExcel->getActiveSheet()->getStyle("$from:$to")->applyFromArray(
	array(
		'fill' => array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
			'color' => array(
				'rgb' => 'FFFF00'
			)
		),
		'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		)
	)
);

$objPHPExcel->getActiveSheet()->getStyle("$from:$to")->getFont()->setBold(true);

$fromrow 	= "A"; // or any value
$torow 	    = "AB"; // or any value

$objPHPExcel->getActiveSheet()->getStyle("$fromrow:$torow")->applyFromArray(
	array(
		'fill' => array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
		),
		'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		)
	)
);

// Auto size columns for each worksheet
$cellIterator = $objPHPExcel->getActiveSheet()->getRowIterator()->current()->getCellIterator();
$cellIterator->setIterateOnlyExistingCells(true);
// @var PHPExcel_Cell $cell 
foreach ($cellIterator as $cell) 
{
	$objPHPExcel->getActiveSheet()->getColumnDimension($cell->getColumn())->setAutoSize(true);
}

$Srno=1;
$rowCount = 2;
foreach ($rs as $element) 
{
	$da = date("d-m-Y", strtotime($element['date']));

	$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $Srno);
	$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $da);
	$objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['sheetname']);
	$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['position_skills']);
	$objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['rp_id']);
	$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['candidate_name']);

	if(!empty(@$element['color']))
	{
		@$str = @$element['color'];
		$str2 = substr($str, 1);

		$objPHPExcel->getActiveSheet()->getStyle('F' . $rowCount, $element['candidate_name'])->applyFromArray(
			array(
				'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,
					'color' => array(
						'rgb' => @$str2
					)
				)
			)
		);		            	
	}

	$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element['applicant_id']);
	$objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element['role']);
	$objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $element['qulification']);
	$objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $element['company_name']);

	if( (!empty(@$element['yrs_of_experience'])) AND (!empty(@$element['months_of_experience'])) )
	{
		$exp_in_yrs = $element['yrs_of_experience'].".".$element['months_of_experience']." Yrs";
	}
	elseif( (!empty($element['yrs_of_experience'])) )
	{
		$exp_in_yrs = $element['yrs_of_experience']." Yrs";
	}
	elseif( (!empty($element['months_of_experience'])) )
	{
		$exp_in_yrs = $element['months_of_experience']." Months";
	}
	$objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, @$exp_in_yrs);

//$this->excel->getActiveSheet()->SetCellValue('K' . $rowCount, $element['yrs_of_experience'].".".$element['months_of_experience']);
	$objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $element['relevant_exp']);
	if( (!empty(@$element['ctc'])) AND (!empty(@$element['ctc_thousand'])) )
	{
		$total_ctc = $element['ctc'].".".$element['ctc_thousand']." L/A";
	}
	elseif( (!empty($element['ctc'])) )
	{
		$total_ctc = $element['ctc']." L/A";
	}
	elseif( (!empty($element['ctc_thousand'])) )
	{
		$total_ctc = $element['ctc_thousand']." Thousands";
	}
	$objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, @$total_ctc);

// $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $element['yrs_of_experience'].".".$element['months_of_experience']);
// $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $element['relevant_exp']);
// $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $element['ctc'].".".$element['ctc_thousand']);
	$objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $element['exp_ctc']);
	$objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, $element['notice_period']);
	$objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, $element['official_onpaper_notice_period']);
	$objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount, $element['contact_no']);
	$objPHPExcel->getActiveSheet()->SetCellValue('R' . $rowCount, $element['alternate_contact_number']);
	$objPHPExcel->getActiveSheet()->SetCellValue('S' . $rowCount, $element['email_id']);
	$objPHPExcel->getActiveSheet()->SetCellValue('T' . $rowCount, $element['alternate_email_id']);
	$objPHPExcel->getActiveSheet()->SetCellValue('U' . $rowCount, $element['location']);
	$objPHPExcel->getActiveSheet()->SetCellValue('V' . $rowCount, $element['preffered_location']);
	$objPHPExcel->getActiveSheet()->SetCellValue('W' . $rowCount, $element['client_feedback']);
	$objPHPExcel->getActiveSheet()->SetCellValue('X' . $rowCount, $element['interview_schedule']);
	$objPHPExcel->getActiveSheet()->SetCellValue('Y' . $rowCount, $element['final_status']);
	$objPHPExcel->getActiveSheet()->SetCellValue('Z' . $rowCount, $element['client_recruiter']);
	$objPHPExcel->getActiveSheet()->SetCellValue('AA' . $rowCount, $element['sourced_by']);
	$objPHPExcel->getActiveSheet()->SetCellValue('AB' . $rowCount, $element['reason_for_job_change']);
	$rowCount++;
	$Srno++;
}				

if($sl<count($clients_lista))
{
// Create a new worksheet, after the default sheet			
	$objPHPExcel->createSheet();	
}

}
}

$query=$this->db->query("SELECT name,l_name FROM user_admin WHERE user_admin_id='$user_id'");
@$name = $query->row()->name; 
@$l_name = $query->row()->l_name; 
$fullname = $name." ".$l_name;


$filename=$fullname.'.xls'; //save our workbook as this file name
header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache

//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
//if you want to save it as .XLSX Excel 2007 format
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  
//force user to download the Excel file without writing it to server's HD
$objWriter->save('php://output');
}
else
{
	if( (!empty($user_id)) AND (!empty($client_id_by_userid)) AND (!empty($aaafromdate)) AND (!empty($aaatodate))  )
	{
//echo "with all";exit();
		$data['select_client'] = $this->m_recruiter->individual_excel_report_client_id($user_id); 
		$data['list_dailyreport'] = $this->m_recruiter->individual_search_report_date_client($client_id_by_userid,$user_id,$fromdate,$todate); 	

		$user_role = $this->session->userdata('user_role');

		if($user_role==1)
		{
			$admin_id=$this->session->userdata('user_id');
		}else
		{
			$admin_id=$this->session->userdata('admin_id');	
		}

		$data['client_list'] =$this->m_recruiter->client_list($admin_id);
		$data['recruiter_tl_list'] = $this->m_dailyreport->selectRecruiterTl($admin_id);		

		$data['emp_id'] = $user_id;
		$data['client_id_by_useridq'] = $client_id_by_userid;
		$data['aaafromdate'] = $aaafromdate;
		$data['aaatodate'] = $aaatodate;

		if(empty($data['list_dailyreport']))
		{
			$this->session->set_flashdata('errorss','No Record Found!');
			redirect('recruiter/recruiter/nodataflat');
		}
		else
		{

			$this->Baseview('recruiter/dailyreport_list',$data);
//$this->load->view('recruiter/dailyreport_list_view_print',$data);					
		}
	}
	elseif( (!empty($user_id)) AND (!empty($client_id_by_userid)) ) 
	{	
		$area 				= 	$client_id_by_userid;
		$client_id 				= 	$client_id_by_userid;

		$data['select_client'] = $this->m_recruiter->individual_excel_report_client_id($user_id); 
		$data['list_dailyreport'] = $this->m_recruiter->individual_search_report_by_client($user_id,$area); 

		$user_role = $this->session->userdata('user_role');

		if($user_role==1)
		{
			$admin_id=$this->session->userdata('user_id');
		}else
		{
			$admin_id=$this->session->userdata('admin_id');	
		}	
		$data['client_list'] =$this->m_recruiter->client_list($admin_id);
		$data['recruiter_tl_list'] = $this->m_dailyreport->selectRecruiterTl($admin_id);

		$data['emp_id'] = $user_id;
		$data['client_id_by_useridq'] = $client_id_by_userid;

		$data['aaafromdate'] = $aaafromdate;
		$data['aaatodate'] = $aaatodate;
		if(empty($data['list_dailyreport']))
		{
			$this->session->set_flashdata('errorss','No Record Found!');
			redirect('recruiter/recruiter/nodataflat');
		}
		else
		{

			$this->Baseview('recruiter/dailyreport_list',$data);
		} 						
	}
	elseif( (!empty($user_id)) AND (!empty($aaafromdate)) AND (!empty($aaatodate))  )
	{	
		$data['select_client'] = $this->m_recruiter->individual_excel_report_client_id($user_id); 
		$data['list_dailyreport'] = $this->m_recruiter->individual_search_report_date($user_id,$fromdate,$todate);  
		$user_role = $this->session->userdata('user_role');

		if($user_role==1)
		{
			$admin_id=$this->session->userdata('user_id');
		}else
		{
			$admin_id=$this->session->userdata('admin_id');	
		}
		$data['client_list'] =$this->m_recruiter->client_list($admin_id);	
		$data['recruiter_tl_list'] = $this->m_dailyreport->selectRecruiterTl($admin_id);

		$data['emp_id'] = $user_id;
		$data['client_id_by_useridq'] = $client_id_by_userid;
		$data['aaafromdate'] = $aaafromdate;
		$data['aaatodate'] = $aaatodate;

		if(empty($data['list_dailyreport']))
		{
			$this->session->set_flashdata('errorss','No Record Found!');
			redirect('recruiter/recruiter/nodataflat');
		}
		else
		{
			$data['siderbar_menus'] = $this->M_permission->list_labels('internal user');
			$this->load->view('template/header');
			$this->load->view('template/sidebar',$data);
			$this->load->view('recruiter/dailyreport_list_view_print',$data);
		}	
	}
	else
	{
//echo "by user"; exit();
	}
}
}






public function get_client_name_by_userid(){		
	$user_id=$this->input->post('individual_report_id');	
	$data = $this->m_recruiter->individual_excel_report_client_id($user_id); 
	if(!empty($data)){
		?>
		<option value="">Select Client</option>
		<?php foreach ($data as $row) { ?>
			<option value="<?php echo $row['sheetid']; ?>" ><?php echo $row['sheetname']; ?></option>
		<?php }
	}
}

public function individual_report_form_date_search_details()
{
	header("Cache-Control: max-age=300, must-revalidate");


	$user_id            = $this->input->post('individual_report_id'); 
	$client_id_by_userid            = $this->input->post('client_id_by_userid'); 
	$aaafromdate 		= $this->input->post('fromdate');
	$aaatodate 			= $this->input->post('todate');
	$fromdate 			=  date('Y/m/d', strtotime($aaafromdate));
	$todate 			=  date('Y/m/d', strtotime($aaatodate));
	$user_role = $this->session->userdata('user_role');

	if($user_role==1)
	{
		$admin_id=$this->session->userdata('user_id');
	}else
	{
		$admin_id=$this->session->userdata('admin_id');	
	}

	$data['list_dailyreport'] = $this->m_recruiter->individual_excel_report_date_view($user_id,$client_id_by_userid,$fromdate,$todate);
	$data['client_list'] =$this->m_recruiter->client_list($admin_id);		
	$data['recruiter_tl_list'] = $this->m_dailyreport->selectRecruiterTl($admin_id);

	if(empty($data['list_dailyreport']))
	{
		$this->session->set_flashdata('errorss','No Record Found!');
		redirect('recruiter/recruiter/nodataflat');
	}
	else
	{

		$this->Baseview('recruiter/dailyreport_list',$data);
	}
}




public function generate_selected_individual_pdf_report($id)
{
	$dtls = explode("_", $id);
	$emp_id = $dtls[0];
	$client_id_by_useridq = $dtls[1];
	$fromdateqq = $dtls[2];
	$todateqq = $dtls[3];
	$fromdate =  date('Y/m/d', strtotime($fromdateqq));
	$todate =  date('Y/m/d', strtotime($todateqq));


	if( (!empty($fromdateqq)) AND (!empty($todateqq)) )
	{

		$qqq = explode("-", $fromdateqq);
		$zzzzzz = $qqq[0];
		$xxxxxx = $qqq[1];
		$cccccc = $qqq[2];

		$fm = $cccccc."-".$xxxxxx."-".$zzzzzz;

		$ggggggg = explode("-", $todateqq);
		$jjjjj = $ggggggg[0];
		$kkkkk = $ggggggg[1];
		$lllll = $ggggggg[2];

		$tm = $lllll."-".$kkkkk."-".$jjjjj;
	}

	$data['details'] = array(
		'fromdatea' => @$fm,
		'todatea' => @$tm,
		'emp_idz' => $emp_id,
		'client_id_by_useridqz' => $client_id_by_useridq
	);
	if( (!empty($emp_id)) AND (!empty($client_id_by_useridq)) AND (!empty($fromdateqq)) AND (!empty($todateqq)) )
	{
		$data['Shortlisted_Candidates']=$this->m_dailyreport->generate_selected_individual_pdf_report_with_date($fromdate,$todate,$emp_id,$client_id_by_useridq);
	}
	elseif( (!empty($emp_id)) AND (!empty($client_id_by_useridq)) ) 
	{
		$data['Shortlisted_Candidates']=$this->m_dailyreport->generate_selected_individual_pdf_reportwith_client($emp_id,$client_id_by_useridq);
	}
	else
	{

	}

//$html='<img src="'.$inputPath.'"/>';
	$html=$this->load->view('recruiter/selected_candidate_print', $data, true);

	$query = $this->db->query("SELECT name,l_name from user_admin where user_admin_id = ".@$emp_id);
	$name = $query->row()->name;
	$l_name = $query->row()->l_name;

	$outputname = $name." ".$l_name." Report";
//this the the PDF filename that user will get to download
	$pdfFilePath = "$outputname.pdf";

	$pdf = $this->m_pdf->load();
//generate the PDF!

	$stylesheet = '<style>'.file_get_contents('frontend/css/bootstrap.min.css').'</style>';
	$stylesheet.= '<style>'.file_get_contents('frontend/css/style.css').'</style>';
// apply external css
	$pdf->WriteHTML($stylesheet,1);
	$pdf->WriteHTML(utf8_encode($html),2);
//offer it to user via browser download! (The PDF won't be saved on your server HDD)

	$pdf->Output($pdfFilePath, "D");
}

public function get_client_name_by_userid_aaa(){		
	$client_id=$this->input->post('client_id');	
	$data = $this->m_recruiter->individual_excel_report_client_id_aaa($client_id); 
	if(!empty($data)){
		?>
		<?php foreach ($data as $row) { ?>
			<option value="<?php echo $row['position_skills']; ?>" ><?php echo $row['position_skills']; ?></option>
		<?php }
	}
}



public function full_excel()
{
	$user_id = $this->session->userdata('user_id');
	$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
	$this->load->library('PHPExcel', NULL, 'excel');
	$objPHPExcel = new PHPExcel();		
	$objWorkSheet = $objPHPExcel->getActiveSheet();
	$newSheet = clone $objWorkSheet;
	$newSheet->setTitle('Full Data');
    $objPHPExcel->addSheet($newSheet);
    //echo '<pre>';print_r($data['client_list']);exit;

	$i=0;
	foreach($data['client_list'] as $row) 
	{
	    
		$area = $row['client_id'];
		$rs = $this->m_recruiter->get_client_id_search_result_report_by_user_id($area,$user_id); 
	//Setting index when creating
        
        //Write cells
        
        $objWorkSheet->setCellValue('A1', 'SR.NO.');
        $objWorkSheet->setCellValue('B1', 'DATE');
        $objWorkSheet->setCellValue('C1', 'COMPANY /Client');
        $objWorkSheet->setCellValue('D1', 'COMPANY Type');
        $objWorkSheet->setCellValue('E1', 'POSITION/SKILLS');
        $objWorkSheet->setCellValue('F1', 'RP ID');
        $objWorkSheet->setCellValue('G1', 'Candidate Name');
        $objWorkSheet->setCellValue('H1', 'Applicant ID');
        $objWorkSheet->setCellValue('I1', 'Role');
        $objWorkSheet->setCellValue('J1', 'Qulification');
        $objWorkSheet->setCellValue('K1', 'Company Name');
        $objWorkSheet->setCellValue('L1', 'Yrs of Experience');
        $objWorkSheet->setCellValue('M1', 'Relevant Exp');
        $objWorkSheet->setCellValue('N1', 'CTC');
        $objWorkSheet->setCellValue('O1', 'Exp CTC');
        $objWorkSheet->setCellValue('P1', 'Notice Period');
        $objWorkSheet->setCellValue('Q1', 'Official/OnPaper Notice Period');
        $objWorkSheet->setCellValue('R1', 'Contact No');
        $objWorkSheet->setCellValue('S1', 'Alternate Contact Number');
        $objWorkSheet->setCellValue('T1', 'Email ID');
        $objWorkSheet->setCellValue('U1', 'Alternate Email ID');
        $objWorkSheet->setCellValue('V1', 'Current Location');
        $objWorkSheet->setCellValue('W1', 'Preffered Location');
        $objWorkSheet->setCellValue('X1', 'Client Feed Back');
        $objWorkSheet->setCellValue('Y1', 'Interview Schedule');
        $objWorkSheet->setCellValue('Z1', 'Final Status');
        $objWorkSheet->setCellValue('AA1', 'Client Recruiter');
        $objWorkSheet->setCellValue('AB1', 'Sourced By');
        $objWorkSheet->setCellValue('AC1', 'Reason for Job Change/Remark');

    $from 	= "A1"; // or any value
    $to 	= "AC1"; // or any value
    
    $objWorkSheet->getStyle("$from:$to")->applyFromArray(
    	array(
    		'fill' => array(
    			'type' => PHPExcel_Style_Fill::FILL_SOLID,
    			'color' => array(
    				'rgb' => 'FFFF00'
    			)
    		),
    	)
    );
    
    $objWorkSheet->getStyle("$from:$to")->getFont()->setBold(true);
    
    $fromrow 	= "A"; // or any value
    $torow 	    = "AC"; // or any value
    
    $objWorkSheet->getStyle("$fromrow:$torow")->applyFromArray(
    	array(
    		'fill' => array(
    			'type' => PHPExcel_Style_Fill::FILL_SOLID,
    		),
    		'alignment' => array(
    			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    		)
    	)
    );
    
    // Auto size columns for each worksheet
    $cellIterator = $objWorkSheet->getRowIterator()->current()->getCellIterator();
    $cellIterator->setIterateOnlyExistingCells(true);
    /** @var PHPExcel_Cell $cell */
    foreach ($cellIterator as $cell) 
    {
    	$objWorkSheet->getColumnDimension($cell->getColumn())->setAutoSize(true);
    }
    
    $rowCount = 2;
    if(!empty($rs))
    {
    	foreach ($rs as $element) 
    	{
    	    $company_client =$element['company_client'];
    	    $query = $this->db->query("select * from client where client_name = '$company_client'");
    	    $company_details=$query->row();
    	    
    	    if(!empty($company_details->client_type))
    	    {
    	        $client_type=$company_details->client_type;
    	    }
    	    else{
    	        $client_type="";
    	    }
    		$da = date("d-m-Y", strtotime($element['date']));
    		$objWorkSheet->SetCellValue('A' . $rowCount, $element['sr_no']);
    		$objWorkSheet->SetCellValue('B' . $rowCount, $da);
    		$objWorkSheet->SetCellValue('C' . $rowCount, $element['company_client']);
    		$objWorkSheet->SetCellValue('D' . $rowCount, $client_type);
    		$objWorkSheet->SetCellValue('E' . $rowCount, $element['position_skills']);
    		$objWorkSheet->SetCellValue('F' . $rowCount, $element['rp_id']);
    		$objWorkSheet->SetCellValue('G' . $rowCount, $element['candidate_name']);
    
    		if(!empty(@$element['color']))
    		{
    			@$str = @$element['color'];
    			$str2 = substr($str, 1);
    
    			$objWorkSheet->getStyle('G' . $rowCount, $element['candidate_name'])->applyFromArray(
    				array(
    					'fill' => array(
    						'type' => PHPExcel_Style_Fill::FILL_SOLID,
    						'color' => array(
    							'rgb' => @$str2
    						)
    					)
    				)
    			);		            	
    		}
    
    		$objWorkSheet->SetCellValue('H' . $rowCount, $element['applicant_id']);
    		$objWorkSheet->SetCellValue('I' . $rowCount, $element['role']);
    		$objWorkSheet->SetCellValue('J' . $rowCount, $element['qulification']);
    		$objWorkSheet->SetCellValue('K' . $rowCount, $element['company_name']);
    		if( (!empty(@$element['yrs_of_experience'])) AND (!empty(@$element['months_of_experience'])) )
    		{
    			$exp_in_yrs = $element['yrs_of_experience'].".".$element['months_of_experience']." Yrs";
    		}
    		elseif( (!empty($element['yrs_of_experience'])) )
    		{
    			$exp_in_yrs = $element['yrs_of_experience']." Yrs";
    		}
    		elseif( (!empty($element['months_of_experience'])) )
    		{
    			$exp_in_yrs = $element['months_of_experience']." Months";
    		}			
    		$objWorkSheet->SetCellValue('L' . $rowCount, @$exp_in_yrs);
    
    
    		$objWorkSheet->SetCellValue('M' . $rowCount, $element['relevant_exp']);
    		if( (!empty(@$element['ctc'])) AND (!empty(@$element['ctc_thousand'])) )
    		{
    			$total_ctc = $element['ctc'].".".$element['ctc_thousand']." L/A";
    		}
    		elseif( (!empty($element['ctc'])) )
    		{
    			$total_ctc = $element['ctc']." L/A";
    		}
    		elseif( (!empty($element['ctc_thousand'])) )
    		{
    			$total_ctc = $element['ctc_thousand']." Thousands";
    		}
    		$objWorkSheet->SetCellValue('N' . $rowCount, @$total_ctc);
    
    		$objWorkSheet->SetCellValue('O' . $rowCount, $element['exp_ctc']);
    		$objWorkSheet->SetCellValue('P' . $rowCount, $element['notice_period']);
    		$objWorkSheet->SetCellValue('Q' . $rowCount, $element['official_onpaper_notice_period']);
    		$objWorkSheet->SetCellValue('R' . $rowCount, $element['contact_no']);
    		$objWorkSheet->SetCellValue('S' . $rowCount, $element['alternate_contact_number']);
    		$objWorkSheet->SetCellValue('T' . $rowCount, $element['email_id']);
    		$objWorkSheet->SetCellValue('U' . $rowCount, $element['alternate_email_id']);
    		$objWorkSheet->SetCellValue('V' . $rowCount, $element['location']);
    		$objWorkSheet->SetCellValue('W' . $rowCount, $element['preffered_location']);
    		$objWorkSheet->SetCellValue('X' . $rowCount, $element['client_feedback']);
    		$objWorkSheet->SetCellValue('Y' . $rowCount, $element['interview_schedule']);
    		$objWorkSheet->SetCellValue('Z' . $rowCount, $element['final_status']);
    		$objWorkSheet->SetCellValue('AA' . $rowCount, $element['client_recruiter']);
    		$objWorkSheet->SetCellValue('AB' . $rowCount, $element['sourced_by']);
    		$objWorkSheet->SetCellValue('AC' . $rowCount, $element['reason_for_job_change']);
    		$rowCount++;
    	}
    }
    
    // Rename sheet
    $sheet_title = substr($row['client_name'], 0, 30);
    $i++;
    }
    
    
    
    $query=$this->db->query("SELECT name,l_name FROM user_admin WHERE user_admin_id='$user_id'");
    @$name = $query->row()->name; 
    @$l_name = $query->row()->l_name; 
    $fullname = $name." ".$l_name;
    
    
    $filename=$fullname.'.xls'; //save our workbook as this file name
    header('Content-Type: application/vnd.ms-excel'); //mime type
    header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
    header('Cache-Control: max-age=0'); //no cache
    
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  
    //force user to download the Excel file without writing it to server's HD
    $objWriter->save('php://output');	
}

public function full_excel_non_it()
{
	$user_id = $this->session->userdata('user_id');
	$data['client_list'] =$this->m_recruiter->client_non_it_list_by_user_id($user_id);
	$this->load->library('PHPExcel', NULL, 'excel');
	$objPHPExcel = new PHPExcel();		
	$sheet = $objPHPExcel->getActiveSheet();
    //echo '<pre>';print_r($data['client_list']);exit;

	$i=0;
	foreach($data['client_list'] as $row) 
	{	
		$area = $row['client_id'];
		$rs = $this->m_recruiter->get_client_id_search_result_report_by_user_id($area,$user_id); 
        
        $objWorkSheet = $objPHPExcel->createSheet($i); //Setting index when creating
        
        //Write cells
        
        $objWorkSheet->setCellValue('A1', 'SR.NO.');
        $objWorkSheet->setCellValue('B1', 'DATE');
        $objWorkSheet->setCellValue('C1', 'COMPANY /Client');
        $objWorkSheet->setCellValue('D1', 'COMPANY Type');
        $objWorkSheet->setCellValue('E1', 'POSITION/SKILLS');
        $objWorkSheet->setCellValue('F1', 'RP ID');
        $objWorkSheet->setCellValue('G1', 'Candidate Name');
        $objWorkSheet->setCellValue('H1', 'Applicant ID');
        $objWorkSheet->setCellValue('I1', 'Role');
        $objWorkSheet->setCellValue('J1', 'Qulification');
        $objWorkSheet->setCellValue('K1', 'Company Name');
        $objWorkSheet->setCellValue('L1', 'Yrs of Experience');
        $objWorkSheet->setCellValue('M1', 'Relevant Exp');
        $objWorkSheet->setCellValue('N1', 'CTC');
        $objWorkSheet->setCellValue('O1', 'Exp CTC');
        $objWorkSheet->setCellValue('P1', 'Notice Period');
        $objWorkSheet->setCellValue('Q1', 'Official/OnPaper Notice Period');
        $objWorkSheet->setCellValue('R1', 'Contact No');
        $objWorkSheet->setCellValue('S1', 'Alternate Contact Number');
        $objWorkSheet->setCellValue('T1', 'Email ID');
        $objWorkSheet->setCellValue('U1', 'Alternate Email ID');
        $objWorkSheet->setCellValue('V1', 'Current Location');
        $objWorkSheet->setCellValue('W1', 'Preffered Location');
        $objWorkSheet->setCellValue('X1', 'Client Feed Back');
        $objWorkSheet->setCellValue('Y1', 'Interview Schedule');
        $objWorkSheet->setCellValue('Z1', 'Final Status');
        $objWorkSheet->setCellValue('AA1', 'Client Recruiter');
        $objWorkSheet->setCellValue('AB1', 'Sourced By');
        $objWorkSheet->setCellValue('AC1', 'Reason for Job Change/Remark');

    $from 	= "A1"; // or any value
    $to 	= "AC1"; // or any value
    
    $objWorkSheet->getStyle("$from:$to")->applyFromArray(
    	array(
    		'fill' => array(
    			'type' => PHPExcel_Style_Fill::FILL_SOLID,
    			'color' => array(
    				'rgb' => 'FFFF00'
    			)
    		),
    		'alignment' => array(
    			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    		)
    	)
    );
    
    $objWorkSheet->getStyle("$from:$to")->getFont()->setBold(true);
    
    $fromrow 	= "A"; // or any value
    $torow 	    = "AC"; // or any value
    
    $objWorkSheet->getStyle("$fromrow:$torow")->applyFromArray(
    	array(
    		'fill' => array(
    			'type' => PHPExcel_Style_Fill::FILL_SOLID,
    		),
    		'alignment' => array(
    			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    		)
    	)
    );
    
    // Auto size columns for each worksheet
    $cellIterator = $objWorkSheet->getRowIterator()->current()->getCellIterator();
    $cellIterator->setIterateOnlyExistingCells(true);
    /** @var PHPExcel_Cell $cell */
    foreach ($cellIterator as $cell) 
    {
    	$objWorkSheet->getColumnDimension($cell->getColumn())->setAutoSize(true);
    }
    
    $rowCount = 2;
    if(!empty($rs))
    {
    	foreach ($rs as $element) 
    	{
    		$da = date("d-m-Y", strtotime($element['date']));
    		$objWorkSheet->SetCellValue('A' . $rowCount, $element['sr_no']);
    		$objWorkSheet->SetCellValue('B' . $rowCount, $da);
    		$objWorkSheet->SetCellValue('C' . $rowCount, $element['company_client']);
    		$objWorkSheet->SetCellValue('D' . $rowCount, $row['client_type']);
    		$objWorkSheet->SetCellValue('E' . $rowCount, $element['position_skills']);
    		$objWorkSheet->SetCellValue('F' . $rowCount, $element['rp_id']);
    		$objWorkSheet->SetCellValue('G' . $rowCount, $element['candidate_name']);
    
    		if(!empty(@$element['color']))
    		{
    			@$str = @$element['color'];
    			$str2 = substr($str, 1);
    
    			$objWorkSheet->getStyle('G' . $rowCount, $element['candidate_name'])->applyFromArray(
    				array(
    					'fill' => array(
    						'type' => PHPExcel_Style_Fill::FILL_SOLID,
    						'color' => array(
    							'rgb' => @$str2
    						)
    					)
    				)
    			);		            	
    		}
    
    		$objWorkSheet->SetCellValue('H' . $rowCount, $element['applicant_id']);
    		$objWorkSheet->SetCellValue('I' . $rowCount, $element['role']);
    		$objWorkSheet->SetCellValue('J' . $rowCount, $element['qulification']);
    		$objWorkSheet->SetCellValue('K' . $rowCount, $element['company_name']);
    		if( (!empty(@$element['yrs_of_experience'])) AND (!empty(@$element['months_of_experience'])) )
    		{
    			$exp_in_yrs = $element['yrs_of_experience'].".".$element['months_of_experience']." Yrs";
    		}
    		elseif( (!empty($element['yrs_of_experience'])) )
    		{
    			$exp_in_yrs = $element['yrs_of_experience']." Yrs";
    		}
    		elseif( (!empty($element['months_of_experience'])) )
    		{
    			$exp_in_yrs = $element['months_of_experience']." Months";
    		}			
    		$objWorkSheet->SetCellValue('L' . $rowCount, @$exp_in_yrs);
    
    
    		$objWorkSheet->SetCellValue('M' . $rowCount, $element['relevant_exp']);
    		if( (!empty(@$element['ctc'])) AND (!empty(@$element['ctc_thousand'])) )
    		{
    			$total_ctc = $element['ctc'].".".$element['ctc_thousand']." L/A";
    		}
    		elseif( (!empty($element['ctc'])) )
    		{
    			$total_ctc = $element['ctc']." L/A";
    		}
    		elseif( (!empty($element['ctc_thousand'])) )
    		{
    			$total_ctc = $element['ctc_thousand']." Thousands";
    		}
    		$objWorkSheet->SetCellValue('N' . $rowCount, @$total_ctc);
    
    		$objWorkSheet->SetCellValue('O' . $rowCount, $element['exp_ctc']);
    		$objWorkSheet->SetCellValue('P' . $rowCount, $element['notice_period']);
    		$objWorkSheet->SetCellValue('Q' . $rowCount, $element['official_onpaper_notice_period']);
    		$objWorkSheet->SetCellValue('R' . $rowCount, $element['contact_no']);
    		$objWorkSheet->SetCellValue('S' . $rowCount, $element['alternate_contact_number']);
    		$objWorkSheet->SetCellValue('T' . $rowCount, $element['email_id']);
    		$objWorkSheet->SetCellValue('U' . $rowCount, $element['alternate_email_id']);
    		$objWorkSheet->SetCellValue('V' . $rowCount, $element['location']);
    		$objWorkSheet->SetCellValue('W' . $rowCount, $element['preffered_location']);
    		$objWorkSheet->SetCellValue('X' . $rowCount, $element['client_feedback']);
    		$objWorkSheet->SetCellValue('Y' . $rowCount, $element['interview_schedule']);
    		$objWorkSheet->SetCellValue('Z' . $rowCount, $element['final_status']);
    		$objWorkSheet->SetCellValue('AA' . $rowCount, $element['client_recruiter']);
    		$objWorkSheet->SetCellValue('AB' . $rowCount, $element['sourced_by']);
    		$objWorkSheet->SetCellValue('AC' . $rowCount, $element['reason_for_job_change']);
    		$rowCount++;
    	}
    }
    
    // Rename sheet
    $sheet_title = substr($row['client_name'], 0, 30);
    $objWorkSheet->setTitle($sheet_title);	      
    $i++;
    }
    
    
    
    $query=$this->db->query("SELECT name,l_name FROM user_admin WHERE user_admin_id='$user_id'");
    @$name = $query->row()->name; 
    @$l_name = $query->row()->l_name; 
    $fullname = $name." ".$l_name;
    
    
    $filename=$fullname.'.xls'; //save our workbook as this file name
    header('Content-Type: application/vnd.ms-excel'); //mime type
    header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
    header('Cache-Control: max-age=0'); //no cache
    
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  
    //force user to download the Excel file without writing it to server's HD
    $objWriter->save('php://output');	
}


public function full_excel_datewise()
{
	$user_id = $this->session->userdata('user_id');
	$data['client_list'] =$this->m_recruiter->client_list_by_user_id($user_id);
	$aaafromdate 		= $this->input->post('fromdate');
	$aaatodate 			= $this->input->post('todate');
	$fromdate 			=  date('Y/m/d', strtotime($aaafromdate));
	$todate 			=  date('Y/m/d', strtotime($aaatodate));
	$this->load->library('PHPExcel', NULL, 'excel');
	$objPHPExcel = new PHPExcel();		
	$sheet = $objPHPExcel->getActiveSheet();

    //echo '<pre>';print_r($data['client_list']);exit;

	$i=0;
	foreach($data['client_list'] as $row) 
	{	
		$area = $row['client_id'];
		$rs = $this->m_recruiter->get_client_id_search_result_report_by_user_id_datewise($area,$user_id,$fromdate,$todate); 

        $objWorkSheet = $objPHPExcel->createSheet($i); //Setting index when creating
        
        //Write cells
        
        $objWorkSheet->setCellValue('A1', 'SR.NO.');
        $objWorkSheet->setCellValue('B1', 'DATE');
        $objWorkSheet->setCellValue('C1', 'COMPANY /Client');
        $objWorkSheet->setCellValue('D1', 'POSITION/SKILLS');
        $objWorkSheet->setCellValue('E1', 'RP ID');
        $objWorkSheet->setCellValue('F1', 'Candidate Name');
        $objWorkSheet->setCellValue('G1', 'Applicant ID');
        $objWorkSheet->setCellValue('H1', 'Role');
        $objWorkSheet->setCellValue('I1', 'Qulification');
        $objWorkSheet->setCellValue('J1', 'Company Name');
        $objWorkSheet->setCellValue('K1', 'Yrs of Experience');
        $objWorkSheet->setCellValue('L1', 'Relevant Exp');
        $objWorkSheet->setCellValue('M1', 'CTC');
        $objWorkSheet->setCellValue('N1', 'Exp CTC');
        $objWorkSheet->setCellValue('O1', 'Notice Period');
        $objWorkSheet->setCellValue('P1', 'Official/OnPaper Notice Period');
        $objWorkSheet->setCellValue('Q1', 'Contact No');
        $objWorkSheet->setCellValue('R1', 'Alternate Contact Number');
        $objWorkSheet->setCellValue('S1', 'Email ID');
        $objWorkSheet->setCellValue('T1', 'Alternate Email ID');
        $objWorkSheet->setCellValue('U1', 'Current Location');
        $objWorkSheet->setCellValue('V1', 'Preffered Location');
        $objWorkSheet->setCellValue('W1', 'Client Feed Back');
        $objWorkSheet->setCellValue('X1', 'Interview Schedule');
        $objWorkSheet->setCellValue('Y1', 'Final Status');
        $objWorkSheet->setCellValue('Z1', 'Client Recruiter');
        $objWorkSheet->setCellValue('AA1', 'Sourced By');
        $objWorkSheet->setCellValue('AB1', 'Reason for Job Change/Remark');

    $from 	= "A1"; // or any value
    $to 	= "AB1"; // or any value
    
    $objWorkSheet->getStyle("$from:$to")->applyFromArray(
    	array(
    		'fill' => array(
    			'type' => PHPExcel_Style_Fill::FILL_SOLID,
    			'color' => array(
    				'rgb' => 'FFFF00'
    			)
    		),
    		'alignment' => array(
    			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    		)
    	)
    );
    
    $objWorkSheet->getStyle("$from:$to")->getFont()->setBold(true);
    
    $fromrow 	= "A"; // or any value
    $torow 	    = "AB"; // or any value
    
    $objWorkSheet->getStyle("$fromrow:$torow")->applyFromArray(
    	array(
    		'fill' => array(
    			'type' => PHPExcel_Style_Fill::FILL_SOLID,
    		),
    		'alignment' => array(
    			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    		)
    	)
    );
    
    // Auto size columns for each worksheet
    $cellIterator = $objWorkSheet->getRowIterator()->current()->getCellIterator();
    $cellIterator->setIterateOnlyExistingCells(true);
    /** @var PHPExcel_Cell $cell */
    foreach ($cellIterator as $cell) 
    {
    	$objWorkSheet->getColumnDimension($cell->getColumn())->setAutoSize(true);
    }
    
    $rowCount = 2;
    if(!empty($rs))
    {
    	foreach ($rs as $element) 
    	{
    		$da = date("d-m-Y", strtotime($element['date']));
    
    		$objWorkSheet->SetCellValue('A' . $rowCount, $element['sr_no']);
    		$objWorkSheet->SetCellValue('B' . $rowCount, $da);
    		$objWorkSheet->SetCellValue('C' . $rowCount, $element['company_client']);
    		$objWorkSheet->SetCellValue('D' . $rowCount, $element['position_skills']);
    		$objWorkSheet->SetCellValue('E' . $rowCount, $element['rp_id']);
    		$objWorkSheet->SetCellValue('F' . $rowCount, $element['candidate_name']);
    
    		if(!empty(@$element['color']))
    		{
    			@$str = @$element['color'];
    			$str2 = substr($str, 1);
    
    			$objWorkSheet->getStyle('F' . $rowCount, $element['candidate_name'])->applyFromArray(
    				array(
    					'fill' => array(
    						'type' => PHPExcel_Style_Fill::FILL_SOLID,
    						'color' => array(
    							'rgb' => @$str2
    						)
    					)
    				)
    			);		            	
    		}
    
    		$objWorkSheet->SetCellValue('G' . $rowCount, $element['applicant_id']);
    		$objWorkSheet->SetCellValue('H' . $rowCount, $element['role']);
    		$objWorkSheet->SetCellValue('I' . $rowCount, $element['qulification']);
    		$objWorkSheet->SetCellValue('J' . $rowCount, $element['company_name']);
    		if( (!empty(@$element['yrs_of_experience'])) AND (!empty(@$element['months_of_experience'])) )
    		{
    			$exp_in_yrs = $element['yrs_of_experience'].".".$element['months_of_experience']." Yrs";
    		}
    		elseif( (!empty($element['yrs_of_experience'])) )
    		{
    			$exp_in_yrs = $element['yrs_of_experience']." Yrs";
    		}
    		elseif( (!empty($element['months_of_experience'])) )
    		{
    			$exp_in_yrs = $element['months_of_experience']." Months";
    		}			
    		$objWorkSheet->SetCellValue('K' . $rowCount, @$exp_in_yrs);
    
    
    		$objWorkSheet->SetCellValue('L' . $rowCount, $element['relevant_exp']);
    		if( (!empty(@$element['ctc'])) AND (!empty(@$element['ctc_thousand'])) )
    		{
    			$total_ctc = $element['ctc'].".".$element['ctc_thousand']." L/A";
    		}
    		elseif( (!empty($element['ctc'])) )
    		{
    			$total_ctc = $element['ctc']." L/A";
    		}
    		elseif( (!empty($element['ctc_thousand'])) )
    		{
    			$total_ctc = $element['ctc_thousand']." Thousands";
    		}
    		$objWorkSheet->SetCellValue('M' . $rowCount, @$total_ctc);
    
    		$objWorkSheet->SetCellValue('N' . $rowCount, $element['exp_ctc']);
    		$objWorkSheet->SetCellValue('O' . $rowCount, $element['notice_period']);
    		$objWorkSheet->SetCellValue('P' . $rowCount, $element['official_onpaper_notice_period']);
    		$objWorkSheet->SetCellValue('Q' . $rowCount, $element['contact_no']);
    		$objWorkSheet->SetCellValue('R' . $rowCount, $element['alternate_contact_number']);
    		$objWorkSheet->SetCellValue('S' . $rowCount, $element['email_id']);
    		$objWorkSheet->SetCellValue('T' . $rowCount, $element['alternate_email_id']);
    		$objWorkSheet->SetCellValue('U' . $rowCount, $element['location']);
    		$objWorkSheet->SetCellValue('V' . $rowCount, $element['preffered_location']);
    		$objWorkSheet->SetCellValue('W' . $rowCount, $element['client_feedback']);
    		$objWorkSheet->SetCellValue('X' . $rowCount, $element['interview_schedule']);
    		$objWorkSheet->SetCellValue('Y' . $rowCount, $element['final_status']);
    		$objWorkSheet->SetCellValue('Z' . $rowCount, $element['client_recruiter']);
    		$objWorkSheet->SetCellValue('AA' . $rowCount, $element['sourced_by']);
    		$objWorkSheet->SetCellValue('AB' . $rowCount, $element['reason_for_job_change']);
    		$rowCount++;
    	}
    }
    
    // Rename sheet
    $sheet_title = substr($row['client_name'], 0, 30);
    $objWorkSheet->setTitle($sheet_title);	      
    $i++;
    }
    
    
    
    $query=$this->db->query("SELECT name,l_name FROM user_admin WHERE user_admin_id='$user_id'");
    @$name = $query->row()->name; 
    @$l_name = $query->row()->l_name; 
    $fullname = $name." ".$l_name;
    
    
    $filename=$fullname.'.xls'; //save our workbook as this file name
    header('Content-Type: application/vnd.ms-excel'); //mime type
    header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
    header('Cache-Control: max-age=0'); //no cache
    
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  
    //force user to download the Excel file without writing it to server's HD
    $objWriter->save('php://output');	
}



/* Rhutuja - 7-1-2019 */
public function export_candidate_data(){
	$alphabet = range('A', 'Z');
//$data = $this->input->post();
//print_r($data);
	$skill_array = array();
	$location_array = array();
	$np_array = array();
	$fields_array = array();

	$candidate_position_skills = @$this->input->post('candidate_position_skills');
	$min_exp = $this->input->post('min_exp');
	$max_exp = $this->input->post('max_exp');
	$notice_period = $this->input->post('notice_period');
//$max_notice_period = $this->input->post('max_notice_period');
	$candidate_location = @$this->input->post('candidate_location');
	$selection_fields = implode(',',@$this->input->post('selection_fields'));
	$selection_fields_array = $this->input->post('selection_fields');
	$noOfCols = count($selection_fields_array);

	$toAlpha =  $alphabet[$noOfCols];
/*$candidate_position_skills = array_map('trim', $candidate_position_skills );
print_r($candidate_position_skills);*/
foreach($candidate_position_skills as $s){
	$skill = ltrim($s);
	if($skill != ''){
		array_push($skill_array, $skill);
	}
}

if(!empty($candidate_location)){
	foreach(@$candidate_location as $l){
		$location = ltrim($l);
		if($location != ''){
			array_push($location_array, $location);
		}
	}
}

if(!empty($notice_period)){
	foreach(@$notice_period as $np){
		$period = ltrim($np);
		if($period != ''){
			array_push($np_array, $period);
		}
	}
}


$data = $this->m_recruiter->get_candidate_data($skill_array, $location_array, $min_exp, $max_exp, $np_array, $selection_fields);
//echo $this->db->last_query();
//print_r($data);

$this->load->library('PHPExcel', NULL, 'excel');
$objPHPExcel = new PHPExcel();		
$sheet = $objPHPExcel->getActiveSheet();

$i=1;


$objWorkSheet = $objPHPExcel->createSheet($i); //Setting index when creating



$from 	= "A1"; // or any value
$to 	= $toAlpha."1"; // or any value


$objWorkSheet->setCellValue('A1', 'SR.NO.');
$cls = 1;
foreach($selection_fields_array as $col){
	$objWorkSheet->setCellValue($alphabet[$cls].'1', $col);
	$cls++;
}


$objWorkSheet->getStyle("$from:$to")->applyFromArray(
	array(
		'fill' => array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
			'color' => array(
				'rgb' => 'FFFF00'
			)
		),
		'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		)
	)
);

$styleCenter = array(
	'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	)
);

$styleLeft = array(
	'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
	)
);

$styleRight = array(
	'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
	)
);


$objWorkSheet->getStyle("$from:$to")->getFont()->setBold(true);

$fromrow 	= "A"; // or any value
$torow 	    = $toAlpha; // or any value


$objWorkSheet->getStyle("$fromrow:$torow")->applyFromArray(
	array(
		'fill' => array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
		),
		'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		)
	)
);


$cellIterator = $objWorkSheet->getRowIterator()->current()->getCellIterator();
$cellIterator->setIterateOnlyExistingCells(true);

foreach ($cellIterator as $cell) 
{
	$objWorkSheet->getColumnDimension($cell->getColumn())->setAutoSize(true);
}

$rowCount = 2;
$colsCount = 0;

foreach ($data as $element){

	$objWorkSheet->setCellValue('A'.$rowCount, $i);
	$cls = 1;
	foreach($selection_fields_array as $col){
		$colName = $selection_fields_array[$cls-1]; 
		$objWorkSheet->setCellValue($alphabet[$cls].$rowCount, $element["$colName"]);
		$objWorkSheet->getStyle($alphabet[$cls].$rowCount)->applyFromArray($styleLeft);
		$cls++;
	}

	$i++;
	$rowCount++;
}

$filename= 'Candidate Data'.'.xls';
header('Content-Type: application/vnd.ms-excel'); 
header('Content-Disposition: attachment;filename="'.$filename.'"'); 
header('Cache-Control: max-age=0'); 


$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  
$objWriter->save('php://output');

redirect('recruiter/recruiter');
}


/*Recruiter Questions*/
public function questions()
{
	$data['recruiter_questions'] = $this->m_recruiter->get_recruiter_questions();
	$this->Baseview('recruiter/recruiter_questions',$data);
}

public function question_add()
{
	$data['siderbar_menus'] = $this->M_permission->list_labels('internal user');
	$this->load->view('template/header');
	$this->load->view('template/sidebar',$data);
	$this->load->view('recruiter/recruiter_question_add',$data);
}

public function save_question()
{
	$post=$this->input->post();

	$insert_data=array(
		'question_title'=>$post['question_title'],
		'question_type'=>$post['question_type'],
		'question_marks'=>$post['question_marks'],
		'question_timestamp'=>date('Y-m-d H:i:s'),
		'question_form_type'=>$post['question_form_type'],
		'question_no'=>$post['question_no']
	);

	$result=$this->m_recruiter->insert_question($insert_data);

	if($result) 
	{ 
		$this->session->set_flashdata('errorss','Record Inserted Successfully!'); 
	}
	else 
	{ 
		$this->session->set_flashdata('erroraa','Record not updated!'); 
	}

	redirect('recruiter/recruiter/questions');

}

public function question_edit($question_id)
{
	$data['recruiter_question'] = $this->m_recruiter->get_recruiter_question_by_id($question_id); 
	$this->Baseview('recruiter/recruiter_question_add',$data);
}

public function update_question()
{
	$post=$this->input->post();
	$update_data=array(
		'question_title'=>$post['question_title'],
		'question_type'=>$post['question_type'],
		'question_marks'=>$post['question_marks'],
		'question_timestamp'=>date('Y-m-d H:i:s'),
		'question_form_type'=>$post['question_form_type'],
		'question_no'=>$post['question_no']
	);

	$result=$this->m_recruiter->update_question($update_data,$post['question_id']);

	if($result) 
	{ 
		$this->session->set_flashdata('errorss','Record Updated Successfully!'); 
	}
	else 
	{ 
		$this->session->set_flashdata('erroraa','Record not updated!'); 
	}

	redirect('recruiter/recruiter/questions');
}

public function question_delete()
{

	$id=$this->input->post('deleteID');
	$result=$this->m_recruiter->delete_question($id);

	if($result) 
	{ 
		$this->session->set_flashdata('errorss','Record Deleted Successfully!'); 
	}
	else 
	{ 
		$this->session->set_flashdata('erroraa','Record not updated!'); 
	}

	redirect('recruiter/recruiter/questions');
}
///////////////////////////////////////////////////////////////advanced search
public function advance_search()
{
	$data['siderbar_menus'] = $this->M_permission->list_labels('internal user');
	$data['keywords'] = $this->m_recruiter->get_skill_keyword();
	$data['location'] = $this->m_recruiter->get_location();
	$data['preffered_location'] = $this->m_recruiter->get_preffered_location();
	/*print_r($data['keywords'] );exit();*/
	$this->load->view('template/header');
	$this->load->view('template/sidebar',$data);
	$this->load->view('recruiter/advance_search',$data);
}

public function modify_advance_search()
{
	$data['siderbar_menus'] = $this->M_permission->list_labels('internal user');
	$data['keywords'] = $this->m_recruiter->get_skill_keyword();
	$data['location'] = $this->m_recruiter->get_location();
	$data['preffered_location'] = $this->m_recruiter->get_preffered_location();
	$this->load->view('template/header');
	$this->load->view('template/sidebar',$data);
	$this->load->view('recruiter/modify_advance_search',$data);
}

public function advance_search_result()
{
	$post=$this->input->post();
	@$perpage = $post["per_page"];
	if(!empty($perpage))
	{	   
	   $per_pages = setcookie('per_page', $perpage, time() + 60, '/');
	}
	if(@$_COOKIE['per_page'])
	{
	    $per_page =$_COOKIE['per_page'];
	}
	else
	{
	    $per_page =40;
	}
	if(!empty($post['any_keywords']))
	{
	   $any_keywords = explode(' ',$post['any_keywords']);
	}

	if(!empty($post))
	{
		$newdata = array(
			'any_keywords'=>@$post['any_keywords'],
			'must_keywords'=>@$post['must_keywords'],
			'excluding_keywords'=>@$post['excluding_keywords'],
			'total_experience_from'=>@$post['total_experience_from'],
			'total_experience_to'=>@$post['total_experience_to'],
			'anual_salary_from_lacs'=>@$post['anual_salary_from_lacs'],
			'anual_salary_to_lacs'=>@$post['anual_salary_to_lacs'],
			'include_company'=>@$post['include_company'],
			'exclude_company'=>@$post['exclude_company'],
			'current_location'=>@$post['current_location'],
			'prefered_location'=>@$post['prefered_location'],
		);
		$this->session->set_userdata('search_data',$newdata);
	}
/*$data['keywords'] = $this->m_recruiter->get_skill_keyword();
$data['company_name'] = $this->m_recruiter->get_company_details();*/
$data["search_keyword"] = @$post['any_keywords'];
if(!empty(@$post['total_experience_from'] && @$post['total_experience_to']))
{
   $data['search_experience'] = @$post['total_experience_from'].'-'.@$post['total_experience_to'].' yrs';
}
$data['siderbar_menus'] = $this->M_permission->list_labels('internal user');
$data['total_experience_from']=@$post['total_experience_from'];
$data['total_experience_to']=@$post['total_experience_to'];
$data['anual_salary_from_lacs']=@$post['anual_salary_from_lacs'];
$data['anual_salary_to_lacs']=@$post['anual_salary_to_lacs'];
$data['current_location']=@$post['current_location'];
$data['prefered_location']=@$post['prefered_location'];

$this->load->library('pagination');
$config=[ 
	'base_url'=>base_url('recruiter/recruiter/advance_search_result'),
	'per_page'=>$per_page,
	'total_rows'=>$this->m_recruiter->get_candidate_data_filter_rows($this->session->userdata('search_data')),
	'uri_segment' => 4,
	'full_tag_open'=> "<ul class='pagination'>",
	'full_tag_close'=> '</ul>',
	'num_tag_open'=> '<li>',
	'num_tag_close'=> '</li>',
	'cur_tag_open'=> '<li class="active"><a href="javascript:void(0)">',
	'cur_tag_close'=> '</a></li>',
	'prev_tag_open'=> '<li>',
	'prev_tag_close'=> '</li>',
	'first_tag_open'=> '<li>',
	'first_tag_close'=> '</li>',
	'last_tag_open'=> '<li>',
	'last_tag_close'=> '</li>',
	'prev_link'=> '<i class="fa fa-arrow-left"></i> Previous Page',
	'prev_tag_open'=> '<li>',
	'prev_tag_close'=> '</li>',
	'next_link'=> 'Next Page <i class="fa fa-arrow-right"></i>',
	'next_tag_open'=> '<li>',
	'next_tag_close'=> '</li>',
];
$this->pagination->initialize($config);
$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0;

$data["links"] = $this->pagination->create_links();

$data['fiter'] = $this->m_recruiter->get_candidate_data_filter($this->session->userdata('search_data'),$config['per_page'],$page);
$data['count_all_records'] = $this->m_recruiter->get_candidate_data_filter_count($this->session->userdata('search_data'));
$this->load->view('template/header');
$this->load->view('template/sidebar',$data);
$this->load->view('recruiter/advance_search_result',$data);
}

public function advance_search_candidate_profile($id)
{
	$data['siderbar_menus'] = $this->M_permission->list_labels('internal user');
	$data['candidate_profile'] = $this->m_recruiter->get_candidate_profile($id);
	/*echo "<pre>";print_r($data['candidate_profile']);exit;*/
	$this->load->view('template/header');
	$this->load->view('template/sidebar',$data);
	$this->load->view('recruiter/advance_search_candidate_profile',$data);
}

public function bulk_upload_candidate()
{
	$data['recruiter_questions'] = $this->m_recruiter->get_recruiter_questions(); 
	$data['siderbar_menus'] = $this->M_permission->list_labels('internal user');
	$this->load->view('template/header');
	$this->load->view('template/sidebar',$data);
	$this->load->view('recruiter/candidate_excel_upload',$data);
}

public function upload_candidate_excel()
{
	$insert_cnt = 0;
	$user_role=$this->session->userdata('user_role');
	$sheetname=$this->input->post('sheetname');
	if($user_role==1)
	{

		$admin_id=$this->session->userdata('user_id');
	} else
	{
		$admin_id=$this->session->userdata('admin_id');

	}
	$added_by = $this->session->userdata('user_id');

	$configUpload['upload_path'] = FCPATH.'uploads/sales/';
	$configUpload['allowed_types'] = 'xls|xlsx';
	$configUpload['max_size'] = '0';
	$this->upload->initialize($configUpload);
	$this->upload->do_upload('userFile');
	$upload_data = $this->upload->data(); 
	$file_name = $upload_data['file_name']; 
	$extension=$upload_data['file_ext'];   

	$objReader =PHPExcel_IOFactory::createReader('Excel2007');
	$objReader->setReadDataOnly(false);
	$objPHPExcel=PHPExcel_IOFactory::load(FCPATH.'uploads/sales/'.$file_name);


	foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) 
	{
		$ws = $worksheet->getTitle();

		if($ws==$sheetname)
		{
			$worksheet_index=$objPHPExcel->getIndex($worksheet);
			$highestRow=$objPHPExcel->setActiveSheetIndex($worksheet_index)->getHighestRow();
			$objWorksheet = $objPHPExcel->getActiveSheet($worksheet_index);

			if($highestRow > 1){

				for($cl=2;$cl<=$highestRow;$cl++)
				{
					$sr_no = $objWorksheet->getCellByColumnAndRow(0,$cl)->getValue() != NULL ? $objWorksheet->getCellByColumnAndRow(0,$cl)->getValue() : '';

					$date = $objWorksheet->getCellByColumnAndRow(1,$cl)->getValue() != NULL ? $objWorksheet->getCellByColumnAndRow(1,$cl)->getValue() : '';

					$client_name = $objWorksheet->getCellByColumnAndRow(2,$cl)->getValue() != NULL ? $objWorksheet->getCellByColumnAndRow(2,$cl)->getValue()  : '';

					$position_skills = $objWorksheet->getCellByColumnAndRow(3,$cl)->getValue() != NULL ? $objWorksheet->getCellByColumnAndRow(3,$cl)->getValue()  : '';

					$rp_id = $objWorksheet->getCellByColumnAndRow(4,$cl)->getValue() != NULL ? $objWorksheet->getCellByColumnAndRow(4,$cl)->getValue() : '';

					$candidate_name = $objWorksheet->getCellByColumnAndRow(5,$cl)->getValue() != NULL ? $objWorksheet->getCellByColumnAndRow(5,$cl)->getValue()  : '';

					$applicant_id = $objWorksheet->getCellByColumnAndRow(6,$cl)->getValue() != NULL ? $objWorksheet->getCellByColumnAndRow(6,$cl)->getValue()  : '';

					$role = $objWorksheet->getCellByColumnAndRow(7,$cl)->getValue() != NULL ? $objWorksheet->getCellByColumnAndRow(7,$cl)->getValue()  : '';

					$qulification = $objWorksheet->getCellByColumnAndRow(8,$cl)->getValue() != NULL ? $objWorksheet->getCellByColumnAndRow(8,$cl)->getValue()  : '';

					$company_name = $objWorksheet->getCellByColumnAndRow(9,$cl)->getValue() != NULL ? $objWorksheet->getCellByColumnAndRow(9,$cl)->getValue()  : '';

					$yrs_of_experience = $objWorksheet->getCellByColumnAndRow(10,$cl)->getValue() != NULL ? $objWorksheet->getCellByColumnAndRow(10,$cl)->getValue()  : '';

					$relevant_exp = $objWorksheet->getCellByColumnAndRow(11,$cl)->getValue() != NULL ? $objWorksheet->getCellByColumnAndRow(11,$cl)->getValue()  : '';

					$ctc = $objWorksheet->getCellByColumnAndRow(12,$cl)->getValue() != NULL ? $objWorksheet->getCellByColumnAndRow(12,$cl)->getValue() : '';

					$exp_ctc = $objWorksheet->getCellByColumnAndRow(13,$cl)->getValue() != NULL ? $objWorksheet->getCellByColumnAndRow(13,$cl)->getValue() : '';

					$notice_period = $objWorksheet->getCellByColumnAndRow(14,$cl)->getValue() != NULL ? $objWorksheet->getCellByColumnAndRow(14,$cl)->getValue() : '';

					$official_onpaper_notice_period = $objWorksheet->getCellByColumnAndRow(15,$cl)->getValue() != NULL ? $objWorksheet->getCellByColumnAndRow(15,$cl)->getValue() : '';

					$contact_no = $objWorksheet->getCellByColumnAndRow(16,$cl)->getValue() != NULL ? $objWorksheet->getCellByColumnAndRow(16,$cl)->getValue() : '';

					$alternate_contact_number = $objWorksheet->getCellByColumnAndRow(17,$cl)->getValue() != NULL ? $objWorksheet->getCellByColumnAndRow(17,$cl)->getValue()."</br>" : '';

					$email_id = $objWorksheet->getCellByColumnAndRow(18,$cl)->getValue() != NULL ? $objWorksheet->getCellByColumnAndRow(18,$cl)->getValue() : '';

					$alternate_email_id = $objWorksheet->getCellByColumnAndRow(19,$cl)->getValue() != NULL ? $objWorksheet->getCellByColumnAndRow(19,$cl)->getValue() : '';

					$current_location = $objWorksheet->getCellByColumnAndRow(20,$cl)->getValue() != NULL ? $objWorksheet->getCellByColumnAndRow(20,$cl)->getValue() : '';

					$preffered_location = $objWorksheet->getCellByColumnAndRow(21,$cl)->getValue() != NULL ? $objWorksheet->getCellByColumnAndRow(21,$cl)->getValue() : '';

					$client_feedback = $objWorksheet->getCellByColumnAndRow(22,$cl)->getValue() != NULL ? $objWorksheet->getCellByColumnAndRow(22,$cl)->getValue() : '';

					$interview_schedule = $objWorksheet->getCellByColumnAndRow(23,$cl)->getValue() != NULL ? $objWorksheet->getCellByColumnAndRow(23,$cl)->getValue() : '';

					$interview_schedule_mode = $objWorksheet->getCellByColumnAndRow(24,$cl)->getValue() != NULL ? $objWorksheet->getCellByColumnAndRow(24,$cl)->getValue() : '';

					$final_status = $objWorksheet->getCellByColumnAndRow(25,$cl)->getValue() != NULL ? $objWorksheet->getCellByColumnAndRow(25,$cl)->getValue() : '';

					$client_recruiter = $objWorksheet->getCellByColumnAndRow(26,$cl)->getValue() != NULL ? $objWorksheet->getCellByColumnAndRow(26,$cl)->getValue() : '';

					$sourced_by = $objWorksheet->getCellByColumnAndRow(27,$cl)->getValue() != NULL ? $objWorksheet->getCellByColumnAndRow(27,$cl)->getValue() : '';

					$reason_for_job_change = $objWorksheet->getCellByColumnAndRow(28,$cl)->getValue() != NULL ? $objWorksheet->getCellByColumnAndRow(28,$cl)->getValue() : '';


					$query = $this->db->query("SELECT sheetid from tbl_dailyreport_recruiter where sheetname LIKE '%".@$client_name."%'");
					@$sheetid = $query->row()->sheetid; 

					$interview_schedule = $this->input->post('interview_schedule',TRUE);
					if(!empty($interview_schedule)){
						$interview_schedule =  date('Y-m-d H:i:s', strtotime($interview_schedule));
					}else{
						$interview_schedule =  "0000-00-00 00:00:00";
					}


					$query1 = $this->db->query("SELECT * from tbl_dailyreport_recruiter where candidate_name='".@$candidate_name."' AND company_client='".@$client_name."' AND sourced_by='".@$sourced_by."'");

					if($query1->row())
					{
						$mydata = array(

							'date'=>$date,

							'position_skills'=>$position_skills,
							'rp_id'=>$rp_id,

							'applicant_id'=>$applicant_id,
							'role'=>$role,
							'qulification'=>$qulification,

							'company_name'=>$company_name,
							'yrs_of_experience'=>$yrs_of_experience,
							'relevant_exp'=>$relevant_exp,

							'ctc'=>$ctc,
							'exp_ctc'=>$exp_ctc,
							'notice_period'=>$notice_period,

							'official_onpaper_notice_period'=>$official_onpaper_notice_period,
							'contact_no'=>$contact_no,
							'alternate_contact_number'=>$alternate_contact_number,

							'email_id'=>$email_id,

							'alternate_email_id'=>$alternate_email_id,

							'location'=>$current_location,

							'preffered_location'=>$preffered_location,

							'client_feedback'=>$client_feedback,

							'interview_schedule'=>  $interview_schedule,

							'interview_schedule_mode'=>$interview_schedule_mode,

							'final_status'=>$final_status,

							'client_recruiter'=>$client_recruiter,

							'reason_for_job_change'=>$reason_for_job_change,

							'record_added_datetime'    =>  date("Y-m-d H:i:s")
						);

						$result	=$this->m_recruiter->update($query1->row()->dailyreport_id,$mydata);
						$insert_cnt++;
					}
					else
					{
						$mydata = array(

							'user_id'=>$this->session->userdata('user_id'),
							'admin_id'=>$this->session->userdata('admin_id'),

							'sheetid'=>@$sheetid,           
							'sheetname'=>@$client_name,

							'date'=>$date,
							'company_client'=>$client_name,

							'position_skills'=>$position_skills,
							'rp_id'=>$rp_id,
							'candidate_name'=>$candidate_name,

							'applicant_id'=>$applicant_id,
							'role'=>$role,
							'qulification'=>$qulification,

							'company_name'=>$company_name,
							'yrs_of_experience'=>$yrs_of_experience,
							'relevant_exp'=>$relevant_exp,

							'ctc'=>$ctc,
							'exp_ctc'=>$exp_ctc,
							'notice_period'=>$notice_period,

							'official_onpaper_notice_period'=>$official_onpaper_notice_period,
							'contact_no'=>$contact_no,
							'alternate_contact_number'=>$alternate_contact_number,

							'email_id'=>$email_id,

							'alternate_email_id'=>$alternate_email_id,

							'location'=>$current_location,

							'preffered_location'=>$preffered_location,

							'client_feedback'=>$client_feedback,

							'interview_schedule'=>  $interview_schedule,

							'interview_schedule_mode'=>$interview_schedule_mode,

							'final_status'=>$final_status,

							'client_recruiter'=>$client_recruiter,

							'sourced_by'=>$sourced_by,

							'reason_for_job_change'=>$reason_for_job_change,

							'record_added_datetime'    =>  date("Y-m-d H:i:s")
						);

						$result	=$this->m_recruiter->insert($mydata);
						$insert_cnt++;
					}
} // end of for
if($insert_cnt > 0){
	$this->session->set_flashdata("success", "$insert_cnt Records Imported.");
}else{
	$this->session->set_flashdata("error", "No Records Imported (Records may already exists).");
}
}else{
	$this->session->set_flashdata("error", "No sheet found or wrong sheet name.");
}	
unlink(FCPATH.'uploads/sales/'.$file_name);
redirect('recruiter/recruiter');
}
}
unlink(FCPATH.'uploads/sales/'.$file_name);
}



public function candidate_search()
{
	$data['siderbar_menus'] = $this->M_permission->list_labels('internal user');

	$this->load->view('template/header');
	$this->load->view('template/sidebar',$data);
	$this->load->view('recruiter/candidate_search_with_client',$data);
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
	$post=$this->input->post();
/*        echo "<pre>";
print_r($post);
exit;*/

$insert_data=array(
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

$result= $this->m_recruiter->insert_candidate($insert_data);

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
}
else
{

	$fileData = $this->upload->data();
	$uploadData = $config['upload_path'].$fileData['file_name'];
}

if(!empty($uploadData)) { $resume = $uploadData; }
else { $resume = ""; }

$data = array('candidate_resume_path' => $resume,);
$this->db->where('candidate_id', $result);
$this->db->update('candidate_data', $data);
}

public function edit_resume($id)
{
	$data['candidate']=$this->m_recruiter->get_candidate_resume_data($id);
	$this->Baseview('recruiter/candidate_search',$data);
}

public function update_candidate()
{
	$post=$this->input->post();
/*echo "<pre>";
print_r($_FILES);
exit;*/

$update_data=array(
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

echo "Thank You ".$post['candidate_name']."<br/>";
echo "For Updating Your Resume";
}

public function send_mail_candidate()
{

	$data['candidate_email']=implode(",",$this->input->post('candidate_emails'));
// 	print_r($data['candidate_email']);exit;
	$data['email_template'] =$this->m_recruiter->get_all_email_template();
	$this->Baseview('recruiter/send_mail_candidate',$data);

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
    $message=$content;
    $data=array('message'=>$content,);
	    // 	$EmailTemplate = $this->input->post('EmailTemplate', TRUE);
// 	if($EmailTemplate == 'Diwali')
// 	{
// 		$data       =	array( 'content' => $description);
// 		$message 	.= $this->load->view('mail/email_template/u_sales_mail_to_client',$data,true);
// 	}
// 	else
// 	{
// 		$template=$this->m_recruiter->get_all_email_template_by_id($EmailTemplate);

// 		$template   = base_url().'uploads/sales/templets/'.$template->template_path; 
// 		$content .= '<br><br><img style="width:600px;" src="'.$template.'">';
// 		$data       =	array( 'content' => $content);
// 		$message 	= $this->load->view('mail/email_template/u_sales_mail_to_client',$data,true);
// 	}

	/*echo $message;*/
$from_company=$this->session->userdata('user_email');
	foreach($email as $to)
	{
	   // $subject_data   = "Mail from montek"; 
         $message  = $this->load->view('mail/recruiter_advance_search_mail',$data,true);
    	   //print_r($message);
    	   //exit;
    	  $flag= $this->send_advance_mail($message,$to,$subject_data,$from_company);
            
    	      
// 		$flag=mail($to,$subject_data,$message,$headers);
	}

	if($flag)
	{
		$this->session->set_flashdata('success','Email sending Successfully!'); 
		redirect('recruiter/recruiter/advance_search');
	}
	else
	{
		$this->session->set_flashdata('error','Email sending failed!');
	}
}
	function send_advance_mail($message,$to_email,$subject,$from_company)
{
            //$localhost = array('127.0.0.1', '::1');
    $config = Array(
        'mailtype' => 'html',
        'priority' => '3',
        'charset'  => 'iso-8859-1',
        'validate'  => TRUE ,
        'newline'   => "\r\n",
        'wordwrap' => TRUE
        );

        //$to = $to_email;

    $from = 'Montek';
    $subject = $subject;
    $this->load->library('email');
    $this->email->initialize($config);
    $this->email->set_newline("\r\n");
    $this->email->from($from_company);
    $this->email->to($to_email);
    // montek.software@gmail.com
   // $this->email->cc($cc_email);
    // $this->email->bcc($cc_email);
    $this->email->subject($subject);
    $this->email->message($message);


    $result=$this->email->send();
    $this->email->clear();

    return  $result;
}
// Coder: Mr. Pratik G. Dhamande For adding the requirements of job profile from client
function pre($data)
{
	echo "<pre>";
	print_r($data);
	exit;
}

function list_of_jobs()
{
	$data['job_list'] = $this->m_recruiter->job_list();
	$this->Baseview('recruiter/list_of_all_jobs',$data);
}

function add_jobs()
{
	$data['clients_list'] = $this->m_recruiter->client_list_all();
	$this->Baseview('recruiter/add_jobs',$data);
}

function save_job()
{
	$form_data = $this->input->post(array('job_title', 'client_name', 'exp', 'salery', 'locations', 'number_of_opp', 'skills', 'desc'));

	$insertdata = array(
		'title' => $form_data['job_title'],
		'client_id' => $form_data['client_name'],
		'exp'=> $form_data['exp'],
		'salery' => $form_data['salery'],
		'locations' => $form_data['locations'],
		'number_pos' => $form_data['number_of_opp'],
		'skills' => $form_data['skills'],
		'desc' => $form_data['desc'],
		'added_by' => $this->session->userdata('user_id'),
		'created_at' => date("Y-m-d H:i:s")
	);
	$result = $this->m_recruiter->global_insert($insertdata, 'tbl_jobs');
	if($result)
	{
		$this->session->set_flashdata('success','Job details added Successfully!'); 
	}
	else
	{
		$this->session->set_flashdata('error','Job Details Adding failed!');
	}
	redirect('recruiter/recruiter/list_of_jobs');
}

function delete_job($job_id)
{
	$result = $this->m_recruiter->global_update(array('id' => $job_id), array('is_deleted' => 1), 'tbl_jobs');
	if($result)
	{
		$this->session->set_flashdata('success','Job details Deleted Successfully!'); 
	}
	else
	{
		$this->session->set_flashdata('error','Job Details Delition failed!');
	}
	redirect('recruiter/recruiter/list_of_jobs');
}

function edit_job($id)
{
	$data['clients_list'] = $this->m_recruiter->client_list_all();
	$data['job_list'] = $this->m_recruiter->job_list_by_id($id);
	$this->Baseview('recruiter/edit_jobs',$data);
}

function update_job()
{
	$form_data = $this->input->post(array('job_title', 'id', 'client_name', 'exp', 'salery', 'locations', 'number_of_opp', 'skills', 'desc'));
// $this->pre($form_data);
	$insertdata = array(
		'title' => $form_data['job_title'],
		'client_id' => $form_data['client_name'],
		'exp'=> $form_data['exp'],
		'salery' => $form_data['salery'],
		'locations' => $form_data['locations'],
		'number_pos' => $form_data['number_of_opp'],
		'skills' => $form_data['skills'],
		'desc' => $form_data['desc'],
		'added_by' => $this->session->userdata('user_id'),
		'modified_at' => date("Y-m-d H:i:s")
	);
	$result = $this->m_recruiter->global_update(array('id' => $from_data['id']), $insertdata, 'tbl_jobs');
	if($result)
	{
		$this->session->set_flashdata('success','Job details Updated Successfully!'); 
	}
	else
	{
		$this->session->set_flashdata('error','Job Details Updation failed!');
	}
	redirect('recruiter/recruiter/list_of_jobs');
}


public function set_cookie()
	{
	    $user_id=$this->input->post('user_id',TRUE);
     $data = $this->m_recruiter->check_data_of_not_respond($user_id);
    //  print_r($data);exit;
       if(!empty($data))
       {
           echo "1";
       }
       else
       {
           echo "0";
       }
	}
	public function view_not_responding_list($user_id)
	{
	   // $user_id=$this->input->post('user_id',TRUE);
     $data['user_data'] = $this->m_recruiter->check_data_of_not_respond_by_user($user_id);
    //  print_r($data['user_data']);exit;
    $this->Baseview('recruiter/not_responding_list',$data);
	}
	
	function make_joining_flag_on() 
{
    // $actual_link= $this->input->post('actual_link');
	$dailyreport_id=$this->input->post('r_id');
	
    $this->db->where_in('dailyreport_id',$dailyreport_id);
	$this->db->set('joining_candidate_flag',1);
	$this->db->update('tbl_dailyreport_recruiter');
	
    redirect('recruiter/recruiter');

}

/*code for report download-rupli and sayali*/
public function download_report()
{

	$user_role = $this->session->userdata('user_role');
	if($user_role==1)
		{$admin_id=$this->session->userdata('user_id');}
	else{$admin_id=$this->session->userdata('admin_id');}

	$data['employee']=$this->m_recruiter->active_list_user($admin_id);

	$this->Baseview('recruiter/report_download',$data);
}

public function check_task_half_deadline_over()  
    {
    
    $post=$this->input->post();
    
    $login_user = $this->session->userdata('user_id');
   
    // $query =$this->db->query("select * from task  where emp_id=$login_user and  status = 4 and half_deadline_task_read_status IS NULL or half_deadline_task_read_status='' ");
    $query =$this->db->query("SELECT * FROM `tbl_dailyreport_recruiter`  WHERE DATE(`record_added_datetime`) = CURDATE() and user_id=$login_user and resume_uploaded_flag=0;");
    $data["result"]=$results=$query->row();
  print_r($data["result"]);exit;
    if(!empty($data["result"]))
    {
        /*    &&  $currentDateTime  <= $deadline_date_time*/
               //$this->load->view("task/task_complete_half_deadline",$data);
                
        
          
    }   
        
}

public function search_within_search()
{
    //print_r('hi');exit;
    $post=$this->input->post();
    
//$keyword = $this->input->post('keyword');

	@$perpage = $post["per_page"];
	if(!empty($perpage))
	{	   
	   $per_pages = setcookie('per_page', $perpage, time() + 60, '/');
	}
	if(@$_COOKIE['per_page'])
	{
	    $per_page =$_COOKIE['per_page'];
	}
	else
	{
	    $per_page =40;
	}
	if(!empty($post['keyword']))
	{
	   //$any_keywords = explode(' ',$post['keyword']);
	   $any_keywords = $this->input->post('keyword');
	}
	//print_r($post['keyword']);exit;
	if(!empty($post))
	{
		$newdata = array(
		    'any_keywords'=>@$any_keywords,
			'must_keywords'=>@$post['must_keywords'],
			'excluding_keywords'=>@$post['excluding_keywords'],
			'total_experience_from'=>@$post['total_experience_from'],
			'total_experience_to'=>@$post['total_experience_to'],
			'anual_salary_from_lacs'=>@$post['anual_salary_from_lacs'],
			'anual_salary_to_lacs'=>@$post['anual_salary_to_lacs'],
			'include_company'=>@$post['include_company'],
			'exclude_company'=>@$post['exclude_company'],
			'current_location'=>@$post['current_location'],
			'prefered_location'=>@$post['prefered_location'],
		);
		$this->session->set_userdata('search_data',$newdata);
	}
	$data["search_keyword"] = @$post['any_keywords'];
print_r($this->session->userdata('search_data'));exit;
$this->load->library('pagination');
$config=[ 
	'base_url'=>base_url('recruiter/recruiter/advance_search_result'),
	'per_page'=>$per_page,
	'total_rows'=>$this->m_recruiter->get_candidate_data_filter_rows($this->session->userdata('search_data')),
	'uri_segment' => 4,
	'full_tag_open'=> "<ul class='pagination'>",
	'full_tag_close'=> '</ul>',
	'num_tag_open'=> '<li>',
	'num_tag_close'=> '</li>',
	'cur_tag_open'=> '<li class="active"><a href="javascript:void(0)">',
	'cur_tag_close'=> '</a></li>',
	'prev_tag_open'=> '<li>',
	'prev_tag_close'=> '</li>',
	'first_tag_open'=> '<li>',
	'first_tag_close'=> '</li>',
	'last_tag_open'=> '<li>',
	'last_tag_close'=> '</li>',
	'prev_link'=> '<i class="fa fa-arrow-left"></i> Previous Page',
	'prev_tag_open'=> '<li>',
	'prev_tag_close'=> '</li>',
	'next_link'=> 'Next Page <i class="fa fa-arrow-right"></i>',
	'next_tag_open'=> '<li>',
	'next_tag_close'=> '</li>',
];
$this->pagination->initialize($config);
$page = ($this->uri->segment(4))? $this->uri->segment(4):0;
$data["links"] = $this->pagination->create_links();
$data['fiter'] = $this->Domain_model->search_within_search_jobs($this->session->userdata('search_data'),$config['per_page'],$page);
//print_r($data['fiter']);exit;
$data['count_all_records'] = $this->Domain_model->get_candidate_data_filter_count($this->session->userdata('search_data'));
$data['data_Session']=$this->session->userdata('search_data');
print_r($data['data_Session']);exit;
 //$data['view_content'] = $this->load->view('recruiter/advance_search_result1',$data,TRUE);

    // Encode the view content as JSON and send it as the AJAX response
    //$this->output
        // ->set_content_type('application/json')
        // ->set_output(json_encode($data));
//print_r($data);exit;
//$jobs = $this->Domain_model->search_within_search_jobs($any_keywords);
//print_r($jobs);exit;
//header('Content-Type: application/json');
// $this->load->view('template/header');
// $this->load->view('template/sidebar',$data);
// $html_content = '<div><h1>Hello, world!</h1><p>This is some HTML content.</p></div>';
// $html_content = $this->load->view('recruiter/advance_search_result1',$data,TRUE);

//     //Encode the HTML content using json_encode()
//     $json_response = json_encode(array('html_content' => $html_content));

//     //Set the content type header
//     $this->output->set_content_type('application/json');

//     //Send the JSON response
//     $this->output->set_output($json_response);
 $this->load->view('recruiter/advance_search_result1',$data);
//echo json_encode($jobs);


}

	
}
?>