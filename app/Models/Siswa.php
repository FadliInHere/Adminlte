<?php

namespace App\Models;

use App\Models\Kelas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'nis',
        'tanggal_lahir',
        'id_kelas',
    ];

    protected $table = 'siswas';

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas','id');
    }
}
