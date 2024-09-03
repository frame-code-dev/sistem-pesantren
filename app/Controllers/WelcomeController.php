<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use CodeIgniter\HTTP\ResponseInterface;

class WelcomeController extends BaseController
{
    public function index()
    {
        $berita = new BeritaModel;
        $param['berita'] = $berita->getAll(2);
        return view("welcome",$param);
    }
}
