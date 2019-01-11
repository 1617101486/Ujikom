<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    //
    protected $table ="tugas";
    protected $fillable = ['pengirim','file','ket','KKM','nilai'];

    
    public $timestamps = true;

    public function Guru() {
		return $this->belongsTo('App\Guru', 'pengirim');
	}

	public function Siswa()
    {
        return $this->belongsToMany('App\Siswa', 'tugas_siswa', 'id_tugas', 'id_siswa');
    }
}
