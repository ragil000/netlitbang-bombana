<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CountController extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
        $this->load->library('MyConfig');
        // $this->load->model('count/CountModel');
    }

    public function countAllData()
    {
        $status = False;
        
        $komentar = $this->db->count_all_results('tb_aduan');
        $galeri = $this->db->count_all_results('tb_galeri');
        $keldes = $this->db->count_all_results('tb_baseline');
        $basemap = $this->db->count_all_results('tb_basemap');
        

        $kirim = array(
            'status' => $status,
            'komentar' => $komentar,
            'galeri' => $galeri,
            'keldes' => $keldes,
            'basemap' => $basemap,
        );

        echo json_encode($kirim);
    }

}
