<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\pustakawanModel;
use App\Controllers\BaseController;

class Pustakawan extends BaseController
{
	protected $pustakawanModel;
	public function __construct()
	{
		$this->pustakawanModel = new pustakawanModel();
	}

	public function index()
	{

		$currentPage = $this->request->getVar('page_pustakawan') ? $this->request->getVar('page_pustakawan') : 1;
		//$akun_admin = $this->dashboardModel->findAll();

		$keyword = $this->request->getVar('keyword');
		if ($keyword) {
			$pustakawan = $this->pustakawanModel->search($keyword);
		} else {
			$pustakawan = $this->pustakawanModel;
		}

		$data = [
			'title' => 'Control Panel | List Pustakawan',
			'pustakawan' => $pustakawan->paginate(10, 'pustakawan'),
			'pager' => $this->pustakawanModel->pager,
			'currentPage' => $currentPage
		];

		return view('pustakawan/index', $data);
	}

	public function detail($slug)
	{

		$data = [
			'title' => 'Control Panel | Detail Pustakawan',
			'pustakawan' => $this->pustakawanModel->getPustakawan($slug)
		];



		//jika pengguna tidak ada di tabel
		if (empty($data['pustakawan'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pustakawan ' . $slug . ' tidak ditemukan');
		}

		return view('pustakawan/detail', $data);
	}

	public function create()
	{

		$data = [
			'title' => 'Control Panel | Tambah Pustakawan',
			'validation' => \Config\Services::validation()
		];

		return view('pustakawan/create', $data);
	}

	public function save()
	{

		//validasi input
		if (!$this->validate([
			'username' => [
				'rules'  => 'required|is_unique[pustakawan.username]|max_length[100]',
				'errors' => [
					'required' => 'Username harus diisi',
					'is_unique' => 'Username sudah terdaftar',
					'max_length' => 'Maksimal Username adalah 100 digit'
				]
			],
			'foto' => [
				'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg]|max_dims[foto,853,1280]',
				'errors' => [
					'max_size' => 'Ukuran gambar terlalu besar',
					'is_image' => 'Yang anda pilih bukan gambar',
					'mime_in' => 'Hanya mendukung format JPG/JPEG',
					'max_dims' => 'Maximal Resolusi gambar adalah 853x1280'

				]
			]

		])) {
			// $validation = \Config\Services::validation();
			// return redirect()->to('/Home/create/')->withInput()->with('validation', $validation);
			return redirect()->to('/Pustakawan/create')->withInput();
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
			$fileFoto->move('assets/img/admin', $namaFoto);
		}

		//ambil nama gambar
		// $namaFoto = $fileFoto->getName();

		$slug = url_title($this->request->getVar('username'), '-', true);
		$this->pustakawanModel->save([
			'foto' => $namaFoto,
			'username' => $this->request->getVar('username'),
			'jabatan' => $this->request->getVar('jabatan'),
			'twitter' => $this->request->getVar('twitter'),
			'instagram' => $this->request->getVar('instagram'),
			'facebook' => $this->request->getVar('facebook'),
			'slug' => $slug,
		]);

		session()->setFlashdata('pesan', 'Data Pustakawan berhasil ditambahkan');

		return redirect()->to('/Pustakawan/index');
	}

	public function delete($id)
	{
		//cari gambar berdasarkan id
		$pustakawan = $this->pustakawanModel->find($id);

		//cek jika file gambarnya default.jpg
		if ($pustakawan['foto'] != 'default2.jpg') {
			//hapus gambar
			unlink('assets/img/admin/' . $pustakawan['foto']);
		}


		$this->pustakawanModel->delete($id);
		session()->setFlashdata('pesan', 'Data Pustakawan berhasil dihapus');
		return redirect()->to('/Pustakawan/index');
	}

	public function edit($slug)
	{
		$data = [
			'title' => 'Control Panel | Edit Pustakawan',
			'validation' => \Config\Services::validation(),
			'pustakawan' => $this->pustakawanModel->getPustakawan($slug)
		];

		return view('pustakawan/edit', $data);
	}

	public function update($id)
	{

		//cek username
		$pustakawanLama = $this->pustakawanModel->getPustakawan($this->request->getVar('slug'));
		if ($pustakawanLama['username'] == $this->request->getVar('username')) {
			$rule_username = 'required';
		} else {
			$rule_username = 'required|is_unique[pustakawan.username]|max_length[100]';
		}

		if (!$this->validate([
			'username' => [
				'rules'  => $rule_username,
				'errors' => [
					'required' => 'Username harus diisi',
					'is_unique' => 'Username sudah terdaftar',
					'max_length' => 'Maksimal Username adalah 100 digit'
				]
			],
			'foto' => [
				'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg]|max_dims[foto,853,1280]',
				'errors' => [
					'max_size' => 'Ukuran gambar terlalu besar',
					'is_image' => 'Yang anda pilih bukan gambar',
					'mime_in' => 'Hanya mendukung format JPG/JPEG',
					'max_dims' => 'Maximal Resolusi gambar adalah 853x1280'

				]
			]
		])) {
			return redirect()->to('/Pustakawan/edit/' . $this->request->getVar('slug'))->withInput();
		}

		$fileFoto = $this->request->getFile('foto');

		//cek gambar, apakah tetap gambar lama
		if ($fileFoto->getError() == 4) {
			$namaFoto = $this->request->getVar('fotoLama');
		} else {
			//generate nama foto random
			$namaFoto = $fileFoto->getRandomName();
			//pindahkan foto
			$fileFoto->move('assets/img/admin', $namaFoto);
			//hapus foto yang lama
			if ($this->request->getVar('fotoLama') != 'default2.jpg') {
				unlink('assets/img/admin/' . $this->request->getVar('fotoLama'));
			}
		}

		$slug = url_title($this->request->getVar('username'), '-', true);
		$this->pustakawanModel->save([
			'id' => $id,
			'twitter' => $this->request->getVar('twitter'),
			'foto' => $namaFoto,
			'username' => $this->request->getVar('username'),
			'jabatan' => $this->request->getVar('jabatan'),
			'instagram' => $this->request->getVar('instagram'),
			'facebook' => $this->request->getVar('facebook'),
			'slug' => $slug
		]);

		session()->setFlashdata('pesan', 'Data Pustakawan berhasil diubah');

		return redirect()->to('/Pustakawan/index');
	}
}
