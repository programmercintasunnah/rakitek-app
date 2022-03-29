<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $produk = Products::all();
        $kategori = Categories::get();
        return view('home',compact('kategori','produk'));
    }

    public function store(ProductRequest $request)
    {
        $data = Products::find($request->id_produk);
        if($data){
            $data->update($request->all());
        }else{
            $produk = new Products;
            $produk->fill($request->all());
            $produk->save();
        }
    
        return redirect('/products');
    }

    public function editProduk(Request $request)
    {
        $id = $request->id;
        $data = Products::find($id);
        return response()->json([
            'data'=>$data,
        ]);
    }

    public function deleteProduk($id)
    {
        $produk = Products::find($id)->delete();
        return response()->json([
            'data'=>$produk,
        ]);
    }

    public function editKategori(Request $request)
    {
        $id = $request->id;
        $data = Categories::find($id);
        return response()->json([
            'data'=>$data,
        ]);
    }

    public function deleteKategori($id)
    {
        $kategori = Categories::find($id)->delete();
        return response()->json([
            'data'=>$kategori,
        ]);
    }

    public function kategoriStore(CategoriRequest $request){
        $data = Categories::find($request->id_kategori);
        if($data){
            $data->update($request->all());
        }else{
            $produk = new Categories;
            $produk->fill($request->all());
            $produk->save();
        }

        return redirect('/products');
    }
}
