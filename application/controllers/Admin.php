<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');


class Admin extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->check_login();
 		$this->load->model('m_admin');
//  		$this->load->model('m_subscribe');
//  		$this->load->model('career/Career_model');
    }

    public function check_login()
	{
		if(($this->session->userdata('user_id')=='') || ($this->session->userdata('user_name')=='') || ($this->session->userdata('user_email')=='' || $this->session->userdata('user_role')==''))
		{
			redirect('login');
		}
	}

	public function index()
	{
	    $db_name1 = "sharksjob_backend";
        $this->db->query("use " .$db_name1. "");
	   // $data['list_user']	=	$this->Career_model->list_career_enquiry();
	   // $data['item'] = $this->m_subscribe->GetContactUs();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_admin');
		$this->load->view('login/dashboard_view');
		$this->load->view('template/footer');
	}
	
}
