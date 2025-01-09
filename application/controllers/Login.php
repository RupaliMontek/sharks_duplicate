<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');


class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('login/User_model');
    }

	public function index()
	{
	    $this->load->database('login');
		$this->load->view('login/login_view');
	}

	public function check_login()
	{       
	        $db_name1 = "sharksjob_backend";
            $this->db->query("use " .$db_name1. "");
	        $post=$this->input->post();
		    $this->form_validation->set_rules('email', 'Email','required');
            $this->form_validation->set_rules('password', 'Password','required');
             
            if($this->form_validation->run()==true)
            {
		        $mailid= $this->input->post('email',true);
		        
		        $pass=$this->input->post('password',true);

				$data = $this->User_model->login_model($mailid,$pass);
                // print_r($data); die();
    	         if (!empty($data)) 
		         {
	         	 	$this->session->set_userdata('user_id',$data[0]['user_admin_id']);
		    	    $this->session->set_userdata('user_name',$data[0]['name']);
		    	    $this->session->set_userdata('user_email',$data[0]['email']);
		    	    $this->session->set_userdata('user_role',$data[0]['role']);
		    	    redirect('admin');
		         }
		         else
		         {
		    	    redirect('admin-login');
		         }
            }
            else
            {
            	$this->load->view('login/login_view');
            }
	}
	
	public function logout()
	{
		$this->session->unset_userdata('user_id');
	    $this->session->unset_userdata('user_name');
	    $this->session->unset_userdata('user_email');
	    $this->session->unset_userdata('user_role');
	    session_destroy();
	    redirect('login');
	}


	function profile($admin_id)
	{
		$data['record']	=	$this->User_model->admin_details($admin_id);	
   		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar_admin',$data);
		$this->load->view('login/profile',$data);
	}

	public function update_admin()
	{
		$login_id	=	$this->input->post('login_id',TRUE);
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('contact', 'Contact Number', 'required');
		$this->form_validation->set_rules('pass', 'Password', 'required');
		if($this->form_validation->run() == FALSE) 
		{	
			$this->profile($login_id);
		} 
		else
		{	
			$data	=	array(
				'name'			=>	$this->input->post('name',TRUE),
				'contact'		=>	$this->input->post('contact',TRUE),
				'password'		=>	md5($this->input->post('pass',TRUE))
				);

			$result	=	$this->User_model->update_admin($login_id,$data);
			if($result)
			{
				$this->session->set_flashdata('success','Record updated Successfully!');
				redirect('login/logout');	
			}
			else
			{
				$this->session->set_flashdata('error','Record not updated!');
				redirect('login/profile/'.$login_id);
			}
			
		}
	}

}
