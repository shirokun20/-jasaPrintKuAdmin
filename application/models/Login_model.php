<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model 
{

	private $tabel = 'tb_user';
	
	public function auth($email = '')
	{
		$this->db->where('user_email', $email);
		$this->db->where('type_user_id', 1);
		$this->db->limit(1);
		return $this->db->get($this->tabel);
	}
}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */