<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Kelas;
use Alert;
use Excel;
use File;
class SiswaController extends Controller
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
        $siswa = Siswa::with('Kelas')->get();
        return view('siswa.index',compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kelas = Kelas::all();
        return view('siswa.create',compact('kelas'));
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
            'nis' => 'required',
            'nama' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_kelas' => 'required',
            'alamat' => 'required',
            
        ]);
        $data = new Siswa;
        $data->nis = $request->nis;
        $data->nama = $request->nama;
        $data->id_kelas = $request->id_kelas;
        $data->alamat = $request->alamat;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $destinationPath = public_path().'/Image/Siswa/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
            $data->foto = $filename;
            }
        $data->save();
        return redirect()->route('siswa.index');
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
        $siswa = Siswa::findOrFail($id);
        $kelas =Kelas::all();
        return view('siswa.edit',compact('siswa','kelas'));
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
          Alert::success('Selamat Data Berhasil Diubah')->autoclose(1700);
        $this->validate($request,[
            'nis' => 'required',
            'nama' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_kelas' => 'required',
            'alamat' => 'required',
            
        ]);
        $data = Siswa::findOrFail($id);
        $data->nis = $request->nis;
        $data->nama = $request->nama;
        
        $data->id_kelas = $request->id_kelas;
        $data->alamat = $request->alamat;
        // edit upload foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $destinationPath = public_path().'/Image/Siswa/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
    
        // hapus foto lama, jika ada
        if ($data->foto) {
        $old_foto = $data->foto;
        $filepath = public_path() . DIRECTORY_SEPARATOR . '/Image/Siswa/'
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
        return redirect()->route('siswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Alert::success('Selamat Data Berhasil Dihapus')->autoclose(1700);
        $siswa = Siswa::findOrFail($id);
        if ($siswa->foto) {
            $old_foto = $siswa->foto;
            $filepath = public_path() . DIRECTORY_SEPARATOR . '/Image/Siswa/'
            . DIRECTORY_SEPARATOR . $siswa->foto;
            try {
            File::delete($filepath);
            } catch (FileNotFoundException $e) {
            // File sudah dihapus/tidak ada
            }
            }
        $siswa->delete();
        return redirect()->route('siswa.index');
        
    }
    public function export(){
        $data = Siswa::get()->toArray();
        return Excel::create('Export Data Siswa '.date("Y-m-d"),function($excel) use ($data){
            $excel->sheet('sheet1',function($sheet) use ($data){
            $sheet->fromArray($data);
        });
        })->download("xlsx");
    }
}
