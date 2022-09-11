<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'link' => '/admin',
        ];

        return view('pages.home', $data);
    }
}
