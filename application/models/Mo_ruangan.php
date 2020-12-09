<?php

class Mo_ruangan extends CI_Model{

  private $_table = 'ruangan';

  function get_daftarruangan(){

    return $this->db->get($this->_table)->result();
  }
}
