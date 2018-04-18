<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Ad_Controller {

	#后端用户列表
	public function ls()
	{

        $q = $this->db->from('auth_user');
        $count = $q->count_all_results(null, FALSE);
        $rs = $q->limit(2)->get()->result();

        xg_dump($rs);
        xg_dump($count, 1);

        $this->view_data['rs'] = $rs;

        $this->view_data['page_title'] = '用户列表';
		$this->load->view('admin/user_list', $this->view_data);
	}


    #后端用户组列表
    public function group_ls()
    {
        $rs = $this->db->get('auth_group')->result();
        $this->view_data['rs'] = $rs;

        $this->view_data['page_title'] = '用户组列表';
        $this->load->view('admin/group_list', $this->view_data);
    }

    public function group_add()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('groupname', '用户组名', 'required');

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

        $this->view_data['page_title'] = '用户组添加';
        $this->load->view('admin/group_edit', $this->view_data);
    }

    public function rule_ls()
    {
        $rules = $this->db->order_by('id', 'asc')->get('auth_rule_menu')->result();
        $menu_arr = [];
        foreach($rules as $r){
            $menu_arr[$r->pid][$r->id] = $r;
        }
        $this->view_data['menu_arr'] = $menu_arr;
        #xg_dump($menu_arr,1);

        $this->view_data['page_title'] = '权限列表';
        $this->load->view('admin/rule_list', $this->view_data);
    }

    public function rule_edit()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', '权限名', 'required');
        $this->form_validation->set_rules('mca', 'MCA', 'required');

        $id = $this->input->get('id');

        if($_POST){
            $ret = ['err_no' => -1, 'err_msg' =>'failed'];
            if($this->form_validation->run() == false){
                $ret['err_msg'] = validation_errors();
            }else{
                $p = $this->input->post();
                $this->db->update('auth_rule_menu', $p, ['id'=>$id]);

                $ret = ['err_no' => 0, 'err_msg' =>'succ'];
            }

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($ret));
            return true;
        }else{
            $this->view_data['id'] = $id;
            $this->view_data['r'] = $this->db->get_where('auth_rule_menu', ['id'=>$id])->row();
            $this->load->view('admin/rule_edit', $this->view_data);
        }


    }


    public function rule_add()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', '权限名', 'required');
        $this->form_validation->set_rules('mca', 'MCA', 'required');

        $id = $this->input->get('id');

        if($_POST){
            $ret = ['err_no' => -1, 'err_msg' =>'failed'];
            if($this->form_validation->run() == false){
                $ret['err_msg'] = validation_errors();
            }else{
                $p = $this->input->post();
                $p['pid'] = $id;
                $this->db->insert('auth_rule_menu', $p);

                $ret = ['err_no' => 0, 'err_msg' =>'succ'];
            }

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($ret));
            return true;
        }else{
            $this->view_data['id'] = $id;
            $this->load->view('admin/rule_edit', $this->view_data);
        }

    }

    public function rule_del()
    {
        $this->load->helper('form');

        $id = $this->input->get('id');
        if($_POST){
            $ret = ['err_no' => 1, 'err_msg' =>'succ'];

            $this->db->delete('auth_rule_menu', ['id'=>$id]);

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($ret));
            return true;
        }else{
            $this->view_data['id'] = $id;
            $this->view_data['r'] = $this->db->get_where('auth_rule_menu', ['id'=>$id])->row();
            $this->load->view('admin/rule_del', $this->view_data);
        }
    }


}
