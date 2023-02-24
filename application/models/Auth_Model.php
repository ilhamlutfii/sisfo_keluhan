<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_Model extends CI_Model
{
    private $_table = 'tb_users';
    private $_table2 = 'tb_company';
    private $_table3 = 'tb_role';

    public function login($username)
    {
        $this->db->select('tb_users.*, b.company_code, c.role_name');
        $this->db->from($this->_table);
        $this->db->join($this->_table2 . ' b', 'b.id=tb_users.company_id');
        $this->db->join($this->_table3 . ' c', 'c.id=tb_users.role_id');
        $this->db->where('username', $username);
        $query = $this->db->get();
        return $query;
    }
}
