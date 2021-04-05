<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct() { 
        parent::__construct();
    }

    function index() {
        $data["title"] = "Admin";

        $data["css"] = "/admin/pages/test/css"; // path
        $data["js"]  = ""; // path

        $dt = array();
        $data["content"] = "";

        $this->load->view("admin/index",$data);
    }

}