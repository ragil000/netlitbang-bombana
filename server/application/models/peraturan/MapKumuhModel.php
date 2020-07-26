<?php

class MapKumuhModel extends CI_Model
{
    private $jumlah, $table;
    public function __construct()
    {
        parent::__construct();
        $this->jumlah = 4;
        $this->table = 'tb_map_kumuh';
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

    public function create($post){
        
        $post = $this->security->xss_clean($post);
        $pesan = "Gagal Menambah Data";
        $status = False;
        
        if($this->cekInput($post)){
            
            $data = array(
                'tb_map_kumuh_lat' => $post['tb_map_kumuh_lat'],
                'tb_map_kumuh_lng' => $post['tb_map_kumuh_lng'],
                'tb_map_kumuh_nama' => $post['tb_map_kumuh_nama'],
                'tb_map_kumuh_gambar' => $post['tb_map_kumuh_gambar'],
            );
            $status = $this->db->insert($this->table, $data);
            if($status)
                $pesan = "Berhasil Menambah Data";
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
        
        if($this->cekInput($post)){
            $this->db->where('id_tb_map_kumuh', $post['id_tb_map_kumuh']);
            
            $data = array(
                'tb_map_kumuh_lat' => $post['tb_map_kumuh_lat'],
                'tb_map_kumuh_lng' => $post['tb_map_kumuh_lng'],
                'tb_map_kumuh_nama' => $post['tb_map_kumuh_nama'],
                'tb_map_kumuh_gambar' => $post['tb_map_kumuh_gambar'],
            );
            $status = $this->db->update($this->table, $data);
            if($status)
                $pesan = "Berhasil Mengubah Data";
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
            
            $this->db->where('id_tb_map_kumuh', $post['id_tb_map_kumuh']);
                       
            $status = $this->db->delete($this->table);
            if($status)
                $pesan = "Berhasil Menghapus Data";
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
    

}