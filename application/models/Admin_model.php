<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
	public function get()
	{
        $username=$this->input->post('username');
        $password=md5($this->input->post('pass'));
        $where=array(
            'username'=>$username,
            'password'=>$password
        );
        $data=$this->db->get_where('admin',$where);
        if ($data->num_rows()>0) {
            return $data;
        }
	}
}
