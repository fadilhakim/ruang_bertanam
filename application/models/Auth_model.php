<?php 

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Auth_model extends CI_Model { 

        function __construct(){
            parent::__construct();
        }

        function login($nik,$password ){

            $result = $this->db
            ->where("username",$nik)
            // ->where("password",$password)
            ->where("status_id",1) // status active
            ->get(USER_TABLE)
            ->row_array();

            return $result; 

        }

    }
