<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $fillable = [
        'nis',
        'nama',
        'id_kelas',
        'jenis_kelamin',
        'alamat',
        'no_telp',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
        
    }
}
