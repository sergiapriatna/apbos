<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model('login_model');
		$this->load->model('admin_model');
		$this->load->model('dosen_model');
		$this->load->model('mhs_model');
	}
	public function index()
	{
		$this->load->view('login');
	}
	public function aksi_login(){
		$check=$this->login_model->check();
		if($check=="admin"){
			$data=$this->admin_model->get();
			foreach($data->result() as $user){
				$this->session->set_userdata('masuk','login');
				$this->session->set_userdata('username',$user->username);
				$this->session->set_userdata('as','admin');
			
			}
			redirect('admin');
		}else if($check=="dosen"){
			$data=$this->dosen_model->get();
			foreach($data->result() as $user){
				$this->session->set_userdata('masuk','login');
				$this->session->set_userdata('username',$user->username);
				$this->session->set_userdata('namalengkap',$user->namalengkap);
				$this->session->set_userdata('nidn',$user->nidn);
				$this->session->set_userdata('status',$user->status);
				$this->session->set_userdata('foto',$user->foto);
				$this->session->set_userdata('as','dosen');
			}
			redirect('admin');
		}else if($check=="mahasiswa"){
			$data=$this->mhs_model->get();
			foreach($data->result() as $user){
				$this->session->set_userdata('masuk','login');
				$this->session->set_userdata('username',$user->username);
				$this->session->set_userdata('namalengkap',$user->namalengkap);
				$this->session->set_userdata('npm',$user->npm);
				$this->session->set_userdata('status',$user->status);
				$this->session->set_userdata('foto',$user->foto);
				$this->session->set_userdata('tahunangkatan',$user->tahunangkatan);
				$this->session->set_userdata('as','mahasiswa');
			}
			redirect('admin');
		}
	}

	public function logout()
	{
		$this->session->set_userdata('masuk','logout');
		$this->session->sess_destroy();
		redirect('login');
	}
}