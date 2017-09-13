		<?php
		defined('BASEPATH') OR exit('No direct script access allowed');

		class Main extends CI_Controller {
			function __construct()
			{
				parent::__construct();
				$data = array();
				$this->load->database();
				$this->load->helper('url');
				$this->load->library(array('form_validation','session'));

			}
			
				public function index()
			{	
				if(!$this->session->userdata('admin_id')):
				$this->login();
				else:
				$data["Title"] = "Insert Blog";
				$data["action"] =  base_url('Post/Insert');
				$data["method"] = "POST";
					$this->load->view('admin',$data);
				endif;
			}


			public function login()
			{	 	
				$data["Title"] = "Login";
				$data["action"] =  base_url('Auth/Validate');
				$data["method"] = "POST";
				$this->load->view(__FUNCTION__,$data);
			}

		public function logout()
		{
			$this->session->sess_destroy();
			$this->index();
		}
	}
