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
            return view('public/not_login');
            exit;
        } else {
            return view('user_normal/tentang');
        }
    }



    public function admintest()
    {
        // cek session apakah admin atau tidak
        if (session()->get('name_level_user_id') != "1") {
            return view('public/not_login');
            exit;
        } else {
            return view('/admin/adminview');
        }
    }

    public function index()
    {
        // cek session apakah admin atau tidak
        if (session()->get('name_level_user_id') != "1") {
            return view('public/not_login');
            exit;
        } else {
            return view('admin/adminview');
        }
    }

    public function github()
    {
        // cek session apakah admin atau tidak
        if (session()->get('name_level_user_id') != "1") {
            return view('public/not_login');
            exit;
        } else {
            return view('admin/github');
        }
    }

    public function tentang()
    {
        // cek session apakah admin atau tidak
        if (session()->get('name_level_user_id') != "1") {
            return view('public/not_login');
            exit;
        } else {
            return view('admin/tentang');
        }

    }


    public function ajaxLoadData()
    {
        // cek session apakah admin atau tidak
        if (session()->get('name_level_user_id') != "1") {
            return view('public/not_login');
            exit;
        } else {
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
        
    }


    public function adminPagePost()
    {
        // cek session apakah admin atau tidak
        if (session()->get('name_level_user_id') != "1") {
            return view('public/not_login');
            exit;
        } else {
            $data['level'] = $this->db->table('level')->select('id, name_level_user')->get()->getResult();

            return view('/admin/create_user', $data);
        }
        
    }


    public function adminPost()
    {
        // cek session apakah admin atau tidak
        if (session()->get('name_level_user_id') != "1") {
            return view('public/not_login');
            exit;
        } else {
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
        
    }


    
    
    public function adminDelete($id = null)
    {
        // cek session apakah admin atau tidak
        if (session()->get('name_level_user_id') != "1") {
            return view('public/not_login');
            exit;
        } else {
            $model = new User();
            $data['user'] = $model->where('id_number', $id)->delete($id);
            return $this->response->redirect(site_url('/admin'));
        }
        
    }


    public function adminUpdate()
    {
        // cek session apakah admin atau tidak
        if (session()->get('name_level_user_id') != "1") {
            return view('public/not_login');
            exit;
        } else {
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
        
    }
    

    public function getEdit($id_number)
    {
        // cek session apakah admin atau tidak
        if (session()->get('name_level_user_id') != "1") {
            return view('public/not_login');
            exit;
        } else {
            $model = new User();
            $data['user'] = $model->getWhere(['id_number' => $id_number])->getRow();
            $data['level'] = $this->db->table('level')->select('id, name_level_user')->get()->getResult();


            echo view('/admin/edit_user', $data);
        }

    }

    public function getCategory()
    {
        // cek session apakah admin atau tidak
        if (session()->get('name_level_user_id') != "1") {
            return view('public/not_login');
            exit;
        } else {
         $db      = \Config\Database::connect();
         $builder = $db->table('level');
         $query   = $builder->get();

         foreach ($query->getResult() as $row) {
            echo $row->id;
            echo $row->name_level_user;
        }
    }
    
}





}
