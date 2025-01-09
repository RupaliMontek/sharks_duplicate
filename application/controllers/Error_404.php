<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error_404 extends CI_Controller {

  public function __construct() {

    parent::__construct();

    // load base_url
    $this->load->helper('url');
    $this->load->model("blog/m_blog");
    $this->load->model('model/blog/M_blog', 'M_blog');
  }

  public function index(){
 
        $this->output->set_status_header('404'); 
        $db_name1 = "sharksjob_backend";
        $this->db->query("use " .$db_name1. "");
        $data['recent_blogs'] = $this->M_blog->list_recent_blogs(4);
        $this->load->view("recruiter/employer_header"); 
        $this->load->view("recruiter/error_404");
        $this->load->view("recruiter/employer_footer", @$data);
 
  }

}