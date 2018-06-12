<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Init extends My_Controller {

	#默认首页
	public function index()
	{

	}


    public function demo1(){
        $this->load->view('mobile/demo1', $this->view_data);
    }

    public function demo2(){
        $this->load->view('mobile/show_msg', $this->view_data);
    }

    public function demo3(){
        $this->load->view('mobile/demo3', $this->view_data);
    }
}
