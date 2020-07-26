<?php

class BaselineModel extends CI_Model
{
    private $jumlah, $table, $time;
    public function __construct()
    {
        parent::__construct();
        $this->time = time();
        $this->jumlah = 3;
        $this->table = 'tb_baseline';
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

        if($this->cekInput($post)){
            $data = array(
                'tb_baseline_keldes' => $post['tb_baseline_keldes'],
                'tb_baseline_luas_keldes_sk' => $post['tb_baseline_luas_keldes_sk'],
                'tb_baseline_luas_keldes_pad' => $post['tb_baseline_luas_keldes_pad'],
                'tb_baseline_rtrw' => $post['tb_baseline_rtrw'],
                'tb_baseline_luas_rtrw' => $post['tb_baseline_luas_rtrw'],
                'tb_baseline_nilai_kumuh_awal' => $post['tb_baseline_nilai_kumuh_awal'],
                'tb_baseline_kumuh_awal' => $post['tb_baseline_kumuh_awal'],
                'tb_baseline_nilai_kumuh_akhir' => $post['tb_baseline_nilai_kumuh_akhir'],
                'tb_baseline_kumuh_akhir' => $post['tb_baseline_kumuh_akhir'],
                'tb_baseline_luas_pengurangan' => $post['tb_baseline_luas_pengurangan'],
                'tb_baseline_sisa_luas' => $post['tb_baseline_sisa_luas'],
                'tb_baseline_tahun' => $post['tb_baseline_tahun'],
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
            $this->db->where('id_tb_baseline', $post['id_tb_baseline']);
            $data = array(
                'tb_baseline_keldes' => $post['tb_baseline_keldes'],
                'tb_baseline_luas_keldes_sk' => $post['tb_baseline_luas_keldes_sk'],
                'tb_baseline_luas_keldes_pad' => $post['tb_baseline_luas_keldes_pad'],
                'tb_baseline_rtrw' => $post['tb_baseline_rtrw'],
                'tb_baseline_luas_rtrw' => $post['tb_baseline_luas_rtrw'],
                'tb_baseline_nilai_kumuh_awal' => $post['tb_baseline_nilai_kumuh_awal'],
                'tb_baseline_kumuh_awal' => $post['tb_baseline_kumuh_awal'],
                'tb_baseline_nilai_kumuh_akhir' => $post['tb_baseline_nilai_kumuh_akhir'],
                'tb_baseline_kumuh_akhir' => $post['tb_baseline_kumuh_akhir'],
                'tb_baseline_luas_pengurangan' => $post['tb_baseline_luas_pengurangan'],
                'tb_baseline_sisa_luas' => $post['tb_baseline_sisa_luas'],
                'tb_baseline_tahun' => $post['tb_baseline_tahun'],
            );
            $status = $this->db->update($this->table, $data);
            if($status)
                $pesan = "Berhasil Menambah Data";
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
            
            $this->db->where('id_tb_baseline', $post['id_tb_baseline']);
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

}