<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $helpers = ['url', 'form'];
    public function index()
    {
        echo view('head');
        echo view('body');
        echo view('footer');
    }
}

