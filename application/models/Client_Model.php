<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client_Model extends CI_Model
{
    private $_table = 'tb_company';
    private $_table2 = 'tb_users';
    private $_table3 = 'tb_role';

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

    public function getByCode($company_code)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('tb_company.company_code', $company_code);
        $query = $this->db->get();
        return $query->row();
    }

    public function getAllRoles()
    {
        $this->db->select('*');
        $this->db->from($this->_table3);
        $query = $this->db->get();
        return $query;
    }

    public function getUsersById($id)
    {
        $this->db->select('*');
        $this->db->from($this->_table2);
        $this->db->where('tb_users.id', $id);
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

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_company');
    }
}
