<?php
  class Model_alumni extends CI_Model {

    public function getAlumni()
    {
        $table = 'alumni';
        $query = $this->db->get($table);
        return $query;
    }

  }