<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Siswa extends Model
{
    //
    protected $table ="siswa";
    protected $fillable = ['nis','nama','foto','kelas','alamat'];

    public $timestamps = true;

    public function user() {
		return $this->hasMany('App\User', 'id_siswa');
	}

	public function Kelas() {
        return $this->belongsTo('App\Kelas', 'id_kelas');
    }

    public function Tugas()
    {
        return $this->belongsToMany('App\Tugas', 'tugas_siswa', 'id_tugas', 'id_siswa');
    }
}
