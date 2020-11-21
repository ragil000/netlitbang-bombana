<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data['head']		= 'Selamat Datang di <span>Net Litbang Kabupaten Bombana</span>';
		$data['content']	= 'Badan Penelitian dan Pengembangan Kabupaten Bombana.';
		// $data['content']	= 'Website informasi dan publikasi kelitbangan kabupaten Bombana. Website ini menyediakan informasi aktifitas dan kegiatan litbang kabupaten Bombana. Juga sebagai pusat publikasi kelitbangan dan usulan penelitian kabupaten Bombana.';
		$this->load->view('templates/header');
		$this->load->view('templates/head-content', $data);
		$this->load->view('pages/beranda');
		$this->load->view('templates/footer');
	}
}
