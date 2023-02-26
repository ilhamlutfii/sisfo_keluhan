<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('Access_Model');
        $this->load->model('Auth_Model');
        $this->load->model('Client_Model');
        $this->load->model('Users_Model');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data['title'] = 'Users';
        $data['listrole'] = $this->Access_Model->menu();
        $data['companyname'] = $this->Auth_Model->getCompany();
        $data['listusers'] = $this->Users_Model->getUsersByCompany();
        // $data['listusers'] = $this->Users_Model->getUsersByCompany();
        $data['user'] = $this->db->get_where('tb_users', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('page/users', $data);
        $this->load->view('templates/footer');
    }
}
