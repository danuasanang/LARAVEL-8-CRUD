<?php

namespace App\Http\Controllers;

class C_coba extends Controller
{
    public function index()
    {
        return view('siswa');
    }
    public function datasiswa()
    {
        return view('datasiswa');
    }
}
