<?php

namespace App\Controllers;

use App\Models\bukuModel;

class Buku extends BaseController
{

	protected $bukuModel;
	public function __construct()
	{
		$this->bukuModel = new bukuModel();
	}

	public function index()
	{
		//Fungsinya adalah untuk mendapatkan data dari Database ke pagination dengan alamat "page_buku" kemudian ditampilkan beberapa hal yang serupa dengan pencarian
		$currentPage = $this->request->getVar('page_buku') ? $this->request->getVar('page_buku') : 1;
		//$akun_admin = $this->dashboardModel->findAll();

		//Tampilan tabel index, untuk menampilkan table dan pagination dan search bar.
		$keyword = $this->request->getVar('keyword');
		if ($keyword) {
			$buku = $this->bukuModel->search($keyword);
		} else {
			$buku = $this->bukuModel;
		}

		$data = [
			'title' => 'Control Panel | Table E-Book',
			'buku' => $buku->paginate(10, 'buku'),
			'pager' => $this->bukuModel->pager,
			'currentPage' => $currentPage
		];
		return view('buku/index', $data);
	}

	//Fungsi yang berfungsi untuk menampilkan data dari database ke view Detail.
	public function detail($slug)
	{

		$data = [
			'title' => 'Control Panel | Detail E-Book',
			'buku' => $this->bukuModel->getBuku($slug)

		];

		//Jika buku tidak ada di tabel
		if (empty($data['buku'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Data E-Book ' . $slug . ' tidak ditemukan');
		}

		return view('buku/detail', $data);
	}

	//Untuk menampilkan view create, serta menangkap data dari database, untuk ditampilkan ke view create.
	public function create()
	{

		$data = [
			'title' => 'Control Panel | Tambah E-Book',
			'validation' => \Config\Services::validation()
		];

		return view('buku/create', $data);
	}

	//Fungsinya adalah untuk melakukan validasi dari input create (jika input sesuai dengan rules/ peraturan yang ada) maka data akan dimasukkan ke database
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
			'isi' => [
				'rules' => 'ext_in[isi,pdf]',
				'errors' => [
					'ext_in' => 'Hanya mendukung format file PDF'
				]
			],
			'judul' => [
				'rules'  => 'required|is_unique[buku.judul]',
				'errors' => [
					'required' => 'Judul harus diisi',
					'is_unique' => 'Judul sudah terdaftar',

				]
			],
			'penulis' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Nama penulis harus diisi',

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
			],

		])) {
			//Jika pembuatan data berhasil, maka akan view akan dikembalikan ke view "/buku/create"
			// $validation = \Config\Services::validation();
			// return redirect()->to('/Home/create/')->withInput()->with('validation', $validation);
			return redirect()->to('/buku/create')->withInput();
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

		//ambil file
		$fileIsi = $this->request->getFile('isi');
		//apakah tidak ada gambar yang diupload
		if ($fileIsi->getError() == 4) {
			$namaIsi = 'filekosong.pdf';
		} else {
			//generate nama gambar random
			$namaIsi = $fileIsi->getRandomName();
			//pindahkan gambar ke folder img
			$fileIsi->move('assets/img/pdf', $namaIsi);
		}

		$slug = url_title($this->request->getVar('judul'), '-', true);
		$this->bukuModel->save([
			'sampul' => $namaSampul,
			'judul' => $this->request->getVar('judul'),
			'genre' => $this->request->getVar('genre'),
			'penulis' => $this->request->getVar('penulis'),
			'penerbit' => $this->request->getVar('penerbit'),
			'deskripsi' => $this->request->getVar('deskripsi'),
			'isbn' => $this->request->getVar('isbn'),
			'penerbitan' => $this->request->getVar('penerbitan'),
			'slug' => $slug,
			'isi' => $namaIsi

		]);

		session()->setFlashdata('pesan', 'Data E-Book berhasil ditambahkan');

		return redirect()->to('/buku/index');
	}

	public function delete($id)
	{
		//cari gambar berdasarkan id
		$buku = $this->bukuModel->find($id);

		//cek jika file gambarnya sampuldefault.jpg
		if ($buku['sampul'] != 'sampuldefault.jpg') {
			//hapus gambar
			unlink('assets/img/sampul/' . $buku['sampul']);
		}

		//cari file berdasarkan id
		//cek jika file gambarnya sampuldefault.jpg
		if ($buku['isi'] != 'filekosong.pdf') {
			//hapus gambar
			unlink('assets/img/pdf/' . $buku['isi']);
		}

		//Jika data berhasil dihapus, maka view akan dikembali ke "/Buku/index".
		$this->bukuModel->delete($id);
		session()->setFlashdata('pesan', 'Data E-Book berhasil dihapus');
		return redirect()->to('/Buku/index');
	}

	//Fungsinya adalah untuk menampilan view dari edit, serta menangkap data dari database untuk ditampilkan ke view.
	public function edit($slug)
	{
		$data = [
			'title' => 'Control Panel | Edit E-Book',
			'validation' => \Config\Services::validation(),
			'buku' => $this->bukuModel->getBuku($slug)
		];

		return view('buku/edit', $data);
	}

	//Fungsinya adalah untuk melakukan validasi pada input edit(Jika input dari edit memenuhi rules atau syarat validasi, maka data pada database akan diubah).
	public function update($id)
	{
		//cek judul
		$bukuLama = $this->bukuModel->getBuku($this->request->getVar('slug'));
		$isiLama = $this->bukuModel->getBuku($this->request->getVar('slug'));

		if ($bukuLama['judul'] == $this->request->getVar('judul')) {
			$rule_judul = 'required';
		} else {
			$rule_judul = 'required|is_unique[buku.judul]';
		}

		//Melakukan validasi
		if (!$this->validate([
			'sampul' => [
				'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg]',
				'errors' => [
					'max_size' => 'Ukuran gambar terlalu besar',
					'is_image' => 'Yang anda pilih bukan gambar',
					'mime_in' => 'Hanya mendukung format JPG/JPEG'

				]
			],
			'isi' => [
				'rules' => 'ext_in[isi,pdf]',
				'errors' => [
					'ext_in' => 'Hanya mendukung format file PDF'
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
					'required' => 'Nama Penulis harus diisi'

				]
			],
			'penerbit' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Penerbit harus diisi'

				]
			],
			'genre' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Penerbit harus diisi'

				]
			],


		])) {
			return redirect()->to('/Buku/edit/' . $this->request->getVar('slug'))->withInput();
		}

		//Melakukan deklarasi Variabel 
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

		//cek file, apakah tetap file lama
		if ($fileIsi->getError() == 4) {
			$namaIsi = $this->request->getVar('isiLama');
		} else {

			//generate nama foto random
			$namaIsi = $fileIsi->getRandomName();
			//pindahkan foto
			$fileIsi->move('assets/img/pdf', $namaIsi);
			//hapus foto yang lama
			if ($this->request->getVar('isiLama') != 'filekosong.pdf') {
				unlink('assets/img/pdf/' . $this->request->getVar('isiLama'));
			}
		}


		$slug = url_title($this->request->getVar('judul'), '-', true);
		$this->bukuModel->save([
			'id' => $id,
			'sampul' => $namaSampul,
			'judul' => $this->request->getVar('judul'),
			'genre' => $this->request->getVar('genre'),
			'penulis' => $this->request->getVar('penulis'),
			'penerbit' => $this->request->getVar('penerbit'),
			'deskripsi' => $this->request->getVar('deskripsi'),
			'isbn' => $this->request->getVar('isbn'),
			'penerbitan' => $this->request->getVar('penerbitan'),
			'slug' => $slug,
			'isi' => $namaIsi
		]);

		session()->setFlashdata('pesan', 'Data E-Book berhasil diubah');

		return redirect()->to('/Buku/index');
	}
}
