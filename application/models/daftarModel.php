<?php
class daftarModel extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Inner Join
		public function getAllDaftar()
		{
			$query = $this->db->query('SELECT id_daftar, dosen.id_user, dosen.name, daftar.id_kbk, daftar.id_kbkp, kbk1.nama_kbk AS nama_kbk_id_kbk, kbk2.nama_kbk AS nama_kbk_id_kbkp, matkul, judul, tanggal, status
				FROM users dosen
				JOIN daftar daftar ON dosen.id_user = daftar.id_user
				JOIN kbk kbk1 ON kbk1.id_kbk = daftar.id_kbk
				JOIN kbk kbk2 ON kbk2.id_kbk = daftar.id_kbkp
				ORDER BY tanggal DESC');
			return $query->result_array();
		}

	public function getDaftarTable()
	{
		$query = $this->db->get('daftar');
		$result = $query->result_array();
		return ['data' => $result];
	}
	

	public function getDaftarById($id_daftar)
	{
		$query = $this->db->get_where('daftar', array('id_daftar' => $id_daftar));
		return $query->row_array();
	}

	public function insertDaftar($data)
	{
		$id_user = $data['id_user'];
		$id_kbk = $data['id_kbk'];
		$id_kbkp = $data['id_kbkp'];

		// Check if the foreign key values exist in the referenced tables
		if (
			$this->db->where('id_user', $id_user)->get('users')->num_rows() > 0
		) {

			// Insert the data into the "daftar" table
			$this->db->insert('daftar', $data);
			
			

			// Return the inserted data
			return $data;
		} else {
			// Handle the case when foreign key values don't exist
			return false;
		}
	}

	public function tolakDaftar($id_daftar)
	{
		$this->db->where('id_daftar', $id_daftar);
		return $result = $this->db->where('id_daftar', $id_daftar)->update('daftar', array('status' => 'Ditolak'));
		return $result;
	}

	public function updateDaftar(){}

}
