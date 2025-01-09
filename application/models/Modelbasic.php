<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Modelbasic extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function saveJobData($data) {
        $this->db->insert('tbl_candidate_job_post', $data);
        return $this->db->insert_id();
    }
        public function getJobPostWithApplications($job_id) {
        $this->db->select('jp.*, ja.candidate_id, COUNT(ja.candidate_id) AS application_count');
        $this->db->from('tbl_candidate_job_post jp');
        $this->db->join('tbl_candidate_job_apply ja', 'jp.job_id = ja.job_id', 'left');
        $this->db->where('jp.job_id', $job_id);
        $this->db->group_by('jp.job_id');
    
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->row_array(); // Return a single row as an associative array
        } else {
            return null; // No job post found
    }
}
public function get_job_data($job_id)
{
    $this->db->where('job_id', $job_id);
    $query = $this->db->get('tbl_candidate_job_post');
    return $query->result_array();
    // return $this->db->get_where('tbl_candidate_job_post', array('job_id' => $job_id))->row_array();
}

    
    public function get_all_jobs_by_company($companyId) {
    $this->db->where('added_by', $companyId);
    $query = $this->db->get('tbl_candidate_job_post');
    return $query->result_array();
}
    public function save_company_data($companyId, $data)
    {
        $this->db->where('added_by', $companyId);
        return $this->db->insert('tbl_candidate_job_post', $data); 
    }
    public function update_company_data($companyId, $data) {
        $this->db->where('id', $companyId);
        return $this->db->update('user_admin', $data);
    }
    public function get_job_count_by_company($companyId)
    {
        $this->db->where('added_by', $companyId);
        $this->db->from('tbl_candidate_job_post'); 
        return $this->db->count_all_results();
    }
    public function countJobsByCompany($companyId) {
    $this->db->where('added_by', $companyId);
    return $this->db->count_all_results('tbl_candidate_job_post');
}
 public function PostJobOnSocialMedia($url)
    {
        // Example usage of HttpClient to make a GET request
      //  $url = 'https://jsonplaceholder.typicode.com/posts/1';
        $response = $this->httpclient->get($url);
        
        // Display the response
        echo $response;
    }

	function _update($table,$id, $data)
	{
		$this->db->where('user_admin_id', $id);
		return $this->db->update($table, $data);
	}

	function _update_task($table,$id, $data)
	{
		       $this->db->where('task_id', $id);
		return $this->db->update($table, $data);
	}

	function get_entity_data()
	{ 
	    return $this->db->get('cities')->result();
	}
	
	public function get_indian_state_cities()
	{
	    $this->db->select("*");
	    $this->db->from("cities");
	    $this->db->where("state_id",22);
	    return $this->db->get()->result();
	}
	
   public function get_country_list()
	{
	    $this->db->select("*");
	    $this->db->from("countries");
	    return $this->db->get()->result_array();
	}
	
	public function get_department_list()
	{
	    $this->db->select("*");
	    $this->db->from("department");
	    return $this->db->get()->result_array();
	}
	
	public function get_states_list($country_id)
	{
	    $this->db->select("*");
	    $this->db->from("states");
	    $this->db->where("country_id",$country_id);
	    return $this->db->get()->result_array();
	}
	
	public function get_city_list_by_state_id($state_id)
	{
	    $this->db->select("*");
	    $this->db->from("cities");
	    $this->db->where("state_id",$state_id);
	    return $this->db->get()->result_array();
	}


   public function insert_job_post($para)
   {
      $this->db->insert("tbl_candidate_job_post", $para);
      return $this->db->insert_id();
    }	
    
    public function get_list_job_post()
    {
        $this->db->select("*");
        $this->db->from("tbl_candidate_job_post");
        /*$this->db->join('client', 'client.client_id = tbl_candidate_job_post.company_name');*/
        $this->db->join('candidate_course', 'candidate_course.course_id = tbl_candidate_job_post.education');
        $this->db->order_by("job_id", "desc");
        return $this->db->get()->result();
    }    
    
    public function delete_job_post($job_post_id)
    {
        $this->db->where('job_id',$job_post_id);
	 	return $this->db->delete('tbl_candidate_job_post');
    }
    
    public function get_details_job_post($job_post_id)
    {
        $this->db->select('*');
	 	$this->db->from('tbl_candidate_job_post');
	 	$this->db->where('job_id',$job_post_id);
	 	$this->db->join('client', 'client.client_id = tbl_candidate_job_post.company_name');
        $this->db->join('candidate_course', 'candidate_course.course_id = tbl_candidate_job_post.education');
	 	return $this->db->get()->row();
    }
    
    function update_job_post_details($job_post_id,$data)
	{
		$this->db->where('job_id',$job_post_id);
		return $this->db->update("tbl_candidate_job_post", $data);
	}
	
	function get_all_courses()
	{
	    $this->db->select("*");
	    $this->db->from("candidate_course");
	    return $this->db->get()->result();
	}
    
    
   
}