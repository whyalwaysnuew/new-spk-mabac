<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\User as UserModel;

class User extends BaseController
{
    public function __construct()
    {
        // parent::__construct();
        $this->user = new UserModel();

        
    }

    public function index()
    {
        $data = [
            'title' => 'User | SPK MABAC',
            'ajax' => 'user',
            'menu' => 'user',
            'users' => $this->user->getData()
        ];

        return view('user/index', $data);
    }
}
