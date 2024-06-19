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
    echo "halaman index kontrak kuliah";
  }

  public function inputkontrak()
  {
    echo "halaman input kotrak kuliah baru";
  }

  public function detailkontrak($id)
  {
    echo "halaman update kontrak kuliah $id";
  }

  public function deletekontrak($id)
  {
    echo "perintah hapus data kontrak $id"
  }
}
