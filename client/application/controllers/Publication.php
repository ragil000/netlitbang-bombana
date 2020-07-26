<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publication extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Publication_model');
	}

	public function index($content = 'sop-kelitbangan')
	{
		$data	= $this->__getContentData($content);
		$this->load->view('templates/header');
		$this->load->view('templates/head-content', $data);
		$this->load->view('pages/'.$content);
		$this->load->view('templates/footer');
	}

	protected function __getContentData($content) {
		if($content == 'sop-kelitbangan') {
			$data['head'] 		= 'SOP Kelitbangan';
			$data['content']	= 'Informasi SOP Kelitbangan kabupaten Bombana.';
			$data['title']		= 'SOP Kelitbangan';
			$data['link_map']	= [
				[
					'title'	=> 'beranda',
					'slug'	=> base_url()
				],
				[
					'title'	=> 'publikasi',
					'slug'	=> NULL
				],
				[
					'title'	=> 'sop kelitbangan',
					'slug'	=> NULL
				],
			];
			$data['side_submenu']	= [
				[
					'title'	=> 'RIK Kab. Bombana',
					'slug'	=> base_url('publication/rik-bombana'),
					'total'	=> NULL
				],
				[
					'title'	=> 'Agenda Kegiatan',
					'slug'	=> base_url('publication/agenda-kegiatan'),
					'total' => $this->Publication_model->getTotalData('agenda-kegiatan')
				],
				[
					'title'	=> 'Artikel dan Berita',
					'slug'	=> base_url('publication/artikel-berita'),
					'total' => $this->Publication_model->getTotalData('artikel-berita')
				]
			];
			$data['results']	= $this->Publication_model->getContentData($content);
			return $data;
		}
	}
}
