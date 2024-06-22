<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Google\Service\Oauth2\Userinfo;		require_once APPPATH . '../vendor/autoload.php';
class userController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 public function __construct()
	 {
		 parent::__construct();
		 $this->load->model('UserModel');
		 $this->load->model('KbkModel');
		 $this->load->model('kbkModel');
		 $this->load->helper('url');
		 $this->load->library('session');

		 $id_user = $this->session->userdata('user_id');

	 }
	public function index()
	{
		if (!$this->session->userdata('user_info')) {
            // User is not logged in, redirect to the login view
            redirect('login');}
		$this->load->model('UserModel');
		$users = $this->UserModel->getAllUsers();
		$data['user_info'] = $this->session->userdata('user_info');
		$this->load->view('main', $data);
	}

	public function profile()
	{
		if (!$this->session->userdata('user_info')) {
			// User is not logged in, redirect to the login view
			redirect('login');
		}
	
		// Get the current user's id from the session
		$id_user = $this->session->userdata('user_info')->id_user;
	
		// Get the user's id_kbk and id_kbkp from the users table
		$user = $this->UserModel->getUserById($id_user);
		$id_kbk = $user->id_kbk;
		$id_kbkp = $user->id_kbkp;
	
		// Get the nama_kbk based on id_kbk and id_kbkp
		$data['nama_kbk_id_kbk'] = $this->KbkModel->getNamaKbkById($id_kbk);
		$data['nama_kbk_id_kbkp'] = $this->KbkModel->getNamaKbkpById($id_kbkp);
	
		// Pass the user_info data to the view
		$data['user_info'] = $this->session->userdata('user_info');
	
		// Load the profile view with the data
		$this->load->view('profile', $data);
	}

	public function displayUser()
	{
		if (!$this->session->userdata('user_info')) {
			// User is not logged in, redirect to the login view
			redirect('login');
		}
		$data['user_info'] = $this->session->userdata('user_info');
		$data['kbk'] = $this->kbkModel->getKbkData();
		$data['userinfo'] = $this->UserModel->getUsersInfo();
		$this->load->view('history_dosen', $data);
	}

}
