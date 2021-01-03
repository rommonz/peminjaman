<?php

class Barang extends CI_Controller{

	function __construct(){
		parent::__construct();
        $this->load->model('mo_barang');
		if($this->session->userdata('status') != "login"){
			redirect(site_url("Login/masuk"));}
	}

	function index(){
		$this->daftarbarang();
	}

	function kebarang(){
		$this->daftarbarang();
	}

	function daftarbarang(){
		$data['tb_barang'] = $this->mo_barang->tampil_data();
		$this->load->view('barang/vi_daftarbarang', $data);
	}

    function add(){
				$data['ruangan'] = $this->db->get('ruangan')->result();
        $this->load->view('barang/vi_addbarang',$data);
    }


    function save(){
    	if($this->input->post('save')){

					$config['upload_path']          = FCPATH.'assets/uploads/';
					$config['allowed_types']        = 'gif|jpg|png';
					$config['max_size']             = 100;
					$config['max_width']            = 1024;
					$config['max_height']           = 768;
					$config['file_name']		= $this->input->post('kd');

					$this->load->library('upload', $config);

					if ( ! $this->upload->do_upload('foto'))
					{
									$error = array('error' => $this->upload->display_errors());
									print_r($error);
									//$this->load->view('upload_form', $error);
					}
					else
					{

								$data = $this->upload->data();
								$this->mo_barang->simpan($data['file_name']);
				        redirect('barang/kebarang','refresh');

					}



        }else{
          redirect('barang/add','refresh');
      }
    }

    //function updatebarang ($id_barang)
   // {
    //    $data['tb_barang'] = $this->mo_barang->getbarang($id_barang);
    //    $this->load->view('Vi_editbarang',$data);
   // }

    function edit($id){
        $where = array('id_barang' => $id);
        $data['detail'] = $this->mo_barang->edit_barang($where,'tb_barang')->row();
				$data['ruangan'] = $this->db->get('ruangan')->result();
        $this->load->view('barang/vi_editbarang',$data);
    }

    function updatebarang()
    {
			if($this->input->post('update')){
				if (!empty($_FILES['foto']['name'])) {
					$config['upload_path']          = FCPATH.'assets/uploads/';
					$config['allowed_types']        = 'gif|jpg|png';
					$config['overwrite'] 					= TRUE;
					$config['max_size']             = 100;
					$config['max_width']            = 1024;
					$config['max_height']           = 768;
					$config['file_name']		= $this->input->post('kd');
					//$config['file_name'] = "cobaupdate";
					$this->load->library('upload', $config);

					if ( ! $this->upload->do_upload('foto'))
					{
									$error = array('error' => $this->upload->display_errors());
									print_r($error);exit;
									//$this->load->view('upload_form', $error);
					}
					else
					{

								$datafoto = $this->upload->data();
								//echo "<pre>";
								//print_r($datafoto);
								//exit;

					}
				}
					$id_barang = $this->input->post('id');
					$kd = $this->input->post('kd');
					$nb = $this->input->post('nb');
					$merk = $this->input->post('merk');
					$ns = $this->input->post('ns');
					$kb = $this->input->post('kb');
					$id_ruangan = $this->input->post('id_ruangan');

					$data = array (
							'kode_barang' => $kd,
							'nama_barang' => $nb,
							'merk' => $merk,
							'no_seri' => $ns,
							'kondisi_barang' => $kb,
							'id_ruangan' => $id_ruangan

							);

						if (!empty($_FILES['foto']['name'])) {
							$data['foto'] = $datafoto['file_name'];
						}
						$where = array ('id_barang'=>$id_barang);
						$this->mo_barang->updatebarang($where, $data);
						redirect('barang/daftarbarang','refresh');


			}else{
				redirect('barang/daftarbarang','refresh');
			}


    }

    function hapus($id)
    {
        $where = array ('id_barang'=>$id);
        $this->mo_barang->hapus_barang($where,'barang');
        redirect('barang/kebarang');
    }
}
