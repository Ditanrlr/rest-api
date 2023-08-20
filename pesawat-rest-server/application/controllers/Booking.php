<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "libraries/format.php";
require APPPATH . "libraries/RestController.php";


use chriskacerguis\RestServer\RestController;


class Booking extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelBooking', 'Booking');
        // Membatasi Jumlah akses sesuai kebutuhan
        $this->methods['index_get']['limit'] = 200;
    }

    // public function index_get()
    // {

    //     $Booking = $this->Booking->get_pesawat();
    //     $this->response($Booking, 200);
    // }

    // public function nim_get($id = 0)
    // {

    //     $Booking = $this->Booking->get_pesawatById($id);
    //     $this->response($Booking, 200);
    // }

    // Menampilkan data 
    public function index_get()

    {
        $id = $this->get('id_booking');

        if ($id === null) {
            $Booking= $this->Booking->gettb_booking();
        } else {
            $Booking= $this->Booking->gettb_booking($id);
        }

        if ($Booking) {
            $this->response([
                'status' => true,
                'data' => $Booking
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
        $id = $this->delete('id_booking');

        if ($id == null) {
            $this->response([
                'status' => false,
                'message' => 'profide an id!'
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            if ($this->Booking->deletetb_booking($id) > 0) {
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
        'id_booking' => $this->post('id_booking'),
				'id_customer' => $this->post('id_customer'),
				'tgl_booking' => $this->post('tgl_booking'),
                'jumlah_penumpang' => $this->post('jumlah_penumpang'),
                'total_tarif' => $this->post('total_tarif'),
                'status_bayar' => $this->post('status_bayar')
        ];
        if ($this->Booking->createtb_booking($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new Booking has been created.'
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
        $id = $this->put('id_booking');
        $data = [
            'id_booking' => $this->put('id_booking'),
				'id_customer' => $this->put('id_customer'),
				'tgl_booking' => $this->put('tgl_booking'),
                'jumlah_penumpang' => $this->put('jumlah_penumpang'),
                'total_tarif' => $this->put('total_tarif'),
                'status_bayar' => $this->put('status_bayar')
        ];
        if ($this->Booking->updatetb_booking($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'data Booking has been updated'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to update data!.'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
}
