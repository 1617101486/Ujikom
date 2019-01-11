<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Siswa;
use App\Guru;
use Alert;
use Auth;
use Excel;

class UsersController extends Controller
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
        $data = User::with('Guru','Siswa')->get();
        return view('users.index',compact('data'));
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
        return view('users.create',compact('siswa'));
    }

    public function createguru()
    {
        //
        $guru = Guru::all();
        return view('users.createguru',compact('guru'));
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
            'id_siswa',
            'id_guru',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
            'status' => 'required',
            
        ]);
        $data = new User;
        $data->id_siswa = $request->id_siswa;
        $data->id_guru = $request->id_guru;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->status = $request->status;
        $data->role = $request->role;
        $data->save();
        return redirect()->route('users.index');
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

        $users = User::findOrFail($id);
        $siswa = Siswa::all();
        $guru = Guru::all();
        return view('users.edit',compact('users','siswa','guru'));
        
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
            'id_siswa',
            'id_guru',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
            'status' => 'required',
            
        ]);
        $data = User::findOrFail($id);
        $data->id_siswa = $request->id_siswa;
        $data->id_guru = $request->id_guru;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->status = $request->status;
        $data->role = $request->role;
        $data->save();
        return redirect()->route('users.index');
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
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()->route('users.index');
    }

    public function export(){
        Alert::success('Data Successfully Download','Good Job!')->autoclose(1700);
        $data = User::get()->toArray();
        return Excel::create('Export Data Users '.date("Y-m-d"),function($excel) use ($data){
            $excel->sheet('sheet1',function($sheet) use ($data){
            $sheet->fromArray($data);
        });
        })->download("xlsx");
    }

        
    
}
