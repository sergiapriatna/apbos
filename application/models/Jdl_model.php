<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jdl_model extends CI_Model {
    public function get_all(){
        return $this->db->get('judul_skripsi');
        $data=$this->db->get_where('judul_skripsi',$where);
        if ($data->num_rows()>0) {
            return $data;
        }
}
public function hapus($id){
    $this->db->where('id',$id);
    $query=$this->db->delete('judul_skripsi');
    if ($query) {
        return true;
    }else{
        return false;
}
}
}
