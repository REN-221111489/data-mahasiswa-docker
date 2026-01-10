<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = [
        'user_id',
        'nim',
        'email',
        'nama_mahasiswa',
        'nomor_hp',
        'fakultas',
        'prodi',
        'kategori_kelas',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
