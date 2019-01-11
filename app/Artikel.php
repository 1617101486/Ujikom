<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    //
    protected $table ="artikel";
    protected $fillable = ['title','foto','content','ket'];

    public $timestamps = true;

    public function Kategori()
    {
        return $this->belongsToMany('App\Kategori', 'artikel_kategori', 'id_artikel', 'id_kategori');
    }

    
}
