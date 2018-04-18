<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function show_msg($title, $url_forward='', $msg='', $time=0, $type = 'success'){
    $ci =& get_instance();

    $view_data = [
        'title' => $title,
        'msg' => $msg,
        'url_forward' => $url_forward,
        'type' => $type,
        'time' => $time
    ];
    $ci->load->view('front/show_msg', $view_data);
    $ci->output->_display();
    exit(0);
}


#状态常驻内存问题，config已经处理好了常驻问题
function echo_status($status_name, $val){
    $ci =& get_instance();
    $ci->load->config('my_config_status', true);

    $arr = $ci->config->item($status_name, 'my_config_status');
    $ret = isset($arr[$val]['html']) ? $arr[$val]['html'] : null;
    return $ret;
}

function status_select_arr($status_name){
    $ci =& get_instance();
    $ci->load->config('my_config_status', true);

    $arr = $ci->config->item($status_name, 'my_config_status');
    $ret = [];
    foreach($arr as $k=>&$a){
        $ret[$k] = $a['name'];
    }
    return $ret;
}

#isset or打包函数
function isset_or(&$d, $default_val = ''){
    return isset($d) ? $d : $default_val;
}