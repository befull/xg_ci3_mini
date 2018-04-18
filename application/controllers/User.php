<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    protected $view_data;

	#用户
	public function index()
	{
		$this->load->view('front/init_index');
	}


    public function login(){
        $this->load->helper('form');
        $this->load->helper('captcha');
        $this->load->library('form_validation');
        $this->load->helper('cookie');
        $this->load->library('encrypt');
        $this->load->library('session');


        $this->form_validation->set_rules('username', '用户名', 'trim|required|alpha_numeric');
        $this->form_validation->set_rules('password', '密码', 'required');
        $this->form_validation->set_rules('captcha', '验证码', 'trim|required|min_length[4]|max_length[4]');


        while($this->form_validation->run() !== false){
            $p['username'] = $this->form_validation->set_value('username');
            $p['password'] = $this->form_validation->set_value('password');

            if(
                $this->session->captcha != strtolower($this->input->post('captcha'))
                and $this->input->post('captcha') != 9999
            ){
                $this->view_data['post_err'] = '验证码错误，请重试！';
                break;
            }

            $this->load->model('auth_user_model');
            if(!$uinfo = $this->auth_user_model->check_and_get($p['username'], $p['password'])){
                $this->view_data['post_err'] = '用户名或密码错误';
            }else{
                $this->auth_user_model->do_login($uinfo);
                redirect(); #跳转到默认主页
            }

            break;
        }



        $this->load->view('front/login', $this->view_data);


    }


}
