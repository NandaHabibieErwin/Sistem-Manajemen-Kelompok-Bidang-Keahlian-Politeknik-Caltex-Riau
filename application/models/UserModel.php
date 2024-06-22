<?php
if (!defined('BASEPATH'))
	exit('no direct script access allowed');
class UserModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function getUserByGoogleId($googleId)
	{
		return $this->db->where('google_id', $googleId)->get('users')->row();
	}

	public function getIdUserByGoogleId($googleId)
	{
		// Query the database to retrieve the user based on the Google ID
		$query = $this->db->get_where('users', array('google_id' => $googleId));
		$result = $query->row();
	
		return $result; }

	public function createUser($data)
	{
		return $this->db->insert('users', $data);
	}									
	
	public function getAllUsers()
	{
		return $this->db->get('users')->result();
	}

	public function getUsers()
	{
		$this->db->select('id_user, google_id, name, email, profile_image');
		$query = $this->db->get('users');
		return $query->result();
	}

	//Inner Join
	public function getAll()
	{
		$query = $this->db->query('SELECT dosen.name, kbk1.nama_kbk AS nama_kbk_id_kbk, kbk2.nama_kbk AS nama_kbk_id_kbkp, matkul, judul, tanggal
			FROM users dosen
			JOIN daftar daftar ON dosen.id_user = daftar.id_user
			JOIN kbk kbk1 ON kbk1.id_kbk = daftar.id_kbk
			JOIN kbk kbk2 ON kbk2.id_kbk = daftar.id_kbkp');
		return $query->result_array();
	}

	public function getUserById($userId)
	{
		return $this->db->where('id_user', $userId)->get('users')->row();
	}

	public function updateUserKBK($id_user, $id_kbk, $id_kbkp)
	{
		// Update the users table with the provided KBK and KBKP values based on id_user
		$this->db->set('id_kbk', $id_kbk);
		$this->db->set('id_kbkp', $id_kbkp);
		$this->db->set('jabatan', 'Anggota');
		$this->db->where('id_user', $id_user);
		$this->db->update('users');
	}

	public function setKajur($id_user)
	{
		$this->db->set('Kajur', 1);
		$this->db->where('id_user', $id_user);
		$this->db->update('users');
		return $id_user;
	}

	public function setAnggota($id_user)
	{
		$this->db->set('Kajur', 0);
		$this->db->where('id_user', $id_user);
		$this->db->update('users');
		return $id_user;
	}

	public function getUsersInfo()
	{
		$query = $this->db->query('SELECT dosen.id_user, dosen.name, kbk1.nama_kbk AS nama_kbk_id_kbk, kbk2.nama_kbk AS nama_kbk_id_kbkp, email, kbk1.id_kbk, dosen.jabatan
				FROM users dosen
				JOIN kbk kbk1 ON kbk1.id_kbk = dosen.id_kbk
				JOIN kbk kbk2 ON kbk2.id_kbk = dosen.id_kbkp');
		return $query->result_array();
	}

}
