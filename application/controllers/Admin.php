<?php

class Admin extends CI_Controller{

	function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
			redirect(site_url("Login/masuk")); //jika tidak login dan diback dari browser akan tetap pada vi_login
		}
	}

	function index(){
		$this->load->view('Vi_home');
	}

  public function pengguna(){
    $this->load->model('mo_login');
    $data['daftar_pengguna'] = $this->mo_login->get_pengguna();
    $this->load->view('admin/vi_pengguna',$data);
  }

  public function addpengguna(){
    $this->load->view('admin/vi_addpengguna');
  }

  function penggunasave(){
    if($this->input->post('save')){
        $this->mo_barang->simpan();
        redirect('admin/pengguna','refresh');
    }else{
      redirect('admin/addpengguna','refresh');
    }
  }

  public function editpengguna(){
    $this->load->view('admin/vi_editpengguna');
  }


}
