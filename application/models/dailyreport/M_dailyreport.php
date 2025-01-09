<?php
class M_dailyreport extends CI_Model
{

	public function list_dailyreport($user_id)
	{          $user_role = $this->session->userdata('user_role');
         if($user_role){
		$query=$this->db->query("SELECT * FROM tbl_dailyreport  ORDER BY dailyreport_id desc");
         }else{
             	$query=$this->db->query("SELECT * FROM tbl_dailyreport WHERE admin_id=$user_id ORDER BY dailyreport_id desc");
         }
        return $query->result_array();
	}
	public function list_dailyreport_by_user_id($user_id)
	{
		$this->db->where('user_id',$user_id);
		$this->db->order_by('dailyreport_id','DESC');
		return $this->db->get('tbl_dailyreport')->result_array();
	}
	
		public function list_assigned_task_report(){
		$query = $this->db->query("SELECT COUNT(t.emp_id) AS total_task,t.*, u.name , u.m_name, u.l_name, t.emp_id as emp_id
								   FROM task t, user_admin u
								   WHERE t.emp_id = u.user_admin_id and u.status=1 GROUP BY u.user_admin_id");
		$result = $query->result();

		foreach($result as $res){
			$emp_id = $res->emp_id;

				$q = $this->db->query("SELECT COUNT(task_id) AS complete_task 
									   FROM task WHERE emp_id = $emp_id AND status = 1 
									   GROUP BY emp_id");
					
				$r = $q->row();
				if($r){
					$res->complete_task = $r->complete_task;
				}else{
					$res->complete_task = '';
				}

			$q1 = $this->db->query("SELECT COUNT(task_id) AS deadline1 FROM task WHERE deadline_1 != '' AND deadline_2 = '' AND deadline_3 = '' AND emp_id = $emp_id AND status = 1 GROUP BY emp_id");
			$r1 = $q1->row();
			if($r1){
				$res->deadline1 = $r1->deadline1;
			}else{
				$res->deadline1 = '';
			}

			$q2 = $this->db->query("SELECT COUNT(task_id) AS deadline2 FROM task WHERE deadline_1 != '' AND deadline_2 != '' AND deadline_3 = '' AND emp_id = $emp_id AND status = 1 GROUP BY emp_id");
			$r2 = $q2->row();
			if($r2){
				$res->deadline2 = $r2->deadline2;
			}else{
				$res->deadline2 = '';
			}

			$q3 = $this->db->query("SELECT COUNT(task_id) AS deadline3 FROM task WHERE deadline_1 != '' AND deadline_2 != '' AND deadline_3 != '' AND emp_id = $emp_id AND status = 1 GROUP BY emp_id");
			$r3 = $q3->row();
			if($r3){
				$res->deadline3 = $r3->deadline3;
			}else{
				$res->deadline3 ='';
			}
		}
		return $result;
		
	}



    public function record_search_export($fromdate,$todate,$employee_id)
    {   

		$query=$this->db->query("SELECT a.project_name,a.thinks_to_do,a.descriptions,a.cr_date,a.deadline,a.deadline_1,a.extratime_consumed,a.submited_date,a.status,a.status_by_admin,a.reason,a.admin_reason,a.rating_for_task FROM task a WHERE 
			a.cr_date BETWEEN '$fromdate' AND '$todate' AND a.emp_id='$employee_id'");
        return $query->result_array();
	
    }


	public function insert($para)
	{
		return $this->db->insert('tbl_dailyreport',$para);
	}

	public function details_dailyreport($data)
	{
		$query=$this->db->query("SELECT * FROM tbl_dailyreport WHERE dailyreport_id='$data'");
		return $query->row();
	}

	
	
	public function searchrecord_bydate_done($fromdate,$todate,$dept,$employeeas)
	{
		$query=$this->db->query("SELECT b.name,a.cr_date,a.project_name,a.thinks_to_do,a.descriptions,a.deadline,a.deadline_1,a.extratime_consumed,
		a.submited_date,a.status,a.status_by_admin,a.reason,a.admin_reason,a.dead_line_status,a.rating_for_task 
		FROM task a, user_admin b 
		WHERE a.cr_date BETWEEN '$fromdate' AND '$todate' AND a.emp_id=b.user_admin_id AND a.status = 1 AND a.dept_id='$dept' AND a.emp_id='$employeeas'");
        return $query->result_array();
	}
	
	//code for deadline wise report

	public function searchrecord_bydate_done_in_firstdeadline($fromdate,$todate,$dept,$employeeas)
	{
		$query=$this->db->query("SELECT b.name,a.cr_date,a.project_name,a.thinks_to_do,a.descriptions,a.deadline,a.deadline_1,a.extratime_consumed,
		a.submited_date,a.status,a.status_by_admin,a.reason,a.admin_reason,a.dead_line_status,a.rating_for_task 
		FROM task a, user_admin b 
		WHERE a.cr_date BETWEEN '$fromdate' AND '$todate' AND a.deadline_1='' AND a.emp_id=b.user_admin_id AND a.status = 1 AND a.dept_id='$dept' AND a.emp_id='$employeeas'");
          
        return $query->result_array();
	}

	public function searchrecord_bydate_done_in_second_deadline($fromdate,$todate,$dept,$employeeas)
	{
		$query=$this->db->query("SELECT b.name,a.cr_date,a.project_name,a.thinks_to_do,a.descriptions,a.deadline,a.deadline_1,a.extratime_consumed,
		a.submited_date,a.status,a.status_by_admin,a.reason,a.admin_reason,a.dead_line_status,a.rating_for_task 
		FROM task a, user_admin b 
		WHERE a.cr_date BETWEEN '$fromdate' AND '$todate' AND a.deadline_1!=' ' AND a.deadline_2=' ' AND a.emp_id=b.user_admin_id AND a.status = 1 AND a.dept_id='$dept' AND a.emp_id='$employeeas'");
        return $query->result_array();
	}


	public function searchrecord_bydate_done_in_third_deadline($fromdate,$todate,$dept,$employeeas)
	{
		$query=$this->db->query("SELECT b.name,a.cr_date,a.project_name,a.thinks_to_do,a.descriptions,a.deadline,a.deadline_1,a.extratime_consumed,
		a.submited_date,a.status,a.status_by_admin,a.reason,a.admin_reason,a.dead_line_status,a.rating_for_task 
		FROM task a, user_admin b 
		WHERE a.cr_date BETWEEN '$fromdate' AND '$todate' AND a.deadline_1!=' ' AND a.deadline_2!=' ' AND a.emp_id=b.user_admin_id AND a.status = 1 AND a.dept_id='$dept' AND a.emp_id='$employeeas'");
        return $query->result_array();
	}



	//code end for deadline wise report
	
	
	public function searchrecord_bydate_pending($fromdate,$todate,$dept,$employeeas)
	{
		$query=$this->db->query("SELECT b.name,a.cr_date,a.project_name,a.thinks_to_do,a.descriptions,a.deadline,a.deadline_1,a.extratime_consumed,
		a.submited_date,a.status,a.status_by_admin,a.reason,a.admin_reason,a.dead_line_status,a.rating_for_task 
		FROM task a, user_admin b 
		WHERE a.cr_date BETWEEN '$fromdate' AND '$todate' AND a.emp_id=b.user_admin_id AND a.status = 0 AND a.dept_id='$dept' AND a.emp_id='$employeeas'");
        return $query->result_array();
	}
	
	public function searchrecord_byemployee($data){
	
		$emp_id=implode(',',$data);
	$query=$this->db->query("SELECT a.*,b.*,c.* FROM tbl_dailyreport a,user_admin b,tbl_dailyreportassigned c WHERE a.dailyreport_id=c.dailyreport_id AND b.user_admin_id=c.user_admin_id AND c.user_admin_id IN($emp_id) ORDER BY c.user_admin_id ASC");
		return $query->result_array();   
  }
 /* public function selectemployee($user_id)
  {  	
  	$query=$this->db->query("SELECT * FROM user_admin b WHERE ( b.role=3 OR b.role=7 OR b.role=8 ) AND b.status = 1 AND b.added_by_user_admin_id = $user_id ORDER BY b.name ASC");
  	return $query->result_array();
  }*/
  
  	public function searchrecord_bydate($fromdate,$todate,$employeeas)
	{
		/*$query=$this->db->query("SELECT b.name,a.d_date,a.assignment,a.project_name,a.duedate,a.from_time,a.to_time, a.manager_remark,a.submitted FROM tbl_dailyreport a,user_admin b WHERE a.d_date BETWEEN '$fromdate' AND '$todate 00:00:00' AND a.user_id=b.user_admin_id AND a.user_id='$employee'");*/
		$query=$this->db->query("SELECT b.name,a.cr_date,a.project_name,a.thinks_to_do,a.descriptions,a.deadline,a.deadline_1,a.extratime_consumed,a.submited_date,a.status,a.status_by_admin,a.reason,a.admin_reason,a.dead_line_status,a.rating_for_task FROM task a, user_admin b WHERE 
			a.cr_date BETWEEN '$fromdate' AND '$todate 00:00:00' AND a.emp_id=b.user_admin_id AND a.emp_id='$employeeas'");
        return $query->result_array();
	}
    /*public function get_performance_by_task()
  {  	

  	$query=$this->db->query( "SELECT a.emp_id, SUM(rating_for_task) as rating_for_task, count(task_id) as task_id,b.name,b.l_name , (count(task_id)*10) as outof, ((SUM(rating_for_task)*100)/(count(task_id)*10)) as percent FROM task a,user_admin b WHERE b.role=3 AND a.emp_id=b.user_admin_id GROUP BY a.emp_id");
  	return $query->result_array();
  } */

  
  public function selectemployee()
  {  	
  	//"SELECT * FROM  user_admin";
  	$query=$this->db->query("SELECT * FROM user_admin b WHERE b.role=3 ORDER BY b.name ASC");
  	return $query->result_array();
  }

  public function selectemployeeRecruiter($user_id)
  {  	
  	//"SELECT * FROM  user_admin";
  	$query=$this->db->query("SELECT * FROM user_admin b WHERE ( b.role=2 OR b.role=5 OR b.role=9 ) AND b.status = 1 AND b.added_by_user_admin_id = $user_id ORDER BY b.name ASC");
  	return $query->result_array();
  } 
  
public function get_performance_by_task()
  {  	

  	$query=$this->db->query( "SELECT a.emp_id, SUM(rating_for_task) as rating_for_task, count(task_id) as task_id,b.name,b.l_name , (count(task_id)*10) as outof, ((SUM(rating_for_task)*100)/(count(task_id)*10)) as percent FROM task a,user_admin b WHERE b.role=3 AND a.emp_id=b.user_admin_id GROUP BY a.emp_id");
  	return $query->result_array();
  } 



	public function view_details($id)
	{
				/*$this->db->where('dailyreport_id',$id);
		return	$this->db->get('tbl_dailyreport')->row();*/

		$query=$this->db->query( "SELECT a.*, b.* FROM tbl_dailyreport a,user_admin b WHERE a.user_id=b.user_admin_id AND a.dailyreport_id=$id");
  	return $query->row();
	}
	
	public function update($id,$data)
	{
				$this->db->where('dailyreport_id',$id);
		return	$this->db->update('tbl_dailyreport',$data);
	}

	public function delete($dailyreport_id)
	{
	 	$this->db->where('dailyreport_id',$dailyreport_id);
	 	return $this->db->delete('tbl_dailyreport');
	}

	 function getdata()

	{
		$query=$this->db->query('SELECT Status as name, COUNT(Status) as rating, NULL as total FROM task GROUP BY status UNION ALL SELECT NULL, COUNT(Status), COUNT(Status) FROM task');
       
        return $query->result();
 
    }
        
        function update_report_status($table,$id, $data)
	{
		$this->db->where('dailyreport_id', $id);
		return $this->db->update($table, $data);
	}
	public function Shortlisted_Candidates1($fromdate,$todate)
	{
		$query=$this->db->query("SELECT a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a WHERE a.date BETWEEN '$fromdate' AND '$todate' AND a.client_feedback='Shortlisted' ");
        return $query->result_array();
	}
	
    public function	list_clients()
    {
        $this->db->select("*");
        $this->db->from("client");
        return $this->db->get()->result();
    }
    
    public function list_clients_non_it_and_both()
    {
        $this->db->select("*");
        $this->db->from("client");
        $this->db->where("client_type","IT & NON-IT");
        $this->db->or_where('client_type', 'NON-IT');
        return $this->db->get()->result();
    }
    
    
    public function list_clients_it_and_both()
    {
        $this->db->select("*");
        $this->db->from("client");
        $this->db->where("client_type","IT & NON-IT");
        $this->db->or_where('client_type', 'IT');
        return $this->db->get()->result();
    }
    
	
	public function search_records_given_user($fromdate,$todate,$status,$client_name=NULL)
	{
	   if(!empty($client_name))
	   {
	       if($status=='all'){
	        $query=$this->db->query("SELECT * FROM tbl_dailyreport_recruiter a  WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' and a.sheetname = '$client_name' ");
            return $query->result_array();
	    }
	    
	    if($status=='Work on Client'){
	        $query=$this->db->query("SELECT a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.candidate_name,a.position_skills,a.record_added_datetime,a.sheetname, count(*) as total_resume FROM tbl_dailyreport_recruiter a  WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' a.sheetname = '$client_name' ");
            return $query->result_array();
	    }
	    
	    if($status=='Shortlisted'){
	       	$query=$this->db->query("SELECT a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.client_feedback='Shortlisted' AND a.sheetname = '$client_name' ");
            return $query->result_array();
	    }
	    
	    if($status=='Select'){
	       	$query=$this->db->query("SELECT a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.final_status='Select'AND a.sheetname = '$client_name'");
            return $query->result_array();
	    }
	    
	    if($status=='Joined'){
	       	$query=$this->db->query("SELECT a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.final_status='Joined' AND a.sheetname = '$client_name'");
            return $query->result_array();
	    }
	    
	    if($status=='Offered'){
	       	$query=$this->db->query("SELECT a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.final_status='Offered'AND a.sheetname = '$client_name' ");
            return $query->result_array();
	    }
	    
	    if($status=='Offer Decline'){
	       	$query=$this->db->query("SELECT a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.final_status='Offer Decline' AND a.sheetname = '$client_name' ");
            return $query->result_array();
	    }
	    if($status=='Screen Reject')
	    {
	       	$query=$this->db->query("SELECT a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.client_feedback='Screen Reject' AND a.sheetname = '$client_name' ");
            return $query->result_array();
        }
        
        if($status=='Duplicate')
	    {
	       	$query=$this->db->query("SELECT a.resume,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.client_feedback='Duplicate' AND a.sheetname = '$client_name'");
            return $query->result_array();
        }
        
        if($status=='Abscond')
	    {
	       	$query=$this->db->query("SELECT a.resume,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.final_status='Abscond' AND a.sheetname = '$client_name' ");
            return $query->result_array();
        }
	   }
	   else{
	   if($status=='all'){
	        $query=$this->db->query("SELECT * FROM tbl_dailyreport_recruiter a  WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' ");
            return $query->result_array();
	    }
	    
	    if($status=='Work on Client'){
	        $query=$this->db->query("SELECT a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.candidate_name,a.position_skills,a.record_added_datetime,a.sheetname, count(*) as total_resume FROM tbl_dailyreport_recruiter a  WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' GROUP BY a.sheetname ");
            return $query->result_array();
	    }
	    
	    if($status=='Shortlisted'){
	       	$query=$this->db->query("SELECT a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.client_feedback='Shortlisted' ");
            return $query->result_array();
	    }
	    
	    if($status=='Select'){
	       	$query=$this->db->query("SELECT a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.final_status='Select'");
            return $query->result_array();
	    }
	    
	    if($status=='Joined'){
	       	$query=$this->db->query("SELECT a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.final_status='Joined'");
            return $query->result_array();
	    }
	    
	    if($status=='Offered'){
	       	$query=$this->db->query("SELECT a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.final_status='Offered'");
            return $query->result_array();
	    }
	    
	    if($status=='Offer Decline'){
	       	$query=$this->db->query("SELECT a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.final_status='Offer Decline'");
            return $query->result_array();
	    }
	    if($status=='Screen Reject')
	    {
	       	$query=$this->db->query("SELECT a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.client_feedback='Screen Reject'");
            return $query->result_array();
        }
        
        if($status=='Duplicate')
	    {
	       	$query=$this->db->query("SELECT a.resume,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.client_feedback='Duplicate'");
            return $query->result_array();
        }
        
        if($status=='Abscond')
	    {
	       	$query=$this->db->query("SELECT a.resume,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.final_status='Abscond'");
            return $query->result_array();
        }
        
	   }
	    
	}
	

public function search_records_given_user_non_it($fromdate,$todate,$status,$client_name=NULL)
	{
	   if(!empty($client_name))
	   {
	       if($status=='all'){
	        $query=$this->db->query("SELECT * FROM tbl_dailyreport_recruiter a JOIN client ON client.client_id = a.sheetid  WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' and a.sheetname = '$client_name'  AND (client.client_type = 'NON-IT' OR client.client_type = 'IT & NON-IT') ");
            return $query->result_array();
	    }
	    
	    if($status=='Work on Client'){
	        $query=$this->db->query("SELECT a.dailyreport_id,a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.candidate_name,a.position_skills,a.record_added_datetime,a.sheetname, count(*) as total_resume FROM tbl_dailyreport_recruiter a JOIN client ON client.client_id = a.sheetid  WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' a.sheetname = '$client_name'  AND (client.client_type = 'NON-IT' OR client.client_type = 'IT & NON-IT') ");
            return $query->result_array();
	    }
	    
	    if($status=='Shortlisted'){
	       	$query=$this->db->query("SELECT a.dailyreport_id,a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a JOIN client ON client.client_id = a.sheetid WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.client_feedback='Shortlisted' AND a.sheetname = '$client_name'  AND (client.client_type = 'NON-IT' OR client.client_type = 'IT & NON-IT') ");
            return $query->result_array();
	    }
	    
	    if($status=='Select'){
	       	$query=$this->db->query("SELECT a.dailyreport_id,a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a JOIN client ON client.client_id = a.sheetid WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.final_status='Select'AND a.sheetname = '$client_name'  AND (client.client_type = 'NON-IT' OR client.client_type = 'IT & NON-IT')");
            return $query->result_array();
	    }
	    
	    if($status=='Joined'){
	       	$query=$this->db->query("SELECT a.dailyreport_id,a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a JOIN client ON client.client_id = a.sheetid WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.final_status='Joined' AND a.sheetname = '$client_name'  AND (client.client_type = 'NON-IT' OR client.client_type = 'IT & NON-IT')");
            return $query->result_array();
	    }
	    
	    if($status=='Offered'){
	       	$query=$this->db->query("SELECT a.dailyreport_id,a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a JOIN client ON client.client_id = a.sheetid WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.final_status='Offered'AND a.sheetname = '$client_name'  AND (client.client_type = 'NON-IT' OR client.client_type = 'IT & NON-IT') ");
            return $query->result_array();
	    }
	    
	    if($status=='Offer Decline'){
	       	$query=$this->db->query("SELECT a.dailyreport_id,a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a JOIN client ON client.client_id = a.sheetid WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.final_status='Offer Decline' AND a.sheetname = '$client_name'  AND (client.client_type = 'NON-IT' OR client.client_type = 'IT & NON-IT') ");
            return $query->result_array();
	    }
	    if($status=='Screen Reject')
	    {
	       	$query=$this->db->query("SELECT a.dailyreport_id,a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a JOIN client ON client.client_id = a.sheetid WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.client_feedback='Screen Reject' AND a.sheetname = '$client_name'  AND (client.client_type = 'NON-IT' OR client.client_type = 'IT & NON-IT') ");
            return $query->result_array();
        }
        
        if($status=='Duplicate')
	    {
	       	$query=$this->db->query("SELECT a.dailyreport_id,a.resume,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a JOIN client ON client.client_id = a.sheetid WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.client_feedback='Duplicate' AND a.sheetname = '$client_name'  AND (client.client_type = 'NON-IT' OR client.client_type = 'IT & NON-IT')");
            return $query->result_array();
        }
        
        if($status=='Abscond')
	    {
	       	$query=$this->db->query("SELECT a.dailyreport_id,a.resume,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a JOIN client ON client.client_id = a.sheetid WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.final_status='Abscond' AND a.sheetname = '$client_name'  AND (client.client_type = 'NON-IT' OR client.client_type = 'IT & NON-IT') ");
            return $query->result_array();
        }
	   }
	   else{
	   if($status=='all'){
	        $query=$this->db->query("SELECT * FROM tbl_dailyreport_recruiter a JOIN client ON client.client_id = a.sheetid WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate'  AND (client.client_type = 'NON-IT' OR client.client_type = 'IT & NON-IT') ");
            return $query->result_array();
	    }
	    
	    if($status=='Work on Client'){
	        $query=$this->db->query("SELECT a.dailyreport_id,a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.candidate_name,a.position_skills,a.record_added_datetime,a.sheetname, count(*) as total_resume FROM tbl_dailyreport_recruiter a  JOIN client ON client.client_id = a.sheetid WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate'  AND (client.client_type = 'NON-IT' OR client.client_type = 'IT & NON-IT') GROUP BY a.sheetname ");
            return $query->result_array();
	    }
	    
	    if($status=='Shortlisted'){
	       	$query=$this->db->query("SELECT a.dailyreport_id,a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a JOIN client ON client.client_id = a.sheetid WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.client_feedback='Shortlisted'  AND (client.client_type = 'NON-IT' OR client.client_type = 'IT & NON-IT') ");
            return $query->result_array();
	    }
	    
	    if($status=='Select'){
	       	$query=$this->db->query("SELECT a.dailyreport_id,a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a JOIN client ON client.client_id = a.sheetid WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.final_status='Select'  AND (client.client_type = 'NON-IT' OR client.client_type = 'IT & NON-IT')");
            return $query->result_array();
	    }
	    
	    if($status=='Joined'){
	       	$query=$this->db->query("SELECT a.dailyreport_id,a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a JOIN client ON client.client_id = a.sheetid WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.final_status='Joined'  AND (client.client_type = 'NON-IT' OR client.client_type = 'IT & NON-IT')");
            return $query->result_array();
	    }
	    
	    if($status=='Offered'){
	       	$query=$this->db->query("SELECT a.dailyreport_id,a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a JOIN client ON client.client_id = a.sheetid WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.final_status='Offered'  AND (client.client_type = 'NON-IT' OR client.client_type = 'IT & NON-IT')");
            return $query->result_array();
	    }
	    
	    if($status=='Offer Decline'){
	       	$query=$this->db->query("SELECT a.dailyreport_id,a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a JOIN client ON client.client_id = a.sheetid WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.final_status='Offer Decline'  AND (client.client_type = 'NON-IT' OR client.client_type = 'IT & NON-IT')");
            return $query->result_array();
	    }
	    if($status=='Screen Reject')
	    {
	       	$query=$this->db->query("SELECT a.dailyreport_id,a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a JOIN client ON client.client_id = a.sheetid WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.client_feedback='Screen Reject'  AND (client.client_type = 'NON-IT' OR client.client_type = 'IT & NON-IT')");
            return $query->result_array();
        }
        
        if($status=='Duplicate')
	    {
	       	$query=$this->db->query("SELECT a.dailyreport_id,a.resume,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a JOIN client ON client.client_id = a.sheetid WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.client_feedback='Duplicate'  AND (client.client_type = 'NON-IT' OR client.client_type = 'IT & NON-IT')");
            return $query->result_array();
        }
        
        if($status=='Abscond')
	    {
	       	$query=$this->db->query("SELECT a.dailyreport_id,a.resume,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a JOIN client ON client.client_id = a.sheetid WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.final_status='Abscond'  AND (client.client_type = 'NON-IT' OR client.client_type = 'IT & NON-IT')");
            return $query->result_array();
        }
        
	   }
	    
	}
	
	
public function search_records_given_user_it($fromdate,$todate,$status,$client_name=NULL)
	{
	   if(!empty($client_name))
	   {
	       if($status=='all'){
	        $query=$this->db->query("SELECT * FROM tbl_dailyreport_recruiter a JOIN client ON client.client_id = a.sheetid  WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' and a.sheetname = '$client_name'  AND (client.client_type = 'IT' OR client.client_type = 'IT & NON-IT') ");
            return $query->result_array();
	    }
	    
	    if($status=='Work on Client'){
	        $query=$this->db->query("SELECT a.dailyreport_id,a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.candidate_name,a.position_skills,a.record_added_datetime,a.sheetname, count(*) as total_resume FROM tbl_dailyreport_recruiter a JOIN client ON client.client_id = a.sheetid  WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' a.sheetname = '$client_name'  AND (client.client_type = 'IT' OR client.client_type = 'IT & NON-IT') ");
            return $query->result_array();
	    }
	    
	    if($status=='Shortlisted'){
	       	$query=$this->db->query("SELECT a.dailyreport_id,a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a JOIN client ON client.client_id = a.sheetid WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.client_feedback='Shortlisted' AND a.sheetname = '$client_name'  AND (client.client_type = 'IT' OR client.client_type = 'IT & NON-IT') ");
            return $query->result_array();
	    }
	    
	    if($status=='Select'){
	       	$query=$this->db->query("SELECT a.dailyreport_id,a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a JOIN client ON client.client_id = a.sheetid WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.final_status='Select'AND a.sheetname = '$client_name'  AND (client.client_type = 'IT' OR client.client_type = 'IT & NON-IT')");
            return $query->result_array();
	    }
	    
	    if($status=='Joined'){
	       	$query=$this->db->query("SELECT a.dailyreport_id,a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a JOIN client ON client.client_id = a.sheetid WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.final_status='Joined' AND a.sheetname = '$client_name'  AND (client.client_type = 'IT' OR client.client_type = 'IT & NON-IT')");
            return $query->result_array();
	    }
	    
	    if($status=='Offered'){
	       	$query=$this->db->query("SELECT a.dailyreport_id,a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a JOIN client ON client.client_id = a.sheetid WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.final_status='Offered'AND a.sheetname = '$client_name'  AND (client.client_type = 'IT' OR client.client_type = 'IT & NON-IT') ");
            return $query->result_array();
	    }
	    
	    if($status=='Offer Decline'){
	       	$query=$this->db->query("SELECT a.dailyreport_id,a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a JOIN client ON client.client_id = a.sheetid WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.final_status='Offer Decline' AND a.sheetname = '$client_name'  AND (client.client_type = 'IT' OR client.client_type = 'IT & NON-IT') ");
            return $query->result_array();
	    }
	    if($status=='Screen Reject')
	    {
	       	$query=$this->db->query("SELECT a.dailyreport_id,a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a JOIN client ON client.client_id = a.sheetid WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.client_feedback='Screen Reject' AND a.sheetname = '$client_name'  AND (client.client_type = 'IT' OR client.client_type = 'IT & NON-IT') ");
            return $query->result_array();
        }
        
        if($status=='Duplicate')
	    {
	       	$query=$this->db->query("SELECT a.dailyreport_id,a.resume,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a JOIN client ON client.client_id = a.sheetid WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.client_feedback='Duplicate' AND a.sheetname = '$client_name'  AND (client.client_type = 'IT' OR client.client_type = 'IT & NON-IT')");
            return $query->result_array();
        }
        
        if($status=='Abscond')
	    {
	       	$query=$this->db->query("SELECT a.dailyreport_id,a.resume,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a JOIN client ON client.client_id = a.sheetid WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.final_status='Abscond' AND a.sheetname = '$client_name'  AND (client.client_type = 'IT' OR client.client_type = 'IT & NON-IT') ");
            return $query->result_array();
        }
	   }
	   else{
	   if($status=='all'){
	        $query=$this->db->query("SELECT * FROM tbl_dailyreport_recruiter a JOIN client ON client.client_id = a.sheetid WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate'  AND (client.client_type = 'IT' OR client.client_type = 'IT & NON-IT') ");
            return $query->result_array();
	    }
	    
	    if($status=='Work on Client'){
	        $query=$this->db->query("SELECT a.dailyreport_id,a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.candidate_name,a.position_skills,a.record_added_datetime,a.sheetname, count(*) as total_resume FROM tbl_dailyreport_recruiter a  JOIN client ON client.client_id = a.sheetid WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate'  AND (client.client_type = 'IT' OR client.client_type = 'IT & NON-IT') GROUP BY a.sheetname ");
            return $query->result_array();
	    }
	    
	    if($status=='Shortlisted'){
	       	$query=$this->db->query("SELECT a.dailyreport_id,a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a JOIN client ON client.client_id = a.sheetid WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.client_feedback='Shortlisted'  AND (client.client_type = 'IT' OR client.client_type = 'IT & NON-IT') ");
            return $query->result_array();
	    }
	    
	    if($status=='Select'){
	       	$query=$this->db->query("SELECT a.dailyreport_id,a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a JOIN client ON client.client_id = a.sheetid WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.final_status='Select'  AND (client.client_type = 'IT' OR client.client_type = 'IT & NON-IT')");
            return $query->result_array();
	    }
	    
	    if($status=='Joined'){
	       	$query=$this->db->query("SELECT a.dailyreport_id,a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a JOIN client ON client.client_id = a.sheetid WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.final_status='Joined'  AND (client.client_type = 'IT' OR client.client_type = 'IT & NON-IT')");
            return $query->result_array();
	    }
	    
	    if($status=='Offered'){
	       	$query=$this->db->query("SELECT a.dailyreport_id,a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a JOIN client ON client.client_id = a.sheetid WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.final_status='Offered'  AND (client.client_type = 'IT' OR client.client_type = 'IT & NON-IT')");
            return $query->result_array();
	    }
	    
	    if($status=='Offer Decline'){
	       	$query=$this->db->query("SELECT a.dailyreport_id,a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a JOIN client ON client.client_id = a.sheetid WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.final_status='Offer Decline'  AND (client.client_type = 'IT' OR client.client_type = 'IT & NON-IT')");
            return $query->result_array();
	    }
	    if($status=='Screen Reject')
	    {
	       	$query=$this->db->query("SELECT a.dailyreport_id,a.resume,a.client_recruiter,a.client_feedback,a.final_status,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a JOIN client ON client.client_id = a.sheetid WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.client_feedback='Screen Reject'  AND (client.client_type = 'IT' OR client.client_type = 'IT & NON-IT')");
            return $query->result_array();
        }
        
        if($status=='Duplicate')
	    {
	       	$query=$this->db->query("SELECT a.dailyreport_id,a.resume,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a JOIN client ON client.client_id = a.sheetid WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.client_feedback='Duplicate'  AND (client.client_type = 'IT' OR client.client_type = 'IT & NON-IT')");
            return $query->result_array();
        }
        
        if($status=='Abscond')
	    {
	       	$query=$this->db->query("SELECT a.dailyreport_id,a.resume,a.user_id,a.position_skills,a.record_added_datetime,a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a JOIN client ON client.client_id = a.sheetid WHERE a.record_added_datetime BETWEEN '$fromdate' AND '$todate' AND a.final_status='Abscond'  AND (client.client_type = 'IT' OR client.client_type = 'IT & NON-IT')");
            return $query->result_array();
        }
        
	   }
	    
	}	

	public function Screen_Reject_Candidates1($fromdate,$todate)
	{
		$query=$this->db->query("SELECT a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a WHERE a.date BETWEEN '$fromdate' AND '$todate' AND a.client_feedback='Screen Reject'");
        return $query->result_array();
	}

	public function Duplicate_Candidates1($fromdate,$todate)
	{
		$query=$this->db->query("SELECT a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a WHERE a.date BETWEEN '$fromdate' AND '$todate' AND a.client_feedback='Duplicate' ");
        return $query->result_array();
	}

	public function Select_Candidates1($fromdate,$todate)
	{
		$query=$this->db->query("SELECT a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a WHERE a.date BETWEEN '$fromdate' AND '$todate' AND a.final_status='Select'");
        return $query->result_array();
	}

	public function Offered_Candidates1($fromdate,$todate)
	{
		$query=$this->db->query("SELECT a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a WHERE a.date BETWEEN '$fromdate' AND '$todate' AND a.final_status='Offered' ");
        return $query->result_array();
	}

	public function Offer_Decline_Candidates1($fromdate,$todate)
	{
		$query=$this->db->query("SELECT a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a WHERE a.date BETWEEN '$fromdate' AND '$todate' AND a.final_status='Offer Decline' ");
        return $query->result_array();
	}

	public function Joined_Candidates1($fromdate,$todate)
	{
		$query=$this->db->query("SELECT a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a WHERE a.date BETWEEN '$fromdate' AND '$todate' AND a.final_status='Joined'");
        return $query->result_array();
	}

	public function Abscond_Candidates1($fromdate,$todate)
	{
		$query=$this->db->query("SELECT a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a WHERE a.date BETWEEN '$fromdate' AND '$todate' AND a.final_status='Abscond' ");
        return $query->result_array();
	}

	public function Client_Requirement1($fromdate,$todate)
	{
		$query=$this->db->query("SELECT a.sheetname, count(*) as total_resume FROM tbl_dailyreport_recruiter a WHERE a.date BETWEEN '$fromdate' AND '$todate'  GROUP BY a.sheetname ");
        return $query->result_array();
	}
	public function Shortlisted_Candidates($fromdate,$todate,$employee=NULL)
	{
		$query=$this->db->query("SELECT a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a WHERE a.date BETWEEN '$fromdate' AND '$todate' AND a.client_feedback='Shortlisted' AND a.user_id='$employee'");
        return $query->result_array();
	}

	public function Screen_Reject_Candidates($fromdate,$todate,$employee=NULL)
	{
		$query=$this->db->query("SELECT a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a WHERE a.date BETWEEN '$fromdate' AND '$todate' AND a.client_feedback='Screen Reject' AND a.user_id='$employee'");
        return $query->result_array();
	}

	public function Duplicate_Candidates($fromdate,$todate,$employee=NULL)
	{
		$query=$this->db->query("SELECT a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a WHERE a.date BETWEEN '$fromdate' AND '$todate' AND a.client_feedback='Duplicate' AND a.user_id='$employee'");
        return $query->result_array();
	}

	public function Select_Candidates($fromdate,$todate,$employee=NULL)
	{
		$query=$this->db->query("SELECT a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a WHERE a.date BETWEEN '$fromdate' AND '$todate' AND a.final_status='Select' AND a.user_id='$employee'");
        return $query->result_array();
	}

	public function Offered_Candidates($fromdate,$todate,$employee=NULL)
	{
		$query=$this->db->query("SELECT a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a WHERE a.date BETWEEN '$fromdate' AND '$todate' AND a.final_status='Offered' AND a.user_id='$employee'");
        return $query->result_array();
	}

	public function Offer_Decline_Candidates($fromdate,$todate,$employee=NULL)
	{
		$query=$this->db->query("SELECT a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a WHERE a.date BETWEEN '$fromdate' AND '$todate' AND a.final_status='Offer Decline' AND a.user_id='$employee'");
        return $query->result_array();
	}

	public function Joined_Candidates($fromdate,$todate,$employee=NULL)
	{
		$query=$this->db->query("SELECT a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a WHERE a.date BETWEEN '$fromdate' AND '$todate' AND a.final_status='Joined' AND a.user_id='$employee'");
        return $query->result_array();
	}

	public function Abscond_Candidates($fromdate,$todate,$employee=NULL)
	{
		$query=$this->db->query("SELECT a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no, a.email_id, a.client_feedback, a.final_status, a.selected_joining_date, a.selected_offered_amount FROM tbl_dailyreport_recruiter a WHERE a.date BETWEEN '$fromdate' AND '$todate' AND a.final_status='Abscond' AND a.user_id='$employee'");
        return $query->result_array();
	}

	public function Client_Requirement($fromdate,$todate,$employee=NULL)
	{
		$query=$this->db->query("SELECT a.sheetname, count(*) as total_resume FROM tbl_dailyreport_recruiter a WHERE a.date BETWEEN '$fromdate' AND '$todate' AND a.user_id='$employee' GROUP BY a.sheetname ");
        return $query->result_array();
	}
	
  public function selectRecruiterTl($admin_id)
  {  	
  	//"SELECT * FROM  user_admin";
  	$query=$this->db->query("SELECT user_admin_id, name, l_name FROM user_admin b WHERE (b.role=2 OR b.role=9) AND status=1 AND b.added_by_user_admin_id='$admin_id' ORDER BY b.name ASC");
  	return $query->result_array();
  } 

	public function generate_selected_individual_pdf_report_with_date($fromdate,$todate,$emp_id,$client_id_by_useridq)
	{
		$query=$this->db->query("SELECT a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no FROM tbl_dailyreport_recruiter a WHERE a.date BETWEEN '$fromdate' AND '$todate' AND a.user_id='$emp_id' AND a.sheetid='$client_id_by_useridq'");
        return $query->result_array();
	} 

	public function generate_selected_individual_pdf_reportwith_client($emp_id,$client_id_by_useridq)
	{
		$query=$this->db->query("SELECT a.sheetname, a.date, a.position_skills, a.candidate_name, a.contact_no FROM tbl_dailyreport_recruiter a WHERE a.user_id='$emp_id' AND a.sheetid='$client_id_by_useridq'");
        return $query->result_array();
	}


}
?>