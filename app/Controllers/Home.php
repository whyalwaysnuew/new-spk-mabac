<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Home | SPK Mabac',
            'ajax' => 'home'
        ];

        return view('home/index', $data);
    }
}
