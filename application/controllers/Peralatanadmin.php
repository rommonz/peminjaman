<?php

class Peralatanadmin extends CI_Controller{

  function __construct(){
    parent::__construct();
    $this->load->model('Mo_persediaan','persediaan');
  }

  function daftarjenispersediaan(){
    $data['jenis_persediaan'] = $this->db->get('persediaan_jenis')->result();
    $this->load->view('peralatanadmin/vi_daftarjenispersediaan', $data);
  }

  function addjenispersediaan(){
    $this->load->view('peralatanadmin/vi_addjenispersediaan');
  }

  function savejenispersediaan(){
    $data = array('jenis_persediaan'=>$this->input->post('txtjenispersediaan'),
                    'satuan'=>$this->input->post('satuan'),
                    'keterangan'=>$this->input->post('keterangan'));
    if($this->db->insert('persediaan_jenis', $data)){
      redirect('peralatanadmin/daftarjenispersediaan');
    }else{
      redirect('peralatanadmin/addjenispersediaan');
    }
  }


  function daftarpersediaan(){
    $data['daftar_persediaan'] = $this->persediaan->get_persediaan();
    $this->load->view('peralatanadmin/vi_daftarpersediaan',$data);
  }

  function addpersediaan(){
    $data['jenis_persediaan'] = $this->db->get('persediaan_jenis')->result();
    $this->load->view('peralatanadmin/vi_addpersediaan',$data);
  }

  function savepersediaan(){
    $data = array('id_persediaan_jenis'=>$this->input->post('jenis_persediaan'),
                    'nama_persediaan'=>$this->input->post('nama_persediaan'),
                     'jumlah_persediaan'=>$this->input->post('jumlah_masuk'),
                      'tanggal'=>$this->input->post('tanggal'),
                    'keterangan'=>$this->input->post('keterangan'),
                    'created_by'=>$this->session->userdata('nama'),
                    'creator_id'=>$this->session->userdata('id'));
    if($this->db->insert('persediaan',$data)){
      $id_persediaan = $this->db->insert_id();

      $datahistory = array('id_persediaan'=>$id_persediaan,
                      'jenis_transaksi'=>'MASUK',
                      'tgl_pembelian'=>$this->input->post('tanggal'),
                      'id_user'=>$this->session->userdata('id'),
                      'jumlah'=>$this->input->post('jumlah_masuk'),
                      'keterangan'=>$this->input->post('keterangan'),
                      'created_by'=>$this->session->userdata('nama'));
      if($this->db->insert('persediaan_history',$datahistory)){
        redirect('peralatanadmin/daftarpersediaan');
      }
    }else{
      redirect('peralatanadmin/addpersediaan');
    }
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

  function listpermohonan(){
    if($this->input->get('s') && $this->input->get('s') != 'ALL'){
      $status = $this->input->get('s');
      $data['transaksi'] = $this->persediaan->get_list_transaksi_admin($status);
    }else{
      $data['transaksi'] = $this->persediaan->get_list_transaksi_admin();
    }

    $this->load->view('peralatanadmin/vi_listpermohonan',$data);
  }

  function get_tabeldetail(){
    $id_transaksi = $this->input->post('id_transaksi');
    $data['transaksi'] = $this->persediaan->get_transaksi($id_transaksi);
    $data['detail'] = $this->persediaan->get_transaksi_detail($id_transaksi);
    //print_r($data['detail']);exit;
    $this->load->view('peralatanadmin/vi_detailpermohonan.php',$data);
  }

  function savejumlahpersetujuan(){

    $id = $this->input->post('id');
    $jumlah = $this->input->post('jumlah');

    $update = $this->db->update('persediaan_transaksi_detail',array('jumlah_disetujui'=>$jumlah),array('id_persediaan_transaksi_detail'=>$id));

    if($update){
      echo "SUCCESS";
    }else{
      echo "FAILED";
    }

  }

  function prosespersetujuan(){
    $id = $this->input->post('id_transaksi');
    $status = $this->input->post('status');

    //transaction here
    $this->db->trans_begin();

    //udate tabel persediaan_transaksi
    $sql = "update persediaan_transaksi set status_transaksi = '".$status."', tgl_approval = CURRENT_TIMESTAMP where id_persediaan_transaksi = '".$id."' ";
    $this->db->query($sql);

    $detail = $this->db->get_where('persediaan_transaksi_detail',array('id_persediaan_transaksi'=>$id))->result();

    foreach($detail as $d){
      $id = $d->id_persediaan;
      $jumlah = $d->jumlah_disetujui;
      $sql2 = "update persediaan set jumlah_persediaan = (jumlah_persediaan - ".$jumlah.") where id_persediaan = ".$id;

      $this->db->query($sql2);
    }

    if($this->db->trans_status() === FALSE){

      $this->db->trans_rollback();
      echo "FAILED";
    }else{
      $this->db->trans_commit();
      echo "SUCCESS";
    }

  }

  public function cetakpermohonan($id_transaksi){

    $data['transaksi'] = $this->persediaan->get_transaksi($id_transaksi);
    $data['detail'] = $this->persediaan->get_transaksi_detail($id_transaksi);

    $this->load->view('peralatan/cetak_permohonan',$data);
  }


}
