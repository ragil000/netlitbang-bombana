<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Map extends CI_Controller {

    private $level;
	public function __construct()
    {
		parent::__construct();
        $this->load->library('MyConfig');
    }
    
    public function map(){
        $this->load->library('googlemaps');
        $config['center'] = '-4.001143, 122.515414';
        $config['zoom'] = '15';
        $this->googlemaps->initialize($config);
        $data['map'] = $this->googlemaps->create_map();

        $this->load->view('map/v_map', $data, false);
    }

}