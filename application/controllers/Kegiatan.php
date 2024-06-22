<?php defined('BASEPATH') or exit('No direct script access allowed');
use Google\Service\Oauth2\Userinfo;
require_once APPPATH . '../vendor/autoload.php';
class Kegiatan extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('UserModel');
		$this->load->model('EventModel');
		$this->load->model('KbkModel');
		$this->load->model('kbkModel');
		$this->load->helper(array('url', 'form'));

		$id_user = $this->session->userdata('user_id');


	}

	public function index()
	{
		if (!$this->session->userdata('user_info')) {
			// User is not logged in, redirect to the login view
			redirect('login');
		}

		$data['kegiatan'] = $this->EventModel->getAllEvent();
		$data['user_info'] = $this->session->userdata('user_info');
		$this->load->view('kegiatan', $data);
	}

	public function add_event()
	{
		$id_user = intval($this->input->post('id_user')); // Convert to integer
		$judul_event = $this->input->post('judul_event');
		$jadwal = $this->input->post('jadwal');
		$tempat = $this->input->post('tempat');
		$jenis = $this->input->post('jenis');

		// Retrieve the id_kbk from the users table
		$user = $this->UserModel->getUserById($id_user);
		$id_kbk = $user->id_kbk;

		$data = array(
			'id_user' => $id_user,
			'judul_event' => $judul_event,
			'jadwal' => $jadwal,
			'tempat' => $tempat,
			'jenis' => $jenis,
			'id_kbk' => $id_kbk,
		);
		$this->EventModel->insertEvent($data);
	}

	public function approve_event()
	{
		// Retrieve the id_pengajuanevent from the table
		$id_pengajuanevent = $this->input->post('id_pengajuanevent');

		// Get the daftar record by id_daftar
		$row = $this->EventModel->getPendingById($id_pengajuanevent);

		if ($row) {
			$id_pengajuanevent = $row['id_pengajuanevent'];

			// Update the user record in the users table based on id_user
			$data = array(
				'id_user' => $row['id_user'],
				'id_kbk' => $row['id_kbk'],
				'judul_event' => $row['judul_event'],
				'jadwal' => $row['jadwal'],
				'tempat' => $row['tempat'],
				'jenis' => $row['jenis'],
			);

			$this->db->insert('event', $data);
			$this->db->where('id_pengajuanevent', $id_pengajuanevent)->update('pengajuan_event', array('status' => 'Disetujui'));

			// Return a response indicating the success of the update process
			echo "KBK and KBKP copied successfully to the users table";
		} else {
			// Return a response indicating that the daftar record was not found
			echo "Daftar record not found";
		}
	}

	public function add_ajukan_event()
	{
		// Retrieve form data
		$id_user = intval($this->input->post('id_user'));
		$judul_event = $this->input->post('judul_event');
		$jadwal = $this->input->post('jadwal');
		$tempat = $this->input->post('tempat');
		$jenis = $this->input->post('jenis');
	
		// File upload configuration
		$config['upload_path'] = './assets/proposal';
		$config['allowed_types'] = 'pdf|docx';
		$config['max_size'] = 10240;
		$this->load->library('upload', $config);
	
		// Retrieve the files
		$files = $_FILES['proposal'];
	
		$uploadedFiles = array();
		$errors = array();
	
		// Process each file
		foreach ($files['name'] as $key => $name) {
			$_FILES['userfile']['name'] = $files['name'][$key];
			$_FILES['userfile']['type'] = $files['type'][$key];
			$_FILES['userfile']['tmp_name'] = $files['tmp_name'][$key];
			$_FILES['userfile']['error'] = $files['error'][$key];
			$_FILES['userfile']['size'] = $files['size'][$key];
	
			if (!$this->upload->do_upload('userfile')) {
				$errors[] = $this->upload->display_errors();
			} else {
				$data = $this->upload->data();
				$uploadedFiles[] = $data['file_name'];
			}
		}
	
		// Retrieve the user's id_kbk and id_kbkp
		$id_kbk = $this->input->post('id_kbk');
		$id_kbkp = $this->input->post('id_kbkp');
	
		// Retrieve the current page's kbk
		$currentKbk = $this->input->post('id_kbkk');
	
		if($currentKbk == $id_kbk)
		{
			$kbkPost = $currentKbk;
		}
	
		else if ($currentKbk == $id_kbkp)
		{
			$kbkPost = $currentKbk;
		}
	
		// Prepare the data for insertion
		$data = array(
			'id_user' => $id_user,
			'judul_event' => $judul_event,
			'jadwal' => $jadwal,
			'tempat' => $tempat,
			'jenis' => $jenis,
			'id_kbk' => $kbkPost,
			'proposal' => implode(',', $uploadedFiles)
		);
	
		// Insert the event data
		$this->EventModel->insertAjukanEvent($data);
	}

	
	public function deletePengajuanEvent()
	{
		if ($this->input->is_ajax_request()) {
			$id_pengajuanevent = $this->input->post('id_pengajuanevent');
			$result = $this->EventModel->deletePengajuanEvent($id_pengajuanevent);

			if ($result) {
				echo "success"; // Return a success message
			} else {
				echo "error"; // Return an error message
			}
		} else {
			echo "Invalid request";
		}
	}

	public function displayAllEvent()
	{

		if (!$this->session->userdata('user_info')) {
			// User is not logged in, redirect to the login view
			redirect('login');
		}
		$data['kbk'] = $this->kbkModel->getKBKInfo();
		$data['kegiatan'] = $this->EventModel->getAllEvent();

		$data['user_info'] = $this->session->userdata('user_info');
		$this->load->view('kegiatan_semua', $data);
	}

	public function daftarEvent()
	{
		$id_event = intval($this->input->post('id_event'));
		$id_user = intval($this->input->post('id_user'));
		$id_kbk = intval($this->input->post('id_kbk'));

		
		$result = $this->EventModel->setDaftarEvent($id_event, $id_user, $id_kbk);

		if ($result) {
			// Assignment successful
			echo "Terdaftar.";
		} else {
			// Assignment failed
			echo "Failed to assign Ketua KBK.";
		}
	}

	public function displayHistoryEvent()
	{
		if (!$this->session->userdata('user_info')) {
			// User is not logged in, redirect to the login view
			redirect('login');
		}
		$data['kegiatan'] = $this->EventModel->getAllEvent();
		$data['user_info'] = $this->session->userdata('user_info');
		$this->load->view('history_event', $data);
	}

	public function displayHistoryPengajuanEvent()
	{
		if (!$this->session->userdata('user_info')) {
			// User is not logged in, redirect to the login view
			redirect('login');
		}
		$data['kegiatan'] = $this->EventModel->getAllPengajuanEvent();
		$data['user_info'] = $this->session->userdata('user_info');
		$this->load->view('history_pengajuan_event', $data);
	}


	public function displayReview()
	{
		if (!$this->session->userdata('user_info')) {
			// User is not logged in, redirect to the login view
			redirect('login');
		}
		$data['kbk'] = $this->kbkModel->getKBKInfo();
		$data['kegiatan'] = $this->EventModel->getReviewPa();
		$data['user_info'] = $this->session->userdata('user_info');
		$this->load->view('review_pa', $data);
	}

	
	public function displaySharing()
	{
		if (!$this->session->userdata('user_info')) {
			// User is not logged in, redirect to the login view
			redirect('login');
		}
		$data['kbk'] = $this->kbkModel->getKBKInfo();
		$data['kegiatan'] = $this->EventModel->getSharingSession();
		$data['user_info'] = $this->session->userdata('user_info');
		$this->load->view('sharing_session', $data);
	}
	
	public function displaySeminar()
	{
		if (!$this->session->userdata('user_info')) {
			// User is not logged in, redirect to the login view
			redirect('login');
		}
		$data['kbk'] = $this->kbkModel->getKBKInfo();
		$data['kegiatan'] = $this->EventModel->getSeminar();
		$data['user_info'] = $this->session->userdata('user_info');
		$this->load->view('seminar', $data);
	}

	public function displayDaftarEvent()
	{
		if (!$this->session->userdata('user_info')) {
			// User is not logged in, redirect to the login view
			redirect('login');
		}
		$data['kegiatan'] = $this->EventModel->getAllDaftarEvent();
		$data['user_info'] = $this->session->userdata('user_info');
		$this->load->view('history_daftar_event', $data);
	}

	public function displayOneEvent($id_event)
	{
		if (!$this->session->userdata('user_info')) {
			// User is not logged in, redirect to the login view
			redirect('login');
		}
		$data['kegiatan'] = $this->EventModel->getOneEvent($id_event);
		$data['kbk'] = $this->kbkModel->getKBKInfo();
		$data['daftar'] = $this->EventModel->getAllDaftarEventByEvent($id_event);
		$data['user_info'] = $this->session->userdata('user_info');
		$this->load->view('kegiatansatu', $data);
	}

	public function displayPengajuanEventByKbk($id_kbk)
	{
		if (!$this->session->userdata('user_info')) {
			// User is not logged in, redirect to the login view
			redirect('login');}
		$data['kegiatan'] = $this->EventModel->getPengajuanEventByKbk($id_kbk);
		$data['user_info'] = $this->session->userdata('user_info');
		$this->load->view('history_pengajuan_event_ketua', $data);
	}

	public function uploadDokumentasi()
	{
		$config['upload_path'] = './assets/';
		$config['allowed_types'] = 'pdf|png|jpg';
		$config['max_size'] = 10240;

		$this->load->library('upload', $config);

		$files = $_FILES['notulensi'];

		$uploadedFiles = array();
		$errors = array();

		foreach ($files['name'] as $key => $name) {
			$_FILES['notulensi[]']['name'] = $files['name'][$key];
			$_FILES['notulensi[]']['type'] = $files['type'][$key];
			$_FILES['notulensi[]']['tmp_name'] = $files['tmp_name'][$key];
			$_FILES['notulensi[]']['error'] = $files['error'][$key];
			$_FILES['notulensi[]']['size'] = $files['size'][$key];

			if (!$this->upload->do_upload('notulensi[]')) {
				$errors[] = $this->upload->display_errors();
			} else {
				$data = $this->upload->data();
				$uploadedFiles[] = $data['file_name'];
			}
		}

		if (!empty($errors)) {
			echo json_encode(array('error' => $errors));
		} else {
			// Save the file information to the database or perform any other required operations
			$id_event = $this->input->post('id_event');
			$danaUsed = $this->input->post('danaUsed');
			$this->EventModel->uploadDokumentasi($id_event, $uploadedFiles);
			$this->EventModel->updateDanaUsed($id_event, $danaUsed);
			var_dump($danaUsed);
			echo json_encode(array('success' => 'Files uploaded successfully.'));
		}
	}

	public function getNotulensi($id_event)
	{
		$images = $this->EventModel->getNotulensiById($id_event);

		if ($images) {
			$imagePaths = array();

			foreach ($images as $image) {
				$fileNames = explode(',', $image['notulensi']);

				foreach ($fileNames as $fileName) {
					$imagePath = base_url('assets/' . trim($fileName));
					$imagePaths[] = $imagePath;
				}
			}

			echo json_encode($imagePaths);
		} else {
			echo json_encode(array('message' => 'Belum ada Dokumentasi'));
		}
	}
}
