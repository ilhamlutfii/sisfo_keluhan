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
        $data['listroles'] = $this->Users_Model->getAllRoles();

        $data['user'] = $this->db->get_where('tb_users', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('page/users', $data);
        $this->load->view('templates/footer');
    }


    public function registration()

    {
        $data['title'] = 'Users';
        $data['listrole'] = $this->Access_Model->menu();
        $data['companyname'] = $this->Auth_Model->getCompany();
        $data['listusers'] = $this->Users_Model->getUsersByCompany();
        $data['listroles'] = $this->Users_Model->getAllRoles();

        $data['user'] = $this->db->get_where('tb_users', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('name', 'Name', 'required|trim|min_length[4]');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[4]');
        $this->form_validation->set_rules('password1', 'Password1', 'required|trim|min_length[4]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password2', 'required|trim|min_length[4]|matches[password1]');
        // $this->form_validation->set_rules('company_id', 'company_id', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pendaftaran Gagal</div>');
            redirect('users');
        } else {
            if ($this->session->userdata('company_id') == 1) {
                $data = [
                    'name' => $this->input->post('name'),
                    'username' => $this->input->post('username'),
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    'role_id' => $this->input->post('role_id'),
                    'company_id' => 1,
                    'is_active' => 1,

                ];
                $this->db->insert('tb_users', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pendaftaran Berhasil</div>');
                redirect('users');
            } else {
                $data = [
                    'name' => $this->input->post('name'),
                    'username' => $this->input->post('username'),
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    'role_id' => 2,
                    'company_id' => $this->session->userdata('company_id'),
                    'is_active' => 1,

                ];
                $this->db->insert('tb_users', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pendaftaran Berhasil</div>');
                redirect('users');
            }
        }
    }
}
