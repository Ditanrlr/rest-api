<?php

use GuzzleHttp\Client;

class Pesawat_model extends CI_model
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
    // menampilkan data pesawat
    public function getAllpesawat()
    {
        $response = $this->_client->request('GET', 'pesawat', [
            'query' => [
                'wpu-key' => 'rahasia'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    // menampilkan data berdasar Id
    public function getpesawatById($id)
    {

        $response = $this->_client->request('GET', 'pesawat', [
            // Params
            'query' => [
                'wpu-key' => 'rahasia',
                'id_pesawat' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'][0];
    }
    // tambah data 
    public function tambahDatapesawat()
    {
        $data = [
            "id_pesawat" => $this->input->post('id_pesawat', true),
            "tipe_pesawat" => $this->input->post('tipe_pesawat', true),
            "jml_kursi_ekonomi" => $this->input->post('jml_kursi_ekonomi', true),
            "jml_kursi_bisnis" => $this->input->post('jml_kursi_bisnis', true),
            'wpu-key' => 'rahasia'
        ];

        $response = $this->_client->request('POST', 'pesawat', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
    // Hapus data
    public function hapusDatapesawat($id)
    {
        $response = $this->_client->request('DELETE', 'pesawat', [
            'form_params' => [
                'id_pesawat' => $id,
                'wpu-key' => 'rahasia'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    // Ubah Data
    public function ubahDatapesawat()
    {
        $data = [
            "tipe_pesawat" => $this->input->post('tipe_pesawat', true),
            "jml_kursi_ekonomi" => $this->input->post('jml_kursi_ekonomi', true),
            "jml_kursi_bisnis" => $this->input->post('jml_kursi_bisnis', true),
            "id_pesawat" => $this->input->post('id_pesawat', true),
  
            "wpu-key" => 'rahasia'
        ];

        $response = $this->_client->request('PUT', 'pesawat', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    // Cari data
    public function cariDatapesawat()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('id_pesawat', $keyword);
        $this->db->or_like('tipe_pesawat', $keyword);
        $this->db->or_like('jml_kursi_ekonomi', $keyword);
        $this->db->or_like('jml_kursi_bisnis', $keyword);
        return $this->db->get('pesawat')->result_array();
    }
}
