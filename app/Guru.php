<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Guru extends Model
{
    //
    protected $table ="guru";
    protected $fillable = ['nipd','nama','foto','mapel','alamat'];

    public $timestamps = true;

    public function user() {
		return $this->hasMany('App\User', 'id_guru');
	}

	public function Kelas() {
		return $this->hasMany('App\Kelas', 'wali_kelas');
	}

	public function Tugass() {
		return $this->hasMany('App\Tugas', 'pengirim');
	}
}
