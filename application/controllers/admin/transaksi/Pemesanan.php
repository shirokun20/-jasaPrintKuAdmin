<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->shiro_lib->cekLogin();
		$this->load->model('semua_bisa_model', 'sb');
		$this->load->model('pemesanan_model', 'pm');
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
					'tujuan' => site_url('admin/transaksi/pemesanan/'),
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

	public function showDataPemesanan() 
	{
		$data = $this->pm->getDataTables();
		echo json_encode($data);
	}

	public function detail($transaction_id = '') 
	{
		if ($transaction_id !== '') {
			$this->_detail($transaction_id);
		} else {
			redirect(site_url('transaksi/pemesanan'));
		}
	}

	private function _detail($transaction_id) 
	{
		$check = $this->pm->get_data([
			'tr.transaction_id' => base64_decode($transaction_id)
		]);
		if ($check->num_rows() > 0) {
			$data = [
				'title' => 'Detail Print',
			];
			$data['breadcrumb'] = [
					[
						'href' => true,
						'icon' => 'fa-print',
						'tujuan' => site_url('admin/transaksi/pemesanan/'),
						'title' => ''
					],
					[
						'href' => false,
						'icon' => '',
						'tujuan' => '',
						'title' => 'Pemesanan'
					],
					[
						'href' => false,
						'icon' => '',
						'tujuan' => '',
						'title' => 'Detail'
					],
			];
			
			$data['subtitle'] = 'Detail Pemesanan';
			$this->shiro_lib->admin('transaksi/pemesanan/vPemesananDetail', $data);
		} else {
			redirect(site_url('transaksi/pemesanan'));
		}
	}

	public function tambah()
	{
		$data = [
			'title' => 'Tambah Pesanan Print',
		];
		$data['breadcrumb'] = [
				[
					'href' => true,
					'icon' => 'fa-print',
					'tujuan' => site_url('admin/transaksi/pemesanan/'),
					'title' => ''
				],
				[
					'href' => false,
					'icon' => '',
					'tujuan' => '',
					'title' => 'Pemesanan'
				],
				[
					'href' => false,
					'icon' => '',
					'tujuan' => '',
					'title' => 'Tambah Pesanan Baru'
				],
		];
		
		$data['subtitle'] = 'Halaman tambah pesanan baru';
		$this->shiro_lib->admin('transaksi/pemesanan/vPemesananTambah', $data);
	}

	public function getJumlahPengguna()
	{
		$data['jumlah'] = [
			'total_pesanan_aktif' => number_format($this->pm->jumlah_pemesanan([1,2])),
			'total_pesanan_selesai' => number_format($this->pm->jumlah_pemesanan([3,4])),
			'total_pesanan_dibatalkan' => number_format($this->pm->jumlah_pemesanan([5])),
		];

		echo json_encode([
			'jasaprint' => [
				'status' =>'success',
				'data' => $data['jumlah'],
			]
		]);
	}
}

/* End of file Pemesanan.php */
/* Location: ./application/controllers/admin/transaksi/Pemesanan.php */
