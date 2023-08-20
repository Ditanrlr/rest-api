<?php

class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_model');
        $this->load->library('form_validation');
    }

    // Menampilkan dan mencari data Customer
    public function index()
    {
        $data['judul'] = 'Data Customer';
        $data['Customer'] = $this->Customer_model->getAllCustomer();
        if ($this->input->post('keyword')) {
            $data['Customer'] = $this->Customer_model->cariDataCustomer();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('Customer/index', $data);
        $this->load->view('templates/footer');
    }
    // Menambah Data
    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Customer';

        $this->form_validation->set_rules('id_customer', 'Id_customer', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('kota', 'Kota', 'required');
        $this->form_validation->set_rules('negara', 'negara', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('Customer/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Customer_model->tambahDataCustomer();
            $this->session->set_flashdata('flash', ' Ditambahkan');
            redirect('Customer');
        }
    }
    // Hapus data
    public function hapus($id)
    {
        $this->Customer_model->hapusDataCustomer($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('Customer');
    }

    // Detail data
    public function detail($id)
    {
        $data['judul'] = 'Detail Data Customer';
        $data['Customer'] = $this->Customer_model->getCustomerById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('Customer/detail', $data);
        $this->load->view('templates/footer');
    }

    // Ubah data
    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data Customer';
        $data['Customer'] = $this->Customer_model->getCustomerById($id);
        
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('email', 'Nama', 'required|valid_email');
        $this->form_validation->set_rules('kota', 'Kota', 'required');
        $this->form_validation->set_rules('negara', 'Kota', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('Customer/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Customer_model->ubahDataCustomer();
            $this->session->set_flashdata('flash', ' Diubah');
            redirect('Customer');
        }
    }
}
