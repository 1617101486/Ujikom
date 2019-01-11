<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tugas;
use App\Siswa;
use App\Guru;
use Alert;
use Excel;
use File;
class TugasController extends Controller
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
        $data = Tugas::with('Guru')->get();
        return view('tugas.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $siswa = Siswa::all();
        $guru = Guru::all();
        return view('tugas.create',compact('guru','siswa'));
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
        Alert::success('Selamat Data Berhasil Ditambahkan')->autoclose(1700);
        $this->validate($request,[
            'ket' => 'required',
            'pengirim' => 'required',
            'file' => 'required',
            'penerima' => 'required',
            'KKM' => 'required',
        ]);
        $data = new Tugas;
        $data->ket = $request->ket;
        $data->pengirim = $request->pengirim;
        if ($request->KKM > 100) {
            Alert::error('Maaf Data Yang Dimasukan Tidak Valid')->autoclose(1700);
            return redirect()->route('tugas.create');
        } elseif($request->KKM < 0){
           Alert::error('Maaf Data Yang Dimasukan Tidak Valid')->autoclose(1700);
           return redirect()->route('tugas.create');
        } else{
            $data->KKM = $request->KKM;
        }
        
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $destinationPath = public_path().'/File/Tugas/';
            $filename = $file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
            $data->file = $filename;
            }

        $data->save();
        $data->Siswa()->attach($request->penerima);
        return redirect()->route('tugas.index');
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
        $tugas = Tugas::findOrFail($id);
        $siswa = Siswa::all();
        $guru = Guru::all();
        return view('tugas.show',compact('guru','siswa','tugas'));
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
        $tugas = Tugas::findOrFail($id);
        $siswa = Siswa::all();
        $guru = Guru::all();
        return view('tugas.edit',compact('guru','siswa','tugas'));
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
        Alert::success('Selamat Data Berhasil Diganti Dengan Yang Baru')->autoclose(1700);
        $this->validate($request,[
            'pengirim' => 'required',
            'file' => 'required',
            'KKM' => 'required',
            'penerima' => 'required',
            
            
        ]);
        $data = Tugas::findOrFail($id);
        $tuntas ="Tuntas";
        $Blm ="Belum Tuntas";
        $null = "Sedang Di Proses";
        
        // edit upload file
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $destinationPath = public_path().'/File/Tugas/';
            $filename = $file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
    
        // hapus file lama, jika ada
        if ($data->file) {
        $old_file = $data->file;
        $filepath = public_path() . DIRECTORY_SEPARATOR . '/File/Tugas/'
        . DIRECTORY_SEPARATOR . $data->file;
            try {
            File::delete($filepath);
            } catch (FileNotFoundException $e) {
        // File sudah dihapus/tidak ada
            }
        }
        $data->file = $filename;
}
        
        if ($request->KKM > 100) {
            Alert::error('Maaf Data Yang Dimasukan Tidak Valid')->autoclose(1700);
            return redirect()->route('tugas.edit');
        } elseif ($request->KKM < 0) {
           Alert::error('Maaf Data Yang Dimasukan Tidak Valid')->autoclose(1700);
            return redirect()->route('tugas.edit');
        }else{
            $data->KKM = $request->KKM;
        }
        $data->pengirim = $request->pengirim;
        if ($request->nilai > 100){
            Alert::error('Maaf Data Yang Dimasukan Tidak Valid')->autoclose(1700);
            return redirect()->route('tugas.edit');
        }elseif ($request->nilai < 0) {
            Alert::error('Maaf Data Yang Dimasukan Tidak Valid')->autoclose(1700);
            return redirect()->route('tugas.edit');
        }elseif ($request->nilai === null) {
            
        }
        else{
            $data->nilai = $request->nilai; 
            if ($request->nilai > $request->KKM) {
            $data->ket =$tuntas;

            }elseif($request->nilai < $request->KKM){
            $data->ket =$Blm;
        }
        }
        $data->save();
        $data->Siswa()->sync($request->penerima);
        return redirect()->route('tugas.index');
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
        $tugas = Tugas::findOrFail($id);
        if ($tugas->file) {
            $old_file = $tugas->file;
            $filepath = public_path() . DIRECTORY_SEPARATOR . '/File/Tugas/'
            . DIRECTORY_SEPARATOR . $tugas->file;
            try {
            File::delete($filepath);
            } catch (FileNotFoundException $e) {
            // File sudah dihapus/tidak ada
            }
            }
        $tugas->delete();
        return redirect()->route('tugas.index');
    }

    public function download($file) {

    $file_path = public_path('/File/Tugas/'.$file);
    return response()->download($file_path);
    
    }

    public function export(){
        $data = Tugas::get()->toArray();
        return Excel::create('Export Data Tugas '.date("Y-m-d"),function($excel) use ($data){
            $excel->sheet('sheet1',function($sheet) use ($data){
            $sheet->fromArray($data);
        });
        })->download("xlsx");
    }

    public function kirim($id)
    {
        $tugas = Tugas::findOrFail($id);
        return view('tugas.kirim',compact('tugas'));

    }

}
