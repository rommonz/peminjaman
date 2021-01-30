<?php

class Profil extends CI_Controller{

  function __construct(){
    parent::__construct();

  }

  function editprofil(){
    $this->db->where('id',$this->session->userdata('id'));
    $data['profil'] = $this->db->get('tbl_login')->row();

    $this->load->view('profil/vi_profil',$data);
  }

  function updateprofil(){
    if($this->input->post('save')){
      $id = $this->input->post('id');
      $nama = $this->input->post('nama');
      $password = $this->input->post('password');
      $ulangipassword = $this->input->post('ulangipassword');

      if($password != $ulangipassword){
        //set flash message
        $this->session->set_flashdata('state','danger');
        $this->session->set_flashdata('msg','Password tidak sama');
        redirect('profil/editprofil');
        exit;
      }

      $data = array('password'=>$password,
                     'nama'=>$nama
                    );
      if($this->db->update('tbl_logn',$data,array('id'=>))){
        $this->session->set_flashdata('state','danger');
        $this->session->set_flashdata('msg','Password tidak sama');
        redirect('profil/editprofil');
      }

    }
  }
}
