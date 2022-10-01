<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class User extends BaseController
{
    public function index()
    {
        return view('user/crud');
    }

    public function github()
    {
        return view('user/github');
    }

    public function tentang()
    {
        return view('user/tentang');
    }
}
