<?php defined('BASEPATH') OR exit('No direct script access allowed');

class My_Form_validation extends CI_Form_validation {
    public function __construct($config = array())
    {
        parent::__construct($config);
    }

    public function run_with_token($group = ''){
        #判断是否有提交，其实下面的run里，有对规则数做判断，如果是0，说明还没提交。
        if ($this->CI->input->method() !== 'post' && empty($this->validation_data)){
            return false;
        }
        $this->CI->load->library('session');
        $_form_token = $this->CI->session->flashdata('_form_token');
        $sub_token = $this->CI->input->post('__hash__');
        if($sub_token === null or $_form_token != $sub_token){
            $this->_error_array['__hash__'] = '令牌失效，可能是对当前表单快速进行了多次提交，第一次提交已经成功';
            $this->_error_array['__hash__'] = '令牌失效，可能是对当前表单快速进行了多次提交，第一次提交已经成功';
            return false;
        }

        return parent::run($group);
    }

}