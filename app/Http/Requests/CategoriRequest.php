<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama_kategori'=>'required',
        ];
    }

    public function messages()
    {
    	return [
         'nama_kategori.required' 				=> 'Nama kategori tidak boleh kosong',
         'nama_kategori.unique'=>'Nama kategori sudah ada',
       ];
    }
}
