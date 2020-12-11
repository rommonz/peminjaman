<?php

class Mo_ruangan extends CI_Model{

  public $_table = 'ruangan';

  function get_daftarruangan(){

    return $this->db->get($this->_table)->result();
  }

  function get_ruangan($id){

    return $this->db->get_where('ruangan',array('id_ruangan'=>$id))->row();
  }

  function delete_ruangan($id){

     return $this->db->delete($this->_table,array('id_ruangan'=>$id));

  }

  function simpan_ruangan($data){
    return $this->db->insert($this->_table,$data); exit;
  }

  function update_ruangan($id, $data){
    return $this->db->update($this->_table,$data,array('id_ruangan'=>$id));
  }
}
