<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int|null $user_id
 * @property string $nim
 * @property string $email
 * @property string $nama_mahasiswa
 * @property string $nomor_hp
 * @property string $fakultas
 * @property string $prodi
 * @property string $kategori_kelas
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mahasiswa newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mahasiswa newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mahasiswa query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mahasiswa whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mahasiswa whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mahasiswa whereFakultas($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mahasiswa whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mahasiswa whereKategoriKelas($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mahasiswa whereNamaMahasiswa($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mahasiswa whereNim($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mahasiswa whereNomorHp($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mahasiswa whereProdi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mahasiswa whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mahasiswa whereUserId($value)
 * @mixin \Eloquent
 */
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
