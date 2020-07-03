<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Judulskripsi extends CI_Controller {

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
		$this->load->model('jdl_model');
		$this->load->model('mhs_model');
		$this->load->model('dosen_model');
		$this->load->model('kat_skripsi');
    }
	public function index()
	{
		$data['jdl']=$this->jdl_model->get_all()->result();
		$data['data2']=$this->jdl_model->get_all()->result();
		$data['mhs2']=$this->mhs_model->get_all();
		$data['dosen12']=$this->dosen_model->get_all();
		$data['dosen22']=$this->dosen_model->get_all();
		$data['kat2']=$this->kat_skripsi->get_all();
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/sider');
		$this->load->view('admin/include/navbar');
		$this->load->view('admin/judul_skripsi',$data);
		$this->load->view('admin/include/footer');
	}
	public function hapus($id){
        $data=$this->jdl_model->hapus($id);
        if ($data==true) {
			$this->session->set_flashdata('msg','Data Berhasil Dihapus');
			redirect('judulskripsi');
		}else{
			$this->session->set_flashdata('msg','Data Gagal Dihapus');
			redirect('judulskripsi');
		}
	}
}