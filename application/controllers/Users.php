<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->cekLogin();
  }

  public function index()
  {
    $data['pageTitle'] = 'Users';
    $data['pageContent'] = '<h2>Daftar User</h2>';

    $this->load->view('template/layout', $data);
  }
}