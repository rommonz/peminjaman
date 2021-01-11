<?php

class Mo_persediaan extends CI_Model{

  /*
  * return result
  */
  function get_persediaan(){
    $sql = "select * from persediaan p inner join persediaan_jenis pj on pj.id_persediaan_jenis = p.id_persediaan_jenis";
    return $this->db->query($sql)->result();
  }

  /*
   * retur row
   */
  function get_persediaan_by_id($id_persediaan){
    $sql = "select * from persediaan p
            inner join persediaan_jenis pj on pj.id_persediaan_jenis = p.id_persediaan_jenis
            where p.id_persediaan = ".$id_persediaan;
    return $this->db->query($sql)->row();
  }

  function update_persediaan($id_persediaan, $data){

    
  }

  function get_history_by_id($id_persediaan){
    $sql = "select * from persediaan_transaksi pt where pt.id_persediaan = ".$id_persediaan;
    return $this->db->query($sql)->result();
  }


}
