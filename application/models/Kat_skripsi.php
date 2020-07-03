<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kat_skripsi extends CI_Model {
    public function get_all(){
        $data=$this->db->get('kategori_skripsi');
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
