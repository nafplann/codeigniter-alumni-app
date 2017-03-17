<?php
  class Model_users extends CI_Model {

    public $table = 'users';

    public function cekAkun($username, $password)
    {
      // Get data user yang mempunyai username == $username dan active == 1
			$this->db->where('username', $username);
			$this->db->where('active', '1');
			
      // Jalankan query
      $query = $this->db->get($this->table)->row();
      
      // Jika query gagal atau tidak menemukan username yang sesuai 
      // maka return false
			if (!$query) return false;
			
      // Ambil data password dari database
      $hash = $query->password;
      
      // Jika $hash tidak sama dengan $password maka return false
      if (!password_verify($password, $hash)) return false;

      // Jika username dan password benar maka return data user
      return $query;        
    }

  }