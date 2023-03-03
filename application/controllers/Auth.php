<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_Model');
        $this->load->model('Access_Model');
        $this->load->model('Users_Model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('company_code', 'Company Code', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $company_code = $this->input->post('company_code');

        $user = $this->Auth_Model->login($username, $company_code);

        if ($user->num_rows() > 0) {
            $hasil = $user->row();
            if ($hasil->is_active == 1) {
                if ($company_code == $hasil->company_code) {
                    // var_dump($hasil);
                    // die;
                    if (password_verify($password, $hasil->password)) {
                        $this->session->set_userdata('username', $username);
                        $this->session->set_userdata('company_id', $hasil->company_id);
                        $this->session->set_userdata('role_id', $hasil->role_id);

                        redirect('dashboard');
                    } else {
                        $this->session->set_flashdata('message', ' <div class="alert alert-danger" role="alert">Password Salah</div>');
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('message', ' <div class="alert alert-danger" role="alert">Kode perusahaan salah</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', ' <div class="alert alert-danger" role="alert">Akun tidak aktif</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidak terdaftar</div>');
            redirect('auth');
        }
    }

    public function registration()

    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[4]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[4]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registrasi';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'is_active' => 1,

            ];

            $this->db->insert('tb_users', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pendaftaran Berhasil</div>');
            redirect('auth');
        }
    }

    public function logout()

    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Logout Berhasil</div>');
        redirect('auth');
    }

    public function blocked()
    {
        $data['title'] = 'Blocked';
        $data['listrole'] = $this->Access_Model->menu();
        $data['companyname'] = $this->Auth_Model->getCompany();
        $data['listusers'] = $this->Users_Model->getUsersByCompany();
        // $data['listusers'] = $this->Users_Model->getUsersByCompany();
        $data['user'] = $this->db->get_where('tb_users', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('auth/blocked');
        $this->load->view('templates/footer');
    }
}
