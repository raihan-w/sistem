<?php

namespace App\Controllers;

use App\Models\DesaModel;

class Dashboard extends BaseController
{

    public function index()
    {
        return view('dashboard');
    }
}
