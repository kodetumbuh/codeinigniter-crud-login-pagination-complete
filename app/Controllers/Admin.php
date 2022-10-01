<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;


class Admin extends BaseController
{
    public function index()
    {
        return view('admin/crud');
    }

    public function github()
    {
        return view('admin/github');
    }

    public function tentang()
    {
        return view('admin/tentang');
    }

// ada masalah ketika menggunakan datatable disni tidak bisa menggunakan table yang mempunyai relasi
    public function ajaxLoadData()
    {
        $db = db_connect();
        $builder = $db->table('user')
        ->select('username, email, level.name_level_user')
        ->join('level', 'user.name_level_user_id = level.id','left');

        return DataTable::of($builder)->toJson(true);
    }

}
