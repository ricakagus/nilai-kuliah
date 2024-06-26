<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KontraknilaiC extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['title'] = 'Kontrak Nilai';
    $data['kontrakNilai'] = $this->db->get('tbKontrakNilai')->result_array();
    $this->load->view('layouts/header', $data);
    $this->load->view('layouts/navbar');
    $this->load->view('layouts/sidebar', $data);
    $this->load->view('kontrak/kontrak', $data);
    $this->load->view('layouts/footer');
  }

  public function inputkontrak()
  {
    $data['title'] = 'Kontrak Nilai';
    $data['dataMataKuliah'] = $this->db->get('tbMataKuliah')->result_array();

    $this->form_validation->set_rules('tahunakademik', 'Tahun Akademik', 'required|numeric|max_length[5]', ['required' => 'wajib diisi', 'numeric' => 'inputan angka', 'max_length' => 'hanya 5 angka']);
    $this->form_validation->set_rules('matakuliah', 'Mata Kuliah', 'required', ['required' => 'pilih mata kuliah']);
    $this->form_validation->set_rules('kehadiran', 'Kehadiran', 'required|integer', ['required' => 'harus diisi', 'integer' => 'angka']);

    if ($this->form_validation->run() == FALSE) {

      $this->load->view('layouts/header', $data);
      $this->load->view('layouts/navbar');
      $this->load->view('layouts/sidebar', $data);
      $this->load->view('kontrak/inputKontrak', $data);
      $this->load->view('layouts/footer');
    } else {
      $kehadiran = $this->input->post('kehadiran');
      $tugas = $this->input->post('tugas');
      $uts = $this->input->post('uts');
      $uas = $this->input->post('uas');
      $totalKomponen = $kehadiran + $tugas + $uts + $uas;

      if ($totalKomponen != 100) {
        $this->session->set_flashdata(
          'warning',
          '<div class="alert alert-danger alert-dismissible mt-3"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Komponen Tidak 100% 
        </div>'
        );
        redirect('kontrak/input');
      } else {
        $data = [
          "tahunAkademik" => $this->input->post('tahunakademik', true),
          "mataKuliah" => $this->input->post('matakuliah', true),
          "kehadiran" => $kehadiran,
          "tugas" => $tugas,
          "uts" => $uts,
          "uas" => $uas
        ];

        $this->db->insert('tbKontrakNilai', $data);
        redirect('kontrak');
      };
    };
  }

  public function detailkontrak($id)
  {
    $data['title'] = 'Kontrak Nilai';
    $data['dataMataKuliah'] = $this->db->get('tbMataKuliah')->result_array();
    $data['kontrak'] = $this->db->get_where('tbKontrakNilai', ['id' => $id])->row_array();

    $this->form_validation->set_rules('tahunakademik', 'Tahun Akademik', 'required|numeric|max_length[5]', ['required' => 'wajib diisi', 'numeric' => 'inputan angka', 'max_length' => 'hanya 5 angka']);
    $this->form_validation->set_rules('matakuliah', 'Mata Kuliah', 'required', ['required' => 'pilih mata kuliah']);
    $this->form_validation->set_rules('kehadiran', 'Kehadiran', 'required|integer', ['required' => 'harus diisi', 'integer' => 'angka']);

    if ($this->form_validation->run() == FALSE) {

      $this->load->view('layouts/header', $data);
      $this->load->view('layouts/navbar');
      $this->load->view('layouts/sidebar', $data);
      $this->load->view('kontrak/detailkontrak', $data);
      $this->load->view('layouts/footer');
    } else {
      $kehadiran = $this->input->post('kehadiran');
      $tugas = $this->input->post('tugas');
      $uts = $this->input->post('uts');
      $uas = $this->input->post('uas');
      $totalKomponen = $kehadiran + $tugas + $uts + $uas;

      if ($totalKomponen != 100) {
        $this->session->set_flashdata(
          'warning',
          '<div class="alert alert-danger alert-dismissible mt-3"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Komponen Tidak 100% 
        </div>'
        );
        redirect('kontrak/detail', $id);
      } else {
        $data = [
          "tahunAkademik" => $this->input->post('tahunakademik', true),
          "mataKuliah" => $this->input->post('matakuliah', true),
          "kehadiran" => $kehadiran,
          "tugas" => $tugas,
          "uts" => $uts,
          "uas" => $uas
        ];

        $this->db->where('id', $id);
        $this->db->update('tbKontrakNilai', $data);
        redirect('kontrak');
      };
    };
  }

  public function deletekontrak($id)
  {
    $this->db->delete('tbKontrakNilai', ['id' => $id]);
    redirect('kontrak');
  }
}
