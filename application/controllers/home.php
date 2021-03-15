<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    function index() {

		// $data["title"] = "Dashboard";
		$data["css"] 		= "landing/css/css"; // path
		$data["js"] 		= "landing/js/js"; // path

		$dt = []; // passing the data here

		$data["content"] 	= $this->load->view("landing/home",$dt,true);
		
		$this->load->view("index",$data);
	}

	function test() {
		$q = $this->db->get("plants");
		print_r($q);
	}
}
