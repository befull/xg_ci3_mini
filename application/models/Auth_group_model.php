<?php

class Auth_group_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }

    #删除用户组时，同时删除auth_group_user中的这个组的分配
    public function del($id){

    }

}