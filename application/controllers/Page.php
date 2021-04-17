<?php

    class Page extends CI_Controller {

        function __construct(){
            parent::__construct();
        }

        function unauthorized(){

            $data["title"] = "Unauthorized Page";

            $data["css"] = "admin/pages/login/css"; // path
            $data["js"] = "admin/pages/login/js"; // path

            $dt = array();
            $data["content"] = $this->load->view("admin/pages/unauthorized/youhavenopowerhere",$dt,true);

            $this->load->view("admin/authentication",$data);
		}
		
		function notfound(){

            $data["title"] = "Page Not Found";

            $data["css"] = "admin/pages/login/css"; // path
            $data["js"] = "admin/pages/login/js"; // path

            $dt = array();
            $data["content"] = $this->load->view("admin/pages/notfound/pagenotfound",$dt,true);

            $this->load->view("admin/authentication",$data);
        }

    }
