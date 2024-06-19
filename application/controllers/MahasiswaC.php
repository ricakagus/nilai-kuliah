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

    // form_validation adalah library CI untuk memvalidasi inputan yang dilakukan oleh user
    // untuk menggunakan form_validation harus dikenalkan dulu pada file autoload.php yang direktorinya pada: config/autoload.php

    $this->form_validation->set_rules('nim', 'NIM', 'required|numeric');
    $this->form_validation->set_rules('nama', 'Nama', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('layouts/header', $data);
      $this->load->view('layouts/navbar');
      $this->load->view('layouts/sidebar', $data);
      $this->load->view('mahasiswa/inputmahasiswa');
      $this->load->view('layouts/footer');
    } else {

      // mentiapkan data inputan dari view (html) disimpan pada index yg berupa array yang diberinama $data
      $data = [
        "nim" => $this->input->post('nim'),
        "nama" => $this->input->post('nama'),
        "prodi" => $this->input->post('prodi')
      ];

      // format codingan Query builder untuk menyimpan $data pada tabel mahasiwa
      $this->db->insert('tb_mahasiswa', $data);

      // setelah selesai proses simpan lalu diarahkan ke halaman index mahasiswa
      redirect('mahasiswa');
    }
  }

  public function detailMahasiswa($id)
  {
    $data['title'] = "Mahasiswa";

    // menampilkan data mahasiswa berdasarkan id dan ditampilkan satu bari data
    $data['mahasiswa'] = $this->db->get_where('tb_mahasiswa', ['id' => $id])->row_array();

    $this->form_validation->set_rules('nim', 'NIM', 'required|numeric');
    $this->form_validation->set_rules('nama', 'Nama', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('layouts/header', $data);
      $this->load->view('layouts/navbar');
      $this->load->view('layouts/sidebar', $data);
      $this->load->view('mahasiswa/detailmahasiswa', $data);
      $this->load->view('layouts/footer');
    } else {

      // mentiapkan data inputan dari view (html) disimpan pada index yg berupa array yang diberinama $data
      $data = [
        "nim" => $this->input->post('nim'),
        "nama" => $this->input->post('nama'),
        "prodi" => $this->input->post('prodi')
      ];

      // format codingan Query builder untuk mengupdate $data pada tabel mahasiwa berdasakan id tertentu
      $this->db->where('id', $id);
      $this->db->update('tb_mahasiswa', $data);

      // setelah selesai proses simpan lalu diarahkan ke halaman index mahasiswa
      redirect('mahasiswa');
    }
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
