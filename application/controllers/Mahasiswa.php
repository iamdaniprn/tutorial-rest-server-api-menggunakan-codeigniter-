<?php
use chriskacerguis\RestServer\RestController; // wajib dicantumkan

// import library dari REST_Controller
require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';


class Mahasiswa extends RestController{

  // construct
  public function __construct()
  {
      parent::__construct();
      $this->load->model('M_mahasiswa');
  }

  // method index untuk menampilkan semua data mahasiswa menggunakan method get
  public function index_get()
  {
      $response = $this->M_mahasiswa->all_mahasiswa();
      $this->response( $response, 200 );
  }

  // method index untuk menampilkan semua data mahasiswa menggunakan method get
  public function detail_get($id)
  {
      $response = $this->M_mahasiswa->detail_mahasiswa($id);
      $this->response( $response, 200 );
  }

  // untuk menambah mahasiswa menaggunakan method post
  public function tambah_post()
  {
      $response = $this->M_mahasiswa->tambah_mahasiswa(
          $this->post('nama'),
          $this->post('jenis_kelamin'),
          $this->post('no_hp')
        );
      $this->response($response, 200);
  }

  // update data mahasiswa menggunakan method put
  public function update_put()
  {
      $response = $this->M_mahasiswa->update_mahasiswa(
          $this->put('id_mahasiswa'),
          $this->put('nama'),
          $this->put('jenis_kelamin'),
          $this->put('no_hp')
      );
      $this->response($response, 200);
  }

  // hapus data mahasiswa menggunakan method hapus
  public function hapus_delete()
  {
      $response = $this->M_mahasiswa->hapus_mahasiswa(
          $this->delete('id_mahasiswa')
      );
      $this->response($response, 200);
    }
}
?>