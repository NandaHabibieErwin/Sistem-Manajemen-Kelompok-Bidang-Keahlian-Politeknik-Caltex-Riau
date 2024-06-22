<?php
class KbkModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getKbkData()
	{
		return $this->db->get('kbk')->result();

	}

	public function getNamaKbkById($id_kbk)
	{
		$this->db->select('nama_kbk');
		$this->db->from('kbk');
		$this->db->join('users u1', 'u1.id_kbk = kbk.id_kbk');
		$this->db->where('u1.id_kbk', $id_kbk);
		$query = $this->db->get();
		$result = $query->row_array();

		return $result['nama_kbk'];
	}

	public function getNamaKbkpById($id_kbkp)
	{
		$this->db->select('nama_kbk');
		$this->db->from('kbk');
		$this->db->join('users u2', 'u2.id_kbkp = kbk.id_kbk');
		$this->db->where('u2.id_kbkp', $id_kbkp);
		$query = $this->db->get();
		$result = $query->row_array();

		return $result['nama_kbk'];
	}

	public function insertKBK($data)
	{
		$this->db->insert('kbk', $data);
		// Return the inserted data
		return $data;
	}

	//left join, grouping, operator, 
	public function getKBKInfo()
	{
		$this->db->select('kbk.id_kbk, kbk.nama_kbk, kbk.dana_kbk, kbk.id_ketua, users.name, COUNT(users.id_user) AS user_count');
		$this->db->join('users', 'users.id_user = kbk.id_ketua', 'left'); // Join with users table based on id_ketua
		$this->db->from('kbk');
		$this->db->where('kbk.id_kbk > 0');
		$this->db->group_by('kbk.id_kbk, kbk.nama_kbk, kbk.dana_kbk, users.name'); // Include ketua_name in the group by
		$query = $this->db->get();
		return $query->result_array();
	}
	

	//left join
	public function getOneKbkById($id_kbk)
	{
		$query = $this->db->query("SELECT kbk.id_kbk, kbk.nama_kbk, kbk.dana_kbk, users.name, users.jabatan, kbk.id_ketua
		FROM kbk
		LEFT JOIN users ON kbk.id_ketua = users.id_user
		WHERE kbk.id_kbk = $id_kbk");
		return $query->row_array();
	}

	//Aggregate
	public function getKbkMemberCount($id_kbk)
	{
		$query = $this->db->query("SELECT count(id_user) as user_count from users where id_kbk = $id_kbk");
		return $query->row_array();
	}

		public function getKbkMember($id_kbk)
		{
			$query = $this->db->query("SELECT users.id_user, users.name, users.email, users.jabatan, kbk.id_kbk, kbk.nama_kbk, kbk.id_ketua
										from kbk, users
										WHERE (users.id_kbk = kbk.id_kbk OR users.id_kbkp = kbk.id_kbk) AND kbk.id_kbk = $id_kbk");
			return $query->result_array();
		}

	
	public function getKbkpMember($id_kbkp)
	{
		$query = $this->db->query("SELECT users.id_user, users.name, users.email, users.jabatan, kbk.id_kbk, kbk.nama_kbk, kbk.id_ketua
									from kbk, users
								 WHERE users.id_kbkp = kbk.id_kbk AND kbk.id_kbk = $id_kbkp");
		return $query->result_array();
	}
		

	public function setDanaKBK($id_kbk, $nama_kbk, $dana_kbk)
	{
		// Update the dana_kbk value in the kbk table
		$this->db->set('nama_kbk', $nama_kbk);
		$this->db->set('dana_kbk', $dana_kbk);
		$this->db->where('id_kbk', $id_kbk);
		$this->db->update('kbk');

		return $this->db->affected_rows() > 0;
	}

	public function assignKetuaKbk($id_user, $id_kbk)
	{
		$data = array(
			'id_ketua' => $id_user
		);

		$this->db->where('id_kbk', $id_kbk);
		$this->db->update('kbk', $data);

		return ($this->db->affected_rows() > 0);
	}

}
