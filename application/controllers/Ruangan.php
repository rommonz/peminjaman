<?php

class Ruangan extends CI_Controller{

  function __construct(){
    parent::__construct();
    $this->load->model('mo_ruangan');
  }

  function daftarruangan(){
    $data['daftar_ruangan'] = $this->mo_ruangan->get_daftarruangan();
    $this->load->view('ruangan/vi_ruangan',$data);
  }

  function add(){
    $this->load->view('ruangan/vi_addruangan');
  }

  function save(){
    if($this->input->post('save')){
      $data = array('kode_ruangan'=>$this->input->post('kr'),
                    'nama_ruangan'=>$this->input->post('nr'),
                    'kapasitas'=>$this->input->post('kapasitas'),
                    'keterangan'=>$this->input->post('keterangan')
                  );
      if($this->mo_ruangan->simpan_ruangan($data)){
        //set flasdata berhasil
        redirect('ruangan/daftarruangan','refresh');
      }else{
        //set flashdata gagal{
        redirect('ruangan/add');
      }

    }else{
      redirect('ruangan/add','refresh');
    }
  }

  function hapus($id){
    $del = $this->mo_ruangan->delete_ruangan($id);
    /*
    if($del){
        $this->session->set_flashdata('inpo',array('status'=>'SUCCESS','msg'=>'Data Berhasil dihapus'));
    }else{
      $this->session->set_flashdata('inpo',array('status'=>'FAILED','msg'=>'Data Gagal dihapus'));
    }
    */
    redirect('ruangan/daftarruangan');
  }

  function edit($id){
    $data['ruangan'] = $this->mo_ruangan->get_ruangan($id);
    $this->load->view('ruangan/vi_editruangan',$data);
  }

  function update(){
    if($this->input->post('update')){
      $id = $this->input->post('id_ruangan');
      $data = array('kode_ruangan'=>$this->input->post('kr'),
                    'nama_ruangan'=>$this->input->post('nr'),
                    'kapasitas'=>$this->input->post('kapasitas'),
                    'keterangan'=>$this->input->post('keterangan')
                  );
      if($this->mo_ruangan->update_ruangan($id,$data)){
        //set flasdata success
        redirect('ruangan/daftarruangan');
      }else{
        //set failed
        redirect('ruangan/daftarruangan');
      }
    }else{
      redirect('ruangan/daftarruangan','refresh');
    }
  }
}
