<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Blog extends CI_Controller
{
	public function __construct()
	{
		if( ! ini_get('date.timezone') )
		{
			date_default_timezone_set('GMT');
		} 
		parent::__construct();

		$this->load->model('blog/m_blog');

	}

	public function index()
	{
	    $db_name1 = "sharksjob_backend";
        $this->db->query("use " .$db_name1. "");
		$data['offshore_development']=$this->m_blog->list_blog();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_admin');
		$this->load->view('blog/list_blog',$data);
	}

// add products
	public function add()
	{
	    
		$this->load->view('template/header');
		$this->load->view('template/sidebar_admin');
		$this->load->view('blog/add_blog');
	}


	public function save_blog()
	{
	    $db_name1 = "sharksjob_backend";
        $this->db->query("use " .$db_name1. "");
		$config['upload_path'] ='./uploads/blog/';
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$config['max_size'] = '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';
		$this->upload->initialize($config);
		$do_upload1 = $this->upload->do_upload('image');
		if(!empty($do_upload1))
		{
			$path = $_FILES['image']['name'];
			$url = 'uploads/blog/'.$path; 		
			$image_1 =	$url;
		}
		else
		{
			$image_1 = $this->input->post('image1');
		}
		$para	=	array(

			'title' => $this->input->post('title', TRUE),
			'short_url' => str_replace(' ', '-', preg_replace('/[^A-Za-z0-9\-]/', '-', $this->input->post('short_url', TRUE))),
			'meta_title' => $this->input->post('meta_title', TRUE),
			'meta_desc' => $this->input->post('meta_desc', TRUE),
			'meta_keyword' => $this->input->post('meta_keyword', TRUE),
			'meta_canonical_href' => $this->input->post('meta_canonical_href', TRUE),
			'title_url' => str_replace(' ', '-', preg_replace('/[^A-Za-z0-9\-]/', '-', $this->input->post('title', TRUE))),
			'descriptions'	=>	$this->input->post('descriptions', TRUE),
			'image' =>$image_1,
			'cr_date' => date('Y-m-d'),

		);

		$result	= $this->m_blog->insert_blog($para);
		if($result)
		{
			$this->session->set_flashdata('success','Record added Successfully!');
		}
		else
		{
			$this->session->set_flashdata('error','Record not added!');
		}
		redirect('blog/blog');


	}


	public function edit_blog($id)
	{
	    $db_name1 = "sharksjob_backend";
        $this->db->query("use " .$db_name1. "");
        
		$data['blog']=$this->m_blog->get_blog($id);
		$this->load->view('template/header');
		$this->load->view('template/sidebar_admin');
		$this->load->view('blog/edit_blog',$data);	
	}


  public function update_blog()
	{
		$config['upload_path'] ='./uploads/blog/';
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$config['max_size'] = '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';
		$this->upload->initialize($config);
		$do_upload1 = $this->upload->do_upload('image');
		if(!empty($do_upload1))
		{
			$path = $_FILES['image']['name'];
			$url = 'uploads/blog/'.$path; 		
			$image_1 =	$url;
		}
		else
		{
			$image_1 = $this->input->post('image_1_1');
		}


		$id = $this->input->post('id', TRUE);
		$para	=	array(
			'title' => $this->input->post('title', TRUE),
			'title_url' => preg_replace('/[^A-Za-z0-9\-]/', '-', $this->input->post('title', TRUE)),
			'short_url' => str_replace(' ', '-', preg_replace('/[^A-Za-z0-9\-]/', '-', $this->input->post('short_url', TRUE))),
			'descriptions'	=>	$this->input->post('descriptions', TRUE),
			'image' =>$image_1,
		);
		$result = $this->m_blog->update_blog($id,$para);
		if($result)
		{
			$this->session->set_flashdata('success','Product Updated Successfully !');

			redirect('blog/blog');
		}
		else
		{
			$this->session->set_flashdata('error','Record not added!');
			redirect('blog/blog');
		}

	}


	public function delete_blog()
	{	
	    $db_name1 = "sharksjob_backend";
        $this->db->query("use " .$db_name1. "");

		$blog_id=$this->input->post('deleteID');		
		$result	= $this->m_blog->delete_blog($blog_id);
		if($result)
		{
			$this->session->set_flashdata('success','Record deleted Successfully!');
		}
		else
		{
			$this->session->set_flashdata('error','Record not deleted!');
		}
		redirect('blog/blog');
	}


}
?>