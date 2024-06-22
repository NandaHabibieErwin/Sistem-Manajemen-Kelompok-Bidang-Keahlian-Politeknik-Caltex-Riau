<?php
defined('BASEPATH') or exit('No direct script access allowed');
use Google\Service\Oauth2\Userinfo;
require_once APPPATH . '../vendor/autoload.php';

class Main extends CI_Controller
{

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
		$this->load->helper('url');
		$this->load->library('session');

	}
	public function index()
	{
		if (!$this->session->userdata('user_info')) {
			// User is not logged in, redirect to the login view
			redirect('login');
		}
		$this->load->model('UserModel');
		$users = $this->UserModel->getAllUsers();
		$data['user_info'] = $this->session->userdata('user_info');
		$id_user = $this->session->userdata('id_user');
		$this->load->view('main', $data);
	}

	public function show_error()
	{
		
	}

}
