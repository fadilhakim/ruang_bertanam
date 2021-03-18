<?php 


function validSessionIsOut() {
    $CI = &get_instance();
    if ($CI->session->userdata('logged_in') == NULL || $CI->session->userdata('logged_in') === FALSE) {
        redirect('/login');
    }
}

function validSessionIsIn() {
    $CI = &get_instance();
    if ($CI->session->userdata('logged_in') !== NULL || $CI->session->userdata('logged_in') === TRUE) {
        redirect('/');
    }
}