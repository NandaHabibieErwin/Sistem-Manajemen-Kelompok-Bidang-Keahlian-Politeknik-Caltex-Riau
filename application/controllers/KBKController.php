<?php defined('BASEPATH') or exit('No direct script access allowed');
use Google\Service\Oauth2\Userinfo;
require_once APPPATH . '../vendor/autoload.php';

class KBKController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('kbkModel');
		$this->load->model('EventModel');

		$id_user = $this->session->userdata('user_id');


	}

	public function index($id_kbk)
	{
		if (!$this->session->userdata('user_info')) {
			// User is not logged in, redirect to the login view
			redirect('login');
		}
		$data['kbk'] = $this->kbkModel->getOneKbkById($id_kbk);
		$data['kegiatan'] = $this->EventModel->getEventbyKbkId($id_kbk);
		$data['kbkMember'] = $this->kbkModel->getKbkMember($id_kbk);
		$data['kbkpMember'] = $this->kbkModel->getKbkpMember($id_kbk);
		$data['user_info'] = $this->session->userdata('user_info');
		$this->load->view('kbk', $data);
	}

	public function addKBK()
	{
		if (!$this->session->userdata('user_info')) {
			// User is not logged in, redirect to the login view
			redirect('login');
		}

		$nama_kbk = ($this->input->post('nama_kbk')); // Convert to integer
		$dana_kbk = $this->input->post('dana_kbk');

		$data = array(
			'nama_kbk' => $nama_kbk,
			'dana_kbk' => $dana_kbk,
		);
		$this->kbkModel->insertKBK($data);

	}

	public function assignKetua()
	{
		$id_user = intval($this->input->post('id_user'));
		$id_kbk = intval($this->input->post('id_kbk'));

		$this->load->model('KbkModel');
		$result = $this->kbkModel->assignKetuaKbk($id_user, $id_kbk);

		if ($result) {
			// Assignment successful
			echo "Ketua KBK assigned successfully.";
		} else {
			// Assignment failed
			echo "Failed to assign Ketua KBK.";
		}
	}

	public function displayKBK()
	{
		if (!$this->session->userdata('user_info')) {
			// User is not logged in, redirect to the login view
			redirect('login');
		}
		$data['kbk'] = $this->kbkModel->getKBKInfo();
		$data['user_info'] = $this->session->userdata('user_info');
		$this->load->view('history_kbk', $data);
	}

	public function updateDanaKBK($id_kbk)
{
	$nama_kbk = $_POST['nama_kbk'];
    $dana_kbk = $_POST['dana_kbk'];
    // Update the dana_kbk value in the kbk table
    $result = $this->kbkModel->setDanaKBK($id_kbk, $nama_kbk, $dana_kbk);
	

    if ($result) {
        echo "Dana KBK updated successfully";
		redirect('KBK/history');
    } else {
		echo $id_kbk;
        echo "Failed to update Dana KBK";
		redirect('KBK/history');
    }
}

public function deleteKBK($id_kbk)
{
	if ($this->input->is_ajax_request()) {
		$id_kbk = $this->input->post('id_kbk');
	    $result = $this->db->where('id_kbk', $id_kbk)->delete('kbk');
		}
		if ($result) {
			echo "success"; // Return a success message
		} else {
			echo "error"; // Return an error message
		}
	} 
}

