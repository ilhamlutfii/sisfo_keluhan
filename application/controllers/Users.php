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
        $data['user'] = $this->db->get_where('tb_users', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('name', 'Name', 'required|trim|min_length[4]');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[4]');
        $this->form_validation->set_rules('password1', 'Password1', 'required|trim|min_length[4]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password2', 'required|trim|min_length[4]|matches[password1]');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pendaftaran Gagal</div>');
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

    public function changepassword($id = "")
    {

        $data['users'] = $this->Users_Model->getUsersById($id);
        $this->form_validation->set_rules('current_password', 'current_password', 'required');
        $this->form_validation->set_rules('new_password', 'new_password', 'required');
        $this->form_validation->set_rules('confirm_new_password', 'confirm_new_password', 'required');
        $this->session->set_flashdata('id', $id);
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">validasi gagal</div>');
            $this->session->set_flashdata('status', 'false');
            redirect('users');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');
            if (!password_verify($current_password, $data['users']->password)) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">current password yang diinput berbeda dengan di database</div>');
                $this->session->set_flashdata('status', 'false');
                redirect('users');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">password tidak ada perubahan</div>');
                    $this->session->set_flashdata('status', 'false');
                    redirect('users');
                } else {

                    $data = [
                        'password' => password_hash($this->input->post('new_password'), PASSWORD_DEFAULT),
                    ];
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">password berhasil diubah</div>');
                    $this->session->set_flashdata('status', 'true');
                    // $this->db->update('tb_users', $data, $id);
                    $this->db->set('password', $data['password']);
                    $this->db->where('id', $id);
                    $this->db->update('tb_users');
                    redirect('users');
                }
            }
        }
    }

    public function activation($id = "")
    {

        $data['users'] = $this->Users_Model->getUsersById($id);
        if ($data['users']->is_active == 1) {
            $data = [
                'is_active' => '0',
            ];

            $this->db->set('is_active', $data['is_active']);
            $this->db->where('id', $id);
            $this->db->update('tb_users');
            redirect('users');
        } else {
            $data = [
                'is_active' => '1',
            ];

            $this->db->set('is_active', $data['is_active']);
            $this->db->where('id', $id);
            $this->db->update('tb_users');
            redirect('users');
        }
    }

    public function delete($id)
    {
        $this->Users_Model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">user berhasil dihapus</div>');
        redirect('users');
    }
}
