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

    public function getModalCreate()
    {
        $data = [
            'levels' => $this->user->getLevels()
        ];

        return view('user/create', $data);
    }

    public function getModalEdit($id)
    {
        $data = [
            'user' => $this->user->getDetail($id),
            'levels' => $this->user->getLevels()
        ];

        return view('user/edit', $data);
    }

    public function store()
    {
        $nama = $this->request->getPost('nama');
        $password = $this->request->getPost('password');
        $email = $this->request->getPost('email');
        $username = $this->request->getPost('username');
        $id_level = $this->request->getPost('id_level');
        
        if(@$nama && @$email && @$username && @$id_level && @$password){
            $data = [
                'id_user_level' => $id_level,
                'nama' => $nama,
                'email' => $email,
                'username' => $username,
                'password' => password_hash($password, PASSWORD_BCRYPT)
            ];

            $result = $this->user->insertData($data);

            if(@$result) {
                $response = array(
                    "response" => 200,
                    "message" => $nama . " berhasil diinput."
                );
            } else {
                $response = array(
                    "response" => 404,
                    "message" => "Terjadi kesalahan! " . @$nama . " gagal diinput."
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

    public function update()
    {
        $id = $this->request->getPost('id_user');
        $nama = $this->request->getPost('nama');
        $password = $this->request->getPost('password');
        $email = $this->request->getPost('email');
        $username = $this->request->getPost('username');
        $id_level = $this->request->getPost('id_level');
        
        if(@$nama && @$email && @$username && @$id_level && @$password){
            $data = [
                'id_user_level' => $id_level,
                'nama' => $nama,
                'email' => $email,
                'username' => $username,
                'password' => password_hash($password, PASSWORD_BCRYPT)
            ];

            $result = $this->user->updateData($id, $data);

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

    public function delete()
    {
        $id = $this->request->getGet('id');

        if (@$id) {

            $this->user->deleteData($id);

            $response = array(
                "response" => 200,
                "message" => "Data successfully deleted."
            );
        } else {
            $response = array(
                "response" => 500,
                "message" => "An error occured while processing your request."
            );
        }

        echo json_encode($response);
    }
}
