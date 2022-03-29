<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                    Rakitek App
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script type="text/javascript">
        $(document).ready(function(e){
            $('.btnEdit').on('click',function(){
                $('#btnProduk').html('Ubah Data');
                $("#btnProduk").css("backgroundColor","green");
                var id = $(this).attr('data-id');
                $('[name=id_produk]').val(id);
                // $('#formProduk').attr('action', '{{ route('produk.update') }}');

                $.ajax({
                    url:"{{ url('products/editProduk') }}",
                    type:'GET',
                    data:{
                        id:id
                    },
                    success: function(res){
                        console.log(res.data);
                        document.getElementById("nama_produk").value = res.data.nama_produk;
                        $("#kategori_id option[value='"+res.data.kategori_id+"']").prop('selected',true);
                        document.getElementById("harga").value = res.data.harga;
                    }
                })
            })
            $('.btnHapus').on('click',function(){
                var id = $(this).attr('data-id');
                confirm("Apakah yakin dihapus ?");
 
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('products/deleteProduk')}}"+'/'+id,
                    data: { _token: '{{csrf_token()}}' },
                    success: function (data) {
                        $("#data_id_" + id).remove();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            })

            //data kategori
            $('.btnUbah').on('click',function(){
                $('#btnKategori').html('Ubah Data');
                $("#btnKategori").css("backgroundColor","green");
                var id = $(this).attr('data-id');
                $('[name=id_kategori]').val(id);
                // $('#formKategori').attr('action', '{{ route('kategori.update') }}');

                $.ajax({
                    url:"{{ url('products/editKategori') }}",
                    type:'GET',
                    data:{
                        id:id
                    },
                    success: function(res){
                        console.log(res);
                        document.getElementById("nama_kategori").value = res.data.nama_kategori;
                    }
                })
            })
            $('.btnDelete').on('click',function(){
                var id = $(this).attr('data-id');
                confirm("Apakah yakin dihapus ?");
 
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('products/deleteKategori')}}"+'/'+id,
                    data: { _token: '{{csrf_token()}}' },
                    success: function (data) {
                        $("#id_k_" + id).remove();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            })
        });
    </script>
</body>
</html>
