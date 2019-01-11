<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\Guru;
use Alert;
class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kelas = Kelas::with('Guru')->get();
        return view('kelas.index',compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $guru = Guru::all();
        return view('kelas.create',compact('guru'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Responsehp
     */
    public function store(Request $request)
    {
        //
        Alert::success('Selamat Data Berhasil Disimpan')->autoclose(1700);
        $this->validate($request,[
            'nama' => 'required',
            'wali_kelas' => 'required',
              
        ]);
        $data = new Kelas;
        $data->nama = $request->nama;
        $data->wali_kelas = $request->wali_kelas;
        $data->save();
        return redirect()->route('kelas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $kelas = Kelas::findOrFail($id);
        $guru = Guru::all();
        return view('kelas.edit',compact('kelas','guru'));
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
        //
        Alert::success('Selamat Data Berhasil Diubah')->autoclose(1700);
        $this->validate($request,[
            'nama' => 'required',
            'wali_kelas' => 'required',
              
        ]);
        $data = Kelas::findOrFail($id);
        $data->nama = $request->nama;
        $data->wali_kelas = $request->wali_kelas;
        $data->save();
        return redirect()->route('kelas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Alert::success('Selamat Data Berhasil Dihapus')->autoclose(1700);
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();
        return redirect()->route('kelas.index');
    }
}
