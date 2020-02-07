<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DosenRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'name' => 'required',
            'email' => 'required',
            'role_id' => 'required',
            'password' => 'required',
            'mata_kuliah_id' => 'required',
            'users_id' => 'required',
            'tanggal_ujian' => 'required',
            'jam_mulai_ujian' => 'required',
            'jam_selesai_ujian' => 'required',
            'durasi_ujian' => 'required',
            'total_ujian' => 'required',
        ];
    }
}
