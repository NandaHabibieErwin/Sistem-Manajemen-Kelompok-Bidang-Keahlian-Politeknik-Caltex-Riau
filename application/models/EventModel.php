<?php
class EventModel extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAllEvent()
	{
		$query = $this->db->query('SELECT event.id_event, users.name, kbk.nama_kbk, event.judul_event, event.jadwal, event.tempat, event.jenis
			FROM event
			JOIN users ON users.id_user = event.id_user
			JOIN kbk ON kbk.id_kbk = event.id_kbk
			ORDER BY event.jadwal DESC');
		return $query->result_array();
	}

	public function getUserFollowEvent($id_user, $id_event)
    {
		$this->db->where('id_user', $id_user);
        $this->db->where('id_event', $id_event);
        $query = $this->db->get('daftar_event');
        
        return $query->num_rows() > 0; // Return true if the user has followed the event
    }

	public function getEventbyKbkId($id_kbk)
	{
		$query = $this->db->query("SELECT event.id_event, users.name, kbk.nama_kbk, event.judul_event, event.jadwal, event.tempat, event.notulensi, event.jenis, event.danaUsed
			FROM event
			JOIN users ON users.id_user = event.id_user
			JOIN kbk ON kbk.id_kbk = event.id_kbk WHERE kbk.id_kbk = $id_kbk
			ORDER BY event.jadwal DESC");
		return $query->result_array();
	}

	public function getReviewPa()
	{
		$query = $this->db->query("SELECT event.id_event, users.name, kbk.nama_kbk, event.judul_event, event.jadwal, event.tempat, event.notulensi, event.jenis, event.danaUsed
			FROM event
			JOIN users ON users.id_user = event.id_user
			JOIN kbk ON kbk.id_kbk = event.id_kbk WHERE event.jenis = 'Review PA'
			ORDER BY event.jadwal DESC");
		return $query->result_array();
	}

	public function getSharingSession()
	{
		$query = $this->db->query("SELECT event.id_event, users.name, kbk.nama_kbk, event.judul_event, event.jadwal, event.tempat, event.notulensi, event.jenis, event.danaUsed
			FROM event
			JOIN users ON users.id_user = event.id_user
			JOIN kbk ON kbk.id_kbk = event.id_kbk WHERE event.jenis = 'Sharing Session'
			ORDER BY event.jadwal DESC");
		return $query->result_array();
	}

	public function getSeminar()
	{
		$query = $this->db->query("SELECT event.id_event, users.name, kbk.nama_kbk, event.judul_event, event.jadwal, event.tempat, event.notulensi, event.jenis, event.danaUsed
			FROM event
			JOIN users ON users.id_user = event.id_user
			JOIN kbk ON kbk.id_kbk = event.id_kbk WHERE event.jenis = 'Seminar'
			ORDER BY event.jadwal DESC");
		return $query->result_array();
	}

	public function getAllPengajuanEvent()
	{
		$query = $this->db->query('SELECT pengajuan_event.id_pengajuanevent, users.name, kbk.nama_kbk, pengajuan_event.judul_event, pengajuan_event.jadwal, pengajuan_event.tempat, kbk.id_kbk, users.id_kbkp, pengajuan_event.jenis, pengajuan_event.proposal, pengajuan_event.status
		FROM pengajuan_event, users, kbk
		WHERE users.id_user = pengajuan_event.id_user AND pengajuan_event.id_kbk = kbk.id_kbk 
		ORDER BY pengajuan_event.jadwal DESC');
		return $query->result_array();
	}

	public function getPengajuanEventByKbk($id_kbk)
	{
		$query = $this->db->query("SELECT pengajuan_event.id_pengajuanevent, users.name, kbk.nama_kbk, pengajuan_event.judul_event, pengajuan_event.jadwal, pengajuan_event.tempat, kbk.id_kbk, users.id_kbkp, pengajuan_event.jenis, pengajuan_event.proposal, pengajuan_event.status
		FROM pengajuan_event, users, kbk
		WHERE users.id_user = pengajuan_event.id_user AND pengajuan_event.id_kbk = kbk.id_kbk and kbk.id_kbk = $id_kbk
		ORDER BY pengajuan_event.jadwal DESC");
		return $query->result_array();
	}

	public function getAllDaftarEvent()
	{
		$query = $this->db->query('SELECT daftar_event.id_daftarevent, event.judul_event, users.name, kbk.nama_kbk, daftar_event.jadwal_ikut
			FROM daftar_event
			JOIN event ON event.id_event = daftar_event.id_event
			JOIN users ON users.id_user = daftar_event.id_user
			JOIN kbk ON kbk.id_kbk = users.id_kbk
			ORDER BY daftar_event.jadwal_ikut DESC');
		return $query->result_array();
	}

	//Sorting
	public function getDaftarEventbyKbk()
	{
		$query = $this->db->query('SELECT daftar_event.id_daftarevent, event.judul_event, users.name, kbk.nama_kbk, daftar_event.jadwal_ikut
			FROM daftar_event
			JOIN event ON event.id_event = daftar_event.id_event
			JOIN users ON users.id_user = daftar_event.id_user
			JOIN kbk ON kbk.id_kbk = users.id_kbk
			WHERE daftar_event.id_kbk = kbk.id_kbk
			ORDER BY daftar_event.jadwal_ikut DESC');
		return $query->result_array();
	}

	//Sorting
	public function getAllDaftarEventByEvent($id_event)
	{
		$query = $this->db->query("SELECT daftar_event.id_daftarevent, event.judul_event, users.name, kbk.nama_kbk, daftar_event.jadwal_ikut
			FROM daftar_event
			JOIN event ON event.id_event = daftar_event.id_event
			JOIN users ON users.id_user = daftar_event.id_user
			JOIN kbk ON kbk.id_kbk = users.id_kbk
			WHERE daftar_event.id_event = $id_event
			ORDER BY daftar_event.jadwal_ikut DESC");
		return $query->result_array();
	}

	public function getStatusMessage($id_event)
	{
		$query = $this->db->select('status_message, danaUsed')->where('id_event', $id_event)->get('event');
		$result = $query->row_array();
		return $result;
	}

	public function updateDanaUsed($id_event, $danaUsed)
	{
		$this->db->set('danaUsed', $danaUsed);
		$this->db->where('id_event', $id_event);
		$this->db->update('event');
	}

	public function getOneEvent($id_event)
	{
		$query = $this->db->query("SELECT id_event, users.name, judul_event, jadwal, tempat, jenis, event.id_kbk, danaUsed, event.notulensi
			FROM event, users, kbk
			WHERE users.id_user = event.id_user AND id_event = $id_event AND kbk.id_kbk = event.id_kbk ORDER BY jadwal DESC");
		return $query->result_array();
	}

	public function insertEvent($data)
	{
		$id_user = $data['id_user'];
		$id_kbk = $data['id_kbk']; // Retrieve id_kbk from the data array

		// Check if the foreign key values exist in the referenced tables
		if (
			$this->db->where('id_user', $id_user)->get('users')->num_rows() > 0 &&
			$this->db->where('id_kbk', $id_kbk)->get('kbk')->num_rows() > 0
		) {
			// Insert the data into the "event" table
			$this->db->insert('event', $data);

			// Return the inserted data
			return $data;
		} else {
			// Handle the case when foreign key values don't exist
			return false;
		}
	}

	public function deletePengajuanEvent($id_pengajuanevent)
	{
		return $result = $this->db->where('id_pengajuanevent', $id_pengajuanevent)->update('pengajuan_event', array('status' => 'Ditolak'));
		return $result;
	}

	public function insertAjukanEvent($data)
	{
		$id_user = $data['id_user'];
		$id_kbk = $data['id_kbk'];

		// Check if the foreign key values exist in the referenced tables
		if (
			$this->db->where('id_user', $id_user)->get('users')->num_rows() > 0 &&
			$this->db->where('id_kbk', $id_kbk)->get('kbk')->num_rows() > 0
		) {
			// Insert the data into the "pengajuan_event" table
			$this->db->insert('pengajuan_event', $data);

			// Return the inserted data
			return $data;
		} else {
			// Handle the case when foreign key values don't exist
			return false;
		}
	}

	public function setDaftarEvent($id_event, $id_user, $id_kbk)
	{
		$data = array(
			'id_event' => $id_event,
			'id_user' => $id_user,
			'id_kbk' => $id_kbk,
			'jadwal_ikut' => date('Y-m-d H:i:s')
		);
	
		$this->db->insert('daftar_event', $data);
	
		return true; // Return true to indicate successful insertion
	}



	public function getPendingById($id_pengajuanevent)
	{
		return $this->db->get_where('pengajuan_event', array('id_pengajuanevent' => $id_pengajuanevent))->row_array();
	}

	public function uploadDokumentasi($id_event, $filenames)
	{
		$data = array(
			'notulensi' => implode(',', $filenames)
		);

		$this->db->where('id_event', $id_event);
		$this->db->update('event', $data);
	}

	public function deductDana($id_kbk, $danaUsed)
	{
		$this->db->set('dana_kbk', "dana_kbk - $danaUsed", false);
		$this->db->where('id_kbk', $id_kbk);
		$this->db->update('kbk');
	}



	public function uploadProposal($id_event, $filenames)
	{
		$data = array(
			'notulensi' => implode(',', $filenames)
		);

		$this->db->insert('pengajuan_event', $data);
	}

	public function getNotulensiById($id_event)
	{
		$this->db->select('notulensi');
		$this->db->from('event');
		$this->db->where('id_event', $id_event);
		$query = $this->db->get();
		return $query->result_array();
	}

}
