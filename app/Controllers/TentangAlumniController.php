<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Santri_model;
use CodeIgniter\HTTP\ResponseInterface;

class TentangAlumniController extends BaseController
{
    public function index()
    {
        $param['title'] = 'Tentang Alumni Pondok';
        $alumni = new Santri_model();
        $param['data'] = $alumni->getAlumni();
        return view('frontend/alumni/index',$param);
    }
}
