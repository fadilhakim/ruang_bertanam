<?php 

    class User extends CI_Controller {
        function __construct(){
            parent::__construct();
            validSessionIsOut();
            // $this->authorization->redirect_menu("user_setting");
            $this->load->model("user_model");
        }

        function index() {

            $data["title"] = "User";

            $data["css"] = "/admin/pages/user/css"; // path
            $data["js"] = "/admin/pages/user/js"; // path


            $dt = array(

            );
            $data["content"] = $this->load->view("admin/pages/user/user_list",$dt,true);

            $this->load->view("admin/index",$data);
        }

        function user_list() {

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

            $users = $this->user_model->get_all_user($params);

            $data = array();
            foreach($users as $rows)
            {
                $data[] = array(
                    "id"       => $rows["id"],
                    "username" => $rows["username"],
                    "fullname" => $rows["fullname"],
                    "email"    => $rows["email"],
                    // action tak usah di definisikan
                );
            }

            print json_encode([
                "draw"=>$draw,
                "recordsTotal" => count($users),
                "recordsFiltered" => count($users),
                "data" => $data
            ]);
        }

        function user_add(){

            $this->load->model("group_model"); 

            $data["title"] = "User Add";

            $data["css"] = "/admin/pages/user/user_add_css"; // path 
            $data["js"]  = "/admin/pages/user/user_add_js"; // path


            $dt = array(
				"groups" => $this->group_model->get_group(),
				"get_user_nik" => $this->user_model->get_user_nik()
            );

            $data["content"] = $this->load->view("admin/pages/user/user_add",$dt,true);

            $this->load->view("admin/index",$data);  
		}
		
		function get_user_nik_detail() {

			$karyawan_id = $this->input->post("karyawan_id");

			$this->load->model("user_model");

			$user_nik = $this->user_model->get_user_nik_detail($karyawan_id);

			echo json_encode(array(
				"success" => true,
				"message" => $user_nik
			));


		}

        function user_detail() {

            $this->load->model("group_model"); 

            $data["title"] = "User Detail";

            $data["css"] = "/admin/pages/user/user_add_css"; // path 
            $data["js"]  = "/admin/pages/user/user_add_js"; // path

            $user_id = $this->uri->segment(3);
            
            $dt = array(
                "user"   => $this->user_model->get_user_detail($user_id),
				"groups" => $this->group_model->get_group(),
				"get_user_nik" => $this->user_model->get_user_nik()
            );

            $data["content"] = $this->load->view("admin/pages/user/user_detail",$dt,true);

            $this->load->view("admin/index",$data);
        }

        function user_add_process() {

            $this->load->library("form_validation");

            $username = $this->input->post("username",true);
            $fullname = $this->input->post("fullname",true);
            $group    = $this->input->post("group",true);
            $status   = $this->input->post("status",true);
            $email    = $this->input->post("email",true);
            // $password = $this->input->post("password",true);

            $this->form_validation->set_rules("username",'Username',"required");
            $this->form_validation->set_rules("fullname","Fullname","required");
            $this->form_validation->set_rules("group","Group","required");
            $this->form_validation->set_rules("status","Status","required");
            $this->form_validation->set_rules("email","Email","required|valid_email");
            // $this->form_validation->set_rules("password","Password","required");

            if($this->form_validation->run()){
                
                // $password = md5($password);

                $dt = [
                    "username"    => $username,
                    "fullname"    => $fullname,
                    "group_id"    => $group,
                    "status_id"   => $status,
                    "email"       => $email,
                    // "password"    => $password 
                ];

                // add user
                $this->user_model->user_insert($dt);

                echo json_encode(array(
                    "success" => true,
                    "message" => "You successfully add new user" 
                ));
            }else {
                echo json_encode(array(
                    "success" => false,
                    "message" => validation_errors() 
                ));
            }
        }

        function user_update_process() {

            $this->load->library("form_validation");

            $user_id  = $this->input->post("user_id",true);
            $username = $this->input->post("username",true);
            $fullname = $this->input->post("fullname",true);
            $group    = $this->input->post("group",true);
            $status   = $this->input->post("status",true);
            $email    = $this->input->post("email",true);
            // $password = $this->input->post("password",true);

            $this->form_validation->set_rules("user_id",'User ID',"required");
            $this->form_validation->set_rules("username",'Username',"required");
            $this->form_validation->set_rules("fullname","Fullname","required");
            $this->form_validation->set_rules("group","Group","required");
            $this->form_validation->set_rules("status","Status","required");
            $this->form_validation->set_rules("email","Email","required|valid_email");
            //$this->form_validation->set_rules("password","Password","required");

            if($this->form_validation->run()){
                
                // $password = !empty($password) ? md5($password) : "";

                $dt = [
                    "user_id"     => $user_id,
                    "username"    => $username,
                    "fullname"    => $fullname,
                    "group_id"    => $group,
                    "status_id"   => $status,
                    "email"       => $email,
                    // "password"    => $password 
                ];

                // add user
                $this->user_model->user_update($dt);

                echo json_encode(array(
                    "success" => true,
                    "message" => "You successfully add new user" 
                ));
            }else {
                echo json_encode(array(
                    "success" => false,
                    "message" => validation_errors() 
                ));
            }
        }

        function user_delete_process() {

            $this->load->library("form_validation");

            $user_id = $this->input->post("user_id");

            $this->form_validation->set_rules("user_id",'User ID',"required");

            if($this->form_validation->run()){
                
                // add user
                $this->user_model->user_delete($user_id); // NANTI DULU, BUAT TEST

                echo json_encode(array(
                    "success" => true,
                    "message" => "You successfully delete a user" 
                ));
            } else {
                echo json_encode(array(
                    "success" => false,
                    "message" => validation_errors() 
                ));
            }
        }
      

      

        function test() {
            $a = $this->user_model->get_user_detail(1);

            print_r($a);
        }

    }
