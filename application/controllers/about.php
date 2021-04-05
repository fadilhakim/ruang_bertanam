<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

    function index() {

		// $data["title"] = "Dashboard";
		$data["css"] 		= "landing/css/css"; // path
		$data["js"] 		= "landing/js/js"; // path

		$dt = []; // passing the data here

		$data["content"] 	= $this->load->view("about",$dt,true);
		$this->load->view("index",$data);
	}

	function test() {
		$q = $this->db->get("plants");
		print_r($q);
	}
}
