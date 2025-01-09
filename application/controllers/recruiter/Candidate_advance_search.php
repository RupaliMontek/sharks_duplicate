<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Candidate_advance_search extends BaseController
{
public function index()
 {
    $data['siderbar_menus'] = $this->M_permission->list_labels('internal user');
	$data['keywords'] = $this->m_recruiter->get_skill_keyword();
	$data['location'] = $this->m_recruiter->get_location();
	$data['preffered_location'] = $this->m_recruiter->get_preffered_location();
    $this->load->view('template/header');
	$this->load->view('template/sidebar',$data);
	$this->load->view('advance_search/advance_search1',$data);
 }
    
}