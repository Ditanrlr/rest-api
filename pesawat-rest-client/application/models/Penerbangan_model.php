<?php

use GuzzleHttp\Client;

class Penerbangan_model extends CI_model
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
    // menampilkan data Penerbangan
    public function getAllPenerbangan()
    {
        $response = $this->_client->request('GET', 'Penerbangan', [
            'query' => [
                'wpu-key' => 'rahasia'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    // menampilkan data berdasar Id
    public function getPenerbanganById($id)
    {

        $response = $this->_client->request('GET', 'Penerbangan', [
            // Params
            'query' => [
                'wpu-key' => 'rahasia',
                'id_penerbangan' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'][0];
    }
    // tambah data 
    public function tambahDataPenerbangan()
    {
        $data = [
            "id_penerbangan" => $this->input->post('id_penerbangan', true),
            "id_bandara" => $this->input->post('id_bandara', true),
            "id_pesawat" => $this->input->post('id_pesawat', true),
            "tgl_penerbangan" => $this->input->post('tgl_penerbangan', true),
            "asal" => $this->input->post('asal', true),
            "tujuan" => $this->input->post('tujuan', true),
            "jam_berangkat" => $this->input->post('jam_berangkat', true),
            "jam_tiba" => $this->input->post('jam_tiba', true),
            "bandara_tujuan" => $this->input->post('bandara_tujuan', true),
            'wpu-key' => 'rahasia'
        ];

        $response = $this->_client->request('POST', 'Penerbangan', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
    // Hapus data
    public function hapusDataPenerbangan($id)
    {
        $response = $this->_client->request('DELETE', 'Penerbangan', [
            'form_params' => [
                'id_penerbangan' => $id,
                'wpu-key' => 'rahasia'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    // Ubah Data
    public function ubahDataPenerbangan()
    {
        $data = [
            
            "id_bandara" => $this->input->post('id_bandara', true),
            "id_pesawat" => $this->input->post('id_pesawat', true),
            "tgl_penerbangan" => $this->input->post('tgl_penerbangan', true),
            "asal" => $this->input->post('asal', true),
            "tujuan" => $this->input->post('tujuan', true),
            "jam_berangkat" => $this->input->post('jam_berangkat', true),
            "jam_tiba" => $this->input->post('jam_tiba', true),
            "bandara_tujuan" => $this->input->post('bandara_tujuan', true),
            "id_penerbangan" => $this->input->post('id_penerbangan', true),
  
            "wpu-key" => 'rahasia'
        ];

        $response = $this->_client->request('PUT', 'Penerbangan', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    // Cari data
    public function cariDataPenerbangan()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('id_penerbangan', $keyword);
        $this->db->or_like('id_bandara', $keyword);
        $this->db->or_like('id_pesawat', $keyword);
        $this->db->or_like('tgl_penerbangan', $keyword);
        $this->db->or_like('asal', $keyword);
        $this->db->or_like('tujuan', $keyword);
        $this->db->or_like('jam_berangkat', $keyword);
        $this->db->or_like('jam_tiba', $keyword);
        $this->db->or_like('bandara_tujuan', $keyword);
        return $this->db->get('Penerbangan')->result_array();
    }
}
