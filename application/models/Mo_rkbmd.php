<?php

class Mo_rkbmd extends CI_Model{

  public $_table = 'rkbmd';

  function get_daftar_all(){

    return $this->db->get('rkbmd')->result();
  }

  function get_daftar_by_creator($id){
    $this->db->where('creator_id',$id);
    return $this->db->get('rkbmd')->result();
  }

  function save_rkbmd($data){

      return $this->db->insert($this->_table,$data);
  }

}
