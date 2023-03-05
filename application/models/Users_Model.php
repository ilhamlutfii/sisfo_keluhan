<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_Model extends CI_Model
{
    private $_table = 'tb_users';
    private $_table2 = 'tb_role';

    public function getAllUsers()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $query = $this->db->get();
        return $query;
    }

    public function getUsersById($id)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('tb_users.id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function getUsersByCompany()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('company_id', $this->session->userdata('company_id'));
        $query = $this->db->get();
        return $query;
    }

    public function getAllRoles()
    {
        $this->db->select('*');
        $this->db->from($this->_table2);
        $query = $this->db->get();
        return $query;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_users');
    }
}
