<?php

class Company_profile_login extends CI_Controller
{
    public function __construct()
	{
	    if( ! ini_get('date.timezone') )
		{
		   date_default_timezone_set('GMT');
		}
		
		   parent::__construct();
		   $this->load->model('recruiter/m_recruiter');
		   $this->load->model('M_Company_profile_login');
		   $this->load->model('M_Company_profile');
		   $this->load->helper(array('form', 'url'));
		   $this->load->helper('download');
	}
	
	public function index(){
	   $this->load->view('Company/Company_login',@$data);
	}
	
	public function check_user_login_check_candidate()
	{

		$this->form_validation->set_rules('email', 'Email','required');
        $this->form_validation->set_rules('password', 'Password','required');
        if($this->form_validation->run()==true)
        {
	        $mailid= $this->input->post('email',true);
	        $pass=$this->input->post('password',true);
	       // $datas = $this->M_Company_profile_login->login_check_candidate($mailid,$pass); //print_r($datas); die();
	        $datas = $this->M_Company_profile_login->login_check_candidate($mailid,$pass); //print_r($datas); die();
	        //print_r($datas);exit;
          	if(!empty($datas)) 
	        {	$name = $datas[0]['name'];
	            $candidate_id = $datas[0]['user_admin_id'];
	            $data= array("last_login" => date("Y-m-d h:i:s"),);
                $last_update_profile_update_date =  $this->M_Company_profile->update_candidate_details($candidate_id,$data);
             //   print_r($last_update_profile_update_date); die();
                $this->session->set_userdata('candidate_id',$datas[0]['user_admin_id']);
	    	    $this->session->set_userdata('candidate_user_name',$name);
	    	    $this->session->set_userdata('candidate_user_email',$mailid);
	    	   // print_r($this->session->userdata('candidate_id'));exit;
	    	    $this->session->set_flashdata('success','You Have Successfully Logged in Msuite');
		    	redirect('Company/Company_profile');
	        }
	        else
	        {
	    	    redirect('Company/Company_profile');
	        }
        }
        else
        {
        	redirect('Company_profile_login');
        }
	}
	
public function check_email_exists()
{
		$email = $this->input->post('email',TRUE);
		$result=$this->M_Company_profile->check_if_email_exists($email);
	
         if($result>=1)
		{
		    echo "true";
		}
		else
		{
		    echo "false";
		}

}

public function check_email_exists_registration()
 {
		$email = $this->input->post('candidate_email',TRUE);
		$result=$this->M_Company_profile->check_if_email_exists($email);
         if($result>=1)
		{
		    echo "false";
		}
		else
		{
		    echo "true";
		}
}
public function view_profile($email_id)
{
    
    $email_id= urldecode($email_id);
    print_r($email_id); die();
}
public function check_phone_no_exists_registration()
 {
		$phone = $this->input->post('phone',TRUE);
		$result=$this->M_Company_profile->check_if_phone_exists($phone);
        if($result>=1)
		{
		    echo "false";
		}
		else
		{
		    echo "true";
		}
}

public function check_password_exist(){
	    $password = $this->input->post('password',TRUE);
	    $enc_pass=md5($password);
		$result=$this->M_Company_profile->check_if_password_exists($enc_pass);
        if($result>=1)
		{
		    echo "true";
		}
		else
		{
		    echo "false";
		}

}
	
	public function logout()
	{	      
		$this->session->unset_userdata('candidate_id');
	    $this->session->unset_userdata('candidate_user_name');
	    $this->session->unset_userdata('candidate_user_email');
	    session_destroy();
	    $this->session->set_flashdata('success','You Have Successfully logout Msuite');
	    redirect('recruitment/allready_register_account_login_here');
	}
	
public function resend_verification_email(){
	   
        $login_id = $this->M_Company_profile->get_loginid();
        $lid=$login_id[0]['candidate_registration_id'];
      
        $code = mt_rand('5000', '200000');
		$data = ['forgot_password_reset' => $code,'email_verified'=>0];
	     
		$this->db->where('candidate_registration_id', $lid);
		$this->db->update('tbl_candidate_registration', @$data);
        $url  = '<a target="_blank" href="' . base_url('Company_profile_login/activate_acc_home/' . $code) . '">Verify Email</a>';
		$body = "\n Please click the following link to verify your email: \n\n" . $url . "\n\n";
		$data = [
			'email_text' => $body,
		 	'first_name' => "Jaywant",
			'mail_for'   => 'account_verification',
		];
		
		$message = $this->load->view('mail/common_email', $data, true);

		$flag = $this->send_confirmation_mail($message, $this->input->post('email'), 'Verification email');
				
	
		$this->session->set_flashdata('success', 'Please check your Email to verify your email!');
		redirect('');
    }
  
public function send_forgor_password_email()
	{
	    $email = $this->input->post('email1');
	    $code = mt_rand('5000', '200000');
	    $data = ['forgot_password_reset' => $code,];
	  
		$this->db->where('candidate_email', $email);
		$this->db->where('candidate_password!=', '');
		$res = $this->db->update('tbl_candidate_registration', $data);
	
	
	    if($email != ''){
			$this->db->where('candidate_email',$email);
			
			$this->db->where('candidate_password!=', '');
			$this->db->from('tbl_candidate_registration');
			$query=$this->db->get();
			
/*	print_r($this->db->last_query());die();*/
			
			
            $num_res = $this->db->count_all_results();
            
            $first_name=$query->row()->candidate_name;
            	
    		if ($num_res === 1)
    		{
    			if ($res)
    			{
    				$url  = '<a target="_blank" href="' . base_url('Company_profile_login/change_password_home/' . $code) . '">Change Password</a>';
    				 
    				  
    				$body = "\n Please click the following link to reset your password: \n\n" . $url . "\n\n";
    				 
    				$data = [
    					'email_text' => $body,
    					'first_name' => $first_name,
    					'mail_for'   => 'forgot_password',
    				];
    				 
    				$message = $this->load->view('mail/common_email', $data, true);
    				
    				$flag = $this->send_confirmation_mail($message, $email, 'Reset Password');
    				
    			

    				
    			}
    		}
	    }
	  
	    {
	        redirect('Company_profile_login');
	    }
	}

	public function change_password_home($code)
	{
	    
		$result = $this->M_Company_profile_login->check_code_for_reset_password($code);
	 
	 
 		$data['record1'] = $this->M_Company_profile_login->getemail($code);
 	
		if ($result === '1')
		{
		     redirect("Company_profile_login/new_pass1/$code");
		    
		}
		else
		{
				redirect ('login/invaliduser');
		}
	}
	
	function send_mail_to_user($message,$email_id,$subject_data)
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
			$this->email->from('meghasury2000@gmail.com');//cube hub email
			$this->email->to($email_id);
			$this->email->subject($subject_data);
			$this->email->message($message);	
			return $this->email->send();
	}
     public function new_pass1($code)
    {
        $data['record1']  = $this->M_Company_profile_login->getemail($code);
        $data['code'] = $code;
        $this->load->view('recruiter/new_pass1',$data);    
        
    }
    
    
    /* function send_confirmation_mail($message, $email, $subject_data)
	{
		$config = [
			'mailtype' => 'html',
			'priority' => '3',
			'charset'  => 'iso-8859-1',
			'validate' => true,
			'newline'  => "\r\n",
			'wordwrap' => true,
		];
		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->from('meghasury2000@gmail.com');
		$this->email->to($email);
		//$this->email->to('montek.software@gmail.com');
		$this->email->subject($subject_data);
		$this->email->message($message);
		return $this->email->send();
	}*/


public function send_confirmation_mail($message,$email_id,$subject_data)
	{
	
            $this->load->library('email');
            $config['smtp_host'] = 'smtp.gmail.com';
            $config['smtp_port'] = '587';
            $config['smtp_user'] = 'vinita@montekservices.com';
            $config['smtp_pass'] = 'VINITA_HR@18';
            $config['smtp_crypto'] = 'tls'; //FIXED
            $config['protocol'] = 'smtp'; //FIXED
            $config['mailtype'] = 'html'; //FIXED
            $config['send_multipart'] = FALSE;
            
            $from = 'Montekservices';
			$this->email->initialize($config);
			$this->email->set_newline("\r\n");
 		    $this->email->from('vinita@montekservices.com',$from); 		 
            $this->email->to($email_id);  	
			$this->email->subject($subject_data);
			$this->email->message($message);               
            $result=$this->email->send();         
            
             $this->email->clear(); 
             return  $result;
            
	}

	public function update_password()
	{
	
		if ($this->input->post())
		{
			$data['code'] = $this->input->post('code');
		}
		// Does code from input match the code against the // email
		$candidate_email = $this->input->post('email');
	
		$res=$this->M_Company_profile_login->does_code_match($data['code'],$candidate_email);
		
 		if (!$res)
			{
			redirect ('login/invaliduser');
		}
		else
			{
 			$hash = md5($this->input->post('pass', true));
			$data = [
				'candidate_password'      => $hash,
				'forgot_password_reset' => $data['code'],
			]; 
		
		$result=$this->M_Company_profile_login->update_user($data,$candidate_email);
//  	print_r($result);
			if ($result)
			{
			    $this->session->set_flashdata('success','Password change successfully!');
				 redirect ('Company_profile_login');
			}
			else
			{
			    	$this->session->set_flashdata('error','Unable to change password! Please try again');
			    	 redirect ('Company_profile_login');
			}
		}
	}

	public function invaliduser()
	{
		$this->load->view('mail/invalid');
	}
	 public function new_pass()
    {
       
        $this->load->view('recruiter/new_pass1',@$data);    
        
    }
	
}

?>