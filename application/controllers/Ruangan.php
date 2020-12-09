<?php

class Ruangan extends CI_Controller{

  function __construct(){
    parent::__construct();
    $this->load->model('mo_ruangan');
  }

  function daftarruangan(){
    $data['daftar_ruangan'] = $this->mo_ruangan->get_daftarruangan();
    $this->load->view('ruangan/vi_ruangan',$data);
  }
}
