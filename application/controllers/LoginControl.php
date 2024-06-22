<?php
if(! defined('BASEPATH')) exit ('no direct script access allowed');
use Google\Service\Oauth2;

class LoginControl extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel');
		$this->load->helper('url');
		$this->load->library('session');
		
		// $client = new Google_Client();
		// $client->setClientId('933157320422-r8f701c365jd035k4mq8l0l579megb67.apps.googleusercontent.com');
		// $client->setClientSecret('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');
		// $client->setRedirectUri('http://localhost/demo/login');
		// $client->setScopes(['email', 'profile']);
	}

	public function index(){
		if ($this->session->userdata('user_info')) {
			// Check if the OAuth menu is already displayed in the session
			$oauthMenuDisplayed = $this->session->userdata('oauth_menu_displayed');
	
			if (!$oauthMenuDisplayed) {
				// OAuth menu not displayed, redirect to the login view
				redirect('login');
			}
		}
		if ($this->session->userdata('user_info')) {
			// User is not logged in, redirect to the login view
			redirect('/');
		}
		$this->load->view('login');
	}

	public function loginWithGoogle()
	{
		// Load Google API library
		require_once APPPATH . '../vendor/autoload.php';

		// Set up your Google API credentials
		$client = new Google_Client();
		$client->setClientId('933157320422-r8f701c365jd035k4mq8l0l579megb67.apps.googleusercontent.com');
		$client->setClientSecret('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');
		$client->setRedirectUri('http://localhost/demo/login/handleGoogleCallback');
		$client->setScopes(['email', 'profile']);

		// Generate the Google login URL
		$authUrl = $client->createAuthUrl();

		// Redirect the user to the Google login URL
		redirect($authUrl);
	}

	public function loginadmin()
	{

		// Load Google API library
		require_once APPPATH . '../vendor/autoload.php';

		// Set up your Google API credentials
		$client = new Google_Client();
		$client->setClientId('933157320422-r8f701c365jd035k4mq8l0l579megb67.apps.googleusercontent.com');
		$client->setClientSecret('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');
		$client->setRedirectUri('http://localhost/demo/login/handleGoogleCallbackAdmin');
		$client->setScopes(['email', 'profile']);

		// Generate the Google login URL
		$authUrl = $client->createAuthUrl();

		// Redirect the user to the Google login URL
		redirect($authUrl);
	}

	public function handleGoogleCallback()
	{
		// Load Google API library
		require_once APPPATH . '../vendor/autoload.php';
	
		// Set up your Google API credentials
		$client = new Google_Client();
		$client->setClientId('933157320422-r8f701c365jd035k4mq8l0l579megb67.apps.googleusercontent.com');
		$client->setClientSecret('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');
		$client->setRedirectUri(base_url('login/handleGoogleCallback'));
		$client->setScopes(['email', 'profile']);
	
		// Handle the Google callback after authentication
		$code = $this->input->get('code');
		$client->fetchAccessTokenWithAuthCode($code);
		$token = $client->getAccessToken();
	
		// Verify the token and retrieve user information
		if ($this->input->get('code')) {
			$token = $client->fetchAccessTokenWithAuthCode($this->input->get('code'));
			$token = $client->getAccessToken();
	
			// Get user information from Google API
			$httpClient = $client->authorize();
			$googleService = new Google_Service_Oauth2($client);
			$googleService->getClient()->setHttpClient($httpClient);
			$userInfo = $googleService->userinfo->get();
	
			// Check if the user already exists in the database
			$user = $this->UserModel->getUserByGoogleId($userInfo->id);
	
			if (!$user) {
				// User doesn't exist, save the user data to the database
				$userData = array(
					'google_id' => $userInfo->id,
					'name' => $userInfo->name,
					'email' => $userInfo->email,
					'profile_image' => $userInfo->picture,	
				);
	
				$this->UserModel->createUser($userData);
	
				// Retrieve the user by Google ID
				$user = $this->UserModel->getUserByGoogleId($userInfo->id);
			}

			$user = $this->UserModel->getIdUserByGoogleId($userInfo->id);
			if ($user) {$this->UserModel->setAnggota($user->id_user);
				$user->Kajur = 0;}
	
			// Store user data in session
			$this->session->set_userdata('user_info', $user);
	
			// Redirect the user to the homepage or any other page
			redirect('/');
		} else {
			// Google login failed
			echo 'Google login failed.';
		}
	}

	public function handleGoogleCallbackAdmin()
	{
		// Load Google API library
		require_once APPPATH . '../vendor/autoload.php';
	
		// Set up your Google API credentials
		$client = new Google_Client();
		$client->setClientId('933157320422-r8f701c365jd035k4mq8l0l579megb67.apps.googleusercontent.com');
		$client->setClientSecret('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');
		$client->setRedirectUri(base_url('login/handleGoogleCallbackAdmin'));
		$client->setScopes(['email', 'profile']);
	
		// Handle the Google callback after authentication
		$code = $this->input->get('code');
		$client->fetchAccessTokenWithAuthCode($code);
		$token = $client->getAccessToken();
	
		// Verify the token and retrieve user information
		if ($this->input->get('code')) {
			$token = $client->fetchAccessTokenWithAuthCode($this->input->get('code'));
			$token = $client->getAccessToken();
	
			// Get user information from Google API
			$httpClient = $client->authorize();
			$googleService = new Google_Service_Oauth2($client);
			$googleService->getClient()->setHttpClient($httpClient);
			$userInfo = $googleService->userinfo->get();
	
			// Check if the user already exists in the database
			$user = $this->UserModel->getUserByGoogleId($userInfo->id);
	
			if (!$user) {
				// User doesn't exist, save the user data to the database
				$userData = array(
					'google_id' => $userInfo->id,
					'name' => $userInfo->name,
					'email' => $userInfo->email,
					'profile_image' => $userInfo->picture,	
					'Kajur' => 1,
				);
	
				$this->UserModel->createUser($userData);
	
				// Retrieve the user by Google ID
				$user = $this->UserModel->getUserByGoogleId($userInfo->id);
			}


			$user = $this->UserModel->getIdUserByGoogleId($userInfo->id);
if ($user) {
    $this->UserModel->setKajur($user->id_user);
	$user->Kajur = 1;
	
			// Store user data in session
			$this->session->set_userdata('user_info', $user);
	
			// Redirect the user to the homepage or any other page
			redirect('/');
		} else {
			// Google login failed
			echo 'Google login failed.';
		}
	} }

	public function logout()
{
    $this->session->sess_destroy();
    redirect('login');
}

}
