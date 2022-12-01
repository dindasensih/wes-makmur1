@extends('template')

@section('content')
    {{-- membuat tabel view post --}}

    <div class="container mt-3">
        <a href="{{ url('post/create') }}" class="btn btn-primary">Tambah Post</a>
        <div class="card shadow mb-3 mt-3">
            <div class="card-header text-center">Post</div>
            <div class="card-body">
                <table class="table-responsive">
                    <table class="table table-bordered" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Isi</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $item['judul'] }}</td>
                                    <td>{{ $item['isi'] }}</td>
                                    <td>{{ $item['tanggal'] }}</td>
                                    <td>{{ $item->kategori->nama }}</td>
                                    <td><a href="{{ url('post/' . $item->id . '/edit') }}"class="btn btn-primary mb-2">Edit</a>
                                        <a href="{{ url('post/' . $item->id . '/delete') }}"class="btn btn-secondary mb-2">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        @endsection
