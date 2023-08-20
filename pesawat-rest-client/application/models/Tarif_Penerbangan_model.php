<?php

use GuzzleHttp\Client;

class Tarif_Penerbangan_model extends CI_model
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
    // menampilkan data Tarif_Penerbangan
    public function getAllTarif_Penerbangan()
    {
        $response = $this->_client->request('GET', 'Tarif_Penerbangan', [
            'query' => [
                'wpu-key' => 'rahasia'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    // menampilkan data berdasar Id
    public function getTarif_PenerbanganById($id)
    {

        $response = $this->_client->request('GET', 'Tarif_Penerbangan', [
            // Params
            'query' => [
                'wpu-key' => 'rahasia',
                'id_tarif' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'][0];
    }
    // tambah data 
    public function tambahDataTarif_Penerbangan()
    {
        $data = [
            "id_tarif" => $this->input->post('id_tarif', true),
            "id_penerbangan" => $this->input->post('id_penerbangan', true),
            "kelas" => $this->input->post('kelas', true),
            "tarif" => $this->input->post('tarif', true),
            'wpu-key' => 'rahasia'
        ];

        $response = $this->_client->request('POST', 'Tarif_Penerbangan', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
    // Hapus data
    public function hapusDataTarif_Penerbangan($id)
    {
        $response = $this->_client->request('DELETE', 'Tarif_Penerbangan', [
            'form_params' => [
                'id_tarif' => $id,
                'wpu-key' => 'rahasia'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    // Ubah Data
    public function ubahDataTarif_Penerbangan()
    {
        $data = [
            
            "id_penerbangan" => $this->input->post('id_penerbangan', true),
            "kelas" => $this->input->post('kelas', true),
            "tarif" => $this->input->post('tarif', true),
            "id_tarif" => $this->input->post('id_tarif', true),
  
            "wpu-key" => 'rahasia'
        ];

        $response = $this->_client->request('PUT', 'Tarif_Penerbangan', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    // Cari data
    public function cariDataTarif_Penerbangan()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('id_tarif', $keyword);
        $this->db->or_like('id_penerbangan', $keyword);
        $this->db->or_like('kelas', $keyword);
        $this->db->or_like('tarif', $keyword);
        return $this->db->get('Tarif_Penerbangan')->result_array();
    }
}
