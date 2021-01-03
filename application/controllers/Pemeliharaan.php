<?php

class Pemeliharaan extends CI_Controller{

  function __construct(){
    parent::__construct();
    $this->load->model('mo_pemeliharaan', 'pemeliharaan');
  }

  function index(){
    $data['daftar_pemeliharaan'] = $this->pemeliharaan->get_list();
    $this->load->view('pemeliharaan/vi_daftarpemeliharaan',$data);
  }

  function formpemeliharaan(){
    $this->load->view('pemeliharaan/vi_formpemeliharaan');
  }

  function save(){
    $kodebarang = $this->input->post('kodebarang');
    $namabarang = $this->input->post('namabarang');
    $keterangan = $this->input->post('keterangan');

    $datainsert = array(
                  'kode_barang'=>$kodebarang,
                  'nama_barang'=>$namabarang,
                  'keterangan'=>$keterangan,
                  'created_by'=>$this->session->userdata('nama'),
                  'creator_id'=>$this->session->userdata('id')
                  );
    if($this->pemeliharaan->save($datainsert)){
      redirect('pemeliharaan');
    }else{
      redirect('pemeliharaan/formpemeliharaan');
    }
  }

    function hapus($id){
      if($this->pemeliharaan->hapus_pengajuan($id)){
        redirect('pemeliharaan');
      }else{
        echo "gagal menghapus ".$this->db->last_query();
      }
    }

    function edit($id_pemeliharaan){
      $data['pemeliharaan'] = $this->pemeliharaan->get_detail($id_pemeliharaan);
      $this->load->view('pemeliharaan/vi_editpemeliharaan',$data);
    }

    function update(){
      $kodebarang = $this->input->post('kodebarang');
      $namabarang = $this->input->post('namabarang');
      $keterangan = $this->input->post('keterangan');
      $id_pemeliharaan = $this->input->post('idpb');
      $dataupdate = array(
                    'kode_barang'=>$kodebarang,
                    'nama_barang'=>$namabarang,
                    'keterangan'=>$keterangan,
                    'modified_by'=>$this->session->userdata('nama'),
                    'modified_at'=>date('Y-m-d H:i:s')
                    );
      if($this->pemeliharaan->update($dataupdate,$id_pemeliharaan)){
        redirect('pemeliharaan');
      }else{
        echo "gagal update";
      }
    }

}
