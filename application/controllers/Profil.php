<?php

class Profil extends CI_Controller{

  function __construct(){
    parent::__construct();

  }

  function editprofil(){
    // echo "<pre/>";
    //print_r($this->session->userdata());

    $this->load->view('profil/vi_profil');
  }

  function updateprofil(){
    if($this->input->post('save'));
  }
}
