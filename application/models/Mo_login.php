<?php

class Mo_login extends CI_Model{
	function cek_login($table,$where){
		return $this->db->get_where($table,$where);
	}

  function get_pengguna(){

		$sql = "select * from tbl_login l left join unit_kerja uk on uk.id_unit_kerja = l.id_unit_kerja";

		return $this->db->query($sql)->result();
	}

	function get_pengguna_by_id($id){

		$sql = "select * from tbl_login l left join unit_kerja uk on uk.id_unit_kerja = l.id_unit_kerja where l.id = ".$id;

		return $this->db->query($sql)->row();
	}

	function update_pengguna($where,$data)
	{
		 $this->db->where($where);
		 return $this->db->update ('tbl_login',$data);
	}

	function check_duplicate_username($username){

		$this->db->where('username',$username);
		$query = $this->db->get('tbl_login');

		if($query->num_rows() > 0){
			return FALSE;
		}else{
			return TRUE;
		}
	}

	function simpan_pengguna($data){
		return $this->db->insert('tbl_login',$data);
	}

}
