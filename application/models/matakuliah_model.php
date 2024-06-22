<?php
if(! defined('BASEPATH')) exit ('no direct script access allowed');
class Matakuliah_Model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }
    public function tampilSemua(){
        $sql = "SELECT * FROM matakuliah";
        $data = $this->db->query($sql);
        $isi = $data->result_array();
        return $isi;
    }
    public function tampilSatu($mk_id){
        $sql = "SELECT * FROM matakuliah WHERE mk_id = '$mk_id'";
        $data = $this->db->query($sql);
        $isi = $data->result_array();
        return $isi;
    }
}
?>