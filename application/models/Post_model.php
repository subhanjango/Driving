<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post_model extends CI_Model {

	public $tableName;
	public $pKey;


	function __construct()
	{
		$this->tableName = "posts";
		$this->pKey = $this->tableName."_id";
		parent::__construct();

	}

	public function create(){
		$Title = trim(ucfirst($this->input->post('title')));
		$Blog  = trim($this->input->post('blog'));
		$data = [$this->tableName.'_title' => $Title , $this->tableName.'_content' => $Blog];
		$this->db->insert($this->tableName,$data);
		return true;
		}
	}