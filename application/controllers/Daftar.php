<?php 
defined('BASEPATH') or exit('No direct script access allowed');
use Google\Service\Oauth2\Userinfo;
require_once APPPATH . '../vendor/autoload.php';

class Daftar extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('kbkModel');
		$this->load->model('daftarModel');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('UserModel');

		$id_user = $this->session->userdata('user_id');


		


	}
	public function index()
	{
		if (!$this->session->userdata('user_info')) {
			// User is not logged in, redirect to the login view
			redirect('login');
		}
		$userInfo = $this->session->userdata('user_info');
		// Load other data and view
		$data['kbk'] = $this->kbkModel->getKbkData(); // Fetch KBK data using the kbkModel
		$data['dataKBK'] = $this->kbkModel->getKbkInfo();
		$data['user_info'] = $this->session->userdata('user_info');
		$this->load->view('daftar', $data);
	}

	public function add_daftar()
	{

		$this->load->model('daftarModel');

		$id_user = intval($this->input->post('id_user')); // Convert to integer
		$id_kbk = intval($this->input->post('id_kbk')); // Convert to integer
		$id_kbkp = intval($this->input->post('id_kbkp')); // Convert to integer
		$matkul = $this->input->post('matkul');
		$judul = $this->input->post('judul');
		$tanggal = $this->input->post('tanggal');

		$data = array(
			'id_user' => $id_user,
			'id_kbk' => $id_kbk,
			'id_kbkp' => $id_kbkp,
			'matkul' => $matkul,
			'judul' => $judul,
			'tanggal' => date('Y-m-d H:i:s')
		);
		$this->daftarModel->insertDaftar($data);
	}

	public function history()
	{
		if (!$this->session->userdata('user_info')) {
			// User is not logged in, redirect to the login view
			redirect('login');
		}
		$users = $this->UserModel->getAllUsers();
		$data['user_info'] = $this->session->userdata('user_info');
		$data['data'] = $this->daftarModel->getAllDaftar();
		$this->load->view('history_daftar', $data);
	}

	public function updateDaftar()
	{
		$id_daftar = $this->input->post('id_daftar');
	
		// Get the daftar record by id_daftar
		$daftar = $this->daftarModel->getDaftarById($id_daftar);
	
		if ($daftar) {
			$id_user = $daftar['id_user'];
			$id_kbk = $daftar['id_kbk'];
			$id_kbkp = $daftar['id_kbkp'];
	
			// Update the user record in the users table based on id_user
			$this->UserModel->updateUserKBK($id_user, $id_kbk, $id_kbkp);
			$this->db->where('id_daftar', $id_daftar)->update('daftar', array('status' => 'Disetujui'));
			$user_info = $this->session->userdata('user_info');
			$user_info['id_kbk'] = $id_kbk;
			$user_info['id_kbkp'] = $id_kbkp;
			$this->session->set_userdata('user_info', $user_info);
	
			// Return a response indicating the success of the update process
			echo "KBK and KBKP copied successfully to the users table";
		} else {
			// Return a response indicating that the daftar record was not found
			echo "Daftar record not found";
		}
	}

	public function tolakDaftar()
	{
		// Check if the request is made using AJAX
		if ($this->input->is_ajax_request()) {
			$id_daftar = $this->input->post('id_daftar');
			$daftar = $this->daftarModel->getDaftarById($id_daftar);
			if ($daftar) {
				$id_user = $daftar['id_user'];
			// Delete the daftar record
			$result = $this->daftarModel->tolakDaftar($id_daftar);
        
	}
	
}
} }
