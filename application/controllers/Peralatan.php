<?php

class Peralatan extends CI_Controller{

  function __construct(){
    parent::__construct();

  }

  function daftarjenispersediaan(){
    $data['jenis_persediaan'] = $this->db->get('persediaan_jenis')->result();
    $this->load->view('peralatan/vi_daftarjenispersediaan', $data);
  }

  function addjenispersediaan(){
    $this->load->view('peralatan/vi_addjenispersediaan');
  }

  function savejenispersediaan(){
    $data = array('jenis_persediaan'=>$this->input->post('txtjenispersediaan'),
                    'satuan'=>$this->input->post('satuan'),
                    'keterangan'=>$this->input->post('keterangan'));
    if($this->db->insert('persediaan_jenis', $data)){
      redirect('peralatan/daftarjenispersediaan');
    }else{
      redirect('peralatan/addjenispersediaan');
    }
  }

  function formpengajuanalat(){
    $this->load->view('peralatan/vi_formpengajuan');
  }

  function daftarpersediaan(){
    $data['daftar_persediaan'] = $this->db->get('persediaan')->result();
    $this->load->view('peralatan/vi_daftarpersediaan',$data);
  }

  function addpersediaan(){
    $data['jenis_persediaan'] = $this->db->get('persediaan_jenis')->result();
    $this->load->view('peralatan/vi_addpersediaan',$data);
  }

  function savepersediaan(){
    $data = array('id_persediaan_jenis'=>$this->input->post('jenis_persediaan'),
                    'nama_persediaan'=>$this->input->post('nama_persediaan'),
                     'jumlah_masuk'=>$this->input->post('jumlah_masuk'),
                      'tanggal'=>$this->input->post('tanggal'),
                    'keterangan'=>$this->input->post('keterangan'),
                    'created_by'=>$this->session->userdata('nama'),
                    'creator_id'=>$this->session->userdata('id'));
    if($this->db->insert('persediaan',$data)){
      redirect('peralatan/daftarpersediaan');
    }else{
      redirect('peralatan/addpersediaan');
    }
  }


}
