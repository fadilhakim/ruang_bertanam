<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plant_library extends CI_Controller {

  function index() {

		$data["title"]  = "Library Tanaman";
		$data["css"] 		= "landing/css/css"; // path
		$data["js"] 		= "landing/js/js"; // path

		$dt = []; // passing the data here

		$data["content"] 	= $this->load->view("plant-list",$dt,true);
		$this->load->view("index",$data);
	}

  function detail() {

		$data["title"] = "{Nama Tanaman}";
		$data["css"] 		= "landing/css/css"; // path
		$data["js"] 		= "landing/js/js"; // path

		$dt = []; // passing the data here

		$data["content"] 	= $this->load->view("plant-detail",$dt,true);
		$this->load->view("index",$data);
	}

	function test() {
		$q = $this->db->get("plants");
		print_r($q);
	}
}
