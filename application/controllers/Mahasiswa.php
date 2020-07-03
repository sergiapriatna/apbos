<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

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
        $this->load->model('mhs_model');
    }
	public function index()
	{
		$data['data']=$this->mhs_model->get_all()->result();
		$data['data2']=$this->mhs_model->get_all()->result();
		$data['data3']=$this->mhs_model->get_all()->result();
		$this->load->view('admin/include/header.php');
		$this->load->view('admin/include/sider.php');
		$this->load->view('admin/include/navbar.php');
		$this->load->view('admin/mng_mhs',$data);
		$this->load->view('admin/include/footer.php');
	}
	public function gantiStatus($id,$status){
		$query=$this->mhs_model->gantiStatus($id,$status);
		if ($query==true) {
			$this->session->set_flashdata('msg','status berhasil diubah');
			redirect('mahasiswa');
		}else{
			$this->session->set_flashdata('msg','status gagal diubah');
			redirect('mahasiswa');
		}
	}

	public function tambah(){
		$config['upload_path']          = './assets/img/mhs/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 11000;
		$config['max_width']            = 4000;
		$config['max_height']           = 4000;

		$this->load->library('upload', $config);
 
		if ( ! $this->upload->do_upload('foto')){
			$error = array('error' => $this->upload->display_errors());
			redirect('mahasiswa');
		}else{
			$foto = $this->upload->data('file_name');
			$data = $this->mhs_model->tambah($foto);
			if ($data==true) {
				$this->session->set_flashdata('msg','Tambah data berhasil !');
				redirect('mahasiswa');
			}else{
				$this->session->set_flashdata('msg','Tambah data gagal !');
				redirect('mahasiswa');
			}
		}

	}

	public function edit($id){
		$config['upload_path']          = './assets/img/mhs/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 11000;
		$config['max_width']            = 4000;
		$config['max_height']           = 4000;

		$this->load->library('upload', $config);
 
		if ( ! $this->upload->do_upload('foto_new')){
			$foto = $this->input->post('foto_old');
		}else{
			$foto = $this->upload->data('file_name');
		}
		$data=$this->mhs_model->edit($id,$foto);
        if ($data==true) {
			$this->session->set_flashdata('msg','Data Berhasil Diedit');
			redirect('mahasiswa');
		}else{
			$this->session->set_flashdata('msg','Data Gagal Diedit');
			redirect('mahasiswa');
		}

	}

	public function hapus($id){
        $data=$this->mhs_model->hapus($id);
        if ($data==true) {
			$this->session->set_flashdata('msg','Data Berhasil Dihapus');
			redirect('mahasiswa');
		}else{
			$this->session->set_flashdata('msg','Data Gagal Dihapus');
			redirect('mahasiswa');
		}
    }
}
