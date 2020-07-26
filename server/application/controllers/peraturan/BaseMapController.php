<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseMapController extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
        $this->load->library('MyConfig');
        $this->load->model('peraturan/BaseMapModel');
    }

    public function getData($page = 1, $api = true){
        $jumDataAll = 0;
        
		$status = TRUE;
		if($status){
            $search = '';
            if(@$this->input->post('search')){
                $search = $this->input->post('search');
            }
            $data = $this->BaseMapModel->getAll($page, $search);

            $jumDataAll = $this->BaseMapModel->getCount($search);
            $jumlahDatainPage = $this->BaseMapModel->getJumlahInPage();
            $jumlahPage = ceil($jumDataAll/$jumlahDatainPage);
		}else{
            $data = array();
            $jumlahPage = 1;
        }
        
		$kirim = array(
            'jumlahAll' => $jumDataAll,
            'jumlahPage' => $jumlahPage,
			'data' => $data,
			'status' => $status
        );
        if($api)
            echo json_encode($kirim);
        else
            return json_encode($kirim);
    }
    
	public function action($action = '', $id){
		
		$result = array(
			'pesan' => 'gagal terhubung server',
			'status' => false,
		);
		$status = True;
        if($status){
			$post = $this->input->post();
			if($id != null){
                $post['id_tb_basemap'] = $id;
			}
            $result = $this->BaseMapModel->$action($post);
        }
        $kirim = $result;
		echo json_encode($kirim);
    }
}
