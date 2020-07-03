<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		if (!$this->session->userdata('masuk')=='login') {
			redirect('login');
		}
		$this->load->model('mhs_model');
		$this->load->model('dosen_model');
	}
	public function index()
	{
		$data['dosen']=$this->dosen_model->get_all()->num_rows();
		$data['mahasiswa']=$this->mhs_model->get_all()->num_rows();
		$this->load->view('admin/include/header.php');
		$this->load->view('admin/include/sider.php');
		$this->load->view('admin/include/navbar.php');
		$this->load->view('admin/index',$data);
		$this->load->view('admin/include/footer.php');
	}
}
