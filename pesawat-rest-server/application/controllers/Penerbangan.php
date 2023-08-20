<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "libraries/format.php";
require APPPATH . "libraries/RestController.php";


use chriskacerguis\RestServer\RestController;


class Penerbangan extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelPenerbangan', 'Penerbangan');
        // Membatasi Jumlah akses sesuai kebutuhan
        $this->methods['index_get']['limit'] = 200;
    }

    // public function index_get()
    // {

    //     $Penerbangan = $this->Penerbangan->get_pesawat();
    //     $this->response($Penerbangan, 200);
    // }

    // public function nim_get($id = 0)
    // {

    //     $Penerbangan = $this->Penerbangan->get_pesawatById($id);
    //     $this->response($Penerbangan, 200);
    // }

    // Menampilkan data 
    public function index_get()

    {
        $id = $this->get('id_penerbangan');

        if ($id === null) {
            $Penerbangan= $this->Penerbangan->gettb_penerbangan();
        } else {
            $Penerbangan= $this->Penerbangan->gettb_penerbangan($id);
        }

        if ($Penerbangan) {
            $this->response([
                'status' => true,
                'data' => $Penerbangan
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], RestController::HTTP_NOT_FOUND);
        }
    }

    // Menghapus data 
    public function index_delete()
    {
        $id = $this->delete('id_penerbangan');

        if ($id == null) {
            $this->response([
                'status' => false,
                'message' => 'profide an id!'
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            if ($this->Penerbangan->deletetb_penerbangan($id) > 0) {
                // ok
                $this->response([
                    'status' => true,
                    'data' => $id,
                    'message' => 'deleted.'
                ], RestController::HTTP_OK);
            } else {
                // id not found
                $this->response([
                    'status' => false,
                    'message' => 'id not found!'
                ], RestController::HTTP_BAD_REQUEST);
            }
        }
    }

    // Menambah data
    public function index_post()
    {
        $data = [
        'id_penerbangan' => $this->post('id_penerbangan'),
				'id_bandara' => $this->post('id_bandara'),
				'id_pesawat' => $this->post('id_pesawat'),
                'tgl_penerbangan' => $this->post('tgl_penerbangan'),
                'asal' => $this->post('asal'),
                'tujuan' => $this->post('tujuan'),
                'jam_berangkat' => $this->post('jam_berangkat'),
                'jam_tiba' => $this->post('jam_tiba'),
				'bandara_tujuan' => $this->post('bandara_tujuan')
        ];
        if ($this->Penerbangan->createtb_penerbangan($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new Penerbangan has been created.'
            ], RestController::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to create new data!.'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    // Update data
    public function index_put()
    {
        $id = $this->put('id_penerbangan');
        $data = [
            'id_penerbangan' => $this->put('id_penerbangan'),
            'id_bandara' => $this->put('id_bandara'),
            'id_pesawat' => $this->put('id_pesawat'),
            'tgl_penerbangan' => $this->put('tgl_penerbangan'),
            'asal' => $this->put('asal'),
            'tujuan' => $this->put('tujuan'),
            'jam_berangkat' => $this->put('jam_berangkat'),
            'jam_tiba' => $this->put('jam_tiba'),
            'bandara_tujuan' => $this->put('bandara_tujuan')
        ];
        if ($this->Penerbangan->updatetb_penerbangan($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'data Penerbangan has been updated'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to update data!.'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
}
