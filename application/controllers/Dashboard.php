<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Access_Model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Dashboard Admin';
        $data['listrole'] = $this->Access_Model->menu();
        $data['user'] = $this->db->get_where('tb_users', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('page/dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function customer()
    {
        $data['title'] = 'Dashboard Customer';
        $data['listrole'] = $this->Access_Model->menu();
        $data['user'] = $this->db->get_where('tb_users', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('page/dashboard', $data);
        $this->load->view('templates/footer');
    }
}
