<?php

class KumuhModel extends CI_Model
{
    private $jumlah, $table, $time;
    public function __construct()
    {
        parent::__construct();
        $this->time = time();
        $this->jumlah = 3;
        $this->table = 'tb_kumuh';
    }

    public function getCount($search = '', $post = array()){

        $query = $this->db->get($this->table);
        return $query->num_rows();
    }

    public function getJumlahInPage(){
        return $this->jumlah;
    }

    public function getAll($page = 1, $search = '', $post = array()){
        $jumlah = $this->jumlah;
        $awal = ($page - 1)*$jumlah;

        $this->db->limit($jumlah,$awal); 
        if(!@$post['all']){
            $this->db->limit($jumlah,$awal); 
        }
        
        $query = $this->db->get($this->table)->result_array();

        return $query;
    }

    public function getAllData(){
         $sql= "
            SELECT * , CONCAT('http://perkim-baubau.com/server/upload/kumuh/', tb_kumuh_gambar) as image FROM `tb_kumuh` 
        ";
        // $query = $this->db->get($this->table)->result_array();
        $query = $this->db->query($sql)->result_array();
        return $query;
    }

    public function create($post){
        
        $post = $this->security->xss_clean($post);
        $pesan = "Gagal Menambah Data";
        $status = false;

        if($this->_uploadImage()){
            if($this->cekInput($post)){
                $data = array(
                    'tb_kumuh_gambar' => $this->time.'.jpg',
                    'tb_kumuh_nama' => $post['tb_kumuh_nama'],
                );
                $status = $this->db->insert($this->table, $data);
                if($status)
                    $pesan = "Berhasil Menambah Data";
            }
        }

        $kirim = array(
            'pesan' => $pesan,
            'status' => $status,
        );
        return $kirim;

    }

    public function update($post){
        
        $post = $this->security->xss_clean($post);
        $pesan = "Gagal Mengubah Data";
        $status = False;
        
        if($this->_uploadImage()){
            $this->db->where('id_tb_kumuh', $post['id_tb_kumuh']);
            $query = $this->db->get($this->table)->result_array();
            unlink("./upload/kumuh/".$query[0]['tb_kumuh_gambar']);
            if($this->cekInput($post)){
                $this->db->where('id_tb_kumuh', $post['id_tb_kumuh']);
                $data = array(
                    'tb_kumuh_gambar' => $this->time.'.jpg',
                    'tb_kumuh_nama' => $post['tb_kumuh_nama'],
                );
                $status = $this->db->update($this->table, $data);
                if($status)
                    $pesan = "Berhasil Menambah Data";
            }
        }else{
            if($this->cekInput($post)){
                $this->db->where('id_tb_kumuh', $post['id_tb_kumuh']);
                $data = array(
                    'tb_kumuh_nama' => $post['tb_kumuh_nama'],
                );
                $status = $this->db->update($this->table, $data);
                if($status)
                    $pesan = "Berhasil Mengubah Data";
            }
        }

        $kirim = array(
            'pesan' => $pesan,
            'status' => $status,
        );
        return $kirim;
    }

    public function delete($post){
        $post = $this->security->xss_clean($post);
        $pesan = "Gagal Menghapus Data";
        $status = False;
        
        if($this->cekInput($post)){
            
            $this->db->where('id_tb_kumuh', $post['id_tb_kumuh']);
            $query = $this->db->get($this->table)->result_array();
            unlink("./upload/kumuh/".$query[0]['tb_kumuh_gambar']);
            
            $this->db->where('id_tb_kumuh', $post['id_tb_kumuh']);
            $status = $this->db->delete($this->table);
            if($status){
                $pesan = "Berhasil Menghapus Data";
            }
        }

        $kirim = array(
            'pesan' => $pesan,
            'status' => $status,
        );
        return $kirim;
    }
    

    public function cekInput($post){
        //ruang filter

        // $query = $this->db->get($this->table);
        return true;
    }
    
    private function _uploadImage(){
        $config['upload_path']          = './upload/kumuh/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['file_name']            = $this->time.'.jpg';
        $config['overwrite']			= true;
        // $config['max_size']             =  2048;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('tb_kumuh_gambar')){
            return false;
        }else{
            return true;
        }
    }

    private function _deleteImage($idData){

        $this->db->where('id_tb_kumuh', $idData);
        $query = $this->db->get($this->table)->result_array();
        unlink("./upload/kumuh/".$query['tb_kumuh_gambar']);
        return $query;
    }

}