<?php 

function my_session_id() {

    $CI = &get_instance();

    $uniqueId = uniqid();
    $CI->session->set_userdata("my_session_id", md5($uniqueId));
} 