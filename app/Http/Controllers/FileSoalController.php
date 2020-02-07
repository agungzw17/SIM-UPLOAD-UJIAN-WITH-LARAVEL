<?php

namespace App\Http\Controllers;

use App\FileSoal;
use App\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileSoalController extends Controller
{
    public function home(){
        return view('welcome');
    }

    public function download()
    {
        $filename = '1573650830theme-8252765465274618193.xml';

        $dir = '/';
        $recursive = false; // Get subdirectories also?
        $contents = collect(Storage::cloud()->listContents($dir, $recursive));

        $file = $contents
            ->where('type', '=', 'file')
            ->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
            ->where('extension', '=', pathinfo($filename, PATHINFO_EXTENSION))
            ->first(); // there can be duplicate file names!

        //return $file; // array with file info

        $rawData = Storage::cloud()->get($file['path']);

        return response($rawData, 200)
            ->header('ContentType', $file['mimetype'])
            ->header('Content-Disposition', "attachment; filename='$filename'");
    }
}
