<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller 
{
  public function __construct()
  {
    parent::__construct();

    // Cek apakah user sudah login
    $this->cekLogin();

    // Load model
    $this->load->model('model_events');
    $this->load->model('model_loker');
  }

  public function index()
  {
    // Ambil data event dari database berdasarkan 
    // tanggal berakhir <= tanggal hari ini
    $event = $this->model_events->get_where(array(
      'tanggal_berakhir >=' => date('Y-m-d')
    ))->row();

    // Ambil data loker dari database berdasarkan 
    // tanggal berakhir <= tanggal hari ini
    $loker = $this->model_loker->get_where(array(
      'tanggal_berakhir >=' => date('Y-m-d')
    ))->row();
    
    // Data untuk page index
    $data['event'] = $event;
    $data['loker'] = $loker;
    $data['pageTitle'] = 'Dashboard';
    $data['pageContent'] = $this->load->view('dashboard/content', $data, true);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }
}