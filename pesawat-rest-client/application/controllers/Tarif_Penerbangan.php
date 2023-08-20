<?php

class Tarif_Penerbangan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tarif_Penerbangan_model');
        $this->load->library('form_validation');
    }

    // Menampilkan dan mencari data Tarif_Penerbangan
    public function index()
    {
        $data['judul'] = 'Data Tarif Penerbangan';
        $data['Tarif_Penerbangan'] = $this->Tarif_Penerbangan_model->getAllTarif_Penerbangan();
        if ($this->input->post('keyword')) {
            $data['Tarif_Penerbangan'] = $this->Tarif_Penerbangan_model->cariDataTarif_Penerbangan();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('Tarif_Penerbangan/index', $data);
        $this->load->view('templates/footer');
    }
    // Menambah Data
    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Tarif Penerbangan';

        $this->form_validation->set_rules('id_tarif', 'id_tarif', 'required');
        $this->form_validation->set_rules('id_penerbangan', 'id_penerbangan', 'required');
        $this->form_validation->set_rules('kelas', 'kelas', 'required');
        $this->form_validation->set_rules('tarif', 'tarif', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('Tarif_Penerbangan/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Tarif_Penerbangan_model->tambahDataTarif_Penerbangan();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('Tarif_Penerbangan');
        }
    }
    // Hapus data
    public function hapus($id)
    {
        $this->Tarif_Penerbangan_model->hapusDataTarif_Penerbangan($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('Tarif_Penerbangan');
    }

    // Detail data
    public function detail($id)
    {
        $data['judul'] = 'Detail Data Tarif Penerbangan';
        $data['Tarif_Penerbangan'] = $this->Tarif_Penerbangan_model->getTarif_PenerbanganById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('Tarif_Penerbangan/detail', $data);
        $this->load->view('templates/footer');
    }

    // Ubah data
    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data Tarif_Penerbangan';
        $data['Tarif_Penerbangan'] = $this->Tarif_Penerbangan_model->getTarif_PenerbanganById($id);
        
        $this->form_validation->set_rules('id_penerbangan', 'id_penerbangan', 'required');
        $this->form_validation->set_rules('kelas', 'kelas', 'required');
        $this->form_validation->set_rules('tarif', 'tarif', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('Tarif_Penerbangan/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Tarif_Penerbangan_model->ubahDataTarif_Penerbangan();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('Tarif_Penerbangan');
        }
    }
}
