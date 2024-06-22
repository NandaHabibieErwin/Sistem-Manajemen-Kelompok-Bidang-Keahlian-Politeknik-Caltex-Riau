<?php
if(! defined('BASEPATH')) exit ('no direct script access allowed');
class Mahasiswa_Model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }
    public function tampilSemua(){
        $sql = "SELECT * FROM mahasiswa";
        $data = $this->db->query($sql);
        $isi = $data->result_array();
        return $isi;
    }
    public function tampilSatu($id){
        $sql = "SELECT * FROM mahasiswa WHERE id = '$id'";
        $data = $this->db->query($sql);
        $isi = $data->result_array();
        return $isi;
    }
}
?>
