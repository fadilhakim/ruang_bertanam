<?php 

	class Group extends CI_Controller {

		function __construct(){
            parent::__construct();
            validSessionIsOut();
            $this->authorization->redirect_menu("group_setting");
            $this->load->model("group_model");
        }

        function index() {

            $data["title"] = "Group";

            $data["css"] = "pages/group/css"; // path
            $data["js"] = "pages/group/js"; // path


            $dt = array(
				
            );
            $data["content"] = $this->load->view("template/pages/group/group_list",$dt,true);

            $this->load->view("index",$data);
		}
		
		function group_list() {

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

            $groups = $this->group_model->get_all_group($params);

            $data = array();
            foreach($groups as $rows)
            {
                $group_menus = $this->group_model->detail_group_menu_authorized($rows["id"]);
                $group_menu_result = "";
                foreach ($group_menus as $group_menu) {
                    $group_menu_result .= "<li> $group_menu[menu_name] </li>";
                }

                $data[] = array(
                    "id"         => $rows["id"],
                    "group_name" => $rows["group_name"],
                    "group_menu" => $group_menu_result
               
                    // action tak usah di definisikan
                );
            }

            print json_encode([
                "draw"=>$draw,
                "recordsTotal" => count($groups),
                "recordsFiltered" => count($groups),
                "data" => $data
            ]);
        }

        function group_add(){

            $this->load->model("group_model"); 

            $data["title"] = "group Add";

            $data["css"] = "pages/group/group_add_css"; // path 
			$data["js"]  = "pages/group/group_add_js"; // path
			
			// $data["css"] = ""; // path 
            // $data["js"]  = ""; // path


            $dt = array(
                
            );

            $data["content"] = $this->load->view("pages/group/group_add",$dt,true);

            $this->load->view("index",$data);  
        }

        function group_detail() {

            $this->load->model("group_model"); 

            $data["title"] = "group Detail";

            $data["css"] = "pages/group/group_add_css"; // path 
            $data["js"]  = "pages/group/group_add_js"; // path

            $group_id = $this->uri->segment(3);
            
            $dt = array(
                "group"   => $this->group_model->get_group_detail($group_id),
               
            );

            $data["content"] = $this->load->view("template/pages/group/group_detail",$dt,true);

            $this->load->view("template/index",$data);
        }

        function group_roles(){
            $data["title"] = "group Roles";

            $data["css"] = "/pages/group/group_roles_css"; // path 
            $data["js"]  = "/pages/group/group_roles_js"; // path

            $group_id = $this->uri->segment(3);
            $rs_group = $this->group_model->get_group_detail($group_id);
         

            $menu = $this->group_model->get_all_menu();
            //$data["menu_action"] = $this->group_model->get_all_menu_actions();
            $dt = array(
                "group_id" => $group_id,
                "rs_group" => $rs_group,
                "menu" => $menu
                //"group"   => $this->group_model->get_group_detail($group_id),
               
            );

            $data["content"] = $this->load->view("template/pages/group/group_roles",$dt,true);

            $this->load->view("template/index",$data);
        }

        function group_add_process() {

            $this->load->library("form_validation");

            $group_name = $this->input->post("group_name",true);
           

            $this->form_validation->set_rules("group_name",'Group Name',"required");
          

            if($this->form_validation->run()){
                
                
                $dt = [
                    "group_name"    => $group_name,
                   
                ];

                // add group
                $this->group_model->group_insert($dt);

                echo json_encode(array(
                    "success" => true,
                    "message" => "You successfully add new group" 
                ));
            }else {
                echo json_encode(array(
                    "success" => false,
                    "message" => validation_errors() 
                ));
            }
        }

        function group_update_process() {

            $this->load->library("form_validation");

            $group_id  = $this->input->post("group_id",true);
            $groupname = $this->input->post("group_name",true);
           

            $this->form_validation->set_rules("group_id",'group ID',"required");
            $this->form_validation->set_rules("group_name",'groupname',"required");
          

            if($this->form_validation->run()){
                
                $password = !empty($password) ? md5($password) : "";

                $dt = [
                    "group_id"     => $group_id,
                    "group_name"    => $groupname,
               
                ];

                // add group
                $this->group_model->group_update($dt);

                echo json_encode(array(
                    "success" => true,
                    "message" => "You successfully add new group" 
                ));
            }else {
                echo json_encode(array(
                    "success" => false,
                    "message" => validation_errors() 
                ));
            }
        }

        function group_delete_process() {

            $this->load->library("form_validation");

            $group_id = $this->input->post("group_id");

            $this->form_validation->set_rules("group_id",'group ID',"required");

            if($this->form_validation->run()){
                
                // add group
                $this->group_model->group_delete($group_id); // NANTI DULU, BUAT TEST

                echo json_encode(array(
                    "success" => true,
                    "message" => "You successfully delete a group" 
                ));
            } else {
                echo json_encode(array(
                    "success" => false,
                    "message" => validation_errors() 
                ));
            }

        }

        function group_roles_update_process() {

			// error_reporting(0);
			$this->load->library("form_validation");

            $group_id = $this->input->post("group_id",true);
			$menus    = $this->input->post("menus");
			
            $this->form_validation->set_rules("group_id",'group ID',"required");

            if($this->form_validation->run()){

                $menu         = $this->group_model->get_all_menu();
                $check_group  = $this->group_model->check_groupid_group_menu($group_id);
            
                $result_menu = array();
            
                if(empty($check_group)) {

                    foreach($menu as $rowMenu) {

						foreach($menus as $rowMenus) {
							$result_menu[] = array(
								"group_id" => $group_id,
								"menu_id" => $rowMenu["id"],
								"authorized" => $rowMenu["id"] == $rowMenus ? 1 : 0,
								"created_at" => date("Y-m-d H:i:s")
							);
						}

                        
                    }

                    if($this->group_model->insert_group_menu($result_menu)){
                        echo json_encode(array(
                            "success" => true,
                            "message" => "You successfully updated Group Roles"
                        ));
                    } else {
                        echo json_encode(array(
                            "success" => false,
                            "message" => "Database Error"
                        ));
                    }
                    
                }else {
                    // update group roles 
                    $this->group_model->clear_authorized_menu($group_id); // set back to 0

                    if(isset($menus)) {

                        foreach($menus as $rowMa) {
							
							// print_r($rowMa);

							$menu_id = $rowMa;

                            $this->group_model->authorized_menu($group_id, $menu_id);
                        }
					}
					
					echo json_encode(array(
						"success" => true,
						"message" => "You successfully updated Group Roles"
					));
				}
				
				
            } else {
                echo json_encode(array(
                    "success" => false,
                    "message" => validation_errors()
                ));
            }

            
        }

	// end group roles
	}

    