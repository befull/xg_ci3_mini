<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model
{
    public function __construct($config = array())
    {
        parent::__construct($config);
        $this->load->database();
    }



    /**
     * 删除操作，自动创建回收站表，然后转移回收站表
     * 这里可以考虑再加一个删除时间的字段
     * @param $where
     * @return bool|mixed
     */
    public function delete($where){
        #如果没设置trash_table_name，不需要回收表
        if(!isset($this->trash_table_name)){
            return $this->db->delete($this->table_name, $where);
        }elseif(!$this->db->table_exists($this->trash_table_name)){
            $this->load->dbforge();
            #如果表不存在，建立该回收表
            $frs = $this->db->field_data($this->table_name);
            $trash_fields = [];
            foreach($frs as $f){
                $trash_fields[$f->name] = [
                    'type' => $f->type,
                    'constraint' => $f->max_length,
                    'default' => $f->default
                ];
            }
            $this->dbforge->add_field($trash_fields);
            $this->dbforge->create_table($this->trash_table_name);
        }

        $this->db->trans_start();
        $rs = $this->db->get_where($this->table_name, $where)->result_array();
        if(empty($rs)) return true;
        $this->db->insert_batch($this->trash_table_name, $rs);
        $this->db->delete($this->table_name, $where);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            return false;
        }
        else
        {
            $this->db->trans_commit();
            return true;
        }
    }

}