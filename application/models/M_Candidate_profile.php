<?php 
class M_Candidate_profile  extends CI_Model{
    
    public function insert_candidate_registration($insert_data)
	{
	//	return $this->db->insert('tbl_candidate_registration', $insert_data);
	$this->db->insert('user_admin',$insert_data);
		return	$result = $this->db->insert_id();
	}
	
	public function get_candidate_project_details($candidate_id)
	{
	    $this->db->select("*");
	    $this->db->from("tbl_candidate_project");
	    $this->db->where("candidate_id",$candidate_id);
	    return $this->db->get()->result();
	}
	
	public function get_project_details_by_candidate_project_id($candidate_project_id)
	{
	    $this->db->select("*");
	    $this->db->from("tbl_candidate_project");
	    $this->db->where("candidate_project_id",$candidate_project_id);
	    return $this->db->get()->row();
	}
	public function insert_candidate_tbl_recruiter($insert_para)
	{
	    $this->db->insert('tbl_dailyreport_recruiter',$insert_para);
	    return	$result = $this->db->insert_id();
	}
	
	public function save_candidate_skills($insert_para)
	{
	   $this->db->insert('tbl_candidate_skills_jobs',$insert_para);
	    return	$result = $this->db->insert_id();
	}
	
  public function update_candidate_skills($candidate_key_skills_id,$insert_para)
	{
	   $this->db->where("id",$candidate_key_skills_id);
	   return $this->db->update('tbl_candidate_skills_jobs',$insert_para);
	}
    
    public function get_select_dept_role_dep_id($dept_id)
    {
        $this->db->select("role_id");
        $this->db->from("emp_role");
        $this->db->where("dept_id",$dept_id);
        return $this->db->get()->row()->role_id;
    }
    public function insert_social_platform_data_candidate($insert_data)
    {
    //  return $this->db->insert('tbl_candidate_registration', $insert_data);
    $this->db->insert('tbl_social_platform_candidate',$insert_data);
        return  $result = $this->db->insert_id();
    }

     public function insert_work_samples_data_candidate($insert_data)
    {
    //  return $this->db->insert('tbl_candidate_registration', $insert_data);
    $this->db->insert('tbl_work_samples_candidate',$insert_data);
        return  $result = $this->db->insert_id();
    }


     public function get_employment_candidate($candidate_id)
    {

        $this->db->select("*");
        $this->db->from("tbl_employment_candidate as tec");
        $this->db->where("tec.candidate_id",$candidate_id);        
        return $this->db->get()->result();
    }

    public function get_social_platform($candidate_id){
        $this->db->select("*");
        $this->db->from("tbl_social_platform_candidate");
        $this->db->where("candidate_id",$candidate_id);
        return $this->db->get()->result();
    }

    public function get_specialization_by_course_id($course_id){
        $this->db->select("*");
        $this->db->from("specialization_course");
        $this->db->where("course_id",$course_id);
        return $this->db->get()->result();

    }


    public function get_candidate_education($candidate_education_id){
        $this->db->select("*");
        $this->db->from("tbl_candidate_education");
        $this->db->where("candidate_education_id",$candidate_education_id);
        return $this->db->get()->result();
    }

      public function get_candidate_education_by_candidate($candidate_id){
        $this->db->select("*");
        $this->db->from("candidate_education");
        $this->db->where("candidate_id",$candidate_id);
        return $this->db->get()->result();
    }
    
	
    public function get_work_samples($candidate_id){
        $this->db->select("*");
        $this->db->from("tbl_work_samples_candidate");
        $this->db->where("candidate_id",$candidate_id);
        return $this->db->get()->result(); 
    }

    public function get_certifications($candidate_id){
        $this->db->select("*");
        $this->db->from("tbl_certification_candidate");
        $this->db->where("candidate_id",$candidate_id);
        return $this->db->get()->result(); 
    }
    

    public function get_all_cities_candidate_preferred($preferred_location){
        $this->db->select("*");
        $this->db->from("tbl_cities");
        $this->db->where("city_code IN($preferred_location)");
        return $this->db->get()->result();


    }
	
	public function get_all_education_details($candidate_id){
	    $this->db->select('*');
	    $this->db->from('candidate_education');
        $this->db->where("candidate_id",$candidate_id);
	   /* $this->db->join('specialization_course', 'candidate_course.course_id = specialization_course.course_id', 'inner');*/
	    return $this->db->get()->result();
	     
	}
    public function get_candidates_keyskill($candidate_id){
	    $this->db->select('*');
	    $this->db->from('tbl_candidate_skills_jobs');
        $this->db->where("candidate_id",$candidate_id);
	   /* $this->db->join('specialization_course', 'candidate_course.course_id = specialization_course.course_id', 'inner');*/
	    return $this->db->get()->result();
	     
	}
public function check_stats_and_city(){
      $response = array();
      $post= $this->input->post();
       // print_r($post['search']); die();
      $this->db->select('name,id');      
      if($post['search'])
      {        
          $this->db->where("name like '%".$post['search']."%' ");
          $this->db->where("state_id",22);
          $result = $this->db->get('cities')->result();
            //print_r($result); die();
          foreach($result as $row )
          {
              $response[] = array("label"=>$row->name,"id"=>$row->id);
          }
      }

      return $response;
}
    public function insert_job_candidate($data)
    {
    $this->db->insert('tbl_candidate_job_apply',$data);
    return  $result = $this->db->insert_id();
    } 
    public function getEmailByJobId($job_id) {
        $this->db->select('ua.email');
        $this->db->from('tbl_candidate_job_apply cj');
        $this->db->join('tbl_candidate_job_post jp', 'cj.job_id = jp.job_id');
        $this->db->join('user_admin ua', 'jp.added_by = ua.user_admin_id');
        $this->db->where('cj.job_id', $job_id);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->row()->email;
        } else {
            return null; // Or handle the case when no data is found
        }
    }

 public function check_user_job_apply_or_not($job_id,$candidate_id){
          $this->db->select("*");
          $this->db->from("tbl_candidate_job_apply");
          $this->db->where("job_id",$job_id);
          $this->db->where("candidate_id",$candidate_id);
          return  $this->db->get()->row();
 } 

public function all_jobs() {
    $sql = 'SELECT tbl_candidate_job_post.*, candidate_course.*, client.*, cities.id as city_id, cities.name 
            FROM `tbl_candidate_job_post` 
            LEFT JOIN candidate_course ON tbl_candidate_job_post.education = candidate_course.course_id  
            LEFT JOIN cities ON tbl_candidate_job_post.job_location = cities.id 
            LEFT JOIN client ON tbl_candidate_job_post.company_name = client.client_id 
            ORDER BY tbl_candidate_job_post.job_id DESC 
            LIMIT 6';
    
    $query = $this->db->query($sql);
    return $query->result();
}
public function get_candidate_jobs() {
    $sql = 'SELECT * FROM tbl_candidate_job_post ORDER BY job_id DESC';
    $query = $this->db->query($sql);
    return $query->result();
}

public function client_list(){
    $this->db->select("*");
    $this->db->from("client");
    return $this->db->get()->result();
}

public function client_list_job(){
    $this->db->select("*");
    $this->db->from("client");
    $this->db->where("client_id",89);
    return $this->db->get()->result();
}

public function all_cities(){
    $this->db->select("*");
    $this->db->from("cities");
    $this->db->where("state_id",22);
    return $this->db->get()->result();
}
public function get_all_jobs($location){
    $this->db->select("*");
    $this->db->from("tbl_candidate_job_post");
    $this->db->where("job_location",$location);
    return $this->db->get()->result();
}
public function get_jobs_count_by_location() {
    $this->db->select("job_location, COUNT(*) as job_count");
    $this->db->from("tbl_candidate_job_post");
    $this->db->group_by("job_location");
    return $this->db->get()->result();
}
public function get_jobs_count_by_job_location_ids($location_ids) {
    $this->db->select("job_location, COUNT(*) as job_count");
    $this->db->from("tbl_candidate_job_post");
    $this->db->where_in("job_location", $location_ids); // Filter by job_location IDs
    $this->db->group_by("job_location");
    return $this->db->get()->result();
}
public function check_job_apply_status($job_id,$candidate_id){
    $this->db->select("*");
    $this->db->from("tbl_candidate_job_apply");
    $this->db->where("job_id",$job_id);
    $this->db->where("candidate_id",$candidate_id);
    return $this->db->get()->row();

}
public function get_details_job_selected($job_id)
{
    $this->db->select("*");
    $this->db->from("tbl_candidate_job_post");
    $this->db->where("job_id",$job_id);
    return $this->db->get()->row();
}

/*public function ($searchTerm, $jobId) {
    $this->db->select("*");
    $this->db->from("tbl_candidate_job_post");
    $this->db->like('key_skills', $searchTerm);
    $this->db->or_like('profile', $searchTerm);
    $this->db->where("job_id !=", $jobId);
    $this->db->join('client cl', 'cl.client_id = tbl_candidate_job_post.company_name', 'left');
    return $this->db->get()->result();
}*/

public function check_similar_job($searchTerm,$jobId)
  {
    $query=$this->db->query("SELECT * FROM tbl_candidate_job_post INNER JOIN client as cl ON cl.client_id=tbl_candidate_job_post.company_name WHERE( key_skills LIKE '%$searchTerm%' OR profile='$searchTerm') AND job_id!= $jobId ");
    return $query->result();
  }

public function get_job_description($id)
    {
    $sql = 'SELECT tbl_candidate_job_post.*,candidate_course.*  FROM `tbl_candidate_job_post` INNER JOIN candidate_course ON tbl_candidate_job_post.education=candidate_course.course_id
      WHERE `job_id` IN ('.$id.')';
    $query = $this->db->query($sql);
    return   $exporters=$query->row();
        
    }

/*public function filter_all(){

$post=$this->input->post();

if(!empty($post['salary'])){
 $salary=implode(",",$post['salary']);   
}
if(!empty($post['educations'])){
$educations=implode(",",$post['educations']);
}
if(!empty($post['companies'])){
$companies=implode(",",$post['companies']);
}
if(!empty($post['location'])){
$location=implode(",",$post['location']);
}

$this->db->select("tcjp.*,c.*,cs.*,cl.*");
$this->db->from("tbl_candidate_job_post as tcjp");
if(!empty($companies)){
$this->db->where("company_name IN($companies)");
}
if(!empty($educations)){
$this->db->where("education IN($educations)");
}
if(!empty($location)){
$this->db->where("job_location IN($location)");
}
if(!empty($post["min_exp"] && $post["max_exp"])){
    $this->db->where('min_exp_candidate >=', $post["min_exp"]);
    $this->db->where('max_exp_candidate <=', $post["min_exp"]); 
}
$this->db->join('cities c', 'c.id=tcjp.job_location', 'left');
$this->db->join('client cl', 'cl.client_id=tcjp.company_name', 'left');
$this->db->join('candidate_course cs', 'cs.course_id=tcjp.education', 'left');

return $this->db->get()->result();

}*/
public function getAllProfilesWithCount()
{
    $query = $this->db->query("
        SELECT profile, CONCAT(profile, ' (', COUNT(*), ')') AS profile_with_count
        FROM tbl_candidate_job_post
        GROUP BY profile
        ORDER BY COUNT(*) DESC
    ");

    return $query->result_array();
}
// public function getAllLocationWithCount()
// {
//     $query = $this->db->query("
//         SELECT job_location, CONCAT(job_location, ' (', COUNT(*), ')') AS job_location_with_count
//         FROM tbl_candidate_job_post
//         GROUP BY job_location
//         ORDER BY COUNT(*) DESC
//     ");

//     return $query->result_array();
// }
public function getAllLocationWithCount()
{
    $query = $this->db->query("
SELECT 
    j.job_location, 
    MAX(c.name) AS name, -- Display one representative name (if needed)
    CONCAT(' (', COUNT(*), ')') AS job_location_with_count
FROM 
    tbl_candidate_job_post j
JOIN 
    cities c ON j.job_location = c.id -- Match job_location with cities.id
GROUP BY 
    j.job_location
ORDER BY 
    COUNT(*) DESC;
    ");

    return $query->result_array();
}
public function getAllEducationWithCount()
{
    $query = $this->db->query("
SELECT 
    j.education, 
    MAX(c.course_name) AS name, -- Display one representative name (if needed)
    CONCAT(' (', COUNT(*), ')') AS education_with_count
FROM 
    tbl_candidate_job_post j
JOIN 
    candidate_course c ON j.education = c.course_id -- Match education with cities.id
GROUP BY 
    j.education
ORDER BY 
    COUNT(*) DESC;
    ");

    return $query->result_array();
}
public function getAllCompanyWithCount()
{
    $query = $this->db->query("
SELECT company_name, CONCAT(company_name, ' (', COUNT(*), ')') AS company_name_with_count
        FROM tbl_candidate_job_post
        GROUP BY company_name
        ORDER BY COUNT(*) DESC
    ");

    return $query->result_array();
}
public function getAllDepartmentWithCount()
{
    $query = $this->db->query("
SELECT department, CONCAT(department, ' (', COUNT(*), ')') AS department_with_count
        FROM tbl_candidate_job_post
        GROUP BY department
        ORDER BY COUNT(*) DESC
    ");

    return $query->result_array();
}
public function getAllSalaryWithCount()
{
    $query = $this->db->query("
SELECT 
    CASE
        WHEN comany_min_package_offer = 'less_50000_per_year' AND comany_max_package_offer <= '3.5_lakh_per_year' THEN 'less than 50k'
        WHEN comany_min_package_offer > '50000_per_year' AND comany_max_package_offer <= '3.5_lakh_per_year' THEN '50k - 3.5 lakh'
        WHEN comany_min_package_offer > '3.5_lakh_per_year' AND comany_max_package_offer <= '6_lakh_per_year' THEN '3.5 lakh - 6 lakh'
        WHEN comany_min_package_offer >= '6_lakh_per_year' AND comany_max_package_offer <= '11_lakh_per_year' THEN '6 lakh - 11 lakh'
        WHEN comany_min_package_offer > '11_lakh_per_year' AND comany_max_package_offer <= '15_lakh_per_year' THEN '11 lakh - 15 lakh'
        WHEN comany_min_package_offer > '15_lakh_per_year' AND comany_max_package_offer <= '20_lakh_per_year' THEN '15 lakh - 20 lakh'
        WHEN comany_min_package_offer > '20_lakh_per_year' AND comany_max_package_offer <= '25_lakh_per_year' THEN '20 lakh - 25 lakh'
        WHEN comany_min_package_offer > '25_lakh_per_year' AND comany_max_package_offer <= '30_lakh_per_year' THEN '25 lakh - 30 lakh'
        WHEN comany_min_package_offer > '30_lakh_per_year' AND comany_max_package_offer <= '35_lakh_per_year' THEN '30 lakh - 35 lakh'
        WHEN comany_min_package_offer > '35_lakh_per_year' AND comany_max_package_offer <= '40_lakh_per_year' THEN '35 lakh - 40 lakh'
    END AS salary_range,
    COUNT(*) AS total_count
FROM 
    tbl_candidate_job_post
WHERE 
    (comany_min_package_offer = 'less_50000_per_year' AND comany_max_package_offer <= '3.5_lakh_per_year')
    OR (comany_min_package_offer > '50000_per_year' AND comany_max_package_offer <= '3.5_lakh_per_year')
    OR (comany_min_package_offer > '3.5_lakh_per_year' AND comany_max_package_offer <= '6_lakh_per_year')
    OR (comany_min_package_offer >= '6_lakh_per_year' AND comany_max_package_offer <= '11_lakh_per_year')
    OR (comany_min_package_offer > '11_lakh_per_year' AND comany_max_package_offer <= '15_lakh_per_year')
    OR (comany_min_package_offer > '15_lakh_per_year' AND comany_max_package_offer <= '20_lakh_per_year')
    OR (comany_min_package_offer > '20_lakh_per_year' AND comany_max_package_offer <= '25_lakh_per_year')
    OR (comany_min_package_offer > '25_lakh_per_year' AND comany_max_package_offer <= '30_lakh_per_year')
    OR (comany_min_package_offer > '30_lakh_per_year' AND comany_max_package_offer <= '35_lakh_per_year')
    OR (comany_min_package_offer > '35_lakh_per_year' AND comany_max_package_offer <= '40_lakh_per_year')
GROUP BY 
    salary_range
ORDER BY 
    FIELD(salary_range,
        'less than 50k',
        '50k - 3.5 lakh',
        '3.5 lakh - 6 lakh',
        '6 lakh - 11 lakh',
        '11 lakh - 15 lakh',
        '15 lakh - 20 lakh',
        '20 lakh - 25 lakh',
        '25 lakh - 30 lakh',
        '30 lakh - 35 lakh',
        '35 lakh - 40 lakh'
    ) ASC;
    ");

    return $query->result_array();
}
public function getAllWorkModeWithCount()
{
    $query = $this->db->query("
SELECT 
    mode, 
    COUNT(*) AS mode_with_count
FROM 
    tbl_candidate_job_post
WHERE 
    mode IS NOT NULL AND mode != ''
GROUP BY 
    mode
ORDER BY 
    COUNT(*) DESC;

    ");

    return $query->result_array();
}


public function filter_all()
{
    $post = $this->input->post();

    // $salary = !empty($post['salary']) ? implode(",", $post['salary']) : null;
    $salary_ranges = !empty($salary) ? explode(",", $salary) : [];

    $educations = !empty($post['educations']) ? implode(",", $post['educations']) : null;
    $experience = !empty($post['experience']) ? $post['experience'] : null;
    // $experience = !empty($post['experience']) ? implode(",", $post['experience']) : null;
    // print_r($experience); die();
    $companies = !empty($post['companies']) ? implode(",", $post['companies']) : null;
    $location = !empty($post['location']) ? implode(",", $post['location']) : null;
    $work_mode = !empty($post['work_mode']) ? $post['work_mode'] : null;
    $department = !empty($post['department']) ? $post['department'] : null;
    $profile = !empty($post['profile']) ? $post['profile'] : null; // New addition

    $this->db->select("tcjp.*, c.*, cs.*, cl.*");
    $this->db->from("tbl_candidate_job_post as tcjp");

    // if (!empty($salary_ranges)) {
    //     $this->db->group_start();
    //     foreach ($salary_ranges as $range) {
    //         [$comany_min_package_offer, $comany_max_package_offer] = explode('-', $range);
    //         $this->db->or_where("(tcjp.comany_min_package_offer >= $comany_min_package_offer AND tcjp.comany_max_package_offer <= $comany_max_package_offer)");
    //     }
    //     $this->db->group_end();
    // }
    if (!empty($salary_ranges)) {
        $this->db->group_start();
        foreach ($salary_ranges as $range) {
            $range_parts = explode('-', $range);
            if (count($range_parts) == 2) {
                $min = (float) $range_parts[0];
                $max = (float) $range_parts[1];
                $this->db->or_where("(tcjp.comany_min_package_offer >= $min AND tcjp.comany_max_package_offer <= $max)");
            }
        }
        $this->db->group_end();
    }
    
    if (!empty($companies)) {
        $this->db->where("company_name IN ($companies)");
    }
    if (!empty($educations)) {
        $this->db->where("education IN ($educations)");
    }
    if (!empty($experience)) {
        $experience_range = explode('-', $experience);
        if (count($experience_range) == 2) {
            $min_exp = (int)$experience_range[0];
            $max_exp = (int)$experience_range[1];
            $this->db->where('min_exp_candidate >=', $min_exp);
            $this->db->where('max_exp_candidate <=', $max_exp);
        }
    }
    if (!empty($location)) {
        $this->db->where("job_location IN ($location)");
    }
    if (!empty($work_mode)) {
        $this->db->where_in("mode", $work_mode);
    }
    if (!empty($department)) { 
        $this->db->where_in("department", $department); // Use department filter
    }
    if (!empty($profile)) {
        $this->db->where_in("profile", $profile); // Use department filter
    }
    // if (!empty(@$post["min_exp"]) && !empty(@$post["max_exp"])) {
    //     $this->db->where('min_exp_candidate >=', $post["min_exp"]);
    //     $this->db->where('max_exp_candidate <=', $post["max_exp"]);
    // }

    $this->db->join('cities c', 'c.id = tcjp.job_location', 'left');
    $this->db->join('client cl', 'cl.client_id = tcjp.company_name', 'left');
    $this->db->join('candidate_course cs', 'cs.course_id = tcjp.education', 'left');

    return $this->db->get()->result();
}

public function search_job($search, $category, $location, $pin_code, $skills, $work_mode = null)
{
    $this->db->select('tbl_candidate_job_post.*, cities.id as city_id, cities.name');
    $this->db->from('tbl_candidate_job_post');
    
    // Search based on key_skills or profile
    if (!empty($search)) {
        $this->db->group_start(); // Start a group for OR conditions
        $this->db->like('key_skills', $search);
        $this->db->or_like('profile', $search);
        $this->db->group_end(); // End the group for OR conditions
    }
    
    // Search based on job location
    if (!empty($location)) {
        $this->db->group_start();
        $this->db->or_like('job_location', $location);
        $this->db->group_end();
    }
    
    // Search based on job opening area pincode
    if (!empty($pin_code)) {
        $this->db->group_start();
        $this->db->or_like('job_opening_area_pincode', $pin_code);
        $this->db->group_end();
    }

    // Search based on experience category
    if (!empty($category)) {
        $this->db->group_start(); // Start a group for AND conditions
        $this->db->where('min_exp_candidate >=', $category);
        $this->db->or_where('max_exp_candidate <=', $category);
        $this->db->group_end(); // End the group for AND conditions
    }
    if (!empty($skills)) {
        $this->db->like('key_skills', $skills);
    }
    // Filter by work_mode if provided (internship or contractual)
    if (!empty($work_mode)) {
        if (is_array($work_mode)) {
            $this->db->where_in('work_mode', $work_mode); // For multiple work modes
        } else {
            $this->db->where('work_mode', $work_mode); // For a single work mode
        }
    }

    // Join with the cities table to get city details
    $this->db->join('cities', 'tbl_candidate_job_post.job_location = cities.id');
    
    // Execute the query
    $query = $this->db->get();
    
    return $query->result();
}
public function get_candidate_count_by_job_id($id)
{
    $this->db->from('tbl_candidate_job_apply');
    $this->db->where('job_id', $id);
    return $this->db->count_all_results();
}

// multple visit multiple count for single candidate
// public function update_visit_count($candidate_id, $id)
// {
//     // Check if an entry exists for the candidate and job
//     $this->db->where('candidate_id', $candidate_id);
//     $this->db->where('job_id', $id);
//     $query = $this->db->get('tbl_job_visits');

//     if ($query->num_rows() > 0) {
//         // Increment the visit count
//         $this->db->set('visit_count', 'visit_count + 1', FALSE);
//         $this->db->where('candidate_id', $candidate_id);
//         $this->db->where('job_id', $id);
//         $this->db->update('tbl_job_visits');
//     } else {
//         // Insert a new row for the candidate and job
//         $this->db->insert('tbl_job_visits', [
//             'candidate_id' => $candidate_id,
//             'job_id' => $id,
//             'visit_count' => 1
//         ]);
//     }
// }

public function update_visit_count($candidate_id, $job_id)
{
    $this->db->where('candidate_id', $candidate_id);
    $this->db->where('job_id', $job_id);
    $query = $this->db->get('tbl_job_visits');

    if ($query->num_rows() == 0) {
        $this->db->insert('tbl_job_visits', [
            'candidate_id' => $candidate_id,
            'job_id' => $job_id,
            'visit_count' => 1
        ]);
    }
}

public function get_visit_count($job_id)
{
    $this->db->select('SUM(visit_count) as total_visits');
    $this->db->from('tbl_job_visits');
    $this->db->where('job_id', $job_id);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->row()->total_visits;
    }
    return 0;
}

public function update_search_appearance_count($candidate_id)
{
    $this->db->where('candidate_id', $candidate_id);
    $query = $this->db->get('tbl_profile_search_appearance');

    if ($query->num_rows() == 0) {
        $this->db->insert('tbl_profile_search_appearance', [
            'candidate_id' => $candidate_id,
            'visit_count' => 1
        ]);
    }
}

// public function get_search_appearance_count($candidate_id)
// {
//     $this->db->select('SUM(search_count) as total_search');
//     $this->db->from('tbl_profile_search_appearance');
//     $this->db->where('candidate_id', $candidate_id);
//     $query = $this->db->get();

//     if ($query->num_rows() > 0) {
//         return $query->row()->total_visits;
//     }
//     return 0;
// }

// old
// public function search_job($search,$category,$location,$pin_code)
// {
  
//   $this->db->select('tbl_candidate_job_post.*, cities.id as city_id, cities.name');
//   $this->db->from('tbl_candidate_job_post');
//   if (!empty($search)) 
//   {
//       $this->db->group_start(); // Start a group for OR conditions
//       $this->db->like('key_skills', $search);
//       $this->db->or_like('profile', $search);
//       $this->db->group_end(); // End the group for OR conditions
//   }
  
//   if (!empty($location)) 
//   {     
//       $this->db->group_start();   
//       $this->db->or_like('job_location', $location);
//       $this->db->group_end(); 
//   }
//   if (!empty($pin_code)) 
//   {   $this->db->group_start();   
//       $this->db->or_like('job_opening_area_pincode', $pin_code);
//       $this->db->group_end(); 
//   }

//   if (!empty($category)) 
//   {
//      $this->db->group_start(); // Start a group for AND conditions
//      $this->db->where('min_exp_candidate >=', $category);
//      $this->db->or_where('max_exp_candidate <=', $category);
//      $this->db->group_end(); // End the group for AND conditions
//   }
//   $this->db->join('cities', 'tbl_candidate_job_post.job_location = cities.id');
//   $query = $this->db->get();
//   return $query->result();
// }

public function get_all_companies(){
    $this->db->select("*");
    $this->db->from("client");
return  $this->db->get()->result();
}


public function get_job_post_company($company_id){
    $sql = 'SELECT tbl_candidate_job_post.*,client.*,cities.id as city_id,cities.name FROM `tbl_candidate_job_post` INNER JOIN candidate_course ON tbl_candidate_job_post.education=candidate_course.course_id  INNER JOIN cities ON tbl_candidate_job_post.job_location=cities.id INNER JOIN client ON tbl_candidate_job_post.company_name=client.client_id
      WHERE `company_name` IN ('.$company_id.')';
    $query = $this->db->query($sql);
    return   $exporters=$query->result();
}


public function search_company_records($compnies_id){
    $sql = 'SELECT * FROM `tbl_candidate_job_post` INNER JOIN candidate_course ON tbl_candidate_job_post.education=candidate_course.course_id  INNER JOIN cities ON tbl_candidate_job_post.job_location=cities.id INNER JOIN client ON tbl_candidate_job_post.company_name=client.client_id
      WHERE `company_name` IN ('.$compnies_id.')';
    $query = $this->db->query($sql);
    return   $exporters=$query->result();

}


public function filter_education($search_education){

$sql = 'SELECT tbl_candidate_job_post.*,candidate_course.*,client.*,cities.id as city_id,cities.name FROM `tbl_candidate_job_post` INNER JOIN candidate_course ON tbl_candidate_job_post.education=candidate_course.course_id  INNER JOIN cities ON tbl_candidate_job_post.job_location=cities.id INNER JOIN client ON tbl_candidate_job_post.company_name=client.client_id
      WHERE `education` IN ('.$search_education.')';


    /*$sql = 'SELECT * FROM `tbl_candidate_job_post` INNER JOIN candidate_course ON tbl_candidate_job_post.education=candidate_course.course_id  INNER JOIN cities ON tbl_candidate_job_post.job_location=cities.id   WHERE `education` IN ('.$search_education.')';*/
    $query = $this->db->query($sql);
    return   $exporters=$query->result();

}


public function get_location_filter($search_location){

   /* $sql = 'SELECT * FROM `tbl_candidate_job_post` INNER JOIN cities ON tbl_candidate_job_post.job_location=cities.id WHERE `job_location` IN ('.$search_location.')';*/


    $sql = 'SELECT tbl_candidate_job_post.*,candidate_course.*,client.*,cities.id as city_id,cities.name FROM `tbl_candidate_job_post` INNER JOIN candidate_course ON tbl_candidate_job_post.education=candidate_course.course_id  INNER JOIN cities ON tbl_candidate_job_post.job_location=cities.id INNER JOIN client ON tbl_candidate_job_post.company_name=client.client_id
      WHERE `job_location` IN ('.$search_location.')';
    $query = $this->db->query($sql);
    return   $exporters=$query->result();
   

   /* print_r($exporters); die();
          $this->db->select("*");
          $this->db->from("tbl_candidate_job_post");
          $this->db->where_in("job_location",$search_location);
          $this->db->get()->result();
          print_r($this->db->last_query()); die();*/
}

public function get_all_education(){
          $this->db->select("*");
          $this->db->from("candidate_course");
  return  $this->db->get()->result();
}
public function get_all_internship(){
    $this->db->where('work_mode', 'internship');
    $query= $this->db->get('tbl_candidate_job_post');
    return $query->result_array();
}

public function get_all_department(){
          $this->db->select("*");
          $this->db->from("department");
  return  $this->db->get()->result();
}

	
	public function get_record_by_carrer($candidate_id)
	{
	    $this->db->select("*");
	    $this->db->from("tbl_candidate_career_profile");
	    $this->db->where("employee_id",$candidate_id);
	  return  $this->db->get()->row();
	}
	
	public function get_all_cities_states(){
	    $this->db->select("tc.*,cc.*");
	    $this->db->from('tbl_cities tc');
	    $this->db->join('tbl_states cc', 'tc.state_code = cc.id', 'inner');
	    return $this->db->get()->result();
	}
	
	public function get_candidate_selected_cities($city_codes)
	{
	    $this->db->select("city_name");
	    $this->db->from("tbl_cities");
	    $this->db->where_in('city_code', $city_codes);
	    return $this->db->get()->result();
	}
	
	public function getCandidate_it_skills_details($candidate_id){
	    $this->db->select("*");
	    $this->db->from("tbl_candidate_skills");
	    $this->db->where('candidate_id',$candidate_id);
	    return $this->db->get()->result();	    
	}

        public function getCandidate_know_languages_details($candidate_id){
        $this->db->select("*");
        $this->db->from("tbl_candidate_knows_language");
        $this->db->where('candidate_id',$candidate_id);
        return $this->db->get()->result();      
    }

        public function getCandidate_personal_details($candidate_id){
        $this->db->select("*");
        $this->db->from("tbl_personal_candidate");
        $this->db->where('candidate_id',$candidate_id);
        return $this->db->get()->result();
        
    }
	
		public function get_all_education_details_specialization($specialization_id){
	    $this->db->select('*');
	    $this->db->from('specialization_course');
	    $this->db->where('specialization_course_id',$specialization_id);
	    /* $this->db->join('specialization_course', 'candidate_course.course_id = specialization_course.course_id', 'inner');*/
	    return $this->db->get()->row();
	     
	}
	

    public function get_candidate_course($course_id){
        $this->db->select("*");
        $this->db->from("candidate_course");
        $this->db->where("course_id",$course_id);
        return $this->db->get()->row();
    }
	
	public function get_high_qualification_candidate($candidate_id)
	{
	    $this->db->select("course_name");
	    $this->db->from("candidate_education");
	    $this->db->join('candidate_course tcr', 'tcr.course_id=candidate_education.course', 'left');
	    $this->db->where("candidate_id",$candidate_id);
	    return $this->db->get()->result();
	}
	
	 public function insert_candidate_education($insert_data)
	{
	//	return $this->db->insert('tbl_candidate_registration', $insert_data);
	$this->db->insert('candidate_education',$insert_data);
	return	$result = $this->db->insert_id();
	}

    public function insert_personal_details_candidate_language($insert_data)
    {
    $this->db->insert('tbl_candidate_knows_language',$insert_data);
    return  $result = $this->db->insert_id();
    }
	
 public function insert_it_skill_candidate_details($insert_data)
	{
	$this->db->insert('tbl_candidate_skills',$insert_data);
	return	$result = $this->db->insert_id();
	}

    public function insert_candidate_resume_headline($insert_data)
    {
    $this->db->insert('tbl_candidate_resume_headline',$insert_data);
    return  $result = $this->db->insert_id();
    }
	

  public function insert_white_paper_research_publication($insert_data)
    {
    $this->db->insert('tbl_white_paper_research_publication_journal_entry',$insert_data);
    return  $result = $this->db->insert_id();
    }
 public function insert_carrer_profiles($insert_data)
	{
	$this->db->insert('tbl_candidate_career_profile',$insert_data);
	return	$result = $this->db->insert_id();
	}	

 public function insert_tbl_personal_candidate($insert_data)
    {
    $this->db->insert('tbl_personal_candidate',$insert_data);
    return  $result = $this->db->insert_id();
    }      
	public function check_code_for_reset_password($code)
{
    $this->db->where('forgot_password_reset',$code); 
    $query=$this->db->get('user_admin'); 
    $result=$query->result(); 
    return $num_rows=$query->num_rows(); 
   /*print_r($this->db->last_query());*/
    
    if($num_rows >0)
    { 
        return "1";
    }

    else

    {
        return "0";
    } 
}

public function get_all_course_list(){
    $this->db->select('*');
    $this->db->from('candidate_course');
   return $this->db->get()->result();
}

public function get_profile_summary_candidate($profile_summary_id){
          $this->db->select("*");
          $this->db->from("tbl_candidate_profile_summary");
          $this->db->where("profile_summary_id",$profile_summary_id);
return    $this->db->get()->row();

}

public function get_candidate_profile_summary($candidate_id){
    $this->db->select("*");
    $this->db->from("tbl_candidate_profile_summary");
    $this->db->where("candidate_id",$candidate_id);
    return $this->db->get()->row();
}


public function get_all_main_course_list(){
    $this->db->select('*');
    $this->db->from('tbl_candidate_education');
   return $this->db->get()->result();
}

public function candidate_insert_profile_summary($insert_data){
    $this->db->insert('tbl_candidate_profile_summary',$insert_data);
    return  $result = $this->db->insert_id();
}

public function get_candidate_details($candidate_id){
    $this->db->select('*');
    $this->db->from('user_admin');
    $this->db->where('user_admin_id',$candidate_id);
    return $this->db->get()->result();
    
}
public function edit_employment_details($employment_id)
{
    $this->db->select('*');
    $this->db->from('tbl_employment_candidate');
    $this->db->where('id',$employment_id);
    $this->db->order_by("id","asc");
    return $this->db->get()->row();
}

public function edit_resume_headline_details($resume_headline_id)
{
    $this->db->select('*');
    $this->db->from('tbl_candidate_resume_headline');
    $this->db->where('resume_headline_id',$resume_headline_id);   
    return $this->db->get()->row();
}


public function edit_educations_details($educations_id){
    
    $this->db->select('*');
    $this->db->from('candidate_education');
    $this->db->where('id',$educations_id);
    $this->db->order_by("id","asc");
    return $this->db->get()->row();
}

public function delete_candidate_key_skills($candidate_id)
{
    $this->db->where('candidate_id',$candidate_id);
    return $this->db->delete('tbl_candidate_skills_jobs');
}


public function delete_social_media_candidate($social_platform_candidate_id,$candidate_id)
{
    $this->db->where('social_platform_candidate_id',$social_platform_candidate_id);
    $this->db->where('candidate_id',$candidate_id);
    return $this->db->delete('tbl_social_platform_candidate');
}
public function delete_confirm_work_samples_entry($work_id,$candidate_id)
{
    $this->db->where('work_id',$work_id);
    $this->db->where('candidate_id',$candidate_id);
    return $this->db->delete('tbl_work_samples_candidate');
}


public function delete_prsonal_details_candidate($perosnal_id,$candidate_id)
{
    $this->db->where('personal_id',$perosnal_id);
    $this->db->where('candidate_id',$candidate_id);
    return $this->db->delete('tbl_personal_candidate');
}

public function delete_white_paper_research_publication_journal_entry($white_paper_research_publication_journal_id,$candidate_id)
{
    $this->db->where('white_paper_research_publication_id',$white_paper_research_publication_journal_id);
    $this->db->where('candidate_id',$candidate_id);
    return   $this -> db -> delete('tbl_white_paper_research_publication_journal_entry');
}
public function delete_carrer_profile_details($career_profile_id,$employee_id)
{
    $this->db->where('career_profile_Id',$career_profile_id);
    $this->db->where('employee_id',$employee_id);
    return   $this -> db -> delete('tbl_candidate_career_profile');
}

public function delete_candidate_presentation_details($presentation_id,$candidate_id)
{
    $this->db->where('presentation_id',$presentation_id);
    $this->db->where('candidate_id',$candidate_id);
    return   $this -> db -> delete('tbl_candidate_presentation');
}

public function delete_candidate_patent($patent_id,$candidate_id)
{
    $this->db->where('patent_id',$patent_id);
    $this->db->where('candidate_id',$candidate_id);
    return $this-> db->delete('tbl_patent_candidate');
}
public function delete_candidate_certifications($certificate_id,$candidate_id)
{
    $this->db->where('certificate_id',$certificate_id);
    $this->db->where('candidate_id',$candidate_id);
    return   $this -> db -> delete('tbl_certification_candidate');
}


public function delete_candidate_select_project($candidate_project_id,$candidate_id)
{
    $this->db->where('candidate_project_id',$candidate_project_id);
    $this->db->where('candidate_id',$candidate_id);
    return   $this -> db -> delete('tbl_candidate_project');
}

public function tbl_certification_candidate()
{
    $this->db->where('career_profile_Id',$career_profile_id);
    $this->db->where('employee_id',$employee_id);
    return   $this -> db -> delete('tbl_certification_candidate');
}

public function delete_candidate_it_skill_details($skill_id)
{


}


public function get_letest_employment_by_candidate_id($candidate_id){
          $this->db->select("*");
          $this->db->from("tbl_employment_candidate");
          $this->db->where("candidate_id",$candidate_id);
          $this->db->where("emp_employment","Yes");
          $this->db->join('tbl_candidate_registration tcr', 'tcr.candidate_registration_id=tbl_employment_candidate.candidate_id', 'left');
          $this->db->order_by("id", "desc");
          return $this->db->get()->row();
}


public function edit_skills_details($skill_id){
    
    $this->db->select('*');
    $this->db->from('tbl_candidate_skills');
    $this->db->where('skill_id',$skill_id);
    $this->db->order_by("skill_id","asc");
    return $this->db->get()->row();
}


public function edit_work_details($work_id){
    
    $this->db->select('*');
    $this->db->from('tbl_work_samples_candidate');
    $this->db->where('work_id',$work_id);
    return $this->db->get()->row();
}


public function edit_carrer_profile_details($skill_id){
    
    $this->db->select('*');
    $this->db->from('tbl_candidate_career_profile');
    $this->db->where('career_profile_Id',$skill_id);
    return $this->db->get()->row();
}

public function edit_candidate_pesonal_details($personal_id){
    
    $this->db->select('*');
    $this->db->from('tbl_personal_candidate');
    $this->db->where('personal_id',$personal_id);
    return $this->db->get()->row();
}

public function delete_employment_details($employment_id){
   
    $this->db->where('id',$employment_id);
 return   $this -> db -> delete('tbl_employment_candidate');
}

public function check_employment_fill($candidate_id){

    $this->db->select("*");
    $this->db->from("tbl_employment_candidate");
    $this->db->where("candidate_id",$candidate_id);
    return $this->db->get()->row();
}

public function save_candidate_project_details($insert_data)
{
    $this->db->insert('tbl_candidate_project',$insert_data);
	return	$result = $this->db->insert_id();
}

public function update_candidate_project_details($candidate_project_id,$update_data)
{
    $this->db->where('candidate_project_id',$candidate_project_id);
    return $this->db->update("tbl_candidate_project",$update_data);
}

public function check_current_employment_fill($candidate_id){

    $this->db->select("*");
    $this->db->from("tbl_employment_candidate");
    $this->db->where("emp_employment","Yes");
    $this->db->where("emp_employment_type","Full Time");
    $this->db->where("candidate_id",$candidate_id);
    return $this->db->get()->row();
}
public function check_education_fill($candidate_id){

    $this->db->select("*");
    $this->db->from("candidate_education");
    $this->db->where("candidate_id",$candidate_id);
    return $this->db->get()->num_rows();
}

public function check_candidate_skills_fill($candidate_id){

    $this->db->select("*");
    $this->db->from("tbl_candidate_skills");
    $this->db->where("candidate_id",$candidate_id);
    return $this->db->get()->num_rows();
}

public function check_candidate_career_profile_fill($candidate_id){

    $this->db->select("*");
    $this->db->from("tbl_candidate_career_profile");
    $this->db->where("employee_id",$candidate_id);
    return $this->db->get()->num_rows();
}

public function check_candidate_personal_candidate_fill($candidate_id){

    $this->db->select("*");
    $this->db->from("tbl_personal_candidate");
    $this->db->where("candidate_id",$candidate_id);
    return $this->db->get()->num_rows();
}


public function delete_education_details($id){
   
    $this->db->where('id',$id);
    return $this ->db->delete('candidate_education');
}

public function delete_prsonal_details_lang($candidate_id){
   
    $this->db->where('candidate_id',$candidate_id);
 return   $this -> db -> delete('tbl_candidate_knows_language');
}



public function get_employment_details($candidate_id){
    
    $this->db->select('*');
    $this->db->from('tbl_employment_candidate');
    $this->db->where('candidate_id',$candidate_id);
    $this->db->order_by("id","asc");
    return $this->db->get()->result();
}

public function insert_employement_record($insert_data)
{
    $this->db->insert('tbl_employment_candidate',$insert_data);
	return	$result = $this->db->insert_id();
}

public function insert_certification_record($insert_data)
{
    $this->db->insert('tbl_certification_candidate',$insert_data);
    return  $result = $this->db->insert_id();
}

public function update_certification_record($certificate_id,$insert_data)
{
    $this->db->where("certificate_id",$certificate_id);
    return$this->db->update('tbl_certification_candidate',$insert_data);
}

public function insert_candidate_patent_record($insert_data)
{
    $this->db->insert('tbl_patent_candidate',$insert_data);
    return  $result = $this->db->insert_id();
}

public function insert_white_paper_research_publication_journal_candidate_entry($insert_data)
{
    $this->db->insert('tbl_white_paper_research_publication_journal_entry',$insert_data);
    return  $result = $this->db->insert_id();
}

public function insert_candidate_presentation_details($insert_data){
    
    $this->db->insert('tbl_candidate_presentation',$insert_data);
    return  $result = $this->db->insert_id();
}


public function edit_patent_candidate_details($patent_id){
          $this->db->select("*");
          $this->db->from("tbl_patent_candidate");
          $this->db->where("patent_id",$patent_id);
 return   $this->db->get()->row();
}

public function edit_presentation_candidate_details($presentation_id){
          $this->db->select("*");
          $this->db->from("tbl_candidate_presentation");
          $this->db->where("candidate_id",$presentation_id);
 return   $this->db->get()->result();
}


public function get_online_profile_details($social_media_id){
          $this->db->select("*");
          $this->db->from("tbl_social_platform_candidate");
          $this->db->where("social_platform_candidate_id",$social_media_id);
 return   $this->db->get()->row();
}

public function edit_presentation_candidate($presentation_id){
          $this->db->select("*");
          $this->db->from("tbl_candidate_presentation");
          $this->db->where("presentation_id",$presentation_id);
 return   $this->db->get()->row();
}

public function edit_certificate_candidate($certificate_id){
          $this->db->select("*");
          $this->db->from("tbl_certification_candidate");
          $this->db->where("certificate_id",$certificate_id);
 return   $this->db->get()->row();
}

public function update_profile_summary_details($profile_summary_id,$update_data)
{
    $this->db->select('*');
    $this->db->where('profile_summary_id',$profile_summary_id);
    return $this->db->update('tbl_candidate_profile_summary',$update_data);
}

public function update_white_paper_research_publication_journal_candidate_entry($white_paper_research_publication_id,$update_data)
{
    $this->db->select('*');
    $this->db->where('white_paper_research_publication_id',$white_paper_research_publication_id);
    return $this->db->update('tbl_white_paper_research_publication_journal_entry',$update_data);
}

function update_profile($email_id,$update_data)
{
    $this->db->select('*');
    $this->db->where('email_id',$email_id);
    return $this->db->update('tbl_dailyreport_recruiter',$update_data);
}

public function candidate_skills_fill($candidate_id)
{
    $this->db->select("*");
    $this->db->from("tbl_candidate_skills_jobs");
    $this->db->where("candidate_id",$candidate_id);
    return $this->db->get()->result();
}
public function update_candidate_work_samples_details($work_id,$update_data){
    

    $this->db->select('*');
    $this->db->where('work_id',$work_id);
  return $this->db->update('tbl_work_samples_candidate',$update_data);
   
}

public function update_social_platform_data_candidate($social_id,$update_data){
    
    $this->db->select('*');
    $this->db->where('social_platform_candidate_id',$social_id);
  return $this->db->update('tbl_social_platform_candidate',$update_data);
   
}

public function update_candidate_presentation_details($presentation_id,$update_data){
    
    $this->db->select('*');
    $this->db->where('presentation_id',$presentation_id);
  return $this->db->update('tbl_candidate_presentation',$update_data);
   
}

public function get_candidate_presentation($candidate_id){
        $this->db->select('*');
        $this->db->from("tbl_candidate_presentation");
        $this->db->where("candidate_id",$candidate_id);
        return $this->db->get()->result();
}


public function get_candidate_patent_details($candidate_id){
        $this->db->select('*');
        $this->db->from("tbl_patent_candidate");
        $this->db->where("candidate_id",$candidate_id);
        return $this->db->get()->result();
}

public function get_candidate_resume_headline_details($candidate_id){
        $this->db->select('*');
        $this->db->from("tbl_candidate_resume_headline");
        $this->db->where("candidate_id",$candidate_id);
        return $this->db->get()->row();
}


public function update_employment_details($employment_id,$update_data){
    
    $this->db->select('*');
    $this->db->where('id',$employment_id);
  return $this->db->update('tbl_employment_candidate',$update_data);
   
}

public function update_education_details($education_id,$update_data){
    
    
    $this->db->select('*');
    $this->db->where('id',$education_id);
   return $this->db->update('candidate_education',$update_data);
   //print_r($this->db->last_query()); die();
}

public function update_it_skills_details($skill_id,$update_data)
{
    $this->db->select('*');
    $this->db->where('skill_id',$skill_id);
    return $this->db->update('tbl_candidate_skills',$update_data);
   //print_r($this->db->last_query()); die();
}

public function update_carrer_profile_details($career_profile_Id,$update_data)
{
    $this->db->select('*');
    $this->db->where('career_profile_Id',$career_profile_Id);
    return $this->db->update('tbl_candidate_career_profile',$update_data);
   //print_r($this->db->last_query()); die();
}

public function update_candidate_resume_headline_details($resume_headline_id,$update_data)
{
    $this->db->select('*');
    $this->db->where('resume_headline_id',$resume_headline_id);
    return $this->db->update('tbl_candidate_resume_headline',$update_data);
   //print_r($this->db->last_query()); die();
}

public function update_personal_details_candidate($Perosnal_candidate_id,$update_data)
{
    $this->db->select('*');
    $this->db->where('personal_id',$Perosnal_candidate_id);
    return $this->db->update('tbl_personal_candidate',$update_data);
   //print_r($this->db->last_query()); die();
}

public function candidte_exist_msuite($id)
 {
    $this->db->select("*");
    $this->db->from("tbl_candidate_registration");
    $this->db->where("candidate_registration_id",$id);
    return  $res= $this->db->get()->result_array();

 }

public function delete_it_skill_candidate_selected($deleted_id)
{
   $this->db->where('skill_id',$deleted_id);
   return   $this -> db -> delete('tbl_candidate_skills');
}

public function get_candidate_skills($candidate_id)
{
    $this->db->select("*");
    $this->db->from("tbl_candidate_skills_jobs");
    $this->db->where("candidate_id",$candidate_id);
    return $this->db->get()->result();
}
public function update_candidate_details($candidate_id,$insert_data){
    
    $this->db->select('*');
    $this->db->where('user_admin_id',$candidate_id);
  return $this->db->update('user_admin',$insert_data);
   
}

public function get_candidate_white_paper_journal_entry($candidate_id)
{
    $this->db->select("*");
    $this->db->from("tbl_white_paper_research_publication_journal_entry");
    $this->db->where("candidate_id",$candidate_id);
    return $this->db->get()->result();
}

public function check_if_email_exists($email){
    $query = $this->db->query("SELECT email FROM user_admin where email='$email'");
    return     $query->num_rows();
}
public function edit_white_paper_research_publication_journal_entry($white_paper_journal_entry_id)
{
    $this->db->select("*");
    $this->db->from("tbl_white_paper_research_publication_journal_entry");
    $this->db->where("white_paper_research_publication_id",$white_paper_journal_entry_id);
    return $this->db->get()->row();
}

public function check_if_phone_exists($contact){
    $query = $this->db->query("SELECT contact FROM user_admin where contact='$contact'");
    return     $query->num_rows();
}
  
public function check_if_password_exists($password) {
    $query = $this->db->query("SELECT email FROM user_admin where candidate_password='$password' ");
    return     $query->num_rows();
}

public function get_loginid(){
    $this->db->select("user_admin_id ,name");
    $this->db->from("user_admin");
    $this->db->limit(1);
    $this->db->order_by('user_admin_id ',"DESC");
    $query = $this->db->get(); 
  return $query->result_array();
}

public function get_loginid_email($email){
    $this->db->select("user_admin_id ,name");
    $this->db->from("user_admin");
    $this->db->limit(1);
    $this->db->where("email",$email);
    $this->db->order_by('user_admin_id ',"DESC");
    $query = $this->db->get(); 
  return $query->result_array();
}

function get_user_details_by_id_admin($user_id)
    {
        $this->db->select('BaseTbl.*')
                 ->from('user_admin as BaseTbl')
                 ->where('BaseTbl.user_admin_id ', $user_id);
        return $this->db->get()->row();
        
    }
    
public function getemail($code)
 {
     $this->db->select('email, contact');
     $this->db->where('forgot_password_reset', $code);
     $query = $this->db->get('user_admin');
     return $query->row();
 }

public function candidate_skills_fill_for_job_recommendtion($newkeywords) {
    $table = 'tbl_candidate_job_post';
    $this->db->from($table);
    foreach ($newkeywords as $keywordd) {
        $this->db->or_like('key_skills', $keywordd->skills);
    }
    $query = $this->db->get();

   return $query->result();

}

/*public function check_code_for_reset_password($code)

{
    $this->db->where('forgot_password_reset',$code); 
    $query=$this->db->get('users'); 
    $result=$query->result(); 
    $num_rows=$query->num_rows(); 
    
   //  $query=$this->db->where('forgot_password_reset', $code);
 //   $result=$query->result(); 
 //   $num_rows=$query->num_rows(); 
    //$result2 =  $this->db->get('users')->row();
//
    if($num_rows >0)
//if($result2->num_rows() >0)
    { 


        return "1";

    }

    else

    {

        return "0"; 

    } 

}

*/
}



?>