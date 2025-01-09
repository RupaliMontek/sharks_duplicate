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
    $query=$this->db->query("SELECT * FROM user_admin WHERE (role=2 OR role=9) AND status=1 AND added_by_user_admin_id='$admin_id' ORDER BY name ASC");
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
	{
		$query=$this->db->query("SELECT sheetid as client_id, sheetname as client_name FROM tbl_dailyreport_recruiter WHERE admin_id='$admin_id' GROUP BY sheetname ORDER BY sheetname ASC");
        return $query->result_array();
	}

	public function client_list_by_user_id($user_id)
	{
		$query=$this->db->query("SELECT sheetid as client_id, sheetname as client_name FROM tbl_dailyreport_recruiter WHERE user_id='$user_id' GROUP BY sheetname ORDER BY sheetname ASC");
        return $query->result_array();
	}

	public function client_list_by_user_id_for_all($admin_id)
	{
		$query=$this->db->query("SELECT sheetid as client_id, sheetname as client_name FROM tbl_dailyreport_recruiter where admin_id='$admin_id' GROUP BY sheetname");
        return $query->result_array();
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

  public function get_client_id_search_result_candidate($area,$clientwise_candidate)
  {
    $this->db->select('*');
    $this->db->where('sheetid',$area); 
    $this->db->like('candidate_name', $clientwise_candidate);
    return  $this->db->get('tbl_dailyreport_recruiter')->result_array();
  }

 public function get_client_id_search_result_report($area)
  {
    $this->db->select('sr_no,date,company_client,position_skills,rp_id,candidate_name,color,applicant_id,role,qulification,company_name,yrs_of_experience, months_of_experience, relevant_exp,ctc, ctc_thousand, exp_ctc,notice_period,official_onpaper_notice_period,contact_no,alternate_contact_number,email_id,alternate_email_id,location,preffered_location,client_feedback,interview_schedule,interview_schedule_mode,final_status,client_recruiter,sourced_by,reason_for_job_change');
    $this->db->where('sheetid',$area);
    return  $this->db->get('tbl_dailyreport_recruiter')->result_array();
  }

  public function get_client_id_search_result_report_by_user_id($area,$user_id)
  {
    $this->db->select('sr_no,date,company_client,position_skills,rp_id,candidate_name,color,applicant_id,role,qulification,company_name,yrs_of_experience,months_of_experience,relevant_exp,ctc,ctc_thousand,exp_ctc,notice_period,official_onpaper_notice_period,contact_no,alternate_contact_number,email_id,alternate_email_id,location,preffered_location,client_feedback,interview_schedule,interview_schedule_mode,final_status,client_recruiter,sourced_by,reason_for_job_change');
    $this->db->where('sheetid',$area);
    $this->db->where('user_id',$user_id);
    return  $this->db->get('tbl_dailyreport_recruiter')->result_array();
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
    $result=$this->db->query("SELECT * FROM tbl_dailyreport_recruiter WHERE contact_no='$contact_no' AND sheetid='$client_id' AND transfer_comment='' ");
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



  public function individual_search_report_by_client($user_id,$client_id_by_userid)
  {    
    $query=$this->db->query("SELECT  a.sheetname, a.date, a.position_skills, a.rp_id, a.candidate_name, a.color, a.applicant_id, a.role, a.qulification, a.company_name, a.yrs_of_experience, a.relevant_exp, a.ctc, a.exp_ctc, a.notice_period, a.official_onpaper_notice_period, a.contact_no, a.alternate_contact_number, a.email_id, a.alternate_email_id, a.location, a.preffered_location, a.client_feedback, a.interview_schedule, a.interview_schedule_mode, a.final_status, a.client_recruiter, a.sourced_by, a.reason_for_job_change FROM tbl_dailyreport_recruiter a WHERE a.user_id='$user_id' AND a.sheetid='$client_id_by_userid' ");
        return $query->result_array();
  }


  public function individual_search_report_date($user_id,$fromdate,$todate)
  {    
    $query=$this->db->query("SELECT  a.sheetname, a.date, a.position_skills, a.rp_id, a.candidate_name, a.color, a.applicant_id, a.role, a.qulification, a.company_name, a.yrs_of_experience, a.relevant_exp, a.ctc, a.exp_ctc, a.notice_period, a.official_onpaper_notice_period, a.contact_no, a.alternate_contact_number, a.email_id, a.alternate_email_id, a.location, a.preffered_location, a.client_feedback, a.interview_schedule, a.interview_schedule_mode, a.final_status, a.client_recruiter, a.sourced_by, a.reason_for_job_change FROM tbl_dailyreport_recruiter a WHERE a.date BETWEEN '$fromdate' AND '$todate' AND a.user_id='$user_id'");
        return $query->result_array();
  }

  public function individual_search_report_date_client($client_id_by_userid,$user_id,$fromdate,$todate)
  {    
    $query=$this->db->query("SELECT a.sheetname, a.date, a.position_skills, a.rp_id, a.candidate_name, a.color, a.applicant_id, a.role, a.qulification, a.company_name, a.yrs_of_experience, a.relevant_exp, a.ctc, a.exp_ctc, a.notice_period, a.official_onpaper_notice_period, a.contact_no, a.alternate_contact_number, a.email_id, a.alternate_email_id, a.location, a.preffered_location, a.client_feedback, a.interview_schedule, a.interview_schedule_mode, a.final_status, a.client_recruiter, a.sourced_by, a.reason_for_job_change FROM tbl_dailyreport_recruiter a WHERE a.date BETWEEN '$fromdate' AND '$todate' AND a.user_id='$user_id' AND a.sheetid='$client_id_by_userid' ");
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
    $this->db->where('state_id',$state);
    return  $this->db->get('cities')->result_array();
  }
  
}
?>