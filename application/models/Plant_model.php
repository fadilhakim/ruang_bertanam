<?php 

    class Plant_model extends CI_Model{
        
        function __construct() {
			parent::__construct();
            
            $this->db = $this->load->database("default",true);
        }

        function get_plant_detail($id) {
            $plant = $this->db
            ->where('id', $id)
            ->get(PLANT_TABLE)
            ->row_array();

            return $plant;
        }

        function get_all_plant($params){

            $limit          = isset($params["limit"]) ? $params["limit"] : 0;
            $offset         = isset($params["offset"]) ? $params["offset"] : 0;
            $order          = isset($params["order"]) ? $params["order"] : null;
            $col            = isset($params["col"]) ? $params["col"] : null;
            $dir            = isset($params["dir"]) ? $params["dir"] : null;
            $search         = isset($params["search"]) ? $params["search"] : "";
            $valid_columns  = array(
                0=>'id',
                1=>'plant_name',
                2=>'description',
                3=>'price',
               
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

            $this->db->select("id,plant_name,price,type");
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
                $result = $result->get(PLANT_TABLE,$params["limit"],$params["offset"]);
            }else{
                $result = $result->get(PLANT_TABLE);
            }
            
            $result = $result->result_array();

            return $result;
        }

        function plant_insert($dt) {
            $data = array(
        
                'plant_name'  => $dt["plant_name"],
                'price'       => $dt["price"],
                'type'        => $dt["type"],
            );

            return $this->db->insert(PLANT_TABLE, $data);  // Produces: INSERT INTO mytable (title, name, date) VALUES ('{$title}', '{$name}', '{$date}')
        }

        function plant_update($dt) {

            $plant_id = $dt["plant_id"];

            $data = array(
                'plantname'  => $dt["plantname"],
                'fullname'  => $dt["fullname"],
                'group_id'  => $dt["group_id"],
                "status_id" => $dt["status_id"],
                "email"     => $dt["email"],
                
            );

            // if(!empty($password)) {
            //     $data["password"] = $dt["password"];
            // }

            $this->db->where('id', $plant_id);
            return $this->db->update(PLANT_TABLE, $data);  // Produces: INSERT INTO mytable (title, name, date) VALUES ('{$title}', '{$name}', '{$date}')
        }

        function plant_delete($plant_id) {
            return $this->db->delete(PLANT_TABLE, array(
                "id" => $plant_id
            ));
		}

    }
