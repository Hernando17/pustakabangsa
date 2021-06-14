<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\bukuModel;
use App\Models\elibraryModel;
use App\Controllers\BaseController;

class Ebook extends BaseController
{
	public function __construct()
	{
		$this->elibraryModel = new elibraryModel();
		$this->bukuModel = new bukuModel();
	}

	public function elibrary()
	{
		$currentPage = $this->request->getVar('page_buku') ? $this->request->getVar('page_buku') : 1;

		$keyword = $this->request->getVar('keyword');
		if ($keyword) {
			$ebook = $this->elibraryModel->search($keyword);
		} else {
			$ebook = $this->elibraryModel;
		}

		$data = [
			'title' => 'Library | E-Book',
			// 'buku' => $this->elibraryModel->geteLibrary(),
			'buku' => $ebook->paginate(14, 'buku'),
			'pager' => $this->elibraryModel->pager,
			'currentPage' => $currentPage

		];
		return view('home/elibrary', $data);
	}

	public function elibrarydetail($slug)
	{
		$data = [
			'title' => 'Detail Buku',
			'buku' => $this->bukuModel->getBuku($slug)
		];

		//jika buku tidak ada di tabel
		if (empty($data['buku'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Buku ' . $slug . ' tidak ditemukan');
		}

		return view('home/elibrarydetail', $data);
	}
}
