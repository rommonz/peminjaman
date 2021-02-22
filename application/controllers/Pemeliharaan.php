<?php

class Pemeliharaan extends CI_Controller{

  function __construct(){
    parent::__construct();
    $this->load->model('mo_pemeliharaan', 'pemeliharaan');
  }

  function menejpemeliharaan(){

    $data['daftar_pemeliharaan'] = $this->pemeliharaan->get_list_all($this->input->get('s'));
    $data['pemeliharaan_status'] = $this->db->get('pemeliharaan_status')->result();
    $data['page_title'] = "Pemeliharaan Asset";
    $this->load->view('pemeliharaan/vi_menejpemeliharaan',$data);
  }

  function cetaktandaterima($id){
    //insert ke log pemeliharaan
    $created_at = date('Y-m-d H:i:s');
    $this->insert_log($id, 'PROCESS');
    $this->db->update('pemeliharaan',array('approval'=>'PROCESS'),array('id_pemeliharaan'=>$id));
    $data['detail'] = $this->pemeliharaan->get_detail($id);
    $data['created_at'] = $created_at;
    $this->load->view('pemeliharaan/cetak_tanda_terima.php',$data);
  }

  function insert_log($id, $status){
    $insert =  $this->db->insert('pemeliharaan_log',array('id_pemeliharaan'=>$id,
                                                'status'=>$status,
                                                'created_by'=>$this->session->userdata('nama'),
                                                'created_at'=>date('Y-m-d H:i:s'),
                                                'creator_id'=>$this->session->userdata('id')));
      return $insert;
  }

  function proses(){
		$id = $this->input->post('id');
		$status = $this->input->post('status');

		$sql = "update pemeliharaan set approval = '".$status."' where id_pemeliharaan = '".$id."' ";
		if($this->db->query($sql)){
      $this->session->set_flashdata('state','success');
      $this->session->set_flashdata('msg','Perubahan berhasil disimpan..');
			echo "SUCCESS";
		}else{
      $this->session->set_flashdata('state','danger');
      $this->session->set_flashdata('msg','Perubahan gagal disimpan..');
			echo "FAILED";
		}

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
