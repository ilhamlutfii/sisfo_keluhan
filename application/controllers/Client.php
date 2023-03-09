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
        $data['listroles'] = $this->Client_Model->getAllRoles();

        $data['user'] = $this->db->get_where('tb_users', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
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
        $data['listroles'] = $this->Client_Model->getAllRoles();



        $data['user'] = $this->db->get_where('tb_users', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('page/detail_company', $data);
        $this->load->view('templates/footer');
    }


    public function editcompany($id = "")
    {
        $data['detailcompany'] = $this->Client_Model->getById($id);

        $this->form_validation->set_rules('company_name', 'company_name', 'required');
        $this->form_validation->set_rules('address', 'address');
        $this->form_validation->set_rules('pic_name', 'pic_name');
        $this->form_validation->set_rules('pic_contact', 'pic_contact');
        $this->form_validation->set_rules('licence', 'licence');
        $this->form_validation->set_rules('version', 'version');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Salah</div>');
            redirect('client/detail');
        } else {
            $data = [
                'company_name' => $this->input->post('company_name'),
                'address' => $this->input->post('address'),
                'pic_name' => $this->input->post('pic_name'),
                'pic_contact' => $this->input->post('pic_contact'),
                'licence' => $this->input->post('licence'),
                'version' => $this->input->post('version'),
            ];
            // var_dump($data);
            // die;
            $this->db->set('company_name', $data['company_name']);
            $this->db->set('address', $data['address']);
            $this->db->set('pic_name', $data['pic_name']);
            $this->db->set('pic_contact', $data['pic_contact']);
            $this->db->set('licence', $data['licence']);
            $this->db->set('version', $data['version']);
            $this->db->where('id', $id);
            $this->db->update('tb_company');
            redirect('client/detail/' . $id);
        }
    }

    public function addclient($company_code = "")

    {
        $data['user'] = $this->db->get_where('tb_users', ['username' => $this->session->userdata('username')])->row_array();
        $data['listcompanycode'] = $this->Client_Model->getByCode($company_code);
        $this->form_validation->set_rules('company_code', 'company_code', 'required|is_unique[tb_company.company_code]');
        $this->form_validation->set_rules('company_name', 'company_name', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data client salah</div>');
            redirect('client');
        } else {
            $data = [
                'company_code' => $this->input->post('company_code'),
                'company_name' => $this->input->post('company_name'),
                'status' => "1",
            ];
            $this->db->insert('tb_company', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pendaftaran Berhasil</div>');
            redirect('client');
            // }
        }
    }

    public function activation($id = "")
    {

        $data['detailcompany'] = $this->Client_Model->getById($id);
        if ($data['detailcompany']->status == "1") {
            $data = [
                'status' => "0",
            ];

            $this->db->set('status', $data['status']);
            $this->db->where('id', $id);
            $this->db->update('tb_company');
            redirect('client');
        } else {
            $data = [
                'status' => "1",
            ];

            $this->db->set('status', $data['status']);
            $this->db->where('id', $id);
            $this->db->update('tb_company');
            redirect('client');
        }
    }

    public function delete($id)
    {
        $this->Client_Model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">user berhasil dihapus</div>');
        redirect('client');
    }

    public function registration($id = "")

    {
        $data['user'] = $this->db->get_where('tb_users', ['username' => $this->session->userdata('username')])->row_array();
        $data['detailcompany'] = $this->Client_Model->getById($id);
        $this->form_validation->set_rules('name', 'Name', 'required|trim|min_length[4]');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[4]');
        $this->form_validation->set_rules('password1', 'Password1', 'required|trim|min_length[4]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password2', 'required|trim|min_length[4]|matches[password1]');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pendaftaran Gagal</div>');
            redirect('client/detail/' . $id);
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'company_id' => $id,
                'is_active' => 1,

            ];
            $this->db->insert('tb_users', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pendaftaran Berhasil</div>');
            redirect('client/detail/' . $id . "/#nav-users");
        }
    }
}
