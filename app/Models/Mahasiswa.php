<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswatable';
    protected $fillable =[
        'nim',
        'nama_lengkap',
        'tanggal_lahir',
        'ipk',
    ];
}
