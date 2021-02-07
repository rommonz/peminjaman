<?php

Class Assetadmin extends CI_Controller{

  function __construct(){
    parent::__construct();

    $this->load->model('mo_rkbmd', 'rkbmd');
  }

  public function listrkbmd(){
    $data['daftar_rkbmd'] = $this->rkbmd->get_daftar_all();

    $this->load->view('assetadmin/list_rkbmd',$data);

  }
}
