<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function rules()
    {
        return [
            'nama_produk'=>'required',
            'kategori_id'=>'required',
            'harga'=>'required|integer|min:1',
        ];
    }

    public function messages()
    {
    	return [
         'nama_produk.required' 				=> 'Nama produk tidak boleh kosong',
         'kategori_id.required' 				=> 'Kategori tidak boleh kosong',
         'harga.required' 				=> 'Harga produk tidak boleh kosong',
         'harga.integer' 				=> 'Harga produk harus angka dari 1',
         'harga.min'=>'Harga produk dimulai dari Rp.1',
         'nama_produk.unique'=>'Nama produk sudah ada',
       ];
    }
}
