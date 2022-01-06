<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Core_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_user_role($account){
        $this->db->select('*');
        $this->db->from('role');
        $this->db->where('account', $account);
        $query = $this->db->get();
        return $query->result_array();  
    }

    public function get_project_list($id=null){
        $this->db->select('*');
        $this->db->from('project_list');
        if($id)
            $this->db->where('id', $id);
        $this->db->order_by('porder', 'DESC');
         $query = $this->db->get();
        return $query->result_array();
    }

    public function del_project($id){
        $this->db->where('id', $id);
        $this->db->delete('project_list'); 
    }

    public function insert_project($data){
        $insert = $this->db->insert('project_list', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }



}
