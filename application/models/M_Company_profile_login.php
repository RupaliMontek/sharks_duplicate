<?php 
class M_Company_profile_login  extends CI_Model{
   
   public function login_check_candidate($mailid,$pass)
	{ 
		$this->db->select('user_admin_id,name,email');
		$this->db->from('user_admin');
		$this->db->where('email',$mailid);
		$this->db->where('password',md5($pass));
		$this->db->where('status',1);
        $this->db->where('role',1009);
        return  $res= $this->db->get()->result_array();
	}
	public function login_check_candidate1($mailid,$pass)
	{ 
		$this->db->select('user_admin_id,name,email');
		$this->db->from('user_admin');
		$this->db->where('email',$mailid);
		$this->db->where('password',md5($pass));
	//	$this->db->where('status',1);
        $this->db->where('role',1029);
        //return  
        $res= $this->db->get()->result_array();
        print_r($this->db->last_query());exit;
	}
	
public function get_candidate_departments_candidate_registration()
{
    $this->db->select("*");
    $this->db->from("department");
    $this->db->where("dept_id",27);
    $this->db->or_where("dept_id",26);
    return $this->db->get()->result();
}	

public function check_code_for_reset_password($code)
{
    $this->db->where('forgot_password_reset',$code); 
    $query=$this->db->get('user_admin'); 
    $result=$query->result(); 
    $num_rows=$query->num_rows(); 
    if($num_rows >0)
    { 
      return "1";
    }
    else
    {
      return "0"; 
    } 
}

public function view_candidate_profile_by_email_and_phone($email_id,$phone)
{
    $this->db->select("*");
    $this->db->from("user_admin");
    $this->db->where("email",$email_id);
    $this->db->where("contact",$phone);
    $this->db->join('department', 'department.dept_id = user_admin.dept', 'inner'); 
    return $this->db->get()->row();
}	

public function getemail($code)
{
    $this->db->select('email');
    $this->db->where('forgot_password_reset', $code);
    $query = $this->db->get('user_admin');
    return $query->row();
}   

  public function does_code_match($code, $email) 
    {

        $this->db->where('email',$email);
        $this->db->where('forgot_password_reset',$code);
        $this->db->from('user_admin');
        $num_res = $this->db->count_all_results();
        if ($num_res == 1) 
        {
            return TRUE;
        } 
        else 
        {
            return FALSE;
        }

    }
    
    public function update_user($data, $email) 

    {
    // $query = $this->db->query('select * from tbl_candidate_registration where candidate_email="' . $email . '"');

    //     return $query->result();
 
// $query= $this->db->query('UPDATE tbl_candidate_registration SET WHERE candidate_email="' . $email . '"');
// return $query->row();

        $this->db->where('email',$email);
		return	$this->db->update('user_admin',$data);
}
}
?>