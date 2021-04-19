<?php 

    class Admin_plant extends CI_Controller  {

        function __construct() { 
            parent::__construct();
            validSessionIsOut();
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

        function plant_add() { 
            // page plant 
            $data["title"]      = "Plant Add";
            $data["css"] 		= "admin/pages/plant/css"; // path
            $data["js"] 		= "admin/pages/plant/plant_add_js"; // path

            $dt = [
                "title"             => $data["title"],
                "button_text"       => "Add Plant",
                "plant_family_list" => $this->plant_model->plant_family_list()
            ]; // passing the data here

            $data["content"] 	= $this->load->view("admin/pages/plant/plant_add",$dt,true);
            
            $this->load->view("admin/index",$data);
        }

        function plant_detail() { 
             // page plant 
            $data["title"]      = "Plant Detail";
            $data["css"] 		= "admin/pages/plant/css"; // path
            $data["js"] 		= "admin/pages/plant/plant_update_js"; // path

            $dt = [
                "title"         => $data["title"],
                "button_text"   => "Update Plant",
                "plant_family_list" => $this->plant_model->plant_family_list()
            ]; // passing the data here

            $data["content"] 	= $this->load->view("admin/pages/plant/plant_add",$dt,true);
            
            $this->load->view("admin/index",$data);
        }

        // endpoint

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
                    "id"                => $rows["id"],
                    "plant_name"        => $rows["plant_name"],
                    "scientific_name"   => $rows["scientific_name"],
                    "price"             => $rows["price"],
                    // "type"       => $rows["type"],
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

        function get_plant_detail() { 

            $this->load->library("form_validation");

            $plant_id = $this->input->post("plant_id");

            $this->form_validation->set_rules("plant_id",'Plant ID',"required|numeric");

            if($this->form_validation->run()){
               
                echo json_encode(array(
                    "success" => true,
                    "data"    => $this->plant_model->get_plant_detail($plant_id),
                    "message" => "You successfully add new plant" 
                ));
            } else {
                 echo json_encode(array(
                    "success" => false,
                    "message" => validation_errors() 
                ));
                
            }
        }

        function plant_add_process() {

            if($_SERVER['REQUEST_METHOD'] == "POST") { 

                $this->load->library("form_validation");

                $plant_name         = $this->input->post("plant_name",true);
                $scientific_name    = $this->input->post("scientific_name", true);
                $family_plant_id    = $this->input->post("family_plant_id",true);
                $price              = $this->input->post("price",true);
                $description        = $this->input->post("description",true);
                // $type           = $this->input->post("type",true);

                $this->form_validation->set_rules("plant_name",'Plant Name',"required");
                $this->form_validation->set_rules("scientific_name","Scientific Name","required");
                $this->form_validation->set_rules("family_plant_id","Family Plant ID","required|numeric");
                $this->form_validation->set_rules("price","price","required|numeric");
                $this->form_validation->set_rules("description","Description","required");
                // $this->form_validation->set_rules("type","Type","required");
            
                if($this->form_validation->run()){
                    
                    // $password = md5($password);

                    $dt = [
                        "plant_name"        => $plant_name,
                        "scientific_name"   => $scientific_name,
                        "family_plant_id"   => $family_plant_id,
                        "price"             => $price,
                        "description"       => $description,
                        // "type"        => $type,
                        
                        // "password"    => $password 
                    ];

                    // add user
                    $this->plant_model->plant_insert($dt);

                    echo json_encode(array(
                        "success" => true,
                        "message" => "You successfully add new plant" 
                    ));
                }else {
                    echo json_encode(array(
                        "success" => false,
                        "message" => validation_errors() 
                    ));
                }

            } else {
                echo json_encode(array(
                    "success" => false,
                    "message" => "Method not allowed"
                ));
            }
        }

        function plant_update_process() {

            error_reporting(1);

             if($_SERVER['REQUEST_METHOD'] == "POST") { 

                $this->load->library("form_validation");

                $plant_id           = $this->input->post("plant_id");

                $plant_name         = $this->input->post("plant_name",true);
                $scientific_name    = $this->input->post("scientific_name", true);
                $family_plant_id    = $this->input->post("family_plant_id",true);
                $price              = $this->input->post("price",true);
                $description        = $this->input->post("description",true);
                // $type           = $this->input->post("type",true);

                $this->form_validation->set_rules("plant_id","Plant ID","required|numeric");

                $this->form_validation->set_rules("plant_name",'Plant Name',"required");
                $this->form_validation->set_rules("scientific_name","Scientific Name","required");
                $this->form_validation->set_rules("family_plant_id","Family Plant ID","required|numeric");
                $this->form_validation->set_rules("price","price","required|numeric");
                $this->form_validation->set_rules("description","Description","required");
                // $this->form_validation->set_rules("type","Type","required");
            
                if($this->form_validation->run()){
                    
                    // $password = md5($password);

                    $dt = [

                        "plant_id"          => $plant_id, 

                        "plant_name"        => $plant_name,
                        "scientific_name"   => $scientific_name,
                        "family_plant_id"   => $family_plant_id,
                        "price"             => $price,
                        "description"       => $description,
                        // "type"        => $type,
                        
                        // "password"    => $password 
                    ];

                    // add user
                    $this->plant_model->plant_update($dt);


                    echo json_encode(array(
                        "success" => true,
                        "message" => "You successfully updated plant" 
                    ));
                }else {
                    echo json_encode(array(
                        "success" => false,
                        "message" => validation_errors() 
                    ));
                }

            } else {
                echo json_encode(array(
                    "success" => false,
                    "message" => "Method not allowed"
                ));
            }
        }

        function plant_delete_process() { 
            $this->load->library("form_validation");

            $plant_id         = $this->input->post("plant_id",true);

            $this->form_validation->set_rules("plant_id","Plant ID","required|integer");

            if($this->form_validation->run()) {

                $this->plant_model->plant_delete($plant_id);

                echo json_encode([
                    "status"    => 200,
                    "success"   => true,
                    "message"   => "you successfully delete Plant" 
                ]);

            } else {
                 echo json_encode([
                    "status"    => 200,
                    "success"   => false,
                    "message"   => validation_errors()
                ]); 
            }
        }

    }