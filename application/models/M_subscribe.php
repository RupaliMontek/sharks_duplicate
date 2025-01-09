<?php
class M_subscribe extends CI_Model
{
public function delete_user($id)
	{
	 			$this->db->where('user_id', $id);
     	return 	$this->db->delete('users');
	}

	public function insert_enquiry($data)
	{
		return $this->db->insert('contact_us',$data); 
	}
		public function insert_enquiry_lets_talk($data)
	{
		return $this->db->insert('lets_talk',$data); 
	}

	public function GetSubscribeEmail()
	{
		$this->db->select('*');
		$this->db->order_by('subscribe_id','DESC');
		$this->db->from('subscribe');
		return $this->db->get()->result_array();
	}

	public function Update_Subscribe_Status($table,$id, $data)
	{
		$this->db->where('subscribe_id', $id);
		return $this->db->update($table, $data);
	}

	public function GetContactUs()
	{
		$this->db->select('*');
		$this->db->order_by('contact_us_id','DESC');
		$this->db->from('contact_us');
		return $this->db->get()->result_array();
	}

	public function get_investor_enquiry()
	{
		$query = $this->db->query("SELECT * FROM investor_enquiry,countries,states,cities,project where investor_enquiry.country=countries.id and investor_enquiry.state=states.id and investor_enquiry.city=cities.id and investor_enquiry.project=project.project_id");
    return  $query->result();
		
		//        $this->db->order_by('investor_id','DESC');
		// return $this->db->get('investor_enquiry')->result();
	}

	public function get_nri_enquiry()
	{
		$query = $this->db->query("SELECT * FROM nri_enquiry,countries,states,cities,project where nri_enquiry.country=countries.id and nri_enquiry.state=states.id and nri_enquiry.city=cities.id and nri_enquiry.project=project.project_id");
    return  $query->result();
		
		//        $this->db->order_by('nri_id','DESC');
		// return $this->db->get('nri_enquiry')->result();

		
	}
	public function delete_contact($id)
	{
	 			$this->db->where('contact_us_id', $id);
     	return 	$this->db->delete('contact_us');
	}

	public function delete_nri_enquiry($id)
	{
	 			$this->db->where('nri_id', $id);
     	return 	$this->db->delete('nri_enquiry');
	}

	public function delete_investor_enquiry($id)
	{
	 			$this->db->where('investor_id', $id);
     	return 	$this->db->delete('investor_enquiry');
	}

	public function GetRegistration()
	{
		$this->db->select('u.*, p.project_title');
		$this->db->order_by('u.user_id','DESC');
		$this->db->from('users u');
		$this->db->join('project p', 'p.project_id = u.project_id', 'LEFT');
		return $this->db->get()->result_array();
	}

	public function Update_registrationStatus($table,$id, $data)
	{
		$this->db->where('user_id', $id);
		return $this->db->update($table, $data);
	}
	
	
	public function get_users_by_status($status)
	{
		$this->db->where('status', $status);
		return $this->db->get('users')->result();
	}



	public function getRecord_broker($id)
	{
		$this->db->select('*');
		$this->db->from('car_pooling');
		$this->db->where('car_pooling_id',$id);
		return $this->db->get()->row();
	}


	public function update_broker($table,$data,$id){
		$this->db->where('car_pooling_id',$id);
		return $this->db->update($table,$data);
	}


	public function details_broker($id)
	{
				$this->db->where('car_pooling_id',$id);
		return	$this->db->get('car_pooling')->row();
	}

	public function delete_broker( $id)
	{
	 			$this->db->where('car_pooling_id', $id);
     	return 	$this->db->delete('car_pooling');
	}
	/*=========== basics broker end ===========*/

}
?>