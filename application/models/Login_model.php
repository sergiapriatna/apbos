<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
	public function check()
	{
        $username=$this->input->post('username');
        $password=md5($this->input->post('pass'));
        $where=array(
            'username'=>$username,
            'password'=>$password
        );
        if ($this->db->get_where('admin',$where)->num_rows()>0) {
            return 'admin';
        }else if ($this->db->get_where('dosen',$where)->num_rows()>0) {
            return 'dosen';
        }else if ($this->db->get_where('mhs',$where)->num_rows()>0) {
            return 'mahasiswa';
        }
	}
}
