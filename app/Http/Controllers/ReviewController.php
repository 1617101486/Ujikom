<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use Alert;
use Excel;
use File;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reviews = Review::all();
        return view('reviews.index',compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('reviews.create');   
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
            'name' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'review' => 'required',
            
        ]);
        $data = new Review;
        $data->name = $request->name;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $destinationPath = public_path().'/Image/Review/';
            $filename = $file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
            $data->foto = $filename;
            }
        $data->review = $request->review;
        $data->save();
        return redirect()->route('review.index');
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
        $review = Review::findOrFail($id);
        return view('reviews.edit',compact('review'));
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
            'name' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'review' => 'required',
            
        ]);
        $data = Review::findOrFail($id);
        $data->name = $request->name;
        $data->review = $request->review;
        // edit upload foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $destinationPath = public_path().'/Image/Review/';
            $filename = $file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
    
        // hapus foto lama, jika ada
        if ($data->foto) {
        $old_foto = $data->foto;
        $filepath = public_path() . DIRECTORY_SEPARATOR . '/Image/Review/'
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
        return redirect()->route('review.index');
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
        $review = Review::findOrFail($id);
        if ($review->foto) {
            $old_foto = $review->foto;
            $filepath = public_path() . DIRECTORY_SEPARATOR . '/Image/Review/'
            . DIRECTORY_SEPARATOR . $review->foto;
            try {
            File::delete($filepath);
            } catch (FileNotFoundException $e) {
            // File sudah dihapus/tidak ada
            }
            }
        $review->delete();
        return redirect()->route('review.index');
    }

    public function export(){
        $data = Review::get()->toArray();
        return Excel::create('Export Data Review '.date("Y-m-d"),function($excel) use ($data){
            $excel->sheet('sheet1',function($sheet) use ($data){
            $sheet->fromArray($data);
        });
        })->download("xlsx");
    }
}
