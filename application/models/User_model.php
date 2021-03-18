<?php 

    class User_model extends CI_Model{
        
        function __construct() {
			parent::__construct();
            
            $this->db = $this->load->database("default",true);
        }

        function get_user_detail($id) {
            $user = $this->db
            ->where('id', $id)
            ->get(USER_TABLE)
            ->row_array();

            return $user;
        }

        function get_all_user($params){

            $limit          = isset($params["limit"]) ? $params["limit"] : 0;
            $offset         = isset($params["offset"]) ? $params["offset"] : 0;
            $order          = isset($params["order"]) ? $params["order"] : null;
            $col            = isset($params["col"]) ? $params["col"] : null;
            $dir            = isset($params["dir"]) ? $params["dir"] : null;
            $search         = isset($params["search"]) ? $params["search"] : "";
            $valid_columns  = array(
                0=>'id',
                1=>'username',
                2=>'email',
                3=>'fullname',
               
            );

            if(!empty($order))
            {
                foreach($order as $o)
                {
                    $col = $o['column'];
                    $dir= $o['dir'];
                }
            }

            if($dir != "asc" && $dir != "desc")
            {
                $dir = "desc";
            }

            if(!isset($valid_columns[$col]))
            {
                $order = null;
            }
            else
            {
                $order = $valid_columns[$col];
            }

            $this->db->select("id,username,fullname,email,group_id,status_id");
            $result = $this->db;
            
            if($order != null)
            {
                $result->order_by($order, $dir);
            }

            if(!empty($search))
            {
                $x=0;
                foreach($valid_columns as $sterm)
                {
                    if($x==0)
                    {
                        $result->like($sterm,$search);
                    }
                    else
                    {
                        $result->or_like($sterm,$search);
                    }
                    $x++;
                }                 
            }

            if(!empty($limit) && !empty($offset)){
                $result = $result->get(USER_TABLE,$params["limit"],$params["offset"]);
            }else{
                $result = $result->get(USER_TABLE);
            }
            
            $result = $result->result_array();

            return $result;
        }

        function user_insert($dt) {
            $data = array(
                'username'  => $dt["username"],
                'fullname'  => $dt["fullname"],
                'group_id'  => $dt["group_id"],
                "status_id" => $dt["status_id"],
                "email"     => $dt["email"],
                // "password"  => $dt["password"] 
            );

            return $this->db->insert(USER_TABLE, $data);  // Produces: INSERT INTO mytable (title, name, date) VALUES ('{$title}', '{$name}', '{$date}')
        }

        function user_update($dt) {

            $user_id = $dt["user_id"];

            $data = array(
                'username'  => $dt["username"],
                'fullname'  => $dt["fullname"],
                'group_id'  => $dt["group_id"],
                "status_id" => $dt["status_id"],
                "email"     => $dt["email"],
                
            );

            // if(!empty($password)) {
            //     $data["password"] = $dt["password"];
            // }

            $this->db->where('id', $user_id);
            return $this->db->update(USER_TABLE, $data);  // Produces: INSERT INTO mytable (title, name, date) VALUES ('{$title}', '{$name}', '{$date}')
        }

        function user_delete($user_id) {
            return $this->db->delete(USER_TABLE, array(
                "id" => $user_id
            ));
		}
	
        
        function login_record($data) {

            $loc = json_decode(file_get_contents("http://ipinfo.io/"));

            return $this->db->insert(LOGIN_RECORD,[
                "user_id" => $data["user_id"],
                "username" => $data["username"],
                "session_id" => $this->session->my_session_id,
                "ip_address" => $this->input->ip_address(),
                "location" => $loc->city,
                "created_at" => date("Y-m-d H:i:s")
            ]);
        }

        function get_login_records($params) {

            $limit         = isset($params["limit"]) ? $params["limit"] : 0;
            $offset         = isset($params["offset"]) ? $params["offset"] : 0;
            $order          = isset($params["order"]) ? $params["order"] : null;
            $col            = isset($params["col"]) ? $params["col"] : null;
            $dir            = isset($params["dir"]) ? $params["dir"] : null;
            $search         = isset($params["search"]) ? $params["search"] : "";
            $valid_columns  = array(
                0=>"id",
                1=>'user_id',
                2=>'username',
                3=>'ip_address',
                4=>'location',
                5=>"created_at"
               
            );

            if(!empty($order))
            {
                foreach($order as $o)
                {
                    $col = $o['column'];
                    $dir= $o['dir'];
                }
            }

            if($dir != "asc" && $dir != "desc")
            {
                $dir = "desc";
            }

            if(!isset($valid_columns[$col]))
            {
                $order = null;
            }
            else
            {
                $order = $valid_columns[$col];
            }

            $this->db->select("id,user_id,username,session_id,ip_address,location,created_at");
            $result = $this->db;
            
            if($order != null)
            {
                $result->order_by($order, $dir);
            }

            if(!empty($search))
            {
                $x=0;
                foreach($valid_columns as $sterm)
                {
                    if($x==0)
                    {
                        $result->like($sterm,$search);
                    }
                    else
                    {
                        $result->or_like($sterm,$search);
                    }
                    $x++;
                }                 
            }

            if(!empty($limit) && !empty($offset)){
                $result = $result->get(LOGIN_RECORD,$params["limit"],$params["offset"]);
            }else{
                $result = $result->get(LOGIN_RECORD);
            }
            
            $result = $result->result_array();

            return $result;

            // $q = $this->db->get(LOGIN_RECORD);
            // $result = $q->result_array();

            // return $result;
        }

    }
