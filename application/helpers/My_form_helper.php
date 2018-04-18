<?php defined('BASEPATH') OR exit('No direct script access allowed');

#设置表单的令牌，这里可能还会存在SESSION过期的问题，也就是说表单必须在过期前提交
function form_token(){
    $CI =& get_instance();

    $token = md5(uniqid(rand(), TRUE));
    $CI->load->library('session');
    $CI->session->set_flashdata('_form_token',$token);
    return form_input('__hash__', $token);
}