<?php

    class Group_model extends CI_Model {

        function __construct() {
            parent::__construct();
        }

        function get_all_group($params) {

			$limit          = isset($params["limit"]) ? $params["limit"] : 0;
            $offset         = isset($params["offset"]) ? $params["offset"] : 0;
            $order          = isset($params["order"]) ? $params["order"] : null;
            $col            = isset($params["col"]) ? $params["col"] : null;
            $dir            = isset($params["dir"]) ? $params["dir"] : null;
			$search         = isset($params["search"]) ? $params["search"] : "";

            $valid_columns  = array(
                0=>'id',
                1=>'group_name',

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

            $this->db->select("id,group_name");
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
                $result = $result->get(GROUP_TABLE,$params["limit"],$params["offset"]);
            }else{
                $result = $result->get(GROUP_TABLE);
            }

            $result = $result->result_array();

            return $result;
        }

        function get_group() {
            $groups = $this->db->get(GROUP_TABLE)->result_array();
            return $groups;

		}

		function get_group_detail($id){
			$group = $this->db
            ->where('id', $id)
            ->get(GROUP_TABLE)
            ->row_array();

            return $group;
		}

		function group_insert($dt) {
            $data = array(
                'group_name'  => $dt["group_name"],

            );

            return $this->db->insert(GROUP_TABLE, $data);  // Produces: INSERT INTO mytable (title, name, date) VALUES ('{$title}', '{$name}', '{$date}')
		}

		function group_update($dt) {
			$data = array(
				"group_name" => $dt["group_name"]
			);

			$this->db->where('id', $dt["group_id"]);
            return $this->db->update(GROUP_TABLE, $data);

		}


		function group_delete($group_id) {
			return $this->db->delete(GROUP_TABLE, array(
                "id" => $group_id
            ));
        }

        /*
            =====================================
            AUTHORIZATION
            =====================================
        */


		function get_all_menu() {
			$menu = $this->db->query("select * from ".MENU_TABLE);
			return $menu->result_array();
		}

		function get_all_menu_actions() {
			$menu_actions = $this->db->query("select * from ".MENU_ACTION_TABLE);
			return $menu_actions->result_array();
		}

		function detail_group_menu_action($group_id) {
			return $this->db->get_where(MENU_ACTION_TABLE,array("group_id" => $group_id))->result_array();
		}

		function detail_group_menu_authorized($group_id) {

			$this->db->select("*");
			$this->db->from(GROUP_MENU_TABLE);
			$this->db->join(MENU_TABLE, MENU_TABLE.".id = ".GROUP_MENU_TABLE.".menu_id");
			$this->db->where(
				array(
					GROUP_MENU_TABLE.".group_id" => $group_id,
					GROUP_MENU_TABLE.".authorized" => 1,
				)
			);

			return $this->db->get()->result_array();
		}

		function detail_group_menu_action_authorized_bymenu($group_id, $menu_id) {

			$this->db->select("*");
			$this->db->from(MENU_ACTION_TABLE);

			$this->db->join(MENU_ACTION_TABLE, MENU_ACTION_TABLE.'.id = '.GROUP_MENU_ACTION_TABLE.'.menu_action_id');
			$this->db->where(
				array(
					"$GROUP_MENU_ACTION_TABLE.group_id" => $group_id,
					"$GROUP_MENU_ACTION_TABLE.menu_id" => $menu_id,
					"$GROUP_MENU_ACTION_TABLE.authorized" => 1,
				)
			);

			return $this->db->get()->result_array();


			// return $this->db->get_where(MENU_ACTION_TABLE,
			// 	array(
			// 		"group_id" => $group_id,
			// 		"authorized" => 1
			// 	)
			// )->result_array();
		}

		function detail_group_menu_action_authorized($group_id) {

			$this->db->select("*");
			$this->db->from(MENU_ACTION_TABLE);

			$this->db->join(MENU_ACTION_TABLE, MENU_ACTION_TABLE.`.id = `.GROUP_MENU_ACTION_TABLE.`.menu_action_id`);
			$this->db->where(
				array(
					GROUP_MENU_ACTION_TABLE.`.group_id` => $group_id,
					GROUP_MENU_ACTION_TABLE.`.authorized` => 1,
				)
			);

			return $this->db->get()->result_array();


			// return $this->db->get_where(MENU_ACTION_TABLE,
			// 	array(
			// 		"group_id" => $group_id,
			// 		"authorized" => 1
			// 	)
			// )->result_array();
		}

		function insert_group_menu($dt) {

			$result = array();

			foreach($dt as $row) {
				$result[] = array(
					"group_id" => $row["group_id"],
					"menu_id" => $row["menu_id"],
					"authorized" => $row["authorized"],
					"created_at" => date("Y-m-d H:i:s")
				);
			}

			$this->db->insert_batch(GROUP_MENU_TABLE, $result);
		}

		function insert_group_menu_action($dt) {
			$result = array();

			foreach($dt as $row) {
				$result[] = array(
					"group_id" => $row["group_id"],
					"menu_id" => $row["menu_id"],
					"menu_action_id" => $row["menu_action_id"],
					"authorized" => $row["authorized"],
					"created_at" => date("Y-m-d H:i:s")
				);
			}

			$this->db->insert_batch(GROUP_MENU_ACTION_TABLE, $result);
		}

		function clear_authorized_menu($group_id) {

			$this->db->set('authorized',0);
			$this->db->where('group_id',$group_id);
			$this->db->update(GROUP_MENU_TABLE);
		}

		function clear_authorized_menu_actions($group_id) {

			$this->db->set('authorized',0);
			$this->db->where('group_id',$group_id);
			$this->db->update(GROUP_MENU_ACTION_TABLE);
		}

		function authorized_menu($group_id, $menu_id) {


			$this->db->set('authorized',1);
			$this->db->where("group_id",$group_id);
			$this->db->where('menu_id',$menu_id);
			$this->db->update(GROUP_MENU_TABLE);
		}

		function authorized_menu_action($group_id,$menu_id, $menu_action_id) {

			$this->db->set('authorized',1);
			$this->db->where("group_id",$group_id);
			$this->db->where("menu_id",$menu_id);
			$this->db->where('menu_action_id',$menu_action_id);
			$this->db->update(GROUP_MENU_ACTION_TABLE);
		}

		// check menu id dan menu action id di group menu action table
		function check_menuid_maid_gma($group_id,$menu_id,$menu_action_id){
			$this->db->where("group_id",$group_id);
			$this->db->where("menu_id",$menu_id);
			$this->db->where('menu_action_id',$menu_action_id);

			return $this->db->get(GROUP_MENU_ACTION_TABLE)->row_array();
		}

		function check_menuid_group_menu($group_id,$menu_id) {
			$this->db->where("group_id",$group_id);
			$this->db->where("menu_id",$menu_id);

			return $this->db->get(GROUP_MENU_TABLE)->row_array();
		}

		function check_groupid_group_menu_action($group_id) {
			return $this->db->get_where(MENU_ACTION_TABLE,array("group_id" => $group_id))->row_array();
		}

		function check_groupid_group_menu($group_id) {
			return $this->db->get_where(GROUP_MENU_TABLE,array("group_id" => $group_id))->row_array();
		}

		function check_group_authorized_menu($group_id, $menu_id) {
			$result = $this->db->get_where(GROUP_MENU_TABLE,array(
				"group_id" => $group_id,
				"menu_id" => $menu_id,
				"authorized" => 1
			))->row_array();

			//echo $this->db->last_query();

			return $result;
		}

		function check_group_authorized($group_id, $menu_id, $action_id) {

			$result = $this->db->get_where(MENU_ACTION_TABLE,array(
				"group_id" => $group_id,
				"menu_id" => $menu_id,
				"menu_action_id" => $action_id,
				"authorized" => 1
			))->row_array();

			return $result;
		}

		function get_menu_bykey($key) {
			return $this->db->get_where(MENU_TABLE,array(
				"menu_key" => $key
			))->row_array();
		}

		function get_menu_action_bykey($key) {
			return $this->db->get_where(MENU_ACTION_TABLE,array(
				"action_key" => $key
			))->row_array();
        }

        /*
            =========== END OF AUTHORIZATION ====================
        */

    }
