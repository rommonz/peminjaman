<?php

class Asset extends CI_Controller{

  function __construct(){
    parent::__construct();

    $this->load->model('Mo_rkbmd','rkbmd');
  }

  function rkbmd(){
    $data['daftar_rkbmd'] = $this->rkbmd->get_daftar_by_creator($this->session->userdata('id'));
    $this->load->view('assetrkbmd/vi_daftarrkbmd',$data);
  }

  function addrkbmd(){
    $this->load->view('assetrkbmd/vi_addrkbmd');
  }

  function saverkbmd(){
    $nama_barang = $this->input->post('nama_barang');
    $spesifikasi = $this->input->post('spesifikasi');
    $jumlah_barang = $this->input->post('jumlah_barang');
    $harga_satuan = $this->input->post('harga_satuan');

    $datainsert = array('nama_barang'=>$nama_barang,
                        'spesifikasi'=>$spesifikasi,
                        'jumlah_barang'=>$jumlah_barang,
                        'harga_satuan'=>$harga_satuan,
                        'created_by'=>$this->session->userdata('nama'),
                        'creator_id'=>$this->session->userdata('id'),
                        'approval'=>'PENDING'
                        );
    $insert = $this->rkbmd->save_rkbmd($datainsert);

    if($insert){
      $this->session->set_flashdata('state','success');
      $this->session->set_flashdata('msg','DATA TERSIMPAN');
      redirect('asset/rkbmd');
    }else{
      $this->session->set_flashdata('state','danger');
      $this->session->set_flashdata('msg','GAGAL, DATA TIDAK TERSIMPAN!');
      redirect('asset/rkbmd');
    }
  }


}
