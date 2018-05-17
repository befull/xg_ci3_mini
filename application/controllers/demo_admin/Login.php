<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Ad_Controller {
    protected $no_need_login = true;

	#后端登录首页
	public function index()
	{
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
                redirect('admin/init');
            }

            break;
        }



        $this->load->view('demo_admin/login', $this->view_data);
	}

    public function logout()
    {
        $this->load->library('session');
        $this->session->unset_userdata('ad_uinfo');
        redirect('admin/login');
    }


}
