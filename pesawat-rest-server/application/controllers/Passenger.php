<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "libraries/format.php";
require APPPATH . "libraries/RestController.php";


use chriskacerguis\RestServer\RestController;


class Passenger extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelPassenger', 'Passenger');
        // Membatasi Jumlah akses sesuai kebutuhan
        $this->methods['index_get']['limit'] = 200;
    }

    // public function index_get()
    // {

    //     $Passenger = $this->Passenger->get_pesawat();
    //     $this->response($Passenger, 200);
    // }

    // public function nim_get($id = 0)
    // {

    //     $Passenger = $this->Passenger->get_pesawatById($id);
    //     $this->response($Passenger, 200);
    // }

    // Menampilkan data 
    public function index_get()

    {
        $id = $this->get('id_passenger');

        if ($id === null) {
            $Passenger= $this->Passenger->gettb_passenger();
        } else {
            $Passenger= $this->Passenger->gettb_passenger($id);
        }

        if ($Passenger) {
            $this->response([
                'status' => true,
                'data' => $Passenger
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
        $id = $this->delete('id_passenger');

        if ($id == null) {
            $this->response([
                'status' => false,
                'message' => 'profide an id!'
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            if ($this->Passenger->deletetb_passenger($id) > 0) {
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
        'id_passenger' => $this->post('id_passenger'),
				'nama' => $this->post('nama'),
				'no_kursi' => $this->post('no_kursi'),
				'id_detail' => $this->post('id_detail')
        ];
        if ($this->Passenger->createtb_passenger($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new Passenger has been created.'
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
        $id = $this->put('id_passenger');
        $data = [
            'id_passenger' => $this->put('id_passenger'),
            'nama' => $this->put('nama'),
            'no_kursi' => $this->put('no_kursi'),
            'id_detail' => $this->put('id_detail')
        ];
        if ($this->Passenger->updatetb_passenger($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'data Passenger has been updated'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to update data!.'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
}
