<?php

class Mo_login extends CI_Model{
	function cek_login($table,$where){
		return $this->db->get_where($table,$where);
	}

  function get_pengguna(){
    return $this->db->get('tbl_login')->result();
  }

	function update_pengguna($where,$data)
	{
		 $this->db->where($where);
		 return $this->db->update ('tbl_login',$data);
	}
	
}
