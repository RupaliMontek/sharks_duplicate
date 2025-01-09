<?php
class M_admin_user extends CI_Model
{
    public function email_exist($email) 
    {
        $this->db->where('email', $email);
        $query = $this->db->get('user_admin');

        return $query->num_rows() > 0;
    }
    public function company_exists($company_name) {
    $this->db->select('user_admin_id');
    $this->db->from('user_admin');
    $this->db->where('company_name', $company_name);
    $query = $this->db->get();
    return $query->num_rows() > 0;
}
public function getGoogleClientCredentials()
    {
        $query = $this->db->get_where('api_credentials', ['service' => 'google']);
        return $query->row_array(); // Returns client_id and client_secret from the database
    } 
public function saveUser($data)
{
    // Check if user exists by Google ID or email
    $this->db->where('google_id', $data['google_id']);
    $this->db->or_where('email', $data['email']);
    $query = $this->db->get('user_admin');

    if ($query->num_rows() > 0) {
        $user = $query->row_array();

        if ($user['role'] == 1024) {
            $this->loginUser($user);

            return 'Logged in successfully!';
        } else {
            return 'Access denied. User does not have the required role.';
        }
    } else {
        $data['emp_off_id'] = $this->generateUniqueEmpOffId();

        $data['role'] = 1024;

        $this->db->insert('user_admin', $data);

        return 'User successfully registered!';
    }
}
public function create_or_update_user($data)
    {
        // Check if user already exists
        $this->db->where('linkedin_id', $data['linkedin_id']);
        $query = $this->db->get('user_admin');

        if ($query->num_rows() > 0) {
            // Update user details if they exist
            $this->db->where('linkedin_id', $data['linkedin_id']);
            $this->db->update('user_admin', $data);
        } else {
            // Create a new user
            $this->db->insert('user_admin', $data);
        }

        // Return the user record
        return $this->db->get_where('user_admin', ['linkedin_id' => $data['linkedin_id']])->row_array();
    }
// Helper function to log in the user
private function loginUser($user)
{
    // Set session data for the logged-in user
    $this->session->set_userdata('candidate_id', $user['user_admin_id']);
    $this->session->set_userdata('candidate_user_name', $user['name']);
    $this->session->set_userdata('candidate_user_email', $user['email']);

    // Update last login timestamp
    $data = array("last_login" => date("Y-m-d h:i:s"));
    $this->db->where('user_admin_id', $user['user_admin_id']);
    $this->db->update('user_admin', $data);

    // Redirect to the candidate profile page
    redirect('candidate_profile');
}

	private function generateUniqueEmpOffId()
{
    do {
        $emp_off_id = mt_rand(100000, 999999);

        $this->db->where('emp_off_id', $emp_off_id);
        $query = $this->db->get('user_admin');
    } while ($query->num_rows() > 0);

    return $emp_off_id;
}
public function get_profile_data($user_id) {
    $this->db->where('user_admin_id', $user_id);
    $query = $this->db->get('user_admin');

    if ($query->num_rows() > 0) {
        return $query->row_array();
    } else {
        return [];
    }
}

    public function getUserByEmails($email)
    {
        $query = $this->db->where('email', $email)->get('user_admin'); // Assuming 'users' table
        return $query->row_array(); // Return user data as array
    }

    public function updateUser($id, $data)
    {
        $this->db->where('user_admin_id', $id);
        return $this->db->update('user_admin', $data);
    }
     public function getUserByToken($token)
    {
        $query = $this->db->where('reset_token', $token)->get('user_admin');
        return $query->row_array();
    }

    public function updatePassword($id, $password)
    {
        $data = [
            'password' => md5($password),
            'pass' =>$password,
            'reset_token' => null
        ];

        $this->db->where('user_admin_id', $id);
        return $this->db->update('user_admin', $data);
    }
public function get_candidate_job_application_with_employment_details($job_id) {
    $this->db->select('
        t1.id AS application_id, 
        t1.job_id, 
        t1.candidate_id, 
        t1.created_at AS application_date, 
        t2.emp_employment, 
        t2.emp_employment_type, 
        t2.emp_current_company_name, 
        t2.emp_perv_company_name, 
        t2.emp_current_desigantion, 
        t2.emp_perv_designation, 
        t2.emp_location, 
        t2.intern_candidate_department, 
        t2.intern_roles_category, 
        t2.intern_roles, 
        t2.emp_joining_year, 
        t2.emp_work_till_year, 
        t2.emp_joining_month, 
        t2.emp_work_till_month, 
        t2.emp_current_salary, 
        t2.emp_current_salary_currency, 
        t2.intern_candidate_currency, 
        t2.intern_candidate_stipend, 
        t2.emp_skill_used, 
        t2.emp_job_profile, 
        t2.intern_project_description, 
        t2.intern_project_link, 
        t2.emp_notice_period, 
        t2.total_exp_year, 
        t2.total_exp_month, 
        t2.created_at AS employment_created_at,
        t3.name,
        t3. l_name,
        t3.email, 
        t3.contact,
        t3.resume, 
        GROUP_CONCAT(DISTINCT t4.software_name) AS skills,
        GROUP_CONCAT(DISTINCT t5.education) AS education
    ');
    
    $this->db->from('tbl_candidate_job_apply t1');
    $this->db->join('tbl_employment_candidate t2', 't1.candidate_id = t2.candidate_id', 'inner');
    $this->db->join('user_admin t3', 't1.candidate_id = t3.user_admin_id', 'inner');
    
    // Join tbl_candidate_skills
    $this->db->join('tbl_candidate_skills t4', 't1.candidate_id = t4.candidate_id', 'left'); // Use left join to include candidates without skills
    // Join candidate_education
    $this->db->join('candidate_education t5', 't1.candidate_id = t5.candidate_id', 'left'); // Use left join to include candidates without education
    
    $this->db->where('t1.job_id', $job_id);
    $this->db->group_by('t1.id'); // Group by application_id to avoid duplicate rows due to joins

    // Output the query for debugging
    $query = $this->db->get();
    // echo $this->db->last_query(); // Uncomment to debug the query being executed
    return $query->result_array();
}
public function application_count($job_id)
{
    $this->db->select('COUNT(*) as total_applications');
    $this->db->from('tbl_candidate_job_apply');
    $this->db->where('job_id', $job_id);
    $query = $this->db->get();
    $data['total_applications'] = $query->row()->total_applications;

    return $data;
}
public function is_user_admin_id_taken($user_admin_id) {
    $this->db->where('user_admin_id', $user_admin_id);
    $query = $this->db->get('user_admin'); // replace with actual table name
    return $query->num_rows() > 0; // returns true if taken
}
public function search_applications($query) {
    $this->db->like('name', $query);
    $this->db->or_like('email', $query);
    $this->db->or_like('contact', $query);
    $query_result = $this->db->get('user_admin'); // Change 'job_applications' to your table name

    return $query_result->result_array();
}
    public function save_registration_data($data) {
        // return 
        $this->db->insert('user_admin', $data);
         return $this->db->insert_id();
    }
    public function getUserProfileById($companyId)
    {
        $companyId = (int) $companyId;

        $this->db->from('user_admin'); 
        $this->db->where('user_admin_id', $companyId);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        }

        return null;
    }
    public function email_exists($email_id) 
    {
        $this->db->where('email', $email_id);
        $query = $this->db->get('user_admin');

        return $query->num_rows() > 0;
    }
    public function getUserByEmail($email)
    {
        $this->db->where('email', $email);
        $this->db->where('status', 1); 
        $query = $this->db->get('user_admin');

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function get_company_data($companyId)
	{
	    $this->db->select("*");
	    $this->db->from("user_admin");
	    $this->db->where("user_admin_id",$companyId);
	    return $this->db->get()->row();
	}
	public function get_user_by_email($email)
{
    $this->db->where('email', $email);
    $query = $this->db->get('user_admin'); // Assuming your user table is named 'user_admin'
    return $query->row(); // Return the user record
}

// Update user status
public function update_user_status($user_id, $data)
{
    $data['status'] = 1;
    $this->db->where('user_admin_id', $user_id);
    return $this->db->update('user_admin', $data); // Update the user status in the 'user_admin' table
}
    public function saveCompanyData($data) {
        $this->db->insert('user_admin', $data); 
        return $this->db->insert_id();
    }
    public function update_company_data($companyId, $data) {
        $this->db->where('user_admin_id', $companyId);
        return $this->db->update('user_admin', $data);
    }
    public function update_companydata($user, $profileData) {
        $this->db->where('user_admin_id', $user);
        return $this->db->update('user_admin', $profileData);
    }
	public function getRolesByDept($dept)
	{
		$this->db->select('*');
		$this->db->distinct();
		$this->db->where('dept_id',$dept);
		return  $this->db->get('emp_role')->result_array();
	}
	public function getall_holiday()
	{
		$this->db->select('*');
		$this->db->from('events');
		$this->db->order_by('id','DESC');
		return $this->db->get()->result_array();
	}
	
	 public function  insert_task_screenshot_by_task_id($para)
        {
               $this->db->insert('tbl_screenshots_task',$para);
                return	$result = $this->db->insert_id();
        }
	public function get_job_profile_by_id($id)
	{
	    $this->db->select("*");
	    $this->db->from("job_profile_master");
	    $this->db->where("id",$id);
	    return $this->db->get()->row();
	}
	public function get_email_ids_hr_and_manager($ids)
	{
	   $this->db->select("email");
	   $this->db->from("user_admin");
	   $this->db->where_in("user_admin_id",$ids);
	   return  $this->db->get()->result();
	}
	
	  public function off_boarding_request_list_hr($user_id)
    {
        $this->db->select("*");
        $this->db->from("off_boarding_process_request_employee");
        $this->db->join('user_admin', 'user_admin.user_admin_id = off_boarding_process_request_employee.user_id');
        $this->db->where("id_hr_mail_send",$user_id);
        return $this->db->get()->result();
        
    }
    
    public function update_off_boarding_process_request_id($off_boarding_process_request_id,$data)
        {
            $this->db->where('off_boarding_process_request_id',$off_boarding_process_request_id);
            return	$this->db->update('off_boarding_process_request_employee',$data);
        }
        
         public function view_details_employee_process_off_boarding_by_id($id)
    {
        $this->db->select("*");
        $this->db->from("off_boarding_process_request_employee");
        $this->db->where("off_boarding_process_request_id",$id);
        return $this->db->get()->row();
        
    }
    
	function get_access_list()
	{
	    $this->db->select('user.name as username, user.l_name as lastname, extra.*');
		$this->db->from('extra_download as extra');
		$this->db->join('user_admin as user', 'user.user_admin_id = extra.user_id');
		$this->db->where('extra.admin_approval', 0);
		return $this->db->get()->result();
	}
	
	public function get_all_user_list_active()
	{
	    $this->db->select("*");
	    $this->db->from("user_admin");
	    $this->db->where("status",1);
	    $this->db->where("name !=",'');
	    $this->db->where("name !=",'');
	    return $this->db->get()->result();
	}
	
	 public function off_boarding_request_list_manager($user_id)
    {
        $this->db->select("*");
        $this->db->from("off_boarding_process_request_employee");
        $this->db->join('user_admin', 'user_admin.user_admin_id = off_boarding_process_request_employee.user_id');
        $this->db->where("id_manager_mail_send",$user_id);
        return $this->db->get()->result();
    }
    
    public function list_users($user_dept)
    {
        $user_id =$_SESSION["user_id"];
        $this->db->select("*");
        $this->db->from("user_admin");
        $this->db->where("dept",$user_dept);
        $this->db->where("user_admin_id!=",$user_id);
        $this->db->where("status",1);
        return $this->db->get()->result();
    }
    
    
    public function view_details_user_admin($id)
 {
		$this->db->select('*');
		$this->db->where('user_admin_id',$id);
		$this->db->from('user_admin');
		//$this->db->join('department', 'user_admin.dept = department.dept_id');
	    return	 $s=$this->db->get()->row();
  }
  
   public function get_for_off_boarding_mail_send()
    {
        $this->db->select("*");
        $this->db->from("user_admin");
        $this->db->where("user_admin_id",505);
        return $this->db->get()->row();
    } 
    
    public function save_offboarding_form_by_user($para)
        {
                $this->db->insert('off_boarding_process_request_employee',$para);
                return	$result = $this->db->insert_id();
        }
    
    public function view_details_employee_process_off_boarding($user_id)
    {
        $this->db->select("*");
        $this->db->from("off_boarding_process_request_employee");
        $this->db->where("user_id",$user_id);
        return $this->db->get()->result();
        
    }
	
	public function get_contact_persons_sales_details($sales_id)
	{
	          $this->db->select("*");
	          $this->db->from("tbl_sales_details_contacts_persons");
	          $this->db->where("sales_id",$sales_id);
	          return   $this->db->get()->result();
	}

	public function getRolesByDept1()
	{
		$this->db->select('*');
// 		$this->db->distinct();
// 		$this->db->where('dept_id',$dept);
		return  $this->db->get('emp_role')->result_array();
	}
	public function list_user_selected_column($admin_id)
	{
		$this->db->select('user_admin.user_admin_id');
 	    ////$this->db->where('user_admin.added_by_user_admin_id',$admin_id);
		//$this->db->where('role !=',1);
		$this->db->where('user_admin.status=',1);
		$this->db->from('user_admin');
		$this->db->join('department', 'user_admin.dept = department.dept_id');
		$this->db->join('emp_role', 'user_admin.role = emp_role.role_id');
		$this->db->join('emp_details', 'user_admin.user_admin_id = emp_details.emp_id');
		$this->db->group_by('emp_off_id');
		$this->db->order_by('emp_off_id','ASC');
		return $this->db->get()->result();
	}


	public function list_user($admin_id=NULL)
	{

		$this->db->select('*');
		//$this->db->where('user_admin.added_by_user_admin_id',$admin_id);
		$this->db->where('role !=',1);
		$this->db->where('user_admin.status=',1);
		$this->db->from('user_admin');
		$this->db->join('department', 'user_admin.dept = department.dept_id');
		$this->db->join('emp_role', 'user_admin.role = emp_role.role_id');
		$this->db->join('emp_details', 'user_admin.user_admin_id = emp_details.emp_id');
		$this->db->order_by('emp_off_id','ASC');
		$this->db->group_by('user_admin.user_admin_id');
		return $this->db->get()->result();
	}
	
		public function list_vendor($admin_id=NULL)
	{

		$this->db->select('*');
		$this->db->where('role =1009');
		$this->db->where('user_admin.status=',1);
		$this->db->from('user_admin');
	
		$this->db->group_by('user_admin.user_admin_id');
		return $this->db->get()->result();
	}
	public function list_user_login($user_id)
	{

		$this->db->select('*');
		//$this->db->where('user_admin.added_by_user_admin_id',$admin_id);
		$this->db->where('role !=',1);
		$this->db->where('user_admin.status=',1);
		$this->db->from('user_admin');
		$this->db->join('department', 'user_admin.dept = department.dept_id');
		$this->db->join('emp_role', 'user_admin.role = emp_role.role_id');
		$this->db->join('emp_details', 'user_admin.user_admin_id = emp_details.emp_id');
		$this->db->where('user_admin_id',$user_id);
		$this->db->order_by('emp_off_id','ASC');
		return $this->db->get()->result();
	}

	public function hr_list_user($admin_id)
	{		
	    $this->db->select('*');
		$this->db->where('role !=',1);
		$this->db->from('user_admin');
		$this->db->join('emp_details', 'user_admin.user_admin_id = emp_details.emp_id');
		$this->db->where("status",1);
		$this->db->order_by('emp_off_id','ASC');
		return $s=$this->db->get()->result();
	}
	
	public function list_user_login_user($user_id)
	{		
	    $this->db->select('*');
		$this->db->from('user_admin');
		$this->db->join('emp_details', 'user_admin.user_admin_id = emp_details.emp_id');
		$this->db->where("status",1);
		$this->db->where("user_admin_id",$user_id);
		$this->db->order_by('emp_off_id','ASC');
		return $s=$this->db->get()->result();
	}

public function hr_list_user1($admin_id)
	{

		$this->db->select('*');
		//$this->db->where('user_admin.added_by_user_admin_id',$admin_id);
		$this->db->where('role !=',1);
		$this->db->where('status',1);
		$this->db->from('user_admin');
		
		$this->db->order_by('user_admin_id','DESC');
		return $this->db->get()->result();
	}
	
	public function get_name_by_user_id($user_id)
	{

		$this->db->select('name,l_name');
		$this->db->where('user_admin_id',$user_id);
		$this->db->from('user_admin');
		$res=$this->db->get()->row();
		return $res->name.' '.$res->l_name;
	}
	public function hr_list_user2($admin_id)
	{

		$this->db->select('*');
		////$this->db->where('user_admin.added_by_user_admin_id',$admin_id);
		$this->db->where('role !=',1);
		$this->db->where('role !=',1009);
		$this->db->from('user_admin');
		$this->db->order_by('emp_off_id','DESC');
		return $this->db->get()->result();
	}
	
	
	public function hr_list_user_ajax_status_filter($admin_id,$status)
	{
	    $this->db->select('*');
		////$this->db->where('user_admin.added_by_user_admin_id',$admin_id);
		$this->db->where('role !=',1);
		$this->db->where('role !=',1009);
		$this->db->where('status',$status);
		$this->db->from('user_admin');
		$this->db->order_by('emp_off_id','DESC');
		return $this->db->get()->result();
	}

  function check_demo_user_email_exists_add($email)
  {
    $result = $this->db->get_where('user_admin',array('email' => $email));
    if($result->num_rows() >0)
    {
      return "0";
    }
    else
    {
      return "1"; 
    }
  } 
	/*public function list_user_multiuser($admin_id)
	{
		$this->db->select('*');
		//$this->db->where('role !=',1);
		//$this->db->where('user_admin.added_by_user_admin_id',$admin_id);
		//$this->db->where('user_admin.status',1);
		$this->db->from('user_admin');
		$this->db->join('department', 'user_admin.dept = department.dept_id');
		$this->db->join('emp_role', 'user_admin.role = emp_role.role_id');
		$this->db->join('emp_details', 'user_admin.user_admin_id = emp_details.emp_id');
		$this->db->order_by('emp_off_id','ASC');
		return $this->db->get()->result();
	}*/

	public function emp_list_deptwise_user_multiuser($dept_id)
	{
		$this->db->select('*');
		/*$this->db->where('role !=',1);*/
		$this->db->where('user_admin.dept',$dept_id);
		$this->db->where('user_admin.status',1);
		$this->db->from('user_admin');
		$this->db->join('department', 'user_admin.dept = department.dept_id');
		$this->db->join('emp_role', 'user_admin.role = emp_role.role_id');
		$this->db->join('emp_details', 'user_admin.user_admin_id = emp_details.emp_id');
		$this->db->order_by('emp_off_id','ASC');
		return $this->db->get()->result();
	}

	public function active_list_user()
	{
		$this->db->select('*');
		$this->db->where('role !=',1);
		$this->db->where('role !=',5);
		$this->db->where('status=',1);
		$this->db->from('user_admin');
		$this->db->join('department', 'user_admin.dept = department.dept_id');
		$this->db->join('emp_role', 'user_admin.role = emp_role.role_id');
		$this->db->join('emp_details', 'user_admin.user_admin_id = emp_details.emp_id');
		$this->db->order_by('emp_off_id','ASC');
		return $this->db->get()->result();
	}

	public function insert($para)
	{
		$this->db->insert('user_admin',$para);
		return	$result = $this->db->insert_id();
	}

	public function insert_emp_details($para_details)
	{
		return $this->db->insert('emp_details',$para_details);
	}

	public function update_user($id,$data)
	{
				$this->db->where('user_admin_id',$id);
		return	$this->db->update('user_admin',$data);
	}

	public function update_user_emp_details($id,$datas)
	{
				$this->db->where('emp_id',$id);
		return	$this->db->update('emp_details',$datas);
	}

	public function details_user($id)
	{
				$this->db->select('*');
				$this->db->where('user_admin_id',$id);
		$this->db->from('user_admin');
		$this->db->join('department', 'user_admin.dept = department.dept_id');
		$this->db->join('emp_role', 'user_admin.role = emp_role.role_id');
		return $this->db->get()->row();
	}

	public function view_details_user($id)
	{
				$this->db->select('*');
				$this->db->where('user_admin_id',$id);
		$this->db->from('user_admin');
// 		$this->db->join('department', 'user_admin.dept = department.dept_id');
// 		$this->db->join('emp_role', 'user_admin.role = emp_role.role_id');
		$this->db->join('emp_details', 'user_admin.user_admin_id = emp_details.emp_id');
	return	 $s=$this->db->get()->row();
// 		print_r($s);
// 		exit;
	}
	
/*	public function view_details_user_admin($id)
	{
		$this->db->select('*');
		$this->db->where('user_admin_id',$id);
		$this->db->from('user_admin');
	    return	 $s=$this->db->get()->row();
	}*/

	public function view_details_user_check_details($id)
	{
				$this->db->select('*');
				$this->db->where('user_admin_id',$id);
		$this->db->from('user_admin');
// 		$this->db->join('department', 'user_admin.dept = department.dept_id');
// 		$this->db->join('emp_role', 'user_admin.role = emp_role.role_id');
		$this->db->join('emp_details', 'user_admin.user_admin_id = emp_details.emp_id');
	$result=$this->db->get()->row();
	// print_r($result);exit;
	 if($result)
    {
      return "1";
    }
    else
    {
      return "0"; 
    }
// 		print_r($s);
// 		exit;
	}
public function view_details_user_offer_letter($id)
	{
				$this->db->select('email');
				$this->db->where('user_admin_id',$id);
				$this->db->from('user_admin');
	$this->db->join('emp_details', 'user_admin.user_admin_id = emp_details.emp_id');
	return	 $this->db->get()->row();
// print_r($s);
// exit;
	}
	
	public function view_details_user_offer_letter_by_id($id)
	{
				$this->db->select('*');
				$this->db->where('user_admin_id',$id);
				$this->db->from('user_admin');

	return	 $this->db->get()->row();
// print_r($s);
// exit;
	}
	public function delete_user($id)
	{
	 			$this->db->where('user_admin_id',$id);
	 			$this->db->delete('user_admin');
	 			$this->db->where('emp_id',$id);
	 	return 	$this->db->delete('emp_details');
	}
	

        
        public function details_user_by_dept($id,$admin_id)
	{
				$this->db->where('dept',$id);
				$this->db->where('status',1);
				$this->db->where('added_by_user_admin_id',$admin_id);
		return	$this->db->get('user_admin')->result();
	}
        
        public function task_details_user_by_dept($id,$admin_id)
	{
				$this->db->where('dept',$id);
				$this->db->where('status',1);
		return	$this->db->get('user_admin')->result();
	}


  // code for event add 

	public function list_events()
	{
				$this->db->order_by('id','ASC');
		return	$this->db->get('events')->result();
	}
public function list_events1($admin_id)
	{
	            //$this->db->where('admin_id',$admin_id);
				$this->db->order_by('id','DESC');
				
		return	$this->db->get('events')->result();
	}

	public function insert_event($para)
	{
		return $this->db->insert('events',$para);
	}

	public function update_event($id,$data)
	{
				$this->db->where('id',$id);
		return	$this->db->update('events',$data);
	}

	public function update_new_leave($id,$data)
	{
				$this->db->where('id',$id);
		return	$this->db->update('leave_status',$data);
	}


	public function details_event($id)
	{
				$this->db->where('id',$id);
		return	$this->db->get('events')->row();
	}

	public function delete_event($id)
	{
	 				$this->db->where('id',$id);
	 	return		$this->db->delete('events');
	}

  // code  end for event 	

	// code for leave add 

	public function list_leave($admin_id=NULL)
	{
			// 	$this->db->order_by('id','DESC');
			// $this->db->get('leave_status')->result();
      //  $this->db->where('leave_status.admin_id',$admin_id);
        $this->db->order_by('leave_status.id','DESC');
		$this->db->select('*');
		$this->db->from('leave_status');
		$this->db->join('user_admin', 'user_admin.user_admin_id = leave_status.emp_id');
		return $this->db->get()->result();
	}

	public function list_leave_for_account($admin_id)
	{
		$this->db->where('leave_status',1);
		//$this->db->where('user_admin.added_by_user_admin_id',$admin_id);	
        $this->db->order_by('leave_status.id','DESC');
		$this->db->select('*');
		$this->db->from('leave_status');
		$this->db->join('user_admin', 'user_admin.user_admin_id = leave_status.emp_id');
		return $this->db->get()->result();
	}

	public function list_leave_by_user_check($user_id)
	{   
	

	$query = $this->db->query("SELECT a.*, b.* FROM leave_status a, user_admin b WHERE a.emp_id=b.user_admin_id AND a.leave_status!=1 AND a.emp_id=$user_id order by a.id desc ");
        return $query->result(); 


		/*$this->db->where('leave_status',0); 
        $this->db->where('emp_id',$user_id); 
		$this->db->from('leave_status');
		$this->db->join('user_admin', 'user_admin.user_admin_id = leave_status.emp_id');
				$this->db->order_by('id','DESC');
		return	$this->db->get('')->result();*/
	}

	public function list_leave_by_user($user_id)
	{           
		        $this->db->where('emp_id',$user_id); 
		$this->db->from('leave_status');
		$this->db->join('user_admin', 'user_admin.user_admin_id = leave_status.emp_id');
				$this->db->order_by('id','DESC');
		return	$this->db->get('')->result();
	}

	public function insert_leave($para)
	{
	    $this->db->insert('leave_status', $para);
    	return $result = $this->db->insert_id();
	
	}

	public function update_leave($id,$data)
	{
				$this->db->where('id',$id);
		return	$this->db->update('leave_status',$data);
	}

	public function details_leave($id)
	{
				$this->db->where('id',$id);
		return	$this->db->get('leave_status')->row();
	}

	public function delete_leave($id)
	{
	 				$this->db->where('id',$id);
	 	return		$this->db->delete('leave_status');
	}
        
        function _update_leave_status($table,$id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update($table, $data);
	}

  // code  end for leave 	

	//code for get hr details 
	function get_hr_details($admin_id)
	{
	      $this->db->limit(1);
	      $this->db->where('added_by_user_admin_id',$admin_id);
	      $this->db->where('role',10);
	     return $this->db->get('user_admin')->row();
	}

	function get_all_rols()
	{
	    
	     return $this->db->get('emp_role')->result();
	}




	function update_confirmation($data)
	{

     return $this->db->insert('confirmation_details',$data);

	}


	function get_emp_confirmation_details_by_id($emp_id)
	{

             $this->db->where('emp_id',$emp_id);
             $this->db->where('c_status!=',0);

     return  $this->db->get('confirmation_details')->row();

	}

	function get_emp_confirmation_details()
	{

		$query= $this->db->query("select a.name,b.joining_date,b.emp_id from user_admin a, emp_details b where a.user_admin_id=b.emp_id AND b.joining_date <= (now() - interval 6 month) AND b.joining_date!='0000-00-00'");
		$result = $query->result();
		return $result;

	}

	function get_notification_title($notification_title)
	{

          $query = $this->db->query("select notification_title from notification where notification_type='Confirmation' AND notification_for_role='HR' AND notification_title='$notification_title'");
		  $result= $query->result();
           return $result;

	}


	function get_emp_confirmation_extended_details()
	{
		$current_date=  date('Y-m-d');

		$query= $this->db->query("select * from confirmation_details where extended_date='$current_date'");
		$result = $query->result();
		return $result;

	}
   public function get_emp_by_role()
        {

          $query=$this->db->query("SELECT user_admin_id FROM `user_admin` WHERE role!=5");
          return $query->result();

        }
  public function insert_leave_notification($para)
        {

        return $this->db->insert('leave_notification',$para); 

        }
        
     public function view_leave_notification($user_id)
        {

        $this->db->where('to_emp_id',$user_id); 
        $this->db->set('status',1);
        return $this->db->update('leave_notification'); 


        }    
        
	function get_emp_birthday_details()
	{
		$query  =  $this->db->query('SELECT a.name, a.l_name, a.user_admin_id, b.dob FROM user_admin a, emp_details b WHERE DATE_FORMAT(dob, "%m%d") >= DATE_FORMAT(NOW(), "%m%d") AND DATE_FORMAT(dob, "%m%d") <= DATE_FORMAT(DATE_ADD(NOW(), INTERVAL 2 DAY), "%m%d") AND a.user_admin_id=b.emp_id  ORDER BY DATE_FORMAT(dob, "%m%d") ASC;');
		$result = $query->result();
		return $result;

    }


    function get_notification_birthday_title($notification_title)
	{

            $query = $this->db->query("select notification_title from notification where notification_type='Birthday' AND notification_for_role='All' AND notification_title='$notification_title'");
			$result= $query->result();
           return $result;

	}




	// code for add bank details 

	public function list_emp_bank_details($admin_id)
	{				
		$query = $this->db->query("SELECT eb.pf_no,eb.uan_no, eb.cr_date, eb.emp_b_id,eb.emp_id,eb.bank_name,eb.bank_address,eb.account_no,eb.ifsc_code,ud.name,ud.l_name FROM emp_bank_details eb , user_admin ud WHERE  eb.emp_id=ud.user_admin_id AND ud.status = 1 order by eb.emp_b_id DESC");
		return	$query->result();
	}

	public function insert_emp_bank_details($para)
	{
		return $this->db->insert('emp_bank_details',$para);
	}

	public function update_emp_bank_details($id,$data)
	{
				$this->db->where('emp_b_id',$id);
		return	$this->db->update('emp_bank_details',$data);
	}

	public function details_emp_bank_details($id)
	{
				$this->db->where('emp_b_id',$id);
		return	$this->db->get('emp_bank_details')->row();
	}

	public function delete_emp_bank_details($id)
	{
	 				$this->db->where('emp_b_id',$id);
	 	return		$this->db->delete('emp_bank_details');
	}

  // code  end for bank details


	// code for check salary slip generate 

	public function check_salary_slip($employee_id,$year,$month)
	{

       $this->db->where('employee_id',$employee_id);
       $this->db->where('year',$year);
       $this->db->where('month',$month);
      return $this->db->get('hr_salary_slip')->num_rows();


	}



	

	// code for office expenses details 

	public function list_office_expenses_details($admin_id)
	{
		    $this->db->where('admin_id',$admin_id);
		    $this->db->order_by('expenses_id','DESC');
	 return	$this->db->get('office_expenses')->result();		
			
	}

	public function insert_office_expenses_details($para)
	{
		return $this->db->insert('office_expenses',$para);
	}

	public function update_office_expenses_details($id,$data)
	{
				$this->db->where('expenses_id',$id);
		return	$this->db->update('office_expenses',$data);
	}

	public function details_office_expenses_details($id)
	{
				$this->db->where('expenses_id',$id);
		return	$this->db->get('office_expenses')->row();
	}

	public function details_office_expenses_details_by_id($id)
	{
				$this->db->where('expenses_id',$id);
		return	$this->db->get('office_expenses')->row();
	}

	public function delete_office_expenses_details($id)
	{
	 				$this->db->where('expenses_id',$id);
	 	return		$this->db->delete('office_expenses');
	}

  // code  end for office expenses details



	// code for client agreement details 

	public function list_client_agreement_details($admin_id)
	{
		    $this->db->where('admin_id',$admin_id);
		    $this->db->order_by('agreement_id','DESC');
	 return	$this->db->get('agreement_details')->result();		
			
	}

	public function insert_client_agreement_details($para)
	{
		return $this->db->insert('agreement_details',$para);
	}

	public function update_client_agreement_details($id,$data)
	{
				$this->db->where('agreement_id',$id);
		return	$this->db->update('agreement_details',$data);
	}

	public function details_client_agreement_details($id)
	{
				$this->db->where('agreement_id',$id);
		return	$this->db->get('agreement_details')->row();
	}

	public function details_client_agreement_details_by_id($id)
	{
				$this->db->where('agreement_id',$id);
		return	$this->db->get('agreement_details')->row();
	}

	public function delete_client_agreement_details($id)
	{
	 				$this->db->where('agreement_id',$id);
	 	return		$this->db->delete('agreement_details');
	}

  // code  end for client agreement details



	   
        // code for software_sale details 

	public function list_software_sale_details($admin_id)
	{
		    $this->db->where('admin_id',$admin_id);
		    $this->db->order_by('id','DESC');
	 return	$this->db->get('software_sale')->result();		
			
	}

	public function insert_software_sale_details($para)
	{
		return $this->db->insert('software_sale',$para);
	}

	public function update_software_sale_details($id,$data)
	{
				$this->db->where('id',$id);
		return	$this->db->update('software_sale',$data);
	}

	public function details_software_sale_details($id)
	{
				$this->db->where('id',$id);
		return	$this->db->get('software_sale')->row();
	}

	public function details_software_sale_details_by_id($id)
	{
				$this->db->where('id',$id);
		return	$this->db->get('software_sale')->row();
	}

	public function delete_software_sale_details($id)
	{
	 				$this->db->where('id',$id);
	 	return		$this->db->delete('software_sale');
	}

  // code  end for software_sale details
        
        
        
          // code for Training Fees details 

	public function list_training_fees_details($admin_id)
	{
                       
                        $this->db->where('admin_id',$admin_id);
                        $this->db->order_by('id','DESC');
                 return	$this->db->get('training_fees')->result();		

	}

	public function insert_training_fees_details($para)
	{
		return $this->db->insert('training_fees',$para);
	}

	public function update_training_fees_details($id,$data)
	{
			$this->db->where('id',$id);
		return	$this->db->update('training_fees',$data);
	}

	public function details_training_fees_details($id)
	{
			$this->db->where('id',$id);
		return	$this->db->get('training_fees')->row();
	}

	public function details_training_fees_details_by_id($id)
	{
			$this->db->where('id',$id);
		return	$this->db->get('training_fees')->row();
	}

	public function delete_training_fees_details($id)
	{
	 		 $this->db->where('id',$id);
	 	return	 $this->db->delete('training_fees');
	}

  // code  end for Training Fees details

// code for professional_charges details 

	public function list_professional_charges_details()
	{
		$user_role=$this->session->userdata('user_role');
       	if($user_role==1)
       	{
        	$admin_id = $this->session->userdata('user_id');
       	}
       	else
       	{
       		$admin_id= $this->session->userdata('admin_id');
       	}

		$query = $this->db->query("SELECT inv.id,inv.invoice_no,inv.cr_date,dr.sheetname,cd.address,dr.candidate_name,dr.position_skills,dr.interview_schedule,inv.offered_amt,.inv.net_amount,inv.igst,inv.cgst,inv.sgst,inv.total_invoice_amount,inv.payment_status,inv.payment_details,inv.remark,inv.cancelled_date FROM invoice_details inv,client c,client_details cd ,tbl_dailyreport_recruiter dr WHERE inv.client_id=c.client_id AND inv.candidate_id=dr.dailyreport_id AND inv.client_details_id=cd.id AND c.admin_id=$admin_id");
        return $query->result();       
	}

	

	public function update_professional_charges_details($id,$data)
	{
			$this->db->where('id',$id);
		return	$this->db->update('invoice_details',$data);
	}

	public function details_professional_charges_details($id)
	{
			$query = $this->db->query("SELECT inv.percentage, inv.id,inv.invoice_no,inv.cr_date,dr.sheetname,cd.address,dr.candidate_name,dr.position_skills,dr.interview_schedule,inv.offered_amt,.inv.net_amount,inv.igst,inv.cgst,inv.sgst,inv.total_invoice_amount,inv.payment_status,inv.payment_details,inv.remark,inv.cancelled_date FROM invoice_details inv,client c,client_details cd ,tbl_dailyreport_recruiter dr WHERE inv.client_id=c.client_id AND inv.candidate_id=dr.dailyreport_id AND inv.client_details_id=cd.id AND inv.id=$id");
        return $query->row();     
	}



	public function delete_professional_charges_details($id)
	{
	 		 $this->db->where('id',$id);
	 	return	 $this->db->delete('invoice_details');
	}

  // code  end for Training Fees details



	
	// code for sales dept details 

	public function list_sales_dept_details($user_id)
	{

		$query=$this->db->query("SELECT sr.location, sr.sales_id,sr.client_name,sr.contact_person,sr.designation,sr.contact_no,sr.email_id,sr.no_of_calling,sr.comment,sr.status,sr.linkedin,sr.source,sr.added_by,sr.cr_date,ua.name,ua.l_name FROM sales_report sr ,user_admin ua WHERE sr.admin_id=$user_id  order by sr.status ASC");
		 return $query->result();
			
			
	}
	
// 	public function get_sales_dept_List($postData=null)
// 	{
// 	    $response = array();
	    
// 	    $user_role = $this->session->userdata('user_role');
// 	    if($user_role==1)
//     	{
//     		$admin_id = $this->session->userdata('user_id');	
//     		//$data['list_sales_dept'] =	$this->m_admin_user->list_sales_dept_details($admin_id);		
//     	}else
//     	{
//     		$user_id = $this->session->userdata('user_id');
//     		$added_by = $this->session->userdata('user_name');
//     		//$data['list_sales_dept'] =	$this->m_admin_user->list_sales_dept_details_by_user($admin_id);
//     	}

       
//         ## Total number of records without filtering
//         $this->db->select('count(*) as allcount');
//         if($user_role !=1)
//         {
//             $this->db->where('added_by', $user_id);
//         }
//         $records = $this->db->get('sales_report')->result();
       
//         $totalRecords = $records[0]->allcount;
        
//         ## Total number of record with filtering
//         $this->db->select('count(*) as allcount');
//         if($searchQuery != '')
//         $this->db->where($searchQuery);
//         if($user_role !=1)
//         {
//             $this->db->where('added_by', $user_id);
//         }
//         $records = $this->db->get('sales_report')->result();
//         $totalRecordwithFilter = $records[0]->allcount;
        
//         ## Fetch records
//         $this->db->select('*');
//         if($searchQuery != '')
//         $this->db->where($searchQuery);
//         if($user_role !=1)
//         {
//             $this->db->where('added_by', $user_id);
//         }
//         if($columnName && $columnSortOrder)
//         {
//           $this->db->order_by($columnName, $columnSortOrder);  
//         }
//         else
//         {
//             // $this->db->order_by('sales_id', 'DESC');  
//             $this->db->order_by('cr_date', 'DESC');  
//         }
        
//         $this->db->limit($rowperpage, $start);
//         $records = $this->db->get('sales_report')->result();
//         // echo $this->db->last_query(); exit;
//         $data = array();
//         $sr_no=$start+1;
//         foreach($records as $record )
//         {
//           $r = $this->db->get_where('tbl_designation', array('designation_id'=>$record->designation))->row();
          
//           if($record->status==1)
//           {
//               $status = '<span style="background-color:#ffa500; padding:10px;"> Hot</span>';
//           }
//           elseif($record->status==2)
//           {
//               $status = '<span style="background-color:#ffff00; padding:10px;"> Warm</span>';
//           }
//           elseif($record->status==3)
//           {
//               $status = '<span style="background-color:#ff0000; padding:10px;"> Cold</span>';
//           }
//           elseif($record->status==4)
//           {
//               $status = '<span style="background-color:#008000; padding:10px;"> Close</span>';
//           }
//           else
//           {
//               $status = '';
//           }
          
//           if($record->type_of_meeting==NULL)
//          {
//              $type_of_meeting='-';
            
//          }
//          elseif($record->type_of_meeting==1)
//          {
//               $type_of_meeting='Product Demo';
              
//          }
//          elseif($record->type_of_meeting==2)
//          {
//               $type_of_meeting='Face to face';
              
//          }
//          elseif($record->type_of_meeting==3)
//          {
//               $type_of_meeting='Telephonic';
              
//          }
//          elseif($record->type_of_meeting==4)
//          {
//               $type_of_meeting='Online';
              
//          }
        
          
//           $action = '<div class="btn-group">
//                       <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Action</button>
//                       <ul class="dropdown-menu" role="menu">
//                         <li><a href="'.base_url().'user/admin_user/edit_sales_dept_details/'.$record->sales_id.'">Edit</a></li>
//                         <li><a href="'.base_url().'user/admin_user/send_sales_dept_details/'.$record->sales_id.'">Send</a></li>
//                         <li><a href="'.base_url().'user/admin_user/all_feedbacks/'.$record->sales_id.'">All Feedbacks</a></li>';

//           if($this->session->userdata('user_id')==87)
//           {
//           }
//           else
//           {
//               $action .= '<li><a href="javascript:void(0);" onclick="deleteConfirm('.$record->sales_id.')">Delete</a></li>';
//           }
        
//         if($record->whatsappno != "")
//         {
//             $whats_app = '<a href="https://api.whatsapp.com/send?phone=+91'.$record->whatsappno.'" method="get" target="_blank">
//             <i class="fa fa-whatsapp"></i> '.$record->whatsappno.' </a>';
//         }
//         else
//         {
//             $whats_app = "";
//         }
//           if($record->followup_result==0 && $record->followup_result!=NULL)
//                   {
//                       $followup_result="<a href='#' data-toggle='tooltip' title='Negative Feedback Status'>Negative Feedback Status</a><i class='fa fa-times-circle-o text-danger'></i>";
//                   }
//                   elseif($record->followup_result==1 && $record->followup_result!=NULL)
//                   {
//                       $followup_result="<i class='fa fa-user text-success'></i>";
//                   }  
//                   else
//                   {
//                       $followup_result="No FeedBack";
//                   }
//           $action .= '</ul>
//                     </div>';
//                     if($record->comments_user==NULL)
//                  {
//                      $comment="-";
                    
//                  }
//                  elseif($record->comments_user)
//                  {
//                       $comment=$record->comments_user;
                      
//                  }
          
//                 $data[] = array( 
//                   "select_all"=>'<input type="checkbox" id="checkItem_'.$record->sales_id.'" name="check[]" value="'.$record->sales_id.'" class="selectAll">
//                         <input type="hidden" id="checkItem_no" name="check_no[]" value="'.$record->contact_no.'"> <input type="hidden" name="client_type[]" value="'.$record->client_type.'"><input type="hidden" id="checkItem_no" name="check_whatsappno[]" value="'.$record->whatsappno.'">',
//                   "sr_no"=>$sr_no,
//                   "cr_date"=>date('Y-m-d', strtotime($record->cr_date)),
//                   "client_type"=>$record->client_type,
//                   "client_name"=>$record->client_name,
//                   "contact_person"=>$record->contact_person,
                 
//                   "action"=>$action
//               );
//               $sr_no++;
//         }
        
//         ## Response
//         $response = array(
//           "draw" => intval($draw),
//           "iTotalRecords" => $totalRecords,
//           "iTotalDisplayRecords" => $totalRecordwithFilter,
//           "aaData" => $data
//         );
        
//         return $response;
// 	}
	
// 	public function get_sales_dept_List($postData=null)
// 	{
// 	    $response = array();
	    
// 	    $user_role = $this->session->userdata('user_role');
// 	    if($user_role==1)
//     	{
//     		$admin_id = $this->session->userdata('user_id');	
//     		//$data['list_sales_dept'] =	$this->m_admin_user->list_sales_dept_details($admin_id);		
//     	}else
//     	{
//     		$user_id = $this->session->userdata('user_id');
//     		$added_by = $this->session->userdata('user_name');
//     		//$data['list_sales_dept'] =	$this->m_admin_user->list_sales_dept_details_by_user($admin_id);
//     	}

//         ## Read value
//         $draw = $postData['draw'];
//         $start = $postData['start'];
//         $rowperpage = $postData['length']; // Rows display per page
//         $columnIndex = $postData['order'][2]['column']; // Column index
//         $columnName = $postData['columns'][$columnIndex]['data']; // Column name
//         $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
//         $searchValue = $postData['search']['value']; // Search value
        
        
//         ## Search 
//         $search_arr = array();
//         $searchQuery = "";
//         if($searchValue != ''){
//           $search_arr[] = " (client_name like '%".$searchValue."%' or 
//                 client_type  like '%".$searchValue."%' or 
//                 contact_no  like '%".$searchValue."%' or 
//                 email_id  like '%".$searchValue."%' or 
//                 follow_ups  like '%".$searchValue."%' or 
//                 source  like '%".$searchValue."%' or 
//                 location like '%".$searchValue."%' or 
//                 contact_person like'%".$searchValue."%' or 
//                 status like'%".$searchValue."%' ) ";
//                 /*if($searchValue == 'Hot'){
//                     $search_arr[] = "status == 1";
//                 }elseif($searchValue == 'Cold'){
//                     $search_arr[] = "status == 3";
//                 }elseif($searchValue == 'Warm'){
//                     $search_arr[] = "status == 2";
//                 }elseif($searchValue == 'Close'){
//                     $search_arr[] = "status == 4";
//                 }*/
//         }
//         if(count($search_arr) > 0){
//           $searchQuery = implode(" and ",$search_arr);
//         }
        
//         ## Total number of records without filtering
//         $this->db->select('count(*) as allcount');
//         if($user_role !=1)
//         {
//             $this->db->where('added_by', $user_id);
//         }
//         $records = $this->db->get('sales_report')->result();
       
//         $totalRecords = $records[0]->allcount;
        
//         ## Total number of record with filtering
//         $this->db->select('count(*) as allcount');
//         if($searchQuery != '')
//         $this->db->where($searchQuery);
//         if($user_role !=1)
//         {
//             $this->db->where('added_by', $user_id);
//         }
//         $records = $this->db->get('sales_report')->result();
//         $totalRecordwithFilter = $records[0]->allcount;
        
//         ## Fetch records
//         $this->db->select('*');
//         if($searchQuery != '')
//         $this->db->where($searchQuery);
//         if($user_role !=1)
//         {
//             $this->db->where('added_by', $user_id);
//         }
//         if($columnName && $columnSortOrder)
//         {
//           $this->db->order_by($columnName, $columnSortOrder);  
//         }
//         else
//         {
//             // $this->db->order_by('sales_id', 'DESC');  
//             $this->db->order_by('cr_date', 'DESC');  
//         }
        
//         $this->db->limit($rowperpage, $start);
//         $records = $this->db->get('sales_report')->result();
//         // echo $this->db->last_query(); exit;
//         $data = array();
//         $sr_no=$start+1;
//         foreach($records as $record )
//         {
//           $r = $this->db->get_where('tbl_designation', array('designation_id'=>$record->designation))->row();
          
//           if($record->status==1)
//           {
//               $status = '<span style="background-color:#ffa500; padding:10px;"> Hot</span>';
//           }
//           elseif($record->status==2)
//           {
//               $status = '<span style="background-color:#ffff00; padding:10px;"> Warm</span>';
//           }
//           elseif($record->status==3)
//           {
//               $status = '<span style="background-color:#ff0000; padding:10px;"> Cold</span>';
//           }
//           elseif($record->status==4)
//           {
//               $status = '<span style="background-color:#008000; padding:10px;"> Close</span>';
//           }
//           else
//           {
//               $status = '';
//           }
          
//           if($record->type_of_meeting==NULL)
//          {
//              $type_of_meeting='-';
            
//          }
//          elseif($record->type_of_meeting==1)
//          {
//               $type_of_meeting='Product Demo';
              
//          }
//          elseif($record->type_of_meeting==2)
//          {
//               $type_of_meeting='Face to face';
              
//          }
//          elseif($record->type_of_meeting==3)
//          {
//               $type_of_meeting='Telephonic';
              
//          }
//          elseif($record->type_of_meeting==4)
//          {
//               $type_of_meeting='Online';
              
//          }
        
          
//           $action = '<div class="btn-group">
//                       <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Action</button>
//                       <ul class="dropdown-menu" role="menu">
//                         <li><a href="'.base_url().'user/admin_user/edit_sales_dept_details/'.$record->sales_id.'">Edit</a></li>
//                         <li><a href="'.base_url().'user/admin_user/send_sales_dept_details/'.$record->sales_id.'">Send</a></li>
//                         <li><a href="'.base_url().'user/admin_user/all_feedbacks/'.$record->sales_id.'">All Feedbacks</a></li>';

//           if($this->session->userdata('user_id')==87)
//           {
//           }
//           else
//           {
//               $action .= '<li><a href="javascript:void(0);" onclick="deleteConfirm('.$record->sales_id.')">Delete</a></li>';
//           }
        
//         if($record->whatsappno != "")
//         {
//             $whats_app = '<a href="https://api.whatsapp.com/send?phone=+91'.$record->whatsappno.'" method="get" target="_blank">
//             <i class="fa fa-whatsapp"></i> '.$record->whatsappno.' </a>';
//         }
//         else
//         {
//             $whats_app = "";
//         }
//           if($record->followup_result==0 && $record->followup_result!=NULL)
//                   {
//                       $followup_result="<a href='#' data-toggle='tooltip' title='Negative Feedback Status'>Negative Feedback Status</a><i class='fa fa-times-circle-o text-danger'></i>";
//                   }
//                   elseif($record->followup_result==1 && $record->followup_result!=NULL)
//                   {
//                       $followup_result="<i class='fa fa-user text-success'></i>";
//                   }  
//                   else
//                   {
//                       $followup_result="No FeedBack";
//                   }
//           $action .= '</ul>
//                     </div>';
//                     if($record->comments_user==NULL)
//                  {
//                      $comment="-";
                    
//                  }
//                  elseif($record->comments_user)
//                  {
//                       $comment=$record->comments_user;
                      
//                  }
          
//                 $data[] = array( 
//                   "select_all"=>'<input type="checkbox" id="checkItem_'.$record->sales_id.'" name="check[]" value="'.$record->sales_id.'" class="selectAll">
//                         <input type="hidden" id="checkItem_no" name="check_no[]" value="'.$record->contact_no.'"> <input type="hidden" name="client_type[]" value="'.$record->client_type.'"><input type="hidden" id="checkItem_no" name="check_whatsappno[]" value="'.$record->whatsappno.'">',
//                   "sr_no"=>$sr_no,
//                   "cr_date"=>date('Y-m-d', strtotime($record->cr_date)),
//                   "client_type"=>$record->client_type,
//                   "industry_type"=>$record->industry_type,
//                   "client_name"=>$record->client_name,
//                   "followup_result"=>$followup_result,
                  
//                   "contact_person"=>$record->contact_person,
                  
//                   "contact_no" => $record->contact_no,
                  
//                   "whatsappno" => $whats_app,
                  
//                   "designation"=>$r?$r->designation_name:'',
//                   "email_id"=>$record->email_id,
//                   "no_of_calling"=>$record->no_of_calling,
//                   "type_of_meeting"=>$type_of_meeting,
//                   "meeting_client_feedback"=>$record->meeting_client_feedback,
//                   "follow_ups"=>$record->follow_ups,
                  
//                   "status"=>$status,
//                   "linkedin"=>$record->linkedin,
//                   "source"=>$record->source,
//                   "added_by"=>$added_by,
//                   "update_date"=>$record->update_date,
//                   "track"=>'<button type="button" class="btn btn-success" data-toggle="modal" data-target="#track" onclick="clear_snap('.$record->sales_id.');">Track</button>
//                         <button type="button" class="btn btn-success" data-toggle="modal" data-target="#track_history" onclick="get_track_history('.$record->sales_id.');">History</button>',
//                   "comment"=>$comment,
//                   "action"=>$action
//               );
//               $sr_no++;
//         }
        
//         ## Response
//         $response = array(
//           "draw" => intval($draw),
//           "iTotalRecords" => $totalRecords,
//           "iTotalDisplayRecords" => $totalRecordwithFilter,
//           "aaData" => $data
//         );
        
//         return $response;
// 	}
		public function get_sales_dept_List($postData)
	{
	    
	    $response = array();
	    
	    $user_role = $this->session->userdata('user_role');
	    if($user_role==1)
    	{
    		$admin_id = $this->session->userdata('user_id');	
    		//$data['list_sales_dept'] =	$this->m_admin_user->list_sales_dept_details($admin_id);		
    	}else
    	{
    		$user_id = $this->session->userdata('user_id');
    		$added_by = $this->session->userdata('user_name');
    		//$data['list_sales_dept'] =	$this->m_admin_user->list_sales_dept_details_by_user($admin_id);
    	}

        ## Read value
        // $draw = $postData['draw'];
        // $start = $postData['start'];
        // $rowperpage = $postData['length']; // Rows display per page
        // $columnIndex = $postData['order'][2]['column']; // Column index
        // $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        // $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        // $searchValue = $postData['search']['value']; // Search value
        
        
        ## Search 
        // $search_arr = array();
        // $searchQuery = "";
        // if($searchValue != ''){
        //   $search_arr[] = " (client_name like '%".$searchValue."%' or 
        //         client_type  like '%".$searchValue."%' or 
        //         contact_no  like '%".$searchValue."%' or 
        //         email_id  like '%".$searchValue."%' or 
        //         follow_ups  like '%".$searchValue."%' or 
        //         source  like '%".$searchValue."%' or 
        //         location like '%".$searchValue."%' or 
        //         contact_person like'%".$searchValue."%' ) ";
        // }
        if(count(@$search_arr) > 0){
          $searchQuery = implode(" and ",$search_arr);
        }
        
        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        if($user_role !=1)
        {
            $this->db->where('added_by', $user_id);
        }
        $records = $this->db->get('sales_report')->result();
        
        $totalRecords = $records[0]->allcount;
        
        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        // if($searchQuery != '')
        // $this->db->where($searchQuery);
        if($user_role !=1)
        {
            $this->db->where('added_by', $user_id);
        }
        $records = $this->db->get('sales_report')->result();
        $totalRecordwithFilter = $records[0]->allcount;
        
        ## Fetch records
        $this->db->select('*');
        // if($searchQuery != '')
        // $this->db->where($searchQuery);
        if($user_role !=1)
        {
            $this->db->where('added_by', $user_id);
        }
        // if($columnName && $columnSortOrder)
        // {
        //   $this->db->order_by($columnName, $columnSortOrder);  
        // }
        // else
        // {
        //     $this->db->order_by('sales_id', 'DESC');  
        // }
        
        // $this->db->limit($rowperpage, $start);
        $records = $this->db->get('sales_report')->result();
        $data = array();
        $sr_no=1;
        foreach($records as $record )
        {
          $r = $this->db->get_where('tbl_designation', array('designation_id'=>$record->designation))->row();
          $status = '-';
        //   if($record->status==1)
        //   {
        //       $status = '<span style="background-color:#ffa500; padding:10px;"> Hot</span>';
        //   }
        //   elseif($record->status==2)
        //   {
        //       $status = '<span style="background-color:#ffff00; padding:10px;"> Warm</span>';
        //   }
        //   elseif($record->status==3)
        //   {
        //       $status = '<span style="background-color:#ff0000; padding:10px;"> Cold</span>';
        //   }
        //   elseif($record->status==4)
        //   {
        //       $status = '<span style="background-color:#008000; padding:10px;"> Close</span>';
        //   }
        //   else
        //   {
        //       $status = '';
        //   }
          
          $action = '<div class="btn-group">
                      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Action</button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="'.base_url().'user/admin_user/edit_sales_dept_details/'.$record->sales_id.'">Edit</a></li>';

        //   if($this->session->userdata('user_id')==87)
        //   {
        //   }
        //   else
        //   {
        //       $action .= '<li><a href="javascript:void(0);" onclick="deleteConfirm('.$record->sales_id.')">Delete</a></li>';
        //   }

          $action .= '</ul>
                </div>';
          
          $data[] = array( 
              "select_all"=>'<input type="checkbox" id="checkItem_'.$record->sales_id.'" name="check[]" value="'.$record->email_id.'" class="selectAll">
                    <input type="hidden" id="checkItem_no" name="check_no[]" value="'.$record->contact_no.'">',
              "sr_no"=>$sr_no,
              "cr_date"=>date('Y-m-d', strtotime($record->cr_date)),
              "client_type"=>$record->client_type,
              "client_name"=>$record->client_name,
              "contact_person"=>$record->contact_person,
              "action"=>$action
          );
          $sr_no++;
        }
        //  print_r($data);exit;
        // $response = array(
        //   "draw" => intval($draw),
        //   "iTotalRecords" => $totalRecords,
        //   "iTotalDisplayRecords" => $totalRecordwithFilter,
        //   "aaData" => $data
        // );
        
        // return $response;
        // ## Response
        // $response = array(
        //   "draw" => intval($draw),
        //   "iTotalRecords" => $totalRecords,
        //   "iTotalDisplayRecords" => $totalRecordwithFilter,
        //   "aaData" => $data
        // );
        
        // return $response;
	}

	public function get_sales_dept_List_by_status($postData=null,$sale_status=null)
	{
	    $response = array();
	    
	    $user_role = $this->session->userdata('user_role');
	    if($user_role==1)
    	{
    		$admin_id = $this->session->userdata('user_id');	
    		//$data['list_sales_dept'] =	$this->m_admin_user->list_sales_dept_details($admin_id);		
    	}else
    	{
    		$user_id = $this->session->userdata('user_id');
    		$added_by = $this->session->userdata('user_name');
    		//$data['list_sales_dept'] =	$this->m_admin_user->list_sales_dept_details_by_user($admin_id);
    	}

        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][2]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value
        
        
        ## Search 
        $search_arr = array();
        $searchQuery = "";
        if($searchValue != ''){
          $search_arr[] = " (client_name like '%".$searchValue."%' or 
                client_type  like '%".$searchValue."%' or 
                contact_no  like '%".$searchValue."%' or 
                email_id  like '%".$searchValue."%' or 
                follow_ups  like '%".$searchValue."%' or 
                source  like '%".$searchValue."%' or 
                location like '%".$searchValue."%' or 
                contact_person like'%".$searchValue."%' or 
                status like'%".$searchValue."%' ) ";
                /*if($searchValue == 'Hot'){
                    $search_arr[] = "status == 1";
                }elseif($searchValue == 'Cold'){
                    $search_arr[] = "status == 3";
                }elseif($searchValue == 'Warm'){
                    $search_arr[] = "status == 2";
                }elseif($searchValue == 'Close'){
                    $search_arr[] = "status == 4";
                }*/
        }
        if(count($search_arr) > 0){
          $searchQuery = implode(" and ",$search_arr);
        }
        
        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        if($user_role !=1)
        {
            $this->db->where('added_by', $user_id);
            
        }
        $records = $this->db->get('sales_report')->result();
       
        $totalRecords = $records[0]->allcount;
        
        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if($searchQuery != '')
        $this->db->where($searchQuery);
        if($user_role !=1)
        {
            $this->db->where('added_by', $user_id);
            $this->db->where('status', $sale_status);
        }
        $records = $this->db->get('sales_report')->result();
        $totalRecordwithFilter = $records[0]->allcount;
        
        ## Fetch records
        $this->db->select('*');
        if($searchQuery != '')
        $this->db->where($searchQuery);
        if($user_role !=1)
        {
            $this->db->where('added_by', $user_id);
            $this->db->where('status', $sale_status);
        }
        if($columnName && $columnSortOrder)
        {
          $this->db->order_by($columnName, $columnSortOrder);  
        }
        else
        {
            $this->db->order_by('sales_id', 'DESC');  
        }
        
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get('sales_report')->result();
        // echo $this->db->last_query();
        $data = array();
        $sr_no=$start+1;
        foreach($records as $record )
        {
          $r = $this->db->get_where('tbl_designation', array('designation_id'=>$record->designation))->row();
          
          if($record->status==1)
          {
              $status = '<span style="background-color:#ffa500; padding:10px;"> Hot</span>';
          }
          elseif($record->status==2)
          {
              $status = '<span style="background-color:#ffff00; padding:10px;"> Warm</span>';
          }
          elseif($record->status==3)
          {
              $status = '<span style="background-color:#ff0000; padding:10px;"> Cold</span>';
          }
          elseif($record->status==4)
          {
              $status = '<span style="background-color:#008000; padding:10px;"> Close</span>';
          }
          else
          {
              $status = '';
          }
          
           if($record->type_of_meeting==NULL)
         {
             $type_of_meeting='-';
            
         }
         elseif($record->type_of_meeting==1)
         {
              $type_of_meeting='Product Demo';
              
         }
         elseif($record->type_of_meeting==2)
         {
              $type_of_meeting='Face to face';
              
         }
         elseif($record->type_of_meeting==3)
         {
              $type_of_meeting='Telephonic';
              
         }
         elseif($record->type_of_meeting==4)
         {
              $type_of_meeting='Online';
              
         }
        
          
          $action = '<div class="btn-group">
                      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Action</button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="'.base_url().'user/admin_user/edit_sales_dept_details/'.$record->sales_id.'">Edit</a></li>
                        <li><a href="'.base_url().'user/admin_user/send_sales_dept_details/'.$record->sales_id.'">Send</a></li>
                        <li><a href="'.base_url().'user/admin_user/all_feedbacks/'.$record->sales_id.'">All Feedbacks</a></li>';

          if($this->session->userdata('user_id')==87)
          {
          }
          else
          {
              $action .= '<li><a href="javascript:void(0);" onclick="deleteConfirm('.$record->sales_id.')">Delete</a></li>';
          }
        
        if($record->whatsappno != "")
        {
            $whats_app = '<a href="https://api.whatsapp.com/send?phone=+91'.$record->whatsappno.'" method="get" target="_blank">
            <i class="fa fa-whatsapp"></i> '.$record->whatsappno.' </a>';
        }
        else
        {
            $whats_app = "";
        }
          if($record->followup_result==0 && $record->followup_result!=NULL)
                  {
                      $followup_result="<a href='#' data-toggle='tooltip' title='Negative Feedback Status'>Negative Feedback Status</a><i class='fa fa-times-circle-o text-danger'></i>";
                  }
                  elseif($record->followup_result==1 && $record->followup_result!=NULL)
                  {
                      $followup_result="<i class='fa fa-user text-success'></i>";
                  }  
                  else
                  {
                      $followup_result="No FeedBack";
                  }
          $action .= '</ul>
                    </div>';
          
                $data[] = array( 
                  "select_all"=>'<input type="checkbox" id="checkItem_'.$record->sales_id.'" name="check[]" value="'.$record->sales_id.'" class="selectAll">
                        <input type="hidden" id="checkItem_no" name="check_no[]" value="'.$record->contact_no.'"> <input type="hidden" name="client_type[]" value="'.$record->client_type.'"><input type="hidden" id="checkItem_no" name="check_whatsappno[]" value="'.$record->whatsappno.'">',
                  "sr_no"=>$sr_no,
                  "cr_date"=>date('Y-m-d', strtotime($record->cr_date)),
                  "client_type"=>$record->client_type,
                  "industry_type"=>$record->industry_type,
                  "client_name"=>$record->client_name,
                  "followup_result"=>$followup_result,
                  
                  "contact_person"=>$record->contact_person,
                  
                  "contact_no" => $record->contact_no,
                  
                  "whatsappno" => $whats_app,
                  
                  "designation"=>$r?$r->designation_name:'',
                  "email_id"=>$record->email_id,
                  "no_of_calling"=>$record->no_of_calling,
                  "type_of_meeting"=>$type_of_meeting,
                  "meeting_client_feedback"=>$record->meeting_client_feedback,
                  "follow_ups"=>$record->follow_ups,
                  
                  "status"=>$status,
                  "linkedin"=>$record->linkedin,
                  "source"=>$record->source,
                  "added_by"=>$added_by,
                  "update_date"=>$record->update_date,
                  "track"=>'<button type="button" class="btn btn-success" data-toggle="modal" data-target="#track" onclick="clear_snap('.$record->sales_id.');">Track</button>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#track_history" onclick="get_track_history('.$record->sales_id.');">History</button>',
                  "action"=>$action
              );
              $sr_no++;
        }
        
        ## Response
        $response = array(
          "draw" => intval($draw),
          "iTotalRecords" => $totalRecords,
          "iTotalDisplayRecords" => $totalRecordwithFilter,
          "aaData" => $data
        );
        
        return $response;
	}

public function get_sales_dept_List_by_status_dept($postData=null,$sale_status=null,$client_type=null)
	{
	   $response = array();
	    
	    $user_role = $this->session->userdata('user_role');
	    if($user_role==1)
    	{
    		$admin_id = $this->session->userdata('user_id');	
    		
    		
    		//$data['list_sales_dept'] =	$this->m_admin_user->list_sales_dept_details($admin_id);		
    	}else
    	{
    		$user_id = $this->session->userdata('user_id');
    		$added_by = $this->session->userdata('user_name');
    		//$data['list_sales_dept'] =	$this->m_admin_user->list_sales_dept_details_by_user($admin_id);
    	}

        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][2]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value
        
        
        ## Search 
        $search_arr = array();
        $searchQuery = "";
        if($searchValue != ''){
          $search_arr[] = " (client_name like '%".$searchValue."%' or 
                client_type  like '%".$searchValue."%' or 
                contact_no  like '%".$searchValue."%' or 
                email_id  like '%".$searchValue."%' or 
                follow_ups  like '%".$searchValue."%' or 
                source  like '%".$searchValue."%' or 
                location like '%".$searchValue."%' or 
                contact_person like'%".$searchValue."%') ";
        }
        if(count($search_arr) > 0){
          $searchQuery = implode(" and ",$search_arr);
        }
        
        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        if($user_role !=1)
        {
            $this->db->where('added_by', $user_id);
        }
        elseif($user_role ==1)
        {
            $this->db->where('admin_id', $admin_id);
          
        }
        $records = $this->db->get('sales_report')->result();
       
        $totalRecords = $records[0]->allcount;
        
        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if($searchQuery != '')
        $this->db->where($searchQuery);
        if($user_role !=1)
        {
            $this->db->where('added_by', $user_id);
            if($sale_status != 0)
            {
                $this->db->where('status',$sale_status);    
            }
            if($client_type != 'blank')
            {
                $this->db->where('client_type',$client_type);
            }
        }
        if($user_role ==1)
        {
           $this->db->where('admin_id', $admin_id);
            if($sale_status != 0)
            {
                $this->db->where('status',$sale_status);    
            }
            if($client_type != 'blank')
            {
                $this->db->where('client_type',$client_type);
            }
        }
        $records = $this->db->get('sales_report')->result();
         
        $totalRecordwithFilter = $records[0]->allcount;
        
        ## Fetch records
        $this->db->select('*');
        if($searchQuery != '')
        $this->db->where($searchQuery);
        if($user_role !=1)
        {
            $this->db->where('added_by', $user_id);
            if($sale_status != 0)
            {
                $this->db->where('status',$sale_status);    
            }
            if($client_type != 'blank')
            {
                $this->db->where('client_type',$client_type);
            }
        }
        if($user_role ==1)
        {
            $this->db->where('admin_id', $admin_id);
            if($sale_status != 0)
            {
                $this->db->where('status',$sale_status);    
            }
            if($client_type != 'blank')
            {
                $this->db->where('client_type',$client_type);
            }
        }
        
        if($columnName && $columnSortOrder)
        {
          $this->db->order_by($columnName, $columnSortOrder);  
        }
        else
        {
            $this->db->order_by('sales_id', 'DESC');  
        }
        
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get('sales_report')->result();
        
        $data = array();
        $sr_no=$start+1;
        foreach($records as $record )
        {
          $r = $this->db->get_where('tbl_designation', array('designation_id'=>$record->designation))->row();
          
          if($record->status==1)
          {
              $status = '<span style="background-color:#ffa500; padding:10px;"> Hot</span>';
          }
          elseif($record->status==2)
          {
              $status = '<span style="background-color:#ffff00; padding:10px;"> Warm</span>';
          }
          elseif($record->status==3)
          {
              $status = '<span style="background-color:#ff0000; padding:10px;"> Cold</span>';
          }
          elseif($record->status==4)
          {
              $status = '<span style="background-color:#008000; padding:10px;"> Close</span>';
          }
          else
          {
              $status = '';
          }
          
          if($record->type_of_meeting==NULL)
         {
             $type_of_meeting='-';
            
         }
         elseif($record->type_of_meeting==1)
         {
              $type_of_meeting='Product Demo';
              
         }
         elseif($record->type_of_meeting==2)
         {
              $type_of_meeting='Face to face';
              
         }
         elseif($record->type_of_meeting==3)
         {
              $type_of_meeting='Telephonic';
              
         }
         elseif($record->type_of_meeting==4)
         {
              $type_of_meeting='Online';
              
         }
        
          
          $action = '<div class="btn-group">
                      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Action</button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="'.base_url().'user/admin_user/edit_sales_dept_details/'.$record->sales_id.'">Edit</a></li>
                        <li><a href="'.base_url().'user/admin_user/send_sales_dept_details/'.$record->sales_id.'">Send</a></li>
                        <li><a href="'.base_url().'user/admin_user/all_feedbacks/'.$record->sales_id.'">All Feedbacks</a></li>';

          if($this->session->userdata('user_id')==87)
          {
          }
          else
          {
              $action .= '<li><a href="javascript:void(0);" onclick="deleteConfirm('.$record->sales_id.')">Delete</a></li>';
          }
        
        if($record->whatsappno != "")
        {
            $whats_app = '<a href="https://api.whatsapp.com/send?phone=+91'.$record->whatsappno.'" method="get" target="_blank">
            <i class="fa fa-whatsapp"></i> '.$record->whatsappno.' </a>';
        }
        else
        {
            $whats_app = "";
        }
          if($record->followup_result==0 && $record->followup_result!=NULL)
                  {
                      $followup_result="<a href='#' data-toggle='tooltip' title='Negative Feedback Status'>Negative Feedback Status</a><i class='fa fa-times-circle-o text-danger'></i>";
                  }
                  elseif($record->followup_result==1 && $record->followup_result!=NULL)
                  {
                      $followup_result="<i class='fa fa-user text-success'></i>";
                  }  
                  else
                  {
                      $followup_result="No FeedBack";
                  }
          $action .= '</ul>
                    </div>';
          
                $data[] = array( 
                  "select_all"=>'<input type="checkbox" id="checkItem_'.$record->sales_id.'" name="check[]" value="'.$record->sales_id.'" class="selectAll">
                        <input type="hidden" id="checkItem_no" name="check_no[]" value="'.$record->contact_no.'"> <input type="hidden" name="client_type[]" value="'.$record->client_type.'"><input type="hidden" id="checkItem_no" name="check_whatsappno[]" value="'.$record->whatsappno.'">',
                  "sr_no"=>$sr_no,
                  "cr_date"=>date('Y-m-d', strtotime($record->cr_date)),
                  "client_type"=>$record->client_type,
                  "industry_type"=>$record->industry_type,
                  "client_name"=>$record->client_name,
                  "followup_result"=>$followup_result,
                  "type_of_meeting"=> $type_of_meeting,
                  "contact_person"=>$record->contact_person,
                  
                  "contact_no" => $record->contact_no,
                  
                  "whatsappno" => $whats_app,
                  
                  "designation"=>$r?$r->designation_name:'',
                  "email_id"=>$record->email_id,
                  "no_of_calling"=>$record->no_of_calling,
                  "follow_ups"=>$record->follow_ups,
                  "status"=>$status,
                  "linkedin"=>$record->linkedin,
                  "source"=>$record->source,
                  "added_by"=>$added_by,
                  "track"=>'<button type="button" class="btn btn-success" data-toggle="modal" data-target="#track" onclick="clear_snap('.$record->sales_id.');">Track</button>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#track_history" onclick="get_track_history('.$record->sales_id.');">History</button>',
                  "action"=>$action
              );
              $sr_no++;
        }
        
        
        ## Response
        $response = array(
          "draw" => intval($draw),
          "iTotalRecords" => $totalRecords,
          "iTotalDisplayRecords" => $totalRecordwithFilter,
          "aaData" => $data
        );
        
        return $response;
	}



	public function list_sales_dept_details_by_user($admin_id)
	{

        $user_id = $this->session->userdata('user_id');
		$query=$this->db->query("SELECT  sr.location, sr.sales_id,sr.client_name,sr.client_type,sr.contact_person,sr.designation,sr.contact_no,sr.email_id,sr.no_of_calling,sr.comment,sr.status,sr.linkedin,sr.source,sr.added_by,sr.cr_date,ua.name,ua.l_name FROM sales_report sr ,user_admin ua WHERE sr.admin_id=$admin_id AND sr.added_by =ua.user_admin_id AND sr.added_by=$user_id order by sr.cr_date DESC");
		 return $query->result();
			
			
	}
	
	public function list_foreign_clients($admin_id)
	{
	    $query=$this->db->query("SELECT p.*, t.name, t.l_name FROM tbl_foreign_clients p, user_admin t WHERE p.added_by=t.user_admin_id AND p.admin_id=$admin_id ORDER BY created_on");
		return $query->result();
	}
	
	public function list_foreign_clients_by_user($user_id)
	{
	    $query=$this->db->query("SELECT p.*, t.name, t.l_name FROM tbl_foreign_clients p, user_admin t WHERE p.added_by=t.user_admin_id AND p.added_by=$user_id ORDER BY created_on");
		return $query->result();
	}

	public function insert_sales_dept_details($para)
	{
		 $this->db->insert('sales_report',$para);
		 return $this->db->insert_id();
	}
	
	public function insert_multiple_contact_sales_details($para)
	{
		 $this->db->insert('tbl_sales_details_contacts_persons',$para);
		 return $this->db->insert_id();
	}
		public function delete_contact_perosns_sales_details_record($sales_id)
	{
	    $this->db->where('sales_id', $sales_id);
    return $this->db->delete('tbl_sales_details_contacts_persons');

	}
	
	public function delete_contact_perosns_sales_details_record_by_id($id)
	{
	    $this->db->where('contacts_id', $id);
    return $this->db->delete('tbl_sales_details_contacts_persons');

	}
	
	public function insert_sales_dept_detailsfeedback($para)
	{
		 $this->db->insert('sales_report_feedback',$para);
		 return $this->db->insert_id();
	}
	
	public function insert_foreign_client($para)
	{
		return $this->db->insert('tbl_foreign_clients',$para);
	}

	public function update_sales_dept_details($id,$data)
	{

		//print_r($data);exit();
				$this->db->where('sales_id',$id);
		return	$this->db->update('sales_report',$data);
	}
	
	public function update_foreign_client($id,$data)
	{
	    $this->db->where('id',$id);
		return	$this->db->update('tbl_foreign_clients',$data);
	}

	public function details_sales_dept_details($id)
	{
				$this->db->where('sales_id',$id);
		return	$this->db->get('sales_report')->row();
	}
	
	public function details_foreign_client($id)
	{
		$this->db->where('id',$id);
		return	$this->db->get('tbl_foreign_clients')->row();
	}

	public function details_sales_dept_details_by_id($id)
	{
				$this->db->where('sales_id',$id);
		return	$this->db->get('sales_report')->row();
	}

	public function delete_sales_dept_details($id)
	{
	 	$this->db->where('sales_id',$id);
	 	return	$this->db->delete('sales_report');
	}
	
	public function delete_foreign_client($id)
	{
	    $this->db->where('id',$id);
	 	return	$this->db->delete('tbl_foreign_clients');
	}


	public function get_sales_report_by_date($to_date,$from_date,$location,$user_id)
	{

		  $to = date('Y-m-d',strtotime($to_date));
		  $from = date('Y-m-d',strtotime($from_date));

	  if(!empty($location) && !empty($user_id))
	  {
       
		$query=$this->db->query("SELECT sr.location, sr.sales_id,sr.client_name,sr.contact_person,sr.designation,sr.contact_no,sr.email_id,sr.no_of_calling,sr.comment,sr.follow_ups,sr.status,sr.linkedin,sr.source,sr.added_by,sr.cr_date,ua.name,ua.l_name FROM sales_report sr ,user_admin ua WHERE sr.added_by =ua.user_admin_id AND sr.cr_date BETWEEN '$from' AND '$to' AND sr.location='$location' AND sr.added_by=$user_id order by sr.status ASC");
		 return $query->result();

	  }	
	  elseif (!empty($location) && empty($user_id))
	  {

	  $query=$this->db->query("SELECT sr.location, sr.sales_id,sr.client_name,sr.contact_person,sr.designation,sr.contact_no,sr.email_id,sr.no_of_calling,sr.comment,sr.follow_ups,sr.status,sr.linkedin,sr.source,sr.added_by,sr.cr_date,ua.name,ua.l_name FROM sales_report sr ,user_admin ua WHERE sr.added_by =ua.user_admin_id AND sr.cr_date BETWEEN '$from' AND '$to' AND  sr.location='$location' order by sr.status ASC");
		 return $query->result();	
	  	
	  }
	   elseif (empty($location) && !empty($user_id)) 
	  {

	  	 $query=$this->db->query("SELECT sr.location, sr.sales_id,sr.client_name,sr.contact_person,sr.designation,sr.contact_no,sr.email_id,sr.no_of_calling,sr.comment,sr.follow_ups,sr.status,sr.linkedin,sr.source,sr.added_by,sr.cr_date,ua.name,ua.l_name FROM sales_report sr ,user_admin ua WHERE sr.added_by =ua.user_admin_id AND sr.cr_date BETWEEN '$from' AND '$to' AND sr.added_by=$user_id order by sr.status ASC");
		 return $query->result();	

	  }
	   else
	  {

	   $query=$this->db->query("SELECT sr.location, sr.sales_id,sr.client_name,sr.contact_person,sr.designation,sr.contact_no,sr.email_id,sr.no_of_calling,sr.comment,sr.follow_ups,sr.status,sr.linkedin,sr.source,sr.added_by,sr.cr_date,ua.name,ua.l_name FROM sales_report sr ,user_admin ua WHERE sr.added_by =ua.user_admin_id AND sr.cr_date BETWEEN '$from' AND '$to' order by sr.status ASC");
		 return $query->result();	

	  }


	}



	public function get_location_of_sales($admin_id)

	{
            
            $this->db->select('location');
            $this->db->where('admin_id',$admin_id);
            $this->db->group_by('location');
     return $this->db->get('sales_report')->result();

	}

  // code  end for sales dept details

public function check_bank_details_assign_employee($employee_id)
	{
		$result=$this->db->get_where('emp_bank_details',array('emp_id' => $employee_id));
		if($result->num_rows()>0)
		{
			return "1";
		}
		else
		{
			return "0"; 
		}
	} 




	
		// code for training dept details 

	/*public function list_tarining_dept_details()
	{

		$query=$this->db->query("SELECT sr.training_id, sr.location, sr.training,sr.education, sr.skills,sr.feedback,sr.contact_no,sr.email_id,sr.no_of_calling,sr.feedback,sr.follow_ups,sr.status,sr.source,sr.added_by,sr.cr_date,ua.name,ua.l_name FROM training_report sr ,user_admin ua WHERE sr.added_by =ua.user_admin_id order by sr.status ASC");
		 return $query->result();
			
			
	}*/

	/*public function list_tarining_dept_details($user_id)
	{

		$query=$this->db->query("SELECT  sr.name as tname, sr.training_id, sr.location, sr.interview_schedule, sr.training,sr.education, sr.skills,sr.feedback,sr.contact_no,sr.email_id,sr.no_of_calling,sr.feedback,sr.follow_ups,sr.status,sr.source,sr.added_by,sr.cr_date,ua.name,ua.l_name FROM training_report sr ,user_admin ua WHERE sr.admin_id=$user_id AND sr.added_by =ua.user_admin_id order by sr.status ASC");
		 return $query->result();
			
			
	}*/
	
	public function list_tarining_dept_details($user_id)
	{

		$query=$this->db->query("SELECT sr.file_name, sr.name as tname, sr.training_id, sr.location, sr.interview_schedule, sr.training,sr.education, sr.skills,sr.feedback,sr.contact_no,sr.email_id,sr.no_of_calling,sr.feedback,sr.follow_ups,sr.status,sr.source,sr.added_by,sr.cr_date,ua.name,ua.l_name FROM training_report sr ,user_admin ua WHERE sr.admin_id=$user_id AND sr.added_by =ua.user_admin_id order by sr.status ASC");
		 return $query->result();
			
			
	}


	/*public function list_training_dept_details_by_user()
	{

        $user_id = $this->session->userdata('user_id');
		$query=$this->db->query("SELECT  sr.location, sr.training,sr.client_name,sr.contact_person,sr.designation,sr.contact_no,sr.email_id,sr.no_of_calling,sr.comment,sr.follow_ups,sr.status,sr.linkedin,sr.source,sr.added_by,sr.cr_date,ua.name,ua.l_name FROM training_report sr ,user_admin ua WHERE sr.added_by =ua.user_admin_id AND sr.added_by=$user_id order by sr.status ASC");
		 return $query->result();
			
			sr.client_name,sr.contact_person,sr.designation,sr.comment,sr.linkedin,
	}*/



	public function list_training_dept_details_by_user()
	{
    $user_id = $this->session->userdata('user_id');
    $query=$this->db->query("SELECT sr.file_name, sr.name as tname,sr.training_id, sr.location, sr.interview_schedule,sr.training, sr.education, sr.skills, sr.feedback, sr.contact_no, sr.email_id, sr.no_of_calling, sr.feedback, sr.follow_ups, sr.status, sr.source, sr.added_by, sr.cr_date, ua.name, ua.l_name FROM training_report sr, user_admin ua WHERE sr.added_by =ua.user_admin_id AND sr.added_by=$user_id order by sr.status ASC");
	 return $query->result();
	}

	public function insert_training_dept_details($para)
	{
		return $this->db->insert('training_report',$para);
	}
	
	public function save_track_record($para)
	{
		return $this->db->insert('track_record',$para);
	}

	public function get_track_history($sales_id)
	{
		$query=$this->db->query("SELECT * FROM track_record WHERE sales_id=$sales_id order by created_on ASC");
		return $query->result();
	}

	public function update_training_dept_details($id,$data)
	{

		//print_r($data);exit();
				$this->db->where('training_id',$id);
		return	$this->db->update('training_report',$data);
	}

	public function details_training_dept_details($id)
	{
				$this->db->where('training_id',$id);
		return	$this->db->get('training_report')->row();
	}

	public function details_training_dept_details_by_id($id)
	{
				$this->db->where('training',$id);
		return	$this->db->get('training_report')->row();
	}

	public function delete_training_dept_details($id)
	{
	 				$this->db->where('training_id',$id);
	 	return		$this->db->delete('training_report');
	}


	public function get_training_report_by_date($to_date,$from_date,$location,$user_id)
	{

		  $to = date('Y-m-d',strtotime($to_date));
		  $from = date('Y-m-d',strtotime($from_date));

	  if(!empty($location) && !empty($user_id))
	  {
       
		$query=$this->db->query("SELECT sr.location, sr.training,sr.client_name,sr.contact_person,sr.designation,sr.contact_no,sr.email_id,sr.no_of_calling,sr.comment,sr.follow_ups,sr.status,sr.linkedin,sr.source,sr.added_by,sr.cr_date,ua.name,ua.l_name FROM training_report sr ,user_admin ua WHERE sr.added_by =ua.user_admin_id AND sr.cr_date BETWEEN '$from' AND '$to' AND sr.location='$location' AND sr.added_by=$user_id order by sr.status ASC");
		 return $query->result();

	  }	
	  elseif (!empty($location) && empty($user_id))
	  {

	  $query=$this->db->query("SELECT sr.location, sr.training,sr.client_name,sr.contact_person,sr.designation,sr.contact_no,sr.email_id,sr.no_of_calling,sr.comment,sr.follow_ups,sr.status,sr.linkedin,sr.source,sr.added_by,sr.cr_date,ua.name,ua.l_name FROM training_report sr ,user_admin ua WHERE sr.added_by =ua.user_admin_id AND sr.cr_date BETWEEN '$from' AND '$to' AND  sr.location='$location' order by sr.status ASC");
		 return $query->result();	
	  	
	  }
	   elseif (empty($location) && !empty($user_id)) 
	  {

	  	 $query=$this->db->query("SELECT sr.location, sr.training,sr.client_name,sr.contact_person,sr.designation,sr.contact_no,sr.email_id,sr.no_of_calling,sr.comment,sr.follow_ups,sr.status,sr.linkedin,sr.source,sr.added_by,sr.cr_date,ua.name,ua.l_name FROM training_report sr ,user_admin ua WHERE sr.added_by =ua.user_admin_id AND sr.cr_date BETWEEN '$from' AND '$to' AND sr.added_by=$user_id order by sr.status ASC");
		 return $query->result();	

	  }
	   else
	  {

	   $query=$this->db->query("SELECT sr.location, sr.training,sr.client_name,sr.contact_person,sr.designation,sr.contact_no,sr.email_id,sr.no_of_calling,sr.comment,sr.follow_ups,sr.status,sr.linkedin,sr.source,sr.added_by,sr.cr_date,ua.name,ua.l_name FROM training_report sr ,user_admin ua WHERE sr.added_by =ua.user_admin_id AND sr.cr_date BETWEEN '$from' AND '$to' order by sr.status ASC");
		 return $query->result();	

	  }


	}



	public function get_location_of_training()

	{

            $this->db->select('location');
            $this->db->group_by('location');
     return $this->db->get('training_report')->result();

	}

  // code  end for training dept details



// code for chat app//

public function get_active_emp($admin_id)
{

  //echo "SELECT * FROM `user_admin` where added_by_user_admin_id='".$admin_id."' AND status=1 ORDER BY created_at DESC"; exit();
 $query= $this->db->query("SELECT * FROM `user_admin` where added_by_user_admin_id='".$admin_id."' AND status=1 ORDER BY created_at DESC");
   return $query->result();

}

//code end for chat app




















// code for multi user admin

   public function list_admin_user()
   {
    $this->db->select('*');
    $this->db->from('user_admin');
    $this->db->where('role',1);
    return $this->db->get()->result();
   }
public function list_admin_user1($admin_id)
   {
    $this->db->select('*');
    $this->db->from('user_admin');
    $this->db->where('role',1);
     $this->db->where('added_by_user_admin_id',$admin_id);
    return $this->db->get()->result();
   }
   public function insert_admin($para)
   {
    $this->db->insert('user_admin',$para);
    return $result = $this->db->insert_id();
   }

	public function view_admin_details_user($id)
	{
		$this->db->select('*');
		$this->db->where('user_admin_id',$id);
		$this->db->from('user_admin');		
		return $this->db->get()->row();
	}

   public function get_user_admin_details_by_id($id)
   {
    $this->db->where('user_admin_id',$id);
    return $this->db->get('user_admin')->row();

   }

   public function update_user_admin($id,$data)
   {
    $this->db->where('user_admin_id',$id);
    return $this->db->update('user_admin',$data); 

   }

public function update_emp_details($id,$data)
   {
    $this->db->where('emp_id',$id);
    return $this->db->update('emp_details',$data); 

   }

   public function delete_user_admin($id)
   {
    $this->db->where('user_admin_id',$id);
    return $this->db->delete('user_admin');

   }  


// code end for multi user admin



	
	public function student_list_tarining_dept_details($user_id)
	{
		$query=$this->db->query("SELECT sr.file_name, sr.name as tname, sr.training_id, sr.location, sr.interview_schedule, sr.training,sr.education, sr.skills,sr.feedback,sr.contact_no,sr.email_id,sr.no_of_calling,sr.feedback,sr.follow_ups,sr.status,sr.source,sr.added_by,sr.cr_date,ua.name,ua.l_name FROM training_report sr ,user_admin ua WHERE sr.admin_id=$user_id AND sr.status='Student' AND sr.added_by =ua.user_admin_id order by sr.status ASC");
		return $query->result();
	}

	public function student_list_training_dept_details_by_user()
	{
    	$user_id = $this->session->userdata('user_id');
    	$query=$this->db->query("SELECT sr.file_name, sr.name as tname,sr.training_id, sr.location, sr.interview_schedule,sr.training, sr.education, sr.skills, sr.feedback, sr.contact_no, sr.email_id, sr.no_of_calling, sr.feedback, sr.follow_ups, sr.status, sr.source, sr.added_by, sr.cr_date, ua.name, ua.l_name FROM training_report sr, user_admin ua WHERE sr.added_by =ua.user_admin_id AND sr.added_by=$user_id AND sr.status='Student' order by sr.status ASC");
	 	return $query->result();
	}

    public function get_fee_category_by_academic()
    {
               $this->db->where('feecategory_acadamic_year',$academic_year);
               $this->db->where('feecategory_batch',$batch_name);
       return  $this->db->get("feecategory")->result();
    }

    public function assignfees_insert($para)
    {
        return $this->db->insert('assignfee',$para);
    }

    public function assignfees_insertinto_collect_fee($para)
    {
        return $this->db->insert('collect_fee',$para);
    }

	public function get_fee_category_bystudent_id($id)
	{
		$query=$this->db->query("SELECT * FROM assignfee WHERE student_id='$id'");
		return $query->row();
	}

	public function getfee_category($id)
	{
		$query=$this->db->query("SELECT * FROM assignfee WHERE student_id='$id'");
		return $query->result();
	}


	public function payment_history($id)
    {          
        $query= $this->db->query("SELECT cf.cr_date, cf.collectfee_payment_mode, cf.total_amount, cf.outstanding_amt, cf.collectfee_amount FROM collect_fee cf WHERE cf.student_id='$id'");
        return $query->result();
    }

    /*public function get_fee_details_by_feecategory($feecategory_id)
    {
        $query=$this->db->query("SELECT * FROM feecategory_feedetails WHERE feecategory_id='$feecategory_id'");
        return $query->result_array();
    }

    public function fee_category_details($data)
    {
         $query=$this->db->query("SELECT b.batch_name,ay.academic_name,fc.feecategory_name,fc.feecategory_downpayment_amount FROM feecategory fc,academic_year ay,batch b WHERE fc.`feecategory_acadamic_year`=ay.ac_id AND fc.`feecategory_batch`=b.batch_id AND feecategory_id='$data'");
        return $query->result_array();
    }*/

    public function get_outstanding_amount($id)
    {
              $this->db->order_by('collectfee_id','desc');
              $this->db->where('student_id',$id);
      return  $this->db->get('collect_fee')->row();

    }

    public function bank_details()
    {
        $query=$this->db->query("SELECT * FROM bankmaster");
        return $query->result_array(); 
    }

    public function takefees_insert($para)
    {
        return $this->db->insert('collect_fee',$para);
    }




    // code for seo leads details 

	public function list_seo_leads_details($user_id)
	{

		$query=$this->db->query("SELECT sr.location, sr.sales_id,sr.client_name,sr.contact_person,sr.designation,sr.contact_no,sr.email_id,sr.no_of_calling,sr.comment,sr.follow_ups,sr.status,sr.linkedin,sr.source,sr.added_by,sr.cr_date,ua.name,ua.l_name FROM seo_leads_report sr ,user_admin ua WHERE sr.admin_id=$user_id AND sr.added_by =ua.user_admin_id order by sr.status ASC");
		 return $query->result();
			
			
	}


	public function list_seo_leads_details_by_user($admin_id)
	{

        $user_id = $this->session->userdata('user_id');
		$query=$this->db->query("SELECT  sr.location, sr.sales_id,sr.client_name,sr.contact_person,sr.designation,sr.contact_no,sr.email_id,sr.no_of_calling,sr.comment,sr.follow_ups,sr.status,sr.linkedin,sr.source,sr.added_by,sr.cr_date,ua.name,ua.l_name FROM seo_leads_report sr ,user_admin ua WHERE sr.admin_id=$admin_id AND sr.added_by =ua.user_admin_id AND sr.added_by=$user_id order by sr.status ASC");
		 return $query->result();
			
			
	}

	public function insert_seo_leads_details($para)
	{
		return $this->db->insert('seo_leads_report',$para);
	}

	public function update_seo_leads_report_details($id,$data)
	{

		//print_r($data);exit();
				$this->db->where('sales_id',$id);
		return	$this->db->update('seo_leads_report',$data);
	}

	public function details_seo_leads_details($id)
	{
				$this->db->where('sales_id',$id);
		return	$this->db->get('seo_leads_report')->row();
	}

	public function details_seo_leads_details_by_id($id)
	{
				$this->db->where('sales_id',$id);
		return	$this->db->get('seo_leads_report')->row();
	}

	public function delete_seo_leads_details($id)
	{
	 				$this->db->where('sales_id',$id);
	 	return		$this->db->delete('seo_leads_report');
	}


	public function get_seo_leads_by_date($to_date,$from_date,$location,$user_id)
	{

		  $to = date('Y-m-d',strtotime($to_date));
		  $from = date('Y-m-d',strtotime($from_date));

	  if(!empty($location) && !empty($user_id))
	  {
       
		$query=$this->db->query("SELECT sr.location, sr.sales_id,sr.client_name,sr.contact_person,sr.designation,sr.contact_no,sr.email_id,sr.no_of_calling,sr.comment,sr.follow_ups,sr.status,sr.linkedin,sr.source,sr.added_by,sr.cr_date,ua.name,ua.l_name FROM seo_leads_report sr ,user_admin ua WHERE sr.added_by =ua.user_admin_id AND sr.cr_date BETWEEN '$from' AND '$to' AND sr.location='$location' AND sr.added_by=$user_id order by sr.status ASC");
		 return $query->result();

	  }	
	  elseif (!empty($location) && empty($user_id))
	  {

	  $query=$this->db->query("SELECT sr.location, sr.sales_id,sr.client_name,sr.contact_person,sr.designation,sr.contact_no,sr.email_id,sr.no_of_calling,sr.comment,sr.follow_ups,sr.status,sr.linkedin,sr.source,sr.added_by,sr.cr_date,ua.name,ua.l_name FROM seo_leads_report sr ,user_admin ua WHERE sr.added_by =ua.user_admin_id AND sr.cr_date BETWEEN '$from' AND '$to' AND  sr.location='$location' order by sr.status ASC");
		 return $query->result();	
	  	
	  }
	   elseif (empty($location) && !empty($user_id)) 
	  {

	  	 $query=$this->db->query("SELECT sr.location, sr.sales_id,sr.client_name,sr.contact_person,sr.designation,sr.contact_no,sr.email_id,sr.no_of_calling,sr.comment,sr.follow_ups,sr.status,sr.linkedin,sr.source,sr.added_by,sr.cr_date,ua.name,ua.l_name FROM seo_leads_report sr ,user_admin ua WHERE sr.added_by =ua.user_admin_id AND sr.cr_date BETWEEN '$from' AND '$to' AND sr.added_by=$user_id order by sr.status ASC");
		 return $query->result();	

	  }
	   else
	  {

	   $query=$this->db->query("SELECT sr.location, sr.sales_id,sr.client_name,sr.contact_person,sr.designation,sr.contact_no,sr.email_id,sr.no_of_calling,sr.comment,sr.follow_ups,sr.status,sr.linkedin,sr.source,sr.added_by,sr.cr_date,ua.name,ua.l_name FROM seo_leads_report sr ,user_admin ua WHERE sr.added_by =ua.user_admin_id AND sr.cr_date BETWEEN '$from' AND '$to' order by sr.status ASC");
		 return $query->result();	

	  }


	}



	public function get_location_of_seo_leads($admin_id)

	{
            $this->db->where('admin_id',$admin_id);
            $this->db->select('location');
            $this->db->group_by('location');
     return $this->db->get('seo_leads_report')->result();

	}

  // code  end for seo leads details


    // code for seo dailyreport details 

	public function list_seo_dailyreport_details($user_id)
	{

		$query=$this->db->query("SELECT sr.location, sr.sales_id,sr.client_name,sr.contact_person,sr.designation,sr.contact_no,sr.email_id,sr.no_of_calling,sr.comment,sr.follow_ups,sr.status,sr.linkedin,sr.source,sr.added_by,sr.cr_date,ua.name,ua.l_name FROM seo_leads_report sr ,user_admin ua WHERE sr.admin_id=$user_id AND sr.added_by =ua.user_admin_id order by sr.status ASC");
		 return $query->result();
			
			
	}


	public function list_seo_dailyreport_details_by_user($admin_id)
	{

        $user_id = $this->session->userdata('user_id');
		$query=$this->db->query("SELECT  sc.category_name, sr.*,ua.name,ua.l_name FROM seo_dailyreport sr ,user_admin ua,seo_category sc WHERE sr.category_id=sc.category_id AND sr.admin_id=$admin_id AND sr.added_by =ua.user_admin_id AND sr.added_by=$user_id order by sr.status ASC");
		 return $query->result();
			
			
	}

	public function insert_seo_dailyreport_details($para)
	{
		return $this->db->insert('seo_dailyreport',$para);
	}

	public function update_seo_dailyreport_report_details($id,$data)
	{

		//print_r($data);exit();
				$this->db->where('id',$id);
		return	$this->db->update('seo_dailyreport',$data);
	}

	public function details_seo_dailyreport_details($id)
	{
				$this->db->where('id',$id);
		return	$this->db->get('seo_dailyreport')->row();
	}

	public function details_seo_dailyreport_details_by_id($id)
	{
				$this->db->where('id',$id);
		return	$this->db->get('seo_dailyreport')->row();
	}

	public function delete_seo_dailyreport_details($id)
	{
	 				$this->db->where('id',$id);
	 	return		$this->db->delete('seo_dailyreport');
	}

	public function list_seo_category()
	{
	 				
	 	return		$this->db->get('seo_category')->result();
	}


	

  // code  end for seo dailyreport details
  
  
  // Rhutuja - 10/12/2019

    public function get_designation_list(){
    	$this->db->order_by('designation_name', 'ASC');
    	return $this->db->get('tbl_designation')->result();
    } 

    public function add_designation($data){
    	return $this->db->insert('tbl_designation', $data);
    }
    
////manual method
public function insert_manual_details($para)
	{
		$this->db->insert('tbl_code_of_conduct',$para);
		return	$result = $this->db->insert_id();
	}

// public function list_code_of_conduct()
// 	{
// 	 			$this->db->order_by('code_of_conduct_id', 'DESC');	
// 	 	return		$this->db->get('tbl_code_of_conduct')->result();
// 	}
	
	public function list_code_of_conduct($admin_id)
	{
	    	$this->db->where('added_by_user_admin_id',$admin_id);
	 			$this->db->order_by('code_of_conduct_id', 'DESC');	
	 	return		$this->db->get('tbl_code_of_conduct')->result();
	}
	function get_detail_of_code_conduct($id)
	{
	   // print_r($id);exit;
	   //   $this->db->limit(1);
	      $this->db->where('code_of_conduct_id',$id);
	   //   $this->db->where('role',10);
	     return $this->db->get('tbl_code_of_conduct')->row();
	}
    
    
    	public function update_manual_details($id,$data)
	{

		//print_r($data);exit();
				$this->db->where('code_of_conduct_id',$id);
		return	$this->db->update('tbl_code_of_conduct',$data);
	}
	
	public function delete_manual($id)
	{
	 				$this->db->where('code_of_conduct_id',$id);
	 	return		$this->db->delete('tbl_code_of_conduct');
	}


////offer letter method
public function insert_offer_letter_basic($para)
	{
		$this->db->insert('hr_offer_letter',$para);
		return	$result = $this->db->insert_id();
	}
	
	 public function insert_offer_letter($data = array()){
    $insert = $this->db->insert_batch('hr_offer_letter',$data);
    return $this->db->insert_id();
  }

// public function list_offer_letter()
// 	{
// 	 			$this->db->order_by('offer_letter_id', 'DESC');	
// 	 	return		$this->db->get('hr_offer_letter')->result();
// 	}
	function list_offer_letter()
    {   
         $query = $this->db->query("SELECT *,hr_offer_letter.document FROM hr_offer_letter,user_admin where hr_offer_letter.employee_id=user_admin.user_admin_id GROUP BY hr_offer_letter.employee_id ");
          
     return $s=$query->result();
  
    // $query = $this->db->query("SELECT *,document.document FROM document,employee where document.employee_id=employee.employee_id order by document.document_id DESC");
    // return  $query->result();
    } 
    
    function list_offer_letter_by_admin_id($admin_id)
    {   
         $query = $this->db->query("SELECT *,hr_offer_letter.document FROM hr_offer_letter,user_admin where hr_offer_letter.employee_id=user_admin.user_admin_id GROUP BY hr_offer_letter.employee_id ORDER BY offer_letter_id DESC");
        //  print_r($this->db->last_query());exit;
    return  $s=$query->result();
   
    // $query = $this->db->query("SELECT *,document.document FROM document,employee where document.employee_id=employee.employee_id order by document.document_id DESC");
    // return  $query->result();
    } 
     function offer_letter_list_by_id($id)
    {   
    $query = $this->db->query("SELECT *,hr_offer_letter.document FROM hr_offer_letter,user_admin where hr_offer_letter.employee_id=user_admin.user_admin_id and hr_offer_letter.employee_id='$id' ");
    return  $query->result();
    }
	function get_detail_of_offer_letter($id)
	{
	   // print_r($id);exit;
	   //   $this->db->limit(1);
	      $this->db->where('offer_letter_id',$id);
	   //   $this->db->where('role',10);
	     return $this->db->get('hr_offer_letter')->row();
	}
    
    
    	public function update_offer_letter($id,$data)
	{

		//print_r($data);exit();
				$this->db->where('offer_letter_id',$id);
		return	$this->db->update('hr_offer_letter',$data);
	}
	
	public function delete_offer_letter($id)
	{
	 				$this->db->where('offer_letter_id',$id);
	 	return		$this->db->delete('hr_offer_letter');
	}


///////////////////////multiple role 
public function insert_multiple_roles($para)
	{
		$this->db->insert('hr_multiple_role_employee',$para);
		return	$result = $this->db->insert_id();
	}
	
	public function view_code_of_conduct_user()
	{
	 				$this->db->where('category','Permanent');
	 	return		$this->db->delete('user_admin');
	}
	
	
	//////////////////////////code-sayali for leave
	///////////////////////code for leave setting admin

public function insert_leave_types($data){
    	return $this->db->insert('leave_types', $data);
    }

    public function list_leave_types()
	{
	 				
	 	return		$this->db->get('leave_types')->result();
	}
	public function list_leave_types_by_admin($admin_id)
	{
	 			//	$this->db->where('added_by_admin_id',$admin_id);
	 	return		$this->db->get('leave_types')->result();
	}

	public function update_leave_types($id,$data)
   {
    $this->db->where('leave_types_id',$id);
    return $this->db->update('leave_types',$data); 

   }
public function get_leave_types($id)
	{           $this->db->where('status',1);
			//	$this->db->where('added_by_admin_id',$id);
		return	$s=$this->db->get('leave_types')->result_array();
	}

	public function get_leave_types_by_id($id)
	{
				$this->db->where('leave_policy_id',$id);
		return	$s=$this->db->get('leave_policy')->row();
	}
public function list_leave_policy()
	{
	 				
	 	return		$this->db->get('admin_policy_for_leave')->result();
	}
public function list_leave_policy_by_admin($admin)
	{
	 			//	$this->db->where('added_by_admin_id',$admin);
	 return 	$this->db->get('admin_policy_for_leave')->result();
// 	 	print_r($this->db->last_query());exit;
	}

	 public function insert_leave_policy($data){
    	return $this->db->insert('admin_policy_for_leave', $data);
	 }
 public function insert_leave_type($data){
    	$this->db->insert('leave_policy', $data);
    	return $result = $this->db->insert_id();
    }

public function get_details_general_policy_type($id)
	{
				$this->db->where('policy_id',$id);
		return	$s=$this->db->get('leave_policy')->result_array();
	}

	public function get_name_leave_type($name)
	{
				$this->db->where('leave_type',$name);
			return $s=$this->db->get('leave_policy')->row();
		
	}
	public function delete_leave_type($id)
	{
	 				$this->db->where('leave_policy_id',$id);
	 	return		$this->db->delete('leave_policy');
	}
public function update_leave_policy_type($id,$data)
   {
    $this->db->where('leave_policy_id',$id);
    return $this->db->update('leave_policy',$data); 

   }
    
////employeee
    public function list_leave_types_apply_leave($id)
	{

		$this->db->select('*');
 	   ////$this->db->where('user_admin.added_by_user_admin_id',$admin_id);
		//$this->db->where('role !=',1);
		// $this->db->where('status',1);
		//$this->db->where('leave_types.added_by_admin_id',$id);
		$this->db->from('leave_types');
		$this->db->join('leave_policy', 'leave_policy.leave_type = leave_types.leave_types_id');
		
		
		
		return $s=$this->db->get()->result();
		// print_r($s);
		// exit;
	 				// $this->db->where('status',1);
	 	// 			$this->db->where('added_by_admin_id',$id);
	 	// return		$this->db->get('leave_types')->result();
	}
	/////////manage leaves
// 	public function hr_list_user1($admin_id)
// 	{

// 		$this->db->select('*');
// 		//$this->db->where('user_admin.added_by_user_admin_id',$admin_id);
// 		$this->db->where('role !=',1);
// 		$this->db->from('user_admin');
		
// 		$this->db->order_by('user_admin_id','DESC');
// 		return $this->db->get()->result();
// 	}
//////////////resignation
	 public function insert_resignation_settings($data){
    	return $this->db->insert('resignation_settings', $data);
    }

    public function list_resignation_settings()
	{
	 				
	 	return	$this->db->get('resignation_settings')->result();
	}
	
	public function list_by_id_resignation_settings($id)
	{
				$this->db->where('resignation_setting_id',$id);
		return	$s=$this->db->get('resignation_settings')->row();
	}

	public function update_resignation_settings($id,$data)
   {
    $this->db->where('resignation_setting_id',$id);
    return $this->db->update('resignation_settings',$data); 

   }

   public function delete_resignation_settings($id)
	{
	 				$this->db->where('resignation_setting_id',$id);
	 	return		$this->db->delete('resignation_settings');
	}
	////////////emp resignation
	 public function insert_employee_resignation($data){
    	return $this->db->insert('resignation_employee', $data);
    }
	public function list_employee_resignation()
	{
	 				
	 	return	$this->db->get('resignation_employee')->result();
	}
///////////////////////holiday
 	public function insert_holiday($data){
    	return $this->db->insert('holiday', $data);
    }

public function list_holiday()
	{
	 				
	 	return	$this->db->get('holiday')->result();
	}
	public function list_holiday_by_admin($admin_id)
	{
	 	//	$this->db->where('added_by_admin_id',$admin_id);		
	 	return	$this->db->get('holiday')->result();
	}
public function update_holiday($id,$data)
   {
    $this->db->where('holiday_id',$id);
    return $this->db->update('holiday',$data); 

   }

    public function delete_holiday($id)
	{
	 				$this->db->where('holiday_id',$id);
	 	return		$this->db->delete('holiday');
	}
	
	
	public function searchrecord_bydate($fromdate,$todate,$dept,$employeeas)
	{
		/*$query=$this->db->query("SELECT b.name,a.d_date,a.assignment,a.project_name,a.duedate,a.from_time,a.to_time, a.manager_remark,a.submitted FROM tbl_dailyreport a,user_admin b WHERE a.d_date BETWEEN '$fromdate' AND '$todate' AND a.user_id=b.user_admin_id AND a.user_id='$employee'");*/
		$query=$this->db->query("SELECT * FROM leave_status a, user_admin b WHERE 
			a.cr_date BETWEEN '$fromdate' AND '$todate' AND a.emp_id=b.user_admin_id AND a.emp_id='$employeeas'");
        return $query->result_array();
	}
	
	public function insert_test_account_details($data){
    	return $this->db->insert('demo_account_info', $data);
    }

//  public function list_test_account_info()
// 	{
	 		
// 	 	return	$this->db->get('demo_account_info')->result();
// 	}

public function list_test_account_info($admin_id)
	{
	 	//	$this->db->where('added_by_admin_id',$admin_id);
	 		$this->db->order_by('d_ac_info_id','DESC');
	 	return	$this->db->get('demo_account_info')->result();
	}

	public function list_test_account_info_by_id($id)
	{
	 				$this->db->where('d_ac_info_id',$id);
	 	return		$this->db->get('demo_account_info')->row();
	}
	public function update_test_account_details($id,$data)
   {
    $this->db->where('d_ac_info_id',$id);
    return $this->db->update('demo_account_info',$data); 

   }
   public function delete_test_info($id)
	{
	 				$this->db->where('d_ac_info_id',$id);
	 	return		$this->db->delete('demo_account_info');
	}
	
	public function insert_test_account_created_details($data){
    	return $this->db->insert('created_demo_account', $data);
    }
public function list_test_account_created_info()
	{
	 		
	 	return	$this->db->get('created_demo_account')->result();
	}

	public function list_test_account_created_info_by_id($id)
	{
	 				$this->db->where('c_demo_id',$id);
	 	return		$this->db->get('created_demo_account')->row();
	}
	public function update_test_account_created_details($id,$data)
   {
    $this->db->where('c_demo_id',$id);
    return $this->db->update('created_demo_account',$data); 

   }
   public function delete_test_created_info($id)
	{
	 				$this->db->where('c_demo_id',$id);
	 	return		$this->db->delete('created_demo_account');
	}

/////////////////////////////////////////////subscription based client

	public function insert_subscription_based_client($data){
    	return $this->db->insert('subscription_based_client', $data);
    }
public function list_subscription_based_client($admin_id)
	{
	 	//	$this->db->where('added_by',$admin_id);
	 	return	$this->db->get('subscription_based_client')->result();
	}

	public function list_subscription_based_client_by_id($id)
	{
	 				$this->db->where('s_b_client_id',$id);
	 	return		$this->db->get('subscription_based_client')->row();
	}
	public function update_subscription_based_client_details($id,$data)
   {
    $this->db->where('s_b_client_id',$id);
    return $this->db->update('subscription_based_client',$data); 

   }
   public function delete_subscription_based_client($id)
	{
	 				$this->db->where('s_b_client_id',$id);
	 	return		$this->db->delete('subscription_based_client');
	}



///////////////////code for employee expense details
public function insert_employee_expenses_details($para)
	{
		return $this->db->insert('employee_expenses',$para);
	}
public function list_employee_expenses_details($admin_id,$user_id)
	{
		    $this->db->where('admin_id',$admin_id);
		   //  $this->db->where('added_by',$user_id);
		    $this->db->order_by('employee_expenses_id','DESC');
	 return	$this->db->get('employee_expenses')->result();		
			
	}
		public function details_employee_expenses_details_by_id($id)
	{
				$this->db->where('employee_expenses_id',$id);
		return	$this->db->get('employee_expenses')->row();
	}
	
	public function update_employee_expenses_details($id,$data)
	{
				$this->db->where('employee_expenses_id',$id);
		return	$this->db->update('employee_expenses',$data);
	}
	public function delete_employee_expenses_details($id)
	{
	 				$this->db->where('employee_expenses_id',$id);
	 	return		$this->db->delete('employee_expenses');
	}

public function pay_employee_expenses_details($id, $data)
	{
	 				$this->db->where('employee_expenses_id',$id);
	 	return	$this->db->update('employee_expenses',$data);
	}



public function list_all_employee_expenses_details($admin_id)
	{
		    $this->db->where('admin_id',$admin_id);
		  //   $this->db->where('added_by',$user_id);
		    $this->db->order_by('employee_expenses_id','DESC');
	 return	$this->db->get('employee_expenses')->result();		
			
	}
	
	//////////////////////////////////vendor magmt
	public function insert_hr_vendor_details($data){
    	return $this->db->insert('hr_vendor_details', $data);
    }

public function list_hr_vendor_details($admin_id)
	{
	 		$this->db->where('admin_id',$admin_id);
	 	return	$this->db->get('hr_vendor_details')->result();
	}
	public function list_vendor_details_by_id($id)
	{
	 				$this->db->where('hr_vendor_id',$id);
	 	return		$this->db->get('hr_vendor_details')->row();
	}

	public function update_vendor_details($id,$data)
   {
    $this->db->where('hr_vendor_id',$id);
    return $this->db->update('hr_vendor_details',$data); 

   }


   public function delete_vendor_details($id)
	{
	 				$this->db->where('hr_vendor_id',$id);
	 	return		$this->db->delete('hr_vendor_details');
	}
	
	
	public function insert_due_date($data)
	{
	    
	  return  $this->db->insert('due_date',$data);
	   
	}
	
	public function list_due_date($data)
	{
	    
	  return  $this->db->get('due_date')->result();
	   
	}
	
	public function update_due_date($data,$id)
	{
	          $this->db->where('due_id',$id);
	  return  $this->db->update('due_date');
	   
	}
	
	public function  delete_due_date($id)
	{
	           $this->db->where('due_id',$id);
	  return  $this->db->delete('due_date');
	    
	}
	
	
	
	public function insert_raise_issue($data)
	{
	    
	  return  $this->db->insert('raise_issue',$data);
	   
	}
	
	public function list_raise_issue($data)
	{
	    
	  return  $this->db->get('raise_issue')->result();
	   
	}
	 public function get_details_by_issue__id($id)
	 {
	    $this->db->where('issue_id',$id);
	    return $this->db->get('raise_issue')->row();
	     
	 }
	
	public function update_raise_issue($data,$id)
	{
	          $this->db->where('issue_id',$id);
	  return  $this->db->update('raise_issue');
	   
	}


    function get_all_feedbacks($sale_id)
    {
        $this->db->select('BaseTbl.*, user.name, user.l_name')
                 ->from('sales_report_feedback as BaseTbl')
                 ->join('user_admin as user', 'BaseTbl.added_by = user.user_admin_id', 'left')
                 ->where('BaseTbl.sales_id', $sale_id)
                 ->order_by('BaseTbl.created_at', 'DESC');
        return $this->db->get()->result();
    }
    
    public function get_sales_dept_List_excel($from, $to,$user_id)
	{
        $this->db->select('')
                 ->from('sales_report as BaseTbl')
                 ->where('BaseTbl.cr_date BETWEEN "'. date('Y-m-d', strtotime($from)). '" and "'. date('Y-m-d', strtotime($to)).'"')
                 ->where('added_by',$user_id)
                 ->order_by('BaseTbl.sales_id', 'DESC');
        return $this->db->get()->result();
	}
	
	
	public function details_sales_dept_closed_client_admin_dashboard($id)
	{
        	$this->db->select('status,sales_id,client_name,cr_date,added_by,admin_id');
            $this->db->from('sales_report');
            $this->db->where('status',4);
            $this->db->where('admin_id',$id);
            $this->db->order_by('cr_date', 'DESC');
            return $this->db->get()->result();
	
	} 
	
	public function sales_dept_seven_days_meet_on($id)
	{
	    $query =  $this->db->query("SELECT * FROM sales_report WHERE (`meet_on` >= NOW() AND `meet_on` <= NOW() + INTERVAL 7 DAY)  AND admin_id=$id");   
    // print_r($this->db->last_query());exit;
        return $query->result(); 
    } 
	
		public function sales_dept_seven_days_call_on($id)
	{
	    $query =  $this->db->query("SELECT * FROM sales_report WHERE (`call_on` >= NOW() AND `meet_on` <= NOW() + INTERVAL 7 DAY)  AND admin_id=$id");   
    // print_r($this->db->last_query());exit;
        return $query->result(); 
    } 
    
    	public function list_sales_dept_client_from_role_permissions($id)
	{
	    $query =  $this->db->query("SELECT role_id FROM role_permissions WHERE submenu_id='43' and option_id='12' and admin_id=$id");   
    // print_r($this->db->last_query());exit;
        return $query->result(); 
    } 
    
    	public function list_sales_dept_client_details($role_id,$admin_id)
	{
	    $query =  $this->db->query("SELECT name,l_name FROM user_admin WHERE  role=$role_id and status=1 and added_by_user_admin_id=$admin_id");   
    // print_r($this->db->last_query());exit;
        return $query->result(); 
    } 
    
    	public function list_sales_dept_user_details($user_id,$admin_id)
	{
	    $query =  $this->db->query("SELECT * FROM user_admin WHERE  user_admin_id=$user_id and status=1 and added_by_user_admin_id=$admin_id");   
    // print_r($this->db->last_query());exit;
        return $query->result(); 
    } 
    
    public function list_sales_dept_client_from_role_permissions_all($id)
	{
	    $query =  $this->db->query("SELECT * FROM role_permissions WHERE submenu_id='43' and option_id='12' and admin_id=$id");   
    // print_r($this->db->last_query());exit;
        return $query->result(); 
    } 
    
    
    // Rhutuja - 21-12-2020
    public function get_industry_types(){
        $query =  $this->db->query("SELECT * FROM rms_industry ");   
        return $query->result(); 
    }
    public function add_industry($data){
        return $this->db->insert('rms_industry', $data); 
    }
    
    public function list_sales_dept_hot_details(){
		//$query=$this->db->query("SELECT  sr.location, sr.sales_id,sr.client_name,sr.client_type,sr.contact_person,sr.designation,sr.contact_no,sr.email_id,sr.no_of_calling,sr.comment,sr.follow_ups,sr.status,sr.linkedin,sr.source,sr.added_by,sr.cr_date,ua.name,ua.l_name FROM sales_report sr ,user_admin ua WHERE sr.added_by =ua.user_admin_id AND sr.status=1 order by sr.cr_date DESC");
		 //return $query->result();
		$this->db->select('sr.*, user.name, user.l_name');
		$this->db->from('sales_report sr');
		$this->db->join('user_admin user', 'user.user_admin_id = sr.added_by', 'left');
		$this->db->where('sr.status', 1);
		$this->db->or_where('sr.status', 3);
		$this->db->order_by('sr.cr_date', 'DESC');
			$result=$this->db->get()->result();
// 			print_r($this->db->last_query());exit;
	 }

public function get_existing_client_list_sales($admin_id)
	{ 
	    
	    $user_role = $this->session->userdata('user_role');
    	if($user_role==1)
    	{
	    $query =  $this->db->query("SELECT sales_id,client_name,email_id FROM sales_report WHERE  status='4'");   
	    }else{$query =  $this->db->query("SELECT sales_id,client_name,email_id FROM sales_report WHERE admin_id=$admin_id and status='4'");   
	    }
    // print_r($this->db->last_query());exit;
        return $query->result(); 
    } 
    public function insert_email_template($para)
  {
    $this->db->insert('existing_client_email_template',$para);
    return  $result = $this->db->insert_id();
  }

public function list_email_template($admin_id)
  {
    $this->db->select('*');
    $this->db->from('existing_client_email_template');
     $this->db->where('admin_id',$admin_id);
    $this->db->order_by('id','ASC');
    return $this->db->get()->result();
  }

 public function insert_existing_client_email_auto_mail($para)
  {
    $this->db->insert('existing_client_email_auto_mail',$para);
    return  $result = $this->db->insert_id();
  }
  
  public function list_existing_client_email_auto_mail($admin_id)
  {
      $user_role = $this->session->userdata('user_role');
    	if($user_role==1)
    	{
            $this->db->select('*');
            $this->db->from('existing_client_email_auto_mail');
         //    $this->db->where('admin_id',$admin_id);
            $this->db->order_by('exist_client_mail_eid','DESC');
    	}else{
    	    $this->db->select('*');
            $this->db->from('existing_client_email_auto_mail');
             $this->db->where('admin_id',$admin_id);
            $this->db->order_by('exist_client_mail_eid','DESC');
    	}
    return $this->db->get()->result();
  }
  public function list_existing_client_email_auto_mail_by_id($id)
  {
    $this->db->select('*');
    $this->db->from('existing_client_email_auto_mail');
     $this->db->where('exist_client_mail_eid',$id);
    $this->db->order_by('exist_client_mail_eid','DESC');
    return $this->db->get()->row();
  }
  
  public function update_client_email_auto_mail($id,$data)
	{
				$this->db->where('exist_client_mail_eid',$id);
				
		return	$this->db->update('existing_client_email_auto_mail',$data);
	}

	public function update_sales_call_followup_status($id,$status)
	{
				$this->db->where('sales_id',$id);
					$this->db->set('sales_call_followup_status',$status);
		return	$this->db->update('sales_report');
	}
	public function delete_client_email_auto_mail($id)
	{
	 				$this->db->where('exist_client_mail_eid',$id);
	 	return		$this->db->delete('existing_client_email_auto_mail');
	}
	public function insert_sales_client($para_details)
	{
		return $this->db->insert('sales_client_list',$para_details);
	}

	public function update_sales_client($id,$data)
	{
				$this->db->where('sales_client_list_id',$id);
		return	$this->db->update('sales_client_list',$data);
	}
	public function list_sales_client_by_id($id)
	{
				$this->db->where('sales_client_list_id',$id);
		return	$this->db->get('sales_client_list')->row();
	}
    public function list_sales_client()
	{
				$this->db->order_by('sales_client_list_id','ASC');
		return	$this->db->get('sales_client_list')->result();
	}
    public function delete_sales_client($id)
	{
	 				$this->db->where('sales_client_list_id',$id);
	 	return		$this->db->delete('sales_client_list');
	}
	
	public function insert_auto_bulk_email($para)
	{
		   $this->db->insert('existing_client_email_auto_mail',$para);
		  $insert_id= $this->db->insert_id();
     return   $insert_id;
	}
	
	public function get_auto_bulk_email($admin_id)
  {
        $query =  $this->db->query("SELECT distinct u.name,l_name,u.email, e.emp_id,e.dob,e.added_by_user_admin_id FROM `emp_details` e,user_admin u  WHERE u.status=1 AND e.emp_id=u.user_admin_id AND (u.user_admin_id=$admin_id OR u.added_by_user_admin_id=$admin_id ) AND MONTH(dob) = MONTH(NOW()) AND DAY(dob) = DAY(NOW()) group by e.emp_id,u.user_admin_id ");   
        return $query->result_array();    
  }
  
   public function list_admin_user_superadmin()
   {
    $this->db->select('*');
    $this->db->from('user_admin');
    $this->db->where('role',1);
    $this->db->order_by('user_admin_id', 'DESC');  
    //  $this->db->where('added_by_user_admin_id',$admin_id);
    return $this->db->get()->result();
   }
   
   public function list_admin_error_list_superadmin()
	{
	   
			$this->db->select('*');
				$this->db->from('user_admin');
	$this->db->join('admin_error_report', 'user_admin.user_admin_id = 1');
// 	 print_r($this->db->last_query());exit;
	return	 $this->db->get()->result();
				
// 		print_r($s);
// 		exit;
	}
		public function list_modules_admin_module_used($admin_id)
	{
        $this->db->select('*');
// 		$this->db->where(('user_admin.added_by_user_admin_id',$admin_id) OR ());
       $this->db->where('user_admin.user_admin_id',$admin_id);
//  		$this->db->where('user_admin_id !=',1);
// 		$this->db->where('status',1);
		$this->db->from('user_admin');
		$this->db->join('admin_module_used', 'user_admin.user_admin_id = admin_module_used.added_by');
// 		$this->db->order_by('user_admin_id','DESC');
	return	 $this->db->get()->row_array();
// 		 
	}
	public function list_admin_user_superadmin_not_approved()
   {
    $this->db->select('*');
    $this->db->from('user_admin');
    $this->db->where('role',1);
    $this->db->where('status',0);
    $this->db->order_by('user_admin_id', 'DESC');  
    //  $this->db->where('added_by_user_admin_id',$admin_id);
    return $this->db->get()->result();
   }
   /////pf account
   public function insert_emp_provident_fund($para)
	{
		return $this->db->insert('emp_provident_fund',$para);
	}
public function list_emp_provident_fund($admin_id)
	{
		    $this->db->where('admin_id',$admin_id);
		  //   $this->db->where('added_by',$user_id);
		    $this->db->order_by('pf_id','DESC');
	 return	$this->db->get('emp_provident_fund')->result();		
			
	}
		public function details_emp_provident_fund_by_id($id)
	{
				$this->db->where('pf_id',$id);
		return	$this->db->get('emp_provident_fund')->row();
	}
	
	public function update_emp_provident_fund($id,$data)
	{
				$this->db->where('pf_id',$id);
		return	$this->db->update('emp_provident_fund',$data);
	}
	public function delete_emp_provident_fund($id)
	{
	 				$this->db->where('pf_id',$id);
	 	return		$this->db->delete('emp_provident_fund');
	}
	
	public function insert_tax($para)
	{
		return $this->db->insert('emp_tax_form',$para);
	}
public function list_tax($admin_id)
	{
		    $this->db->where('admin_id',$admin_id);
		  //   $this->db->where('added_by',$user_id);
		    $this->db->order_by('emp_tax_id','DESC');
	 return	$this->db->get('emp_tax_form')->result();		
			
	}
		public function details_tax_by_id($id)
	{
				$this->db->where('emp_tax_id',$id);
		return	$this->db->get('emp_tax_form')->row();
	}
	
	public function update_tax($id,$data)
	{
				$this->db->where('emp_tax_id',$id);
		return	$this->db->update('emp_tax_form',$data);
	}
	public function delete_tax($id)
	{
	 				$this->db->where('emp_tax_id',$id);
	 	return		$this->db->delete('emp_tax_form');
	}
	public function hr_list_user_id($admin_id)
	{

		$this->db->select('user_admin_id,name');
		//$this->db->where('user_admin.added_by_user_admin_id',$admin_id);
// 		$this->db->where('role !=',1);
		$this->db->where('(`role` = "2" OR `role` = "5" OR  `role` = "9")');
		$this->db->where('status',1);
		$this->db->from('user_admin');
		
		$this->db->order_by('user_admin_id','DESC');
		return $this->db->get()->result();
	}
	public function get_all_recruiter_list_by_user_id($user_id,$input_date)
	{
        $query = $this->db->query('SELECT tbl_dailyreport_recruiter.*,Count(tbl_dailyreport_recruiter.dailyreport_id) as count_emp,client.client_name,user_admin.name,user_admin.l_name FROM tbl_dailyreport_recruiter,client,user_admin WHERE tbl_dailyreport_recruiter.user_id=user_admin.user_admin_id AND tbl_dailyreport_recruiter.sheetid=client.client_id AND tbl_dailyreport_recruiter.user_id="'.$user_id.'" AND tbl_dailyreport_recruiter.date="'.$input_date.'" AND tbl_dailyreport_recruiter.admin_id=1 ORDER BY client.client_name ASC');
        // return  
      return    $query->result();
        //print_r($this->db->last_query());exit;
// 		$this->db->select('client.client_name as clientname,COUNT(tbl_dailyreport_recruiter.dailyreport_id) as count_emp');
// 		$this->db->from('tbl_dailyreport_recruiter');
// 		$this->db->join('client','client.client_id = tbl_dailyreport_recruiter.sheetid');
// 		$this->db->where('tbl_dailyreport_recruiter.user_id',$user_id);
// 		$this->db->where('tbl_dailyreport_recruiter.date',$input_date);
// // 		$this->db->where('role !=',1);
// 		return $this->db->get()->result();

	}
	
	public function get_all_recruiter_dailyreport_interview_confirmed($fromdate,$todate)
	{
	   // $query = $this->db->query('SELECT * FROM tbl_dailyreport_recruiter WHERE (final_status="Confirm") AND DATE_FORMAT(interview_schedule, "%Y%m%d ") >= '.$fromdate.' AND DATE_FORMAT(interview_schedule, "%Y%m%d") <= '.$todate.' AND admin_id='.$admin_id.' ORDER BY DATE_FORMAT(interview_schedule, "%Y%m%d %H%i%s") ASC');
	    $query = $this->db->query('SELECT tbl_dailyreport_recruiter.*,client.client_name,user_admin.name,user_admin.l_name FROM tbl_dailyreport_recruiter,client,user_admin WHERE tbl_dailyreport_recruiter.user_id=user_admin.user_admin_id AND tbl_dailyreport_recruiter.sheetid=client.client_id AND tbl_dailyreport_recruiter.interview_schedule BETWEEN "'.$fromdate.'" AND "'.$todate.'" AND tbl_dailyreport_recruiter.admin_id=1 ORDER BY tbl_dailyreport_recruiter.dailyreport_id DESC');
        return  $query->result();
        //print_r($this->db->last_query()); exit;
	}
	
	public function create_password_existing_vendor_user($data,$user_admin_id)
	{
	    $this->db->where('user_admin_id',$user_admin_id);
		return	$this->db->update('user_admin',$data);
	}
	
	public function insert_vendor_user_data($data) 
	{
	    $this->db->insert('user_admin', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function insert_vendor_entry($data)
	{
	    $this->db->insert('vendor_users_details', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
	}
	
	public function get_user_vendor_list()
	{
	    $this->db->select("*");
	    $this->db->from("vendor_users_details");
	    $this->db->join('user_admin', 'user_admin.user_admin_id = vendor_users_details.vendor_user_id', 'inner');
	    return $this->db->get()->result();
	}
	
	public function get_vendor_details_by_id($id)
	{
	    $this->db->select("vendor_users_details.*,user_admin.*,vendor_users_details.follow_joining_process as vendor_joining_process");
	    $this->db->from("vendor_users_details");
	    $this->db->join('user_admin', 'user_admin.user_admin_id = vendor_users_details.vendor_user_id', 'inner');
	    $this->db->where("id",$id);
	    return $this->db->get()->row();
	}
	
	/*public function update_user($id,$data)
	{
				$this->db->where('user_admin_id',$id);
		return	$this->db->update('user_admin',$data);
	}*/
	
	public function update_vendor_entry($id,$data)
	{
				$this->db->where('id',$id);
		return	$this->db->update('vendor_users_details',$data);
	}
	public function delete_vendor_user_details($id)
	{
	 			    $this->db->where('id',$id);
	 		return	$this->db->delete('vendor_users_details');
	}
	public function get_vendor_details_by_user_admin_id($id)
	{
	    $this->db->select("vendor_users_details.*,user_admin.*,vendor_users_details.follow_joining_process as vendor_joining_process");
	    $this->db->from("vendor_users_details");
	    $this->db->join('user_admin', 'user_admin.user_admin_id = vendor_users_details.vendor_user_id', 'inner');
	    $this->db->where("user_admin_id",$id);
	    return $this->db->get()->row();
	}
}
?>