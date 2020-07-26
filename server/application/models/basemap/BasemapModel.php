<?php

class BasemapModel extends CI_Model
{
    private $jumlah, $table, $time;
    public function __construct()
    {
        parent::__construct();
        $this->time = time();
        $this->jumlah = 5;
        $this->table = 'tb_basemap';
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
        $dataX = $post['tb_basemap_warna'];
        if($this->_uploadFile()){
            if($this->cekInput($post)){
                $data = array(
                    'tb_basemap_file' => $post['tb_basemap_nama_file'],
                    'tb_basemap_nama' => $post['tb_basemap_nama'],
                    'tb_basemap_tipe' => $post['tb_basemap_tipe'],
                    'tb_basemap_warna' => $post['tb_basemap_warna'],
                );
                $status = $this->db->insert($this->table, $data);
                if($status)
                    $pesan = "Berhasil Menambah Data";
            }
        }

        $kirim = array(
            'pesan' => $pesan,
            'status' => $status,
            'data' => $dataX,
        );
        return $kirim;

    }

    public function update($post){
        
        $post = $this->security->xss_clean($post);
        $pesan = "Gagal Mengubah Data";
        $status = False;

        if($this->_uploadFile()){
            $this->db->where('id_tb_basemap', $post['id_tb_basemap']);
            $query = $this->db->get($this->table)->result_array();
            unlink("./upload/geojson/".$query[0]['tb_basemap_file']);

            if($this->cekInput($post)){
                $this->db->where('id_tb_basemap', $post['id_tb_basemap']);
                $data = array(
                    'tb_basemap_file' => $post['tb_basemap_nama_file'],
                    'tb_basemap_nama' => $post['tb_basemap_nama'],
                    'tb_basemap_tipe' => $post['tb_basemap_tipe'],
                    'tb_basemap_warna' => $post['tb_basemap_warna'],
                );
                $status = $this->db->update($this->table, $data);
                if($status)
                    $pesan = "Berhasil Menambah Data";
            }
        }else{
            if($this->cekInput($post)){
                $this->db->where('id_tb_basemap', $post['id_tb_basemap']);
                $data = array(
                    'tb_basemap_nama' => $post['tb_basemap_nama'],
                    'tb_basemap_tipe' => $post['tb_basemap_tipe'],
                    'tb_basemap_warna' => $post['tb_basemap_warna'],
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
            
            $this->db->where('id_tb_basemap', $post['id_tb_basemap']);
            $query = $this->db->get($this->table)->result_array();
            unlink("./upload/geojson/".$query[0]['tb_basemap_file']);
            
            $this->db->where('id_tb_basemap', $post['id_tb_basemap']);
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
        $config['upload_path']          = './upload/geojson/';
        $config['allowed_types']        = '*';
        // $config['file_name']            = $this->time.'.jpg';
        $config['overwrite']			= true;
        // $config['max_size']             =  2048;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('tb_basemap_file')){
            return false;
        }else{
            return true;
        }
    }

    private function _deleteFile($idData){

        $this->db->where('id_tb_basemap', $idData);
        $query = $this->db->get($this->table)->result_array();
        unlink("./upload/geojson/".$query['tb_basemap_file']);
        return $query;
    }

}