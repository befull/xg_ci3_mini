<?php defined('BASEPATH') OR exit('No direct script access allowed');

#调试函数，用于代码中快速的断点调试

//xiaogao dump
function xg_dump($param, $isdie = false, $condition = null){
    header('Content-type: text/html; charset=utf-8');

    if($condition !== null && !$condition) {
        return 0;
    }
    var_dump($param);
    if($isdie) die;
}

