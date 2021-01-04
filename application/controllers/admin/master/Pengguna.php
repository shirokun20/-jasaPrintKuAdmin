<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->shiro_lib->cekLogin();
		$this->load->model('user_model', 'us');
	}

	public function index($type_user_id = 0)
	{
		$userType = 'Semua Pengguna';
		if ($type_user_id == 1) {
			$userType = 'Admin';
		} else if ($type_user_id == 2) {
			$userType = 'Konsumen';
		}
		$data = [
			'title' => 'Master Data',
		];
		$data['breadcrumb'] = [
				[
					'href' => true,
					'icon' => 'fa-user',
					'tujuan' => site_url('master/pengguna/'. $type_user_id),
					'title' => ''
				],
				[
					'href' => false,
					'icon' => '',
					'tujuan' => '',
					'title' => 'Data Pengguna'
				],
				[
					'href' => false,
					'icon' => '',
					'tujuan' => '',
					'title' => $userType
				]
		];
		
		$data['subtitle'] = 'Master Data ' . $userType;
		$data['type_user_nama'] = $userType;
		$data['type_user_id'] = $type_user_id;
		$this->shiro_lib->admin('master/pengguna/vPengguna', $data);
	}

	public function showDataPengguna() 
	{
		$data = $this->us->getDataTables();
		echo json_encode($data);
	}
}

/* End of file pengguna.php */
/* Location: ./application/controllers/admin/master/pengguna.php */
