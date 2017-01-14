<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_Vacancy extends CI_Controller {

	public function index()
	{
		$data['content'] = $this->load->view('job_vacancy/content', null, true);
		$this->render($data);
	}

	public function render($data)
	{
		$this->load->view('layout/layout', $data);
	}
}
