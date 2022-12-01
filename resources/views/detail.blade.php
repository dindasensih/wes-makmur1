@extends('template')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4">
                <div class="card mt-3 text-center">
                    <div class="card-body">
                        <h5 class="card-title">{{ $data['judul'] }}</h5>
                        <p class="card-text">{{ $data['isi'] }}</p>
                        <p class=""> <sub>{{ $data['tanggal'] }}</sub> </p>
                        <p><i>by {{ $data->user->name }}</i></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5 justify-content-center">
            @foreach ($produk as $pro)
                <div class="col-4">
                    <h6>Rekomendasi Produk</h6>
                    <div class="card mt-3 text-center">
                        <div class="card-body">
                            <img src="{{ asset('storage/' . $pro->foto) }}" class="card-img-top" alt="...">
                            <h5 class="card-title">{{ $pro['nama'] }}</h5>
                            <p class=""> <sub>{{ $pro['harga'] }}</sub> </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
