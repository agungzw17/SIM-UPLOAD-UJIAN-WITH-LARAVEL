<?php

namespace App\Http\Controllers;

use App\FileSoal;
use App\JenisUlangan;
use App\MataKuliah;
use App\UploadFile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function berhasil() {

        return view('post.dosen.sukses');
    }

    public function index()
    {

        $sudahupload = DB::table('upload_file')
            ->select('user_id')
            ->join('users', 'users.id', '=', 'upload_file.user_id')
            ->get();
        //
        Auth::user();
        $uploadFile = UploadFile::all();
        $dosen = User::all()->where('role_id', '1');
        $panitia = User::all()->where('role_id', '2');
        return view('post.panitia.panitia' , compact('uploadFile', 'dosen', 'panitia', 'sudahupload'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        Auth::user();
        $matakuliahh = MataKuliah::all();
        $jenisujian = JenisUlangan::all();
        return view('post.dosen.dosen', compact('matakuliahh', 'jenisujian'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $input = $request ->all();
//        if($file = $request->file('file_soal_id')){
//
////            return "photo exist";
//            $name = time() . $file->getClientOriginalName();
//
//            $file->move('images', $name);
//            $photo = FileSoal::create(['file'=>$name]);
//
//            $input['file_soal_id'] = $photo->id;
//
//
//        }
//        $input['file_soal_id'] = $photo->id;


        $input = $request ->all();
        if($file = $request->file('file_soal_id')){
            $name = time() . $file->getClientOriginalName();

            Storage::disk('google')->put('/'.$name, file_get_contents($request->file('file_soal_id')));
            $photo = FileSoal::create(['file'=>$name]);

            $input['file_soal_id'] = $photo->id;


        }
        $input['file_soal_id'] = $photo->id;



        UploadFile::create($input);
        return redirect('/berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $oke = FileSoal::find($id);

        $filename = $oke->file;

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
            ->header('Content-Disposition', "attachment; filename=$filename");

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $uploadfile = UploadFile::findOrfail($id);
//        $input = $request -> all();
        $input = $request ->all();
//        if($file = $request->file('file_soal_id')){
//
////            return "photo exist";
//            $name = time() . $file->getClientOriginalName();
//
//            $file->move('images', $name);
//
//            $photo = FileSoal::create(['file'=>$name]);
//
//            $input['file_soal_id'] = $photo->id;
//
//
//        }
//        $uploadfile -> update($input);
        return redirect('post.panitia.panitia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
