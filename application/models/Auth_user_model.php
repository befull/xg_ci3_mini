<?php

class Auth_user_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }


    public function check_and_get($name, $pw){
        $pw_hash = sha1($pw);
        $r = $this->db
            ->get_where('auth_user', ['username'=>$name, 'password'=>$pw_hash])
            ->row();
        return $r;
    }

    public function do_login($r){
        $d = [
            'id' => $r->id,
            'username' => $r->username,
            'avatar' => $r->avatar
        ];
        $this->session->set_userdata('ad_uinfo', $d);

        $up_d = [
            'last_login_ip' => $this->input->ip_address(),
            'last_login_time' => time()
        ];
        $this->db->update('auth_user', $up_d, ['id'=>$r->id]);

    }

    public function get_menu($userid){
        #todo 链表查询的效率研究
        $str = $this->db->select('group_id')->where('uid', $userid)->get_compiled_select('auth_group_user');
        $groups = $this->db
            ->where('id IN('.$str.')')
            ->where('status', 1)
            ->get('auth_group')->result();

        #如果是超级管理员，自动包含所有权限
        $is_sup_admin = false;
        $rule_ids = [];
        foreach($groups as $g){
            if($g->id == 1) $is_sup_admin = true;
            $rule_ids = array_merge($rule_ids, explode(',', $g->rules));
        }
        $rule_ids = array_unique($rule_ids);

        if($is_sup_admin){
            $rules = $this->db->order_by('id', 'asc')->get('auth_rule_menu')->result();
        }else{
            $rules = $this->db->where_in('id', $rule_ids)->order_by('id', 'asc')->get('auth_rule_menu')->result();
        }


        $rule_arr = [];
        $menu_arr = [];
        foreach($rules as $r){
            $rule_arr[] = $r->mca;

            if($r->type == 1){
                $menu_arr[$r->pid][$r->id] = $r;
            }
        }
        $this->rule_arr = $rule_arr;

        return $menu_arr;
    }

}