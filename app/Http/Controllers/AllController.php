<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Artikel;

class AllController extends Controller
{
    //

    public function review()
    {
    	$review = Review::all();
    	return view('allreview',compact('review'));
    }

    public function artikel()
    {
    	$artikel = Artikel::all();
    	return view('allartikel',compact('artikel'));
    }
}
