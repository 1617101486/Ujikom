<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;
use Excel;
use Alert;
use File;

class GuruController extends Controller
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
        $guru = Guru::all();
        return view('guru.index',compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('guru.create');
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
            'nipd' => 'required',
            'nama' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'mapel' => 'required',
            'alamat' => 'required',
            
        ]);
        $data = new Guru;
        $data->nipd = $request->nipd;
        $data->nama = $request->nama;
        $data->mapel = $request->mapel;
        $data->alamat = $request->alamat;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $destinationPath = public_path().'/Image/Guru/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
            $data->foto = $filename;
            }
        $data->save();
        return redirect()->route('guru.index');
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
         $guru = Guru::findOrFail($id);
        return view('guru.edit',compact('guru'));
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
            'nipd' => 'required',
            'nama' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'mapel' => 'required',
            'alamat' => 'required',
            
        ]);
        $data = Guru::findOrFail($id);
        $data->nipd = $request->nipd;
        $data->nama = $request->nama;
        $data->mapel = $request->mapel;
        $data->alamat = $request->alamat;
        // edit upload foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $destinationPath = public_path().'/Image/Guru/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
    
        // hapus foto lama, jika ada
        if ($data->foto) {
        $old_foto = $data->foto;
        $filepath = public_path() . DIRECTORY_SEPARATOR . '/Image/Guru/'
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
        return redirect()->route('guru.index');
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
        $guru = Guru::findOrFail($id);
        if ($guru->foto) {
            $old_foto = $guru->foto;
            $filepath = public_path() . DIRECTORY_SEPARATOR . '/Image/Guru/'
            . DIRECTORY_SEPARATOR . $guru->foto;
            try {
            File::delete($filepath);
            } catch (FileNotFoundException $e) {
            // File sudah dihapus/tidak ada
            }
            }
        
        $guru->delete();
        return redirect()->route('guru.index');
    }

    public function export(){
        $data = Guru::get()->toArray();
        return Excel::create('Export Data Guru '.date("Y-m-d"),function($excel) use ($data){
            $excel->sheet('sheet1',function($sheet) use ($data){
            $sheet->fromArray($data);
        });
        })->download("xlsx");
    }
}
