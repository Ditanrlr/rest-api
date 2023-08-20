<?php

class Penerbangan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penerbangan_model');
        $this->load->library('form_validation');
    }

    // Menampilkan dan mencari data Penerbangan
    public function index()
    {
        $data['judul'] = 'Data Penerbangan';
        $data['Penerbangan'] = $this->Penerbangan_model->getAllPenerbangan();
        if ($this->input->post('keyword')) {
            $data['Penerbangan'] = $this->Penerbangan_model->cariDataPenerbangan();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('Penerbangan/index', $data);
        $this->load->view('templates/footer');
    }
    // Menambah Data
    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Penerbangan';

        $this->form_validation->set_rules('id_penerbangan', 'id_penerbangan', 'required');
        $this->form_validation->set_rules('id_bandara', 'id_bandara', 'required');
        $this->form_validation->set_rules('id_pesawat', 'id_pesawat', 'required');
        $this->form_validation->set_rules('tgl_penerbangan', 'tgl_penerbangan', 'required');
        $this->form_validation->set_rules('asal', 'asal', 'required');
        $this->form_validation->set_rules('tujuan', 'tujuan', 'required');
        $this->form_validation->set_rules('jam_berangkat', 'jam_berangkat', 'required');
        $this->form_validation->set_rules('jam_tiba', 'jam_tiba', 'required');
        $this->form_validation->set_rules('bandara_tujuan', 'bandara_tujuan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('Penerbangan/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Penerbangan_model->tambahDataPenerbangan();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('Penerbangan');
        }
    }
    // Hapus data
    public function hapus($id)
    {
        $this->Penerbangan_model->hapusDataPenerbangan($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('Penerbangan');
    }

    // Detail data
    public function detail($id)
    {
        $data['judul'] = 'Detail Data Penerbangan';
        $data['Penerbangan'] = $this->Penerbangan_model->getPenerbanganById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('Penerbangan/detail', $data);
        $this->load->view('templates/footer');
    }

    // Ubah data
    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data Penerbangan';
        $data['Penerbangan'] = $this->Penerbangan_model->getPenerbanganById($id);
        
        $this->form_validation->set_rules('id_bandara', 'id_bandara', 'required');
        $this->form_validation->set_rules('id_pesawat', 'id_pesawat', 'required');
        $this->form_validation->set_rules('tgl_penerbangan', 'tgl_penerbangan', 'required');
        $this->form_validation->set_rules('asal', 'asal', 'required');
        $this->form_validation->set_rules('tujuan', 'tujuan', 'required');
        $this->form_validation->set_rules('jam_berangkat', 'jam_berangkat', 'required');
        $this->form_validation->set_rules('jam_tiba', 'jam_tiba', 'required');
        $this->form_validation->set_rules('bandara_tujuan', 'bandara_tujuan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('Penerbangan/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Penerbangan_model->ubahDataPenerbangan();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('Penerbangan');
        }
    }
}
