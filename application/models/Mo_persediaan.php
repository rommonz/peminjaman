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

  function get_list_transaksi_admin($status = NULL){

    $sql = "select * from persediaan_transaksi pt inner join tbl_login l on l.id = pt.id_user where status_transaksi != 'DRAFT' ";
    if(isset($status)){
      $sql .= " and status_transaksi = '".$status."' ";
    }
    return $this->db->query($sql)->result();
  }

  /* list transaksi untuk user */
  function get_list_transaksi($status = NULL){

    $sql = "select * from persediaan_transaksi pt inner join tbl_login l on l.id = pt.id_user and l.id = ".$this->session->userdata('id');
    if(isset($status)){
      $sql .= " where status_transaksi = '".$status."' ";
    }
    return $this->db->query($sql)->result();
  }


  function get_transaksi($id_transaksi){
    $sqltransaksi = "select * from persediaan_transaksi pt inner join tbl_login l on l.id = pt.id_user where pt.id_persediaan_transaksi = ".$id_transaksi;
    return $this->db->query($sqltransaksi)->row();
  }

  function get_transaksi_detail($id_transaksi){
    $sql = "select * from persediaan_transaksi_detail ptd
            inner join persediaan p on p.id_persediaan = ptd.id_persediaan
            inner join persediaan_jenis pj on pj.id_persediaan_jenis = p.id_persediaan_jenis
            where ptd.id_persediaan_transaksi = ".$id_transaksi;
    return $this->db->query($sql)->result();
  }


}
