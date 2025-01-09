<?php
class M_recruiter extends CI_Model
{


    public function check_contact_no_email_id($contact_no,$email_id,$sheetid)
    {
      $this->db->where('contact_no', $contact_no);
      $this->db->where('email_id', $email_id);
      $this->db->where('sheetid', $sheetid);
      $result =  $this->db->get('tbl_dailyreport_recruiter');
      if($result->num_rows()>0)
      {
        return "1";
      }
      else
      {
        return "0"; 
      } 
    }


    public function check_allready_exist_in_db($user_id_check,$sheetid_check,$contact_no,$email_id)
    {
      $this->db->where('user_id', $user_id_check);
      $this->db->where('sheetid', $sheetid_check);
      $this->db->where('contact_no', $contact_no);
      $this->db->where('email_id', $email_id);
      $result =  $this->db->get('tbl_dailyreport_recruiter');
      if($result->num_rows()>0)
      {
        return "1";
      }
      else
      {
        return "0"; 
      } 
    }
    
    public function active_list_user($admin_id)
  {
   // $query=$this->db->query("SELECT * FROM user_admin WHERE (role=2 OR role=9) AND status=1 AND added_by_user_admin_id='$admin_id' ORDER BY name ASC");
     $query=$this->db->query("SELECT * FROM user_admin WHERE (role=2 OR role=9) AND status=1  ORDER BY name ASC");
        return $query->result_array();
  }

    public function check_contact_no($contact_no,$sheetid)
    {
      $this->db->where('contact_no', $contact_no);
      $this->db->where('sheetid', $sheetid);
      $result =  $this->db->get('tbl_dailyreport_recruiter');
      if($result->num_rows()>0)
      {
        return "1";
      }
      else
      {
        return "0"; 
      } 
    }

    public function check_email_id($email_id,$sheetid)
    {
      $this->db->where('email_id', $email_id);
      $this->db->where('sheetid', $sheetid);
      $result =  $this->db->get('tbl_dailyreport_recruiter');
      if($result->num_rows()>0)
      {
        return "1";
      }
      else
      {
        return "0"; 
      } 
    }

    public function check_email_id_new($contact_no,$email_id)
    {
      $this->db->where('email_id', $email_id);
      $this->db->where('contact_no', $contact_no);
      $result =  $this->db->get('tbl_dailyreport_recruiter');
      if($result->num_rows()>0)
      {
        return "1";
      }
      else
      {
        return "0"; 
      } 
    }

	public function list_dailyreport()
	{
	
		$query=$this->db->query("SELECT * FROM tbl_dailyreport_recruiter");
        return $query->result_array();
	}
	public function list_dailyreport_by_user_id($user_id)
	{
		$this->db->where('user_id',$user_id);
		return $this->db->get('tbl_dailyreport_recruiter')->result_array();	
	}

	public function client_list($admin_id)
	{  $user_role = $this->session->userdata('user_role');
	    if($user_role==1){
	     $query=$this->db->query("SELECT sheetid as client_id, sheetname as client_name FROM tbl_dailyreport_recruiter  INNER JOIN client ON client.client_id = tbl_dailyreport_recruiter.sheetid   GROUP BY sheetname ORDER BY sheetname ASC");

	    }else{
		/*$query=$this->db->query("SELECT sheetid as client_id, sheetname as client_name FROM tbl_dailyreport_recruiter  INNER JOIN client ON client.client_id = tbl_dailyreport_recruiter.sheetid WHERE tbl_dailyreport_recruiter.admin_id='$admin_id' and  client.client_type = 'IT' GROUP BY sheetname ORDER BY sheetname ASC");*/
       $query=$this->db->query("SELECT sheetid as client_id, sheetname as client_name FROM tbl_dailyreport_recruiter  INNER JOIN client ON client.client_id = tbl_dailyreport_recruiter.sheetid WHERE tbl_dailyreport_recruiter.admin_id='$admin_id'  GROUP BY sheetname ORDER BY sheetname ASC");
	    }
        
        return $query->result_array();
	}
	
	public function client_list_non_it($admin_id)
	{
		$query=$this->db->query("SELECT sheetid as client_id, sheetname as client_name FROM tbl_dailyreport_recruiter  INNER JOIN client ON client.client_id = tbl_dailyreport_recruiter.sheetid WHERE tbl_dailyreport_recruiter.admin_id='$admin_id' and  client.client_type = 'NON-IT' GROUP BY sheetname ORDER BY sheetname ASC");
        return $query->result_array();
	}
	
		public function client_list_user($user_id)
	{
		$query=$this->db->query("SELECT sheetid as client_id, sheetname as client_name FROM tbl_dailyreport_recruiter WHERE user_id='$user_id' GROUP BY sheetname ORDER BY sheetname ASC");
        return $query->result_array();
	}
	
	public function client_list_all()
	{
		$query=$this->db->query("SELECT * FROM client");
        return $query->result_array();
	}
	

	public function client_list_by_user_id($user_id)
	{
		/*$query=$this->db->query("SELECT client_type, sheetid as client_id, sheetname as client_name FROM tbl_dailyreport_recruiter INNER JOIN client ON client.client_id = tbl_dailyreport_recruiter.sheetid  WHERE user_id='$user_id' and client_type ='IT' GROUP BY sheetname ORDER BY sheetname ASC");*/
        $query=$this->db->query("SELECT sheetid as client_id, sheetname as client_name FROM tbl_dailyreport_recruiter INNER JOIN client ON client.client_id = tbl_dailyreport_recruiter.sheetid  WHERE user_id='$user_id'  GROUP BY sheetname ORDER BY sheetname ASC");
        return $query->result_array();
	}
	
	public function client_non_it_list_by_user_id($user_id)
	{
		$query=$this->db->query("SELECT client_type, sheetid as client_id, sheetname as client_name FROM tbl_dailyreport_recruiter INNER JOIN client ON client.client_id = tbl_dailyreport_recruiter.sheetid  WHERE user_id='$user_id' and client_type ='NON-IT' GROUP BY sheetname ORDER BY sheetname ASC");
        return $query->result_array();
	}

	public function client_list_by_user_id_for_all($admin_id)
	{
		/*$query=$this->db->query("SELECT sheetid as client_id, sheetname as client_name FROM tbl_dailyreport_recruiter INNER JOIN client ON client.client_id = tbl_dailyreport_recruiter.sheetid  where tbl_dailyreport_recruiter.admin_id='$admin_id' and client_type ='IT' GROUP BY sheetname");*/
        $query=$this->db->query("SELECT sheetid as client_id, sheetname as client_name FROM tbl_dailyreport_recruiter INNER JOIN client ON client.client_id = tbl_dailyreport_recruiter.sheetid  where tbl_dailyreport_recruiter.admin_id='$admin_id' GROUP BY sheetname");
        return $query->result_array();
	}
	
	public function get_job_profile_selected_clients_list_vendor($client_id)
	{
	    $this->db->select("*");
	    $this->db->from("client");
	    $this->db->where_in("client_id",$client_id);
	    return $this->db->get()->result_array();
	}
    
    
    public function client_list_by_user_id_for_all_non_recruiter($admin_id)
    {
        $query=$this->db->query("SELECT sheetid as client_id, sheetname as client_name FROM tbl_dailyreport_recruiter INNER JOIN client ON client.client_id = tbl_dailyreport_recruiter.sheetid  where tbl_dailyreport_recruiter.admin_id='$admin_id' and client_type ='NON-IT' GROUP BY sheetname");
        return $query->result_array();
    }
    
	public function global_insert($para, $table)
	{
    $this->db->insert($table, $para);
    return $this->db->insert_id();
	}
	
	public function insert($para)
	{
    $this->db->insert('tbl_dailyreport_recruiter',$para);
    return $this->db->insert_id();
	}

	public function insert_test($data_user)
	{
		return $this->db->insert('test',$data_user);
	}

  public function get_client_id_search_result_by_user_id($area,$user_id)
  {
    $this->db->select('*');
    $this->db->where('sheetid',$area);
    $this->db->where('user_id',$user_id);
    return  $this->db->get('tbl_dailyreport_recruiter')->result_array();
  }

  public function get_client_id_search_result_by_admin_id($area,$admin_id)
  {
    $this->db->select('*');
    $this->db->where('sheetid',$area);
    $this->db->where('admin_id',$admin_id);
    return  $this->db->get('tbl_dailyreport_recruiter')->result_array();
  }
  
	public function details_dailyreport($data)
	{
		$query=$this->db->query("SELECT * FROM tbl_dailyreport_recruiter WHERE dailyreport_id='$data'");
		return $query->row();
	}
	public function update($id,$data)
	{
				$this->db->where('dailyreport_id',$id);
		return	$this->db->update('tbl_dailyreport_recruiter',$data);
	}
  public function update_uploaded_sheet($data_user,$dailyreport_id)
  {
        $this->db->where('dailyreport_id',$dailyreport_id);
    return  $this->db->update('tbl_dailyreport_recruiter',$data_user);
  }

	public function delete($dailyreport_id)
	{
	 	$this->db->where('dailyreport_id',$dailyreport_id);
	 	return $this->db->delete('tbl_dailyreport_recruiter');
	}

  public function get_client_id_search_result($area)
  {
    $this->db->select('*');
    $this->db->where('sheetid',$area);    
    return  $this->db->get('tbl_dailyreport_recruiter')->result_array();
  }
  
  public function get_client_list_as_user_selected($user_id,$area){
    $this->db->select('*');
    $this->db->where('sheetid',$area); 
    $this->db->where('user_id',$user_id);
    return  $this->db->get('tbl_dailyreport_recruiter')->result_array();
  }

  public function get_client_id_search_result_candidate($area,$clientwise_candidate)
  {
    /*$this->db->select('*');
    $this->db->where('sheetid',$area); 
    $this->db->like('candidate_name', $clientwise_candidate);
    return  $this->db->get('tbl_dailyreport_recruiter')->result_array();*/

    $query=$this->db->query("SELECT * FROM tbl_dailyreport_recruiter WHERE( candidate_name LIKE '%$clientwise_candidate%' OR contact_no='$clientwise_candidate' OR email_id='$clientwise_candidate') AND sheetid='$area' ");
    return $query->result_array();

  }


 public function get_client_id_search_result_report($area)
  {
    $this->db->select('sr_no,date,company_client,position_skills,rp_id,candidate_name,color,applicant_id,role,qulification,company_name,yrs_of_experience, months_of_experience, relevant_exp,ctc, ctc_thousand, exp_ctc,notice_period,official_onpaper_notice_period,contact_no,alternate_contact_number,email_id,alternate_email_id,location,preffered_location,client_feedback,interview_schedule,interview_schedule_mode,final_status,client_recruiter,sourced_by,reason_for_job_change');
    $this->db->where('sheetid',$area);
    return  $this->db->get('tbl_dailyreport_recruiter')->result_array();
  }

  public function get_client_id_search_result_report_by_user_id($area,$user_id)
  {
   /* $this->db->select('sr_no,date,company_client,position_skills,rp_id,candidate_name,color,applicant_id,role,qulification,company_name,yrs_of_experience,months_of_experience,relevant_exp,ctc,ctc_thousand,exp_ctc,notice_period,official_onpaper_notice_period,contact_no,alternate_contact_number,email_id,alternate_email_id,location,preffered_location,client_feedback,interview_schedule,interview_schedule_mode,final_status,client_recruiter,sourced_by,reason_for_job_change');
    $this->db->where('sheetid',$area);
    $this->db->where('user_id',$user_id);
    $this->db->order_by("date", "ASC");*/
    
    $query=$this->db->query("SELECT a.sr_no,a.company_client,a.sheetname, a.date, a.position_skills, a.rp_id, a.candidate_name, a.color, a.applicant_id, a.role, a.qulification, a.company_name, a.yrs_of_experience, a.months_of_experience, a.relevant_exp, a.ctc, a.ctc_thousand, a.exp_ctc, a.notice_period, a.official_onpaper_notice_period, a.contact_no, a.alternate_contact_number, a.email_id, a.alternate_email_id, a.location, a.preffered_location, a.client_feedback, a.interview_schedule, a.interview_schedule_mode, a.final_status, a.client_recruiter, a.sourced_by, a.reason_for_job_change FROM tbl_dailyreport_recruiter a WHERE  a.user_id='$user_id'  AND a.sheetid='$area'");
        return $query->result_array();
    
   // return  $this->db->get('tbl_dailyreport_recruiter')->result_array();
  }

  public function get_client_id_search_result_report_by_user_id_datewise($area,$user_id,$fromdate= NULL,$todate= NULL)
  {
   /* $this->db->select('sr_no,date,company_client,position_skills,rp_id,candidate_name,color,applicant_id,role,qulification,company_name,yrs_of_experience,months_of_experience,relevant_exp,ctc,ctc_thousand,exp_ctc,notice_period,official_onpaper_notice_period,contact_no,alternate_contact_number,email_id,alternate_email_id,location,preffered_location,client_feedback,interview_schedule,interview_schedule_mode,final_status,client_recruiter,sourced_by,reason_for_job_change');
    $this->db->where('sheetid',$area);
    $this->db->where('user_id',$user_id);
    $this->db->order_by("date", "ASC");*/
    
    $query=$this->db->query("SELECT a.sr_no,a.company_client,a.sheetname, a.date, a.position_skills, a.rp_id, a.candidate_name, a.color, a.applicant_id, a.role, a.qulification, a.company_name, a.yrs_of_experience, a.months_of_experience, a.relevant_exp, a.ctc, a.ctc_thousand, a.exp_ctc, a.notice_period, a.official_onpaper_notice_period, a.contact_no, a.alternate_contact_number, a.email_id, a.alternate_email_id, a.location, a.preffered_location, a.client_feedback, a.interview_schedule, a.interview_schedule_mode, a.final_status, a.client_recruiter, a.sourced_by, a.reason_for_job_change FROM tbl_dailyreport_recruiter a WHERE a.date BETWEEN '$fromdate' AND '$todate' AND a.user_id='$user_id'  AND a.sheetid='$area'");
        return $query->result_array();
    
   // return  $this->db->get('tbl_dailyreport_recruiter')->result_array();
  }

  public function get_client_sheetname_report($area)
  {
    $this->db->select('sheetname');
    $this->db->where('sheetid',$area);
    $this->db->group_by('sheetname');
    return  $this->db->get('tbl_dailyreport_recruiter')->result();
  }

	public function employee_by_id($id)
	{
		        $this->db->select('*');
		        $this->db->from('tbl_dailyreport_recruiter');
		        $this->db->join('user_admin', 'user_admin.user_admin_id = tbl_dailyreport_recruiter.user_id');
		        $this->db->where('tbl_dailyreport_recruiter.dailyreport_id', $id);

        return 	$this->db->get()->row();
	}

    public function check_email_id_in_db_exists($contact_no)
    {
      $this->db->where('contact_no', $contact_no);
      $result =  $this->db->get('tbl_dailyreport_recruiter');
      if($result->num_rows()>0)
      {
        return "1";
      }
      else
      {
        return "0"; 
      } 
    }
    public function check_email_id_in_db_exists_aaa($email_id)
    {
      $this->db->where('email_id', $email_id);
      $result =  $this->db->get('tbl_dailyreport_recruiter');
      if($result->num_rows()>0)
      {
        return "1";
      }
      else
      {
        return "0"; 
      } 
    }

    public function check_email_id_in_db_exists_test($mobile)
    {
      $this->db->where('mobile', $mobile);
      $result =  $this->db->get('test');
      if($result->num_rows()>0)
      {
        return "1";
      }
      else
      {
        return "0"; 
      } 
    }


    public function sendsms($user_mobile,$str) 
    {
	    // Authorisation details.
	    $username = "tohafaa@gmail.com";
	    $hash = "c8ab1f31df84c63c8c493c23ff08145a60e723eb641c2a7a08f52e9cc2f6c7c1";

	    // Config variables. Consult http://api.textlocal.in/docs for more info.
		$test = "0";

	    // Data for text message. This is the text message data.
	    $sender = "TXTLCL"; // This is who the message appears to be from.

	    //$numbers = "91".$user_mobile; // A single number or a comma-seperated list of numbers
	    $numbers = $user_mobile; // A single number or a comma-seperated list of numbers

	    $message = "message from Montek Tech Services : '$str";

	    // 612 chars or less

	    // A single number or a comma-seperated list of numbers

	    $message = urlencode($message);

	    $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;

	    $ch = curl_init('http://api.textlocal.in/send/?');

	    curl_setopt($ch, CURLOPT_POST, true);

	    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	    $result = curl_exec($ch); // This is the result from the API

	    curl_close($ch);
    }

  function forgot_password_check_email_exists($contact_no,$client_id)
  {
    $result=$this->db->query("SELECT * FROM tbl_dailyreport_recruiter WHERE contact_no='$contact_no' AND sheetid='$client_id' AND transfer_comment IS NULL");
    if($result->num_rows() >0)
    {
     $query = $this->db->query("SELECT a.sourced_by as sourced_by, a.date as added_date, a.client_recruiter as client_recruiter, a.contact_no as contact_no, a.sheetid as sheetid FROM tbl_dailyreport_recruiter a WHERE contact_no='$contact_no' AND sheetid='$client_id'");
     @$sourced_by = $query->row()->sourced_by;
     @$date = $query->row()->added_date;
     @$contact_no = $query->row()->contact_no;
     @$sheetid = $query->row()->sheetid;

     $added_by = $sourced_by."_".$date."_".$contact_no."_".$sheetid;

     $aaa = "1"."_".$added_by;

      return $aaa;
    }
    else
    {
      return "0"; 
    }
  } 


 public function get_candidate_details($sheetid,$contact_no)
  {
    $query=$this->db->query("SELECT * FROM tbl_dailyreport_recruiter WHERE contact_no='$contact_no' AND sheetid='$sheetid'");
        return $query->result_array();
  }
 public function get_candidate_details_email($sheetid,$email_id)
  {
    $query=$this->db->query("SELECT * FROM tbl_dailyreport_recruiter WHERE email_id='$email_id' AND sheetid='$sheetid'");
        return $query->result_array();
  }


  function forgot_password_check_email_exists_email_id($email_id,$client_id)
  { 
    $result=$this->db->query("SELECT * FROM tbl_dailyreport_recruiter WHERE email_id='$email_id' AND sheetid='$client_id' AND transfer_comment='' ");

    if($result->num_rows() >0)
    {
      $query = $this->db->query("SELECT a.sourced_by as sourced_by, a.date as added_date, a.client_recruiter as client_recruiter, a.email_id as email_id, a.sheetid as sheetid FROM tbl_dailyreport_recruiter a WHERE email_id='$email_id' AND sheetid='$client_id'");
       @$sourced_by = $query->row()->sourced_by;
       @$date = $query->row()->added_date;
       @$email_id = $query->row()->email_id;
       @$sheetid = $query->row()->sheetid;

       $added_by = $sourced_by."msuite".$date."msuite".$email_id."msuite".$sheetid;

       $aaa = "1"."msuite".$added_by;

        return $aaa;
    }
    else
    {
      return "0"; 
    }
  } 

 function check_allreay_exists_client($name)
  {
    
    $result = $this->db->get_where('tbl_dailyreport_recruiter',array('sheetname' => $name));
    if($result->num_rows() >0)
    {
      return "1";
    }
    else
    {
      return "0"; 
    }
  }



  public function get_all_recruter_mail_id()
  {
    $query=$this->db->query("SELECT email FROM user_admin where role=2 OR role=5 OR role=9 ORDER BY email ASC");
        return $query->result_array();
  } 


  public function get_all_active_emp_id()
  {
    $query=$this->db->query("SELECT email FROM user_admin where status=1 ORDER BY email ASC");
        return $query->result_array();
  } 


  public function get_all_recruter_mail_id_list($admin_id)
  {
    $query=$this->db->query("SELECT email FROM user_admin where added_by_user_admin_id=$admin_id AND status=1 AND (role=2 OR role=5 OR role=9) ORDER BY email ASC");
        return $query->result_array();
  } 


  public function individual_excel_report_client_id($user_id)
  {
    $this->db->select('sheetid,sheetname');
    $this->db->where('user_id',$user_id);
    $this->db->group_by('sheetid');
    $this->db->order_by("sheetname", "ASC");
    return  $this->db->get('tbl_dailyreport_recruiter')->result_array();
  }

  public function individual_excel_report($sheetid,$user_id)
  {
    $this->db->select('sheetname, date, position_skills, rp_id, candidate_name, color, applicant_id, role, qulification, company_name, yrs_of_experience, months_of_experience, relevant_exp, ctc, ctc_thousand, exp_ctc, notice_period, official_onpaper_notice_period, contact_no, alternate_contact_number, email_id, alternate_email_id, location, preffered_location, client_feedback, interview_schedule, interview_schedule_mode, final_status, client_recruiter, sourced_by, reason_for_job_change');
    $this->db->where('sheetid',$sheetid);
    $this->db->where('user_id',$user_id);
    return  $this->db->get('tbl_dailyreport_recruiter')->result_array();
  }



  public function individual_excel_report_client_id_date($user_id,$fromdate,$todate)
  {
    $query=$this->db->query("SELECT a.sheetid, a.sheetname FROM tbl_dailyreport_recruiter a WHERE a.date BETWEEN '$fromdate' AND '$todate' AND a.user_id='$user_id' GROUP BY a.sheetid ");
        return $query->result_array();
  }

  public function individual_excel_report_date($sheetid,$user_id,$fromdate,$todate)
  {    
    $query=$this->db->query("SELECT a.sheetname, a.date, a.position_skills, a.rp_id, a.candidate_name, a.color, a.applicant_id, a.role, a.qulification, a.company_name, a.yrs_of_experience, a.months_of_experience, a.relevant_exp, a.ctc, a.ctc_thousand, a.exp_ctc, a.notice_period, a.official_onpaper_notice_period, a.contact_no, a.alternate_contact_number, a.email_id, a.alternate_email_id, a.location, a.preffered_location, a.client_feedback, a.interview_schedule, a.interview_schedule_mode, a.final_status, a.client_recruiter, a.sourced_by, a.reason_for_job_change FROM tbl_dailyreport_recruiter a WHERE a.date BETWEEN '$fromdate' AND '$todate' AND a.user_id='$user_id' AND a.sheetid='$sheetid' ");
        return $query->result_array();
  }
 public function individual_excel_report_datewise($user_id,$fromdate,$todate)
  {    
    $query=$this->db->query("SELECT a.sheetname, a.date, a.position_skills, a.rp_id, a.candidate_name, a.color, a.applicant_id, a.role, a.qulification, a.company_name, a.yrs_of_experience, a.months_of_experience, a.relevant_exp, a.ctc, a.ctc_thousand, a.exp_ctc, a.notice_period, a.official_onpaper_notice_period, a.contact_no, a.alternate_contact_number, a.email_id, a.alternate_email_id, a.location, a.preffered_location, a.client_feedback, a.interview_schedule, a.interview_schedule_mode, a.final_status, a.client_recruiter, a.sourced_by, a.reason_for_job_change FROM tbl_dailyreport_recruiter a WHERE a.date BETWEEN '$fromdate' AND '$todate' AND a.user_id='$user_id' ");
        return $query->result_array();
  }
  public function individual_excel_report_by_client($sheetid,$user_id)
  {    
    $query=$this->db->query("SELECT a.sheetname, a.date, a.position_skills, a.rp_id, a.candidate_name, a.color, a.applicant_id, a.role, a.qulification, a.company_name, a.yrs_of_experience, a.months_of_experience, a.relevant_exp, a.ctc, a.ctc_thousand, a.exp_ctc, a.notice_period, a.official_onpaper_notice_period, a.contact_no, a.alternate_contact_number, a.email_id, a.alternate_email_id, a.location, a.preffered_location, a.client_feedback, a.interview_schedule, a.interview_schedule_mode, a.final_status, a.client_recruiter, a.sourced_by, a.reason_for_job_change FROM tbl_dailyreport_recruiter a WHERE a.user_id='$user_id' AND a.sheetid='$sheetid' ");
        return $query->result_array();
  }

  public function individual_excel_report_date_view($user_id,$client_id_by_userid,$fromdate,$todate)
  {    
    $query=$this->db->query("SELECT a.dailyreport_id,a.sheetid,a.company_client,a.sheetname, a.date, a.position_skills, a.rp_id, a.candidate_name, a.color, a.applicant_id, a.role, a.qulification, a.company_name, a.yrs_of_experience, a.relevant_exp, a.ctc, a.exp_ctc, a.notice_period, a.official_onpaper_notice_period, a.contact_no, a.alternate_contact_number, a.email_id, a.alternate_email_id, a.location, a.preffered_location, a.client_feedback, a.interview_schedule, a.interview_schedule_mode, a.final_status, a.client_recruiter, a.sourced_by, a.reason_for_job_change FROM tbl_dailyreport_recruiter a WHERE a.date BETWEEN '$fromdate' AND '$todate' AND a.user_id='$user_id' AND a.sheetid='$client_id_by_userid' ");
        return $query->result_array();
  }









// view search



  /*public function individual_search_report_by_client($user_id,$area)
  {    
    $query=$this->db->query("SELECT  a.sheetname, a.date, a.position_skills, a.rp_id, a.candidate_name, a.color, a.applicant_id, a.role, a.qulification, a.company_name, a.yrs_of_experience, a.relevant_exp, a.ctc, a.exp_ctc, a.notice_period, a.official_onpaper_notice_period, a.contact_no, a.alternate_contact_number, a.email_id, a.alternate_email_id, a.location, a.preffered_location, a.client_feedback, a.interview_schedule, a.interview_schedule_mode, a.final_status, a.client_recruiter, a.sourced_by, a.reason_for_job_change FROM tbl_dailyreport_recruiter a WHERE a.user_id='$user_id' AND a.sheetid='$area' ");
        return $query->result_array();
  }*/


  public function individual_search_report_by_client($user_id,$area)
  {
    $this->db->select('*');
    $this->db->where('sheetid',$area);
    $this->db->where('user_id',$user_id);
    return  $this->db->get('tbl_dailyreport_recruiter')->result_array();
  }


  public function individual_search_report_date($user_id,$fromdate,$todate)
  {    
    $query=$this->db->query("SELECT  a.sheetname, a.date, a.position_skills, a.rp_id, a.candidate_name, a.color, a.applicant_id, a.role, a.qulification, a.company_name, a.yrs_of_experience, a.relevant_exp, a.ctc, a.exp_ctc, a.notice_period, a.official_onpaper_notice_period, a.contact_no, a.alternate_contact_number, a.email_id, a.alternate_email_id, a.location, a.preffered_location, a.client_feedback, a.interview_schedule, a.interview_schedule_mode, a.final_status, a.client_recruiter, a.sourced_by, a.reason_for_job_change FROM tbl_dailyreport_recruiter a WHERE a.date BETWEEN '$fromdate' AND '$todate' AND a.user_id='$user_id'");
        return $query->result_array();
  }

  /*public function individual_search_report_date_client($client_id_by_userid,$user_id,$fromdate,$todate)
  {    
    $query=$this->db->query("SELECT a.sheetname, a.date, a.position_skills, a.rp_id, a.candidate_name, a.color, a.applicant_id, a.role, a.qulification, a.company_name, a.yrs_of_experience, a.relevant_exp, a.ctc, a.exp_ctc, a.notice_period, a.official_onpaper_notice_period, a.contact_no, a.alternate_contact_number, a.email_id, a.alternate_email_id, a.location, a.preffered_location, a.client_feedback, a.interview_schedule, a.interview_schedule_mode, a.final_status, a.client_recruiter, a.sourced_by, a.reason_for_job_change FROM tbl_dailyreport_recruiter a WHERE a.date BETWEEN '$fromdate' AND '$todate' AND a.user_id='$user_id' AND a.sheetid='$client_id_by_userid' ");
        return $query->result_array();
  }*/
  public function individual_search_report_date_client($client_id_by_userid,$user_id,$fromdate,$todate)
  {    
    $query=$this->db->query("SELECT * FROM tbl_dailyreport_recruiter a WHERE a.date BETWEEN '$fromdate' AND '$todate' AND a.user_id='$user_id' AND a.sheetid='$client_id_by_userid' ");
        return $query->result_array();
  }

  public function individual_excel_report_client_id_aaa($client_id)
  {
      $query=$this->db->query("SELECT a.sheetid, a.position_skills FROM tbl_dailyreport_recruiter a WHERE a.sheetid='$client_id' AND position_skills IS NOT NULL GROUP BY a.position_skills ORDER BY a.position_skills ASC ");
        return $query->result_array();
  }

 public function get_client_id_search_result_report_filter($client_id_search,$position_skills_filter)
  {
    $this->db->select('sr_no,date,sheetname,position_skills,rp_id,candidate_name,color,applicant_id,role,qulification,company_name,yrs_of_experience,months_of_experience, relevant_exp,ctc,exp_ctc, ctc_thousand, notice_period,official_onpaper_notice_period,contact_no,alternate_contact_number,email_id,alternate_email_id,location,preffered_location,client_feedback,interview_schedule,interview_schedule_mode,final_status,client_recruiter,sourced_by,reason_for_job_change');
    $this->db->where('sheetid',$client_id_search);
    $this->db->where('position_skills',$position_skills_filter);
    return  $this->db->get('tbl_dailyreport_recruiter')->result_array();
  }


  public function get_client_id_search_result_search($area,$position_skills_filter)
  {
    $this->db->select('*');
    $this->db->where('sheetid',$area);    
    $this->db->where('position_skills',$position_skills_filter);
    return  $this->db->get('tbl_dailyreport_recruiter')->result_array();
  }

    //list main tab
  public function list_position_skills()
  {
    $query=$this->db->query("SELECT position_skills FROM tbl_dailyreport_recruiter GROUP BY position_skills ORDER BY position_skills ASC");
    return $query->result();
  }

 public function get_skillwise_filter_data($position_skills_filter)
  {
    $query=$this->db->query("SELECT position_skills, candidate_name, qulification, yrs_of_experience, relevant_exp, ctc, exp_ctc, notice_period, contact_no, email_id, official_onpaper_notice_period, location, preffered_location FROM tbl_dailyreport_recruiter WHERE position_skills LIKE '$position_skills_filter%' ");
    return $query->result_array();
  }

 public function get_min_exp_skillwise_filter_data($position_skills_filter,$min_exp)
  {
    $query=$this->db->query("SELECT position_skills, candidate_name, qulification, yrs_of_experience, months_of_experience, relevant_exp, ctc, exp_ctc, notice_period, contact_no, email_id, official_onpaper_notice_period, location, preffered_location FROM tbl_dailyreport_recruiter WHERE yrs_of_experience>=$min_exp AND position_skills LIKE '$position_skills_filter%'");
    return $query->result_array();
  }

 public function get_max_exp_skillwise_filter_data($position_skills_filter,$max_exp)
  {
    $query=$this->db->query("SELECT position_skills, candidate_name, qulification, yrs_of_experience, months_of_experience, relevant_exp, ctc, exp_ctc, notice_period, contact_no, email_id, official_onpaper_notice_period, location, preffered_location FROM tbl_dailyreport_recruiter WHERE yrs_of_experience<=$max_exp AND position_skills LIKE '$position_skills_filter%'");
    return $query->result_array();
  }

 public function get_min_max_exp_skillwise_filter_data($position_skills_filter,$max_exp,$min_exp)
  {
    $query=$this->db->query("SELECT position_skills, candidate_name, qulification, yrs_of_experience, months_of_experience, relevant_exp, ctc, exp_ctc, notice_period, contact_no, email_id, official_onpaper_notice_period, location, preffered_location FROM tbl_dailyreport_recruiter WHERE yrs_of_experience>=$min_exp AND yrs_of_experience<=$max_exp AND position_skills LIKE '$position_skills_filter%'");
    return $query->result_array();
  }




  public function getCountry()
  {
    $this->db->select('*');
    /*$this->db->where('id',101);*/
    return  $this->db->get('countries')->result_array();  
  }

  public function getState()
  {
    $this->db->select('*');
    return  $this->db->get('states')->result_array(); 
  }

  public function getCity()
  {
    $this->db->select('*');
    return  $this->db->get('cities')->result_array(); 
  }


public function get_city_by_state($state_id)
  {
    $this->db->select('*');
    $this->db->from('cities');
    $this->db->where("state_id",$state_id);
    return $this->db->get()->result();
  }


  public function getStateByCountry($country)
  {
    $this->db->select('*');
    $this->db->distinct();
    $this->db->where('country_id',$country);
    return  $this->db->get('states')->result_array();
  }

  public function getCitiesByState($state)
  {
    $this->db->select('*');
    $this->db->distinct();
    $this->db->order_by('name', 'ASC');
    $this->db->where('state_id',$state);
    return  $this->db->get('cities')->result_array();
  }
  
  /* Rhutuja - 6-1-2019 */

  public function get_candidate_skill_list(){
    $this->db->select('position_skills');
    $this->db->from('tbl_dailyreport_recruiter');
    $this->db->group_by('position_skills');
    return $this->db->get()->result();
  } 

  public function get_candidate_location_list(){
    $this->db->select('location as location_name');
    $this->db->from('tbl_dailyreport_recruiter');
    $this->db->group_by('location');
    return $this->db->get()->result();
  }

  public function get_candidate_data($candidate_position_skills, $candidate_location, $min_exp, $max_exp, $notice_period, $fields_array){
     /* $this->db->select('candidate_name, qulification, yrs_of_experience, months_of_experience, ctc_thousand, exp_ctc, notice_period, contact_no, email_id');*/
     $this->db->select($fields_array);
      $this->db->from('tbl_dailyreport_recruiter');
      if(!empty($candidate_position_skills)){
        $this->db->where_in('position_skills', $candidate_position_skills);
      }
      if(!empty($candidate_location)){
        $this->db->where_in('location', $candidate_location);
      }
      if($min_exp != ''){
        $this->db->where("yrs_of_experience >= $min_exp");
      }
      if($max_exp != ''){
        $this->db->where("yrs_of_experience <= $max_exp");
      }
      if(!empty($notice_period)){
        $this->db->where_in("notice_period", $notice_period);
      }
      return $this->db->get()->result_array();
  }

  public function get_candidate_notice_period_list(){
    $this->db->select('notice_period as notice_period');
    $this->db->from('tbl_dailyreport_recruiter');
    $this->db->group_by('notice_period');
    return $this->db->get()->result();
  }
  
  /*Code By Swarup*/
  
  public function get_all_email_template()
  {
      $user_role=$this->session->userdata('user_role');
    if($user_role==1)
    {
    	$admin_id=$this->session->userdata('user_id');
    }
    else
    {
    	$admin_id=$this->session->userdata('admin_id');	
    }
    $this->db->select('*');
    $this->db->from('email_template');
    $this->db->where('admin_id',$admin_id);
    return $this->db->get()->result();
   
  }
  
  /*Code For Sales Template*/
  public function get_all_email_sales_template()
  {
    $this->db->select('*');
    $this->db->from('page');
    return $this->db->get()->result();
  }
  
  public function get_all_email_template_by_id($id)
  {
    if($user_role==1)
    {
    	$admin_id=$this->session->userdata('user_id');
    }
    else
    {
    	$admin_id=$this->session->userdata('admin_id');	
    }
    $this->db->select('template_path');
    $this->db->from('email_template');
    $this->db->where('id',$id);
    $this->db->where('admin_id',$admin_id);
    return $this->db->get()->row();
  }
  
  public function get_sales_email_template_by_id($id)
  {
    $this->db->select('link');
    $this->db->from('page');
    $this->db->where('id',$id);
    return $this->db->get()->row();
  }
  
  /*Recruiter Questions*/
  
    public function get_recruiter_questions()
    {
      $this->db->select('*');
      $this->db->from('question');
      return $this->db->get()->result();
    }

    public function insert_question($data) 
    {
      $this->db->insert('question', $data);
      return $this->db->insert_id();
    }

    public function get_recruiter_question_by_id($question_id)
    {
      $this->db->select('*');
      $this->db->from('question');
      $this->db->where('question_id',$question_id);
      return $this->db->get()->row();
    }

    public function update_question($data,$id)
    {
      $this->db->where('question_id',$id);
      return  $this->db->update('question',$data);
    }

    public function delete_question($id)
    {
      $this->db->where('question_id',$id);
      return $this->db->delete('question');
    }

    function get_genuinity_questions() {
        $this->db->where('question_form_type', '1');
        $query = $this->db->get('question');
        return $query->result();
    }

    function get_genuinity_answers() {
        $query = $this->db->query('SELECT * '
                . ' FROM question q,answer a '
                . ' WHERE q.question_form_type="1" '
                . ' AND q.question_id=a.answer_question_id');
        return $query->result();
    }
    function get_no_of_questions($type) {
        $query = $this->db->query("SELECT * "
                . " FROM `question` "
                . " WHERE `question_form_type`='$type'");
        return $query->num_rows();
    }

    function get_marks_for_question($question_id) {
        $query = $this->db->query("SELECT * "
                . " FROM `question` "
                . " WHERE `question_id`='$question_id'");
        return $query->result();
    }

    function get_correct_answer($q_id) {
        
        $query = $this->db->query("SELECT * FROM answer WHERE answer_question_id=".$q_id." AND (answer_is_right=1 OR answer_title='nil')");
        return $query->row();
    }

    function update_total_marks($candidate_id, $totalmarks) {
        $data = array('candidate_marks' => $totalmarks);
        $this->db->where('dailyreport_id', $candidate_id);
        $this->db->update('tbl_dailyreport_recruiter', $data);
    }
    
    function get_candidate_data_filter($data,$limit,$offset)
    {
        $any_keywords = $data['any_keywords'];
        $commonWords = array('a','able','about','above','abroad','according','accordingly','across','actually','adj','after','afterwards','again','against','ago','ahead','ain\'t','all','allow','allows','almost','alone','along','alongside','already','also','although','always','am','amid','amidst','among','amongst','an','and','another','any','anybody','anyhow','anyone','anything','anyway','anyways','anywhere','apart','appear','appreciate','appropriate','are','aren\'t','around','as','a\'s','aside','ask','asking','associated','at','available','away','awfully','b','back','backward','backwards','be','became','because','become','becomes','becoming','been','before','beforehand','begin','behind','being','believe','below','beside','besides','best','better','between','beyond','both','brief','but','by','c','came','can','cannot','cant','can\'t','caption','cause','causes','certain','certainly','changes','clearly','c\'mon','co','co.','com','come','comes','concerning','consequently','consider','considering','contain','containing','contains','corresponding','could','couldn\'t','course','c\'s','currently','d','dare','daren\'t','definitely','described','despite','did','didn\'t','different','directly','do','does','doesn\'t','doing','done','don\'t','down','downwards','during','e','each','edu','eg','eight','eighty','either','else','elsewhere','end','ending','enough','entirely','especially','et','etc','even','ever','evermore','every','everybody','everyone','everything','everywhere','ex','exactly','example','except','f','fairly','far','farther','few','fewer','fifth','first','five','followed','following','follows','for','forever','former','formerly','forth','forward','found','four','from','further','furthermore','g','get','gets','getting','given','gives','go','goes','going','gone','got','gotten','greetings','h','had','hadn\'t','half','happens','hardly','has','hasn\'t','have','haven\'t','having','he','he\'d','he\'ll','hello','help','hence','her','here','hereafter','hereby','herein','here\'s','hereupon','hers','herself','he\'s','hi','him','himself','his','hither','hopefully','how','howbeit','however','hundred','i','i\'d','ie','if','ignored','i\'ll','i\'m','immediate','in','inasmuch','inc','inc.','indeed','indicate','indicated','indicates','inner','inside','insofar','instead','into','inward','is','isn\'t','it','it\'d','it\'ll','its','it\'s','itself','i\'ve','j','just','k','keep','keeps','kept','know','known','knows','l','last','lately','later','latter','latterly','least','less','lest','let','let\'s','like','liked','likely','likewise','little','look','looking','looks','low','lower','ltd','m','made','mainly','make','makes','many','may','maybe','mayn\'t','me','mean','meantime','meanwhile','merely','might','mightn\'t','mine','minus','miss','more','moreover','most','mostly','mr','mrs','much','must','mustn\'t','my','myself','n','name','namely','nd','near','nearly','necessary','need','needn\'t','needs','neither','never','neverf','neverless','nevertheless','new','next','nine','ninety','no','nobody','non','none','nonetheless','noone','no-one','nor','normally','not','nothing','notwithstanding','novel','now','nowhere','o','obviously','of','off','often','oh','ok','okay','old','on','once','one','ones','one\'s','only','onto','opposite','or','other','others','otherwise','ought','oughtn\'t','our','ours','ourselves','out','outside','over','overall','own','p','particular','particularly','past','per','perhaps','placed','please','plus','possible','presumably','probably','provided','provides','q','que','quite','qv','r','rather','rd','re','really','reasonably','recent','recently','regarding','regardless','regards','relatively','respectively','right','round','s','said','same','saw','say','saying','says','second','secondly','see','seeing','seem','seemed','seeming','seems','seen','self','selves','sensible','sent','serious','seriously','seven','several','shall','shan\'t','she','she\'d','she\'ll','she\'s','should','shouldn\'t','since','six','so','some','somebody','someday','somehow','someone','something','sometime','sometimes','somewhat','somewhere','soon','sorry','specified','specify','specifying','still','sub','such','sup','sure','t','take','taken','taking','tell','tends','th','than','thank','thanks','thanx','that','that\'ll','thats','that\'s','that\'ve','the','their','theirs','them','themselves','then','thence','there','thereafter','thereby','there\'d','therefore','therein','there\'ll','there\'re','theres','there\'s','thereupon','there\'ve','these','they','they\'d','they\'ll','they\'re','they\'ve','thing','things','think','third','thirty','this','thorough','thoroughly','those','though','three','through','throughout','thru','thus','till','to','together','too','took','toward','towards','tried','tries','truly','try','trying','t\'s','twice','two','u','un','under','underneath','undoing','unfortunately','unless','unlike','unlikely','until','unto','up','upon','upwards','us','use','used','useful','uses','using','usually','v','value','various','versus','very','via','viz','vs','w','want','wants','was','wasn\'t','way','we','we\'d','welcome','well','we\'ll','went','were','we\'re','weren\'t','we\'ve','what','whatever','what\'ll','what\'s','what\'ve','when','whence','whenever','where','whereafter','whereas','whereby','wherein','where\'s','whereupon','wherever','whether','which','whichever','while','whilst','whither','who','who\'d','whoever','whole','who\'ll','whom','whomever','who\'s','whose','why','will','willing','wish','with','within','without','wonder','won\'t','would','wouldn\'t','x','y','yes','yet','you','you\'d','you\'ll','your','you\'re','yours','yourself','yourselves','you\'ve','z','zero');
        
        $must_keywords = $data['must_keywords'];
        if(!empty($data['excluding_keywords']))
        {
           $excluding_keywords = explode(',',$data['excluding_keywords']);
        }
        $this->db->select('*');
        $this->db->from('tbl_dailyreport_recruiter');
        if(@$data['anual_salary_from_lacs'] || $data['anual_salary_to_lacs'] )
        {
            
            if(!empty($data['anual_salary_from_lacs']))
            {
              $this->db->where('ctc<=', $data['anual_salary_from_lacs']);
            }
            if(!empty($data['anual_salary_to_lacs']))
            {
                $this->db->where('ctc<=', $data['anual_salary_to_lacs']);
            }
        }
        
        if(!empty(@$data['current_location']))
        {
            $this->db->where('location',trim($data['current_location']));
        }
        if(!empty(@$data['prefered_location']))
        {
            $this->db->where('preffered_location',trim($data['prefered_location']));
        }
        if(!empty(@$data['total_experience_from'] || @$data['total_experience_to'] ))
        {
              $this->db->where('yrs_of_experience>=',$data["total_experience_from"],false);
            $this->db->where('yrs_of_experience<=',$data["total_experience_to"],false);
            // $this->db->where('preffered_location', $data['prefered_location']);
        }
        if(!empty(@$any_keywords))
        {
            $input_any_keywords = preg_replace('/\b('.implode('|',$commonWords).')\b/','',$any_keywords);
            $any=explode(' ',$input_any_keywords);
            $this->db->group_start();
            foreach($any as $a)
            {
                if($a!="")
                {
                    strtolower($a);
                    if($a=="developer")
                    {
                        $key = $last_key.' '.$a;
                        $this->db->or_like('position_skills',$key);
                    }
                    else
                    {
                        $this->db->or_like('position_skills',$a);
                        $this->db->or_like('role', $a);
                        $this->db->or_like('sheetname', $a);
                    }
                }
                
                $last_key=$a;
            }
            $this->db->group_end();
        }
       
        if(!empty(@$excluding_keywords))
        {
            $this->db->group_start();
             foreach($excluding_keywords as $row)
            {
                $this->db->or_not_like('position_skills',$row);
                $this->db->or_not_like('role', $row);
                $this->db->or_not_like('sheetname', $row);
                $this->db->or_not_like('company_name', $row);
            }
            $this->db->group_end();
        }
        
        if(!empty(@$include_company))
        {
           $this->db->where_in('sheetname',$include_company); 
        }
        if(!empty(@$exclude_company))
        {
            $this->db->where_not_in('sheetname',$exclude_company);
        }
        
        if(!empty(@$must_keywords))
        {
         $must_key=explode(',',$must_keywords);
         foreach($must_key as $row)
         {
             $this->db->or_like('position_skills',$row);
         } 
        
    }
        $this->db->order_by('dailyreport_id','DESC');
        $this->db->limit($limit,$offset);
        $result=$this->db->get()->result();
        
        return $result;
    
    }
    
    
    function get_candidate_data_filter_count($data)
    {
        $any_keywords = $data['any_keywords'];
        $commonWords = array('a','able','about','above','abroad','according','accordingly','across','actually','adj','after','afterwards','again','against','ago','ahead','ain\'t','all','allow','allows','almost','alone','along','alongside','already','also','although','always','am','amid','amidst','among','amongst','an','and','another','any','anybody','anyhow','anyone','anything','anyway','anyways','anywhere','apart','appear','appreciate','appropriate','are','aren\'t','around','as','a\'s','aside','ask','asking','associated','at','available','away','awfully','b','back','backward','backwards','be','became','because','become','becomes','becoming','been','before','beforehand','begin','behind','being','believe','below','beside','besides','best','better','between','beyond','both','brief','but','by','c','came','can','cannot','cant','can\'t','caption','cause','causes','certain','certainly','changes','clearly','c\'mon','co','co.','com','come','comes','concerning','consequently','consider','considering','contain','containing','contains','corresponding','could','couldn\'t','course','c\'s','currently','d','dare','daren\'t','definitely','described','despite','did','didn\'t','different','directly','do','does','doesn\'t','doing','done','don\'t','down','downwards','during','e','each','edu','eg','eight','eighty','either','else','elsewhere','end','ending','enough','entirely','especially','et','etc','even','ever','evermore','every','everybody','everyone','everything','everywhere','ex','exactly','example','except','f','fairly','far','farther','few','fewer','fifth','first','five','followed','following','follows','for','forever','former','formerly','forth','forward','found','four','from','further','furthermore','g','get','gets','getting','given','gives','go','goes','going','gone','got','gotten','greetings','h','had','hadn\'t','half','happens','hardly','has','hasn\'t','have','haven\'t','having','he','he\'d','he\'ll','hello','help','hence','her','here','hereafter','hereby','herein','here\'s','hereupon','hers','herself','he\'s','hi','him','himself','his','hither','hopefully','how','howbeit','however','hundred','i','i\'d','ie','if','ignored','i\'ll','i\'m','immediate','in','inasmuch','inc','inc.','indeed','indicate','indicated','indicates','inner','inside','insofar','instead','into','inward','is','isn\'t','it','it\'d','it\'ll','its','it\'s','itself','i\'ve','j','just','k','keep','keeps','kept','know','known','knows','l','last','lately','later','latter','latterly','least','less','lest','let','let\'s','like','liked','likely','likewise','little','look','looking','looks','low','lower','ltd','m','made','mainly','make','makes','many','may','maybe','mayn\'t','me','mean','meantime','meanwhile','merely','might','mightn\'t','mine','minus','miss','more','moreover','most','mostly','mr','mrs','much','must','mustn\'t','my','myself','n','name','namely','nd','near','nearly','necessary','need','needn\'t','needs','neither','never','neverf','neverless','nevertheless','new','next','nine','ninety','no','nobody','non','none','nonetheless','noone','no-one','nor','normally','not','nothing','notwithstanding','novel','now','nowhere','o','obviously','of','off','often','oh','ok','okay','old','on','once','one','ones','one\'s','only','onto','opposite','or','other','others','otherwise','ought','oughtn\'t','our','ours','ourselves','out','outside','over','overall','own','p','particular','particularly','past','per','perhaps','placed','please','plus','possible','presumably','probably','provided','provides','q','que','quite','qv','r','rather','rd','re','really','reasonably','recent','recently','regarding','regardless','regards','relatively','respectively','right','round','s','said','same','saw','say','saying','says','second','secondly','see','seeing','seem','seemed','seeming','seems','seen','self','selves','sensible','sent','serious','seriously','seven','several','shall','shan\'t','she','she\'d','she\'ll','she\'s','should','shouldn\'t','since','six','so','some','somebody','someday','somehow','someone','something','sometime','sometimes','somewhat','somewhere','soon','sorry','specified','specify','specifying','still','sub','such','sup','sure','t','take','taken','taking','tell','tends','th','than','thank','thanks','thanx','that','that\'ll','thats','that\'s','that\'ve','the','their','theirs','them','themselves','then','thence','there','thereafter','thereby','there\'d','therefore','therein','there\'ll','there\'re','theres','there\'s','thereupon','there\'ve','these','they','they\'d','they\'ll','they\'re','they\'ve','thing','things','think','third','thirty','this','thorough','thoroughly','those','though','three','through','throughout','thru','thus','till','to','together','too','took','toward','towards','tried','tries','truly','try','trying','t\'s','twice','two','u','un','under','underneath','undoing','unfortunately','unless','unlike','unlikely','until','unto','up','upon','upwards','us','use','used','useful','uses','using','usually','v','value','various','versus','very','via','viz','vs','w','want','wants','was','wasn\'t','way','we','we\'d','welcome','well','we\'ll','went','were','we\'re','weren\'t','we\'ve','what','whatever','what\'ll','what\'s','what\'ve','when','whence','whenever','where','whereafter','whereas','whereby','wherein','where\'s','whereupon','wherever','whether','which','whichever','while','whilst','whither','who','who\'d','whoever','whole','who\'ll','whom','whomever','who\'s','whose','why','will','willing','wish','with','within','without','wonder','won\'t','would','wouldn\'t','x','y','yes','yet','you','you\'d','you\'ll','your','you\'re','yours','yourself','yourselves','you\'ve','z','zero');
        
        $must_keywords = $data['must_keywords'];
        if(!empty($data['excluding_keywords']))
        {
           $excluding_keywords = explode(',',$data['excluding_keywords']);
        }
        $this->db->select('*');
        $this->db->from('tbl_dailyreport_recruiter');
        if(@$data['anual_salary_from_lacs'] || $data['anual_salary_to_lacs'] )
        {
            
            if(!empty($data['anual_salary_from_lacs']))
            {
              $this->db->where('ctc<=', $data['anual_salary_from_lacs']);
            }
            if(!empty($data['anual_salary_to_lacs']))
            {
                $this->db->where('ctc<=', $data['anual_salary_to_lacs']);
            }
        }
        if(!empty(@$data['current_location']))
        {
            $this->db->where('location',trim($data['current_location']));
        }
        if(!empty(@$data['prefered_location']))
        {
            $this->db->where('preffered_location',trim($data['prefered_location']));
        }
        if(!empty(@$data['total_experience_from'] || @$data['total_experience_to'] ))
        {
              $this->db->where('yrs_of_experience>=',$data["total_experience_from"],false);
            $this->db->where('yrs_of_experience<=',$data["total_experience_to"],false);
            // $this->db->where('preffered_location', $data['prefered_location']);
        }
        if(!empty(@$any_keywords))
        {
            $input_any_keywords = preg_replace('/\b('.implode('|',$commonWords).')\b/','',$any_keywords);
            $any=explode(' ',$input_any_keywords);
            $this->db->group_start();
            foreach($any as $a)
            {
                if($a!="")
                {
                    strtolower($a);
                    if($a=="developer")
                    {
                        $key = $last_key.' '.$a;
                        $this->db->or_like('position_skills',$key);
                    }
                    else
                    {
                        $this->db->or_like('position_skills',$a);
                        $this->db->or_like('role', $a);
                        $this->db->or_like('sheetname', $a);
                    }
                }
                
                $last_key=$a;
            }
            $this->db->group_end();
        }
       
        if(!empty(@$excluding_keywords))
        {
            $this->db->group_start();
             foreach($excluding_keywords as $row)
            {
                $this->db->or_not_like('position_skills',$row);
                $this->db->or_not_like('role', $row);
                $this->db->or_not_like('sheetname', $row);
                $this->db->or_not_like('company_name', $row);
            }
            $this->db->group_end();
        }
        
        if(!empty(@$include_company))
        {
           $this->db->where_in('sheetname',$include_company); 
        }
        if(!empty(@$exclude_company))
        {
            $this->db->where_not_in('sheetname',$exclude_company);
        }
        
        if(!empty(@$must_keywords))
        {
         $must_key=explode(',',$must_keywords);
         foreach($must_key as $row)
         {
             $this->db->or_like('position_skills',$row);
         } 
        
    }
        $this->db->order_by('dailyreport_id','DESC');
        $query=$this->db->get();
        $num_rows = $query->num_rows();
        return $num_rows;
    
    }
    
    function get_candidate_data_filter_rows($data)
    {
        $any_keywords = @$data['any_keywords'];
        $commonWords = array('a','able','about','above','abroad','according','accordingly','across','actually','adj','after','afterwards','again','against','ago','ahead','ain\'t','all','allow','allows','almost','alone','along','alongside','already','also','although','always','am','amid','amidst','among','amongst','an','and','another','any','anybody','anyhow','anyone','anything','anyway','anyways','anywhere','apart','appear','appreciate','appropriate','are','aren\'t','around','as','a\'s','aside','ask','asking','associated','at','available','away','awfully','b','back','backward','backwards','be','became','because','become','becomes','becoming','been','before','beforehand','begin','behind','being','believe','below','beside','besides','best','better','between','beyond','both','brief','but','by','c','came','can','cannot','cant','can\'t','caption','cause','causes','certain','certainly','changes','clearly','c\'mon','co','co.','com','come','comes','concerning','consequently','consider','considering','contain','containing','contains','corresponding','could','couldn\'t','course','c\'s','currently','d','dare','daren\'t','definitely','described','despite','did','didn\'t','different','directly','do','does','doesn\'t','doing','done','don\'t','down','downwards','during','e','each','edu','eg','eight','eighty','either','else','elsewhere','end','ending','enough','entirely','especially','et','etc','even','ever','evermore','every','everybody','everyone','everything','everywhere','ex','exactly','example','except','f','fairly','far','farther','few','fewer','fifth','first','five','followed','following','follows','for','forever','former','formerly','forth','forward','found','four','from','further','furthermore','g','get','gets','getting','given','gives','go','goes','going','gone','got','gotten','greetings','h','had','hadn\'t','half','happens','hardly','has','hasn\'t','have','haven\'t','having','he','he\'d','he\'ll','hello','help','hence','her','here','hereafter','hereby','herein','here\'s','hereupon','hers','herself','he\'s','hi','him','himself','his','hither','hopefully','how','howbeit','however','hundred','i','i\'d','ie','if','ignored','i\'ll','i\'m','immediate','in','inasmuch','inc','inc.','indeed','indicate','indicated','indicates','inner','inside','insofar','instead','into','inward','is','isn\'t','it','it\'d','it\'ll','its','it\'s','itself','i\'ve','j','just','k','keep','keeps','kept','know','known','knows','l','last','lately','later','latter','latterly','least','less','lest','let','let\'s','like','liked','likely','likewise','little','look','looking','looks','low','lower','ltd','m','made','mainly','make','makes','many','may','maybe','mayn\'t','me','mean','meantime','meanwhile','merely','might','mightn\'t','mine','minus','miss','more','moreover','most','mostly','mr','mrs','much','must','mustn\'t','my','myself','n','name','namely','nd','near','nearly','necessary','need','needn\'t','needs','neither','never','neverf','neverless','nevertheless','new','next','nine','ninety','no','nobody','non','none','nonetheless','noone','no-one','nor','normally','not','nothing','notwithstanding','novel','now','nowhere','o','obviously','of','off','often','oh','ok','okay','old','on','once','one','ones','one\'s','only','onto','opposite','or','other','others','otherwise','ought','oughtn\'t','our','ours','ourselves','out','outside','over','overall','own','p','particular','particularly','past','per','perhaps','placed','please','plus','possible','presumably','probably','provided','provides','q','que','quite','qv','r','rather','rd','re','really','reasonably','recent','recently','regarding','regardless','regards','relatively','respectively','right','round','s','said','same','saw','say','saying','says','second','secondly','see','seeing','seem','seemed','seeming','seems','seen','self','selves','sensible','sent','serious','seriously','seven','several','shall','shan\'t','she','she\'d','she\'ll','she\'s','should','shouldn\'t','since','six','so','some','somebody','someday','somehow','someone','something','sometime','sometimes','somewhat','somewhere','soon','sorry','specified','specify','specifying','still','sub','such','sup','sure','t','take','taken','taking','tell','tends','th','than','thank','thanks','thanx','that','that\'ll','thats','that\'s','that\'ve','the','their','theirs','them','themselves','then','thence','there','thereafter','thereby','there\'d','therefore','therein','there\'ll','there\'re','theres','there\'s','thereupon','there\'ve','these','they','they\'d','they\'ll','they\'re','they\'ve','thing','things','think','third','thirty','this','thorough','thoroughly','those','though','three','through','throughout','thru','thus','till','to','together','too','took','toward','towards','tried','tries','truly','try','trying','t\'s','twice','two','u','un','under','underneath','undoing','unfortunately','unless','unlike','unlikely','until','unto','up','upon','upwards','us','use','used','useful','uses','using','usually','v','value','various','versus','very','via','viz','vs','w','want','wants','was','wasn\'t','way','we','we\'d','welcome','well','we\'ll','went','were','we\'re','weren\'t','we\'ve','what','whatever','what\'ll','what\'s','what\'ve','when','whence','whenever','where','whereafter','whereas','whereby','wherein','where\'s','whereupon','wherever','whether','which','whichever','while','whilst','whither','who','who\'d','whoever','whole','who\'ll','whom','whomever','who\'s','whose','why','will','willing','wish','with','within','without','wonder','won\'t','would','wouldn\'t','x','y','yes','yet','you','you\'d','you\'ll','your','you\'re','yours','yourself','yourselves','you\'ve','z','zero');
        
         $must_keywords = @$data['must_keywords'];
         $excluding_keywords = @$data['excluding_keywords'];
        if(@$any_keywords)
        {
            $input_any_keywords = preg_replace('/\b('.implode('|',$commonWords).')\b/','',$any_keywords);
            
            $any=explode(' ',$input_any_keywords);
            $this->db->group_start();
            $last_key;
            foreach($any as $a)
            {
                if($a!="")
                {
                    strtolower($a);
                    if($a=="developer")
                    {
                        $key = $last_key.' '.$a;
                       /*$this->db->or_like('qulification', $a);*/
                        $this->db->or_like('position_skills',$key);
                        /*$this->db->or_like('relevant_exp', $a);
                        $this->db->or_like('location', $key);
                        $this->db->or_like('preffered_location', $key);*/
                    }
                    else
                    {
                        /*$this->db->or_like('qulification', $a);*/
                        $this->db->or_like('position_skills',$a);
                        /*$this->db->or_like('relevant_exp', $a);
                        $this->db->or_like('location', $a);
                        $this->db->or_like('preffered_location', $a);*/
                    }
                }
                
                $last_key=$a;
            }
            $this->db->group_end();
        }
        /*if(@$must_keywords)
        {
            $this->db->group_start();
            for($i=0;$i<count($must_keywords);$i++)
            {
                $this->db->like('qulification', $any[$i]);
            }
            $this->db->group_end();
        }*/
        if(@$excluding_keywords)
        {
            /*$this->db->where_not_in('position_skills',$excluding_keywords);*/
            $this->db->group_start();
            for($i=0;$i<count($excluding_keywords);$i++)
            {
                /*$this->db->or_not_like('qulification', $any[$i]);*/
                $this->db->or_not_like('position_skills',$any[$i]);
                /*$this->db->or_not_like('relevant_exp', $any[$i]);*/
                $this->db->or_not_like('location', $any[$i]);
                $this->db->or_not_like('preffered_location', $any[$i]);
            }
            $this->db->group_end();
        }
        
        /*if(@$include_company)
        {
           $this->db->where_in('company_name',$include_company); 
        }
        if(@$exclude_company)
        {
            $this->db->where_not_in('company_name',$exclude_company);
        }*/
        if(@$data['anual_salary_from_lacs'] || $data['anual_salary_to_lacs'] )
        {
            
            if(!empty($data['anual_salary_from_lacs']))
            {
              $this->db->where('ctc<=', $data['anual_salary_from_lacs']);
            }
            if(!empty($data['anual_salary_to_lacs']))
            {
                $this->db->where('ctc<=', $data['anual_salary_to_lacs']);
            }
        }
        // if(@$data['current_location'])
        // {
        //     $this->db->where('location', $data['current_location']);
        // }
        // if(@$data['prefered_location'])
        // {
        //     $this->db->where('preffered_location', $data['prefered_location']);
        // }
        if(@$data['current_location'])
        {
            $this->db->where('location',trim($data['current_location']));
        }
        if(@$data['prefered_location'])
        {
            $this->db->where('preffered_location',trim($data['prefered_location']));
        }
        if(@$data['total_experience_from'] || @$data['total_experience_to'] )
        {
              $this->db->where('yrs_of_experience >=',$data["total_experience_from"],false);
            $this->db->where('yrs_of_experience<=',$data["total_experience_to"],false);
            // $this->db->where('preffered_location', $data['prefered_location']);
        }
        $this->db->order_by('dailyreport_id','DESC');
        $result=$this->db->get('tbl_dailyreport_recruiter')->num_rows();
        /*print_r($this->db->last_query());exit();*/
        return $result;
    }
    
    function get_skill_keyword()
    {
        $this->db->distinct();
        $this->db->select('position_skills');
        $this->db->from('tbl_dailyreport_recruiter');
        $this->db->order_by('position_skills','ASC');
        return $result=$this->db->get()->result();
         /*print_r($this->db->last_query());exit();*/
    }
    
    function get_location()
    {
        $this->db->distinct();
        $this->db->select('location');
        $this->db->from('tbl_dailyreport_recruiter');
        $this->db->order_by('location','ASC');
        return $result=$this->db->get()->result();
    }
    
     function get_preffered_location()
    {
        $this->db->distinct();
        $this->db->select('preffered_location');
        $this->db->from('tbl_dailyreport_recruiter');
        $this->db->order_by('preffered_location','ASC');
        return $result=$this->db->get()->result();
    }
    
    function get_company_details()
    {
        $this->db->distinct();
        $this->db->select('company_name');
        $this->db->from('tbl_dailyreport_recruiter');
        $this->db->order_by('company_name','ASC');
        return $result=$this->db->get()->result();
    }
    
    public function get_city_like($query)
    {
      $this->db->select ('name'); 
      $this->db->from ( 'cities' );
      $this->db->like('name',$query,'after');
      $sql = $this->db->get (); 
      return $sql->result_array();
    }
    
    public function insert_candidate($insert_data)
    {
        $this->db->insert('candidate_data', $insert_data);
        return $this->db->insert_id();
    }
    
    public function get_candidates()
    {
      $this->db->select ('candidate_id,candidate_name,candidate_email'); 
      $this->db->from ('candidate_data');
      $this->db->where('modified_at <=', 'DATE_SUB(NOW(), INTERVAL 1 DAY)');
      $sql = $this->db->get (); 
      return $sql->result();
    }
    
    public function get_candidate_resume_data($id)
    {
      $this->db->select ('*'); 
      $this->db->from ('candidate_data');
      $this->db->where('candidate_id',$id);
      $sql = $this->db->get (); 
      return $sql->row();
    }
    
    public function update_candidate($id,$data)
	{
				$this->db->where('candidate_id',$id);
		return	$this->db->update('candidate_data',$data);
	}
	
	public function global_update($where, $data, $table)
	{
				$this->db->where($where);
		return	$this->db->update($table, $data);
	}
	
	function job_list()
	{
	    $this->db->select('*')
	             ->from('tbl_jobs as BaseTbl')
	             ->join('client as c', 'c.client_id = BaseTbl.client_id', 'left')
	             ->where('BaseTbl.is_deleted', 0)
	             ->order_by('BaseTbl.created_at', 'DESC');
	   return $this->db->get()->result_array();
	}
	
	function job_list_by_id($id)
	{
	    $this->db->select('*')
	             ->from('tbl_jobs as BaseTbl')
	             ->join('client as c', 'c.client_id = BaseTbl.client_id', 'left')
	             ->where('BaseTbl.id', $id);
	   return $this->db->get()->result_array();
	}
	
	public function get_searched_jobs($skills, $locations){
	    $this->db->select('*');
        $this->db->where_in('skills', $skills);
        $this->db->where_in('locations', $locations);
        return $this->db->get('tbl_jobs')->result_array();
	}
	
	public function get_candidate_profile($id)
    {
      $this->db->select ('*'); 
      $this->db->from ('tbl_dailyreport_recruiter');
      $this->db->where('dailyreport_id',$id);
      $sql = $this->db->get(); 
      return $sql->result();
    }
  public function check_data_of_not_respond($user_id)
    {
      $this->db->where('user_id',$user_id);
                            $this->db->where('final_status','Not Responding');
	                 return   $res=$this->db->get('tbl_dailyreport_recruiter')->result();
    }
    public function check_data_of_not_respond_by_user($user_id)
    {
      $this->db->where('user_id',$user_id);
                            $this->db->where('final_status','Not Responding');
	                   return $res=$this->db->get('tbl_dailyreport_recruiter')->result_array();
    }
    
    public function insert_company_images_by_recruiter($data = array())
	{
    $insert = $this->db->insert_batch('tbl_dailyreport_recruiter_images',$data);
    return $this->db->insert_id();
  }
   public function get_details_company_images_by_recruiter($id)
  {
    $this->db->select('*');
    $this->db->where('tbl_dailyreport_recruiter_id',$id);
    $this->db->order_by("tbl_d_recruiter_id", "DESC");
    return  $this->db->get('tbl_dailyreport_recruiter_images')->result();
  }
  
  	public function delete_company_images_by($id)
	{
	 	$this->db->where('tbl_d_recruiter_id',$id);
	 	return $this->db->delete('tbl_dailyreport_recruiter_images');
	}
	public function view_details_screenshots($id)
	{
		        $this->db->select('*');
		        $this->db->from('tbl_dailyreport_recruiter_images');
		        $this->db->join('tbl_dailyreport_recruiter', 'tbl_dailyreport_recruiter_images.tbl_dailyreport_recruiter_id = tbl_dailyreport_recruiter.dailyreport_id');
		        $this->db->where('tbl_dailyreport_recruiter.dailyreport_id', $id);

        return 	$this->db->get()->result();
	}

}
?>