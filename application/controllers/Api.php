<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
    
    public function captcha(){
        $this->load->library('checkcode');
        $this->load->library('session');
        $w = intval($this->input->get('w'));
        $h = intval($this->input->get('h'));

        if(!empty($w)) $this->checkcode->width = $w;
        if(!empty($h)) $this->checkcode->height = $h;
        $this->checkcode->doimage();
        $this->session->set_userdata('captcha', $this->checkcode->get_code());
        #$_SESSION['captcha']=$this->checkcode->get_code();
    }

    public function qrcode(){
        require_once APPPATH.'third_party/phpqrcode/qrlib.php';

        $u = $this->input->get('u');
        if(!empty($u)){
            $u = urldecode($u);
            QRcode::png($u);
        }

    }
    
}