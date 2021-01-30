<?php

class Mo_pinjamruangan extends CI_Model{
	private $_table = "ruangan";
	private $view = "view_barang";

    function save()
	{
		$this->db->insert($this->tbl_pinjambarang,$data);
		$wi = array('id_pb' => $idpb);
		$wn = array('no_pb' => $nopb);
		$data['view_barang'] = $this->db->get_where($this->view, $wi)->result();
		$data['tb_barang'] = $this->db->get($this->_table)->result();
		$data['tbl_pinjambarang'] = $this->db->get_where($this->tbl_pinjambarang, $wn)->result();
		$this->load->view('Vi_pinjambarang2', $data);
	}
	function get_list($id_ruangan = NULL){
		//echo "id ruangan ".$id_ruangan; exit;
		$sql = "select c.*, r.kode_ruangan, r.nama_ruangan,

						IF(c.approval = 'APPROVED', 'GREEN',IF(c.approval = 'PENDING','YELLOW',(IF(c.approval = 'REjECTED','RED','GREY')))) as color
						from calendar c
						inner join ruangan r on r.id_ruangan = c.id_ruangan

						";
	if(isset($id_ruangan)){
		$sql .= " and c.id_ruangan = ".$id_ruangan;
	}

		return $this->db->query($sql)->result();
	}

	function get_detail($id){
		$sql = "select * from calendar c
						inner join ruangan r on r.id_ruangan = c.id_ruangan
						where c.id = $id
						";
		return $this->db->query($sql)->row();
	}

	function get_fasilitas($id_ruangan){
		$sql = "select * from barang where id_ruangan = $id_ruangan ";
		return $this->db->query($sql)->result();
	}

	function save_detail()
	{
		$idpb = $this->input->post('idpb');
		$select = $this->input->post('select');
		$unit = $this->input->post('unit');
		$keterangan = $this->input->post('keterangan');
		$data = array(
            'id_pb' => $idpb,
			'id_barang' => $select,
            'unit' => $unit,
            'keterangan' => $keterangan,
            );
        $this->db->insert('tbl_detailpb',$data);
		$wi = array('id_pb' => $idpb);
		$data['view_barang'] = $this->db->get_where($this->view, $wi)->result();
		$data['tb_barang'] = $this->db->get($this->_table)->result();
		$data['tbl_pinjambarang'] = $this->db->get_where($this->tbl_pinjambarang, $wi)->result();
		$this->load->view('Vi_pinjambarang2', $data);
	}
	function hapus_barang($where, $table)
	{
		$this->db->where($where);
        $this->db->delete($table);
	}
	function tampillagi($wherespt)
	{
		$data['view_barang'] = $this->db->get_where($this->view, $wherespt)->result();
		$data['tb_barang'] = $this->db->get($this->_table)->result();
		$data['tbl_pinjambarang'] = $this->db->get_where($this->tbl_pinjambarang, $wherespt)->result();
		$this->load->view('Vi_pinjambarang2', $data);
	}
	function hapus_detail($where, $table)
	{
		$this->db->where($where);
        $this->db->delete($table);
	}
	function hapus_master($where, $table)
	{
		$this->db->where($where);
        $this->db->delete($table);
	}

	function get_daftarpinjamruangan($where = NULL){
		$sql = "select * from calendar c
						inner join ruangan on ruangan.id_ruangan = c.id_ruangan
						where start_date > '2020-01-01'
						";
		if(isset($where)){
			$sql .= $where;
		}
		return $this->db->query($sql)->result();
	}
}
