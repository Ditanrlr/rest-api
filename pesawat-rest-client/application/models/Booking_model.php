<?php

use GuzzleHttp\Client;

class Booking_model extends CI_model
{
    // Konek ke REst API Server, masukan alamat rest API server dan autentifikasinya
    private $_client;
    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/rest-api/pesawat-rest-server/',
            'auth' => ['admin', '1234']
        ]);
    }
    // menampilkan data Booking
    public function getAllBooking()
    {
        $response = $this->_client->request('GET', 'Booking', [
            'query' => [
                'wpu-key' => 'rahasia'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    // menampilkan data berdasar Id
    public function getBookingById($id)
    {

        $response = $this->_client->request('GET', 'Booking', [
            // Params
            'query' => [
                'wpu-key' => 'rahasia',
                'id_booking' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'][0];
    }
    // tambah data 
    public function tambahDataBooking()
    {
        $data = [
            "id_booking" => $this->input->post('id_booking', true),
            "id_customer" => $this->input->post('id_customer', true),
            "tgl_booking" => $this->input->post('tgl_booking', true),
            "jumlah_penumpang" => $this->input->post('jumlah_penumpang', true),
            "total_tarif" => $this->input->post('total_tarif', true),
            "status_bayar" => $this->input->post('status_bayar', true),
            'wpu-key' => 'rahasia'
        ];

        $response = $this->_client->request('POST', 'Booking', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
    // Hapus data
    public function hapusDataBooking($id)
    {
        $response = $this->_client->request('DELETE', 'Booking', [
            'form_params' => [
                'id_booking' => $id,
                'wpu-key' => 'rahasia'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    // Ubah Data
    public function ubahDataBooking()
    {
        $data = [
 
            "id_customer" => $this->input->post('id_customer', true),
            "tgl_booking" => $this->input->post('tgl_booking', true),
            "jumlah_penumpang" => $this->input->post('jumlah_penumpang', true),
            "total_tarif" => $this->input->post('total_tarif', true),
            "status_bayar" => $this->input->post('status_bayar', true),
            "id_booking" => $this->input->post('id_booking', true),
  
            "wpu-key" => 'rahasia'
        ];

        $response = $this->_client->request('PUT', 'Booking', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    // Cari data
    public function cariDataBooking()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('id_booking', $keyword);
        $this->db->or_like('id_customer', $keyword);
        $this->db->or_like('tgl_booking', $keyword);
        $this->db->or_like('jumlah_penumpang', $keyword);
        $this->db->or_like('total_tarif', $keyword);
        $this->db->or_like('status_bayar', $keyword);
        return $this->db->get('Booking')->result_array();
    }
}
