<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('Access_Model');
        $this->load->model('Auth_Model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Profile';
        $data['listrole'] = $this->Access_Model->menu();
        $data['companyname'] = $this->Auth_Model->getCompany();
        $data['user'] = $this->db->get_where('tb_users', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('page/profile', $data);
        $this->load->view('templates/footer');
    }
}
