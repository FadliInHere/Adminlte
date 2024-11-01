<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;

class JoinController extends Controller
{
    public function innerJoin()
    {
        // join antara tabel siswas dan kelass
        $siswas = Siswa::join('kelass', 'siswas.id_kelas', '=', 'kelass.id')
            ->select('siswas.nama', 'kelass.nama as nama_kelas')
            ->get();

        return view('join.innerjoin', compact('siswas'));
    }

    public function leftJoin()
    {
        // Mengambil semua data kelas dengan left join ke tabel siswa
        $kelass = DB::table('kelass')
                    ->leftJoin('siswas', 'kelass.id', '=', 'siswas.id_kelas')
                    ->select(
                        'kelass.id',
                        'kelass.nama as nama_kelas',
                        'siswas.nama as nama_siswa'
                    )
                    ->get();

        // Mengirimkan data ke view
        return view('join.leftjoin', compact('kelass'));
        }
}