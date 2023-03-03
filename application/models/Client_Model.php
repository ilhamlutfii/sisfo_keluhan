<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client_Model extends CI_Model
{
    private $_table = 'tb_company';
    private $_table2 = 'tb_users';

    public function getAllCompany()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $query = $this->db->get();
        return $query;
    }

    public function getById($id)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('tb_company.id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function detailUsers($id)
    {
        $this->db->select('*');
        $this->db->from($this->_table2);
        $this->db->join($this->_table . ' a', 'a.id=tb_users.company_id');
        $this->db->where('tb_users.company_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    // public function detailUsers($id)
    // {
    //     $this->db->select('tb_company.*', 'b.name', 'b.username', 'b.is_active');
    //     $this->db->from($this->_table);
    //     $this->db->from($this->_table2 . ' b', 'b.company_id=tb_company.id');
    //     $this->db->where('tb_company.id', $id);
    //     $query = $this->db->get();
    //     return $query->row();
    // }
}
