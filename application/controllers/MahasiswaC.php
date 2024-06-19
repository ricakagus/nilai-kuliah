<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MahasiswaC extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['title'] = 'Mahasiswa';
    $data['mahasiswa'] = $this->db->get('tb_mahasiswa')->result_array();

    $this->load->view('layouts/header', $data);
    $this->load->view('layouts/navbar');
    $this->load->view('layouts/sidebar', $data);
    $this->load->view('mahasiswa/mahasiswa', $data);
    $this->load->view('layouts/footer');
  }

  public function inputMahasiswa()
  {
    $data['title'] = 'Mahasiswa';

    $this->form_validation->set_rules('nim', 'NIM', 'required|numeric');
    $this->form_validation->set_rules('nama', 'Nama', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('layouts/header', $data);
      $this->load->view('layouts/navbar');
      $this->load->view('layouts/sidebar', $data);
      $this->load->view('mahasiswa/inputmahasiswa');
      $this->load->view('layouts/footer');
    } else {
      $data = [
        "nim" => $this->input->post('nim'),
        "nama" => $this->input->post('nama'),
        "prodi" => $this->input->post('prodi')
      ];

      $this->db->insert('tb_mahasiswa', $data);
      redirect('mahasiswa');
    }
  }

  public function detailMahasiswa($id)
  {
    $data['title'] = "Mahasiswa";

    $data['mahasiswa'] = $this->db->get_where('tb_mahasiswa', ['id' => $id])->row_array();

    var_dump($data['mahasiswa']);
    die;
  }

  public function updateMahasiswa($id)
  {
    echo "update data mahasiswa " . $id;
  }

  public function deleteMahasiswa($id)
  {
    echo "hapus data mahasiswa " . $id;
  }
}
