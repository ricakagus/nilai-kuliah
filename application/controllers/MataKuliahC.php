<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MataKuliahC extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    // $this->load->library('form_validation');
    $this->load->helper('form');
    // $this->db = $this->load->database();

    // $data['title'] = 'Mata Kuliah';
  }


  public function index()
  {
    // var_dump('halaman index mata kuliah');
    // die;
    $data['title'] = 'Mata Kuliah';
    $data['matakuliah'] = $this->db->get('tbMataKuliah')->result_array();

    $this->load->view('layouts/header', $data);
    $this->load->view('layouts/navbar');
    $this->load->view('layouts/sidebar', $data);
    $this->load->view('mataKuliah/matakuliah', $data);
    $this->load->view('layouts/footer');
  }

  public function inputMK()
  {
    $data['title'] = 'Mata Kuliah';

    $this->form_validation->set_rules('kodeMataKuliah', 'Kode Mata Kuliah', 'required');
    $this->form_validation->set_rules('namaMataKuliah', 'Nama Mata Kuliah', 'required');


    if ($this->form_validation->run() == FALSE) {

      $this->load->view('layouts/header', $data);
      $this->load->view('layouts/navbar');
      $this->load->view('layouts/sidebar', $data);
      $this->load->view('mataKuliah/inputMK');
      $this->load->view('layouts/footer');
    } else {
      $sksTeori = $this->input->post('sksTeori');
      $sksPraktik = $this->input->post('sksPraktik');
      $jumlahSKS = $sksTeori + $sksPraktik;

      $data = [
        "kodeMK" => $this->input->post('kodeMataKuliah', true),
        "nama" => $this->input->post('namaMataKuliah', true),
        "sksTeori" => $this->input->post('sksTeori', true),
        "sksPraktik" => $this->input->post('sksPraktik', true),
        "totalSKS" => $jumlahSKS
      ];

      $this->db->insert('tbMataKuliah', $data);
      redirect('matakuliah');
    }
  }

  public function detailMK($id)
  {
    // echo "update MK" . $id;
    $data['title'] = 'Mata Kuliah';
    $data['matakuliah'] = $this->db->get_where('tbMataKuliah', ['id' => $id])->row_array();

    $this->form_validation->set_rules('kodeMataKuliah', 'Kode Mata Kuliah', 'required');
    $this->form_validation->set_rules('namaMataKuliah', 'Nama Mata Kuliah', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('layouts/header', $data);
      $this->load->view('layouts/navbar');
      $this->load->view('layouts/sidebar', $data);
      $this->load->view('mataKuliah/detailMK', $data);
      $this->load->view('layouts/footer');
    } else {
      $sksTeori = $this->input->post('sksTeori');
      $sksPraktik = $this->input->post('sksPraktik');
      $jumlahSKS = $sksTeori + $sksPraktik;

      $data = [
        "kodeMK" => $this->input->post('kodeMataKuliah', true),
        "nama" => $this->input->post('namaMataKuliah', true),
        "sksTeori" => $this->input->post('sksTeori', true),
        "sksPraktik" => $this->input->post('sksPraktik', true),
        "totalSKS" => $jumlahSKS
      ];

      $this->db->where('id', $id);
      $this->db->update('tbMataKuliah', $data);
      redirect('matakuliah');
    }
  }

  public function deleteMK($id)
  {
    $this->db->delete('tbMataKuliah', ['id' => $id]);
    redirect('matakuliah');
  }
}
