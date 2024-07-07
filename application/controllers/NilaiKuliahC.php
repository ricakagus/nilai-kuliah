<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NilaiKuliahC extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('form');
  }


  public function index()
  {
    $data['title'] = 'Nilai Kuliah';
    // ambil data jumlah data nilai mahasiswa per mata kuliah
    $queryNilai = "SELECT count(nim) as jumlah, kodeMK, tahunAkademik, matakuliah, avg(nilaiAkhir) as rata from tbNilaiAkhir GROUP BY tahunAkademik, kodeMK, matakuliah";

    // menapilkan data yang dipanggil olej $queryNilai agar dapat ditampilkan pada view
    $data['dataNilai'] = $this->db->query($queryNilai)->result_array();

    $this->load->view('layouts/header', $data);
    $this->load->view('layouts/navbar');
    $this->load->view('layouts/sidebar', $data);
    $this->load->view('nilai/nilai');
    $this->load->view('layouts/footer');
  }

  public function inputnilai()
  {
    $data['title'] = 'Nilai Kuliah';

    // menampilkan data tahun akademik dari tbKontrakNilai dan memastikan data yg sama muncul hanya satu kali
    $queryTA = "SELECT DISTINCT tahunakademik FROM tbKontrakNilai";
    $data['tahunakademik'] = $this->db->query($queryTA)->result_array();


    // menyiapkan selurh data dari tabel mata kjuliah dan mahasiswa
    $data['matakuliah'] = $this->db->get('tbMataKuliah')->result_array();
    $data['mahasiswa'] = $this->db->get('tb_mahasiswa')->result_array();

    $this->form_validation->set_rules('tahunakademik', 'Tahun Akademik', 'required|numeric');
    $this->form_validation->set_rules('matakuliah', 'Mata Kuliah', 'required');
    $this->form_validation->set_rules('mahasiswa', 'Mahasiswa', 'required');
    $this->form_validation->set_rules('kehadiran', 'Nilai Kehadiran', 'required|numeric');
    $this->form_validation->set_rules('tugas', 'Nilai Tugas', 'required|numeric');
    $this->form_validation->set_rules('uts', 'Nilai UTS', 'required|numeric');
    $this->form_validation->set_rules('uas', 'Nilai UAS', 'required|numeric');

    if ($this->form_validation->run() == false) {
      $this->load->view('layouts/header', $data);
      $this->load->view('layouts/navbar');
      $this->load->view('layouts/sidebar', $data);
      $this->load->view('nilai/inputnilai', $data);
      $this->load->view('layouts/footer');
    } else {

      // mengambil data kontrak nilai berdasarkan mata kuliah dan tahun akademik
      $kontrakNilai = $this->db->get_where('tbKontrakNilai', [
        'matakuliah' => $this->input->post('matakuliah'), 'tahunAkademik' => $this->input->post('tahunakademik')
      ])->row_array();


      // mengambil data matakuliah berdasarkan pencarian nama mata kuliah
      $queryMK = $this->db->get_where('tbMataKuliah', ['nama' => $this->input->post('matakuliah')])->row_array();


      // mengambil nama mahasiswa dari inputan combobox pilihan mahasiswa
      $namaMHS = $this->db->get_where('tb_mahasiswa', ['nim' => $this->input->post('mahasiswa')])->row_array();



      if ($kontrakNilai == null) {
        echo "kontrak nilai belum ada";
      } else {
        // ambil data kontrak kuliah berdasarkaan mata kuliah yang dipilih
        $kKehadiran = $kontrakNilai['kehadiran'] / 100;
        $kTugas = $kontrakNilai['tugas'] / 100;
        $kUTS = $kontrakNilai['UTS'] / 100;
        $kUAS = $kontrakNilai['UAS'] / 100;
      }

      // ambil data nilai yang diinput user
      $nKehadiran = $this->input->post('kehadiran');
      $nTugas = $this->input->post('tugas');
      $nUTS = $this->input->post('uts');
      $nUAS = $this->input->post('uas');

      // rumus perhitungan nilai akhir mata kuliah
      $nilaiAkhir = ($nKehadiran * $kKehadiran) + ($nTugas * $kTugas) + ($nUTS * $kUTS) + ($nUAS * $kUAS);

      if ($nilaiAkhir >= 80 && $nilaiAkhir <= 100) {
        $nilaiHuruf = "A";
      } elseif ($nilaiAkhir >= 70 && $nilaiAkhir < 80) {
        $nilaiHuruf = "B";
      } elseif ($nilaiAkhir >= 60 && $nilaiAkhir < 70) {
        $nilaiHuruf = "C";
      } elseif ($nilaiAkhir >= 50 && $nilaiAkhir < 60) {
        $nilaiHuruf = "D";
      } elseif ($nilaiAkhir < 50) {
        $nilaiHuruf = "E";
      } else {
        $nilaiHuruf = "-";
      }

      // pengelompokan data untuk persiapan insert ke tabel
      $data = [
        "tahunAkademik" => $this->input->post('tahunakademik', true),
        "kodeMK" => $queryMK['kodeMK'],
        "mataKuliah" => $this->input->post('matakuliah', true),
        "nim" => $this->input->post('mahasiswa'),
        "nama" => $namaMHS['nama'],
        "nilaikehadiran" => $nKehadiran,
        "nilaiTugas" => $nTugas,
        "nilaiUTS" => $nUTS,
        "nilaiUAS" => $nUAS,
        "nilaiAkhir" => $nilaiAkhir,
        "nilaiHuruf" => $nilaiHuruf

      ];

      // perintah insert data ke tabel
      $this->db->insert('tbNilaiAkhir', $data);

      // mengarah ke route: nilai
      redirect('nilai');
    }
  }

  public function detailnilai($kodeMK)
  {
    $data['title'] = 'Nilai Kuliah';

    // memanggil data mata kuliah dari tabel matakuliah berdasarkan kodeMK
    $data['matkul'] = $this->db->get_where('tbMataKuliah', ['kodeMK' => $kodeMK])->row_array();

    // memangil data nilai matakuliah dari tabel nilaiakhir berdasarkan kode mata kuliah
    $data['nilaiMK'] = $this->db->get_where('tbNilaiAkhir', [
      'kodeMK' => $kodeMK
    ])->result_array();

    $this->load->view('layouts/header', $data);
    $this->load->view('layouts/navbar');
    $this->load->view('layouts/sidebar', $data);
    $this->load->view('nilai/detailNilaiMK', $data);
    $this->load->view('layouts/footer');
  }

  public function editnilai($id)
  {
    $data['title'] = 'Nilai Kuliah';

    // memanggil data nilai matakuliah bedasarka id 
    $data['nilaiAkhir'] = $this->db->get_where('tbNilaiAkhir', ['id' => $id])->row_array();

    $this->form_validation->set_rules('kehadiran', 'N.Kehadiran', 'required|numeric');
    $this->form_validation->set_rules('tugas', 'N.Tugas', 'required|numeric');
    $this->form_validation->set_rules('uts', 'N.UTS', 'required|numeric');
    $this->form_validation->set_rules('uas', 'N.UAS', 'required|numeric');

    if ($this->form_validation->run() == false) {
      $this->load->view('layouts/header', $data);
      $this->load->view('layouts/navbar');
      $this->load->view('layouts/sidebar', $data);
      $this->load->view('nilai/editNilaiMHS', $data);
      $this->load->view('layouts/footer');
    } else {

      // memindahkan hasil pemangillan query kedalam variabel nilaiAkhir
      $nilaiAkhir = $data['nilaiAkhir'];

      // memanggil data kontraknilai berdasarkan data tahun akademik dan mata kuliah
      $kontrakNilai = $this->db->get_where('tbKontrakNilai', [
        'mataKuliah' => $nilaiAkhir['mataKuliah'],
        'tahunAkademik' => $nilaiAkhir['tahunAkademik']
      ])->row_array();

      if ($kontrakNilai == null) {
        echo "kontrak nilai belum ada";
      } else {
        // ambil data kontrak kuliah berdasarkaan mata kuliah yang dipilih
        $kKehadiran = $kontrakNilai['kehadiran'] / 100;
        $kTugas = $kontrakNilai['tugas'] / 100;
        $kUTS = $kontrakNilai['UTS'] / 100;
        $kUAS = $kontrakNilai['UAS'] / 100;
      }


      // memindahkan value dari inputan kedalam variabel yang disiapkan
      $nKehadiran = $this->input->post('kehadiran');
      $nTugas = $this->input->post('tugas');
      $nUTS = $this->input->post('uts');
      $nUAS = $this->input->post('uas');

      // rumus akumuliasi nilai akhir dengan kontraknilai
      $nilaiAkhir = ($nKehadiran * $kKehadiran) + ($nTugas * $kTugas) + ($nUTS * $kUTS) + ($nUAS * $kUAS);


      // penentuan nilai huruf berdasarkan nilai akhir
      if ($nilaiAkhir >= 80 && $nilaiAkhir <= 100) {
        $nilaiHuruf = "A";
      } elseif ($nilaiAkhir >= 70 && $nilaiAkhir < 80) {
        $nilaiHuruf = "B";
      } elseif ($nilaiAkhir >= 60 && $nilaiAkhir < 70) {
        $nilaiHuruf = "C";
      } elseif ($nilaiAkhir >= 50 && $nilaiAkhir < 60) {
        $nilaiHuruf = "D";
      } elseif ($nilaiAkhir < 50) {
        $nilaiHuruf = "E";
      } else {
        $nilaiHuruf = "-";
      }

      // pengumpulan data yang akan di ubah
      $data = [
        "nilaikehadiran" => $nKehadiran,
        "nilaiTugas" => $nTugas,
        "nilaiUTS" => $nUTS,
        "nilaiUAS" => $nUAS,
        "nilaiAkhir" => $nilaiAkhir,
        "nilaiHuruf" => $nilaiHuruf
      ];

      // perintah update data berdasarkan kriteria tertentuy dalam hal ini berdasarkan id
      $this->db->where('id', $id);
      $this->db->update('tbNilaiAkhir', $data);


      // persiapan kembali ke halaman sebelumnya
      $data['nilaiAkhir'] = $this->db->get_where('tbNilaiAkhir', ['id' => $id])->row_array();
      $nilaiAkhir = $data['nilaiAkhir'];
      redirect('nilai/detail/' . $nilaiAkhir['kodeMK']);
    }
  }


  public function deletenilai($id)
  {
    $data['title'] = 'Nilai Kuliah';

    // menyiapkan kode mata kuliah berdasarkan $id
    $query = $this->db->get_where('tbNilaiAkhir', ['id' => $id])->row_array();
    $kodeMK = $query['kodeMK'];


    // perintah hapus data nilai berdasarkan variable $id
    $this->db->delete('tbNilaiAkhir', ['id' => $id]);


    // persiapan kembali ke halaman sebelumnya
    $data['nilaiAkhir'] = $this->db->get_where('tbNilaiAkhir', ['kodeMK' => $kodeMK])->row_array();
    $nilaiAkhir = $data['nilaiAkhir'];
    redirect('nilai/detail/' . $nilaiAkhir['kodeMK']);
  }
}
