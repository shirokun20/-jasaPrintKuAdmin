<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->shiro_lib->cekLogin();
	}
	// List all your items
	public function index()
	{
		$data = [
			'title' => 'Data Pemesanan Print',
		];
		$data['breadcrumb'] = [
				[
					'href' => true,
					'icon' => 'fa-print',
					'tujuan' => site_url('transaksi/pemesanan'),
					'title' => ''
				],
				[
					'href' => false,
					'icon' => '',
					'tujuan' => '',
					'title' => 'Pemesanan'
				],
		];
		
		$data['subtitle'] = 'Transaksi Pemesanan';
		$this->shiro_lib->admin('transaksi/pemesanan/vPemesanan', $data);
	}
}

/* End of file Pemesanan.php */
/* Location: ./application/controllers/admin/transaksi/Pemesanan.php */
