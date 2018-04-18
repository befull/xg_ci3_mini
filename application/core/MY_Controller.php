<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_Controller extends CI_Controller
{
    protected $view_data;
    public function __construct($config = array())
    {
        parent::__construct($config);
    }
}


class Ad_Controller extends CI_Controller
{
    protected $view_data, $userinfo;
    public function __construct($config = array())
    {
        parent::__construct($config);
        $this->check_login();
    }

    private function check_login(){
        $this->load->database();
        $this->load->library('session');

        $this->userinfo = $this->session->userdata('ad_uinfo');
        $view_data['userinfo'] = $this->userinfo;
        if(isset($this->no_need_login)){
            return true;
        }
        if($this->userinfo === null){
            #后端登录可以考虑隐藏登录口
            redirect('admin/login');
        }

        #菜单
        $this->load->model('auth_user_model');
        $this->view_data['menu'] = $this->auth_user_model->get_menu($this->userinfo['id']);
    }



}