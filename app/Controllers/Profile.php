<?php

namespace App\Controllers;

use App\Models\ProfileModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Profile extends BaseController
{
    public function __construct()
    {
        $this->profile = new ProfileModel();
    }

    public function index()
    {
        $data = [
            'menu' => 'profile',
            'title' => 'Profile | SPK MABAC',
            'ajax' => 'profile',
            'user' => $this->profile->getDetail(session()->get('id_user'))
        ];

        return view('profile/index', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('id_user');
        $nama = $this->request->getPost('nama');
        $password = $this->request->getPost('password');
        $email = $this->request->getPost('email');
        $username = $this->request->getPost('username');
        
        if(@$nama && @$email && @$username && @$password){
            $data = [
                'nama' => $nama,
                'email' => $email,
                'username' => $username,
                'password' => password_hash($password, PASSWORD_BCRYPT)
            ];

            $result = $this->profile->updateData($id, $data);

            if(@$result) {
                $response = array(
                    "response" => 200,
                    "message" => $nama . " berhasil diubah."
                );
            } else {
                $response = array(
                    "response" => 404,
                    "message" => "Terjadi kesalahan! " . @$nama . " gagal diubah."
                );
            }

        } else {
            $response = array(
                "response" => 500,
                "message" => "Seluruh data wajib diisi!"
            );
        }

        echo json_encode($response);
    }
}
