<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "libraries/format.php";
require APPPATH . "libraries/RestController.php";


use chriskacerguis\RestServer\RestController;


class Pesawat extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelPesawat', 'pesawat');
        // Membatasi Jumlah akses sesuai kebutuhan
        $this->methods['index_get']['limit'] = 200;
    }

    // public function index_get()
    // {

    //     $pesawat = $this->pesawat->get_pesawat();
    //     $this->response($pesawat, 200);
    // }

    // public function nim_get($id = 0)
    // {

    //     $pesawat = $this->pesawat->get_pesawatById($id);
    //     $this->response($pesawat, 200);
    // }

    // Menampilkan data 
    public function index_get()

    {
        $id = $this->get('id_pesawat');

        if ($id === null) {
            $pesawat= $this->pesawat->gettb_pesawat();
        } else {
            $pesawat= $this->pesawat->gettb_pesawat($id);
        }

        if ($pesawat) {
            $this->response([
                'status' => true,
                'data' => $pesawat
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
        $id = $this->delete('id_pesawat');

        if ($id == null) {
            $this->response([
                'status' => false,
                'message' => 'profide an id!'
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            if ($this->pesawat->deletetb_pesawat($id) > 0) {
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
        'id_pesawat' => $this->post('id_pesawat'),
				'tipe_pesawat' => $this->post('tipe_pesawat'),
				'jml_kursi_ekonomi' => $this->post('jml_kursi_ekonomi'),
				'jml_kursi_bisnis' => $this->post('jml_kursi_bisnis')
        ];
        if ($this->pesawat->createtb_pesawat($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new pesawat has been created.'
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
        $id = $this->put('id_pesawat');
        $data = [
        'id_pesawat' => $this->put('id_pesawat'),
				'tipe_pesawat' => $this->put('tipe_pesawat'),
				'jml_kursi_ekonomi' => $this->put('jml_kursi_ekonomi'),
				'jml_kursi_bisnis' => $this->put('jml_kursi_bisnis')
        ];
        if ($this->pesawat->updatetb_pesawat($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'data pesawat has been updated'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to update data!.'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
}
