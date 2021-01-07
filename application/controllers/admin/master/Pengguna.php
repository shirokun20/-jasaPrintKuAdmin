<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->shiro_lib->cekLogin();
		$this->load->model('user_model', 'us');
		$this->load->model('semua_bisa_model', 'sb');
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
		$data['jumlah'] = [
			'total_pengguna' => $this->us->jumlah_pengguna(0),
			'total_admin' => $this->us->jumlah_pengguna(1),
			'total_konsumen' => $this->us->jumlah_pengguna(2),
		];
		$this->shiro_lib->admin('master/pengguna/vPengguna', $data);
	}

	public function showDataPengguna() 
	{
		$data = $this->us->getDataTables();
		echo json_encode($data);
	}

	public function getPengguna()
	{
		$input['user_id'] = $this->input->get('user_id');
		$ada = false;
		$output = '';
		if ($input['user_id'] !== '') {
			$q = $this->sb->mengambil('tb_user', $input);
			if ($q->num_rows() > 0) {
				$ada = true;
				$output = $q->row();
				$output->user_password = '';
			}
		} 

		echo json_encode([
			'jasaprint' => [
				'status' => $ada ? 'success' : 'error',
				'data' => $output,
			]
		]);
	}

	public function simpan()
	{
		$error = true;
		$message = '';
		if (!empty($this->input->post('simpan'))) {
			if (!empty($this->input->post('type_input'))) {
				$response = $this->_simpan();
				$error = $response['error'];				
				$message = $response['message'];				
			} else {
				$message = 'aksi tidak terdeteksi!';
			}
		} else {
			$message = 'harap periksa kembali inputan yang anda kirim';
		}

		echo json_encode([
			'jasaprint' => [
				'status' => $error ? 'error' : 'success',
				'message' => $message,
			]
		]);
	}

	private function _simpan()
	{
		// 
		$input = $this->input->post();
		$data = [
			'user_nama' => $input['user_nama'],
			'user_email' => $input['user_email'],
			'user_phone' => $input['user_phone'],
		];
		// 
		$error = true;
		$message = '';
		// 
		if ($input['type_input'] == 'tambah') {
			$data['status_user_id'] = 1;
		}

		if (strlen($input['user_password']) > 0) {
			$data['user_password'] = sha256Encode($input['user_password']);
		}

		if ($input['type_user_id'] !== '') {
			$data['type_user_id'] = $input['type_user_id'];
		}

		if ($input['user_id'] !== '' && $input['type_input'] == 'edit') {
			$cek = $this->sb->mengambil('tb_user', [
				'user_id !=' => $input['user_id'],
				'user_email' => $data['user_email'],
			]);

			if ($cek->num_rows() > 0) {
				$message = 'email sudah digunakan!';
			} else {
				$response = $this->sb->mengubah('tb_user', [
					'user_id' => $input['user_id'],
				], $data);

				if ($response['status'] == 'success') {
					$error = false;
					$message = 'mengubah data pengguna';
				} else {
					$message = 'mengubah data pengguna';
				}
			}
		} else if ($input['type_input'] == 'tambah') {
			$cek = $this->sb->mengambil('tb_user', [
				'user_email' => $data['user_email'],
			]);

			if ($cek->num_rows() > 0) {
				$message = 'email sudah digunakan!';
			} else {
				$response = $this->sb->menambah('tb_user', $data);

				if ($response['status'] == 'success') {
					$error = false;
					$message = 'menambah data pengguna';
				} else {
					$message = 'menambah data pengguna';
				}
			}
		} else {
			
		}

		return [
			'error' => $error,
			'message' => $message,
		];
	}
}

/* End of file pengguna.php */
/* Location: ./application/controllers/admin/master/pengguna.php */
