<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	// Tabel
	private $table = 'tb_user u';
	private $table_type = 'tb_type_user t';
	private $table_status = 'tb_status_user s';
	// Pengurutan
	private $columnOrder 	= [
		'u.user_id', 
		'u.user_nama', 
		'u.user_email', 
		'u.user_phone',
		't.type_user_nama',
		's.status_user_nama',
		null,
	];
	// Pencarian
	private $columnSearch 	= [
		'u.user_id', 
		'u.user_nama', 
		'u.user_email', 
		'u.user_phone',
		't.type_user_nama',
		's.status_user_nama',
	];
	// Urukan
	private $orderBy 		= ['u.user_id' => 'DESC'];
	// Select field
	private function _setSelect()
	{
		$this->db->select('u.*');
		$this->db->select('t.type_user_nama');
		$this->db->select('s.status_user_nama');
	}
	// Relasi
	private function _setJoin()
	{
		$this->db->join($this->table_type, 't.type_user_id = u.type_user_id');
		$this->db->join($this->table_status, 's.status_user_id = u.status_user_id');
	}
	// 
	public function _setWhere()
	{
		$type_user_id = $this->input->post('type_user_id');
		if ($type_user_id != 0) {
			$this->db->where('u.type_user_id', $type_user_id);
		}
	}
	// 
	private function _setLimit()
	{
		$limit = $this->input->post('length') + 1 + $this->input->post('start');
		$this->db->limit($limit);
	}
	// 
	private function _getBuilder()
	{
		$this->_setSelect();
		$this->_setJoin();
		$this->_setWhere();
		$this->_setLimit();
		$this->db->from($this->table);
		$this->datatables->generate($this->columnOrder, $this->columnSearch, $this->orderBy);
	}
	// 
	private function _countResult() 
	{
		$this->_setWhere();
		return $this->db->count_all_results($this->table);
	}
	// 
	private function _statusUser($status_user_nama, $status_user_id = 1) 
	{
		if ($status_user_id == 1) {
			return '<b style="color: green">'.$status_user_nama.'</b>';
		} else {
			return '<b style="color: red">'.$status_user_nama.'</b>';
		}
	}
	// 
	private function _buttonUser($data) 
	{
		$button = '<div class="dropdown-primary dropdown open">';
        $button .= '<button class="btn btn-primary dropdown-toggle waves-effect waves-light" type="button" id="dropdown-'.$data->user_id.'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Aksi</button>';
        $button .= '<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-'.$data->user_id.'" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">';
        $button .= '<a class="dropdown-item waves-light waves-effect" href="#">Detail</a>';
        $button .= '<a class="dropdown-item waves-light waves-effect" href="#">Edit</a>';
        $button .= '<div class="dropdown-divider"></div>';
        $button .= '<a class="dropdown-item waves-light waves-effect" href="#">Hapus</a>';
        $button .= '</div>';
        $button .='</div>';
        return $button;
	}
	// 
	public function getDataTables()
	{
		$query 	= $this->datatables->getResult($this->_getBuilder());
		$data 	= array();
		$start  = $this->input->post('start');
		$no  	= $start + 1;
		foreach ($query as $field) {
		    $row    = array();
		    $row[]  = $no++;
	   	 	$row[]	= $field->user_nama ? ucwords($field->user_nama) : '-';
	   	 	$row[]	= $field->user_email ? $field->user_email : '-';
	   	 	$row[]	= strlen($field->user_phone) > 0 ? $field->user_phone : '-';
	   	 	$row[]	= $field->type_user_nama ? $field->type_user_nama : '-';
	   	 	$row[]	= $field->status_user_nama ? $this->_statusUser($field->status_user_nama, $field->status_user_id) : '-';
		    $row[]	= $this->_buttonUser($field);
		    $data[] = $row;
		}

		$output = [
			'draw' 				=> $this->input->post('draw'), 
			'recordsTotal' 	 	=> $this->_countResult(), 
			'recordsFiltered'	=> $this->db->get($this->_getBuilder())->num_rows(), 
			'data' 				=> $data, 
		];

		return $output;
	}

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */