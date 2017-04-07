<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    
    // Cek apakah event sudah login
    $this->cekLogin();

    // Load model events
    $this->load->model('model_events');
  }

  public function index()
  {
    // Load library pagination
    $this->load->library('pagination');

    // Pengaturan pagination
    $config['base_url'] = base_url('events/index/');
    $config['total_rows'] = $this->model_events->get()->num_rows();
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
    $data['pageTitle'] = 'Events';
    $data['events'] = $this->model_events->get_offset($config['per_page'], $config['offset'])->result();
    $data['pageContent'] = $this->load->view('events/eventList', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }

  public function add()
  {
    // Jika form di submit jalankan blok kode ini
    if ($this->input->post('submit')) {
      
      // Mengatur validasi data nama event,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('nama', 'Nama Event', 'required');

      // Mengatur validasi data contact,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('contact', 'Contact Person', 'required');

      // Mengatur validasi data tanggal mulai,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required');

      // Mengatur validasi data tanggal berakhir,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('tanggal_berakhir', 'Tanggal Berakhir', 'required');

      // Mengatur validasi data tanggal berakhir,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

      // Mengatur pesan error validasi data
      $this->form_validation->set_message('required', '%s tidak boleh kosong!');

      // Jalankan validasi jika semuanya benar maka lanjutkan
			if ($this->form_validation->run() === TRUE) {

        $data = array(
          'nama' => $this->input->post('nama'),
          'contact' => $this->input->post('contact'),
          'tanggal_mulai' => date_format(date_create($this->input->post('tanggal_mulai')), 'Y-m-d'),
          'tanggal_berakhir' => date_format(date_create($this->input->post('tanggal_berakhir')), 'Y-m-d'),
          'keterangan' => $this->input->post('keterangan')
        );

        // Jalankan function insert pada model_events
        $query = $this->model_events->insert($data);

        // cek jika query berhasil
        if ($query) $message = array('status' => true, 'message' => 'Berhasil menambahkan event');
        else $message = array('status' => true, 'message' => 'Gagal menambahkan event');

        // simpan message sebagai session
        $this->session->set_flashdata('message', $message);

        // refresh page
        redirect('events/add', 'refresh');
			} 
    }
    
    // Data untuk page events/add
    $data['pageTitle'] = 'Tambah Data Event';
    $data['pageContent'] = $this->load->view('events/eventAdd', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }

  public function edit($id = null)
  {
    // Jika form di submit jalankan blok kode ini
    if ($this->input->post('submit')) {
      
      // Mengatur validasi data nama event,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('nama', 'Nama Event', 'required');

      // Mengatur validasi data contact,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('contact', 'Contact Person', 'required');

      // Mengatur validasi data tanggal mulai,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required');

      // Mengatur validasi data tanggal berakhir,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('tanggal_berakhir', 'Tanggal Berakhir', 'required');

      // Mengatur validasi data tanggal berakhir,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

      // Mengatur pesan error validasi data
      $this->form_validation->set_message('required', '%s tidak boleh kosong!');

      // Jalankan validasi jika semuanya benar maka lanjutkan
			if ($this->form_validation->run() === TRUE) {

        $data = array(
          'nama' => $this->input->post('nama'),
          'contact' => $this->input->post('contact'),
          'tanggal_mulai' => date_format(date_create($this->input->post('tanggal_mulai')), 'Y-m-d'),
          'tanggal_berakhir' => date_format(date_create($this->input->post('tanggal_berakhir')), 'Y-m-d'),
          'keterangan' => $this->input->post('keterangan')
        );

        // Jalankan function insert pada model_events
        $query = $this->model_events->update($id, $data);

        // cek jika query berhasil
        if ($query) $message = array('status' => true, 'message' => 'Berhasil memperbarui event');
        else $message = array('status' => true, 'message' => 'Gagal memperbarui event');

        // simpan message sebagai session
        $this->session->set_flashdata('message', $message);

        // refresh page
        redirect('events/edit/'.$id, 'refresh');
			} 
    }
    
    // Ambil data event dari database
    $event = $this->model_events->get_where(array('id' => $id))->row();
    
    // Mengubah format tanggal dari database
    $event->tanggal_mulai = date_format(date_create($event->tanggal_mulai), 'd-m-Y');
    $event->tanggal_berakhir = date_format(date_create($event->tanggal_berakhir), 'd-m-Y');

    // Jika data event tidak ada maka show 404
    if (!$event) show_404();

    // Data untuk page events/add
    $data['pageTitle'] = 'Edit Data Event';
    $data['event'] = $event;
    $data['pageContent'] = $this->load->view('events/eventEdit', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }

  public function delete($id)
  {
    // Ambil data event dari database
    $event = $this->model_events->get_where(array('id' => $id))->row();

    // Jika data event tidak ada maka show 404
    if (!$event) show_404();

    // Jalankan function delete pada model_events
    $query = $this->model_events->delete($id);

    // cek jika query berhasil
    if ($query) $message = array('status' => true, 'message' => 'Berhasil menghapus event');
    else $message = array('status' => true, 'message' => 'Gagal menghapus event');

    // simpan message sebagai session
    $this->session->set_flashdata('message', $message);

    // refresh page
    redirect('events', 'refresh');
  }
}