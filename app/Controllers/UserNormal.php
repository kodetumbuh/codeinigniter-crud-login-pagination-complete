<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;
use App\Models\User;

class UserNormal extends BaseController
{

	public function __construct()
	{
		$this->db = \Config\Database::connect();
	}


	public function usertest()
	{
        // cek session apakah admin atau tidak
		if (session()->get('name_level_user_id') != "2") {
			return view('public/not_login');
			exit;
		} else {
			return view('user_normal/tentang');
		}
	}


	public function index()
	{
		// cek session apakah admin atau tidak
		if (session()->get('name_level_user_id') != "2") {
			return view('public/not_login');
			exit;
		} else {
			return view('user_normal/userview');
		}
		
	}

	public function github()
	{
		if (session()->get('name_level_user_id') != "2") {
			return view('public/not_login');
			exit;
		} else {
			return view('user_normal/github');
		}
	}

	public function tentang()
	{
		// cek session apakah admin atau tidak
		if (session()->get('name_level_user_id') != "2") {
			return view('public/not_login');
			exit;
		} else {
			return view('user_normal/tentang');
		}
	}

	public function ajaxLoadData()
	{

		// cek session apakah admin atau tidak
		if (session()->get('name_level_user_id') != "2") {
			return view('public/not_login');
			exit;
		} else {
			$db = db_connect();
			$builder = $db->table('user')
			->select('id_number ,username, email, level.name_level_user')
			->join('level', 'user.name_level_user_id = level.id','left')
			->where('name_level_user', 'user');

    // alternatif ajax edit
			return DataTable::of($builder)
			->edit('id_number', function($row){
				return '
				<a href="user/edit/'.$row->id_number.' " class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></a>
				<a href="user/delete/'.$row->id_number.' " class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
				';
			})
			->toJson(true);
		}
		
	}

	public function userPagePost()
	{
		// cek session apakah admin atau tidak
		if (session()->get('name_level_user_id') != "2") {
			return view('public/not_login');
			exit;
		} else {
			$data['level'] = $this->db->table('level')->select('id, name_level_user')
			->where('name_level_user', 'user')->get()->getResult();

			return view('/user_normal/create_user', $data);
		}
		
	}


	public function userPost()
	{
		// cek session apakah admin atau tidak
		if (session()->get('name_level_user_id') != "2") {
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
			return $this->response->redirect(site_url('/user'));
		}	
	}


	public function userDelete($id = null)
	{
		if (session()->get('name_level_user_id') != "2") {
			return view('public/not_login');
			exit;
		} else {
			$model = new User();
			$data['user'] = $model->where('id_number', $id)->delete($id);
			return $this->response->redirect(site_url('/user'));
		}
	}


	public function userUpdate(){
		$item = new User();
		$id = $this->request->getVar('id_number');
		$data = [
			'username' => $this->request->getVar('username'),
			'email'  => $this->request->getVar('email'),
			'password'  => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
			'name_level_user_id'  => $this->request->getVar('name_level_user_id'),
		];
		$item->update($id, $data);
		return $this->response->redirect(site_url('/user'));
	}


	public function getEdit($id_number)
	{
		$model = new User();
		$data['user'] = $model->getWhere(['id_number' => $id_number])->getRow();
		$data['level'] = $this->db->table('level')->select('id, name_level_user')
		->where('name_level_user', 'user')->get()->getResult();


		echo view('/user_normal/edit_user', $data);
	}

}
