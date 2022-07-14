<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function proseslogin(Request $request)
    {
        $request->validate(['username' => 'required',]);
        $validUsername = ['danu','jojo'];

        if (in_array($request->username, $validUsername))
        {
            session(['username' => $request->username]);
            return redirect('/daftar-mahasiswa');
        }else{
            return back()->withInput()->with('pesan',"Username tidak valid");
        }
    }
    public function Logout(){
        session()->forget('username');
        return redirect('login')->with('pesan',"Logout berhasil");
    }
}

