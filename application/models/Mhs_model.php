<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mhs_model extends CI_Model {
	public function get()
	{
        $username=$this->input->post('username');
        $password=md5($this->input->post('pass'));
        $where=array(
            'username'=>$username,
            'password'=>$password
        );
        $data=$this->db->get_where('mhs',$where);
        if ($data->num_rows()>0) {
            return $data;
        }
    }
    public function get_all(){
        return $this->db->get('mhs');
    }
    public function gantiStatus($id,$status){
        $this->db->where('id',$id);
        $data=array('status'=>$status);
        $query=$this->db->update('mhs',$data);
        if ($query) {
            return true;
        }else{
            return false;
        }
    }

    public function tambah($foto){
        $where = array(
            'namalengkap' => $this->input->post('namalengkap'),
            'npm' => $this->input->post('npm'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('username')),
            'tahunangkatan' => $this->input->post('tahunangkatan'),
            'status' => 'nonaktif',
            'foto' => $foto
        );
        if ($this->db->insert('mhs',$where)) {
            return true;
        }else{
            return false;
        }
    }

    public function edit($id,$foto){
        $this->db->where('id',$id);
        $data=array(
            'namalengkap'=>$this->input->post('namalengkap'),
            'npm'=>$this->input->post('npm'),
            'username'=>$this->input->post('username'),
            'tahunangkatan'=>$this->input->post('tahunangkatan'),
            'foto' => $foto
        );
        $query=$this->db->update('mhs',$data);
        if ($query) {
            return true;
        }else{
            return false;
        }
    }
    
    public function hapus($id){
        $this->db->where('id',$id);
        $query=$this->db->delete('mhs');
        if ($query) {
            return true;
        }else{
            return false;
        }
    }
}
