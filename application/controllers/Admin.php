<?php

class Admin extends CI_Controller{

	function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
			redirect(site_url("Login/masuk")); //jika tidak login dan diback dari browser akan tetap pada vi_login
		}
		$this->load->model('mo_login');
	}

	function index(){
		$this->load->view('Vi_home');
	}

  public function pengguna(){

    $data['daftar_pengguna'] = $this->mo_login->get_pengguna();
    $this->load->view('admin/vi_pengguna',$data);
  }

  public function addpengguna(){
		$data['daftar_unit_kerja'] = $this->db->get('unit_kerja')->result();
    $this->load->view('admin/vi_addpengguna',$data);
  }

  function penggunasave(){
    if($this->input->post('save')){

				$datainsert = array('username'=>$this->input->post('username'),
														'password'=>$this->input->post('password'),
														'nama'=>$this->input->post('nama_lengkap'),
														'role'=>$this->input->post('role')
														);
			if($this->mo_login->check_duplicate_username($this->input->post('username'))){
					if($this->mo_login->simpan_pengguna($datainsert)){
						//set flash message
						$this->session->set_flashdata('state','success');
			      $this->session->set_flashdata('msg','Pengguna baru tersimpan');

						redirect('admin/pengguna');
					}
			}else{
				//set flash gagal
				$this->session->set_flashdata('state','danger');
	      $this->session->set_flashdata('msg','username sudah digunakan, silahkan gunakan username lain');

				redirect('admin/addpengguna','refresh');
			}

    }else{
      redirect('admin/addpengguna','refresh');
    }
  }

  public function editpengguna($id){
		$data['pengguna'] = $this->db->get_where('tbl_login',array('id'=>$id))->row();
		$data['roles'] = $this->db->get('role')->result();
		$data['daftar_unit_kerja'] = $this->db->get('unit_kerja')->result();
    $this->load->view('admin/vi_editpengguna',$data);
  }

	public function penggunaupdate(){

		$datapost['nama'] = $this->input->post('nama');

		if($this->input->post('password') != '' ){
			$datapost['password'] = $this->input->post('password');
		}
		$datapost['role'] = $this->input->post('role');
		$datapost['id_unit_kerja'] = $this->input->post('id_unit_kerja');
		$where = Array('id'=>$this->input->post('id'));

		if($this->db->update('tbl_login',$datapost, $where)){
			$this->session->set_flashdata('state','success');
			$this->session->set_flashdata('msg','update berhasil');
			redirect('admin/pengguna');
		}else{
			$this->session->set_flashdata('state','danger');
			$this->session->set_flashdata('msg','update profil gagal');
			redirect('admin/pengguna');
		}

	}

	public function unitkerja(){
		//$data['daftar_unitkerja'] = $this->db->get('unit_kerja')->result();
		$sql = "select uk.*, uk2.nama_unit_kerja as ordinat from unit_kerja uk left join unit_kerja uk2 on uk2.id_unit_kerja = uk.id_ordinat";
		$data['daftar_unitkerja'] = $this->db->query($sql)->result();
		$this->load->view('admin/vi_daftar_unitkerja',$data);

	}

	function addunitkerja(){
		$data['daftar_unitkerja'] = $this->db->get('unit_kerja')->result();
		$this->load->view('admin/vi_addunitkerja',$data);
	}

	function unitkerjasave(){
		if($this->input->post('save')){
				$datainsert = array('nama_unit_kerja'=>$this->input->post('nama_unit_kerja'),
														'id_ordinat'=>$this->input->post('id_ordinat'),
														'keterangan'=>$this->input->post('keterangan')
														);

				if($this->db->insert('unit_kerja',$datainsert)){
					$this->session->set_flashdata('state','success');
					$this->session->set_flashdata('msg','DATA TERSIMPAN');
					redirect('admin/unitkerja');
				}else{
					$this->session->set_flashdata('state','danger');
					$this->session->set_flashdata('msg','GAGAL MENYIMPAN');
					redirect('admin/unitkerja');
				}
			}
	}


	/**
	 *
	 * Pagu Makan Minum
	 */
	 function pagumamin(){
		 // $data['daftar_pagu'] = $this->db->get('pagu_mamin')->result();
		 $sql = "select pg.*, uk.nama_unit_kerja from pagu_mamin pg inner join unit_kerja uk on uk.id_unit_kerja = pg.id_unit_kerja";
		 $data['daftar_pagu'] = $this->db->query($sql)->result();
		 $this->load->view('admin/vi_daftar_pagu',$data);
	 }

	 function addpagumamin(){
		 $data['daftar_unit_kerja'] = $this->db->get('unit_kerja')->result();
		 $this->load->view('admin/vi_addpagumamin',$data);
	 }

	 function pagumaminsave(){
		 if($this->input->post('save')){
				 $datainsert = array('id_unit_kerja'=>$this->input->post('id_unit_kerja'),
				 											'kegiatan'=>$this->input->post('nama_kegiatan'),
														 'nilai_pagu'=>$this->input->post('nilai_pagu'),
														 'pagu_berjalan'=>$this->input->post('nilai_pagu'),
														 'tahun_pagu'=>$this->input->post('tahun_pagu'),
														 'created_by'=>$this->session->userdata('nama'),
														 'creator_id'=>$this->session->userdata('id'),
														 'keterangan'=>$this->input->post('keterangan')
														 );

				 if($this->db->insert('pagu_mamin',$datainsert)){
					 $this->session->set_flashdata('state','success');
					 $this->session->set_flashdata('msg','DATA TERSIMPAN');
					 redirect('admin/pagumamin');
				 }else{
					 $this->session->set_flashdata('state','danger');
					 $this->session->set_flashdata('msg','GAGAL MENYIMPAN');
					 redirect('admin/addpagumamin');
				 }
			 }
	 }

	 function editpagu($id_pagu){

		 $data['pagu'] = $this->db->get_where('pagu_mamin',array('id_pagu'=>$id_pagu))->row();
		 $data['daftar_unit_kerja'] = $this->db->get('unit_kerja')->result();
		 //print_r($data);exit;
		 $this->load->view('admin/vi_editpagumamin',$data);

	 }

	 function updatepagu(){
		 if($this->input->post('update')){
				$dataupdate = array('id_unit_kerja'=>$this->input->post('id_unit_kerja'),
														 'kegiatan'=>$this->input->post('nama_kegiatan'),
														'nilai_pagu'=>$this->input->post('nilai_pagu'),
														'pagu_berjalan'=>$this->input->post('nilai_pagu'),
														'tahun_pagu'=>$this->input->post('tahun_pagu'),
														'created_by'=>$this->session->userdata('nama'),
														'creator_id'=>$this->session->userdata('id'),
														'keterangan'=>$this->input->post('keterangan')
														);

				if($this->db->update('pagu_mamin',$dataupdate,array('id_pagu'=>$this->input->post('id_pagu')))){
					$this->session->set_flashdata('state','success');
					$this->session->set_flashdata('msg','DATA TERSIMPAN');
					redirect('admin/pagumamin');
				}else{
					$this->session->set_flashdata('state','danger');
					$this->session->set_flashdata('msg','GAGAL MENYIMPAN');
					redirect('admin/editpagu/'.$this->input->post('id_pagu'));
				}
			}
	 }

	 function hapuspagumamin(){

		 $del = $this->db->delete('pagu_mamin',array('id_pagu'=>$this->input->post('id_pagu')));
		 if($del){
			 echo 'SUCCESS';
		 }else{
			 echo 'FAILED';
		 }

	 }

}
