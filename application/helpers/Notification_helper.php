<?php 
function success($message) {
    $CI = & get_instance();
    $CI->session->set_userdata('success', $message);
    return true;
}

function danger($message) {
    $CI = & get_instance();
    $CI->session->set_userdata('danger', $message);
    return true;
}

function info($message) {
    $CI = & get_instance();
    $CI->session->set_userdata('info', $message);
    return true;
}

function warning($message) {
    $CI = & get_instance();
    $CI->session->set_userdata('warning', $message);
    return true;
}

?>