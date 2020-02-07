<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileSoal extends Model
{
    //
    protected $table = 'file_soals';
    protected $uploads = '/images/';
    protected $fillable = [
        'file'
    ];
    public function getFileAttribute($photo){

        return$this->uploads . $photo;
    }
}

