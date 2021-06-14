<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\dashboardModel;
// use App\Models\UsersModel;
use App\Models\AuthModel;
use App\Models\bukuModel;
use App\Models\elibraryModel;
use App\Models\bukuofflineModel;
use App\Models\libraryModel;
use App\Controllers\BaseController;

class Book extends BaseController
{
	public function __construct()
	{
		$this->libraryModel = new libraryModel();
		$this->bukuofflineModel = new bukuofflineModel();
	}

	public function library()
	{
		$currentPage = $this->request->getVar('page_offline') ? $this->request->getVar('page_offline') : 1;

		$keyword = $this->request->getVar('keyword');
		if ($keyword) {
			$book = $this->libraryModel->search($keyword);
		} else {
			$book = $this->libraryModel;
		}

		$data = [
			'title' => 'Library | E-Book',
			'offline' => $book->paginate(14, 'offline'),
			'pager' => $this->libraryModel->pager,
			'currentPage' => $currentPage
		];
		return view('home/library', $data);
	}

	public function librarydetail($slug)
	{
		$data = [
			'title' => 'Detail Buku',
			'offline' => $this->bukuofflineModel->getBukuoffline($slug)
		];

		//jika buku tidak ada di tabel
		if (empty($data['offline'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Buku ' . $slug . ' tidak ditemukan');
		}

		return view('home/librarydetail', $data);
	}
}
