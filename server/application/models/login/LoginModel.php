<?php

class LoginModel extends CI_Model
{
    private $table;
    public function __construct()
    {
        parent::__construct();
        $this->table = 'tb_admin';
    }

    public function selectOneUserByUser($user, $pass){
        $this->db->where("tb_admin_username", $user);
        $this->db->where("tb_admin_password", $pass);
        $data = $this->db->get($this->table)->result_array();
        return $data;
    }

}