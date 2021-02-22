<?php

class Maminadmin extends CI_Controller{

  function __construct(){
    parent::__construct();

    $this->load->model('Mo_mamin','mamin');
    $this->judul = 'MAMIN';
  }

  function daftar_pengajuan(){
    $data['daftar_pengajuan'] = $this->mamin->admin_get_pengajuan();
    $this->load->view('maminadmin/vi_daftar_pengajuan',$data);
  }

  function proses_pengajuan(){
    $data['pengajuan'] = $this->mamin->admin_get_pengajuan_by_id($this->input->post('id_pengajuan'));
    $this->load->view('maminadmin/vi_proses_pengajuan',$data);
  }
}
