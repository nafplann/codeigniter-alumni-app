<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    
    // Cek apakah user sudah login
    $this->cekLogin();

    // Load model users
    $this->load->model('model_users');
  }

  public function index()
  {
    // Jika form profile di submit jalankan blok kode ini
    if ($this->input->post('submit-information')) {
      
      // Jika avatar diganti jalankan blok kode ini
      if (!empty($_FILES['avatar']['name'])) {
        // Konfigurasi library upload codeigniter
        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2000;
        $config['file_name'] = $this->session->userdata('username').'_'.date('YmdHis');

        // Load library upload
        $this->load->library('upload', $config);
        
        // Jika terdapat error pada proses upload maka exit
        if (!$this->upload->do_upload('avatar')) {
            exit($this->upload->display_errors());
        }

        $data['avatar'] = $this->upload->data()['file_name'];
      }

      // Mengatur validasi data nama,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('nama', 'Nama', 'required');

      // Mengatur validasi data alamat,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('alamat', 'Alamat', 'required');

      // Mengatur validasi data telepon,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('telp', 'Telepon', 'required');

      // Mengatur pesan error validasi data
      $this->form_validation->set_message('required', '%s tidak boleh kosong!');

      // Jalankan validasi jika semuanya benar maka lanjutkan
			if ($this->form_validation->run() === TRUE) {

        $data['nama'] = $this->input->post('nama');
        $data['alamat'] = $this->input->post('alamat');
        $data['telp'] = $this->input->post('telp');

        // Ambil user ID dari session
        $userId = $this->session->userdata('id');

        // Jalankan function update pada model_users
        $query = $this->model_users->update($userId, $data);

        // cek jika query berhasil
        if ($query) {

          // Set success message
          $message = array('status' => true, 'message' => 'Berhasil memperbarui profile');
          
          // Update session baru
          $this->session->set_userdata($data);

        } else {

          // Set error message
          $message = array('status' => false, 'message' => 'Gagal memperbarui profile');

        }

        // simpan message sebagai session
        $this->session->set_flashdata('message_profile', $message);

        // refresh page
        redirect('profile', 'refresh');
			} 
    }

    // Jika form password di submit jalankan blok kode ini
    if ($this->input->post('submit-password')) {

      // Mengatur validasi data password_lama,
      // # required = tidak boleh kosong
      // # callback_cekPasswordLama = menjalankan function cekAkun()
      $this->form_validation->set_rules('password_lama', 'Password Lama', 'required|callback_cekPasswordLama');

      // Mengatur validasi data password_baru,
      // # required = tidak boleh kosong
      // # min_length[5] = password_baru harus terdiri dari minimal 5 karakter
      $this->form_validation->set_rules('password_baru', 'Password Baru', 'required|min_length[5]');

      // Mengatur validasi data konfirmasi_password,
      // # required = tidak boleh kosong
      // # matches = nilai konfirmasi_password harus sama dengan password_baru
      $this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'required|matches[password_baru]');

      // Mengatur pesan error validasi data
      $this->form_validation->set_message('required', '%s tidak boleh kosong!');
      $this->form_validation->set_message('min_length', '{field} minimal {param} karakter.');
      $this->form_validation->set_message('matches', '{field} tidak sama dengan {param}.');

      // Jalankan validasi jika semuanya benar maka lanjutkan
			if ($this->form_validation->run() === TRUE) {

        $data = array(
          'password' => password_hash($this->input->post('konfirmasi_password'), PASSWORD_DEFAULT)
        );

        // Ambil user ID
        $userId = $this->session->userdata('id');

        // Jalankan function update pada model_users
        $query = $this->model_users->update($userId, $data);

        // cek jika query berhasil
        if ($query) {

          // Logout user
          redirect('auth/logout');

        } else {

          // Set error message
          $message = array('status' => false, 'message' => 'Gagal memperbarui profile');

        }

        // simpan message sebagai session
        $this->session->set_flashdata('message_profile', $message);

        // refresh page
        redirect('profile', 'refresh');
			}

    }

    // Data untuk page profile
    $data['pageTitle'] = 'Profile';
    $data['pageContent'] = $this->load->view('profile/profile', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }

  public function cekPasswordLama()
  {
    // Ambil userId dari session
    $userId = $this->session->userdata('id');
    
    // Ambil data password_lama dari POST
    $password = $this->input->post('password_lama');

    // Jalankan function cekPasswordLama pada model_users
    $query = $this->model_users->cekPasswordLama($userId, $password);

    // Jika query gagal maka return false
    if (!$query) {
      
      // Mengatur pesan error validasi data
      $this->form_validation->set_message('cekPasswordLama', 'Password lama tidak sesuai!');
      return false;
    }

    return true;
  }

}