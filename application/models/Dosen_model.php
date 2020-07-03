<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_model extends CI_Model {
	public function get()
	{
        $username=$this->input->post('username');
        $password=md5($this->input->post('pass'));
        $where=array(
            'username'=>$username,
            'password'=>$password
        );
        $data=$this->db->get_where('dosen',$where);
        if ($data->num_rows()>0) {
            return $data;
        }
    }
    public function get_all(){
        return $this->db->get('dosen');
    }
    public function gantiStatus($id,$status){
        $this->db->where('id',$id);
        $data=array('status'=>$status);
        $query=$this->db->update('dosen',$data);
        if ($query) {
            return true;
        }else{
            return false;
        }
    }

    public function tambah($foto){
        $where = array(
            'namalengkap' => $this->input->post('namalengkap'),
            'nidn' => $this->input->post('nidn'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('username')),
            'jabatan' => $this->input->post('jabatan'),
            'status' => 'nonaktif',
            'foto' => $foto
        );
        if ($this->db->insert('dosen',$where)) {
            return true;
        }else{
            return false;
        }
    }

    public function edit($id){
        $this->db->where('id',$id);
        $data=array(
            'namalengkap'=>$this->input->post('namalengkap'),
            'nidn'=>$this->input->post('nidn'),
            'username'=>$this->input->post('username'),
            'jabatan'=>$this->input->post('jabatan')
        );
        $query=$this->db->update('dosen',$data);
        if ($query) {
            return true;
        }else{
            return false;
        }
    }
    public function hapus($id){
        $this->db->where('id',$id);
        $query=$this->db->delete('dosen');
        if ($query) {
            return true;
        }else{
            return false;
        }
    }
}
