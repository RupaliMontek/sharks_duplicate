<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Company extends CI_Controller {

	public function __construct()
    {
       	if(!ini_get('date.timezone'))
		{
		   date_default_timezone_set('GMT');
		} 
        parent::__construct();
        $this->load->dbforge();
        $this->load->model("M_Company_profile");
        $this->load->model("login/User_model");
        $this->load->model("blog/m_blog");
        $this->load->model('model/blog/M_blog', 'M_blog');
    }
 public function add_company()
{
    $data['recent_blogs'] = $this->M_blog->list_recent_blogs(4);
    $this->load->view("Company/company_header");
    $this->load->view("Company/add_company");
    $this->load->view("Company/company_footer", @$data);
}
public function index()
{
    $db_name1 = "sharksjob_backend";
    $this->db->query("use " .$db_name1. "");
    $data['recent_blogs'] = $this->M_blog->list_recent_blogs(4);
    $this->load->view("Company/company_header");
    $this->load->view("Company/company_login");
    $this->load->view("Company/company_footer", @$data);
}

public function save_recording_live_camera()
{
    $post = $this->input->post();
    $min = 10000;
    $max = 9999999;
    $randomNumber = rand($min, $max);
    $username=$post["name"];
    $videoBlob = $this->input->post('video_data');
    $config['upload_path'] = 'uploads/';
    $config['allowed_types'] = 'webm'; // Adjust allowed video types as needed
    $config['file_name'] = $username.'_video.mp4'; // Optionally, specify a custom file name
    $this->load->library('upload', $config);
    if (!empty($videoData)) 
    {
        $videoFileName = 'video_'.uniqid().'.webm';
        $videoPath = 'uploads/'.$videoFileName; // Adjust the path and filename

        if (file_put_contents($videoPath, $videoData)) 
        {
            // Video uploaded successfully
            // Additional logic..
            // Optionally, send a JSON response
            header('Content-Type: application/json');
            echo json_encode(['status' => 'success', 'message' => 'Video uploaded successfully']);
        } 
        else 
        {
            // Video upload failed
            // Handle the error, e.g., log or send an error response
            header('Content-Type: application/json');
            echo json_encode(['status' => 'error', 'message' => 'Failed to save the video']);
        }
    }
}

public function save_sharks_company_form()
{
    $post = $this->input->post();
    //print_r($post);exit;
    //print_r($_FILES);$this->db->db_debug = TRUE;print_r($post);
    $min = 10000;
    $max = 9999999;
    $randomNumber = rand($min, $max);
    $username=$post["name"];
    // Save the video file on the server
       $videoBlob = $this->input->post('video_data');
     //   $videoPath = 'uploads/'.$username.'_video.mp4';
    //$videoData = @file_get_contents(@$_FILES['video_data']['tmp_name']);

       $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = 'webm'; // Adjust allowed video types as needed
        $config['file_name'] = $username.'_video.mp4'; // Optionally, specify a custom file name

        $this->load->library('upload', $config);

       if (!empty($videoData)) {
           
           
            $videoFileName = 'video_'.uniqid().'.webm';
            $videoPath = 'uploads/'.$videoFileName; // Adjust the path and filename

            if (file_put_contents($videoPath, $videoData)) {
                // Video uploaded successfully
                // Additional logic...

                // Optionally, send a JSON response
                header('Content-Type: application/json');
                echo json_encode(['status' => 'success', 'message' => 'Video uploaded successfully']);
                
            } else {
                // Video upload failed
                // Handle the error, e.g., log or send an error response
                header('Content-Type: application/json');
                echo json_encode(['status' => 'error', 'message' => 'Failed to save the video']);
               
            }
        }
    $para = array
    ('emp_off_id'                => $randomNumber,
     'name'                      => $post["name"],
     'email'                     => $post["email"],
     'contact'                   => $post["contact"],
     'company_logo'              => 'https://msuite.work/uploads/company/shesha@montekservices.com/montek.png',
     'dept'                      => '2',
     'role'                      => '1029',
     'emp_role'                  => '1029',
     'project_id'                => 0,
     'added_by_user_admin_id'    => 1,
     'created'                   => date("Y-m-d H:i:s"),
     'updated'                   => date("Y-m-d H:i:s"),
     'online_status'             => 0,
     'group_id'                  => 0,
     'added_by'                  => 1,
     'download_count'            => 0,
     'download_date'             => date("Y-m-d H:i:s"),
     'attempts'                  => 0,
     'target'                    => 0
     );
        $db_name1 = "sharksjob_backend";
    $this->db->query("use ".$db_name1."");
    $vendor_user_id = $this->M_Company_profile->insert_vendor_user_data($para);
 
    
    
    $data =array
     (  
        'id'                             =>      $vendor_user_id,
        'name'                           =>      $post["name"],
        'email'                          =>      $post["email"],
        'contact'                        =>     $post["contact"],
       // 'company_logo'                   =>     $F["company_logo"],
        'No_of_Employees'                 =>     $post["No_of_Employees"],
        'company_KYC'                    =>     $post["company_KYC"],
        'industry'                        =>     $post["industry"],   
        'designation'                     =>     $post["designation"],
        'pin_code'                        =>     $post["pin_code"],
        'street_address'                 =>      $post["street_address"],
        //'video'                          =>    @$videoPath,
        'terms_condition'                =>     $post["terms_condition"],
        'created'                         =>     date("Y-m-d H:i:s")
     );
     
     $db_name=$post["name"]."_".$vendor_user_id;
     if($this->dbforge->create_database($db_name))
		{
			$this->db->query("use ".$db_name."");
            $this->db->query("CREATE TABLE `company_details` (
         `id` int(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `name`   varchar(1000) DEFAULT NULL,
        `email`  varchar(1000) DEFAULT NULL,
        `password`  varchar(1000) DEFAULT NULL,
        `contact`   text,
        `company_logo`      text,
        `No_of_Employees`  int(11) NOT NULL,
        `company_KYC`      text,
        `industry`              text,
        `designation`        text,
        `pin_code`     varchar(100) DEFAULT NULL,
        `street_address` text,
        `video`           text,
        `terms_condition`   text,
        `created`   date
) ENGINE=InnoDB DEFAULT CHARSET=latin1");

        }
     //$Response = array('vendor_id' => $vendor_user_id);
     //echo json_encode($Response);
          // Database insert
    $para = array(
        'emp_off_id' => $randomNumber,
        'name' => $post["name"],
        'email' => $post["email"],
        'contact' => $post["contact"],
        'company_logo' => 'https://msuite.work/uploads/company/shesha@montekservices.com/montek.png',
        'created' => date("Y-m-d H:i:s"),
        'updated' => date("Y-m-d H:i:s"),
        'online_status' => 0
    );
    $db_name1 = "sharksjob_backend";
    $this->db->query("use ".$db_name1."");
    $vendor_user_id = $this->M_Company_profile->insert_vendor_user_data($para);

    // Email with login details
    $login_url = base_url('Company/company_login');
    $email_from = 'montekservicesm@gmail.com';
    $email = $post["email"];
    $subject_data = 'Login to Your Account Using the Link Provided';
    $password = $this->generate_password();

    // Update password in the database
    $hashed_password = md5($password);
    $this->db->query("use ".$db_name."");
    $this->update_password($email, $hashed_password);

    // Prepare the email content
    $message = "<p>Dear " . $post['name'] . ",</p>";
    $message .= "<p>Your account has been created. To log in, use the credentials below:</p>";
    $message .= "<p><strong>Email:</strong> " . $post['email'] . "</p>";
    $message .= "<p><strong>Password:</strong> " . $password . "</p>";
    $message .= "<p><a href='" . $login_url . "'>Click here to log in</a></p>";
    $email=$this->send_mail($message,$email,$subject_data,$email_from,NULL);
    

    $data['recent_blogs'] = $this->M_blog->list_recent_blogs(4);
    $this->load->view("Company/company_header");
    $this->load->view("Company/company_login");
    $this->load->view("Company/company_footer", @$data);
}
 // Example function to generate a random password
    private function generate_password($length = 8) {
        return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, $length);
    }
public function update_password($user_id, $hashed_password) {
        $this->db->where('email', $email);
        $this->db->update('company_details', ['password' => $hashed_password]);
    }
public function save_vendor_basic_details()
{
    $post = $this->input->post();
    $min = 10000;
    $max = 9999999;
    $randomNumber = rand($min, $max);
    $para = array
    ('emp_off_id'                => $randomNumber,
     'name'                      => $post["contact_first_name"],
     'l_name'                    => $post["contact_last_name"],
     'email'                     => $post["contact_email"],
     'contact'                   => $post["contact_person_contact_no"],
     'company_logo'              => 'https://msuite.work/uploads/company/shesha@montekservices.com/montek.png',
     'dept'                      =>  '25',
     'role'                      =>  '1009',
     'emp_role'                  =>  '1009',
     'project_id'                =>   0,
     'added_by_user_admin_id'    => 1,
     'created'                   => date("Y-m-d H:i:s"),
     'updated'                   => date("Y-m-d H:i:s"),
     'online_status'             => 0,
     'group_id'                  => 0,
     'added_by'                  => 1,
     'download_count'            => 0,
     'download_date'             => date("Y-m-d H:i:s"),
     'attempts'                  => 0,
     'target'                    => 0
     );
    $vendor_user_id = $this->m_admin_user->insert_vendor_user_data($para);
    
    $data =array
     (  
        'vendor_user_id'                  =>     $vendor_user_id,
        'follow_joining_process'          =>     $post['follow_joining_proce'],
        'vendor_name'                     =>     $post["contact_first_name"],
        'vendor_l_name'                   =>     $post["contact_last_name"],
        'contact_person_cell_no'          =>     $post["contact_person_cell_no"],
        'contact_person_contact_no'       =>     $post["contact_person_contact_no"],
        'contact_email'                   =>     $post["contact_email"],
        'created'                         =>     date("Y-m-d H:i:s")
     );
     $result =  $this->m_admin_user->insert_vendor_entry($data);
     if($result)
	{
		$Response = array('vendor_id' => $vendor_user_id);
        echo json_encode($Response);
	}
}

public function send_mail($message, $email, $subject_data, $email_from, $cc_mail) 
{
    $this->load->database();
    
        $query = $this->db->get_where('smtp_user_password', ['id' => 2]);
        $smtp_credentials = $query->row();
    // print_r($smtp_credentials); die();
        if (!$smtp_credentials) {
            throw new Exception("SMTP credentials not found in the database for ID: 2");
        }
   $config = array(
    'protocol' => 'smtp',
    'smtp_host' => 'smtp.gmail.com',
    'smtp_port' => 587,
    $config["smtp_user"] = $smtp_credentials->smtp_user;
    $config["smtp_pass"] = $smtp_credentials->smtp_pass;
    // 'smtp_user' => 'montekservicesm@gmail.com', // Your email address
    // 'smtp_pass' => 'Montek@951', // Your email password or App password
    'mailtype' => 'html',
    'charset' => 'iso-8859-1',
    'wordwrap' => TRUE,
    'newline' => "\r\n"
);

    // Load the email library and initialize the configuration
    $this->load->library('email');
    $this->email->initialize($config);

   

    // Configure the email parameters
    $this->email->from($email_from);
    $this->email->to($email);
  //  $this->email->cc($cc_mail);
    $this->email->subject($subject_data);
    $this->email->message($message);	

    // Send the email and return the result
    return $this->email->send();
}




}

?>