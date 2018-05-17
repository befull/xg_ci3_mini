<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends My_Controller {


    #演示form_token的使用：实际项目中，我感觉，只需要在内容添加表单中，增加这一项，待定
    public function demo1(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('pw', '密码', 'required');

        sleep(1); #测试重复提交
        #新增带token验证的run_with_token函数
        while($this->form_validation->run_with_token() !== false){

            echo 'succ';

            break;
        }

        $this->load->view('demo/front_demo1');
    }

    #demo2:删除某个表的记录时，自动创建回收站表，并将记录转移到回收站表
    public function demo2(){
        echo '<h1>demo2</h1>';

        $this->load->model('art_model');
        $res = $this->art_model->delete(['id'=>9]);
        xg_dump($res);

    }

    #ajax 提交
    public function demo3(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('ajax_do_sub', 'ajax_do_sub', 'required');
        while($this->form_validation->run() !== false){
            $ret = ['err_no' => -1, 'err_msg' =>'failed'];

            $name = $this->input->post('name');
            if($name != '11')
                $ret = ['err_no' => 0, 'err_msg'=>$name];

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($ret));
            return true;
        }

        $this->load->view('demo/front_demo3');
    }


    #最简便的分页链接输出和数据记录输出写法
    public function demo7(){
        #配置分页信息
        $page = $this->uri->segment(3,1);
        $per_page = 20; #默认配置文件在 application/config/pagination.php


        $where = [];
        $count = $this->db
            ->where($where)
            ->or_like('zdjs', $this->jwuser['realname'])
            ->count_all_results('jzxx', false); #第二个参数，在手册里说只保留了select的设置， 实际上是不重置筛选条件
        $rs = $this->db
            ->order_by('jz_id', 'DESC')
            ->limit($per_page,($page - 1)*$per_page)
            ->get()->result();

        $this->view_data['list'] = $rs;


        $this->load->library('pagination');
        $this->view_data['pageinfo'] = $this->pagination->xg_create_links(site_url('Jiangzhuang/my_list/'), $count, $per_page);

        $this->view_data['page_title']="我的获奖信息列表";
        $this->load->view('admin/my_list_jz',$this->view_data);

    }

}
