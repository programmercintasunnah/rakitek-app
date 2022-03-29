<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_produk',
        'kategori_id',
        'harga',
    ];

    public function kategori(){
        return $this->belongsTo(Categories::class,'kategori_id');
    }
}
