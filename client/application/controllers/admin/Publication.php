<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publication extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('admin/Publication_model');
	}

	public function index($content = 'sop-kelitbangan', $page = 1)
	{
		$data	= $this->__getContentData('list', $content);
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/pages/publication/'.$content.'-list');
		$this->load->view('admin/templates/footer');
	}

	protected function __getContentData($type, $content, $id = NULL) {
		if($type == 'list') {
			if($content == 'sop-kelitbangan') {
				$data['head'] 			= 'SOP Kelitbangan';
				$data['content']		= 'Informasi SOP Kelitbangan kabupaten Bombana.';
				$data['title']			= 'SOP Kelitbangan';
	 
				// Pagination confoguration
				$config['base_url'] 	= base_url('admin/publication/sop-kelitbangan'); //site url
				$config['total_rows'] 	= $this->Publication_model->getTotalData('sop-kelitbangan'); //total row
				$config['per_page'] 	= 10;  //show record per halaman
				$config["uri_segment"] 	= 4;  // uri parameter
				$choice 				= $config["total_rows"] / $config["per_page"];
				$config["num_links"] 	= floor($choice);
	
				// Create pagination style for BootStrap v4
				$config['first_link']       = 'First';
				$config['last_link']        = 'Last';
				$config['next_link']        = '<i class="fas fa-angle-right"></i>';
				$config['prev_link']        = '<i class="fas fa-angle-left"></i>';
				$config['full_tag_open']    = '<div class="pagging text-center"><nav aria-label="..."><ul class="pagination justify-content-end mb-0">';
				$config['full_tag_close']   = '</ul></nav></div>';
				$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
				$config['num_tag_close']    = '</span></li>';
				$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
				$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
				$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
				$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
				$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
				$config['prev_tagl_close']  = '</span>Next</li>';
				$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
				$config['first_tagl_close'] = '</span></li>';
				$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
				$config['last_tagl_close']  = '</span></li>';
				$this->pagination->initialize($config);
	
				$data['page'] 				= ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
				$data['data'] 				= $this->Publication_model->getContentData('sop-kelitbangan', $config["per_page"], $data['page']);           
			
				$data['pagination'] 		= $this->pagination->create_links();
				
				$data['script']	= 'admin/publication/sop-kelitbangan.js'; 
	
				return $data;
			}
		}else if($type == 'edit') {
			if($content == 'sop-kelitbangan') {
				$data['head'] 		= 'SOP Kelitbangan';
				$data['content']	= 'Informasi SOP Kelitbangan kabupaten Bombana.';
				$data['title']		= 'SOP Kelitbangan';
				$data['data'] 		= $this->Publication_model->getDetail($id);
				
				$data['script']		= 'admin/publication/sop-kelitbangan.js'; 
	
				return $data;
			}
		}
	}

	public function detail($id) {
		$result	= $this->Publication_model->getDetail($id);
		echo json_encode($result);
	}

	public function edit($content, $id) {
		$data	= $this->__getContentData('edit', $content, $id);
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/pages/publication/'.$content.'-edit');
		$this->load->view('admin/templates/footer');
	}
}
