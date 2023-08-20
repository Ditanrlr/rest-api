<?php

use GuzzleHttp\Client;

class Passenger_model extends CI_model
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
    // menampilkan data Passenger
    public function getAllPassenger()
    {
        $response = $this->_client->request('GET', 'Passenger', [
            'query' => [
                'wpu-key' => 'rahasia'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    // menampilkan data berdasar Id
    public function getPassengerById($id)
    {

        $response = $this->_client->request('GET', 'Passenger', [
            // Params
            'query' => [
                'wpu-key' => 'rahasia',
                'id_passenger' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'][0];
    }
    // tambah data 
    public function tambahDataPassenger()
    {
        $data = [
            "id_passenger" => $this->input->post('id_passenger', true),
            "nama" => $this->input->post('nama', true),
            "no_kursi" => $this->input->post('no_kursi', true),
            "id_detail" => $this->input->post('id_detail', true),
            'wpu-key' => 'rahasia'
        ];

        $response = $this->_client->request('POST', 'Passenger', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
    // Hapus data
    public function hapusDataPassenger($id)
    {
        $response = $this->_client->request('DELETE', 'Passenger', [
            'form_params' => [
                'id_passenger' => $id,
                'wpu-key' => 'rahasia'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    // Ubah Data
    public function ubahDataPassenger()
    {
        $data = [  
            "nama" => $this->input->post('nama', true),
            "no_kursi" => $this->input->post('no_kursi', true),
            "id_detail" => $this->input->post('id_detail', true),
            "id_passenger" => $this->input->post('id_passenger', true),
            "wpu-key" => 'rahasia'
        ];

        $response = $this->_client->request('PUT', 'Passenger', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    // Cari data
    public function cariDataPassenger()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('id_passenger', $keyword);
        $this->db->or_like('nama', $keyword);
        $this->db->or_like('no_kursi', $keyword);
        $this->db->or_like('id_detail', $keyword);
        return $this->db->get('Passenger')->result_array();
    }
}
