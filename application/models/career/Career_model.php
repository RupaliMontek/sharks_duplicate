<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Career_model extends CI_Model 
{
    
public function list_career_enquiry()
  {
  //   $query = $this->db->query("SELECT * FROM tbl_career,tbl_apply_now where tbl_career.career_id=tbl_apply_now.career_id and tbl_career.status='1' ORDER BY tbl_career.career_id DESC");
  // // $this->db->LIMIT(3);
  // return $query->result();
  $this->db->select('*');                                     
    $this->db->from('tbl_career_enquiry');
    $this->db->order_by('career_enquiry_id','DESC');
    return $this->db->get()->result();
  }
public function insert_career_enquiry($para)
  {
    $this->db->insert('tbl_career_enquiry',$para);
    return  $result = $this->db->insert_id();
  }
  public function insert_brandperl_seo($para)
  {
    $this->db->insert('brandperl_seo_enquiry',$para);
    return  $result = $this->db->insert_id();
  }
  public function delete_career_enquiry($id)
  {
    $this->db->where('career_enquiry_id',$id);
    return $this->db->delete('tbl_career_enquiry');
  }
  
 
}
