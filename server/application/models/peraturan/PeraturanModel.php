<?php

class PeraturanModel extends CI_Model
{
    private $jumlah, $table, $time;
    public function __construct()
    {
        parent::__construct();
        $this->time = time();
        $this->jumlah = 5;
        $this->table = 'tb_peraturan';
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
        $query = $this->db->get($this->table)->result_array();
        return $query;
    }

    public function create($post){
        
        $post = $this->security->xss_clean($post);
        $pesan = "Gagal Menambah Data";
        $status = false;
       
        if($this->_uploadFile()){
            if($this->cekInput($post)){
                $data = array(
                    'tb_peraturan_judul' => $post['tb_peraturan_judul'],
                    'tb_peraturan_isi' => $post['tb_peraturan_isi'],
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

        if($this->_uploadFile()){
            $this->db->where('id_tb_peraturan', $post['id_tb_peraturan']);
            $query = $this->db->get($this->table)->result_array();
            unlink("./upload/pdf/".$query[0]['tb_peraturan_isi']);

            if($this->cekInput($post)){
                $this->db->where('id_tb_peraturan', $post['id_tb_peraturan']);
                $data = array(
                    'tb_peraturan_judul' => $post['tb_peraturan_judul'],
                    'tb_peraturan_isi' => $post['tb_peraturan_isi'],
                );
                $status = $this->db->update($this->table, $data);
                if($status)
                    $pesan = "Berhasil Menambah Data";
            }
        }else{
            if($this->cekInput($post)){
                $this->db->where('id_tb_peraturan', $post['id_tb_peraturan']);
                $data = array(
                    'tb_peraturan_judul' => $post['tb_peraturan_judul'],
                    'tb_peraturan_isi' => $post['tb_peraturan_isi'],
                );
                $status = $this->db->update($this->table, $data);
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

    public function delete($post){
        $post = $this->security->xss_clean($post);
        $pesan = "Gagal Menghapus Data";
        $status = False;
        
        if($this->cekInput($post)){
            
            $this->db->where('id_tb_peraturan', $post['id_tb_peraturan']);
            $query = $this->db->get($this->table)->result_array();
            unlink("./upload/pdf/".$query[0]['tb_peraturan_isi']);
            
            $this->db->where('id_tb_peraturan', $post['id_tb_peraturan']);
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
    
    private function _uploadFile(){
        $config['upload_path']          = './upload/pdf/';
        $config['allowed_types']        = 'pdf';
        // $config['file_name']            = $this->time.'.jpg';
        $config['overwrite']			= true;
        // $config['max_size']             =  2048;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('tb_peraturan_file')){
            return false;
        }else{
            return true;
        }
    }

    private function _deleteFile($idData){

        $this->db->where('id_tb_peraturan', $idData);
        $query = $this->db->get($this->table)->result_array();
        unlink("./upload/pdf/".$query['tb_peraturan_isi']);
        return $query;
    }

}