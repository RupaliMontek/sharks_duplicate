<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('login/User_model');
    }

	public function index()
	{
		$this->load->view('login/login');
	}	

	public function check_login()
	{       
		    $this->form_validation->set_rules('email', 'Email','required');
            $this->form_validation->set_rules('password', 'Password','required');

              $mailid= $this->input->post('email',true);
		        $pass=$this->input->post('password',true);
// print_r($mailid);exit;
            if($this->form_validation->run()==true)
            {
		        $mailid= $this->input->post('email',true);
		        $pass=$this->input->post('password',true);
		        $data = $this->User_model->login_model($mailid,$pass);
		      //  print_r($mailid);
		      //  exit;
              if (!empty($data)) 
		         {
		             
		             
		             

		         	if(!empty($data[0]['name']))
			        {
			        	$name = $data[0]['name']." ".$data[0]['l_name'];
	                    $this->session->set_userdata('user_id',$data[0]['user_admin_id']);
			    	    $this->session->set_userdata('user_name',$name);
			    	    $this->session->set_userdata('user_email',$data[0]['email']);
			    	    $this->session->set_userdata('user_role',$data[0]['role']);
			    	    $this->session->set_userdata('user_dept',$data[0]['dept']);
			    	    $this->session->set_userdata('emp_role',@$data[0]['emp_role']);
			    	    $this->session->set_userdata('project_id',@$data[0]['project_id']);
			    	    $this->session->set_userdata('admin_id',@$data[0]['added_by_user_admin_id']);
			        }
			        else
			        {
			        	$name = $data[0]['first_name']." ".$data[0]['last_name'];
			        	$ed_by_user_admin_id = "86";
			        	$arole = "1";
			        	$adept = "0";
			        	$aemprole = "0";
	                    $this->session->set_userdata('user_id',$data[0]['demo_user_admin_id']);
			    	    $this->session->set_userdata('user_name',$name);
			    	    $this->session->set_userdata('user_email',$data[0]['email']);
			    	    $this->session->set_userdata('user_role',$arole);
			    	    $this->session->set_userdata('user_dept',$adept);
			    	    $this->session->set_userdata('emp_role',@$aemprole);
			    	    $this->session->set_userdata('project_id',@$data[0]['project_id']);
			    	    $this->session->set_userdata('admin_id',$ed_by_user_admin_id);
			        }		         		
                        
 
                       

			    	    $user_role = $this->session->userdata('user_role');
			    	    
			    	print_r($user_role);exit;
			    	    if($user_role==1002)
			    	    {
			    	    

							redirect('project_management/project_management/project_dashboard_client');	
			    	    }
			    	    if($user_role==14)
			    	    {
			    	      $this->db->where('user_admin_id',$this->session->userdata('user_id'));
			    	      $this->db->set('online_status',1);
			    	      $this->db->update('user_admin');	
						
							redirect('sales');	
			    	    }
			    	    elseif ($user_role==1001) 
			    	    {
			    	    	$this->db->where('user_admin_id',$this->session->userdata('user_id'));
			    	      $this->db->set('online_status',1);
			    	      $this->db->update('user_admin');
			    	    	redirect('superadmin');	
			    	    }
			    	    
			    	    else
			    	    {  
			    	         
			    	        
			    	    	$this->db->where('user_admin_id',$this->session->userdata('user_id'));
			    	      $this->db->set('online_status',1);
			    	      $this->db->update('user_admin');
			    	    	redirect('admin');	
			    	    }
			    	    
		         	
		         }
		         else
		         {
		    	    redirect('login');
		         }
            }
            else
            {
            	$this->load->view('login/login_view');
            }
	}
	
	public function logout()
	{
		// code for auto logout time   
         $employee_id = $this->session->userdata('user_id'); 
         $time=date('H:i:s');
         $effective_date=date('Y/m/d');

         $pieces_current_date = explode("/", $effective_date);
         $year = $pieces_current_date[0];
         $month = $pieces_current_date[1];
         $day = $pieces_current_date[2];

          
          $result	 =	$this->m_take_attendance->deleteRecordByCheckbox_outtime($employee_id,$time,$effective_date);	
// code end for auto logout time 

		  $this->db->where('user_admin_id',$this->session->userdata('user_id'));
	      $this->db->set('online_status',0);
	      $this->db->update('user_admin');	
	      
		$this->session->unset_userdata('user_id');
	    $this->session->unset_userdata('user_name');
	    $this->session->unset_userdata('user_email');
	    $this->session->unset_userdata('user_role');
	    session_destroy();
	    redirect('login');
	}


	function profile($admin_id)
	{
		$data['siderbar_menus'] = $this->M_permission->list_labels('internal user');
		$data['record']	=	$this->User_model->admin_details($admin_id);	
		$data['bank_details']	=	$this->User_model->emp_bank_details($admin_id);
   		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar',$data);
		$this->load->view('login/profile',$data);
	}

	public function update_admin()
	{
		$login_id	=	$this->input->post('login_id',TRUE);
// 		$this->form_validation->set_rules('name', 'Name', 'required');
// 		$this->form_validation->set_rules('contact', 'Contact Number', 'required');
// 		$this->form_validation->set_rules('pass', 'Password', 'required');
// 		if($this->form_validation->run() == FALSE) 
// 		{	
// 			$this->profile($login_id);
// 		} 
// 		else
// 		{	
$user_id =  $this->session->userdata('user_id');
				if (!is_dir('./uploads/user_profile_pictures/'.$login_id.'/')) 
			{
				mkdir('./uploads/user_profile_pictures/'.$login_id .'/', 0777, TRUE);
			}

			$config['upload_path'] ='./uploads/user_profile_pictures/'.$login_id.'/';
			$config['allowed_types'] = 'pdf|jpg|jpeg|png|gif';
			$config['max_size'] = '0';
			$config['max_width']  = '0';
			$config['max_height']  = '0';
			$config['remove_spaces'] = FALSE; 
			$this->load->library('upload', $config);
			$this->upload->initialize($config);	
			$do_upload1 = $this->upload->do_upload('image_path_1');

				//print_r($do_upload1);
			if(!empty($do_upload1))
			{
				$path = $_FILES['image_path_1']['name'];
				$url = 'uploads/user_profile_pictures/'.$login_id.'/'.$path; 		
				$image_1 =	$url;
			}
			else
			{
				$image_1 = $this->input->post('image1',TRUE);
			}
			if(!empty($this->input->post('pass',TRUE)))
			{
			$data	=	array(
				'name'		=>	$this->input->post('name',TRUE),
				'contact'	=>	$this->input->post('contact',TRUE),
				'password'	=>	md5($this->input->post('pass',TRUE)),
				'image'=>$image_1,
				);

			$result	=	$this->User_model->update_admin($login_id,$data);
			}
			else
			{
			$data	=	array(
				'name'		=>	$this->input->post('name',TRUE),
				'contact'	=>	$this->input->post('contact',TRUE),
			
				'image'=>$image_1,
				);

			$result	=	$this->User_model->update_admin($login_id,$data);
			}

			
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
			
// 		}
	}


    public function forgot_password_email_exits()
    {
        $email = $this->input->post('emailqq');
        $result = $this->User_model->check_forgot_password_check_email_exists($email);
        if($result=='1')
        {
            echo "TRUE";
        }
        else;
        {
            echo "FALSE";
        }
    }


    public function check_db_forgot_password_email_exits()
    {
        $email = $this->input->post('email');
        $result = $this->User_model->check_forgot_password_check_email_exists($email);
        if($result=='1')
        {
            echo "TRUE";
        }
        else
        {
            echo "FALSE";
        }
    }


    public function password_check_db_forgot_password_email_exits()
    {

        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $result = $this->User_model->password_forgot_password_check_email_exists($email,$password);
        if($result=='1')
        {
            echo "TRUE";
        }
        else
        {
            echo "FALSE";
        }
    }


	public function send_forgor_password_email() 
	{
			$email = $this->input->post('user_email');
			$this->db->where('email', $email);
			$this->db->where('password!=','');
			$this->db->from('user_admin');
            $query=$this->db->get();
			$num_res = $this->db->count_all_results();
            $first_name=$query->row()->name;


			if($num_res == 1) 
			{
				$code = mt_rand('5000', '200000');
				$data = array(
					'activate_code' => $code
					);

				$this->db->where('email', $email);
				$this->db->where('password!=','');
				if ($this->db->update('user_admin', $data)) 
				{
          			// Update okay, send email
					$url = '<a target="_blank" href="'.base_url("login/change_password/".$code).'">Change Password</a>';
					$body = "\n Please click the following link to reset your password: \n\n".$url."\n\n";
					$this->session->set_userdata('msg_body', $body);
					$data = array('email_text' =>  $_SESSION['msg_body'],'first_name' => $first_name,'mail_for'=>'forgot_password');
					$this->session->unset_userdata('msg_body');
					$subject_data			= "Reset Password";

					$message 	= $this->load->view('mail/forgot_password_change',$data,true);

					$flag 		= $this->send_confirmation_mail($message,$email,$subject_data);
					
					$this->session->set_flashdata('success','Please check your Email for update password!');

					redirect('login');
						
				} 
				else 
				{
					redirect('login');
				}
			} 
			else 
			{
				redirect('login');
			}

	}

		public function change_password($code)
	{
		$result  = $this->User_model->check_code_for_reset_password($code);
		$data['record1']  = $this->User_model->getemail($code);
		if($result=='1')
		{
			$data['code'] = $code;
			$this->load->view('mail/new_password', $data);		
		}
		else
		{
	        	redirect ('login/invaliduser');
		}
	}


	public function update_password()
 	{
	    if ($this->input->post()) 
	    {
	     	$data['code'] = $this->input->post('code');
	    } 
	     	// Does code from input match the code against the // email
	      	$email = $this->input->post('email');
	      	if (!$this->User_model->does_code_match($data['code'], $email)) 
	      	{
	        	redirect ('login/invaliduser');
	      	} 
	      	else 
	      	{
	        	$hash = md5($this->input->post('pass',TRUE));
		        $data = array(
		          'password' => $hash,
		          'activate_code' => ''
		        );
		        if ($this->User_model->update_user($data, $email)) 
		        {
					$this->session->unset_userdata('logged_in');
					$this->session->sess_destroy();
					 redirect ('login');
		        }
	      	}
	}

	public function invaliduser()
	{
		$this->load->view('mail/invalid');	
	}


		function send_confirmation_mail($message,$email,$subject_data)
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
        $this->email->from('info@montekservices.com','Office Management');
        $this->email->to($email);
        //$this->email->to('montek.software@gmail.com');
        $this->email->subject($subject_data);
        $this->email->message($message);	
		return $this->email->send();
	}

}
	