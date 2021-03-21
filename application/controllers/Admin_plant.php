<?php 

    class Admin_plant extends CI_Controller  {

        function __construct() { 
            parent::__construct();

            $this->load->model("plant_model");
        } 

        function index() {
            // page plant 
            $data["title"]      = "Plants";
            $data["css"] 		= "admin/pages/plant/css"; // path
            $data["js"] 		= "admin/pages/plant/js"; // path

            $dt = []; // passing the data here

            $data["content"] 	= $this->load->view("admin/pages/plant/index",$dt,true);
            
            $this->load->view("admin/index",$data);

        }

        function plant_list() {

            $draw   = intval($this->input->post("draw"));
            $start  = intval($this->input->post("start"));
            $length = intval($this->input->post("length"));
            $order  = $this->input->post("order");
            $search = $this->input->post("search");
            $search = $search['value'];
            $col    = 0;
            $dir    = "";

            $params = array(
                "limit"     =>$length,
                "offset"    =>$start,
                "order"     =>$order,
                "col"       =>$col,
                "dir"       =>$dir,
                "search"    =>$search,
            );

            $plants = $this->plant_model->get_all_plant($params);

            $data = array();
            foreach($plants as $rows)
            {
                $data[] = array(
                    "id"         => $rows["id"],
                    "plant_name" => $rows["plant_name"],
                    "price"      => $rows["price"],
                    "type"       => $rows["type"],
                    // action tak usah di definisikan
                );
            }

            print json_encode([
                "draw"=>$draw,
                "recordsTotal" => count($plants),
                "recordsFiltered" => count($plants),
                "data" => $data
            ]);
        }

    }