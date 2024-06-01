<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class TentangAlumniController extends BaseController
{
    public function index()
    {
        $param['title'] = 'Tentang Alumni Pondok';
        return view('frontend/alumni/index',$param);
    }
}
