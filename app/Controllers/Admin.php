<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;
use App\Models\User;



class Admin extends BaseController
{

    public function __construct()
    {
        $this->db = \Config\Database::connect();

        if (session()->get('name_level_user_id') != "1") {
            echo '<h1> Akses Ditolak </h1>';
            exit;
        }
    }



    public function admintest()
    {

        return view('/admin/adminview');

    }

    public function index()
    {

        return view('admin/adminview');

    }

    public function github()
    {
        // cek session apakah admin atau tidak

        return view('admin/github');

    }

    public function tentang()
    {
        return view('admin/tentang');
    }


    public function ajaxLoadData()
    {

        $db = db_connect();
        $builder = $db->table('user')
        ->select('id_number ,username, email, level.name_level_user')
        ->join('level', 'user.name_level_user_id = level.id','left');

    // alternatif ajax edit
        return DataTable::of($builder)
        ->edit('id_number', function($row){
            return '
            <a href="admin/edit/'.$row->id_number.' " class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></a>
            <a href="admin/delete/'.$row->id_number.' " class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
            ';
        })
        ->toJson(true);
        
        
    }


    public function adminPagePost()
    {
        $data['level'] = $this->db->table('level')->select('id, name_level_user')->get()->getResult();

        return view('/admin/create_user', $data);


    }


    public function adminPost()
    {

        $model = new User();
        $data = [
            'username' => $this->request->getVar('username'),
            'email'  => $this->request->getVar('email'),
            'password'  => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'name_level_user_id'  => $this->request->getVar('name_level_user_id'),
        ];
        $model->insert($data);
        return $this->response->redirect(site_url('/admin'));


    }


    
    
    public function adminDelete($id = null)
    {

        $model = new User();
        $data['user'] = $model->where('id_number', $id)->delete($id);
        return $this->response->redirect(site_url('/admin'));


    }


    public function adminUpdate()
    {
        $item = new User();
        $id = $this->request->getVar('id_number');
        $data = [
            'username' => $this->request->getVar('username'),
            'email'  => $this->request->getVar('email'),
            'password'  => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'name_level_user_id'  => $this->request->getVar('name_level_user_id'),
        ];
        $item->update($id, $data);
        return $this->response->redirect(site_url('/admin'));
    }
    

    public function getEdit($id_number)
    {

        $model = new User();
        $data['user'] = $model->getWhere(['id_number' => $id_number])->getRow();
        $data['level'] = $this->db->table('level')->select('id, name_level_user')->get()->getResult();


        echo view('/admin/edit_user', $data);

    }

    public function getCategory()
    {

     $db      = \Config\Database::connect();
     $builder = $db->table('level');
     $query   = $builder->get();

     foreach ($query->getResult() as $row) {
        echo $row->id;
        echo $row->name_level_user;
    }

}





}
