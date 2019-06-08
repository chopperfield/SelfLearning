<!-- Controller Buat Endpoints -->

<?php 
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Mahasiswa extends REST_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Mahasiswa_Model','mhs'); //mhs alias

        $this->methods['index_get']['limit'] = 100;
        $this->methods['index_delete']['limit'] = 100;

    }



    //index_get -> karena library, request Method
    public function index_get(){
        
        //artinya cek di request method ada key id (params) apa tidak.
        $id = $this->get('id');

        if($id === null){
            $mahasiswa = $this ->mhs->getMahasiswa();        
        }else{
            $mahasiswa = $this ->mhs->getMahasiswa($id);        
        }

        //json_encode, tidak dipakai karena pakai contoh, pakai response


        if($mahasiswa){
               // Set the response and exit
               $this->response([
                'status' => True,
                'data' => $mahasiswa
            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code    
        }else{
               // Set the response and exit
               $this->response([
                'status' => FALSE,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function index_delete(){

        $id = $this->delete('id');
        if($id === null){
            $this->response([
                'status' => FALSE,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404) being the HTTP response code
        }else{
            //artinya ada mahasiswa yang terhapus
            if($this->mhs->deleteMahasiswa($id) > 0){
                //ok
                $this->response([
                    'status' => True, 
                    'id' => $id,
                    'message' => 'deleted'
                ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code   
            }
            else{
                //id not found] $this->response([
                    $this->response([
                        'status' => FALSE,
                        'message' => 'id not found'
                    ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }
    }

    public function index_post(){
        $data = [
            'nrp'=> $this ->post('nrp'),
            'nama'=> $this ->post('nama'),
            'email'=> $this ->post('email'),
            'jurusan'=> $this ->post('jurusan')
        ];

        if($this->mhs->createMahasiswa($data) > 0){
            $this->response([
                'status' => True, 
                'message' => 'new mahasiswa has been created'
            ], REST_Controller::HTTP_CREATED); // NOT_FOUND (404) being the HTTP response code 
        }else{
               //id not found] $this->response([
                $this->response([
                    'status' => FALSE,
                    'message' => 'failed to create new data mahasiswa'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function index_put(){
        $id = $this->put('id');
        $data = [
            'nrp'=> $this ->put('nrp'),
            'nama'=> $this ->put('nama'),
            'email'=> $this ->put('email'),
            'jurusan'=> $this ->put('jurusan')
        ];

        if($this->mhs->updateMahasiswa($data, $id) > 0){
            $this->response([
                'status' => True, 
                'id' => $id,
                'message' => 'mahasiswa has been updated'
            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code 
        }else{
               //id not found] $this->response([
                $this->response([
                    'status' => FALSE,
                    'message' => 'failed to update data mahasiswa'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }
}