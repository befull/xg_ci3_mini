<?php

class Art_model extends MY_Model {
    protected $table_name = 'art';
    protected $trash_table_name = 'trash_art';

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');

    }



}