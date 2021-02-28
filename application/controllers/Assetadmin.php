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

  function proses(){
		$id = $this->input->post('id');
		$status = $this->input->post('status');


		if($this->rkbmd->update_status($status, $id)){
      $this->session->set_flashdata('state','success');
      $this->session->set_flashdata('msg','Perubahan berhasil disimpan..');
			echo "SUCCESS";
		}else{
      $this->session->set_flashdata('state','danger');
      $this->session->set_flashdata('msg','Perubahan gagal disimpan..');
			echo "FAILED";
		}

	}


}
