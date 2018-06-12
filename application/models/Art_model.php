<?php

class Art_model extends MY_Model {
    protected $table_name = 'art';
    protected $trash_table_name = 'art_trash';

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');

    }



}