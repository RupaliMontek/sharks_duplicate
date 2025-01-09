<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class M_permission extends CI_Model
{

public function list_internal_user_role1($admin_id){
        //$this->db->where('added_by',$admin_id);
	    return $this->db->get('emp_role')->result();
	}
	
	
public function list_labels($type)
{
        $query=$this->db->query("SELECT * FROM sidebar_option  ORDER BY  sidebar_option_id ASC");
        return $query->result();
    }

    public function list_user($uid)
{
        $query=$this->db->query("SELECT * FROM users as s where user_id='$uid'");
        return $query->row();
    }

public function list_labels_role($rid)
{
        $query=$this->db->query("SELECT * FROM role_permissions ,sidebar_submenu,sidebar_option where sidebar_option.sidebar_option_id=sidebar_submenu.s_id and role_permissions.option_id= sidebar_submenu.sidebar_submenu_id and role_permissions.role_id='$rid' ");
         return $query->result();
        
    }

public function list_labels1()
{
        $query=$this->db->query("SELECT * FROM permissions where status=1 GROUP BY name");
        return $query->result();
    }

public function insert_role_permissions($data)
{
	return $this->db->insert('role_permissions',$data);
}

    public function get_menu_id_by_submenu_id($submenu_id){
        $this->db->where('sidebar_submenu_id', $submenu_id);
        return $this->db->get('sidebar_submenu')->row();
    }

    public function get_submenus_permissions_by_id($id, $type){
        $this->db->select('submenu_id');
        $this->db->where('role_id', $id);
        $this->db->where('role_type', $type);
        $this->db->where('status',1);
        return $this->db->get('role_permissions')->result_array();
    }

    public function get_permission_id_from_role_and_submenu_id($id, $submenu, $type){
        $this->db->where('role_id', $id);
        $this->db->where('submenu_id', $submenu);
        $this->db->where('role_type', $type);
        return $this->db->get('role_permissions')->row();
    }

    public function reset_all_permissions_by_role_id($id, $type){
        $this->db->where('role_id', $id);
        $this->db->where('role_type', $type);
        return $s=$this->db->update('role_permissions', array('status'=>0));
    }

    public function update_role_permissions($role_p_id, $data){
        $this->db->where('role_p_id', $role_p_id);
        return $this->db->update('role_permissions', $data);  
    }

    public function get_all_permissions_by_user_role($role_id){
        $this->db->where('role_id', $role_id);
        $this->db->where('status', 1);
        return $this->db->get('role_permissions')->result_array();
    }

    public function get_permission_id_from_role_and_menu_submenu_id($id, $menu, $submenu_id, $type){
        $this->db->where('role_id', $id);
        $this->db->where('option_id', $menu);
        $this->db->where('submenu_id', $submenu_id);
        $this->db->where('role_type', $type);
        return $this->db->get('role_permissions')->row();
    }
	
	public function list_internal_user_role(){
	    return $this->db->get('emp_role')->result();
	}
	
	public function insert_new_internal_role($data){
	    $this->db->insert('emp_role', $data);
	    return $this->db->insert_id();
	}
	
	public function get_internal_role_by_id($id){
	    $this->db->where('role_id', $id);
	    return $this->db->get('emp_role')->row();
	}
	
	public function get_internal_dept_role_by_id($id){
	    $this->db->where('role_id', $id);
	    return $this->db->get('emp_role')->row();
	}
	
	public function update_internal_user_role($role_id,$data){
	    $this->db->where('role_id', $role_id);
	    return $this->db->update('emp_role', $data);
	}
	
	public function list_sub_user_role_org_id($added_by){
	   // $this->db->where('added_by', $added_by);
	    return $this->db->get('sub_user_role')->result();
	}
	
	public function insert_new_sub_user_role($data){
	    $this->db->insert('sub_user_role', $data);
	    return $this->db->insert_id();
	}
	
	public function get_sub_user_role_by_id($id){
	    $this->db->where('role_id', $id);
	    return $this->db->get('sub_user_role')->row();
	}
	
	public function update_sub_user_role($role_id,$data){
	    $this->db->where('role_id', $role_id);
	    return $this->db->update('sub_user_role', $data);
	}
	
	
	
	//Rhutuja - 26-02-2020
	
	 public function get_sidebar_menus_by_role_id($role_id){
        /*$this->db->select('r.option_id, s.*');
        $this->db->from('role_permissions r');
        $this->db->join('sidebar_option s', 's.sidebar_option_id = r.option_id', 'LEFT');
        $this->db->group_by('r.option_id');
        $this->db->where('r.role_id', $role_id);
        $this->db->where('r.role_type', 'user');
        return $this->db->get()->result();*/

        $query = $this->db->query("SELECT o.*,r.* FROM sidebar_option o, role_permissions r WHERE r.option_id = o.sidebar_option_id AND r.status = 1 AND o.type = 'user' AND r.role_id = $role_id  GROUP BY r.option_id");
        return $query->result();
    }

    public function insert_subuser_role_permissions($data)
    {
        return $this->db->insert('role_permissions',$data);
    }


    public function reset_all_subuser_permissions_by_role_id($id, $type){
        $this->db->where('role_id', $id);
        $this->db->where('role_type', $type);
        return $this->db->update('role_permissions', array('status'=>0));
    }


     public function get_subuser_permission_id_from_role_and_submenu_id($id, $submenu, $type){
        $this->db->where('role_id', $id);
        $this->db->where('submenu_id', $submenu);
        $this->db->where('role_type', $type);
        return $this->db->get('role_permissions')->row();
    }
    
     public function get_subuser_permission_id_from_role_and_menu_id($id, $menu, $type){
        $this->db->where('role_id', $id);
        $this->db->where('submenu_id', 0);
        $this->db->where('option_id', $menu);
        $this->db->where('role_type', $type);
        return $this->db->get('role_permissions')->row();
    }

    public function update_subuser_role_permissions($role_p_id, $data){
        $this->db->where('role_p_id', $role_p_id);
        return $this->db->update('role_permissions', $data);  
    }


    public function get_sub_user_role_list_by_user_id($user_id){
        //$this->db->where('added_by', $user_id);
        return $this->db->get('sub_user_role')->result();
    }


   public function list_labels_for_subuser($rid)
    {   
        $query=$this->db->query("SELECT * FROM role_permissions ,sidebar_option where role_permissions.role_id='$rid' AND role_permissions.status = 1 AND sidebar_option.sidebar_option_id  = role_permissions.option_id AND role_permissions.role_type = 'sub user' GROUP BY role_permissions.option_id ORDER BY sidebar_option.order_no ");
         return $query->result();
    }
    
    public function get_subuser_submenus_permissions_by_id($id,$type){
        $this->db->select('submenu_id');
        $this->db->where('role_id', $id);
        $this->db->where('role_type', $type);
        $this->db->where('status',1);
        return $this->db->get('role_permissions')->result_array();
    }
    
    
    public function get_view_write_delete_permissions($link, $role_type, $role){
	    /*$this->db->select('r.*');
	    $this->db->from('role_permissions r');
	    $this->db->join('sidebar_option o', "o.sidebar_option_id = r.option_id AND o.link = '$link' ", 'LEFT');
	    $this->db->join('sidebar_submenu s', "s.sidebar_submenu_id = r.submenu_id AND s.link = '$link' ", 'LEFT');
	    $this->db->where('r.role_type', $user_type);
	    $this->db->where('r.role_id', $role);
	    $res =   $this->db->get()->result();*/
	    
	    $query = $this->db->query("SELECT r.view_flag, r.write_flag, r.delete_flag,r.role_p_id FROM `role_permissions` r LEFT JOIN `sidebar_option` o ON o.sidebar_option_id = r.option_id LEFT JOIN `sidebar_submenu` s ON s.sidebar_submenu_id = r.submenu_id WHERE r.role_id = $role AND r.role_type = '".$role_type."' AND (o.link = '".$link."' OR s.link = '".$link."')");
	    return $query->row();
        
    }
	    
/*ode By Swarup*/

public function list_user_role()
    {
                
                $this->db->order_by('role_id','ASC');
        return  $this->db->get('user_role')->result();
    }
}
?>