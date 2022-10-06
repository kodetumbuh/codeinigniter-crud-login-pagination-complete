<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;


class Login extends BaseController
{
	public function index()
	{
		helper(['form']);
		return view('public/login');
	}


	public function auth()
	{
		$session = session();
		$model = new User();
		$email = $this->request->getVar('email');
		$password = $this->request->getVar('password');
		$data = $model->where('email', $email)->first();

		if($data){
			$pass = $data['password'];
			$level_login = $data['name_level_user_id'];
			$verify_pass = password_verify($password, $pass);

			if($verify_pass)
			{
				$ses_data = [
					'id_number'       => $data['id_number'],
					'username'     => $data['username'],
					'email'    => $data['email'],
					'name_level_user_id'         => $data['name_level_user_id'],
					'logged_in'     => TRUE
				];

				$session->set($ses_data);


                // cek kondisi level user
				if ($level_login == '1') {
					return redirect()->to('/admin');
				}

				if ($level_login == '2') {
					return redirect()->to('/user');
				}

			}else{
				$session->setFlashdata('msg', 'Wrong Password');
				return redirect()->to('/login');
			}

		}else{
			$session->setFlashdata('msg', 'Email not Found');
			return redirect()->to('/login');
		}

	}

	public function notLogin()
	{
		return view('public/not_login');
	}

	public function user()
	{
        // cek session apakah admin atau tidak
		if (session()->get('name_level_user_id') != "1") {
			return view('public/not_login');
			exit;
		} else {
			return view('user');
		}
	}

	public function admin()
	{
        // cek session apakah admin atau tidak
		if (session()->get('name_level_user_id') != "2") {
			return view('not_login');
			exit;
		} else {
			return view('admin');
		}
	}


	public function logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->to('/login');
	}
}
