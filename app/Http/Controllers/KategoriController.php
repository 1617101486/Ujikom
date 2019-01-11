<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;
use Alert;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all();
        // dd($kategori);
        return view('kategori.index',compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Alert::success('Selamat Data Berhasil Disimpan')->autoclose(1700);
        $this->validate($request,[
            'nama_kategori' => 'required|unique:kategori',
            
        ]);
        $kategori = new kategori;
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->slug = str_slug($request->nama_kategori,'-');
        // dd($kategori);
        $kategori->save();
        
        return redirect()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
     public function destroy(kategori $kategori)
    {
        $kate = Kategori::findOrFail($kategori->id);
        $kate->delete();
        Alert::success('Selamat Data Berhasil Dihapus')->autoclose(1700);
        return redirect()->route('kategori.index');
    }
}
