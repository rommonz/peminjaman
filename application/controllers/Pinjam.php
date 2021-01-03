<?php

class Pinjam extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('mo_pinjamruangan', 'pinjamruangan');
  	if($this->session->userdata('status') != "login"){
			redirect(site_url("Login/masuk"));}
		}

	function tomaster()
	{
		$this->mo_pinjambarang->save_master();
	}
	function todetail()
	{
		$this->mo_pinjambarang->save_detail();
	}
	function hapus()
    {
		$id =  $this->uri->segment(3);
		$idpb =  $this->uri->segment(4);
        $where = array ('id_barang'=>$id, 'id_pb'=>$idpb);
        $this->mo_pinjambarang->hapus_barang($where,'tbl_detailpb');
		$wherespt = array('id_pb' => $idpb);
		$this->mo_pinjambarang->tampillagi($wherespt);
    }
	function hapusall($id)
	{
		$where = array ('id_pb'=>$id);
        $this->mo_pinjambarang->hapus_detail($where,'tbl_detailpb');
		$this->mo_pinjambarang->hapus_master($where,'tbl_pinjambarang');
        redirect('crudpinjambarang/kepinjambarang');
	}

	function save_bookruangan(){
		$id_ruangan = $this->input->post('ruangan');
		$title = $this->input->post('title');
		$desc = $this->input->post('desc');
		$start_date = $this->input->post('start_date');
		$end_date = $this->input->post('end_date');

		$datapinjam = array('title'=>$title,
												'description'=>$desc,
												'start_date'=>$start_date,
												'end_date'=>$end_date,
												'create_by'=>$this->session->userdata('nama'),
												'modified_by'=>$this->session->userdata('nama'),
												'id_ruangan'=>$id_ruangan,
												'creator_id'=>$this->session->userdata('id')
													);
		if($this->db->insert('calendar',$datapinjam)){

			redirect(base_url('pinjam/calendar'));
		}else{
			redirect(base_url('pinjam/formpinjamruangan'));
		}
	}

	function formpinjamruangan(){
		$data['listruangan'] = $this->db->get('ruangan')->result();
		$this->load->view('pinjam/vi_pinjamruangan',$data);
	}

	function menejpinjamruangan(){
		$this->load->model('mo_pinjamruangan');
		$where = ' ';
		if(null !== $this->input->get('r') and $this->input->get('r') != 'ALL') {
			$where = " and c.id_ruangan = ".$this->input->get('r');
		}
		if(null !== $this->input->get('s') and $this->input->get('s') != 'ALL') {
			$where .= " and c.approval = '".$this->input->get('s')."'";
		}

		$data['daftar_pinjamruangan'] = $this->mo_pinjamruangan->get_daftarpinjamruangan($where);
		$data['listruangan'] = $this->db->get('ruangan')->result();
		$this->load->view('pinjam/vi_menejpinjamruangan',$data);
	}

	function proses(){
		$id = $this->input->post('id');
		$status = $this->input->post('status');

		$sql = "update calendar set approval = '".$status."' where id = '".$id."' ";
		if($this->db->query($sql)){
			echo "SUCCESS";
		}else{
			echo "FAILED";
		}

	}

	function calendar($id_ruangan = NULL){

		$data_calendar = $this->pinjamruangan->get_list($id_ruangan);

		$calendar = array();
		foreach ($data_calendar as $key => $val)
		{
			$calendar[] = array(
				'id' 	=> intval($val->id),
				'title' =>  "(".$val->kode_ruangan.") ".$val->title,
				'description' => trim($val->description),
				'start' => date_format( date_create($val->start_date) ,"Y-m-d H:i:s"),
				'end' => date_format( date_create($val->end_date) ,"Y-m-d H:i:s"),
				'allday'=>true,
				'color' => $val->color
			);
		}

		$data = array();
		$data['get_data']			= json_encode($calendar);
		$data['listruangan'] = $this->db->get('ruangan')->result();
		$this->load->view('pinjam/vi_calendar', $data);
	}

	function detail($id){
		$data['detail'] = $this->pinjamruangan->get_detail($id);
		$data['fasilitas']  = $this->pinjamruangan->get_fasilitas($data['detail']->id_ruangan);
		$this->load->view('pinjam/vi_detailpinjam',$data);
	}
}
