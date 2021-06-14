<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\organisasiModel;
use App\Controllers\BaseController;

class Organisasi extends BaseController
{
	protected $organisasiModel;
	public function __construct()
	{
		$this->organisasiModel = new organisasiModel();
	}

	public function index()
	{

		$currentPage = $this->request->getVar('page_organisasi') ? $this->request->getVar('page_organisasi') : 1;
		//$akun_admin = $this->dashboardModel->findAll();

		$keyword = $this->request->getVar('keyword');
		if ($keyword) {
			$organisasi = $this->organisasiModel->search($keyword);
		} else {
			$organisasi = $this->organisasiModel;
		}

		$data = [
			'title' => 'Control Panel | Organisasi',
			'organisasi' => $organisasi->paginate(10, 'organisasi'),
			'pager' => $this->organisasiModel->pager,
			'currentPage' => $currentPage
		];

		return view('organisasi/index', $data);
	}

	public function detail($slug)
	{

		$data = [
			'title' => 'Control Panel | Detail Organisasi',
			'organisasi' => $this->organisasiModel->getOrganisasi($slug)
		];



		//jika pengguna tidak ada di tabel
		if (empty($data['organisasi'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Organisasi ' . $slug . ' tidak ditemukan');
		}

		return view('organisasi/detail', $data);
	}

	public function create()
	{

		$data = [
			'title' => 'Control Panel | Tambah Organisasi',
			'validation' => \Config\Services::validation()
		];

		return view('organisasi/create', $data);
	}

	public function save()
	{

		//validasi input
		if (!$this->validate([
			'nama' => [
				'rules'  => 'required|is_unique[organisasi.nama]|max_length[100]',
				'errors' => [
					'required' => 'Nama harus diisi',
					'is_unique' => 'Nama sudah terdaftar',
					'max_length' => 'Maksimal Username adalah 100 digit'
				]
			],
			'foto' => [
				'rules' => 'uploaded[foto]|max_size[foto,1024]|is_image[foto]|mime_in[foto,image/png]',
				'errors' => [
					'max_size' => 'Ukuran gambar terlalu besar',
					'uploaded' => 'Logo wajib diisi',
					'is_image' => 'Yang anda pilih bukan gambar',
					'mime_in' => 'Hanya mendukung format PNG'

				]
			]

		])) {
			// $validation = \Config\Services::validation();
			// return redirect()->to('/Home/create/')->withInput()->with('validation', $validation);
			return redirect()->to('/Organisasi/create')->withInput();
		}

		//ambil gambar
		$fileFoto = $this->request->getFile('foto');
		//apakah tidak ada gambar yang diupload
		if ($fileFoto->getError() == 4) {
			$namaFoto = 'default2.jpg';
		} else {

			//generate nama gambar random
			$namaFoto = $fileFoto->getRandomName();
			//pindahkan gambar ke folder img
			$fileFoto->move('assets/img/clients', $namaFoto);
		}

		//ambil nama gambar
		// $namaFoto = $fileFoto->getName();
		$slug = url_title($this->request->getVar('nama'), '-', true);
		$this->organisasiModel->save([
			'foto' => $namaFoto,
			'nama' => $this->request->getVar('nama'),
			'slug' => $slug,
		]);

		session()->setFlashdata('pesan', 'Data Organisasi berhasil ditambahkan');

		return redirect()->to('/Organisasi/index');
	}

	public function delete($id)
	{
		//cari gambar berdasarkan id
		$organisasi = $this->organisasiModel->find($id);

		//cek jika file gambarnya default.jpg
		if ($organisasi['foto'] != 'default2.jpg') {
			//hapus gambar
			unlink('assets/img/clients/' . $organisasi['foto']);
		}


		$this->organisasiModel->delete($id);
		session()->setFlashdata('pesan', 'Data Organisasi berhasil dihapus');
		return redirect()->to('/Organisasi/index');
	}

	public function edit($slug)
	{
		$data = [
			'title' => 'Control Panel | Edit Organisasi',
			'validation' => \Config\Services::validation(),
			'organisasi' => $this->organisasiModel->getOrganisasi($slug)
		];

		return view('organisasi/edit', $data);
	}

	public function update($id)
	{
		//cek username
		$organisasiLama = $this->organisasiModel->getOrganisasi($this->request->getVar('slug'));
		if ($organisasiLama['nama'] == $this->request->getVar('nama')) {
			$rule_nama = 'required';
		} else {
			$rule_nama = 'required|is_unique[organisasi.nama]|max_length[100]';
		}

		if (!$this->validate([
			'nama' => [
				'rules'  => $rule_nama,
				'errors' => [
					'required' => 'nama harus diisi',
					'is_unique' => 'nama sudah terdaftar',
					'max_length' => 'Maksimal nama adalah 100 digit'
				]
			],
			'foto' => [
				'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/png]',
				'errors' => [
					'max_size' => 'Ukuran gambar terlalu besar',
					'is_image' => 'Yang anda pilih bukan gambar',
					'mime_in' => 'Hanya mendukung format PNG',


				]
			]
		])) {
			return redirect()->to('/Organisasi/edit/' . $this->request->getVar('slug'))->withInput();
		}

		$fileFoto = $this->request->getFile('foto');

		//cek gambar, apakah tetap gambar lama
		if ($fileFoto->getError() == 4) {
			$namaFoto = $this->request->getVar('fotoLama');
		} else {
			//generate nama foto random
			$namaFoto = $fileFoto->getRandomName();
			//pindahkan foto
			$fileFoto->move('assets/img/clients', $namaFoto);
			//hapus foto yang lama
			if ($this->request->getVar('fotoLama') != 'default2.jpg') {
				unlink('assets/img/clients/' . $this->request->getVar('fotoLama'));
			}
		}

		$slug = url_title($this->request->getVar('nama'), '-', true);
		$this->organisasiModel->save([
			'id' => $id,
			'foto' => $namaFoto,
			'nama' => $this->request->getVar('nama'),
			'slug' => $slug
		]);

		session()->setFlashdata('pesan', 'Data Organisasi berhasil diubah');

		return redirect()->to('/Organisasi/index');
	}
}
