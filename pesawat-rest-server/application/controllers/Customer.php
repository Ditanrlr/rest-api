<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "libraries/format.php";
require APPPATH . "libraries/RestController.php";


use chriskacerguis\RestServer\RestController;


class Customer extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelCustomer', 'Customer');
        // Membatasi Jumlah akses sesuai kebutuhan
        $this->methods['index_get']['limit'] = 200;
    }

    // public function index_get()
    // {

    //     $Customer = $this->Customer->get_pesawat();
    //     $this->response($Customer, 200);
    // }

    // public function nim_get($id = 0)
    // {

    //     $Customer = $this->Customer->get_pesawatById($id);
    //     $this->response($Customer, 200);
    // }

    // Menampilkan data 
    public function index_get()

    {
        $id = $this->get('id_customer');

        if ($id === null) {
            $Customer= $this->Customer->gettb_customer();
        } else {
            $Customer= $this->Customer->gettb_customer($id);
        }

        if ($Customer) {
            $this->response([
                'status' => true,
                'data' => $Customer
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
        $id = $this->delete('id_customer');

        if ($id == null) {
            $this->response([
                'status' => false,
                'message' => 'profide an id!'
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            if ($this->Customer->deletetb_customer($id) > 0) {
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
        'id_customer' => $this->post('id_customer'),
				'nama' => $this->post('nama'),
				'email' => $this->post('email'),
				'kota' => $this->post('kota'),
                'negara' => $this->post('negara')
        ];
        if ($this->Customer->createtb_customer($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new Customer has been created.'
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
        $id = $this->put('id_customer');
        $data = [
            'id_customer' => $this->put('id_customer'),
            'nama' => $this->put('nama'),
            'email' => $this->put('email'),
            'kota' => $this->put('kota'),
            'negara' => $this->put('negara')
        ];
        if ($this->Customer->updatetb_customer($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'data Customer has been updated'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to update data!.'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
}
