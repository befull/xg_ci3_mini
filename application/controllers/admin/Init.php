<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Init extends CI_Controller {

	#后端默认首页
	public function index()
	{

        $this->view_data['page_title'] = '控制台';
		$this->load->view('admin/init_index', $this->view_data);
	}




}
