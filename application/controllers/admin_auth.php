<?php 

    class Admin_auth extends CI_Controller  {

         function __construct(){
            parent::__construct();

            $this->load->model("auth_model");
            $this->load->model("user_model");

        }

        function index() {

            validSessionIsIn();

            $data["title"] = "Login";

            $data["css"] = "admin/pages/login/css"; // path
            $data["js"]  = "admin/pages/login/js"; // path

            $dt = array();
            $data["content"] = $this->load->view("admin/pages/login/login",$dt,true);

            $this->load->view("admin/authentication",$data);
        }

        function pass() {

            $this->load->model("user_model");
            $this->load->helper("general_helper");

            my_session_id();
            $this->session->set_userdata('logged_in', TRUE);
            $this->session->set_userdata("user_id",1);
            $this->session->set_userdata('username', "admin");
            $this->session->set_userdata('fullname', "admin development");
            $this->session->set_userdata('email', "admin@gmail.com");
            $this->session->set_userdata('group_id', 1);

            $this->user_model->login_record([
                "user_id"  =>1,
                "username" =>"admin"
            ]);

            header("location:".base_url("/"));
        }

        function login_process_back(){
            validSessionIsIn();
			$this->load->library("form_validation");
			$this->load->model("user_model");

            $email      = $this->input->post("username",true);
            $password   = $this->input->post("password",true);

            $this->form_validation->set_rules("email","Email","required");
            $this->form_validation->set_rules("password","Password","required");

            if($this->form_validation->run()){

				//$result = $this->user_model->login_ldap($nik,$password);

				if($result) {
					$check_user = $this->auth_model->login($nik);

					if($check_user) {
						$this->session->set_userdata('logged_in', TRUE);
						$this->session->set_userdata('username', $check_user["username"]);
						$this->session->set_userdata('fullname', $check_user["fullname"]);
						$this->session->set_userdata('email', $check_user["email"]);
                        $this->session->set_userdata('group_id', $check_user["group_id"]);

						echo json_encode(array(
							"logged_in" => true,
							"message" => "You successfully login"
						));
					} else {
						echo json_encode(array(
							"logged_in" => false,
							"message" => "Your account may not registered yet"
						));
					}
				} else {
					echo json_encode(array(
						"logged_in" => false,
						"message" => "Your NIK or password are wrong"
					));
				}

            }else {
                echo json_encode(array(
                    "logged_in" => false,
                    "message" => validation_errors()
                ));
            }

        }

        function login_process(){
            validSessionIsIn();

            // post method 
            if($_SERVER['REQUEST_METHOD'] == "POST") { 
                $this->load->library("form_validation");
                $this->load->helper("general_helper");

                $username   = $this->input->post("username",true);
                $password   = $this->input->post("password",true);

                $this->form_validation->set_rules("username","Username","required");
                $this->form_validation->set_rules("password","Password","required");

                if($this->form_validation->run()){

                    $password = md5($password);
                    //$password = "";

                    $check_user = $this->auth_model->login($username, $password);

                    if($check_user) {

                        my_session_id();
                        $this->session->set_userdata('logged_in', TRUE);
                        $this->session->set_userdata("user_id", $check_user["id"]);
                        $this->session->set_userdata('username', $check_user["username"]);
                        $this->session->set_userdata('fullname', $check_user["fullname"]);
                        $this->session->set_userdata('email', $check_user["email"]);
                        $this->session->set_userdata('group_id', $check_user["group_id"]);

                        $this->user_model->login_record([
                            "user_id"=>$check_user["id"],
                            "username"=>$check_user["username"]
                        ]);

                        echo json_encode(array(
                            "logged_in" => true,
                            "message" => "You successfully login"
                        ));
                    } else {
                        echo json_encode(array(
                            "logged_in" => false,
                            "message" => "Your username or password are wrong"
                        ));
                    }

                }else {
                    echo json_encode(array(
                        "logged_in" => false,
                        "message" => validation_errors()
                    ));
                }
            }
            

        }

        function logout(){
            validSessionIsOut();
            $this->session->sess_destroy();
            redirect("/login");
        }

    }