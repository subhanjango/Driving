<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public $tableName;
	public $pKey;

	 
	function __construct()
	{
		$this->tableName = "admin";
		$this->pKey = $this->tableName."_id";
		parent::__construct();

	}
	function authcheck($data){
		if(is_array($data)):
		$this->db->from($this->tableName);
		$this->db->select($this->pKey);
		$this->db->where('admin_email', $data['email']);
		$this->db->where('admin_password', $data['password']);
		$q=$this->db->get();
			if($q->num_rows() > 0):
			$this->session->set_userdata('admin_id',$q->result());
			return true;
			else:
			return false;
		endif;
	endif;
	}
}