<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Kelas;
class Kelas extends Model
{
    //
	protected $table ="kelas";
	protected $fillable =['nama','wali_kelas'];

	public function Guru() {
        return $this->belongsTo('App\Guru', 'wali_kelas');

    }
    public function siswa() {
		return $this->hasMany('App\Siswa', 'id_kelas');
	}
}
