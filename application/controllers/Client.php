<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();
        // if (!$this->session->userdata('username')) {
        //     redirect('auth');
        // }

        is_logged_in();

        $this->load->model('Access_Model');
        $this->load->model('Auth_Model');
        $this->load->model('Client_Model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Client';
        $data['listrole'] = $this->Access_Model->menu();
        $data['companyname'] = $this->Auth_Model->getCompany();
        $data['listcompany'] = $this->Client_Model->getAllCompany();
        $data['user'] = $this->db->get_where('tb_users', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('page/client', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id = "")
    {
        $data['title'] = 'Client';
        $data['listrole'] = $this->Access_Model->menu();
        $data['companyname'] = $this->Auth_Model->getCompany();
        $data['detailcompany'] = $this->Client_Model->getById($id);
        $data['detailusers'] = $this->Client_Model->detailUsers($id);
        $data['user'] = $this->db->get_where('tb_users', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('page/detail_company', $data);
        $this->load->view('templates/footer');
    }
}
