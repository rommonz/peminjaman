<?php

class Peralatan extends CI_Controller{

  function __construct(){
    parent::__construct();

  }

  function formpengajuanalat(){
    $this->load->view('peralatan/vi_formpengajuan');
  }


}
