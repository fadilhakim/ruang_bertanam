<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function index() {

		$data["title"] = "Ruang Bertanam";
		$data["css"] 		= "landing/css/css"; // path
		$data["js"] 		= "landing/js/js"; // path

		$dt = []; // passing the data here

		$data["content"] 	= $this->load->view("home",$dt,true);
		$this->load->view("index",$data);
	}

	function test() {
		$q = $this->db->get("plants");
		print_r($q);
	}
}
