<?php


class Mamin extends CI_Controller{

  var $judul = 'MAMIN';
  function __construct(){
    parent::__construct();

    $this->load->model('mo_mamin','mamin');
  }

  function listmamin(){

    if(isset($_GET['k'])){
      $id_pagu = $_GET['k'];
    }else{
      $id_pagu = '';
    }
    //$data['kegiatan'] = $this->mamin->get_pagu_by_id($id_pagu);
    $data['daftar_mamin'] = $this->mamin->get_daftar_by_id($this->session->userdata($id_pagu)) ;

    $data['daftar_kegiatan'] = $this->mamin->get_kegiatan_by_uk($this->session->userdata['id_unit_kerja']);
    $this->load->view('mamin/list_mamin',$data);
  }

  function pengajuan(){
    $k = $this->input->get('k');
    $data['kegiatan'] = $this->mamin->get_pagu_by_id($k);
    //print_r($data['kegiatan']);exit;
    $this->load->view('mamin/vi_pengajuan_mamin',$data);
  }

  function pengajuansave(){

    $datainsert = array('id_pagu'=>$this->input->post('id_pagu'),
                        'nama_kegiatan'=>$this->input->post('nama_kegiatan'),
                        'lokasi_kegiatan'=>$this->input->post('lokasi_kegiatan'),
                        'peserta'=>$this->input->post('peserta_kegiatan'),
                        'jumlah_peserta'=>$this->input->post('jumlah_peserta'),
                        'nilai_pengajuan'=>$this->input->post('nilai_pengajuan'),
                        'created_by'=>$this->session->userdata('nama'),
                        'creator_id'=>$this->session->userdata('id'),
                        'keterangan'=>$this->input->post('keterangan'),
                        'approval'=>'PENDING'
                      );
      if($this->db->insert('mamin_pengajuan',$datainsert)){
        $this->session->set_flashdata('state','success');
        $this->session->set_flashdata('msg','DATA TERSIMPAN');
        redirect('mamin/listmamin');
      }else{
        $this->session->set_flashdata('state','danger');
        $this->session->set_flashdata('msg','GAGAL MENYIMPAN');
        redirect('mamin/pengajuan');
      }

  }

  function editmamin(){

  }

  function maminupdate(){

  }
}
