<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use CodeIgniter\HTTP\ResponseInterface;

class BeritaController extends BaseController
{
    public function index()
    {
        $berita = new BeritaModel();
        $search = $this->request->getGet('search');
        $param['berita'] = $berita->all(10, $search);
        return view('frontend/berita/index', $param);
    }

    public function detail($slug)
    {
        $berita = new BeritaModel();
        $param['detail'] = $berita->getBySlug($slug);
        return view('frontend/berita/detail', $param);
    }
}
