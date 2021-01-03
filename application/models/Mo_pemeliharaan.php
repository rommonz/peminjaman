<?php

class Mo_pemeliharaan extends CI_Model{

  function save($data){
    return $this->db->insert('pemeliharaan',$data);
  }

  function get_list(){
    $this->db->where('creator_id',$this->session->userdata('id'));
    return $this->db->get('pemeliharaan')->result();
  }

  function hapus_pengajuan($id_pemeliharaan){
    return $this->db->delete('pemeliharaan',array('id_pemeliharaan'=>$id_pemeliharaan));
  }

  function get_detail($id_pemeliharaan){
    return $this->db->get_where('pemeliharaan',array('id_pemeliharaan'=>$id_pemeliharaan))->row();
  }

  function update($dataupdate, $id_pemeliharaan){
    return $this->db->update('pemeliharaan',$dataupdate,array('id_pemeliharaan'=>$id_pemeliharaan));
  }
}
