<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelass = Kelas::all();
        return view('kelass.index', [
            'kelass' => $kelass
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelass.create');
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
            'nama' => 'required|unique:kelass,nama'
        ]);

        $kelas = Kelas::insert([
            'nama' => $request->nama
        ]);

        return redirect()->route('kelass.index')
            ->with('success_message', 'Berhasil menambah kelas baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelas = Kelas::find($id);
        if (!$kelas) {
            return redirect()->route('kelass.index')
                ->with('error_message', 'kelas dengan id ' . $id . ' tidak ditemukan');
        }
    
        return view('kelass.show', [
            'kelas' => $kelas
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
        $kelas = Kelas::find($id);
        if (!$kelas) return redirect()->route('kelass.index')
            ->with('error_message', 'Kelas dengan id ' . $id . ' tidak ditemukan');

        return view('kelass.edit', [
            'kelas' => $kelas
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
            'nama' => 'required|unique:kelass,nama,' . $id
        ]);

        $kelas = Kelas::find($id);
        $kelas->nama = $request->nama;
        $kelas->save();

        return redirect()->route('kelass.index')
            ->with('success_message', 'Berhasil mengubah kelas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas = Kelas::find($id);
        if ($kelas) $kelas->delete();
        return redirect()->route('kelass.index')
            ->with('success_message', 'Berhasil menghapus kelas');
    }
    



}
