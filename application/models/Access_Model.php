<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Access_Model extends CI_Model
{
    private $_table = 'tb_menu';
    private $_table2 = 'tb_access_menu';




    public function menu()
    {
        $this->db->select('tb_menu.*', 'b.menu_id');
        $this->db->from($this->_table);
        $this->db->join($this->_table2 . ' b', 'b.menu_id=tb_menu.id');
        $this->db->where('role_id', $this->session->userdata('role_id'));
        $this->db->order_by('b.menu_id', 'ASC');
        $query = $this->db->get();
        return $query;
    }
}
