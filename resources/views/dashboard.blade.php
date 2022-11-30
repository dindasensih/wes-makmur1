@extends('template')

@section('content')
    <div class="container">
        @foreach ($data as $item)
            <div class="card mt-3" style="width: 200px;">
                <div class="card-body">
                    <h5 class="card-title">{{ $item['judul'] }}</h5>
                    <p class="card-text">{{ $item['isi'] }}</p>
                    <p class="card-date">{{ $item['tanggal'] }}</p>
                    <p class="kategori">{{ $item->kategori->nama }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
