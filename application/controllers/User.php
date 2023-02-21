<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller

{
    public function index()
    {
        $data['user'] = $this->db->get_where('tb_users', ['username' => $this->session->userdata('username')])->row_array();
        echo "Selamat datang User " . $data['user']['username'];
    }
}
