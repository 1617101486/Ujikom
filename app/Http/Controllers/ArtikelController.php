<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;
use App\Kategori;
use Alert;
use Excel;
use File;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
        $artikel = Artikel::with('Kategori')->get();
        return view('artikel.index',compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategori = Kategori::all();
        return view('artikel.create',compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Alert::success('Selamat Data Berhasil Disimpan')->autoclose(1700);
         $this->validate($request,[
            'title' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required',
            'id_kategori' =>'required',
            'ket' => 'required',
            
        ]);
        $data = new Artikel;
        $data->title = $request->title;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $destinationPath = public_path().'/Image/Artikel/';
            $filename = $file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
            $data->foto = $filename;
            }
        $data->slug = str_slug($request->title);
        $data->content = $request->content;
        $data->ket = $request->ket;
        $data->save();
        $data->Kategori()->attach($request->id_kategori);
        return redirect()->route('artikel.index');
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
        $artikel = Artikel::findOrFail($id);
        $kategori = Kategori::all();
        return view('artikel.show',compact('artikel','kategori'));
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
        $artikel = Artikel::findOrFail($id);
        $kategori = Kategori::all();
        return view('artikel.edit',compact('artikel','kategori'));

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
            'title' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required',
            'ket' => 'required',
            'id_kategori' => 'required',
            
        ]);
        $data = Artikel::findOrFail($id);
        $data->title = $request->title;
        $data->content = $request->content;
        $data->ket = $request->ket;
        // edit upload foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $destinationPath = public_path().'/Image/Artikel/';
            $filename = $file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
    
        // hapus foto lama, jika ada
        if ($data->foto) {
        $old_foto = $data->foto;
        $filepath = public_path() . DIRECTORY_SEPARATOR . '/Image/Artikel/'
        . DIRECTORY_SEPARATOR . $data->foto;
            try {
            File::delete($filepath);
            } catch (FileNotFoundException $e) {
        // File sudah dihapus/tidak ada
            }
        }
        $data->foto = $filename;
}
        $data->save();
        $data->Kategori()->sync($request->id_kategori);
        return redirect()->route('artikel.index');
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
        $artikel = Artikel::findOrFail($id);
        if ($artikel->foto) {
            $old_foto = $artikel->foto;
            $filepath = public_path() . DIRECTORY_SEPARATOR . '/Image/Artikel/'
            . DIRECTORY_SEPARATOR . $artikel->foto;
            try {
            File::delete($filepath);
            } catch (FileNotFoundException $e) {
            // File sudah dihapus/tidak ada
            }
            }
        $artikel->delete();
        return redirect()->route('artikel.index');
    }

    

    public function export(){
        $data = Artikel::get()->toArray();
        return Excel::create('Export Data Artikel '.date("Y-m-d"),function($excel) use ($data){
            $excel->sheet('sheet1',function($sheet) use ($data){
            $sheet->fromArray($data);
        });
        })->download("xlsx");
    }
}
