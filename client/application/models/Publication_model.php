<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publication_model extends CI_Model{

    public function getContentData($type){
                      $this->db->order_by('created_at', 'DESC');
        $results    = $this->db->get_where('publications', ['type' => $type])->result_array();
        return $results;
    }

    public function getTotalData($type){
        $results    = $this->db->get_where('publications', ['type' => $type])->num_rows();
        return $results;
    }

}