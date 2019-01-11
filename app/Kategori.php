<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
	protected $table = "kategori";
    protected $fillable = ['nama_kategori','slug'];
    public $timestamps = true;

    public function Artikel()
    {
        return $this->belongsToMany('App\Artikel', 'artiekl_kategori', 'id_artiekl', 'id_kategori');
    }
}
