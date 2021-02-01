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
    //print_r($this->input->post());exit;
      $id = $this->input->post('id');
      $nama = $this->input->post('nama');
      $password = $this->input->post('password');
      $ulangipassword = $this->input->post('ulangipassword');

      if($password <> $ulangipassword){
        //set flash message
        $this->session->set_flashdata('state','danger');
        $this->session->set_flashdata('msg','Password tidak sama');
        print_r($this->input->post());exit;
        //redirect('profil/editprofil');

      }

      $data = array('password'=>$password,
                     'nama'=>$nama
                    );

      if($this->db->update('tbl_login',$data,array('id'=>$id))){
        $this->session->set_flashdata('state','success');
        $this->session->set_flashdata('msg','Update profil berhasil');

        redirect('profil/editprofil');
      }else{
        echo $this->db->last_query();
      }

  }
}
