<?php

class Mo_mamin extends CI_Model{

  function get_daftar_by_creator($creator_id){

    $this->db->select('*');
    $this->db->from('mamin_pengajuan');
    $this->db->where('mamin_pengajuan.creator_id',$creator_id);
    $this->db->join('pagu_mamin','pagu_mamin.id_pagu = mamin_pengajuan.id_pagu');
    return $this->db->get()->result();
  }
  function get_daftar_by_id($id_pagu){

    $this->db->select('*');
    $this->db->from('mamin_pengajuan');
    $this->db->where('mamin_pengajuan.id_pagu',$id_pagu);
    $this->db->join('pagu_mamin','pagu_mamin.id_pagu = mamin_pengajuan.id_pagu');
    return $this->db->get()->result();
  }

  function get_kegiatan_by_uk($id_unit_kerja){

    $this->db->select('*');
    $this->db->from('pagu_mamin');
    $this->db->where('pagu_mamin.id_unit_kerja',$id_unit_kerja);
    $this->db->where('pagu_mamin.tahun_pagu',date('Y'));
    return $this->db->get()->result();
  }

  function get_pagu_by_id($id_pagu){

    return $this->db->get('pagu_mamin',array('id_pagu'=>$id_pagu))->row();
  }

  function admin_get_pengajuan(){

    $this->db->select('*');
    $this->db->from('mamin_pengajuan');

    $this->db->join('pagu_mamin','pagu_mamin.id_pagu = mamin_pengajuan.id_pagu');
    return $this->db->get()->result();

  }

  function admin_get_pengajuan_by_id($id_pengajuan){
    $this->db->select('*');
    $this->db->from('mamin_pengajuan');
    $this->db->where('mamin_pengajuan.id_mamin_pengajuan',$id_pengajuan);
    $this->db->join('pagu_mamin','pagu_mamin.id_pagu = mamin_pengajuan.id_pagu');
    return $this->db->get()->result();

  }

}
