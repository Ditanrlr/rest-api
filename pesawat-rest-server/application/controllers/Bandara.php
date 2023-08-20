<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "libraries/format.php";
require APPPATH . "libraries/RestController.php";


use chriskacerguis\RestServer\RestController;


class Bandara extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelBandara', 'bandara');
        // Membatasi Jumlah akses sesuai kebutuhan
        $this->methods['index_get']['limit'] = 200;
    }

    // public function index_get()
    // {

    //     $bandara = $this->bandara->get_pesawat();
    //     $this->response($bandara, 200);
    // }

    // public function nim_get($id = 0)
    // {

    //     $bandara = $this->bandara->get_pesawatById($id);
    //     $this->response($bandara, 200);
    // }

    // Menampilkan data 
    public function index_get()

    {
        $id = $this->get('id_bandara');

        if ($id === null) {
            $bandara= $this->bandara->gettb_bandara();
        } else {
            $bandara= $this->bandara->gettb_bandara($id);
        }

        if ($bandara) {
            $this->response([
                'status' => true,
                'data' => $bandara
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
        $id = $this->delete('id_bandara');

        if ($id == null) {
            $this->response([
                'status' => false,
                'message' => 'profide an id!'
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            if ($this->bandara->deletetb_bandara($id) > 0) {
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
        'id_bandara' => $this->post('id_bandara'),
				'kode' => $this->post('kode'),
				'nama' => $this->post('nama'),
				'kota' => $this->post('kota')
        ];
        if ($this->bandara->createtb_bandara($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new bandara has been created.'
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
        $id = $this->put('id_bandara');
        $data = [
        'id_bandara' => $this->put('id_bandara'),
				'kode' => $this->put('kode'),
				'nama' => $this->put('nama'),
				'kota' => $this->put('kota')
        ];
        if ($this->bandara->updatetb_bandara($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'data bandara has been updated'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to update data!.'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
}
