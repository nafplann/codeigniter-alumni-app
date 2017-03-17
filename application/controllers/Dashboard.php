<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller 
{
  public function __construct()
  {
    parent::__construct();
    $this->cekLogin();
  }

  public function index()
  {
    $data['pageTitle'] = 'Dashboard';
    $data['pageContent'] = '<h1>Ini fungsi index dari controller dashboard</h1><h1>Ini fungsi index dari controller dashboard</h1><h1>Ini fungsi index dari controller dashboard</h1>';

    $this->load->view('template/layout', $data);
  }

  public function routing_ka_ayah()
  {
    echo 'Hahaha';
  }
}