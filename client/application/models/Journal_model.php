<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Journal_model extends CI_Model{

    public function getContentData($type, $table){
                      $this->db->order_by('created_at', 'DESC');
        $results    = $this->db->get_where($table, ['type' => $type])->result_array();
        return $results;
    }

    public function getTotalData($type, $table){
        $results    = $this->db->get_where($table, ['type' => $type])->num_rows();
        return $results;
    }

}