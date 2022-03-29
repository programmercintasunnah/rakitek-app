@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crud Products') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('products.store') }}" id="formProduk">
                        @csrf

                        <div class="row mb-3">
                            <input type="hidden" name="id_produk">
                            <label for="nama_produk" class="col-md-4 col-form-label text-md-end">{{ __('Nama Produk') }}</label>

                            <div class="col-md-6">
                                <input id="nama_produk" type="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror" name="nama_produk" value="{{ old('nama_produk') }}" autocomplete="nama_produk" autofocus>

                                @error('nama_produk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="kategori_id" class="col-md-4 col-form-label text-md-end">{{ __('Kategori') }}</label>
                            <div class="col-md-6">
                                <select name="kategori_id" id="kategori_id" class="form-select @error('kategori_id') is-invalid @enderror" aria-label="Default select example">
                                    <option value="" selected>Pilih kategori produk</option>
                                    @foreach ($kategori as $key => $k)
                                    <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                                    @endforeach
                                  </select>
                                @error('kategori_id')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="harga" class="col-md-4 col-form-label text-md-end">{{ __('Harga') }}</label>

                            <div class="col-md-6">
                                <input id="harga" type="harga" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga') }}" autocomplete="harga">

                                @error('harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="btnProduk">
                                    {{ __('Simpan') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produk as $key => $p)
                                <tr id="data_id_{{ $p->id }}">
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $p->nama_produk }}</td>
                                    <td>{{ $p->kategori?$p->kategori->nama_kategori:'' }}</td>
                                    <td>{{ $p->harga }}</td>
                                    <td>
                                        <a href="javascript:void(0)" class="btnEdit" data-id="{{ $p->id }}"><span class="badge rounded-pill bg-success">edit</span></a>
                                        <a href="javascript:void(0)" class="btnHapus" data-id="{{ $p->id }}"><span class="badge rounded-pill bg-danger">hapus</span></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Kategori Products') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('kategori.store') }}" id="formKategori">
                        @csrf

                        <div class="row mb-3">
                            <input type="hidden" name="id_kategori">
                            <label for="nama" class="col-md-4 col-form-label text-md-end">{{ __('Kategori') }}</label>

                            <div class="col-md-6">
                                <input id="nama_kategori" type="nama_kategori" class="form-control @error('nama_kategori') is-invalid @enderror" name="nama_kategori" value="{{ old('nama_kategori') }}" autocomplete="nama_kategori">

                                @error('nama_kategori')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="btnKategori">
                                    {{ __('Simpan') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategori as $key => $k)
                                <tr id="id_k_{{ $k->id }}">
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $k->nama_kategori }}</td>
                                    <td>
                                        <a href="javascript:void(0)" class="btnUbah" data-id="{{ $k->id }}"><span class="badge rounded-pill bg-success">edit</span></a>
                                        <a href="javascript:void(0)" class="btnDelete" data-id="{{ $k->id }}"><span class="badge rounded-pill bg-danger">hapus</span></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
