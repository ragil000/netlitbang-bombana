<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
        $this->load->library('MyConfig');
        $this->load->model('login/LoginModel');
    }

    public function login()
    {
        $status = False;
        $pesan = 'Gagal Melakukan Login';
        $username = '';
        
        $post = $this->input->post();
        $dataOneUser = $this->LoginModel->selectOneUserByUser(@$post['tb_admin_username'], md5(@$post['tb_admin_password']));
        
        if(count($dataOneUser) == 1){
            $status = True;
            $pesan = "Berhasil Melakukan Login";
            $username = $dataOneUser[0]['tb_admin_username'];
        }

        $kirim = array(
            'status' => $status,
            'pesan' => $pesan,
            'username' => $username,
        );

        echo json_encode($kirim);
    }

}
