<?php

	require_once("initialise.php");

	class session {

		public $session_id;
		public $admin_session_id;
		public $is_logged = false;
		public $is_admin_logged = false;


		public function __construct()
		{
			if(!isset($_SESSION)) {
				session_start();
			}

			$this->check_login();
			$this->check_admin_login();
		}


		public function login($user_id)
		{

			$this->session_id = $_SESSION["user_id"] = $user_id;
			$this->is_logged = true;

		}
		
		public function admin_login($user_id)
		{

			$this->admin_session_id = $_SESSION["admin_user_id"] = $user_id;
			$this->is_admin_logged = true;

		}

		public function logout($redirect_url)
		{

			if($this->is_logged) {
				unset($this->session_id);
				unset($_SESSION["user_id"]);
				$this->is_logged = false;
				header("Location: ".$redirect_url);
			}

		}
		
		public function logout_admin($redirect_url)
		{

			if($this->is_admin_logged) {
				unset($this->admin_session_id);
				unset($_SESSION["admin_user_id"]);
				$this->is_admin_logged = false;
				header("Location: ".$redirect_url);
			}

		}

		public function is_logged()
		{
			return $this->is_logged;
		}
		
		public function is_admin_logged()
		{
			return $this->is_admin_logged;
		}

		public function check_login()
		{

			if(isset($_SESSION["user_id"])) {
				$this->session_id = $_SESSION["user_id"];
				$this->is_logged = true;
			} else {
				unset($this->session_id);
				$this->is_logged = false;
			}

		}
		
		public function check_admin_login()
		{

			if(isset($_SESSION["admin_user_id"])) {
				$this->admin_session_id = $_SESSION["admin_user_id"];
				$this->is_admin_logged = true;
			} else {
				unset($this->admin_session_id);
				$this->is_admin_logged = false;
			}

		}

	}

	$session = new session();

?>