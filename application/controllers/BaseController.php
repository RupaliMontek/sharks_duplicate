<?php defined ( 'BASEPATH' ) || exit ( 'No direct script access allowed' );
class BaseController extends CI_Controller  {
	function __construct()
	{
			 @parent::__construct();
			 $this->init();
	}

	function init()
	{
		if( ! ini_get('date.timezone') )
		{
		   date_default_timezone_set('GMT');
		} 
		

		$this->load->model('login/User_model');
		$this->load->model('recruiter/m_recruiter');
		$this->load->model('dailyreport/m_dailyreport');
		$this->load->model('user/m_admin_user');
		$this->load->model('modelbasic');
		$this->load->model('commen_model');
	//	$this->load->library('PHPReport');
		$this->load->helper(array('form', 'url'));
		$this->load->helper('download');
		$this->load->model('permission/M_permission');
		$this->load->model('m_admin');
//		$this->load->model('user/m_user');
		$this->load->model('Commen_model');
	//	$this->load->model('m_pipeline');
	//	$this->load->model('m_search');
	//	$this->load->model('admin_report/Admin_report_model');
		
	
//	$this->check_login();
		
		
	}


	public function check_login()
	{
		if( ($this->session->userdata('admin_id')=='') || ($this->session->userdata('user_id')=='') || ($this->session->userdata('user_name')=='') || 
			($this->session->userdata('user_email')=='') || ($this->session->userdata('user_role')=='') )
		{
			redirect('login');
		}
	}

	function BaseView($view, $data = null)
	{
       $admin_id = $this->session->userdata('admin_id');
        $user_id = $this->session->userdata('user_id');
		$data['siderbar_menus'] = $this->M_permission->list_labels('internal user');
		$data['record']	=	$this->User_model->admin_details($admin_id);	
		$data['bank_details']	=	$this->User_model->emp_bank_details($admin_id);
		$data['emp_image']	=	$this->User_model->emp_image($user_id);
		//print_r($data['emp_image']);exit();
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar',$data);
		$this->load->view($view, $data);
		
	}





	

	
}
