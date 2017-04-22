<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Loker extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    
    // Cek apakah user sudah login
    $this->cekLogin();

    // Load model loker
    $this->load->model('model_loker');
  }

  public function index()
  {
    // Load library pagination
    $this->load->library('pagination');

    // Pengaturan pagination
    $config['base_url'] = base_url('loker/index/');
    $config['total_rows'] = $this->model_loker->get()->num_rows();
    $config['per_page'] = 5;
    $config['offset'] = $this->uri->segment(3);

    // Styling pagination
    $config['first_link'] = false;
    $config['last_link'] = false;

    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';

    $config['num_tag_open'] = '<li class="waves-effect">';
    $config['num_tag_close'] = '</li>';

    $config['prev_tag_open'] = '<li class="waves-effect">';
    $config['prev_tag_close'] = '</li>';

    $config['next_tag_open'] = '<li class="waves-effect">';
    $config['next_tag_close'] = '</li>';

    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';

    $this->pagination->initialize($config);

    // Data untuk page index
    $data['pageTitle'] = 'Lowongan Kerja';
    $data['loker'] = $this->model_loker->get_offset($config['per_page'], $config['offset'])->result();
    $data['pageContent'] = $this->load->view('loker/lokerList', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }

  public function add()
  {
    // Jika form di submit jalankan blok kode ini
    if ($this->input->post('submit')) {
      
      // Mengatur validasi data nama perusahaan,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required');

      // Mengatur validasi data contact,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('contact', 'Contact Person', 'required');

      // Mengatur validasi data tanggal berakhir,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('tanggal_berakhir', 'Tanggal Berakhir', 'required');

      // Mengatur validasi data posisi,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('posisi', 'Posisi', 'required');

      // Mengatur validasi data deskripsi,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

      // Mengatur pesan error validasi data
      $this->form_validation->set_message('required', '%s tidak boleh kosong!');

      // Jalankan validasi jika semuanya benar maka lanjutkan
			if ($this->form_validation->run() === TRUE) {

        $data = array(
          'nama_perusahaan' => $this->input->post('nama_perusahaan'),
          'contact' => $this->input->post('contact'),
          'tanggal_berakhir' => date_format(date_create($this->input->post('tanggal_berakhir')), 'Y-m-d'),
          'posisi' => $this->input->post('posisi'),
          'deskripsi' => $this->input->post('deskripsi'),
          'username' => $this->session->userdata('username')
        );

        // Jalankan function insert pada model_loker
        $query = $this->model_loker->insert($data);

        // cek jika query berhasil
        if ($query) $message = array('status' => true, 'message' => 'Berhasil menambahkan lowongan kerja');
        else $message = array('status' => false, 'message' => 'Gagal menambahkan lowongan kerja');

        // simpan message sebagai session
        $this->session->set_flashdata('message', $message);

        // refresh page
        redirect('loker/add', 'refresh');
			} 
    }
    
    // Data untuk page loker/add
    $data['pageTitle'] = 'Tambah Data Lowongan Kerja';
    $data['pageContent'] = $this->load->view('loker/lokerAdd', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }

  public function detail($id = null)
  {
    // Ambil data loker dari database
    $loker = $this->model_loker->get_where(array('id' => $id))->row();
    
    // Jika data loker tidak ada maka show 404
    if (!$loker) show_404();

    // Data untuk page loker/detail
    $data['pageTitle'] = 'Detail Lowongan Kerja';
    $data['loker'] = $loker;
    $data['pageContent'] = $this->load->view('loker/lokerDetail', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }

  public function edit($id = null)
  {
    // Jika form di submit jalankan blok kode ini
    if ($this->input->post('submit')) {
      
      // Mengatur validasi data nama perusahaan,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required');

      // Mengatur validasi data contact,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('contact', 'Contact Person', 'required');

      // Mengatur validasi data tanggal berakhir,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('tanggal_berakhir', 'Tanggal Berakhir', 'required');

      // Mengatur validasi data posisi,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('posisi', 'Posisi', 'required');

      // Mengatur validasi data deskripsi,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

      // Mengatur pesan error validasi data
      $this->form_validation->set_message('required', '%s tidak boleh kosong!');

      // Jalankan validasi jika semuanya benar maka lanjutkan
			if ($this->form_validation->run() === TRUE) {

        $data = array(
          'nama_perusahaan' => $this->input->post('nama_perusahaan'),
          'contact' => $this->input->post('contact'),
          'tanggal_berakhir' => date_format(date_create($this->input->post('tanggal_berakhir')), 'Y-m-d'),
          'posisi' => $this->input->post('posisi'),
          'deskripsi' => $this->input->post('deskripsi')
        );

        // Jalankan function update pada model_loker
        $query = $this->model_loker->update($id, $data);

        // cek jika query berhasil
        if ($query) $message = array('status' => true, 'message' => 'Berhasil memperbarui lowongan kerja');
        else $message = array('status' => true, 'message' => 'Gagal memperbarui lowongan kerja');

        // simpan message sebagai session
        $this->session->set_flashdata('message', $message);

        // refresh page
        redirect('loker/edit/'.$id, 'refresh');
			} 
    }
    
    // Ambil data loker dari database
    $loker = $this->model_loker->get_where(array('id' => $id))->row();
    
    // Mengubah format tanggal dari database
    $loker->tanggal_berakhir = date_format(date_create($loker->tanggal_berakhir), 'd-m-Y');

    // Jika data loker tidak ada maka show 404
    if (!$loker) show_404();

    // Jika data loker diedit oleh user lain maka show 404
    if ($loker->username !== $this->session->userdata('username')) show_404();

    // Data untuk page loker/add
    $data['pageTitle'] = 'Edit Data Lowongan Kerja';
    $data['loker'] = $loker;
    $data['pageContent'] = $this->load->view('loker/lokerEdit', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }

  public function delete($id)
  {
    // Ambil data loker dari database
    $loker = $this->model_loker->get_where(array('id' => $id))->row();

    // Jika data loker tidak ada maka show 404
    if (!$loker) show_404();

    // Jika data loker didelete oleh user lain maka show 404
    if ($loker->username !== $this->session->userdata('username')) show_404();

    // Jalankan function delete pada model_loker
    $query = $this->model_loker->delete($id);

    // cek jika query berhasil
    if ($query) $message = array('status' => true, 'message' => 'Berhasil menghapus lowongan kerja');
    else $message = array('status' => true, 'message' => 'Gagal menghapus lowongan kerja');

    // simpan message sebagai session
    $this->session->set_flashdata('message', $message);

    // refresh page
    redirect('loker', 'refresh');
  }
}