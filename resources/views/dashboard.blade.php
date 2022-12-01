@extends('template')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($data as $item)
                <div class="col-4">
                    <div class="card mt-3 text-center">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item['judul'] }}</h5>
                            <p class="card-text">{{ $item['isi'] }}</p>
                            <p class=""> <sub>{{ $item['tanggal'] }}</sub> </p>
                            <p><i>by {{ $item->user->name }}</i></p>
                            <a href={{ 'detail/' . $item->id }} class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
