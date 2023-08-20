<?php

class Bandara extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Bandara_model');
        $this->load->library('form_validation');
    }

    // Menampilkan dan mencari data bandara
    public function index()
    {
        $data['judul'] = 'Data Bandara';
        $data['bandara'] = $this->Bandara_model->getAllbandara();
        if ($this->input->post('keyword')) {
            $data['bandara'] = $this->Bandara_model->cariDatabandara();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('bandara/index', $data);
        $this->load->view('templates/footer');
    }
    // Menambah Data
    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data bandara';

        $this->form_validation->set_rules('id_bandara', 'Id_bandara', 'required');
        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('kota', 'Kota', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('bandara/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Bandara_model->tambahDatabandara();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('bandara');
        }
    }
    // Hapus data
    public function hapus($id)
    {
        $this->Bandara_model->hapusDatabandara($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('bandara');
    }

    // Detail data
    public function detail($id)
    {
        $data['judul'] = 'Detail Data bandara';
        $data['bandara'] = $this->Bandara_model->getbandaraById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('bandara/detail', $data);
        $this->load->view('templates/footer');
    }

    // Ubah data
    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data bandara';
        $data['bandara'] = $this->Bandara_model->getbandaraById($id);
        

        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('kota', 'Kota', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('bandara/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Bandara_model->ubahDatabandara();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('bandara');
        }
    }
}
