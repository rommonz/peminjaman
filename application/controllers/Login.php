<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Login extends CI_Controller{

		function __construct(){
			parent::__construct();
			$this->load->model('Mo_login');
		}
		function masuk(){
			$this->load->view("Vi_login");

		}
		function login_validation()
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$where = array(
			'username' => $username,
			'password' => $password
			);
			$cek = $this->Mo_login->cek_login("tbl_login",$where)->num_rows();
			if($cek > 0){
				$datalogin = $this->Mo_login->cek_login("tbl_login",$where)->row();
			$data_session = array(
				'id' => $datalogin->id,
				'username' => $datalogin->username,
				'nama' => $datalogin->nama,
				'role' =>$datalogin->role,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

			redirect('/admin');

			}else{
				echo "<script>alert('Username dan password salah!');history.go(-1);</script>";
			}
		}
		function keluar()
		{
			$this->session->sess_destroy();
			redirect('login/masuk');
		}
	}
