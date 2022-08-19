<?php

namespace App\Controllers;

use App\Models\DesaModel;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
}
