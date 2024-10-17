<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\AuthModel;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->auth = new AuthModel;

    }

    public function index()
    {
        if(session()->get('user_id')){
            return redirect()->to(base_url('/'));
        }

        $data = [
            'title' => 'Auth | PT SILICAINDO',
            'ajax' => 'auth',
        ];

        return view('auth/login', $data);
    }

    public function login()
    {
        $data = $this->request->getPost();

        $user = $this->auth->getDataUser($data['username']);

        if($user && password_verify($data['password'], $user->password))
        {
            $userData = [
                'id_user' => $user->id_user,
                'username' => $user->username,
                'level' => $user->id_user_level,
                'level_name' => $user->user_level,
                'nama' => $user->nama,
            ];

            session()->set($userData);

            $data = [
                'response' => 200,
                'message' => 'Login Success!'
            ];

        } else {
            $data = [
                'response' => 500,
                'message' => 'Account doesn\'t match any data!'
            ];
        }

        echo json_encode($data);

    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to(base_url('auth'));
    }
}
