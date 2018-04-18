<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Input extends CI_Input
{
    public function __construct($config = array())
    {
        parent::__construct($config);
    }


    #判断并获得GET中的参数值，若不是INT，则报错
    function get_int($str)
    {
        $val = $this->get($str);
        if($val === null or $val === '') show_error("GET:$str is not given or empty");
        $res = filter_var($val, FILTER_VALIDATE_INT);
        if($res === false) show_error('GET param is not a VALIDATE_INT val');
        return (int)$val;
    }

    #判断并获得GET中的参数值，若不是string，则报错
    function get_string($str)
    {
        $val = $this->get($str);
        if($val === null or $val === '') show_error("GET:$str is not given or empty");
        $res = filter_var($val, FILTER_SANITIZE_STRING);
        if($res === false) show_error('GET param is not a SANITIZE_STRING val');
        return (string)$val;
    }

    #安全字符串:有空写一个验证 a-zA-Z-_的，用filter_var的正则就可以。
    function get_safe_str()
    {

    }
}