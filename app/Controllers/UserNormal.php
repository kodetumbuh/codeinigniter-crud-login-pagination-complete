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

		if (session()->get('name_level_user_id') != "2") {
			echo '<h1> Akses Ditolak </h1>';
			exit;
		}

	}


	public function usertest()
	{
		return view('user_normal/tentang');
	}


	public function index()
	{
		return view('user_normal/userview');
	}

	public function github()
	{
		return view('user_normal/github');
	}

	public function tentang()
	{
		return view('user_normal/tentang');

	}

	public function ajaxLoadData()
	{
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

	public function userPagePost()
	{

		$data['level'] = $this->db->table('level')->select('id, name_level_user')
		->where('name_level_user', 'user')->get()->getResult();

		return view('/user_normal/create_user', $data);
	}


	public function userPost()
	{

		if (!$this->validate([
			'username' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Nama harus diisi'
				]
			],
			'email' => [
				'rules' => 'required|valid_email|is_unique[user.email]',
				'errors' => [
					'required' => 'Email harus diisi',
					'valid_email' => 'Format email harus valid',
					'is_unique' => 'Email sudah terdaftar gunakan email lain'
				]
			],
			'password' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Password harus diisi'
				]
			],
		])) {
			session()->setFlashdata('msg', $this->validator->listErrors());
			return redirect()->back()->withInput();
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

		$model = new User();
		$data['user'] = $model->where('id_number', $id)->delete($id);
		return $this->response->redirect(site_url('/user'));
		
	}


	public function userUpdate(){

		if (!$this->validate([
			'username' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Nama harus diisi'
				]
			],
			'email' => [
				'rules' => 'required|valid_email',
				'errors' => [
					'required' => 'Email harus diisi',
					'valid_email' => 'Format email harus valid'
				]
			],
			'password' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Password harus diisi'
				]
			],
		])) {
			session()->setFlashdata('msg', $this->validator->listErrors());
			return redirect()->back()->withInput();
		} else {
			$model = new User();
			$id = $this->request->getVar('id_number');
			$data = [
				'username' => $this->request->getVar('username'),
				'email'  => $this->request->getVar('email'),
				'password'  => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
				'name_level_user_id'  => $this->request->getVar('name_level_user_id'),
			];
			$model->update($id, $data);
			return $this->response->redirect(site_url('/user'));
		}

		
		
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
