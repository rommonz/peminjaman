<?php

class Peralatan extends CI_Controller{

  function __construct(){
    parent::__construct();
    $this->load->model('Mo_persediaan','persediaan');
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




  function lop(){
    $data['daftar_persediaan'] = $this->persediaan->get_persediaan();

    $this->load->view('peralatan/vi_lop',$data);
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
      $datatransaksi = array('');
      redirect('peralatanadmin/daftarpersediaan');
    }else{
      redirect('peralatanadmin/addpersediaan');
    }
  }

/*
  function editpersediaan($id_persediaan){
    $data['persediaan'] = $this->persediaan->get_persediaan_by_id($id_persediaan);
    $data['history_transaksi'] = $this->persediaan->get_history_by_id($id_persediaan);
    $this->load->view('peralatan/vi_editpersediaan');
  }
*/
  /*
  * transaksi dari persediaan
  */
  function transaksi(){
    $data['transaksi'] = $this->persediaan->get_transaksi();
    $this->load->view('peralatan/vi_transaksi',$data);
  }

  function transaksi_detail($id_transaksi = NULL){
    if($this->input->post('keterangan') !== NULL){
      $datainsert = array('jenis_transaksi'=>'KELUAR',
                            'id_user'=>$this->session->userdata('id'),
                          'keterangan'=>$this->input->post('keterangan'),
                           'status_transaksi'=>'DRAFT');
      if($this->db->insert('persediaan_transaksi',$datainsert)){
        $id_insert = $this->db->insert_id();
        $data['transaksi'] = $this->db->get_where('persediaan_transaksi',array('id_persediaan_transaksi'=>$id_insert));
        redirect('peralatan/transaksi_detail/'.$id_insert);
      }
    }
    if($id_transaksi){
      $sqltransaksi = "select * from persediaan_transaksi pt inner join tbl_login l on l.id = pt.id_user where pt.id_persediaan_transaksi = ".$id_transaksi;
      $data['transaksi'] = $this->db->query($sqltransaksi)->row();
      //$data['transaksi'] = $this->db->get_where('persediaan_transaksi',array('id_persediaan_transaksi'=>$id_transaksi))->row();
      $data['id_transaksi'] = $id_transaksi;
      $sql = "select * from persediaan_transaksi_detail ptd
              inner join persediaan p on p.id_persediaan = ptd.id_persediaan
              inner join persediaan_jenis pj on pj.id_persediaan_jenis = p.id_persediaan_jenis
              where ptd.id_persediaan_transaksi = ".$id_transaksi;
      $data['detail'] = $this->db->query($sql)->result();

      $sqlpersediaan = "select * from persediaan p inner join persediaan_jenis pj on pj.id_persediaan_jenis = p.id_persediaan_jenis";
      $data['persediaan'] = $this->db->query($sqlpersediaan)->result();

      $this->load->view('peralatan/vi_transaksi_detail',$data);
    }else{
      redirect('peralatan/transaksi');
    }
  }

  public  function transaksi_detail_add(){

      $datainsert = array('id_persediaan_transaksi'=>$this->input->post('id_transaksi'),
                            'id_persediaan'=>$this->input->post('id_persediaan'),
                            'jumlah_permintaan'=>$this->input->post('jumlah_permintaan')
                          );
      if($this->db->insert('persediaan_transaksi_detail',$datainsert)){
        // next set flash session
        redirect('peralatan/transaksi_detail/'.$this->input->post('id_transaksi'));
      }else{
        redirect('peralatan/transaksi_detail/'.$this->input->post('id_transaksi'));
      }
      $data['jenis_persediaan'] = $this->db->get('persediaan_jenis')->result();

    }

    public function transaksi_detail_delete(){
      $id_transaksi_detail = $this->input->post('id_transaksi_detail');

      if($this->db->delete('persediaan_transaksi_detail', array('id_persediaan_transaksi_detail'=>$id_transaksi_detail))){
        echo "SUCCESS";
      }else{
        echo "FAILED";
      }

    }

    public function transaksi_ajukan(){
      $dataupdate = array('status_transaksi'=>'PENDING');
      $id_persediaan_transaksi = $this->input->post('id_persediaan_transaksi');
      if($this->db->update('persediaan_transaksi',$dataupdate,array('id_persediaan_transaksi'=>$id_persediaan_transaksi))){
        echo "SUCCESS";
      }else{
        echo "FAILED";
      }

    }

}
