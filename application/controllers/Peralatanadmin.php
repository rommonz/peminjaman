<?php

class Peralatanadmin extends CI_Controller{

  function __construct(){
    parent::__construct();
    $this->load->model('Mo_persediaan','persediaan');
  }

  function daftarpersediaan(){
    $data['daftar_persediaan'] = $this->persediaan->get_persediaan();
    $this->load->view('peralatanadmin/vi_daftarpersediaan',$data);
  }

  function addpersediaan(){
    $data['jenis_persediaan'] = $this->db->get('persediaan_jenis')->result();
    $this->load->view('peralatan/vi_addpersediaan',$data);
  }


  function update_persediaan($id_persediaan){

    //$data['persediaan'] = $this->persediaan->get_persediaan_by_id($id_persediaan);
    $sqlpersediaan = "select * from persediaan p inner join persediaan_jenis pj on pj.id_persediaan_jenis = p.id_persediaan_jenis where p.id_persediaan = ".$id_persediaan;
    //echo($sqlpersediaan);exit;
    $data['persediaan'] = $this->db->query($sqlpersediaan)->row();
    
    $sqlhistory = "select * from persediaan_history ph inner join persediaan p on p.id_persediaan = ph.id_persediaan where p.id_persediaan = ".$id_persediaan;

    $data['transaksi_history'] = $this->db->query($sqlhistory)->result();

    $sqltransaksi = "select * from persediaan_transaksi_detail ptd
                      inner join persediaan_transaksi pt on ptd.id_persediaan_transaksi = pt.id_persediaan_transaksi
                      inner join persediaan p on p.id_persediaan = ptd.id_persediaan where p.id_persediaan = ".$id_persediaan;
    $data['transaksi_permintaan'] = $this->db->query($sqltransaksi)->result();
    $this->load->view('peralatanadmin/update_persediaan',$data);
  }

  function saveupdatepersediaan(){
    //update table persediaan
    //print_r($this->input->post());exit;
    $jumlah = $this->input->post('jumlah_masuk') + $this->input->post('jumlah_persediaan');
    $updatepersediaan = array('jumlah_persediaan'=>$jumlah);
    $id_persediaan = $this->input->post('id_persediaan');
    if($this->db->update('persediaan',$updatepersediaan,array('id_persediaan'=>$id_persediaan))){
      $datahistory = array('id_persediaan'=>$this->input->post('id_persediaan'),
                      'jenis_transaksi'=>'MASUK',
                      'tgl_pembelian'=>$this->input->post('tanggal'),
                      'id_user'=>$this->session->userdata('id'),
                      'jumlah'=>$this->input->post('jumlah_masuk'),
                      'keterangan'=>$this->input->post('keterangan'),
                      'created_by'=>$this->session->userdata('nama'));
      if($this->db->insert('persediaan_history',$datahistory)){
        //kalo berhasil
        redirect('peralatanadmin/update_persediaan/'.$this->input->post('id_persediaan'));
      }else{
        echo "gagal";
      }

    }


  }

}
