<?php

class Profil extends CI_Controller{

  function __construct(){
    parent::__construct();

  }

  function editprofil(){
    $this->load->view('profil/vi_profil');
  }
}
