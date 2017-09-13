		<?php
		defined('BASEPATH') OR exit('No direct script access allowed');

		class Auth extends CI_Controller {
			function __construct() {
				parent::__construct();
				$data = array();
				$this->load->database();
				$this->load->helper('url');

				$this->load->library(array('form_validation','session'));

				$this->load->model('admin_model');
		}
			
			public function validate()
		{	
			$this->form_validation->set_rules('email','Email','required|valid_email|trim');
			$this->form_validation->set_rules('password','Password','required|min_length[6]|trim');
			  if ($this->form_validation->run()):
			if(!$this->admin_model->authcheck($_POST)):
				 $this->session->set_flashdata('error', 'Invalid Email/Password.');
				endif;
				else:
					$this->session->set_flashdata('error', validation_errors());
				endif;
				redirect("Main/index");
			}
		 }
