<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_Model extends CI_Model
{
    private $_table = 'tb_users';

    public function getAllUsers()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $query = $this->db->get();
        return $query;
    }

    public function getUsersByCompany()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('company_id', $this->session->userdata('company_id'));
        $query = $this->db->get();
        return $query;
    }
}
