<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');


class Registration extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Registration_model');
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
	
	public function camera_recording()
	{
	    $this->load->view("camera_recording");
	}
public function upload() 
{
    // Check if the request method is POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        // Check if the 'video' file was uploaded without errors
        if (isset($_FILES['video']) && $_FILES['video']['error'] === UPLOAD_ERR_OK) {
            
            // Directory where uploads will be stored
            $uploadDir = 'uploads/recording_video_candidate/';

            // Ensure the upload directory exists; create if not
            if (!file_exists($uploadDir)) {
                if (!mkdir($uploadDir, 0777, true)) {
                    // Handle directory creation failure
                    echo json_encode(['status' => 'error', 'message' => 'Failed to create upload directory.']);
                    return;
                }
            }

            // Handle previous recording deletion
            if (!empty($_POST['previous_recording'])) {
                $previousRecording = $_POST['previous_recording'];
                $previousRecordingPath = FCPATH . $previousRecording;

                if (file_exists($previousRecordingPath)) {
                    unlink($previousRecordingPath);
                }
            }

            // Generate a unique filename for the new video
            $newFileName = uniqid('recording_', true) . '.webm';
            $uploadFile = $uploadDir . $newFileName;

            if (move_uploaded_file($_FILES['video']['tmp_name'], $uploadFile)) {
                // File uploaded successfully
                $video_path = base_url($uploadFile);
                echo json_encode(['status' => 'success', 'message' => 'File uploaded successfully.', 'file_path' => $video_path]);
            } else {
                // Failed to move uploaded file
                echo json_encode(['status' => 'error', 'message' => 'Failed to move uploaded file.']);
            }
        } else {
            // No file uploaded or upload error
            echo json_encode(['status' => 'error', 'message' => 'No file uploaded or upload error.']);
        }
    } else {
        // Invalid request method
        echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
    }
}
 
}
