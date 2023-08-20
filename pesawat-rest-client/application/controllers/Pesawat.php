<?php

class Pesawat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pesawat_model');
        $this->load->library('form_validation');
    }

    // Menampilkan dan mencari data pesawat
    public function index()
    {
        $data['judul'] = 'Data Pesawat';
        $data['pesawat'] = $this->Pesawat_model->getAllpesawat();
        if ($this->input->post('keyword')) {
            $data['pesawat'] = $this->Pesawat_model->cariDatapesawat();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('pesawat/index', $data);
        $this->load->view('templates/footer');
    }
    // Menambah Data
    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data pesawat';

        $this->form_validation->set_rules('id_pesawat', 'Id_pesawat', 'required');
        $this->form_validation->set_rules('tipe_pesawat', 'tipe_pesawat', 'required');
        $this->form_validation->set_rules('jml_kursi_ekonomi', 'jml_kursi_ekonomi', 'required|numeric');
        $this->form_validation->set_rules('jml_kursi_bisnis', 'jml_kursi_bisnis', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('pesawat/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Pesawat_model->tambahDatapesawat();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('pesawat');
        }
    }
    // Hapus data
    public function hapus($id)
    {
        $this->Pesawat_model->hapusDatapesawat($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('pesawat');
    }

    // Detail data
    public function detail($id)
    {
        $data['judul'] = 'Detail Data pesawat';
        $data['pesawat'] = $this->Pesawat_model->getpesawatById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('pesawat/detail', $data);
        $this->load->view('templates/footer');
    }

    // Ubah data
    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data pesawat';
        $data['pesawat'] = $this->Pesawat_model->getpesawatById($id);
        
        $this->form_validation->set_rules('tipe_pesawat', 'tipe_pesawat', 'required');
        $this->form_validation->set_rules('jml_kursi_ekonomi', 'jml_kursi_ekonomi', 'required');
        $this->form_validation->set_rules('jml_kursi_bisnis', 'jml_kursi_bisnis', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('pesawat/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Pesawat_model->ubahDatapesawat();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('pesawat');
        }
    }
}
