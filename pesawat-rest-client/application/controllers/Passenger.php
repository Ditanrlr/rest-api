<?php

class Passenger extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Passenger_model');
        $this->load->library('form_validation');
    }

    // Menampilkan dan mencari data Passenger
    public function index()
    {
        $data['judul'] = 'Data Passenger';
        $data['Passenger'] = $this->Passenger_model->getAllPassenger();
        if ($this->input->post('keyword')) {
            $data['Passenger'] = $this->Passenger_model->cariDataPassenger();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('Passenger/index', $data);
        $this->load->view('templates/footer');
    }
    // Menambah Data
    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Passenger';

        $this->form_validation->set_rules('id_passenger', 'Id_passenger', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('no_kursi', 'no_kursi', 'required|numeric');
        $this->form_validation->set_rules('id_detail', 'id_detail', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('Passenger/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Passenger_model->tambahDataPassenger();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('Passenger');
        }
    }
    // Hapus data
    public function hapus($id)
    {
        $this->Passenger_model->hapusDataPassenger($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('Passenger');
    }

    // Detail data
    public function detail($id)
    {
        $data['judul'] = 'Detail Data Passenger';
        $data['Passenger'] = $this->Passenger_model->getPassengerById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('Passenger/detail', $data);
        $this->load->view('templates/footer');
    }

    // Ubah data
    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data Passenger';
        $data['Passenger'] = $this->Passenger_model->getPassengerById($id);

        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('no_kursi', 'no_kursi', 'required|numeric');
        $this->form_validation->set_rules('id_detail', 'id_detail', 'required|numeric');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('Passenger/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Passenger_model->ubahDataPassenger();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('Passenger');
        }
    }
}
