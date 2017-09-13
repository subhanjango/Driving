	<?php defined('BASEPATH') OR exit('No direct script access allowed');

		class Post extends CI_Controller {
			function __construct()
			{
				parent::__construct();
				$data = array();
				$this->load->database();
				$this->load->helper('url');
				$this->load->library(array('form_validation','session'));
				$this->load->model('post_model');


			}

			public function insert(){
			$rules = array(
       		 array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'required|min_length[5]|is_unique[posts.posts_title]'
        	),
       		 array(
                'field' => 'blog',
                'label' => 'Blog',
                'rules' => 'required|min_length[30]|is_unique[posts.posts_content]',
                
        		)
			);
				$this->form_validation->set_rules($rules);
				if($this->form_validation->run()):
				if($this->post_model->create()):
				$this->session->set_flashdata('msg', '<p style="color:green">Blog Inserted</p>');
				else:
				$this->session->set_flashdata('msg', '<p style="color:red">Error ! Try again.</p>');
				endif;
				else:
				$this->session->set_flashdata('msg','<p style="color:red">'.validation_errors().'</p>');
				endif;
				redirect("Main/index");
			}

			public function view()
			{
				$data=$this->post_model->get();
				if(is_array($data) && !empty($data)):
					$this->load->view('admin/view',$data);
				endif;
			}

			public function delete(){
				echo 1;
			}
		}