<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = Siswa::all();
        return view('siswas.index', [
            'siswas' => $siswas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelass = Kelas::all();
        return view('siswas.create',['kelass' => $kelass]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nis' => 'required|unique:siswas,nis',
            'tanggal_lahir' => 'required|date',
            'id_kelas' => 'required|exists:kelass,id'
        ]);
        
        $data = $request->only([
            'nama',
            'nis',
            'tanggal_lahir',
            'id_kelas'
        ]);
        
        $siswa = Siswa::insert($data);
        return redirect()->route('siswas.index')
            ->with('success_message', 'Berhasil menambah siswa baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::find($id);
        if (!$siswa) {
            return redirect()->route('siswas.index')
                ->with('error_message', 'Siswa dengan id ' . $id . ' tidak ditemukan');
        }
    
        return view('siswas.show', [
            'siswa' => $siswa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
{
    $siswa = Siswa::find($id);
    if (!$siswa) {
        return redirect()->route('siswas.index')
            ->with('error_message', 'Siswa dengan id ' . $id . ' tidak ditemukan');
    }

    // Ambil semua data kelas
    $kelass = Kelas::all(); 

    return view('siswas.edit', [
        'siswa' => $siswa,
        'kelass' => $kelass  // Mengirim variabel $kelass ke view
    ]);
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'nis' => 'required|unique:siswas,nis,' . $id,
            'tanggal_lahir' => 'required|date',
            'id_kelas' => 'required|exists:kelass,id'
        ]);
        
        $siswa = Siswa::find($id);
        $siswa->nama = $request->nama;
        $siswa->nis = $request->nis;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->id_kelas = $request->id_kelas;
        $siswa->save();
        
        return redirect()->route('siswas.index')
            ->with('success_message', 'Berhasil mengubah siswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        if ($siswa) $siswa->delete();
        return redirect()->route('siswas.index')
            ->with('success_message', 'Berhasil menghapus siswa');
    }
    

}
