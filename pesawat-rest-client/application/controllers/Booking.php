<?php

class Booking extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Booking_model');
        $this->load->library('form_validation');
    }

    // Menampilkan dan mencari data Booking
    public function index()
    {
        $data['judul'] = 'Data Booking';
        $data['Booking'] = $this->Booking_model->getAllBooking();
        if ($this->input->post('keyword')) {
            $data['Booking'] = $this->Booking_model->cariDataBooking();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('Booking/index', $data);
        $this->load->view('templates/footer');
    }
    // Menambah Data
    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Booking';

        $this->form_validation->set_rules('id_booking', 'id_booking', 'required');
        $this->form_validation->set_rules('id_customer', 'id_customer', 'required');
        $this->form_validation->set_rules('tgl_booking', 'tgl_booking', 'required');
        $this->form_validation->set_rules('jumlah_penumpang', 'jumlah_penumpang', 'required');
        $this->form_validation->set_rules('total_tarif', 'total_tarif', 'required');
        $this->form_validation->set_rules('status_bayar', 'status_bayar', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('Booking/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Booking_model->tambahDataBooking();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('Booking');
        }
    }
    // Hapus data
    public function hapus($id)
    {
        $this->Booking_model->hapusDataBooking($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('Booking');
    }

    // Detail data
    public function detail($id)
    {
        $data['judul'] = 'Detail Data Booking';
        $data['Booking'] = $this->Booking_model->getBookingById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('Booking/detail', $data);
        $this->load->view('templates/footer');
    }

    // Ubah data
    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data Booking';
        $data['Booking'] = $this->Booking_model->getBookingById($id);

        $this->form_validation->set_rules('id_customer', 'id_customer', 'required');
        $this->form_validation->set_rules('tgl_booking', 'tgl_booking', 'required');
        $this->form_validation->set_rules('jumlah_penumpang', 'jumlah_penumpang', 'required');
        $this->form_validation->set_rules('total_tarif', 'total_tarif', 'required');
        $this->form_validation->set_rules('status_bayar', 'status_bayar', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('Booking/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Booking_model->ubahDataBooking();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('Booking');
        }
    }
}
