<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class UploadFile extends Model
{
    //
    protected $table = 'upload_file';
    protected $fillable = [
        'id', 'mata_kuliah_id', 'users_id', 'tanggal_ujian', 'jam_mulai_ujian', 'jam_selesai_ujian', 'durasi_ujian', 'total_ujian', 'file', 'jenis_ulangan_id', 'file_soal_id', 'user_id', 'user_name'

    ];

    public function matakuliahh() {
        return $this->belongsTo('App\MataKuliah', 'mata_kuliah_id');
    }

    public function jenisujian() {
        return $this->belongsTo('App\JenisUlangan', 'jenis_ulangan_id');
    }

    public function file() {
        return $this->belongsTo('App\FileSoal', 'file_soal_id');
    }

    public function userss() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function usersss() {
        return $this->belongsTo('App\User', 'user_name');
    }

}
