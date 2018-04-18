<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['user_group']	= [
    -1 => ['name'=>'停用中', 'html'=>'<span class="label label-danger">停用中</span>'],
    1 => ['name'=>'正常', 'html'=>'<span class="label label-success">正常</span>']
];

$config['rule_type']	= [
    -1 => ['name'=>'权限', 'html'=>''],
    1 => ['name'=>'菜单', 'html'=>'<span class="label label-success">菜单</span>']
];