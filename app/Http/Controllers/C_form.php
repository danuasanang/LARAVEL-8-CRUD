<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;

class C_form extends Controller
{
    public function index()
    {
        $data = DB::table('mahasiswatable')->get();
        return view('formDaftar',['data'=>$data]);
    }


    public function prosesReg(Request $request)
    {
        $key = new Mahasiswa;
        $key->nim = $request->nim;
        $key->nama_lengkap = $request->nama_lengkap;
        $key->tanggal_lahir = $request->tanggal_lahir;
        $key->ipk= $request->ipk;
        $key->save();

        return redirect()->route('form')->with('status','Berhasil DItambahkan');
    }

    public function prosesDel($id)
    {
       DB::table('mahasiswatable')->where('nim',$id)->delete();
       return redirect()->route('form');
    }

    public function prosesUpdate(Request $request)
    {
        $nim = $request->nim;
        $nama = $request->nama_lengkap;
        $tanggal_lahir = $request->tanggal_lahir;
        $ipk = $request->ipk;
        DB::table('mahasiswatable')->where('nim',$nim)->update([
            'nama_lengkap'=>$nama,
            'tanggal_lahir'=>$tanggal_lahir,
            'ipk'=>$ipk,
        ]);
        return redirect()->route('form');
    }























    public function prosggesReg(Request $request)
    {
        echo $request->nim;
        echo $request->nama_lengkap;
        echo $request->email;
        echo $request->kelamin;
        echo $request->jurusan;
        echo $request->alamat;

        $validateData = $request->validate([
            'nim' => 'required|size:8',
            'nama_lengkap' => 'required|min:3|max:50',
            'email' => 'required|email',
            'kelamin' => 'required|in:P,L',
            'jurusan' => 'required',
            'alamat' => 'required'
        ]);

        dump($validateData);
        $validateData['nim'];
        $validateData['nama_lengkap'];
        $validateData['email'];
        $validateData['kelamin'];
        $validateData['jurusan'];
        $validateData['alamat'];
    }
}
