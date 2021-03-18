<?php

    class Dashboard extends CI_Controller {
        function __construct(){
            parent::__construct();
            validSessionIsOut();
            $this->authorization->redirect_menu("dashboard");
            $this->db2 = $this->load->database("db2", true);
            $this->load->model("mom_model");
        }

        function index() {

            validSessionIsOut();

            $data["title"] = "Dashboard";

            $data["css"] = "template/pages/dashboard/css"; // path
            $data["js"] = "template/pages/dashboard/js"; // path
        


            $data["content"] = $this->load->view("template/pages/dashboard/dashboard",$dt,true);

            $this->load->view("template/index",$data);
        }


    }
