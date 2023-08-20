<?php

use GuzzleHttp\Client;

class Bandara_model extends CI_model
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
    // menampilkan data bandara
    public function getAllbandara()
    {
        $response = $this->_client->request('GET', 'bandara', [
            'query' => [
                'wpu-key' => 'rahasia'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    // menampilkan data berdasar Id
    public function getbandaraById($id)
    {

        $response = $this->_client->request('GET', 'bandara', [
            // Params
            'query' => [
                'wpu-key' => 'rahasia',
                'id_bandara' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'][0];
    }
    // tambah data 
    public function tambahDatabandara()
    {
        $data = [
            "id_bandara" => $this->input->post('id_bandara', true),
            "kode" => $this->input->post('kode', true),
            "nama" => $this->input->post('nama', true),
            "kota" => $this->input->post('kota', true),
            'wpu-key' => 'rahasia'
        ];

        $response = $this->_client->request('POST', 'bandara', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
    // Hapus data
    public function hapusDatabandara($id)
    {
        $response = $this->_client->request('DELETE', 'bandara', [
            'form_params' => [
                'id_bandara' => $id,
                'wpu-key' => 'rahasia'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    // Ubah Data
    public function ubahDatabandara()
    {
        $data = [
            "kode" => $this->input->post('kode', true),
            "nama" => $this->input->post('nama', true),
            "kota" => $this->input->post('kota', true),
            "id_bandara" => $this->input->post('id_bandara', true),
            "wpu-key" => 'rahasia'
        ];

        $response = $this->_client->request('PUT', 'bandara', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    // Cari data
    public function cariDatabandara()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('id_bandara', $keyword);
        $this->db->or_like('kode', $keyword);
        $this->db->or_like('nama', $keyword);
        $this->db->or_like('kota', $keyword);
        return $this->db->get('bandara')->result_array();
    }
}
