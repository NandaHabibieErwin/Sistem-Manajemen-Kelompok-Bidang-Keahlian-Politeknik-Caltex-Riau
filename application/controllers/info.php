<?php

class info extends CI_Controller
{
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
            redirect('login');}
		//$data = array('kbk' => $kbk);
		$this->load->view('info');
	}
}
