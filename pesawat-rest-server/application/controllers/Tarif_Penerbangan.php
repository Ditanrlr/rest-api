<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "libraries/format.php";
require APPPATH . "libraries/RestController.php";


use chriskacerguis\RestServer\RestController;


class Tarif_Penerbangan extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelTarifPenerbangan', 'Tarif_Penerbangan');
        // Membatasi Jumlah akses sesuai kebutuhan
        $this->methods['index_get']['limit'] = 200;
    }

    // public function index_get()
    // {

    //     $Tarif_Penerbangan = $this->Tarif_Penerbangan->get_pesawat();
    //     $this->response($Tarif_Penerbangan, 200);
    // }

    // public function nim_get($id = 0)
    // {

    //     $Tarif_Penerbangan = $this->Tarif_Penerbangan->get_pesawatById($id);
    //     $this->response($Tarif_Penerbangan, 200);
    // }

    // Menampilkan data 
    public function index_get()

    {
        $id = $this->get('id_tarif');

        if ($id === null) {
            $Tarif_Penerbangan= $this->Tarif_Penerbangan->gettb_tarif_penerbangan();
        } else {
            $Tarif_Penerbangan= $this->Tarif_Penerbangan->gettb_tarif_penerbangan($id);
        }

        if ($Tarif_Penerbangan) {
            $this->response([
                'status' => true,
                'data' => $Tarif_Penerbangan
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
        $id = $this->delete('id_tarif');

        if ($id == null) {
            $this->response([
                'status' => false,
                'message' => 'profide an id!'
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            if ($this->Tarif_Penerbangan->deletetb_tarif_penerbangan($id) > 0) {
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
        'id_tarif' => $this->post('id_tarif'),
				'id_penerbangan' => $this->post('id_penerbangan'),
				'kelas' => $this->post('kelas'),
				'tarif' => $this->post('tarif')
        ];
        if ($this->Tarif_Penerbangan->createtb_tarif_penerbangan($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new Tarif_Penerbangan has been created.'
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
        $id = $this->put('id_tarif');
        $data = [
                'id_tarif' => $this->put('id_tarif'),
				'id_penerbangan' => $this->put('id_penerbangan'),
				'kelas' => $this->put('kelas'),
				'tarif' => $this->put('tarif')
        ];
        if ($this->Tarif_Penerbangan->updatetb_tarif_penerbangan($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'data Tarif_Penerbangan has been updated'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to update data!.'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
}
