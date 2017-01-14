<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$data['content'] = $this->load->view('dashboard/content', null, true);
		$this->render($data);
	}

	public function render($data)
	{
		$this->load->view('layout/layout', $data);
	}
}
