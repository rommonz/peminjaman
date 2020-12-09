<?php

class Pemeliharaan extends CI_Controller{

  function __construct(){
    parent::__construct();

  }

  function formpemeliharaan(){
    $this->load->view('pemeliharaan/vi_formpemeliharaan');
  }

  
}
