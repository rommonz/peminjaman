<?php


class Mamin extends CI_Controller{

  function __construct(){
    parent::__construct();

    $this->load->model('mo_mamin','mamin');
  }

  function listmamin(){

    //$data['daftar_mamin'] = $this->mamin->get_daftar_by_creator($this->session->userdata('id'));
    $this->load->view('mamin/list_mamin');
  }

  function addmamin(){
    $this->load->view('mamin/addmamin');
  }

  function maminsave(){

  }

  function editmamin(){

  }

  function maminupdate{

  }
}
