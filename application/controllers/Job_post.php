<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Job_post extends CI_Controller {

	public function __construct()
    {
       	if( ! ini_get('date.timezone') )
		{
		   date_default_timezone_set('GMT');
		} 
        parent::__construct();
        		$this->load->model('permission/M_permission');
                $this->load->model('modelbasic');
                $this->load->model('m_admin');
            	$this->load->model('user/m_admin_user');
            	$this->load->model('login/User_model');
            	$this->load->library('form_validation');
                $this->load->helper('url');
    }
    	public function login()
{
    $this->load->library('form_validation');

    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('passwords', 'Password', 'required');

    if ($this->form_validation->run() == FALSE) {
        $this->load->view('job_post/recruiter_registration');
    } else {
        $email = $this->input->post('email');
        $password = $this->input->post('passwords');

        $this->load->model('m_admin_user');

        $user = $this->m_admin_user->getUserByEmail($email);

        if ($user) {
            if (isset($user['password']) && md5($password) === $user['password']) {
                $this->session->set_userdata('user_admin_id', $user['user_admin_id']);
                $this->session->set_flashdata('success', 'Login successful!');
                redirect('job_post/comp_dashboard', $user);
            } else {
                $this->session->set_flashdata('error', 'Invalid email or password.');
                redirect('job_post/recruiter_registration');
            }
        } else {
            $this->session->set_flashdata('error', 'Invalid email or password.');
            redirect('job_post/recruiter_registration');
        }
    }
}
public function send_reset_link()
    {
        
        $email = $this->input->post('email');

        $this->load->model('m_admin_user');

        if ($this->m_admin_user->email_exist($email)) {
            $user = $this->m_admin_user->getUserByEmails($email);

            $token = bin2hex(random_bytes(32));
            $this->m_admin_user->updateUser($user['user_admin_id'], ['reset_token' => $token]);

            $resetLink = base_url("job_post/reset_password_form?token=$token");

            $message = "
            <p>Hello, " . $user['name'] . "</p>
            <p>We received a request to reset your password. Click the link below to reset your password:</p>
            <p><a href='$resetLink'>$resetLink</a></p>
            <p>If you did not request a password reset, please ignore this email.</p>
            <p>Best regards,</p>
            <p>The Sharks Job Team</p>
        ";

            // $message = "Click on the link to reset your password: <a href='$resetLink'>$resetLink</a>";

        // Send the email using the custom function
        $subject = 'Password Reset Request';
        $this->send_password_mail($message, $user['email'], $subject);
        // print_r($this->send_password_mail); die();
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Email not found']);
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

    // Initialize the email library
    $this->email->initialize($config);

    
        // Set email details
        $this->email->from($smtp_credentials->smtp_user, $from);
        $this->email->to($email_id);
        $this->email->subject($subject);
        $this->email->message($message);
    
        // Send email and return result
        $result = $this->email->send();
        $this->email->clear();
    
        return $result;
    }
    
    public function reset_password_form()
    {
        $token = $this->input->get('token');
        $data['siderbar_menus'] = $this->M_permission->list_labels('internal user');
        $this->load->view("recruiter/company_header");
        $this->load->view("recruiter/reset_password", ['token' => $token]);
        $this->load->view("recruiter/company_footer",$data);
    }

    public function reset_password()
{
    $token = $this->input->post('token');
    $password = $this->input->post('password');
    $repassword = $this->input->post('repassword');

    if ($password !== $repassword) {
        $this->session->set_flashdata('error', 'Passwords do not match');
        return redirect('job_post/reset_password_form');
    }

    $this->load->model('m_admin_user');

    $user = $this->m_admin_user->getUserByToken($token);
    
    if ($user) {
        $this->m_admin_user->updatePassword($user['user_admin_id'], $password);

        $this->session->set_flashdata('success', 'Password has been reset');
        return redirect('recruitment');
    } else {
        $this->session->set_flashdata('error', 'Invalid token');
        return redirect('job_post/reset_password_form');
    }
}
    public function index($user_admin_id = null)
    { 
        if ($user_admin_id) {
        $data['user_admin_id'] = $user_admin_id;
    } else {
        $data['user_admin_id'] = $this->session->userdata('user_admin_id');
    }
       $data['companyId'] = $this->session->userdata('company');
       $data['siderbar_menus']   = $this->M_permission->list_labels('internal user');
       $data["education_list"]   =  $this->modelbasic->get_all_courses();
       $data['list_cities']      =  $this->modelbasic->get_indian_state_cities();
       $data["country_list"]     = $this->modelbasic->get_country_list();
       $data["department_list"]     = $this->modelbasic->get_department_list();

       $this->load->view("recruiter/company_header");
       $this->load->view("recruiter/free_job_post_index.php",$data);
       $this->load->view("recruiter/company_footer",$data);
    }
//     public function edit_index($job_id = null)
// {
//     if ($job_id) {
//         echo "Job ID: " . $job_id; // Debugging: check if job_id is passed correctly
//         $data['job_id'] = $job_id;
//     } else {
//         $data['job_id'] = $this->session->userdata('job_id');
//         echo "Session Job ID: " . $data['job_id'];
//     }
//     die(); // Stop execution to verify job_id
// }
    public function edit_index($job_id = null)
    { 
        $data['job_id'] = $this->session->userdata('job_id');

       $data['job_data'] = $this->modelbasic->get_job_data($job_id);
    //    print_r($data['job_data']); die();
       $data['user_admin_id'] = $this->session->userdata('user_admin_id');       
       $data['companyId'] = $this->session->userdata('company');
       $data['siderbar_menus']   = $this->M_permission->list_labels('internal user');
       $data["education_list"]   =  $this->modelbasic->get_all_courses();
       $data['list_cities']      =  $this->modelbasic->get_indian_state_cities();
       $data["country_list"]     = $this->modelbasic->get_country_list();
       $data["department_list"]     = $this->modelbasic->get_department_list();

       $this->load->view("recruiter/company_header");
       $this->load->view("recruiter/edit_free_job_post_index.php",$data);
       $this->load->view("recruiter/company_footer",$data);
    }
    public function recruiter_login()
{
    $data['siderbar_menus'] = $this->M_permission->list_labels('internal user');
    $this->load->view("recruiter/company_header");
    $this->load->view("recruiter/recruiter_login", $data);
    $this->load->view('recruiter/company_footer', $data);
}
public function comp_dashboard() {
    $user = $this->session->userdata('user_admin_id');
    $data['companyDataList'] = $this->modelbasic->get_all_jobs_by_company($user);
    $data['jobCount'] = count($data['companyDataList']);
    $data['profile'] = $this->m_admin_user->getUserProfileById($user);
    $data['siderbar_menus'] = $this->M_permission->list_labels('internal user');
    
    $this->load->view("recruiter/company_header", $data);
    $this->load->view("recruiter/comp_dashboard", $data);
    $this->load->view('recruiter/company_footer', $data);
}
public function search_jobs_in_application()
{
    $query = $this->input->get('query');

    $this->load->model('M_admin_user');

    $search_results = $this->m_admin_user->search_job_applications($query);
    $data['job_search'] = $search_results;
        $data['siderbar_menus'] = $this->M_permission->list_labels('internal user');
    $this->load->view("recruiter/company_header");
    $this->load->view("recruiter/comp_dashboard", $data);
    $this->load->view('recruiter/company_footer');
}
public function view_profile()
{
    $user = $this->session->userdata('user_admin_id');
    // $companyId = $this->session->userdata('company');
    $data['profile'] = $this->m_admin_user->getUserProfileById($user);
    $data['siderbar_menus'] = $this->M_permission->list_labels('internal user');
    $this->load->view("recruiter/company_header", $data);
    $this->load->view("recruiter/view_company_profile", $data);
    $this->load->view('recruiter/company_footer', $data);
}

public function view_applications($job_id)
{
    $user = $this->session->userdata('user_admin_id');
    $data["job_application"] = $this->m_admin_user->get_candidate_job_application_with_employment_details($job_id);
    $job_data = $this->m_admin_user->application_count($job_id);
//     echo $this->db->last_query();
// die();
// print_r($data["job_application"]); die();
    $data['siderbar_menus'] = $this->M_permission->list_labels('internal user');

    if ($job_data) {
        $data['job'] = $job_data;
        $this->load->view("recruiter/company_header");
        $this->load->view("recruiter/view_applications", $data);
        $this->load->view('recruiter/company_footer', $data);
    }
}
public function update() {
    $post = $this->input->post();
    // print_r($_FILES); die();
    $user = $this->session->userdata('user_admin_id');
    $profileData = [
        'email' => $this->input->post('email'),
        'company_name' => $this->input->post('company_name'),
        'contact' => $this->input->post('contact'),
        'company_address' => $this->input->post('company_address'),
        'company_address' => $this->input->post('company_address'),
        'company_about' => $this->input->post('description'),
        'company_website' => $this->input->post('company_website'),
    ];
    
        if (!empty($_FILES['video_introducation']['name'])) {
        $config['upload_path'] = './uploads/video_introducation/';
        $config['allowed_types'] = 'mp4|avi|wmv|flv|mov|mkv';
        $config['max_size'] = 5000; // Max size 2MB

        $this->upload->initialize($config);

        if ($this->upload->do_upload('video_introducation')) {
            $vdoData = $_FILES['video_introducation']['name'];
            $profileData['video_introducation'] = $vdoData; // Save the logo path
        } else {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', "video Upload Failed: " . $error);
        }
    }
    if (!empty($_FILES['logo']['name'])) {
        $config_logo['upload_path'] = './uploads/company_logos/';
        $config_logo['allowed_types'] = 'jpg|jpeg|png|gif';
        $config_logo['max_size'] = 5000; // Max size 2MB

        $this->upload->initialize($config_logo);

        if ($this->upload->do_upload('logo')) {
            $logoData = $this->upload->data();
            $profileData['company_logo'] = $logoData['file_name'];
        } else {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', "Logo Upload Failed: " . $error);
        }
    }
// print_r($vdoData); die();

    $this->m_admin_user->update_companydata($user, $profileData);

    redirect('job_post/view_profile');
}
public function search_candidate_in_application()
{
    $query = $this->input->get('query');

    $this->load->model('M_admin_user');

    $search_results = $this->m_admin_user->search_applications($query);
    $data['job_application'] = $search_results;
        $data['siderbar_menus'] = $this->M_permission->list_labels('internal user');
    $this->load->view("recruiter/company_header");
    $this->load->view("recruiter/view_applications", $data);
    $this->load->view('recruiter/company_footer');
}

public function verification()
{
    $data['siderbar_menus'] = $this->M_permission->list_labels('internal user');
    $this->load->view("recruiter/company_header");
    $this->load->view("recruiter/verification", $data);
    $this->load->view('recruiter/company_footer');
}
public function save_short_registration() {
    $data = array(
        'company_name' => $this->input->post('company_name'),
        'email'        => $this->input->post('email_id'),
        'username'     => $this->input->post('email_id'),
        'password' => md5($this->input->post('passwords')),
        'pass' => $this->input->post('passwords'),
        'role'         => '1032',
        'status'         => '1',
    );

    $entered_otp = $this->input->post('otp');
    
    $session_otp = $this->session->userdata('otp');
    $session_email = $this->session->userdata('otp_email');

    if ($entered_otp == $session_otp && $session_email == $data['email']) {
        $inserted = $this->m_admin_user->save_registration_data($data);

        if ($inserted) {
            $companyId = $this->db->insert_id();
            $this->session->set_userdata('company', $companyId);

            $message = 'Thank you for registering. Your account is now active.';
            $subject = 'Registration Successful';

            $this->send_confirmation_mail($message, $data['email'], $subject);

            $this->session->set_flashdata('success', 'Registration successful.');
            redirect('job_post/index');
        } else {
            $this->session->set_flashdata('error', 'Registration failed.');
            redirect('job_post/recruiter_registration');
        }
    } else {
        $this->session->set_flashdata('error', 'Invalid OTP.');
        redirect('job_post/recruiter_registration');
    }
}
public function send_otp() 
{
    $email_id = $this->input->post('email_id');
    // print_r($email_id); die();
    $company_name = $this->input->post('company_name');
    
    $this->load->model('M_admin_user');

// Email already exists
    // if ($this->m_admin_user->email_exists($email_id)) {
    // echo json_encode(['success' => false, 'message' => 'Email already exists in the database. Please use a different email.']);
    // } elseif ($this->m_admin_user->company_exists($company_name)) {
    //     echo json_encode(['success' => false, 'message' => 'Company name already exists in the database. Please use a different company name.']);
    // } else {
        $otp = rand(100000, 999999);

        $this->session->set_userdata('otp', $otp);
        $this->session->set_userdata('otp_email', $email_id);

        $message = '<div style="display: flex; justify-content: center; align-items: center; height: 300px;">
               <div style="width: 400px; padding: 20px; border: 1px solid #e0e0e0; border-radius: 10px; 
                           background-color: #f9f9f9; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); text-align: center;">
                   <h3 style="margin-bottom: 20px; color: #333;">Verification Code</h3>
                   <p style="color: #555; font-size: 14px;">Please use the verification code below to sign in:</p>
                   <p style="font-size: 20px; font-weight: bold; margin: 20px 0; color: #333;">' . $otp . '</p>
                   <p style="color: #555; font-size: 14px;">If you didn’t request this, you can ignore this email.</p>
                   <p style="color: #555; font-size: 14px; margin-top: 20px;">Thanks,<br>Sharks Job Team</p>
               </div>
           </div>';

        $subject = 'Your OTP Code';

        $this->send_confirmation_mail($message, $email_id, $subject);

        echo json_encode(['success' => true, 'message' => 'OTP sent successfully']);
    // }
}

public function send_otp_to_mobile()
{
    $mobile = $this->input->post("mobile");
    if ($mobile != NULL) {
        $otp = rand(100000, 999999);
        // $otp = random_string("numeric", 6);
        $sms_url = "https://api.msg91.com/api/v5/otp?template_id=6229cf167567d70749562aae&mobile=91" .
                   $mobile . "&authkey=374123A5ieHib0FG6226eca8P1&otp=" . $otp;
        // $sms_url = "https://api.msg91.com/api/v5/otp?template_id=675be001d6fc052b1f197193&mobile=91" .
        //            $mobile . "&authkey=436435ACDDoalS69675bdc7dP1&otp=" . $otp;
        $response = $this->send_sms($sms_url);
        
        $response_data = json_decode($response, true);
        // print_r($response_data); die();
        if (isset($response_data['type']) && $response_data['type'] === "success") {
            $this->session->set_userdata('verify_login_otp', $otp);  // Store OTP correctly
            $this->session->set_userdata('mobile', $mobile);

            echo json_encode(['success' => true, 'message' => 'OTP sent successfully.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to send OTP. Please try again.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Mobile number is required.']);
    }
}

public function send_sms($sms_url)
{
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => $sms_url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 100,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => ["Content-Type: application/json"],
    ]);
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}
    public function send_confirmation_mail($message, $email_id, $subject)
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

        // Initialize the email library
        $this->email->initialize($config);


        $this->email->from("$smtp_credentials->smtp_user", $from);
        $this->email->to($email_id);
        $this->email->subject($subject);
        $this->email->message($message);
        /*$this->email->send();
         echo $this->email->print_debugger(); die();*/
        $result = $this->email->send();
        $this->email->clear();
        return $result;
    }
    public function verify_email()
{
    $email = $this->input->get('email');

    $this->load->model('m_admin_user');
    $user = $this->m_admin_user->get_user_by_email($email);

    if ($user) {
        $update_data = array(
            'status' => '1'
        );
    
        $updated = $this->m_admin_user->update_user_status($user->user_admin_id, $update_data);
        if ($updated) {
            $this->session->set_flashdata('success', 'Your email has been successfully verified. You can now post a job.');
            $data['redirect_url'] = base_url('job_post/index');
            $this->load->view('recruiter/redirecting_page', $data);
        }
        else {
            $this->session->set_flashdata('error', 'Failed to verify your email. Please try again.');
            redirect('job_post/recruiter_login');
        }
    } else {
        $this->session->set_flashdata('error', 'Invalid verification link or email not found.');
        redirect('job_post/recruiter_login');
    }
}

    public function company_short_registration()
    {  
    $data['siderbar_menus'] = $this->M_permission->list_labels('internal user');
    $data["job_post_list"] = $this->modelbasic->get_list_job_post();
    $this->load->view("recruiter/company_header");
    $this->load->view("recruiter/company_short_registration", $data);
    $this->load->view("recruiter/company_footer", $data);
    }
public function company_login()
    {  
    $data['siderbar_menus'] = $this->M_permission->list_labels('internal user');
    $data["job_post_list"] = $this->modelbasic->get_list_job_post();
    $this->load->view("recruiter/company_header");
    $this->load->view("recruiter/company_login", $data);
    $this->load->view("recruiter/company_footer", $data);
    }
    
    public function paid_posting()
    {  
    $data['siderbar_menus'] = $this->M_permission->list_labels('internal user');
    $data["job_post_list"] = $this->modelbasic->get_list_job_post();
    $this->load->view("recruiter/company_header");
    $this->load->view("recruiter/paid_posting", $data);
    $this->load->view("recruiter/company_footer", $data);
    }
    
public function company_registration()
{
    $companyId = $this->input->post('company'); 
    $user_admin_id = $this->input->post('user_admin_id');
    // print_r($user_admin_id); die();

    if (empty($companyId)) {
        $companyId = $user_admin_id;
    }
    $this->load->model('modelbasic');
    $jobCount = $this->modelbasic->get_job_count_by_company($companyId);
    
    // print_r($jobCount); die();
    if ($jobCount == 0) {
        // Set up job data only once for first-time entry
        $jobData = $this->prepareJobData($companyId);
        $data['companyData'] = json_encode($jobData, JSON_PRETTY_PRINT);
        $data['siderbar_menus'] = $this->M_permission->list_labels('internal user');
        $data["job_post_list"] = $this->modelbasic->get_list_job_post();
        $data['company_data'] = $this->m_admin_user->get_company_data($companyId);
        
        $this->load->view("recruiter/company_header");
        $this->load->view("recruiter/company_registration", $data);
        $this->load->view("recruiter/company_footer", $data);
        
        // Save the initial job data only once
        // $this->modelbasic->save_company_data($companyId, $jobData);
        return;
    }

    if ($this->input->post()) {
        $this->load->library('upload');
        $config['upload_path'] = './uploads/video_introducation/'; 
        $config['allowed_types'] = 'mp4|avi|wmv|flv|mov|mkv';
        $config['max_size'] = 2048;
        $this->upload->initialize($config);

        $file_name = null;
        if ($this->upload->do_upload('compavideo')) {
            $uploadData = $this->upload->data();
            $file_name = $uploadData['file_name'];
        }

        $jobData = $this->prepareJobData($companyId);
        
        if ($jobCount >= 5) {
            $this->session->set_flashdata('error_message', 'You have reached the maximum limit of job posts. Please proceed to paid posting.');
            redirect('job_post/paid_posting');
        } else {
            $this->modelbasic->save_company_data($companyId, $jobData);
            $this->session->set_flashdata('success', 'Job posted successfully.');
            redirect('job_post/comp_dashboard');
        }
    }
}
public function edit_company_registration()
{
    $companyId = $this->input->post('company'); 
    $user_admin_id = $this->input->post('user_admin_id');
    $job_id = $this->input->post('job_id'); 

    if (empty($companyId)) {
        $companyId = $user_admin_id;
    }
    $jobData = $this->prepareJobDataEdit($companyId);

    if ($this->input->post()) {
        $this->load->library('upload');
        $config['upload_path'] = './uploads/video_introducation/'; 
        $config['allowed_types'] = 'mp4|avi|wmv|flv|mov|mkv';
        $config['max_size'] = 2048;
        $this->upload->initialize($config);

        $file_name = null;
        if ($this->upload->do_upload('compavideo')) {
            $uploadData = $this->upload->data();
            $file_name = $uploadData['file_name'];
        }

        $jobData = $this->prepareJobDataEdit($companyId, $file_name);

        // Update the database with job_id
        $this->db->where('job_id', $job_id);
        $this->db->update('tbl_candidate_job_post', $jobData);

        redirect('job_post/comp_dashboard');
    }
}


// Helper function to generate job data
private function prepareJobData($companyId, $file_name = null)
{
    $selectedPlatforms = $this->input->post('social_media');
    $social_media_string = is_array($selectedPlatforms) ? implode(',', $selectedPlatforms) : '';
    $education = $this->input->post("education");
    // print_r($education); exit;
    $education_string = implode(',', $this->input->post("education")); // Ensure it's an array

// print_r($education_string); exit;
    return array(
            'added_by'                      => $companyId,
            "profile"                       => $this->input->post('profile'),
            "key_skills"                    => $this->input->post("key_skills"),
            "min_exp_candidate"             => $this->input->post("min_exp_candidate"),
            "max_exp_candidate"             => $this->input->post("max_exp_candidate"),
            "comany_min_package_offer"      => $this->input->post("min_salary"),
            "comany_max_package_offer"      => $this->input->post("max_salary"),
            "country_id"                    => $this->input->post("job_country"),
            "state_id"                      => $this->input->post("job_state"),
            "job_location"                  => $this->input->post("job_location"),
            "job_pincode"                   => $this->input->post("job_pin"),
            "shift_type"                    => $this->input->post("shift_type"),
            "job_descriptions"              => $this->input->post("job_descriptions"),
            "industry_type"                 => $this->input->post("industry_type"),
            "department"                    => $this->input->post("department"),
            "job_opening_address"           => $this->input->post("job_opening_address"),
            "job_opening_area_pincode"      => $this->input->post("job_opening_area_pincode"),
            "job_type"                      => $this->input->post("job_type"),
            "no_of_vacancies"               => $this->input->post("no_of_vacancies"),
            "work_mode"                     => $this->input->post("work_mode"),
            "mode"                          => $this->input->post("mode"),
            "education"                     => $education_string,
            // "education"                     => $this->input->post("education"),
            "new_company_name"              => $this->input->post("new_company_name"),
            "company_telephone"             => $this->input->post("company_telephone"),
            "company_email"                 => $this->input->post("company_email"),
            "company_about"                 => $this->input->post("company_about"),
            "created_at"                    => date("Y-m-d H:i:s"), 
            "social_media"                  => $social_media_string
        );
}
private function prepareJobDataEdit($companyId, $file_name = null)
{
    $selectedPlatforms = $this->input->post('social_media');
    $social_media_string = is_array($selectedPlatforms) ? implode(',', $selectedPlatforms) : '';

    return array(
        'added_by'                      => $companyId,
        "profile"                       => $this->input->post('profile'),
        "key_skills"                    => $this->input->post("key_skills"),
        "min_exp_candidate"             => $this->input->post("min_exp_candidate"),
        "max_exp_candidate"             => $this->input->post("max_exp_candidate"),
        "comany_min_package_offer"      => $this->input->post("min_salary"),
        "comany_max_package_offer"      => $this->input->post("max_salary"),
        "country_id"                    => $this->input->post("job_country"),
        "state_id"                      => $this->input->post("job_state"),
        "job_location"                  => $this->input->post("job_location"),
        "job_pincode"                   => $this->input->post("job_pin"),
        "shift_type"                    => $this->input->post("shift_type"),
        "job_descriptions"              => $this->input->post("job_descriptions"),
        "industry_type"                 => $this->input->post("industry_type"),
        "department"                    => $this->input->post("department"),
        "job_opening_address"           => $this->input->post("job_opening_address"),
        "job_opening_area_pincode"      => $this->input->post("job_opening_area_pincode"),
        "job_type"                      => $this->input->post("job_type"),
        "no_of_vacancies"               => $this->input->post("no_of_vacancies"),
        "work_mode"                     => $this->input->post("work_mode"),
        "mode"                          => $this->input->post("mode"),
        "education"                     => implode(',', $this->input->post("education")),
        "new_company_name"              => $this->input->post("new_company_name"),
        "company_telephone"             => $this->input->post("company_telephone"),
        "company_email"                 => $this->input->post("company_email"),
        "company_about"                 => $this->input->post("company_about"),
        "created_at"                    => date("Y-m-d H:i:s"), 
        "social_media"                  => $social_media_string
    );
}



public function saveRegistration() {
    $json_data = $this->input->post('job_data');
    $job_data_array = json_decode($json_data, true);
    $post = $this->input->post();
    $companyId = $this->session->userdata('company');
    
    $this->load->model('modelbasic');
    $this->load->library('upload');

    $config['upload_path'] = './uploads/video_introducation/';
    $config['allowed_types'] = 'mp4|avi|wmv|flv|mov|mkv';
    $config['max_size'] = 5000;

    $this->upload->initialize($config);
    $file_name = null;

    if (!empty($_FILES['compavideo']['name'])) {
        if ($this->upload->do_upload('compavideo')) {
            $uploadData = $this->upload->data();
            $file_name = $uploadData['file_name'];
        } else {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', "Video Upload Failed: " . $error);
        }
    }
    $config_logo['upload_path'] = './uploads/company_logos/';
    $config_logo['allowed_types'] = 'jpg|jpeg|png|gif';
    $config_logo['max_size'] = 5000;
    $this->upload->initialize($config_logo);
    $logo_file_name = null;

    if (!empty($_FILES['logo']['name'])) {
        if ($this->upload->do_upload('logo')) {
            $logoData = $this->upload->data();
            $logo_file_name = $logoData['file_name'];
        } else {
            // Handle upload errors
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', "Logo Upload Failed: " . $error);
        }
    }

    $companyData = array(
        'company_name' => $this->input->post('company_name'),
        'email' => $this->input->post('email'),
        'contact' => $this->input->post('phone'),
        'company_address' => $this->input->post('address'),
        'company_website' => $this->input->post('website'),
        'company_about' => $this->input->post('description'),
        'company_logo' => $logo_file_name,
        'video_introducation' => $file_name,
    );
    $this->m_admin_user->update_company_data($companyId, $companyData);
    
    $selectedPlatforms = $this->input->post('social_media');

    $social_media_string = is_array($selectedPlatforms) ? implode(',', $selectedPlatforms) : '';

       $jobData = array(
        'added_by'                      => $companyId,
        "profile"                       => $job_data_array['profile'],
        "key_skills"                    => $job_data_array['key_skills'],
        "min_exp_candidate"             => $job_data_array['min_exp_candidate'],
        "max_exp_candidate"             => $job_data_array['max_exp_candidate'],
        "comany_min_package_offer"      => $job_data_array['comany_min_package_offer'],
        "comany_max_package_offer"      => $job_data_array['comany_max_package_offer'],
        "country_id"                    => $job_data_array['country_id'],
        "state_id"                      => $job_data_array['state_id'],
        "job_location"                  => $job_data_array['job_location'],
        "job_pincode"                   => $job_data_array['job_pincode'],
        "shift_type"                    => $job_data_array['shift_type'],
        "job_descriptions"              => $job_data_array['job_descriptions'],
        "industry_type"                 => $job_data_array['industry_type'],
        "department"                    => $job_data_array['department'],
        "job_opening_address"           => $job_data_array['job_opening_address'],
        "job_opening_area_pincode"      => $job_data_array['job_opening_area_pincode'],
        "job_type"                      => $job_data_array['job_type'],
        "no_of_vacancies"               => $job_data_array['no_of_vacancies'],
        "work_mode"                     => $job_data_array['work_mode'],
        "mode"                          => $job_data_array['mode'],
        "education"                     => $job_data_array['education'],
        "new_company_name"              => $job_data_array['new_company_name'],
        "company_telephone"             => $job_data_array['company_telephone'],
        "company_email"                 => $job_data_array['company_email'],
        "company_about"                 => $job_data_array['company_about'],
        "created_at"                    => date("Y-m-d H:i:s"), 
        "social_media"                  => $social_media_string
    );
    // $res = $this->PostJobOnSocialSite($post['job_descriptions'], $post['profile'], $selectedPlatforms);
    
    $this->modelbasic->saveJobData($jobData);
    
    // if (!empty($social_media_string)) {
    //     $this->PostJobOnSocialSite($job_data_array['profile'], $job_data_array['job_descriptions'], $selectedPlatforms);
    // }
    $this->session->set_flashdata('success', 'Successfully posted job.');
    redirect('job_post/comp_dashboard');
}

    public function recruiter_registration()
{
    $data['siderbar_menus'] = $this->M_permission->list_labels('internal user');
    $this->load->view("recruiter/company_header");
    $this->load->view("recruiter/recruiter_login", $data);
    $this->load->view('recruiter/company_footer');
}
// public function PostJobOnSocialSite($profile, $job_description, $selectedPlatforms)
// {
//     // $this->load->library('HttpClient');
//     $client = new GuzzleClient();
    
//     $postContent = "Job Profile: " . $profile . "\n" .
//                   "Job Description: " . $job_description . "\n" .
//                   "Apply today!";
    
//     $data = [
//         "post" => $postContent,
//         "platforms" => $selectedPlatforms,
//         "mediaUrls" => ["https://sharksjob.com/frontend/images/logo.gif"],
//         'message' => 'Check out this job opportunity!',
//         'link' => 'https://sharksjob.com/Job_post',
//     ];
// print_r($data); die();
//     try {
//         $response = $client->post('https://app.ayrshare.com/api/post', [
//             'headers' => [
//                 'Authorization' => 'Bearer 3N42JE3-5PEMNMK-GT9ECFN-4BHZASX',
//                 'Content-Type' => 'application/json',
//             ],
//             'json' => $data,
//         ]);

//         $responseBody = json_decode($response->getBody(), true);

//         if (isset($responseBody['status']) && $responseBody['status'] == 'success') {
//             return $responseBody;
//         } else {
//             return ['error' => 'Failed to post on social media.'];
//         }

//     } catch (Exception $e) {
//         return ['error' => 'Exception: ' . $e->getMessage()];
//     }
// }    
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
}

?>