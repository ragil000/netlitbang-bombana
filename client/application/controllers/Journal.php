<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Journal extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Journal_model');
	}

	public function index($content = 'sop-kelitbangan')
	{
		$data	= $this->__getContentData($content);
		$this->load->view('templates/header');
		$this->load->view('templates/head-content', $data);
		$this->load->view('pages/journal/'.$content);
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
					'title'	=> 'jurnal',
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
					'slug'	=> base_url('journal/rik-bombana'),
					'total'	=> NULL
				],
				[
					'title'	=> 'Agenda Kegiatan',
					'slug'	=> base_url('journal/agenda-kegiatan'),
					'total' => $this->Journal_model->getTotalData('agenda-kegiatan', 'articles')
				],
				[
					'title'	=> 'Artikel dan Berita',
					'slug'	=> base_url('journal/artikel-berita'),
					'total' => $this->Journal_model->getTotalData('artikel-berita', 'articles')
				]
			];
			$data['results']	= $this->Journal_model->getContentData($content, 'articles');
			return $data;
		}else if($content == 'rik-bombana') {
			$data['head'] 		= 'RIK Kabupaten Bombana';
			$data['content']	= 'Informasi RIK kabupaten Bombana.';
			$data['title']		= 'RIK Kabupaten Bombana';
			$data['link_map']	= [
				[
					'title'	=> 'beranda',
					'slug'	=> base_url()
				],
				[
					'title'	=> 'jurnal',
					'slug'	=> NULL
				],
				[
					'title'	=> 'rik kab. bombana',
					'slug'	=> NULL
				],
			];
			$data['side_submenu']	= [
				[
					'title'	=> 'SOP Kelitbangan',
					'slug'	=> base_url('journal/sop-kelitbangan'),
					'total'	=> NULL
				],
				[
					'title'	=> 'Agenda Kegiatan',
					'slug'	=> base_url('journal/agenda-kegiatan'),
					'total' => $this->Journal_model->getTotalData('agenda-kegiatan', 'articles')
				],
				[
					'title'	=> 'Artikel dan Berita',
					'slug'	=> base_url('journal/artikel-berita'),
					'total' => $this->Journal_model->getTotalData('artikel-berita', 'articles')
				]
			];
			$data['results']	= $this->Journal_model->getContentData($content, 'articles');
			return $data;
		}
	}
}
