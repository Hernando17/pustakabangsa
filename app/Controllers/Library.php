<?php

namespace App\Controllers;

use App\Models\libraryModel;
use App\Models\bukuofflineModel;


class Library extends BaseController
{

	protected $libraryModel;
	public function __construct()
	{

		$this->libraryModel = new libraryModel();
		$this->bukuofflineModel = new bukuofflineModel();
	}

	public function index()
	{
		$currentPage = $this->request->getVar('page_offline') ? $this->request->getVar('page_offline') : 1;
		//$akun_admin = $this->dashboardModel->findAll();

		$keyword = $this->request->getVar('keyword');
		if ($keyword) {
			$library = $this->bukuofflineModel->search($keyword);
		} else {
			$library = $this->bukuofflineModel;
		}

		$data = [
			'title' => 'Control Panel | Table Book',
			'offline' => $library->paginate(10, 'offline'),
			'pager' => $this->bukuofflineModel->pager,
			'currentPage' => $currentPage
		];

		return view('library/index', $data);
	}

	public function detail($slug)
	{

		$data = [
			'title' => 'Control Panel | Detail Book',
			'offline' => $this->bukuofflineModel->getBukuoffline($slug)
		];

		//jika buku tidak ada di tabel
		if (empty($data['offline'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Book ' . $slug . ' tidak ditemukan');
		}

		return view('library/detail', $data);
	}

	public function create()
	{

		$data = [
			'title' => 'Control Panel | Tambah Book',
			'validation' => \Config\Services::validation()
		];

		return view('library/create', $data);
	}

	public function save()
	{

		//validasi input
		if (!$this->validate([
			'sampul' => [
				'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg]',
				'errors' => [
					'max_size' => 'Ukuran gambar terlalu besar',
					'is_image' => 'Yang anda pilih bukan gambar',
					'mime_in' => 'Hanya mendukung format JPG/JPEG'
				]
			],
			'judul' => [
				'rules'  => 'required|is_unique[offline.judul]',
				'errors' => [
					'required' => 'Judul harus diisi',
					'is_unique' => 'Judul sudah terdaftar'

				]
			],
			'penulis' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Nama penulis harus diisi'

				]
			],
			'penerbit' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Penerbit harus diisi',

				]
			],
			'genre' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Penerbit harus diisi',


				]
			]


		])) {
			// $validation = \Config\Services::validation();
			// return redirect()->to('/Home/create/')->withInput()->with('validation', $validation);
			return redirect()->to('/library/create')->withInput();
		}

		//ambil gambar
		$fileSampul = $this->request->getFile('sampul');
		//apakah tidak ada gambar yang diupload
		if ($fileSampul->getError() == 4) {
			$namaSampul = 'sampuldefault.jpg';
		} else {
			//generate nama gambar random
			$namaSampul = $fileSampul->getRandomName();
			//pindahkan gambar ke folder img
			$fileSampul->move('assets/img/sampul', $namaSampul);
		}

		//ambil nama gambar
		// $namaFoto = $fileFoto->getName();



		$slug = url_title($this->request->getVar('judul'), '-', true);
		$this->bukuofflineModel->save([
			'sampul' => $namaSampul,
			'judul' => $this->request->getVar('judul'),
			'penulis' => $this->request->getVar('penulis'),
			'penerbit' => $this->request->getVar('penerbit'),
			'deskripsi' => $this->request->getVar('deskripsi'),
			'kode' => $this->request->getVar('kode'),
			'isbn' => $this->request->getVar('isbn'),
			'genre' => $this->request->getVar('genre'),
			'tglpenerbitan' => $this->request->getVar('tglpenerbitan'),
			'stock' => $this->request->getVar('stock'),
			'slug' => $slug

		]);

		session()->setFlashdata('pesan', 'Data Book berhasil ditambahkan');

		return redirect()->to('/library/index');
	}

	public function delete($id)
	{
		//cari gambar berdasarkan id
		$offline = $this->bukuofflineModel->find($id);

		//cek jika file gambarnya sampuldefault.jpg
		if ($offline['sampul'] != 'sampuldefault.jpg') {
			//hapus gambar
			unlink('assets/img/sampul/' . $offline['sampul']);
		}


		$this->bukuofflineModel->delete($id);
		session()->setFlashdata('pesan', 'Data Book berhasil dihapus');
		return redirect()->to('/library/index');
	}

	public function edit($slug)
	{
		$data = [
			'title' => 'Control Panel | Edit Book',
			'validation' => \Config\Services::validation(),
			'offline' => $this->bukuofflineModel->getbukuoffline($slug)
		];

		return view('library/edit', $data);
	}

	public function update($id)
	{

		//cek judul
		$bukuLama = $this->bukuofflineModel->getBukuoffline($this->request->getVar('slug'));
		if ($bukuLama['judul'] == $this->request->getVar('judul')) {
			$rule_judul = 'required';
		} else {
			$rule_judul = 'required|is_unique[offline.judul]';
		}

		if (!$this->validate([
			'sampul' => [
				'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg]',
				'errors' => [
					'max_size' => 'Ukuran gambar terlalu besar',
					'is_image' => 'Yang anda pilih bukan gambar',
					'mime_in' => 'Hanya mendukung format JPG/JPEG'

				]
			],
			'judul' => [
				'rules'  => $rule_judul,
				'errors' => [
					'required' => 'judul harus diisi',
					'is_unique' => 'judul sudah terdaftar'
				]
			],
			'penulis' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Nama Penulis harus diisi',
				]
			],
			'penerbit' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Penerbit harus diisi',
				]
			],
			'genre' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Penerbit harus diisi',
				]
			]



		])) {
			return redirect()->to('/Library/edit/' . $this->request->getVar('slug'))->withInput();
		}

		$fileSampul = $this->request->getFile('sampul');
		$fileIsi = $this->request->getFile('isi');


		//cek gambar, apakah tetap gambar lama
		if ($fileSampul->getError() == 4) {
			$namaSampul = $this->request->getVar('sampulLama');
		} else {

			//generate nama foto random
			$namaSampul = $fileSampul->getRandomName();
			//pindahkan foto
			$fileSampul->move('assets/img/sampul', $namaSampul);
			//hapus foto yang lama
			if ($this->request->getVar('sampulLama') != 'sampuldefault.jpg') {
				unlink('assets/img/sampul/' . $this->request->getVar('sampulLama'));
			}
		}

		$slug = url_title($this->request->getVar('judul'), '-', true);
		$this->bukuofflineModel->save([
			'id' => $id,
			'sampul' => $namaSampul,
			'judul' => $this->request->getVar('judul'),
			'penulis' => $this->request->getVar('penulis'),
			'penerbit' => $this->request->getVar('penerbit'),
			'genre' => $this->request->getVar('genre'),
			'deskripsi' => $this->request->getVar('deskripsi'),
			'kode' => $this->request->getVar('kode'),
			'isbn' => $this->request->getVar('isbn'),
			'tglpenerbitan' => $this->request->getVar('tglpenerbitan'),
			'stock' => $this->request->getVar('stock'),
			'slug' => $slug
		]);
		session()->setFlashdata('pesan', 'Data Book berhasil diubah');

		return redirect()->to('/library/index');
	}
}
