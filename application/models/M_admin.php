<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class m_admin extends CI_Model 
{

  public function get_pending_count_room_flat_ad()
  {
    $this->db->where('status', 10); 
    $query = $this->db->get('room_flat_ad');
    return $query->num_rows();
  }

 

}