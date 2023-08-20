<?php

use GuzzleHttp\Client;

class Customer_model extends CI_model
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
    // menampilkan data Customer
    public function getAllCustomer()
    {
        $response = $this->_client->request('GET', 'Customer', [
            'query' => [
                'wpu-key' => 'rahasia'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    // menampilkan data berdasar Id
    public function getCustomerById($id)
    {

        $response = $this->_client->request('GET', 'Customer', [
            // Params
            'query' => [
                'wpu-key' => 'rahasia',
                'id_customer' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'][0];
    }
    // tambah data 
    public function tambahDataCustomer()
    {
        $data = [
            "id_customer" => $this->input->post('id_customer', true),
            "nama" => $this->input->post('nama', true),
            "email" => $this->input->post('email', true),
            "kota" => $this->input->post('kota', true),
            "negara" => $this->input->post('negara', true),
            'wpu-key' => 'rahasia'
        ];

        $response = $this->_client->request('POST', 'Customer', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
    // Hapus data
    public function hapusDataCustomer($id)
    {
        $response = $this->_client->request('DELETE', 'Customer', [
            'form_params' => [
                'id_customer' => $id,
                'wpu-key' => 'rahasia'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    // Ubah Data
    public function ubahDataCustomer()
    {
        $data = [
           
            "nama" => $this->input->post('nama', true),
            "email" => $this->input->post('email', true),
            "kota" => $this->input->post('kota', true),
            "negara" => $this->input->post('negara', true),
            "id_customer" => $this->input->post('id_customer', true),
            "wpu-key" => 'rahasia'
        ];

        $response = $this->_client->request('PUT', 'Customer', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    // Cari data
    public function cariDataCustomer()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('id_customer', $keyword);
        $this->db->or_like('kode', $keyword);
        $this->db->or_like('nama', $keyword);
        $this->db->or_like('kota', $keyword);
        return $this->db->get('Customer')->result_array();
    }
}
