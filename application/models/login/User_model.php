<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model 
{

/* registeration function*/

  function check_registeration_for_demouser_exists($email)
  {
    $result = $this->db->get_where('user_admin_demo',array('email' => $email));
    if($result->num_rows() >0)
    {
      return "0";
    }
    else
    {
      return "1"; 
    }
  } 
/**/



/*login function start*/
function check_forgot_password_check_email_exists($email)
  {
    $result = $this->db->get_where('user_admin',array('email' => $email,'status' => "1"));
    if($result->num_rows() >0)
    {
      return "1";
    }
    elseif($result->num_rows()==0) 
    {
      $result = $this->db->get_where('user_admin_demo',array('email' => $email, 'status' => "1" ));
      if($result->num_rows()>0)
      {
        return "1";
      }
      else
      {
        return "0";
      }
    }
  } 

  function password_forgot_password_check_email_exists($email,$password)
  {
     $password = md5($password);
    $result = $this->db->get_where('user_admin',array('email' => $email, 'password' => $password,'status' => "1" ));
    if($result->num_rows() >0)
    {
      return "1";
    }
    elseif($result->num_rows()==0) 
    {
      $result = $this->db->get_where('user_admin_demo',array('email' => $email, 'password' => $password,'status' => "1" ));
      if($result->num_rows()>0)
      {
        return "1";
      }
      else
      {
        return "0";
      }
    }
  } 

/*login function end*/

public function check_permmision($user_id)
{
          $this->db->where('user_id',$user_id);
    return $this->db->get('role_permissions')->num_rows();
    
}


  public function login_model_by_admin($user_id)
  {
    $this->load->database('login');
    $this->db->select('*');
    $this->db->from('user_admin');
    $this->db->where('user_admin_id',$user_id);
    $this->db->where('status',1);
    //$this->db->where('attempts',0);
    $res= $this->db->get()->result_array();
    return $res;
  }
  public function login_model($mailid,$pass)
  {
    
    $this->db->select('*');
    $this->db->from('user_admin');
    $this->db->where('email',$mailid);
    $this->db->where('password',md5($pass));
    // $this->db->where('status',1);
    $res= $this->db->get()->result_array();
    // exit;
    if (!empty($res)) 
    {
      return $res;
    }
    else
    {
        // $this->db->select('demo_user_admin_id,first_name,last_name,email,user_mobile');
        $this->db->select('*');
        
        $this->db->from('user_admin');
        $this->db->where('email',$mailid);
        $this->db->where('password',md5($pass));
        $this->db->where('status',1);
        $res= $this->db->get()->result_array();
        if (!empty($res)) 
        {
          return $res;
        }
        else
        {
          return false;
        }
    }
    
    
  }
  public function check_login_model($email, $password) {
        // Fetch user from database by email
        $this->db->select('*');
        $this->db->from('user_admin');
        $this->db->where('email', $email);
        $this->db->where('status', 1); // Make sure user is active
        $result = $this->db->get()->row_array();

        // If user exists, verify the password
        if (!empty($result) && password_verify($password, $result['password'])) {
            return [$result];
        } else {
            return false; // Invalid credentials
        }
    }

    public function admin_details($admin_id)
    {
                $this->db->where('user_admin_id',$admin_id);
        return  $this->db->get('user_admin')->row();
    }

        public function update_admin($login_id,$data)
    {
                $this->db->where('user_admin_id',$login_id);
        return  $this->db->update('user_admin',$data);
    }


    public function delete_user($login_id)
    {
                $this->db->where('user_admin_id',$login_id);
        return  $this->db->delete('user_admin');
    }

  



  function check_demo_user_email_exists($email)
  {
    $result = $this->db->get_where('user_admin_demo',array('email' => $email,'status' => "1"));
    if($result->num_rows() >0)
    {
      return "0";
    }
    else
    {
      return "1"; 
    }
  } 
  function check_user_email_exists($email)
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

  function forgot_password_check_email_exists_email_id($email_id)
  { 
    $result=$this->db->query("SELECT * FROM user_admin WHERE email='$email_id'");

    if($result->num_rows() >0)
    {
      return "1";
    }
    else
    {
      return "0"; 
    }
  } 







public function check_code_for_reset_password($code)
  {
      $this->db->where('activate_code', $code);
      $result =  $this->db->get('user_admin');
      if($result -> num_rows() >0)
      {
        return "1";
      }
      else
      {
        return "0"; 
      } 
  }



  public function getemail($code)
  {
    $this->db->select('email');
    $this->db->where('activate_code', $code);
    $query = $this->db->get('user_admin');
    return $query->result_array();
  }



    public function does_code_match($code, $email) 
    {
        $this->db->where('email', $email);
        $this->db->where('activate_code', $code);
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
        $this->db->where('email', $email);
      return  $this->db->update('user_admin', $data);
    }










  public function change_pass($mail,$key)
  {
   $res= array('reset_pass' =>$key );
   $this->db->where('email',$mail);
   return $this->db->update('registration',$res);
 }
 public function reset_password($pass)
 {
  $this->db->select('*');
  $this->db->from('registration');
  $this->db->where('reset_pass',$this->session->userdata('key'));
  $res_pass=$this->db->get()->result_array();
  if (!empty($res_pass))
  {
   $setpass = array('password' =>md5($pass),'reset_pass'=>'');
   $this->db->where('reset_pass',$this->session->userdata('key'));
   return $this->db->update('registration',$setpass);
 }else{
  echo "Data not found";
  return false; 
}
}

public function register_user($name,$email,$mob,$psw,$st,$ct,$ar,$addr,$pc)
{
  $info = array('name' =>$name ,'email'=>$email,'contact'=>$mob,'password'=>md5($psw),'state'=>$st,'city'=>$ct,'area'=>$ar,'address' =>$addr,'pincode' =>$pc);
  $this->db->insert('registration',$info);
  return $this->db->insert_id();
}


 public function emp_bank_details($admin_id)
    {
                $this->db->where('emp_id',$admin_id);
        return  $this->db->get('emp_bank_details')->row();
    }




public function demo_user_register($para)
{
   return $this->db->insert('user_admin',$para);
}

public function demo_user_save($para)
{
   return $this->db->insert('msuite_demo_enquiries',$para);
}


public function check_code($code)
  {
      $this->db->where('activate_code', $code);
      $result =  $this->db->get('user_admin')->row();
      /*if($result -> num_rows() >0)
      {
        return "1";
      }
      else
      {
        return "0"; 
      } */
      return $result;
  }

  public function activate_user($data, $code) 
  {
        $this->db->where('activate_code', $code);
        $this->db->set('activate_code', '');
      return  $this->db->update('user_admin', $data);
  }
  
  
   public function get_user_token($data)
  {
         
          $this->db->where($data);
   return $this->db->get('user_auth')->num_rows();

  }

  public function  insert_auth($data)
  {
             $this->db->insert('user_auth',$data);
    return   $this->db->insert_id();
  }
  
  public function  save_opportunities($data)
  {
             $this->db->insert('partner_opportunities',$data);
    return   $this->db->insert_id();
  }
  
  public function  save_api_enquiry($data)
  {
             $this->db->insert('api_enquiries',$data);
    return   $this->db->insert_id();
  }
  
  public function  emp_image($admin_id)
    {
        $this->db->select('*');
        $this->db->from('emp_details');
        $this->db->where('emp_id',$admin_id);
        return  $this->db->get()->result();
    }

}
?>