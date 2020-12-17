<?php

class Mo_barang extends CI_Model{

    private $_table = "barang";

	function tampil_data()
  {
		//return $this->db->get($this->_table)->result();
    $sql = "select * from barang left join ruangan on barang.id_ruangan = ruangan.id_ruangan";
    return $this->db->query($sql)->result();
	}

    function simpan($foto)
    {
        $kd = $this->input->post('kd');
        $nb = $this->input->post('nb');
        $merk = $this->input->post('merk');
        $ns = $this->input->post('ns');
        $kb = $this->input->post('kb');
        $id_ruangan = $this->input->post('id_ruangan');

        $data = array(
            'kode_barang' => $kd,
            'nama_barang' => $nb,
            'merk' => $merk,
            'no_seri' => $ns,
            'kondisi_barang' => $kb,
            'id_ruangan' =>$id_ruangan,
            'foto'=>$foto
            );
            $this->db->insert($this->_table,$data);
    }

    function edit_barang($where,$table){
        return $this->db->get_where($table,$where);
    }

    function updatebarang($where,$data,$table)
    {
       $this->db->where($where);
       $this->db->update ('tb_barang',$data);
    }

    function hapus_barang($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }

}
