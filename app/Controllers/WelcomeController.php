<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class WelcomeController extends BaseController
{
    public function index()
    {
        return view("welcome");
    }
}
