<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\VisiMisiModel;
use CodeIgniter\HTTP\ResponseInterface;

class TentangPondokController extends BaseController
{
    public function sejarah()
    {
        $param['title'] = 'Sejarah Pesantren';
        return view('frontend/sejarah/index',$param);
    }
    public function visiMisi()
    {
        $param['title'] = 'Visi & Misi Pesantren';
        $visiMisi = new VisiMisiModel;
        $param['data'] = $visiMisi->getData();
        return view('frontend/visi-misi/index',$param);
    }
}
